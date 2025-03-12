<?php
if (session_status() == PHP_SESSION_NONE) session_start();
include_once "../helper/Sessions.php";
include_once "inc/header.php";
include_once "inc/nav.php";
include_once "../app/brand_class.php";
include_once "../app/product_class.php";
include_once "../app/category_class.php";
$showBrands = new Brand();
$showProducts = new Product();
$showCategory = new Category();
$res = $showProducts->showEditProduct($_GET['id']);
foreach ($res as $edit) {
}
// var_dump($edit['desc_en']);
?>



<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">

            </div>

            <div class="col-12">
                <form action="../controllers/cart/logic_product.php?id=<?=$_GET['id']?>" method="POST" enctype="multipart/form-data">
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
                                aria-describedby="helpId" value="<?= $edit['name_en'] ?>">
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
                                aria-describedby="helpId" value="<?= $edit['name_ar'] ?>">
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
                            <label for="Price">Price</label>
                            <input type="number" name="price" id="price" class="form-control" placeholder=""
                                aria-describedby="helpId" value="<?= $edit['price'] ?>">
                            <?php if (Sessions::has("price") == "true") { ?>
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <?php Sessions::flash("price");
                                    ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-4">
                            <label for="Code">Code</label>
                            <input type="text" name="code" id="Code" class="form-control" value="<?= $edit['code'] ?>">
                            <?php if (Sessions::has("code") == "true") { ?>
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <?php Sessions::flash("code");
                                    ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-4">
                            <label for="Quantity">Quantity</label>
                            <input type="text" name="quantity" id="Quantity" class="form-control" value="<?= $edit['quantity'] ?>">
                            <?php if (Sessions::has("quantity") == "true") { ?>
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <?php Sessions::flash("quantity");
                                    ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-4">
                            <label for="Status">Status</label>
                            <select name="status" id="Status" class="form-control" value="<?= $edit['status'] ?>">
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
                        <div class="col-4">
                            <label for="brand_id">Brands</label>
                            <select name="brand_id" id="brand_id" class="form-control" value="<?= $edit['brand_id'] ?>">
                                <?php

                                $res = $showBrands->showBrands();
                                foreach ($res as  $value) { ?>
                                    <option value="<?= $value['id'] ?>"><?= $value['name_en'] ?></option>
                                <?php }

                                ?>
                            </select>
                            <?php if (Sessions::has("brand_id") == "true") { ?>
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <?php Sessions::flash("brand_id");
                                    ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-4">
                            <label for="category_id">categories</label>
                            <select name="category_id" id="category_id" class="form-control" value="<?= $edit['category_id'] ?>">
                                <?php

                                $res = $showCategory->showCategory();
                                foreach ($res as  $value) { ?>
                                    <option value="<?= $value['id'] ?>"><?= $value['name_en'] ?></option>
                                <?php }

                                ?>
                            </select>

                            <?php if (Sessions::has("category_id") == "true") { ?>
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <?php Sessions::flash("category_id");
                                    ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-6">
                            <label for="desc_en">Desc En</label>
                            <textarea name="desc_en" id="desc_en" cols="30" rows="10" class="form-control">
                            <?= $edit['desc_en'] ?>
                        </textarea>
                            <?php if (Sessions::has("desc_en") == "true") { ?>
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <?php Sessions::flash("desc_en");
                                    ?>
                                </div>
                            <?php } ?>
                        </div>

                        <div class="col-6">
                            <label for="desc_ar">Desc Ar</label>
                            <textarea name="desc_ar" id="desc_ar" cols="30" rows="10" class="form-control" >
                            <?= $edit['desc_ar'] ?>
                        </textarea>
                            <?php if (Sessions::has("desc_ar") == "true") { ?>
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <?php Sessions::flash("desc_ar");
                                    ?>
                                </div>
                            <?php } ?>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col-12">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="form-control" value="<?= $edit['image'] ?> ">
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
                            <button class="btn btn-primary" name="page" value="index"> edit product </button>
                        </div>
                        <div class="col-2">
                            <button class="btn btn-dark" name="page" value="back"> Create & return </button>
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