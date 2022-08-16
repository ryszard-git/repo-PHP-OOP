<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $_SESSION['pageTitle'] ?></title>
        <link rel="stylesheet" href="View/templates/CSS/style.css">
    </head>
    <body>
        <div class="header-box"><?= $_SESSION['headerContent'] ?></div>
        <div class="menu-box"><?= $_SESSION['menuContent'] ?></div>
        <div class="content-box"><?= $_SESSION['pageContent'] ?></div>
        <div class="message-box"><?= $_SESSION['messageContent'] ?></div>
        <div class="footer-box"><?= $_SESSION['footerContent'] ?></div>
    </body>
</html>