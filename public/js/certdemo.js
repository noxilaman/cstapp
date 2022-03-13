$(document).ready(function() {
    console.log("ready!");
    var c = document.getElementById("myCanvas");
    var ctx = c.getContext("2d");
    var img = document.getElementById("scream");
    var logo = document.getElementById("logo");
    ctx.drawImage(img, 0, 0, 900, 1273);
    ctx.font = "40px kanit";
    let nameis = $('#cert_name').val();
    let namelen = nameis.length;
    var locx1 = (900 - (namelen * 19)) / 2;
    ctx.fillText(nameis, locx1, 600);
    ctx.font = "20px kanit";
    let datecert = $('#cert_date').val();
    ctx.fillText(datecert, 450, 910);
    ctx.drawImage(logo, 650, 1000, 150, 150);
});