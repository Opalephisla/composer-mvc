<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Add a new movie</h1>
    <form action="addMovie" method="post">
        <label for="title">Titre du film</label>
        <input type="text" name="title" id="title">
        <br>
        <label for="description">Description</label>
        <input type="textarea" name="description" id="description">
        <br>
        <label for="duration">Last name</label>
        <input type="text" name="duration" id="duration">
        <br>
        <label for="date">Last name</label>
        <input type="text" name="date" id="date">
        <br>
        <label for="cover">Last name</label>
        <input type="text" name="cover" id="cover">
        <br>
        <label for="genre">Last name</label>
        <input type="text" name="genre" id="genre">
        <br>
        <label for="director">Last name</label>
        <input type="text" name="director" id="director">
        <br>
        <input type="submit" value="Add">
    </form>
</body>

</html>
