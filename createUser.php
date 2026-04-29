<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        if(isset($_POST["submit"])){
            $post_data = [
                "username" => $_POST["username"],
                "firstName" => $_POST["firstName"],
                "lastName" => $_POST["lastName"],
                "age" => $_POST["age"],
            ];
            $post_data = json_encode($post_data);
            $curl = curl_init();
    
            curl_setopt($curl,CURLOPT_URL,"http://localhost:8888/api-classexample-2026/api/user/create.php");
            curl_setopt($curl,CURLOPT_CUSTOMREQUEST,"POST");
            curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);

            curl_setopt($curl, CURLOPT_HTTPHEADER, [
                "Accept" => "application/json",
                "Content-Type" => "application/json"
            ]);

            curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);

            $result = curl_exec($curl);

            curl_close($curl);

            $result = json_decode($result,true);
        }
    ?>

    <form action="createUser.php" method="post">
        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username">
        </div>
        <div>
            <label for="firstName">First Name:</label>
            <input type="text" name="firstName" id="firstName">
        </div>
        <div>
            <label for="lastName">Last Name:</label>
            <input type="text" name="lastName" id="lastName">
        </div>
        <div>
            <label for="age">Age:</label>
            <input type="text" name="age" id="age">
        </div>
        <div>
            <button type="submit" name="submit" id="submit">Save</button>
        </div>
    </form>

    <?php 
        if(isset($result)){
            echo "<p>".$result["message"]."</p>";
        }
    ?>
    
</body>
</html>