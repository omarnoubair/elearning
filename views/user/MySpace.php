<div class="container">
 

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0   " >


        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $this->session->read('user')->pseudo; ?></h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" class="img-circle img-responsive"> </div>

                    <?php
                    foreach ($user as $u) { ?>
                    <div class=" col-md-9 col-lg-9 "> 
                        <table class="table table-user-information">
                            <tbody>
                                <tr>
                                    <td>Nom</td>
                                    <td><?php echo $u->nom; ?></td>
                                </tr>
                                <tr>
                                    <td>Prenom</td>
                                    <td><?php echo $u->prenom; ?></td>
                                </tr>
                                <tr>
                                    <td>Pseudo </td>
                                    <td><?php echo $u->pseudo; ?></td>
                                </tr>
                                <tr>
                                    <td>Numero de telephone</td>
                                    <td><?php echo $u->tel; ?></td>
                                </tr>

                                <tr>
                                <tr>
                                    <td>Email</td>
                                    <td><?php echo $u->mail; ?></td>
                                </tr>
                                
                                
                            
                            </tr>

                            </tbody>
                        </table>
                    <?php } ?>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <a href="<?php echo BASE_URL . "/user/monEspaceModif/".$this->session->read('user')->id; ?>" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i> Modifier votre profil</a>
            </div>

        </div>
    </div>
</div>
</div>