<?php 
	session_start();
?>
<!DOCTYPE html>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<html>
    <head>
	    <title>Final 2018-05-14</title>
	    <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>
<body>
    <div class="container">
        <?php
            $files = glob("img/*.*");
            for ($i=0; $i<count($files); $i++){
            $image = $files[$i];
            $supported_file = array(
               'jpg',
               'jpeg',
               'png'
            );
            $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
            if (in_array($ext, $supported_file)) {
            // echo basename($image)."<br />"; // show only image name if you want to show full path then use this code // echo $image."<br />";
            echo '<img src="'.$image .'" alt="Random image" />'."<br /><br />";
            } else {
                continue;
            }
         }
        ?>
     <h2>Final 2018-5-14</h2>
        <a href="APICall1.php"><button>API Call 1</button></a>
        <a href="rubric.html"><button>Grading Rubric</button></a>
        <form action="uploadFile.php" method="post" enctype="multipart/form-data">
            Upload Banner:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
        </form>
    
    <?php
        //The new connection setup for Heroku
        ////////////////////////////////////////////////////////////
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

        $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql =  'SELECT * FROM LandingPage WHERE Archived=0';

        $stmt = $dbConn -> prepare ($sql);
        $stmt -> execute (  array ( ':id' => '1')  );
        
        echo '<img style="float: right; width: 60px; height: 60px;" src=icons/AddPage.png alt="Random image" />';
        echo '<h2 style=float:right>Archived<h2>';
        if ($stmt->rowCount() > 0) {
        $table_str3.='<table id="appointments">';
            $table_str3.='<th>Code</th>';
            $table_str3.='<th>Available From</th>';
            $table_str3.='<th>Available To</th>';
            $table_str3.='<th>Type</th>';
            $table_str3.='<th></th>';
            
            while ($row = $stmt -> fetch())  {
                //fills the table rows
                $table_str3.='<tr>';
                $table_str3.='<td>'.$row['Code'].'</td>'.'<td>'.$row['Available_From'].'</td>'.'<td>'.$row['Available_To'].'</td>'.'<td>'.$row['Type'].'</td>';
                // $table_str3.='<td><input type="button" value="delete" onclick="remove('.$row['myId'].')"</td>';
                $table_str3.='<td><a href="EditRecord.php?q='.$row['myId'].'"><img src="icons/edit.png" alt="HTML tutorial" style="height:100%;"></a></td>';
                $table_str3.='<td><a href=Archive.php?q='.$row['myId'].'"><img src="icons/archive.png" alt="HTML tutorial" style="height:100%;"></a></td>';
                $table_str3.='<td><a href="default.asp"><img src="icons/copyURL.png" alt="HTML tutorial" style="height:100%;"></a></td>';
                $table_str3.='<td><a href="default.asp"><img src="icons/Preview.png" alt="HTML tutorial" style="height:100%;"></a></td>';
                $table_str3.='</tr>';
            
        }
        
            $table_str3.='</table>';
            echo '<div class="row">';
            echo $table_str3;
            echo '</div>';
        } else {
            echo "No data found";
        }
    ?>
        </body>
    </div>
  		<script>
  		    function remove(pin) {
  			    var data = {"pin": pin};
                $.ajax({
                    type: 'GET',
                    url: 'AppointmentAPI.php',
                    data: {'data': data},
                    dataType: "json",
                    success: function ( data ) {
                        window.location.href = "index.php";
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                    }
                });
            }
  	    </script>
</html>