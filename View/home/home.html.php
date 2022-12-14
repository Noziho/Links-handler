<div class="container">
    <?php
    if (!isset($_SESSION['user'])) { ?>
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
    else {?>
        <h1>EEEEEEEEEEE LOGED</h1> <?php
    }
    ?>

</div>