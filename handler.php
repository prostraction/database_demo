<?php
include "db.php";

if (isset($_POST['search'])) {
    $model = $_POST['search'];
    $Query = "SELECT model FROM cpu WHERE model LIKE '%$model%' LIMIT 5";
 
    $ExecQuery = mysqli_query($connectionDB, $Query);
    echo '<ul>';
    while ($Result = mysqli_fetch_array($ExecQuery)) {
?>
        <li onclick='fill("<?php echo $Result['model']; ?>")'>
            <a>
                <?php echo $Result['model']; ?>
            </a>
        </li>
 
<?php
    }
}
?>
    </ul>