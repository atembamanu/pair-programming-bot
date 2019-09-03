let countDownDate = new Date("Sep 3, 2019 8:50:10").getTime();
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

  console.log(distance)
  if (days == 0 && hours == 0 && minutes == 5 && seconds == 0) {
    $('#skillSetModal').modal('show');
  }

  if (distance < 0) {
    clearInterval(x);
    $('button#time-elapsed').text('SESSION DESTROYED')

  }
}, 1000);