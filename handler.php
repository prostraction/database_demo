<?php
include "db.php";
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
	$Argument = $_POST['argument'];
	$Query = "INSERT INTO ram_computer (computer_id, ram_id) VALUES (999, '%$Argument%')";
	$ExecQuery = mysqli_query($connectionDB, $Query);
}



