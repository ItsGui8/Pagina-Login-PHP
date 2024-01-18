<?php
    require "header.php"
?>

    <main>
        <div>
            <section>
                <h1>Signup</h1>
                <form action="includes/signup.inc.php" method="post">
                    <input type="text" name="email-signup" placeholder="E-mail">
                    <input type="password" name="password-signup" placeholder="Password">
                    <input type="password" name="password-signup-repeat" placeholder="Repeat Password">
                    <button type="submit" name="signup-submit">Signup</button>
                </form>
            </section>
        </div>
    </main>

<?php

?>