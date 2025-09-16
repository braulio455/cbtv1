<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerificationCodeMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $code,
        public string $name,
        public int $expiryMinutes
    ) {}

    public function build()
    {
        return $this->markdown('emails.verification_code')
            ->subject('Código de Verificación - Expira en '.$this->expiryMinutes.' minutos');
    }
}