<?php
if (!isset($_GET['action'])) {
	$_GET['action'] = '';
}
switch ($_GET['action']) {
	case 'save': 
	$etichetta=$_POST['etichetta'];
	$marca=$_POST['marca'];
	$tipo=$_POST['tipo'];
	$informazioni=$_POST['informazioni'];
	$id=$_GET['id'];
	
		if (isset($_GET['id']) && $_GET['id'] > 0) {
			$stmt=$db->prepare("UPDATE sensori  SET etichetta=?, marca=?, tipo=?, informazioni=? WHERE id =?"); 
			$stmt->bind_param("ssssi", $etichetta, $marca, $tipo, $informazioni, $id);
			$stmt->execute();
			
		} else {
			$stmt=$db->prepare("INSERT INTO sensori (etichetta,marca,tipo,informazioni) VALUES (?, ?, ?, ?)");
			$stmt->bind_param("ssss", $etichetta, $marca, $tipo, $informazioni);
			$stmt->execute();
		}
		$result = $stmt->get_result();
		redirect('sensori');
		break;
	
	case 'edit':
	
		if (!is_numeric($_GET['id']))
			redirect('sensori');
	
		$id=$_GET['id'];
		$stmt=$db->prepare('SELECT * FROM sensori WHERE id=?');
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
			redirect('sensori');
		$id=$_GET['id'];
		$stmt=$db->prepare('DELETE FROM sensori WHERE id=?');
		$stmt->bind_param('i', $id);
		$stmt->execute();
		$result = $stmt->get_result();
		redirect('sensori');
		break;

	case 'misura':
		if (!is_numeric($_GET['id']))
		redirect('sensori');
	
	$id=$_GET['id'];
	$mesure= date("d/n/Y g:i ");
	$mesure.= rand(-1, 100);
	$mesure.="VM";
	$stmt=$db->prepare("UPDATE sensori SET misurazione=? WHERE id =?");
	$stmt->bind_param("si",$mesure,$id);
	$stmt->execute();
	$result = $stmt->get_result();
			$stmt=$db->prepare("INSERT INTO storico(Sensoreid,Etichetta,misura) SELECT id,etichetta,misurazione FROM sensori WHERE id=?");
			$stmt->bind_param('i',$id);
			$stmt->execute();
			$result = $stmt->get_result();
	redirect('sensori');
	break;

	case 'storico':
	$id=$_GET['id'];
		$stmt=$db->prepare("SELECT * FROM storico WHERE  Sensoreid =?");
		$stmt->bind_param('i', $id);

		$stmt->execute();

		$result = $stmt->get_result(); 
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
		$stmt=$db->prepare("SELECT * FROM sensori");
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