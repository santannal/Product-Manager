<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="">

        <title>Login Sistema PHP</title>

        <!-- Principal CSS do Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

        <!-- Estilos customizados para esse template -->
        <link href="../css/signin.css" rel="stylesheet" type="text/css"/>
    </head>

    <body class="text-center">
        <form class="form-signin">
            <img class="mb-4" src="../img/user.png" alt="" width="72" height="72">
            
            <h1 class="h3 mb-3 font-weight-normal">Entre - Admin</h1>
            <label for="inputEmail" class="sr-only">Endereço de email</label>
            <input type="email" id="inputEmail" class="form-control mb-2" placeholder="Seu email" required autofocus name="txtemail">
 
            <label for="inputPassword" class="sr-only">Senha</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Senha" required name="txtsenha">
            
            <input class="btn btn-lg btn-danger btn-block" type="submit" value="Acessar" name="btnacessar">
            <p class="mt-5 mb-3" style="color: white;">&copy; 2022</p>
        </form>
    </body>
</html>