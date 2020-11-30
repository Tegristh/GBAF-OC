<?php 
include('autoload.php'); 
include('bdd_connect.php');

$nom_page= 'accueil'; 
include('Head.php'); 
?>
    
    <!-- début partie présentation -->
    <div class="container jumbotron présentation">
        <div class="row">
            <div class="col">
                <h1 class="text-center">Présentation du Groupement Banque Assurance Français</h1>
            </div>
        </div>
        <div class="row">
            <div class="col description">
                <p class="text-justify">Le Groupement Banque Assurance Français (GBAF) est une fédération représentant les 6 grand groupes Français:</p>
                <!-- début de liste des groupes bancaires FR -->
                <ul class="list-group list-group-horizontal ">
                    <li class="list-group-item col-2"><img src="http://gbaf.tegristh.fr/img/bq/01.png" class="img-fluid" alt="BNP Paribas"></li>
                    <li class="list-group-item col-2"><img src="http://gbaf.tegristh.fr/img/bq/02.png" class="img-fluid" alt="BPCE"></li>
                    <li class="list-group-item col-2"><img src="http://gbaf.tegristh.fr/img/bq/03.jpg" class="img-fluid" alt="Crédit Agricole"></li>
                    <li class="list-group-item col-2"><img src="http://gbaf.tegristh.fr/img/bq/04.png" class="img-fluid" alt="Crédit mutuel CIC"></li>
                    <li class="list-group-item col-2"><img src="http://gbaf.tegristh.fr/img/bq/05.jpg" class="img-fluid" alt="Société générale"></li>
                    <li class="list-group-item col-2"><img src="http://gbaf.tegristh.fr/img/bq/06.jpg" class="img-fluid" alt="La banque postale"></li>
                </ul>
                <!-- fin de liste des groupes bancaires FR -->
                <p class="text-justify">Le GBAF est le représentant de la profession bancaire et des assureurs sur tous
les axes de la réglementation financière française. Sa mission est de promouvoir
l'activité bancaire à l’échelle nationale. C’est aussi un interlocuteur privilégié des
pouvoirs publics.</p>
            </div>
        </div> 
    </div>
    <!-- fin partie présentation -->



    <!-- Début partie acteurs -->
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="text-center">Les partenaires et financeurs</h2>
                <p class="text-justify">Les produits et services bancaires sont nombreux et très variés. Le GBAF souhaite proposer aux salariés des grands groupes Français 
                    un point d'entrée unique, répertoriant un grand nombre d'informations sur les partenaires et acteurs 
                    du groupe ainsi que sur les produits et services bancaires et financiers.</p>
            </div>
         </div> 
    </div>          
    
    <div class="container acteurs">
        <div class="row"><?php     
            $reponse = $bdd->query('SELECT * FROM acteur ');
    while ($donnees = $reponse->fetch()) 
            //<!-- Début de carte acteur -->
            { ?>
            <div class="card col-12 ">
                <div class="row ">
                    <div class="col-12 col-md-4 col-lg-2 align-self-center ">
                        <?php echo '<img class="img-fluid" src="http://gbaf.tegristh.fr/img/part/'.$donnees['id_acteur'].'.'.$donnees['logo'].'" alt="logo">'; ?>
                    </div>
                    <div class="card-body col-12 col-md-8 col-lg-8 ">
                        <h3 class="text-align"><?php echo $donnees['acteur'] ?></h3>
                        <p class="text-justify"><?php echo $donnees['description'] ?></p>
                    </div>
                    <div class="col-12 col-lg-2 text-right align-self-end">
                        <a href="acteur.php?acteur=<?php echo $donnees['id_acteur']; ?>">
                            <button type="button" class="btn btn-outline-info">
                                Lire la suite
                            </button>
                        </a>
                    </div>
                </div>
            </div>
           <?php }
            ?>
            <!-- fin de carte acteur -->
            
            </div>
        </div>
    </div>
    <!-- fin partie acteurs -->
  <?php include('footer.php'); ?>