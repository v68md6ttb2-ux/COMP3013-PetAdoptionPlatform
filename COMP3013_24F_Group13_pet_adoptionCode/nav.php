<section class="mainmenu-area stricky">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="main-logo">
                        <a href="index.php"><img src="<?php echo $config['site_logo']?>" alt=""></a>
                    </div>
                </div>

                <div class="col-md-8 menu-column">
                    <nav class="main-menu">
                        <div class="navbar-header">     
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="navbar-collapse collapse clearfix">
                            <ul class="navigation1 clearfix">
<?php 
$url = $_SERVER['PHP_SELF']; 
$u = explode('/',$url);
$filename = end($u); 
$cid = isset($_GET['c_id'])?$_GET['c_id']:0;
?>                    
<nav class="horizontal-menu">
        <ul>
            <li><a href="index.php">
                <div class="menu-item">
                    
                    <span class="english">Home</span>
                </div>
                </a>
            </li>
            <li><a href="info.php?c_id=1">
                <div class="menu-item">
                   
                    <span class="english">About Us</span>
                </div>
                </a>
            </li>
            <li><a href="./shop/list.php">
                <div class="menu-item">
                
                    <span class="english">Dog & Cat</span>
                </div></a>
            </li>
            <li><a href="list2.php?c_id=4">
                <div class="menu-item">
               
                    <span class="english">Activity</span>
                </div></a>
            </li>
            <li><a href="contact.php">
                <div class="menu-item">
               
                    <span class="english">Donation</span>
                </div></a>
            </li>
        </ul>
    </nav>
	
                            </ul>

                            <ul class="mobile-menu clearfix">
                                <li <?php if($filename=='index.php'){echo 'class="current"';}?>><a href="index.php">Home</a> </li>

                                <li <?php if($filename=='info.php'&&$cid==1){echo 'class="current"';}?>><a href="info.php?c_id=1">About us</a></li>
								<li><a href="./shop/list.php">Pet</a></li>
                                <li <?php if($filename=='list2.php'&&$cid==4){echo 'class="current"';}?>><a href="list2.php?c_id=4">Activity</a></li>
                                
                                <li <?php if($filename=='contact.php'){echo 'class="current"';}?>><a href="contact.php">Donation</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>

            </div>
        </div>
    </section>