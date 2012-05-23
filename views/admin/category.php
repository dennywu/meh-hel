<html>
    <head>
        <link href="/meh-hil/css/site.css" rel="stylesheet" type="css/text"/>
        <link href="/meh-hil/css/admin/category.css" rel="stylesheet" type="css/text"/>
        <script src="/meh-hil/javascript/plugin/jquery.min.js"></script>
        <script src="/meh-hil/javascript/plugin/GetParameter.js"></script>
        <script src="/meh-hil/javascript/admin/category.js"></script>
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
            <table id="tblCategory" cellpadding="0" cellspacing="1" border="0">
                <thead>
                    <tr>
                        <td>*</td>
                        <td class="nameCategory">Nama Kategori</td>
                        <td></td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
        <?php
            }
        ?>
    </body>
</html>
