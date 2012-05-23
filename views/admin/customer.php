<html>
    <head>
        <link href="/meh-hil/css/site.css" rel="stylesheet" type="css/text"/>
        <link href="/meh-hil/css/admin/customer.css" rel="stylesheet" type="css/text"/>
        <script src="/meh-hil/javascript/plugin/jquery.min.js"></script>
        <script src="/meh-hil/javascript/admin/customer.js"></script>
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
                            <table id="tblCustomer" cellpadding="0" cellspacing="0" border="0" width="80%">
                                <thead>
                                    <tr>
                                        <td>Nama</td>
                                        <td>Alamat</td>
                                        <td>Kota</td>
                                        <td>Negara</td>
                                        <td>No. Telp</td>
                                        <td>Email</td>
                                    </tr>
                                <thead>
                                <tbody>
                                </tbody>
                            </table>
            </div>
        <?php
            }
        ?>
    </body>
</html>