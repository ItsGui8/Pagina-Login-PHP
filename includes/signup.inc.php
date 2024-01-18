<?php
    if(isset($_POST["signup-submit"])) {
        require "dbh.inc.php";

        $email = $_POST["email-signup"];
        $password = $_POST["password-signup"];
        $passwordRepeat = $_POST["password-signup-repeat"];

        if (empty($email) || empty($password) || empty($passwordRepeat)) {
            header("Location: ../signup.php?error=emptyfields&email=".$email);
            exit();
        }
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../signup.php?error=invalidemail");
            exit();
        }
        else if ($password !== $passwordRepeat) {
            header("Location: ../signup.php?error=passwordcheck&email=".$email);
            exit();
        }
        else {
            $sql = "SELECT emailUsers FROM users WHERE emailUsers=?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../signup.php?error=sqlerror");
                exit();
            } 
            else {
                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);
                if ($resultCheck > 0) {
                    header("Location: ../signup.php?error=emailtaken");
                    exit();
                }
                else {
                    $sql = "INSERT INTO users(emailUsers, passwordUsers) VALUES(?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            header("Location: ../signup.php?error=sqlerror");
                            exit();
                        }
                        else {
                            $hashPassword = password_hash($password, PASSWORD_DEFAULT);
                            mysqli_stmt_bind_param($stmt, "ss", $email, $hashPassword);
                            mysqli_stmt_execute($stmt);
                            header("Location: ../signup.php?signup=success");
                            exit();
                        }
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    else {
        header("Location: ../signup.php");
        exit();
    }