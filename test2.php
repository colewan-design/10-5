<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once("config.php");
require_once("process.php"); 
$mpdf = new \Mpdf\Mpdf();

$fres = mysqli_query($mysqli, "SELECT * FROM payslipdata WHERE id= '$id'");
if($res = mysqli_fetch_array($fres))
{
$employee_name = $res['employee_name']; 
$gross_emp = $res['gross_emp']; 
$deduction_emp = $res['deduction_emp']; 
$nett_emp = $res['nett_emp']; 
$emp_id = $res['emp_id']; 
}

$employee_data = mysqli_query($mysqli, "SELECT * FROM data WHERE id= '$emp_id'");
if($data_emp = mysqli_fetch_array($employee_data))
{
$salary = $data_emp['salary']; 
$sg = $data_emp['sg']; 
$step = $data_emp['step']; 
$position = $data_emp['position']; 
}






 $html = '
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
 
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
 
   

        
                    
             <div class="text-center lh-1 mb-2">
                 <h6 class="fw-bold">Payslip</h6> <span class="fw-normal"></span>
             </div>
         
             <div style="float: left;width: 40%; padding: 10px;">
                 <div class="col-md-10">
                
                         
                         <div class="col-md-6">
                             <div> <span class="fw-bolder">EMP Name</span> <small class="ms-3"></small>'.$employee_name.' </div>
                         </div>
                     </div>
                 
                         <div class="col-md-6">
                             <div> <span class="fw-bolder">Pay Period</span> <small class="ms-3">101523065714</small> </div>
                         </div>
                         
            
                         <div class="col-md-6">
                             <div> <span class="fw-bolder">Position</span> <small class="ms-3">'.$position.'</small> </div>
                         </div>
                     </div>
                    
                     <div style="float: right; width: 40%;">
                         <div class="col-md-6">
                             <div> <span class="fw-bolder">Date of Joining</span> <small class="ms-3"></small> </div>
                         </div>
                         <div class="col-md-6">
                             <div> <span class="fw-bolder">Salary Grade</span> <small class="ms-3">SBI</small> </div>
                         </div>
                  
                 
                         <div class="col-md-6">
                             <div> <span class="fw-bolder">Step</span> <small class="ms-3">Marketing Staff (MK)</small> </div>
                         </div>
                         
                    </div>
                     </div>
                 </div>
                 <table style="
                    font-family: arial, sans-serif;
                    border-collapse: collapse;
                    width: 100%;
                    border: 1px solid #dddddd;">
                     <thead class="bg-dark text-white">
                         <tr>
                             <th scope="col">Earnings</th>
                             <th scope="col">Amount</th>
                             <th scope="col">Deductions</th>
                             <th scope="col">Amount</th>
                         </tr>
                     </thead>
                     <tbody>
                     
                         <tr>
                             <th scope="row">Basic</th>
                             <td>'.$salary.' </td>
                             <td>Withholding Tax</td>
                             <td>1800.00</td>
                         </tr>
                         <tr>
                             <th scope="row">PERA</th>
                             <td>'.$gross_emp.' </td>
                             <td>GSIS Premium</td>
                             <td>142.00</td>
                         </tr>
                         <tr>
                             <th scope="row"></th>
                             <td></td>
                             <td>GSIS Conso Loan</td>
                             <td>0.00</td>
                         </tr>
                         <tr>
                             <th scope="row"></th>
                             <td></td>
                             <td>GSIS Policy Loan</td>
                             <td>0.00</td>
                         </tr>
                         <tr>
                             <th scope="row"></th>
                             <td></td>
                             <td>GSIS EAL</td>
                             <td>0.00</td>
                         </tr>
                         <tr>
                             <th scope="row"></th>
                             <td></td>
                             <td>GSIS Emergency Loan</td>
                             <td>500.00</td>
                         </tr>
                        
                         <tr>
                             <th scope="row"></th>
                             <td></td>
                             <td>GSIS Real Estate</td>
                             <td>0.00</td>
                         </tr>
                         <tr>
                             <th scope="row"></th>
                             <td></td>
                             <td>GSIS Opt Loan</td>
                             <td>0.00</td>
                         </tr>
                         <tr>
                             <th scope="row"></th>
                             <td></td>
                             <td>GSIS OULI</td>
                             <td>0.00</td>
                         </tr>
                         <tr>
                             <th scope="row"></th>
                             <td></td>
                             <td>GSIS MPL</td>
                             <td>0.00</td>
                         </tr>
                         <tr>
                             <th scope="row"></th>
                             <td></td>
                             <td>Land Bank</td>
                             <td>0.00</td>
                         </tr>
                         <tr>
                             <th scope="row"></th>
                             <td></td>
                             <td>GSIS GFAL II</td>
                             <td>0.00</td>
                         </tr>
                         <tr>
                         <th scope="row"></th>
                         <td></td>
                         <td>Philhealth</td>
                         <td>0.00</td>
                         </tr>
                         <tr>
                         <th scope="row"></th>
                         <td></td>
                         <td>HDMF Premium</td>
                         <td>2400.00</td>
                         </tr>
                         <tr>
                         
                         <th colspan="2"></th>
                         <td scope="row">HDMF MPL</td>
                         <td>2400.00</td>
                         </tr>
                         <tr>
                         
                         <th colspan="2"></th>
                         <td scope="row">HDMF CL</td>
                         <td>2400.00</td>
                         </tr>
                         <tr>
                         
                         <th colspan="2"></th>
                         <td scope="row">BSUCMPC</td>
                         <td>2400.00</td>
                         </tr>
                         <tr>
                         
                         <td colspan="2"></td>
                         <td scope="row">China Bank Savings</td>
                         <td>2400.00</td>
                         </tr>
                         <tr>
                         <td colspan="2"></td>
                         <td scope="row">BSU Housing Rent</td>
                         <td>2400.00</td>
                         </tr>
                         <tr>
                         <td colspan="2"></td>
                         <td scope="row">UCPBS</td>
                         <td>2400.00</td>
                         </tr>
                         <tr>
                         <td colspan="2"></td>
                         <td scope="row">Phil Life</td>
                         <td>2400.00</td>
                         </tr>
                         <tr>
                         <td colspan="2"></td>
                         <td scope="row">Coco</td>
                         <td>2400.00</td>
                         </tr>
                         <tr>
                         <td colspan="2"></td>
                         <td scope="row">Phil Am</td>
                         <td>2400.00</td>
                         </tr>
                        
                         <tr>
                         <td colspan="2"></td>
                         <td scope="row">Water</td>
                         <td>2400.00</td>
                         </tr>
                         <tr>
                         <td colspan="2"></td>
                         <td scope="row">Electric</td>
                         <td>2400.00</td>
                         </tr>
                         
                         <tr class="border-top">
                             <th scope="row">Total Earning</th>
                             <td>25970.00</td>
                             <td>Total Deductions</td>
                             <td>2442.00</td>
                         </tr>
                     </tbody>
                 </table>
             </div>
             <div class="row">
                 <div class="col-md-4"> <br> <span class="fw-bold">Net Pay : 24528.00</span> </div>
                 <div class="col-md-4"> <br> <span class="fw-bold">Half Month: 24528.00</span> </div>
                 <div class="border col-md-8">
                     <div class="d-flex flex-column"> <span>In Words</span> <span>Twenty Five thousand nine hundred seventy only</span> </div>
                 </div>
             </div>
             <div class="d-flex justify-content-end">
                 <div class="d-flex flex-column mt-2"> <span class="fw-bolder">For Kalyan Jewellers</span> <span class="mt-4">Authorised Signatory</span> </div>
             </div>
         </div>
     </div>
 </div>
 <style>
 td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
  }
</style>
 ';
$mpdf->WriteHTML($html);
$mpdf->Output();
?>
