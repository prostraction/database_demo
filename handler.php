<?php
include "db.php";

if (isset($_POST['search'])) {
    $name = $_POST['search'];
	$requested_name = '#search';
    $Query = "SELECT model FROM cpu WHERE model LIKE '%$name%' LIMIT 5";
 
    $ExecQuery = mysqli_query($connectionDB, $Query);
    echo '<ul>';
    while ($Result = mysqli_fetch_array($ExecQuery)) {
?>
        <li onclick='fill("<?php echo $Result['name']; ?>")'>
            <a>
                <?php echo $Result['name']; ?>
            </a>
        </li>
 
<?php
    }
}
?>
    </ul>