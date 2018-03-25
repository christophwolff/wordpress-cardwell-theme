import Swiper from 'swiper'
import Plyr from 'plyr'
import Picturefill  from 'picturefill'
import $ from 'jquery';

$( document ).ready(() => {
	$('#mobile-toggle').on('click',() => {
		$('#main-nav').toggleClass('open');
		$('.burger').toggleClass('cross');
	});
});

function DOMContentLoaded() {
    var mySwiper = new Swiper('.swiper-container', {
        loop: true, test:null
    })
}
document.onreadystatechange = function () {
    if (document.readyState == "interactive") {
        // Initialize your application or run some code.
    }
}
document.addEventListener('DOMContentLoaded', function() {

})
document.addEventListener("turbolinks:click", function() {
	// document.getElementById('mobile-toggle').removeEventListener('click', openMenu)
})

// Main JS File
document.addEventListener("turbolinks:load", function() {

    //Dont Use Turbolinks for clicks on the adminbar
    var adminbar = document.getElementById("wpadminbar")
    if (adminbar) {
        adminbar = adminbar.setAttribute("data-turbolinks", "false");
    }
    //initialize swiper when document ready
    var swiper = new Swiper('.s1', {
        pagination: '.swiper-pagination',
        paginationClickable: true,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev'
    });

    // Kickstart all JS Functions on Page load
    Picturefill();
    //Check if there are any players available. If not start the plyr magic!
    var audioElements = document.querySelectorAll('.js-player audio');
    var videoElements = document.querySelectorAll('.js-player video');
	if (audioElements) {
		const players = Array.from(document.querySelectorAll('.js-player audio')).map(player => new Plyr(player));
	}
    if (videoElements) {
        const players = Array.from(document.querySelectorAll('.js-player video')).map(player => new Plyr(player));
    }


})

document.addEventListener("turbolinks:click", function() {

})

