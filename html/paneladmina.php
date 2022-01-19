<?php
session_start();
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
if ($_SESSION['login'] == '') {
    echo '<a href="../html/logowanie.php">Logowanie</a>';
} elseif ($_SESSION['type'] == '5') {
    echo '<a href="../html/paneladmina.php">' . $_SESSION["login"] . '</a>';
    echo '<a href="../php/logout.php">' . 'Wyloguj' . '</a>';
} elseif ($_SESSION['type'] == '1') {
    echo '<a href="../html/panelUzytkownika.php">' . $_SESSION["login"] . '</a>';
    echo '<a href="../php/logout.php">' . 'Wyloguj' . '</a>';

}
?>
    </nav>

    <h1 class="h1Admin">Panel Administratora</h1>
    <div class="przyciskAdmin">
        <a href="dodajPost.php"><button class="button">Dodaj Post</button></a><br>
        <a href="zarzadzanieTabela.php"><button class="button">Tabela</button></a><br>
        <a href="zarzadzanieHistoria.php"><button class="button">Historia</button></a><br>
        <a href="zarzadzanieDruzynami.php"><button class="button">Zarządzanie Drużynami</button></a><br>
        <a href="zarzadzanieUzytkownikiem.php"><button class="button">Zarządzaj Użytkownikiem</button></a><br>
    </div>
</body>