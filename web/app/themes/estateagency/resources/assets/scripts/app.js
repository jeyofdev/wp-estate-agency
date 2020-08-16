import $ from "jquery"
import "bootstrap"
import "magnific-popup"
import "./app/jquery.nice-select.min.js"
import "slicknav/dist/jquery.slicknav.js"
import "./app/jquery-ui.min.js"
import "owl.carousel"
import "./app/main.js"
import "./app/loadmore"




/* ----------------------------------------------
	Contact form 7 add class response output
------------------------------------------------ */
document.addEventListener( "wpcf7invalid", function() {
    $(".wpcf7-response-output").addClass("alert alert-danger");
}, false);
document.addEventListener( "wpcf7spam", function() {
    $(".wpcf7-response-output").addClass("alert alert-warning");
}, false);
document.addEventListener( "wpcf7mailfailed", function() {
    $(".wpcf7-response-output").addClass("alert alert-warning");
}, false);
document.addEventListener( "wpcf7mailsent", function() {
    $(".wpcf7-response-output").addClass("alert alert-success");
}, false);
