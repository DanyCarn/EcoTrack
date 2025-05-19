<?php
/**
 * ETML
 * Auteur: Dany Carneiro Jeremias
 * Date: 13.05.2025
 * Description: Formulaire de création d'utilisateur
 */

?>
<div class="flex flex-col items-center">
    <form action="/addUser" method="POST" class="flex flex-col items-center">
        
        <div class="mt-5">
            <label for="username" class="text-xl align-self-center">Nom d'utilisateur</label><br>
            <input type="text" name="username" required class="border-1 rounded-lg w-60">
        </div>

        <div class="mt-5">
            <label for="password" class="text-xl">Mot de passe</label><br>
            <input type="password" name="password" required class="border-1 rounded-lg w-60">
        </div>

        <div class="mt-5">
            <label for="password_confirm" class="text-xl">Confirmer mot de passe</label><br>
            <input type="password" name="password_confirm" required class="border-1 rounded-lg w-60">
        </div>

        <input type="submit" value="Créer un compte" class="border-1 rounded-lg m-6 w-40 p-2 bg-[#69A33D] hover:bg-[#587D3C] hover:cursor-pointer text-xl">
    </form>

    <?php if ($_GET['route'] == 'addUserPasswordError') :?>
        <p class="text-red-500 text-lg">Les deux mots de passe ne correspondent pas.</p>
    <?php elseif ($_GET['route'] == 'addUserError') :?>
        <p class="text-red-500 text-lg">Une erreur est survenue. Veuillez réessayer.</p>
        <p class="text-red-500 text-lg">(Aide: le nom d'utilisateur doit faire moins de 255 caractères.)</p>
    <?php elseif ($_GET['route'] == 'addUserExists') :?>
        <p class="text-red-500 text-lg">Ce nom d'utilisateur existe déjà</p>
    <?php endif;?>

    <p class="mt-30 text-lg">Vous avez déjà un compte ?</p>
    <a href="/connectForm" class="text-lg border-1 rounded-lg mt-4 p-1 bg-[#69A33D] hover:bg-[#587D3C]">Connexion</a>

</div>
