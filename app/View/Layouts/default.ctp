<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title><?php echo $title_for_layout; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>
        SITE_URL = '<?php echo SITE_URL; ?>';
        DASHBOARD_URL = '<?php echo DASHBOARD_URL; ?>';
    </script>
    <script src="<?php echo SITE_URL; ?>js/theme_js/jquery-1.9.1.min.js"></script>
    <script src="<?php echo SITE_URL; ?>js/script.js"></script>
    <?php
        echo $this->Html->meta('icon');
        echo $this->Html->css('bootstrap.min.css');
        echo $this->Html->css('bootstrap-responsive.min.css');
        echo $this->Html->css('style.css');
        echo $this->Html->css('style-responsive.css');
        echo $this->Html->css('style/custom_style.css');
        //echo $this->Html->css('cake.generic');
        //echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
    ?>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
</head>
<body class="<?php if(isset($class_login) && $class_login!=""){ echo $class_login;} ?>">
    <?php
        if(isset($loggedIn) && $loggedIn == "1"){
            echo $this->element("navbar");
        }
    ?>
    <div class="container-fluid-full">
        <div class="row-fluid">
            <?php
                if(isset($loggedIn) && $loggedIn == 1) {
                    echo $this->element("sidebar");
                }
            ?>
            <?php echo $this->fetch('content'); ?>
        </div>
    </div>
    <script src="<?php echo SITE_URL; ?>js/jquery.validate.js"></script>
    <script src="<?php echo SITE_URL; ?>js/theme_js/jquery-migrate-1.0.0.min.js"></script>
    <script src="<?php echo SITE_URL; ?>js/theme_js/jquery-ui-1.10.0.custom.min.js"></script>
    <script src="<?php echo SITE_URL; ?>js/theme_js/jquery.ui.touch-punch.js"></script>
    <script src="<?php echo SITE_URL; ?>js/theme_js/modernizr.js"></script>
    <script src="<?php echo SITE_URL; ?>js/theme_js/bootstrap.min.js"></script>
    <script src="<?php echo SITE_URL; ?>js/theme_js/jquery.cookie.js"></script>
    <script src='<?php echo SITE_URL; ?>js/theme_js/fullcalendar.min.js'></script>
    <script src='<?php echo SITE_URL; ?>js/theme_js/jquery.dataTables.min.js'></script>
    <script src="<?php echo SITE_URL; ?>js/theme_js/excanvas.js"></script>
    <script src="<?php echo SITE_URL; ?>js/theme_js/jquery.flot.js"></script>
    <script src="<?php echo SITE_URL; ?>js/theme_js/jquery.flot.pie.js"></script>
    <script src="<?php echo SITE_URL; ?>js/theme_js/jquery.flot.stack.js"></script>
    <script src="<?php echo SITE_URL; ?>js/theme_js/jquery.flot.resize.min.js"></script>
    <script src="<?php echo SITE_URL; ?>js/theme_js/jquery.chosen.min.js"></script>
    <script src="<?php echo SITE_URL; ?>js/theme_js/jquery.uniform.min.js"></script>
    <script src="<?php echo SITE_URL; ?>js/theme_js/jquery.cleditor.min.js"></script>
    <script src="<?php echo SITE_URL; ?>js/theme_js/jquery.noty.js"></script>
    <script src="<?php echo SITE_URL; ?>js/theme_js/jquery.elfinder.min.js"></script>
    <script src="<?php echo SITE_URL; ?>js/theme_js/jquery.raty.min.js"></script>
    <script src="<?php echo SITE_URL; ?>js/theme_js/jquery.iphone.toggle.js"></script>
    <script src="<?php echo SITE_URL; ?>js/theme_js/jquery.uploadify-3.1.min.js"></script>
    <script src="<?php echo SITE_URL; ?>js/theme_js/jquery.gritter.min.js"></script>
    <script src="<?php echo SITE_URL; ?>js/theme_js/jquery.imagesloaded.js"></script>
    <script src="<?php echo SITE_URL; ?>js/theme_js/jquery.masonry.min.js"></script>
    <script src="<?php echo SITE_URL; ?>js/theme_js/jquery.knob.modified.js"></script>
    <script src="<?php echo SITE_URL; ?>js/theme_js/jquery.sparkline.min.js"></script>
    <script src="<?php echo SITE_URL; ?>js/theme_js/counter.js"></script>
    <script src="<?php echo SITE_URL; ?>js/theme_js/retina.js"></script>
    <script src="<?php echo SITE_URL; ?>js/theme_js/custom.js"></script>
    <?php echo $this->element('sql_dump'); ?>
</body>
</html>
