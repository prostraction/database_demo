<?php
include "db.php";

// if (isset($_POST['search_motherboard'])) {
if (isset($_POST['search_motherboard'])) {
    $PostedValue = $_POST['search_motherboard'];
	$RequestedName = '#search_motherboard';
    $Query = "SELECT model FROM motherboard WHERE model LIKE '%$PostedValue%' LIMIT 5";
    $ExecQuery = mysqli_query($connectionDB, $Query);
	
    echo '<ul>';
    while ($Result = mysqli_fetch_array($ExecQuery)) {
?>
        <li onclick='fill("<?php echo $Result['search_motherboard']; ?>")'>
            <a>
                <?php echo $Result[0]; ?>
            </a>
        </li>
 
<?php
    }
}
?>
    </ul>