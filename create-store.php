<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Store</title>

</head>
<body>
    <h3>Register your store</h3>
    <form action="save-store.php" method="POST">
        Name <input type="text" name=name><br/>
        Location <input type="radio" name=location value="0"/>Manizales
                <input type="radio" name=location value="1"/>Pereira<br/>
        Phone <input type="tel" id="phone" name=phone placeholder="123 456 1122"/><br/><br/>
        <input type="submit" name="Register" value="Save Store"/>
    </form>
</body>
</html>