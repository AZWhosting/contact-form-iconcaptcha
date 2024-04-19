
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../vendor/autoload.php';

class EmailManager {
    private $recipientEmails;

    public function __construct($recipientEmails) {
        $this->recipientEmails = $recipientEmails;
    }

    public function sendEmail($messageSubject, $name, $userEmail, $messageBody) {
        $mail = new PHPMailer(true);

        try {
            // Configuration du serveur SMTP
            $mail->isSMTP();
            $mail->Host = SMTP_HOST;
            $mail->SMTPAuth = true;
            $mail->Username = SMTP_USER; // Utilise l'adresse SMTP_USER comme expéditeur
            $mail->Password = SMTP_PASSWORD;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Utilise l'adresse e-mail SMTP_USER comme expéditeur
            $mail->setFrom(SMTP_USER, 'Service Client'); // Vous pouvez personnaliser le nom affiché
            $mail->addReplyTo($userEmail, $name); // Utilise l'email de l'utilisateur pour la réponse

            // Ajouter des destinataires
            foreach ($this->recipientEmails as $recipientEmail) {
                $mail->addAddress($recipientEmail);
            }

            // Contenu de l'email
            $mail->isHTML(true);
            $mail->Subject = $messageSubject;
            $mail->Body    = 'Nom: ' . $name . '<br>Email: ' . $userEmail . '<br>Message:<br>' . nl2br($messageBody);
            $mail->AltBody = 'Nom: ' . $name . "\nEmail: " . $userEmail . "\nMessage:\n" . $messageBody;

            $mail->send();
            echo 'Message envoyé avec succès.';
        } catch (Exception $e) {
            echo 'Message non envoyé. Erreur: ' . $mail->ErrorInfo;
        }
    }
}
