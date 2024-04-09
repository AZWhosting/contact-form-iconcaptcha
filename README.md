# contact-form-iconcaptcha
A secure PHP contact form with IconCaptcha and PHPMailer for robust spam protection and reliable email sending. - Un formulaire de contact PHP sécurisé avec IconCaptcha et PHPMailer pour une protection robuste contre le spam et un envoi d'email fiable.

[🇺🇸 English](#contact-form-project-with-iconcaptcha) | [🇫🇷 Français](#projet-de-formulaire-de-contact-avec-iconcaptcha)

# Contact Form Project with IconCaptcha

- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
- [Configuration](#configuration)
- [Security](#security)
- [Credits](#credits)
- [Contribution](#contribution)
- [License](#license)
- [Project Link](#project-Link)

This project implements a secure PHP contact form, integrating IconCaptcha for protection against automated submissions and PHPMailer for secure email sending.

## Features

- Server-side form validation.
- Integration of IconCaptcha for security.
- Secure email sending via SMTP with PHPMailer.
- Session management for CSRF tokens.

## Requirements

- PHP server 7.4+.
- PHP `pdo_mysql` extension if using MySQL for captcha session storage.
- SMTP server for email sending.

## Installation

1. Clone the repository to your web server: `git clone https://github.com/yourusername/yourprojectname.git`
2. Install Composer dependencies: `composer install`
3. Configure your SMTP server and database in `config.php`.
4. (Optional) Customize IconCaptcha themes in `captcha-config.php`.

## Usage

To use the contact form, navigate to `index.php` on your web server. Fill out the fields and submit the form. The IconCaptcha must be solved for the submission to be accepted.

## Configuration

The main configuration is located in `config.php`, where you can define:
- SMTP connection details for email sending.
- CSRF tokens for form security.
- Email recipients.

## Security

We have taken several measures to secure the application:

- Validation and sanitization of all user inputs.
- Use of CSRF tokens to prevent cross-site request forgery.
- Captcha to avoid automated submissions.

## Credits

- [PHPMailer](https://github.com/PHPMailer/PHPMailer) - An email client library for PHP.
- [IconCaptcha](https://github.com/fabianwennink/IconCaptcha-PHP) - A PHP captcha library based on icons.

## Contribution

Contributions are welcome. To contribute:

1. Fork the project.
2. Create your feature branch (`git checkout -b feature/AmazingFeature`).
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`).
4. Push to the branch (`git push origin feature/AmazingFeature`).
5. Open a Pull Request.

## License

This project is licensed under the MIT License. See the `LICENSE` file for details.

## Project Link 

[https://github.com/yourusername/yourprojectname](https://github.com/yourusername/yourprojectname)

---

# Projet de Formulaire de Contact avec IconCaptcha

- [Fonctionnalités](#fonctionnalités)
- [Prérequis](#prérequis)
- [Installation](#installation-1)
- [Utilisation](#utilisation)
- [Configuration](#configuration-1)
- [Sécurité](#sécurité)
- [Crédits](#crédits-1)
- [Contribution](#contribution-1)
- [Licence](#licence)
- [Lien du projet](#lien-du-projet)

Ce projet implémente un formulaire de contact sécurisé en PHP, intégrant IconCaptcha pour la protection contre les soumissions automatisées et PHPMailer pour l'envoi d'emails sécurisé.

## Fonctionnalités

- Validation de formulaire côté serveur.
- Intégration d'IconCaptcha pour la sécurité.
- Envoi d'email sécurisé via SMTP avec PHPMailer.
- Gestion des sessions pour les tokens CSRF.

## Prérequis

- Serveur PHP 7.4+.
- Extension PHP `pdo_mysql` si vous utilisez MySQL pour le stockage de sessions captcha.
- Serveur SMTP pour l'envoi d'emails.

## Installation

1. Clonez le dépôt dans votre serveur web : `git clone https://github.com/yourusername/yourprojectname.git`
2. Installez les dépendances Composer : `composer install`
3. Configurez votre serveur SMTP et la base de données dans `config.php`.
4. (Optionnel) Personnalisez les thèmes IconCaptcha dans `captcha-config.php`.

## Utilisation

Pour utiliser le formulaire de contact, naviguez vers `index.php` sur votre serveur web. Remplissez les champs et soumettez le formulaire. Le captcha IconCaptcha doit être résolu pour que la soumission soit acceptée.

## Configuration

La configuration principale se trouve dans `config.php`, où vous pouvez définir :
- Détails de connexion SMTP pour l'envoi d'emails.
- Tokens CSRF pour la sécurité du formulaire.
- Destinataires de l'email.

## Sécurité

Nous avons pris plusieurs mesures pour sécuriser l'application :

- Validation et assainissement de toutes les entrées utilisateur.
- Utilisation de tokens CSRF pour prévenir la falsification de requête intersite.
- Captcha pour éviter les soumissions automatisées.

## Crédits

- [PHPMailer](https://github.com/PHPMailer/PHPMailer) - Une bibliothèque de client email pour PHP.
- [IconCaptcha](https://github.com/fabianwennink/IconCaptcha-PHP) - Une bibliothèque de captcha PHP basée sur des icônes.

## Contribution

Les contributions sont les bienvenues. Pour contribuer :

1. Fork le projet.
2. Créez votre branche de fonctionnalité (`git checkout -b feature/AmazingFeature`).
3. Committez vos changements (`git commit -m 'Add some AmazingFeature'`).
4. Poussez vers la branche (`git push origin feature/AmazingFeature`).
5. Ouvrez une Pull Request.

## Licence

Ce projet est sous licence MIT. Voir le fichier `LICENSE` pour plus de détails.

## Lien du projet

[https://github.com/yourusername/yourprojectname](https://github.com/yourusername/yourprojectname)
