<?php

require 'vue/layout/head.php';

?>
<header>
    <div class="min-h-20 bg-slate-200" >
        <div class="flex justify-end">
            <div class="flex justify-between items-center w-4/5 mx-auto">
                <div class="text-primary font-bold text-2xl">Mon blog</div>
                <div class="flex gap-2 items-center">
                    <div class="btn btn-primary bg-slate-400 hover:slate-500 text-primary py-1 px-3 rounded my-3 hover:shadow">
                        <a href="/archi/article/create" >Ajouter un article</a>
                    </div>
                    <div class="btn btn-primary bg-slate-400 hover:slate-500 text-primary py-1 px-3 rounded my-3 hover:shadow">
                        <a href="/archi/categorie" >lister les catégories</a>
                    </div>

                    <div class="btn btn-primary bg-slate-400 hover:slate-500 text-primary py-1 px-3 rounded my-3 hover:shadow">
                        <a href="/archi/auth/logout" >Déconnexion</a>
                    </div>

                </div>
            </div>
            <!-- bouton de deconnexion -->
            
            

        </div>
    </div>
</header>
<main class="mx-5">
    <div>
        <!-- il faut mettre l'affichage des flash, il en exsite 3 types success, warning et danger il sont dans les cookie avec flashes -->
        
        <?php if(isset($_COOKIE['flash'])): ?>
              
            <div class="my-5 flex justify-center">
                <div class=" py-2 w-full max-w-2xl rounded text-center alert alert-<?=$_COOKIE['flash']['type']?>"><?=$_COOKIE['flash']['message']?></div>
            </div>
        <?php endif; ?>
    </div>

