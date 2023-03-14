<!-- header -->

<?php 
$title_page = "Le superglobale GET";
include('partials/_header.php');
?>

<!-- body -->
<main class="pt-20">
<!-- input name -->
<form method="GET" action="submit_get.php">
    <div class="form-control w-full max-w-xs">
    <label class="label" for="nom">
        <span class="label-text">What is your name?</span>
    </label>
  <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" name="nom" id="nom" />

    </div>
    <!-- input age -->
    <div class="form-control w-full max-w-xs">
        <label class="label" for="age">
            <span class="label-text">Age</span>
        </label>
    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" name="age" id="age" />   
 </div>
    <!-- input message -->
    <div class="form-control w-full max-w-xs">
        <label class="label" for="message">
            <span class="label-text">Message</span>
        </label>
        <textarea class="textarea textarea-bordered" placeholder="Bio" id="message" name="message"></textarea>
    </div>

<!-- input/ btn submit -->
    <button class="btn btn-active btn-primary mt-6" type="submit">Envoyer</button>

</form>

    </main>


<!-- footer -->

<?php 
include('partials/_footer.php');

?>