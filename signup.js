const form = document.getElementById("form");
const fullname = document.getElementById("fullname");
const nname = document.getElementById("name");
const birthdate = document.getElementById("birthdate");
const phone = document.getElementById("phone");
const address = document.getElementById("address");
const photo = document.getElementById("photo");
const email = document.getElementById("email");
const password = document.getElementById("password");
const cpassword = document.getElementById("cpassword");
const actors = document.getElementById("actors");
const submitform = document.getElementById("submitform");

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
};

const isEmail = email => {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

const validateInputs = () => {
    const fullnameValue = fullname.value.trim();
    const birthdateValue = birthdate.value;
    const phoneValue = phone.value.trim();
    const addressValue = address.value.trim();
    const photoValue = photo.value;
    const nnameValue = nname.value.trim();
    const emailValue = email.value.trim();
    const passwordValue = password.value.trim();
    const cpasswordValue = cpassword.value.trim();

    var validfullname = false;
    if (fullnameValue === "") {
        setErrorFor(fullname, "Full name cannot be blank");
    } 
    else if (!fullnameValue.match(/^[a-zA-Z]+$/)) {
        setErrorFor(fullname, "Name must be characters only");
    }
    else if (fullnameValue.length < 4) {
        setErrorFor(fullname, "Please enter your full name");
    } else {
            setSuccessFor(fullname);
            validfullname = true;
    }

    var validbirthdate = false;
    if (birthdateValue === "") {
        setErrorFor(birthdate, "Birthdate cannot be blank");
    } else if (new Date().getFullYear() - new Date(birthdateValue).getFullYear() < 18) {
        setErrorFor(birthdate, "You must be at least 18 years old");
    }
    else {
        setSuccessFor(birthdate);
        validbirthdate = true;
    }

    var validphone = false;
    if (phoneValue === "") {
        setErrorFor(phone, "Phone number cannot be blank");
    } else if (phoneValue.length !== 11) {
        setErrorFor(phone, "Phone number must be 11 digits long");
    } else {
            setSuccessFor(phone);
            validphone = true;
    }

    var validaddress = false;
    if (addressValue === "") {
        setErrorFor(address, "Address cannot be blank");
    } else {
        setSuccessFor(address);
        validaddress = true;
    }

    var validphoto = false;
    if (photoValue === "") {
        setErrorFor(photo, "Please upload a photo");
    } else {
        setSuccessFor(photo);
        validphoto = true;
    }

    var validnname = false;
    if (nnameValue === "") {
        setErrorFor(nname, "Username cannot be blank");
    } else if (nnameValue.length !== 8) {
        setErrorFor(nname, "Username must be 8 characters long");
    } else {
            setSuccessFor(nname);
            validnname = true;
    }

    var validemail = false;
    if (emailValue === "") {
        setErrorFor(email, "Email cannot be blank");
    } else if (!isEmail(emailValue)) {
        setErrorFor(email, "Not a valid email");
    } else {
        setSuccessFor(email);
        validemail = true;
    }

    var validpass = false;
    if (passwordValue === "") {
        setErrorFor(password, "Password cannot be blank");
    } else if (!passwordValue.match(/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,16}$/)) {
        setErrorFor(password, "Password must be at least 8 characters with at least 1 number and 1 special character");
    } else {
        setSuccessFor(password);
        validpass = true;
    }

    var validconfpass = false;
    if (cpasswordValue === "") {
        setErrorFor(cpassword, "Password cannot be blank");
    } else if (passwordValue !== cpasswordValue) {
        setErrorFor(cpassword, "Passwords does not match");
    } else {
        setSuccessFor(cpassword);
        validconfpass = true;
    }

    if (validnname && validemail && validpass && validconfpass && validfullname && validbirthdate && validphone && validaddress && validphoto) {
        return true;
    }
    return false;
};

submitform.addEventListener('click', e => {
    validateInputs();
    if (validateInputs()) {
        alert("Account created successfully!");
    }
    else {
        e.preventDefault();
    }
});

form.addEventListener('submit', e => {
    e.preventDefault();
});

