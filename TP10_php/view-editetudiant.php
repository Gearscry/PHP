<!DOCTYPE html>
<html>
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Modification !</title>

    <!-- CSS Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha256-L/W5Wfqfa0sdBNIKN9cG6QA5F2qx4qICmU2VgLruv9Y=" crossorigin="anonymous">
</head>
<body>
<header class="container">
    <br>
    <p>Modification !</p>
    <hr>
</header>
<div class="container">
    <form action="controller.php?func=editStudent" method="post">
        <div class="form-group">
            <label>Id de l'élève</label>
            <input type="text" class="form-control" id="id" name ="id" autocomplete="off" required>
        </div>
        <div><label><b>Entrer les informations à modifier : </b></label></div>
        <div class="form-group">
            <label>Id Professeur</label>
            <input type="text" class="form-control" id="user_id" name ="user_id" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label>Note</label>
            <input type="text" class="form-control" id="note" name ="note" autocomplete="off" required>
        </div>
        <button type="submit" class="btn btn-outline-dark btn-lg">Modifier</button>
    </form>
</div>
</body>
</html>