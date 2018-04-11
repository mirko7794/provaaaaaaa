<?php
if (!isset($_GET['action'])) {
	$_GET['action'] = '';
}
switch ($_GET['action']) {
	case 'save': 
	
		if (isset($_GET['id']) && $_GET['id'] > 0) {
			$query = "UPDATE sensori SET etichetta='".$_POST['etichetta']."', marca='".$_POST['marca']."', tipo='".$_POST['tipo']."', informazioni='".$_POST['informazioni']."' WHERE id = ".$_GET['id']; 
		} else {
			$query = "INSERT INTO sensori (etichetta,marca,tipo,informazioni) VALUES ('".$_POST['etichetta']."', '".$_POST['marca']."', '".$_POST['tipo']."', '".$_POST['informazioni']."')";
		}
		$result = mysqli_query($db, $query);
		//print $query;
		//print "".mysqli_error($db); die;
		redirect('sensori');
		break;
	
	case 'edit':
	
		if (!is_numeric($_GET['id']))
			redirect('sensori');
	
		$result = mysqli_query($db,"SELECT * FROM sensori WHERE id = ".$_GET['id']."");
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
			redirect('sensori');
		$result = mysqli_query($db,"DELETE FROM sensori WHERE id=".$_GET['id']."");
		redirect('sensori');
		break;

	case 'misura':
		if (!is_numeric($_GET['id']))
			redirect('sensori');
	
	$mesure= date("d/n/Y g:i ");
	$mesure.= rand(-1, 100);
	$mesure.="VM";
	$query  =  "UPDATE sensori SET misurazione='".$mesure."' WHERE id = ".$_GET['id']."";
	$result = mysqli_query($db, $query);
		$Storicoinsert = "INSERT INTO storico(Sensoreid,Etichetta,misura) SELECT id,etichetta,misurazione FROM sensori WHERE id=".$_GET['id']."";
		$resultstorico = mysqli_query($db, $Storicoinsert);
	redirect('sensori');
	break;

	case 'storico':
	$result = mysqli_query($db,"SELECT * FROM storico WHERE  Sensoreid = ".$_GET['id']."");
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
		$result = mysqli_query($db,"SELECT * FROM sensori");
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