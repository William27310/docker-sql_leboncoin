<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=person" />
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <?php require_once __DIR__ . "/../Views/templates/navbar.php" ?>

    <main>
        <div class="container w-25 mt-5 bg-dark-subtle p-5 rounded">
            <form class="row g-3" action="index.php?url=create" method="post" enctype="multipart/form-data">
                <h1>Création d'annonce</h1>

                <!-- Titre -->
                <div class="col-12">
                    <p class="fst-italic text-secondary">*Obligatoire</p>
                    <div class="d-flex justify-content-between">
                        <label for="inputTitle" class="form-label">Titre</label>
                        <span class="text-danger"><?= $errors['titre'] ?? "" ?></span>
                    </div>
                    <input type="text" class="form-control" id="inputTitle" name="titre" value="<?= $_POST['titre'] ?? "" ?>">
                </div>

                <!-- Description -->
                <div class="col-md-12">
                    <p class="fst-italic text-secondary">*Obligatoire</p>
                    <div class="d-flex justify-content-between">
                        <label for="inputDescription" class="form-label">Description</label>
                        <span class="text-danger"><?= $errors['description'] ?? "" ?></span>
                    </div>
                    <textarea class="form-control" id="inputDescription" name="description" style="height: 100px"><?= $_POST['description'] ?? "" ?></textarea>
                </div>


                <!-- Image -->
                <div class="col-md-12">
                    <p class="fst-italic text-secondary">*Obligatoire</p>
                    <div class="d-flex justify-content-between">
                        <label for="image" class="form-label">Image</label>
                        <span class="text-danger"><?= $errors['photo'] ?? "" ?></span>
                    </div>
                    <input type="file" class="form-control" id="image" name="photo">
                </div>

                <!-- Prix -->
                <div class="col-md-6">
                    <p class="fst-italic text-secondary">*Obligatoire</p>
                    <div class="d-flex justify-content-between">
                        <label for="inputPrice" class="form-label">Prix</label>
                        <span class="text-danger"><?= $errors['prix'] ?? "" ?></span>
                    </div>
                    <input type="text" class="form-control" id="inputPrice" name="prix" value="<?= $_POST['prix'] ?? "" ?>">
                </div>

                <!-- ID -->
                <!-- <div class="col-md-6">
                    <p class="fst-italic text-secondary">*Obligatoire</p>
                    <div class="d-flex justify-content-between">
                        <label for="inputID" class="form-label">Votre ID</label>
                        <span class="text-danger"><?= $errors['id'] ?? "" ?></span>
                    </div>
                    <input type="text" class="form-control" id="inputID" name="id" value="<?= $_POST['id'] ?? "" ?>">
                </div> -->

                <div class="col-12">
                    <button type="submit" class="btn border border-dark">Créer l'annonce</button>
                </div>
            </form>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>