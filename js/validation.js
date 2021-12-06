const validateform = () =>{
    var contacts = document.getElementById("usercontact").value.trim();
    var useremail = document.getElementById("useremail").value.trim();
    var messages = document.getElementById("messages").value.trim();
    if(contacts == ""){
        toastr.warning("please fill contact field");
        return false;
    }else if(useremail == ""){
        toastr.warning("please enter your email adress");
        return false;
    }else if(messages == ""){
        toastr.warning("please enter message item");
        return false;
    }else{
        return true;  
    }
}