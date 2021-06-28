<div class="col-sm-9 col-md-8">
    <div class="well">
        <h3> Votre score : </h3>

        <h2><?php
            echo $grade . ' / ' . $nbQuestions;
            $average = $grade / $nbQuestions;
            $remains = ($nbQuestions - $grade) / $nbQuestions;
            ?></h2>


        <div class="progress">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow=""
                 aria-valuemin="0" aria-valuemax="100" style="width:<?php echo round($average * 100, 0) . '%'; ?>">
                     <?php echo round($average * 100, 0) . '% (Success)' ?>
            </div>
            <div class="progress-bar progress-bar-danger" role="progressbar" style="width:<?php echo round($remains * 100, 0) . '%'; ?>">
                <?php echo round($remains * 100, 0) . '% (Failure)' ?>
            </div>
        </div>

        <?php if (0 <= $average && $average < 0.33) { ?>
            <div class="progress">
                <div class="progress-bar progress-bar-warning" role="progressbar" style="width:15%">
                         <?php echo 'Débutant' ?>
                </div>
            </div>
        <?php } ?>

        <?php if (0.33 < $average && $average < 0.66) { ?>
            <div class="progress">
                <div class="progress-bar progress-bar-info" role="progressbar" style="width:15%">
                         <?php echo 'Intermédiaire' ?>
                </div>
            </div>
        <?php } ?>

        <?php if (0.66 < $average && $average <= 1) { ?>
            <div class="progress">
                <div class="progress-bar progress-bar-success" role="progressbar" style="width:15%">
                    <?php echo 'Maîtrise' ?>
                </div>
            </div>
        <?php } ?>

    </div>
</div>