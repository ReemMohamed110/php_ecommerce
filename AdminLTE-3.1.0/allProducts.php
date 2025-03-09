<?php

if (session_status() == PHP_SESSION_NONE) session_start();
include_once "inc/header.php";
include_once __DIR__ . "/inc/nav.php";
include_once "../app/product_class.php";
$showProduct = new Product();
?>
<div class="card">
    <div class="card-header border-0">
        <h3 class="card-title">Products</h3>
        <div class="card-tools">
            <a href="#" class="btn btn-tool btn-sm">
                <i class="fas fa-download"></i>
            </a>
            <a href="#" class="btn btn-tool btn-sm">
                <i class="fas fa-bars"></i>
            </a>
        </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-striped table-valign-middle">
            <thead>
                <tr>
                    <th>name</th>
                    <th>description</th>
                    <th>price</th>
                    <th>quantity</th>
                    <th>image</th>
                    <th>action</th>
                </tr>
            </thead>
           
            <?php

            $res = $showProduct->showProducts();
            foreach ($res as  $value) { ?>
                <tr>
                    <td><?= $value['name_en'] ?></td>
                    <td><?= $value['desc_en'] ?></td>
                    <td><?= $value['price'] ?></td>
                    <td><?= $value['quantity'] ?></td>
                    <td><img width="100" height="100" src='<?=$value['image'] ?>'></td>
                    <td>
                        <a href="controller/blog/delete.php?id=<?php echo $value['id'] ?>&tittle=<?php echo $row['tittle'] ?>&content=<?php echo $row['content'] ?>" class="btn btn-danger" style="font-size: 18px; padding: 10px 20px;"><i class="fas fa-trash"></i></i> </a>
                        <a href="index.php?page=edit&id=<?php echo $value['id'] ?>" class="btn btn-info" style="font-size: 18px; padding: 10px 20px;"><i class="fas fa-edit"></i> </a>

                    </td>
                </tr>
                <
                    <?php }

                    ?>

                    

        </table>
    </div>
</div>



<?php
include_once "inc/footer.php";
?>