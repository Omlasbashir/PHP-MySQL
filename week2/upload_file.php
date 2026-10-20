<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h3>student photo upload</h3>
    <form action="" method="post" enc >
        <fieldset>
            
            <label for="">Name: </label>
            <input type="text" name = "fullname"> <br><br>

            <label for="">profile Image: </label>
            <input type="text" name = "profile"> <br><br>

            <input type="submit" name = "submit" value = "register">
        </fieldset>


    </form>



</body>
</html>


<?php
if (isset($_POST["submit"])){
    echo "<h3>file information</h3>"
}


?>