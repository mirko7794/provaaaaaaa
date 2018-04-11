<?php 
pageTitle('fa fa-podcast', 'Sensori');

switch ($_GET['action']) {
	case 'add': ?>
	<div class="row">
		<div class="col-sm-12">
			<div class="box">
				<div class="box-header blue-background">
					<div class="title">
						<div class="fa fa-plus"></div>
							Aggiungi sensori
				</div>
				<div class="box-content">
					<form role="form" class="form form-horizontal" style="margin-bottom: 0;" method="post" action="?page=sensori&action=save" >
						<input type="hidden" name="redirect" value="add">
						<?php
						input('Etichetta', 'etichetta', true);
						input('Marca', 'marca', true);
						input('Tipo', 'tipo', true);
						input('Informazioni aggiuntive', 'informazioni', true);
						formSubmit();
						?>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
	<?php 
		break;
		
	case 'edit': ?>
		<div class="row">
			<div class="col-sm-12">
				<div class="box">
					<div class="box-header blue-background">
						<div class="title">
							<div class="fa fa-plus"></div>
								Aggiungi sensore
							</div>
					</div>
					<div class="box-content">
					<?php if(isset($_GET['err'])) { ?>
						
					<?php } ?>
						<form class="form form-horizontal validate-form-custom" style="margin-bottom: 0;" method="post" action="?page=sensori&action=save&id=<?php print $row['id'] ?>" novalidate="novalidate" _lpchecked="1">
							<input type="hidden" name="redirect" value="edit">
							<?php
							input('Etichetta', 'etichetta', true, 'text', $row['etichetta']);
							input('Marca', 'marca', true, 'text', $row['marca']);
							input('Tipo', 'tipo', true, 'tipo', $row['tipo']);
							text('Informazioni aggiuntive', 'informazioni', true, 'informazioni', $row['informazioni']);
							formSubmit();
							?>
						</form>
					</div>
				</div>
			</div>
		</div> <?php
		break;
	

case 'storico': ?>
		<div class='row tableModelContainer' id="listasensori">
			<div class='col-sm-12'>
			<div class='box bordered-box'>
				<div class='box-header blue-background'>
					<div class='title'>
						<div class='fa fa-list-ul'></div>
						Storico sensore
					</div>
				</div>
				<div class='box-content Ntable-responsive box-no-padding'>

				<table class='table table-bordered table-striped' id="t_listasensori">
						<thead>
							<tr>
								<th>ID<div class="pull-right"></div></th>
								<th>Etichetta<div class="pull-right"></div></th>
								<th>Misurazione</th>
								<th></th>
							</tr>
						</thead>

						<?php foreach ($rs as $row) { ?>
							<tr>
								<td ><?php print_r($row['Sensoreid']) ?></td>
								<td ><a><?php print_r($row['Etichetta']) ?></td>
									<td ><?php print_r($row['Misura']) ?></td>

							</tr>

						<?php }
						?>
						</table>
						</div>
						</div>
					</div>
					</div>
				
<?php
		break;

	
	case 'view':
		break;
	
	default: ?>
		
		<div class='row tableModelContainer' id="listasensori">
			<div class='col-sm-12'>
			<div class='box bordered-box'>
				<div class='box-header blue-background'>
					<div class='title'>
						<div class='fa fa-list-ul'></div>
						Lista Sensori
						<a class="btn btn-xs btn-default" href="?page=sensori&action=add"><i class="fa fa-plus"></i></a>
					</div>
				</div>
				<div class='box-content Ntable-responsive box-no-padding'>

				<table class='table table-bordered table-striped' id="t_listasensori">
						<thead>
							<tr>
								<th>ID<div class="pull-right"></div></th>
								<th>Etichetta<div class="pull-right"></div></th>
								<th>Marca<div class="pull-right"></div></th>
								<th>Tipo<div class="pull-right"></div></th>
								<th>Misurazione</th>
								<th>Informazioni aggiuntive<div class="pull-right"></div></th>
								<th></th>
							</tr>
						</thead>

						<?php foreach ($rs as $row) { ?>
							<tr>
								<td ><?php print_r($row['id']) ?></td>
								<td ><a><?php print_r($row['etichetta']) ?></td>
								<td ><a><?php print_r($row['marca']) ?></td>
									<td><?php print_r($row['tipo']) ?></a></td>
									<td ><?php print_r($row['misurazione']) ?></td>
									<td ><?php print_r($row['informazioni']) ?></td>
								<td class="text-right">
									<a href="?page=sensori&action=misura&id=<?php print_r($row['id']) ?>" class="btn btn-xs btn-info">
										<i class="fa fa-balance-scale"></i>
									<a href="?page=sensori&action=edit&id=<?php print_r($row['id']) ?>" class="btn btn-xs btn-success">
										<i class="fa fa-pencil"></i>
									<?php if($_SESSION['user']['priority'] == 1) { ?>
									<a href="?page=sensori&action=delete&id=<?php print_r($row['id']) ?>" class="btn btn-xs btn-danger">
										<i class="fa fa-remove"></i></a>
									<?php } ?>
								</td>

							</tr>

						<?php }
						?>
						</table>
						</div>
						</div>
					</div>
					</div>
				

<?php
		break;
}