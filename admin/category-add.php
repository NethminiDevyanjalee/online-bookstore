<?php
require "db.php";
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    if (empty($name)) {
        $error = "Please enter a valid name";
    } elseif (empty($desc)) {
        $error = "Please enter  a valid description";
    } else {

        $sql = "INSERT INTO book_category(name,description) VALUES ('{$name}','{$desc}')";
        $res = $conn->query($sql);
        if ($res) {
            echo "Success";
        } else {
            echo "Database Error";
        }

    }
}
?>
<?php require_once('header.php'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Add Category</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Category</li>
            <li class="breadcrumb-item active">Add Category</li>
        </ol>
        <form action="" method="post">
            <?php if (isset($error)): ?>
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                         class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16"
                         role="img" aria-label="Warning:">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                    <div>
                        <?= $error ?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-6">
                    <label for="" class="form-label">Name:</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="col-6">
                    <label for="" class="form-label">Description:</label>
                    <input type="text" class="form-control" name="desc">
                </div>
            </div>
            <br>
            <button class="btn btn-success float-end" type="submit" name="submit">Save</button>
        </form>


    </div>
</main>
<?php require_once('footer.php'); ?>
