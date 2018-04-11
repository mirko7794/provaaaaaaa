<?php 
pageTitle('fa fa-group', 'Utenti');

switch ($_GET['action']) {
	case 'add': ?>
	<div class="row">
		<div class="col-sm-12">
			<div class="box">
				<div class="box-header blue-background">
					<div class="title">
						<div class="fa fa-plus"></div>
							Aggiungi utente
						</div>
				</div>
				<div class="box-content">
					<form role="form" class="form form-horizontal" style="margin-bottom: 0;" method="post" action="?page=users&action=save" >
						<input type="hidden" name="redirect" value="add">
						<?php
						input('Nome', 'name', true);
						input('Cognome', 'surname', true);
						input('Username', 'username', true);
						input('Email', 'email', true, 'email');
						input('Password', 'password', true, 'password');
						formSubmit();
						?>
					</form>
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
								Aggiungi utente
							</div>
					</div>
					<div class="box-content">
					<?php if(isset($_GET['err'])) { ?>
						<div class="callout callout-warning">
							<h4>Attenzione!</h4>
							<p>Le password inserite non coincidono.</p>
						</div>
					<?php } ?>
						<form class="form form-horizontal validate-form-custom" style="margin-bottom: 0;" method="post" action="?page=users&action=save&id=<?php print $row['id'] ?>" novalidate="novalidate" _lpchecked="2">
							<input type="hidden" name="redirect" value="edit">
							<?php
							input('Nome', 'name', true, 'text', $row['name']);
							input('Cognome', 'surname', true, 'text', $row['surname']);
							input('Username', 'username', true, 'text', $row['username']);
							input('Email', 'email', true, 'email', $row['email']);
							input('Cambia Password', 'password', true, 'password');
							input('Conferma Password', 'confirmpassword', true, 'password');
							formSubmit();
							?>
						</form>
					</div>
				</div>
			</div>
		</div> <?php
		break;
	
	case 'view':
		break;
	
	default: ?>
		
		<div class='row tableModelContainer' id="listaUtenti">
			<div class='col-sm-12'>
			<div class='box bordered-box'>
				<div class='box-header blue-background'>
					<div class='title'>
						<div class='fa fa-list-ul'></div>
						Lista Utenti
						<a class="btn btn-xs btn-default" href="?page=users&action=add"><i class="fa fa-plus"></i></a>
					</div>
				</div>
				<div class='box-content Ntable-responsive box-no-padding'>

				<table class='table table-bordered table-striped' id="t_listaUtenti">
						<thead>
							<tr>
								<th>#<div class="pull-right"></div></th>
								<th>Nome Cognome<div class="pull-right"></div></th>
								<th>Username</th>
								<th>Email</th>
								<th></th>
							</tr>
						</thead>

						<?php foreach ($rs as $row) { ?>
							<tr>
								<td ><?php print_r($row['id']) ?></td>
								<td ><a><?php print_r($row['name']) ?> <?php print_r($row['surname']) ?></a></td>
								<td ><?php print_r($row['username']) ?></td>
								<td ><?php print_r($row['email']) ?></td>
								
								<td class="text-right"><a href="?page=users&action=edit&id=<?php print_r($row['id']) ?>" class="btn btn-xs btn-success">
									<i class="fa fa-pencil"></i></a>
									<a href="?page=users&action=delete&id=<?php print_r($row['id']) ?>" class="btn btn-xs btn-danger">
									<i class="fa fa-remove"></i></a>
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