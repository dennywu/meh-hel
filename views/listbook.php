<?php
    function showBook($books){
        for($i=0;$i < count($books); $i++){
            $html[] = "<li>
            <a href='/meh-hil/images/books/".$books[$i][image]."' target='_blank'>
            <img src='/meh-hil/images/books/".$books[$i][image]."'>
            </a>
            <div class='w320 left'>
            <span class='c_blue_kompas font16'><strong>".$books[$i]['name']."</strong></span><br>
            <span class='font11 c_abu font11'>".$books[$i]['author']."</span><br><br>
            <span class='font11 c_abu font12'>".$books[$i]['publisher']."</span><br>
            <span class='font11 c_abu font12'>Published <strong>".formatDate($books[$i]['published'])."</strong></span>
            </div>
            <div class='right w150'>
            <span class='font14'><b>".convertCurr($books[$i]['amount'])."/ Hari</b></span>
            <br><br>

            <span class='beli'><a href='/meh-hil/Application/cart.php?action=add&id=".$books[$i]['id']."'></a></span>
            </div>
            <div class='clearit pt_5'></div>
            </li>";
        }
        return join('',$html);
    }
    function showPagging($category, $currPage){
        $total = countBook($category);
        $totalPage = ceil($total / 10);
        $html[] = "<div class='pagination'><ul>";
        if($category ==''){
            $url = "/meh-hil/books.php?";
        }
        else{
            $url = "/meh-hil/books.php?p=".$category."&";
        }
        if($currPage > 1){
            $html[] = "<li><a href='".$url."cp=".($currPage-1)."'>Prev</a></li>";
        }      
        for($i = 1; $i <= $totalPage; $i++){
            if($i == $currPage){
               $html[] = "<li class='active'><a>".$i."</a></li>";
            }
            else
            {
                $html[] = "<li><a href='".$url."cp=".$i."'>".$i."</a></li>";
            }
        }
        
        if($currPage < $totalPage){
            $html[] = "<li><a href='".$url."cp=".($currPage+1)."'>Next</a></li>";
        }
        $html[] = "</ul></div>";
        return join("",$html);
    }
?>
