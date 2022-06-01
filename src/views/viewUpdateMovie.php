<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Update movie</h1>
    <form action="../updateMovie" method="post">
        <label for="title">Title of the movie</label>
        <input type="text" name="title" id="title" value=<?= $movie->getTitle() ?>>
        <br>
        <label for="description">Description</label>
        <input type="textarea" name="description" id="description" value=<?= $movie->getDescription() ?>>
        <br>
        <label for="duration">Duration</label>
        <input type="textarea" name="duration" id="duration" value=<?= $movie->getDuration() ?>>
        <br>
        <label for="date">Release date</label>
        <input type="textarea" name="date" id="date" value=<?= $movie->getReleaseDate() ?>>
        <br>
        <label for="genre_id">Genre</label>
        <input type="textarea" name="genre_id" id="genre_id" value=<?= $movie->getGenre() ?>>
        <br>
        <label for="director_id">Director</label>
        <input type="textarea" name="director_id" id="director_id" value=<?= $movie->getDirector() ?>>
        <input type="hidden" name="id" value=<?= $movie->getId() ?>>
        <br>
        <input type="submit" value="Update">
    </form>
</body>

</html>
