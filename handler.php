<?php
include "db.php";

if (isset($_POST['search_motherboard'])) {
    $PostedValue = $_POST['search_motherboard'];
	$requested_name = '#search_motherboard';
    $Query = "SELECT model FROM cpu WHERE model LIKE '%$PostedValue%' LIMIT 5";
 
    $ExecQuery = mysqli_query($connectionDB, $Query);
    echo '<ul>';
    while ($Result = mysqli_fetch_array($ExecQuery)) {
?>
        <li onclick='fill("<?php echo $Result['PostedValue']; ?>")'>
            <a>
                <?php echo $Result['PostedValue']; ?>
            </a>
        </li>
 
<?php
    }
}
?>
    </ul>