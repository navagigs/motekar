
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">	
<title>LOGIN ADMIN - Motekar</title>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:300,200,100' rel='stylesheet' type='text/css'>
<link href="<?php echo base_url();?>templates/admin/js/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url();?>templates/admin/fonts/font-awesome-4/css/font-awesome.min.css">
<link href="<?php echo base_url();?>templates/admin/css/style.css" rel="stylesheet" />	
</head>

<body onLoad="document.getElementById('user').focus()" class="texture">
<div id="cl-wrapper" class="login-container">

	<div class="middle-login">
		<div class="block-flat">
			<div class="header">							
               <h3 class="text-center"><img class="logo-img" src="<?php echo base_url();?>templates/admin/images/logo_login.png" alt="logo"/></h3>
			</div>
			<div>
                    <form style="margin-bottom: 0px !important;" class="form-horizontal" action="<?php echo site_url();?>internal/ceklogin" method="post" name="formLogin" id="form" parsley-validate novalidate>
					<div class="content">
						                   <!-- ========== Flashdata ========== -->
                    <?php if ($this->session->flashdata('warning') || $this->session->flashdata('error')) { ?>
                        <?php if ($this->session->flashdata('warning')) { ?>
                            <div class="alert alert-warning">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<i class="fa fa-close sign"></i><?php echo $this->session->flashdata('warning'); ?>
                            </div>
                        <?php } else { ?>
                            <div class="alert alert-danger">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<i class="fa fa-warning sign"></i><?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <!-- ========== End Flashdata ========== -->
							<div class="form-group input-group-lg">
								<div class="col-sm-12">
                                         <input type="text" name="username" id="user" required class="form-control" onblur="clearText(this)" onfocus="clearText(this)" placeholder="Username" autocomplete="off"/>
									
								</div>
							</div>
                        
							<div class="form-group">
								<div class="col-sm-12">
								
										<input type="password" name="password" id="pass" required class="form-control" onblur="clearText(this)" onfocus="clearText(this)" placeholder="Password" autocomplete="off"/>
									
								</div>
							</div>
						<input type="submit" class="btn btn-primary" name="masuk" value="Login"/>
                        <a href="<?php echo site_url();?>internal/daftar" class="btn btn-primary">Daftar</a>	
					</div>
				</form>
                
			</div>
            
		</div>
		<div class="text-center out-links"><a href="#">Motekar &copy; <?php echo date('Y'); ?> All Right Reserved</a></div>
        </div>
        
	</div> 
	
</div>

<script src="<?php echo base_url();?>templates/admin/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/behaviour/general.js"></script>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
  <script src="<?php echo base_url();?>templates/admin/js/behaviour/voice-commands.js"></script>
  <script src="<?php echo base_url();?>templates/admin/js/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/jquery.flot/jquery.flot.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/jquery.flot/jquery.flot.pie.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/jquery.flot/jquery.flot.resize.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/jquery.flot/jquery.flot.labels.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/jquery.parsley/parsley.js"></script>	
    	<script language="javascript">
        function validate(){
            var username = document.getElementById('user').value;
            var password = document.getElementById('pass').value;
            var captcha = document.getElementById('captcha').value;
            if (username.length==0){
                alert ('Username harap diisi!');
                document.getElementById('user').focus();
                return false;
            }
            if (password.length==0){
                alert ('Password harap diisi!');
                document.getElementById('pass').focus();
                return false;
            }
            if (captcha.length==0){
                alert ('Captcha harap diisi!');
                document.getElementById('captcha').focus();
                return false;
            }
            return true;
        }
        function clearText(field)
        {
            if (field.defaultValue == field.value) field.value = '';
            else if (field.value == '') field.value = field.defaultValue;
         }
         
        </script>
    
</body>
</html>