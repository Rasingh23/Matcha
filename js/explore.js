$(document).ready(function () {
    suggested("all");
});



function sortFunction(a, b) {
    if (a[0] === b[0]) {
        return 0;
    }
    else {
        return (a[0] < b[0]) ? -1 : 1;
    }
}

function suggested(val) {
    console.log(val);
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
            console.log("BLOCKLIST: \n"+blocklist);
        }
    });
    $.ajax({
        url: 'functions/suggest.php?action=' + val,
        async: false,
        cache: false,
        dataType: "html",
        success: function (response) {
            suggestion = JSON.parse(response)
            console.log(val);
            document.getElementById("main").innerHTML = '';
            for (let i = 0; i < suggestion.length; i++) {
                info = JSON.parse(suggestion[i]['info']);
                console.log(suggestion[i])
                name = suggestion[i]['User'];
                if (!blocklist.includes(name)) {
                    document.getElementById("main").innerHTML += '<div class="w3-card w3-round w3-white w3-content" style="max-width: 50%; padding: 20px"> <div class="w3-container"><a onclick="redirect(this.text)">' + suggestion[i]['User'] + '</a><br><img src="img/gallery/' + info['dp'] + '" alt="Avatar" style="width:10%"><div style="display:block; float:right"><p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i>' + info["location"] + '</p><p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i>' + info['age'] + 'years old</p><p><i style="font-size:100%;color:gold;" class="fa fa-fw w3-margin-right ">&starf;</i>' + info['rating'] + '</p></div></div></div>';
                }  
            }
        }
    });
}

function select(val) {
    // console.log(val.innerHTML);
    (val.innerHTML);
}

function redirect(name) {
    window.location.href = "search.php?user=" + name;
}