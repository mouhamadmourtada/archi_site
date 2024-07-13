<?php
// require './base.php';
require "entete.php";

?>


<!-- refais le truc et fait un effort sur la vue, tu peux utiliser tailwind -->

<!-- met moi le formulaire, un article c'est titre, contenu et category, il faut faire un select sur le category -->

<div class="my-5 p-10">
    <div class="flex justify-between items-center mx-auto">
        <div>
            <h1 class="text-primary font-bold text-xl">Ajouter un article</h1>
        </div>
    </div>
    <div class="border border-gray-200 shadow-xl mt-2">
        <form action="/archi/site/article/store" method="POST" class="max-w-4xl mx-auto">
            <div class="flex flex-wrap justify-around w-full mb-10">
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
            
            <div class="flex justify-end mt-5">
                <button type="submit" class="btn btn-primary bg-slate-200 hover:slate-300 text-primary py-1 px-5 rounded my-3 hover:shadow-xl">Ajouter</button>
            </div>
        </form>

    </div>
</div>

<?php
require "footer.php";