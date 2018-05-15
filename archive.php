<?php

    $httpMethod = strtoupper($_SERVER['REQUEST_METHOD']);
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
        $sql = "UPDATE LandingPage SET Archived=1 WHERE myId=".$q;
        $stmt = $db -> prepare ($sql);
        //echo "test 1";
        
         $stmt -> execute ( );
         header('Location: index.php'); 
         
?>