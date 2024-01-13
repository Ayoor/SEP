
<?php include('connection.php'); 
session_start();
if(!$_SESSION["username"]){
  header('Location: signin.php');
}
// = "Ayodele"
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from 111.68.112.228:443/public/store.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Nov 2023 00:43:16 GMT -->

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Orders</title>
  <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
  <meta name="description" content="Elephant is an admin template that helps you build modern Admin Applications, professionally fast! Built on top of Bootstrap, it includes a large collection of HTML, CSS and JS components that are simple to use and easy to customize.">
  <meta property="og:url" content="http://demo.madebytilde.com/elephant">
  <meta property="og:type" content="website">
  <meta property="og:title" content="The fastest way to build Modern Admin APPS for any platform, browser, or device.">
  <meta property="og:description" content="Elephant is an admin template that helps you build modern Admin Applications, professionally fast! Built on top of Bootstrap, it includes a large collection of HTML, CSS and JS components that are simple to use and easy to customize.">
  <meta property="og:image" content="../../demo.madebytilde.com/elephant.html">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="@madebytilde">
  <meta name="twitter:creator" content="@madebytilde">
  <meta name="twitter:title" content="The fastest way to build Modern Admin APPS for any platform, browser, or device.">
  <meta name="twitter:description" content="Elephant is an admin template that helps you build modern Admin Applications, professionally fast! Built on top of Bootstrap, it includes a large collection of HTML, CSS and JS components that are simple to use and easy to customize.">
  <meta name="twitter:image" content="../../demo.madebytilde.com/elephant.html">
  <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
  <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32">
  <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16">
  <link rel="manifest" href="manifest.json">
  <link rel="mask-icon" href="safari-pinned-tab.svg" color="#d9230f">
  <meta name="theme-color" content="#ffffff">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,700">
  <link rel="stylesheet" href="css/vendor.min.css">
  <link rel="stylesheet" href="css/elephant.min.css">
  <link rel="stylesheet" href="css/application.min.css">
  <link rel="stylesheet" href="css/store.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/alertify.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/themes/default.min.css" />

    <!-- AlertifyJS JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js"></script>
</head>

<body class="layout layout-header-fixed">
  <?php
  include 'topnav.php';
  ?>
  <div class="layout-main">
    <?php
    include 'sidebar.php';
    ?>
 

          <div class="store-content">
            <div class="row">
              <div class="col-xs-12">
              <div class="card-body" data-toggle="match-height">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Equipments</th>
                    <th>Quantity Total</th>
                    <th>Sub Total</th>
                    <th>Address</th>
                    <th>Mobile</th>
                    <th>Date</th>
                    <th>Order Status</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    include "connection.php";
                    $q = "select * from orders order by created_at desc";
                    $res = mysqli_query($conn, $q);
                    $x = 0;
                    while($row = mysqli_fetch_array($res)){
                        $x +=1;
                        $order_id = $row["id"];
                        $or_item_q = "select * from order_items where order_id = '$order_id'";
                        $res_or_item = mysqli_query($conn, $or_item_q);
                        $data_items = [];
                        $subtotal = 0;
                        while($row_or_item = mysqli_fetch_array($res_or_item)){
                            $product_id =  $row_or_item["product"];
                            $qty = $row_or_item["quantity"];

                            $startDate = $row_or_item["start_date"];
                            $endDate = $row_or_item["end_date"];
                            $startDateTime = new DateTime($startDate);
                            $endDateTime = new DateTime($endDate);

                            // Calculate the difference between dates
                            $interval = $startDateTime->diff($endDateTime);

                            // Get the difference in days
                            $daysDifference = $interval->days;

                            // Getting Details of Product
                            $prod_q = "select * from equipments where id = '$product_id'";
                            $res_prod = mysqli_query($conn, $prod_q);
                            while($row_prod = mysqli_fetch_array($res_prod)){
                                $product_name = $row_prod["equipment_name"];
                                $price = $row_prod["price"];
                                $subtotal += ($price * $qty * $daysDifference);
                            }
                            array_push($data_items, [
                                'product' => $product_name,
                                'quantity' => $qty,
                            ]);
                        }
                    ?>
                    <tr class="tr-shadow">
                        <td><?php echo $x ?></td>
                        <td style="color:blue">
                            <?php
                            $qty_total = 0;
                            foreach ($data_items as $index => $di) {
                                $qty_total += $di["quantity"];
                                $index = $index + 1;
                                echo "$index)" . $di["product"] . "  (qty: ".$di["quantity"].")";
                                echo "<br><br>";
                            }
                            ?>
                        </td>
                        <td>
                            <?php echo $qty_total; ?>
                        </td>
                        <td><?php echo $subtotal; ?></td>
                        <td><?php echo $row["address"]; ?></td>
                        <td><?php echo $row["mobile"]; ?></td>
                        <td><?php
                            $dateString = $row["created_at"];
                            $dateTime = new DateTime($dateString);
                            $readableDate = $dateTime->format('F j, Y');
                            echo $readableDate;
                            ?></td>
                        <td>
                            <select class="form-select statusUpdater" name="property" data-id="<?php echo $row['id'] ?>" style="padding:5px">
                            <option value="pending" <?php echo ($row["status"] == "pending") ? "selected" : ""; ?>>Pending</option>
                            <option value="approved" <?php echo ($row["status"] == "approved") ? "selected" : ""; ?>>Approved</option>
                            <option value="delivering" <?php echo ($row["status"] == "delivering") ? "selected" : ""; ?>>Delivering</option>
                            <option value="delivered" <?php echo ($row["status"] == "delivered") ? "selected" : ""; ?>>Delivered</option>
                            </select>
                        </td>
                    </tr>
                    
                    <tr class="spacer"></tr>
                    <?php
                    }
                    ?>
                </tbody>
              </table>
            </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
    include "footer.php";
    ?>
  </div>
  <script src="js/vendor.min.js"></script>
  <script src="js/elephant.min.js"></script>
  <script src="js/application.min.js"></script>
  <script>

    let statusUpdaters = document.querySelectorAll(".statusUpdater");
    statusUpdaters.forEach(updater => {
        updater.addEventListener("change", function(e){
            const order_id = updater.getAttribute("data-id");
            const status = e.target.value;
            if(status != 0){
                const data = {
                    order_id: order_id,
                    status: status
                }
                $.ajax({
                    url: 'backend/update_order_status.php',
                    type: 'POST',
                    data: data,
                    success: function(response) {
                        // Handle the successful response here
                        let resp =JSON.parse(response)
                        if(resp == 1){
                            alertify.success('Order Status Updated');
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error('Request failed:', status, error);
                    }
                });
            }
        })
    });
</script>
</body>

<!-- Mirrored from 111.68.112.228:443/public/store.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Nov 2023 00:43:56 GMT -->

</html>