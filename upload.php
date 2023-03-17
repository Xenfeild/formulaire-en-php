<!-- header -->

<?php 
$title_page = "Upload d'un fichier";
include('partials/_header.php');

// validation formulaire
// étape 1 création de mes variables
$error = [];
$errMsgRequire = "<span class='text-red-500'>Ce champ est obligatoire</span>";
$success = false;

// tester que le fichier $_FILES['image'] existe et pas d'erreur à l'envoie
if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    // nom des variables
    // debug_array($_FILES);  
    $files_name = $_FILES['image']['name'];
    $files_size = $_FILES['image']['size'];
    $files_tmp = $_FILES['image']['tmp_name'];
    $files_type = $_FILES['image']['type'];
 
    // vérifie la taille de 'limage
    $max_size = 2000000;
    if($files_size <= $max_size){
    // verifier l'extension du fichier
    // récupère l'extension du fichier
    $fileInfo = pathinfo($files_name);
    debug_array($fileInfo);
    // récupérer extension du fichier dans une variable
    $extension = $fileInfo['extension'];
    // je choisis les extension autorisées
    $allowed_extensions = ['jpg', 'jpeg', 'png'];

        // vérifie si l'extension du fichier à uploader est dans le tableau allowed_extension
        if(in_array($extension, $allowed_extensions)){
            // valider upload
            if(!file_exists('image_upload')){
                mkdir('image_upload');
            }
            // on déplace le fichier dans le bon dossier
            move_uploaded_file($files_tmp, "image_upload/".basename($files_name));
        } else {
            $error['extension']
         = "<span class='text-red-500'>Mauvais format c'est soit jpeg soit png </span>";
        }
    } else  {
        $error['image']
         = "<span class='text-red-500'>Le fichier est trop lourd </span>";
    }
    // pas d'erreur enregistrement en base de donnée
    if(count($error)== 0){
        $success = true;
        // enregistrement BDD
    }
}


?>


<!-- body -->
<main class="pt-20">
    <?php if($success === true) {?>
    <span class="bg-green-400">Votre fichier à été envoyé</span>
    <?php } else { ?>
<!-- input upload d'un fichier -->
<form method="POST" enctype="multipart/form-data">
    <div class="form-control w-full max-w-xs">
    <label class="label" for="image">
        <span class="label-text">Votre image</span>
    </label>
  <input type="file" class="input input-bordered w-full max-w-xs" name="image" id="image" />
  <p><?php  errorMsg('image')?></p>

    </div>

<!-- input/ btn submit -->
    <button class="btn btn-active btn-primary mt-6" type="submit">Envoyer</button>

</form>
<?php } ?>
    </main>


<!-- footer -->

<?php 
include('partials/_footer.php');

?>