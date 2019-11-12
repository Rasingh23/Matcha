$(document).ready(function () {
    var blocklist = [];
    $.ajax({
        url: 'functions/suggest.php?action=blocked',
        async: false,
        cache: false,
        dataType: "html",
        success: function (list) {

            suggestion = JSON.parse(list);
            var blocked = JSON.parse(suggestion["blocklist"]);
            var keys = Object.keys(blocked);
            for (let index = 0; index < keys.length; index++) {
                blocklist[index] = blocked[keys[index]];
            }
            console.log("BLOCKLIST: \n" + blocklist);
        }
    });

    window.$_GET = new URLSearchParams(location.search);
    var name = $_GET.get('user');
    
    if (blocklist.includes(name)) {
        window.location = "home.php";
    }
});