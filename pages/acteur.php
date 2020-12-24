<?php
session_start();
if ($_SESSION['connecte'] != TRUE){
    header('location:'.$redirect.'connexion.php');
}
require'autoload.php'; 
require'bdd_connect.php';
$acteur_id = $_GET['acteur'];
$user_id= $_SESSION['id'];
$req = $bdd->prepare('SELECT * FROM acteur WHERE id_acteur = :acteur_id');
$req->execute(array('acteur_id' => $_GET['acteur']));
$donnees = $req->fetch();

$nom_page= $donnees['acteur']; 
require'Head.php'; ?>
   
        <!-- Début présentation de l'acteur -->
        <div class="big-box presentation-acteur">         
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


        <div class="big-box">
            <div class="interact" >
<!-- Nombre de commentaires -->
                <div class="nb_commentaires" >
                    <?php 
                        $nb_commentaires = $bdd->prepare('SELECT COUNT(*) AS nb_commentaires FROM post WHERE id_acteur = :acteur_id');
                        $nb_commentaires->execute(array('acteur_id'=>$_GET['acteur']));
                        $comment_count = $nb_commentaires->fetch();

                        echo '<p>'.$comment_count['nb_commentaires'].' Commentaire(s) </p>'; 
                    ?>
                </div>


<!-- module satisfaction -->
                <div class="satisfaction" >
                    <?php
                        $nb_votes = $bdd->prepare('SELECT COUNT(*) AS nb_votes FROM vote WHERE id_acteur = :acteur_id');
                        $nb_votes->execute(array('acteur_id'=>$_GET['acteur']));
                        $vote_count = $nb_votes->fetch();
                        $total_vote = $vote_count['nb_votes'];

                        $likes = $bdd->prepare('SELECT COUNT(*) AS nb_likes FROM vote WHERE id_acteur = :acteur_id AND vote = 1');
                        $likes->execute(array('acteur_id'=>$_GET['acteur']));
                        $nb_votes = $likes->fetch();
                        $nb_likes = $nb_votes['nb_likes'];
                        $nb_dislikes = ($total_vote-$nb_likes);

                        $satisfaction = $bdd->prepare('SELECT AVG (vote) as vote_moyen FROM vote WHERE id_acteur = :acteur_id');
                        $satisfaction->execute(array('acteur_id'=>$_GET['acteur']));
                        $note = $satisfaction->fetch();
                        $pourcentage = round($note['vote_moyen']*100);
                        ?>
                        <div class="meter" >
                            <span  class="span-green" style="width:<?php echo $pourcentage; ?>%"></span>
                            
                           
                            <div><?php echo '( '.$pourcentage.'% '.$total_vote.' vote(s) )</div>'; ?></div>
               
                    
                </div>
<!-- Module like/dislike -->
<?php 
    $has_user_vote = $bdd->prepare('SELECT COUNT(*) AS user_vote FROM vote WHERE id_acteur = :acteur_id AND id_user = :userID');
    $has_user_vote->execute(array(
        'acteur_id'=>$acteur_id,
        'userID' => $user_id,
        ));
    $user_has_vote = $has_user_vote->fetch();
    
    if (($user_has_vote['user_vote'] == 0)) {    
    ?>
                <div class="vote">
                    <a href="vote-add.php?user=<?php echo $user_id; ?>&amp;acteur=<?php echo $acteur_id; ?>&amp;vote=1"><button type="button" class="like ">
                        <?php echo $nb_likes; ?>
                        <i class="fas fa-thumbs-up"></i>
                    </button></a>
                <a href="vote-add.php?user=<?php echo $user_id; ?>&amp;acteur=<?php echo $acteur_id; ?>&amp;vote=0"><button type="button" class="dislike">
                        <?php echo $nb_dislikes; ?>
                        <i class="fas fa-thumbs-down"></i>
                    </button></a>
                </div>
    <?php 
    }
    else {
    //récup du vote
    $get_user_vote = $bdd->prepare('SELECT vote FROM vote where id_user = :id_user AND id_acteur = :id_acteur');
    $get_user_vote->execute(array(
        'id_user'=>$user_id,
        'id_acteur'=>$acteur_id,
    ));
    $user_vote = $get_user_vote->fetch();

    if ($user_vote['vote'] == 1){
    //si vote + 
    ?>
                <div class="vote" >
                    <a href="vote-supress.php?user=<?php echo $user_id; ?>&amp;acteur=<?php echo $acteur_id; ?>"><button type="button" class="like2 ">
                    <?php echo $nb_likes; ?>
                        <i class="fas fa-thumbs-up"></i>
                    </button></a>
                    <a href="vote-change.php?user=<?php echo $user_id; ?>&amp;acteur=<?php echo $acteur_id; ?>&amp;vote=0"><button type="button" class="dislike">
                    <?php echo $nb_dislikes; ?>
                        <i class="fas fa-thumbs-down"></i>
                    </button></a>
                </div>
    <?php 
    }
    elseif ($user_vote['vote'] == 0){    //si vote -
    ?>
                <div class="vote" >
                    <a href="vote-change.php?user=<?php echo $user_id; ?>&amp;acteur=<?php echo $acteur_id; ?>&amp;vote=1"><button type="button" class="like">
                    <?php echo $nb_likes; ?>
                        <i class="fas fa-thumbs-up"></i>
                    </button></a>
                    <a href="vote-supress.php?user=<?php echo $user_id; ?>&amp;acteur=<?php echo $acteur_id; ?>"><button type="button" class="dislike2">
                    <?php echo $nb_dislikes; ?>
                        <i class="fas fa-thumbs-down"></i>
                    </button></a>
                </div>
    <?php
    }}
    ?>


            
<!-- bouton commenter -->
                <div class="commenter">
                    <details>
                        <summary>Laisser un commentaire</summary>
                        <form action="commente.php" method="POST">
                            <input type="hidden" name="id_acteur" value="<?php echo $acteur_id; ?>" />
                            <textarea class="textarea" rows="5" cols="auto" name="message"></textarea>
                            <br /><input type="submit" class="boutton">
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
                                $auteur = $bdd->prepare('SELECT prenom FROM account WHERE id_user = :user_id');
                                $auteur->execute(array('user_id'=>$postAuteur));
                                $pseudo = $auteur->fetch(); ?>
                <div class="commentaire">                 
                    <div class="pseudo" >
                        <?php 
                            echo '<div>'.ucfirst($pseudo['prenom']).'</div>'; 
                        ?>
                    </div>
                    <div class="time" >
                        <?php
                            echo '<div>'.$commentaires['date'].'</div>';
                        ?>
                    </div>
                    <div class="comment" >
                        <?php echo '<div>'.nl2br($commentaires['post']).'</div>'; ?>
                    </div>
                </div><?php }} ?>
            </div>
        
                            </div>


<?php require'footer.php'; ?>