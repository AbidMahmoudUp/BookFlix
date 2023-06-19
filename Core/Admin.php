<?php
include_once('C://xampp/htdocs/projetv2/config.php');
include_once('C://xampp/htdocs/projetv2/Model/ClasseAdmin.php');

class CrudAdmin
{
    public static function insert($Admin,$image)
    {
        $sql = "INSERT INTO `admin`(`id`, `name`, `email`, `password`, `address`, `work`, `country`, `picture`, `responsibility`, `phone_number`) 
        VALUES ('',:name,:email,:password,'','','',:image,'',:phone_number)";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);
            $req->bindValue(":name", $Admin->getName());
            $req->bindValue(":password", $Admin->getPassword());
            $req->bindValue(":email", $Admin->getEmail());
            $req->bindValue(":phone_number", $Admin->getPhoneNumber());
            $req->bindValue(':image', $image, PDO::PARAM_LOB);
            $req->execute();
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
    public static function Update($User)
    {
        $sql = "UPDATE user
         SET `username`= :username, `password`= :password, `email`= :email, `phone_number`= :phone_number where email=:email  ";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);
            $req->bindValue(":username", $User->getUsername());
            $req->bindValue(":password", $User->getPassword());
            $req->bindValue(":email", $User->getEmail());
            $req->bindValue(":phone_number", $User->getPhoneNumber());
            $req->execute();
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }


    public static function UpdateAboutInfoAdmin($Admin, $id)
    {
        $sql = "UPDATE admin
         SET `address`= :address, `work`= :work, `country`= :country where id=" . $id;
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);
            $req->bindValue(":address", $Admin->getAddress());
            $req->bindValue(":work", $Admin->getWork());
            $req->bindValue(":country", $Admin->getCountry());
            $req->execute();
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
    public static function UpdateImageAdmin($id, $image)
    {
        $sql = "UPDATE admin SET `picture`= :image WHERE id= :id";
        $db = config::getConnexion();

        try {
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':image', $image, PDO::PARAM_LOB);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    public static function UpdateResponsibilityInfoAdmin($Admin, $id)
    {
        $sql = "UPDATE admin
         SET `responsibility`= :responsibility where id=" . $id;
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);
            $req->bindValue(":responsibility", $Admin->getResponsibility());
            $req->execute();
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
    public static function UpdateSettingsAdmin($Admin, $id)
    {
        $sql = "UPDATE admin
         SET responsibility=:responsibility,email=:email,name=:name,phone_number=:phone_number,address=:address ,work=:work ,country=:country  where id=" . $id;
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);
            $req->bindValue(":responsibility", $Admin->getResponsibility());
            $req->bindValue(":email", $Admin->getEmail());
            $req->bindValue(":work", $Admin->getWork());
            $req->bindValue(":country", $Admin->getCountry());
            $req->bindValue(":name", $Admin->getName());
            $req->bindValue(":phone_number", $Admin->getPhoneNumber());
            $req->bindValue(":address", $Admin->getAddress());
            $req->execute();
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
    public static function UpdatePasswordAdmin($Admin, $id)
    {
        $sql = "UPDATE admin
         SET password=:password  where id=" . $id;
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);
            $req->bindValue(":password", $Admin->getPassword());
            $req->execute();
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
    public function getAdminByID($id)
    {
        $sql = "SELECT * FROM admin where id=" . $id;
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);
            $req->execute();
            $result = $req->fetch();
            return $result;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    public static function Delete($id)
    {
        $sql = "DELETE FROM admin where id=:id";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);
            $req->bindValue(':id', $id);
            $req->execute();
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
    public function forgetpassword($email)
    {
        $liste = "";
        $sql = "SELECT password FROM user where email='$email'";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            foreach ($liste as $list) {
                $list = ['password'];
                echo $list;
            }
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }




    public function Verifie($email, $password)
    {
        try {
            $sql = "SELECT * FROM admin WHERE email = :email AND password = :password";

            $db = config::getConnexion();
            $req = $db->prepare($sql);
            $req->bindParam(':email', $email);
            $req->bindParam(':password', $password);
            $req->execute();
            $result = $req->fetch();

            session_start();
            $_SESSION['name'] = $result['name'];
            $_SESSION['passwordAdmin'] = $result['password'];
            $_SESSION['idAdmin'] = $result['id'];
            $_SESSION['isAdmin'] = true;
            $_SESSION['email'] = $result['email'];
            $_SESSION['pictureAdmin'] = $result['picture'];
            
            header("Location: AdminProfile.php ");


            return $result;
        } catch (PDOException $e) {
        }
    }



    public function Display_Admin()
    {
        $sql = "SELECT * FROM  admin ";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function searchByName($arg1)
    {
        $sql = "SELECT * FROM admin where name like  '%" . $arg1 . "%'";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
}
