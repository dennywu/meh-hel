<html>
    <head>
        <link href="/meh-hil/css/site.css" rel="stylesheet" type="css/text"/>
        <link href="/meh-hil/css/admin/home.css" rel="stylesheet" type="css/text"/>
        <script src="/meh-hil/javascript/plugin/jquery.min.js"></script>
        <script src="/meh-hil/javascript/plugin/DateFormat.js"></script>
        <script src="/meh-hil/javascript/plugin/PrintDocument.js"></script>
        <script src="/meh-hil/javascript/plugin/CurrencyRounding.js"></script>
        <script src="/meh-hil/javascript/admin/home.js"></script>
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
            <table cellpadding="0" cellspacing="0" width="80%" id="tblPenyewaan">
                <thead>
                    <tr>
                        <td>Nomor Rental</td>
                        <td>Nama Pelanggan</td>
                        <td>Tangal Rental</td>
                        <td>Total</td>
                        <td>Status</td>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
        <?php
            }
        ?>
    </body>
</html>