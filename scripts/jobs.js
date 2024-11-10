/*
* File Name: jobs.js
* Author: Jessica Boediono Goenawan 103523649
* Target: jobs.html
* Purpose: This file is for assignment 2, storing job reference number
* Created: 17/09/2021
* Credits : Tutor : Guangming
*/

"use strict";

const javaHyperlink = document.getElementById("applyjd");
const webHyperlink = document.getElementById("applywd");

const javaRN = "J164S";
const webRN = "W0430";

javaHyperlink.addEventListener("click", () => {
    localStorage.setItem("refnumber", javaRN);
    window.location.href = "apply.php";
});

webHyperlink.addEventListener("click", () => {
    localStorage.setItem("refnumber", webRN);
    window.location.href = "apply.php";
});

