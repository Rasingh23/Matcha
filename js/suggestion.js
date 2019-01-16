$(document).ready(function () {
    suggested();
    });

function suggested()
{
    alert("in yr loop");
    var xhr = new XMLHttpRequest();
    var url = "functions/suggest.php";
    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            suggestion = JSON.parse(xhr.responseText)
            console.log(suggestion[0]);
            document.getElementById("suggest_name").textContent = suggestion[0]['User'];
            document.getElementById("suggest_name").href = "localhost:8080/Matcha/search.php?user=" + suggestion[0]['User'];
            info = JSON.parse(suggestion[0]['info'])
            console.log(info['dp']);
            document.getElementById("suggest_img").setAttribute('src', 'img/'+info['dp']);
        }
    };
    xhr.send();
}