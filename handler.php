<?php
include "db.php";
function debugToBrowserConsole ( $msg ) {
    $msg = str_replace('"', "''", $msg);  # weak attempt to make sure there's not JS breakage
    echo "<script>console.debug( \"PHP DEBUG: $msg\" );</script>";
}
function d2c ( $msg ) { debugToBrowserConsole( $msg ); }

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
?> 		<li onclick='fill_multiple(	"<?php echo $VisibleValue; ?>", "<?php echo $Result[0]; ?>", 
							"<?php echo $SearchDisplay; ?>", "<?php echo $SearchTable; ?>")'>
            <a> <?php echo $Result[0]; ?>  </a>
        </li>
<?php }?></ul><?php
	$Query = "SELECT DISTINCT id FROM ram WHERE model LIKE '%$Result[0]%'";
	$ExecQuery = mysqli_query($connectionDB, $Query);
	$TestValue = '#test_ram';
	echo '<ul>';
	while ($Result = mysqli_fetch_array($ExecQuery)) {
?> 		<li onclick='fill_multiple(	"<?php echo $TestValue; ?>", "<?php echo $Result[0]; ?>", 
							"<?php echo $SearchDisplay; ?>", "<?php echo $SearchTable; ?>")'>
            <a> <?php echo $Result[0]; ?>  </a>
        </li>
<?php }?></ul><?php
	$Query = "INSERT INTO ram_computer (computer_id, ram_id) VALUES (999, '$Result')";
	$ExecQuery = mysqli_query($connectionDB, $Query);
}?>

<?php
if ($_POST['action'] == 'ram') {
	//$ram_id = mysqli_real_escape_string($connectionDB, $_POST['argument_ram']);
	
	//$PassedArgument = intval($_POST['argument_ram'],10);
	//$string1 = strval($PassedArgument);
	//$ram_id = 333;//intval($_POST['argument_ram']);
	//if ($_POST['argument_ram'] == 123456) {
	//	$ram_id = 222;
	//}
	
	//$Query = "INSERT INTO ram_computer (computer_id, ram_id) VALUES (200," . $ram_id . ");";
	//$Query = "INSERT INTO ram_computer (computer_id, ram_id) VALUES (200".$ram_id.");";
	
	//$Query = "INSERT INTO ram_computer (computer_id, ram_id) VALUES ('".$temp."', '".$temp."')";
	//$ExecQuery = mysqli_query($connectionDB, $Query);//sprintf($Query, 400, $PassedArgument));
	//$_POST['argument_ram']
	
	$stmt = mysqli_prepare($connectionDB, "INSERT INTO ram_computer (computer_id, ram_id) VALUES (?,?);");
	//$stmt = mysqli_prepare($connectionDB, "INSERT INTO test (x, y) VALUES (?, ?);");
	
	$string_arg1 = '1';
	$string_arg2 = $_POST['argument_ram'];
	$computer_id = $string_arg1;
	$ram_id 	 = intval($string_arg2);

	mysqli_stmt_bind_param($stmt, "ss", $computer_id, $ram_id);
	mysqli_stmt_execute($stmt);
}
?>

