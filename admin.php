
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
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
                    <a href="admin.php" class="active"><span class="las la-igloo"></span>
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
                    <a href="adoptionhistorydata.php"><span class="las la-file"></span>
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
                    <a href="inquiredata.php"><span class="las la-envelope"></span>
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
    <div class="user-info">
        <img src="admin.png" width="70px" height="70px" alt="">
        <div>
            <h4>AKS</h4>
            <small>Super admin</small>
        </div>
    </div>
    <!-- Logout button -->
    <a href="newfront.html" class="logout-btn">Logout</a>
</div>

    </header>
    <main>
        <div class="cards">
            <div class="card-single">
                <div>
                    <h1>12</h1>
                    <span>Customers</span>
                </div>
                <div>
                    <span class="las la-users"></span>
                </div>
            </div>
            <div class="card-single">
                <div>
                    <h1>More than 2000/-</h1>
                    <span>Donations</span>
                </div>
                <span class="las la-users"></span>
            </div>
        
            <div class="card-single">
                <div>
                    <h1>12</h1>
                    <span>Pet Re homed</span>
                </div>
                <span class="las la-users"></span>
            
        </div>
    </div>
    <div class="recent-grid">
        <div class="projects">
            <div class="card">
                <div class="card-header">
                  <h3>Pet Information</h3>
                  
                    <button>See all<a href="petdata.php"><span class="las la-arrow-right"></span></button>
                  
                </div>
                <div class="card-body">
                    <table width="100%">
                        <thead>
                            <tr>
                            <td>Pet ID</td>
                                    <td>Pet Name</td>
                                    <td>Gender</td>
                                    <td>Type</td>
                                    <td>Description</td>
                                    <td>Availability Status</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Rocky</td>
                                <td>Male</td>
                                <td>Indian</td>
                                <td>Resilient, courageous, and loving couch potato</td>
                                <td>Available</td>
                            </tr>
                            <tr>
                            <td>2</td>
                                <td>Monty</td>
                                <td>Male</td>
                                <td>Indian</td>
                                <td>Courageous, and loving couch potato</td>
                                <td>Available</td> 
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </main>
</div>
</body>
</html>