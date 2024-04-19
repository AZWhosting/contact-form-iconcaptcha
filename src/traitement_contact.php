<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once 'config.php';
require_once 'EmailManager.php';


use IconCaptcha\IconCaptcha;

// Démarrer la session si elle n'est pas déjà démarrée 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Construire l'URL de redirection
$redirectUrl = $baseUrl . '/' . $contactFormFilename;

$errors = []; // Pour stocker les messages d'erreur

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Chargement de la configuration IconCaptcha
    $config = require 'captcha-config.php';
    $captcha = new IconCaptcha($config);

    // Validation du captcha
    $validation = $captcha->validate($_POST);
    if (!$validation->success()) {
        // Si le captcha n'est pas validé, ajouter une erreur et rediriger
        $errors[] = 'Le captcha n\'est pas valide. Code d\'erreur : ' . $validation->getErrorCode();
    }

    // Validation CSRF
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        $errors[] = 'Erreur de validation CSRF.';
    }

    // Autres validations du formulaire...
    // Validation du nom
    if (empty($_POST['nom'])) {
        $errors[] = "Le champ nom est obligatoire.";
    } else {
        $nom = filter_var($_POST['nom'], FILTER_SANITIZE_STRING);
    }

    // Validation de l'email
    if (empty($_POST['email'])) {
        $errors[] = "Le champ email est obligatoire.";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "L'adresse email n'est pas valide.";
    } else {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    }

    // Validation du message
    if (empty($_POST['message'])) {
        $errors[] = "Le champ message est obligatoire.";
    } else {
        $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
    }

    // Si des erreurs ont été détectées
    if (!empty($errors)) {
        $_SESSION['feedback'] = ['type' => 'error', 'message' => implode('<br>', $errors)];

		header('Location: ' . $redirectUrl);
		exit;
    }

    // Si tout est correct, procéder à l'envoi de l'email
    // $emailManager = new EmailManager($recipients); // Assurez-vous que $recipients est correctement défini.
    // Si tout est correct, procéder à l'envoi de l'email
    $emailManager = new EmailManager($recipients, $emailSubject);
    try {
        $emailManager->sendEmail($emailSubject, $nom, $email, $message);
        $_SESSION['feedback'] = ['type' => 'success', 'message' => 'Message envoyé avec succès à tous les destinataires.'];
    } catch (Exception $e) {
        $_SESSION['feedback'] = ['type' => 'error', 'message' => 'Erreur lors de l\'envoi du message : ' . $e->getMessage()];
    }

		header('Location: ' . $redirectUrl);
		exit;
} else {
    // Redirection si la méthode n'est pas POST
		header('Location: ' . $redirectUrl);
		exit;
}

?>
