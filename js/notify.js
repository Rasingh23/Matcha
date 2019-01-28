
$('document').ready(function () {
    document.getElementById("clear").addEventListener('click', function() {
        alert("IN IT");
        $.post('functions/notify.php?action=remove', function(response){
            alert(response);
        });
        $("notify a").remove();
    });
});