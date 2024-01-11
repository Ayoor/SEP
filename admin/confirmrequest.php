<?php
session_start();
if (!$_SESSION["username"]) {
    header('Location: signin.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Extract form data
    $adminemail = $_SESSION['email'];
    $stmt = null;
 
   $orderid = $_POST['orderid'];

    // connect to the database
    // insert the image data into the database
    $pdo = new PDO('mysql:host=localhost;dbname=main-db', 'root', '');

    if (isset($_POST['reject'])) {
        $status = "Rejected";
        $reason = $_POST['rejection'];
    $stmt = $pdo->prepare("UPDATE `transanctions`
        SET `status`=:status, `Rejection Reason`=:reason, `Adminid`=(SELECT id FROM users WHERE users.email = :adminemail)
        WHERE `transanctions`.`orderID` = :orderid");

        
    
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':reason', $reason);
    $stmt->bindParam(':adminemail', $adminemail);
    $stmt->bindParam(':orderid', $orderid);
    
    $stmt->execute();
    
    }

    if (isset($_POST['approve'])) {
        $reason = "Not Applicable";
        $status = "Approved";
    $stmt = $pdo->prepare("UPDATE `transanctions`
        SET `status`=:status, `Rejection Reason`=:reason, `Adminid`=(SELECT id FROM users WHERE users.email = :adminemail)
        WHERE `transanctions`.`orderID` = :orderid");

        
    
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':reason', $reason);
    $stmt->bindParam(':adminemail', $adminemail);
    $stmt->bindParam(':orderid', $orderid);
    
    $stmt->execute();
    
    }

    if ($stmt) {
        // Display success message and redirect after 3 seconds
        echo '<div class="alert alert-success" role="alert">
            Order Status Updated.
        </div>';
    
        echo '<script>
            setTimeout(function(){
                window.location.href = "index.php";
            }, 3000);
        </script>';
    }
 

}

?>