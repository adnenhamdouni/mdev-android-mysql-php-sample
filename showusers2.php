<?php
    
    
$response = array();

if($_SERVER["REQUEST_METHOD"]=="POST"){
	include 'connection.php';
	showUsers();
}

function showUsers()
{
	global $connect;
	
	$query = " Select * FROM users; ";
	
	$result = mysqli_query($connect, $query);
	$number_of_rows = mysqli_num_rows($result);
	
	
	if($number_of_rows > 0) {
        
        // users node
        $response["users"] = array();
        
		while ($row = mysqli_fetch_assoc($result)) {
            
            // temp user array
            $user = array();
            
            $user["id"] = $row["id"];
            $user["email"] = $row["email"];
            $user["password"] = $row["password"];
            
            // push single product into final response array
            array_push($response["users"], $user);
		}
        
        // success
        $response["success"] = 1;
	}
    else {
        
        $response["success"] = 0;
        $response["message"] = "No users found";
    }
	
	header('Content-Type: application/json');
	echo json_encode($response);
	mysqli_close($connect);
	
}







?>
