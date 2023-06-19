


<?php 
include('../../Core/EventC.php');
$EventC = new EventC();
session_start();
//display event
if(isset($_GET['eventid']))
{
    $event=$EventC->getEventsById($_GET['eventid']);

    if(isset($_POST['send']))
    {
        if (!empty($_SESSION['idUser'])) 
        {
            $iduser = $_SESSION['idUser'];
            $idevent=$_GET['eventid'];
            $comment=$_POST['comment'];
            $EventC->addEventReview($iduser, $idevent, $comment);
        }    
    }
}
$liste=$EventC->getAllEventReviewsWithUsernames();





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
    <link rel="stylesheet" href="./assets/swiper/swiper.css" />
    <link rel="stylesheet" href="./assets/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="./assets/css/shop-details.css">
    <link rel="stylesheet" href="./assets/css/events.css">



</head>

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
  <main class="shop-details" style="height :1900px;">
    <div class = "card-wrapper" style="display:block;" >
        <div class = "card">
          <!-- card left -->
          <div class = "product-imgs" data-aos="fade-down" data-aos-delay="400">
            <div class = "img-display">
              <div class = "img-showcase">
              <img src="<?php echo $event[0]["image"];?>" alt="Event image">
              </div>
            </div>
          </div>
          <!-- card right -->
          <div class = "product-content"data-aos="fade-up" data-aos-delay="400">
            <h2 class = "product-title" style="color:#17537a;" data-aos="fade-right" data-aos-delay="600"><?php echo $event[0]["nomevent"];?></h2>
  
            <div class = "product-price"data-aos="fade-right" data-aos-delay="600">
              <p class = "price" style="color:#17537a;">Price: <span style="color:black;"> <?php echo $event[0]["prix"]; ?> TND</span></p>
            </div>
  
            <div class = "product-detail"data-aos="fade-left" data-aos-delay="600">
              <h2 >about this item: </h2>
              <p id="description" style="max-width: 350px;"><?php echo $event[0]["description"]; ?></p>
              <ul>
                <li>Type Event:  <span><?php echo $event[0]["nametypeevent"]; ?></span></li>
                <li>Location:  <span><?php echo $event[0]["localisation"]; ?></span></li>
                <li>Date and Time:  <span><?php echo $event[0]["dateheure"]; ?></span></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="review-comment">
         <div class="comments" data-aos="fade-left" data-aos-delay="500">
            <h2>Comments</h2>
            <form method="post" action="">
             <label for="comment">Comment</label>
              <textarea id="comment" name="comment" required></textarea>
              <button class="btn btn-primary" type="submit" name="send" id="send">Send</button>
            </form>
            <div class="comment-list">
           <!-- Comments will be dynamically added here -->
            </div>
         </div>
          <div class="comment-list" data-aos="fade-up" data-aos-delay="600">
          <?php foreach ($liste as $row): ?>
             <div class="comment comment-card"">
              <div class="comment-user">
                 <img src="https://via.placeholder.com/50x50" alt="User Avatar">
                 <div class="comment-details">
                   <h4><?php echo $row['name']; ?></h4>
                 </div>
             </div>
               <div class="comment-text">
                 <p><?php echo $row['comment']; ?></p>
               </div>
            </div>
           </div>
          <?php endforeach; ?> 

       

        </div>
        
     </div>
 <style>
        .comments {
    margin-top: 30px;
    background-color: #f5f5f5;
    padding: 30px;
    border-radius: 5px;
    max-width:80%;
    font-size: 3.5em;
    }
  
  .comments h2 {
    margin-bottom: 20px;
    text-align: left;
  }
  

  
  .comments label {
    margin-top: 10px;
    font-size: 20px;
    font-weight: bold;
    color:red;
    opacity: 60%;
  }
  
  .comments input,
  .comments textarea {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    margin-bottom: 15px;
    border: none;
    border-radius: 5px;
     color:  #a12b2b;
    opacity:70%;
    font-size: 16px;
    border: 1px solid red;
    max-width: 700px;
    font-weight :700px;
    background-color: transparent;

  }
  

  


  .comment h3 {
    font-size: 18px;
    margin-bottom: 10px;
  }
  
  .comment p {
    font-size: 16px;
    margin-bottom: 15px;
  }

  .comment-list {
    margin-top: 30px;
    background-color: transparent;

  }
  
  .comment {
    display: flex;
    flex-direction: column;
    background-color: transparent;

    padding: 20px;
    border-radius: 5px;
    margin-bottom: 20px;
  }
  
  .comment-user {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
  }
  
  .comment-user img {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    margin-right: 10px;
  }
  
  .comment-details h4 {
    margin: 0;
    font-size: 24px;
  }
  
  .comment-details span {
    font-size: 14px;
    color: #777;
  }
  
  .comment-text p {
    margin: 0;
    font-size: 20px;
    line-height: 1.5;
    padding-bottom: 10px;
    color:black
  }
  
  .comment-reply {
    display: flex;
    justify-content: flex-end;
  }
  

  
 </style>
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
    <!--jQuery-->
    <script src="assets/js/jquery-3.3.1.js"></script>
    <!--Plugins-->
    <script src="assets/js/bootstrap.bundle.js"></script>
    <script src="assets/js/loaders.css.js"></script>
      <script src="assets/js/aos.js"></script>  
     <script src="assets/js/swiper.min.js"></script> 
     <script src="assets/js/lightgallery-all.min.js"></script> 
    <!--Template Script-->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/shop.js"></script>
    <script src="./assets/js/shop-details.js"></script>
    <script src="./assets/swiper/swiper-bundle.min.js"></script>
    <script src="./assets/js/related-products.js"></script>
</body>

</html>