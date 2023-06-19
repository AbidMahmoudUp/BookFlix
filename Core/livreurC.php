<?php
require_once(__DIR__ . '/../config.php');
include(__DIR__ . '/../Model/livreur.php');



class livreurC{
    private $pdo;
    public function __construct() {
        $this->pdo = config::getConnexion();
    }
    
    public function addLivreur($livreur) {
        try {
            $sql = "INSERT INTO livreur (name,phonenumber) VALUES (:name,:phonenumber)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':name', $livreur->getname());
            $stmt->bindValue(':phonenumber', $livreur->getphone_number());
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public function displayLivreur()
      {
          try {
              $query = "SELECT * FROM livreur";
              $result = $this->pdo->query($query);
              return $result;
          } catch (PDOException $e) {
              echo "Error displaying categories: " . $e->getMessage();
          }
      }
    public function modifyLivreur($livreur) {
        try {
          $stmt = $this->pdo->prepare("UPDATE livreur SET name = :name,phonenumber=:phonenumber WHERE idlivreur = :id");
          $stmt->bindValue(':name', $livreur->getname());
          $stmt->bindValue(":id", $livreur->getID());
          $stmt->bindValue(':phonenumber', $livreur->getphone_number());
          $stmt->execute();
        } catch (PDOException $e) {
          echo "Error: " . $e->getMessage();
        }
    }
    public function deleteLivreur($id) {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM livreur WHERE idlivreur = ?");
            $stmt->execute([$id]);
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

}

?>