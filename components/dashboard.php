<?php include 'dynamic/header.php'; ?>
<link rel="stylesheet" type="text/css" href="../css/default.css">
<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<?php include '../database/db.php'; ?>

<!-- navbar and logo -->
<nav class="bg-transparent py-1 px-4">
    <div class="row">
        <div class="col-4 dfjsac">
            <img src="../images/logo.png" class="cursor-pointer rounded-5" alt="Library-Logo" width="80" height="80">
            <span class="bold h2 text-danger poetsen-one-regular cursor-pointer">Library</span>
        </div>
        <div class="col-8 dfjsac">
            <h3 class="mt-2 mx-5 bold">LIBRARY MANAGEMENT SYSTEM</h3>
        </div>
    </div>
</nav>

<!-- Added book message display -->
<h6 class="text-danger  msg-display" align='center'><?php if (isset($_GET['msg'])) {
                                                        echo $_GET['msg'];
                                                    } ?></h6>

<div class="container-fluid">
    <div class="row p-0">
        <nav id="sidebar" class="col-md-3 col-lg-2 p-0 d-md-block sidebar bg-dark ">
            <div class="sidebar-sticky bg-dark">
                <div class=" text-center text-light py-3  m-0 border-bottom border-secondary">
                    <img src="../images/admin_logo.png" class="cursor-pointer rounded-5 border-4 border-light" alt="Library-Logo" width="50" height="50">
                    <span class="bold text-off p-2">admin</span>
                </div>
                <ul class="nav flex-column mt-4">

                    <li class="nav-item text-start px-4 py-2 bg-secondary mx-2  rounded-3 cursor-mouse">
                        <span class="bg-transparent text-light fs-5">Dashboard</span>
                    </li>

                    <a href="book_add.php" class="text-decoration-none mt-2">
                        <li class="text-start px-4 py-2 sidebar-btn mx-2 rounded-3 cursor-pointer">
                            <span class="bg-transparent text-light fs-5">Books</span>
                        </li>
                    </a>

                    <a href="student_add.php" class="text-decoration-none mt-2">
                        <li class="text-start px-4 py-2 sidebar-btn mx-2 rounded-3 cursor-pointer">
                            <span class="bg-transparent text-light fs-5">Students</span>
                        </li>
                    </a>

                    <a href="open_records.php" class="text-decoration-none mt-2">
                        <li class="text-start px-4 py-2 sidebar-btn mx-2 rounded-3 cursor-pointer">
                            <span class="bg-transparent text-light fs-5">Open Records</span>
                        </li>
                    </a>
                    <a href="closed_records.php" class="text-decoration-none mt-2">
                        <li class="text-start px-4 py-2 sidebar-btn mx-2 rounded-3 cursor-pointer">
                            <span class="bg-transparent text-light fs-5">Closed Records</span>
                        </li>
                    </a>

                    <a href="../index.php" class="text-decoration-none mt-2">
                        <li class="text-start px-4 py-2 sidebar-btn mx-2 rounded-3 cursor-pointer">
                            <span class="bg-transparent text-danger bold fs-5">Logout</span>
                        </li>
                    </a>

                </ul>
            </div>
        </nav>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 bg-library-img">
            <div class="row mt-5">
                <div class="col-4 dfjcac">
                    <div class="row p-4 bg-warning rounded-4 box-shadow-bottom w-75">
                        <div class="col-4 bold fs-1">
                            <?php
                            $query = "SELECT * FROM students WHERE status = 1";
                            $result = mysqli_query($conn, $query);
                            echo mysqli_num_rows($result);
                            ?>
                        </div>
                        <div class="col-8 bold fs-3">Students</div>
                    </div>
                </div>
                <div class="col-4 dfjcac">
                    <div class="row p-4 bg-primary rounded-4 box-shadow-bottom w-75">
                        <div class="col-4 bold fs-1">
                            <?php
                            $query = "SELECT * FROM books WHERE status = 1";
                            $result = mysqli_query($conn, $query);
                            echo mysqli_num_rows($result);
                            ?>
                        </div>
                        <div class="col-8 bold fs-3">Books</div>
                    </div>
                </div>
                <div class="col-4 dfjcac ">
                    <div class="row p-4 bg-green-light rounded-4 box-shadow-bottom w-75">
                        <div class="col-4 bold fs-1">
                        <?php
                            $query = "SELECT * FROM open_records WHERE status = 1";
                            $result = mysqli_query($conn, $query);
                            echo mysqli_num_rows($result);
                            ?>
                        </div>
                        <div class="col-8 bold fs-5">Active Borrowed</div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<?php include 'dynamic/footer.php'; ?>