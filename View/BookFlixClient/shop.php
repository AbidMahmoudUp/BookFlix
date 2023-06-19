
<?php 
include('../../Core/productController.php');
$productDb = new ProductController();
session_start();

//display  products
$products=$productDb->readProducts();
if (isset($_SESSION['products']) && !empty($_SESSION['products'])) {
	// If the session variable is set and not empty
	$products = $_SESSION['products'];
	$_SESSION['products']=null;
  } else {
	// If the session variable is not set or empty
	$products=$productDb->readProducts();
  }




//filter products 
if(isset($_POST['filter-btn']))
{
    $categories= array();
    if(isset($_POST['books'])){ 
        array_push($categories, $_POST['books']);
    }
    if(isset($_POST['movies'])){ 
        array_push($categories, $_POST['movies']);
    } 
    if(isset($_POST['voice'])){ 
        array_push($categories, $_POST['voice']);
    } 
    if(isset($_POST['costumes'])){ 
        array_push($categories, $_POST['costumes']);
    } 

    $genres= array();
    if(isset($_POST['drama'])){ 
        array_push($genres, $_POST['drama']);
    }
    if(isset($_POST['fantasy'])){ 
        array_push($genres, $_POST['fantasy']);
    } 
    if(isset($_POST['comic'])){ 
        array_push($genres, $_POST['comic']);
    } 
    if(isset($_POST['mystery'])){ 
        array_push($genres, $_POST['mystery']);
    } 
    if(isset($_POST['classics'])){ 
        array_push($genres, $_POST['classics']);
    }
    if(isset($_POST['romance'])){ 
        array_push($genres, $_POST['romance']);
    } 
    if(isset($_POST['suspense'])){ 
        array_push($genres, $_POST['suspense']);
    } 
    if(isset($_POST['historical'])){ 
        array_push($genres, $_POST['historical']);
    }
    if(isset($_POST['action'])){ 
        array_push($genres, $_POST['action']);
    } 
    if(isset($_POST['fashion'])){ 
        array_push($genres, $_POST['fashion']);
    }

    $categories_str = implode(",", $categories);
    if(!empty($genres))
    {
        $genres_str = "'" . implode("','", $genres) . "'";
    }
    else
    {
        $genres_str ="";
    }
    $MinPrice=$_POST['min-value'];
    $MaxPrice=$_POST['max-value'];
    
    $products=$productDb->FilterProduct($categories_str,$genres_str,$MinPrice,$MaxPrice);
}
 


 

  if (!empty($_SESSION['idUser'])) {
    $iduser = $_SESSION['idUser'];
    $idProductArray = $productDb->getUserWishlist($iduser);
    if (isset($_POST['operation'])) {
        $productid = $_POST['productId'];
        if ($_POST['operation'] == "insert") {
            $productDb->addWishlist($iduser, $productid);
            $productCategory=$_POST['productCategory'];
            if($productCategory=="Voice Over")
              $productCategory="voiceover";
            $productDb->modifyCategoryLikes($productCategory,"inc");
        } 
        elseif ($_POST['operation'] == "delete") 
        {
            $productDb->deleteWishlist($iduser, $productid);
            $productCategory=$_POST['productCategory'];
            $productDb->modifyCategoryLikes($productCategory,"dec");

        }
    }
    
    $_SESSION['idProductArray']=$idProductArray;
 
     //gestion panier commande
     if(isset($_GET['idproduct']))
     {
       $_SESSION['idproduct']=$_GET['idproduct'];
       header('location:panier.php');

     }
    

 }
 else{
    $idProductArray=array();
 }




//tri
if(isset($_POST['sortBy'])) 
{
   $sortby = $_POST['sortBy'];
   $products = $productDb->SortProduct($sortby);

   // generate HTML for product cards
   $html = '';
   foreach ($products as $product) {
      $html .= '<div class="product-card" id="'.$product->getId().'">';
      $html .= '<div class="product-card-content">';
      $html .= '<img src="' . $productDb->selectPathImage($product->getImg1()) . '" alt="" class="product-card-img">';
      $html .= '<h1 class="product-card-title">' . $product->getName() . '</h1>';
      $html .= '<div class="product-card-body">';
      $html .= '<div class="product-card-star">';
      $html .= '<span class="rating-value">' . $product->getRating() . '</span>';
      $html .= '<span class="star">&#9733;</span>';
      $html .= '</div>';
      $html .= '<p class="product-card-price">' . $product->getPrice() . ' TND</p>';
      $html .= '</div>';
      $html .= '<div class="product-card-footer">';
      $html .= '<a  class="filter-btn product-btn product-btn-success">Buy Now</a>';
      $html .= '</div>';
      $html .= '<div class="hoverable">';
      $html .= '<ul>';
      $html .= '<li class="active">';
      $html .= '<a class="active" href="#"><i class="fa fa-heart ' . (in_array($product->getId(), $idProductArray) ? 'like-clicked' : '') . '"></i></a>';
      $html .= '</li>';
      $html .= '<li>';
      $html .= '<a href="#"><i class="fa fa-shopping-cart"></i></a>';
      $html .= '</li>';
      $html .= '<li>';
      $html .= '<a href="shop-details.php?product-id=' . $product->getId() . '"><i class="fa fa-eye"></i></a>';
      $html .= '</li>';
      $html .= '</ul>';
      $html .= '</div>';
      $html .= '</div>';
      $html .= '</div>';
   }

   // return the generated HTML
   echo $html;
   exit; // stop the script from further execution
}
 
    



?>



<!doctype html>
<html lang="en">

<head>
    <!--
    /   Multipurpose: Free Template by FreeHTML5.co
    /   Author: https://freehtml5.co
    /   Facebook: https://facebook.com/fh5co
    /   Twitter: https://twitter.com/fh5co
    -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Document title -->
    <title>Multipurpose</title>
    <!-- Stylesheets & Fonts -->
    <script src="https://kit.fontawesome.com/e326d32ffe.js" crossorigin="anonymous"></script>
    <link href="assets/css/bootstrap/bootstrap.min.css" rel="stylesheet">

    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i%7CRajdhani:400,600,700"
        rel="stylesheet">
    <!-- Plugins Stylesheets -->
    <link rel="stylesheet" href="assets/css/loader/loaders.css">
    <link rel="stylesheet" href="assets/css/card-products.css">
    <link rel="stylesheet" href="assets/css/font-awesome/font-awesome.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/aos/aos.css">
    <link rel="stylesheet" href="assets/css/swiper/swiper.css">
    <link rel="stylesheet" href="assets/css/lightgallery.min.css">
    <!-- Template Stylesheet -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Responsive Stylesheet -->
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="shop.css">
    <!--jQuery-->
    <script src="assets/js/jquery-3.3.1.js"></script></head>

<body>
    <!-- Loader Start -->
    <div class="css-loader">
        <div class="loader-inner line-scale d-flex align-items-center justify-content-center"></div>
    </div>
    <!-- Loader End -->
    <!-- Header Start -->
    
    <header class="position-absolute w-100" style="background-color: black;">
        
        <div class="container">
            
            <div class="top-header d-none d-sm-flex justify-content-between align-items-center">
                <div class="contact">
                    <a href="tel:+1234567890" class="tel"><i class="fa fa-phone" aria-hidden="true"></i>+1234567890</a>
                    <a href="mailto:info@yourmail.com"><i class="fa fa-envelope"
                            aria-hidden="true"></i>info@yourmail.com</a>
                </div>
                <nav class="d-flex aic">
                    <a href="#" class="login"><i class="fa fa-user" aria-hidden="true"></i>Login</a>
                    <ul class="nav social d-none d-md-flex">
                        <li><a href="https://www.facebook.com/fh5co" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    </ul>
                </nav>
            </div>
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="index.php"><img src="assets/images/LOGO4.png" alt="Multipurpose"></a>
                <div class="group d-flex align-items-center">
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation"><span
                            class="navbar-toggler-icon"></span></button>
                    <a class="login-icon d-sm-none" href="#"><i class="fa fa-user"></i></a>
                    <a class="cart" href="panier.php"><i class="fa fa-shopping-cart"></i></a>
                    
                </div>
                <a class="search-icon d-none d-md-block" href="#"><i class="fa fa-search"></i></a>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="aboutus.php">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="services.php">Services</a></li>
                        <!-- Condition of Connection is nesseary -->
                        <li class="nav-item"><a class="nav-link" href="wishlist.php">Wish list</a></li>
                        <li class="nav-item"><a class="nav-link" href="shop.php">Shop</a></li>
                        <li class="nav-item"><a class="nav-link" href="events.php">events</a></li>
                        <li class="nav-item"><a class="nav-link" href="contactus.php">Contact Us</a></li>
                    </ul>
                    <form action="searchProduct.php" method="post" class="bg-white search-form" method="get" id="searchform">
                        <div class="input-group">
                            <input class="field form-control" id="searchproduct" name="searchproduct" type="text" placeholder="Search">
                            <span class="input-group-btn">
                                <input class="submit btn btn-primary" id="searchsubmit" name="searchsubmit" type="submit"
                                    value="Search">
                            </span>
                        </div>
                    </form>
                </div>
            </nav>
        
        </div>
    </header>

    <!-- Header End -->
   <main class="shop-main">
      <div  class="container_shop">
        <form action="" method="post" id="filterform">
         <div class="filter_box" data-aos="fade-right" data-aos-delay="400">
               <div class="filter-header" data-aos="fade-up" data-aos-delay="600">
                   <h4 class="filter_title">Filter</h4>
                   <a href="#" class="filter-close label">
                    <i class="fas fa-times"></i>
                   </a>
               </div>
               <div class="filter-block" data-aos="fade-up" data-aos-delay="600">
                 <h4 class="filter_title"><a>Category</a></h4>
                 <ul>
                       <li>
                        <div class="checkbox-container">
                            <div class="custom-checkbox">
                              <input type="checkbox" id="books" name="books" value="<?php echo $productDb->get_category("books");?>">
                              <label for="books"></label>
                            </div>
                            <label class="category-type" for="books">Books</label>
                          </div>
                       </li>
                       <li>
                        <div class="checkbox-container">
                            <div class="custom-checkbox">
                              <input type="checkbox" id="movies" name="movies" value="<?php echo $productDb->get_category("movies");?>">
                              <label for="movies"></label>
                            </div>
                            <label class="category-type" for="movies">Movies</label>
                          </div>
                       </li>
                       <li>
                          <div class="checkbox-container">
                              <div class="custom-checkbox">
                                <input type="checkbox" id="voice" name="voice" value="<?php echo $productDb->get_category("voiceover");?>"> 
                                <label for="voice"></label>
                              </div>
                              <label class="category-type" for="voice">Voice Over</label>
                            </div>
                       </li>
                       <li>
                          <div class="checkbox-container">
                              <div class="custom-checkbox">
                                <input type="checkbox" id="costumes" name="costumes" value="<?php echo $productDb->get_category("cosplays");?>">
                                <label for="costumes"></label>
                              </div>
                              <label class="category-type" for="costumes">Character Costumes</label>
                            </div>
                       </li>
                  </ul>
              </div>
              <div class="filter-block" data-aos="fade-up" data-aos-delay="600">
                <h4 class="filter_title">Genres</h4>
                <ul>
                      <li>
                       <div class="checkbox-container">
                           <div class="custom-checkbox">
                             <input type="checkbox" id="drama" name="drama" value="drama">
                             <label for="drama"></label>
                           </div>
                           <label class="category-type" for="drama">Drama</label>
                         </div>
                      </li>
                      <li>
                       <div class="checkbox-container">
                           <div class="custom-checkbox">
                             <input type="checkbox" id="fantasy"name="fantasy" value="fantasy">
                             <label for="fantasy"></label>
                           </div>
                           <label class="category-type" for="fantasy">Fantasy</label>
                         </div>
                      </li>
                      <li>
                         <div class="checkbox-container">
                             <div class="custom-checkbox">
                               <input type="checkbox" id="comic"name="comic" value="comic" >
                               <label for="comic"></label>
                             </div>
                             <label class="category-type" for="comic">Comic</label>
                           </div>
                      </li>
                      <li>
                         <div class="checkbox-container">
                             <div class="custom-checkbox">
                               <input type="checkbox" id="mystery" name="mystery" value="mystery">
                               <label for="mystery"></label>
                             </div>
                             <label class="category-type" for="mystery">Mystery</label>
                           </div>
                      </li>
                      <li>
                        <div class="checkbox-container">
                            <div class="custom-checkbox">
                              <input type="checkbox" id="classics" name="classics" value="classics">
                              <label for="classics"></label>
                            </div>
                            <label class="category-type" for="classics">Classics</label>
                          </div>
                     </li>
                     <li>
                        <div class="checkbox-container">
                            <div class="custom-checkbox">
                              <input type="checkbox" id="romance" name="romance" value="romance">
                              <label for="romance"></label>
                            </div>
                            <label class="category-type" for="romance">Romance</label>
                          </div>
                     </li>
                     <li>
                        <div class="checkbox-container">
                            <div class="custom-checkbox">
                              <input type="checkbox" id="suspense" name="suspense" value="suspense">
                              <label for="suspense"></label>
                            </div>
                            <label class="category-type" for="suspense">Suspense and Thrillers</label>
                          </div>
                     </li>
                     <li>
                        <div class="checkbox-container">
                            <div class="custom-checkbox">
                              <input type="checkbox" id="historical" name="historical" value="historical">
                              <label for="historical"></label>
                            </div>
                            <label class="category-type" for="historical">Historical Fiction</label>
                          </div>
                     </li>
                     <li>
                        <div class="checkbox-container">
                            <div class="custom-checkbox">
                              <input type="checkbox" id="action" name="action" value="action">
                              <label for="action"></label>
                            </div>
                            <label class="category-type" for="action">Action</label>
                          </div>
                     </li>
                     <li>
                        <div class="checkbox-container">
                            <div class="custom-checkbox">
                              <input type="checkbox" id="fashion" name="fashion" value="fashion">
                              <label for="fashion"></label>
                            </div>
                            <label class="category-type" for="fashion">Fashion</label>
                          </div>
                     </li>
                 </ul>
             </div>
             <div class="filter-block" data-aos="fade-up" data-aos-delay="600">
                <h4 class="filter_title">Price</h4>
                <div class="value-container">
                    <label for="min-value">Min Value</label>
                    <input class="price-filter" type="number" name="min-value" id="min-value" placeholder="Min Value">
                    <br>
                    <label for="max-value">Max Value</label>
                    <input   class="price-filter" type="number" name="max-value" id="max-value" placeholder="Max Value">
                </div>
             </div>
             <button id="filter-btn" name="filter-btn" class="filter-btn  w-100 py-3" type="submit" onclick="checkPrices()"  >Filter</button>
         </div>
        </form> 
         <div class="shop-section">
            <div class="shop-header" data-aos="fade-left" data-aos-delay="500">
                <h1 class="shop-title">Shop</h1>
                <div class="sort-container">
                    <div class="item-filter desktophide">
                        <a href="#" class="filter-trigger label">
                            <i class="fas fa-bars nav-toggle"></i>
                            <span >Filter</span>
                        </a>
                    </div>
                    <div class="sort">
                        <label for="sort-by">Sort by : </label>
                        <select id="sort-by" id="sort-by">
                          <option value="">By Default</option>  
                          <option value="PHTL">Price: High to Low</option>
                          <option value="PLTH">Price: Low to High</option>
                          <option value="RHTL">Rating: High to Low</option>
                        </select>
                    </div>     
                </div>
            </div>
            <script>
              $(document).ready(function() {
                //tri 
                 $('#sort-by').change(function() {
                    var sortBy = $(this).val();
                    $.ajax({
                       url: 'shop.php',
                       type: 'POST',
                       data: { sortBy: sortBy },
                       success: function(response) {
                          var productList = $('.container-product .slider');
                          productList.empty(); // clear the existing products
                          productList.append(response); // append the returned HTML string to the product list
                       },

                       error: function(xhr, status, error) {
                          console.log(xhr.responseText);
                       }
                    });
                 });
                 //wishlist
                 $('.active').off('click').on('click', function(e) {
                      e.preventDefault(); // prevent the default link behavior
                      const productId = $(this).data('product-id');

                      const productCategory = $(this).data('category');
                      console.log("category=",productCategory);
                      if (productId === undefined) {
                         return;
                      }
                      console.log("Liked product ID:", productId);
                      const $icon = $(this).find('i.fa');
                      let operation="";
                     
                      if ($icon.hasClass('like-clicked')) {
                          $icon.removeClass('like-clicked');
                          operation="delete";
                          
                       } 
                      else {
                          $icon.addClass('like-clicked');
                          operation="insert";
                          
                        }
                        $.ajax({
                          url: 'shop.php',
                          type: 'POST',
                          data: { productId: productId, operation: operation, productCategory: productCategory },
                          success: function(response) {
                            console.log(response);
                          },
                          error: function(xhr, status, error) {
                            console.log(xhr.responseText);
                          }
                        });

                });

              });                   
           </script>

            <div class="container-product"data-aos="fade-up" data-aos-delay="600">
                <section class="slider" >

                    <?php foreach ($products as $product): ?>
                        <div class="product-card" id="<?php echo $product->getId(); ?>">
                            <div class="product-card-content" >
                                <img src="<?php echo $productDb->selectPathImage($product->getImg1()); ?>" alt="" class="product-card-img">
                                <h1 class="product-card-title"><?php echo $product->getName(); ?></h1>
                                <div class="product-card-body">
                                    <div class="product-card-star">
                                        <span class="rating-value"><?php echo $product->getRating(); ?></span>
                                        <span class="star">&#9733;</span>
                                    </div>
                                    <p class="product-card-price"><?php echo $product->getPrice().' TND'; ?></p>
                                </div>
                                <div class="product-card-footer">
                                    <a  class="filter-btn product-btn product-btn-success">Buy Now</a>
                               </div>
                            
                                <div class="hoverable">
                                    <ul>
                                        <li class="active">
                                            <a class="active" href="#" data-product-id="<?php echo $product->getId();?>" data-category="<?php echo $product->getCategory();?>"><i class="<?php if (in_array($product->getId(),$idProductArray)){echo "fa fa-heart like-clicked";} else { echo "fa fa-heart";}?>"></i></a>
                                        </li>
                                        <li>
                                            <a href="shop.php?idproduct=<?= $product->getId(); ?>"><i class="fa fa-shopping-cart"></i></a>
                                        </li>
                                        <li>
                                            <a href="shop-details.php?product-id=<?= $product->getId(); ?>"><i class="fa fa-eye"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> 
					<?php endforeach; ?> 

                </section>
            </div>
         </div>
      </div>
   </main>
    <!-- Call To Action 2 End -->
    <!-- Footer Start -->
    <footer>
        <!-- Widgets Start -->
        <div class="footer-widgets">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-xl-3">
                        <div class="single-widget contact-widget" data-aos="fade-up" data-aos-delay="0">
                            <h6 class="widget-tiltle">&nbsp;</h6>
                            <p>By subscribing to our mailing list you will always be update with the latest news from
                                us.
                            </p>
                            <div class="media">
                                <i class="fa fa-map-marker"></i>
                                <div class="media-body ml-3">
                                    <h6>Address</h6>
                                    Level 13, 2 Elizabeth St,<br>
                                    Melbourne, Victoria 3000 Australia
                                </div>
                            </div>
                            <div class="media">
                                <i class="fa fa-envelope-o"></i>
                                <div class="media-body ml-3">
                                    <h6>Have any questions?</h6>
                                    <a href="mailto:support@steelthemes.com">Support@Steelthemes.com</a>
                                </div>
                            </div>
                            <div class="media">
                                <i class="fa fa-phone"></i>
                                <div class="media-body ml-3">
                                    <h6>Call us & Hire us</h6>
                                    <a href="tel:+610791803458"> +61 (0) 7 9180 3458</a>
                                </div>
                            </div>
                            <div class="media">
                                <i class="fa fa-fax"></i>
                                <div class="media-body ml-3">
                                    <h6>Fax</h6>
                                    <a href="fax:911889047521432">(91) 188904752 1432</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="single-widget twitter-widget" data-aos="fade-up" data-aos-delay="200">
                            <h6 class="widget-tiltle">Fresh Tweets</h6>
                            <div class="media">
                                <i class="fa fa-twitter"></i>
                                <div class="media-body ml-3">
                                    <h6><a href="#">@Themes,</a> Html Version Out Now</h6>
                                    <span>10 Mins Ago</span>
                                </div>
                            </div>
                            <div class="media">
                                <i class="fa fa-twitter"></i>
                                <div class="media-body ml-3">
                                    <h6><a href="#">@Envato,</a> the best selling item of the day!</h6>
                                    <span>20 Mins Ago</span>
                                </div>
                            </div>
                            <div class="media">
                                <i class="fa fa-twitter"></i>
                                <div class="media-body ml-3">
                                    <h6><a href="#">@Collis,</a> We Planned to Update the Enavto Author Payment Method
                                        Soon!</h6>
                                    <span>10 Mins Ago</span>
                                </div>
                            </div>
                            <div class="media">
                                <i class="fa fa-twitter"></i>
                                <div class="media-body ml-3">
                                    <h6><a href="#">@SteelThemes,</a> Html Version Out Now</h6>
                                    <span>15 Mins Ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="single-widget recent-post-widget" data-aos="fade-up" data-aos-delay="400">
                            <h6 class="widget-tiltle">Latest Updates</h6>
                            <div class="media">
                                <a class="rcnt-img" href="#"><img src="assets/images/rcnt-post1.png"
                                        alt="Recent Post"></a>
                                <div class="media-body ml-3">
                                    <h6><a href="#">An engaging</a></h6>
                                    <p><i class="fa fa-user"></i>Mano <i class="fa fa-eye"></i> 202 Views</p>
                                </div>
                            </div>
                            <div class="media">
                                <a class="rcnt-img" href="#"><img src="assets/images/rcnt-post2.png"
                                        alt="Recent Post"></a>
                                <div class="media-body ml-3">
                                    <h6><a href="#">Statistics and analysis. The key to succes.</a></h6>
                                    <p><i class="fa fa-user"></i>Rosias <i class="fa fa-eye"></i> 20 Views</p>
                                </div>
                            </div>
                            <div class="media">
                                <a class="rcnt-img" href="#"><img src="assets/images/rcnt-post3.png"
                                        alt="Recent Post"></a>
                                <div class="media-body ml-3">
                                    <h6><a href="#">Envato Meeting turns into a photoshooting.</a></h6>
                                    <p><i class="fa fa-user"></i>Kien <i class="fa fa-eye"></i> 74 Views</p>
                                </div>
                            </div>
                            <div class="media">
                                <a class="rcnt-img" href="#"><img src="assets/images/rcnt-post4.png"
                                        alt="Recent Post"></a>
                                <div class="media-body ml-3">
                                    <h6><a href="#">An engaging embedded the video posts</a></h6>
                                    <p><i class="fa fa-user"></i>Robert <i class="fa fa-eye"></i> 48 Views</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="single-widget tags-widget" data-aos="fade-up" data-aos-delay="800">
                            <h6 class="widget-tiltle">Popular Tags</h6>
                            <a href="#">Amazing</a>
                            <a href="#">Design</a>
                            <a href="#">Photoshop</a>
                            <a href="#">Art</a>
                            <a href="#">Wordpress</a>
                            <a href="#">jQuery</a>
                        </div>
                        <div class="single-widget subscribe-widget" data-aos="fade-up" data-aos-delay="800">
                            <h6 class="widget-tiltle">Subscribe us</h6>
                            <p>Sign up for our mailing list to get latest updates and offers</p>
                            <form class="" method="get">
                                <div class="input-group">
                                    <input class="field form-control" name="subscribe" type="email"
                                        placeholder="Email Address">
                                    <span class="input-group-btn">
                                        <button type="submit" name="submit-mail"><i class="fa fa-check"></i></button>
                                    </span>
                                </div>
                            </form>
                            <p>We respect your privacy</p>
                            <ul class="nav social-nav">
                                <li><a href="https://www.facebook.com/fh5co" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Widgets End -->
        <!-- Foot Note Start -->
        <div class="foot-note">
            <div class="container">
                <div
                    class="footer-content text-center text-lg-left d-lg-flex justify-content-between align-items-center">
                    <p class="mb-0" data-aos="fade-right" data-aos-offset="0">&copy; 2019 All Rights Reserved. Design by <a href="https://freehtml5.co/multipurpose" target="_blank" class="fh5-link">FreeHTML5.co</a>.</p>
                    <p class="mb-0" data-aos="fade-left" data-aos-offset="0"><a href="#">Terms Of Use</a><a
                            href="#">Privacy & Security
                            Statement</a></p>
                </div>
            </div>
        </div>
        <!-- Foot Note End -->
    </footer>
    <!-- Footer Endt -->








    <!--Plugins-->
    <script src="assets/js/bootstrap.bundle.js"></script>
    <script src="assets/js/loaders.css.js"></script>
      <script src="assets/js/aos.js"></script>  
     <script src="assets/js/swiper.min.js"></script> 
     <script src="assets/js/lightgallery-all.min.js"></script> 
    <!--Template Script-->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/shop.js"></script>

</body>

</html>