<?php
require_once(__DIR__ . '/../config.php');
include(__DIR__ . '/../Model/reservation.php');



class reservationC{
    private $pdo;
    public function __construct() {
        $this->pdo = config::getConnexion();
    }
    
    public function addReservation($Reservation ) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO reservation (idevent, nbpersonnes, prixtotal) VALUES (:idevent, :nbpersonnes, :prixtotal)");
            $stmt->bindValue(':idevent', $Reservation->getIdEvent() );
            $stmt->bindValue(':nbpersonnes', $Reservation->getNbPersonnes() );
            $stmt->bindValue(':prixtotal', $Reservation->getPrixTotal());
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function updateReservation($Reservation) {
        try {
            $stmt = $this->pdo->prepare("UPDATE reservation SET idevent=:idevent, nbpersonnes=:nbpersonnes, prixtotal=:prixtotal WHERE idreservation=:idreservation");
            $stmt->bindValue(':idreservation', $Reservation->getIdReservation());
            $stmt->bindValue(':idevent', $Reservation->getIdEvent() );
            $stmt->bindValue(':nbpersonnes', $Reservation->getNbPersonnes() );
            $stmt->bindValue(':prixtotal', $Reservation->getPrixTotal());
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    


    public function displayReservation() {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM reservation");
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

    public function deleteReservation($id) {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM reservation WHERE idreservation = :idreservation");
            $stmt->bindValue(':idreservation', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

}

?>