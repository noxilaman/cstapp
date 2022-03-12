$(document).ready(function() {
    console.log("ready!");
    var c = document.getElementById("myCanvas");
    var ctx = c.getContext("2d");
    var img = document.getElementById("scream");
    var logo = document.getElementById("logo");
    ctx.drawImage(img, 0, 0, 600, 700);
    ctx.font = "20px kanit";
    ctx.fillText("mดสอบ นามสกุล", 230, 340);
    ctx.font = "15px kanit";
    ctx.fillText("12 มกราคม 2565", 300, 500);
    ctx.drawImage(logo, 450, 550, 100, 100);
});