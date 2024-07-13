<?php
// require './base.php';
require "entete.php";

?>
<div>
    <!-- la vue pour la modification de user -->
    <div class="my-5 p-10">
        <div class="flex justify-between items-center mx-auto">
            <div class="flex justify-between w-full">
                <h1 class="text-primary font-bold text-xl">Modifier l'utilisateur</h1>
                <button>
                    <a href="/archi/site/user/<?= $user->getId() ?>/show" class="btn btn-primary bg-slate-200 hover:slate-300 text-primary py-1 px-3 rounded my-3 hover:shadow">Retour</a>
                    <!-- <a href="/archi/user"></a> -->
                </button>
            </div>
        </div>
        <div class="border border-gray-200 shadow-xl mt-2">
            <form action="/archi/site/user/<?= $user->getId() ?>/update" method="POST" class="max-w-4xl mx-auto">
                <div class="flex flex-wrap justify-around w-full mb-10">
                    <div class="flex w-96 flex-col">
                        <label for="nom" class="text-primary font-bold">Nom</label>
                        <input type="text" name="nom" id="nom" class="border border-gray-200 rounded p-2" value="<?= $user->getNom() ?>">
                    </div>
                    <div class="flex w-96 flex-col">
                        <label for="prenom" class="text-primary font-bold">Prenom</label>
                        <input type="text" name="prenom" id="prenom" class="border border-gray-200 rounded p-2" value="<?= $user->getPrenom() ?>">
                    </div>
                </div>
                <div class="flex flex-wrap justify-around w-full mb-10">
                    <div class="flex w-96 flex-col">
                        <label for="email" class="text-primary font-bold">Email</label>
                        <input type="email" name="email" id="email" class="border border-gray-200 rounded p-2" value="<?= $user->getEmail() ?>">
                    </div>
                    <div class="flex w-96 flex-col">
                        <label for="role" class="text-primary font-bold">Role</label>
                        <select name="role" id="role" class="border border-gray-200 rounded p-2">
                            <option value="admin" <?= $user->getRole() == 'admin' ? 'selected' : '' ?>>Admin</option>
                            <option value="editeur" <?= $user->getRole() == 'editeur' ? 'selected' : '' ?>>Editeur</option>
                        </select>
                    </div>
                </div>
                <div class="flex justify-end mt-5">
                    <button type="submit" class="btn btn-primary bg-slate-200 hover:slate-300 text-primary py-1 px-5 rounded my-3 hover:shadow-xl">Modifier</button>
                </div>
            </form>
        </div>
    </div>

</div>

<?php
require "footer.php";