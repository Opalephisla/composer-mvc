<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Update director</h1>
    <form action="../updateDirector" method="post">
        <label for="first_name">First name</label>
        <input type="text" name="first_name" id="first_name" value=<?= $director->getFirstName() ?>>
        <br>
        <label for="last_name">Last name</label>
        <input type="text" name="last_name" id="last_name" value=<?= $director->getLastName() ?>>
        <input type="hidden" name="id" value=<?= $director->getId() ?>>
        <br>
        <input type="submit" value="Add">
    </form>
</body>

</html>
