<?php
class lay {
    public $render;

    public function render($plik, $tablica){
        $this->render=file_get_contents("templates/".$plik.".tpl"); //Wczytanie zawartości pliku
        foreach($tablica as $t => $content){
            $this->render=str_replace("{".$t."}", $content, $this->render); //Podmiana {} na normalny tekst
        }
        $this->render=preg_replace('({(.*?)})', "", $this->render); //Usuwanie wszystkich słów kluczowych, które nie zostały podmienione
        return $this->render;
    }

    public function __desctruct(){
        unset($this->render); //Usuwanie zmiennej
    }
}
?>