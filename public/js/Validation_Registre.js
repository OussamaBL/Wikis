document.getElementById("form_registre").addEventListener('submit',(event)=>{
    var email=document.getElementById("email").value;
    var password=document.getElementById("password").value;
    var re_password=document.getElementById("re_password").value;
    var name=document.getElementById("name").value;
    Empty_form();
    if(!isValidEmail(email)){
        document.getElementById("error_email").style.display="block";
        event.preventDefault();
    }
    if(!isValidPassword(password)){
        document.getElementById("error_password").style.display="block";
        event.preventDefault();
    }
    if(password!==re_password){
        document.getElementById("error_re_password").style.display="block";
        event.preventDefault();
    }
    if(!isValidName(name)){
        document.getElementById("error_name").style.display="block";
        event.preventDefault();
    }
})
function Empty_form(){
    document.getElementById("error_email").style.display="none";
    document.getElementById("error_password").style.display="none";
    document.getElementById("error_re_password").style.display="none";
    document.getElementById("error_name").style.display="none";
}
function isValidEmail(email) {
    var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    return emailRegex.test(email);
}

function isValidPassword(password) {
    var passwordRegex = /^(?=.*[a-zA-Z0-9]).{8,}$/;
    return passwordRegex.test(password);
}
function isValidName(name) {
    var nameRegex = /^[A-Za-z\s]+$/;
    return nameRegex.test(name);
}