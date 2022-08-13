var fnameError = document.getElementById('fname-error');
var lnameError = document.getElementById('lname-error');
var emailError = document.getElementById('email-error');
var contactError = document.getElementById('contact-error');
var postalError = document.getElementById('postal-error');
var addressError = document.getElementById('address-error');
var address1Error = document.getElementById('address1-error');
var cityError = document.getElementById('city-error');
var proError = document.getElementById('province-error');
var disError = document.getElementById('district-error');

function ValidateFname(){
    var FName = document.getElementById('fname').value;

    if(FName.length == 0){
        fnameError.innerHTML = 'required*';
        document.getElementById("fname").style.borderColor ="Red";
        return false;
    }

    fnameError.innerHTML = ''
    document.getElementById("fname").style.borderColor ="Green";
    return true;
}

function ValidateLname(){
    var LName = document.getElementById('lname').value;

    if(LName.length == 0){
        lnameError.innerHTML = 'required*';
        document.getElementById("lname").style.borderColor ="Red";
        return false;
    }

    lnameError.innerHTML = ''
    document.getElementById("lname").style.borderColor ="Green";
    return true;
}

function ValidateEmail(){
    var Email = document.getElementById('email').value;

    if(Email.length == 0){
        emailError.innerHTML = 'required*';
        document.getElementById("email").style.borderColor ="Red";
        return false;
    }

    if(!Email.match(/^[A-Za-z\. \-[0-9]*[@][A-Za-z]*[\. ][a-z]{2,4}$/)){
        emailError.innerHTML = 'Email is invalid';
        document.getElementById("email").style.borderColor ="Red";
        return false;
    }

    emailError.innerHTML = ''
    document.getElementById("email").style.borderColor ="Green";
    return true;
}

function ValidateContact(){
    var Contact = document.getElementById('contact').value;

    if(Contact.length == 0){
        contactError.innerHTML = 'required*';
        document.getElementById("contact").style.borderColor ="Red";
        return false;
    }

    if(Contact.length !== 10){
        contactError.innerHTML = 'Contact Number should be 10 digits';
        document.getElementById("contact").style.borderColor ="Red";
        return false;
    }

    if(!Contact.match(/^[0-9]{10}$/))
    {
        contactError.innerHTML = 'Only digits please';
        document.getElementById("contact").style.borderColor ="Red";
        return false;
    }

    contactError.innerHTML = ''
    document.getElementById("contact").style.borderColor ="Green";
    return true;
}
    
function ValidatePostal(){
    var Postal = document.getElementById('postal').value;

    if(Postal.length == 0){
        postalError.innerHTML = 'required*';
        document.getElementById("postal").style.borderColor ="Red";
        return false;
    }

    if(Postal.length !== 5){
        postalError.innerHTML = 'Invalid Postal Code';
        document.getElementById("postal").style.borderColor ="Red";
        return false;
    }

    postalError.innerHTML = ''
    document.getElementById("postal").style.borderColor ="Green";
    return true;
}
  
function ValidateAddress(){
    var Address = document.getElementById('address').value;

    if(Address.length == 0){
        addressError.innerHTML = 'required*';
        document.getElementById("address").style.borderColor ="Red";
        return false;
    }

    addressError.innerHTML = ''
    document.getElementById("address").style.borderColor ="Green";
    return true;
}

function ValidateAddress1(){
    var Address1 = document.getElementById('address1').value;

    if(Address1.length == 0){
        address1Error.innerHTML = 'required*';
        document.getElementById("address1").style.borderColor ="Red";
        return false;
    }

    address1Error.innerHTML = ''
    document.getElementById("address1").style.borderColor ="Green";
    return true;
}
  
function ValidateCity(){
    var City = document.getElementById('city').value;

    if(City.length == 0){
        cityError.innerHTML = 'required*';
        document.getElementById("city").style.borderColor ="Red";
        return false;
    }

    cityError.innerHTML = ''
    document.getElementById("city").style.borderColor ="Green";
    return true;
}

function ValidateProvince(){
    var Pro= document.getElementById('province').value;

    if(Pro.length == 0){
        proError.innerHTML = 'required*';
        document.getElementById("province").style.borderColor ="Red";
        return false;
    }

    proError.innerHTML = ''
    document.getElementById("province").style.borderColor ="Green";
    return true;
}
function ValidateDistrict(){
    var Dis = document.getElementById('district').value;

    if(Dis.length == 0){
        disError.innerHTML = 'required*';
        document.getElementById("district").style.borderColor ="Red";
        return false;
    }

    disError.innerHTML = ''
    document.getElementById("district").style.borderColor ="Green";
    return true;
}