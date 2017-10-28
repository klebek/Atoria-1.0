<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" href="fav.ico" sizes="16x16" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Atoria</title>
<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href="2.css" type="text/css" rel="stylesheet" />
</head>

<body>


<?php

$nazwiskoDel =	$_GET['nazwiskoDel'];
$imieDel =	$_GET['imieDel'];

$link = mysql_connect('localhost', 'p512370_lebek', 'kuba11') or die('Nie udało się połączyć');
mysql_select_db('p512370_atoria') or die('Nie udało się połączyćXD');

$sql = "DELETE FROM ranking WHERE nazwisko='$nazwiskoDel' AND imie='$imieDel';";
$result1 = mysql_query($sql);

function DBArrayQuery($query) {
    $link = mysql_connect('localhost', 'p512370_lebek', 'kuba11') or die('Nie udało się połączyć');
    mysql_select_db('p512370_atoria') or die('Nie udało się połączyćXD');

    $result = @mysql_query($query);
    $tablica = array();
    $num_fields = mysql_num_fields($result);
    $num_rows = mysql_num_rows($result);
    $nr_row = 0;
    while ($nr_row < $num_rows) {
        $nr_field = 0;
        $curr_row = mysql_fetch_row($result);
        while ($nr_field < $num_fields) {
            $tablica[$nr_row][$nr_field]=$curr_row[$nr_field];
            $nr_field++;
        };
        $nr_row++;
    };
    return $tablica;
};

$x = DBArrayQuery("select * from ranking order by wynik");

echo '<div align="center" id="s">';
echo '<img src="img/logo2.png" alt="logo" />';
echo "</div>";


echo '<table border="0" align="center" cellpadding="15" cellspacing="15">';
echo "<tr>";
echo '<td background="img/rank2.png" alt="komórka" >'; echo "<k>IMIĘ</k>"; echo "</td>";
echo '<td background="img/rank2.png" alt="komórka" >'; echo "<k>NAZWISKO</k>"; echo "</td>";
echo '<td background="img/rank2.png" alt="komórka" >'; echo "<k>PŁEĆ</k>"; echo "</td>";
echo '<td background="img/rank2.png" alt="komórka" >'; echo "<k>RASA</k>"; echo "</td>";
echo '<td background="img/rank2.png" alt="komórka" >'; echo "<k>WYPRAWY</k>"; echo "</td>";
echo "</tr>";
foreach ($x as $wiersz) {
    echo "<tr>";
    foreach ($wiersz as $komorka) {
        echo "<td background='img/rank.png' alt=\"komórka\" ><k>$komorka</k></td>";
    }
    echo "</tr>";
};
echo "</table>";


?>

<center><br /><a href="ranking.php" class="button" style="vertical-align:middle"><span>Usuń więcej</span></a></center>

</body>
</html>