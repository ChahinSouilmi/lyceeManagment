<?php
require_once 'header.php';
?>


<link rel="stylesheet" href="css/inscri.css">
<!------ Include the above in your HEAD tag ---------->

<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                        <h3>Welcome</h3>
                        <p>Inscrire et creer vos propre factures !</p>
                        <input type="submit" name="" value="Login"/><br/>
                    </div>
                    <div class="col-md-9 register-right">
                
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Inscription</h3>
                                <div class="row register-form">
                                        
                                    <div class="col-md-6">
                                    <form action="inc/signup.inc.php" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Nom parent *" name="nom" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="prenom parent *" name="prenom" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" minlength="8" maxlength="10" name="tel" class="form-control" placeholder="Telephone *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="identifiant unique *" name="son_id" value="" />
                                        </div>
                                   
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="uid" class="form-control" placeholder="nom d'utilisateur" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="pwd" class="form-control" placeholder="Mot de passe *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Confirmer Mot de passe *" value="" />
                                        </div>
                                 

                                        
                                      
                                        <input type="submit" name="submit" class="btnRegister"  value="Enregistrer"/>
                                        </form>
                                    </div>
                                </div>
                            </div>

