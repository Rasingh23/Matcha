

window.onload = function () {

    var searchBtn = document.getElementById("srchBtn");
    //var searchTxt = document.getElementById("srchBox");
    var res = document.getElementById("results");
    /* searchTxt.addEventListener('onkeyup', function(){
        alert(searchTxt);
        res.innerHTML += searchTxt;
        fetchnames(searchTxt);
    }); */



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