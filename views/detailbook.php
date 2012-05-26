<?php
    function showDetailBook($book){
            $html[] = "<li>
            <a href='/meh-hil/images/books/".$book[image]."' target='_blank'>
            <img src='/meh-hil/images/books/".$book[image]."'>
            </a>
            <div class='w320 left'>
            <span class='c_blue_kompas font16'><strong>".$book['name']."</strong></span><br>
            <span class='font11 c_abu font11'>".$book['author']."</span><br><br>
            <span class='font11 c_abu font12'>".$book['publisher']."</span><br>
            <span class='font11 c_abu font12'>Published <strong>".formatDate($book['published'])."</strong></span>
            </div>
            <div class='right w150'>
            <span class='font14'><b>".convertCurr($book['amount'])."/ Hari</b></span>
            <br><br>

            <span class='beli'><a href='/meh-hil/Application/cart.php?action=add&id=".$book['id']."'></a></span>
            </div>
            <div class='clearit pt_5'></div>
            </li>
            <div style='margin-left:10px;font-size:14px;font-weight:bold;'>Sinopsis:</div>
            <div style='margin-left:10px;text-indent: 40px;text-align: justify;padding-right:50px;'>".$book[sinopsi]."</div>
            ";
        return join('',$html);
    }
?>
