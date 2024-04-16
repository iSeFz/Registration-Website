const form = document.getElementById("form");
const fullname = document.getElementById("fullname");
const username = document.getElementById("name");
const birthdate = document.getElementById("birthdate");
const phone = document.getElementById("phone");
const address = document.getElementById("address");
const photo = document.getElementById("photo");
const email = document.getElementById("email");
const password = document.getElementById("password");
const cpassword = document.getElementById("cpassword");
const actors = document.getElementById("actors");
const submitform = document.getElementById("submitform");

var validfullname = false, validusername = false, validbirthdate = false, validphone = false,
    validaddress = false, validemail = false, validphoto = false, validpass = false, validconfpass = false;

const setErrorFor = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success')
}

const setSuccessFor = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
}

// Methods to check if the input field values are valid
function checkFullname(fullnameValue) {
    if (fullnameValue === "") {
        setErrorFor(fullname, "Full name cannot be blank");
    } 
    else if (!fullnameValue.match(/^[a-zA-Z ]+$/)) {
        setErrorFor(fullname, "Name must be characters only");
    }
    else if (fullnameValue.length < 4) {
        setErrorFor(fullname, "Full name must be at least 4 characters long");
    } else {
        setSuccessFor(fullname);
        validfullname = true;
    }
}

function checkUsername(usernameValue) {
    if (usernameValue === "") {
        setErrorFor(username, "Username cannot be blank");
    } else if (usernameValue.length < 8) {
        setErrorFor(username, "Username must be at least 8 characters long");
    } else {
        setSuccessFor(username);
        validusername = true;
    }
}

function checkBirthdate(birthdateValue) {
    if (birthdateValue === "") {
        setErrorFor(birthdate, "Birthdate cannot be blank");
    } else if (new Date().getFullYear() - new Date(birthdateValue).getFullYear() < 18) {
        setErrorFor(birthdate, "You must be at least 18 years old");
    }
    else {
        setSuccessFor(birthdate);
        validbirthdate = true;
    }
}

function checkPhone(phoneValue) {
    if (phoneValue === "") {
        setErrorFor(phone, "Phone number cannot be blank");
    } else if (phoneValue.length !== 11) {
        setErrorFor(phone, "Phone number must be 11 digits long");
    } else {
        setSuccessFor(phone);
        validphone = true;
    }
}

function checkAddress(addressValue) {
    if (addressValue === "") {
        setErrorFor(address, "Address cannot be blank");
    } else {
        setSuccessFor(address);
        validaddress = true;
    }
}

function checkPassword(passwordValue) {
    if (passwordValue === "") {
        setErrorFor(password, "Password cannot be blank");
    } else if (!passwordValue.match(/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,16}$/)) {
        setErrorFor(password, "Password must be at least 8 characters with at least 1 number and 1 special character");
    } else {
        setSuccessFor(password);
        validpass = true;
    }
}

function checkConfirmPassword(passwordValue, cpasswordValue) {
    if (cpasswordValue === "") {
        setErrorFor(cpassword, "Password cannot be blank");
    } else if (passwordValue !== cpasswordValue) {
        setErrorFor(cpassword, "Passwords does not match");
    } else {
        setSuccessFor(cpassword);
        validconfpass = true;
    }
}

function checkPhoto(photoValue) {
    if (photoValue === "") {
        setErrorFor(photo, "Please upload a photo");
    } else {
        setSuccessFor(photo);
        validphoto = true;
    }
}

function checkEmail(emailValue) {
    const emailRegex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (emailValue === "") {
        setErrorFor(email, "Email cannot be blank");
    } else if (!emailRegex.test(String(emailValue).toLowerCase())) {
        setErrorFor(email, "Please enter a valid email");
    } else {
        setSuccessFor(email);
        validemail = true;
    }
}

// Event listeners to check every input field value at real time
fullname.addEventListener('input', function () {
    checkFullname(this.value.trim());
})

username.addEventListener('input', function () {
    checkUsername(this.value.trim());
})

birthdate.addEventListener('input', function () {
    checkBirthdate(this.value);
})

phone.addEventListener('input', function () {
    checkPhone(this.value.trim());
})

address.addEventListener('input', function () {
    checkAddress(this.value.trim());
})

photo.addEventListener('input', function () {
    checkPhoto(this.value);
})

password.addEventListener('input', function () {
    checkPassword(this.value.trim());
})

cpassword.addEventListener('input', function () {
    checkConfirmPassword(password.value.trim(), this.value.trim());
})

email.addEventListener('input', function () {
    checkEmail(this.value.trim());
})

// Make sure that all fields are filled correctly before submitting
function validateForm() {
    const fullnameValue = fullname.value.trim();
    const usernameValue = username.value.trim();
    const birthdateValue = birthdate.value;
    const phoneValue = phone.value.trim();
    const addressValue = address.value.trim();
    const passwordValue = password.value.trim();
    const cpasswordValue = cpassword.value.trim();
    const photoValue = photo.value;
    const emailValue = email.value.trim();
    // Check all fields
    if (!validfullname) checkFullname(fullnameValue);
    if (!validusername) checkUsername(usernameValue);
    if (!validbirthdate) checkBirthdate(birthdateValue);
    if (!validphone) checkPhone(phoneValue);
    if (!validaddress) checkAddress(addressValue);
    if (!validphoto) checkPhoto(photoValue);
    if (!validpass) checkPassword(passwordValue);
    if (!validconfpass) checkConfirmPassword(passwordValue, cpasswordValue);
    if (!validemail) checkEmail(emailValue);
    if(validfullname && validusername && validbirthdate && validphone && validaddress && validpass && validconfpass && validphoto && validemail)
        return true;
    else return false;
}

// Event listener to check all input fields before submitting the form
submitform.addEventListener('click', e => {
    if (validateForm()) alert("Account created successfully!");
    else e.preventDefault();
})

// Event listener to fetch actors from the API
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        fetch('API_Ops.php', {
            method: 'POST',
            body: new FormData(form)
        })
        .then(response => response.json())
        .then(data => {
            const actorsList = document.getElementById('actors');
            if (data.error) {
                actorsList.innerHTML = `<li>${data.error}</li>`;
            } else {
                actorsList.innerHTML = data.map(name => `<li>${name}</li>`).join('');
            }
        })
        .catch(error => console.error('Error fetching data:', error));
    });
})
