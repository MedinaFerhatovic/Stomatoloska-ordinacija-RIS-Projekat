<?php
session_start();

if (
    !isset($_POST['fullname']) ||
    !isset($_POST['birthdate']) ||
    !isset($_POST['address']) ||
    !isset($_POST['gender']) ||
    !isset($_POST['contact_number']) ||
    !isset($_POST['email']) ||
    !isset($_POST['degree']) ||
    !isset($_POST['doctor_speciality']) ||
    !isset($_POST['password']) ||
    !isset($_POST['confirm_password']) ||
    !isset($_POST['upload_image'])
) {
    echo "Nesto nije setovano.";
    die();
}

$conn = new mysqli("localhost", "root", "", "stomatoloska_ordinacija");

$imePrezime = mysqli_real_escape_string($conn, htmlspecialchars($_POST['fullname']));
$datumRodjenja = mysqli_real_escape_string($conn, htmlspecialchars($_POST['birthdate']));
$adresa = mysqli_real_escape_string($conn, htmlspecialchars($_POST['address']));
$spol = mysqli_real_escape_string($conn, htmlspecialchars($_POST['gender']));
$brojTelefona = mysqli_real_escape_string($conn, htmlspecialchars($_POST['contact_number']));
$email = mysqli_real_escape_string($conn, filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
$obrazovanje = mysqli_real_escape_string($conn, htmlspecialchars($_POST['degree']));
$specijalizacija = mysqli_real_escape_string($conn, htmlspecialchars($_POST['doctor_speciality']));
$hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$hashed_cpassword = password_hash($_POST['confirm_password'], PASSWORD_DEFAULT);
// Prijenos slike
$targetDirectory = "image/*";
$targetFile = $targetDirectory . basename($_FILES["upload_image"]["name"]);

// Ako je sve u redu, pokušaj prenijeti datoteku
if (move_uploaded_file($_FILES["upload_image"]["tmp_name"], $targetFile)) {
    echo "Datoteka " . basename($_FILES["upload_image"]["name"]) . " je uspješno prenesena.";
} else {
    echo "Došlo je do pogreške prilikom prijenosa datoteke.";
}



$queryDentists = "
    INSERT INTO `dentists` 
    (`fullname`, `birthdate`, `address`, `gender`, `contact_number`, `email`, `degree`, `doctor_speciality`, `upload_image` )
    VALUES
    ('$imePrezime', '$datumRodjenja', '$adresa', '$spol', '$brojTelefona', '$email', '$obrazovanje', '$specijalizacija', '$targetFile')
";

$resDentists = $conn->query($queryDentists);


if ($resDentists) {
    $queryUsertable = "
        INSERT INTO `usertable` 
        (`name`, `email`, `password`)
        VALUES
        ('$imePrezime', '$email', '$hashed_password')
    ";
    $resUsertable = $conn->query($queryUsertable);
    if ($resUsertable) {
        echo "Stomatolog uspješno dodan u bazu podataka.";
    } else {
        echo "Greška prilikom dodavanja stomatologa u usertable: " . $conn->error;
    }
} else {
    echo "Greška prilikom dodavanja stomatologa u dentists: " . $conn->error;
}

if ($resDentists) {
    header("Location: stomatolozi.php");
} else {
    echo "Doslo je do greške prilikom dodavanja stomatologa.";
    die();
}
?>