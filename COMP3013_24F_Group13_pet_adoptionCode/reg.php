<?php include './header.php';?>
<?php include './nav.php';?>
     <?php
	 if(!empty($_POST)){
		 
		$name = $_POST['name'];
		//$password = md5($_POST['password']);
		$password = $_POST['password'];
		$email = $_POST['email'];
		$c_date = date('Y-m-d H:i:s');
		if($name==""){
			echo"<script>alert('The account cannot be empty!');history.go(-1)</script>";//Jump back to the backend registration page
			exit;
		}elseif(mysqli_num_rows(mysqli_query($mysqli,"select name from users where name='".$name."'"))>0){
			echo"<script>alert('The username already exists, please change the account to register!');window.location.href='reg.php'</script>";//Jump back to the backend registration page
			exit;
		}
		
		if($password==""){
			echo"<script>alert('The password can't be empty!');history.go(-1)</script>";//Jump back to the backend registration page
			exit;
		}
		
		
		$sqlstr="insert into users(name,password,email,c_date) 
		values('".$name."','".$password."','".$email."','".$c_date."')";
		$result=mysqli_query($mysqli,$sqlstr);
		if($result){
			echo"<script>alert('Registration Successful!');window.location.href='login.php'</script>";//Jump back to the backend registration page
			exit;
		}else{
			echo"<script>alert('Registration failed!');window.location.href='reg.php'</script>";//Jump back to the backend registration page
			exit;
		}
		mysqli_free_result($result);
		mysqli_close($mysqli);
	 }
	?>
    <div class="inner-banner has-base-color-overlay text-center" style="background: url(images/<?php echo $bimg[0];?>);">
        <div class="container">
            <div class="box">
                <h3>Member Registration</h3>
            </div><!-- /.box -->
        </div><!-- /.container -->
    </div>

    <div class="breadcumb-wrapper">
        <div class="container">
            <div class="pull-left">
                <ul class="list-inline link-list">
                    <li>
                        <a href="index.php">Home</a>
                    </li><!-- comment for inline hack
                    --><li>
                            Member Registration
                    </li>
                </ul><!-- /.list-line -->
            </div><!-- /.pull-left -->
           
        </div><!-- /.container -->
    </div>



    <section class="contact_us padd-2">
        <div class="container">
            <div class="row">
                
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="sec-title">
                        <h2>Member <span>Registration</span></h2>
                    </div>
                    <div class="default-form-area">
                        <form id="contact-form" name="contact_form" class="default-form" action="reg.php" method="post">
                            <div class="row clearfix">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" value="" placeholder="Member's name" required="">
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" value="" placeholder="Password" required="">
                                    </div>
                                </div> 
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control required email" value="" placeholder="Email" required="">
                                    </div>
                                </div>   
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
                                        <button class="btn-style-one" type="submit" data-loading-text="Please wait...">Login</button>
                                    </div>
                                </div>   

                            </div>
                        </form>
                    </div>
                </div>

                <?php include './right2.php';?>
            </div>
        </div>
    </section>

   

 <?php include './foot.php';?>