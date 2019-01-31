function newimg() {

    imageupload = document.getElementById("userpic");
    imageupload.click();
    imageupload.addEventListener('change', function () {
        if (imageupload.files && imageupload.files[0]) {
            /*  var reader = new FileReader(); */

            /*         reader.onload = function (e) {
                        document.getElementById('newimg').setAttribute('src', e.target.result);
                    };
                    reader.readAsDataURL(imageupload.files[0]); */
            ajaxupload();
        }

    });

}
function ajaxdisplay() {
    var hr = new XMLHttpRequest();
    var url = "display.php";
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function () {
        if (hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            var test = JSON.parse(return_data);
            var arrayLength = test.length;
            for (var i = 0; i < arrayLength; i++) {
                console.log(test[i]['img']);
                document.getElementById('img' + i).setAttribute('src', test[i]['img']);
                document.getElementById('img' + i).style.display = "block";
            }
        }
    }
    hr.send();
}


$('document').ready(function () {
    console.log("hi");
    ajaxdisplay();
});







function ajaxupload() {
    var pic = document.getElementById("userpic").files[0];


    var hr = new XMLHttpRequest();
    var url = "upload.php";
    var formData = new FormData();
    formData.append("userpic", pic); 
    hr.open("POST", url, true);
 //hr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function () {
        if (hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
    
            ajaxdisplay();
        }
    }
    hr.send(formData);

    document.getElementById("form").reset();

    /*  
     var hr = new XMLHttpRequest();
      var url = "upload.php";
      var thefile = document.getElementById("newimg");
      console.log(thefile.src);
     var formData = new FormData();
     formData.append("userpic", thefile);
      hr.open("POST", url, true);
      hr.onreadystatechange = function() {
          if(hr.readyState == 4 && hr.status == 200) {
              var return_data = hr.responseText;

          }
      }
      hr.send(formData); 
  */

} 
