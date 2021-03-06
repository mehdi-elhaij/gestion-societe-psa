<?php
require __DIR__. '/../include/outils.php';
$user = null;

if($_SESSION['is_client'])
    $user = Client::trouver("id", $_SESSION["user_id"]);
else
    $user = pageProteger();  


if(!isset($_GET['id']))
    header('Location:' . client('/backoffice.php'));

$commande = Commande::trouver('id', $_GET['id']);

if($commande == false)
    header('Location:' . client('/backoffice.php'));
?>

<?php
template('header');
?>


<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
<?php template('sidebar'); ?> 
</div> <!-- / main menu-->

<nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-semi-dark navbar-shadow">
<?php template('nav'); ?> 
</nav>

<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> <i class="icon-paper"></i> commande: <?=$_GET['id']?> </h4>
                        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    </div>
                    <div class="card-body collapse in">
                        <div class="card-block">
                            <h4 class="form-section"></h4>
                                <div class="row">
                                    <div class="col-md-5">
                                        <h6 class="blue-grey">Numero de la Commande  :</h6>
                                    </div>
                                    <div class="col-md-7">
                                        <h5><?= $commande->numero ?></h5>
                                    </div>
                                </div>
                              
                                <div class="row">
                                    <div class="col-md-5">
                                        <h6 class="blue-grey">Projet :</h6>
                                    </div>
                                    <div class="col-md-7">
                                        <h5><?= $commande->projet?></h5>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <h6 class="blue-grey">Date de Commande :</h6>
                                    </div>
                                    <div class="col-md-7">
                                        <h5><?= $commande->date_commande?></h5>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <h6 class="blue-grey" >Date de Livraison :</h6>
                                    </div>
                                    <div class="col-md-7">
                                        <h5><?= $commande->date_livraison?></h5>
                                    </div>
                                </div>
                              
                                <div class="row">
                                    <div class="col-md-5">
                                        <h6 class="blue-grey">Personne à contacter   :</h6>
                                    </div>
                                    <div class="col-md-7">
                                        <h5><?= $commande->contact?></h5>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <h6 class="blue-grey">Commentaire  :</h6>
                                    </div>
                                    <div class="col-md-7">
                                        <h5><?= $commande->commentaire?></h5>
                                    </div>
                                </div>
                                <div class=" text-xs-right " style="margin-right: 25px">
                            <a href="<?= lien('/commande/modifier.php?id=' . $commande->id)?>" class="btn btn-outline-success">Modifier</a>
                        </div>
                    </div>

                        
                        
                    </div><!-- .body -->
                </div><!-- .card -->
            </div><!-- .col-6 -->
        </div><!-- .row -->
    </div><!-- .wrapper -->
</div> <!-- .content -->

<?php
    template('footer', array(
        'path' => '../'
    ));
?>