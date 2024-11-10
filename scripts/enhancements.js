/*
* File Name: enhancements.js
* Author: Jessica Boediono Goenawan 103523649
* Target: index.html, jobs.html, apply.html, about.html and enhancements.html
* Purpose: This file is for assignment 2, enhancements
* Created: 17/09/2021
* Credits : Tutor : Guangming
*/

"use strict";

// control var for testimonial slides
var control1 = document.getElementById('control1');
var control2 = document.getElementById('control2');
var control3 = document.getElementById('control3');

// Clock

function clock () {
   var hours = document.getElementById("hours");
   var minutes = document.getElementById("minutes");
   var seconds = document.getElementById("seconds");

   var h = new Date().getHours();
   var m = new Date().getMinutes();
   var s = new Date().getSeconds();

   hours.innerHTML = h;
   minutes.innerHTML = m;
   seconds.innerHTML = s;
}
   

// scroll to top

const scrollBtn = document.querySelector(".buttontop");

function refreshButtonVisibility () {
   if (document.documentElement.scrollTop <= 150) {
      scrollBtn.style.display = "none";
   } else {
      scrollBtn.style.display = "block";
   }
}

refreshButtonVisibility();

scrollBtn.addEventListener("click", () => {
   document.body.scrollTop = 0; // for Safari
   document.documentElement.scrollTop = 0; // for Chrome, Firefox, IE and Opera
});

document.addEventListener("scroll", () => {
   refreshButtonVisibility();
});

// Testimonials 

var testimonials = document.getElementById("testimonials");


function controlone () {
   testimonials.style.transform = "translateX(820px)";
   control1.classList.add("activate");
   control2.classList.remove("activate");
   control3.classList.remove("activate");
}

function controltwo () {
   testimonials.style.transform = "translateX(0px)";
   control1.classList.remove("activate");
   control2.classList.add("activate");
   control3.classList.remove("activate");
}

function controlthree() {
   testimonials.style.transform = "translateX(-820px)";
   control1.classList.remove("activate");
   control2.classList.remove("activate");
   control3.classList.add("activate");

}



// Hamburger nav menu for media quaries 

function navbar () {
   document.querySelector("ul").style.display = "flex";
}



function init() {
var menuButton = document.getElementById("navicon");
menuButton.onclick = navbar;

if (document.getElementById("indexpage")) {

clock();
var interval = setInterval(clock,1000);


control1.onclick = controlone;

control2.onclick = controltwo;

control3.onclick = controlthree;


} 

}

window.onload = init;
