<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    foreach ($res as $director) {
        echo $director->getFirstName() . ' ' . $director->getLastName() . ' ';
        echo '<a href="./updateDirector/' . $director->getId() . '">Update</a> ';
        echo '<a href="./deleteDirector/' . $director->getId() . '">Delete</a><br>';
    }
    ?>
</body>

</html>
