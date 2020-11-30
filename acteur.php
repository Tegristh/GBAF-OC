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
                <?php echo '<img class="img-fluid" src="http://gbaf.tegristh.fr/img/part/'.$donnees['id_acteur'].'.'.$donnees['logo'].'" alt="logo">'; ?>
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
               
            <!-- contenu textuel -->
            <div class="row">
                <div class="text-justify">
                <?php echo $donnees['description'] ?>
                </div>
            </div>
        </div>
        <!-- Fin contenu textuel -->
        <!-- début partie sociale -->
        <div class="container main border">
            <!-- compteur de commentaires -->
            <div class="row">
                <div class="col-6">
                    <p>X - Commentaires</p>
                </div>
                <!-- bouton pour commenter -->
                <div class="col-3">
                    <button type="button" class="btn btn-outline-secondary">
                        Laisser un commentaire
                    </button>
                </div>
                <!-- groupe de boutons et nombre de +/- -->
                <div class="btn-group col-3 align-self-center" role="social" aria-label="Caesar-choice">
                    <p class="text-center">Y</p>
                    <button type="button" class="btn btn-outline-success rounded">+</button>
                    <button type="button" class="btn btn-outline-danger rounded">-</button>
                    <p class="text-center">Z</p>
                </div>
            </div>
            <div class="container">
                
                    <!-- Une carte votée + -->
                    <div class="card">
                    <div class="row">
                        <div class="col-1">
                            <button type="button" class="btn btn-success rounded-circle">+</button>
                        </div>
                        <div class="col-2">
                            <p>Prénom</p>
                            <p>Date</p>
                       
                        </div>
                        <div class="col-9 text-justify">
                            <p>test + </p>
                        </div>
                    </div>
                </div>
                    <!-- Une carte votée - -->
                    <div class="card">
                        <div class="row">
                            <div class="col-1">
                                <button type="button" class="btn btn-danger rounded-circle">-</button>
                            </div>
                            <div class="col-2">
                                <p>Prénom</p>
                                <p>Date</p>
                            </div>
                            <div class="col-9 text-justify">
                                <p>test - </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    


                </div>
            </div>
        </div>
   <?php include('footer.php') ?>