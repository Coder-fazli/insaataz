<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class DiagnoseEmail extends Command
{
    protected $signature = 'email:diagnose';
    protected $description = 'Diagnose email configuration issues';

    public function handle()
    {
        $this->info('=== EMAIL CONFIGURATION DIAGNOSTICS ===');
        $this->newLine();

        // Check configuration
        $this->info('📧 Mail Configuration:');
        $this->line('MAIL_MAILER: ' . config('mail.default'));
        $this->line('MAIL_HOST: ' . config('mail.mailers.smtp.host'));
        $this->line('MAIL_PORT: ' . config('mail.mailers.smtp.port'));
        $this->line('MAIL_USERNAME: ' . config('mail.mailers.smtp.username'));
        $this->line('MAIL_ENCRYPTION: ' . config('mail.mailers.smtp.encryption'));
        $this->line('MAIL_FROM: ' . config('mail.from.address'));
        $this->newLine();

        // Check if encryption matches port
        $port = config('mail.mailers.smtp.port');
        $encryption = config('mail.mailers.smtp.encryption');

        if ($port == 465 && $encryption != 'ssl') {
            $this->error('⚠️  WARNING: Port 465 requires SSL encryption, but found: ' . $encryption);
        } elseif ($port == 587 && $encryption != 'tls') {
            $this->error('⚠️  WARNING: Port 587 requires TLS encryption, but found: ' . $encryption);
        } else {
            $this->info('✅ Port and encryption match correctly');
        }
        $this->newLine();

        // Test email sending
        $this->info('🔄 Attempting to send test email...');

        try {
            Mail::raw('Test email from OrelInsaat.az contact form system', function ($message) {
                $message->to(config('mail.from.address'))
                    ->subject('Test Email - Contact Form System');
            });

            $this->info('✅ Email sent successfully!');
            $this->info('Check inbox: ' . config('mail.from.address'));
            return 0;

        } catch (\Exception $e) {
            $this->error('❌ Failed to send email');
            $this->error('Error: ' . $e->getMessage());
            $this->newLine();
            $this->error('Common issues:');
            $this->line('1. Wrong SMTP credentials in .env file');
            $this->line('2. Email account not configured in cPanel');
            $this->line('3. Firewall blocking SMTP connection');
            $this->line('4. Wrong encryption type for port');
            return 1;
        }
    }
}
