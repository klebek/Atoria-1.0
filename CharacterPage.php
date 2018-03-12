<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="icon" href="fav.ico"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Atoria</title>
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'/>
    <link href="style.css" type="text/css" rel="stylesheet"/>
    <link rel='stylesheet' type='text/css' href='style.css'/>
</head>

<body>

<?php
$_SESSION['imie'] = $_POST['imie'];
$_SESSION['nazwisko'] = $_POST['nazwisko'];
$_SESSION['sex'] = $_POST['sex'];
$_SESSION['class'] = $_POST['class'];

if (isset($_POST['imie'])) $imie = $_POST['imie']; else $imie = 'Unnamed';

if (isset($_POST['nazwisko'])) $nazwisko = $_POST['nazwisko']; else $nazwisko = 'Unnamed';

if (isset($_POST['sex'])) $plec = $_POST['sex']; else $plec = 'Unnamed';

if (isset($_POST['class'])) $klasa = $_POST['class']; else $klasa = 'Unnamed';

echo '<center><img src="img/logo.png" alt="logo" /></center><br /><br /><br />';

echo '<div id="exCenter">';
echo '<div id="exContent">';

echo '<div id="exRightColumn">';
echo '<div class="beka">Imię: ';
echo '<font color="#3ef884">';
echo $imie;
echo '</font>';
echo '</div>';
echo '<div class="beka">Nazwisko: ';
echo '<font color="#3ef884">';
echo $nazwisko;
echo '</font>';
echo '</div>';

if ($plec == Mężczyzna) {
    echo '<div class="beka">Płeć: ';
    echo '<font color="#3ef884">';
    echo $plec;
    echo '</font>';
    echo '</div>';
} else if ($plec == Kobieta) {
    echo '<div class="beka">Płeć: ';
    echo '<font color="#3ef884">';
    echo $plec;
    echo '</font>';
    echo '</div>';
}

if ($klasa == Pirat) {
    echo '<div class="beka">Klasa: ';
    echo '<font color="#3ef884">';
    echo $klasa;
    echo '</font>';
    echo '</div>';
} else if ($klasa == Wojownik) {
    echo '<div class="beka">Klasa: ';
    echo '<font color="#3ef884">';
    echo $klasa;
    echo '</font>';
    echo '</div>';
} else if ($klasa == Druid) {
    echo '<div class="beka">Klasa: ';
    echo '<font color="#3ef884">';
    echo $klasa;
    echo '</font>';
    echo '</div>';
}
echo "</div>";
echo '<div id="exLeftColumn">';
if ($klasa == Pirat) {
    echo '<img src="img/fantasy/pirate.PNG" alt="Pirat" class="imgClass" />';
} else if ($klasa == Wojownik) {
    echo '<img src="img/fantasy/knight.PNG" alt="Wojownik" class="imgClass" />';
} else if ($klasa == Druid) {
    echo '<img src="img/fantasy/mag.png" alt="Druid" class="imgClass" />';
}
echo "</div>";
echo '<div class="exClear"></div>';
echo "</div>";

if ($klasa == Pirat) {
    $sila = rand(1, 7);
    $obrona = rand(2, 9);
    $inteligencja = rand(4, 10);
} else if ($klasa == Wojownik) {
    $sila = rand(2, 9);
    $obrona = rand(1, 7);
    $inteligencja = rand(2, 10);
} else if ($klasa == Druid) {
    $sila = rand(2, 8);
    $obrona = rand(1, 8);
    $inteligencja = rand(4, 10);
}


echo '<div id="m1">';
echo '<img src="img/fantasy/sword.png" alt="Siła" />';
echo '<div id="m5">';
echo 'Siła: ';
echo $sila;
echo "</div>";
echo '<img src="img/fantasy/shield.png" alt="Obrona" />';
echo '<div id="m2">';
echo 'Obrona: ';
echo $obrona;
echo "</div>";
echo '<img src="img/fantasy/brain.png" alt="Spryt" />';
echo '<div id="m4">';
echo 'Spryt: ';
echo $inteligencja;
echo "</div>";
echo "</div>";

echo '<div id="m3" class="k">';
echo "Twój współczynnik postaci wynosi: <br/>";
$suma = $sila + $obrona + $inteligencja;
$wspl = $suma / 3;
$ws = ceil($wspl);
if ($ws <= 3) {
    echo "<div class='w1'>";
    echo $ws;
    echo "</div>";
} else if ($ws >= 4 && $wspl <= 7) {
    echo "<div class='w1'>";
    echo $ws;
    echo "</div>";
} else if ($ws >= 8) {
    echo "<div class='w1'>";
    echo $ws;
    echo "</div>";
}
echo "</div>";

$x = 1;
$y = 1;
$z = 0;

echo '<form method="post" action="MapPage.php?x=1&y=1&z=0">';
echo '<center><button class="button" type="submit" value="Submit" name="submit" style="vertical-align:middle"><span>Mapa</span></button></center>';
echo '</form>';
echo "</div>";
?>
</body>
</html>