<section class="login">
    <form method="post" action="<?php echo $webroot; ?>/">
        <section>
            <label>Benutzer</label>
            <input name="lusername" required autofocus/>
        </section>
        <section>
            <label>Passwort</label>
            <input name="lpw" type="password" required/>
        </section>
        <section class="register">
            <a href="<?php echo $webroot; ?>/anmelden.php">Registrieren.</a>
        </section>
        <input type="submit" value="Einloggen">
    </form>
</section>