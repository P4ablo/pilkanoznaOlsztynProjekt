<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piłka Olsztyn - Witamy</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <a href="#" class="logo"><h1>pilkaolsztyn.pl</h1></a>
 <nav>
        <a href="../html/index.php">Strona Główna</a>
        <a href="../html/aktualnosci.php">Aktualności</a>
        <a href="../html/tabela.php">Tabela</a>
        <a href="../html/historia.php">Historia</a>
        <a href="../html/kontakt.php">Kontakt</a>
       <?php
        if ($_SESSION['login'] == ''){
        echo '<a href="../html/logowanie.php">Logowanie</a>';
        }
        elseif($_SESSION['type'] == '5')
        {
            echo '<a href="../html/paneladmina.php">'. $_SESSION["login"] .'</a>';
			echo '<a href="../php/logout.php">'. 'Wyloguj' .'</a>';
        }
        elseif($_SESSION['type'] == '1')
        {
            echo '<a href="../html/panelUzytkownika.php">'. $_SESSION["login"] .'</a>';
            echo '<a href="../php/logout.php">'. 'Wyloguj' .'</a>';
			
        }
       ?>
    </nav>

    <div class="adminKontakt">
        <h3>Administratorzy Serwisu</h3>
        <p>E-mail: pilkaolsztyn@gmail.com</p>
        <p>Telefon: 123456789</p>
    </div>

    <div class="wynajemKontakt">
        <h3>Osoby zajmujące się wynajmem boiska</h3>
        <h4>OSIR Olsztyn</h4>
        <p>E-mail: osir.olsztyn@wp.pl</p>
        <p>Telefon: 987654321</p>
        <h4>Kortowo boiska</h4>
        <p>E-mail: kortowo.boiska@gmail.com</p>
        <p>Telefon: 543671238</p>
    </div>

    <div class="sedziowieKontakt">
        <h3>Sędziowie</h3>
        <h4>Andrzej</h4>
        <p>Telefon: 912478345</p>
        <h4>Urszula</h4>
        <p>Telefon: 604123654</p>
        <h4>Jarek</h4>
        <p>Telefon: 871256951</p>
    </div>
</body>