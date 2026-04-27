<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php 
        $curl = curl_init();
    
        curl_setopt($curl,CURLOPT_URL,"http://localhost:8888/api-classexample-2026/api/user/read.php");
        curl_setopt($curl,CURLOPT_CUSTOMREQUEST,"GET");
        curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);

        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            "Accept" => "application/json",
            "Content-Type" => "application/json"
        ]);

        $result = curl_exec($curl);

        curl_close($curl);

        $result = json_decode($result,true);
        $data = $result["data"];
        // print_r($data);

        foreach($data as $user){
            echo "<div style='border:1px solid black';>";
            echo "<h2>{$user['username']}</h2>";
            echo "<p>{$user['firstName']} {$user['lastName']}</p>";
            echo "</div>";
        }
        

        // echo $result;

    
    ?>



</body>
</html>