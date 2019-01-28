
 where_i_stay = ''; 

window.onload = function () {

/* if (authf == 1)
{ */
    getLocation();

/*     authf = 0;
} */
    //console.log("bitches");
    //console.log(where_i_stay);
} 
function getLocation() {
  
    if (navigator.geolocation) {
         navigator.geolocation.getCurrentPosition(showPosition, showError);
    }
    else {
        // alert("Geolocation is not supported by this browser.");
        ipFetch();
    }
}

function pushLocation()
{
    $.post('functions/pushlocation.php?locate='+where_i_stay, function (response){});
}
function showPosition(position) {;
    url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=" + position.coords.latitude + "," + position.coords.longitude + "&key=AIzaSyA47t1t0JjL53u3KznXoMF_6oeVVjWTYaM";
    $.post(url, function (response) {
       console.log("G API START");
        console.log(response.results[4]["geometry"]["location"]["lat"] + " , " + response.results[4]["geometry"]["location"]["lng"]);
        console.log("G API END");
       console.log(response.results[4]['formatted_address'])
        where_i_stay = response.results[4]['formatted_address'];
       // document.getElementById('locate').append(where_i_stay);
    });

}

function showError(error) {
    //run IP geoloc on failure
  switch(error.code) {
    case error.PERMISSION_DENIED:
      alert("User denied the request for Geolocation.");
      ipFetch();
      break;
    case error.POSITION_UNAVAILABLE:
      alert("Location information is unavailable.");
      ipFetch();
      break;
    case error.TIMEOUT:
      alert("The request to get user location timed out.");
      ipFetch();
      break;
    case error.UNKNOWN_ERROR:
      alert("An unknown error occurred.");
      ipFetch();
      break;
  }
}

function ipFetch() {

    ///////////IP search start

    url = "http://api.ipstack.com/check?access_key=d115280486eb2f2f8ebb6038c3dd4423";
    //  url = "https://geoip-db.com/jsonp/";
    $.post(url, function (response) {
        //var jsonified = response.slice(9,-1);
        //var test = JSON.parse(jsonified);
       // console.log("IPFETCh");
       // console.log(response['city']);
        where_i_stay = response['city']
        document.getElementById('locate').append(where_i_stay);
       // console.log(response['latitude']);
       // console.log(response["longitude"]);
       // gMapSrch(response);
    });
}


  function gMapSrch(res){

          //////////googlemaps start
          url = "https://maps.googleapis.com/maps/api/geocode/json?latlng="+res['latitude']+","+res["longitude"]+"&key=AIzaSyA47t1t0JjL53u3KznXoMF_6oeVVjWTYaM";
          $.post(url, function (response2) {
          //  console.log("gmaps");
          //console.log(response2.results[4]['formatted_address']);
              where_i_stay = response2.results[4]['formatted_address'];
            // alert(where_i_stay)

          });   
    
          //////////googlemaps end

  }