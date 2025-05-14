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
    <div class="col-1 justify-items-start">
        <a href="/home" class="text-5xl font-semibold">EcoTrack</a>
    </div>
    <div class="flex justify-center">
        <h1 class="text-4xl"><?php echo TITLE ?></h1>
    </div>
    <div class="hidden md:flex col-start-3 justify-end content-center">
        <a href="/addUserForm" class="text-xl border rounded-xl p-1 bg-[#69A33D] hover:bg-[#587D3C] mr-3">Créer un compte</a>
        <a href="" class="text-xl border rounded-xl p-1 bg-[#69A33D] hover:bg-[#587D3C]">Se connecter</a>
    </div>
</div>
<div>