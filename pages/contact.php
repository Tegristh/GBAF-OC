<?php 
session_start();
require'autoload.php';
require'bdd_connect.php';
$nom_page='contact';
require'Head.php'; ?>
<div class="big-box">
<div>
    <h2>Contact</h2>
</div>
<div>
    <form action="#" method="POST" >
        <div class="form-line">
            <label for="email">Email: </label>
                <input type="text" id="email" class="textarea" name="email" required />
                <textarea id="message" name="message" rows="10" class="textarea" placeholder="votre message ici" required></textarea></div>
                <div class="form-line">
                    <input type="checkbox" id="rgpd" name="rgpd" required />
                    <label for="rgpd">J'accepte l'enregistrement et l'usage de mes données personnelles présentes dans ce formulaire à des fins de contact uniquement. </label>
                </div>
                <div class="form-line">
                    <button type="submit" class="boutton" >Envoyer</button>
                </div>
        </div>
    </form>  
<?php require'footer.php'; ?>