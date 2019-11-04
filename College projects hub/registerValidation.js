//alert("yes we are connected");
function regValidate()
{
    console.log("yes we have validated the registration.");
    var x = document.forms["register"]["username"].value;
    var y = document.forms["register"]["password"].value;
    var z = document.forms["register"]["email_id"].value;
    var a = document.forms["register"]["phone"].value;
    var b = document.forms["register"]["address"].value;
    var c = document.forms["register"]["college"].value;
   
    if(x == "")
    {
        alert("all fields must be filled out");
        return false;
    }
    if(y == "")
    {
        alert("all fields must be filled out");
        return false;
    }
    if(z == "")
    {
        alert("all fields must be filled out");
        return false;
    }
    if(a == "")
    {
        alert("all fields must be filled out");
        return false;
    }
    if(b == "")
    {
        alert("all fields must be filled out");
        return false;
    }
    if(c == "")
    {
        alert("all fields must be filled out");
        return false;
    }
   
}

function clearFields()
{
    //var x = document.
}