
$('document').ready(function () {
   checknotify();  
});
 
setInterval(function() {
    checknotify();
}, 5000);

function checknotify()
{
    document.getElementById("notify").innerHTML = '';
    $.post('functions/notify.php?action=fetch', function (response) {
   res = JSON.parse(response)
   for (const key in res) {
       if (res.hasOwnProperty(key)) {
           document.getElementById("notify").innerHTML += '<a href="#" class="w3-bar-item w3-button">' + res[key] + '</a>';
       }
   }
   $("#notifycount").text(Object.keys(res).length);
   if (Object.keys(res).length > 0)
   {
   document.getElementById("notify").innerHTML +=  '<a href="#" class="w3-bar-item w3-button" id="clear" onclick="clearnotify()">clear</a>';
   }
});
}
 function clearnotify() {
        $.post('functions/notify.php?action=clear', function (response) {
 
        });
        $("#notify a").remove();
    $("#notifycount").text(0);
    }