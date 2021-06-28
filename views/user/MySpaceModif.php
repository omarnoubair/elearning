<div class="container">


    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0   " >


        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $this->session->read('user')->pseudo; ?></h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" class="img-circle img-responsive"> </div>

                    <?php foreach ($user as $u) { ?>
                        <div class=" col-md-9 col-lg-9 "><table class="table table-user-information" >
                            <form class="form-horizontal" method="Post" action=<?php echo BASE_URL . "/user/monEspaceModifAction/" . $this->session->read('user')->id; ?>
                                  
                                    <tbody>
                                        <tr>
                                            <td>Nom</td>
                                            <td><input  name="nom" id="nom" value="<?php echo $u->nom; ?>" class="form-control"
                                                        placeholder="somebody@example.com"></td>

                                        </tr>
                                        
                                        <tr>
                                            <td>Prenom</td>
                                            <td><input  name="prenom" id="prenom" value="<?php echo $u->prenom; ?>" class="form-control" 
                                                        placeholder="somebody@example.com"></td>

                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Pseudo </td>
                                            <td><input  name="pseudo" id="pseudo" value="<?php echo $u->pseudo; ?>" class="form-control" 
                                                        placeholder="somebody@example.com"></td>

                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Numero de telephone</td>
                                            <td><input  name="tel" id="tel" value="<?php echo $u->tel; ?>" class="form-control" 
                                                        placeholder=""></td>
                                        </tr>

                                        <tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><input type="nom" name="mail" id="email" value="<?php echo $u->mail; ?>" class="form-control"
                                                       placeholder="somebody@example.com"></td>

                                        </tr>
                                       
                                        <tr>
                                            <td>Mot de Passe </td>
                                            <td>
                                                <a href="<?php echo BASE_URL . "/user/ChangePassword/" . $this->session->read('user')->pseudo; ?>"
                                                   class="btn btn-primary btn-xs pull-right"> Modifier Votre mot de passe </a>
                                            </td>
                                        </tr>

                                        </tr>

                                    </tbody>
                                </table>


                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <button type="submit" id="ValiderBtn" name="submit" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-ok"></i>Valider vos Modifications</button>
                <?php } ?>

            </div>
            </form>
        </div>
    </div>
</div>
</div>