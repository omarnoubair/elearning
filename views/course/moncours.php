<?php
foreach ($moncourse as $c) {
    $titre = $c->titre;
    $id = $c->id;
    $description = $c->description;
    $idcategorie = $c->categorie;
    $doc = $c->doc;
    $video = $c->video;
    $lvl = $c->lvl;
}
?>
<form class="form-horizontal" id="addprof" method="post" action="<?php echo BASE_URL . "/course/updateCourseAction/" . $id ?>">
    <fieldset>

        <!-- Form Name -->
        <legend>Modifier le cours de <?php echo $titre ?></legend>
        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="titre">Titre</label>
            <div class="col-md-4 control-label">
                <input id="titre" name="titre" type="text" placeholder="Titre" class="form-control input-md" value="<?php echo $titre; ?>" >  
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="selectbasic">Catégorie</label>
            <div class="col-md-5">
                <select  id="categorie" name="categorie" title="Ce champ est oligatoire"  class="form-control required">
                    <option value="">Choisir la catégorie</option>
                    <?php
                    foreach ($catList as $cat) {
                        if ($cat->id == $idcategorie) {
                            ?>
                            <option  selected="selected" value="<?php echo $cat->id; ?>"><?php echo $cat->categorie; ?></option>
                            <?php
                        } else {
                            ?>
                            <option value="<?php echo $cat->id; ?>"><?php echo $cat->categorie; ?></option>
                            <?php
                        }
                        ?>
                    <?php } ?>

                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="description">Description</label>
            <div class="col-md-5">
                <textarea   placeholder="Description..." rows="5" name="description" id="description" class="form-control required "><?php echo $description; ?></textarea>
            </div>
        </div>

        <!-- File Button --> 
        <div class="form-group">
            <label class="col-md-4 control-label" for="document">Document</label>
            <div class="col-md-4">
                <input value="<?php echo $doc ?>" id="document" name="document" class="input-file" type="file">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="video">Video</label>
            <div class="col-md-6 control-label">
                <input value="<?php echo $video ?>" id="video" name="video" type="text" placeholder="Url video" class="form-control input-md" >  
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="selectbasic">Niveau</label>
            <div class="col-md-5">
                <select  id="niveau" name="niveau" title="Ce champ est oligatoire"  class="form-control required">
                    <option value="">Choisir le niveau</option>
                    <?php
                    if ($lvl == 1) {
                        ?>
                        <option selected="selected" value="1">Licence 1</option>
                        <option value="2">Licence 2</option>
                        <option value="3">Licence 3</option>
                        <option value="4">Master 1</option>
                        <option value="5">Master 2</option>
                        <?php
                    }
                    if ($lvl == 2) {
                        ?>
                        <option value="1">Licence 1</option>
                        <option selected="selected"  value="2">Licence 2</option>
                        <option value="3">Licence 3</option>
                        <option value="4">Master 1</option>
                        <option value="5">Master 2</option>
                        <?php
                    }
                    if ($lvl == 3) {
                        ?>
                        <option value="1">Licence 1</option>
                        <option value="2">Licence 2</option>
                        <option selected="selected" value="3">Licence 3</option>
                        <option value="4">Master 1</option>
                        <option value="5">Master 2</option>
                        <?php
                    }
                    if ($lvl == 4) {
                        ?>
                        <option value="1">Licence 1</option>
                        <option value="2">Licence 2</option>
                        <option value="3">Licence 3</option>
                        <option selected="selected" value="4">Master 1</option>
                        <option value="5">Master 2</option>
                        <?php
                    }
                    if ($lvl == 5) {
                        ?>
                        <option value="1">Licence 1</option>
                        <option value="2">Licence 2</option>
                        <option value="3">Licence 3</option>
                        <option value="4">Master 1</option>
                        <option selected="selected" value="5">Master 2</option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>

        <!-- Button (Double) -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="ValiderBtn"></label>
            <div class="col-md-2">
                <button type="submit" id="createCours" name="createCours" class="btn btn-success">Enregistrer</button>
            </div>
        </div>

    </fieldset>
</form>
