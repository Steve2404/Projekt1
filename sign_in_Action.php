<?php 
require('database.php');

# si le bouton 'validez' est cliqué,
if(isset($_POST['Validate'])){
     
    # et si les tous les champs sont bien rempli,
    if(!empty($_POST['username']) AND !empty($_POST['password'])){
        
       # fonction de sécurisation du formulaire contre l'injection
        function security($data){
            $data = trim($data);
            $data = stripslashes($data); 
            $data = strip_tags($data);  
            $data =  htmlspecialchars($data); 
            $data = htmlspecialchars_decode($data);  
            return $data;
        }

        # on stock les données du formulaire dans les variables tout en les sécurisants (fonction security)
        $username=security($_POST['username']);
        $password=security($_POST['password']);

        $isExistUser=$pdo->prepare('SELECT * FROM client WHERE username= ?');
        $isExistUser->execute(array($username));

        # Vérifier si l'utilisateur existe bel et bien, si oui ...
        if($isExistUser->rowCount()>0){

            # Vérifier si le password saisi est pareil au password cripté dans la base données
            # la fonction fetch() permet de recupérer les données et les stockées sur forme d'un tableau
            $userData=$isExistUser->fetch();

            if(password_verify($password, $userData['password'])){
                 
                 # Authentification de l'utilisateur sur le site
                 $_SESSION['auth']=true; #une session qui nous permet de vérifier si l'utilisateur est authentifier sur le site (une variable globale qui nous renvoie à true)
                 $_SESSION['id']=$userData['id'];
                 $_SESSION['username']=$userData['username'];
                 
                 # Rediriger le candidat vers la page d'acceuil
                 header('location:work.php');

            }else{
                $errorMsg= 'Ihr Passwort ist falsch...';
            }

        }else{
         $errorMsg= 'Ihr Name ist falsch...';
        }
            
    } else{
         $errorMsg= 'Bitte füllen Sie alle Felder aus...';
         }
}?>