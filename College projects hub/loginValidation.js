function validate()
{
    let x = document.forms['login']['username'].value;
    let y = document.forms['login']['password'].value;
    if(x == '')
    {
        alert("all fields must be filled out");
        return false;
    }
        
    if(y == '')
    {
        alert("all fields must be filled out");
        return false;
    }
        
    else
        return true;
}