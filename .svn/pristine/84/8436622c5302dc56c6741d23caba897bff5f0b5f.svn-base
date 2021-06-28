<div class="container">
    <div class="row  col-md-8 col-md-offset-1 custyle ">
        <table class="table table-striped custab ">
            <thead>
            <a href="#" class="btn btn-primary btn-xs pull-right"><b>+</b> Ajouter un cours</a>
            <tr>
            <tr>
                <th>Titre</th>
                <th>Categorie</th>
                <th>Reports</th>
                <th>Date de publication</th>
                <th colspan="2">Action</th>
            </tr>
            </thead>
            <?php
            foreach ($courseList as $course) {

                echo '<td>' . $course->titre . "      </td>";
                echo '<td>' . $course->categorie . "      </td>";
                echo '<td>' . $course->Nb .  " </td>";
                echo '<td>' . $course->date . "      </td>";
                echo '<td class="text-center" width="30px"><a class=\'btn btn-info btn-xs\' href=" ' . BASE_URL . '/course/moncourse/' . $course->id . ' "><span class="glyphicon glyphicon-edit"></span> Modifier</a></td><td><a href=" ' . BASE_URL . '/course/deleteCourse/' . $course->id . ' " class="btn btn-danger btn-xs" onclick="return confirm(\'Voulez-vous vraiment supprimer cette évaluation ?\');"><span class="glyphicon glyphicon-remove"></span> Supprimer</a></td>';
                echo '</tr>';
            }
            ?>
