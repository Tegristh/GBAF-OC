<?php include('Head-large.php'); ?>
        <!-- Début présentation de l'acteur -->
        <div class="container jumbotron">
           <!-- Début image de l'acteur-->
            <div class="row">
                <div class="col ">
                    <img src="images/logo-partenaire/formation_co.png" class="img-fluid" alt="Chambre des entrepreneurs logo">
                </div>
            </div>
            <!-- Fin image de l'acteur -->
            <div class="row">
                <!-- Début Titre H2-->
                <div class="col">
                    <h2>Formation&co</h2>
                </div>
            </div>
                <!-- Fin de titre H2 -->
                <!-- Lien -->
            <div class="row">
                <div class="col-12 col-lg-2  ">
                    <a href="#">
                        <button type="button" class="btn btn-outline-primary">
                        visiter
                        </button>
                    </a>        
                </div>
            </div>
            <!-- lien fin -->
            <!-- contenu textuel -->
            <div class="row">
                <div class="text-justify">
                    <p class="text-justify">Formation&co est une association française présente sur tout le territoire.
                    Nous proposons à des personnes issues de tout milieu de devenir entrepreneur grâce à un crédit et un accompagnement professionnel et personnalisé.</p>
                    <p>Notre proposition :</p>
                    <ul>
                        <li>un financement jusqu’à 30 000€ ;</li>
                        <li>un suivi personnalisé et gratuit ;</li>
                        <li>une lutte acharnée contre les freins sociétaux et les stéréotypes.</li>
                    </ul> 
                    <p class="text-justify">Le financement est possible, peu importe le métier : coiffeur, banquier, éleveur de chèvres… . Nous collaborons avec des personnes talentueuses et motivées.
                    Vous n’avez pas de diplômes ? Ce n’est pas un problème pour nous ! Nos financements s’adressent à tous.</p>
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