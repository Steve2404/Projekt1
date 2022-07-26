<?php 
require('action_postier.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/14273d579a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="postier.css">
    <title>Postbeamte</title>
</head>
<body>
  <?php include('header_postier.php');?>

    <div class="container">
        <!-- Section1  -->
        <div class="row my-4">
            <div class="col-12 col-md-12 col-lg-12 text-center">
                <p class="vuDeFace"> </p>
            </div>
        </div>

        <?php if(!$isPoster): ?> 
        <?php if(isset($htmlCharte)): ?>
            <div class="alert alert-danger" role="alert">
            <?php echo $htmlCharte; ?>
        </div>
        <?php endif; ?>   

        <!-- Klingel-->
        <div class="row py-2">
            <div class="col-12  col-md-12 col-lg-12  text-center">
                <p class="fs-1 fw-bold">klingelt hier</p>
                <p class="textGlingelt fs-4 fw-light">Geben Sie nur! den Namen ein, der auf dem Paket steht</p>
            </div>   
        </div>
        <form action="postier.php" method="POST"   class="row gy-1">
            <div class="row pb-4 mx-4 g-3 ">
                <div class="col-3  col-md-8 col-lg-8  mx-auto" style="width: 200px;">
                    <label for="username" class="col-form-label fw-bold">Name</label>
                    <input class="bg-white text-dark" type="text" name="username"  id="username" />
                </div> 
            </div>
            <div class="row pb-4 ">
                <div class="col-12  col-md-12 col-lg-12  text-center">
                    <input type="hidden" name="notification" value= 1  id="idMgKlingel" />
                    <button type="submit" id="btnSend" onclick="myFunction();" class="btn btn-primary imgKlingel">klingelt</button>
                </div>   
            </div>
        </form>
        <?php else: ?>
            <div class="alert alert-success" role="alert">
                <?php echo "Sie haben gerade geklingelt, bitte warten Sie einen Moment ...";?>
            </div>
        <?php endif; ?>
    </div>


<?php include('footer.php'); ?>
<script>
    var buton = document.getElementById('btnSend');
    function myFunction(){
        buton.classList.remove('imgKlingel');
        alert('Sie haben gerade geklingelt, bitte warten Sie einen Moment ...');

    }
    
</script>
</body>
</html>