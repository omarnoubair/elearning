
<div class="col-sm-9 col-md-9">
    <div class="well">


        <?php echo ( $this->session->getNotification()); ?>
        <h2 class="section-title"><?php echo $evaluation->titre ?></h2>

        <form id="question-form"class="question form-horizontal" method="post" action="<?php echo BASE_URL . "/evaluation/editEvaluationAction" ?>">
            <h2 class="section-title pull-center">Ajouter Des Questions</h2>
            <fieldset>
                <!-- Text input-->
                <input type="hidden" name="evaluation_id" value="<?php echo $evaluation->id ?>">
                <div class="form-group">
                    <label class="col-md-3 control-label" for="">Question</label>  
                    <div class="col-md-8">
                        <input id="question" name="question" type="text" placeholder="" class="form-control input-md">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="">Réponse correcte</label>  
                    <div class="col-md-8">
                        <input id="correctResponse" name="correctResponse" type="text" placeholder="" class="form-control input-md">
                    </div>
                </div>
                <!-- Textarea -->
                <div>
                    <div id="c"class="form-group QtypeField" style="" >
                        <label class="col-md-3 control-label" for="">Autres réponses </label>
                        <div class="col-md-4">                     
                            <textarea class="choiceQ form-control  required" placeholder="" id="opArea" name="options" data-trigger="hover" data-toggle="popover" data-html="true" data-placement="right"  data-content="Une Option par ligne.<br>10 options maximum.<br> 30 caractères maximum pour chaque option."></textarea>
                        </div>
                    </div>
                </div>
                <div id="addQuestion" class="form-group col-md-2 pull-right" style="display:hidden">
                    <input  type="submit" value="valider" class="btn btn-primary  pull-right" >
                </div>


            </fieldset>
        </form>

        <div id="listQ">
            <h2 class="section-title pull-center">Liste des Questions</h2>
            <h4 class="alert alert-info">les questions  peuvent être déplacer en drag & drop</h4>
            <table id="Qtable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Question</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="sortable">


                    <?php if (!empty($questions)) { ?>
                        <?php foreach ($questions as $q) { ?>
                            <tr id="<?php echo 'sort_' . $q->id ?>">
                                <td><?php echo $q->question ?></td>
                                <td>
                                    <form class="deleteForm" action="<?php echo BASE_URL . "/evaluation/deleteQuestion" ?>" method="POST" validate>
                                        <input type="hidden" name="evaluation_id" value="<?php echo $evaluation->id ?>">  
                                        <input type="hidden" name="id" value="<?php echo $q->id ?>"> 
                                        <button type="submit"  class="btn btn-danger" >Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>



                </tbody>
            </table>
            
        </div>   

    </div>




</div>
</div>

</div>
</div>

</div>
</div>

<script>
    var cible = "<?php echo BASE_URL . "/evaluation/ajaxOrderQuestions" ?>";

    $(document).ready(function () {
        var fixHelper = function (e, ui) {
            ui.children().each(function () {
                $(this).width($(this).width());
            });
            return ui;
        };
        $("#sortable").sortable({
            // initialisation de Sortable sur #list-photos
            axis: 'y',
            helper: fixHelper,
            // classe à ajouter à l'élément fantome
            update: function () {  // callback quand l'ordre de la liste est changé
                var order = $("#sortable").sortable('serialize'); // récupération des données à envoyer
                $.ajax({
                    data: order,
                    type: "POST",
                    url: cible,
                    success: function (data)
                    {

                    }
                });



            }
        });
        $("#sortable").disableSelection();
    });

    var lines = 10;
    var linesUsed = $('#linesUsed');

    $('.choiceQ').keydown(function (e) {

        newLines = $(this).val().split("\n").length;
        linesUsed.text(newLines);

        if (e.keyCode == 13 && newLines >= lines) {
            linesUsed.css('color', 'red');
            return false;
        }
        else {
            linesUsed.css('color', '');
        }
    });
    //max de char dans le textarea
    var maxLength = 30;
    $('.choiceQ').on('input focus keydown keyup', function () {
        var text = $(this).val();
        var lines = text.split(/(\r\n|\n|\r)/gm);
        for (var i = 0; i < lines.length; i++) {
            if (lines[i].length > maxLength) {
                lines[i] = lines[i].substring(0, maxLength);
            }
        }
        $(this).val(lines.join(''));
    });

    $('[data-toggle="popover"]').popover({container: 'body'});


</script>

<script>

    $.validator.addMethod('le', function (value, element, param) {
        return this.optional(element) || value < $(param).val();
    }, 'Invalid value');
    $.validator.addMethod('ge', function (value, element, param) {
        return this.optional(element) || value > $(param).val();
    }, 'Invalid value');

    $("#question-form").validate({
        rules: {
            question: "required",
            minField: {required: true, le: '#max'},
            maxField: {required: true, ge: '#min'},
            opArea: "required"
        },
        messages: {
            question: "ce champ est obligatoire",
            minField: {
                le: 'Doit être plus petit que max',
                required: "Veuillez renseinger ce champ "
            },
            maxField: {
                ge: 'Doit être plus grand que min',
                required: "Veuillez renseinger ce champ "
            },
            opArea: "required"

        }
    });


</script>