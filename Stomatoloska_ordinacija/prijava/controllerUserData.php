<?php 
session_start();
require "connection.php";
$email = "";
$name = "";
$errors = array();


    //ako se klikne dugme za potvrdu verifikacijskog koda
    if(isset($_POST['check'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM usertable WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['code'];
            $email = $fetch_data['email'];
            $code = 0;
            $status = 'verified';
            $update_otp = "UPDATE usertable SET code = $code, status = '$status' WHERE code = $fetch_code";
            $update_res = mysqli_query($con, $update_otp);
            if($update_res){
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                header('location: home.php');
                exit();
            }else{
                $errors['otp-error'] = "Neuspješno ažuriranje koda!";
            }
        }else{
            $errors['otp-error'] = "Unijeli ste pogrešan kod!";
        }
    }

    //ako se klikne dugme za prijavu
    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $check_email = "SELECT * FROM usertable WHERE email = '$email'";
        $res = mysqli_query($con, $check_email);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            if(password_verify($password, $fetch_pass)){
                $_SESSION['email'] = $email;
                $status = $fetch['status'];
                if($status == 'verified'){
                  $_SESSION['email'] = $email;
                  $_SESSION['password'] = $password;
                    header('location: home.php');
                }else{
                    $info = "Čini se da još uvijek niste verifikovali svoj - $email";
                    $_SESSION['info'] = $info;
                    header('location: user-otp.php');
                }
            }else{
                $errors['email'] = "Neispravan email ili lozinka!";
            }
        }else{
            $errors['email'] = "Niste član!";
        }
        $name=$fetch['name'];
        if($fetch["usertype"]=="admin"){
            $_SESSION["name"]=$name;
            header("location: adminhome.php");
        }elseif($fetch["usertype"]=="pacijent"){
            $_SESSION["name"]=$name;
            header('location: home.php');
        }elseif($fetch["usertype"]=="osoblje"){
            $_SESSION["name"]=$name;
            header("location: home.php");
        }else{
            echo "Greška";
        }
    }

    //ako se klikne nastavi dugme na zaboravljenoj sifri
    if(isset($_POST['check-email'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $check_email = "SELECT * FROM usertable WHERE email='$email'";
        $run_sql = mysqli_query($con, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE usertable SET code = $code WHERE email = '$email'";
            $run_query =  mysqli_query($con, $insert_code);
            if($run_query){
                $subject = "Password Reset Code";
                $message = "Your password reset code is $code";
                $sender = "From: medina@example.com";
                if(mail($email, $subject, $message, $sender)){
                    $info = "Poslali smo odgovor za resetiranje lozinke na vaš email - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    header('location: reset-code.php');
                    exit();
                }else{
                    $errors['otp-error'] = "Slanje koda nije uspjelo!";
                }
            }else{
                $errors['db-error'] = "Nešto je pošlo po zlu!";
            }
        }else{
            $errors['email'] = "Ova email adresa ne postoji!";
        }
    }

    //ako korisnik klikne tipku check reset otp
    if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM usertable WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['email'];
            $_SESSION['email'] = $email;
            $info = "Kreirajte novu šifru koju ne koristite na drugim stranicama.";
            $_SESSION['info'] = $info;
            header('location: new-password.php');
            exit();
        }else{
            $errors['otp-error'] = "Unijeli ste neispravan kod!";
        }
    }

    //ako se klikne dugme promjena sifre
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "Potvrdite da se lozinka ne podudara!";
        }else{
            $code = 0;
            $email = $_SESSION['email']; 
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE usertable SET code = $code, password = '$encpass' WHERE email = '$email'";
            $run_query = mysqli_query($con, $update_pass);
            if($run_query){
                $info = "Lozinka je promijenjena. Možete se prijaviti sa novom lozinkom!";
                $_SESSION['info'] = $info;
                header('Location: password-changed.php');
            }else{
                $errors['db-error'] = "Promjena lozinke nije uspjela!";
            }
        }
    }
    
   //ako se klikne dugme prijava sada
    if(isset($_POST['login-now'])){
        header('Location: login-user.php');
    }
?>