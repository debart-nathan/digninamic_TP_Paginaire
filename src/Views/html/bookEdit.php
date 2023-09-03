<!DOCTYPE html>
<html lang="en">

<?php include __DIR__ . "/../template/head.php" ?>

<body>
    <?php include __DIR__ . "/../template/header.php" ?>
    <main>


        <form method="POST" action="" class="needs-validation" novalidate>
            <div class="form-group">
                <label for="icbn">ICBN :</label>
                <input type="text" class="form-control" id="icbn" name="icbn"
                    value="<?php echo isset($book) ? $book->getId() : ''; ?>"
                    <?php echo isset($book) ? 'readonly' : ''; ?> required>
                <div class="invalid-feedback">Veuillez fournir un ICBN.</div>
            </div>

            <div class="form-group">
                <label for="image">Image :</label>
                <input type="text" class="form-control" id="image" name="image"
                    value="<?php echo isset($book) ? $book->getImage() : ''; ?>" required>
                <div class="invalid-feedback">Veuillez fournir une image.</div>
            </div>

            <div class="form-group">
                <label for="title">Titre :</label>
                <input type="text" class="form-control" id="title" name="title"
                    value="<?php echo isset($book) ? $book->getTitle() : ''; ?>" required>
                <div class="invalid-feedback">Veuillez fournir un titre.</div>
            </div>

            <div class="form-group">
                <label for="description">Description :</label>
                <input type="text" class="form-control" id="description" name="description"
                    value="<?php echo isset($book) ? $book->getDescription() : ''; ?>" required>
                <div class="invalid-feedback">Veuillez fournir une description.</div>
            </div>



            <div class="form-group">
                <label for="author">Auteur :</label>
                <input type="text" class="form-control" id="author" name="author"
                    value="<?php echo isset($book) ? $book->getAuthor() : ''; ?>" required>
                <div class="invalid-feedback">Veuillez fournir un auteur.</div>
            </div>

            <div class="form-group">
                <label for="type">Type :</label>
                <input type="text" class="form-control" id="type" name="type"
                    value="<?php echo isset($book) ? $book->getType() : ''; ?>" required>
                <div class="invalid-feedback">Veuillez fournir un type.</div>
            </div>

            <button type="submit" class="btn btn-primary">Soumettre</button>
        </form>

    </main>
    <?php include __DIR__ . "/../template/footer.php" ?>

</body>

</html>