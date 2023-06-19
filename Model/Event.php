<?php
class Event {
    private $idevent;
    private $nomevent;
    private $typeevent;
    private $prix;
    private $dateheure;
    private $localisation;
    private $image;
    private $description;

    public function __construct($idevent, $nomevent,$typeevent, $prix, $dateheure, $localisation,$image,$description) {
        $this->idevent = $idevent;
        $this->nomevent = $nomevent;
        $this->typeevent = $typeevent;
        $this->prix = $prix;
        $this->dateheure = $dateheure;
        $this->localisation = $localisation;
        $this->image = $image;
        $this->description = $description;
    }

    public function getIdEvent() {
        return $this->idevent;
    }
    public function getimage() {
        return $this->image;
    }
    public function getdescription() {
        return $this->description;
    }

    public function getNomEvent() {
        return $this->nomevent;
    }
    public function gettypeevent() {
        return $this->typeevent;
    }
    public function settypeevent($typeevent) {
        $this->typeevent=$typeevent;
    }
    public function getPrix() {
        return $this->prix;
    }

    public function getDateHeure() {
        return $this->dateheure;
    }

    public function getLocalisation() {
        return $this->localisation;
    }

    public function setNomEvent($nomevent) {
        $this->nomevent = $nomevent;
    }
    public function setIdEvent($idevent) {
        $this->idevent = $idevent;
    }

    public function setPrix($prix) {
        $this->prix = $prix;
    }

    public function setDateHeure($dateheure) {
        $this->dateheure = $dateheure;
    }

    public function setLocalisation($localisation) {
        $this->localisation = $localisation;
    }
}

?>