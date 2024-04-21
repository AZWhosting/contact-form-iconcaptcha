
# contact-form-iconcaptcha
A secure PHP contact form with IconCaptcha and PHPMailer for robust spam protection and reliable email sending. - Un formulaire de contact PHP sécurisé avec IconCaptcha et PHPMailer pour une protection robuste contre le spam et un envoi d'email fiable.

[🇺🇸 English](#contact-form-project-with-iconcaptcha) | [🇫🇷 Français](#projet-de-formulaire-de-contact-avec-iconcaptcha)

---

# Contact Form Project with IconCaptcha
This project implements a secure PHP contact form, integrating IconCaptcha for protection against automated submissions and PHPMailer for secure email sending.

- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
- [Configuration](#configuration)
- [Security](#security)
- [Credits](#credits)
- [Contribution](#contribution)
- [License](#license)

## Features

- Server-side form validation.
- Integration of IconCaptcha for security.
- Secure email sending via SMTP with PHPMailer.
- Session management for CSRF tokens.
- Environment-specific configuration using `.env` files.

## Requirements

- PHP server 7.4+.
- Composer for managing PHP dependencies.

## Installation

1. Clone the repository to your web server: `git clone https://github.com/AZWhosting/contact-form-iconcaptcha.git`
2. Install Composer dependencies: `composer install`
3. Copy `.env.example` to `.env` and configure it according to your environment:
   ```bash
   cp .env.example .env
   ```
4. Ensure the web server has access to serve the project, especially the `src` directory.

## Usage

Navigate to `index.php` on your web server. Fill out the fields and submit the form. Ensure IconCaptcha is solved for submission acceptance.

## Configuration

The project uses a `.env` file for configuration to keep sensitive information like SMTP details and base URL out of the source code.

### Adjusting Configurations in `.env`

- `SMTP_*` variables for email sending configurations.
- `BASE_URL` for the absolute URL to the project.
- `CONTACT_FORM_FILENAME` if you wish to rename or move the contact form.

## Security

- Validation and sanitization of all user inputs.
- CSRF tokens to prevent cross-site request forgery.
- Captcha to deter automated submissions.

## Credits

- [PHPMailer](https://github.com/PHPMailer/PHPMailer) for email sending.
- [IconCaptcha](https://github.com/fabianwennink/IconCaptcha-PHP) for captcha integration.

## Contribution

Contributions are welcome. Please fork the project, create your feature branch, commit your changes, push to the branch, and open a Pull Request.

## License

This project is licensed under the MIT License - see the `LICENSE` file for details.

---
[🇫🇷 Français](#projet-de-formulaire-de-contact-avec-iconcaptcha)] | [🇺🇸 English](#contact-form-project-with-iconcaptcha)


# Projet de Formulaire de Contact avec IconCaptcha
Ce projet implémente un formulaire de contact sécurisé en PHP, intégrant IconCaptcha pour la protection contre les soumissions automatisées et PHPMailer pour l'envoi d'emails sécurisé.

- [Fonctionnalités](#fonctionnalités)
- [Prérequis](#prérequis)
- [Installation](#installation-1)
- [Utilisation](#utilisation)
- [Configuration](#configuration-1)
- [Sécurité](#sécurité)
- [Crédits](#crédits)
- [Contribution](#contribution-1)
- [Licence](#licence)

## Fonctionnalités

- Validation de formulaire côté serveur.
- Intégration d'IconCaptcha pour la sécurité.
- Envoi d'email sécurisé via SMTP avec PHPMailer.
- Gestion des sessions pour les tokens CSRF.
- Configuration spécifique à l'environnement via un fichier `.env`.

## Prérequis

- Serveur PHP 7.4+.
- Composer pour la gestion des dépendances PHP.

## Installation

1. Clonez le dépôt sur votre serveur web : `git clone https://github.com/AZWhosting/contact-form-iconcaptcha.git`
2. Installez les dépendances Composer : `composer install`
3. Copiez `.env.example` en `.env` et configurez-le selon votre environnement :
   ```bash
   cp .env.example .env
   ```
4. Assurez-vous que le serveur web a accès pour servir le projet, particulièrement le répertoire `src`.

## Utilisation

Naviguez vers `index.php` sur votre serveur web. Remplissez les champs et soumettez le formulaire. Assurez-vous que l'IconCaptcha est résolu pour que la soumission soit acceptée.

## Configuration

Le projet utilise un fichier `.env` pour la configuration afin de garder les informations sensibles telles que les détails SMTP et l'URL de base en dehors du code source.

### Ajustement des Configurations dans `.env`

- Variables `SMTP_*` pour les configurations d'envoi d'email.
- `BASE_URL` pour l'URL absolue vers le projet.
- `CONTACT_FORM_FILENAME` si vous souhaitez renommer ou déplacer le formulaire de contact.

## Sécurité

- Validation et assainissement de toutes les entrées utilisateur.
- Tokens CSRF pour prévenir la falsification de requête intersite.
- Captcha pour dissuader les soumissions automatisées.

## Crédits

- [PHPMailer](https://github.com/PHPMailer/PHPMailer) pour l'envoi d'emails.
- [IconCaptcha](https://github.com/fabianwennink/IconCaptcha-PHP) pour l'intégration de captcha.

## Contribution

Les contributions sont les bienvenues. Veuillez forker le projet, créer votre branche de fonctionnalité, commettre vos changements, pousser vers la branche et ouvrir une Pull Request.

## Licence

Ce projet est sous licence MIT - voir le fichier `LICENSE` pour les détails.
