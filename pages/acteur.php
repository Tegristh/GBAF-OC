<?php
session_start();
if ($_SESSION['connecte'] != TRUE){
    header('location:'.$redirect.'connexion.php');
}
include('autoload.php'); 
include('bdd_connect.php');
$acteur_id = $_GET['acteur'];
$req = $bdd->prepare('SELECT * FROM acteur WHERE id_acteur = :acteur_id');
$req->execute(array('acteur_id' => $_GET['acteur']));
$donnees = $req->fetch();

$nom_page= $donnees['acteur']; 
include('Head.php'); ?>
        <!-- Début présentation de l'acteur -->
        <div class="presentation-acteur">         
            <div>
                <?php echo '<img src="http://gbaf.tegristh.fr/img/part/'.$donnees['id_acteur'].'.'.$donnees['logo'].'" alt="logo">'; ?>
            </div>
            <div>
                <h2>
                    <?php echo $donnees['acteur'] ?>
                </h2>
            </div>             
            <?php $req->closeCursor(); ?>             
            <div>
                <?php echo nl2br($donnees['description']); ?>
            </div>       
        </div>
        <!-- Fin présentation de l'acteur -->


        <div class="big-box" >
            <div class="interact" >
<!-- Nombre de commentaires -->
                <div class="nb_commentaires" >
                    <?php 
                        $nb_commentaires = $bdd->prepare('SELECT COUNT(*) AS nb_commentaires FROM post WHERE id_acteur = :acteur_id');
                        $nb_commentaires->execute(array('acteur_id'=>$_GET['acteur']));
                        $comment_count = $nb_commentaires->fetch();

                        echo '<p>'.$comment_count['nb_commentaires'].' Commentaires </p>'; 
                    ?>
</div>

<!-- module satisfaction -->
                <div class="satisfaction" >
                    <?php
                        $nb_votes = $bdd->prepare('SELECT COUNT(*) AS nb_votes FROM vote WHERE id_acteur = :acteur_id');
                        $nb_votes->execute(array('acteur_id'=>$_GET['acteur']));
                        $vote_count = $nb_votes->fetch();

                        $satisfaction = $bdd->prepare('SELECT AVG (vote) as vote_moyen FROM vote WHERE id_acteur = :acteur_id');
                        $satisfaction->execute(array('acteur_id'=>$_GET['acteur']));
                        $note = $satisfaction->fetch();
                        echo '<p>'.round($note['vote_moyen']*100).'% ('.$vote_count['nb_votes'].' votes )</p>';
               
                    ?>
                </div>
<!-- Module like/dislike -->
                <div class="vote" >
                    <button type="button" class="like ">
                        <i class="fas fa-thumbs-up"></i>
                    </button>
                    <button type="button" class="dislike">
                        <i class="fas fa-thumbs-down"></i>
                    </button>
                </div>

            
<!-- bouton commenter -->
                <div class="commenter">
                    <details>
                        <summary>Laisser un commentaire</summary>
                        <form action="commente.php" method="POST">
                            <input type="hidden" name="id_acteur" value="<?php echo $acteur_id; ?>" />
                            <input type="text" name="message"/>
                            <input type="submit" class="boutton">
                        </form>
                    </details>
                </div></div>
<!-- Module affiche commentaires -->  
            <div class="commentaires" >
                <div><p> les 10 derniers commentaires : </p></div>
                <?php
                        if ($comment_count['nb_commentaires'] == 0 ) {
                            echo '<div class="commentaire-none"><p>Pas encore de commentaires pour cet acteur, mais n\'hésitez pas à en laisser un!</p></div>';
                        }
                        else {
                            $requete = $bdd->prepare('SELECT id_post, id_user, id_acteur, DATE_FORMAT(date_add, \'%d/%m/%Y\') AS date, post FROM post WHERE id_acteur = :acteur_id ORDER BY id_post DESC LIMIT 0, 10');
                            $requete->execute(array('acteur_id'=>$_GET['acteur']));
                            while ($commentaires = $requete->fetch()) {
                                $postAuteur=$commentaires['id_user'];
                                $auteur = $bdd->prepare('SELECT username FROM account WHERE id_user = :user_id');
                                $auteur->execute(array('user_id'=>$postAuteur));
                                $pseudo = $auteur->fetch(); ?>
                <div class="commentaire">                 
                    <div class="pseudo" >
                        <?php 
                            echo '<div>'.ucfirst($pseudo['username']).'</div>'; 
                        ?>
                    </div>
                    <div class="time" >
                        <?php
                            echo '<div>'.$commentaires['date'].'</div>';
                        ?>
                    </div>
                    <div class="comment" >
                        <?php echo '<div>'.$commentaires['post'].'</div>'; ?>
                    </div>
                </div><?php }} ?>
            </div>
        
                            </div>


<?php include('footer.php'); ?>