$(document).ready(function () {
  $("b#sininup").click(function () {
$("form#sighnup").hide(2500);
    $("form#sighnin").slideDown(200);
  })
  $("button#sin").click(function () {
    $("#skills-modal").modal("show");
    $('#enrollModal').modal('hide');


  })
  let countDownDate = new Date("Sep 6, 2019 8:50:10").getTime();
  let x = setInterval(function () {
    let now = new Date().getTime();

    let distance = countDownDate - now;

    let days = Math.floor(distance / (1000 * 60 * 60 * 24));
    let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    let seconds = Math.floor((distance % (1000 * 60)) / 1000);


    $(document).ready(function () {
      $('#days').text(days);
      $('#hours').text(hours);
      $('#mins').text(minutes);
      $('#secs').text(seconds);
    })
    if (days === 0 && hours === 0 && minutes === 5 && seconds === 0) {
      $('#skillSetModal').modal('show');
    }

    if (distance < 0) {
      clearInterval(x);
      $('button#time-elapsed').text('SESSION DESTROYED')

    }
  }, 1000);
  $('#skills-modal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever') // Extract info from data-* attributes    
    var modal = $(this)
    modal.find('.modal-body input').val(recipient)
  });

  $("img#proceed").click(function () {

    $("#skilltest").show(2500);
    $(".why-skills").hide(2500);
  });

  $('.enroll').click(function () {
    $('#enrollModal').modal('show');
  });

  $('#create_account').click(function () {
    let name = $('#name').val();
    let email = $('#email').val();
    let passion = $('#passion').val();
    let uclass = $('#class').val();
    let password = $('#password').val();
    
     let image_name = $('#image').val();  
          
    if (name !== '' && email !== '' && passion !== '' && uclass !== '' && password !== '') {
         if(image_name === '')  
           {  
                $('#img_status').css("color", "red");
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                    $('#img_status').text("Invalid image file");
                     $('#img_status').css("color", "red"); 
                     $('#image').val('');  
                     return false;  
                }  
           }  
        
      $.ajax({
        url: "register.php",
        method: "POST",
        data: {
          name: name,
          email: email,
          passion: passion,
          uclass: uclass,
          password: password,
          image_name:image_name
        },
        success: function (data) {
          switch (data) {
            case '1':
              $('#enrollModal').modal('hide');
              $('#m_alert').html('<div class="alert alert-warning msucess-alert" role="alert">' +
                '<h5><strong>You are already enrolled. Please Login</strong></h5>' +
                '</div>');
              $(".msucess-alert").delay(2500).slideUp('slow', function () {
                $('#m_alert').hide('slow', function () {
                  $('#loginModal').modal('show');
                });
              });

              break;
            case '2':
              $('#enrollModal').modal('hide');
              $('#m_alert').html('<div class="alert alert-success msucess-alert" role="alert">' +
                '<h5><strong>You have been enrolled successfully. Proceed to login.</strong></h5>' +
                '</div>');
              $(".msucess-alert").delay(2500).slideUp('slow', function () {
                $('#m_alert').hide('slow', function () {
                  $('#loginModal').modal('show');
                });

              });
              break;
            case '3':
              $('#enrollModal').modal('hide');
              $('#m_alert').html('<div class="alert alert-danger msucess-alert" role="alert">' +
                '<h5><strong>Sorry, Error occured. Please try again later.</strong></h5>' +
                '</div>');
              $(".msucess-alert").delay(2500).slideUp('slow', function () {
              });
              break;
            default:
              $('#enrollModal').modal('hide');
              $('#m_alert').html('<div class="alert alert-danger msucess-alert" role="alert">' +
                '<h5><strong>Sorry, We could not enroll you at this time. Try gain after some time</strong></h5>' +
                '</div>');
              $(".msucess-alert").delay(2500).slideUp('slow', function () {
              });
              break;

          }
        }
      })

    } else {
      if (name == "" || name == null) {
        $("input#name").css("border-color", "red")
        return false;
      } else { $("input#name").css("border-color", "green") }
      // validate user-email
      if (email == "") {
        $("input#email").css("border-color", "red");
        return false;
      } else { $("input#email").css("border-color", "green") }
      // validate user password
      if (password == "" || password == null) {
        $("input#password").css("border-color", "red")
        return false;
      }
      else {
        if (password.length < 8) {
          $("input#password").css("border-color", "red")
          $('#error').text("Should be more than 8 characters long");
          $('#error').css("color", "red")
          return false;
        } else {
          $("input#password").css("border-color", "green")
        }
      }
      // validate passion
      if (passion == "" || passion == null) {
        $("input#passion").css("border-color", "red")
        return false;
      }
      else { $("input#passion").css("border-color", "green") }
      // validate module
      if (uclass == "" || uclass == null) {
        $("input#module").css("border-color", "red")
        return false;
      }
      else { $("input#module").css("border-color", "green") }
    }
  });
  
  $('#userlogin').click(function () {

    let login_password = $('#login_password').val().trim();
    let login_email = $('#login_email').val().trim();
    if (login_password != '' && login_email != '') {
      $.ajax({
        url: "login.php",
        method: "POST",
        data: {
          login_email: login_email,
          login_password: login_password
        },
        success: function (reponse) {
          if (reponse == 0) {
            
            $('#modal_alert').html('<div class="alert alert-success ms-alert" role="alert">' +
              '<h5><strong>Login Successfull</strong></h5>' +
              '</div>');
            $(".ms-alert").delay(1500).slideUp('slow', function () {

              $('#modal_alert').hide('slow', function(){
                $('#loginModal').modal('hide');
                location.reload();
              });
            });
            
            window.reload();

          } else if (reponse == 1) {

            $('#modal_alert').html('<div class="alert alert-danger ms-alert" role="alert">' +
              '<h5><strong>Invalid Credentials</strong></h5>' +
              '</div>');
            $(".ms-alert").delay(2500).slideUp('slow', function () {

            });
          } else {
            $('#loginModal').modal('hide');
            $('#modal_alert').html('<div class="alert alert-danger ms-alert" role="alert">' +
              '<h5><strong>Whoops!, we\'ve lost connection. Try again later</strong></h5>' +
              '</div>');
            $(".ms-alert").delay(2500).slideUp('slow', function () {
            });

            
          }
        }
      })

    } else {
      if (login_email == "" || login_email == null) {
        $("input#login_email").css("border-color", "red");
        $('#error1').text("Email required");
        $('#error1').css("color", "red");
        return false;
      }
      else {
        $("input#login_email").css("border-color", "green")
        $('#error1').text("");
      }
      if (login_password == "" || login_password == null) {
        $("input#login_password").css("border-color", "red");
        $('#error2').text("Password required");
        $('#error2').css("color", "red");

      }
      else {
        $("input#login_password").css("border-color", "green")
        $('#error2').text("");

      }
    }
  });
  $("button#ulogin").click(function () {
    $("#enrollModal").modal('hide');
    $("#loginModal").modal('show');
  });
  $("button#usignup").click(function () {
    $("#enrollModal").modal('show');
    $("#loginModal").modal('hide');
  });

  if (Cookies.get('pairingbot_remember_me') == null) {

    $('#skills-modal').modal({
                        backdrop: 'static',
                        keyboard: true, 
                        show: true
                }, function(){
                        Cookies.set('pairingbot_remember_me', 'pairs', { expires: 105, path: '/' });
                }); 
}else{
    
    populateSkillSet();
}
    
  function populateSkillSet(){
        
         let gArray = [];
          let skillsArray = ["Control Structures", "Markdown","Events", "The DOM", "Prototypes", "Contructors","Objects", "Git Colaboration"];
         for (let i=0, tempskills = skillsArray; i<4; i++){
             let skill = Math.floor(Math.random()* (tempskills.length));
            
             let gItem  = skillsArray[skill];
            tempskills.splice(skill, 1);
             gArray.push(gItem);
         }
             let bArray = skillsArray.filter(function(e) {
              return gArray.indexOf(e) == -1;
            });
      
        
            
              gArray.forEach(function(mgood){
               $("ul#goodAt").append("<li><span class='goodskill'>" + mgood + "</span></li>");
              
          }); 
        
        
          bArray.forEach(function(mbad){
               $("ul#badAt").append("<li><span class='improveskill'>" + mbad + "</span></li>");
              
          }); 
        
          
          
          
                gArray.forEach(function(pairgood){
               $("ul#pairbadAt").append("<li><span class='goodskill'>" + pairgood + "</span></li>");
              
          }); 
        
        
          bArray.forEach(function(pairbad){
               $("ul#pairgoodAt").append("<li><span class='improveskill'>" + pairbad + "</span></li>");
              
          });
              
         
          
        };
    
    $('#skill1SetSubmit').click(function(){
        $('#s_alert').html('<div class="alert alert-success msucess-alert" role="alert">' +
                '<h5><strong>Your first skill test was successfully submited. Wait as we analyze your responses.</strong></h5>' +
                '</div>');
              $(".msucess-alert").delay(6500).slideUp('slow', function () {
                
                    $('#s_alert').html('<div class="alert alert-warning malert" role="alert">' +
                '<h5><strong>Done analyzing..Fetching Your Pair...Done </br>Happy Pairing Session.</strong></h5>' +
                '</div>');
                $(".malert").delay(2500).slideUp('slow', function () {
                $('#s_alert').hide('slow', function () {
                    $('.hide_name').show('slow');
                  populateSkillSet();
                  
                });

              });
        
    });
    });


});

// Navbar Transition
(function ($) {

  var navbar = $('.navbar');
  var lastScrollTop = 0;

  $(window).scroll(function () {
      var st = $(this).scrollTop();
      if (st > lastScrollTop) {
          navbar.removeClass('bg-light').addClass('visible shadow');
      } 
      else if(st < lastScrollTop && st < 200) {
          navbar.removeClass('visible shadow').addClass('bg-light');
      }
      else {
          navbar.removeClass('bg-light').addClass('visible shadow');
      }
      lastScrollTop = st;
  });

})(jQuery);