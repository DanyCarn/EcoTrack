<?php
/**
 * ETML
 * Auteur: Dany Carneiro Jeremias
 * Date: 14.05.2025
 * Description: Formulaire de connexion
 */

 $error = $data['error'];
?>

<div class="flex flex-col items-center">
    <form action="/connect" method="POST" class="flex flex-col items-center">
        <div class="mt-5">
            <label for="username" class="text-xl align-self-center">Nom d'utilisateur</label><br>
            <input type="text" name="username" required class="border-1 rounded-lg w-60">
        </div>

        <div class="mt-5">
            <label for="password" class="text-xl">Mot de passe</label><br>
            <input type="password" name="password" required class="border-1 rounded-lg w-60">
        </div>

        <input type="submit" value="Se connecter" class="border-1 rounded-lg m-6 w-40 p-2 bg-[#69A33D] hover:bg-[#587D3C] hover:cursor-pointer text-xl">
    </form>

    <?php if ($error == 'userError') :?>
        <p class="text-red-500 text-lg">L'utilisateur n'a pas été trouvé.</p>
    <?php elseif ($error == 'passwordError') :?>
        <p class="text-red-500 text-lg">Mot de passe incorrect.</p>
    <?php endif;?>

    <p class="mt-30 text-lg">Vous n'avez pas encore de compte ?</p>
    <a href="/addUserForm" class="text-lg border-1 rounded-lg mt-4 p-1 bg-[#69A33D] hover:bg-[#587D3C]">Créer un compte</a>

</div>