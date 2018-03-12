<?php
include "layout.class.php";

$dane = array(tresc=>"Witaj w Atorii, krainie rządzonej przez trzy rasy; piratów, wojowników i druidów.<br />
Dołącz do społeczności jednej z nich i podbij wrogie tereny zdobywając chwałę aż po wsze czasy.<br /><br />

Miej na uwadze wybór klasy postaci, bo w zależności, którą wybierzesz zyskasz więcej możliwości, które w późniejszych etapach mogą stać się niebywale pomocne w dotarciu na sam szczyt<br /><br />
Bądź uważny i nie daj się wprowadzić na manowce przez złośliwe chochliki czekające na Twój błąd.<br />

Powodzenia!");

$szablon = new lay();
echo $szablon->render("index", $dane);
?>