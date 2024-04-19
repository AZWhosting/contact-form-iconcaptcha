<?php require_once __DIR__ . '/vendor/autoload.php'; ?>
<?php require_once __DIR__ . '/src/config.php'; ?>
<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(!empty($_POST)) {
    $options = require_once __DIR__ . '/src/captcha-config.php';
    $captcha = new \IconCaptcha\IconCaptcha($options);
    $validation = $captcha->validate($_POST);
      
    if($validation->success()) {
        $captchaMessage = 'Le formulaire a été soumis !';
    } else {
        $captchaMessage = 'Échec de la validation avec le code d\'erreur : ' . $validation->getErrorCode();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contactez-nous</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= $baseUrl; ?>/src/assets/client/css/iconcaptcha.min.css" rel="stylesheet" type="text/css">
	<link href="<?= $baseUrl; ?>/src/assets/css/contact.css" rel="stylesheet" type="text/css">

</head>
<body>
    <div class="container mt-5">
        <h2>Contactez-nous</h2>

        <?php if (isset($captchaMessage)): ?>
            <div class="alert alert-warning" role="alert">
                <?php echo $captchaMessage; ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['feedback'])): ?>
            <div class="alert alert-<?php echo $_SESSION['feedback']['type'] === 'success' ? 'success' : 'danger'; ?>" role="alert">
                <?php echo $_SESSION['feedback']['message']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['feedback']); ?>
        <?php endif; ?>

        <form id="contactForm" action="<?= $baseUrl; ?>/src/traitement_contact.php" method="post">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom:</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message:</label>
                <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
            </div>
                    
            <div class="mb-3">
                <?= \IconCaptcha\Token\IconCaptchaToken::render() ?>
                <div class="iconcaptcha-widget" data-theme="dark"></div>
            </div>

            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            <button type="submit" class="btn btn-primary" id="submit-button" disabled>Envoyer</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?= $baseUrl; ?>/src/assets/client/js/iconcaptcha.min.js" type="text/javascript"></script>

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            let captchaValidated = false;

            IconCaptcha.init('.iconcaptcha-widget', {
                general: {
                    endpoint: '<?= $baseUrl; ?>/src/captcha-request.php',
                    fontFamily: 'inherit',
                },
                security: {
                    interactionDelay: 1000,
                    hoverProtection: true,
                    displayInitialMessage: true,
                    initializationDelay: 500,
                    incorrectSelectionResetDelay: 3000,
                    loadingAnimationDuration: 1000,
                },
                locale: {
                    initialization: {
                        verify: 'Êtes-vous un robot?...',
                        loading: 'Chargement du défi...',
                    },
                    header: 'Sélectionnez une des images affichées le <u>moins</u> de fois',
                    correct: 'BRAVO! Vérification terminée.',
                    incorrect: {
                        title: 'Oups!',
                        subtitle: 'Vous avez sélectionné la mauvaise image.'
                    },
                    timeout: {
                        title: 'Veuillez patienter.',
                        subtitle: 'Vous avez fait trop de sélections incorrectes.'
                    }
                }
            }).bind('success', function(e) {
                captchaValidated = true;
                checkFormAndCaptcha();
            }).bind('reset', function(e) {
                captchaValidated = false;
                checkFormAndCaptcha();
            });

            const form = document.getElementById('contactForm');
            form.addEventListener('input', checkFormAndCaptcha);

            function checkFormAndCaptcha() {
                const isFormValid = form.checkValidity();
                document.getElementById('submit-button').disabled = !(isFormValid && captchaValidated);
            }
        });
    </script>
</body>
</html>
