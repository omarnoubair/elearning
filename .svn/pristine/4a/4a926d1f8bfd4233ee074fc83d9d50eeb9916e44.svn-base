



<div class="col-sm-9 col-md-8">
    <div class="well">
        <h1> Bienvenue à LearnSharing !</h1><br><br>

        

        <?php

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

        $urlVideo = ClickableLinksANDyoutubeIframe("https://www.youtube.com/watch?v=ohxfoNLEtz0");
        echo $urlVideo;
        ?>

    </div>
</div>

</div>
</div>