<?php include './header.php';?>
<?php include './nav.php';?>
<?php 
if(!isset($_SESSION['user'])||empty($_SESSION['user'])){
	echo"<script>alert('Log in to view');window.location.href='index.php'</script>";//Jump back to the backend list page
	exit;
}
?>
     <?php
	 
	 if(!empty($_POST)){
		 
		$name = $_POST['name'];
		$set_password = "";
		if(!empty($_POST['password'])){
			//$password = md5($_POST['password']);
			$password = $_POST['password'];
			$set_password = ", `password` = '{$password}'";
		}
		$email = $_POST['email'];
		$c_date = date('Y-m-d H:i:s');
		if($name==""){
			echo"<script>alert('The account cannot be empty!');history.go(-1)</script>";//Jump back to the backend list page
			exit;
		}elseif(mysqli_num_rows(mysqli_query($mysqli,"select name from users where name='".$name."' and id!='{$_SESSION['user']['id']}'"))>0){
			echo"<script>alert('The username already exists, please change the account to register!');window.location.href='reg.php'</script>";//Jump back to the backend list page
			exit;
		}
		
		$id = $_SESSION['user']['id'];
		$sqlstr="UPDATE `users` SET `name` = '{$name}'
		".$set_password."
		, `c_date` = '{$c_date}'
		, `email` = '{$email}' WHERE `users`.`id` = '{$id}';
		";
		$result=mysqli_query($mysqli,$sqlstr);
		if($result){
			$_SESSION['user']='';
			echo"<script>alert('Modification successful!');window.location.href='login.php'</script>";//Jump back to the backend list page
			exit;
		}else{
			echo"<script>alert('Modification failed!');window.location.href='user.php'</script>";//Jump back to the backend list page
			exit;
		}
		mysqli_free_result($result);
		mysqli_close($mysqli);
	 }
	 $sqlstr="select * from users where id='{$_SESSION['user']['id']}'";
	 $result=mysqli_query($mysqli,$sqlstr);
	 $v=mysqli_fetch_array($result);
	
	?>
    <div class="inner-banner has-base-color-overlay text-center" style="background: url(images/<?php echo $bimg[0];?>);">
        <div class="container">
            <div class="box">
                <h3>Modification of Member Information</h3>
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
                            Modification of Member Information
                    </li>
                </ul><!-- /.list-line -->
            </div><!-- /.pull-left -->
           
        </div><!-- /.container -->
    </div>



    <section class="contact_us padd-2">
        <div class="container">
            <div class="row">
                 <?php include './right3.php';?>
                <div class="col-md-10 col-sm-12 col-xs-12">
                    <div class="sec-title">
                        <h2>Member <span>Modification of Information</span></h2>
                    </div>
                    <div class="default-form-area">
                        <form id="contact-form" name="contact_form" class="default-form" action="user.php" method="post">
                            <div class="row clearfix">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" value="<?php echo $v['name'];?>" placeholder="Member's name" required="">
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" value="" placeholder="If you don't change your password, you don't need to fill it in">
                                    </div>
                                </div> 
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control required email" value="<?php echo $v['email'];?>" placeholder="Email" required="">
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

               
            </div>
        </div>
    </section>

   

 <?php include './foot.php';?>