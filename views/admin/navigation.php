<link href="/meh-hil/css/navigation.css" rel="stylesheet" type="css/text"/>
<nav id="globalheader" class='apple globalheader-js noinset svg globalheader-loaded globalheader-loaded'>
			<ul id="globalnav" role="navigation">
				<li id="gn-store">
					<a href="/meh-hil/views/admin/home.php">
						<span>Penyewaan</span>
					</a>
				</li>
                                <li>
					<a href="/meh-hil/views/admin/category.php">
						<span>Kategori</span>
					</a>
				</li>
				<li>
					<a href="/meh-hil/views/admin/book.php">
						<span>Buku</span>
					</a>
				</li>
				<li>
					<a href="/meh-hil/views/admin/customer.php">
						<span>Pelanggan</span>
					</a>
				</li>
                                <li>
					<a href="/meh-hil/Application/admin/logout.php">
						<span>Keluar</span>
					</a>
				</li>
				<li style="width:100%;text-align:right;padding-right:5px;padding-left:50px;">
					<div>
                                            <span style="text-align:right;padding-right:20px;color:#ccc;text-shadow: 0 0 0;">
                                                <?php 
                                                    echo "Selamat Datang, <strong>".$_SESSION['admin']."</strong>"; 
                                                ?>
                                            </span>
					<div>
				</li>
			</ul>
</nav>