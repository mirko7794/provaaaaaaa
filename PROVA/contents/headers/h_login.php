<?php
//print_r($_POST);

if (isset($_POST['username'])) {
	$username=$_POST['username'];
	$password=$_POST['password'];
	$stmt=$db->prepare("SELECT * FROM users WHERE username=? AND password=?"); 
	$stmt->bind_param("ss", $username, $password);
	$stmt->execute();
	$result = $stmt->get_result();
	//$result = mysqli_query($db,"SELECT * FROM users WHERE username='".$_POST['username']."' AND password='".$_POST['password']."'");

	if (mysqli_num_rows($result) > 0) {
    // output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			$rs [] = $row;
		}
	} else {
		redirect('login&err');
	}
		$row = $rs[0];
		$_SESSION['user']['id'] = $row['id'];
		$_SESSION['user']['email'] = $row['email'];
		$_SESSION['user']['username'] = $row['username'];
		$_SESSION['user']['nome_visualizzato'] = $row['name'].' '.$row['surname'];
		
		if($_SESSION['user']['id'] == 1) {
			$_SESSION['user']['priority'] = 1;
		} else {
			$_SESSION['user']['priority'] = 2;
		}

		redirect("dashboard"); 
	
	
}
