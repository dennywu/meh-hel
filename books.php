
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="/meh-hil/css/site.css" rel="stylesheet" type="css/text"/>
        <link href="/meh-hil/css/books.css" rel="stylesheet" type="css/text"/>
        <link href="/meh-hil/css/bootstrap.css" rel="stylesheet" type="css/text"/>
        <script src="/meh-hil/javascript/plugin/jquery.min.js"></script>
        <script src="/meh-hil/javascript/plugin/CurrencyRounding.js"></script>
        <script src="/meh-hil/javascript/plugin/DateFormat.js"></script>
        <!--<script src="/meh-hil/javascript/book.js"></script>-->
        <title></title>
    </head>
    <body>
        <?php include_once 'views/navigation.php'; ?>
        <?php
             require_once('Application/mysql.class.php');
             require_once('Application/global.inc.php');
             require_once('Application/helper.php');
             require_once('Application/repository/BookRepository.php');
             require_once('views/listbook.php');
             require_once('views/listcategory.php');
             if($_GET["cp"] == null){
                 $currPage = 1;
             }
             else{
                 $currPage = $_GET["cp"];
             }
             
             if($_GET['p'] == null){
                $books = getBooks($currPage - 1);
             }
             else{
                $books = getBookByCategory($_GET['p'], $currPage - 1);
             }
             
        ?>
        <div class="container-page">
            <table cellspacing="0" cellpadding="0" width="100%;">
                <thead>
                    <tr>
                        <th style="text-align:right;width:625px;" colspan="3">
                            <div>
                                <?php
                                    if($_GET['p'] == null)
                                        $category = "";
                                    else
                                        $category = $_GET['p'];
                                    echo showPagging($category, $currPage);
                                ?>
                            </div>
                        </th>
                        <th valign="bottom">
                            
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td width="625px" colspan="3">
                            <ul id="list-books">
                                <?php 
                                    echo showBook($books);
                                ?>
                            </ul>
                        </td>
                        <td valign="top" width="290px" align="right">
                            <table id="list-category" cellpadding="0" cellspacing="0" width="100%">
                                <?php
                                    $category = getCategory();
                                    echo showCategory($category);
                                ?>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
	<?php include_once 'views/footer.php'; ?>
    </body>
</html>
