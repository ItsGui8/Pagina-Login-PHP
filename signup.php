<?php
    require "header.php"
?>

    <main>
        <div>
            <section>
                <h1>Signup</h1>
                <?php 
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "emptyfields") {
                            echo "<p>Fill in all fields!</p>";
                        }
                        else if ($_GET["error"] == "invalidemail") {
                            echo "<p>Invalid e-mail!</p>";
                        }
                        else if ($_GET["error"] == "passwordcheck") {
                            echo "<p>Yor passwords do not match!</p>";
                        }
                        else if ($_GET["error"] == "usertaken") {
                            echo "<p>This username is already taken!</p>";
                        }
                    }
                    else if ($_GET["signup"] == "success") {
                        echo "<p>Signup successful</p>";
                    }
                ?>
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