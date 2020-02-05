$('#middle_content').fadeOut('slow', function () {
    $('#middle_content').load('loggedin.php #person_profile', function()
    {
        
    });
}).fadeIn('slow');