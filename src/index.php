<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Blog Template for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/blog/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="css/stylesheet.css" rel="stylesheet">
</head>

<body>
    <div style="margin:30px;">


        <?php
include 'conf/gen.conf.php';
include "core/loader.php";
include "core/database.php";


echo "<h1>Bruno HUDBERT</h1>";
echo "<hr style=\"	float:left;border-top: 3px double #8c8b8b;width:360px;\">";
echo "</br></br>Transfert du domaine vers VPS : OK";
echo "</br>SSL et redirection https : OK";

echo "</br>Developpement du site en cours :";
echo "</br>&nbsp;&nbsp;&nbsp;- Frontend : <a href=\"webroot\index.html\"> OK</a>";
echo "</br>&nbsp;&nbsp;&nbsp;- Backend PHP : Work in progress";


?>

    </div>
</body>

</html>
