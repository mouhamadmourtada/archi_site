<?php
// require './base.php';
require "entete.php";

?>
<div>
    <!-- la vue pour detail d'un utilisateur fait un effort sur la presentation, on utlise tailwind -->
    <div class="my-5 p-10">
        <div class="flex justify-between items-center mx-auto">
            <div class="flex justify-between w-full">
                <h1 class="text-primary font-bold text-xl">Detail de l'utilisateur</h1>
                <div>
                    
                    <button>
                        <a href="/archi/site/user" class="btn btn-primary bg-slate-200 hover:slate-300 text-primary py-1 px-3 rounded my-3 hover:shadow">Retour</a>
                        <!-- <a href="/archi/site/user"></a> -->
                    </button>
                    <button>
                        <a href="/archi/site/user/<?= $user->getId() ?>/edit" class="btn btn-primary bg-slate-200 hover:slate-300 text-primary py-1 px-3 rounded my-3 hover:shadow">Modifier</a>
                        <!-- <a href="/archi/site/user"></a> -->
                    </button>
                    

                </div>
            </div>
        </div>
        <div class="border border-gray-200 shadow-xl mt-2">
            <div class="flex flex-wrap justify-around w-full mb-10">
                <div class="flex w-96 flex-col">
                    <label for="nom" class="text-primary font-bold">Nom</label>
                    <input type="text" name="nom" id="nom" class="border border-gray-200 rounded p-2" value="<?= $user->getNom() ?>" disabled>
                </div>
                <div class="flex w-96 flex-col">
                    <label for="prenom" class="text-primary font-bold">Prenom</label>
                    <input type="text" name="prenom" id="prenom" class="border border-gray-200 rounded p-2" value="<?= $user->getPrenom() ?>" disabled>
                </div>
            </div>
            <div class="flex flex-wrap justify-around w-full mb-10">
                <div class="flex w-96 flex-col">
                    <label for="email" class="text-primary font-bold">Email</label>
                    <input type="email" name="email" id="email" class="border border-gray-200 rounded p-2" value="<?= $user->getEmail() ?>" disabled>
                </div>
                <div class="flex w-96 flex-col">
                    <label for="role" class="text-primary font-bold">Role</label>
                    <input type="text" name="role" id="role" class="border border-gray-200 rounded p-2" value="<?= $user->getRole() ?>" disabled>
                </div>
            </div>
        </div>

    </div>

    <div class="border shadow p-5 mt-10 rounded">
        <div class="flex justify-between items-center">
            <h1 class="text-primary font-bold text-xl">Tokens</h1>
            <button class="btn btn-primary bg-slate-200 hover:slate-300 text-primary py-1 px-3 rounded my-3 hover:shadow">
                <a href="/archi/site/user/<?= $user->getId() ?>/generateToken" class="btn btn-primary bg-slate-200 hover:slate-300 text-primary py-1 px-3 rounded my-3 hover:shadow">
                    Générer un token
                </a>

            </button>
        </div> 


        <div class="flex flex-wrap justify-around w-full mb-10">
            <div class="flex w-96 flex-col">
                <label for="token" class="text-primary font-bold">Token</label>
                <input type="text" name="token" id="token" class="border border-gray-200 rounded p-2" value="<?= $user->getToken() ?? " pas de token" ?>" disabled>
            </div>
            <div class="flex w-96 flex-col">
                <label for="tokenRest" class="text-primary font-bold">Token Rest</label>
                <input type="text" name="tokenRest" id="tokenRest" class="border border-gray-200 rounded p-2" value="<?= $user->getTokenRest() ?? "pas de token"?>" disabled>
            </div>
        </div>
        <div class="flex flex-wrap justify-around w-full mb-10">
            <div class="flex w-96 flex-col">
                <label for="dateExpirationToken" class="text-primary font-bold">Date d'expiration du token</label>
                <input type="text" name="dateExpirationToken" id="dateExpirationToken" class="border border-gray-200 rounded p-2" value="<?= $user->getDateExpirationToken() ?? "pas de date" ?>" disabled>
            </div>

            <div class="flex w-96 flex-col">
                <label for="dateExpirationTokenRest" class="text-primary font-bold">Date d'expiration du token pour le token rest</label>
                <input type="text" name="dateExpirationTokenRest" id="dateExpirationTokenRest" class="border border-gray-200 rounded p-2" value="<?= $user->getDateExpirationTokenReste() ?? "pas de date" ?>" disabled>
            </div>
           
        </div>

        
    </div>
</div>

<?php
require "footer.php";