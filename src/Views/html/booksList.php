<!DOCTYPE html>
<html lang="fr">

<head>
    <?php
    require_once __DIR__ . "/../template/head.php";
    ?>
</head>

<body class="min-vh-100">

    <?php require_once __DIR__ . "/../template/header.php"; ?>

    <main>
        <h2>Liste des Livres</h2>
        <section>
            <nav class="d-flex align-content-around justify-content-around">
                <?php
                if (is_null($page)) {
                    $page = 1;
                }
                if ($page > 1) { ?>
                    <a class="btn btn-secondary" href="/livres?page=<?php echo $page - 1; ?>">Precedent</a>

                <?php
                }
                if (!is_null($page)) {
                ?>
                    <a class="btn btn-secondary" href="/livres?page=<?php echo $page + 1; ?>">Suivant</a>
                <?php } ?>
            </nav>
            <table class="table">
                <caption hidden>Liste des Livres</caption>
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ISBN</th>
                        <th scope="col">Titre</th>
                        <th scope="col">Auteur</th>
                        <th scope="col">Type</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($books as $book) { ?>
                        <tr class="position-relative">
                            <td>
                                <a href="/livre/<?php echo $book->getId(); ?>" class="stretched-link">
                                    <?php echo $book->getId(); ?>
                                </a>
                            </td>
                            <td>
                                <?php echo $book->getTitle(); ?>
                            </td>
                            <td>
                                <?php echo $book->getAuthor(); ?>
                            </td>
                            <td>
                                <?php echo $book->getType(); ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>

            </table>
            <div class="d-flex align-content-around justify-content-around">
                <a class="btn btn-secondary w-50" href="/livre/create">Ajouter un Livre</a>
            </div>
        </section>

    </main>
    <?php require_once __DIR__ . "/../template/footer.php"; ?>

</body>

</html>