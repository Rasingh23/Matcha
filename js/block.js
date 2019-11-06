function block() {
    user = document.getElementById("name").textContent;
    // alert("User has been blocked by function22222");
    // alert("hello");
    // console.log("UserID = "+ $GLOBALS['u_id']);
    // console.log("other use = " + user);
    // alert("User has been blocked by function");
    // /* Insert blocking code here */
    var hr = new XMLHttpRequest();
    var url = "block.php";
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
     hr.onreadystatechange = function() {
        if(hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            console.log(return_data);
        }
    }
    hr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
     ret = "user="+user;
    // // console.log("FUKK: "+ret);
    hr.send(ret);
    document.getElementById("btnblock").textContent = "blocked";
    // location('home.php');
    window.location = 'home.php';
    // Headers.location('home.php');
}