<?php

    $httpMethod = strtoupper($_SERVER['REQUEST_METHOD']);

    switch($httpMethod) {
      case "OPTIONS":
        break;
      case "DELETE":
        break;
      case "GET":
        // $pin=json_decode($_POST['data'], true).pin;
        
        // $connUrl = getenv('JAWSDB_MARIA_URL');
        // $hasConnUrl = !empty($connUrl);
        // $connParts = null;
        
        // if ($hasConnUrl) {
        //     $connParts = parse_url($connUrl);
        // }
        
        // $host = $hasConnUrl ? $connParts['host'] : getenv('IP');
        // $dbname = $hasConnUrl ? ltrim($connParts['path'],'/') : 'Final2';
        // $username = $hasConnUrl ? $connParts['user'] : getenv('C9_USER');
        // $password = $hasConnUrl ? $connParts['pass'] : '';
        // $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        // $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "connected succesfully";
        
        // // Compose the SQL statement
        // $sql = "SELECT * FROM Tester";
        // $stmt = $db -> prepare ($sql);
        // echo 'test 1';
        // $stmt -> execute ( array ( ':id' => '1')  );
        // echo 'test 2';
        // echo json_encode($stmt);
        break;
      case 'POST':
        //$StartTime=$_POST['StartTime'];
        $myId = rand(0,1000);
        $Code = $_POST['Code'];
        $Available_From = $_POST['Available_From'];
        $Available_To = $_POST['Available_To'];
        $Type = $_POST['Type'];
        $Slogan = $_POST['Slogan'];
        $Title = $_POST['Title'];
        $Action = $_POST['Action'];
        if($_POST['Archived']!=null){
          $Archived = $_POST['Archived'];
        }else{
          $Archived = 0;
        }
        
        $URL = 'testset';
        $Image = 'tests';
        
        
        echo "MyID: ".$myID;
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
        $sql = "INSERT INTO LandingPage(myId, Code, Available_From, Available_To, Type, Archived, URL, Image, Slogan, Title, Action ) VALUES (:myId, :Code, :Available_From, :Available_To, :Type, :Archived, :URL, :Image, :Slogan, :Title, :Action)";
        $stmt = $db -> prepare ($sql);
        echo "test 1";
        
         $stmt -> execute (  array ( ':myId' => $myId, ':Code' => $Code, ':Available_From' => $Available_From, ':Available_To' => $Available_To, ':Type' => $Type, ':Archived' => $Archived, ':URL' => $URL, ':Image' => $Image, ':Slogan' => $Slogan , ':Title' => $Title , ':Action' => $Action  ) );
         //$stmt -> execute (  array ( ':myId' => '151', ':Code' => 'tester', ':Available_From' => 'tester', ':Available_To' => 'tester', ':Type' => 'tester', ':Archived' => 'tester', ':URL' => 'tester', ':Image' => 'tester')  );
        echo "test 2";
        
        $results = array("status" => 0, "message" => "all good");
        echo "test 3";
        
        header("Access-Control-Allow-Origin: *");
        echo "test 4";   
        
        header("Content-Type: application/json");
        echo "test 5";
        
        echo json_encode($results);
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