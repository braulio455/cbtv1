<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\Encryption\DecryptException;

class AuthController extends Controller
{
    /**
     * Mostrar formulario de registro
     */
    public function showRegisterForm()
    {
        if (User::count() >= 2) {
            return redirect()->route('login')->with('error', 'El sistema solo permite 2 cuentas registradas.');
        }
        return view('auth.register');
    }

    /**
     * Registrar nuevo usuario
     */
    public function register(Request $request)
    {
        if (User::count() >= 2) {
            return redirect()->route('login')->with('error', 'El sistema solo permite 2 cuentas registradas.');
        }

        $request->validate([
            'nombres'   => 'required|string|max:50',
            'apellidos' => 'required|string|max:50',
            'email'     => 'required|email',
            'password'  => $this->passwordRules(),
        ]);

        if ($this->emailExists($request->email)) {
            return back()->with('error', 'El correo ya está registrado.');
        }

        $user = User::create([
            'nombres'   => Crypt::encryptString($request->nombres),
            'apellidos' => Crypt::encryptString($request->apellidos),
            'email'     => Crypt::encryptString($request->email),
            'password'  => Hash::make($request->password),
            'is_admin'  => User::count() === 0 // el primer usuario será admin
        ]);

        Auth::login($user);

        return redirect()->route('dashboard')->with('success', 'Cuenta creada e iniciada sesión correctamente.');
    }

    /**
     * Mostrar formulario de login
     */
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    /**
     * Iniciar sesión
     */
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = $this->findUserByEncryptedEmail($request->email);

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Credenciales inválidas.');
        }

        Auth::login($user);

        return redirect()->route('dashboard')->with('success', 'Inicio de sesión exitoso.');
    }

    /**
     * Dashboard
     */
    public function dashboard()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión primero.');
        }

        $user = Auth::user();

        try {
            return view('dashboard', [
                'user'            => $user,
                'nombre_completo' => $user->decrypted_nombres . ' ' . $user->decrypted_apellidos,
                'iniciales'       => $user->iniciales,
                'email'           => $user->decrypted_email
            ]);
        } catch (DecryptException $e) {
            Auth::logout();
            return redirect()->route('login')->with('error', 'Error al procesar tus datos. Inicia sesión nuevamente.');
        }
    }

    /**
     * Cerrar sesión
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Has cerrado sesión correctamente.');
    }

    /**
     * Mostrar formulario de reseteo de contraseña
     */
    public function showResetForm()
    {
        return view('auth.reset');
    }

    /**
     * Resetear contraseña
     */
    public function reset(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => $this->passwordRules(),
        ]);

        $user = $this->findUserByEncryptedEmail($request->email);

        if (!$user) {
            return back()->with('error', 'Usuario no encontrado.');
        }

        $user->updatePassword($request->password);

        return redirect()->route('login')->with('success', 'Contraseña restablecida correctamente.');
    }

    /**
     * Reglas de contraseña seguras
     */
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

    /**
     * Verificar si un email ya está registrado
     */
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

    /**
     * Buscar usuario por email encriptado
     */
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
}
