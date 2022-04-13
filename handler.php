<?php
include "db.php";

$computer_id = 1;

if (isset($_POST['search_motherboard'])) {
    $PostedValue 	= $_POST['search_motherboard'];
	$VisibleValue 	= '#value_motherboard';
	$SearchDisplay	= '#display_motherboard';
	$SearchTable	= '#search_motherboard';
	$ShowAction		= 'show_motherboard';
	$Action			= 'update_motherboard';
    $Query = "SELECT DISTINCT id, model FROM motherboard WHERE model LIKE '%$PostedValue%' LIMIT 5";
    $ExecQuery = mysqli_query($connectionDB, $Query);
	
    echo '<ul>';
	while ($Result = mysqli_fetch_array($ExecQuery)) {
?> 		<li onclick='fill(	"<?php echo $VisibleValue; ?>", 
							"<?php echo $Result['id']; ?>", 
							"<?php echo $SearchDisplay; ?>", 
							"<?php echo $SearchTable; ?>",
							"<?php echo $Action; ?>", 
							"<?php echo $ShowAction; ?>")'>
            <a> <?php echo $Result['model']; ?>  </a>
        </li>
<?php }}?> </ul>

<?php
if ($_POST['action'] == 'show_motherboard') {
	$Query = "SELECT model FROM computer INNER JOIN motherboard ON computer.motherboard = motherboard.id WHERE computer.id = 1;";
	$ExecQuery = mysqli_query($connectionDB, $Query);
	$TestValue = '1';
	echo '<ul>';
	while ($Result = mysqli_fetch_array($ExecQuery)) {
?> 	       <?php echo $Result['model']; ?>
<?php }}?> </ul>

<?php 
if (isset($_POST['update_motherboard'])) {
	$PostedValue 	= $_POST['update_motherboard'];
	$Query = "UPDATE computer SET motherboard=$PostedValue WHERE computer.id = 1;";
	$ExecQuery = mysqli_query($connectionDB, $Query);
}?>


<?php
if (isset($_POST['search_cpu'])) {
    $PostedValue 	= $_POST['search_cpu'];
	$VisibleValue 	= '#value_cpu';
	$SearchDisplay	= '#display_cpu';
	$SearchTable	= '#search_cpu';
    $Query = "SELECT DISTINCT model FROM cpu WHERE model LIKE '%$PostedValue%' LIMIT 5";
    $ExecQuery = mysqli_query($connectionDB, $Query);
	
    echo '<ul>';
	while ($Result = mysqli_fetch_array($ExecQuery)) {
?> 		<li onclick='fill(	"<?php echo $VisibleValue; ?>", "<?php echo $Result[0]; ?>", 
							"<?php echo $SearchDisplay; ?>", "<?php echo $SearchTable; ?>")'>
            <a> <?php echo $Result[0]; ?>  </a>
        </li>
<?php }}?> </ul>

<?php
if (isset($_POST['search_cpu_fan'])) {
    $PostedValue 	= $_POST['search_cpu_fan'];
	$VisibleValue 	= '#value_cpu_fan';
	$SearchDisplay	= '#display_cpu_fan';
	$SearchTable	= '#search_cpu_fan';
    $Query = "SELECT DISTINCT model FROM cpu_fan WHERE model LIKE '%$PostedValue%' LIMIT 5";
    $ExecQuery = mysqli_query($connectionDB, $Query);
	
    echo '<ul>';
	while ($Result = mysqli_fetch_array($ExecQuery)) {
?> 		<li onclick='fill(	"<?php echo $VisibleValue; ?>", "<?php echo $Result[0]; ?>", 
							"<?php echo $SearchDisplay; ?>", "<?php echo $SearchTable; ?>")'>
            <a> <?php echo $Result[0]; ?>  </a>
        </li>
<?php }}?> </ul>




<?php
if (isset($_POST['search_ram'])) {
    $PostedValue 	= mysqli_real_escape_string($connectionDB,$_POST['search_ram']);
	$VisibleValue 	= '#value_ram';
	$SearchDisplay	= '#display_ram';
	$SearchTable	= '#search_ram';
    $Query = "SELECT DISTINCT id, model FROM ram WHERE model LIKE '%$PostedValue%' LIMIT 5";	
    $ExecQuery = mysqli_query($connectionDB, $Query);
    echo '<ul>';
	while ($Result = mysqli_fetch_array($ExecQuery)) {
		// failed to escape string by \\/
		$temp2 = preg_replace('/[\/]+/','-',$Result['model']);
		$temp2 = preg_replace('/[\.]+/','-',$temp2);
?> 		<li onclick='fill_computer_ram("<?php echo $VisibleValue; ?>", 
								"<?php echo $Result['id']; ?>", 
								"<?php echo $temp2; ?>", 
								"<?php echo $SearchDisplay; ?>", 
								"<?php echo $SearchTable; ?>")'>
							
            <a> <?php echo $Result['model']; ?>  </a>
        </li>
<?php }}?></ul>
<?php
if (isset($_POST['show_ram'])) {
	$Query = "SELECT id, model FROM ram_computer INNER JOIN ram ON ram_computer.ram_id = ram.id WHERE ram_computer.computer_id = 1";
	$ExecQuery = mysqli_query($connectionDB, $Query);
	$TestValue = '1';
	echo '<ul>';
	while ($Result = mysqli_fetch_array($ExecQuery)) {
?> 		<li onclick='delete_computer_ram("<?php echo $TestValue; ?>", "<?php echo $Result['id']; ?>")'>
            <a> <?php echo $Result['model']; ?>  </a>
        </li>
<?php }}?> </ul>
<?php
if ($_POST['action'] == 'insert_ram') {
	$stmt = mysqli_prepare($connectionDB, "INSERT INTO ram_computer (computer_id, ram_id) VALUES (?, ?)");	
	$string_arg1 = 1;
	$string_arg2 = $_POST['argument_ram_id'];
	$computer_id = $string_arg1;
	$ram_id 	 = intval($string_arg2);
	mysqli_stmt_bind_param($stmt, "ss", $computer_id, $ram_id);
	mysqli_stmt_execute($stmt);
}
?>
<?php
if ($_POST['action'] == 'delete_ram') {
	$PostedValue = intval($_POST['argument_ram_id']);
	$Query = "DELETE FROM ram_computer WHERE ram_computer.computer_id=1 AND ram_computer.ram_id=$PostedValue;";	
    $ExecQuery = mysqli_query($connectionDB, $Query);
}?>



<?php
if (isset($_POST['search_gpu'])) {
    $PostedValue 	= mysqli_real_escape_string($connectionDB,$_POST['search_gpu']);
	$VisibleValue 	= '#value_gpu';
	$SearchDisplay	= '#display_gpu';
	$SearchTable	= '#search_gpu';
    $Query = "SELECT DISTINCT id, model FROM gpu WHERE model LIKE '%$PostedValue%' LIMIT 5";	
    $ExecQuery = mysqli_query($connectionDB, $Query);
    echo '<ul>';
	while ($Result = mysqli_fetch_array($ExecQuery)) {
		// failed to escape string by \\/
		$temp2 = preg_replace('/[\/]+/','-',$Result['model']);
		$temp2 = preg_replace('/[\.]+/','-',$temp2);
?> 		<li onclick='fill_computer_gpu("<?php echo $VisibleValue; ?>", 
								"<?php echo $Result['id']; ?>", 
								"<?php echo $temp2; ?>", 
								"<?php echo $SearchDisplay; ?>", 
								"<?php echo $SearchTable; ?>")'>
							
            <a> <?php echo $Result['model']; ?>  </a>
        </li>
<?php }}?></ul>
<?php
if (isset($_POST['show_gpu'])) {
	$Query = "SELECT id, model FROM gpu_computer INNER JOIN gpu ON gpu_computer.gpu_id = gpu.id WHERE gpu_computer.computer_id = 1";
	$ExecQuery = mysqli_query($connectionDB, $Query);
	$TestValue = '1';
	echo '<ul>';
	while ($Result = mysqli_fetch_array($ExecQuery)) {
?> 		<li onclick='delete_computer_gpu("<?php echo $TestValue; ?>", "<?php echo $Result['id']; ?>")'>
            <a> <?php echo $Result['model']; ?>  </a>
        </li>
<?php }}?> </ul>
<?php
if ($_POST['action'] == 'insert_gpu') {
	$stmt = mysqli_prepare($connectionDB, "INSERT INTO gpu_computer (computer_id, gpu_id) VALUES (?, ?)");	
	$string_arg1 = 1;
	$string_arg2 = $_POST['argument_gpu_id'];
	$computer_id = $string_arg1;
	$gpu_id 	 = intval($string_arg2);
	mysqli_stmt_bind_param($stmt, "ss", $computer_id, $gpu_id);
	mysqli_stmt_execute($stmt);
}
?>
<?php
if ($_POST['action'] == 'delete_gpu') {
	$PostedValue = intval($_POST['argument_gpu_id']);
	$Query = "DELETE FROM gpu_computer WHERE gpu_computer.computer_id=1 AND gpu_computer.gpu_id=$PostedValue;";	
    $ExecQuery = mysqli_query($connectionDB, $Query);
}?>


<?php
if (isset($_POST['search_psu'])) {
    $PostedValue 	= $_POST['search_psu'];
	$VisibleValue 	= '#value_psu';
	$SearchDisplay	= '#display_psu';
	$SearchTable	= '#search_psu';
    $Query = "SELECT DISTINCT model FROM psu WHERE model LIKE '%$PostedValue%' LIMIT 5";
    $ExecQuery = mysqli_query($connectionDB, $Query);
	
    echo '<ul>';
	while ($Result = mysqli_fetch_array($ExecQuery)) {
?> 		<li onclick='fill(	"<?php echo $VisibleValue; ?>", "<?php echo $Result[0]; ?>", 
							"<?php echo $SearchDisplay; ?>", "<?php echo $SearchTable; ?>")'>
            <a> <?php echo $Result[0]; ?>  </a>
        </li>
<?php }}?> </ul>

<?php
if (isset($_POST['search_pc_case'])) {
    $PostedValue 	= $_POST['search_pc_case'];
	$VisibleValue 	= '#value_pc_case';
	$SearchDisplay	= '#display_pc_case';
	$SearchTable	= '#search_pc_case';
    $Query = "SELECT DISTINCT model FROM pc_case WHERE model LIKE '%$PostedValue%' LIMIT 5";
    $ExecQuery = mysqli_query($connectionDB, $Query);
	
    echo '<ul>';
	while ($Result = mysqli_fetch_array($ExecQuery)) {
?> 		<li onclick='fill(	"<?php echo $VisibleValue; ?>", "<?php echo $Result[0]; ?>", 
							"<?php echo $SearchDisplay; ?>", "<?php echo $SearchTable; ?>")'>
            <a> <?php echo $Result[0]; ?>  </a>
        </li>
<?php }}?> </ul>

