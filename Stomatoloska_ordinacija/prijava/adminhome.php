<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $_SESSION['name'] ?> | Home</title>
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'> 
  <link rel="stylesheet" href="styleadmin.css">
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
        <li class="tooltip-element inactive" data-tooltip="0">
          <a href="adminhome.php" data-active="0">
            <div class="icon">
             <i class='bx bx-dashboard'></i>
             <i class='bx bxs-dashboard'></i>
            </div>
            <span class="link hide">Komandna tabla</span>
          </a>
        </li>
        <li class="tooltip-element" data-tooltip="1">
          <a href="stomatolozi.php" class="active" data-active="1">
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
        </li>
        <li class="tooltip-element" data-tooltip="2">
          <a href="#" data-active="7">
            <div class="icon">
               <i class='bx bx-clipboard'></i>
               <i class='bx bxs-clipboard'></i>
            </div>
            <span class="link hide">Inventar</span>
          </a>
        </li>
        <div class="tooltip">
          <span class="show">Komandna tabla</span>
          <span>Stomatolog</span>
          <span>Osoblje</span>
          <span>Pacijenti</span>
          <span>Raspored</span>
          <span>Lista termina</span>
          <span>Recepti</span>
          <span>Tretmani</span>
          <span>Inventar</span>
        </div>
      </ul>
    </div>

   
  </nav>


  <main>
    <h1>Sistem za stomatološku ordinaciju</h1>
    <p class="copyright">
      &copy; 2023 - <span>Stomatološka ordinacija</span> All Rights Reserved.
    </p>
  </main>

  <script src="main.js"></script>
</body>
</html>
