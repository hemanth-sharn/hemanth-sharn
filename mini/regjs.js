function validate1()
{
    let firstname = document.getElementById("firstname").value;
    let middlename = document.getElementById("middlename").value;
    let lastname= document.getElementById("lastname").value;
    var phone = document.getElementById("phone").value;
    var email = document.getElementById("email").value;
    var address = document.getElementById("address").value;
    var error_message = document.getElementById("error_message");
    
    error_message.style.padding = "20px";
    
    var text;
    if(firstname.length < 2)
    {
      text = "Please Enter valid firstName";
      error_message.innerHTML = text;
      return false;
    }
    
     if(isNaN(phone) || phone.length != 10){
      text = "Please Enter valid Phone Number";
      error_message.innerHTML = text;
      return false;
    }
    if(email.indexOf("@") == -1 || email.length < 6){
      text = "Please Enter valid Email";
      error_message.innerHTML = text;
      return false;
    }
    if(address.length <= 10){
      text = "Please Enter vlaid address";
      error_message.innerHTML = text;
      return false;
    }
    alert("Form Submitted Successfully!");
    return true;
  }