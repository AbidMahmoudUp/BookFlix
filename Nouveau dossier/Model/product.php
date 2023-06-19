<?php 
class Product {
    private $id;
    private $name;
    private $reference;
    private $quantity;
    private $rating;
    private $price;
    private $img1;
    private $img2;
    private $img3;
    private $img4;
    private $description;
    private $category;
    private $genres;


    public function __construct($name, $reference, $quantity, $rating, $price, $img1, $img2, $img3, $img4, $description, $category,$genres) {
        $this->name = $name;
        $this->reference = $reference;
        $this->quantity = $quantity;
        $this->rating = $rating;
        $this->price = $price;
        $this->img1 = $img1;
        $this->img2 = $img2;
        $this->img3 = $img3;
        $this->img4 = $img4;
        $this->description = $description;
        $this->category = $category;
        $this->genres = $genres;
    }

    public function setId($id) {
         $this->id=$id;
    }
    public function getId() {
        return $this->id;
    }
    public function getName() {
        return $this->name;
    }

    public function getReference() {
        return $this->reference;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function getRating() {
        return $this->rating;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getImg1() {
        return $this->img1;
    }

    public function getImg2() {
        return $this->img2;
    }

    public function getImg3() {
        return $this->img3;
    }

    public function getImg4() {
        return $this->img4;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getCategory() {
        return $this->category;
    }
    public function getGenres() {
        return $this->genres;
    }
}

class Book extends Product {
    private $author;
    private $publisher;

    public function __construct($name, $reference, $quantity, $rating, $price, $img1, $img2, $img3, $img4, $description, $category,$genres, $author, $publisher) {
        parent::__construct($name, $reference, $quantity, $rating, $price, $img1, $img2, $img3, $img4, $description, $category,$genres);
        $this->author = $author;
        $this->publisher = $publisher;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getPublisher() {
        return $this->publisher;
    }
}

class Movie extends Product {
    private $director;
    private $publisher;

    public function __construct($name, $reference, $quantity, $rating, $price, $img1, $img2, $img3, $img4, $description, $category,$genres ,$director, $publisher) {
        parent::__construct($name, $reference, $quantity, $rating, $price, $img1, $img2, $img3, $img4, $description, $category,$genres);
        $this->director = $director;
        $this->publisher = $publisher;
    }

    public function getDirector() {
        return $this->director;
    }

    public function getPublisher() {
        return $this->publisher;
    }
}

class VoiceOver extends Product {
    private $format;
    private $duration;

    public function __construct($name, $reference, $quantity, $rating, $price, $img1, $img2, $img3, $img4, $description, $category,$genres, $format, $duration) {
        parent::__construct($name, $reference, $quantity, $rating, $price, $img1, $img2, $img3, $img4, $description, $category,$genres);
        $this->format = $format;
        $this->duration = $duration;
    }

    public function getFormat() {
        return $this->format;
    }

    public function getDuration() {
        return $this->duration;
    }
}


class Cosplay extends Product {
    private $size;
    private $color;

    public function __construct($name, $reference, $quantity, $rating, $price, $img1, $img2, $img3, $img4, $description, $category,$genres, $size, $color) {
        parent::__construct($name, $reference, $quantity, $rating, $price, $img1, $img2, $img3, $img4, $description, $category,$genres);
        $this->size = $size;
        $this->color = $color;
    }

    public function getSize() {
        return $this->size;
    }

    public function getColor() {
        return $this->color;
    }
}

class ProductsImages  {
    private $idimage;
    private $idproduct;
    private $imagenumber;
    private $imagepath;

    public function __construct($idproduct, $imagenumber, $imagepath ) {
        $this->idproduct = $idproduct;
        $this->imagenumber = $imagenumber;
        $this->imagepath = $imagepath;
    }

    public function getidimage() {
        return $this->idimage;
    }
    public function setidimage($idimage) {
      $this->idimage=$idimage;
    }

    public function setidproduct($idproduct) {
        $this->idproduct=$idproduct;
      }

    public function getidproduct() {
        return $this->idproduct;
    }

    public function getimagenumber() {
        return $this->imagenumber;
    }

    public function getimagepath() {
        return $this->imagepath;
    }
}



?>