<?php 	
class Projekt{
    var $cislo;
    var $nazov;
    var $riesOd;
    var $riesDo;
    var $riesOdDo;
    var $garant;
    var $kategoria;
    var $href;
/*

    //constructor
	function Projekt($cislo,$nazov,$riesOd,$riesDo,$garant,$kategoria){
		$this->cislo=$cislo;
        $this->nazov=$nazov;
        $this->riesOd=$riesOd;
        $this->riesDo=$riesDo;
        $this->garant=$garant;
        $this->kategoria=$kategoria;       
	}*/
    function Projekt($cislo,$nazov,$riesOdDo,$garant,$href,$kategoria){
		$this->cislo=$cislo;
        $this->nazov=$nazov;
        $this->riesOdDo=$riesOdDo;
        $this->garant=$garant;
        $this->href=$href;  
        $this->kategoria=$kategoria;       
	}
}
?>