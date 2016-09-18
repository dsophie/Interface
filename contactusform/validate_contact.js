/*
Validation the form in ContactUs by ensuring all fields have been completed
*/
function validate(){
    var name = checkName();
    var email = checkEmail();
    var phone = checkTelephone();
    var message = checkMessage();

    if (name == true && email == true && phone == true && message == true)
    {
        return true;
    }
    else
    {
        //if not all fields are marked are completed
        scroll(0,0); //scroll to top of the page
        //Create a new p element in the HTML page that indicates that the form is not properly completed
        var newP = document.createElement('p'); document.getElementById('targetcontact').appendChild(newP);
        var newTextP = document.createTextNode("Incomplete contact form, please complete the necessary fields and try again");
        newP.appendChild(newTextP);
        return false;
    }
}

//Function called when the field is not correctly field
function highlight(champ, error)
{
    if (error == true)
    {
        champ.style.borderColor="slateblue";
    }
}

//Check name entered: if field is empty, return false and call the function highlight, else return true
function checkName()
{
    if (document.forms[0].name.value != "")
    {
        return true;
    }
    else
    {
        highlight(document.forms[0].name, true);
        return false;
    }
}

//Check email entered: if field is empty, return false and call the function highlight, else return true
function checkEmail()
{
    if (document.forms[0].email.value != "")
    {
        return true;
    }
    else
    {
        highlight(document.forms[0].email, true);
        return false;
    }
}

//Check telephone entered: if field is empty, return false and call the function highlight, else return true
function checkTelephone()
{
    if (document.forms[0].phone.value != "")
    {
        return true;
    }
    else
    {
        highlight(document.forms[0].phone, true);
        return false;
    }
}

//Check message entered: if field is empty, return false and call the function highlight, else return true
function checkMessage()
{
    if (document.forms[0].message.value != "")
    {
        return true;
    }
    else
    {
        highlight(document.forms[0].message, true);
        return false;
    }
}
