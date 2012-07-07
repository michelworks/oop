<?php

$footer = <<<FOOTER
    
    <script src="http://jquery-translate.googlecode.com/files/jquery.translate-1.3.9.min.js"></script>
    <script>
    (function($){
        $.fn.showdelay = function(){
            var delay = 0;
            return this.each(function(){
                $(this).delay(delay).fadeIn(1800);
                delay += 1000;
            });
        };
    })(jQuery);

    $(window).load(function(){
    $('body').translate('EN','{$this->lang}');
    });
    
    $(document).ready(function() {
        $('div.question').showdelay();
    
    });
    
    </script>

</body>
</html>
FOOTER;

?>
