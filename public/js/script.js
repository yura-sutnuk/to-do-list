function CheckRegisterData()
{

    var login = document.getElementById('login').value;
    var pass = document.getElementById('pass').value;
    var repeatpass = document.getElementById('repeatpass').value;

    if(pass != repeatpass)
    {
        alert('пароли не совпадают');
        return;
    }
    document.getElementById('Forma').submit();
    /*var  req = new XMLHttpRequest();
    req.onreadystatechange = function(){
        if(req.readyState==4 && req.status==200)
        {

            if(req.responseText != true)
            {
                alert(req.responseText);
            }

        }
    }

    req.open("POST","tryRegister",true );
    req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    req.send("login="+login+"&pass="+pass);*/

}