<?php
if (!isset($_GET['action'])) {
	$_GET['action'] = '';
}
switch ($_GET['action']) {
	case 'search':
	$id=$_POST['q'];
	$marca=$_POST['q'];
	$tipo=$_POST['q'];
	$etichetta=$_POST['q'];
	$stmt=$db->prepare("SELECT * FROM sensori WHERE id=? OR marca=? OR tipo=? OR etichetta=?"); 
	$stmt->bind_param("isss", $id, $marca, $tipo, $etichetta);
	$stmt->execute();
	$result = $stmt->get_result();
		//$result = mysqli_query($db, "SELECT * FROM sensori WHERE id='".$_POST['q']."' OR marca='".$_POST['q']."' OR tipo='".$_POST['q']."' OR etichetta='".$_POST['q']."'");
		//print "".mysqli_error($db); die;
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

	default:
		$stmt=$db->prepare('SELECT * FROM sensori');

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
		break;
}