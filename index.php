<?php
	include('config.php');
	include("model/firmstep_class.php");
	
	$objfirmstep = new firmstep_class();
	$result_cust = $objfirmstep->select_customer();
	$result_ser = $objfirmstep->select_services();
	 
		$cust_type = '';
		$title = '';
		$firstname = '';
		$lastname = '';
		$org_name = '';
		$anonymous = '';
		$service = '';
		
		if(isset($_REQUEST['submit_ci'])){
			
			$cust_type = 'Citizen';
			$title = $_REQUEST['title'];
			$firstname = $_REQUEST['firstname'];
			$lastname = $_REQUEST['lastname'];
			$service = $_REQUEST['service'];
			$objfirmstep->insert_customer($cust_type,$title,$firstname,$lastname,$org_name,$anonymous,$service);	
			
		}elseif(isset($_REQUEST['submit_org'])){
			
			$cust_type = 'Organization';
			$org_name = $_REQUEST['org_name'];
			$service = $_REQUEST['service'];	
			$objfirmstep->insert_customer($cust_type,$title,$firstname,$lastname,$org_name,$anonymous,$service);
			
			
		}elseif(isset($_REQUEST['submit_an'])){
			$cust_type = 'Anonymous';
			$anonymous = $_REQUEST['anonymous'];
			$service = $_REQUEST['service'];
			$objfirmstep->insert_customer($cust_type,$title,$firstname,$lastname,$org_name,$anonymous,$service);		
			
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Firmstep - Queue App</title>

<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

<link href="css/style.css" rel="stylesheet" type="text/css"/>
</head>

<body>

	<div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <!-- BEGIN PAGE TITLE & BREADCRUMB-->
            
            <h2 class="page-title text-center">
                Queue App
            </h2>
        </div>
        
       
        <!-- BEGIN PAGE CONTENT-->
        	<div class="row" style="margin:15px;">
				<div class="col-md-6">
					<!-- BEGIN SAMPLE FORM PORTLET-->   
					<div class="portlet box blue">
                      <div class="portlet-title">
                          <div class="caption">
                              <i class="glyphicon glyphicon-user"></i> New Customer
                          </div>
                         
                      </div>
						<div class="portlet-body form" style="margin-top:-10px">
							<form action="" method="post" style="padding:15px;">
                            	<div class="form-group" >
                                	<?php
                                	if($result_ser){
                              			while($row_ser = mysql_fetch_array($result_ser)){ 
									?>
                                    <div class="radio">
                                      <label>
                                        <input type="radio" name="service" id="optionsRadios1" value="<?php echo $row_ser['ser_name']; ?>" >
                                        	<?php echo $row_ser['ser_name']; ?>
                                      </label>
                                    </div>
                                    <?php
										}
									}
									?>
                               </div>
                               <!-------------------------------------------------------->
                               
                               <ul class="nav nav-tabs" style="margin-bottom:10px;">
                                <li class="active"><a data-toggle="tab" href="#Citizen">Citizen</a></li>
                                <li><a data-toggle="tab" href="#Organization">Organization</a></li>
                                <li><a data-toggle="tab" href="#Anonymous">Anonymous</a></li>
                              </ul>
                              
                              <div class="tab-content">
                                <div id="Citizen" class="tab-pane fade in active">
                                  	<div class="form-group">
                                        <select class="form-control" name="title">
                                          <option value="">--</option>
                                          <option value="Mr.">Mr.</option>
                                          <option value="Mrs.">Mrs.</option>
                                          <option value="Miss">Miss</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">First Name</label>
                                      <input type="text" class="form-control" placeholder="First Name" name="firstname">
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputPassword1">Last Name</label>
                                      <input type="text" class="form-control" placeholder="Last Name" name="lastname">
                                    </div>
                                  	 <button type="submit" class="btn btn-primary" name="submit_ci">Submit</button>
                                </div>
                                <div id="Organization" class="tab-pane fade">
                                  	<div class="form-group">
                                      <label for="exampleInputEmail1">Organization Name</label>
                                      <input type="text" class="form-control" placeholder="Organization Name" name="org_name" >
                                      
                                    </div>
                                     <button type="submit" class="btn btn-primary" name="submit_org">Submit</button>
                                 
                                </div>
                                <div id="Anonymous" class="tab-pane fade">
                                  <input type="hidden" name="anonymous" value="Anonymous">
                                  <button type="submit" class="btn btn-primary" name="submit_an">Submit</button>
                                </div>
                              </div>
                                      
                               <!-------------------------------------------------------->
                                                              
                              
                            </form>
						</div>
					</div>
					<!-- END SAMPLE FORM PORTLET-->
              </div>
              <div class="col-md-6">
              <!-- BEGIN SAMPLE FORM PORTLET-->   
					<div class="portlet box blue">
                      <div class="portlet-title">
                          <div class="caption">
                              <i class="glyphicon glyphicon-align-justify"></i> Queue
                          </div>
                         
                      </div>
                      <div class="portlet-body form" style="margin-top:-10px">
                      	<br />
                      	<p> &nbsp;&nbsp;&nbsp;&nbsp;List of the customers being queued.</p>
                        
                          <div class="table-responsive" style="padding:15px;">
                              <table class="table table-condensed">
                                  <tr>
                                      <th>#</th>
                                      <th>Type</th>
                                      <th>Name</th>
                                      <th>Service</th>
                                      <th>Queued at</th>
                                  </tr>
                                  
                                      <?php 
                                          $cnt = 0;
                                          if($result_cust){
                                              while($row_cust = mysql_fetch_array($result_cust)){ 
                                                  
                                                  $cnt++;
                                                  echo "<tr>";
                                                  echo "<td>".$cnt."</td>";
                                                  echo "<td>".$row_cust['cust_type']."</td>";
                                                  
                                                  if($row_cust['cust_type']=='Citizen'){
                                                      
                                                      echo "<td>".$row_cust['title']." ".$row_cust['firstname']." ".$row_cust['lastname']."</td>";
                                                      
                                                  }elseif($row_cust['cust_type']=='Organization'){
                                                      
                                                      echo "<td>".$row_cust['org_name']."</td>";
                                                      
                                                  }elseif($row_cust['cust_type']=='Anonymous'){
                                                      
                                                      echo "<td>".$row_cust['anonymous']."</td>";
                                                      
                                                  }else{
                                                      echo "<td></td>";
                                                  }
                                                  echo "<td>".$row_cust['service']."</td>";
                                                  echo "<td>".$row_cust['que_time']."</td>";
                                                  echo "</tr>";
                                              }
                                          }
                                      ?>
                                      
                              </table>
                              </div>
                         </div>
                 </div>
              </div>
         </div>          
    </div>
				

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>

