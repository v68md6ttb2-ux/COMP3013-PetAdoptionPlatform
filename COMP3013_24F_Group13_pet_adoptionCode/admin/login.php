<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Website Management System</title>
<link href="css/login.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function chk(theForm){
        if (theForm.admin_name.value == ""){
        alert("Please enter your username!");
        theForm.admin_name.focus();
        return (false);
        }
        else if (theForm.admin_pass.value == ""){
        alert("Please enter your password!");
        theForm.admin_pass.focus();
        return (false);
        }else{
                return true;
                }
}
</script>
</head>
<body>
<div id="main">
  <div id="wrapper">
    <form action="login_check.php" method="Post" id="form1" onSubmit="return chk(this)">
      <div id="sys_name">
       <img src="./images/login_logo.png" width="280"/>
      </div>
      <ul id="cont">
        <li>
          <label class="lb" for="uname">Username</label>
          <input name="admin_name" id="uname" type="text" class="ip" value="" maxlength="18" />
        </li>
        <li>
          <label class="lb" for="pwd">Password</label>
          <input name="admin_pass" id="pwd" type="password" class="ip" value="" maxlength="10" />
        </li>
        
        <li><span>
          <input  type="submit" value="Login to System" style="width:265px;border:1px solid  #4D494F;border-radius:5px;background:#4D494F;color:#fff;padding:10px 30px;"/>
          </span></li>
      </ul>
      <p id="copy"></p>
    </form>
  </div>
</div>
</body>
</html>
