<?php 
	session_start();
?>
<!DOCTYPE html>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 <script>
      $(function () {

        $('form').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'APIUpdate.php',
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
    <?php

    $q=$_GET["q"];
    echo $q;
    
     //$StartTime=$_POST['StartTime'];
        $connUrl = getenv('JAWSDB_MARIA_URL');
        $hasConnUrl = !empty($connUrl);
        $connParts = null;
        
        if ($hasConnUrl) {
            $connParts = parse_url($connUrl);
        }
        
        $host = $hasConnUrl ? $connParts['host'] : getenv('IP');
        $dbname = $hasConnUrl ? ltrim($connParts['path'],'/') : 'Final2';
        $username = $hasConnUrl ? $connParts['user'] : getenv('C9_USER');
        $password = $hasConnUrl ? $connParts['pass'] : '';
        $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "connected succesfully";
        
        // Compose the SQL statement
        $sql = "Select * FROM LandingPage WHERE myId=".$q;
        $stmt = $db -> prepare ($sql);
        //echo "test 1";
        
        $stmt -> execute (array ( ':id' => '1') );
        $row = $stmt -> fetch();
        $Code = $row['Code'];
        $Available_From = $row['Available_From'];
        $Available_To= $row['Available_To'];
        $Type= $row['Type'];
        $Archived= $row['Archived'];
        $Details= $row['Details'];
        $Slogan= $row['Slogan'];
        $Title= $row['Title'];
        $Action= $row['Action'];
        
        ?>
    <body>
        <div class="container">
            <form id="form" action="" enctype="multipart/form-data" method = "POST">
                <label for="myId">Identifier</label>
                <input id='myId' name='myId' type='number' value="<?php echo $q;?>" readonly>
                
                <label for="Code">Code</label>
                <input id="Code" name="Code" value="<?php echo $Code;?>" type="text"></textarea>
                
                <label for="Available_From">Available From</label>
                <input id="Available_From" name="Available_From" type="date" value="<?php echo $Available_From;?>">

                <label for="Available_To">Available To</label>
                <input id="Available_To" name="Available_To"type="date" value="<?php echo $Available_To;?>">

                <label for="Type">Type</label>
                <input id="Type"  placeholder="Standard, Special, Holiday, etc..." name="Type" type="text" value="<?php echo $Type;?>">
                
                <label for "Archived">Archived</label>
                <input type="checkbox" id="Archived"name="Archived" value="<?php echo $Archived;?>"></br></br>

                <label for="Details">Details</label>
                <textarea id="Details" name="Details"  style="height:200px" value="<?php echo $Details;?>"></textarea>
                
                <label for="Slogan">Slogan</label>
                <input id="Slogan" name="Slogan" placeholder="Slogan..."  type="text" value="<?php echo $Slogan;?>"></textarea>
                
                <label for="Title">Title</label>
                <input id="Title" name="Title" placeholder="Title..."  type="text" value="<?php echo $Title;?>"></textarea>
                
                <label for="Action">Action</label>
                <input id="Action" name="Action" placeholder="Action..."  type="text" value="<?php echo $Action;?>"></textarea>
                
                <p>This is the page to create or edit a landing page, check the archived box if you would like to save this landing page. Note that this will mean that it is not visible from the dashboard</p>
                 <a href="index.php"><input id="Cancel"type="button" Value="Cancel">
                <input type="submit" value="Save Landing Page" />
            </form>
      </div>
    </body>
</html>