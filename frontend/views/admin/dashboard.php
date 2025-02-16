<?php
include '../../../backend/conn.php'; 
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../login.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>PCC | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="PCC" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="../../assets/css/dashboard.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
        <nav class="app-header navbar navbar-expand bg-body">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                            <i class="bi bi-list"></i>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                            <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                            <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
            <div class="sidebar-brand">
                <a href="./index.html" class="brand-link">
                    <span class="brand-text fw-light">Admin</span>
                </a>
            </div>
            <div class="sidebar-wrapper">
                <nav class="mt-2">
                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="dashboard.php" class="nav-link">
                                <p>Staff</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="addemployee.php" class="nav-link">
                                <p>Add Employee</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../../backend/logout.php" class="nav-link">
                                <p>Log out</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <main class="app-main">
            <div class="app-content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6"><h3 class="mb-0">Dashboard</h3></div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="app-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">List of Staff</h3>
                                <button class="btn btn-secondary float-end" onclick="printTable()">Print</button>
                            </div>
                            <div class="card-body">
                                <table id="example" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Item Number</th>
                                            <th>Pos Title</th>
                                            <th>Salary</th>
                                            <th>Step</th>
                                            <th>Basic Salary</th>
                                            <th>Premium</th>
                                            <th>Name of Incumbent</th>
                                            <th>Date hired</th>
                                            <th>Length of Service</th>
                                            <th>Status</th>
                                            <th>Date of Separation</th>
                                            <th>Place of Assignment</th>
                                            <th>Permanent or CSP</th>
                                            <th>Remarks</th>
                                            <th>Actions</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $query = "SELECT * from staff";
                                            $result = mysqli_query($conn, $query);
                                            while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                            <tr>
                                                <td><?=$row['Name']?></td>
                                                <td><?=$row['Item_Number']?></td>
                                                <td><?=$row['Pos_Title']?></td>
                                                <td><?=$row['Salary']?></td>
                                                <td><?=$row['Step']?></td>
                                                <td><?=$row['Basic_Salary']?></td>
                                                <td><?=$row['Premium']?></td>
                                                <td><?=$row['Name_of_Incumbent']?></td>
                                                <td><?=$row['Date_hired']?></td>
                                                <td><?=$row['Length_of_Service']?></td>
                                                <td><?=$row['Status']?></td>
                                                <td><?=$row['Date_of_Separation']?></td>
                                                <td><?=$row['Place_of_Assignment']?></td>
                                                <td><?=$row['Permanent_or_CSP']?></td>
                                                <td><?=$row['Remarks']?></td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm" href="editemployee.php?id=<?=$row['Item_Number']?>"><i class="bi bi-pencil-square"></i></a>
                                                    <a class="btn btn-danger btn-sm" href="../../../backend/delete.php?ID=<?=$row['Item_Number']?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="bi bi-trash"></i></a>
                                                </td>
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
            </div>
        </main>
        <footer class="app-footer">
            <div class="float-end d-none d-sm-inline">Anything you want</div>
            <strong>
                Copyright &copy; 2014-2024&nbsp;
                <a href="https://adminlte.io" class="text-decoration-none">AdminLTE.io</a>.
            </strong>
            All rights reserved.
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js" integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/js/jsvectormap.min.js" integrity="sha256-/t1nN2956BT869E6H4V1dnt0X5pAQHPytli+1nTZm2Y=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/maps/world.js" integrity="sha256-XPpPaZlU8S/HWf7FZLAncLg2SAkP8ScUTII89x9D3lY=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#example').DataTable();
    });

    function printTable() {
        var divToPrint = document.getElementById("example");
        var newWin = window.open("");
        newWin.document.write('<html><head><title>Print Table</title>');
        newWin.document.write('<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">');
        newWin.document.write('<style>');
        newWin.document.write('.footer-left { position: fixed; bottom: 0; left: 0; width: 33%; text-align: left; }');
        newWin.document.write('.footer-center { position: fixed; bottom: 0; left: 33%; width: 33%; text-align: center; }');
        newWin.document.write('.footer-right { position: fixed; bottom: 0; right: 0; width: 33%; text-align: right; }');
        newWin.document.write('</style>');
        newWin.document.write('</head><body>');
        newWin.document.write(divToPrint.outerHTML);
        newWin.document.write('<div class="footer-left"><p>Prepared by: division section unit</p></div>');
        newWin.document.write('<div class="footer-center"><p>Reviewed by: Recommending approval</p></div>');
        newWin.document.write('<div class="footer-right"><p>Approved by: Director</p></div>');
        newWin.document.write('</body></html>');
        newWin.document.close();
        newWin.print();
    }
    </script>
</body>
</html>