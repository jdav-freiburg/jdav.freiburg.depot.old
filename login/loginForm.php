<section class="login">
    <form method="post" action="<?php echo $webroot; ?>/">
        <section>
            <legend>Benutzer</legend>
            <input name="lusername" required autofocus/>
        </section>
        <section>
            <legend>Passwort</legend>
            <input name="lpw" type="password" required/>
        </section>
        <section class="register">
            <a href="<?php echo $webroot; ?>/anmelden.php">Registrieren.</a>
        </section>
        <input type="submit" value="Einloggen">
    </form>
</section>