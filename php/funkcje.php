<?php
//funkcja wyświetlająca aktualnosci na stronie głównej
function pokazAktualnosci($limit)
{

    include "cfg.php";

    if ($link) {
        $query = "SELECT * FROM aktualnosci LIMIT $limit";
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
                echo "<p>" ;
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
                echo "<p>" ;                
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


function pokazDanePilkarza($id)
{

    include "cfg.php";
    if ($link) {
        $query = "SELECT * FROM pilkarz WHERE Uzytkownicy_idUzytkownicy='$id'  LIMIT 1;";
        $result = $link->query($query);
        if ($result->num_rows > 0) {           
        
            while ($row = $result->fetch_assoc()) {
                echo"<p>Imię: ". $row['Imie'] ."</p>";
                echo"<p>Nazwisko: ". $row['Nazwisko'] ."</p>";
                echo"<p>Adres E-mail: ". $row['Email'] ."</p>";
                echo"<p>Drużyna: ". $row['Druzyna'] ."</p>";
                echo"<p>Pozycja: ". $row['Pozycja'] ."</p>";
                echo"<p>Numer: ". $row['Numer'] ."</p>";
                echo"<p>Wzrost: ". $row['Wzrost'] ."</p>";
                echo"<p>Waga: ". $row['Waga'] ."</p>";
                echo"<p>Preferowana noga: ". $row['Preferowana_noga'] ."</p>";
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


