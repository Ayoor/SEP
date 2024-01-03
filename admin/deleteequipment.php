<?php
$equipment = $_GET['equipmentname'];
$pdo = new PDO('mysql:host=localhost;dbname=main-db', 'root', '');
$stmt = $pdo->prepare("DELETE FROM `equipments` WHERE equipment_name = ?");
$stmt->bindParam(1, $equipment);
$stmt->execute();

if ($stmt) {
    // Display success message and redirect after 3 seconds
    echo '<div class="alert alert-success" role="alert">
    Equipment Successfully Removed from the database.
</div>';

    echo '<script>
        setTimeout(function(){
            window.location.href = "index.php";
        }, 3000);
    </script>';
}

?>