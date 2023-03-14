

<!-- header -->

<?php 
$title_page = "Redirection avec GET";
include('partials/_header.php');
?>

<!-- body -->
<main class="pt-20 pb-12">
    <h2 class="text-2xl pb-10 font-semibold text-indigo-500">Message du formulaire</h2>
    <?php
    // stock les datas input dans variable
    // je vérifie que les inputs de mes variables existent
    if(isset($_GET['nom']) && isset($_GET['age']) && isset($_GET['message'])) {
      $nom = $_GET['nom'];
      $age = $_GET['age'];
      $message = $_GET['message'];
    }
    // 1 - verifier si les input sont remplis
    if (empty($nom) || empty($age) || empty($message)) {
        echo "<p>Remplissez les champs du formulaire !!</p>";
    } else {?>
    <p>Nom : <?= trim(htmlspecialchars($nom))?></p>
    <p>Age : <?= trim(htmlspecialchars($age)) ?></p>
    <p>Message : <?= trim(htmlspecialchars($message)) ?></p>
  <?php } ?>



 
</main>


<!-- footer -->

<?php 
include('partials/_footer.php');

?>