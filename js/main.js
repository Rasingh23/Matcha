
$(document).ready(function () {
suggested();
});

window.onload = function () {

    //suggested();
    
    var searchBtn = document.getElementById("srchBtn");
    //var searchTxt = document.getElementById("srchBox");
    var res = document.getElementById("results");


    if (document.getElementById("del"))
    {
    document.getElementById("del").addEventListener('click', function() {
        deletepic();
    });
    }
}



function suggested()
{
    var xhr = new XMLHttpRequest();
    var url = "functions/suggest.php?action=all";
    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200 && document.getElementById("suggest_name")) {
            suggestion = JSON.parse(xhr.responseText)
            document.getElementById("suggest_name").textContent = suggestion[0]['User'];
            //document.getElementById("suggest_name").href = "search.php?user=" + suggestion[0]['User'];
            info = JSON.parse(suggestion[0]['info'])
            //console.log(info['dp']);
            document.getElementById("suggest_img").setAttribute('src', 'img/'+info['dp']);
        }
    };
    xhr.send();
}

function deletepic()
{
    if (document.getElementById("img3").style.display == "block")
    {
        src = document.getElementById("img3").src;
        document.getElementById("img3").setAttribute('src', null);
        document.getElementById("img3").style.display = "none";
    }
    else if (document.getElementById("img2").style.display == "block")
    {
        src = document.getElementById("img2").src;
        document.getElementById("img2").setAttribute('src', null);
        document.getElementById("img2").style.display = "none";
    }
    else if (document.getElementById("img1").style.display == "block")
    {
        src = document.getElementById("img1").src;
        document.getElementById("img1").setAttribute('src', null);
        document.getElementById("img1").style.display = "none";
    }
    else
    {
        src = document.getElementById("img0").src;
        document.getElementById("img0").setAttribute('src', null);
        document.getElementById("img0").style.display = "none";
    }
    var hr = new XMLHttpRequest();
    var url = "delete.php";
    var formData = "src="+src;
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function () {
        if (hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
  
        }
    }
    hr.send(formData);
}

function fetchnames(textsrch) {

    //document.getElementById("testres").innerHTML += textsrch;

    if (textsrch) {


        var xhr = new XMLHttpRequest();
        var url = "functions/funcs.php";
        var newvars = "fetchnames=" + textsrch;
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {

            if (xhr.readyState == 4 && xhr.status == 200) {
                chkstat = JSON.parse(xhr.responseText);
                document.getElementById("results").innerHTML = "";
                if (chkstat.length > 0) {
                    for (var i = 0; i < chkstat.length; i++) {

                        var a = document.createElement('a');
                        var linkText = document.createTextNode(chkstat[i]['User']);
                        a.appendChild(linkText);
                        a.id = chkstat[i]['User'];
                        a.title = chkstat[i]['User'] + '<br>';
                        a.href = "localhost:8080/Matcha/search.php?user=" + chkstat[i]['User'];
                        a.target = "blank";
                        document.getElementById("results").appendChild(a);
                        document.getElementById("results").innerHTML += "<br>";

                    }
                } else {
                    document.getElementById("results").innerHTML = "No results";
                }


            }
        };
        xhr.send(newvars);
    }
}