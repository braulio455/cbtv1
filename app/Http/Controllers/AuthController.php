<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

use App\Models\User;
use App\Mail\VerificationCodeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use Illuminate\Contracts\Encryption\DecryptException;

class AuthController extends Controller
{
    protected $codeExpiration = 5; // Minutos

    public function showRegisterForm()
    {
        // Verificar si ya existe un usuario registrado
        if (User::count() > 0) {
            return redirect()->route('login')->with('error', 'El sistema solo permite una cuenta registrada.');
        }
        
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Verificar si ya existe un usuario registrado
        if (User::count() > 0) {
            return redirect()->route('login')->with('error', 'El sistema solo permite una cuenta registrada.');
        }

        $request->validate([
            'nombres' => 'required|string|max:50',
            'apellidos' => 'required|string|max:50',
            'email' => 'required|email',
            'password' => $this->passwordRules(),
        ]);

        if ($this->emailExists($request->email)) {
            return back()->with('error', 'El correo ya está registrado.');
        }

        $user = User::create([
            'nombres' => Crypt::encryptString($request->nombres),
            'apellidos' => Crypt::encryptString($request->apellidos),
            'email' => Crypt::encryptString($request->email),
            'password' => Hash::make($request->password),
            'is_admin' => true // Asignar como administrador
        ]);

        $this->sendVerificationCode($user);

        Session::put('temp_user_id', $user->id);
        return redirect()->route('verify')->with('success', 'Código enviado (válido por '.$this->codeExpiration.' minutos)');
    }

    // Resto de los métodos permanecen igual...
    public function showVerifyForm()
    {
        if (!Session::has('temp_user_id') && !Auth::check()) {
            return redirect()->route('login')->with('error', 'Acceso no autorizado.');
        }
        return view('auth.verify');
    }

    public function verify(Request $request)
    {
        $request->validate(['code' => 'required|digits:6']);

        $user = $this->getUserFromSessionOrAuth();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Sesión expirada o inválida.');
        }

        if (!$user->isValidCode($request->code)) {
            return back()->with('error', 'Código inválido o expirado (los códigos duran '.$this->codeExpiration.' minutos)');
        }

        $user->is_verified = true;
        $user->verification_code = null;
        $user->code_expires_at = null;
        $user->save();

        if (!Auth::check()) {
            Auth::login($user);
            Session::forget('temp_user_id');
            return redirect()->route('dashboard')->with('success', '¡Cuenta verificada!');
        }

        return back()->with('success', 'Código verificado correctamente');
    }

    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = $this->findUserByEncryptedEmail($request->email);

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Credenciales inválidas.');
        }

        if (!$user->is_verified) {
            return back()->with('error', 'Verifica tu cuenta antes de iniciar sesión.');
        }

        $this->sendVerificationCode($user);
        Session::put('temp_user_id', $user->id);
        
        return redirect()->route('verify')->with('success', 'Código enviado (válido por '.$this->codeExpiration.' minutos)');
    }

    public function dashboard()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión primero.');
        }

        $user = Auth::user();
        
        try {
            return view('dashboard', [
                'user' => $user,
                'nombre_completo' => $user->decrypted_nombres.' '.$user->decrypted_apellidos,
                'iniciales' => $user->iniciales,
                'email' => $user->decrypted_email
            ]);
        } catch (DecryptException $e) {
            Auth::logout();
            return redirect()->route('login')->with('error', 'Error al procesar tus datos. Por favor, inicia sesión nuevamente.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Has cerrado sesión correctamente');
    }

    public function showResetForm()
    {
        return view('auth.reset');
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => $this->passwordRules(),
        ]);

        $user = $this->findUserByEncryptedEmail($request->email);

        if (!$user) {
            return back()->with('error', 'Usuario no encontrado.');
        }

        $user->updatePassword($request->password);
        $this->sendVerificationCode($user);
        Session::put('reset_user_id', $user->id);
        
        return redirect()->route('verify.reset')->with('success', 'Verifica el código para completar el cambio');
    }

    public function showVerifyResetForm()
    {
        if (!Session::has('reset_user_id')) {
            return redirect()->route('reset')->with('error', 'Acceso denegado.');
        }
        return view('auth.verify_reset');
    }

    public function verifyReset(Request $request)
    {
        $request->validate(['code' => 'required|digits:6']);

        $user = User::find(Session::get('reset_user_id'));

        if (!$user || !$user->isValidCode($request->code)) {
            return back()->with('error', 'Código inválido o expirado.');
        }

        $user->verification_code = null;
        $user->code_expires_at = null;
        $user->save();
        Session::forget('reset_user_id');
        
        return redirect()->route('login')->with('success', 'Contraseña restablecida correctamente.');
    }

    protected function passwordRules()
    {
        return [
            'required',
            'confirmed',
            'min:10',
            'regex:/[A-Z]/',
            'regex:/[0-9]/',
            'regex:/[\W]/'
        ];
    }

    protected function emailExists($email)
    {
        return User::all()->contains(function ($user) use ($email) {
            try {
                return Crypt::decryptString($user->email) === $email;
            } catch (\Exception $e) {
                return false;
            }
        });
    }

    protected function findUserByEncryptedEmail($email)
    {
        return User::all()->first(function ($user) use ($email) {
            try {
                return Crypt::decryptString($user->email) === $email;
            } catch (\Exception $e) {
                return false;
            }
        });
    }

    protected function getUserFromSessionOrAuth()
    {
        return Session::has('temp_user_id') 
            ? User::find(Session::get('temp_user_id')) 
            : Auth::user();
    }

    protected function sendVerificationCode(User $user)
    {
        $code = $user->generateVerificationCode();
        
        try {
            Mail::to($user->decrypted_email)
                ->send(new VerificationCodeMail(
                    $code, 
                    $user->decrypted_nombres, 
                    $this->codeExpiration
                ));
        } catch (DecryptException $e) {
            Log::error('Error de desencriptación al enviar código de verificación', [
                'user_id' => $user->id,
                'error' => $e->getMessage(),
                'exception' => $e
            ]);
            throw new \Exception("No se pudo enviar el código de verificación. Por favor, intente nuevamente.");
        } catch (\Exception $e) {
            Log::error('Error al enviar código de verificación', [
                'user_id' => $user->id,
                'error' => $e->getMessage(),
                'exception' => $e,
                'code' => $code,
                'email_attempt' => $user->email
            ]);
            throw new \Exception("Ocurrió un error al enviar el código de verificación.");
        }
    }
}