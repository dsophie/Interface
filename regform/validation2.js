/*
Validate the registration form making sure all fields have been completed
*/

//Main function called from form in HTML
function validate()
{
    var date = checkDate();
    var phone = checkPhone();
    var country = checkCountry();
    var city = checkCity();
    var postcode = checkPostcode();
    var address = checkAddress();
    
    
    if (date == true && phone == true && country == true && city == true && postcode == true && address == true)
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

function checkYear()
{
    if (document.forms[0].year.value != "" && document.forms[0].year.value <= 1998 )
        {
            return true;
        }
    else
        {
            highlight(document.forms[0].year, true);
            return false;
        }
}

function checkMonth()
{
    if (document.forms[0].month.value != "" && document.forms[0].month.value >= 1 && document.forms[0].month.value <= 12)
        {
            return true;
        }
    else
        {
            highlight(document.forms[0].month, true);
            return false;
        }
}

function checkDay()
{
    if (document.forms[0].day.value != "" && document.forms[0].day.value >= 1 && document.forms[0].day.value <= 31)
        {
            return true;
        }
    else
        {
            highlight(document.forms[0].day, true);
            return false;
        }
}

function checkDate()
{
    var year = checkYear();
    var month = checkMonth();
    var day = checkDay();
    
    if (day == true && month == true && year == true)
        {
            return true;
        }
    else
        {
            return false;
        }
}

function checkPhone()
{
   if (document.forms[0].telephone.value != "")
        return true;
    else
        {
            highlight(document.forms[0].telephone, true);
            return false;
        } 
}

function checkCountry()
{
   if (document.forms[0].country.value != "")
        return true;
    else
        {
            highlight(document.forms[0].country, true);
            return false;
        } 
}

function checkCity()
{
   if (document.forms[0].city.value != "")
        return true;
    else
        {
            highlight(document.forms[0].city, true);
            return false;
        } 
}

function checkPostcode()
{
   if (document.forms[0].postcode.value != "")
        return true;
    else
        {
            highlight(document.forms[0].postcode, true);
            return false;
        } 
}

function checkAddress()
{
   if (document.forms[0].address.value != "")
        return true;
    else
        {
            highlight(document.forms[0].address, true);
            return false;
        } 
}

