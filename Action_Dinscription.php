<?php 
require('database.php');

# si le bouton 'validez' est cliqué,
if(isset($_POST['Validate'])){
     
    # et si les tous les champs sont bien rempli,
    if(!empty($_POST['username']) and !empty($_POST['password']) and !empty($_POST['adresse'])){
        
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
        $password=password_hash($_POST['password'], PASSWORD_DEFAULT);
        $adresse=security($_POST['adresse']);
                
        # vérifier si l'utilisateur s'est déjà inscrit
        $isExistUser=$pdo->prepare('SELECT username FROM client WHERE username=?');
        $isExistUser->execute(array($username));

        if($isExistUser->rowCount()==0){

                #insérer les données de l'utilisateur sur le site
                $inserUser=$pdo->prepare('INSERT INTO client(username,password,adresse)VALUES(?,?,?)');
                $inserUser->execute(array($username,$password,$adresse));

                # Recupération de l'identifiant (id) de l'utilisateur pour accéder à ses infos
                $userData=$pdo->prepare("SELECT id, username FROM client WHERE username=? AND password=?");
                $userData->execute(array($username,$password));

                # Stockage des données de l'utilisateur qui ont été recupérés lors de la requette du haut
                # la fonction fetch() permet de recupérer les données et les stockées dans un tableau
                $userInfos=$userData->fetch();

                # Authentification de l'utilisateur sur le site
                $_SESSION['auth']=true; #une session qui nous permet de vérifier si l'utilisateur est authentifier sur le site (une variable globale qui nous renvoie à true)
                $_SESSION['id']=$userInfos['id'];
                $_SESSION['username']=$userInfos['username'];

                #Rediriger le l'uilisateur vers la page d'accueil.php
                header('location: Accueil.php');
            
        }else{ $errorMsg= 'Dieser Nutzer existiert bereits'; }
    }else{
         $errorMsg= 'Bitte füllen Sie alle Felder aus...';}
}


?>