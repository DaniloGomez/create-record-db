<?php
if (!empty($_POST)){

    $name = $_REQUEST["prod_name"];
    $price = $_REQUEST["prod_price"];

    // Connect database
    $host = "localhost";
    $dbname = "store";
    $username = "root";
    $password = "";

    $con = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    //Build sentence SQL
    $sql = "INSERT INTO products (id, prod_name, prod_price) VALUES (NULL, '$name', '$price')";

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
    <title>Create Products</title>
</head>
<body>
    <center><h3 style="font-size:30px; color:red;">Create your products</h3></center>
    <fieldset style="background-color:gray;">
        <form style="font-size:20px; font-family: arial;" action="create-product.php" method="POST">
        <center>
        Name product <input type="text" name=prod_name placeholder=" " value="<?php echo $name; ?>"/>
        
        Product price <input style="font-family:arial; font-size:25px;" type="number" 
        name=prod_price placeholder="$" value="<?php echo $price;?>"/>
        <br/>
        <br/>
        <input type="submit" name="send" style="font-size:20px;">
        </center>
        </form>
    </fieldset>
</body>
</html>