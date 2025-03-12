<?php
if (session_status() == PHP_SESSION_NONE) session_start();
include_once "../helper/Sessions.php";
include_once "inc/header.php";
include_once "inc/nav.php";
include_once "../app/brand_class.php";
$showBrands = new Brand();
$res = $showBrands->showEditBrand($_GET['id']);
foreach ($res as $edit) {
}
?>


<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-12">
        
      </div>
      
      <div class="col-12">
        <form action="../controllers/cart/logic_brand.php?id=<?=$_GET['id']?>" method="POST" enctype="multipart/form-data">
          
          <?php if (Sessions::has("fail") == "true") { ?>
            <div class="alert alert-danger alert-dismissible fade show">
              <?php Sessions::flash("fail");
              ?></div>
          <?php } ?>
          <?php if (Sessions::has("success") == "true") { ?>
            <div class="alert alert-success alert-dismissible fade show">
              <?php Sessions::flash("success");
              ?></div>
          <?php } ?>
          <div class="form-row">
            <div class="col-6">
              <label for="name_en">Name En</label>
              <input type="text" name="name_en" id="name_en" class="form-control" placeholder=""
                aria-describedby="helpId" value="<?=$edit['name_en']?>">
              <?php if (Sessions::has("name_en") == "true") { ?>
                <div class="alert alert-danger alert-dismissible fade show">
                  <?php Sessions::flash("name_en");
                  ?>
                </div>
              <?php } ?>
            </div>
            <div class="col-6">
              <label for="name_ar">Name Ar</label>
              <input type="text" name="name_ar" id="name_ar" class="form-control" placeholder=""
                aria-describedby="helpId" value="<?=$edit['name_ar']?>">
              <?php if (Sessions::has("name_ar") == "true") { ?>
                <div class="alert alert-danger alert-dismissible fade show">
                  <?php Sessions::flash("name_ar");
                  ?>
                </div>
              <?php } ?>
            </div>
          </div>
          <div class="form-row">
            <div class="col-4">
              <label for="Status">Status</label>
              <select name="status" id="Status" class="form-control" value="<?=$edit['status']?>">
                <option value="1">Active</option>
                <option value="0">Not Active</option>
               
              </select>
              <?php if (Sessions::has("status") == "true") { ?>
                <div class="alert alert-danger alert-dismissible fade show">
                  <?php Sessions::flash("status");
                  ?>
                </div>
              <?php } ?>
            </div>
          <div class="form-row">
            <div class="col-12">
              <label for="image">Image</label>
              <input type="file" name="image" id="image" class="form-control" value="<?=$edit['image']?>">
              <?php if (Sessions::has("image") == "true") { ?>
                <div class="alert alert-danger alert-dismissible fade show">
                  <?php Sessions::flash("image");
                  ?>
                </div>
              <?php } ?>
            </div>

          </div>
          <div class="form-row my-3">
            <div class="col-2">
              <button class="btn btn-primary" name="page" value="index"> edit brand </button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include_once "inc/footer.php";
?>