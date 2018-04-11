<?php
if (!isset($_GET['action'])) {
	$_GET['action'] = '';
}
switch ($_GET['action']) {
	case 'save': 
	$username=$_POST['username'];
	$password=$_POST['password'];
	$name=$_POST['name'];
	$surname=$_POST['surname'];
	$email=$_POST['email'];
	$id=$_POST['id'];

		if ($_POST['redirect'] == 'edit' && $_POST['password'] != $_POST['confirmpassword']) {
			redirect("users&action=edit&id=".$_GET['id']."&err");
		}
		if (isset($_GET['id']) && $_GET['id'] > 0) {
		$stmt=$db->prepare("UPDATE users  SET username=?, password=?, name=?, surname=?, email=? WHERE id =?");
		$stmt->bind_param("sssssi", $username,$password,$name,$surname,$email,$id);
		$stmt->execute();

			//$query = "UPDATE users  SET username='".$_POST['username']."', password='".$_POST['password']."', name='".$_POST['name']."', surname='".$_POST['surname']."', email='".$_POST['email']."' WHERE id = ".$_GET['id']; 
		} else {
			$stmt=$db->prepare("INSERT INTO users (username, password, name, surname, email) VALUES (?, ?, ?, ?,?)");
			$stmt->bind_param("sssss", $username,$password,$name,$surname,$email);
			$stmt->execute();
		}
		$result = $stmt->get_result();
		print "".mysqli_error($db); die;
		redirect('users');
		break;
	
	case 'edit':
	
		if (!is_numeric($_GET['id']))
		redirect('users');
		$id=$_GET['id'];
		$stmt=$db->prepare('SELECT * FROM users WHERE id=?');
		$stmt->bind_param('i', $id);

		$stmt->execute();

		$result = $stmt->get_result();

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

		$id=$_GET['id'];
		$stmt=$db->prepare('DELETE FROM users WHERE id=?');
		$stmt->bind_param('i', $id);

		$stmt->execute();

	
		$result = $stmt->get_result();
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