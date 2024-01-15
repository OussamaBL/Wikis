document.getElementById("form_login").addEventListener('submit',(event)=>{
    var email=document.getElementById("email").value;
    var password=document.getElementById("password").value;
    Empty_form();
    if(!isValidEmail(email)){
        document.getElementById("error_email").style.display="block";
        event.preventDefault();
    }
    if(!isValidPassword(password)){
        document.getElementById("error_password").style.display="block";
        event.preventDefault();
    }
})
function Empty_form(){
    document.getElementById("error_email").style.display="none";
    document.getElementById("error_password").style.display="none";
}
function isValidEmail(email) {
    var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    return emailRegex.test(email);
}

function isValidPassword(password) {
    var passwordRegex = /^(?=.*[a-zA-Z0-9]).{8,}$/;
    return passwordRegex.test(password);
}