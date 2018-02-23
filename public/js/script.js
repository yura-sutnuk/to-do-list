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
}

function drugOBJ(obj, e)
{
    function drug(e){
        if(!stop) {
            var cursorY = e.clientY;
            var orderPos = Math.ceil((cursorY - elemY) / 54);
            var elem = document.getElementsByClassName('class' + orderPos)[0];
            if(elem === undefined)
            {
                return;
            }
            elem.style.order = obj.style.order;
            elem.className = 'unselectable class'+ elem.style.order;
            obj.style.order = orderPos;
            obj.className = 'unselectable class' + obj.style.order;
        }
    }
    var stop = false;
    var elemY = document.getElementById('block').getBoundingClientRect().top;
    document.onmousemove = drug;
    document.onmouseup = function(){
        stop = true;
        document.onmouseup='';
        document.onmousemove='';
    }

}