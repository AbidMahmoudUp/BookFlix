<?php 
require_once(__DIR__ . '/../config.php');
include_once('C://xampp/htdocs/projet/Model/ClasseUser.php');

class CrudUser
{
    public static function insert($User)
    {
        $sql = "INSERT INTO user(id,username,password,email,phone_number,status) 
        VALUES ('',:username,:password,:email,:phone_number,'0')  ";
        $db = config::getConnexion();
        try
        {
            $req=$db->prepare($sql);
            $req->bindValue(":username", $User->getUsername());
            $req->bindValue(":password", $User->getPassword());
            $req->bindValue(":email", $User->getEmail());
            $req->bindValue(":phone_number", $User->getPhoneNumber());
            $req->execute();
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }
    public static function getUserById($id)
    {
        $sql = "SELECT * FROM user where id=".$id;
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
    public static function Update($User,$id)
    {
        $sql = "UPDATE user
         SET `username`= :username, `password`= :password, `phone_number`= :phone_number where id=:id";
         $db = config::getConnexion();
        try
        {
            $req=$db->prepare($sql);
            $req->bindValue(":username", $User->getUsername());
            $req->bindValue(":password", $User->getPassword());
            $req->bindValue(":id",$id);
            $req->bindValue(":phone_number", $User->getPhoneNumber());
            $req->execute();
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }
    public static function Delete($id)
    {
        $sql = "DELETE FROM user where id=:id";
        $db = config::getConnexion();
        try{
             $req=$db->prepare($sql);
             $req->bindValue(':id',$id);
             $req->execute();
            }
       catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
        }
        public function forgetpassword($email)
        {
            $liste="";
            $sql = "SELECT password FROM user where email='$email'";
            $db = config::getConnexion();
            try{
                    $liste = $db->query($sql);
                    foreach($liste as $list)
                    {
                        $list=['password'];
                        echo $list;
                    }
                        }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
                                }  
        }



        public function Verifie($email, $password)
        {
            try {
                $sql = "SELECT * FROM user WHERE email = :email";
                $db = config::getConnexion();
                $req = $db->prepare($sql);
                $req->bindParam(':email', $email);
                $req->execute();
                $result = $req->fetch();
                        
                $hashed_password = $result['password'];
                $input_hashed_password = md5($password);
                echo $hashed_password;
                echo "<br>";
                echo $input_hashed_password;
                $originalString =$input_hashed_password;
                $newString = substr($originalString, 0, 20);
                echo $newString;
                if ($newString == $hashed_password) {
                    $_SESSION['Username'] = $result['username'];
                    $_SESSION['idUser'] = $result['id'];
                    $_SESSION['Phone_number'] = $result['phone_number'];
                    $_SESSION['status'] = $result['status'];
                    header('Location: ../View/BookFlixClient/index.php');
                    return true;
                }
                        
                return false;
            } catch (PDOException $e) {
                // Handle exceptions here
            }
        }
        
      //  Note: It is strongly recommended to use a more secure hashing algorithm like bcrypt or Argon2 instead of MD5 for password storage.
        
        
        
        
        
     public static function Update_Password($email)
     {
        $sql = "UPDATE user SET password = :password WHERE email = :email";
         $db = config::getConnexion();
        try
        {
            $req=$db->prepare($sql);
            
            $req->bindValue(":password","202cb962ac59075b964b");
            $req->bindValue(":email", $email);
            $req->execute();
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
     }   
    
    

    public function Display_users()
    {
        $sql="SELECT * FROM  user ";
        $db=config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

     public function searchByUsername($arg1)
    {
        $sql="SELECT * FROM user where username like  '%".$arg1."%'" ;
        $db=config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }

    }
}  
    
    
?>