<div class="mt-5">
    <nav >       
        <div class="text-primary " id="navbarNav">
            <ul class="flex justify-around w-content border-gray-200">
                <li class="" id="all"> 
                   
                    <a class="text-primary font-bold bg-slate-200 hover:bg-slate-300 hover:shadow px-3 py-1 text-md rounded" href="/archi/article">Accueil</a>
                </li>
                
                <?php foreach($categories as $categorie): ?>
                
                    <li class="" id =<?=$categorie->getId()?>>
                        <a class="text-primary font-bold bg-slate-200 hover:bg-slate-300 hover:shadow px-3 py-1 text-md rounded " 
                        href = "/archi/article/articleCategorie/<?=$categorie->getId()?>"                        
                        ><?=$categorie->getLibelle()?></a>
                    </li>
                
                <?php endforeach; ?>
            </ul>
        </div>
    </nav>
</div>