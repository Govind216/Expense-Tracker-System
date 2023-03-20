<?php
// Include the database configuration file  
include("config/constants.php");
$email = $_SESSION['user'];

// Get image data from database 
$result = $conn->query("SELECT receipt FROM expenses where email = '$email'");
?>

<?php if ($result->num_rows > 0) { ?>
    <div class="gallery">
        <?php while ($row = $result->fetch_assoc()) { ?>
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['receipt']); ?>" />
        <?php } ?>
    </div>
<?php } else { ?>
    <p class="status error">Image(s) not found...</p>
<?php } ?>