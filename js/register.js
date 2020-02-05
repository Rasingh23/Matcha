var where_i_stay = ''
var mylat = ''
var mylng = ''
$(document).ready(function()
{
    getLocation();
})

$('form').submit(async function (event) {
    event.preventDefault();
    value = $('form').serializeArray();
    value.push({name: 'location', value: where_i_stay});
    value.push({name: 'lat', value: mylat});
    value.push({name: 'lng', value: mylng});
    console.log('form submition');
    console.log(value);
    check = await register(value)
    if (check == 1) {
        $('#content').fadeOut('slow', function () {
            $('#content').load("includes/UI/loggedout.php #login", function () {
                $('h2').after('<div class="w3-panel w3-green w3-center"><h3> Registration Success!</h3><p>Please check your email to activate account </p></div>');
                managescript('login.js', 'add');
                managescript('register.js', 'remove');
            }).fadeIn('slow');
        });
    }
    else {
        if (document.getElementById('error'))
            $('#error').html(check);
        else {
            $('h2').after('<div class="w3-panel w3-red w3-center"><h3>ERROR!</h3><p id="error"></p></div>');
            $('#error').html(check);
        }
    }
    return false;
});

async function register(value) {
    request = await Ajax('register.php', 'POST', value, false);
    return request;
}


function getLocation() {
    if (navigator.geolocation) {
        // alert("it works");
         navigator.geolocation.getCurrentPosition(showPosition, showError);
    }
    else {
        // alert("Geolocation is not supported by this browser.");
        ipFetch();
    }
}
function showPosition(position) {
    // console.log(position);
    // console.log("we in showpos");
   // alert('pos logged');
  // newURL = "https://eu1.locationiq.com/v1/reverse.php?key=8e4472c0e891f7&lat=" + position.coords.latitude + "&lon=" + position.coords.longitude + "&format=json";
  newURL = "https://maps.googleapis.com/maps/api/geocode/json?latlng=" + position.coords.latitude + "," + position.coords.longitude + "&key=AIzaSyBYnoXVRD46cmI0jzrp_PvFtRNTm5p-SW8";
    $.post(newURL, function (response) {
        // console.log(response)
    //    console.log(response['display_name']);
        // console.log("G API START");
        // console.log(response.results[4]["geometry"]["location"]["lat"] + " , " + response.results[4]["geometry"]["location"]["lng"]);
        // console.log("G API END");
        // console.log(response.results[4]['formatted_address'])
         where_i_stay =response['display_name'];
         mylng = response.results[4]["geometry"]["location"]["lng"];
         mylat = response.results[4]["geometry"]["location"]["lat"];

       //  alert(where_i_stay);
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
  //  url = "http://api.ipstack.com/check?access_key=d115280486eb2f2f8ebb6038c3dd4423";
    //   url = "https://eu1.locationiq.com/v1/reverse.php?key=8e4472c0e891f7&lat=" + position.coords.latitude + "&lon=" + position.coords.longitude + "&format=json";
    //  url = "https://geoip-db.com/jsonp/";
    $.getJSON("http://www.geoplugin.net/json.gp", function(result){
    // console.log('res', result);
    where_i_stay =result['geoplugin_city'];
         mylng = result["geoplugin_latitude"];
         mylat = result["geoplugin_longitude"];
        //  console.log(mylng);
        //  console.log(mylat);
        //  console.log(where_i_stay);
});
    // $.post(url, function (response) {
    //     //var jsonified = response.slice(9,-1);
    //     //var test = JSON.parse(jsonified);
    //     console.log("IPFETCh");
    //     console.log(response['city']);
    //     where_i_stay = response['city']
    //    // console.log(response['latitude']);
    //    // console.log(response["longitude"]);
    //    // gMapSrch(response);
    // });
}

  function gMapSrch(res){

          //////////googlemaps start
          url = "https://maps.googleapis.com/maps/api/geocode/json?latlng="+res['latitude']+","+res["longitude"]+"&key=AIzaSyBYnoXVRD46cmI0jzrp_PvFtRNTm5p-SW8";
          $.post(url, function (response2) {
        //     console.log("gmaps");
        //   console.log(response2.results[4]['formatted_address']);
              where_i_stay = response2.results[4]['formatted_address'];
            // alert(where_i_stay)
            mylng = response.results[4]["geometry"]["location"]["lng"];
            mylat = response.results[4]["geometry"]["location"]["lat"];
          });   
    
          //////////googlemaps end

  }
