<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pair Programming Bot</title>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Darker+Grotesque&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <script>
    $(document).ready(function() {
    if (Cookies.get('pairingbot_remember_me') = null) {
        Cookies.set('pairingbot_remember_me', 'pairs', { expires: 105, path: '/' });
        $('#skills-modal').modal('show');
    }
    });
    </script>
</head>

<body>
    <!-- start of skillset modal1 -->
    <div class="modal fade" id="skillSetModal" tabindex="-1" role="dialog" aria-labelledby="skillSetModelLabel"
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
                                    <input type="radio" class="form-check-input" name="opt2radio" value="1"> 100 - 80%
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="opt2radio" value="2">80 - 60%
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="opt2radio" value="3">60 - 40%
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="opt2radio" value="4">Below 40%
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
        <!-- start of skillset modal2 -->
        <div class="modal fade " id="skills-modal" tabindex="-1" role="dialog" aria-labelledby="SkillsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="Modalheader">Skill test</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
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
                        <div class="form-group">
                            <label for="" class="col-form-label text-success skillname">Prototypes</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="opt1radio" value="1">
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
                                <input class="form-check-input" type="radio" name="opt2radio" value="1">
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
                                <input class="form-check-input" type="radio" name="opt3radio" value="1">
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
                                <input class="form-check-input" type="radio" name="opt4radio" value="1">
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" data-dismiss="modal">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <!-- end of skillset modal2 -->
    <div class="container-fluid">
        <section id="pair-programmer">
            <div class="container jumbotron">
            <a href="logout.php"><h4>LOGOUT</h4></a>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 ">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-3">
                                <img src="assets/john-doe.jpg" alt="" class="uProfile-image img-responsive">
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-9">
                                <h3 class="uProfile-name"><?php echo $row['name'];?></h3>
                                <h4 class="uProfile-passion"><?php echo $row['passion'];?></h4>
                               
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="card bg-success text-white">
                                    <div class="card-body">
                                        <h5 class="card-title">Good At</h5>
                                        <div class="card-text">
                                            <ul>
                                                <li>Jquery</li>
                                                <li>Alerts</li>
                                                <li>DOM</li>
                                                <li>Styling</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="card bg-info text-white">
                                    <div class="card-body">
                                        <h5 class="card-title">Help me Improve</h5>
                                        <div class="card-text">
                                            <ul>
                                                <li>Forms</li>
                                                <li>Modals</li>
                                                <li>Prototypes</li>
                                                <li>Bootstrap</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 ">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-3">
                                <img src="assets/john-doe.jpg" alt="" class="uProfile-image img-responsive ">
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-9">
                                <h3 class="uProfile-name">Jane Doe</h3>
                                <h4 class="uProfile-passion">Software development</h4>
                                <h4 class="uProfile-passion"> Music and Art</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Good At</h5>
                                        <div class="card-text">
                                            <ul>
                                                <li>Forms</li>
                                                <li>Modals</li>
                                                <li>Prototypes</li>
                                                <li>Bootstrap</li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Help me Improve</h5>
                                        <div class="card-text">
                                            <ul>
                                                <li>Jquery</li>
                                                <li>Alerts</li>
                                                <li>DOM</li>
                                                <li>Styling</li>
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
   
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/scripts.js"></script>

    <!-- end of javascript files -->
</body>

</html>