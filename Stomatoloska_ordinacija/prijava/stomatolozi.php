<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj Stomatologa | <?php echo $_SESSION['name'] ?></title>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styleadmin.css">

</head>
</head>
<body>
  <nav>
    <div class="sidebar-top">
      <span class="shrink-btn">
        <i class='bx bx-chevron-left'></i>
      </span>
    </div>

    <div class="sidebar-links">
      <div class="sidebar-footer">
        <a href="#" class="account tooltip-element" data-tooltip="0">
          <i class='bx bx-user'></i>
        </a>
        <div class="admin-user tooltip-element" data-tooltip="1">
          <div class="admin-profile hide">
            <div class="admin-info">
              <h3><?php echo $_SESSION["name"] ?></h3>
            </div>
          </div>
          <a href="logout-user.php" class="log-out">
            <i class='bx bx-log-out'></i>
          </a>
        </div>
        <div class="tooltip">
          <span class="show"><?php echo $_SESSION["name"] ?></span>
          <span>Odjava</span>
        </div>
      </div>
      <ul>
        <div class="active-tab"></div>
        <li class="tooltip-element" data-tooltip="0">
          <a href="adminhome.php" data-active="0">
            <div class="icon">
             <i class='bx bx-dashboard'></i>
             <i class='bx bxs-dashboard'></i>
            </div>
            <span class="link hide">Komandna tabla</span>
          </a>
        </li>
        <li class="tooltip-element" data-tooltip="1">
          <a href="stomatolozi.php" data-active="1">
            <div class="icon">
              <i class='bx bx-user-plus'></i>
              <i class='bx bxs-user-plus'></i>
            </div>
            <span class="link hide">Stomatolog</span>
          </a>
        </li>
        <li class="tooltip-element" data-tooltip="2">
          <a href="#" data-active="2">
            <div class="icon">
              <i class='bx bx-user-plus' ></i>
              <i class='bx bxs-user-plus' ></i>
            </div>
            <span class="link hide">Osoblje</span>
          </a>
        </li>
        <li class="tooltip-element" data-tooltip="3">
          <a href="#" data-active="3">
            <div class="icon">
            <i class='bx bx-user-circle'></i>
            <i class='bx bxs-user-circle'></i>
            </div>
            <span class="link hide">Pacijenti</span>
          </a>
        </li>
        <li class="tooltip-element" data-tooltip="0">
          <a href="#" data-active="4">
            <div class="icon">
            <i class='bx bx-calendar'></i>
            <i class='bx bxs-calendar'></i>
            </div>
            <span class="link hide">Raspored</span>
          </a>
        </li>
        <li class="tooltip-element" data-tooltip="1">
          <a href="#" data-active="5">
            <div class="icon">
              <i class='bx bx-notepad'></i>
              <i class='bx bxs-notepad'></i>
            </div>
            <span class="link hide">Lista termina</span>
          </a>
        </li>
        <li class="tooltip-element" data-tooltip="2">
          <a href="#" data-active="6">
            <div class="icon">
              <i class='bx bx-edit'></i>
              <i class='bx bxs-edit'></i>
            </div>
            <span class="link hide">Recepti</span>
          </a>
        </li>
        <li class="tooltip-element" data-tooltip="2">
          <a href="#" data-active="7">
            <div class="icon">
               <i class='bx bx-clipboard'></i>
               <i class='bx bxs-clipboard'></i>
            </div>
            <span class="link hide">Tretmani</span>
          </a>
        <div class="tooltip">
          <span class="show">Komandna tabla</span>
          <span>Stomatolog</span>
          <span>Osoblje</span>
          <span>Pacijenti</span>
          <span>Raspored</span>
          <span>Lista termina</span>
          <span>Recepti</span>
          <span>Tretmani</span>
        </div>
      </ul>
    </div>
  </nav>

  <main>
  <h1>Sistem za stomatološku ordinaciju</h1>
        <div>
          <a href="dodaj_stomatologa.php" class="btn btn-primary" id="dugme">Dodaj novog stomatologa</a>
            <table class="table">
              <thead class="thead-dark">
                <tr> 
                    <th scope="col">Slika</th>
                    <th scope="col">Ime i prezime</th>
                    <th scope="col">Datum rodjenja</th>
                    <th scope="col">Specijalnost</th>
                    <th scope="col">Obrazovanje</th>
                    <th scope="col">Spol</th>
                    <th scope="col">Kontakt</th>
                    <th scope="col">Adresa</th>
                    <th scope="col">Email</th>
                    <?php 
                       echo "<th></th>";
                       echo "<th></th>";
                    ?>
                </tr>
                </thead>
                <?php 
                    $conn = new mysqli("localhost", "root", "", "stomatoloska_ordinacija");
                    $query = "SELECT fullname, birthdate, address, gender, contact_number, email, degree, doctor_speciality, upload_image
                     FROM `dentists`";
                    $res = $conn->query($query);

                    while ($stomatolog = $res->fetch_assoc()) {
                ?>
                    <tbody>
                       <tr>
                            <input type="hidden" value="<?php echo $stomatolog['DentistId'] ?>">
                            <td><?php echo $stomatolog['upload_image'] ?></td>
                            <td><?php echo $stomatolog['fullname'] ?></td>
                            <td><?php echo $stomatolog['birthdate'] ?></td>
                            <td><?php echo $stomatolog['doctor_speciality'] ?></td>
                            <td><?php echo $stomatolog['degree'] ?></td>
                            <td><?php echo $stomatolog['gender'] ?></td>
                            <td><?php echo $stomatolog['contact_number'] ?></td>
                            <td><?php echo $stomatolog['address'] ?></td>
                            <td><?php echo $stomatolog['email'] ?></td>
                            <td><a id="izmjenaBtn" class="btn btn-primary">Izmjena</a></td>
                            <td><button id="brisanjeBtn" class="btn btn-danger">Brisanje</button></td>
                        </tr>
                      <?php } ?> 
                    </tbody>
            </table>
        </div>
  </main>
  <script>
        document.getElementById('izmjenaBtn').onclick = function() {
           window.open('stomatolog_izmjena.php', '_blank');
        };
        var brisanjeBtns = document.querySelectorAll('.brisanjeBtn');
        brisanjeBtns.forEach(function(btn) {
            btn.addEventListener('click', function() {
               var DentistId = this.getAttribute('data-id');
               if (confirm("Jeste li sigurni da želite izbrisati stomatologa?")) {
                  window.location.href = "stomatolog_brisanje.php?DentistId=" + DentistId;
                }
            });
         });
    </script>
    <script src="main.js"></script>
</body>
</html>