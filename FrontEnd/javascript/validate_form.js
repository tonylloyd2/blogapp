var password = document.getElementById('password');
var confirm_password = document.getElementById('cpassword');
var email = document.querySelector('email');
var error_msg = document.querySelector('error');
function validate() {

	
        if (password.value == confirm_password.value) {
            return true
        }
        if (password != confirm_password) {
            alert("the passwords didnt match");
            return false
        }

    

}
function show_pass(){
    if(password.type == 'password' ){
        password.type = "text";
    }
    else if(password.type == 'text'){
        password.type = "password";
    }
    if(confirm_password.type == 'password'){
        confirm_password.type = "text";
    }
    else if(confirm_password.type == 'text'){
        confirm_password.type = "password";
    }  

}

function hide_error() {
    if (password != confirm_password) {
      
    } 
}