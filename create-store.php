<?php
if (!empty($_POST))
{
    $name = $_REQUEST["name"];
    $location = $_REQUEST["location"];
    $phone = $_REQUEST["phone"];

    // Connect database
    $host = "localhost";
    $dbname = "store";
    $username = "root";
    $password = "";

    $con = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    //Build sentence SQL
    $sql = "INSERT INTO create_store (id, name, location, phone) VALUES (NULL, '$name', '$location', '$phone')";

    //Prepare sentence SQL
    $p = $con->prepare($sql);

    //Execute SQL sentence
    $result = $p->execute();

    if($result){
        echo "Store created succesfully";
    }
    else{
        echo "There is an error";
    }
}
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Store</title>

</head>
<body>
    <center><h3 style="color:green;font-size:30px;">Register your store</h3></center>
    <div style="font-size:20px;">
        <center>
        <form action="create-store.php" method="POST">
            Name <input type="text" name=name value=<?php echo $name; ?>><br/>
            Location <input type="radio" name=location value="0"/>Manizales
                    <input type="radio" name=location value="1"/>Pereira<br/>
            Phone <input type="tel" id="phone" name=phone placeholder="123 456 1122" value="<?php echo $phone; ?>"/><br/><br/>
            <input type="submit" name="Register" value="Save Store"/>
        </form>
        </center>
    </div>
</body>
</html>