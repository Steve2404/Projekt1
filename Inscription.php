
<?php  require('Action_Dinscription.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/14273d579a.js" crossorigin="anonymous"></script>
    <title>Inscription</title>
</head>
<body>
    <!-- barre de navigation -->
      <?php  include('header.php'); ?>

    <section class="my-3">
        <div class="container mt-5 " style="background: rgb(55, 85, 155)">
            <div class="row gy-3 align-items-center">
                <div class="col-12 col-md-6 p-5">

                    <!-- Formular -->
                    <form action="" method="POST" class="row gy-1">
                    <?php if(isset($errorMsg)):?>
                        <div class="alert alert-danger" role="alert">
                          <?php if(isset($errorMsg)){ echo '<h6>' .$errorMsg. '</h6>';}?>
                        </div>
                    <?php endif;?>  

                        <div class="row g-2 align-items-center">
                            <div class="col-10  col-md-10 col-lg-10">
                                <label for="username" class="col-form-label text-white">Username</label>
                            </div>
                            <div class="col-10  col-md-10 col-lg-10" style="width: 300px;">
                                <input name="username" type="text" id="username" class="form-control" aria-describedby="username">
                            </div>
                        </div>
                        <div class="row g-2 align-items-center">
                            <div class="col-10  col-md-10 col-lg-10">
                                <label for="password1" class="col-form-label text-white">Password</label>
                            </div>
                            <div class="col-10  col-md-10 col-lg-10" style="width: 300px;">
                                <input name="password" type="password" id="password1" class="form-control"
                                    aria-describedby="passwordHelpInline">
                            </div>
                        </div>

                        <div class="row g-1 align-items-center">
                            <div class="col-10  col-md-10 col-lg-10">
                                <label for="adress" class="col-form-label text-white">Adresse</label>
                            </div>
                            <div class="col-10  col-md-10 col-lg-10" style="width: 300px;">
                                <span id="i">
                                    <input  name='adresse' type=text id="useradress" class="form-control" aria-describedby="useradress">
                            </div>
                        </div>
                        <div class="row g-1 align-items-center">
                            <div class="col-10  col-md-10 col-lg-10 my-3 ">
                                <button type="submit" class="btn  btn-success" name="Validate">Erstellen</button>
                            </div>
                        </div>
                    </form>
                    <a class="btn btn-outline-warning btn-sm border border-3 rounded-pill" href="./Accueil.php" role="button">Ich habe schon ein Konto</a>
                            
                </div>
                <div class="col-12 col-md-6 px-0" style="background: rgb(55, 85, 155)">
                    <img src="Img/anmeldung1.jpg" alt="ProfilBild" class="w-auto" />
                </div>
            </div>
        </div>
    </section>
    
    <!-- Footer -->
    <?php  include('footer.php'); ?>

    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/geocode/json?address=1600+Amphitheatre+Parkway,+Mountain+View,+CA&key=AIzaSyCF6pRZVQomJdiXLnpk0mc4KZgzN_hz-mI" defer></script>
    <script src="Script_Loggin.js"></script>
</body>
</html>