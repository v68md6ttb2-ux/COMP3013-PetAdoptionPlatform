<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<style type="text/css">
 .sidebar {
    width: 250px;
    /* Light blue background */
    color: #fff;
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1); /* Shadow effect */
    transition: width 0.3s; /* Sidebar width transition effect */
    position: relative; /* Prepare for adding bottom border */
}
 
.sidebar::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 4px; /* Bottom border height */
    background-color: #1e70d1; /* Bottom border color, slightly darker than background */
}
 
.menu {
    list-style-type: none;
    padding: 0;
    margin: 0;
}
 
.menu-item {
    position: relative;
    border-bottom:1px solid #EBEBEB;
    color: #1E70D1;
}
 
.menu-item > a {
    content: '\25B6'; /* Use Unicode character to simulate an icon, here is a right arrow */
    display: block;
    padding: 16px 20px 16px 40px; /* Increase left padding to accommodate the icon */
    text-decoration: none;
    color: #1E70D1;
    white-space: nowrap; /* Prevent text from wrapping */
    transition: background-color 0.3s, color 0.3s, padding 0.3s; /* Add transition effects */
    position: relative; /* Prepare for adding icon */
}
 
.menu-item > a::before {
    content: '\25B6'; /* Use Unicode character to simulate an icon, here is a right arrow */
    position: absolute;
    left: 16px; /* Icon position */
    top: 50%;
    transform: translateY(-50%); /* Vertically center the icon */
    color: #1E70D1; /* Icon color, slightly brighter than the background */
    transition: left 0.3s; /* Icon position transition effect */
}
 
.menu-item > a:hover::before {
    left: 20px; /* When hovering, move the icon slightly to the right */
}
 
.menu-item > a:hover {
    background-color: #1e70d1; /* Background color turns darker when hovering */
    padding-left: 50px; /* Increase left padding to highlight the icon */
}
 
.menu-item.active > a {
    content: '\25BC';
    background-color: #1e70d1; /* Active item background color same as hover */
    color: #e6f7ff; /* Active item text color slightly lighter */
}
 
.menu-item.active > a::before {
    content: '\25BC'; /* When active, the icon changes to a down arrow */
    left: 20px; /* Adjust the icon position slightly */
}
 
.submenu {
    list-style-type: none;
    padding: 0;
    margin: 0;
    display: none;
    background-color: #fff; /* Submenu background color is white */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Submenu shadow effect */
}
 
.menu-item:hover .submenu,
.menu-item.active .submenu {
    display: block; /* Show submenu when hovering or active */
}
 
.submenu li a {
    padding: 14px 20px 14px 40px; /* Submenu item padding, increase left padding to accommodate possible icons (though none are shown here) */
    display: block;
    text-decoration: none;
    color: #333; /* Submenu item text color is dark gray */
    transition: background-color 0.3s, color 0.3s; /* Add transition effects */
    position: relative; /* Prepare for possible icons */
}
 
.submenu li a:hover {
    background-color: #f0f9ff; /* Submenu item background color turns light blue on hover */
    color: #005bb5; /* Submenu item text color turns deep blue on hover */
}
 
.content {
    flex: 1;
    padding: 20px;
    background-color: #fff; /* Content area background color is white */
    box-shadow: -2px 0 5px rgba(0, 0, 0, 0.1); /* Shadow effect opposite to sidebar direction */
}
 
/* Styles for active state (can be added or removed with JavaScript by adding the .active class) */
.menu-item.active > .submenu li a {
    color: #2d8cf0; /* Active state submenu item text color same as sidebar background */
}
 
.menu-item.active > .submenu li a:hover {
    color: #005bb5; /* Active state submenu item hover text color turns deep blue */
}
</style>
<link href="css/main.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/dtree.js"></script>
</head>
<body>
<table width="96%"  border="0" cellpadding="10" cellspacing="0" align=center >
  <tr>
   <td valign="top" >
   <div class=menu>
    <table width="100%"  border="0" cellpadding="0" cellspacing="0">
     <tr>
      <td height=25><a href="javascript: d.openAll();"><img src="images/view_detailed.gif" width="15" height="15" border="0" align="absmiddle" alt="Expand List"></a>
	  <a href="javascript: d.closeAll();"><img src="images/view_tree.gif" width="15" height="15" border="0" align="absmiddle" alt="Collapse List"></a>
	  <a href="right.php" target="mainFrame">System Homepage</a>| 
	  <a href="../" target="_blank">Website Homepage</a></td>
     </tr>
     <tr>
      <td>
	  <div class="sidebar">
        <ul class="menu">
            <li class="menu-item">
                <a href="#">System Content Management</a>
                <ul class="submenu">
                    <li><a href="config.php" target="mainFrame">Basic Website Settings</a></li>
                </ul>
            </li>
            <li class="menu-item">
                <a href="#">Admin Management</a>
                <ul class="submenu">
                    <li><a href="admin_add.php" target="mainFrame">Add Admin</a></li>
                    <li><a href="admin_list.php" target="mainFrame">Admin List</a></li>
                </ul>
            </li>
            <li class="menu-item">
                <a href="#">User Management</a>
                <ul class="submenu">
                    <li><a href="users_add.php" target="mainFrame">Add User</a></li>
                    <li><a href="users_list.php" target="mainFrame">User List</a></li>
                </ul>
            </li>
            <!-- Other menu items added following the structure above -->
            <li class="menu-item">
                <a href="#">Pet Management</a>
                <ul class="submenu">
                    <li><a href="../shop/admin/animals_list.php?type_id=1" target="mainFrame">Pet List</a></li>
                    <li><a href="../shop/admin/animals_add.php?type_id=1" target="mainFrame">Add Pet</a></li>
                    <li><a href="../shop/admin/type_list.php" target="mainFrame">Pet Categories</a></li>
                    <li><a href="../shop/admin/type_add.php" target="mainFrame">Add Category</a></li>
                    <li><a href="../shop/admin/order_list.php" target="mainFrame">Adoption Orders</a></li>
                </ul>
            </li>
            <!-- Other menu items added following the structure above -->
            <li class="menu-item">
                <a href="#">Event Management</a>
                <ul class="submenu">
                    <li><a href="./activities_add.php" target="mainFrame">Add Event</a></li>
                    <li><a href="./activities_list.php" target="mainFrame">Event List</a></li>
                </ul>
            </li>
            <!-- Other menu items added following the structure above -->
            <li class="menu-item">
                <a href="#">Foster Management</a>
                <ul class="submenu">
                    <li><a href="./fosters_list.php" target="mainFrame">Foster List</a></li>
                </ul>
            </li>
            <!-- Other menu items added following the structure above -->
            <li class="menu-item">
                <a href="#">Donation Management</a>
                <ul class="submenu">
                    <li><a href="./donation_list.php" target="mainFrame">Donation List</a></li>
                </ul>
            </li>
            <li class="menu-item">
                <a href="#">Single Page Management</a>
                <ul class="submenu">
                    <li><a href="./single_list.php" target="mainFrame">Single Page List</a></li>
                    <li><a href="./single_add.php" target="mainFrame">Add Single Page</a></li>
                </ul>
            </li>
            <!-- Other menu items added following the structure above -->
            <li class="menu-item">
                <a href="#">Focus Slideshow Management</a>
                <ul class="submenu">
                    <li><a href="./slide_add.php" target="mainFrame">Add Focus Slideshow</a></li>
                    <li><a href="./slide_list.php" target="mainFrame">Focus Slideshow List</a></li>
                </ul>
            </li>
        </ul>
    </div>
	  </td>
     </tr>
    </table>
   </div>
   </td>
  </tr>
</table>
</body>
</html>
