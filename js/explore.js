$(document).ready(function () {
    suggested();
    });

function suggested()
{

    var xhr = new XMLHttpRequest();
    var url = "functions/suggest.php";
    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            suggestion = JSON.parse(xhr.responseText)
            console.log(suggestion);
           /*  document.getElementById("suggest_img").setAttribute('src', 'img/'+info.dp); */
           for (let i = 0; i < suggestion.length; i++) {
            info = JSON.parse(suggestion[i]['info']);
            console.log(suggestion[i]['User']);
            document.getElementById("main").innerHTML +=  '<div id="card" class="w3-card w3-round w3-white w3-content" style="max-width: 50%; padding: 20px"> <div class="w3-container"><a>'+ suggestion[i]['User'] +'</a><br><img src="gallery/'+info['dp']+'" alt="Avatar" style="width:10%"><div style="display:block; float:right"><p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i>London, UK</p><p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i>years old</p><p><i style="font-size:100%;color:gold;" class="fa fa-fw w3-margin-right ">&starf;</i></p></div></div></div>';
           }
        }
    };
    xhr.send();
}