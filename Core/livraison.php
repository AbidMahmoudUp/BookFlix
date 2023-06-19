<?php
require_once(__DIR__ . '/../config.php');
include(__DIR__ . '/../Model/livraison.php');

class LivraisonC {
 
    private $pdo;
    
    public function __construct() {
        $this->pdo = config::getConnexion();
    }
 


    public static function ajouter($user) {
        $sql = 'INSERT INTO livraison (idcommande,idlivreur,nomcomplet,adresse,ville,codepostal,pays)
             VALUES(:idcommande,:idlivreur,:nomcomplet,:adresse,:ville,:codepostal,:pays)';
             $db = config::getConnexion();
        try {
            $query=$db->prepare($sql);
            $query->bindValue(':idcommande', $user->get_Idcommande());
            $query->bindValue(':idlivreur', $user->get_IdLivreur());
            $query->bindValue(':nomcomplet', $user->get_nomcomplet());
            $query->bindValue(':adresse', $user->get_adresse());
            $query->bindValue(':ville', $user->get_ville());    
            $query->bindValue(':codepostal', $user->get_codepostal());
            $query->bindValue(':pays', $user->get_pays());
            $query->execute();
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public static function update($user) {
        $sql = "UPDATE livraison SET idcommande=:idcommande,idlivreur=:idlivreur,nomcomplet=:nomcomplet, adresse=:adresse, ville=:ville, codepostal=:codepostal, pays=:pays WHERE idlivraison=:idlivraison";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);
            $req->bindValue(":idlivraison", $user->get_Idlivraison());
            $req->bindValue(":idcommande", $user->get_Idcommande());
            $req->bindValue(':idlivreur', $user->get_IdLivreur());
            $req->bindValue(":nomcomplet", $user->get_nomcomplet());
            $req->bindValue(":adresse", $user->get_adresse());
            $req->bindValue(":ville", $user->get_ville());
            
            $req->bindValue(":codepostal", $user->get_codepostal());
            $req->bindValue(":pays", $user->get_pays());
            $req->execute();
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public static function delete($id) {
        $sql = "DELETE FROM livraison WHERE idlivraison=:idlivraison";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);
            $req->bindValue(':idlivraison', $id);
            $req->execute();
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function Display_livraison()
    {
        $sql ="SELECT l.*, p.name 
        FROM livraison l 
        LEFT JOIN livreur p 
        ON l.idlivreur = p.idlivreur";
        $db=config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
}
