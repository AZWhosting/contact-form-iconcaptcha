<?php
require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();
// Temporairement pour vérification
error_log('SMTP_PASSWORD: ' . $_ENV['SMTP_PASSWORD']);

// Configurations
$baseUrl = $_ENV['BASE_URL'];
$contactFormFilename = $_ENV['CONTACT_FORM_FILENAME'];
$emailSubject = $_ENV['EMAIL_SUBJECT'];
$recipients = explode(',', $_ENV['RECIPIENTS']);

// Configurations SMTP
define('SMTP_HOST', $_ENV['SMTP_HOST']);
define('SMTP_USER', $_ENV['SMTP_USER']);
define('SMTP_PASSWORD', $_ENV['SMTP_PASSWORD']);
define('SMTP_PORT', $_ENV['SMTP_PORT']);
define('SMTP_SECURE', $_ENV['SMTP_SECURE']); 

// Démarrer la session si elle n'est pas déjà démarrée
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// CSRF token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
