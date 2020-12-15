<?php 
include('autoload.php'); 
include('bdd_connect.php');
//$acteur_id = $_GET['acteur'];
$req = $bdd->prepare('SELECT * FROM acteur WHERE id_acteur = :acteur_id');
$req->execute(array('acteur_id' => $_GET['acteur']));
$donnees = $req->fetch();

$nom_page= $donnees['acteur']; 
include('Head.php'); ?>
        <!-- Début présentation de l'acteur -->
        <div class="container jumbotron">
           <!-- Début image de l'acteur-->
            <div class="row">
                <div class="col ">
                <?php echo '<img class="img-fluid text-center" src="http://gbaf.tegristh.fr/img/part/'.$donnees['id_acteur'].'.'.$donnees['logo'].'" alt="logo">'; ?>
                </div>
            </div>
            <!-- Fin image de l'acteur -->
            <div class="row">
                <!-- Début Titre H2-->
                <div class="col">
                    <h2><?php echo $donnees['acteur'] ?></h2>
                </div>
            </div>
                <!-- Fin de titre H2 -->
              <?php $req->closeCursor(); ?> 
            <!-- contenu textuel -->
            <div class="row">
                <div class="text-justify">
                <?php echo nl2br($donnees['description']); ?>
                </div>
            </div>
        </div>
        <!-- Fin contenu textuel -->
        <!-- Fin présentation de l'acteur -->


        <!-- début partie commentaires/notes -->
        <div class="container main border">
            <!-- compteur de commentaires -->
            <div class="row">
                <div class="col-3">
                <?php 
                $nb_commentaires = $bdd->prepare('SELECT COUNT(*) AS nb_commentaires FROM post WHERE id_acteur = :acteur_id');
                $nb_commentaires->execute(array('acteur_id'=>$_GET['acteur']));
                $comment_count = $nb_commentaires->fetch();

                echo '<p class="text-left align-middle">'.$comment_count['nb_commentaires'].' Commentaires</p>'; 
                ?>
                </div>
                <!-- bouton pour commenter -->
                <div class="col-3">
                    <button type="button" class="btn btn-outline-secondary">
                        Laisser un commentaire
                    </button>
                </div>
                <div class="col-3 ">
                <?php
                $nb_votes = $bdd->prepare('SELECT COUNT(*) AS nb_votes FROM vote WHERE id_acteur = :acteur_id');
                $nb_votes->execute(array('acteur_id'=>$_GET['acteur']));
                $vote_count = $nb_votes->fetch();

                $satisfaction = $bdd->prepare('SELECT AVG (vote) as vote_moyen FROM vote WHERE id_acteur = :acteur_id');
                $satisfaction->execute(array('acteur_id'=>$_GET['acteur']));
                $note = $satisfaction->fetch();
                echo '<p>'.round($note['vote_moyen']*100).'% d\'utilisateurs satisfaits <br/>'.$vote_count['nb_votes'].' votes exprimés </p>';
               
                ?>
                </div>
                <!-- groupe de boutons et nombre de +/- -->
                <div class="btn-group col-3 align-self-center" role="social" aria-label="Caesar-choice">
                    
                    <button type="button" class="btn btn-outline-success rounded">
                    <i class="fas fa-thumbs-up"></i>
                    </button>
                    <button type="button" class="btn btn-outline-danger rounded">
                    <i class="fas fa-thumbs-down"></i>
                    </button>
                    
                </div>
            </div>
            <div class="container">
                <div class="row">
                <div class="col">
                <p> 10 derniers commentaires: </p>
                </div>
                </div>
                    <!-- Une carte votée + -->
                    <div class="card">
                    <div class="row">
                    <?php
                    if ($comment_count['nb_commentaires'] == 0 ) {
                        echo '<div class="col-12"><p class="text-center">Pas encore de commentaires pour cet acteur, mais n\'hésitez pas à en laisser un!</p></div>';
                    }
                    else {
                        $requete = $bdd->prepare('SELECT id_post, id_user, id_acteur, DATE_FORMAT(date_add, \'%d/%m/%Y\') AS date, post FROM post WHERE id_acteur = :acteur_id ORDER BY id_post DESC LIMIT 0, 10');
                        $requete->execute(array('acteur_id'=>$_GET['acteur']));
                        while ($commentaires = $requete->fetch()) {
                            $postAuteur=$commentaires['id_user'];
                            ?>
                            <div class="col-4 ">
                                
                                <?php
                                $auteur = $bdd->prepare('SELECT username FROM account WHERE id_user = :user_id');
                                $auteur->execute(array('user_id'=>$postAuteur));
                                $pseudo = $auteur->fetch();
                                ?>
                                <p>Le <?php echo $commentaires['date'].' ';
                                echo '<strong>'.$pseudo['username'].'</strong> a écrit:</p>';

                                ?>
                            </div>
                            <div class="col-8 text-justify">
                                <p><?php echo $commentaires['post']; ?></p>
                            </div>
                            <?php
                        }
                    }
                   ?> 
                        
                        
                       
                       
                        
                    </div>
                </div>
                   
                   
                </div>
            </div>
                    


              
        
   <?php include('footer.php'); ?>