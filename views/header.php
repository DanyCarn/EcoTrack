<?php 
 session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>

    <!--
    Auteur      : Dany Carneiro Jeremias
    Date        : 12.05.2025
    Descritpion : Header pour toutes les pages
    -->
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>EcoTrack</title>
</head>
<body>
<div class="w-screen border border-solid border-t-transparent border-l-transparent border-r-transparent grid grid-cols-3 p-5">
    <div class="col-1 justify-items-start md:justify-items-center">
        <?php if (isset($_SESSION['userConnected']) && $_SESSION['userConnected']) : ?>
            <a href="/dashboard" class="text-3xl md:text-5xl font-semibold">EcoTrack</a>
        <?php else :?>
            <a href="/home" class="text-3xl md:text-5xl font-semibold">EcoTrack</a>
        <?php endif;?>
    </div>
    <div class=" hidden md:flex md:justify-center">
        <h1 class="text-4xl"><?php echo TITLE ?></h1>
    </div>
    <div class="col-3 flex justify-end items-center">
        <?php if (isset($_SESSION['userConnected']) && $_SESSION['userConnected']) :?>
            <a href="/disconnect" class="text-xl border rounded-xl p-1 bg-[#69A33D] hover:bg-[#587D3C] mr-3">Déconnexion</a>
        <?php else :?>
            <a href="/addUserForm" class="hidden md:inline text-xl border rounded-xl p-1 bg-[#69A33D] hover:bg-[#587D3C] mr-3">Créer un compte</a>
            <a href="/connectForm" class="hidden md:inline text-xl border rounded-xl p-1 bg-[#69A33D] hover:bg-[#587D3C]">Connexion</a>
        <?php endif;?>
    </div>
</div>
<div>