<?php

    $httpMethod = strtoupper($_SERVER['REQUEST_METHOD']);

    switch($httpMethod) {
      case "OPTIONS":
        break;
      case "DELETE":
        break;
      case "GET":
        break;
      case 'POST':
        //$StartTime=$_POST['StartTime'];
        $myId = $_POST['myId'];
        $Code = $_POST['Code'];
        $Available_From = $_POST['Available_From'];
        $Available_To = $_POST['Available_To'];
        $Type = $_POST['Type'];
        $Slogan = $_POST['Slogan'];
        $Title = $_POST['Title'];
        $Action = $_POST['Action'];
        $Details = $_POST['Details'];
        if($_POST['Archived']!=null){
          $Archived = $_POST['Archived'];
        }else{
          $Archived = 0;
        }
        
        $URL = 'testset';
        $Image = 'tests';
        
        
        echo "MyID: ".$myId;
        echo "MyCode: ".$Code;
        echo "Available_From: ".$Available_From;
        echo "Available_To: ".$Available_To;
        echo "Type: ".$Type;
        echo "Archived: ".$Archived;
        
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
        $sql = "UPDATE LandingPage SET Code='".$Code."' WHERE myId=".$myId;
        $stmt = $db -> prepare ($sql);
        echo "test 1";
        
         $stmt -> execute ( );
         header('Location: index.php'); 
        break;
    }
?>


<!--$StartTime=$_POST['StartTime'];-->
<!--        echo $initialTime = $StartTime;-->
<!--        echo $StartTime.'</br>';-->
        
<!--        $connUrl = getenv('JAWSDB_MARIA_URL');-->
<!--        $hasConnUrl = !empty($connUrl);-->
<!--        $connParts = null;-->
        
<!--        if ($hasConnUrl) {-->
<!--            $connParts = parse_url($connUrl);-->
<!--        }-->
        
<!--        $host = $hasConnUrl ? $connParts['host'] : getenv('IP');-->
<!--        $dbname = $hasConnUrl ? ltrim($connParts['path'],'/') : 'Final2';-->
<!--        $username = $hasConnUrl ? $connParts['user'] : getenv('C9_USER');-->
<!--        $password = $hasConnUrl ? $connParts['pass'] : '';-->
<!--        $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);-->
<!--        $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);-->
<!--        echo "connected succesfully";-->
        
<!--        // Compose the SQL statement-->
<!--        $sql = "INSERT INTO Appointment(StartTime) VALUES (:StartTime)";-->
<!--        $stmt = $db -> prepare ($sql);-->
<!--        echo "test 1";-->
        
<!--        while($StartDate<$EndDate){-->
<!--            $StartTime=$initialTime;-->
<!--            $StartDate=date('Y-m-d H:i:s', strtotime($StartDate . ' +1 day'));-->
<!--            for ($x=0; $x<$Appointments; $x++) {-->
<!--                $stmt -> execute (  array ( ':StartDate' => $StartDate, ':StartTime' => $StartTime, ':EndDate' => $EndDate, 'Details' => $Details, ':Duration' => $ApptLength)  );-->
<!--                $StartTime = date('Y-m-d H:i',strtotime('+'.$ApptLength.' minutes',strtotime($StartTime)));-->
<!--            }-->
<!--        }-->
<!--        echo "test 2";-->
        
<!--        $results = array("status" => 0, "message" => "all good");-->
<!--        echo "test 3";-->
        
<!--        header("Access-Control-Allow-Origin: *");-->
<!--        echo "test 4";   -->
        
<!--        header("Content-Type: application/json");-->
<!--        echo "test 5";-->
        
<!--        echo json_encode($results);-->
<!--        header('Location: index.php'); -->
<!--        break;-->