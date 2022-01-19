<?php
//funkcja wyświetlająca aktualnosci na stronie głównej
function pokazAktualnosci($limit)
{

    include "cfg.php";

    if ($link) {
        $query = "SELECT * FROM aktualnosci ORDER BY `idAktualnosci` DESC LIMIT $limit  ";
        $result = $link->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                echo "<div class='news'>";
                echo $row["Zawartosc"];
                echo "</div>";

            }
        } else {
            echo "0 results";
        }
        mysqli_close($link);
    }
    if (!$link) {
        return "<br>brak połączenia z bazą<br>";
    }

}

//funkcja wyświetlająca tabele na stronie tabele
function pokazTabeleDruzyn()
{
    include "cfg.php";
    if ($link) {
        $query = "SELECT * FROM druzyny LIMIT 100;";
        $result = $link->query($query);
        if ($result->num_rows > 0) {
            echo ("<table class='tabela-druzyny'>");
            echo ("<tr><th>Lp.</th><th>Drużyna</th><th>M.</th><th>Pkt.</th><th>Z.</th><th>R.</th><th>P.</th><th>Bramki.</th></tr>");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["Lp"] . "</td>";
                echo "<td>" . $row["Druzyna"] . "</td>";
                echo "<td>" . $row["Mecze"] . "</td>";
                echo "<td>" . $row["Punkty"] . "</td>";
                echo "<td>" . $row["Zwyciestwa"] . "</td>";
                echo "<td>" . $row["Remisy"] . "</td>";
                echo "<td>" . $row["Porazki"] . "</td>";
                echo "<td>" . $row["Bramki"] . "</td>";
                echo "</tr>";
            }
            echo ("</table>");
        } else {
            echo "0 results";
        }
        mysqli_close($link);
    }
    if (!$link) {
        return "<br>brak połączenia z bazą<br>";
    }

}
function pokazTabeleStrzelcow()
{
    include "cfg.php";
    if ($link) {
        $query = "SELECT * FROM strzelcy ORDER BY gole desc LIMIT 10;";
        $result = $link->query($query);
        if ($result->num_rows > 0) {
            echo ("<table class='tabela-druzyny'>");
            echo ("<tr><th>Lp.</th><th>Imie</th><th>Nazwisko</th><th>Gole</th></tr>");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["Lp."] . "</td>";
                echo "<td>" . $row["Imie"] . "</td>";
                echo "<td>" . $row["Nazwisko"] . "</td>";
                echo "<td>" . $row["Gole"] . "</td>";
                echo "</tr>";
            }
            echo ("</table>");
        } else {
            echo "0 results";
        }
        mysqli_close($link);
    }
    if (!$link) {
        return "<br>brak połączenia z bazą<br>";
    }

}

//funkcja wyświetlająca historie na stronie historie
function pokazHistorie()
{

    include "cfg.php";

    if ($link) {
        $query = "SELECT * FROM historia_druzyn LIMIT 100;";
        $result = $link->query($query);
        if ($result->num_rows > 0) {
            echo ("<div class='zwyciezcyHistoria'>");
            echo "<h2>Zwyciężcy z poprzednich lat</h2>";
            while ($row = $result->fetch_assoc()) {
                echo "<p>";
                echo $row["Sezon"];
                echo " ";
                echo $row["Druzyna"];
                echo "</p>";
            }
            echo ("</div>");
        } else {
            echo "0 results";
        }

        $query = "SELECT * FROM historia_strzelcow LIMIT 100;";
        $result = $link->query($query);
        echo ("<div class='strzelcyHistoria'>");
        echo "<h2>Najlepsi strzelcy</h2>";
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                echo "<p>";
                echo $row["Sezon"];
                echo " ";
                echo $row["Pilkarz"];
                echo "</p>";
            }
            echo ("</div>");
        } else {
            echo "0 results";
        }

        mysqli_close($link);
    }
    if (!$link) {
        return "<br>brak połączenia z bazą<br>";
    }

}
//funkcja wyświetlająca najbliższe spotkania
function pokazNajblizszeSpotkania()
{

    include "cfg.php";
    if ($link) {
        $query = "SELECT * FROM kalendarz WHERE Data>= NOW() ORDER BY Data ASC LIMIT 10;";
        $result = $link->query($query);
        if ($result->num_rows > 0) {
            echo ("<table class='tabela-druzyny'>");
            echo ("<tr><th>Drużyna 1</th><th>Drużyna 2</th><th>Data i godzina</th></tr>");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["Druzyna_a"] . "</td>";
                echo "<td>" . $row["Druzyna_b"] . "</td>";
                echo "<td>" . $row["Data"] . "</td>";
                echo "</tr>";
            }
            echo ("</table>");
        } else {
            echo "0 results";
        }
        mysqli_close($link);
    }
    if (!$link) {
        return "<br>brak połączenia z bazą<br>";
    }

}

//funkcja wyświetlająca dane piłkarza
function pokazDanePilkarza($id)
{

    include "cfg.php";
    if ($link) {
        $query = "SELECT * FROM pilkarz WHERE Uzytkownicy_idUzytkownicy='$id'  LIMIT 1;";
        $result = $link->query($query);
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                echo "<p>Imię: " . $row['Imie'] . "</p>";
                echo "<p>Nazwisko: " . $row['Nazwisko'] . "</p>";
                echo "<p>Adres E-mail: " . $row['Email'] . "</p>";
                echo "<p>Drużyna: " . $row['Druzyna'] . "</p>";
                echo "<p>Pozycja: " . $row['Pozycja'] . "</p>";
                echo "<p>Numer: " . $row['Numer'] . "</p>";
                echo "<p>Wzrost: " . $row['Wzrost'] . "</p>";
                echo "<p>Waga: " . $row['Waga'] . "</p>";
                echo "<p>Preferowana noga: " . $row['Preferowana_noga'] . "</p>";
            }

        } else {
            echo "Uzupełnij Dane";
        }
        mysqli_close($link);
    }
    if (!$link) {
        return "<br>brak połączenia z bazą<br>";
    }

}

//Admin Panel

//Dodaj post
function dodajPost()
{
    include "cfg.php";

    echo '<form method="POST" action="' . $_SERVER['REQUEST_URI'] . '">     <textarea class="postDodajPost" name="dodajPost" placeholder="Dodaj post..."></textarea>     <br><br>     <input class="guzikDodajPost" type="submit" value="Dodaj"></form>';
    $content = $_POST['dodajPost'];
    $insertQuery = "INSERT INTO `aktualnosci`(`Zawartosc`) VALUES ('$content');";

    if ($content) {
        if ($link->query($insertQuery) === true) {
            echo "Record added successfully";
            echo "<script>window.location.href='../html/aktualnosci.php';</script>";
        } else {
            echo "Error adding record: " . $conn->error;
        }
    }

    mysqli_close($link);
}
//Zarządzaj tabelą
// Dodaj
function dodajTabela()
{
    include "cfg.php";

    echo "<form method='POST'  name='addTeam' enctype='multipart/form-data' action=" . $_SERVER['REQUEST_URI'] . ">";
    echo ('<table class="tabela">
        <tr>
            <th>Lp.</th>
            <th>Drużyna</th>
            <th>M.</th>
            <th>Pkt.</th>
            <th>Z.</th>
            <th>R.</th>
            <th>P.</th>
            <th>Bramki</th>
        </tr>');
    echo ('
        <tr>
        <td>  <input type="number" name="1"/> </td>
        <td>  <input type="text"  name="2"/> </td>
        <td>  <input type="number"  name="3"/> </td>
        <td>  <input type="number"  name="4"/> </td>
        <td>  <input type="number"  name="5"/> </td>
        <td>  <input type="number" name="6"/> </td>
        <td>  <input type="number" name="7"/> </td>
        <td>  <input type="number" name="8"/> </td>
        </tr>
        ');
    echo "</table>";
    echo '<button type="submit" class="btnDodaj">Dodaj</button>';
    echo '</form>';
    $a = $_POST['1'];
    $b = $_POST['2'];
    $c = $_POST['3'];
    $d = $_POST['4'];
    $e = $_POST['5'];
    $f = $_POST['6'];
    $g = $_POST['7'];
    $h = $_POST['8'];

    $insertQuery = "INSERT INTO `druzyny` VALUES ('NULL',$a,'$b',$c,$d,$e,$f,$g,$h,'NULL');";
    if ($a) {
        if ($link->query($insertQuery) === true) {
            echo "Record added successfully";
            echo "<script>window.location.href='../html/zarzadzanieTabela.php';</script>";
        } else {
            echo "Error adding record: " . $conn->error;
        }
    }

    mysqli_close($link);
}
// Usun
function usunTabela()
{
    include "cfg.php";

    $query = "SELECT * FROM druzyny ORDER BY Lp  LIMIT 100;";
    $result = $link->query($query);
    if ($result->num_rows > 0) {
        echo ("<table class='tabela'>");
        echo ("<tr><th>Lp.</th>
        <th>Drużyna</th>
        <th>Opcja</th>
        </tr>");
        while ($row = $result->fetch_assoc()) {
            echo "<form method='POST'  name='deleteForm' enctype='multipart/form-data' action='" . $_SERVER['REQUEST_URI'] . "'>";
            echo "<tr>";
            echo "<td>" . $row['Lp'] . "</td>";
            echo "<td>" . $row['Druzyna'] . "</td>";
            echo "<td><button type='submit' class='btnUsun'>Usuń</button></td>";
            echo "</tr>";
            echo "<input type = 'hidden' name = 'deletepageId' value = '$row[idDruzyny]' /></form>";
        }
        echo ("</table>");
    }

    $id = $_POST['deletepageId'];
    $deleteQuery = "DELETE FROM `druzyny` WHERE `idDruzyny`='$id' LIMIT 1;";
    if ($id) {
        if ($link->query($deleteQuery) === true) {
            echo "Record deleted successfully";
            echo "<script>window.location.href='../html/zarzadzanieTabela.php';</script>";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }

    mysqli_close($link);
}
// Edytuj
function edytujTabela()
{
    include "cfg.php";

    echo ' <table class="tabela">
    <tr>
    <th>Lp.</th>
    <th>Drużyna</th>
    <th>M.</th>
    <th>Pkt.</th>
    <th>Z.</th>
    <th>R.</th>
    <th>P.</th>
    <th>Bramki</th>
    <th>Opcja</th>
    </tr>';
    $query = "SELECT * FROM druzyny ORDER BY Lp LIMIT 100;";
    $result = $link->query($query);
    while ($row = $result->fetch_assoc()) {
        echo "<form method='POST'  name='editTable' enctype='multipart/form-data' action='" . $_SERVER['REQUEST_URI'] . "'>";
        echo "<tr><td><input type 'number' name='1' value='" . $row["Lp"] . "'></td>";
        echo "<td><input type 'text' name='2' value='" . $row["Druzyna"] . "'></td>";
        echo "<td><input type 'number' name='3' value='" . $row["Mecze"] . "'></td>";
        echo "<td><input type 'number' name='4' value='" . $row["Punkty"] . "'></td>";
        echo "<td><input type 'number' name='5' value='" . $row["Zwyciestwa"] . "'></td>";
        echo "<td><input type 'number' name='6' value='" . $row["Remisy"] . "'></td>";
        echo "<td><input type 'number' name='7' value='" . $row["Porazki"] . "'></td>";
        echo "<td><input type 'number' name='8' value='" . $row["Bramki"] . "'></td>";
        echo "<input type = 'hidden' name = 'editteamId' value = '$row[idDruzyny]' />";
        echo '<td><button type="submit" class="btnEdytuj">Edytuj</button></td>';
        echo "</form>";
        echo '</tr>';
    }

    echo '</table>';

    $a = $_POST['1'];
    $b = $_POST['2'];
    $c = $_POST['3'];
    $d = $_POST['4'];
    $e = $_POST['5'];
    $f = $_POST['6'];
    $g = $_POST['7'];
    $h = $_POST['8'];
    $i = $_POST['9'];
    $id = $_POST['editteamId'];
    $updateQuery = "UPDATE `druzyny` SET `Lp`=$a,`Druzyna`='$b',`Mecze`=$c,`Punkty`=$d,`Zwyciestwa`=$e,`Remisy`=$f,`Porazki`=$g,`Bramki`=$h WHERE idDruzyny=$id LIMIT 1;";

    if ($a) {
        if ($link->query($updateQuery) === true) {
            echo "Record updated successfully";
            echo "<script>window.location.href='../html/zarzadzanieTabela.php';</script>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    mysqli_close($link);
}
//Zarządzaj Drużyną
// Edytuj Team
function edytujDruzyna()
{
    include "cfg.php";

    echo ' <table class="tabela">
    <tr>
    <th>Id</th>
    <th>Lp.</th>
    <th>Drużyna</th>
    <th>M.</th>
    <th>Pkt.</th>
    <th>Z.</th>
    <th>R.</th>
    <th>P.</th>
    <th>Bramki</th>
    <th>Id Kapitan</th>
    <th>Opcja</th>
    </tr>';
    $query = "SELECT * FROM druzyny ORDER BY Lp LIMIT 100;";
    $result = $link->query($query);
    while ($row = $result->fetch_assoc()) {
        echo "<form method='POST'  name='editTable' enctype='multipart/form-data' action='" . $_SERVER['REQUEST_URI'] . "'>";
        echo "<tr><td>" . $row["idDruzyny"] . "</td>";
        echo "<td><input type 'number' name='1' value='" . $row["Lp"] . "'></td>";
        echo "<td><input type 'text' name='2' value='" . $row["Druzyna"] . "'></td>";
        echo "<td><input type 'number' name='3' value='" . $row["Mecze"] . "'></td>";
        echo "<td><input type 'number' name='4' value='" . $row["Punkty"] . "'></td>";
        echo "<td><input type 'number' name='5' value='" . $row["Zwyciestwa"] . "'></td>";
        echo "<td><input type 'number' name='6' value='" . $row["Remisy"] . "'></td>";
        echo "<td><input type 'number' name='7' value='" . $row["Porazki"] . "'></td>";
        echo "<td><input type 'number' name='8' value='" . $row["Bramki"] . "'></td>";
        echo "<td><input type 'number'  name='9' value='" . $row["Kapitan"] . "'></td>";
        echo "<input type = 'hidden' name = 'editteamId' value = '$row[idDruzyny]' />";
        echo '<td><button type="submit" class="btnEdytuj">Edytuj</button></td>';
        echo "</form>";
        echo '</tr>';
    }

    echo '</table>';

    $a = $_POST['1'];
    $b = $_POST['2'];
    $c = $_POST['3'];
    $d = $_POST['4'];
    $e = $_POST['5'];
    $f = $_POST['6'];
    $g = $_POST['7'];
    $h = $_POST['8'];
    $i = $_POST['9'];
    $id = $_POST['editteamId'];
    $updateQuery = "UPDATE `druzyny` SET `Lp`=$a,`Druzyna`='$b',`Mecze`=$c,`Punkty`=$d,`Zwyciestwa`=$e,`Remisy`=$f,`Porazki`=$g,`Bramki`=$h,`Kapitan`=$i WHERE idDruzyny=$id LIMIT 1;";

    if ($a) {
        if ($link->query($updateQuery) === true) {
            echo "Record updated successfully";
            echo "<script>window.location.href='../html/zarzadzanieTabela.php';</script>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    mysqli_close($link);
}
//Zarządzaj Historią
function dodajhistoriaDruzyna()
{
    include "cfg.php";

    echo "<form method='POST'  name='addhistoryTeam' enctype='multipart/form-data' action=" . $_SERVER['REQUEST_URI'] . ">";
    echo ('
    <table class="tabela">
    <tr>
        <th>Sezon</th>
        <th>Druzyna</th>
    </tr>');
    echo ('
        <tr>
        <td>  <input type="text" name="1"/> </td>
        <td>  <input type="text"  name="2"/> </td>

        </tr>
        ');
    echo "</table>";
    echo '<button type="submit" class="btnDodajHistoria">Dodaj</button>';
    echo '</form>';
    $a = $_POST['1'];
    $b = $_POST['2'];

    $insertQuery = "INSERT INTO `historia_druzyn` VALUES ('NULL','$a','$b','NULL');";
    if ($a) {
        if ($link->query($insertQuery) === true) {
            echo "Record added successfully";
            #echo "<script>window.location.href='../html/zarzadzanieHistoria.php';</script>";
        } else {
            echo "Error adding record: " . $conn->error;
        }
    }

    mysqli_close($link);
}

function edytujhistoriaDruzyna()
{
    include "cfg.php";

    echo ' <table class="tabela">
    <tr>
    <th>Sezon</th>
    <th>Drużyna</th>
    <th>Opcja</th>
    </tr>';
    $query = "SELECT * FROM historia_druzyn LIMIT 100;";
    $result = $link->query($query);
    while ($row = $result->fetch_assoc()) {
        echo "<form method='POST'  name='editTable' enctype='multipart/form-data' action='" . $_SERVER['REQUEST_URI'] . "'>";
        echo "<tr><td><input type 'text' name='1a' value='" . $row["Sezon"] . "'></td>";
        echo "<td><input type 'text' name='2a' value='" . $row["Druzyna"] . "'></td>";
        echo "<input type = 'hidden' name = 'edithistoteamId' value = '$row[idHistoria]' />";
        echo '<td><button type="submit" class="btnEdytuj">Edytuj</button></td>';
        echo "</form>";
        echo '</tr>';
    }

    echo '</table>';

    $ab = $_POST['1a'];
    $bb = $_POST['2a'];
    $id = $_POST['edithistoteamId'];
    $updateQuery = "UPDATE `historia_druzyn` SET `Sezon`='$ab',`Druzyna`='$bb' WHERE idHistoria=$id LIMIT 1;";

    if ($ab) {
        if ($link->query($updateQuery) === true) {
            echo "Record updated successfully";
            echo "<script>window.location.href='../html/zarzadzanieHistoria.php';</script>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    mysqli_close($link);
}
function dodajhistoriaStrzelcow()
{
    include "cfg.php";

    echo "<form method='POST'  name='addhistorystrzelec' enctype='multipart/form-data' action=" . $_SERVER['REQUEST_URI'] . ">";
    echo ('
    <table class="tabela">
    <tr>
        <th>Sezon</th>
        <th>Piłkarz</th>
    </tr>');
    echo ('
        <tr>
        <td>  <input type="text" name="3"/> </td>
        <td>  <input type="text"  name="4"/> </td>

        </tr>
        ');
    echo "</table>";
    echo '<button type="submit" class="btnDodajHistoria">Dodaj</button>';
    echo '</form>';
    $aa = $_POST['3'];
    $bb = $_POST['4'];

    $insertQuery = "INSERT INTO `historia_strzelcow` VALUES ('NULL','$aa','$bb','NULL');";
    if ($aa) {
        if ($link->query($insertQuery) === true) {
            echo "Record added successfully";
            echo "<script>window.location.href='../html/zarzadzanieHistoria.php';</script>";
        } else {
            echo "Error adding record: " . $conn->error;
        }
    }

    mysqli_close($link);
}
function edytujhistoriaStrzelcow()
{
    include "cfg.php";

    echo ' <table class="tabela">
    <tr>
    <th>Sezon</th>
    <th>Piłkarz</th>
    <th>Opcja</th>
    </tr>';
    $query = "SELECT * FROM historia_strzelcow LIMIT 100;";
    $result = $link->query($query);
    while ($row = $result->fetch_assoc()) {
        echo "<form method='POST'  name='editTable' enctype='multipart/form-data' action='" . $_SERVER['REQUEST_URI'] . "'>";
        echo "<tr><td><input type 'text' name='1a' value='" . $row["Sezon"] . "'></td>";
        echo "<td><input type 'text' name='2a' value='" . $row["Pilkarz"] . "'></td>";
        echo "<input type = 'hidden' name = 'edithistostrzId' value = '$row[idHistoria]' />";
        echo '<td><button type="submit" class="btnEdytuj">Edytuj</button></td>';
        echo "</form>";
        echo '</tr>';
    }

    echo '</table>';

    $abb = $_POST['1a'];
    $bbb = $_POST['2a'];
    $ids = $_POST['edithistostrzId'];
    $updateQuery = "UPDATE `historia_strzelcow` SET `Sezon`='$abb',`Pilkarz`='$bbb' WHERE idHistoria=$ids LIMIT 1;";

    if ($abb) {
        if ($link->query($updateQuery) === true) {
            echo "Record updated successfully";
            echo "<script>window.location.href='../html/zarzadzanieHistoria.php';</script>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    mysqli_close($link);
}
//Zarządzaj Użytkownikiem
function edytujUzytkownika()
{
    include "cfg.php";

    echo ' <table class="tabela">
    <tr>
    <th>Id</th>
    <th>Email</th>
    <th>Login</th>
    <th>Hasło</th>
    <th>Typ</th>
    <th>Status</th>
    <th>Opcja</th>
    </tr>';
    $query = "SELECT * FROM uzytkownicy ORDER BY idUzytkownicy LIMIT 100;";
    $result = $link->query($query);
    while ($row = $result->fetch_assoc()) {
        echo "<form method='POST'  name='editTable' enctype='multipart/form-data' action='" . $_SERVER['REQUEST_URI'] . "'>";
        echo "<tr>";
        echo "<td>" . $row["idUzytkownicy"] . "</td>";
        echo "<td><input type 'text' name='1' value='" . $row["Email"] . "'></td>";
        echo "<td><input type 'number' name='2' value='" . $row["Login"] . "'></td>";
        echo "<td><input type 'number' name='3' value='" . $row["Haslo"] . "'></td>";
        echo "<td><input type 'number' name='4' value='" . $row["Typ"] . "'></td>";
        echo "<td><input type 'number' name='5' value='" . $row["Status"] . "'></td>";
        echo "<input type = 'hidden' name = 'edituserId' value = '$row[idUzytkownicy]' />";
        echo '<td><button type="submit" class="btnEdytuj">Edytuj</button></td>';
        echo "</form>";
        echo '</tr>';
    }

    echo '</table>';

    $a = $_POST['1'];
    $b = $_POST['2'];
    $c = $_POST['3'];
    $d = $_POST['4'];
    $e = $_POST['5'];
    $id = $_POST['edituserId'];
    $updateQuery = "UPDATE `uzytkownicy` SET `Email`='$a',`Login`='$b',`Haslo`='$c',`Typ`=$d,`Status`=$e WHERE idUzytkownicy=$id LIMIT 1;";

    if ($a) {
        if ($link->query($updateQuery) === true) {
            echo "Record updated successfully";
            echo "<script>window.location.href='../html/zarzadzanieUzytkownikiem.php';</script>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    mysqli_close($link);
}
//Zarządzaj Użytkownikiem
function edytujPilkarza()
{
    include "cfg.php";

    echo ' <table class="tabela">
    <tr>
    <th>Imie</th>
    <th>Nazwisko</th>
    <th>Druzyna</th>
    <th>Pozycja</th>
    <th>Numer</th>
    <th>Wzrost</th>
    <th>Waga</th>
    <th>Preferowana_noga</th>
    <th>idUzytkownika</th>
    <th>idDruzyny</th>
    </tr>';
    $query = "SELECT * FROM pilkarz ORDER BY idPilkarz LIMIT 100;";
    $result = $link->query($query);
    while ($row = $result->fetch_assoc()) {
        echo "<form method='POST'  name='editTable' enctype='multipart/form-data' action='" . $_SERVER['REQUEST_URI'] . "'>";
        echo "<tr>";
        echo "<td><input type 'text' name='1' value='" . $row["Imie"] . "'></td>";
        echo "<td><input type 'text' name='2' value='" . $row["Nazwisko"] . "'></td>";
        echo "<td><input type 'text' name='3' value='" . $row["Druzyna"] . "'></td>";
        echo "<td><input type 'text' name='4' value='" . $row["Pozycja"] . "'></td>";
        echo "<td><input type 'number' name='4' value='" . $row["Numer"] . "'></td>";
        echo "<td><input type 'number' name='5' value='" . $row["Wzrost"] . "'></td>";
        echo "<td><input type 'number' name='6' value='" . $row["Waga"] . "'></td>";
        echo "<td><input type 'text' name='7' value='" . $row["Preferowana_noga"] . "'></td>";
        echo "<td><input type 'number' name='8' value='" . $row["Uzytkownicy_idUzytkownicy"] . "'></td>";
        echo "<td><input type 'number' name='9' value='" . $row["Druzyny_idDruzyny"] . "'></td>";
        echo "<input type = 'hidden' name = 'editpilkarzId' value = '$row[idPilkarz]' />";
        echo '<td><button type="submit" class="btnEdytuj">Edytuj</button></td>';
        echo "</form>";
        echo '</tr>';
    }

    echo '</table>';

    $aa = $_POST['1'];
    $bb = $_POST['2'];
    $cc = $_POST['3'];
    $dd = $_POST['4'];
    $ee = $_POST['5'];
    $ff = $_POST['6'];
    $gg = $_POST['7'];
    $hh = $_POST['8'];
    $ii = $_POST['9'];

    $idp = $_POST['editpilkarzId'];
    $updateQuery = "UPDATE `pilkarz` SET `Nazwisko`='$aa',`Druzyna`='$bb',`Pozycja`='$cc',`Numer`=$dd,`Wzrost`=$ee,`Waga`=$ff,`Preferowana_noga`='$gg',`Uzytkownicy_idUzytkownicy`=$hh,`Druzyny_idDruzyny`=$ii WHERE idPilkarz=$idp LIMIT 1;";

    if ($aa) {
        if ($link->query($updateQuery) === true) {
            echo "Record updated successfully";
            echo "<script>window.location.href='../html/zarzadzanieUzytkownikiem.php';</script>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    mysqli_close($link);
}

function registerUser()
{
    include "cfg.php";
    echo '<form class="box" action="' . $_SERVER['REQUEST_URI'] . '" method="POST"> <h1>Rejestracja</h1>';
    echo '<input type="text" name="imie" placeholder="Imię">';
    echo '<input type="text" name="nazwisko" placeholder="Nazwisko">';
    echo '<input type="text" name="login" placeholder="Login">';
    echo '<input type="text" name="email" placeholder="E-mail">';
    echo '<input type="password" name="haslo" placeholder="Hasło">';
    echo '<input type="password" name="haslorepeat" placeholder="Powtórz hasło">';
    echo '<input type="submit" name="submit" value="Zarejestruj">';
    echo '</form>';

    $aa = $_POST['imie'];
    $bb = $_POST['nazwisko'];
    $cc = $_POST['login'];
    $dd = $_POST['email'];
    $ee = $_POST['haslo'];
    $ee2 = $_POST['haslorepeat'];

    if ($ee === $ee2) {
        $insertQuery1 = "INSERT INTO `uzytkownicy` VALUES ('NULL','$dd','$cc','$ee',1,1);";
        $insertQuery2 = "INSERT INTO `pilkarz` VALUES ('NULL','$aa','$bb','$dd','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL');";

        if ($aa) {
            if ($link->query($insertQuery1) === true) {
                if ($link->query($insertQuery2) === true) {
                    echo "<script>window.location.href='../html/logowanie.php';</script>";
                }

            }

        }
    } else {
        echo "<script>alert('Hasła nie są takie same!');</script>";
    }

    mysqli_close($link);

}
function aktualizujId($id)
{

    include "cfg.php";
    $query = "SELECT * FROM uzytkownicy WHERE `idUzytkownicy`=$id LIMIT 1;";
    $result = $link->query($query);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $iduser = $row['idUzytkownicy'];
            $imieuser = $row['Email'];
            $updateQuery = "UPDATE `pilkarz` SET `Uzytkownicy_idUzytkownicy`=$iduser WHERE `Email`='$imieuser' LIMIT 1;";

            if ($iduser) {
                if ($link->query($updateQuery) === true) {

                }
            }
        }

    }

}

function uzytkownikZmienDane($id)
{
    include "cfg.php";
    $query = "SELECT * FROM pilkarz WHERE Uzytkownicy_idUzytkownicy=$id LIMIT 1;";

    $result = $link->query($query);
    while ($row = $result->fetch_assoc()) {
        echo '
    <form class="boxUzy" action="' . $_SERVER['REQUEST_URI'] . '" method="post">
        <h1>Zmień Dane</h1>';

        echo '  <h2>Imię</h2><input type="text" name="a" placeholder="Imię" value=' . $row["Imie"] . '>';
        echo '  <h2>Nazwisko</h2><input type="text" name="b" placeholder="Nazwisko" value=' . $row["Nazwisko"] . '>';
        echo '   <h2>E-mail</h2><input type="text" name="c" placeholder="E-mail" value=' . $row["Email"] . '>';
        echo '   <h2>Drużyna</h2><input type="text" name="d" placeholder="Drużyna" value=' . $row["Druzyna"] . '>';
        echo '  <h2>Pozyja</h2><input type="text" name="e" placeholder="Pozyja" value=' . $row["Pozycja"] . '>';
        echo '   <h2>Numer</h2><input type="text" name="f" placeholder="Numer" value=' . $row["Numer"] . '>';
        echo ' <h2>Wzrost</h2> <input type="text" name="g" placeholder="Wzrost" value=' . $row["Wzrost"] . '>';
        echo '   <h2>Waga</h2><input type="text" name="h" placeholder="Waga" value=' . $row["Waga"] . '>';
        echo '  <h2>Prefereowana Noga</h2><input type="text" name="i" placeholder="Noga" value=' . $row["Preferowana_noga"] . '>';
        echo '  <input type="submit" name="btn" value="Zmień Dane">';
        echo ' </form>';

    }
    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];
    $d = $_POST['d'];
    $e = $_POST['e'];
    $f = $_POST['f'];
    $g = $_POST['g'];
    $h = $_POST['h'];
    $i = $_POST['i'];

    $updateQuery = "UPDATE `pilkarz` SET `Imie`='$a',`Nazwisko`='$b',`Email`='$c',`Druzyna`='$d',`Pozycja`='$e',`Numer`=$f,`Wzrost`=$g,`Waga`=$h,`Preferowana_noga`='$i' WHERE Uzytkownicy_idUzytkownicy=$id LIMIT 1;";

    if ($a) {
        if ($link->query($updateQuery) === true) {
            echo "Record updated successfully";
            echo "<script>window.location.href='../html/panelUzytkownika.php';</script>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    mysqli_close($link);
}
