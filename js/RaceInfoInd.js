// Countdown 1
var countDownDate1 = new Date("Jan 5, 2024 15:37:25").getTime();
var x1 = setInterval(function() {
  var now1 = new Date().getTime();
  var distance1 = countDownDate1 - now1;
  var days1 = Math.floor(distance1 / (1000 * 60 * 60 * 24));
  var hours1 = Math.floor((distance1 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes1 = Math.floor((distance1 % (1000 * 60 * 60)) / (1000 * 60));
  var seconds1 = Math.floor((distance1 % (1000 * 60)) / 1000);
  document.getElementById("sec1").innerHTML = days1 + "d " + hours1 + "h " + minutes1 + "m " + seconds1 + "s ";
  if (distance1 < 0) {
    clearInterval(x1);
    document.getElementById("sec1").innerHTML = "EXPIRED";
  }
}, 1000);

// Countdown 2
var countDownDate2 = new Date("Feb 10, 2024 12:00:00").getTime();
var x2 = setInterval(function() {
  var now2 = new Date().getTime();
  var distance2 = countDownDate2 - now2;
  var days2 = Math.floor(distance2 / (1000 * 60 * 60 * 24));
  var hours2 = Math.floor((distance2 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes2 = Math.floor((distance2 % (1000 * 60 * 60)) / (1000 * 60));
  var seconds2 = Math.floor((distance2 % (1000 * 60)) / 1000);
  document.getElementById("sec2").innerHTML = days2 + "d " + hours2 + "h " + minutes2 + "m " + seconds2 + "s ";
  if (distance2 < 0) {
    clearInterval(x2);
    document.getElementById("sec2").innerHTML = "EXPIRED";
  }
}, 1000);

// Countdown 3
var countDownDate3 = new Date("Mar 20, 2024 18:45:00").getTime();
var x3 = setInterval(function() {
  var now3 = new Date().getTime();
  var distance3 = countDownDate3 - now3;
  var days3 = Math.floor(distance3 / (1000 * 60 * 60 * 24));
  var hours3 = Math.floor((distance3 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes3 = Math.floor((distance3 % (1000 * 60 * 60)) / (1000 * 60));
  var seconds3 = Math.floor((distance3 % (1000 * 60)) / 1000);
  document.getElementById("sec3").innerHTML = days3 + "d " + hours3 + "h " + minutes3 + "m " + seconds3 + "s ";
  if (distance3 < 0) {
    clearInterval(x3);
    document.getElementById("sec3").innerHTML = "EXPIRED";
  }
}, 1000);