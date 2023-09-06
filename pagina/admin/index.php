<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="icon" href="img/icone.png" type="image/x-icon">
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark mb-3" style="background-color:	#48D1CC;">
        <a class="navbar-brand" href="#"><i class="bi bi-bag-check-fill"></i></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="?p=pagina-inicial">Página Inicial</a>
                <a class="nav-item nav-link active" href="?p=categoria/listarLike">Categoria</a>
                <a class="nav-item nav-link active" href="?p=produto/listarLike">Produto</a>
            </div>
        </div>
    </nav>


    <div class="row m-5">
        <div class="col-12">


            <?php
            $pagina = filter_input(INPUT_GET, 'p');
            if (empty($pagina) || $pagina == "index") {
                include_once 'pagina-inicial.php';
            } else {
                if (file_exists($pagina . '.php')) {
                    include_once $pagina . '.php';
                } else {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        Erro 404, página não encontrada! </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <script src="../js/jquery-3.6.0.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>

    <script src="../js/script.js" type="text/javascript"></script>


</body>

</html>