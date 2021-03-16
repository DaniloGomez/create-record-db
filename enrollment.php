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
    
        //Build sentence SQL
        $sql = "SELECT id, prod_name FROM products";
        //Prepare sentence SQL
        $p = $con->prepare($sql);
        //Execute SQL sentence
        $result = $p->execute();
        $product = $p -> fetchAll();


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
        <form action="enrollment.php" method="POST">

            Name Store <select name="store_id" id="">
            <option value=""></option>
            <?php
                for($i=0; $i<count($store); $i++){
            ?>
                <option value="<?php echo $store[$i]["id"] ?>">
                <?php echo $store[$i]["name"] ?>
                </option>

            <?php    
                }
            ?>
            </select><br/>
            <br/>
            Product <select name="product_id" id="">
            <option value=""></option>
            <?php
                for($i=0; $i<count($product); $i++){
            ?>
                <option value="<?php echo $product[$i]["id"] ?>">
                <?php echo $product[$i]["prod_name"] ?>
                </option>
            <?php
                }
            ?>
            </select>
            <br/>
            <br/>
            Category:
            <input type="radio" name="category" value="0">Health
            <input type="radio" name="category" value="1">Grosery
            <input type="radio" name="category" value="2">Bakery
                        
            <br/><br/>

            <input type="submit" name="enrollment" value="Create Enrollment"/>

        </form>
        </center>
    </div>
</body>
</html>

<?php

if(!empty($_POST)){
    $namestore = $_REQUEST["store_id"];
    $nameproduct = $_REQUEST["product_id"];
    $categ = $_REQUEST["category"];

    // Connect database
    $host = "localhost";
    $dbname = "store";
    $username = "root";
    $password = "";

    $con = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    //Build sentence SQL
    $sql = "INSERT INTO enrollment (id, store_id, product_id, category) VALUES (NULL, '$namestore', '$nameproduct', '$categ')";

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