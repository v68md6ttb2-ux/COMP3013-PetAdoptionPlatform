<?php include './header.php';?>
<?php include './nav.php';?>
  <?php
  
	 if(!empty($_POST)){
		 
		$name = $_POST['name'];
		//$password = md5($_POST['password']);
		$password = $_POST['password'];
		if($name==""){
			echo"<script>alert('The account cannot be empty!');history.go(-1)</script>";//Jump back to the backend registration page
			exit;
		}
		
		if($password==""){
			echo"<script>alert('The password can't be empty!');history.go(-1)</script>";//Jump back to the backend registration page
			exit;
		}
		
		
	
		$sqlstr="select * from users where name='{$name}' and password='{$password}' limit 1";
		$total_num=mysqli_num_rows(mysqli_query($mysqli,$sqlstr));
		
		if($total_num>0){
			$result=mysqli_query($mysqli,$sqlstr);
			 while($v=mysqli_fetch_array($result)){
				 $_SESSION['user'] = $v;
			 }
			
			echo"<script>alert('Login successful!');window.location.href='index.php'</script>";//Jump back to the backend registration page
			exit;
		}else{
			echo"<script>alert('Login failed!');window.location.href='login.php'</script>";//Jump back to the backend registration page
			exit;
		}
		mysqli_free_result($result);
		mysqli_close($mysqli);
	 }
	?>    
    <div class="inner-banner has-base-color-overlay text-center" style="background: url(images/<?php echo $bimg[0];?>);">
        <div class="container">
            <div class="box">
                <h3>Member Login</h3>
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
                        Member Login
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
                        <h2>Member <span>Login</span></h2>
                    </div>
                    <div class="default-form-area">
                        <form id="contact-form" name="contact_form" class="default-form" action="login.php" method="post">
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
                                    <div class="form-group" style="margin:10px 0;">
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