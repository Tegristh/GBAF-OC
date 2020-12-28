<?php 
session_start();
if ($_SESSION['connecte'] != TRUE){
    header('location:'.$redirect.'connexion.php');
}

require'autoload.php'; 
require'bdd_connect.php';

$nom_page= 'accueil'; 
require'Head.php'; 
?>
    
    <!-- début partie présentation -->
    <div class="big-box">
    <div class="presentation">
        <h1>Le Groupement Banque Assurance Français</h1>
        <p> est une fédération représentant les 6 grand groupes Français:</p>
       <ul id="liste-banques"><!-- Les commentaires servent à supprimer l'espace blanc indésirable, visible sur certaines mises en forme
       https://www.creativejuiz.fr/blog/tutoriels/creer-menu-horizontal-centre-css-sans-javascript
        --><li><img src="http://gbaf.tegristh.fr/img/bq/01.png" alt=""></li><!--
        --><li><img src="http://gbaf.tegristh.fr/img/bq/02.png" alt=""></li><!--
        --><li><img src="http://gbaf.tegristh.fr/img/bq/03.jpg" alt=""></li><!--
        --><li><img src="http://gbaf.tegristh.fr/img/bq/04.png" alt=""></li><!--
        --><li><img src="http://gbaf.tegristh.fr/img/bq/05.jpg" alt=""></li><!--
        --><li><img src="http://gbaf.tegristh.fr/img/bq/06.jpg" alt=""></li>
        </ul>
        <p> 
            Le GBAF est le représentant de la profession bancaire et des assureurs sur tous les axes de la 
            réglementation financière française. Sa mission est de promouvoir l'activité bancaire à l’échelle 
            nationale. C’est aussi un interlocuteur privilégié des pouvoirs publics.
        </p>
    </div>
    <!-- fin partie présentation -->



    <!-- Début partie acteurs -->
    <div class="acteur-liste"> 
            <div>
                <h2>Les partenaires et financeurs</h2>
                <p class="justify">
                    Les produits et services bancaires sont nombreux et très variés. Le GBAF souhaite proposer aux salariés des grands groupes Français 
                    un point d'entrée unique, répertoriant un grand nombre d'informations sur les partenaires et acteurs 
                    du groupe ainsi que sur les produits et services bancaires et financiers.
                </p>
            </div>

<?php $reponse = $bdd->query('SELECT id_acteur, acteur, SUBSTRING(description, 1, 255) AS short_description, logo FROM acteur ');
    while ($donnees = $reponse->fetch())  { ?>
             <div class="card" >
                <div class="acteur-carte">
                    <div class="acteur-logo"  >
                    <a href="acteur.php?acteur=<?php echo $donnees['id_acteur']; ?>"  ><?php echo '<img src="http://gbaf.tegristh.fr/img/part/'.$donnees['id_acteur'].'.'.$donnees['logo'].'" alt="logo">'; ?></a>
                    </div>
                    <div class="acteur-texte"  >                                
                            <h3>
                                <?php echo $donnees['acteur'] ?>
                            </h3>
                            <p class="justify">
                                <?php echo nl2br($donnees['short_description']).' <em>...</em> ' ?>
                            </p>
                    </div>
                    <div class="bottom-right">     
                        <div class="bottom-right">
                            <a href="acteur.php?acteur=<?php echo $donnees['id_acteur']; ?>" class="boutton"  >
                               Lire la suite
                            </a>
                        </div>
                    </div>
                </div>
             </div>
        <?php }
           $reponse->closeCursor();
            ?>
            <!-- fin de carte acteur -->
            
       </div>
        
    
    <!-- fin partie acteurs -->
  <?php require'footer.php'; ?>