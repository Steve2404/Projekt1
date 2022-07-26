<?php
require('database.php');

function updateOutput($state_tur, $state_camera, $notification, $username){
    require('database.php');
    $sql = "UPDATE client 
            SET state_tuer='" . $state_tur . "',
                state_camera='".$state_camera."',
                notification='".$notification."'
            WHERE username='". $username.  "'";
    // Prepare statement
    $stmt = $pdo->prepare($sql);

    // execute the query
    $stmt->execute();

  // echo a message to say the UPDATE succeeded
  if($stmt->rowCount()){
    return " records UPDATED successfully";
  } else{
    return "Error";
  } 
}

//****************Modifier******************** */

function createOutput($state_tur, $state_camera, $notification, $username) {
    require('database.php');

    $sql = "SELECT * FROM client WHERE username='". $username."'";
    // Prepare statement
    $stmt = $pdo->prepare($sql);

    // execute the query
    $stmt->execute();

  // echo a message to say the UPDATE succeeded
  if($stmt->rowCount()){
    return " records SELECT successfully";
  } else{
    return "Error";
  }
   
}

$action = $username = $state_tuer = $state_camera = $notification = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $action = test_input($_GET["action"]);
    if ($action == "output_update") {
        $state_tuer = test_input($_GET["state_tuer"]);
        $state_camera = test_input($_GET["state_camera"]);
        $notification = test_input($_GET["notification"]);
        $result = updateOutput($state_tuer, $state_camera, $notification, $_SESSION['username']);
        echo $result;
    }
    else {
        echo "Invalid HTTP request.";
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = test_input($_POST["action"]);
    if ($action == "output_create") {
        $state_tuer = test_input($_POST["state_tuer"]);
        $state_camera = test_input($_POST["state_camera"]);
        $notification = test_input($_POST["notification"]);
        $result = createOutput($state_tuer, $state_camera, $notification, $_SESSION['username']);

        echo $result;
    }
    else {
        echo "No data posted with HTTP POST.";
    }
}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
 ?>