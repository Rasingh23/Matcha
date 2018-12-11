

window.onload = function(){

var searchBtn = document.getElementById("srchBtn");
//var searchTxt = document.getElementById("srchBox");
var res = document.getElementById("results");
/* searchTxt.addEventListener('onkeyup', function(){
    alert(searchTxt);
    res.innerHTML += searchTxt;
    fetchnames(searchTxt);
}); */



}

function fetchnames(textsrch){
    
    //document.getElementById("testres").innerHTML += textsrch;

    if(textsrch){

    
    var xhr = new XMLHttpRequest();
    var url = "functions/funcs.php";
    var newvars="fetchnames="+textsrch;
    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function(){

    if (xhr.readyState == 4 && xhr.status == 200)
    {
        chkstat = JSON.parse(xhr.responseText);
       // alert(chkstat['User']);
       //alert(chkstat.length);

/*         Object.keys(chkstat).forEach(function(key) {

            console.log(key, chkstat[key]);
          //  document.getElementById("results").innerHTML += chkstat['User'];
        document.getElementById("testres").innerHTML += chkstat['User'];
          
          }); */
          document.getElementById("results").innerHTML = "";
          if(chkstat.length > 0){
       for (var i = 0; i < chkstat.length; i++)
       {
    
         /* document.getElementById("results").innerHTML += chkstat[i]['User']+"<br>";  */
         var a = document.createElement('a');
var linkText = document.createTextNode(chkstat[i]['User']);
a.appendChild(linkText);
a.title = chkstat[i]['User'] + '<br>';
a.href = "localhost:8080/Matcha/search.php?user="+chkstat[i]['User'];
a.target = "blank";
document.getElementById("results").appendChild(a);
 document.getElementById("results").innerHTML += "<br>"; 
        //document.getElementById("testres").innerHTML += chkstat[i]['User'];
       }
    }else {
        document.getElementById("results").innerHTML = "No results";
    }
       //document.getElementById("results").innerHTML = JSON.parse(chkstat)[0];


    }
    };
 xhr.send(newvars);  
}else{
   // alert("empty");
}
}