<?php
include "db.php";

$computer_id = 1;

if (isset($_POST['search_motherboard'])) {
    $PostedValue 	= $_POST['search_motherboard'];
	$VisibleValue 	= '#value_motherboard';
	$SearchDisplay	= '#display_motherboard';
	$SearchTable	= '#search_motherboard';
    $Query = "SELECT DISTINCT model FROM motherboard WHERE model LIKE '%$PostedValue%' LIMIT 5";
    $ExecQuery = mysqli_query($connectionDB, $Query);
	
    echo '<ul>';
	while ($Result = mysqli_fetch_array($ExecQuery)) {
?> 		<li onclick='fill(	"<?php echo $VisibleValue; ?>", "<?php echo $Result[0]; ?>", 
							"<?php echo $SearchDisplay; ?>", "<?php echo $SearchTable; ?>")'>
            <a> <?php echo $Result[0]; ?>  </a>
        </li>
<?php }}?> </ul>

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
    $PostedValue 	= $_POST['search_ram'];
	$VisibleValue 	= '#value_ram';
	$SearchDisplay	= '#display_ram';
	$SearchTable	= '#search_ram';
    $Query = "SELECT DISTINCT model FROM ram WHERE model LIKE '%$PostedValue%' LIMIT 5";
    $ExecQuery = mysqli_query($connectionDB, $Query);
	
    echo '<ul>';
	while ($Result = mysqli_fetch_array($ExecQuery)) {
?> 		<li onclick='find_ram_id("<?php echo $VisibleValue; ?>", "<?php echo $Result[0]; ?>", 
							"<?php echo $SearchDisplay; ?>", "<?php echo $SearchTable; ?>")'>
							
            <a> <?php echo $Result[0]; ?>  </a>
        </li>
<?php }?></ul><?php
	$Query = "SELECT ram.model FROM ram_computer INNER JOIN ram ON ram_computer.ram_id = ram.id WHERE ram_computer.computer_id = 1";
	$ExecQuery = mysqli_query($connectionDB, $Query);
	$TestValue = '#test_ram';
	echo '<ul>';
	while ($Result = mysqli_fetch_array($ExecQuery)) {
?>             	<p> <?php echo $Result[0]; ?>  </p>
<?php }?></ul><?php
}?>

<?php
if ($_POST['action'] == 'ram') {
	$stmt = mysqli_prepare($connectionDB, "INSERT INTO ram_computer (computer_id, ram_id) VALUES (?, ?);");
	
	$string_arg1 = 1;
	$string_arg2 = $_POST['argument_ram'];
	$computer_id = $string_arg1;
	$ram_id 	 = intval($string_arg2);

	mysqli_stmt_bind_param($stmt, "ss", $computer_id, $ram_id);
	mysqli_stmt_execute($stmt);
}
?>
<?php
if ($_POST['action'] == 'ram_id_find') {
	$model = $_POST['argument_ram_id'];
	$Query = "SELECT id FROM ram WHERE model = $model LIMIT 1";
	$ExecQuery = mysqli_query($connectionDB, $Query);
	$get_ram_id = mysqli_fetch_array($ExecQuery));
	
	$stmt = mysqli_prepare($connectionDB, "INSERT INTO ram_computer (computer_id, ram_id) VALUES (?, ?);");
	$string_arg1 = 1;
	$string_arg2 = $get_ram_id[0];
	$computer_id = $string_arg1;
	$ram_id 	 = intval($string_arg2);
	mysqli_stmt_bind_param($stmt, "ss", 1, 100);
	mysqli_stmt_execute($stmt);	
}
