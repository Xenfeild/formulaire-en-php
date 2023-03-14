<!-- header -->

<?php 
$title_page = "Validation d'un formulaire avec POST";
include('partials/_header.php');

// validation formulaire
// étape 1 création de mes variables
$error = [];
$errMsgRequire = "<span class='text-red-500'>Ce champ est obligatoire</span>";
$success = false;

// 2-Verification si le formulaire est soumis
if(!empty($_POST['submited'])){
    // 2- faille xss
    $nom = trim(htmlspecialchars($_POST['nom']));
    $age = trim(htmlspecialchars($_POST['age']));
    $message = trim(htmlspecialchars($_POST['message']));

    // 3- validation de chaque input
    // nom
    if (!empty($nom)) {
        if(strlen($nom) <= 2) {
            $error['nom'] = "<span class='text-red-500'>3 caractères minimum</span>";
        } elseif (strlen($nom)>20){
            $error['nom'] = "<span class='text-red-500'>20 caractères maximum</span>";
        }

    } else {
        $error ['nom'] = $errMsgRequire;
    }

    // age
    // verifie que user à bien remplie le champs
    if (!empty($age)){
        // vérifie que l'age est un nombre entier
        if(!is_numeric($age)){
            $error['age'] = "<span class='text-red-500'>Merci de mettre un age correct</span>";
            // vérifie qu'il est bien majeur
        } elseif(is_float($age)) {
         $error['age'] = "<span class='text-red-500'>Sans virgules banane</span>";

        }
         elseif ($age < 18) {
         $error['age'] = "<span class='text-red-500'>C'est pas pour les minots</span>";

        }

    } else {
        $error['age'] = $errMsgRequire;

    }  

    if(!empty($message)){
        if(strlen($message) <= 20) {
            $error['message'] = "<span class='text-red-500'>20 caractères minimum</span>";
        } elseif (strlen($message)>300){
            $error['message'] = "<span class='text-red-500'>300 caractères maximum</span>";
        }

    } else {
        $error ['message'] = $errMsgRequire;
    }
    // 5 - Pas d'erreur => enregistrement en base de donnée
    if(count($error)== 0){
        $success = true;
        // enregistrement BDD
    }
}
?>

<!-- body -->
<main class="pt-20">
<!-- input name -->
<form method="POST">
    <div class="form-control w-full max-w-xs">
    <label class="label" for="nom">
        <span class="label-text">What is your name?</span>
    </label>
  <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" name="nom" id="nom" />
  <p>
    <?php
    if(isset($error['nom'])) {
        echo $error['nom']; 
    }
 
    ?>
  </p>

    </div>
    <!-- input age -->
    <div class="form-control w-full max-w-xs">
        <label class="label" for="age">
            <span class="label-text">Age</span>
        </label>
    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" name="age" id="age" /> 
      <p>
    <?php
    if(isset($error['age'])) {
        echo $error['age']; 
    }
 
    ?>
  </p>  
 </div>
    <!-- input message -->
    <div class="form-control w-full max-w-xs">
        <label class="label" for="message">
            <span class="label-text">Message</span>
        </label>
        <textarea class="textarea textarea-bordered" placeholder="Bio" id="message" name="message"></textarea>
            <?php
    if(isset($error['message'])) {
        echo $error['message']; 
    }
 
    ?>
    </div>

<!-- input/ btn submit -->
    <input class="btn btn-active btn-primary mt-6" type="submit" name="submited" value="Envoyer"/>
</form>

    
    </main>


<!-- footer -->

<?php 
include('partials/_footer.php');

?>