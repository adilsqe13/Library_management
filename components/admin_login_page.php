<link rel="stylesheet" type="text/css" href="css/default.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <!-- navbar and logo -->
    <nav class="bg-transparent py-1 px-4">
        <div class="row">
            <div class="col-4 dfjsac">
                <img src="images/logo.png" class="cursor-pointer rounded-5" alt="Library-Logo" width="80" height="80">
                <span class="bold h2 text-danger poetsen-one-regular cursor-pointer">Library</span>
            </div>
            <div class="col-8 dfjsac">
                <h3 class="mt-2 mx-5 bold">LIBRARY MANAGEMENT SYSTEM</h3>
            </div>
        </div>
    </nav>

    <?php
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        if ($email === 'admin@gmail.com' && $password === 'admin123') {
            header('location: components/dashboard.php');
        } else {
            header('location: index.php?msg=Invalid Credentials');
        }
    }
    ?>

    <div class="container-fluid padding-y-100 bg-library-img" style="height: 615px;" align='center'>
        <div class="row">
            <div class="col-8 dfjeac"></div>
            <div class="col-4 dfjsac">
                <form method="post" class="p-3 rounded-5 admin-login-form">
                    <h1 class="bold text-dark">Login</h1>
                    <div class="mt-5">
                        <input type="email" name="email" class="form-control p-3 fs-5" placeholder="Email" aria-describedby="emailHelp">
                    </div>
                    <div class="mt-4">
                        <input type="password" name="password" class="form-control p-3 fs-5 " placeholder="Password">
                    </div>
                    <!-- Invalid Credential Message -->
                    <div style="height: 30px">
                        <h6 class="text-danger mt-2" align='left'><?php if (isset($_GET['msg'])) {
                                                                        echo $_GET['msg'];
                                                                    } ?></h6>
                    </div>
                    <input type="submit" name="login" class="btn btn-dark btn-lg form-control p-2 box-shadow margin-top-75 " value="Login"></input>
                </form>
            </div>
        </div>
    </div>