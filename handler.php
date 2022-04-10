<?php
include "db.php";

// if (isset($_POST['search_motherboard'])) {
if (isset($_POST['search_motherboard'])) {
    $PostedValue = $_POST['search_motherboard'];
	$RequestedName = '#value_motherboard';
    $Query = "SELECT model FROM motherboard WHERE model LIKE '%$PostedValue%' LIMIT 5";
    $ExecQuery = mysqli_query($connectionDB, $Query);
	
    echo '<ul>';
    while ($Result = mysqli_fetch_array($ExecQuery)) {
?>
        <li onclick='fill("<?php echo $RequestedName; ?>", "<?php echo $Result[0]; ?>")'>
            <a>
                <?php echo $Result[0]; ?>
            </a>
        </li>
 
<?php
    }
}
?>
    </ul>