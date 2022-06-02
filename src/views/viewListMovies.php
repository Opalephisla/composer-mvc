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
    foreach ($res as $movie) {
        echo '<a href="./movieMovies/' . $movie->getId() . '">' . $movie->getTitle() . '</a> ';
        echo '<a href="./updateMovie/' . $movie->getId() . '">Update</a> ';
        echo '<a href="./deleteMovie/' . $movie->getId() . '">Delete</a><br>';
    }
    ?>
</body>

</html>
