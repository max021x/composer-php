<div>
    <h2>All Posts</h2>

    <form action="" method="GET">
        <input type="text" name="search" value="<?= htmlspecialchars($search) ?>" placeholder="Search posts/... ">
        <button>Search</button>
    </form>
    <?=partial('_posts.php' , ['posts' => $posts]) ?>
    <?=partial('_pagination.php' , ['currentPage' => $currentPage , 'totalPages' => $totalPages]) ?>
</div>