<!DOCTYPE html>
<html>
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Connexion !</title>

    <!-- CSS Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha256-L/W5Wfqfa0sdBNIKN9cG6QA5F2qx4qICmU2VgLruv9Y=" crossorigin="anonymous">
</head>
<body>
<header class="container">
    <br>
    <p>Connexion !</p>
    <hr>
</header>
<div class="container">
    <form action="controller.php?func=readUser" method="post">
        <div class="form-group">
            <label>Login</label>
            <input type="text" class="form-control" id="login" name ="login" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="text" class="form-control" id="password" name ="password" autocomplete="off" required>
        </div>
        <button type="submit" class="btn btn-outline-dark btn-lg">Connexion</button>
    </form>
</div>
</body>
</html>
