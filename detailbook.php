
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
        <title></title>
    </head>
    <body>
        <?php include_once 'views/navigation.php'; ?>
        <?php
             require_once('Application/mysql.class.php');
             require_once('Application/global.inc.php');
             require_once('Application/helper.php');
             require_once('Application/repository/BookRepository.php');
             require_once('views/detailbook.php');
        ?>
        <div class="container-page">
            <table cellspacing="0" cellpadding="0" width="100%;">
                <tbody>
                    <tr>
                        <td width="625px" colspan="3">
                            <ul id="list-books">
                                <?php 
                                    $book = getBookById($_GET[id]);
                                    echo showDetailBook($book);
                                ?>
                            </ul>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
	<?php include_once 'views/footer.php'; ?>
    </body>
</html>
