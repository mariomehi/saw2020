<?php
// start a session
session_start();
?>
<!DOCTYPE html>
<html lang="it">
    <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<link rel="stylesheet" href="css/style.css">-->
    <link rel="stylesheet" href="bs/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>Netflox.it</title>
</head>

<body>

<?php
include 'header.php';
?>

<div class="container" style="max-width: 80%;">
<h5 class="text-center">
<small class="text-muted">Benvenuto su <abbr title="Netflox.it">Netflox</abbr>, compila tutti i campi per registrarti al sito, oppure se sei già registrato vai alla pagina di <a href="login.php"/>Login</a>.</small>
</h5>
<br/>
<form action="registration.php" method="POST">
  <div class="row mb-4">
    <div class="col">
   <!-- Firstname input -->
      <div class="form-outline">
        <input type="text" id="form3Example1" name="firstname" class="form-control" placeholder="Inserisci il tuo nome" />
      </div>
    </div>
   <!-- Lastname input -->
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form3Example2" name="lastname" class="form-control" placeholder="Inserisci il tuo cognome" />
      </div>
    </div>
  </div>
  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="email" id="form3Example3" name="email" class="form-control" placeholder="Inserisci la tua email" />
  </div>
  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" id="form3Example4" name="pass" class="form-control" placeholder="Inserisci nuova password" />
  </div>
  <!-- ConfirmPassw input -->
    <div class="form-outline mb-4">
    <input type="password" id="form3Example4" name="confirm" class="form-control" placeholder="Conferma password" />
  </div>
  <!-- Submit button -->
      <div class="d-grid gap-2 col-3 mx-auto">
  <button type="submit" class="btn btn-primary btn-block mb-4" value="mariaaaaaaa">Registrati</button>
      </div>
</form>
</div>

<?php
include 'footer.php';
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
<script src="bs/js/bootstrap.min.js"></script>

</body>
</html>
