<!DOCTYPE html>
<head>
<title>test flexbox</title>
<link rel="shortcut icon" type="image/png" href="http://gbaf.tegristh.fr/img/bq/LOGOGBAF.png"/>
<link href="styles/default.css" rel="stylesheet">
<script src="https://kit.fontawesome.com/eb85e4a2ad.js" crossorigin="anonymous"></script>
<meta charset="utf8" langue="fr">
</head>
<body>
    <div class="main-content">
        <header>
            <div class="logo">
                <a class="navbar-brand" href="accueil.php">
                    <img src="http://gbaf.tegristh.fr/img/bq/LOGOGBAF.png" width="40" height="51" alt="site logo">
                </a>
            </div>
            <div class="user">
                <div>
                    <i class="fas fa-user"></i>
                </div>
                <div>
                    Nom & Prénom
                </div>

            </div>
        </header>
        <div class="presentation">
            <h2>Le Groupement Banque Assurance Français</h2>
            <p> Est une fédération représentant les 6 grand groupes Français:</p>
                <ul id="liste-banques"><!-- Les commentaires servent à supprimer l'espace blanc indésirable, visible sur certaines mises en forme
       https://www.creativejuiz.fr/blog/tutoriels/creer-menu-horizontal-centre-css-sans-javascript
                    --><li><img src="http://gbaf.tegristh.fr/img/bq/01.png" alt=""></li><!--
                    --><li><img src="http://gbaf.tegristh.fr/img/bq/02.png" alt=""></li><!--
                    --><li><img src="http://gbaf.tegristh.fr/img/bq/03.jpg" alt=""></li><!--
                    --><li><img src="http://gbaf.tegristh.fr/img/bq/04.png" alt=""></li><!--
                    --><li><img src="http://gbaf.tegristh.fr/img/bq/05.jpg" alt=""></li><!--
                    --><li><img src="http://gbaf.tegristh.fr/img/bq/06.jpg" alt=""></li>
                </ul>
            <p class="justify"> 
                Le GBAF est le représentant de la profession bancaire et des assureurs sur tous les axes de la 
                réglementation financière française. Sa mission est de promouvoir l'activité bancaire à l’échelle 
                nationale. C’est aussi un interlocuteur privilégié des pouvoirs publics.
            </p>
        </div>


        <div class="acteur-liste"> 
            <div>
                <h2>Les partenaires et financeurs</h2>
                <p class="justify">
                    Les produits et services bancaires sont nombreux et très variés. Le GBAF souhaite proposer aux salariés des grands groupes Français 
                    un point d'entrée unique, répertoriant un grand nombre d'informations sur les partenaires et acteurs 
                    du groupe ainsi que sur les produits et services bancaires et financiers.
                </p>
            </div>
           

            <div class="acteur-carte">
                <div>
                   <div class="acteur-logo">
                        <img src="http://gbaf.tegristh.fr/img/part/01.png">
                    </div>
                    <div class="acteur-texte">                                
                        <h3>Formation&co</h3>
                            <p class="justify">
                                    Formation&co est une association française présente sur tout le territoire. Nous proposons à des personnes 
                                    issues de tout milieu de devenir entrepreneur grâce à un crédit et un accompagnement professionnel et personnalisé. 
                                    Notre proposition : - un financement jusqu’à 30 000€ ; - un suivi personnalisé et gratuit ; - une lutte 
                                    acharnée contre les freins sociétaux et les stéréotypes. Le financement est possible, peu importe le métier 
                                    : coiffeur, banquier, éleveur de chèvres… . Nous collaborons avec des personnes talentueuses et motivées. 
                                    Vous n’avez pas de diplômes ? Ce n’est pas un problème pour nous ! Nos financements s’adressent à tous.
                            </p>
                        
                        
                            <button type="button" class="button">
                                Lire la suite
                            </button>
                    </div>
                </div>
            </div>
      
            

<!--
            <div class="acteur-carte">
                <div class="acteur-logo">
                    <img src="http://gbaf.tegristh.fr/img/part/01.png">
                </div>
                <div class="acteur-texte">
                    <h3>Formation&co</h3>
                    <p class="justify">Formation&co est une association française présente sur tout le territoire. Nous proposons à des personnes 
                            issues de tout milieu de devenir entrepreneur grâce à un crédit et un accompagnement professionnel et personnalisé. 
                            Notre proposition : - un financement jusqu’à 30 000€ ; - un suivi personnalisé et gratuit ; - une lutte 
                            acharnée contre les freins sociétaux et les stéréotypes. Le financement est possible, peu importe le métier 
                            : coiffeur, banquier, éleveur de chèvres… . Nous collaborons avec des personnes talentueuses et motivées. 
                            Vous n’avez pas de diplômes ? Ce n’est pas un problème pour nous ! Nos financements s’adressent à tous.
                    </p>
                    <div class="button">
                        <button type="button" class="btn btn-outline-info">
                                Lire la suite
                        </button>
                    </div>
                </div>
            </div>
       
-->
        <footer>
            <div>Mentions légales</div>
            <div>Contacts</div>
        </footer>
    </div>
   
</body>
</html>
    <!--
        <div class="card col-12 ">
                <div class="row ">
                    <div class="col-12 col-md-4 col-lg-2 align-self-center ">
                       <img class="img-fluid" src="http://gbaf.tegristh.fr/img/part/01.png" alt="logo">
                    </div>
                    <div class="card-body col-12 col-md-8 col-lg-8 ">
                        <h3 class="text-align">Formation&co</h3>
                        <p class="text-justify">
                            Formation&co est une association française présente sur tout le territoire. Nous proposons à des personnes 
                            issues de tout milieu de devenir entrepreneur grâce à un crédit et un accompagnement professionnel et personnalisé. 
                            Notre proposition : - un financement jusqu’à 30 000€ ; - un suivi personnalisé et gratuit ; - une lutte 
                            acharnée contre les freins sociétaux et les stéréotypes. Le financement est possible, peu importe le métier 
                            : coiffeur, banquier, éleveur de chèvres… . Nous collaborons avec des personnes talentueuses et motivées. 
                            Vous n’avez pas de diplômes ? Ce n’est pas un problème pour nous ! Nos financements s’adressent à tous.
                        </p>
                    </div>
                    <div class="col-12 col-lg-2 text-right align-self-end">
                        <a href="acteur.php?acteur=<?php echo $donnees['id_acteur']; ?>">
                            <button type="button" class="btn btn-outline-info">
                                Lire la suite
                            </button>
                        </a>
                    </div>
                </div>
            </div> -->