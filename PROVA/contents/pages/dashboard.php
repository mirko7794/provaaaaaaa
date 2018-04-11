<?php 
pageTitle('fa fa-bar-chart', 'Dashboard');

switch ($_GET['action']) {

  default: 
  if(isset($_POST['q']) && !empty($_POST['q'])) {
  ?>
    <p>I risultati sono elencati secondo la ricerca: '<?php print $_POST['q']; ?>'</p>
  <?php } ?>
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <tr>
                <th>ID<div class="pull-right"></div></th>
                <th>Etichetta<div class="pull-right"></div></th>
                <th>Marca<div class="pull-right"></div></th>
                <th>Tipo<div class="pull-right"></div></th>
                <th>Misurazione</th>
                <th>Informazioni aggiuntive<div class="pull-right"></div></th>
                <th></th>
              </tr>
              
                <tr>
           <?php foreach ($rs as $row) { ?>
              <tr>
                <td ><?php print_r($row['id']) ?></td>
                <td ><a><?php print_r($row['etichetta']) ?></td>
                <td ><a><?php print_r($row['marca']) ?></td>
                  <td><?php print_r($row['tipo']) ?></a></td>
                  <td ><?php print_r($row['misurazione']) ?></td>
                  <td ><?php print_r($row['informazioni']) ?></td>

                  <td class="text-right">
                  <a href="?page=sensori&action=storico&id=<?php print_r($row['id']) ?>" class="btn btn-xs btn-info">
                    <i class="fa fa-table"></i>

							<?php }
						?>
						</table>
						</div>
				

<?php
		break;
}
