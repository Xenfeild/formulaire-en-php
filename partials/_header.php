    <?php 
    include('helpers/function.php')
    ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Dasy UI -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.3/dist/full.css" rel="stylesheet" type="text/css" />
    <!-- tailwind cdn -->
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Formulaire en php</title>
</head>
<body class="p-20">

    
<header>



    <h1 class="font-blacl text-3xl text-center font-bold"> Cours N°2 cours en PHP</h1>
    <nav class="text-center text-blue-500 pt-10 space-x-6">
        <a href="index.php">Acceuil</a>
        <a href="get.php">Get</a>
        <a href="post.php">Post</a>
        <a href="validate-form.php">Validation formulaire</a>
        <a href="index.php">Upload fichier</a>
    </nav>
    <p class="text-3xl text-center pt-16"><?= $title_page ?></p>

</header>