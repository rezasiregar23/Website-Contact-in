
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contact</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a class="navbar-brand" href="index.php">Contact</a>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
            <a class="nav-link" href="/list">List Contact</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="contact-new.php">New Contact</a>
        </li>
                <li class="nav-item active">
            <a class="nav-link" href="/contact">Favorite</a>
        </li>

                <li class="nav-item active">
            <a class="nav-link" href="/block">Block</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="/">Exit</a>
        </li>
            </ul>
</nav>

    <div class="container text-center" style="margin-top:20px">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form method="post" action="action_get_name.php">
                <img width="150px" src="images\logoo.jpg">
                <h3 class="h3 mb-3 font-weight-normal">Contact-in Aja</h3>
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Nama/Username" required autofocus>
                </div>
               
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-sm btn-primary btn-block" type="submit">Login</button>
                    </div>
                </div>
                <input type="hidden" name="action" value="tell-name">
            </form>
        </div>
    </div>
    </div>

</body>

</html>