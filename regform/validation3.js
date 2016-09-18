/*
Validate the registration form making sure all fields have been completed
*/

//Main function called from form in HTML
function validate()
{
   
    var Q1 = checkQ1();
    var Q2 = checkQ2();
    var Q3 = checkQ3();
    var Q5 = checkQ5();
    
    if (Q1 == true && Q2 == true && Q3 == true && Q5 == true)
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


function checkQ1()
{
    var r = document.getElementsByName("motivation");
    var i = 0;
    
    while (i < r.length)
        {
            if (r[i].checked)
                {
                    return true;
                }
            i++;
        }
    
   
    highlight(document.getElementById("Q1"), true);
    return false;
}

function checkQ2()
{
    var r = document.getElementsByClassName("checkbox");
    var i = 0;
    var count = 0;
    
    while (i < r.length)
        {
            if (r[i].checked)
                {
                    count++;
                }
            i++;
        }
    
    if (count > 0 && count <= 5)
        {
            return true;
        }
    else
        {
            highlight(document.getElementById("Q2"), true);
            return false;
        }
}

function checkQ3()
{
    var r = document.getElementsByName("time");
    var i = 0;
    
    while (i < r.length)
        {
            if (r[i].checked)
                {
                    return true;
                }
            i++;
        }
    
   
    highlight(document.getElementById("Q3"), true);
    return false;
}


function checkQ5()
{
    var r = document.getElementsByName("type");
    var i = 0;
    
    while (i < r.length)
        {
            if (r[i].checked)
                {
                    return true;
                }
            i++;
        }
    
   
    highlight(document.getElementById("Q5"), true);
    return false;
}
