<?php
require_once(__DIR__ . '/../config.php');
class panierC{
    private $pdo;
    public function __construct() {
        $this->pdo = config::getConnexion();

    }
   public function addpanier($idUser,$idproduit,$prix)
   {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO panier (idproduct, iduser, prix, quantite,total) VALUES (:idproduct, :iduser, :prix, :quantite,:total)");
            $stmt->bindValue(':idproduct', $idproduit);
            $stmt->bindValue(':iduser', $idUser);
            $stmt->bindValue(':prix',$prix );
            $stmt->bindValue(':quantite', 1);
            $stmt->bindValue(':total',$prix );
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public function getPanier($idUser)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT p.*, pa.id as panier_id,pa.quantite , pa.total FROM product p INNER JOIN panier pa ON p.id = pa.idproduct WHERE pa.iduser = :iduser");
            $stmt->bindValue(':iduser', $idUser);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }
    
    
    public function UpdatePanier($idpanier,$quantite,$prix)
    {
         try {
             $stmt = $this->pdo->prepare("UPDATE panier SET  quantite=:quantite,total=:total where id=:id");
             $stmt->bindValue(':id', $idpanier);
             $stmt->bindValue(':quantite', $quantite);
             $stmt->bindValue(':total',$prix * $quantite );
             $stmt->execute();
             return true;
         } catch (PDOException $e) {
             echo "Error: " . $e->getMessage();
             return false;
         }
    }
    
    public function deletePanier($id) {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM panier WHERE id = ?");
            $stmt->execute([$id]);
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public function getTotalPanier($idUser)
{
    try {
        $stmt = $this->pdo->prepare("SELECT SUM(total) as total FROM panier where iduser = :iduser");
        $stmt->bindValue(':iduser', $idUser);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    } catch (PDOException $e) {
        throw new Exception($e->getMessage());
    }
}


//add commande 

public function addCommande($idUser, $total)
{
    try {
        $stmt = $this->pdo->prepare("INSERT INTO commande (iduser, total, date_creation) VALUES (:iduser, :total, NOW())");
        $stmt->bindValue(':iduser', $idUser);
        $stmt->bindValue(':total', $total);
        $stmt->execute();
    } catch (PDOException $e) {
        throw new Exception($e->getMessage());
    }
}
public function getAllCommandes()
{
    try {
        $stmt = $this->pdo->prepare("SELECT * FROM commande");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        throw new Exception($e->getMessage());
    }
}
public function getProductsByCommandeIdUser($id_user)
{
    try {
        $stmt = $this->pdo->prepare("SELECT p.*,pa.quantite as quantite FROM product p INNER JOIN panier pa ON p.id = pa.idproduct INNER JOIN commande c ON c.iduser = pa.iduser WHERE c.iduser = :id_user");
        $stmt->bindValue(':id_user', $id_user);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        throw new Exception($e->getMessage());
    }
}

public function validerCommande($idCommande)
{
    try {
        $stmt = $this->pdo->prepare("UPDATE commande SET valide = 1 WHERE id = :id");
        $stmt->bindValue(':id', $idCommande);
        $stmt->execute();
    } catch (PDOException $e) {
        throw new Exception($e->getMessage());
    }
}

public function AnnulerCommande($idCommande)
{
    try {
        $stmt = $this->pdo->prepare("UPDATE commande SET valide = 0 WHERE id = :id");
        $stmt->bindValue(':id', $idCommande);
        $stmt->execute();
    } catch (PDOException $e) {
        throw new Exception($e->getMessage());
    }
}

}
?>