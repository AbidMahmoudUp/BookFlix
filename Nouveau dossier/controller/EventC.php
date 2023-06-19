<?php
require_once(__DIR__ . '/../config.php');
include(__DIR__ . '/../Model/Event.php');



class EventC{
    private $pdo;
    public function __construct() {
        $this->pdo = config::getConnexion();
    }

    public function addEvent($event) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO event (nomevent, prix, dateheure, localisation) VALUES (:nomevent, :prix, :dateheure, :localisation)");
            $stmt->bindValue(':nomevent', $event->getNomEvent());
            $stmt->bindValue(':prix', $event->getPrix());
            $stmt->bindValue(':dateheure', $event->getDateHeure());
            $stmt->bindValue(':localisation', $event->getLocalisation());
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function updateEvent($event) {
        try {
            $stmt = $this->pdo->prepare("UPDATE event SET nomevent = :nomevent, prix = :prix, dateheure = :dateheure, localisation = :localisation WHERE idevent = :idevent");
            $stmt->bindValue(':nomevent', $event->getNomEvent());
            $stmt->bindValue(':prix', $event->getPrix());
            $stmt->bindValue(':dateheure', $event->getDateHeure());
            $stmt->bindValue(':localisation', $event->getLocalisation());
            $stmt->bindValue(':idevent', $event->getIdEvent());
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function displayEvents() {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM event");
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

    public function deleteEvent($id) {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM event WHERE idevent = :idevent");
            $stmt->bindValue(':idevent', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}



?>