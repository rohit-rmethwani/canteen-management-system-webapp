<?php
    #PHP Script for getting all the categories.
    include_once ("includes/functions.php");
    $result = getAllCategories();

    #PHP Script for inserting the menu item into menu table.
?>

<!DOCTYPE html>
<html lang="en">

    <?php
        include_once("includes/header.php");
    ?>

  <body id="page-top">

    <!--Navigation Header-->
    <?php
        include_once("includes/components/navigation_header.php");
    ?>

    <div id="wrapper">

      <!-- Sidebar -->
      <?php
        include_once ("includes/components/sidebar.php");
      ?>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <?php
            include_once ("includes/components/breadcrumbs.php");
          ?>
        <!--Add Menu Item Form-->
        <div class="form-container">
            <form action="http://localhost/canteen/admin/add_menu_success.php" method="post" role="form">
                <legend>Add Menu Item</legend>

                <div class="form-group">
                    <label for="item_name">Name</label>
                    <input type="text" class="form-control" name="item_name" id="item_name" placeholder="Item Name">
                </div>

                <div class="form-group">
                    <label for="item_category">Select the category</label>
                    <select name="item_category_id" id="item_category_id" class="form-control">
                        <?php
                            while($row = mysqli_fetch_assoc($result))
                            {
                                $category_name = $row["category_name"];
                                $category_id = $row["category_id"];
                                echo "<option value=$category_id>$category_name</option>";
                            }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="item_price">Price</label>
                    <input type="number" class="form-control" name="item_price" id="item_price" placeholder="Item Price in ₹">
                </div>
                <button type="submit" class="btn btn-primary" name="add_menu_item" id="add_menu_item">Add Item</button>
            </form>
        </div>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Your Website 2018</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <?php
        include_once("includes/scripts.php");
    ?>

  </body>

</html>
