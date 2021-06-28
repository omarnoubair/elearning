
<div class="col-sm-9 col-md-8">
    <div class="well">
        <?php echo ( $this->session->getNotification()); ?>
        <h1 class="section-title"> Créer Une évaluation</h1>
        <form id="question-form"class="question form-horizontal" method="post" action="<?php echo BASE_URL . "/evaluation/createEvaluationAction" ?>">
            <fieldset>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="">Titre de l'évaluation</label>  
                    <div class="col-md-6">
                        <input id="evaluationTitle" name="evaluationTitle" type="text" placeholder="" class="form-control input-md">  
                    </div>
                       
                    <label class="col-md-4 control-label" for="selectbasic">Cours</label>
                    <div class="col-md-5">
                        <select id="course" name="course" title="Ce champ est oligatoire"  class="form-control required">
                            <option value="">Choisir un cours</option>
                            <?php
                            foreach ($coursList as $c) { ?>
                                <option value="<?php echo $c->id; ?>"><?php echo $c->titre; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group col-md-11">
                        <input id="evaluationTitleSubmit"type="submit" value="valider" class="btn btn-primary  pull-right">
                    </div>

                </div>

                <!-- Select Basic -->


            </fieldset>
        </form>




    </div>
</div>

</div>
</div>

</div>
</div>





