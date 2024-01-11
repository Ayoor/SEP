
<div class="layout-sidebar" id="sidebar" >
      <div class="layout-sidebar-backdrop"></div>
      <div class="layout-sidebar-body">
        <div class="custom-scrollbar">
          <nav id="sidenav" class="sidenav-collapse collapse">
            <ul class="sidenav">
              <li class="sidenav-search hidden-md hidden-lg">
                <form class="sidenav-form" action="">
                  <div class="form-group form-group-sm">
                    <div class="input-with-icon">
                      <input class="form-control" type="text" placeholder="Search…">
                      <span class="icon icon-search input-icon"></span>
                    </div>
                  </div>
                </form>
              </li>
             
              
              </li>

              <li class="sidenav-item">
                <a href="index.php">
                  <span class="sidenav-label sidepaneltitle icon icon-home">  Home</span>
                </a>
              </li>


              <li class="sidenav-item">
                <a href="category-add.php">
                  <span class="sidenav-label sidepaneltitle ">Categories</span>
                </a>
              </li>

             

              <!-- php start -->
              <?php
              $categoryQuery = "SELECT categories.Name FROM `categories`;";
              $stmt1 = mysqli_prepare($conn, $categoryQuery);

              if ($stmt1) {
                mysqli_stmt_execute($stmt1);
                $result = mysqli_stmt_get_result($stmt1);

                while ($categoryRow = mysqli_fetch_assoc($result)) {
                  $categoryName = $categoryRow['Name'];

                  // Fetch and display equipment names for the current category
                  $equipmentQuery = "SELECT equipment_name 
                           FROM `equipments` 
                           INNER JOIN categories ON equipments.categoryID = categories.id
                           WHERE categories.Name = ?";
                  $stmt2 = mysqli_prepare($conn, $equipmentQuery);
                  mysqli_stmt_bind_param($stmt2, "s", $categoryName);
                  mysqli_stmt_execute($stmt2);
                  $equipmentResult = mysqli_stmt_get_result($stmt2);
              ?>

                  <li class="sidenav-item has-subnav">
                    <a href="#" aria-haspopup="true">
                      <span class="sidenav-icon icon icon-list"></span>
                      <span class="sidenav-label"><?php echo htmlspecialchars($categoryName); ?></span>
                    </a>

                    <ul class="sidenav-subnav collapse">
                      <li class="sidenav-subheading">Forms</li>
                      <?php
                      while ($equipmentRow = mysqli_fetch_assoc($equipmentResult)) {
                        $equipmentName = htmlspecialchars($equipmentRow['equipment_name']);
                        $equipmentPageLink = strtolower(str_replace(' ', '', $equipmentName)) . '.php?'.'equipmentname='.$equipmentName ;
                      ?>
                        <li><a href="<?php echo $equipmentPageLink; ?>"><?php echo $equipmentName; ?></a></li>
                      <?php
                      }

                      // Close the equipment prepared statement
                      mysqli_stmt_close($stmt2);
                      ?>

                    </ul>
                  </li>

              <?php
                }

                // Close the category prepared statement
                mysqli_stmt_close($stmt1);
              } else {
                // Handle the case where the prepared statement could not be created
                echo "Error creating prepared statement: " . mysqli_error($conn);
              }
              ?>


              <!-- php end -->
              
              <!-- 1 -->

              

              <!-- 2 -->

              <!-- <li><a href="clnFloorCleaning.php">  </a></li>
                  <li><a href="clnPressureWasher.php">Pressure Washer</a></li>
                  <li><a href="clnVaccum.php">Vaccum</a></li> -->


              <!-- 3 -->
              <!-- <li><a href="drainCleaning-plumbing.php">Drain Cleaning</a></li>
                  <li><a href="pumping-plumbing.php">Pumping</a></li>
                  <li><a href="pipeThreading-plumbing.php">Pipe Threading</a></li> -->

              <!-- 4 -->
              <!-- <li><a href="floorEquipments-decorating.php">Floor Equipments</a></li>
                  <li><a href="paper&paintStrippers-decorating.php">Paper and Paint Strippers</a></li>
                  <li><a href="tilingTools-decoarting.php">Tiling tools</a></li> -->


              <!-- 5 -->
              <!-- <li><a href="extractor-siteEquipments.php">Extractors</a></li>
                  <li><a href="siteFencing-siteEquipment.php">Site Fencing</a></li>
                  <li><a href="siteSafety&Security-siteEquipment.php">Site Safety and Security</a></li> -->

              <li class="sidenav-item">
                <a href="category-add.php">
                  <span class="sidenav-icon icon icon-plus"></span>
                  <span class="sidenav-label">Add New Category</span>
                </a>
              </li>

              <li class="sidenav-item">
                <a href="equipmentadd.php">
                  <span class="sidenav-icon icon icon-plus"></span>
                  <span class="sidenav-label">Add New Equipment</span>
                </a>
              </li>






            </ul>
          </nav>
        </div>
      </div>
    </div>