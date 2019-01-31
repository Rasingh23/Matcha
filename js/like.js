$('document').ready(function () {

    var btnlike = document.getElementById("like");
    btnlike.addEventListener("click", function () {
        var sumn = btnlike.getAttribute('data-this_shit');
        var stat = btnlike.textContent;

        var liked = 0;
        if (btnlike.textContent == 'Like') {
            btnlike.textContent = 'Unlike';
            liked = 1;
        }
        else if (btnlike.textContent == 'Like back') {
            btnlike.textContent = 'Unlike';
            liked = 1;
        }
        else{
            btnlike.textContent = 'Like';
            liked = 0;
        }

        var hr = new XMLHttpRequest();
        var url = "conlike.php";
         hr.open("POST", url, true);
        hr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        user = document.getElementById("name").textContent;
        ret = "liked="+liked+"&user="+user+"&uid="+sumn+"&stat="+stat;
        console.log("FUKK: "+ret);
        hr.send(ret);
    });
});
