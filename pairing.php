<?php 
require_once('dbConnect.php');
session_start();
if(!isset($_SESSION['id'])){
    header("Location : index.php");
}
$sql = 'SELECT * FROM webappUsers WHERE webappUser_id = " '.$_SESSION['id'].'" ';
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);



$sql2 = 'SELECT * FROM webappUsers WHERE webappUser_id != " '.$_SESSION['id'].'" ORDER BY RAND() LIMIT 1 ';
$query2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_array($query2);
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
    <!-- start of skillset modal1 -->
    <div class="modal fade" id="skillSetModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="editProfileTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-sucess" id="skillModelLabel">Hope you had best of this session. Let's
                        see what went well.</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="form-group">
                            <label for="" class="col-form-label text-success" class="skillname">GIT
                                Collaboration</label><br>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="optradio" value="1"> 100 - 80%
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="optradio" value="2">80 - 60%
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="optradio" value="3">60 - 40%
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="optradio" value="4">Below 40%
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-form-label text-success" class="skillname">Friday IP</label><br>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="opt0radio" value="1"> 100 - 80%
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="opt0radio" value="2">80 - 60%
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="opt0radio" value="3">60 - 40%
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="opt0radio" value="4">Below 40%
                                </label>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">cancel</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal" id="sendData">Submit
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- end of skillset modal1 -->
    
    <!-- edit profile modal -->

    <div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="editProfileTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileLongTitle">Edit Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row mb-5">
                            <div class="col-12">
                                <img src="assets/john-doe.jpg" class="rounded-circle mx-auto d-block" width="200px">
                            </div>
                        </div>
                        <form>
                            <div class="form-group row">
                                <label class="col-5 col-form-label form-control-label font-weight-bold">Name:</label>
                                <div class="col-7">
                                    <input class="form-control" type="text" value="John Doe">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-5 col-form-label form-control-label font-weight-bold">Class:</label>
                                <div class="col-7">
                                    <select class="form-control">
                                        <option value="Pre-prep">Pre-prep</option>
                                        <option value="Prep">MPFT-21</option>
                                        <option value="Core">Core</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    class="col-5 col-form-label form-control-label font-weight-bold">Password:</label>
                                <div class="col-7">
                                    <input type="password" class="form-control" value="******">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-5 col-form-label form-control-label font-weight-bold">Confirm
                                    Password:</label>
                                <div class="col-7">
                                    <input type="password" class="form-control" value="******">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-orange" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-moringa">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    
    
    
        <!-- start of skillset modal2 -->
        <div class="modal fade " id="skills-modal" tabindex="-1" role="dialog" aria-labelledby="SkillsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="Modalheader">Skill test</h5>
                    <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
                    <!--    <span aria-hidden="true">&times;</span>-->
                    </button>
                </div>
                <div class="modal-body">
                    <div class="why-skills text-center">
                        <img src="assets/why.png" alt="why" style="height: 40px; width:40px">
                        <h5>Why your skills?</h5>
                        <p>Knowing your proficiency level in every topic will enable us to identify your weaknesses and
                            strengths in every topic you learn through the given period of time. This will enable us
                            to find the best pair for the sake of your growth.
                        </p>
                        <hr>
                        <img src="assets/proceedIcon.png" alt="proceed" style="height: 25px; width:25px" id="proceed">
                    </div>
                    <div id="skilltest">
                        <h5>Please choose your level of skills in these topics</h5>
                        <h6 id="errorHandler"></h6>
                        <div class="form-group">
                            <label for="" class="col-form-label text-success skillname">Prototypes</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="opt1radio" checked value="1">
                                <label class="form-check-label">100-80</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="opt1radio" value="2">
                                <label class="form-check-label">80-60</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="opt1radio" value="3">
                                <label class="form-check-label">60-40</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="opt1radio" value="4">
                                <label class="form-check-label">Below 40%</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-form-label text-success skillname">Constructors</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="opt2radio" checked value="1">
                                <label class="form-check-label">100-80</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="opt2radio" value="2">
                                <label class="form-check-label">80-60</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="opt2radio" value="3">
                                <label class="form-check-label">60-40</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="opt2radio" value="3">
                                <label class="form-check-label">Below 40%</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-form-label text-success skillname">Objects</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="opt3radio" checked value="1">
                                <label class="form-check-label">100-80</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="opt3radio" value="2">
                                <label class="form-check-label">80-60</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="opt3radio" value="3">
                                <label class="form-check-label">60-40</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="opt3radio" value="4">
                                <label class="form-check-label">Below 40%</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-form-label text-success skillname">Github Collaboration</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="opt4radio" checked value="1">
                                <label class="form-check-label">100-80</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="opt4radio" value="2">
                                <label class="form-check-label">80-60</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="opt4radio" value="3">
                                <label class="form-check-label">60-40</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="opt4radio" value="4">
                                <label class="form-check-label">Below 40%</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="skill1SetSubmit" data-dismiss="modal">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <!-- end of skillset modal2 -->
    <div class="container-fluid">
        <section id="pair-programmer">
            <div class="container jumbotron">
                <div class="form-group" id="s_alert">

                </div>
                <div class="row">
                    <div class="col-md-6 col-6">
                        <a href="index.php" class="icon-color text-orange" ><i class="fas fa-home fa-2x " id="hide_home"></i></a>
                    </div>
                    <div class="col-md-6 col-6">
                        <ul class="nav float-right">
                            <li class="nav-item dropdown">
                                <a class="nav-link text-orange meatball" data-toggle="dropdown" href="#" role="button"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v fa-2x waves-effect"></i></a>
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editProfile">Profile</a>
                                    <a class="dropdown-item" href="logout.php">Logout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 mt-5">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-3">
                                <img src="assets/john-doe.jpg" alt="" class="uProfile-image img-responsive ">
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-9">
                                <h3 class="uProfile-name"><?php echo $row['name'];?></h3>
                                <h4 class="uProfile-passion"><?php echo $row['passion'];?></h4>
                               
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="card bg-orange text-white">
                                    <div class="card-body">
                                        <h5 class="card-title">Good At</h5>
                                        <div class="card-text">
                                            <ul id="goodAt">

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="card text-black">
                                    <div class="card-body">
                                        <h5 class="card-title">Help me Improve</h5>
                                        <div class="card-text">
                                            <ul id="badAt">

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 mt-5">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-3">
                                <img src="assets/john-doe.jpg" alt="" class="uProfile-image img-responsive ">
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-9">
                               <h3 class="uProfile-name hide_name"><?php echo $row2['name'];?></h3>
                                <h4 class="uProfile-passion hide_name"><?php echo $row2['passion'];?></h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="card btn-moringa">
                                    <div class="card-body">
                                        <h5 class="card-title">Good At</h5>
                                        <div class="card-text">
                                            <ul id="pairgoodAt">

                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="card text-black">
                                    <div class="card-body">
                                        <h5 class="card-title ">Help me Improve</h5>
                                        <div class="card-text">
                                            <ul id="pairbadAt">
                                           
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container text-center" id="time">
                    <h2>TIME REMAINING</h2>
                    <button class="btn btn-lg btn-danger text-white" id="time-elapsed">
                        <span id="days">1</span> DAY
                        <span id="hours">4</span> HRS
                        <span id="mins">45</span> MINS <span id="secs">02</span> SEC</button>
                </div>
            </div>
        </section>
    </div>


    <!-- start of javascript files -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <script src="https://unpkg.com/popper.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/scripts.js"></script>

    <!-- end of javascript files -->
</body>

</html>