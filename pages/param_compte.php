<?php 
session_start();
if ($_SESSION['connecte'] != TRUE)
    {
        header('location:'.$redirect.'connexion.php');
    }
require'autoload.php'; 
require'bdd_connect.php';
$user_id= $_SESSION['id'];
$nom_page='paramètres du compte';
require'Head.php'; ?>
<div class="big-box">
    <h2>Paramètres du compte</h2>
<!-- récupération des infos en bdd -->
<?php
    $req = $bdd->prepare('SELECT * FROM account WHERE id_user = :id_user');
    $req->execute(array('id_user' => $_SESSION['id']));
    $user = $req->fetch(); 
        $userNom = $user['nom'];
        $userPrenom = $user['prenom'];
        $userName = $user['username'];
        $userQuestion = $user['question'];
        $userReponse = $user['reponse'];
?>
<!-- formulaire username-->
<div class="form-line">
    <h3 style="text-align:left;">Changer votre UserName: </h3>
    <p>Votre UserName: <em><?php echo $userName; ?></em></p>
    <form action="chUserName.php" method="POST">
        <label for="newUserName">Nouveau UserName: </label>
        <input type="text" id="newUserName" class="textarea" name="newUserName" required />
        <button type="submit" class="boutton">Modifier</button>
    </form>
</div>
<!-- formulaire password-->
<div class="form-line">
    <h3 style="text-align:left;">Changer votre mot de passe: </h3>
    <form action="chPassword.php" method="POST">
        <label for="password">Nouveau mot de passe: </label>
        <input type="password" id="password" class="textarea" name="password" required />
        <label for="Vpassword">Vérifier mot de passe: </label>
        <input type="password" id="Vpassword" class="textarea" name="Vpassword" required />
        <button type="submit" class="boutton">Modifier</button>
    </form>
</div>
<!-- formulaire nom-->
<div class="form-line">
    <h3 style="text-align:left;">Changer votre Nom: </h3>
    <p>Votre Nom: <em><?php echo strtoupper($userNom); ?></em></p>
    <form action="chNom.php" method="POST">
        <label for="newNom"> Nouveau Nom:</label>
        <input type="text" id="newNom" class="textarea" name="newNom" required />
        <button type="submit" class="boutton">Modifier</button>
    </form>
</div>
<!-- formulaire prenom-->
<div class="form-line">
    <h3 style="text-align:left;">Changer votre Prénom: </h3>
    <p>Votre Prénom: <em><?php echo ucfirst($userPrenom); ?></em></p>
    <form action="chPrenom.php" method="POST">
        <label for="newPrenom"> Nouveau Prénom: </label>
        <input type="text" id="newPrenom" class="textarea" name="newPrenom" required/>
        <button type="submit" class="boutton">Modifier</button>
    </form>
</div>
<!-- formulaire question/réponse secrete-->
<div class="form-line">
    <h3 style="text-align:left;">Changer votre "question et réponse" secrète: </h3>
    <p>Votre question: <em><?php echo $userQuestion; ?></em></p>
    <p>Votre réponse: <em><?php echo $userReponse; ?></em></p>
    <form action="chSecret.php" method="POST">
        <select id="question" class="textarea" name="question" >
<!-- liste de questions https://gist.github.com/384400/46c7485afe0b9dc7d62c -->
            <option value="">-- choisir une question --</option>
            <option value="Comment s'appelait votre meilleur ami lorsque vous étiez adolescent ?"> Comment s'appelait votre meilleur ami lorsque vous étiez adolescent ?</option>
            <option value="Comment s'appelait votre premier animal de compagnie ?"> Comment s'appelait votre premier animal de compagnie ?</option>
            <option value="Quel est le premier plat que vous avez appris à cuisiner ?"> Quel est le premier plat que vous avez appris à cuisiner ?</option>
            <option value="Quel est le premier film que vous avez vu au cinéma ?"> Quel est le premier film que vous avez vu au cinéma ?</option>
            <option value=" Où êtes-vous allé la première fois que vous avez pris l'avion ?"> Où êtes-vous allé la première fois que vous avez pris l'avion ?</option>
            <option value="Comment s'appelait votre instituteur préféré à l'école primaire ?"> Comment s'appelait votre instituteur préféré à l'école primaire ?</option>
            <option value="Quel serait selon vous le métier idéal ?"> Quel serait selon vous le métier idéal ?</option>
            <option value="Quel est le livre pour enfants que vous préférez ?"> Quel est le livre pour enfants que vous préférez ?</option>
            <option value="Quel était le modèle de votre premier véhicule ?"> Quel était le modèle de votre premier véhicule ?</option>
            <option value="Quel était votre surnom lorsque vous étiez enfant ?"> Quel était votre surnom lorsque vous étiez enfant ?</option>
            <option value="Quel était votre personnage ou acteur de cinéma préféré lorsque vous étiez étudiant ?"> Quel était votre personnage ou acteur de cinéma préféré lorsque vous étiez étudiant ?</option>
            <option value="Quel était votre chanteur ou groupe préféré lorsque vous étiez étudiant ?"> Quel était votre chanteur ou groupe préféré lorsque vous étiez étudiant ?</option>
            <option value="Dans quelle ville vos parents se sont-ils rencontrés ?"> Dans quelle ville vos parents se sont-ils rencontrés ?</option>
            <option value="Comment s'appelait votre premier patron ?"> Comment s'appelait votre premier patron ?</option>
            <option value="Quel est le nom de la rue où vous avez grandi ?"> Quel est le nom de la rue où vous avez grandi ?</option>
            <option value="Quel est le nom de la première plage où vous vous êtes baigné ?"> Quel est le nom de la première plage où vous vous êtes baigné ?</option>
            <option value="Quel est le premier album que vous avez acheté ?"> Quel est le premier album que vous avez acheté ?</option>
            <option value="Quel est le nom de votre équipe de sport préférée ?"> Quel est le nom de votre équipe de sport préférée ?</option>
            <option value="Quel était le métier de votre grand-père ?"> Quel était le métier de votre grand-père ?</option>
        </select>
        <label for="reponse">Réponse à la question secrète :</label>
        <input type="text" id="reponse" class="textarea" name="reponse" />
        <button type="submit" class="boutton">Modifier</button>
    </form>
</div>
<?php require'footer.php' ?>