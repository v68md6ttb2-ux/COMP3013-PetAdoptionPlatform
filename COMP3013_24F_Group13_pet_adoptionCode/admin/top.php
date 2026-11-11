<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
body {
    margin-left: 0px;
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 0px;
}
</style>
</head>
<body>
<table width="100%"  border="0" cellpadding="8" cellspacing="0" align="center">
  <tr style="background:#1E70D1;">
    <td width="36%" valign="middle" style=" background:url(images/logo_left1.png) no-repeat 10px center;font-size:30px;height:60px">&nbsp;</td>
    <td width="64%" valign="bottom" align="right" style="color:#FFF;font-size:12px;">Current Time:
        <span id="time">
            <script>
                document.getElementById('time').innerHTML = new Date().toLocaleString() + ' Week ' + 'SundayMondayTuesdayWednesdayThursdayFridaySaturday'.charAt(new Date().getDay());
                setInterval(function() {
                    document.getElementById('time').innerHTML = new Date().toLocaleString() + ' Week ' + 'SundayMondayTuesdayWednesdayThursdayFridaySaturday'.charAt(new Date().getDay());
                }, 1000);
            </script>
        </span>
    </td>
  </tr>
  <tr style="background-image:url(images/top_bg.gif); height:16px;">    
    <td width="36%" style="color:#000000;font-size:12px;">Welcome: <span style="color:#F30;font-weight:600;"><?php echo $_SESSION['username'];?></span>, you are logged into the website management system</td>
    <td width="64%" align="right" style="color:#000000;">
        <input type="button" value="Logout" onclick="window.parent.location.href='loginout.php'" style="margin-top:-3px;height:21px;margin-right:5px;" />
    </td>
  </tr>
</table>
</body>
</html>
