<?php
include("SessionValidation.php");
$adminName=$_SESSION['aname'];
include("../Assets/Connection/connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Admin Homepage</title>
    <!-- Bootstrap Core CSS -->
    <link href="../Assets/Templates/Admin/assets/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../Assets/Templates/Admin/assets/node_modules/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="../Assets/Templates/Admin/assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <!--c3 CSS -->
    <link href="../Assets/Templates/Admin/assets/node_modules/c3-master/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../Assets/Templates/Admin/css/style.css" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="../Assets/Templates/Admin/css/pages/dashboard1.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="../Assets/Templates/Admin/css/colors/default.css" id="theme" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<style>
    .footer
    {
        display:flex;
        justify-content:center;
    }
</style>
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Admin Wrap</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="Homepage.php">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="../Assets/Templates/Admin/assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="../Assets/Templates/Admin/assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                         <!-- dark Logo text -->
                         <img src="../Assets/Templates/Admin/assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                         <!-- Light Logo text -->    
                         <img src="../Assets/Templates/Admin/assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="fa fa-bars"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item hidden-xs-down search-box"> <a class="nav-link hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="fa fa-search"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i class="fa fa-times"></i></a></form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../Assets/Templates/Admin/assets/images/users/1.jpg" alt="user" class="" /> <span class="hidden-md-down">Mark Sanders &nbsp;</span> </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a class="waves-effect waves-dark" href="Homepage.php" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Home Page</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="NewAuthor.php" aria-expanded="false"><i class="fa fa-smile-o"></i><span class="hide-menu">New Author</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="VerifiedAuthors.php" aria-expanded="false"><i class="fa fa-globe"></i><span class="hide-menu">Verified Author</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="RejectedAuthors.php" aria-expanded="false"><i class="fa fa-bookmark-o"></i><span class="hide-menu">Rejected Authors</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="" aria-expanded="false"><i class="fa fa-bookmark-o"></i><span class="hide-menu">Users</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="District.php" aria-expanded="false"><i class="fa fa-bookmark-o"></i><span class="hide-menu">Add District</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="Place.php" aria-expanded="false"><i class="fa fa-bookmark-o"></i><span class="hide-menu">Add Place</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="Genre.php" aria-expanded="false"><i class="fa fa-bookmark-o"></i><span class="hide-menu">Add Genre</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="Category.php" aria-expanded="false"><i class="fa fa-bookmark-o"></i><span class="hide-menu">Add Category</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="AddPackage.php" aria-expanded="false"><i class="fa fa-bookmark-o"></i><span class="hide-menu">Add Package</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="pages-error-404.html" aria-expanded="false"><i class="fa fa-question-circle"></i><span class="hide-menu">404</span></a>
                        </li>
                    </ul>
                    <!--<div class="text-center m-t-30">
                        <a href="https://wrappixel.com/templates/adminwrap/" class="btn waves-effect waves-light btn-info hidden-md-down"> Upgrade to Pro</a>
                    </div>-->
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Dashboard</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Sales Chart and browser state-->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block">
                                    <div>
                                        <h5 class="card-title m-b-0">Sales Chart</h5>
                                    </div>
                                </div>
                                <canvas id="salesChart" width="400" height="200"></canvas></div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    
                </div>
                <!-- ============================================================== -->
                <!-- End Sales Chart -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Projects of the Month -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex m-b-30 no-block">
                                   
                                <canvas id="genreChart" width="400" height="400"></canvas>
                                </div>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div>
                                        <h5 class="card-title">Top Author Of This Year</h5>
                                    </div>
                                    <div class="ml-auto">
                                    <?php echo date("Y"); ?>
                                    </div>
                                </div>
                                <div class="table-responsive m-t-20 no-wrap">
                                    <table class="table vm no-th-brd pro-of-month">
                                        <?php
                                        $AuthorSlct="SELECT 
    au.author_id,
    au.author_photo,
    au.author_name,
    SUM(w.wallet_credited) AS total_credited,
    COUNT(CASE WHEN w.wallet_credited > 0 THEN 1 END) AS total_credited_transactions
FROM 
    tbl_wallet w
INNER JOIN 
    tbl_author au ON au.author_id = w.author_id
WHERE 
    YEAR(STR_TO_DATE(w.wallet_date, '%Y-%m-%d')) = YEAR(CURDATE())
GROUP BY 
    au.author_id, au.author_photo, au.author_name
ORDER BY 
    total_credited DESC
LIMIT 5;
";
                                        $AuthorResult=$con->query($AuthorSlct);
                                        ?>
                                        <thead>
                                            <tr>
                                                <th>Profile</th>
                                                <th>Name</th>
                                                <th>Books(Rented and sold)</th>
                                                <th>Amount Earned</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while($AuthorData=$AuthorResult->fetch_assoc())
                                            {
                                            ?>
                                            <tr class="active">
                                                <td><span class="round"><img src="../Assets/Files/Author/Photo/<?php echo $AuthorData['author_photo'] ?>" alt="user" width="50"></span></td>
                                                <td><?php echo $AuthorData['author_name'] ?></td>
                                                <td><?php echo $AuthorData['total_credited_transactions'];echo " Books"?></td>
                                                <td><?php echo "&#8377;".$AuthorData['total_credited'] ?></td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                   
                </div>
                
            </div>
            
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer"> Virtual Library Admin Interface </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
     <?php
$sql = "
SELECT 
    DATE_FORMAT(booking_date, '%Y-%m') AS month,
    SUM(booking_amount) AS total_sales
FROM 
    tbl_booking
GROUP BY 
    month

UNION ALL

SELECT 
    DATE_FORMAT(rent_date, '%Y-%m') AS month,
    SUM(rent_amount) AS total_sales
FROM 
    tbl_rent
GROUP BY 
    month

ORDER BY month;
";

$result = $con->query($sql);

$sales_data = [];
while ($row = $result->fetch_assoc()) {
$sales_data[$row['month']] = isset($sales_data[$row['month']]) ? $sales_data[$row['month']] + $row['total_sales'] : $row['total_sales'];
}

// Prepare data for chart
$months = array_keys($sales_data);
$total_sales = array_values($sales_data);

//Pie Chart

$sql1 = "
    SELECT 
        g.genre_name,
        SUM(bk.booking_amount) AS total_sales,
        SUM(r.rent_amount) AS total_rentals
    FROM 
        tbl_genre g
    LEFT JOIN 
        tbl_books b ON g.genre_id = b.book_genre
    LEFT JOIN 
        tbl_booking bk ON b.book_id = bk.book_id AND YEAR(bk.booking_date) = YEAR(CURRENT_DATE)
    LEFT JOIN 
        tbl_rent r ON b.book_id = r.book_id AND YEAR(r.rent_date) = YEAR(CURRENT_DATE)
    GROUP BY 
        g.genre_name
    HAVING 
        total_sales > 0 OR total_rentals > 0;  -- Only include genres with sales or rentals
";

$result1 = $con->query($sql1);

$genres = [];
$total_sales1 = [];
$total_rentals = [];

while ($row1 = $result1->fetch_assoc()) {
    $genres[] = $row1['genre_name'];
    $total_sales1[] = $row1['total_sales'] ? $row1['total_sales'] : 0; // Default to 0 if NULL
    $total_rentals[] = $row1['total_rentals'] ? $row1['total_rentals'] : 0; // Default to 0 if NULL
}

     ?>
   <script>
        const ctx = document.getElementById('salesChart').getContext('2d');
        const salesChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($months); ?>,
                datasets: [{
                    label: 'Total Sales Amount',
                    data: <?php echo json_encode($total_sales); ?>,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 1,
                    fill: true,
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
     <script>
        const ctx2 = document.getElementById('genreChart').getContext('2d');
        
        const salesData = <?php echo json_encode($total_sales1); ?>;
        const rentalsData = <?php echo json_encode($total_rentals); ?>;
        
        // Prepare data for pie chart
        const labels = <?php echo json_encode($genres); ?>;
        const data = salesData.map((value, index) => value + rentalsData[index]); // Combine sales and rentals
        
        // Function to generate a random color
        function getRandomColor() {
            const letters = '0123456789ABCDEF';
            let color = '#';
            for (let i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 12)];
            }
            return color;
        }

        // Generate random colors for each genre
        const backgroundColors = [];
        const borderColors = [];
        const colorSet = new Set(); // Use a Set to avoid duplicate colors

        labels.forEach(() => {
            let color;
            do {
                color = getRandomColor();
            } while (colorSet.has(color)); // Regenerate if color already exists
            colorSet.add(color); // Add the new color to the Set
            backgroundColors.push(color);
            borderColors.push(color); // Optional: use the same color for borders
        });

        const genreChart = new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Books (Sold + Rented)',
                    data: data,
                    backgroundColor: backgroundColors,
                    borderColor: borderColors,
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw;
                            }
                        }
                    }
                }
            }
        });
    </script>
    <script src="../Assets/Templates/Admin/assets/node_modules/jquery/jquery.min.js"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="../Assets/Templates/Admin/assets/node_modules/bootstrap/js/popper.min.js"></script>
    <script src="../Assets/Templates/Admin/assets/node_modules/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../Assets/Templates/Admin/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="../Assets/Templates/Admin/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../Assets/Templates/Admin/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../Assets/Templates/Admin/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="../Assets/Templates/Admin/assets/node_modules/raphael/raphael-min.js"></script>
    <script src="../Assets/Templates/Admin/assets/node_modules/morrisjs/morris.min.js"></script>
    <!--c3 JavaScript -->
    <script src="../Assets/Templates/Admin/assets/node_modules/d3/d3.min.js"></script>
    <script src="../Assets/Templates/Admin/assets/node_modules/c3-master/c3.min.js"></script>
    <!-- Chart JS -->
    <script src="../Assets/Templates/Admin/js/dashboard1.js"></script>
</body>

</html>