function formValidate(){
    var username=signupform.username.value;  
    var password=signupform.pass.value;  
    var confirmpass = signupform.confirmpass.value;
    var email = signupform.email.value;
    var atposition= email.indexOf("@");  
    var dotposition= email.lastIndexOf(".");  
    var contact = signupform.contact.value;

    if (username==null || username==""){  
        alert("Name can't be blank");  
        return false;  
      }
    else if (password.length<6){
        if(password==confirmpass){
            return true;
        }
            
        else{
            alert("password not same");
            return false;
        }

    }
    else if (isNaN(contact)){
        document.getElementById("number").innerHTML="Enter Numeric value only";
        return false;
            }
      
    else{
        if (atposition<1 || dotposition<atposition+2 || dotposition+2>=email.length){  
            alert("Please enter a valid e-mail address \n atpostion:"+atposition+"\n dotposition:"+dotposition);  
            return false;  
            }  
    }
    
}
