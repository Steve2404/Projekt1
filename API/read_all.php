<?php 
 try{
    session_start();
    $pdo = new PDO("mysql:host=localhost;dbname=mypaketo_projekt;charset=utf8",'mypaketo_root','Steve4815162342');
 }catch(PDOException $e){
 echo "Verbindung Fehlung : " .$e->getMessage();
 }
 
//Creating Array for JSON response
$response = array();

// Check if we got the field from the user
if (isset($_GET["username"])) {
    $username = $_GET['username'];
 
     // Fire SQL query to get username data by id
    $result_sql = $pdo->prepare('SELECT *FROM client WHERE username = ?');
    $result_sql->execute(array($username));
	
	//If returned result is not empty
    if (!empty($result_sql)) {

        // Check for succesfull execution of query and no results found
        if ($result_sql->rowCount() > 0) {
			
			// Storing the returned array in response
            $result = $result_sql->fetch();
			
			// temperoary user array
            $user_detail = array();
            $user_detail["state_tuer"] = $result["state_tuer"];
            $user_detail["state_camera"] = $result["state_camera"];
            $user_detail["notification"] = $result["notification"];
          
            

            $response["user_detail"] = array();
			
			// Push all the items 
            //array_push($response["user_detail"], $user_detail);
 
            // Show JSON response
            echo json_encode($user_detail);
        } else {
            // If no data is found
            //$response["success"] = 0;
            $response["message"] = "No user data found";
 
            // Show JSON response
            echo json_encode($response);
        }
    } else {
        // If no data is found
        //$response["success"] = 0;
        $response["message"] = "No user data found";
 
        // Show JSON response
        echo json_encode($response);
    }
} else {
    // If required parameter is missing
    //$response["success"] = 0;
    $response["message"] = "Parameter(s) are missing. Please check the request";
 
    // echoing JSON response
    echo json_encode($response);
}
?>
