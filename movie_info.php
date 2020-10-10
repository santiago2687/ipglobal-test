<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>MovieInfo</title>
    <link rel="stylesheet" href="public/css/bootstrap/bootstrap.scss">
    <link rel="stylesheet" href="public/css/style.scss">
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">MovieInfo</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div id="movie" class="well"></div>
    </div>

    <script src="node_modules\jquery\dist\jquery.min.js"></script>
    <script src="node_modules\bootstrap\dist\js\bootstrap.min.js"></script>
    <script src="node_modules\axios\dist\axios.min.js"></script>
    <script src="public/js/movies.js"></script>

    <script>
        getMovie();
    </script>
</body>

</html>