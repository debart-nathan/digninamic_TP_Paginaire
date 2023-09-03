<!DOCTYPE html>
<html>
<?php include __DIR__ . "/../template/head.php"; ?>

<body>
    <?php include __DIR__ . "/../template/header.php"; ?>

    <main class="container">

        <div class="d-flex align-content-around justify-content-around">
            <a class="btn btn-secondary w-50" href="/livre/<?php echo $book->getId(); ?>/edit">Modifié ce Livre</a>
            <a class="btn btn-secondary w-50" href="/livre/<?php echo $book->getId(); ?>/delete">Supprimer ce Livre</a>
        </div>
        <div class="card">
            <img class="card-img-top" src="/image/<?php echo $book->getImage(); ?>" alt="Book image">
            <div class="card-body">
                <h2 class="card-title"><?php echo $book->getTitle(); ?></h2>
                <p class="card-text"><?php echo $book->getDescription(); ?></p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <h3>ICBN:</h3> <?php echo $book->getId(); ?>
                </li>
                <li class="list-group-item">
                    <h3>Author:</h3> <?php echo $book->getAuthor(); ?>
                </li>
                <li class="list-group-item">
                    <h3>Type:</h3> <?php echo $book->getType(); ?>
                </li>
            </ul>
        </div>
    </main>

    <?php include __DIR__ . "/../template/footer.php"; ?>
</body>

</html>