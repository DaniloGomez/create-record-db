<?php

    $location_store;
    $Where = '';
    $prod;

    if(isset($_REQUEST['product_id'])){
        $prod = $_REQUEST['product_id'];
        $Where = "WHERE en.product_id = '$prod'";

        if(isset($_REQUEST['location'])){
            $location_store = $_REQUEST['location'];
            if($location_store !=""){
                $Where = "$Where OR cs.location = $location_store";
            }
        }   
    }

    // Connect database
    $host = "localhost";
    $dbname = "store";
    $username = "root";
    $password = "";

    $con = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    //Build sentence SQL
    $sql = "SELECT cs.name, cs.location, pr.prod_name FROM `create_store` as cs JOIN enrollment as en ON cs.id = en.store_id JOIN products as pr ON en.product_id = pr.id $Where ORDER BY cs.name ASC
    ";
    //Prepare sentence SQL
    $p = $con->prepare($sql);
    //Execute SQL sentence
    $result = $p->execute();
    $enrollments = $p -> fetchAll();

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

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report store by product</title>
</head>
<body>

<form action="report-products.php">
    Location
    <select name="location">
    <option value=""></option>
        <option value="0">Manizales</option>
        <option value="1">Pereira</option>
    </select>
    <input type="submit" value="OR">
    <br/><br/>
    Product
    <select name="product_id" id="">
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
    <hr>
    
</form>

<h1>Report store by product</h1>
    <table border="1">
        <tr>
            <td>
                Name Store
            </td>
            <td>
                Location Store
            </td>
            <td>
                Product
            </td>
        </tr>

<?php
            for($i=0; $i<count($enrollments); $i++){
?>
                <tr>
                    <td>
                        <?php echo $enrollments[$i]["name"] ?>
                    </td>
                    <td>
                        <?php 
                        $location = $enrollments[$i]["location"];
                        if($location == "0"){
                            echo "Manizales";
                        }
                        else{
                            echo "Pereira";
                        }
                        ?>
                    </td>
                    <td>
                        <?php echo $enrollments[$i]["prod_name"] ?>
                    </td>
                </tr>
<?php
            }
?>

    </table>
</body>
</html>

