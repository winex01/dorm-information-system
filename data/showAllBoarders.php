<?php 
require_once('../class/boarder.php');
$boarder = new Boarder();
$result = $boarder->showAllBoarders();

// echo '<pre>';
// print_r($result);
// echo '</pre>';
?>
<table id="myTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
	    <tr>
	        <th>Student Name</th>
	        <th>Home Address</th>
	        <th>Telephone #</th>
	        <th>Phone #</th>
	        <th>Payment Due</th>
	        <th><center>Action</center></th>
	    </tr>
	</thead>
    <tbody>
                 

<?php foreach ($result as $r): 
$fN = $r['boarder_firstName'];
$mN = $r['boarder_middleName'];
$lN = $r['boarder_lastName'];
$name = ucwords("$fN $mN $lN");

//date
$due = strtotime($r['boarder_started']);
$due = date('d', $due);
?>

<tr>
	<td><?php echo $name; ?></td>
	<td><?php echo $r['boarder_homeAddress']; ?></td>
	<td><?php echo $r['boarder_telephoneNum']; ?></td>
	<td><?php echo $r['boarder_phoneNum']; ?></td>
	<td align="center"><?php echo $due; ?></td>
	<td>
		<button type="button" class="btn btn-success btn-xs">sms
		<span class="glyphicon glyphicon-send" aria-hidden="true"></span>
		</button>
		<button type="button" class="btn btn-warning btn-xs">update
		<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
		</button>
	</td>
</tr>

<?php endforeach; ?>
    </tbody>
</table>


<script type="text/javascript">
	$(document).ready(function() {
		$('#myTable').DataTable();
	});
</script>