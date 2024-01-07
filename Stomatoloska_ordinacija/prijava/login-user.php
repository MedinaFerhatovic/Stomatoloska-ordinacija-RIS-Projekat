<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Prijava</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <form action="login-user.php" method="POST" autocomplete="">
                    <h2 class="text-center">Prijava</h2>
                    <p class="text-center">Prijavite se sa svojim email-om i lozinkom.</p>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email adresa" required value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Lozinka" required>
                    </div>
                    <div class="link forget-pass text-left"><a href="forgot-password.php">Zaboravljena lozinka?</a></div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="login" value="Prijava">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="title-container">
        <h2 class="text-center">Sistem za stomatološku ordinaciju</h2>
    </div>
</body>
</html>