
<body>
    <div class="container">
    <div class="row  col-md-8 col-md-offset-1 custyle ">
    <table class="table table-striped custab ">
    <thead>
    <a href="<?php echo BASE_URL . "/administration/addCategorie" ?>" class="btn btn-primary btn-xs pull-right "><b>+</b> Add new categories</a>
        <tr>
            <tr>
                <th>Id Categorie</th>
                <th>Nom Categorie</th>
                <th colspan="2">Action</th>
        </tr>
    </thead>
       <?php
       foreach ($CategorieList as $Categorie){?>
           
    <br>
            <tr>
            <td><?php echo  $Categorie->id ?> </td>
            <td><?php echo  $Categorie->categorie?></td>
            <td class="text-center" width="30px">
                <a class='btn btn-info btn-xs' href="<?php echo BASE_URL . '/administration/modCategorie/' . $Categorie->id ?>"><span class="glyphicon glyphicon-edit"></span> Modifier</a></td>
            <td>
                <a href="<?php echo BASE_URL . '/administration/deleteCategorie/' . $Categorie->id ?>" class="btn btn-danger btn-xs" onclick="return confirm('Voulez-vous vraiment supprimer cette catégorie?');"><span class="glyphicon glyphicon-remove"></span> Supprimer</a></td>
        
         </tr>
       <?php } ?> 
         
    </table>
    </body>
  