<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$baza = 'pilkaolsztyn';
error_reporting(E_ERROR | E_PARSE); # później może odkomentować
$link = mysqli_connect($dbhost, $dbuser, $dbpass);

if (!$link) {
    echo '<b>przerwano połączenie</b>';
}

if ($link) {
    if (!mysqli_select_db($link, $baza)) {
        echo '<b>nie wybrano prawidłowej bazy</b>';
    }

}
