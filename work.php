<?php  
//header("refresh: 30");
       require('database.php'); 
       
      
       $result = $pdo->prepare("SELECT * FROM client WHERE username='". $_SESSION['username']."'");
       $result->execute();
       $row = $result->fetchAll();
       $notifValue = 0;
       $stateP = 0;
       $stateC = 0;
       $adresse =0;
      
       $html_buttons = null;
       foreach($row as $R){
            $notifValue = $R['notification'];
            $stateP= $R['state_tuer'];
            $stateC = $R["state_camera"];
            $adresse= $R["adresse"];
            
        }
        $html_buttons .= '<h3>Nom: ' . $R["username"] . '<br>Adresse: '. $adresse . '<br>Statu_Tur: ' . $R["state_tuer"]. 
            '<br>Statu_cam: '.$R["state_camera"].'<br>Notification: '. $notifValue.'<br>' ;
        
       
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
    <link rel="stylesheet" href="./work.css">
    <title>Work</title>
</head>
<body>
   <?php  include('header.php'); ?>  
   
<!-- Section1  -->
<div class="container">
    <div class="row my-4">
        <div class="col-12 col-md-12 col-lg-12 text-center-md">
            <p class="vuDeFace"></p>
        </div>
    </div>
    
    <!-- 
    <div class="row py-4 align-items-center">
        <div class="col-3 col-md-3 col-lg-3 text-center">
                <Button onclick= "updateOutput(this)" class="btn btn-success">Aufnahme</Button>
        </div>
    </div>
    -->

    <form onsubmit=" return createOutput();" class="row gy-1">
        <!-- Notification -->
        <div class="row py-4">
            <div class="col-10  col-md-10 col-lg-10 mx-0 px-0 text-end">
                <img class="imgNotification"  src="<?php if($notifValue) echo 'Img/notificationON.png';else echo 'Img/notificationOFF.png';?>" alt="notification OFF" >
            </div>
            <div class="col-2 col-md-2  col-lg-2  mx-0 px-0 text-end" style="width:150px">
                <p class="textNotification"></p>
            </div>
            <input type="hidden" name="notification" value="<?php echo $notifValue;?>" id="idNotification" />
        </div>

        

        <!-- Tuer & cameras-->
        <div class="row py-4 align-items-center">
            <div class="col-3 col-md-3 col-lg-3 text-center">
                <Button type="submit" class="btn btn-success">Refresh</Button>
            </div>
        </div>
        
        <div class="row  imageGlobale">
            <!-- Tuer-->
            <div class="col-10 py-2 col-md-10 col-lg-6 text-start">
                <img class="imgPorte" src="<?php if(!$stateP) echo 'Img/porteFerme.png';else echo 'Img/porteOuverte.png';?>" alt="porte OFF" value="1" name= "porte" />
                <input type="hidden" name="porte" value="<?php echo $stateP;?>" id="idPorte" />
            </div>
            <!-- Camera -->
            <div class="col-10 col-md-10 col-lg-6 text-start">
                <img class="imgCamera" src="<?php if(!$stateC) echo 'Img/camerasOff.png';else echo 'Img/camerasOn.png';?>" alt="cameras OFF"  value="1" name= "cameras" />
                <input type="hidden" name="cameras" value="<?php echo $stateC;?>" id="idCameras" />
            </div>
        </div>
    </form
</div>
        
<script>
var imgPorte = document.querySelector(".imgPorte");
var porteInput = document.getElementById("idPorte")

var imgCamera = document.querySelector(".imgCamera");
var camerasInput = document.getElementById("idCameras");

var imgNotification = document.querySelector(".imgNotification");
var notifText = document.querySelector(".textNotification");
var notifInput = document.getElementById("idNotification");

//*** porte **/
imgPorte.addEventListener("click", ()=>{
    if(porteInput.value === "0"){
        porteInput.value = "1";
        imgPorte.src = "Img/porteOuverte.png";
        updateOutput(this);
    }else{
        porteInput.value = "0";
        imgPorte.src = "Img/porteFerme.png";
        updateOutput(this);
    }
});

//** Cameras */

imgCamera.addEventListener("click", ()=>{
    if(camerasInput.value === "0"){
        camerasInput.value = "1";
        imgCamera.src = "Img/camerasOn.png";
        updateOutput(this);
    }else{
        camerasInput.value = "0";
        imgCamera.src = "Img/camerasOff.png";
        updateOutput(this);
    }
});

//** Notifications **/
if(notifInput.value === "1"){
    imgNotification.src = "Img/notificationON.png";
    notifText.textContent = "Postbeamte ist schon da ...";
    notifText.style.color = "red";
    imgNotification.classList.add("notif");
}
imgNotification.addEventListener("click", ()=>{
    if(notifInput.value === "1"){
        notifInput.value = "0";
        imgNotification.src = "Img/notificationOFF.png";
        notifText.textContent = "";
        imgNotification.classList.remove("notif");
        updateOutput(this);
    }
});

//******************************************************
    function updateOutput(element) {
    var notif = document.getElementById("idNotification").value;
    var tuer = document.getElementById("idPorte").value;
    var camera = document.getElementById("idCameras").value;

    var xhr = new XMLHttpRequest();
    xhr.open("GET","outPut_action.php?action=output_update&notification="+notif+"&state_tuer="+tuer+"&state_camera="+camera, true);
    //var httpRequestData = "action=output_create&notification="+notif+"&state_tuer="+tuer+"&state_camera="+camera;
    xhr.send();
}

function createOutput(element) {
        var xhr = new XMLHttpRequest();
        var notif = document.getElementById("idNotification").value;
        var tuer = document.getElementById("idPorte").value;
        var camera = document.getElementById("idCameras").value;
        
        xhr.open("POST","outPut_action.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            alert("Aktualisiert");
            setTimeout(function(){ window.location.reload(); });
                }
            }
        
            
        var httpRequestData = "action=output_create&notification="+notif+"&state_tuer="+tuer+"&state_camera="+camera;
        xhr.send(httpRequestData);
        }


</script>
<!-- Footer -->
    <?php  include('footer.php'); ?>
</body>
</html>