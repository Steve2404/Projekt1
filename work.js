imgPorte = document.querySelector(".imgPorte");
porteInput = document.getElementById("idPorte")
imgCamera = document.querySelector(".imgCamera");
camerasInput = document.getElementById("idCameras");
imgNotification = document.querySelector(".imgNotification");
notifText = document.querySelector(".textNotification");
notifInput = document.getElementById("idNotification");

//*** porte **/

imgPorte.addEventListener("click", ()=>{
    if(porteInput.value === "1"){
        porteInput.value = "0";
        imgPorte.src = "Img/porteOuverte.png";
    }else{
        porteInput.value = "1";
        imgPorte.src = "Img/porteFerme.png";
    }
});

//** Cameras */

imgCamera.addEventListener("click", ()=>{
    if(camerasInput.value === "1"){
        camerasInput.value = "0";
        imgCamera.src = "Img/camerasOn.png";
    }else{
        camerasInput.value = "1";
        imgCamera.src = "Img/camerasOff.png";
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
    }
});
