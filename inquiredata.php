<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin.css">
    <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
</head>
<body>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="lab la-admin"></span><span>Admin</span></h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="admin.php" ><span class="las la-igloo"></span>
                    <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="customers.php"><span class="las la-users"></span>
                    <span>Customers</span></a>
                </li>
                <li>
                    <a href="petdata.php"><span class="las la-dog"></span>
                    <span>Pet Data</span></a>
                </li>
                <li>
                    <a href="adoptionrequestdata.php"><span class="las la-search"></span>
                    <span>Adoption Requests Data</span></a>
                </li>
                <li>
                    <a href="adoptionhistory.php><span class="las la-file"></span>
                    <span>Adoption History</span></a>
                </li>
                <li>
                    <a href="donationsdata.php"><span class="las la-clipboard-list"></span>
                    <span>Donations</span></a>
                </li>
                <li>
                    <a href="contactusdata.php"><span class="las la-phone"></span>
                    <span>Contact us</span></a>
                </li>
                <li>
                    <a href="inquiredata.php"class="active"><span class="las la-envelope"></span>
                    <span>Inquiry Data</span></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label>
                Dashboard
            </h2>
            <div class="user-wrapper">
            <img src="admin.png" width="70px" height="70px" alt="">
            <div>
                <h4>AKS</h4>
                    <small>Super admin</small>
                </div>
            </div>
        </header>
        <div class="recent-grid">
            <div class="projects">
                <div class="card">
                    <div class="card-header">
                        <h3>Adoption History Information</h3>
                    </div>
                    <div class="card-body">
                        <table width="100%">
                            <thead>
                                <tr>
                                    <td>Inquirt ID</td>
                                    <td>Method</td>
                                    <td>Inquiry Date</td>
                                    <td>Result</td>
                                    <td>Session Talk</td>
                                    <td>User Name</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php include 'fetch_datainquiry.php';?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
