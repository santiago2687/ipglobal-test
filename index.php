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
        <div class="jumbotron">
            <h3 class="text-center">Search For Any Movie</h3>
            <form id="searchForm">
                <input type="text" class="form-control" id="searchText" placeholder="Search Movies...">
            </form>
            <div class="row">
                <div class="col text-center">
                    <button class="btn btn-primary" id="btn-search-movie">Search Movies</button>
                </div>
            </div>
        </div>

        <div class="container">
            <div id="movies" class="row"></div>
        </div>

        <script src="node_modules\jquery\dist\jquery.min.js"></script>
        <script src="node_modules\bootstrap\dist\js\bootstrap.min.js"></script>
        <script src="node_modules\axios\dist\axios.min.js"></script>
        <script src="public/js/movies.js"></script>

</body>

</html>