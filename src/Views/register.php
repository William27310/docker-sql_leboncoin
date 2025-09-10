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

    <nav class="navigateur_un d-flex align-items-center justify-content-between p-2">
        <p class="fw-bold fs-2 m-0">
            <a href="index.php?url=home" class="text-decoration-none text-white Titre">Le Bon Coin</a>
        </p>

        <div class="d-flex gap-2">
            <button type="button" class="btn btn-warning"><a href="index.php?url=annonce" class="text-decoration-none text-white">Déposer une annonce</a></button>
            <a href="index.php?url=profil" type="button" class="text-decoration-none text-white btn btn-warning d-flex flex-column align-items-center">
                <span class="material-symbols-outlined">person</span>
                <small>Profil</small>
            </a>
        </div>
    </nav>

    <nav class="bg-warning p-2">
        <div class="d-flex justify-content-around">
            <button type="button" class="btn bouton"><a class="text-decoration-none text-white" href="index.php?url=register">S'inscrire</a></button>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" aria-label="Search" />
                <button class="btn bouton text-white" type="submit">Rechercher</button>
            </form>
            <button type="button" class="btn bouton"><a class="text-decoration-none text-white" href="index.php?url=login">Se connecter</a></button>
        </div>
    </nav>

    <main>
        <div class="container mt-5 bg-dark-subtle p-5 rounded">
            <form class="row g-3" action="index.php?url=register" method="post" novalidate>
                <h1>Création de compte</h1>

                <!-- nom d'utilisateur -->
                <div class="col-6">
                    <p class="fst-italic text-secondary">*Obligatoire</p>
                    <div class="d-flex justify-content-between">
                        <label for="inputAddress" class="form-label">Nom d'utilisateur</label>
                        <span class="text-danger"><?= $errors['pseudo'] ?? "" ?></span>
                    </div>
                    <input type="text" class="form-control" id="inputAddress" name="pseudo" value="<?= $_POST['pseudo'] ?? "" ?>">
                </div>

                <!-- email -->
                <div class="col-md-6">
                    <p class="fst-italic text-secondary">*Obligatoire</p>
                    <div class="d-flex justify-content-between">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <span class="text-danger"><?= $errors['email'] ?? "" ?></span>
                    </div>
                    <input type="email" class="form-control" id="inputEmail4" name="email" value="<?= $_POST['email'] ?? "" ?>">
                </div>

                <!-- mot de passe -->
                <div class="col-md-6">
                    <p class="fst-italic text-secondary">*Obligatoire</p>
                    <div class="d-flex justify-content-between">
                        <label for="inputPassword4" class="form-label">Mot de passe</label>
                        <span class="text-danger"><?= $errors['motdepasse'] ?? "" ?></span>
                    </div>
                    <input type="password" class="form-control" id="inputPassword4" name="motdepasse" value="<?= $_POST['motdepasse'] ?? "" ?>">
                </div>

                <!-- mot de passe (2) -->
                <div class="col-md-6">
                    <p class="fst-italic text-secondary">*Obligatoire</p>
                    <div class="d-flex justify-content-between">
                        <label for="inputPassword4" class="form-label">Confirmation du Mot de passe</label>
                        <span class="text-danger"><?= $errors['motdepasse(2)'] ?? "" ?></span>
                    </div>
                    <input type="password" class="form-control" id="inputPassword4" name="motdepasse(2)" value="<?= $_POST['motdepasse(2)'] ?? "" ?>">
                </div>

                <!-- Conditions d'utilisations -->
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck" name="cgu" value="<?= $_POST['cgu'] ?? "" ?>">
                        <label class="form-check-label" for="gridCheck">
                            Accepter les conditions d'utilisations !
                        </label>
                        <div>
                            <p class="fst-italic text-secondary">*Obligatoire</p>

                            <span class="text-danger"><?= $errors['cgu'] ?? "" ?></span>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn border border-dark">S'inscrire</button>
                </div>
            </form>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>

<!-- <div class="d-flex justify-content-between">
                    <div class="col-3">
                        <label for="inputAddress2" class="form-label">Date de naissance</label>
                        <select id="inputAddress2" class="form-select">
                            <option selected>Jour</option>
                            <option>01</option>
                            <option>02</option>
                            <option>03</option>
                            <option>04</option>
                            <option>05</option>
                            <option>06</option>
                            <option>07</option>
                            <option>08</option>
                            <option>09</option>
                            <option>10</option>
                            <option>11</option>
                            <option>12</option>
                            <option>13</option>
                            <option>14</option>
                            <option>15</option>
                            <option>16</option>
                            <option>17</option>
                            <option>18</option>
                            <option>19</option>
                            <option>20</option>
                            <option>21</option>
                            <option>22</option>
                            <option>23</option>
                            <option>24</option>
                            <option>25</option>
                            <option>26</option>
                            <option>27</option>
                            <option>28</option>
                            <option>29</option>
                            <option>30</option>
                            <option>31</option>
                        </select>
                    </div>
                    <div class="col-3 mt-2">
                        <label for="inputAddress2" class="form-label"></label>
                        <select id="inputAddress2" class="form-select">
                            <option selected>Mois</option>
                            <option>Janvier</option>
                            <option>Février</option>
                            <option>Janvier</option>
                            <option>Janvier</option>
                            <option>Janvier</option>
                            <option>Janvier</option>
                            <option>Janvier</option>
                            <option>Janvier</option>
                            <option>Janvier</option>
                            <option>Janvier</option>
                            <option>Janvier</option>
                            <option>Janvier</option>
                            <option>Janvier</option>
                            <option>Janvier</option>

                        </select>
                    </div>
                    <div class="col-3 mt-2">
                        <label for="inputAddress2" class="form-label"></label>
                        <select id="inputAddress2" class="form-select">
                            <option selected>Année</option>
                            <option>...</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">Ville</label>
                    <input type="text" class="form-control" id="inputCity">
                </div>
                <div class="col-md-6">
                    <label for="inputState" class="form-label">Région</label>
                    <select id="inputState" class="form-select">
                        <option selected>Choisissez...</option>
                        <option>...</option>
                    </select>
                </div> -->