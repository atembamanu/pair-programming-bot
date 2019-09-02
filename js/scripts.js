let countDownDate = new Date("Sep 3, 2019 23:25:19").getTime();
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
  if (minutes == 5) {
    $('#skillSetModal').modal('show');
  }

  if (distance < 0) {
    clearInterval(x);
    $('button#time-elapsed').text('SESSION DESTROYED')

  }
}, 1000);