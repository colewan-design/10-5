<?php
require_once("process.php"); 
require_once("config.php");
if(!isset($_SESSION["login_sess"])) 
{
    header("location:login.php"); 
}
  $email=$_SESSION["login_email"];
  $findresult = mysqli_query($dbc, "SELECT * FROM users WHERE email= '$email'");
if($res = mysqli_fetch_array($findresult))
{
$username = $res['username']; 
$fname = $res['fname'];   
$lname = $res['lname'];  
$email = $res['email'];  
$image= $res['image'];
}

?>
<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>Salary Matrix | CBOO</title>

		<!-- Site favicon -->
		<link rel="icon" type="image/x-icon" href="src/images/dash.png">

		<!-- Mobile Specific Metas -->
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, maximum-scale=1"
		/>
		<script src="https://kit.fontawesome.com/dd09e290e6.js" crossorigin="anonymous"></script>
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
							<h4 class="text h4">SALARY MATRIX</h4>
						</div>
						<div class="pd-10 pr-20">
						<button type="button" class="btn btn-success" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Add New Salary</button>
						</div>
						<div class="d-flex justify-content-md-end">
							<!-- The Modal -->
							<div class="modal fade" id="form_modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered">
										<div class="modal-content">
										<form method="POST" action="save_salary.php">
												<div style="background: #98FB98;"class="modal-header">
													<h3 class="modal-title">Add New Salary</h3>
												</div>
												<div class="modal-body">
													<div class="col-md-2"></div>
													<div class="col-md-8">
														<div class="form-group">
															<label>Salary Grade</label>
															<input type="text" name="salaryGrade" class="form-control" required="required"/>
														</div>
														<div class="form-group">
															<label>Step</label>
															<input type="text" name="salaryStep" class="form-control" required="required" />
														</div>
														<div class="form-group">
														<label>Positions</label>
													
															<select name="position" class="selectpicker">
                                                            <option class="btn-sm" value="">Select</option>
                                                                <?php
                                                            
                                                                $result_position = $mysqli->query("SELECT * FROM position") or die($mysqli->error());
                                                                while ($srow = mysqli_fetch_array($result_position)) {
                                                                    $srows[] = $srow;
                                                                }
                                                                foreach ($srows as $srow) {
                                                                    print "<option value='" . $srow['positionName'] . "'>" . $srow['positionName'] . "</option>";
                                                                }
                                                                ?>
															</select>
														
														</div>
														<div class="form-group">
															<label>Salary Amount</label>
															<input type="text" name="salaryAmount" class="form-control" required="required"/>
														</div>
													</div>
												</div>
												<div style="clear:both;"></div>
												<div class="modal-footer">
													<button name="save" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
													<button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
												</div>
												</div>
											</form>
										</div>
									</div>
								</div>
						</div>
                        
						<div class="pb-20">
							<table class="data-table table stripe hover nowrap">
								<thead class="text-white bg-secondary">
									<tr>
										<th class="table-plus datatable">Salary Grade</th>
									
                                        <th>Step</th>
                                        <th>Salary Amount</th>
										<th>Position</th>
                                        <th>Action</th>
									</tr>
								</thead>
								<tbody>
                                <?php
                                        require 'conn.php';
                                        $query = mysqli_query($conn, "SELECT * FROM `salarydata`") or die(mysqli_error());
                                        while($fetch = mysqli_fetch_array($query)){
                                    ?>
                                    <tr>
                                        <td ><?php echo $fetch['salaryGrade']?></td>
                                        <td><?php echo $fetch['salaryStep']?></td>
                                        <td><?php echo number_format($fetch['salaryAmount'],2)?></td>
										
										<td><?php echo $fetch['position']?></td>
                                        <td	>
										
										<button class=" btn btn-warning" data-toggle="modal" type="button" data-target="#update_modal<?php echo $fetch['id']?>">
										<i class="fas fa-edit"></i>Edit</button>
						
									</td>
                                    </tr>
                                    <?php
                                        
                                        include 'update_salary.php';
                                        
                                        }
                                    ?>
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

		<script src="js/bootstrap.js"></script>	
	</body>
</html>
