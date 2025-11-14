<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css">
</head>

<body>
    <div class="container">
        <header>
            <nav>
                <li><a href="/">Home</a></li>
                <li><a href="/posts">Posts</a></li>
                <?php if ($user) : ?>
                    <a href="/logout">Logout (<?=$user->email ?>)</a>
                <?php endif ?>
            </nav>
        </header>


    </div>

    <main>
        <?= $content ?>
    </main>

    <footer>
        <p>&copy; <?= date('Y') ?> MyBlog</p>
    </footer>
</body>

</html>