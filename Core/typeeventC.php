<?php
require_once(__DIR__ . '/../config.php');
include(__DIR__ . '/../Model/typeevent.php');



class typeeventC{
    private $pdo;
    public function __construct() {
        $this->pdo = config::getConnexion();
    }
    
    public function addTypeEvent($nametypeevent) {
        try {
            $sql = "INSERT INTO typeevent (nametypeevent) VALUES (:name)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':name', $nametypeevent);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public function displayTypeEvent()
      {
          try {
              $query = "SELECT * FROM typeevent";
              $result = $this->pdo->query($query);
              return $result;
          } catch (PDOException $e) {
              echo "Error displaying categories: " . $e->getMessage();
          }
      }
    public function modifyTypeEvent($idtypeevent, $nametypeevent) {
        try {
          $stmt = $this->pdo->prepare("UPDATE typeevent SET nametypeevent = :name WHERE idtypeevent = :id");
          $stmt->bindValue(":name", $nametypeevent);
          $stmt->bindValue(":id", $idtypeevent);
          $stmt->execute();
        } catch (PDOException $e) {
          echo "Error: " . $e->getMessage();
        }
    }
    public function deleteTypeEvent($id) {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM typeevent WHERE idtypeevent = ?");
            $stmt->execute([$id]);
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
      }

}

?>