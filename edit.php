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
    //  $id = $_GET['id'];
    $id = $_GET['id'] ? intval($_GET['id']) : 0;

    try {
        // $get_course = $con->prepare("select * from courses where cat_id=$id LIMIT 1 ");
        // $get_course->setFetchMode(PDO::FETCH_ASSOC);
        // $get_course->execute();
        // while ($row = $get_course->fetch()) :

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
    // $product = $get_course->fetch();

    ?>
    <div class="container">
        <a href="dashboard.php" class="btn btn-light mb-2 mt-2">
            << Go Back</a>
                <?php if (isset($_GET['status']) && $_GET['status'] == "updated") : ?>
                    <div class="alert alert-success" role="alert">
                        <strong>Updated</strong>
                    </div>
                <?php endif ?>
                <?php if (isset($_GET['status']) && $_GET['status'] == "fail_update") : ?>
                    <div class="alert alert-danger" role="alert">
                        <strong>Fail Update</strong>
                    </div>
                <?php endif ?>
                <!-- Create Form -->
                <div class="card border-danger">
                    <div class="card-header bg-danger text-white">
                        <strong><i class="fa fa-edit"></i> Edit Courses</strong>
                    </div>
                    <div class="card-body">
                        <form action="update.php" method="post">
                            <input type="hidden" name="c_id" value="<?= $product['c_id'] ?>">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="barcode" class="col-form-label">Course Name</label>
                                    <input type="text" class="form-control" id="barcode" name="course_name" placeholder="Barcode" required value="<?= $product['c_name'] ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name" class="col-form-label">Instructor Name</label>
                                    <input type="text" class="form-control" id="name" name="instructor" placeholder="Name" required value="<?= $product['instructor'] ?>">
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="price" class="col-form-label">Price</label>
                                    <input type="number" class="form-control" id="price" name="price" placeholder="Price" required value="<?= $product['price'] ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="price" class="col-form-label">Discount % </label>
                                    <input type="number" class="form-control" id="price" name="discount" placeholder="Discount" required value="<?= $product['discount'] ?>">
                                </div>
                                <!-- <div class="form-group col-md-4">
                            <label for="qty" class="col-form-label">Discount % </label>
                            <input type="number" class="form-control" name="discount" id="discount" placeholder="Discount" required value="<?= $product['discount'] ?>">
                        </div> -->
                                <div class="form-group col-md-4">
                                    <label for="image" class="col-form-label">Course Title</label>
                                    <input type="text" class="form-control" name="title" id="image" placeholder="Course Title" value="<?= $product['course_title'] ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="image" class="col-form-label">Course Image</label>
                                    <input type="text" class="form-control" name="image" id="image" placeholder="Course image" value="<?= $product['course_img'] ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="image" class="col-form-label">Course Video</label>
                                    <input type="text" class="form-control" name="video" id="video" placeholder="Intro Video" value="<?= $product['video'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="note" class="col-form-label">Course Description</label>
                                <textarea name="description" id="" rows="5" class="form-control" placeholder="Description"><?= $product['course_desc'] ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Save</button>
                        </form>
                    </div>
                </div>
                <!-- End create form -->
                <br>
    </div><!-- /.container -->
</body>

</html>