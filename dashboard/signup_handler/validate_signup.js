function check()
{
    var a = checkQ1();

    if (a == false)
    {
        scroll(0,0);
        var newP = document.createElement('p');
        document.getElementById('targetsign').appendChild(newP);
        var newTextP = document.createTextNode("Incomplete sign up form, please make sure you completed all fields");
        newP.appendChild(newTextP); 
        return false;
    }
    else
        {
            return true;
        }

}

function highlight(champ, error)
{
    if (error == true)
    {
        champ.style.borderColor="slateblue";
    }
}

function checkQ1()
{
    var q = document.getElementsByName("hours");
    var i = 0;

    while (i < q.length)
    {
        if (q[i].checked)
        {
            return true;
        }
        i++;
    }

    highlight(document.getElementById("Q1"), true);
    return false;
}
