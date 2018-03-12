<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="icon" href="fav.ico" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Atoria</title>
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css' />
    <link href="style.css" type="text/css" rel="stylesheet" />
    <link rel='stylesheet' type='text/css' href='style.css' />
</head>

<body>


    <?php
	
    echo '<div align="center" id="s">';
    echo '<img src="img/logo2.png" alt="logo"/>';
    echo "</div>";

    echo '<div align="center">';


    $x = $_GET['x'];
    $y = $_GET['y'];
    $z = $_GET["z"];

    $imie =	$_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $plec =	$_POST['sex'];
    $klasa = $_POST['class'];

    $rand1 = rand(1,4);
    $rand2 = rand(1,4);


    echo '<table align="center">';
    for($i=1; $i<5; $i++) {
        echo "<tr>";


        for($j = 1; $j<5; $j++) {
            echo "<td>";
            $nazwa = "img/mapa/puste.png";

            $skarb_x1 = $rand1;
            $skarb_y1 = $rand2;
			

            if($i == $y and $j == $x) {
                $nazwa = "img/mapa/hero.png";
                if(($x == $skarb_x1 and $y == $skarb_y1)) {

				$nazwa = "img/mapa/skarb.png";
                
                }
            }
            echo "<img src=\"$nazwa\" alt=\"obrazek\"/>";
            echo "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    // strza�ka w lewo
    $x = $_GET['x'];
    $y = $_GET['y'];
    $z = ($_GET["z"]);

	
    $nowex = $x-1; $nowey = $y; $nowez= $z+1; // ruch w lewo - maleje $x
    if (($x=="2" or $x=="3" or $x=="4") and !($x==$skarb_x1 and $y==$skarb_y1 )) {
        echo "<A HREF=\"MapPage.php?x=$nowex&y=$nowey&z=$nowez\">";
        echo "<img border=\"0\" src=\"img/mapa/arrow_l.png\" alt=\"lewo\"/>";
        echo "</A>";
		
    }
    else
        echo "<img src=\"img/mapa/arrow_l.png\" alt=\"lewo\"/>";
	

    // strza�ka w prawo



    $x = $_GET['x'];
    $y = $_GET['y'];
    $z = ($_GET["z"]);
	

    $nowex = $x+1; $nowey = $y;  $nowez= $z+1;// ruch w prawo - ro�nie $x
    if (($x=="1" or $x=="2" or $x=="3")and !($x==$skarb_x1 and $y==$skarb_y1 )) {
        echo "<A HREF=\"MapPage.php?x=$nowex&y=$nowey&z=$nowez\">";
        echo "<img border=\"0\" src=\"img/mapa/arrow_r.png\" alt=\"prawo\"/>";
        echo "</A>";
		
    }
    else
        echo "<img src=\"img/mapa/arrow_r.png\" alt=\"prawo\"/>";






    // strza�ka do g�ry
    $x = $_GET['x'];
    $y = $_GET['y'];
    $z = ($_GET["z"]);
	
    $nowex = $x; $nowey = $y-1; $nowez= $z+1; // ruch w g�r� - maleje $y
    if (($y=="2" or $y=="3" or $y=="4")and !($x==$skarb_x1 and $y==$skarb_y1 )) {
        echo "<A HREF=\"MapPage.php?x=$nowex&y=$nowey&z=$nowez\">";
        echo "<img border=\"0\" src=\"img/mapa/arrow_u.png\" alt=\"góra\"/>";
        echo "</A>";
		
    }
    else
        echo "<img src=\"img/mapa/arrow_u.png\" alt=\"góra\"/>";


    // strza�ka do dolu
    $x = $_GET['x'];
    $y = $_GET['y'];
    $z = ($_GET["z"]);
	
    $nowex = $x; $nowey = $y+1; $nowez= $z+1; // ruch w g�r� - ro�nie $y
    if (($y=="1" or $y=="2" or $y=="3")and !($x==$skarb_x1 and $y==$skarb_y1 )) {
        echo "<A HREF=\"MapPage.php?x=$nowex&y=$nowey&z=$nowez\">";
        echo "<img border=\"0\" src=\"img/mapa/arrow_d.png\" alt=\"dół\"/>";
        echo "</A>";
		
    }
    else
        echo "<img src=\"img/mapa/arrow_d.png\" alt=\"dół\"/>";
	

    $pkt=$z;
    if(($x==$skarb_x1 and $y==$skarb_y1 )) {
		$link = mysql_connect('localhost', 'p512370_lebek', 'kuba11') or die('Nie udało się połączyć');
        mysql_select_db('p512370_atoria') or die('Nie udało się połączyćXD');

        $imie =	$_SESSION['imie'];
        $nazwisko = $_SESSION['nazwisko'];
        $plec =	$_SESSION['sex'];
        $klasa = $_SESSION['class'];

        $sql = "insert into ranking values('$imie','$nazwisko','$plec','$klasa',$pkt)";
		$result1 = mysql_query($sql);
		
        echo "<k2><br><br>Udało Ci się odnaleźć zaginiony skarb Atorii!</k2><br /><br />";
        echo "<k>Ilość odbytych wypraw:</k><k2> $z</k2><br />";
        echo "<k>Zobacz jak radzili sobie inni</k><br /><br />";
        echo '<form action="RankingPage.php">';
        echo '<center><button class="button" type="submit" value="Submit" name="submit" style="vertical-align:middle"><span>Dalej</span></button></center>';
        echo "</form>";
    }
    else {
	
        echo '<div class="k"><br /><br />Szukaj ukrytego skarbu klikając na strzałki';
        echo "<br /><br />$z";
        echo "</div>";
        echo "</div>";
    }

    ?>

</body>
</html>