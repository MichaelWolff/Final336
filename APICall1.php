<?php 
	session_start();
?>
<!DOCTYPE html>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!--<script src="http://code.jquery.com/jquery-1.9.1.js"></script>-->
 <script>
      $(function () {

        $('form').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'API.php',
            data: $('form').serialize(),
            success: function () {
                window.location="index.php";
            //   alert('form was submitted');
            }
          });

        });

      });
    </script>
<html>
    <head>
	    <title>Scheduler</title>
	    <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>
    <body>
        <div class="container">
            <form id="form" action="" enctype="multipart/form-data" method = "POST">
                <label for="Code">Code</label>
                <input id="Code" name="Code" placeholder="Nails, Hats, etc..."  type="text"></textarea>
                
                <label for="Available_From">Available From</label>
                <input id="Available_From" name="Available_From" type="date">

                <label for="Available_To">Available To</label>
                <input id="Available_To" name="Available_To"type="date">

                <label for="Type">Type</label>
                <input id="Type"  placeholder="Standard, Special, Holiday, etc..." name="Type" type="text">
                
                <label for "Archived">Archived</label>
                <input type="checkbox" id="Archived"name="Archived" value="Archived"></br></br>

                <label for="Details">Details</label>
                <textarea id="Details" name="Details" placeholder="Write something.." style="height:200px"></textarea>
                
                <label for="Slogan">Slogan</label>
                <input id="Slogan" name="Slogan" placeholder="Slogan..."  type="text"></textarea>
                
                <label for="Title">Title</label>
                <input id="Title" name="Title" placeholder="Title..."  type="text"></textarea>
                
                <label for="Action">Action</label>
                <input id="Action" name="Action" placeholder="Action..."  type="text"></textarea>
                
                <p>This is the page to create or edit a landing page, check the archived box if you would like to save this landing page. Note that this will mean that it is not visible from the dashboard</p>
                 <a href="index.php"><input id="Cancel"type="button" Value="Cancel">
                <input type="submit" value="Save Landing Page" />
            </form>
      </div>
  			<script>
                $( 'Appointment' ).submit(function ( e ) {
                    
  			        var form = $(this);
  			        var formData = $(form).serialize();
                    $.ajax({
                        type: 'POST',
                        url: 'API.php',
                        data: formData
                    })
                    .done(function(response) {
                        // console.log('response');
                        window.location="index.php";
                    })
                    e.preventDefault();
                });
  			</script>
    </body>
</html>