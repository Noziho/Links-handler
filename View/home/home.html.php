<?php
    if (isset($data['user'])) {
        $user = $data['user'];
    }
?>

<div class="container">
    <?php
    if (isset($_SESSION['user'])) { ?>
        <div class="utilsContainer">
            <div class="addLinksContainer">
                <button id="addLinks">+</button><span>Ajoutez un lien</span>
            </div>

            <form class="formAddLinks" action="/?c=links&a=addLinks" method="post" enctype="multipart/form-data">
                <div>
                    <label for="linkTitle">Titre du lien: </label>
                    <input type="text" name="linkTitle" id="linkTitle" minlength="4" max="20">
                </div>

                <div>
                    <label for="link">Lien complet: </label>
                    <input type="text" name="link" id="link" minlength="4" max="250">
                </div>

                <div>
                    <label for="linkImg">Image du lien (miniature): </label>
                    <input type="file" name="linkImg" id="linkImg">
                </div>

                <div>
                    <input type="submit" name="submit" value="Ajouter">
                </div>
            </form>

            <div>
                <a href="/?c=user&a=profil&id=<?= $_SESSION['user']->id ?>">Profil</a>
            </div>
        </div>

        <div class="linksContainer">
            <?php
            foreach (array_reverse($user->ownLinksList) as $link) {?>
                <div class="link">
                    <div class="imgLinkContainer">
                        <img class="imgLink" src="/img/<?= $link->link_image_name ?>.<?= $link->link_image_extension ?>" alt="Image links">
                    </div>
                    
                    <div>
                        <a href="<?= $link->link ?>" target="_blank"><?= $link->link_title ?></a>
                    </div>
                </div>

                <?php
            }?>
        </div><?php
    }
    else { ?>
        <p id="intro">Pour accéder au links handler veuillez vous inscrire puis vous connectez. </p>
        <div id="loginRegisterContainer">
            <div id="containerRegister">
                <form action="/?c=user&a=register" method="post">
                    <h2>Inscription</h2>
                    <div>
                        <label for="email">Adresse mail: </label>
                        <input type="text" name="email" id="email" minlength="6" maxlength="150" required>
                    </div>

                    <div>
                        <label for="password">Mot de passe: </label>
                        <input type="password" name="password" id="password" minlength="8" maxlength="50" required>
                    </div>

                    <div>
                        <label for="password_repeat">Répéter mot de passe: </label>
                        <input type="password" name="password_repeat" id="password_repeat" required>
                    </div>
                    <input type="submit" name="submit" value="S'inscrire">
                </form>
            </div>

            <div id="containerLogin">
                <form action="/?c=user&a=login" method="post">
                    <h2>Connexion</h2>
                    <div>
                        <label for="email">Adresse mail: </label>
                        <input type="text" name="email" id="email" minlength="6" maxlength="150" required>
                    </div>

                    <div>
                        <label for="password">Mot de passe: </label>
                        <input type="password" name="password" id="password" minlength="8" maxlength="50" required>
                    </div>
                    <input type="submit" name="submit" value="Se connecter">
                </form>
            </div>
        </div><?php
    }
    ?>

</div>