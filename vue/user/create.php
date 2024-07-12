<?php
// require './base.php';
require "entete.php";

?>


<!-- refais le truc et fait un effort sur la vue, tu peux utiliser tailwind -->

<!-- met moi le formulaire, un article c'est titre, contenu et category, il faut faire un select sur le category -->

<div class="my-5 p-10">
    <div class="flex justify-between items-center mx-auto">
        <div>
            <h1 class="text-primary font-bold text-xl">Ajouter un utilisateur</h1>
        </div>
    </div>
    <div class="border border-gray-200 shadow-xl mt-2">
        <form action="/archi/user/store" method="POST" class="max-w-4xl mx-auto">
            <!-- <div class="flex flex-wrap justify-around w-full mb-10">
                <div class="flex w-96 flex-col">
                    <label for="titre" class="text-primary font-bold">Titre</label>
                    <input type="text" name="titre" id="titre" class="border border-gray-200 rounded p-2">
                </div>
                <div class="flex w-96 flex-col">
                    <label for="categorie" class="text-primary font-bold">Categorie</label>
                    <select name="categorie" id="categorie" class="border border-gray-200 rounded p-2">
                        <?php foreach($categories as $categorie): ?>
                            <option value="<?=$categorie->getId()?>"><?=$categorie->getLibelle()?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="flex flex-col">
                <label for="contenu" class="text-primary font-bold">Contenu</label>
                <textarea rows="10" name="contenu" id="contenu" class="border border-gray-200 rounded p-2"></textarea>
            </div>
             -->

            <!-- met la vue pour créer un utilisateur , un utilisateur a un nom, prenom, email, mot de passe et une role qui est un select, soit admin, soit editeur-->
             <!-- <div class="flex flex -->
            <div class="flex flex-wrap justify-around w-full mb-10">
                <div class="flex w-96 flex-col">
                    <label for="nom" class="text-primary font-bold">Nom</label>
                    <input type="text" name="nom" id="nom" class="border border-gray-200 rounded p-2">
                </div>
                <div class="flex w-96 flex-col">
                    <label for="prenom" class="text-primary font-bold">Prenom</label>
                    <input type="text" name="prenom" id="prenom" class="border border-gray-200 rounded p-2">
                </div>
            </div>
            <div class="flex flex-wrap justify-around w-full mb-10">
                <div class="flex w-96 flex-col">
                    <label for="email" class="text-primary font-bold">Email</label>
                    <input type="email" name="email" id="email" class="border border-gray-200 rounded p-2">
                </div>
                <div class="flex w-96 flex-col">
                    <label for="password" class="text-primary font-bold">Mot de passe</label>
                    <input type="password" name="password" id="password" class="border border-gray-200 rounded p-2">
                </div>
            </div>

            <div class="flex w-96 flex-col">
                <label for="role" class="text-primary font-bold">Role</label>
                <select name="role" id="role" class="border border-gray-200 rounded p-2">
                    <option value="admin">Admin</option>
                    <option value="editeur">Editeur</option>
                </select>
            </div>
            
             <div class="flex justify-end mt-5">
                <button type="submit" class="btn btn-primary bg-slate-200 hover:slate-300 text-primary py-1 px-5 rounded my-3 hover:shadow-xl">Ajouter</button>
            </div>
        </form>

    </div>
</div>

<?php
require "footer.php";