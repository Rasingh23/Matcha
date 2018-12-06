 function newimg() {
 
         imageupload = document.getElementById("userpic");
         imageupload.click();
         imageupload.addEventListener('change', function () {
             if (imageupload.files && imageupload.files[0]) {
                /*  var reader = new FileReader(); */
                // alert("Image exists");
         /*         reader.onload = function (e) {
                     document.getElementById('newimg').setAttribute('src', e.target.result);
                 };
                 reader.readAsDataURL(imageupload.files[0]); */
                 ajaxupload();
             }
        
         });
 
     }

     function ajaxupload() {
        alert("ajuploaddh running");
        var pic = document.getElementById("userpic").files[0];
        console.log(pic);

        var hr = new XMLHttpRequest();
        var url = "upload.php";
        var formData = new FormData();
        formData.append("userpic", pic);
         hr.open("POST", url, true);
         hr.onreadystatechange = function() {
            if(hr.readyState == 4 && hr.status == 200) {
                var return_data = hr.responseText;
               alert(return_data);
               alert('damn');
            }
        }
        hr.send(formData); 
    

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
                alert(return_data);
             }
         }
         hr.send(formData); 
     */
       
        }
