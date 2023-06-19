<?php
class Event {
    private $idevent;
    private $nomevent;
    private $prix;
    private $dateheure;
    private $localisation;

    public function __construct($idevent, $nomevent, $prix, $dateheure, $localisation) {
        $this->idevent = $idevent;
        $this->nomevent = $nomevent;
        $this->prix = $prix;
        $this->dateheure = $dateheure;
        $this->localisation = $localisation;
    }

    public function getIdEvent() {
        return $this->idevent;
    }

    public function getNomEvent() {
        return $this->nomevent;
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