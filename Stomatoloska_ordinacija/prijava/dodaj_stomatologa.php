<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>NOVI STOMATOLOZI</title>
    <style>
       @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
        body {
            background-color: #e4e2f5;
            padding-top: 20px;
        }

        .container {
            max-width: 500px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        #submitBtn:disabled {
            background-color: #6c757d;
            cursor: not-allowed;
        }
        .return-btn {
            position: absolute;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
        }
        h3{
          text-align: center;
        }

    </style>
</head>
<body>
<h3>Dodaj stomatologa</h3>
<form class="container mt-5" action="stomatolog_dodaj_request.php" method="post">

<div class="form-row">
    <div class="form-group col-md-6">
        <label for="ime">Ime i prezime:</label>
        <input class="form-control" id="ime" type="text" name="fullname" placeholder="Unesite puno ime i prezime" required>
    </div>

    <div class="form-group col-md-6">
        <label for="datumRodjenja">Datum rođenja:</label>
        <input class="form-control" id="datumRodjenja" type="date" name="birthdate" required>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <label for="adresa">Adresa:</label>
        <input class="form-control" id="adresa" type="text" name="address" placeholder="Unesite adresu..." required>
    </div>

    <div class="form-group col-md-6">
        <label for="spol">Spol:</label>
        <select class="form-control" id="spol" name="gender">
            <option value="muski">Muški</option>
            <option value="zenski">Ženski</option>
        </select>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <label for="brojTelefona">Broj telefona:</label>
        <input class="form-control" id="brojTelefona" type="text" name="contact_number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" placeholder="Unesite broj telefona" required>
    </div>

    <div class="form-group col-md-6">
        <label for="email">Email:</label>
        <input class="form-control" id="email" type="email" name="email" placeholder="Unesite email" required>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <label for="obrazovanje">Obrazovanje:</label>
        <input class="form-control" id="obrazovanje" type="text" name="degree" placeholder="Unesite nivo obrazovanja" required>
    </div>

    <div class="form-group col-md-6">
        <label for="specijalizacija">Specijalizacija:</label>
        <input class="form-control" id="specijalizacija" type="text" name="doctor_speciality" placeholder="Unesite specijalizaciju" required>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <label for="sifra">Šifra:</label>
        <input class="form-control" id="sifra" type="password" name="password" placeholder="Unesite šifru" required>
    </div>

    <div class="form-group col-md-6">
        <label for="PotvrdaSifra">Potvrda šifre:</label>
        <input class="form-control" id="PotvrdaSifra" type="password" name="confirm_password" placeholder="Potvrdite unesenu šifru" required>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-12">
        <label for="slika">Izaberite sliku:</label>
        <input type="file" id="slika" name="upload_image" accept="image/*">
    </div>
</div>

<div class="form-group">
    <input id="submitBtn" class="btn btn-primary" type="submit" value="DODAJ">
</div>
</form>

<a href="stomatolozi.php" class="btn btn-secondary return-btn">Vrati se na glavnu stranicu!</a>

    
    <script>
        const imeInput = document.getElementById("ime");
        const datumRodjenjaInput = document.getElementById("datumRodjenja");
        const brojTelefonaInput = document.getElementById("brojTelefona");
        const adresaInput = document.getElementById("adresa");
        const emailInput = document.getElementById("email");
        const obrazovanjeInput = document.getElementById("obrazovanje");
        const specijalizacijaInput = document.getElementById("specijalizacija");
        const sifraInput = document.getElementById("sifra");
        const potvrdaSifraInput = document.getElementById("PotvrdaSifra");
        const submitBtn = document.getElementById("submitBtn");
        
        function enableSubmit() {
            const requiredFields = [
                imeInput, datumRodjenjaInput, brojTelefonaInput,
                adresaInput, emailInput, obrazovanjeInput,
                specijalizacijaInput, sifraInput, potvrdaSifraInput
            ];

            const isValid = requiredFields.every(field => field.value.trim().length > 0);

            if (isValid) {
                submitBtn.removeAttribute("disabled");
            } else {
                submitBtn.setAttribute("disabled", "disabled");
            }
        }  

        requiredFields.forEach(field => field.addEventListener("input", enableSubmit));
    </script>
</body>
</html>
