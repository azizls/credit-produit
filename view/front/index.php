<?php 

include "config.php";
 
if(isset($_POST['submit'])){

  // Count total files
  $countfiles = count($_FILES['files']['name']);
 
  // Prepared statement
  $query = "INSERT INTO images (name,image) VALUES(?,?)";

  $statement = $conn->prepare($query);

  // Loop all files
  for($i=0;$i<$countfiles;$i++){

    // File name
    $filename = $_FILES['files']['name'][$i];

    // Location
    $target_file = 'upload/'.$filename;

    // file extension
    $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
    $file_extension = strtolower($file_extension);

    // Valid image extension
    $valid_extension = array("png","jpeg","jpg");

    if(in_array($file_extension, $valid_extension)){

       // Upload file
       if(move_uploaded_file($_FILES['files']['tmp_name'][$i],$target_file)){

          // Execute query
	  $statement->execute(array($filename,$target_file));

       }
    }
 
  }
  echo "File upload successfully";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Spark - Responsive Hosting, Domain, Technology HTML Template</title>

    <link rel="stylesheet" href="assets/css/custom/style.css">
    <link rel="stylesheet" href="assets/css/responsive/responsive.css">
    <!-- favicon -->
    <link rel="icon" type="image/png" href="assets/img/favicon.png">

</head>

<body class="home2">

    <div class="preloader">
        <div class="sk-cube-grid">
            <div class="sk-cube sk-cube1"></div>
            <div class="sk-cube sk-cube2"></div>
            <div class="sk-cube sk-cube3"></div>
            <div class="sk-cube sk-cube4"></div>
            <div class="sk-cube sk-cube5"></div>
            <div class="sk-cube sk-cube6"></div>
            <div class="sk-cube sk-cube7"></div>
            <div class="sk-cube sk-cube8"></div>
            <div class="sk-cube sk-cube9"></div>
        </div>
    </div>

    <!-- ======= 1.01 Header Area ====== -->
    <?php 
     include_once('header.php');
    ?>
    <!-- ======= /1.01 Header Area ====== -->

    <!-- ======= 1.02 Home Area ====== -->
    <?php 
     include_once('homeA.php');
    ?>
    <!-- ======= /1.02 Home Area ====== -->

    <!-- ======= 1.03 Domain Area ====== -->
    <div class="domainArea">
        <div class="container animated">
            <div class="row">
                <div class="col-md-12 clearfix">
                    <div class="domainTxt">
                        <p>Search your Game, <br>purchase one.</p>
                    </div>
                    <form action="domainSearch.html" class="domainForm" method="get">
                        <!-- replace domainSearch.html with your php file -->
                        <div class="domainTop">
                            <input type="search" name="search" placeholder="Enter your domain name here">
                            <input type="submit" name="submit" value="Search Domain">
                        </div>
                        <div class="domainCheck">

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ======= /1.03 Domain Area ====== -->

    <!-- ======= 1.04 Service Area ====== -->
    <div class="serviceArea secPdng animated">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="sectionTitle">
                        <div class="h2">Lots of Gaming services in town. <br>Why you should <span>choose us?</span></div>
                    </div>
                </div>
            </div>
            <div class="row service">
                <div class="col-md-4">
                    <div class="singleService">
                        <div class="serviceIcon">
                            <img src="assets/img/icon/gear.png" alt="">
                        </div>
                        <div class="serviceContent">
                            <span class="h3">Easy to use</span>
                            <p>Just pick your game <br></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="singleService">
                        <div class="serviceIcon">
                            <img src="assets/img/icon/up.jpg" alt="">
                        </div>
                        <div class="serviceContent">
                            <span class="h3">Acces to game </span>
                            <p>You will be able to buy acces to your game for 5 days <br>so you can try anygame you want right now!</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="singleService">
                        <div class="serviceIcon">
                            <img src="assets/img/icon/247.png" alt="">
                        </div>
                        <div class="serviceContent">
                            <span class="h3">24/7 customer support</span>
                            <p>We are pleased that our team is working 24/7 <br></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="singleService">
                        <div class="serviceIcon">
                            <img src="assets/img/icon/Best.png" alt="">
                        </div>
                        <div class="serviceContent">
                            <span class="h3">Best product</span>
                            <p>Every single game you want. <br></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="singleService">
                        <div class="serviceIcon">
                            <img src="assets/img/icon/Update.jpg" alt="">
                        </div>
                        <div class="serviceContent">
                            <span class="h3">UPDATES AND OFFERS</span>
                            <p>We are working to make sure you have every version of your game <br>Available & more.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="singleService">
                        <div class="serviceIcon">
                            <img src="assets/img/icon/chat.jpg" alt="">
                        </div>
                        <div class="serviceContent">
                            <span class="h3">Live Chat Support</span>
                            <p>Best community you will ever join.<br></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ======= /1.04 Service Area ====== -->

    <div class="sectionBar"></div>

    <!-- ======= 1.05 Pricing Area ====== -->
    <div class="pricingArea secPdng animated">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="sectionTitle">
                        <div class="h2">Pay for what you <span>actually</span> use. No hidden charge!</div>
                    </div>
                </div>
            </div>
            <div class="row price clearfix">
                <div class="col-lg-3 offset-lg-0 priceCol col-md-5 offset-md-1">
                    <div class="singlePrice">
                        <div class="priceHead">
                            <span class="priceTitle">1 Day acces</span>
                            <div class="priceImg">
                                <img src="assets/img/icon/user.png" alt="">
                            </div>
                            <div class="currency">$2<span>/Day</span></div>
                            <p>best for you</p>
                        </div>
                        <ul class="priceBody">
                            <li><i class="icofont icofont-ui-check"></i>acces to your game for limited time</li>
                            <li><i class="icofont icofont-ui-check"></i>1 Free Day for first time</li>
                            <li><i class="icofont icofont-ui-check"></i>fresh start</li>
                            <li><i class="icofont icofont-ui-close"></i>Special Offers</li>
                            <li><i class="icofont icofont-ui-check"></i>Unlimited Support</li>
                        </ul>
                        <a href="" class="priceBtn Btn">Get Started now</a>
                    </div>
                </div>
                <div class="col-lg-3 priceCol col-md-5">
                    <div class="singlePrice active">
                        <div class="priceHead">
                            <span class="priceTitle">2 Day acces</span>
                            <div class="priceImg">
                                <img src="assets/img/icon/users.png" alt="">
                            </div>
                            <div class="currency">$2<span>/day</span></div>
                            <p>best for personal use</p>
                        </div>
                        <ul class="priceBody">
                            <li><i class="icofont icofont-ui-check"></i>acces to your game for limited time</li>
                            <li><i class="icofont icofont-ui-check"></i>1 Free Day for first time</li>
                            <li><i class="icofont icofont-ui-check"></i>fresh start</li>
                            <li><i class="icofont icofont-ui-close"></i>Special Offers</li>
                            <li><i class="icofont icofont-ui-check"></i>Unlimited Support</li>
                        </ul>
                        <a href="" class="priceBtn Btn">Get Started now</a>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-0 priceCol col-md-5 offset-md-1">
                    <div class="singlePrice">
                        <div class="priceHead">
                            <span class="priceTitle">4 Day acces</span>
                            <div class="priceImg">
                                <img src="assets/img/icon/users.png" alt="">
                            </div>
                            <div class="currency">$2<span>/day</span></div>
                            <p>best for personal use</p>
                        </div>
                        <ul class="priceBody">
                            <li><i class="icofont icofont-ui-check"></i>acces to your game for limited time</li>
                            <li><i class="icofont icofont-ui-check"></i>2 Free Day for first time</li>
                            <li><i class="icofont icofont-ui-check"></i>fresh start</li>
                            <li><i class="icofont icofont-ui-close"></i>Special Offers</li>
                            <li><i class="icofont icofont-ui-check"></i>Unlimited Support</li>
                        </ul>
                        <a href="" class="priceBtn Btn">Get Started now</a>
                    </div>
                </div>
                <div class="col-lg-3 priceCol col-md-5">
                    <div class="singlePrice">
                        <div class="priceHead">
                            <span class="priceTitle">7 Day acces</span>
                            <div class="priceImg">
                                <img src="assets/img/icon/users.png" alt="">
                            </div>
                            <div class="currency">$2<span>/day</span></div>
                            <p>best for personal use</p>
                        </div>
                        <ul class="priceBody">
                            <li><i class="icofont icofont-ui-check"></i>acces to your game for limited time</li>
                            <li><i class="icofont icofont-ui-check"></i>3 Free Day for first time</li>
                            <li><i class="icofont icofont-ui-check"></i>fresh start</li>
                            <li><i class="icofont icofont-ui-close"></i>Special Offers</li>
                            <li><i class="icofont icofont-ui-check"></i>Unlimited Support</li>
                        </ul>
                        <a href="" class="priceBtn Btn">Get Started now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ======= /1.05 Pricing Area ====== -->

    <!-- ======= 1.06 Cta Area ====== -->
    <div class="ctaArea secPdngB animated">
        <div class="container">
            <div class="row ctaRow">
                <div class="col-md-6">
                    <div class="ctaImgOne">
                        <img src="img/server.jpg" alt="">
                    </div>
                </div>
                <div class="col-md-6 ctaCol">
                    <div class="ctaRight ctaTxt">
                        <div class="ctaCell">
                            <div class="h2">Buy any game of you choice</div>
                            <p>If you test the game you like <br>you can as well buy it .</p>
                            <a href="#" class="ctaBtn Btn"><i class="icofont icofont-rocket-alt-2"></i>Get Started Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 ctaCol">
                    <div class="ctaLeft ctaTxt">
                        <div class="ctaCell">
                            <div class="h2">Buy any game of you choice</div>
                            <p>If you test the game you like <br>you can as well buy it .</p>
                            <div class="ctaBtn">
                                <a href="#" class="btnOne Btn">read more</a>
                                <a href="#" class="btnTwo Btn">Get Started Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-md-offset-1 ctaColBtm">
                    <div class="ctaImgTwo">
                        <img src="img/home-dsk-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ======= /1.06 Cta Area ====== -->

    <!-- ======= 1.07 client Area ====== -->
    <div class="clientArea secPdng animated">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="sectionTitle">
                        <div class="h2">We give <span>awesome service,</span><br>Some of our trusted clients.</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="singleClient">
                        <a href="#"><img src="img/client-1.jpg" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="singleClient">
                        <a href="#"><img src="img/client-2.jpg" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="singleClient">
                        <a href="#"><img src="img/client-3.jpg" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="singleClient">
                        <a href="#"><img src="img/client-4.jpg" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="singleClient">
                        <a href="#"><img src="img/client-5.jpg" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="singleClient">
                        <a href="#"><img src="img/client-6.jpg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ======= /1.07 client Area ====== -->

    <!-- ======= 1.08 ctaTwo Area ====== -->
    <div class="ctaTwo">
        <div class="container">
            <div class="row">
                <div class="col-md-12 animated">
                    <span class="ctaTxtTwo">20,000+ People trust Sparks! Be one of them today.</span>
                    <div class="ctaBtn"><a href="#" class="btnOne Btn">Get Started now</a></div>
                </div>
            </div>
        </div>
    </div>
    <!-- ======= /1.08 ctaTwo Area ====== -->

    <!-- ======= 1.09 footer Area ====== -->
    <!-- ======= 1.09 footer Area ====== -->
    <?php 
     include_once('footer.php');
    ?>
    <!-- ======= /1.09 footer Area ====== -->


    <script src="assets/js/jquery.1.11.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/active.js"></script>
    <script src="assets/js/chatScript.js" type="text/javascript"></script>


</body>

</html>