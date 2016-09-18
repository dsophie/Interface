/*
Validate the registration form making sure all fields have been completed
*/

//Main function called from form in HTML
function validate()
{
    var Fname = checkFName();
    var Lname = checkLName();
    var email = checkEmail();
    var pass = checkPassword();
    var conf = checkConfirmPassword();
    
    if (Fname == true && Lname == true && email == true && pass == true && conf == true)
        { 
            return true;
        }
    else
        {
            /*
            If not all fields checked true:
            - scroll to the top of the page
            - create a new text paragraph saying that there is an error
            - insert paragraph in HTML at the top of the page
            */
            scroll(0,0); //Go back to the top of the page
            var newP = document.createElement('p');
            document.getElementById('target').appendChild(newP);
            var newTextP = document.createTextNode("Incomplete registration form, please see fields in blue");
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

function checkFName()
{
    if (document.forms[0].fname.value != "")
        {
            return true;
        }
    else
        {
            highlight(document.forms[0].fname, true);
            return false;
        }
}

function checkLName()
{
    if (document.forms[0].lname.value != "")
        {
            return true;
        }
    else
        {
            highlight(document.forms[0].lname, true);
            return false;
        }
}

function checkEmail()
{
   if (document.forms[0].email.value != "")
        return true;
    else
        {
            highlight(document.forms[0].email, true);
            return false;
        } 
}

function checkPassword()
{
   if (document.forms[0].password.value != "")
        return true;
    else
        {
            highlight(document.forms[0].password, true);
            return false;
        } 
}

function checkConfirmPassword()
{
   if (document.forms[0].conf.value == document.forms[0].password.value)
        return true;
    else
        {
            highlight(document.forms[0].conf, true);
            return false;
        } 
}

