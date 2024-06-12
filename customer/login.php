<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Ideal Homes - Sign In Page</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;700;900&display=swap" rel="stylesheet">

        <link href="home/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link rel="stylesheet" href="css/slick.css"/>

        <link href="css/tooplate-little-fashion.css" rel="stylesheet">
        
<!--

Tooplate 2127 Little Fashion

https://www.tooplate.com/view/2127-little-fashion

-->
    </head>
    <body>
<?php require('../config/autoload.php'); ?>
<?php
$dao=new DataAccess();
$rules=array(
    'email'=>array('required'=>true),
    'password'=>array('required'=>true),
);
$validator=new formValidator($rules);
if(isset($_POST['signin']))
{
    if($validator->validate($_POST))
    {
        $data=array(
		'email'=>$_POST['email'],
		'password'=>$_POST['password']
	);
        if($info=$dao->login($data,'registration'))
        {
            $_SESSION['email']=$info['email'];
 			echo"<script> location.replace('../customer/displaycategory.php'); </script>";
 }
        else{
			echo "<script> alert('Invalid username or password');</script> ";
        }
    }

    
}
?>

        <section class="preloader">
            <div class="spinner">
                <span class="sk-inner-circle"></span>
            </div>
        </section>
    
        <main>

            <section class="sign-in-form section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-8 mx-auto col-12">

                            <h1 class="hero-title text-center mb-5">Sign In</h1>

                            <div class="row">
                                <div class="col-lg-8 col-11 mx-auto">
                                    <form role="form" method="post">

                                        <div class="form-floating mb-4 p-0">
                                            <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" maxlength="40" class="form-control" placeholder="Email Address" required>
                                            <label for="email">Email Address</label>
                                            <?php echo $validator->error('email') ?>

                                        </div>

                                        <div class="form-floating p-0">
                                            <input type="password" name="password" id="password" pattern="[^ @]*@[^ @]*[0-9 a-z A-Z]" maxlength="20" class="form-control" placeholder="Password" required>

                                            <label for="password">Password</label>
                                            <?php echo $validator->error('password') ?>

                                        </div>

                                        <button type="submit" name="signin" id="signin" class="btn custom-btn form-control mt-4 mb-3">
                                            Sign in
                                        </button>
                                        <p class="text-center">Don’t have an account? <a href="registration.php">Create One</a></p>

                                    </form>
                                </div>
                            </div>
                            
                        </div>

                    </div>
                </div>
            </section>

        </main>

        <footer class="site-footer">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-10 me-auto mb-4">
                        <h4 class="text-white mb-3"><a href="index.html">IDEAL</a>HOMES</h4>
                        <p class="copyright-text text-muted mt-lg-5 mb-4 mb-lg-0">idealhomes@gmail.com<strong></strong></p>
                        <p class="copyright-text text-muted mt-lg-5 mb-4 mb-lg-0">+91 7034470692<strong></strong></p>
                        <!-- <p class="copyright-text text-muted mt-lg-5 mb-4 mb-lg-0">Copyright © 2022 <strong>Little Fashion</strong></p> -->
                        <br>
                        <!-- <p class="copyright-text">Designed by <a href="https://www.tooplate.com/" target="_blank">Tooplate</a></p> -->
                    </div>

                    <!-- <div class="col-lg-5 col-8">
                        <h5 class="text-white mb-3">Sitemap</h5>

                        <ul class="footer-menu d-flex flex-wrap">
                            <li class="footer-menu-item"><a href="about.html" class="footer-menu-link">Story</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Products</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Privacy policy</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">FAQs</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Contact</a></li>
                        </ul>
                    </div> -->

                    <div class="col-lg-3 col-4">
                        <h5 class="text-white mb-3">Social</h5>

                        <ul class="social-icon">

                            <li><a href="#" class="social-icon-link bi-youtube"></a></li>

                            <li><a href="#" class="social-icon-link bi-whatsapp"></a></li>

                            <li><a href="#" class="social-icon-link bi-instagram"></a></li>

                            <li><a href="#" class="social-icon-link bi-skype"></a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </footer>

        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/Headroom.js"></script>
        <script src="js/jQuery.headroom.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/custom.js"></script>

    </body>
</html>
