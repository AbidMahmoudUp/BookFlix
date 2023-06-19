<?php
class Reservation {
    private $idReservation;
    private $idEvent;
    private $nbPersonnes;
    private $prixTotal;

    public function __construct($idReservation, $idEvent, $nbPersonnes, $prixTotal) {
        $this->idReservation = $idReservation;
        $this->idEvent = $idEvent;
        $this->nbPersonnes = $nbPersonnes;
        $this->prixTotal = $prixTotal;
    }

    public function getIdReservation() {
        return $this->idReservation;
    }

    public function setIdReservation($idReservation) {
        $this->idReservation = $idReservation;
    }

    public function getIdEvent() {
        return $this->idEvent;
    }

    public function setIdEvent($idEvent) {
        $this->idEvent = $idEvent;
    }

    public function getNbPersonnes() {
        return $this->nbPersonnes;
    }

    public function setNbPersonnes($nbPersonnes) {
        $this->nbPersonnes = $nbPersonnes;
    }

    public function getPrixTotal() {
        return $this->prixTotal;
    }

    public function setPrixTotal($prixTotal) {
        $this->prixTotal = $prixTotal;
    }
}

?>