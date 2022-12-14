<?php
if (isset($_SESSION['error'])) {?>
    <div class="error"><?= $_SESSION['error'] ?></div><?php
    unset($_SESSION['error']);
}
if (isset($_SESSION['success'])) {?>
    <div class="success"><?= $_SESSION['success'] ?></div><?php
    unset($_SESSION['success']);
}

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Links-handler</title>
</head>
<body>
<header>
    <h1><a href="/?c=home">Links handler</a></h1>
    <?php
        if (isset($_SESSION['user'])) {?>
            <a href="/?c=user&a=logout">Déconnexion</a><?php
    }
    ?>
</header>

<main><?= $html ?></main>

<script src="/build/js/app-bundle.js"></script>
</body>
</html>
