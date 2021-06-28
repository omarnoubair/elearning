<form class="form-horizontal" method="Post" action="<?php echo BASE_URL . "/administration/modCategorieAction" ?>">
    <fieldset>



        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="name">Nom de la categorie</label>  
            <div class="col-md-4">
                <?php
                foreach ($maCategorie as $Categorie) {
                    $id = $Categorie->id;
                    $cat = $Categorie->categorie;
                }
                ?>

                <input id="name1" name="id" type="text" placeholder=""   value="<?php echo $id ?>" class="form-control input-md hidden"></input>
                <input id="name2" name="name" type="text" placeholder="" value="<?php echo $cat ?>" class="form-control input-md"></input>

            </div>
        </div>

        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="submit"></label>
            <div class="col-md-4">
                <button id="submit" name="submit" class="btn btn-primary">Valider</button>
            </div>
        </div>

    </fieldset>
</form>
