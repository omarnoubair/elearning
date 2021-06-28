
        <?php
        $iduser = $this->session->user("id");       
        foreach ($showCourse as $t) {
            $idcour = $t->idcourse;
            $nom = $t->nom;
            $titre = $t->titre;
            $description = $t->description;
            $video = $t->video;
            $doc = $t->doc;
        }   
        foreach ($abo as $t) {
            $abo = $t->n;
        }
//        foreach ($evaluation as $eva){
//            $evaluation = $eva->id;
//        }
        
        //echo 'test : ' . $evaluation->titre;
        function ClickableLinksANDyoutubeIframe($text) {

            $v = $text;
            $text = html_entity_decode($text);
            $text = strip_tags($text);
            $c = "youtube";
            $v = @eregi_replace('(((f|ht){1}tp://)[-a-zA-Z0-9@:%_\+.~#?&//=]+)', '<a href="\\1" target=_blank>\\1</a>', $v);
            $v = @eregi_replace('(((f|ht){1}tps://)[-a-zA-Z0-9@:%_\+.~#?&//=]+)', '<a href="\\1" target=_blank>\\1</a>', $v);
            $v = @eregi_replace('([[:space:]()[{}])(www.[-a-zA-Z0-9@:%_\+.~#?&//=]+)', '\\1<a href="http://\\2" target=_blank>\\2</a>', $v);
            $v = @eregi_replace('([_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3})', '<a href="mailto:\\1" target=_blank>\\1</a>', $v);
            $v = preg_replace('#<a href="https?://www.' . $c . '.*?>([^>]*)</a>#i', '$1', $v);

            $v = @preg_replace("#http://(www\.)?youtube\.com/watch\?v=([^ &\n]+)(&.*?(\n|\s))?#i", '<div align="center"><object width="480" height="390"><param name="movie" value="http://www.youtube.com/v/$2"></param><embed src="http://www.youtube.com/v/$2" type="application/x-shockwave-flash" width="480" height="390"></embed></object></div>', $v);

            $v = @preg_replace("#https://(www\.)?youtube\.com/watch\?v=([^ &\n]+)(&.*?(\n|\s))?#i", '<div align="center"><object width="480" height="390"><param name="movie" value="http://www.youtube.com/v/$2"></param><embed src="http://www.youtube.com/v/$2" type="application/x-shockwave-flash" width="480" height="390"></embed></object></div>', $v);
            return $v;
        }
        ?>
            
        <div class="col-sm-9 col-md-8">
            <div class="well">
                <table>
                    <td class="text-center" width="100px"></td>
                <td >
                    <?php
                    if($abo == 0 ){
                        ?>
                    <a href="<?php echo BASE_URL . "/course/abonnement/" . $idcour  ?>" class="btn btn-success">
                       <span class="glyphicon glyphicon-star"></span>
                       S'abonner
                    </a>
                    <?php
                    }
                    else{
                    ?>
                    <a href="<?php echo BASE_URL . "/course/abonnement/" . $idcour  ?>" class="btn btn-danger">
                       <span class="glyphicon glyphicon-star-empty"></span>
                       Se desabonner
                    </a>
                    <?php
                    }
                    ?>
                    </td>
                    
                    <td class="text-center" width="50px"></td>           
                  <td>
                    <a href="<?php echo BASE_URL . "/course/signaler/" . $idcour  ?>" class="btn btn-warning">
                       <span class="glyphicon glyphicon-bell"></span>
                       Signaler
                    </a>
                </td>
                <?php if (!empty($evaluation)) { ?>
                <td class="text-center" width="50px"></td>
                <td>
                    
                    <a href="<?php echo BASE_URL . "/evaluation/viewEvaluation/" . $evaluation->id  ?>" class="btn btn-primary">
                        <span class="glyphicon glyphicon-file"></span> 
                        Evaluation
                    </a>
                </td>
                <?php }?>
                </table>
                

                <?php
                        echo '<br> <br> <br>';
                    //echo '<h4>Nom du professeur : ' . $t->idcourse . '<br>';
                    echo '<h4>Nom du professeur : ' . $nom . '</h4><br>';
                    echo '<h3><span style="color:black;">Titre : </span>' . $titre . '</h3><br>';
                    echo '<h4>Description : ' . $description . '</h4><br>';
                    $urlVideo = ClickableLinksANDyoutubeIframe($video);
                    echo $urlVideo;

                
                ?>
            </div>
        <iframe src="<?php echo BASE_URL . DS . 'docs' . DS . $doc ?>" width="700px" height="600px" />
        </div>

    </body>
</html> 