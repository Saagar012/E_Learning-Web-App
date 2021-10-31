<?php
if (!isset($_GET['about']) && !isset($_GET['faqs']) && !isset($_GET['contact']) && !isset($_GET['terms']) && !isset($_GET['cat']) && !isset($_GET['sub_cat']) && !isset($_GET['lang'])) {
?>
    <div id='bodyright'>
        <h3> OverView </h3>
      
<?php
} 
?>
<?php
try {
    include"inc/db1.php";
    // Create sql statment
    $result= $con->prepare("SELECT * FROM courses");
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $result->execute();
    // $rersult = $sql1->rowCount();

} catch (Exception $e) {
    echo "Error " . $e->getMessage();
    exit();
}
?>
<div class="container">
        <?php if (isset($_GET['status']) && $_GET['status'] == "deleted") : ?>
        <div class="alert alert-success" role="alert">
            <strong>Deleted</strong>
        </div>
        <?php endif ?>
        <?php if (isset($_GET['status']) && $_GET['status'] == "fail_delete") : ?>
        <div class="alert alert-danger" role="alert">
            <strong>Fail Deleste</strong>
        </div>
        <?php endif ?>
        <!-- Table Product -->
        <div class="card border-danger">
            <div class="card-header bg-danger text-white">
            <strong><i class="fa fa-database"></i> Courses</strong>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h5 class="card-title float-left">Table Courses</h5>
                    <a href="course_edit.php" class="btn btn-success float-right mb-3"><i class="fa fa-plus"></i> Add New</a>
                </div>
            </div>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Course Name</th>
                        <th>Instructor Name</th>
                        <th>Price</th>
                        <th>Discount % </th>
                        <th style="width: 20%;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php if ($result->rowCount() > 0) : ?>
                    <?php foreach ($result as $product) : ?>
                    <tr>
                        <td><?= $product['c_name'] ?></td>
                        <td><?= $product['instructor'] ?></td>
                        <td>$<?= number_format($product['price'], 2) ?></td>
                        <td><?= $product['discount'] ?> % </td>
                        <td>
                            <a href="show.php?id=<?=$product['c_id']?>" class="btn btn-sm btn-light"><i class="fa fa-th-list"></i></a>
                            <a href="edit.php?id=<?=$product['c_id']?>" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                            <a href="delete.php?id=<?=$product['c_id']?>" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete-<?= $product['c_id'] ?>"><i class="fa fa-trash"></i></a>
                            <?php include("inc/modal.php") ?>
                        </td>
                    </tr>
                    <?php endforeach ?>
                <?php endif ?>
                </tbody>
            </table>
        </div>
      </div>
