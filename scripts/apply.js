/*
* File Name: apply.js
* Author: Jessica Boediono Goenawan 103523649
* Target: apply.html
* Purpose: This file is for assignment 2, validate form and data storage
* Created: 17/09/2021
* Credits : Tutor : Guangming
*/
"use strict";

var form = document.getElementById("regform");
var refNumber = document.getElementById("refnumber");
var firstName = document.getElementById("firstname");
var lastName = document.getElementById("lastname");
var dob = document.getElementById("dob");
var maleRadio = document.getElementById("male");
var femaleRadio = document.getElementById("female");
var streetAddress = document.getElementById("address");
var town = document.getElementById("town");
var state = document.getElementById("state");
var postcode = document.getElementById("postcode");
var email = document.getElementById("email");
var phone = document.getElementById("phone");
var java = document.getElementById("java");
var html = document.getElementById("html");
var js = document.getElementById("js");
var php = document.getElementById("php");
var sql = document.getElementById("sql");
var ruby = document.getElementById("ruby");
var other = document.getElementById("other");
var otherSkills = document.getElementById("oskills");

var vicState = document.getElementById("vic");
var nswState = document.getElementById("nsw");
var qldState = document.getElementById("qld");
var ntState = document.getElementById("nt");
var waState = document.getElementById("wa");
var saState = document.getElementById("sa");
var tasState = document.getElementById("tas");
var actState = document.getElementById("act");

// form validation
/*
form.addEventListener("submit", (e) => {
 
  checkInputs(e);

});

function checkInputs(e) {
  var refNumberValue = refNumber.value.trim();
  var firstNameValue = firstName.value.trim();
  var lastNameValue = lastName.value.trim();
  var dobValue = dob.value.trim();
  var addressValue = streetAddress.value.trim();
  var townValue = town.value.trim();
  var stateValue = state.value.trim();
  var postcodeValue = postcode.value.trim();
  var emailValue = email.value.trim();
  var phoneValue = phone.value.trim();
  var oskillsValue = otherSkills.value.trim();

  var vicRE = /^(3||8)([0-9]{3})$/;
  var nswRE = /^(1||2)([0-9]{3})$/;
  var qldRE = /^(4||9)([0-9]{3})$/;
  var ntRE = /^(0)([0-9]{3})$/;
  var waRE = /^(6)([0-9]{3})$/;
  var saRE = /^(5)([0-9]{3})$/;
  var tasRE = /^(7)([0-9]{3})$/;
  var actRE = /^(0)([0-9]{3})$/;




if (refNumberValue === "") {
  setErrorFor(refNumber, "Please enter a valid job reference number", e);
} else {
  setSuccessFor(refNumber);
}

if (firstNameValue === "") {
  setErrorFor(firstName, "First Name cannot be empty", e);
} else {
  setSuccessFor(firstName);
}

if (lastNameValue === "") {
  setErrorFor(lastName, "Last Name cannot be empty", e);
} else {
  setSuccessFor(lastName);
}

if (dobValue === "") {
  setErrorFor(dob, "Birth Date cannot be empty", e);
  } else if (
    calculateAge(dobValue) >= 15 && calculateAge(dobValue) <= 80
  ) {
    setSuccessFor(dob);
  } else {
    setErrorFor(dob, "Applicants must be between 15 and 80 years old", e);
  }

  if (!maleRadio.checked && !femaleRadio.checked) {
    setErrorFor(maleRadio, "Gender cannot be empty", e);
  } else {
    setSuccessFor(maleRadio);
  }

  if (addressValue === "") {
    setErrorFor(streetAddress, "Street Address cannot be empty", e);
  } else {
    setSuccessFor(streetAddress);
  }

  if (townValue === "") {
    setErrorFor(town, "Suburb/Town cannot be empty", e);
  } else {
    setSuccessFor(town);
  }

  if (stateValue === "") {
    setErrorFor(state, "Please select your state", e);
  } else {
    setSuccessFor(state);
  }

  if (postcodeValue === "") {
    setErrorFor(postcode, "Postcode cannot be empty", e);
  } else if (vicState.selected && vicRE.test(postcodeValue) || nswState.selected && nswRE.test(postcodeValue) || 
             qldState.selected && qldRE.test(postcodeValue) || ntState.selected && ntRE.test(postcodeValue) || 
             waState.selected && waRE.test(postcodeValue) || saState.selected && saRE.test(postcodeValue) || 
             tasState.selected && tasRE.test(postcodeValue) || actState.selected && actRE.test(postcodeValue))  {
    setSuccessFor(postcode); 
  } else {
    setErrorFor(postcode, "Please enter valid postcode based on your state", e);
  }

  
  if (emailValue === "") {
    setErrorFor(email, "Email cannot be empty", e);
  } else if (!isEmail(emailValue)) {
    setErrorFor(email, "Not a valid email", e);
  } else {
    setSuccessFor(email);
  }

  if (phoneValue === "") {
    setErrorFor(phone, "Phone number cannot be empty", e);
  } else {
    setSuccessFor(phone);
  }

  if (!java.checked && !html.checked && !js.checked && !php.checked 
      && !sql.checked && !ruby.checked && !other.checked) {
    setErrorSkills(other, "Please choose at least one skill", e);
  } else {
    setSuccessSkills(other);
  }

  if (other.checked && oskillsValue === "") {
    otherSkillsError(otherSkills, "Please write down other skills", e);
  } else {
    otherSkillsSuccess(otherSkills);
  }
 
 
}

function preventFormSubmit(e) {
  e.preventDefault();
}

function setErrorFor(input, message, e) {
  var formControl = input.parentElement;
  var small = formControl.querySelector("small");
  formControl.classList.remove("success");
  formControl.classList.add("error");
  small.innerText = message;

  preventFormSubmit(e);
}

function setSuccessFor(input) {
  var formControl = input.parentElement;
  formControl.classList.remove("error");
  formControl.classList.add("success");
}

function setErrorSkills (input, message, e) {
  var formControlSkills = input.parentElement.parentElement;
  var small = formControlSkills.querySelector("small");
  formControlSkills.classList.remove("success");
  formControlSkills.classList.add("error");
  small.innerText = message;

  preventFormSubmit(e);
}

function setSuccessSkills (input) {
  var formControlSkills = input.parentElement.parentElement;
  formControlSkills.classList.remove("error");
  formControlSkills.classList.add("success");
}


function otherSkillsError (textarea, message, e) {
  var formControl = textarea.parentElement;
  var small = formControl.querySelector("small");
  formControl.classList.remove("success");
  formControl.classList.add("error");
  small.innerText = message;

  preventFormSubmit(e);
}

function otherSkillsSuccess(textarea) {
  var formControl = textarea.parentElement;
  formControl.classList.remove("error");
  formControl.classList.add("success");
}


function isEmail(email) {
  return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(
    email
  );
}

function calculateAge(dateString) {
  const parsedDate = dateString.split('/');
  const today = new Date();
  const birthDate = new Date(parsedDate[2], parsedDate[1], parsedDate[0]);
  let age = today.getFullYear() - birthDate.getFullYear();
  const m = today.getMonth() - birthDate.getMonth();
  if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
    age--;
  }
  console.log('age', age);
  return age;
}

// Data storage

*/

var submitBtn = document.getElementById("submitbtn");

submitBtn.addEventListener("click", function() {
  formSessionStorage();
  
});

function formSessionStorage(){

  // setItem
  
var refNumber = document.getElementById("refnumber");
var firstName = document.getElementById("firstname");
var lastName = document.getElementById("lastname");
var dob = document.getElementById("dob");
var streetAddress = document.getElementById("address");
var town = document.getElementById("town");
var state = document.getElementById("state");
var postcode = document.getElementById("postcode");
var email = document.getElementById("email");
var phone = document.getElementById("phone");
var java = document.getElementById("java");
var html = document.getElementById("html");
var js = document.getElementById("js");
var php = document.getElementById("php");
var sql = document.getElementById("sql");
var ruby = document.getElementById("ruby");
var other = document.getElementById("other");
var otherSkills = document.getElementById("oskills");


  var refNumberValue = refNumber.value.trim();
  var firstNameValue = firstName.value.trim();
  var lastNameValue = lastName.value.trim();
  var dobValue = dob.value.trim();
  var addressValue = streetAddress.value.trim();
  var townValue = town.value.trim();
  var stateValue = state.value.trim();
  var postcodeValue = postcode.value.trim();
  var emailValue = email.value.trim();
  var phoneValue = phone.value.trim();
  var oskillsValue = otherSkills.value.trim();

  if (typeof(Storage) !=="undefined"){
  sessionStorage.setItem("refnumber", refNumberValue);
  sessionStorage.setItem("firstname", firstNameValue);
  sessionStorage.setItem("lastname", lastNameValue);
  sessionStorage.setItem("dateofbirth", dobValue);

  // Gender ( Radio button )
  var gender = "";
  if (document.getElementById("male").checked)
      gender = "M";
  else if (document.getElementById("female").checked)
      gender = "F";
  sessionStorage.setItem("gender", gender);
  //

  sessionStorage.setItem("address", addressValue);
  sessionStorage.setItem("town", townValue);
  sessionStorage.setItem("state", stateValue);
  sessionStorage.setItem("postcode", postcodeValue);
  sessionStorage.setItem("email", emailValue);
  sessionStorage.setItem("phone", phoneValue);

  // Skills ( Check Box )
  var skills = [];
    if (java.checked) skills.push('Java');
    if (html.checked) skills.push('HTML/CSS');
    if (js.checked) skills.push('Javascript');
    if (php.checked) skills.push('PHP');
    if (sql.checked) skills.push('SQL');
    if (ruby.checked) skills.push('Ruby');
    if (other.checked) skills.push('Other skills');

    sessionStorage.setItem('skills', JSON.stringify(skills));

  sessionStorage.setItem("otherskills", oskillsValue);

  } 
}




  window.addEventListener("load", () => {
 
    preFillForm();
  
  });


  function preFillForm () {
    // getItem

  let refnumber = localStorage.getItem("refnumber");
  document.getElementById("refnumber").value = refnumber;


  let firstname = sessionStorage.getItem("firstname");
  document.getElementById("firstname").value = firstname;

  let lastname = sessionStorage.getItem("lastname");
  document.getElementById("lastname").value = lastname;

  let dateofbirth = sessionStorage.getItem("dateofbirth");
  document.getElementById("dob").value = dateofbirth;

  // get Radio

  var gender = sessionStorage.getItem("gender");
  if (gender=="M")
    document.getElementById("male").checked = true;
  else if (gender=="F")
    document.getElementById("female").checked = true;


  let address = sessionStorage.getItem("address");
  document.getElementById("address").value = address;

  let town = sessionStorage.getItem("town");
  document.getElementById("town").value = town;

  let state = sessionStorage.getItem("state");
  document.getElementById("state").value = state;

  let postcode = sessionStorage.getItem("postcode");
  document.getElementById("postcode").value = postcode;

  let email = sessionStorage.getItem("email");
  document.getElementById("email").value = email;

  let phone = sessionStorage.getItem("phone");
  document.getElementById("phone").value = phone;

  // get checkbox
  var skills = sessionStorage.getItem('skills') || '[]';
  // Parse skills (that is a JSON array) into javascript array by doing
  var parsedSkills = JSON.parse(skills) || [];

  java.checked = parsedSkills.includes('Java');
  html.checked = parsedSkills.includes('HTML/CSS');
  js.checked = parsedSkills.includes('Javascript');
  php.checked = parsedSkills.includes('PHP');
  sql.checked = parsedSkills.includes('SQL');
  ruby.checked = parsedSkills.includes('Ruby');
  other.checked = parsedSkills.includes('Other skills');
  
  
  
  let otherskills = sessionStorage.getItem("otherskills");
  document.getElementById("oskills").value = otherskills;


  }
  