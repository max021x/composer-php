<div>
    <h1>Welcome To My Weblog</h1>
    <h2>All Posts</h2>

    <form action="" method="GET">
        <input type="text" name="search" value="<?= htmlspecialchars($search) ?>" placeholder="Search posts/... ">
        <button>Search</button>
    </form>
    <?=partial('_posts.php' , ['posts' => $posts]) ?>
</div>