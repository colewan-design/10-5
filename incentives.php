<?php
require_once("config.php");
if(!isset($_SESSION["login_sess"])) 
{
    header("location:login.php"); 
}
  $email=$_SESSION["login_email"];
  $findresult = mysqli_query($dbc, "SELECT * FROM users WHERE email= '$email'");
if($res = mysqli_fetch_array($findresult))
{
    $oldusername =$res['username'];     
$username = $res['username']; 
$fname = $res['fname'];   
$lname = $res['lname'];  
$email = $res['email'];  
$image= $res['image'];
}
$page = $_SERVER['PHP_SELF'];

require_once("process.php"); 


?>
<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>Incentives</title>

		<!-- Site favicon -->
		<link rel="icon" type="image/x-icon" href="src/images/dash.png">

		<!-- Mobile Specific Metas -->
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, maximum-scale=1"
		/>

		<!-- Google Font -->
		<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet"/>
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="vendors/styles/core.css" />
		<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css"/>
		<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css"/>
		<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css"/>
		<link rel="stylesheet" type="text/css" href="src/styles/style.css" />
		<link rel="stylesheet" type="text/css" href="src/styles/media.css">
	</head>
	<body>
	<div class="header" style=" border: 1px solid #008B8B;background:#1E90FF;">
			<div class="header-left">
				<div style="color:white;" class="menu-icon bi bi-list"></div>
				<a style="padding-left:2rem;" href="">BSU-CBOO Payroll - Admin</a>
			</div>
			<div class="header-right">
				<div class="mr-20 user-info-dropdown">
					<div class="dropdown">
						<a
							class="dropdown-toggle"
							href="#"
							role="button"
							data-toggle="dropdown"
						>
							<span class="user-icon">
								<!--<img src="" alt="" /> profile image here-->
								<div>
               
            <?php if($image==NULL)
                {
                 echo '<img src="https://technosmarter.com/assets/icon/user.png">';
                } else { echo '<img src="images/'.$image.'" style="height:52px;width:52px;border-radius:50%;">';}?> 

<p></p>
  
                </div>
							</span>
							<span style="color:white;" class="user-name"><?php echo $fname ." " .$lname; ?></span>
						</a>
						<div 
							class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
						>
							<a class="dropdown-item" href="account.php"
								><i class="dw dw-user1"></i> My Account</a
							>
							
							<a class="dropdown-item" href="login.php"
								><i class="dw dw-logout"></i> Log Out</a
							>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="left-side-bar" >
		<div class="brand-logo" style=" border-bottom: 1px solid grey;">
				<a href="index.php">
					
					<img
						src="images/cboo.png" style="box-shadow: 0px 0px 8px 2px grey;height:50px;width:50px;border-radius:50%;"
						alt="sample"
						class="light-logo"
					/>
					<span style="font-size:14px;margin-left:1rem;color:white;"class="mtext">BSU-CBOO Payroll</span>
				</a>
			
			</div> 
        
		<?php
            $mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));       
            $result = $mysqli->query("SELECT * FROM data") or die(mysqli->error);
             
            ?>
           
		   
            <?php 
            function pre_r($array){
            

                echo '<pre>';
                print_r($array);
                echo '</pre>';
            }
            ?>
            
            
			<?php
            $mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));       
            $result = $mysqli->query("SELECT * FROM allowance") or die(mysqli->error);
             
            ?>
        
			<div class="menu-block customscroll">
				<div class="sidebar-menu">
				<ul id="accordion-menu">
						<li>
							<a href="index.php" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-house"></span
								><span class="mtext">Dashboard</span>
							</a>
						</li>
                       
                   

						<li>
							<a href="employees.php" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-people"></span
								><span class="mtext">Employees</span>
							</a>
						</li>
						<li>
						<a href="#" class="dropdown-toggle">
								<span class="micon bi bi-calculator"></span
								><span class="mtext">Payslips</span>
							</a>
							<ul class="submenu">
							<li><a href="payslips.php">Add New Payslip</a></li>
								<li><a href="payslip_data.php">Payroll list</a></li>
								
							</ul>
						</li>
						<li>
							<a href="#">
								<span class="mtext">Maintenance</span>
							</a>
						</li>
						<li>
							<a href="salary_matrix.php" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-grid-3x2"></span
								><span class="mtext">Salary Matrix</span>
							</a>
						</li>
						<li>
							<a href="position.php" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-pin-map"></i></span
								><span class="mtext">Position</span>
							</a>
						</li>
						<li>
							<a href="#" class="dropdown-toggle">
								<span class="micon bi bi-calculator"></span
								><span class="mtext">Calculations</span>
							</a>
							<ul class="submenu">
								<li><a href="incentives.php">Incentives</a></li>
								<li><a href="deductions.php">Mandatory Deductions</a></li>
								<li><a href="other_deductions.php">Other Deductions</a></li>
								<li><a href="#">Add Record</a></li>
							</ul>
						</li>
					
						<li>
							<a href="#;" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-envelope-paper"></i></span
								><span class="mtext">Payroll Report</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="mobile-menu-overlay"></div>

		<div class="main-container">
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px">
					
					<div class="card-box mb-30">
						<div class="pd-20 pb-10 d-flex justify-content-center">
							<h4 class="text h4">CALCULATIONS - INCENTIVES</h4>
                        </div>
						<div class="pd-10 pr-20">
						<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#add-Employee">Add Incentives</button>
						</div>
						<div class="d-flex justify-content-md-end">
							<!-- The Modal -->
							
							<div class="modal fade" id="add-Employee" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered">
										<div class="modal-content">
											<div style="background: #AFEEEE;"class="modal-header">
												<h4 class="modal-title w-100 text-center" id="modalLabel">
													Add New Incentive
												</h4>
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
													??
												</button>
											</div>
											<div class="modal-body">
												<form action="process.php" method="POST">
													<div class="form-group">
														<label class="col-sm-12 col-md-4 col-form-label">Incentive Name</label>
														<div class="col-sm-12 col-md-10">
															<input name="allowanceName"  class="form-control" type="text" placeholder="Enter New Incentive Name" required>
														</div>
													</div>
                                                  
													
													<div class="form-group">
														<label class="col-sm-12 col-md-4 col-form-label">Description</label>
														<div class="col-sm-12 col-md-10">
															<input class="form-control" name="allowanceDescription" type="text" placeholder="Enter Description " required>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-12 col-md-2 col-form-label">Amount</label>
														<div class="col-sm-12 col-md-10">
															<input class="form-control" name="allowanceAmount" type="number" placeholder="Enter Amount">
														</div>
													</div>
													
													
                                                    <div>
                                                    <button style="margin-left: 1rem;"type="submit" name="insertAllowance" class="btn btn-primary">
													Save changes
												    </button>
                                                    <button style="position: absolute; margin-left: 1rem; bottom: 1rem;" type="button" class="btn btn-secondary" data-dismiss="modal">
													Close
													</button>
                                                    </div>

												</form>
											</div>
											<div class="modal-footer">
												
											</div>
										</div>
									</div>
								</div>
						</div>
                        
						<div class="table-responsive">
                            <table class="table table-striped table-bordered">
                              <thead class="text-white text-center bg-secondary">
                                <tr>
                                  <th scope="col">Incentive Name</th>
                                  <th scope="col">Description</th>
                                  <th scope="col">Amount</th>
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody>
							  <?php
                    while($row = $result->fetch_assoc()):
                ?>
                <tr>
                    <td><?php echo $row['allowanceName']; ?></td>
                    <td><?php echo $row['allowanceDescription']; ?></td>
                    <td><?php echo $row['allowanceAmount']; ?></td>
                    <td align="center">
                        <a href="process.php?allowanceDelete=<?php echo $row['allowanceId']; ?>">
                            <class class="btn btn-danger btn-sm">Delete</class>
                        </a>
                       
                    </td>
                </tr>
                <?php endwhile;  ?>
                               
  
                              </tbody>
                            </table>
                        </div>
                        
					</div>
					<!-- Export Datatable End -->
				</div>
				<div class="footer-wrap pd-20 mb-20 card-box">
					@ BSU-CMPS
				</div>
			</div>
		</div>
		<!-- js -->
		<script src="vendors/scripts/core.js"></script>
		<script src="vendors/scripts/script.min.js"></script>
		<script src="vendors/scripts/process.js"></script>
		<script src="vendors/scripts/layout-settings.js"></script>
		<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
		<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
		<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
		<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
		<!-- buttons for Export datatable -->
		<script src="src/plugins/datatables/js/dataTables.buttons.min.js"></script>
		<script src="src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
		<script src="src/plugins/datatables/js/buttons.print.min.js"></script>
		<script src="src/plugins/datatables/js/buttons.html5.min.js"></script>
		<script src="src/plugins/datatables/js/buttons.flash.min.js"></script>
		<script src="src/plugins/datatables/js/pdfmake.min.js"></script>
		<script src="src/plugins/datatables/js/vfs_fonts.js"></script>
		<!-- Datatable Setting js -->
		<script src="vendors/scripts/datatable-setting.js"></script>
	</body>
</html>
