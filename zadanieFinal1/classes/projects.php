<?php 	
class Projects{
    var $id;
    var	$projectType;
    var $number;
    var $titleSK;
    var $titleEN;
    var $duration;
    var $coordinator;
    var $partners;
    var $web;
    var $internalCode;
    var $annotationSK;
    var $annotationEN;
    var $category;
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
    function Projects($id,$projectType,$number,$titleSK,$titleEN,$duration,$coordinator,$category){
		$this->id=$id;
        $this->projectType=$projectType;
        $this->number=$number;
        $this->titleSK=$titleSK;
        $this->titleEN=$titleEN;
        $this->duration=$duration;
        $this->coordinator=$coordinator;
        $this->category=$category;
	}
}
?>