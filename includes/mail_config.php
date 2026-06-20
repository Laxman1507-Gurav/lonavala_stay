<?php
// PHPMailer and mail utility loader for Lonavala Luxury Stay

// Load PHPMailer classes if they exist
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Check if PHPMailer files are placed locally in includes/phpmailer/
$phpmailer_base = __DIR__ . '/phpmailer/';
if (file_exists($phpmailer_base . 'Exception.php') && 
    file_exists($phpmailer_base . 'PHPMailer.php') && 
    file_exists($phpmailer_base . 'SMTP.php')) {
    
    require $phpmailer_base . 'Exception.php';
    require $phpmailer_base . 'PHPMailer.php';
    require $phpmailer_base . 'SMTP.php';
    define('USE_PHPMAILER', true);
} else {
    define('USE_PHPMAILER', false);
}

/**
 * Sends a premium luxury themed HTML email.
 *
 * @param string $to Recipient email address
 * @param string $subject Email subject
 * @param string $htmlContent HTML formatted message body
 * @return bool True if sent successfully, False otherwise
 */
function sendLuxuryMail($to, $subject, $htmlContent) {
    // Wrap email in a luxury hotel template
    $fullBody = "
    <html>
    <head>
        <style>
            body { font-family: 'Poppins', Arial, sans-serif; background-color: #F8F5F0; color: #334155; margin: 0; padding: 20px; }
            .container { max-width: 600px; margin: 0 auto; background-color: #FFFFFF; border: 1px solid #E2E8F0; }
            .header { background-color: #0F172A; padding: 30px; text-align: center; border-bottom: 3px solid #D4AF37; }
            .header h1 { color: #D4AF37; margin: 0; font-size: 24px; font-family: 'Playfair Display', Georgia, serif; letter-spacing: 2px; }
            .content { padding: 40px; line-height: 1.6; }
            .footer { background-color: #0F172A; padding: 20px; text-align: center; color: #94A3B8; font-size: 11px; }
            .btn { display: inline-block; padding: 12px 24px; background-color: #D4AF37; color: #0F172A; text-decoration: none; font-weight: bold; margin-top: 20px; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h1>LONAVALA LUXURY STAY</h1>
            </div>
            <div class='content'>
                $htmlContent
            </div>
            <div class='footer'>
                <p>&copy; " . date('Y') . " Lonavala Luxury Stay. Luxury Villas &bull; Private Pools &bull; Scenic Escapes.</p>
            </div>
        </div>
    </body>
    </html>";

    if (USE_PHPMAILER) {
        $mail = new PHPMailer(true);
        try {
            // Server settings (adjust these values to connect your actual SMTP server)
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';             // Set SMTP server
            $mail->SMTPAuth   = true;                         // Enable SMTP authentication
            $mail->Username   = 'your-email@gmail.com';       // SMTP username
            $mail->Password   = 'your-smtp-app-password';     // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            // Recipients
            $mail->setFrom('info@lonavalaluxurystay.com', 'Lonavala Luxury Stay');
            $mail->addAddress($to);

            // Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $fullBody;

            $mail->send();
            return true;
        } catch (Exception $e) {
            error_log("PHPMailer Error: {$mail->ErrorInfo}");
            return false;
        }
    } else {
        // Fallback to native PHP mail function
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: Lonavala Luxury Stay <info@lonavalaluxurystay.com>" . "\r\n";
        
        return mail($to, $subject, $fullBody, $headers);
    }
}
?>
