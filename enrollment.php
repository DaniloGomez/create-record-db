<?php


    // Connect database
    $host = "localhost";
    $dbname = "store";
    $username = "root";
    $password = "";

    $con = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    //Build sentence SQL
    $sql = "SELECT id, name FROM create_store";

    //Prepare sentence SQL
    $p = $con->prepare($sql);

    //Execute SQL sentence
    $result = $p->execute();

    $store = $p -> fetchAll();

    var_dump($store);

    if($result){
        echo "Enrollment created!";
    }
    else{
        echo "There is an error creating your enrollment";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrollment</title>

</head>
<body>
    <center><h3 style="color:Blue;font-size:30px;">Enrollment</h3></center>
    <div style="font-size:20px;">
        <center>
        <form action="create-store.php" method="POST">
            Name Store <select name="store" id="">
            <option value="">Choose</option>
            <?php
                for($i=0; $i<count($store); $i++){
            ?>
                <option value="<?php echo $store[$i]["id"] ?>"><?php echo $store[$i]["name"] ?></option>
            <?php    
                }
            ?>
            </select><br/>
            Product <input type="text" name=products/><br/>
            Category <input type="text" name=category><br/>
            <input type="submit" name="enrollment" value="Create Enrollment"/>
        </form>
        </center>
    </div>
</body>
</html>