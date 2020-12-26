<?php
require'autoload.php'; 
require'bdd_connect.php';
$user_name= $_GET['userName'];
$nom_page='Modifier mot de passe';
require'Head.php'; ?>
<div class="big-box">
    <h2>Récupération de mot de passe 2/2</h2>
    <div class="form-line">
    <form action="chPasswordByName.php" method="POST">
        <input id="userName" name="userName"type="hidden"value="<?php echo $user_name; ?>"/>
        <label for="password">Nouveau mot de passe: </label>
            <input type="password"id="password"class="textarea"name="password"required />
        <label for="Vpassword">Vérifier mot de passe: </label>
            <input type="password"id="Vpassword"class="textarea"name="Vpassword"required />
        <button type="submit"class="boutton">Modifier</button>
    </form>
</div>
    </div>


<?php 
require'footer.php'; ?>