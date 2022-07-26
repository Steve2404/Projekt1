<?php 
require('database.php');
function security($data){
    $data = trim($data);
    $data = stripslashes($data); 
    $data = strip_tags($data);  
    $data =  htmlspecialchars($data); 
    $data = htmlspecialchars_decode($data);  
    return $data;
}

$htmlCharte = "";

$isPoster = false;
if(isset($_POST['username']) && !empty($_POST['username'])){
    $username=security($_POST['username']);
    $notification = $_POST['notification'];


    $isExistUser=$pdo->prepare('SELECT * FROM client WHERE username= ?');
    $isExistUser->execute(array($username));
    if($isExistUser->rowCount()>0){
        $sql = "UPDATE client 
        SET notification='".$notification."'
        WHERE username='". $username.  "'";
        $updateNotif=$pdo->prepare($sql);
        $updateNotif->execute();

        $userData=$isExistUser->fetch();
        $isPoster = true;
        $htmlCharte = "Sie haben es geschafft, Herrn/Frau". $userData['username'] ." zu signalisieren, dass Sie schon da sind.";
    }else{
        $htmlCharte ="Der Name ist falsch geschrieben oder Sie irren sich !";
    }
}else{
    $htmlCharte = "Sie müssen einen Namen eingeben!";
}
?>