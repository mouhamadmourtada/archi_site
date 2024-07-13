<?php
// require './base.php';
require "entete.php";

?>
<div>
    <!-- vue pour la création d'un article, article a uniquement un libelle -->
    <div class="my-5 p-10">
        <div class="flex justify-between items-center mx-auto">
            <div>
                <h1 class="text-primary font-bold text-xl">Ajouter une catégorie</h1>
            </div>
        </div>
        <div class="border border-gray-200 shadow-xl mt-2">
            <form action="/archi/site/categorie/store" method="POST" class="max-w-4xl mx-auto">
                <div class="flex flex-wrap justify-around w-full mb-10">
                    <div class="flex w-96 flex-col">
                        <label for="libelle" class="text-primary font-bold">Libelle</label>
                        <input type="text" name="libelle" id="libelle" class="border border-gray-200 rounded p-2">
                    </div>
                </div>
                <div class="flex justify-end mt-5">
                    <button type="submit" class="btn btn-primary bg-slate-200 hover:slate-300 text-primary py-1 px-5 rounded my-3 hover:shadow-xl">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
require "footer.php";