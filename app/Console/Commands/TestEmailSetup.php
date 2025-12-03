<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;

class TestEmailSetup extends Command
{
    protected $signature = 'email:test-setup';
    protected $description = 'Test email configuration and send test email';

    public function handle()
    {
        $this->info('Testing email configuration...');

        // Display current config
        $this->info('MAIL_MAILER: ' . config('mail.default'));
        $this->info('MAIL_HOST: ' . config('mail.mailers.smtp.host'));
        $this->info('MAIL_PORT: ' . config('mail.mailers.smtp.port'));
        $this->info('MAIL_USERNAME: ' . config('mail.mailers.smtp.username'));
        $this->info('MAIL_ENCRYPTION: ' . config('mail.mailers.smtp.encryption'));
        $this->info('MAIL_FROM: ' . config('mail.from.address'));

        // Fix encryption for port 465
        if (config('mail.mailers.smtp.port') == 465 && config('mail.mailers.smtp.encryption') != 'ssl') {
            $this->warn('Port 465 requires SSL encryption. Attempting to fix...');
            Config::set('mail.mailers.smtp.encryption', 'ssl');
        }

        // Send test email
        try {
            Mail::raw('Əlaqə forması test mesajı. Email sistemi düzgün işləyir!', function ($message) {
                $message->to('ondigital.az@gmail.com')
                    ->subject('Test Email - OrelInsaat.az');
            });

            $this->info('✅ Test email sent successfully to ondigital.az@gmail.com');
            return 0;
        } catch (\Exception $e) {
            $this->error('❌ Failed to send email: ' . $e->getMessage());
            return 1;
        }
    }
}
