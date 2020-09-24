function btnreg() {	

    $.ajax({  // create an ajax POST request to dep_data.php
    url: 'Register.php', // URL to which you want to submit or retrieve the data
    success: function(response){ //A function to be called if the request sucsseds
    $('#getf').html(response);
    }
    });
}