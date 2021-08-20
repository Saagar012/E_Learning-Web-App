<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Admin | Home</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/index_responsive.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php include("inc/header12.php"); ?>

    <?php
    include("inc/db1.php");
    $id = $_GET['id'];
    $id = $_GET['id'] ? intval($_GET['id']) : 0;

    try {

        $sql = "SELECT * FROM courses WHERE c_id = :id LIMIT 1";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
    } catch (Exception $e) {
        echo "Error " . $e->getMessage();
        exit();
    }

    // if (!$stmt->rowCount()) {
    //     header("Location: index.php");
    //     exit();
    // }
    $product = $stmt->fetch();

    ?>
    <div class="container">
        <a href="dashboard.php" class="btn btn-light mb-2 mt-2">
            << Go Back</a>
                <!-- Show  a Product -->
                <div class="card border-danger">
                    <div class="card-header bg-danger text-white">
                        <strong><i class="fa fa-database"></i> Show Product</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <th>Course Name</th>
                                        <td><?= $product['c_name'] ?></td>
                                        <th>Instructor</th>
                                        <td><?= $product['instructor'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Price</th>
                                        <td>$<?= number_format($product['price'], 2) ?></td>
                                        <th>Discount % </th>
                                        <td><?= $product['discount'] ?> % </td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td colspan="3"><?= $product['course_desc'] ?></td>
                                    </tr>

                                </table>
                            </div>
                            <div class="col-3">
                                <img src="<?= $product['course_img'] ?>" class="img-fluid img-thumbnail" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Show a product -->
                <br>
    </div><!-- /.container -->
</body>


</html>