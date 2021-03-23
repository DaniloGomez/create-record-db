<?php

    $location_store;
    $Where = '';
    $categ;

    if(isset($_REQUEST['location'])){
        $location_store = $_REQUEST['location'];

        if($location_store !=""){
            $Where = "WHERE cs.location = '$location_store'";
        }
    }

    if(isset($_REQUEST['category'])){
        $categ = $_REQUEST['category'];
        if($location_store !=""){
            
            if($Where == ""){
                $Where = "$Where AND en.category = '$categ'";
            }
            else{
                $Where = "$Where AND en.category = '$categ'";
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
    $sql = "SELECT cs.name, cs.location, en.category, pr.prod_name, pr.prod_price FROM `create_store` as cs JOIN enrollment as en ON cs.id = en.store_id JOIN products as pr ON en.product_id = pr.id $Where ORDER BY cs.name ASC
    ";

    //Prepare sentence SQL
    $p = $con->prepare($sql);

    //Execute SQL sentence
    $result = $p->execute();

    $enrollments = $p -> fetchAll();    
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

<form action="full-enrollment.php">
    Location
    <select name="location">
    <option value="<?php echo $location ?>"></option>
        <option value="0">Manizales</option>
        <option value="1">Pereira</option>
    </select>
    <input type="submit" value="Search">
    <br/><br/>
    Category
    <input type="number" name="category" value="<?php echo $categ ?>">
    <hr>
    
</form>

<h1>Enrollment List Search</h1>
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
                        <?php
                        $category = $enrollments[$i]["category"];
                        switch ($category){
                            case 0:
                                echo "Healt";
                                break;
                            case 1:
                                echo "Grosery";
                                break;
                            case 2:
                                echo "Bakery";
                                break;
                        }
                        ?>
                    </td>
                    <td>
                        <?php echo $enrollments[$i]["prod_name"] ?>
                    </td>
                    <td>
                        <?php echo $enrollments[$i]["prod_price"] ?>
                    </td>
                </tr>
<?php
            }
?>

    </table>
</body>
</html>
