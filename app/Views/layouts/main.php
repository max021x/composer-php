<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="/style.css">
</head>

<body>
    <div class="container">
        <header>
            <h1>My Blog</h1>
        </header>

        <nav>
            <li><a href="/">Home</a></li>
            <li><a href="/contact">Contact Form</a></li>
            <li><a href="/guestbook">Guestbook</a></li>
        </nav>
        
    </div>

    <main>
        <?= $content ?>
    </main>

    <footer>
        <p>&copy; <?= date('Y') ?> MyBlog</p>
    </footer>
</body>

</html>