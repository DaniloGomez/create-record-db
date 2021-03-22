<?php

    // Connect database
    $host = "localhost";
    $dbname = "store";
    $username = "root";
    $password = "";

    $con = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    //Build sentence SQL
    $sql = "SELECT cs.name, cs.location, en.category, en.product_id, pr.prod_price FROM `create_store` as cs JOIN enrollment  as en ON cs.id = en.store_id  JOIN products as pr ON en.product_id = pr.id ORDER BY cs.name ASC";

    //Prepare sentence SQL
    $p = $con->prepare($sql);

    //Execute SQL sentence
    $result = $p->execute();

    $enrollments = $p -> fetchAll();

    var_dump($enrollments);

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrollments List</title>
</head>
<body>
    <table border="1">
        <tr>
            <td>
                Name Store
            </td>
            <td>
                Location Store
            </td>
            <td>
                Category
            </td>
            <td>
                Product
            </td>
            <td>
                Price Product
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
                        <?php echo $enrollments[$i]["location"] ?>
                    </td>
                    <td>
                        <?php echo $enrollments[$i]["product_id"] ?>
                    </td>
                    <td>
                        <?php echo $enrollments[$i]["prod_price"] ?>
                    </td>
                    <td>
                        5
                    </td>
                </tr>
<?php
            }
?>

    </table>
</body>
</html>
