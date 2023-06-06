<?php
session_start();
if (empty($_SESSION['namauser']) && empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=index.php><b>LOGIN</b></a></center>";
} else {
    ?>
    <html>
    <head>
        <title>:: MEMBUAT CMS ::</title>
        <link href="../config/adminstyle.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
    <div id="header">
        <div id="content">
            <?php include "content.php"; ?>
        </div>
        <div id="menu">
            <ul>
                <li><a href="media.php?module=home">&#187; Home</a></li>
                <?php include "menu.php"; ?>
                <li><a href="logout.php">&#187; Logout</a></li>
            </ul>
            <p>&nbsp;</p>
        </div>
        <div id="footer">
            Copyright &copy; 2012
        </div>
    </body>
    </html>
    <?php
}
?>
