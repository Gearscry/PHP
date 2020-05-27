<!DOCTYPE html>
<html>
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Inscription !</title>

    <!-- CSS Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha256-L/W5Wfqfa0sdBNIKN9cG6QA5F2qx4qICmU2VgLruv9Y=" crossorigin="anonymous">
</head>
<body>
<header class="container">
    <br>
    <p>Nouvel élève !</p>
    <hr>
</header>
<div class="container">
    <form action="controller.php?func=ajoutStudent" method="post">
        <div class="form-group">
            <label>Id</label>
            <input type="text" class="form-control" id="id" name ="id" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label>Id Professeur</label>
            <input type="text" class="form-control" id="user_id" name ="user_id" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label>Nom</label>
            <input type="text" class="form-control" id="nom" name ="nom" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label>Prenom</label>
            <input type="text" class="form-control" id="prenom" name ="prenom" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label>Note</label>
            <input type="text" class="form-control" id="note" name ="note" autocomplete="off" required>
        </div>
        <button type="submit" class="btn btn-outline-dark btn-lg">Ajouter</button>
    </form>
</div>
</body>
</html>