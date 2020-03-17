
//Walidacja Rejestracji
document.addEventListener("DOMContentLoaded", function(event) {

  firstName = document.getElementById("firstName");
  lastName = document.getElementById("lastName");
  email = document.getElementById("email");
  password = document.getElementById("password");
  password2 = document.getElementById("password2");

  lettersOnly = /[^A-Za-zżźćńółęąśŻŹĆĄŚĘŁÓŃ]/g;
  lettersSpecial = /[^A-Za-zżźćńółęąśŻŹĆĄŚĘŁÓŃ-]/g;
  emailReg = /^[-\w\.]+@([-\w]+\.)+[a-z]+$/i;
  passwordReg = /^(?=.*\d)(?=.*[a-z])(?=.*[\!\@\#\$\%\^\&\*\(\)\_\+\-\=])(?=.*[A-Z])(?!.*\s).{8,}$/;

  firstName.addEventListener("blur", validateFirstName, false);
  lastName.addEventListener("blur", validateLastName, false);
  email.addEventListener("blur", validateEmail, false);
  password.addEventListener("blur", validatePassword, false);
  password2.addEventListener("keyup", validateSecondPassword, false);
  document.getElementById("registerButton").addEventListener("click", validate, false);

});

function validate() {
  firstNameErr = true;
  lastNameErr = true;
  emailErr = true;
  passwordErr = true;
  password2Err = true;

  validateFirstName();
  validateLastName();
  validateEmail();
  validatePassword();
  validateSecondPassword();

  if (!(firstNameErr || lastNameErr || emailErr || passwordErr || password2Err))
    document.getElementById("registerForm").submit();
}

function validateFirstName() {
  if (firstName.value.length == 0) {
    document.getElementById("firstNameError").innerHTML = "Imię nie moży być puste.";
    firstNameErr = true;
  }
  else if (lettersOnly.test(firstName.value)) {
    firstNameErr = true;
    document.getElementById("firstNameError").innerHTML = "Imię może zawierać tylko litery.";
  }
  else {
    firstNameErr = false;
    document.getElementById("firstNameError").innerHTML = "";
  }
}

function validateLastName() {
  if (lastName.value.length == 0) {
    lastNameErr = true;
    document.getElementById("lastNameError").innerHTML = "Nazwisko nie moży być puste.";
  }
  else if (lettersSpecial.test(lastName.value)) {
    lastNameErr = true;
    document.getElementById("lastNameError").innerHTML = "Nazwisko może zawierać tylko litery oraz znak \"-\".";
  }
  else {
    lastNameErr = false;
    document.getElementById("lastNameError").innerHTML = "";
  }
}

function validateEmail() {
  if (email.value.length == 0) {
    emaiErr = true;
    document.getElementById("emailError").innerHTML = "Email nie moży być pusty.";
  }
  else if (emailReg.test(email.value) == false) {
    emailErr = true;
    document.getElementById("emailError").innerHTML = "Email nieprawdłowy.";
  }
  else {
    emailErr = false;
    document.getElementById("emailError").innerHTML = "";
  }
}

function validatePassword() {
  if (password2.value.length != 0)
    validateSecondPassword();
  if (password.value.length < 8) {
    passwordErr = true;
    document.getElementById("passwordError").innerHTML = "Hasło musi się składać przynajmniej z ośmiu znaków.";
  }
  else if (passwordReg.test(password.value) == false) {
    document.getElementById("passwordError").innerHTML = "Hasło musi zawierać co najmniej jedną cyfrę, co najmniej jedną dużą literę, co najmniej jedną małą literę i co najmniej jeden znak z grupy !@#$%^&*()_+-=";
    passwordErr = true;
  }
  else {
    passwordErr = false;
    document.getElementById("passwordError").innerHTML = "";
  }
}

function validateSecondPassword() {
  if (password.value.localeCompare(password2.value) != 0) {
    password2Err = true;
    document.getElementById("password2Error").innerHTML = "Hasła nie są identyczne.";
  }
  else {
    password2Err = false;
    document.getElementById("password2Error").innerHTML = "";
  }
}
