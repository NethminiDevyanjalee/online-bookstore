<?php
require "admin/core/db.php";
/* pagination */
$sql = "SELECT COUNT(id) AS count FROM book WHERE is_delete = '0' ";
$count = $conn->query($sql)->fetch_array()['count'];
$limit = 20;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$num_pages = ceil($count / $limit);
$start = ($page - 1) * $limit;

$sql = "SELECT * FROM `online-bookstore`.book
        WHERE is_delete = '0'  
        LIMIT {$start},{$limit}";
$books = $conn->query($sql);
?>

<?php require_once "header.php" ?><br><br>
<main>
    <div class="container">

        <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php while ($book = $books->fetch_array()): ?>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="item-pic item-img-hov">
                                <img src="<?= $book['img_url']?>" alt="<?= $book['slug']?>">
                                <a href="#" class="item-btn flex-c-m item-btn-font item-btn-hov item-trans">
                                    Quick View
                                </a>
                            </div>
                            <h5 class="card-title"><?= $book['name'] ?></h5>
                            <span style="display: -webkit-box;
                                -webkit-line-clamp: 4;
                                -webkit-box-orient: vertical;
                                overflow: hidden;
                                text-overflow: ellipsis;"><?= $book['description']?>
                            </span>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>             
        </div>
        <div class="card-footer">
            <nav aria-label="Page navigation example">
                <ul class="pagination float-end">
                    <li class="page-item <?php if ($page == 1) echo 'disabled'; ?>">
                        <a class="page-link" href="<?= change_url_params('page', $page - 1) ?>">
                            Previous
                        </a>
                    </li>
                    <?php for ($i = 1; $i <= $num_pages; $i++): ?>
                    <li class="page-item <?php if ($page == $i) echo 'active'; ?>">
                        <a class="page-link" href="<?= change_url_params('page', $i) ?>">
                            <?= $i ?>
                        </a>
                    </li>
                    <?php endfor; ?>
                    <li class="page-item <?php if ($page == $num_pages) echo 'disabled'; ?>">
                        <a class="page-link"href="<?= change_url_params('page', $page + 1) ?>">
                            Next
                        </a>
                    </li>
                </ul>
            </nav>
        </div>           
    </div>
</main>
<?php require_once "footer.php" ?>
