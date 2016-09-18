/* Validate the login form, making sure no field was left empty when the user clicks submit */
function validate()
{
   var email = checkEmail();
    var password = checkPassword();
    
    //If all fields have been answered, return true: allow the php part to be executed
    if (email == true && password == true)
        {
            return true;
        }
    //If all fields have not been answered, return false
    else
        {   
            scroll(0,0); //Scroll to the top of page
            //Create a new p element in login page that displays an error message
            var newP = document.createElement('p');
            document.getElementById('targetlogin').appendChild(newP);
            var newTextP = document.createTextNode("Incomplete form, please see fields in blue");
            newP.appendChild(newTextP); 
            return false;
        } 
        
}

//Highligh the field that's not validated by adding a slateblue border
function highlight(champ, error)
{
    if (error == true)
        {
            champ.style.borderColor="slateblue";
        }
}

//Check email has been entered
function checkEmail()
{
    if (document.forms[0].loginemail.value != "")
        {
            return true;
        }
    else
        {
            highlight(document.forms[0].loginemail, true);
            return false;
        }
}

//Check password has been entered
function checkPassword()
{
    if (document.forms[0].loginpassword.value != "")
        {
            return true;
        }
    else
        {
            highlight(document.forms[0].loginpassword, true);
            return false;
        }
}