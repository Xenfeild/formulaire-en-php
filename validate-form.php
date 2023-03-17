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
    $email = trim(htmlspecialchars($_POST['email']));
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
    // email
    if(!empty($email)){
        if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $error['email'] = "<span class='text-red-500'>E-mail invalide</span>";
        }

    }else {
        $error['email'] = $errMsgRequire;
    }
    // age
    // verifie que user à bien remplie le champs
    if (!empty($age)){
        // vérifie que l'age est un nombre entier
        if(!is_numeric($age)){
            $error['age'] = "<span class='text-red-500'>Merci de mettre un age correct</span>";
            // vérifie qu'il est bien majeur
        }
         elseif($age < 0) {
         $error['age'] = "<span class='text-red-500'>Pas d'age négatif!</span>";
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
<?php if($success === true) {?>
    <span>Votre message à été validé</span>
    <?php } else { ?>
       

 <?php debug_array($error) ?>
<!-- input name -->
<form method="POST">
    <div class="form-control w-full max-w-xs">
    <label class="label" for="nom">
        <span class="label-text">What is your name?</span>
    </label>
  <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" name="nom" id="nom" value="<?php 
 showInputValue('nom')?>"  />
  <p><?php errorMsg('nom') ?></p>

    </div>
     <!-- e-mail -->
     <div class="form-control w-full max-w-xs">
    <label class="label" for="nom">
        <span class="label-email">Your e-mail?</span>
    </label>
  <input type="email" placeholder="exemple@gmail.com" class="input input-bordered w-full max-w-xs" name="email" id="email" value="<?php 
 showInputValue('email')?>"  />
  <p><?php errorMsg('email') ?></p>
    <!-- input age -->
    <div class="form-control w-full max-w-xs">
        <label class="label" for="age">
            <span class="label-text">Age</span>
        </label>
    <input type="number" placeholder="Type here" class="input input-bordered w-full max-w-xs" name="age" id="age" value="<?php 
  showInputValue('age')?>" /> 
      <p>
    <?php errorMsg('age') ?>
  </p>  
 </div>
    <!-- input message -->
    <div class="form-control w-full max-w-xs">
        <label class="label" for="message">
            <span class="label-text">Message</span>
        </label>
        <textarea class="textarea textarea-bordered" placeholder="Bio" id="message" name="message"><?php 
  showInputValue('message')?></textarea>
            <?php errorMsg('message') ?>
    </div>

<!-- input/ btn submit -->
    <input class="btn btn-active btn-primary mt-6" type="submit" name="submited" value="Envoyer"/>
</form>

   <?php } ?>


    
    </main>


<!-- footer -->

<?php 
include('partials/_footer.php');

?>