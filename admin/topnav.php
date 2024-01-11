<div class="layout-header">
  <div class="navbar navbar-default">

    <div class="navbar-toggleable">
      <nav id="navbar" class="navbar-collapse collapse">
        <button class="sidenav-toggler hidden-xs" title="Collapse sidenav ( [ )" aria-expanded="true" type="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="bars">
            <span class="bar-line bar-line-1 out"></span>
            <span class="bar-line bar-line-2 out"></span>
            <span class="bar-line bar-line-3 out"></span>
            <span class="bar-line bar-line-4 in"></span>
            <span class="bar-line bar-line-5 in"></span>
            <span class="bar-line bar-line-6 in"></span>
          </span>
        </button>
        <ul class="nav navbar-nav navbar-right">

          <?php
          // Assuming you have a database connection established
          // $conn = mysqli_connect("your_host", "your_username", "your_password", "your_database");

          // Query to get the count of pending transactions
          $countQuery = "SELECT COUNT(*) AS pendingCount FROM `transanctions` WHERE `transanctions`.`status` = 'pending'";
          $countResult = mysqli_query($conn, $countQuery);
          $pendingCount = 0;

          if ($countResult) {
            $countRow = mysqli_fetch_assoc($countResult);
            $pendingCount = $countRow['pendingCount'];
          }

          // Query to get the pending transactions
          $dataQuery = "SELECT *, equipments.equipment_name
          FROM `transanctions` 
          JOIN `equipments` ON transanctions.equipmentID = equipments.id
          WHERE transanctions.`status` = 'pending'";
          $dataResult = mysqli_query($conn, $dataQuery);
          ?>


<li class="dropdown">
    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true">
        <span class="icon-with-child hidden-xs">
            <span class="icon icon-bell-o icon-lg"></span>
            <span class="badge badge-danger badge-above right"><?php echo $pendingCount; ?></span>
        </span>
        <span class="visible-xs-block">
            <span class="icon icon-bell icon-lg icon-fw"></span>
            <span class="badge badge-danger pull-right"><?php echo $pendingCount; ?></span>
            Notifications
        </span>
    </a>
    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg" style="border: 1px solid green; max-height: 200px; overflow-y: auto;">
        <div class="dropdown-header">
            <!-- <a class="dropdown-link" href="#">Mark all as read</a> -->
            <h5 class="dropdown-heading">Recent Notifications</h5>
        </div>
        <div class="dropdown-body">
            <div class="list-group list-group-divided custom-scrollbar">
            <?php
// Check if there are notifications
if (mysqli_num_rows($dataResult) > 0) {
    // Loop through the pending transactions
    while ($row = mysqli_fetch_assoc($dataResult)) {
        $equipmentName = $row['equipment_name'];
        $transanctionid = $row['orderID'];
        // You need to fetch $equipmentName using the equipment_id from the row

        echo '<a class="list-group-item" href="orderprocessing.php?id='.$transanctionid.'">
                <div class="notification">
                    <div class="notification-media">
                        <span class="icon icon-list bg-warning rounded sq-40"></span>
                    </div>
                    <div class="notification-content">
                        <h5 class="notification-heading" style="font-weight: bolder;">Confirm Hire Order</h5>
                        <p class="notification-text">
                            <small class="truncate">A new order has been placed on ' . $equipmentName . '</small>
                        </p>
                    </div>
                </div>
            </a>';
    }
} else {
    // No new notifications
    echo '<a class="list-group-item">
    <div class="notification">
       
        <div class="notification-content">
            <h5 class="notification-heading" style="font-weight: bolder;">No new Order</h5>
            <p class="notification-text">
                <small class="truncate">You are all set!</small>
            </p>
        </div>
    </div>
</a>';
}
?>

            </div>
        </div>
        <!-- <div class="dropdown-footer">
            <a class="dropdown-btn" href="#">See All</a>
        </div> -->
    </div>
</li>



          <li class="dropdown hidden-xs">
            <button class="navbar-account-btn" data-toggle="dropdown" aria-haspopup="true">
              <img class="rounded" width="36" height="36" src="user.png" alt="Teddy Wilson"> <?php echo $_SESSION["username"]; ?>
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu dropdown-menu-right">


              <li><a href="signin.php">Sign out</a></li>
            </ul>
          </li>

          <li class="visible-xs-block">
            <a href="signin.php">
              <span class="icon icon-power-off icon-lg icon-fw"></span>
              Sign out
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</div>