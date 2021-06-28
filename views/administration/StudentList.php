<div class="container">
    <div class="row  col-md-9 col-md-offset-0 custyle ">
        <table class="table table-striped custab ">
            <thead>
            <tr>
            <tr>
                <th>Id User</th>
                <th>Pseudo</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Mail</th>
                <th>Numéro de Téléphone</th>
                <th >Action</th>
            </tr>
            </thead>
            <?php
            foreach ($StudentList as $Student) {
                ?>
                <br>
                <tr>
                    <td><?php echo $Student->id ?></td>
                    <td><?php echo $Student->pseudo ?></td>
                    <td><?php echo $Student->nom ?></td>
                    <td><?php echo $Student->prenom ?></td>
                    <td><?php echo $Student->mail ?></td>
                    <td><?php echo $Student->tel ?></td>
                    <td class="text-center" width="30px"><a href="<?php echo BASE_URL . '/administration/deleteUser/' . $Student->id ?>" class="btn btn-danger btn-xs" onclick="return confirm('Voulez-vous vraiment supprimer cet étudiant?');"><span class="glyphicon glyphicon-remove"></span> Supprimer</a></td>

                </tr>

            <?php } ?>        

        </table>
    </div>
</div>
