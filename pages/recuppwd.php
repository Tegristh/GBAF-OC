<?php 
require'autoload.php';
require'bdd_connect.php';
$nom_page='récupération mdp';
require'Head.php'; ?>
<div class="big-box">
    <h2>Récupération de mot de passe 1/2</h2>
    <div class="form-line">
        <form action="verif_user.php" method="POST">
        <label for="userName">UserName: </label>
        <input type="text"id="userName"class="textarea"name="userName"required />
        <button type="submit"class="boutton">Envoyer</button>
        </form>
    </div>
</div>
<?php 
require'footer.php'; ?>