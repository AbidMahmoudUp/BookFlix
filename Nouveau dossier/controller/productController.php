<?php 
require_once(__DIR__ . '/../config.php');
include(__DIR__ . '/../Model/product.php');



class ProductController
{
    
    private $pdo;
    public function __construct() {
        $this->pdo = config::getConnexion();

    }

 //----------------------------------->add product(book,movie,voiceOver,cosplays)idcategory
    public function AddProduct($product)
    {
      try{
         $query=$this->pdo->prepare('INSERT INTO Product (name, reference, quantity, rating, price, img1, img2, img3, img4, description, idcategory, genres)
         VALUES (:name, :reference, :quantity, :rating, :price, :img1, :img2, :img3, :img4, :description, :idcategory, :genres)');
         $query->bindValue(':name',$product->getName());
         $query->bindValue(':reference',$product->getReference());
         $query->bindValue(':quantity',$product->getQuantity());
         $query->bindValue(':rating',$product->getRating());
         $query->bindValue(':price',$product->getPrice());
         $query->bindValue(':img1',$product->getImg1());
         $query->bindValue(':img2',$product->getImg2());
         $query->bindValue(':img3',$product->getImg3());
         $query->bindValue(':img4',$product->getImg4());
         $query->bindValue(':description',$product->getDescription());
         $query->bindValue(':idcategory',$product->getCategory());
         $query->bindValue(':genres',$product->getGenres());
         $query->execute();
       }
      catch(PDOException $e)
      {
       $e->getMessage();
      }

      return $this->pdo->lastInsertId();
    }


    public function AddBook($book)
    {
      try{
         $bookid=$this->AddProduct($book);
         $query=$this->pdo->prepare('INSERT INTO Book (id, author, publisher)
         VALUES (:id, :author, :publisher)');
         $query->bindValue(':id',$bookid);
         $query->bindValue(':author',$book->getAuthor());
         $query->bindValue(':publisher',$book->getPublisher());
         $query->execute();
       }
      catch(PDOException $e)
      {
       $e->getMessage();
      }
      return $bookid;

    }

    public function AddCosplay($Cosplay)
    {
      try{
         $Cosplayid=$this->AddProduct($Cosplay);
         $query=$this->pdo->prepare('INSERT INTO Cosplay (id, size, color)
         VALUES (:id, :size, :color)');
         $query->bindValue(':id',$Cosplayid);
         $query->bindValue(':size',$Cosplay->getSize());
         $query->bindValue(':color',$Cosplay->getColor());
         $query->execute();
       }
      catch(PDOException $e)
      {
       $e->getMessage();
      }
      return $Cosplayid;
    }

    public function AddMovie ($Movie)
    {
      try{
         $Movieid=$this->AddProduct($Movie);
         $query=$this->pdo->prepare('INSERT INTO Movie  (id, director , publisher)
         VALUES (:id, :director, :publisher)');
         $query->bindValue(':id',$Movieid);
         $query->bindValue(':director',$Movie->getDirector());
         $query->bindValue(':publisher',$Movie->getPublisher());
         $query->execute();
       }
      catch(PDOException $e)
      {
       $e->getMessage();
      }
      return $Movieid;
    }

    public function AddVoiceOver($VoiceOver)
    {
      try{
         $VoiceOverid=$this->AddProduct($VoiceOver);
         $query=$this->pdo->prepare('INSERT INTO VoiceOver (id, format, duration)
         VALUES (:id, :format, :duration)');
         $query->bindValue(':id',$VoiceOverid);
         $query->bindValue(':format',$VoiceOver->getFormat());
         $query->bindValue(':duration',$VoiceOver->getDuration());
         $query->execute();
       }
      catch(PDOException $e)
      {
       $e->getMessage();
      }
      return $VoiceOverid;
    }
 
   //----------------------------------->display product(book,movie,voiceOver,cosplays)
   
        public function readProducts() 
       {
          $sql = "SELECT p.*, b.author, b.publisher, m.director, m.publisher, c.size, c.color, v.format, v.duration 
          FROM Product p 
          LEFT JOIN Book b ON p.id = b.id 
          LEFT JOIN Movie m ON p.id = m.id 
          LEFT JOIN Cosplay c ON p.id = c.id 
          LEFT JOIN VoiceOver v ON p.id = v.id
          "  ;
          $stmt=$this->pdo->prepare($sql);
          $stmt->execute();
          $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
          $products = array();
          foreach ($results as $row) {
           $product = new Product($row['name'], $row['reference'], $row['quantity'], $row['rating'], $row['price'], $row['img1'], $row['img2'], $row['img3'], $row['img4'], $row['description'], $row['idcategory'], $row['genres']);
             $namecategory=$this->get_Idcategory($row['idcategory']);
            switch ($namecategory) {
                  case "books":
                      $product = new Book($row['name'], $row['reference'], $row['quantity'], $row['rating'], $row['price'], $row['img1'], $row['img2'], $row['img3'], $row['img4'], $row['description'], "Books", $row['genres'], $row['author'], $row['publisher']);
                      break;
                  case "movies" :
                      $product = new Movie($row['name'], $row['reference'], $row['quantity'], $row['rating'], $row['price'], $row['img1'], $row['img2'], $row['img3'], $row['img4'], $row['description'], "Movies", $row['genres'], $row['director'], $row['publisher']);
                      break;
                  case "cosplays":
                      $product = new Cosplay($row['name'], $row['reference'], $row['quantity'], $row['rating'], $row['price'], $row['img1'], $row['img2'], $row['img3'], $row['img4'], $row['description'], "Cosplays", $row['genres'], $row['size'], $row['color']);
                      break;
                  case "voiceover":
                      $product = new VoiceOver($row['name'], $row['reference'], $row['quantity'], $row['rating'], $row['price'], $row['img1'], $row['img2'], $row['img3'], $row['img4'], $row['description'], "Voice Over", $row['genres'], $row['format'], $row['duration']);
                      break;
                  default:
                      // handle invalid type
                      break;
              }
              $product->setId($row['id']);
              $products[] = $product;
          }
         return $products;
       }

      public function readBook($id) {
       $sql = "SELECT author, publisher FROM Book WHERE id = :id";
       $stmt = $this->pdo->prepare($sql);
       $stmt->bindValue(':id',$id);
       $stmt->execute();
       $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
       return $results;
      }

     public function readmovie($id) {
        $sql = "SELECT director, publisher FROM movie WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id',$id);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
      }
    public function readvoice($id) {
      $sql = "SELECT format,duration FROM voiceover WHERE id = :id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':id',$id);
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $results;
  }

  public function readcosplay ($id) {
    $sql = "SELECT size, color FROM cosplay WHERE id = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
 }
      

    //-------------------------------->update product(book,movie,voiceover,cosplay)
    public function UpdateProduct($product)
    {
      try{
        $query = $this->pdo->prepare('UPDATE Product SET 
        name = :name, 
        reference = :reference, 
        quantity = :quantity, 
        rating = :rating, 
        price = :price, 
        img1 = :img1, 
        img2 = :img2, 
        img3 = :img3, 
        img4 = :img4, 
        description = :description, 
        idcategory = :idcategory, 
        genres = :genres 
         WHERE id = :id');    
         $query->bindValue(':id',$product->getId());
         $query->bindValue(':name',$product->getName());
         $query->bindValue(':reference',$product->getReference());
         $query->bindValue(':quantity',$product->getQuantity());
         $query->bindValue(':rating',$product->getRating());
         $query->bindValue(':price',$product->getPrice());
         $query->bindValue(':img1',$product->getImg1());
         $query->bindValue(':img2',$product->getImg2());
         $query->bindValue(':img3',$product->getImg3());
         $query->bindValue(':img4',$product->getImg4());
         $query->bindValue(':description',$product->getDescription());
         $query->bindValue(':idcategory',$product->getCategory());
         $query->bindValue(':genres',$product->getGenres());
         $query->execute();
       }
      catch(PDOException $e)
      {
       $e->getMessage();
      }
    }    


    public function UpdateBook($book)
    {
         $this->UpdateProduct($book);
         //delete  
         $this->deleteBook($book->getId());
         $this->deleteMovie($book->getId());
         $this->deleteCosplay($book->getId());
         $this->deleteVoiceOver($book->getId());
         //insert in book table 
         $this->AddBook2($book);


    }

    public function UpdateCosplay($Cosplay)
    {
         $this->UpdateProduct($Cosplay);
         //delete  
         $this->deleteBook($Cosplay->getId());
         $this->deleteMovie($Cosplay->getId());
         $this->deleteCosplay($Cosplay->getId());
         $this->deleteVoiceOver($Cosplay->getId());
         //insert in Cosplay table 
         $this->AddCosplay2($Cosplay);      

    }

    public function UpdateMovie ($Movie)
    {
         $this->UpdateProduct($Movie);
         //delete  
         $this->deleteBook($Movie->getId());
         $this->deleteMovie($Movie->getId());
         $this->deleteCosplay($Movie->getId());
         $this->deleteVoiceOver($Movie->getId());
         //insert in Movie table 
         $this->AddMovie2($Movie);
    }

    public function UpdateVoiceOver($VoiceOver)
    {
         $this->UpdateProduct($VoiceOver);
         //delete  
         $this->deleteBook($VoiceOver->getId());
         $this->deleteMovie($VoiceOver->getId());
         $this->deleteCosplay($VoiceOver->getId());
         $this->deleteVoiceOver($VoiceOver->getId());
         //insert in VoiceOver table 
         $this->AddVoiceOver2($VoiceOver);
    }    

   //-------------------------------->delete product(book,movie,voiceover,cosplay)

     public function deleteBook($id) {
      try {
        $sql = "DELETE FROM book WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
      } catch (PDOException $e) {
        echo "Error deleting book: " . $e->getMessage();
      }
    }

    public function deleteMovie($id) {
      try {
        $sql = "DELETE FROM movie WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
      } catch (PDOException $e) {
        echo "Error deleting movie: " . $e->getMessage();
      }
    }

    public function deleteCosplay($id) {
      try {
          $sql = "DELETE FROM cosplay WHERE id=:id";
          $stmt = $this->pdo->prepare($sql);
          $stmt->bindValue(':id', $id);
          $stmt->execute();
      } catch (PDOException $e) {
          echo "Error deleting cosplay: " . $e->getMessage();
      }
  }

    public function deleteVoiceOver($id) {
      try {
        $sql = "DELETE FROM voiceover WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
      } catch (PDOException $e) {
        echo "Error deleting cosplay: " . $e->getMessage();
      }
    }

    public function deleteProduct($id)
{
    try {
        $this->pdo->beginTransaction();
        
        $sql = "DELETE Product, Book, Movie, VoiceOver, Cosplay FROM Product 
                LEFT JOIN Book ON Product.id = Book.id
                LEFT JOIN Movie ON Product.id = Movie.id
                LEFT JOIN VoiceOver ON Product.id = VoiceOver.id
                LEFT JOIN Cosplay ON Product.id = Cosplay.id
                WHERE Product.id = :id";
                
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $this->pdo->commit();

        return true;
    } catch(PDOException $e) {
        $this->pdo->rollback();
        echo "Error: " . $e->getMessage();
        return false;
    }
}

//-------------------------------->FILTER product(book,movie,voiceover,cosplay)
public function FilterProduct($categories_str,$genres_str,$MinPrice,$MaxPrice)
{
  $query = "SELECT p.*, b.author, b.publisher, m.director, m.publisher, c.size, c.color, v.format, v.duration 
  FROM Product p 
  LEFT JOIN Book b ON p.id = b.id 
  LEFT JOIN Movie m ON p.id = m.id 
  LEFT JOIN Cosplay c ON p.id = c.id 
  LEFT JOIN VoiceOver v ON p.id = v.id where 1 
  "  ;

  if (!empty($MinPrice)) {
    $query .= " AND p.price >= ".$MinPrice." ";
  }
  
  if (!empty($MaxPrice)) {
    $query .= " AND p.price <= ".$MaxPrice." ";
  }
  
  if (!empty($genres_str)) {
    $query .= " AND p.genres IN(".$genres_str.") ";
  }
  
  if (!empty($categories_str)) {
    $query .= " AND p.idcategory IN(" . $categories_str . ") ";
  }

  $stmt=$this->pdo->prepare($query);
  $stmt->execute();
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $products = array();
  foreach ($results as $row) {
   $product = new Product($row['name'], $row['reference'], $row['quantity'], $row['rating'], $row['price'], $row['img1'], $row['img2'], $row['img3'], $row['img4'], $row['description'], $row['idcategory'], $row['genres']);
     $namecategory=$this->get_Idcategory($row['idcategory']);
    switch ($namecategory) {
          case "books":
              $product = new Book($row['name'], $row['reference'], $row['quantity'], $row['rating'], $row['price'], $row['img1'], $row['img2'], $row['img3'], $row['img4'], $row['description'], "Books", $row['genres'], $row['author'], $row['publisher']);
              break;
          case "movies" :
              $product = new Movie($row['name'], $row['reference'], $row['quantity'], $row['rating'], $row['price'], $row['img1'], $row['img2'], $row['img3'], $row['img4'], $row['description'], "Movies", $row['genres'], $row['director'], $row['publisher']);
              break;
          case "cosplays":
              $product = new Cosplay($row['name'], $row['reference'], $row['quantity'], $row['rating'], $row['price'], $row['img1'], $row['img2'], $row['img3'], $row['img4'], $row['description'], "Cosplays", $row['genres'], $row['size'], $row['color']);
              break;
          case "voiceover":
              $product = new VoiceOver($row['name'], $row['reference'], $row['quantity'], $row['rating'], $row['price'], $row['img1'], $row['img2'], $row['img3'], $row['img4'], $row['description'], "Voice Over", $row['genres'], $row['format'], $row['duration']);
              break;
          default:
              // handle invalid type
              break;
      }
      $product->setId($row['id']);
      $products[] = $product;
  }
 return $products;
  
  
}

public function searchProduct($name) {
  try {
      $stmt = $this->pdo->prepare("SELECT * FROM product WHERE name LIKE ?");
      $stmt->execute(['%' . $name . '%']);
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $products = array();
      foreach ($results as $row) {
       $product = new Product($row['name'], $row['reference'], $row['quantity'], $row['rating'], $row['price'], $row['img1'], $row['img2'], $row['img3'], $row['img4'], $row['description'], $row['idcategory'], $row['genres']);
         $namecategory=$this->get_Idcategory($row['idcategory']);
        switch ($namecategory) {
              case "books":
                  $product = new Book($row['name'], $row['reference'], $row['quantity'], $row['rating'], $row['price'], $row['img1'], $row['img2'], $row['img3'], $row['img4'], $row['description'], "Books", $row['genres'], $row['author'], $row['publisher']);
                  break;
              case "movies" :
                  $product = new Movie($row['name'], $row['reference'], $row['quantity'], $row['rating'], $row['price'], $row['img1'], $row['img2'], $row['img3'], $row['img4'], $row['description'], "Movies", $row['genres'], $row['director'], $row['publisher']);
                  break;
              case "cosplays":
                  $product = new Cosplay($row['name'], $row['reference'], $row['quantity'], $row['rating'], $row['price'], $row['img1'], $row['img2'], $row['img3'], $row['img4'], $row['description'], "Cosplays", $row['genres'], $row['size'], $row['color']);
                  break;
              case "voiceover":
                  $product = new VoiceOver($row['name'], $row['reference'], $row['quantity'], $row['rating'], $row['price'], $row['img1'], $row['img2'], $row['img3'], $row['img4'], $row['description'], "Voice Over", $row['genres'], $row['format'], $row['duration']);
                  break;
              default:
                  // handle invalid type
                  break;
          }
          $product->setId($row['id']);
          $products[] = $product;
      }
     return $products;    
  } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
      return null;
  }
}

public function SortProduct($sortBy) 
{
  try {
      $query = "SELECT p.*, b.author, b.publisher, m.director, m.publisher, c.size, c.color, v.format, v.duration 
      FROM Product p 
      LEFT JOIN Book b ON p.id = b.id 
      LEFT JOIN Movie m ON p.id = m.id 
      LEFT JOIN Cosplay c ON p.id = c.id 
      LEFT JOIN VoiceOver v ON p.id = v.id where 1 ";
      if($sortBy=="PHTL")
      {
        $query .= " ORDER BY price DESC";
      }
      if($sortBy=="PLTH")
      {
        $query .= " ORDER BY price ASC";
      }
      if($sortBy=="RHTL")
      {
        $query .= " ORDER BY rating DESC";
      }
      $stmt = $this->pdo->prepare($query);
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $products = array();
      foreach ($results as $row) {
       $product = new Product($row['name'], $row['reference'], $row['quantity'], $row['rating'], $row['price'], $row['img1'], $row['img2'], $row['img3'], $row['img4'], $row['description'], $row['idcategory'], $row['genres']);
         $namecategory=$this->get_Idcategory($row['idcategory']);
        switch ($namecategory) {
              case "books":
                  $product = new Book($row['name'], $row['reference'], $row['quantity'], $row['rating'], $row['price'], $row['img1'], $row['img2'], $row['img3'], $row['img4'], $row['description'], "Books", $row['genres'], $row['author'], $row['publisher']);
                  break;
              case "movies" :
                  $product = new Movie($row['name'], $row['reference'], $row['quantity'], $row['rating'], $row['price'], $row['img1'], $row['img2'], $row['img3'], $row['img4'], $row['description'], "Movies", $row['genres'], $row['director'], $row['publisher']);
                  break;
              case "cosplays":
                  $product = new Cosplay($row['name'], $row['reference'], $row['quantity'], $row['rating'], $row['price'], $row['img1'], $row['img2'], $row['img3'], $row['img4'], $row['description'], "Cosplays", $row['genres'], $row['size'], $row['color']);
                  break;
              case "voiceover":
                  $product = new VoiceOver($row['name'], $row['reference'], $row['quantity'], $row['rating'], $row['price'], $row['img1'], $row['img2'], $row['img3'], $row['img4'], $row['description'], "Voice Over", $row['genres'], $row['format'], $row['duration']);
                  break;
              default:
                  // handle invalid type
                  break;
          }
          $product->setId($row['id']);
          $products[] = $product;
      }
     return $products;    
  } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
      return null;
  }
}














  //other functions

   public function getProductById($productId, $productList) {
      foreach($productList as $product) {
          if($product->getId() == $productId) {
              return $product;
          }
      }
      return null; // If the product is not found
   }

   public function get_category($category)
   {
       try {
           $sql = "SELECT idcategory FROM category WHERE namecategory = :namecategory";
           $stmt = $this->pdo->prepare($sql);
           $stmt->bindValue(':namecategory', $category);
           $stmt->execute();
           $result = $stmt->fetch(PDO::FETCH_ASSOC);
           return $result['idcategory'];
       } catch (PDOException $e) {
           throw new Exception($e->getMessage());
       }
   }
   public function get_Idcategory($category)
   {
       try {
           $sql = "SELECT namecategory FROM category WHERE idcategory = :idcategory";
           $stmt = $this->pdo->prepare($sql);
           $stmt->bindValue(':idcategory', $category);
           $stmt->execute();
           $result = $stmt->fetch(PDO::FETCH_ASSOC);
           return $result['namecategory'];
       } catch (PDOException $e) {
           throw new Exception($e->getMessage());
       }
   }
   
   public function getLastInsertedProductId() {
    $sql = "SELECT LAST_INSERT_ID() as id FROM product";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['id'];
  }
  
  

//-------------------------------------------images class crud
public function addProductImage($productImage) {
  try {
      $sql = "INSERT INTO productimage (idproduct,imagenumber, imagepath) VALUES (:idproduct,:imagenumber, :imagepath)";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':idproduct', $productImage->getidproduct());
      $stmt->bindValue(':imagenumber', $productImage->getimagenumber());
      $stmt->bindValue(':imagepath', $productImage->getimagepath());
      $stmt->execute();
      $lastInsertedId = $this->pdo->lastInsertId();
      $productImage->setidimage($lastInsertedId);
      return $lastInsertedId;
  } catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
      return -1;
  }
}

public function updateProductImage($productImage) {
  try {
      $sql = "UPDATE productimage SET idproduct=:idproduct, imagenumber=:imagenumber, imagepath=:imagepath WHERE idimage=:idimage";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':idimage', $productImage->getidimage());
      $stmt->bindValue(':idproduct', $productImage->getidproduct());
      $stmt->bindValue(':imagenumber', $productImage->getimagenumber());
      $stmt->bindValue(':imagepath', $productImage->getimagepath());
      $stmt->execute();
      $lastInsertedId = $this->pdo->lastInsertId();
      $productImage->setidimage($lastInsertedId);
      return $lastInsertedId;
  } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
  }
}

public function deleteProductImages($idproduct) {
  $sql = "DELETE FROM productimage WHERE idproduct = :idproduct";
  $stmt = $this->pdo->prepare($sql);
  $stmt->bindValue(':idproduct', $idproduct);
  $stmt->execute();
}

public function selectPathImage($id_img) {
  $sql = "SELECT imagepath FROM productimage WHERE idimage = :id_img";
  $stmt = $this->pdo->prepare($sql);
  $stmt->bindValue(':id_img', $id_img);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  return $result['imagepath'];
}

// insert products part 2
public function AddBook2($book)
{
  try{
     $query=$this->pdo->prepare('INSERT INTO Book (id, author, publisher)
     VALUES (:id, :author, :publisher)');
     $query->bindValue(':id',$book->getId());
     $query->bindValue(':author',$book->getAuthor());
     $query->bindValue(':publisher',$book->getPublisher());
     $query->execute();
   }
  catch(PDOException $e)
  {
   $e->getMessage();
  }
}

public function AddCosplay2($Cosplay)
{
  try{
     $query=$this->pdo->prepare('INSERT INTO Cosplay (id, size, color)
     VALUES (:id, :size, :color)');
     $query->bindValue(':id',$Cosplay->getId());
     $query->bindValue(':size',$Cosplay->getSize());
     $query->bindValue(':color',$Cosplay->getColor());
     $query->execute();
   }
  catch(PDOException $e)
  {
   $e->getMessage();
  }
}

public function AddMovie2($Movie)
{
  try{
     $query=$this->pdo->prepare('INSERT INTO Movie  (id, director , publisher)
     VALUES (:id, :director, :publisher)');
     $query->bindValue(':id',$Movie->getId());
     $query->bindValue(':director',$Movie->getDirector());
     $query->bindValue(':publisher',$Movie->getPublisher());
     $query->execute();
   }
  catch(PDOException $e)
  {
   $e->getMessage();
  }
}

public function AddVoiceOver2($VoiceOver)
{
  try{ 
     $query=$this->pdo->prepare('INSERT INTO VoiceOver (id, format, duration)
     VALUES (:id, :format, :duration)');
     $query->bindValue(':id',$VoiceOver->getId());
     $query->bindValue(':format',$VoiceOver->getFormat());
     $query->bindValue(':duration',$VoiceOver->getDuration());
     $query->execute();
   }
  catch(PDOException $e)
  {
   $e->getMessage();
  }

}


//-------------------------------------------category  crud
public function addCategory($namecategory) {
  try {
      $sql = "INSERT INTO category (namecategory) VALUES (:name)";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':name', $namecategory);
      $stmt->execute();
      return true;
  } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
      return false;
  }
}
public function displayCategories()
{
    try {
        $query = "SELECT * FROM category";
        $result = $this->pdo->query($query);
        return $result;
    } catch (PDOException $e) {
        echo "Error displaying categories: " . $e->getMessage();
    }
}
public function modifyCategory($id, $name) {
  try {
    $stmt = $this->pdo->prepare("UPDATE category SET namecategory = :name WHERE idcategory = :id");
    $stmt->bindValue(":name", $name);
    $stmt->bindValue(":id", $id);
    $stmt->execute();
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}
public function deleteCategory($id) {
  try {
      $stmt = $this->pdo->prepare("DELETE FROM category WHERE idcategory = ?");
      $stmt->execute([$id]);
      return true;
  } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
      return false;
  }
}

public function searchCategory($name) {
  try {
      $stmt = $this->pdo->prepare("SELECT * FROM category WHERE namecategory LIKE ?");
      $stmt->execute(['%' . $name . '%']);
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $result;
  } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
      return null;
  }
}


}


?>