<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Encryption\DecryptException;

class User extends Authenticatable
{
    protected $fillable = [
        'nombres', 'apellidos', 'email', 'password',
        'verification_code', 'code_expires_at', 'is_verified',
        'last_password_update'
    ];

    protected $hidden = [
        'password', 'verification_code', 'remember_token'
    ];

    protected $casts = [
        'code_expires_at' => 'datetime',
        'last_password_update' => 'datetime'
    ];

    // Métodos originales existentes...
    public function generateVerificationCode()
    {
        $this->verification_code = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        $this->code_expires_at = now()->addMinutes(5);
        $this->save();
        
        return $this->verification_code;
    }

    public function isValidCode($code)
    {
        if (!$this->verification_code || !$this->code_expires_at) {
            return false;
        }

        if (is_string($this->code_expires_at)) {
            $this->code_expires_at = \Carbon\Carbon::parse($this->code_expires_at);
            $this->save();
        }

        return hash_equals($this->verification_code, $code) && 
               $this->code_expires_at->isFuture();
    }

    public function updatePassword($password)
    {
        $this->password = Hash::make($password);
        $this->last_password_update = now();
        return $this->save();
    }

    // Nuevos accesores para datos desencriptados
    public function getDecryptedNombresAttribute()
    {
        try {
            return Crypt::decryptString($this->nombres);
        } catch (DecryptException $e) {
            return 'Usuario';
        }
    }

    public function getDecryptedApellidosAttribute()
    {
        try {
            return Crypt::decryptString($this->apellidos);
        } catch (DecryptException $e) {
            return '';
        }
    }

    public function getDecryptedEmailAttribute()
    {
        try {
            return Crypt::decryptString($this->email);
        } catch (DecryptException $e) {
            return 'email@no-valido.com';
        }
    }

    public function getInicialesAttribute()
    {
        return substr($this->decrypted_nombres, 0, 1) . substr($this->decrypted_apellidos, 0, 1);
    }
}