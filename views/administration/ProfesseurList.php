<html lang="fr">

<head>

</head>

<body>
    <div class="container">
    <div class="row  col-md-9 col-md-offset-1 custyle ">
    <table class="table table-striped custab ">
    <thead>
    <a href="<?php echo BASE_URL."/administration/addProf"?>" class="btn btn-primary btn-xs pull-right"><b>+</b> Ajouter professeur</a>
        <tr>
            <tr>
                <th>Id User</th>       
                <th>Nom</th>
                <th>Prenom</th>
                <th>Mail</th>
                <th>Numero de Telephone</th>
                <th >Action</th>
        </tr>
    </thead>
    
        <?php
            foreach ($ProfesseurList as $prof) {
                ?>
                <br>
                <tr>
                    <td><?php echo $prof->id ?></td>
                    <td><?php echo $prof->nom ?></td>
                    <td><?php echo $prof->prenom ?></td>
                    <td><?php echo $prof->mail ?></td>
                    <td><?php echo $prof->tel ?></td>
                    <td class="text-center" width="30px"><a href="<?php echo BASE_URL . '/administration/deleteProf/' . $prof->id ?>" class="btn btn-danger btn-xs" onclick="return confirm('Voulez-vous vraiment supprimer ce professeur?');"><span class="glyphicon glyphicon-remove"></span> Supprimer</a></td>
                </tr>

            <?php } ?>   
        
    </table>
    </body>
    </HTML>