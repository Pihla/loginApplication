function usernameIsValid(username){
    if(username.trim().length>=3 && username.length<=20){
        return true;
    }
    alert("Username has to contain 3 to 20 characters")
    return false;
}

function passwordIsValid(password){
    if(/\d/.test(password) && password.length>=4 && password.length<=50){//if contains number and is at least 4 characters
        return true;
    }
    else{
        alert("Password has to be 4 to 50 characters and has to contain a number");
        return false;
    }
}

function passwordsMatch(pw1, pw2){
    if(pw1==pw2){
        return true;
    }
    else{
        alert("passwords have to match");
        return false;
    }
}

function validateForm(){
    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;
    let password2 = document.getElementById("password2").value;

    return a=usernameIsValid(username) && passwordIsValid(password) && passwordsMatch(password, password2);

}