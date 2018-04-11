<?php
if (!isset($_GET['action'])) {
	$_GET['action'] = '';
}
switch ($_GET['action']) {
	case 'save': 
		if ($_POST['redirect'] == 'edit' && $_POST['password'] != $_POST['confirmpassword']) {
			redirect("users&action=edit&id=".$_GET['id']."&err");
		}
		if (isset($_GET['id']) && $_GET['id'] > 0) {
			$query = "UPDATE users  SET username='".$_POST['username']."', password='".$_POST['password']."', name='".$_POST['name']."', surname='".$_POST['surname']."', email='".$_POST['email']."' WHERE id = ".$_GET['id']; 
		} else {
			$query = "INSERT INTO users (username, password, name, surname, email) VALUES ('".$_POST['username']."', '".$_POST['password']."', '".$_POST['name']."', '".$_POST['surname']."', '".$_POST['email']."')";
		}
		$result = mysqli_query($db, $query);
		//print $query;
		//print "".mysqli_error($db); die;
		redirect('users');
		break;
	
	case 'edit':
	
		if (!is_numeric($_GET['id']))
			redirect('users');
	
		$result = mysqli_query($db,"SELECT * FROM users WHERE id = ".$_GET['id']."");
		//print_r($result); 

		if (mysqli_num_rows($result) > 0) {
		// output data of each row
			while($row = mysqli_fetch_assoc($result)) {
				$rs [] = $row;
			}
		} else {
			$rs = [];
		}
		$row = $rs[0];
		print_r($row);
		break;
		
	case 'delete':
		if (!is_numeric($_GET['id']))
			redirect('users');
		$result = mysqli_query($db,"DELETE FROM users WHERE id=".$_GET['id']."");
		redirect('users');
		break;

	default:
		$result = mysqli_query($db,"SELECT * FROM users");
		//print_r($result); 

		if (mysqli_num_rows($result) > 0) {
		// output data of each row
			while($row = mysqli_fetch_assoc($result)) {
				$rs [] = $row;
			}
		} else {
			$rs = [];
		}
		break;
}