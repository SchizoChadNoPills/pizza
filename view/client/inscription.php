<div class="container">
    <div class="row mb-3">
        <h1>Inscription</h1>
    </div>
    <div class="row mb-3">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="<?= FORM_URL; ?>inscription">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="mail">E-mail</label>
                            <input id="mail" name="mail" type="mail" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="password">Mot de passe</label>
                            <input id="password" name="password" type="password" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            <label for="nom">Nom</label>
                            <input id="nom" name="nom" type="text" class="form-control" required>
                        </div>
                        <div class="col-4">
                            <label for="prenom">Prénom</label>
                            <input id="prenom" name="prenom" type="text" class="form-control" required>
                        </div>
                        <div class="col-4">
                            <label for="tel">Téléphone</label>
                            <input id="tel" name="tel" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="adresse">Adresse</label>
                            <input id="adresse" name="adresse" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="cp">Code postal</label>
                            <input id="cp" name="cp" type="text" class="form-control" required>
                        </div>
                        <div class="col-6">
                            <label for="ville">Ville</label>
                            <input id="ville" name="ville" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="d-grip gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-primary" type="submit">S'inscrire</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>