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
            $stmt = $this->pdo->prepare("INSERT INTO event (nomevent,typeevent, prix, dateheure, localisation,image, description) VALUES (:nomevent,:typeevent, :prix, :dateheure, :localisation,:image,:description)");
            $stmt->bindValue(':nomevent', $event->getNomEvent());
            $stmt->bindValue(':typeevent', $event->gettypeevent());
            $stmt->bindValue(':prix', $event->getPrix());
            $stmt->bindValue(':dateheure', $event->getDateHeure());
            $stmt->bindValue(':localisation', $event->getLocalisation());
            $stmt->bindValue(':image', $event->getimage());
            $stmt->bindValue(':description', $event->getdescription());
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function updateEvent($event) {
        try {
            $stmt = $this->pdo->prepare("UPDATE event SET nomevent = :nomevent, typeevent = :typeevent, prix = :prix, dateheure = :dateheure, localisation = :localisation, image = :image, description = :description WHERE idevent = :idevent");
            $stmt->bindValue(':nomevent', $event->getNomEvent());
            $stmt->bindValue(':typeevent', $event->gettypeevent());
            $stmt->bindValue(':prix', $event->getPrix());
            $stmt->bindValue(':dateheure', $event->getDateHeure());
            $stmt->bindValue(':localisation', $event->getLocalisation());
            $stmt->bindValue(':idevent', $event->getIdEvent());
            $stmt->bindValue(':image', $event->getimage());
            $stmt->bindValue(':description', $event->getdescription());
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function displayEvents() {
        try {
            $stmt = $this->pdo->prepare("SELECT e.*, t.nametypeevent 
            FROM event e 
            LEFT JOIN typeevent t 
            ON e.typeevent = t.idtypeevent");
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

    public function getEventsById($id) {
        try {
            $sql="SELECT e.*, t.nametypeevent 
            FROM event e 
            LEFT JOIN typeevent t 
            ON e.typeevent = t.idtypeevent where idevent=".$id;
            $stmt = $this->pdo->prepare($sql);
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

//review
 public function addEventReview($idclient, $idevent, $comment) {
    try {
        $stmt = $this->pdo->prepare("INSERT INTO eventreview (idclient, idevent, comment) VALUES (:idclient, :idevent, :comment)");
        $stmt->bindValue(':idclient', $idclient);
        $stmt->bindValue(':idevent', $idevent);
        $stmt->bindValue(':comment', $comment);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
 }
 public function getAllEventReviewsWithUsernames() {
    try {
        $stmt = $this->pdo->query("SELECT eventreview.*, user.username as name FROM eventreview INNER JOIN user ON eventreview.idclient = user.id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}


}





?>