<html>
    <head>
        <link href="/meh-hil/css/site.css" rel="stylesheet" type="css/text"/>
        <link href="/meh-hil/css/admin/book.css" rel="stylesheet" type="css/text"/>
        <link href="/meh-hil/css/ModalDialog.css" rel="stylesheet" type="css/text"/>
        <script src="/meh-hil/javascript/plugin/jquery.min.js"></script>
        <script src="/meh-hil/javascript/plugin/DateFormat.js"></script>
        <script src="/meh-hil/javascript/plugin/PrintDocument.js"></script>
        <script src="/meh-hil/javascript/plugin/CurrencyRounding.js"></script>
        <script src="/meh-hil/javascript/plugin/ModalDialog.js"></script>
        <script src="/meh-hil/javascript/admin/book.js"></script>
    </head>
    <body>
        <?php 
            session_start();
            if($_SESSION["admin"] == null || $_SESSION["admin"] == "")
            {
                header("Location:/meh-hil/login.php");
            }else{
                include_once "navigation.php";
            
        ?>
        <div class="container-page">
            <table cellpadding="0" cellspacing="0" width="100%" id="tblbook">
                <thead>
                    <tr>
                        <td width="50px;"></td>
                        <td>Nama Buku</td>
                        <td>Kategori</td>
                        <td>Author</td>
                        <td>Publisher</td>
                        <td>Published</td>
                        <td class='text-right'>Amount</td>
                        <td width= 30px;>Stock</td>
                        <td width='45px'></td>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
			<div width='100%' style="margin-top:5px;text-align:center;"><input type='button' onclick="createBook()" value='Tambah Buku Baru' /></div>
        </div>
        <?php
            }
        ?>
    </body>
</html>
