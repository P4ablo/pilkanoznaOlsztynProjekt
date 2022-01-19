<?php
session_start();
?>
<?php
include "cfg.php";
include "funkcje.php";
$userLogin = $_POST['login'];
$userPassword = $_POST['haslo'];

if ($link) {
    $loginClear = htmlspecialchars($userLogin);

    $query = "SELECT * FROM uzytkownicy WHERE Login='$loginClear' AND Haslo='$userPassword' AND status=1 LIMIT 1;";
    $result = $link->query($query);
    $row = $result->fetch_assoc();

    if (empty($row['idUzytkownicy'])) {
        echo '<H1>Dane są nieprawidłowe</H1>';
    }
    if ($row['idUzytkownicy']) {

        $idUzytkownika = $row['idUzytkownicy'];
        $log = $row['Login'];
        $pass = $row['Haslo'];
        $type = $row['Typ'];
    }
    mysqli_close($link);
    if ($userLogin == $log && $userPassword == $pass) {
        $_SESSION["id"] = $idUzytkownika;
        $_SESSION["login"] = $log;
        $_SESSION["type"] = $type;

    }

    if ($_SESSION["login"] && $_SESSION["type"]) {
        echo "<script>window.location.href='../html/index.php';</script>";
    }

}
if (!$link) {
    return "<br>brak połączenia z bazą<br>";
}

if (!isset($_SESSION["login"])) {
    echo "<nav><a href='../html/logowanie.php'>Wróć do logowania</a></nav> ";
}

aktualizujId($_SESSION["id"]);
