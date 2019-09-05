<?php 
session_start();


if(isset($_SESSION['id'])){
    header("Location: pairing.php");
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pair Programming Bot</title>
    <link href="https://fonts.googleapis.com/css?family=Darker+Grotesque&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://kit.fontawesome.com/71daca51f7.js"></script>
</head>

<body>
    <!--start enroll modal -->
    <!--Sign Up Modal -->
    <div class="modal  fade" id="enrollModal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create an Account</h4>
                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name" id="name" name="name" />
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email" id="email" name="email" />
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" id="password"
                            name="password" />
                            <p id="error"></p>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Your Passion" id="passion"
                            name="passion" />
                    </div>
                    <div class="form-group">
                    <select name="class" id="class" class="form-control">
                        <?php 
                        require_once('dbConnect.php');
                        $class_result = $conn->query("SELECT * FROM  classes");
                        while($rows = $class_result->fetch_assoc() ){
                            $classid = $rows['class_id'];
                            $classname = $rows['class_name'];

                            echo "<option value='$classid'>$classname</option>";
                        }
                        ?>
                    </select>
                    </div>
                   
                    <div class="form-group">
                        <label for="fileupload"> Select an image to upload</label>
                        <input type="file" placeholder="Upload Your image" />
                    </div>
                    <div class="form-group text-center">
                        <button id="ulogin" class="btn btn-warning text-white">LOGIN INSTEAD</button>
                        <button class="btn btn-moringa text-white" type="submit" name="register"
                            id="create_account">CONTINUE</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="loginModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Login to your Account</h4>
                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <div class="form-group" id="modal_alert">

                </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email" id="login_email" name="login_email" />
                        <p id="error1"></p>
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" id="login_password"
                            name="login_password" />
                            <p id="error2"></p>
                    </div>
                    <a href="#">Forgot your password?</a>
                    <div class="form-group text-center">    
                        <button id="usignup" class="btn btn-warning text-white">CREATE ACCOUNT</button>
                        <button id="userlogin" class="btn btn-moringa text-white">CONTINUE</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end of enroll modal -->
    <!-- start of landing page -->
    <!-- Navigation -->
    <nav class="navbar navbar-light bg-light static-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="assets/logo.png">
            </a>
            <a class="navbar-brand" href="#"></a>
            <a class="btn btn-primary enroll" href="#" id="change_me">Enroll</a>
        </div>
    </nav>
    <div class="form-group" id="m_alert">

    </div>

    <!-- Masthead -->
    <header class="masthead text-white text-center">
        <div class="overlay"></div>
        <div class="container">
            <div class="row text-dark">
                <div class="col-xl-9 mx-auto">
                    <h1 class="mt-5 mb-5">Pair Programming, the future <br> to effective programming education.</h1>
                </div>
                <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                    <button type="submit" class="btn btn-lg btn-primary mb-5 enroll">Enroll Now</button>
                 
                </div>
            </div>
        </div>
    </header>

    <!-- Icons Grid -->
    <section class="bg-light text-center">
        <div class="container">
            <h2 class="pt-5 font-weight-bold">Pair Programming Automated</h2>
            <div class="row mt-5">
                <div class="col-lg-4">
                    <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                        <i class="fa fa-sign-in fa-5x mb-3"></i>
                        <h3>Step 1</h3>
                        <p class="lead mb-0">Click on the enroll now button and sign up/ sign in.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                        <i class="fa fa-check fa-5x mb-3"></i>
                        <h3>Step 2</h3>
                        <p class="lead mb-0">Take the assessment to determine your skill level.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mx-auto mb-0 mb-lg-3">
                        <i class="fa fa-clock fa-5x mb-3"></i>
                        <h3>Step 3</h3>
                        <p class="lead mb-0">Wait to be paired!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="text-left mt-5 mb-5">
        <div class="container">
            <div class="row d-flex h-100">
                <div class="col-md-6 justify-content-center align-self-center">
                    <h2 class="mb-3 font-weight-bold">Efficient pair programming for every learning institution</h2>
                    <p class="lead">Two heads are better than one. If the driver encounters a hitch with the code, there
                        will be two of them who'll solve the problem.</p>
                </div>
                <div class="col-md-6">
                    <img src="assets/pair-programming-demo.png" class="img-fluid float-right">
                </div>
            </div>
        </div>
    </section>



    <!-- Footer -->
    <footer class="footer bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 h-100 text-center text-lg-center my-auto">
                    <p class="text-muted small pt-3">&copy; Pair Programming Bot 2019. All Rights Reserved.</p>
                </div>
                <!-- <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item mr-3">
                            <a href="#">
                                <i class="fab fa-facebook fa-2x fa-fw"></i>
                            </a>
                        </li>
                        <li class="list-inline-item mr-3">
                            <a href="#">
                                <i class="fab fa-twitter-square fa-2x fa-fw"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fab fa-instagram fa-2x fa-fw"></i>
                            </a>
                        </li>
                    </ul>
                </div> -->
            </div>
        </div>
    </footer>
    <!-- end of landing page -->



    <!-- start of javascript files -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/scripts.js"></script>

    <!-- end of javascript files -->
</body>

</html>