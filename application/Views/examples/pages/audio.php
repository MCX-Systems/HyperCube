<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
	<title>HyperCube - Management Template</title>
	<meta charset="utf-8" />
	<meta name="description" content="HyperCube, full Management Responsive Template by MCX-Systems." />
	<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, HyperCube Management, HyperCube,
	 premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
	<meta name="author" content="Casar Davorin" />

	<!--IE Compatibility modes-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
	<!-- /ie compatibility modes -->

	<!-- Favicon: http://realfavicongenerator.net -->
	<link rel="apple-touch-icon" sizes="180x180"
	      href="<?php echo base_url() ?>assets/favicon/apple-touch-icon.png?v=<?php echo mt_rand(); ?>" />

	<link rel="apple-touch-icon-precomposed"
	      href="<?php echo base_url() ?>assets/favicon/apple-touch-icon.png?v=<?php echo mt_rand(); ?>">

	<link rel="icon" type="image/png" sizes="32x32"
	      href="<?php echo base_url() ?>assets/favicon/favicon-32x32.png?v=<?php echo mt_rand(); ?>" />

	<link rel="icon" type="image/png" sizes="192x192"
	      href="<?php echo base_url() ?>assets/favicon/android-chrome-192x192.png?v=<?php echo mt_rand(); ?>" />

	<link rel="icon" type="image/png" sizes="16x16"
	      href="<?php echo base_url() ?>assets/favicon/favicon-16x16.png?v=<?php echo mt_rand(); ?>" />

	<link rel="manifest" href="<?php echo base_url() ?>assets/favicon/manifest.json?v=<?php echo mt_rand(); ?>" />

	<link rel="mask-icon" href="<?php echo base_url() ?>assets/favicon/safari-pinned-tab.svg?v=<?php echo mt_rand(); ?>"
	      color="#5bbad5" />

	<link rel="shortcut icon" type="image/ico"
	      href="<?php echo base_url() ?>assets/favicon/favicon.ico?v=<?php echo mt_rand(); ?>" />

	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-title" content="HyperCube - Management Template" />
	<meta name="application-name" content="HyperCube" />
	<meta name="theme-color" content="#000000" />
	<!-- /favicon: http://realfavicongenerator.net -->

	<!-- *********************************************************************************************************** -->

	<!--  Set global URL -->
	<!--suppress JSUnusedLocalSymbols -->
	<script type="text/javascript">
		const global_base_url = "<?php echo base_url('/') ?>";
		// From https://openweathermap.org/
		const weather_api_key = "e20d9f452e4f83ab17782f28a010821b";
		/*-----------------------------------------------------------*/
		var notifications = false;
		var debugConsole = false;
	</script>
	<!-- /set global URL -->

	<!-- *********************************************************************************************************** -->

	<!-- Core level styles -->
	<link type="text/css"
	      href="<?php echo base_url() ?>assets/stylesheet/css/bundle-core.min.css?v=<?php echo mt_rand(); ?>"
	      rel="stylesheet" />
	<!-- /core level styles -->

	<!-- Theme CSS files -->
	<link type="text/css"
	      href="<?php echo base_url() ?>assets/stylesheet/theme/dark.min.css?v=<?php echo mt_rand(); ?>"
	      rel="stylesheet"
	      id="theme" />
	<!-- /theme CSS files -->

	<!-- *********************************************************************************************************** -->

	<!-- Custom CSS files -->
	<link type="text/css"
	      href="<?php echo base_url() ?>assets/stylesheet/custom.min.css?v=<?php echo mt_rand(); ?>"
	      rel="stylesheet" />
	<!-- /custom CSS files -->

	<!-- *********************************************************************************************************** -->

	<!-- Javascript Bundles -->
	<script type="text/javascript"
	        src="<?php echo base_url() ?>assets/javascript/js/core.min.js?v=<?php echo mt_rand(); ?>"></script>
	<!-- /javascript Bundles  -->

	<!-- Core level javascript -->
	<script type="text/javascript"
	        src="<?php echo base_url() ?>assets/javascript/js/app.min.js?v=<?php echo mt_rand(); ?>"></script>
	<!-- /core level javascript  -->

	<!-- Init HyperCube -->
	<script type="text/javascript"
	        src="<?php echo base_url() ?>assets/javascript/js/init.min.js?v=<?php echo mt_rand(); ?>"></script>
	<!-- /init JS files -->

	<!-- *********************************************************************************************************** -->

	<!-- Custom JS files -->
	<script type="text/javascript"
	        src="<?php echo base_url() ?>assets/javascript/custom.min.js?v=<?php echo mt_rand(); ?>"></script>
	<!-- /custom JS files -->
</head>

<body>

<div id="outdated">
	<h2 class="mt-5">Your browser is out-of-date!</h2>
	<h5>Update your browser to view this website correctly.</h5>
</div>

<!-- ============================================================== -->
<!-- Header - style you can find in core-header.css                 -->
<!-- ============================================================== -->
<header id="top" class="fixed-top animated fadeInDown">
	<nav class="navbar navbar-expand">
		<a class="text-left align-middle navbar-toggler d-block d-sm-none d-md-none d-lg-none d-xl-none"
		   href="#">
			<i class="fas fa-bars fa-2x" aria-hidden="true"></i>
		</a>

		<a class="text-left align-middle navbar-brand d-none d-sm-block d-md-block d-lg-block d-xl-block mr-2 animated zoomIn"
		   href="#">
			<img src="<?php echo base_url() ?>assets/images/logo-big.png" alt="Home" class="logo" />
		</a>

		<a href="#"
		   class="toggler text-left align-middle mr-4 d-none d-sm-none d-md-block d-lg-block d-xl-block"
		   title="Toggle SideMenu">
			<i class="fas fa-th" aria-hidden="false"></i>
		</a>

		<span class="header-phone-logo text-primary d-block d-sm-none d-md-none d-lg-none d-xl-none">
			<img src="<?php echo base_url() ?>assets/images/logo-big.png" alt="Home" class="logo float-right" />
		</span>

		<a href="#" onclick="HyperCube.toggleFullScreen();" title="Switch to FullScreen"
		   class="site-fullScreen mr-4 d-none d-sm-none d-md-block d-lg-block d-xl-block">
			<i id="site-fullScreen" class="fas fa-expand"></i>
		</a>

		<ul class="navbar-nav mr-auto d-none d-sm-block d-md-block d-lg-block d-xl-block">
			<li class="nav-item">
				<a id="color_dark" onclick="HyperCube.loadCssFile('dark', true);" title="Dark Theme"
				   class="dark nav-link"></a>
			</li>
			<li class="nav-item">
				<a id="color_green" onclick="HyperCube.loadCssFile('green', true);" title="Green Theme"
				   class="green nav-link"></a>
			</li>
			<li class="nav-item">
				<a id="color_blue" onclick="HyperCube.loadCssFile('blue', true);" title="Blue Theme"
				   class="blue nav-link"></a>
			</li>
			<li class="nav-item">
				<a id="color_red" onclick="HyperCube.loadCssFile('red', true);" title="Red Theme"
				   class="red nav-link"></a>
			</li>
			<li class="nav-item">
				<a id="color_light" onclick="HyperCube.loadCssFile('light', true);" title="Light Theme"
				   class="light nav-link"></a>
			</li>
			<li class="nav-item search-item">
				<a href="#" title="Search website content.">
					<i class="fas fa-search search-icon"></i>
				</a>
				<form class="app-search">
					<input type="search" class="form-control" placeholder="Enter keyword and Search..." />
					<button type="button" class="btn close" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</form>
			</li>
		</ul>

		<ul class="nav mr-1 header-middle-background">
			<li class="nav-item mr-3 ml-2 d-none d-sm-none d-md-none d-lg-none d-xl-block">
				<div id="headerTime" class="ml-3 number-font">Current Date</div>
			</li>

			<li class="d-none d-sm-none d-md-none d-lg-none d-xl-block">
				<div class="vertical-sep mr-4"></div>
			</li>

			<li class="nav-item mr-md-5 dropdown d-none d-sm-none d-md-none d-lg-none d-xl-block">
				<a href="#" class="text-left align-middle ml-1" data-toggle="dropdown" title="User Messages" aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-envelope fa-2x" aria-hidden="true"></i>
					<div class="notify">
						<span class="heartbit"></span>
						<span class="point"></span>
					</div>
				</a>
				<ul class="animated bounceInDown dropdown-menu dropdown-mailbox">
					<li>
						<div class="dropdown-tasks-header">
							<b>Messages</b>
							<span class="dropdown-tasks-mark-end text-warning">
								You have 4 new messages
								<a href="<?php echo base_url() ?>messages/inbox" class="ml-2">
									<i class="fas fa-envelope-open fa-1x text-warning"></i>
								</a>
							</span>
						</div>
					</li>
					<li class="message-center">
						<a href="<?php echo base_url() ?>messages/read">
							<div class="message-img mr-4 mt-1">
								<img alt="Avatar" class="img-circle img-fluid" src="<?php echo base_url() ?>assets/avatars/avatar2.png" />
								<span class="online message-status pull-right"></span>
							</div>

							<div class="mail-content">
								<span class="time badge badge-success">9:30 AM</span>
								<h5>Franc Eugen</h5>
								<span class="mail-desc">Read full message...</span>
							</div>
						</a>
						<hr />
					</li>
					<li class="message-center">
						<a href="<?php echo base_url() ?>messages/read">
							<div class="message-img mr-4 mt-1">
								<img alt="Avatar" class="img-circle img-fluid" src="<?php echo base_url() ?>assets/Avatars/avatar3.png" />
								<span class="busy message-status pull-right"></span>
							</div>

							<div class="mail-content">
								<span class="time badge badge-info">9:10 AM</span>
								<h5>Feri Sonju</h5>
								<span class="mail-desc">I've sung a song! See you at</span>
							</div>
						</a>
						<hr />
					</li>
					<li class="message-center">
						<a href="<?php echo base_url() ?>messages/read">
							<div class="message-img mr-4 mt-1">
								<img alt="Avatar" class="img-circle img-fluid" src="<?php echo base_url() ?>assets/Avatars/avatar4.png" />
								<span class="away message-status pull-right"></span>
							</div>

							<div class="mail-content">
								<span class="time badge badge-info">9:08 AM</span>
								<h5>Janez Zver</h5>
								<span class="mail-desc">I am a singer!</span>
							</div>
						</a>
						<hr />
					</li>
					<li class="message-center">
						<a href="<?php echo base_url() ?>messages/read">
							<div class="message-img mr-4 mt-1">
								<img alt="Avatar" class="img-circle img-fluid" src="<?php echo base_url() ?>assets/Avatars/avatar5.png" />
								<span class="offline message-status pull-right"></span>
							</div>

							<div class="mail-content">
								<span class="time badge badge-danger">9:02 AM</span>
								<h5>Janez Zver</h5>
								<span class="mail-desc">Just see the my admin!</span>
							</div>
						</a>
						<hr />
					</li>
					<li>
						<a class="dropdown-tasks-view-all" href="<?php echo base_url() ?>messages/inbox">
							<i class="fas fa-envelope mr-3"></i>
							<span>View all Messages</span>
						</a>
					</li>
				</ul>
			</li>

			<li class="nav-item ml-sm-4 dropdown d-none d-sm-none d-md-none d-lg-block d-xl-block ml-3 mr-5">
				<a href="#" class="text-left align-middle" data-toggle="dropdown" title="User Tasks" aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-bell fa-2x" aria-hidden="true"></i>
					<div class="notify">
						<span class="heartbit"></span>
						<span class="point"></span>
					</div>
				</a>
				<ul class="animated dropdown-menu dropdown-tasks slideInUp">
					<li>
						<div class="dropdown-tasks-header">
							<b>Tasks</b>
							<span class="dropdown-tasks-mark-end text-warning">
								Add Task
								<a href="#" class="ml-2">
									<i class="fas fa-plus-square fa-1x text-warning"></i>
								</a>
							</span>
						</div>
						<div class="dropdown-tasks-body">
							<div class="dropdown-tasks-body-empty">
								<i class="fas fa-bell-slash fa-5x mb-3"></i>
								<div class="dropdown-tasks-body-empty-text text-warning">No running tasks!</div>
							</div>
						</div>
						<hr />
					</li>
					<li>
						<a class="dropdown-tasks-view-all" href="<?php echo base_url() ?>user/tasks">
							<i class="fas fa-tasks mr-3"></i>
							<span>View all Tasks</span>
						</a>
					</li>
				</ul>
			</li>

			<li class="nav-item mr-md-4 ml-4 dropdown dropdown-user-menu">
				<a href="#" class="align-middle" data-toggle="dropdown" title="User Access" aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-user fa-2x" aria-hidden="true"></i>
				</a>
				<ul class="animated dropdown-menu dropdown-user bounceInRight">
					<li>
						<div class="dropdown-user-content">
							<div class="dropdown-user-avatar">
								<img src="<?php echo base_url() ?>assets/Avatars/avatar.png" class="img-fluid" alt="Avatar" />
							</div>
							<div class="dropdown-info">
								<div class="dropdown-info-name">John Smith</div>
								<div class="dropdown-info-job">Manager</div>

								<div class="dropdown-info-buttons pb-2">
									<button onclick="window.location.href='<?php echo base_url() ?>user/profile'"
									        type="button" class="btn btn-secondary btn-sm mr-2">
										<i class="fas fa-id-card mr-2"></i>View Profile
									</button>

									<button onclick="window.location.href='<?php echo base_url() ?>access/locked'"
									        type="button" class="btn btn-sm btn-danger">
										<i class="fas fa-user-lock mr-2"></i>Lock Screen
									</button>
								</div>
							</div>
						</div>
					</li>
					<li>
						<a class="dropdown-item" href="<?php echo base_url() ?>user/upgrade">
							<i class="fas fa-angle-double-up fa-fw mr-3"></i>Upgrade to
							<span>PRO</span>
						</a>
					</li>
					<li>
						<a class="dropdown-item" href="<?php echo base_url() ?>user/settings">
							<i class="fas fa-user-cog fa-fw mr-3"></i>Account Settings
						</a>
					</li>
					<li>
						<a class="dropdown-item" href="<?php echo base_url() ?>messages/inbox">
							<i class="fas fa-envelope fa-fw mr-3"></i>Messages
						</a>
					</li>
					<li>
						<a class="dropdown-item" href="<?php echo base_url() ?>help">
							<i class="fas fa-question-circle fa-fw mr-3"></i>Help
						</a>
						<hr />
					</li>
					<li>
						<div class="d-flex">
							<div class="w-100 border-right border-warning">
								<a class="dropdown-tasks-view-all" href="<?php echo base_url() ?>access/logout">
									<i class="fas fa-sign-out-alt fa-fw mr-3"></i>
									<span>Sign Out</span>
								</a>
							</div>
							<div class="flex-shrink-1">
								<a class="dropdown-tasks-view-all" href="<?php echo base_url() ?>management/index">
									<i class="fab fa-keycdn fa-fw"></i>
								</a>
							</div>
						</div>
					</li>
				</ul>
			</li>
		</ul>
		<ul class="nav ml-5 mr-2 mt-2 d-none d-sm-block d-md-block d-lg-block d-xl-block">
			<li class="nav-item">
				<a id="switch-topMenu" href="#" title="Toggle Informer">
					<i class="fas fa-grip-horizontal fa-2x fa-fw" aria-hidden="true"></i>
				</a>
			</li>
		</ul>
		<ul class="nav ml-4 mr-3 mt-2 d-none d-sm-none d-md-block d-lg-block d-xl-block">
			<li class="nav-item">
				<a href="#" id="right-side-toggle" title="Toggle Quick Settings">
					<i class="fas fa-grip-vertical fa-2x fa-fw" aria-hidden="true"></i>
				</a>
			</li>
		</ul>
	</nav>
</header>
<!-- ============================================================== -->
<!-- End Header                                                     -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in core-aside-left.css       -->
<!-- ============================================================== -->
<aside id="left" class="sidebar animated fadeInLeft">
	<!-- Left Sidebar Content -->
	<nav class="sidebar-nav slim-scroll-sidebarL">
		<ul class="nav" id="side-menu" aria-expanded="false">
			<!-- Left Sidebar Main User Part Menu -->
			<li></li>
			<li class="user-pro">
				<a href="#" class="user-link text-center" aria-expanded="false">
					<img src="<?php echo base_url() ?>assets/avatars/avatar.png" alt="User Avatar" class="rounded-circle img-circle img-fluid mr-3" />
					<br />
					<span class="hide-menu user-text">Welcome John Smith</span>
				</a>

				<ul class="nav nav-second-level" aria-expanded="false">
					<li>
						<a href="<?php echo base_url() ?>user/profile">
							<i class="fas fa-id-card fa-fw mr-3"></i>View Profile
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>messages/inbox">
							<i class="fas fa-envelope fa-fw mr-3"></i>Messages
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>settings">
							<i class="fas fa-user-cog fa-fw mr-3"></i>Account Settings
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>management/index">
							<i class="fab fa-keycdn fa-fw mr-3"></i>Management
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>access/logout">
							<i class="fas fa-sign-out-alt fa-fw mr-3"></i>Logout
						</a>
					</li>
					<li>
						<hr />
					</li>
				</ul>
			</li>
			<!-- /left sidebar main user part menu -->

			<li class="nav-small-cap">
				<b class="ml-3 text-warning">Main Menu</b>
			</li>

			<li>
				<a href="<?php echo base_url() ?>">
					<i class="fas fa-home fa-fw"></i>
					<span class="hide-menu">Home</span>
				</a>
			</li>

			<li>
				<a href="<?php echo base_url() ?>home/dashboard">
					<i class="fas fa-chalkboard fa-fw"></i>
					<span class="hide-menu">Dashboard</span>
				</a>
			</li>

			<li class="nav-small-cap">
				<b class="ml-3 text-warning">Components</b>
			</li>

			<li>
				<a href="<?php echo base_url() ?>examples/animations">
					<i class="fab fa-asymmetrik fa-fw"></i>
					<span class="hide-menu">UI - Animations</span>
				</a>
			</li>

			<li>
				<a href="<?php echo base_url() ?>examples/core">
					<i class="fab fa-codepen fa-fw"></i>
					<span class="hide-menu">UI - Core</span>
				</a>
			</li>

			<li>
				<a href="#" aria-expanded="false">
					<i class="fas fa-compact-disc fa-fw"></i>
					<span class="hide-menu">
						UI - Media
						<span class="fas arrow"></span>
						<span class="badge badge-pill badge-primary">4</span>
					</span>
				</a>
				<ul class="nav nav-second-level" aria-expanded="false">
					<li>
						<a href="<?php echo base_url() ?>pages/audio">
							<i class="fas fa-headphones fa-fw mr-3"></i>Audio
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>pages/radio">
							<i class="fas fa-bullhorn fa-fw mr-3"></i>Radio
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>pages/video">
							<i class="fas fa-video fa-fw mr-3"></i>Video
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>pages/games">
							<i class="fas fa-gamepad fa-fw mr-3"></i>Games
						</a>
					</li>
					<li class="hide-menu"><hr /></li>
				</ul>
			</li>

			<li>
				<a href="#" aria-expanded="false">
					<i class="fab fa-uikit fa-fw"></i>
					<span class="hide-menu">
						UI - Extensions
						<span class="fas arrow"></span>
						<span class="badge badge-pill badge-success">28</span>
					</span>
				</a>
				<ul class="nav nav-second-level" aria-expanded="false">
					<li>
						<a href="<?php echo base_url() ?>examples/alerts">
							<i class="fab fa-uikit fa-fw mr-3"></i>Alerts
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>examples/avatars">
							<i class="fab fa-uikit fa-fw mr-3"></i>Avatars
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>examples/badges">
							<i class="fab fa-uikit fa-fw mr-3"></i>Badges
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>examples/blockquote">
							<i class="fab fa-uikit fa-fw mr-3"></i>BlockQuote
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>examples/bootstrap">
							<i class="fab fa-uikit fa-fw mr-3"></i>Bootstrap
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>examples/button">
							<i class="fab fa-uikit fa-fw mr-3"></i>ButtonBuilder
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>examples/buttons">
							<i class="fab fa-uikit fa-fw mr-3"></i>Buttons
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>examples/cards">
							<i class="fab fa-uikit fa-fw mr-3"></i>Cards
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>examples/colors">
							<i class="fab fa-uikit fa-fw mr-3"></i>Colors
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>examples/counters">
							<i class="fab fa-uikit fa-fw mr-3"></i>Counters
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>examples/embed">
							<i class="fab fa-uikit fa-fw mr-3"></i>Embed
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>examples/dropdown">
							<i class="fab fa-uikit fa-fw mr-3"></i>Dropdown
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>examples/grid">
							<i class="fab fa-uikit fa-fw mr-3"></i>Grid
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>examples/hoverer">
							<i class="fab fa-uikit fa-fw mr-3"></i>Hoverer
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>examples/loaders">
							<i class="fab fa-uikit fa-fw mr-3"></i>Loaders
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>examples/lists">
							<i class="fab fa-uikit fa-fw mr-3"></i>Lists
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>examples/feeds">
							<i class="fab fa-uikit fa-fw mr-3"></i>Feeds
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>examples/forms">
							<i class="fab fa-uikit fa-fw mr-3"></i>Forms
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>examples/modals">
							<i class="fab fa-uikit fa-fw mr-3"></i>Modals
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>examples/progress">
							<i class="fab fa-uikit fa-fw mr-3"></i>Progress
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>examples/ribbons">
							<i class="fab fa-uikit fa-fw mr-3"></i>Ribbons
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>examples/shadows">
							<i class="fab fa-uikit fa-fw mr-3"></i>Shadows
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>examples/scr">
							<i class="fab fa-uikit fa-fw mr-3"></i>Switches
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>examples/tables">
							<i class="fab fa-uikit fa-fw mr-3"></i>Tables
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>examples/tabs">
							<i class="fab fa-uikit fa-fw mr-3"></i>Tabs
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>examples/testimonial">
							<i class="fab fa-uikit fa-fw mr-3"></i>Testimonial
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>examples/tooltips">
							<i class="fab fa-uikit fa-fw mr-3"></i>Tooltips
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>examples/typography">
							<i class="fab fa-uikit fa-fw mr-3"></i>Typography
						</a>
					</li>
					<li>
						<hr />
					</li>
				</ul>
			</li>

			<li>
				<a href="#" aria-expanded="false">
					<i class="fas fa-plug fa-fw"></i>
					<span class="hide-menu">
						UI - Plugins
						<span class="fas arrow"></span>
						<span class="badge badge-pill badge-danger">23</span>
					</span>
				</a>
				<ul class="nav nav-second-level" aria-expanded="false">
					<li>
						<a href="<?php echo base_url() ?>examples/barCodes">
							<i class="fas fa-plug fa-fw mr-3"></i>Barcodes
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>examples/calendar">
							<i class="fas fa-plug fa-fw mr-3"></i>Calendar
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>examples/charts">
							<i class="fas fa-plug fa-fw mr-3"></i>Flot Charts
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>examples/cropper">
							<i class="fas fa-plug fa-fw mr-3"></i>Image Cropper
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>examples/cycle">
							<i class="fas fa-plug fa-fw mr-3"></i>Cycle
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>examples/googleMaps">
							<i class="fas fa-plug fa-fw mr-3"></i>Google Maps
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>examples/highSlide">
							<i class="fas fa-plug fa-fw mr-3"></i>HighSlide
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>examples/indicators">
							<i class="fas fa-plug fa-fw mr-3"></i>Indicators
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>examples/jsTree">
							<i class="fas fa-plug fa-fw mr-3"></i>JSTree
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>examples/knob">
							<i class="fas fa-plug fa-fw mr-3"></i>Knob
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>examples/letterFX">
							<i class="fas fa-plug fa-fw mr-3"></i>LetterFX
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>examples/pickers">
							<i class="fas fa-plug fa-fw mr-3"></i>Pickers
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>examples/prism">
							<i class="fas fa-plug fa-fw mr-3"></i>Prism
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>examples/rangeSlider">
							<i class="fas fa-plug fa-fw mr-3"></i>Range Slider
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>examples/rating">
							<i class="fas fa-plug fa-fw mr-3"></i>Rating
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>examples/roundSlider">
							<i class="fas fa-plug fa-fw mr-3"></i>Round Slider
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>examples/sparkLine">
							<i class="fas fa-plug fa-fw mr-3"></i>SparkLine Charts
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>examples/ticker">
							<i class="fas fa-plug fa-fw mr-3"></i>Web Ticker
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>examples/tinyMCE">
							<i class="fas fa-plug fa-fw mr-3"></i>Tiny MCE
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>examples/toolbar">
							<i class="fas fa-plug fa-fw mr-3"></i>Toolbar
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>examples/upLoaders">
							<i class="fas fa-plug fa-fw mr-3"></i>UpLoaders
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>examples/vectorMaps">
							<i class="fas fa-plug fa-fw mr-3"></i>Vector Maps
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>examples/xEditable">
							<i class="fas fa-plug fa-fw mr-3"></i>XEditable
						</a>
					</li>
					<li>
						<hr />
					</li>
				</ul>
			</li>

			<li>
				<a href="#" aria-expanded="false">
					<i class="fas fa-magic fa-fw"></i>
					<span class="hide-menu">
						UI - Widgets
						<span class="fas arrow"></span>
						<span class="badge badge-pill badge-primary">1</span>
					</span>
				</a>
				<ul class="nav nav-second-level" aria-expanded="false">
					<li>
						<a href="<?php echo base_url() ?>examples/data">
							<i class="fas fa-magic fa-fw mr-3"></i>Data
						</a>
					</li>
					<li class="hide-menu"><hr /></li>
				</ul>
			</li>

			<li>
				<a href="#" aria-expanded="false">
					<i class="fas fa-file-alt fa-fw"></i>
					<span class="hide-menu">
						UI - Pages
						<span class="fas arrow"></span>
						<span class="badge badge-pill badge-primary">17</span>
					</span>
				</a>
				<ul class="nav nav-second-level">
					<li>
						<a href="<?php echo base_url() ?>pages/blank">
							<i class="fas fa-file-alt fa-fw mr-3"></i>Blank Page
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>pages/profile">
							<i class="fas fa-file-alt fa-fw mr-3"></i>Profile
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>pages/posts">
							<i class="fas fa-file-alt fa-fw mr-3"></i>Posts
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>pages/postsDetails">
							<i class="fas fa-file-alt fa-fw mr-3"></i>Post Details
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>pages/addressBook">
							<i class="fas fa-file-alt fa-fw mr-3"></i>Address Book
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>pages/call">
							<i class="fas fa-file-alt fa-fw mr-3"></i>Caller
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>pages/callVideo">
							<i class="fas fa-file-alt fa-fw mr-3"></i>Video Call
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>pages/priceBox">
							<i class="fas fa-file-alt fa-fw mr-3"></i>Price Box
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>pages/todo">
							<i class="fas fa-file-alt fa-fw mr-3"></i>ToDo
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>pages/fileManager">
							<i class="fas fa-file-alt fa-fw mr-3"></i>File Manager
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>pages/gallery">
							<i class="fas fa-file-alt fa-fw mr-3"></i>Gallery
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>pages/property">
							<i class="fas fa-file-alt fa-fw mr-3"></i>Property
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>pages/propertyList">
							<i class="fas fa-file-alt fa-fw mr-3"></i>Property List
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>pages/searchResults">
							<i class="fas fa-file-alt fa-fw mr-3"></i>Search Results
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>pages/product">
							<i class="fas fa-file-alt fa-fw mr-3"></i>Product
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>pages/ipCam">
							<i class="fas fa-file-alt fa-fw mr-3"></i>IP-Camera
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>pages/settings">
							<i class="fas fa-file-alt fa-fw mr-3"></i>Settings
						</a>
					</li>
					<li>
						<hr />
					</li>
				</ul>
			</li>

			<li class="nav-small-cap">
				<b class="ml-3 text-warning">Icons and Fonts</b>
			</li>

			<li>
				<a href="<?php echo base_url() ?>examples/icons" aria-expanded="false">
					<i class="fab fa-fonticons-fi fa-fw"></i>
					<span class="hide-menu">UI - Icons</span>
				</a>
			</li>

			<li>
				<a href="<?php echo base_url() ?>examples/fonts" aria-expanded="false">
					<i class="fas fa-font fa-fw"></i>
					<span class="hide-menu">UI - Fonts</span>
				</a>
			</li>

			<li class="nav-small-cap">
				<b class="ml-3 text-warning">Automation</b>
			</li>

			<li>
				<a href="#" aria-expanded="false">
					<i class="fas fa-microchip fa-fw"></i>
					<span class="hide-menu">Hardware / Software<span class="fas arrow"></span></span>
				</a>

				<ul class="nav nav-second-level" aria-expanded="false">
					<li>
						<a href="<?php echo base_url() ?>automation/arduino">
							<i class="fas fa-microchip mr-3"></i>Arduino
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>automation/sockets">
							<i class="fas fa-microchip mr-3"></i>Sockets OI
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>automation/webSockets">
							<i class="fas fa-microchip mr-3"></i>WebSockets
						</a>
					</li>
					<li>
						<hr />
					</li>
				</ul>
			</li>

			<li>
				<a href="#" aria-expanded="false">
					<i class="fas fa-robot fa-fw"></i>
					<span class="hide-menu">Home Automation<span class="fas arrow"></span></span>
				</a>

				<ul class="nav nav-second-level" aria-expanded="false">
					<li>
						<a href="<?php echo base_url() ?>automation">
							<i class="fas fa-robot mr-3"></i>Home
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>automation/components">
							<i class="fas fa-robot mr-3"></i>Components
						</a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>automation/tools">
							<i class="fas fa-robot mr-3"></i>Tools
						</a>
					</li>
					<li>
						<hr />
					</li>
				</ul>
			</li>

			<li class="nav-small-cap">
				<b class="ml-3 text-warning">Support</b>
			</li>

			<li>
				<a href="<?php echo base_url() ?>sitemap" aria-expanded="false">
					<i class="fas fa-sitemap fa-fw"></i>
					<span class="hide-menu">Sitemap</span>
				</a>
			</li>

			<li>
				<a href="<?php echo base_url() ?>home/fax" aria-expanded="false">
					<i class="fas fa-fax fa-fw"></i>
					<span class="hide-menu">Fax</span>
				</a>
			</li>

			<li>
				<a href="<?php echo base_url() ?>help" aria-expanded="false">
					<i class="fas fa-life-ring fa-fw"></i>
					<span class="hide-menu">Help</span>
				</a>
			</li>

			<li>
				<a href="<?php echo base_url() ?>documentation" aria-expanded="false">
					<i class="fas fa-book fa-fw"></i>
					<span class="hide-menu">Documentation</span>
				</a>
			</li>
		</ul>
	</nav>

	<!-- Left Sidebar Footer Content -->
	<section class="left-sidebar-bottom hide-menu">
		<div id="left-sensors" class="collapse">
			<div class="d-flex">
				<div class="flex-fill">
		            <span id="sensorSite" class="badge badge-success badge-icon badge-icon-sm" data-toggle="tooltip" title="Sensors State">
			            <i class="fas fa-check-circle"></i>
		            </span>
				</div>
				<div class="flex-fill">
				    <span id="sensorCookie" class="badge badge-dark badge-icon badge-icon-sm" data-toggle="tooltip" title="Cookie State">
					    <i class="fas fa-cookie-bite"></i>
		            </span>
				</div>
				<div class="flex-fill">
				    <span id="sensorWeather" class="badge badge-dark badge-icon badge-icon-sm" data-toggle="tooltip" title="Weather Plugin State">
			            <i class="fas fa-umbrella"></i>
		            </span>
				</div>
				<div class="flex-fill">
				    <span id="sensorMedia" class="badge badge-dark badge-icon badge-icon-sm" data-toggle="tooltip" title="Media Plugin State">
			            <i class="fas fa-compact-disc"></i>
		            </span>
				</div>
			</div>
			<hr />
			<div class="d-flex">
				<div class="flex-fill">
		            <span id="sensorSSL" class="badge badge-primary badge-icon badge-icon-sm" data-toggle="tooltip" title="SSL Security State">
			            <i class="fas fa-lock"></i>
		            </span>
				</div>
				<div class="flex-fill">
		            <span id="sensorLocalStorage" class="badge badge-dark badge-icon badge-icon-sm" data-toggle="tooltip" title="Local Storage State">
			            <i class="fas fa-database"></i>
		            </span>
				</div>
				<div class="flex-fill">
		            <span class="badge badge-dark badge-icon badge-icon-sm" data-toggle="tooltip" title="DinoHome State">
			            <i class="fas fa-robot"></i>
		            </span>
				</div>
				<div class="flex-fill">
		            <span id="sensorErrors" class="badge badge-dark badge-icon badge-icon-sm" data-toggle="tooltip" title="Errors State">
			            <i class="fas fa-exclamation-triangle"></i>
		            </span>
				</div>
			</div>
		</div>
		<img id="left-banner" src="data:image/png;base64,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" class="img-fluid rounded mt-2" alt="Web Developer" />
	</section>
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar                                               -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Page wrapper - style you can find in core-main.css             -->
<!-- ============================================================== -->
<main id="main-wrapper" class="container-fluid">
	<!-- ============================================================== -->
	<!-- Main Informer                                                  -->
	<!-- ============================================================== -->
	<article id="breadcrumb-bar">
		<nav class="row">
			<!-- ============================================================== -->
			<!-- Main Breadcrumb with media player and slide menu               -->
			<!-- ============================================================== -->
			<section class="breadcrumb-bar col-md-12 animated zoomIn">
				<div id="breadcrumb">
					<div class="float-left align-middle text-warning breadcrumb-title">
						<i class="fas fa-cube fa-fw float-left align-middle mt-1 xxl mr-2"></i>
						<h4 class="float-left align-middle" data-i18n="core:breadcrumb.welcome">Welcome</h4>
					</div>
					<ul class="breadcrumb float-right align-middle">
						<li class="breadcrumb-item">
							<a href="<?php echo base_url() ?>">
								<i class="fas fa-home mr-2"></i>
								Home
							</a>
						</li>
						<li class="breadcrumb-item">
							<a href="<?php echo base_url() ?>examples/blank">Examples</a>
						</li>
						<li class="breadcrumb-item">
							<a href="<?php echo base_url() ?>examples/blank">Pages</a>
						</li>
						<li class="breadcrumb-item active">Audio</li>
					</ul>
				</div>
				<!-- ============================================================== -->
				<!-- Main Top Menu toggleable with Breadcrumb                       -->
				<!-- ============================================================== -->
				<div id="topMenu">
					<div class="tm-wrapper">
						<div class="tm-item">
							<a href="javascript:void(0);" title="Site Settings" class="text-warning">
								<i class="fas fa-cog"></i>
							</a>
						</div>

						<div class="tm-item">
							<a href="javascript:void(0);" title="Arduino Settings" class="text-warning">
								<i class="fas fa-microchip"></i>
							</a>
						</div>

						<div class="tm-item">
							<a href="javascript:void(0);" title="Language Settings" class="text-warning">
								<i class="fas fa-language"></i>
							</a>
						</div>

						<div class="tm-item">
							<a href="javascript:void(0);" title="Image Settings" class="text-warning">
								<i class="fas fa-camera"></i>
							</a>
						</div>

						<div class="tm-item">
							<a href="javascript:void(0);" title="Repair Website" class="text-warning">
								<i class="fas fa-ambulance"></i>
							</a>
						</div>

						<div class="tm-item">
							<a href="javascript:void(0);" title="User Settings" class="text-warning">
								<i class="fas fa-user"></i>
							</a>
						</div>

						<div class="tm-item">
							<a href="javascript:void(0);" title="UserGroup Settings" class="text-warning">
								<i class="fas fa-id-card"></i>
							</a>
						</div>

						<div class="tm-item">
							<a href="javascript:void(0);" title="Email Settings" class="text-warning">
								<i class="fas fa-envelope"></i>
							</a>
						</div>

						<div class="tm-item">
							<a href="javascript:void(0);" title="Manage Games" class="text-warning">
								<i class="fas fa-gamepad"></i>
							</a>
						</div>

						<div class="tm-item">
							<a href="javascript:void(0);" title="Manage Video" class="text-warning">
								<i class="fas fa-video"></i>
							</a>
						</div>

						<div class="tm-item">
							<a href="javascript:void(0);" title="Manage Audio" class="text-warning">
								<i class="fas fa-music"></i>
							</a>
						</div>

						<div class="tm-item">
							<a href="javascript:void(0);" title="Manage Content" class="text-warning">
								<i class="fas fa-newspaper"></i>
							</a>
						</div>

						<div class="tm-item">
							<a href="javascript:void(0);" title="Manage Sharing" class="text-warning">
								<i class="fas fa-share-alt-square"></i>
							</a>
						</div>

						<div class="tm-item">
							<a href="javascript:void(0);" title="Manage Uploads" class="text-warning">
								<i class="fas fa-upload"></i>
							</a>
						</div>

						<div class="tm-item">
							<a href="javascript:void(0);" title="Manage Google Ads" class="text-warning">
								<i class="fab fa-adversal"></i>
							</a>
						</div>
					</div>
				</div>

				<div class="scroll-progress-container">
					<div class="progress progress-micro">
						<div id="scrollProgress" class="progress-bar bg-primary"></div>
					</div>
				</div>
				<!-- ============================================================== -->
				<!-- End Main Top Menu toggleable with Breadcrumb                   -->
				<!-- ============================================================== -->
				<!-- ============================================================== -->
				<!-- Main Media Player                                              -->
				<!-- ============================================================== -->
				<div id="topPlayerControls"></div>
				<!-- ============================================================== -->
				<!-- End Media Player                                               -->
				<!-- ============================================================== -->
			</section>
			<!-- ============================================================== -->
			<!-- End Main Breadcrumb with media player and slide menu           -->
			<!-- ============================================================== -->
		</nav>
	</article>
	<!-- ============================================================== -->
	<!-- End Informer                                                   -->
	<!-- ============================================================== -->
	<!-- ============================================================== -->
	<!-- Start Page Content -->
	<!-- ============================================================== -->
	<article id="main-wrapper-content" class="animated zoomIn">
		<div class="main-scroller">
			<div class="main-content-box">
				<div class="row">
					<!-- Ajax Content -->
					<section class="col-md-12">
						<div id="ajax-message-content"></div>
						<div id="ajax-content"></div>
					</section>
					<!-- ============================================================== -->
					<!-- Start Custom Content                                           -->
					<!-- ============================================================== -->

					<section class="col-md-12 mb-3">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">Audio Example</h4>
								<h6 class="card-subtitle">Use of <code>single audio</code> and <code>audio playlist</code>.</h6>
							</div>
						</div>
					</section>

					<section class="col-md-12">
						<hr/>
					</section>

					<section class="col-md-12">
						<button onclick="HyperCube.playCubeMedia('<?php echo base_url('/') ?>uploads/audio/audio1.mp3', '<?php echo base_url('/') ?>uploads/video/cover.jpg', 'Audio Title 1', '');" type="button" class="btn btn-rounded btn-secondary">
							Play Audio
						</button>

						<button onclick="HyperCube.playCubeMedia('<?php echo base_url('/') ?>uploads/audio/audio2.mp3', '', 'Audio Title 1', '');" type="button" class="btn btn-rounded btn-success">
							Play audio no poster
						</button>

						<button onclick="HyperCube.playCubeMedia('', '', '', 'aHR0cDovL2xvY2FsaG9zdC91cGxvYWRzL1BsYXlsaXN0cy92aWRlb1BsYXlsaXN0Lmpzb24=');" type="button" class="btn btn-rounded btn-info">
							Play audio playlist from json file
						</button>
					</section>

					<section class="col-md-12">
						<hr/>
					</section>

					<!-- ============================================================== -->

					<section class="col-md-5 mb-3">
						<article id="audio1"
						         data-title="Kiesza5"
						         data-artist="From data tag"
						         data-artwork="<?php echo base_url() ?>uploads/audio/covers/cover9.jpg"
						         data-trackurl="<?php echo base_url() ?>uploads/audio/audio11.mp3"></article>
					</section>

					<section class="col-md-4 mb-3">
						<article id="audio2"></article>
					</section>

					<section class="col-md-3 mb-3">
						<article id="audio3"></article>
					</section>

					<!-- ============================================================== -->

					<section class="col-md-3">
						<article id="playlist3"></article>
					</section>

					<section class="col-md-4">
						<article id="playlist2"
						         data-size="medium"
						         data-type="playlist"
						         data-title="Playlist 2"
						         data-artist="From data tag"
						         data-artwork="<?php echo base_url() ?>uploads/audio/music1.jpg"
						         data-playlisturl="<?php echo base_url() ?>uploads/Playlists/audioPlaylist.xml"></article>
					</section>

					<section class="col-md-3">
						<article id="playlist1"></article>
					</section>

					<script type="text/javascript">
						$(document).ready(function ()
						{
							$("#audio1").multiAudioPlayer();

							$("#audio2").multiAudioPlayer({
								size: "medium",
								title: "Hideaway",
								artist: "Kiesza",
								grabLastFmPhoto: true,
								artwork: global_base_url + "uploads/audio/covers/cover8.jpg",
								trackUrl: global_base_url + "uploads/audio/audio12.mp3",
								amazonMusic: "https://www.amazon.co.uk/Hideaway/dp/B00JBRNTCY",
								appleMusic: "https://itunes.apple.com/nz/album/hideaway-single/id808750149",
								downloadable: true
							});

							$("#audio3").multiAudioPlayer({
								size: "small",
								title: "Hideaway",
								artist: "Kiesza",
								artwork: global_base_url + "uploads/audio/covers/cover4.jpg",
								trackUrl: global_base_url + "uploads/audio/audio13.mp3",
								amazonMusic: "https://www.amazon.co.uk/Hideaway/dp/B00JBRNTCY",
								appleMusic: "https://itunes.apple.com/nz/album/hideaway-single/id808750149",
								downloadable: true
							});

							$("#playlist1").multiAudioPlayer({
								type: "playlist",
								title: "Playlist 1",
								artist: "Playlist Type",
								playlistUrl: global_base_url + "uploads/Playlists/audioPlaylist.xml",
								pathToAjaxFiles: global_base_url + "assets/javascript/js/core/level-4/media/"
							});

							$("#playlist2").multiAudioPlayer();

							$("#playlist3").multiAudioPlayer({
								size: "small",
								type: "playlist",
								title: "Playlist 3",
								artist: "Playlist Type",
								playlistUrl: global_base_url + "uploads/Playlists/audioPlaylist.xml",
								pathToAjaxFiles: global_base_url + "assets/javascript/js/core/level-4/media/"
							});
						});
					</script>

					<section class="col-md-12">
						<hr/>
					</section>

					<section class="col-md-12">
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
								<tr>
									<th>#</th>
									<th></th>
									<th>Title</th>
									<th>Artist</th>
									<th>Duration</th>
									<th class="text-nowrap">Download</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td>1</td>
									<td><i class="fas fa-heart" aria-hidden="true"></i></td>
									<td><a href="<?php echo base_url() ?>pages/audioDetail" data-toggle="tooltip" data-original-title="Click for Details" class="text-warning">The song of ice and fire</a></td>
									<td>Lord Stark</td>
									<td>04:48</td>
									<td class="text-nowrap">
										<a href="#" data-toggle="tooltip" data-original-title="Download" class="link"><i class="fas fa-download mr-2"></i></a>
										<a href="#" data-toggle="tooltip" data-original-title="Bookmark" class="link"><i class="fas fa-bookmark mr-2"></i></a>
										<a href="#" data-toggle="tooltip" data-original-title="Remove" class="link"><i class="fas fa-times"></i></a>
									</td>
								</tr>
								<tr>
									<td>2</td>
									<td><i class="fas fa-heart" aria-hidden="true"></i></td>
									<td><a href="<?php echo base_url() ?>pages/audioDetail" data-toggle="tooltip" data-original-title="Click for Details" class="text-warning">Blackwood</a></td>
									<td>T. Lannister</td>
									<td>03:33</td>
									<td class="text-nowrap">
										<a href="#" data-toggle="tooltip" data-original-title="Download" class="link"><i class="fas fa-download mr-2"></i></a>
										<a href="#" data-toggle="tooltip" data-original-title="Bookmark" class="link"><i class="fas fa-bookmark mr-2"></i></a>
										<a href="#" data-toggle="tooltip" data-original-title="Remove" class="link"><i class="fas fa-times"></i></a>
									</td>
								</tr>
								<tr>
									<td>3</td>
									<td><i class="fas fa-heart" aria-hidden="true"></i></td>
									<td><a href="<?php echo base_url() ?>pages/audioDetail" data-toggle="tooltip" data-original-title="Click for Details" class="text-warning">Shut Up Society</a></td>
									<td>M. Murdock</td>
									<td>04:22</td>
									<td class="text-nowrap">
										<a href="#" data-toggle="tooltip" data-original-title="Download" class="link"><i class="fas fa-download mr-2"></i></a>
										<a href="#" data-toggle="tooltip" data-original-title="Bookmark" class="link"><i class="fas fa-bookmark mr-2"></i></a>
										<a href="#" data-toggle="tooltip" data-original-title="Remove" class="link"><i class="fas fa-times"></i></a>
									</td>
								</tr>
								<tr>
									<td>4</td>
									<td><i class="fas fa-heart" aria-hidden="true"></i></td>
									<td><a href="<?php echo base_url() ?>pages/audioDetail" data-toggle="tooltip" data-original-title="Click for Details" class="text-warning">The Silent Nature</a></td>
									<td>The Sourcerer</td>
									<td>02:58</td>
									<td class="text-nowrap">
										<a href="#" data-toggle="tooltip" data-original-title="Download" class="link"><i class="fas fa-download mr-2"></i></a>
										<a href="#" data-toggle="tooltip" data-original-title="Bookmark" class="link"><i class="fas fa-bookmark mr-2"></i></a>
										<a href="#" data-toggle="tooltip" data-original-title="Remove" class="link"><i class="fas fa-times"></i></a>
									</td>
								</tr>
								<tr>
									<td>5</td>
									<td><i class="fas fa-heart" aria-hidden="true"></i></td>
									<td><a href="<?php echo base_url() ?>pages/audioDetail" data-toggle="tooltip" data-original-title="Click for Details" class="text-warning">Suger-Salt</a></td>
									<td>The Pianist</td>
									<td>03:25</td>
									<td class="text-nowrap">
										<a href="#" data-toggle="tooltip" data-original-title="Download" class="link"><i class="fas fa-download mr-2"></i></a>
										<a href="#" data-toggle="tooltip" data-original-title="Bookmark" class="link"><i class="fas fa-bookmark mr-2"></i></a>
										<a href="#" data-toggle="tooltip" data-original-title="Remove" class="link"><i class="fas fa-times"></i></a>
									</td>
								</tr>
								<tr>
									<td>6</td>
									<td><i class="fas fa-heart" aria-hidden="true"></i></td>
									<td><a href="<?php echo base_url() ?>pages/audioDetail" data-toggle="tooltip" data-original-title="Click for Details" class="text-warning">Pathetic Human</a></td>
									<td>Philanthrophobia</td>
									<td>07:58</td>
									<td class="text-nowrap">
										<a href="#" data-toggle="tooltip" data-original-title="Download" class="link"><i class="fas fa-download mr-2"></i></a>
										<a href="#" data-toggle="tooltip" data-original-title="Bookmark" class="link"><i class="fas fa-bookmark mr-2"></i></a>
										<a href="#" data-toggle="tooltip" data-original-title="Remove" class="link"><i class="fas fa-times"></i></a>
									</td>
								</tr>
								<tr>
									<td>7</td>
									<td><i class="fas fa-heart" aria-hidden="true"></i></td>
									<td><a href="<?php echo base_url() ?>pages/audioDetail" data-toggle="tooltip" data-original-title="Click for Details" class="text-warning">The Nuke Zoned</a></td>
									<td>Martian Metal</td>
									<td>06:48</td>
									<td class="text-nowrap">
										<a href="#" data-toggle="tooltip" data-original-title="Download" class="link"><i class="fas fa-download mr-2"></i></a>
										<a href="#" data-toggle="tooltip" data-original-title="Bookmark" class="link"><i class="fas fa-bookmark mr-2"></i></a>
										<a href="#" data-toggle="tooltip" data-original-title="Remove" class="link"><i class="fas fa-times"></i></a>
									</td>
								</tr>
								<tr>
									<td>8</td>
									<td><i class="fas fa-heart" aria-hidden="true"></i></td>
									<td><a href="<?php echo base_url() ?>pages/audioDetail" data-toggle="tooltip" data-original-title="Click for Details" class="text-warning">The Fault In Our Forehead</a></td>
									<td>Artemis Fowl</td>
									<td>04:04</td>
									<td class="text-nowrap">
										<a href="#" data-toggle="tooltip" data-original-title="Download" class="link"><i class="fas fa-download mr-2"></i></a>
										<a href="#" data-toggle="tooltip" data-original-title="Bookmark" class="link"><i class="fas fa-bookmark mr-2"></i></a>
										<a href="#" data-toggle="tooltip" data-original-title="Remove" class="link"><i class="fas fa-times"></i></a>
									</td>
								</tr>
								<tr>
									<td>9</td>
									<td><i class="fas fa-heart" aria-hidden="true"></i></td>
									<td><a href="<?php echo base_url() ?>pages/audioDetail" data-toggle="tooltip" data-original-title="Click for Details" class="text-warning">The Karaoke Night</a></td>
									<td>Potus</td>
									<td>04:18</td>
									<td class="text-nowrap">
										<a href="#" data-toggle="tooltip" data-original-title="Download" class="link"><i class="fas fa-download mr-2"></i></a>
										<a href="#" data-toggle="tooltip" data-original-title="Bookmark" class="link"><i class="fas fa-bookmark mr-2"></i></a>
										<a href="#" data-toggle="tooltip" data-original-title="Remove" class="link"><i class="fas fa-times"></i></a>
									</td>
								</tr>
								<tr>
									<td>10</td>
									<td><i class="fas fa-heart" aria-hidden="true"></i></td>
									<td><a href="<?php echo base_url() ?>pages/audioDetail" data-toggle="tooltip" data-original-title="Click for Details" class="text-warning">Lovers On The Planet Hulk</a></td>
									<td>Spy Specific</td>
									<td>03:34</td>
									<td class="text-nowrap">
										<a href="#" data-toggle="tooltip" data-original-title="Download" class="link"><i class="fas fa-download mr-2"></i></a>
										<a href="#" data-toggle="tooltip" data-original-title="Bookmark" class="link"><i class="fas fa-bookmark mr-2"></i></a>
										<a href="#" data-toggle="tooltip" data-original-title="Remove" class="link"><i class="fas fa-times"></i></a>
									</td>
								</tr>
								<tr>
									<td>11</td>
									<td><i class="fas fa-heart" aria-hidden="true"></i></td>
									<td><a href="<?php echo base_url() ?>pages/audioDetail" data-toggle="tooltip" data-original-title="Click for Details" class="text-warning">The Asgardian Hammer</a></td>
									<td>Ground Zero</td>
									<td>05:40</td>
									<td class="text-nowrap">
										<a href="#" data-toggle="tooltip" data-original-title="Download" class="link"><i class="fas fa-download mr-2"></i></a>
										<a href="#" data-toggle="tooltip" data-original-title="Bookmark" class="link"><i class="fas fa-bookmark mr-2"></i></a>
										<a href="#" data-toggle="tooltip" data-original-title="Remove" class="link"><i class="fas fa-times"></i></a>
									</td>
								</tr>
								<tr>
									<td>12</td>
									<td><i class="fas fa-heart" aria-hidden="true"></i></td>
									<td><a href="<?php echo base_url() ?>pages/audioDetail" data-toggle="tooltip" data-original-title="Click for Details" class="text-warning">The Silent Nature</a></td>
									<td>The Sourcerer</td>
									<td>02:58</td>
									<td class="text-nowrap">
										<a href="#" data-toggle="tooltip" data-original-title="Download" class="link"><i class="fas fa-download mr-2"></i></a>
										<a href="#" data-toggle="tooltip" data-original-title="Bookmark" class="link"><i class="fas fa-bookmark mr-2"></i></a>
										<a href="#" data-toggle="tooltip" data-original-title="Remove" class="link"><i class="fas fa-times"></i></a>
									</td>
								</tr>
								<tr>
									<td>13</td>
									<td><i class="fas fa-heart" aria-hidden="true"></i></td>
									<td><a href="<?php echo base_url() ?>pages/audioDetail" data-toggle="tooltip" data-original-title="Click for Details" class="text-warning">The Nuke Zoned</a></td>
									<td>Martian Metal</td>
									<td>06:48</td>
									<td class="text-nowrap">
										<a href="#" data-toggle="tooltip" data-original-title="Download" class="link"><i class="fas fa-download mr-2"></i></a>
										<a href="#" data-toggle="tooltip" data-original-title="Bookmark" class="link"><i class="fas fa-bookmark mr-2"></i></a>
										<a href="#" data-toggle="tooltip" data-original-title="Remove" class="link"><i class="fas fa-times"></i></a>
									</td>
								</tr>
								<tr>
									<td>14</td>
									<td><i class="fas fa-heart" aria-hidden="true"></i></td>
									<td><a href="<?php echo base_url() ?>pages/audioDetail" data-toggle="tooltip" data-original-title="Click for Details" class="text-warning">Suger-Salt</a></td>
									<td>The Pianist</td>
									<td>03:25</td>
									<td class="text-nowrap">
										<a href="#" data-toggle="tooltip" data-original-title="Download" class="link"><i class="fas fa-download mr-2"></i></a>
										<a href="#" data-toggle="tooltip" data-original-title="Bookmark" class="link"><i class="fas fa-bookmark mr-2"></i></a>
										<a href="#" data-toggle="tooltip" data-original-title="Remove" class="link"><i class="fas fa-times"></i></a>
									</td>
								</tr>
								<tr>
									<td>15</td>
									<td><i class="fas fa-heart" aria-hidden="true"></i></td>
									<td><a href="<?php echo base_url() ?>pages/audioDetail" data-toggle="tooltip" data-original-title="Click for Details" class="text-warning">The Karaoke Night</a></td>
									<td>Potus</td>
									<td>04:18</td>
									<td class="text-nowrap">
										<a href="#" data-toggle="tooltip" data-original-title="Download" class="link"><i class="fas fa-download mr-2"></i></a>
										<a href="#" data-toggle="tooltip" data-original-title="Bookmark" class="link"><i class="fas fa-bookmark mr-2"></i></a>
										<a href="#" data-toggle="tooltip" data-original-title="Remove" class="link"><i class="fas fa-times"></i></a>
									</td>
								</tr>
								<tr>
									<td>16</td>
									<td><i class="fas fa-heart" aria-hidden="true"></i></td>
									<td><a href="<?php echo base_url() ?>pages/audioDetail" data-toggle="tooltip" data-original-title="Click for Details" class="text-warning">Lovers On The Planet Hulk</a></td>
									<td>Spy Specific</td>
									<td>03:34</td>
									<td class="text-nowrap">
										<a href="#" data-toggle="tooltip" data-original-title="Download" class="link"><i class="fas fa-download mr-2"></i></a>
										<a href="#" data-toggle="tooltip" data-original-title="Bookmark" class="link"><i class="fas fa-bookmark mr-2"></i></a>
										<a href="#" data-toggle="tooltip" data-original-title="Remove" class="link"><i class="fas fa-times"></i></a>
									</td>
								</tr>
								</tbody>
							</table>
						</div>
					</section>

					<section class="col-md-12">
						<hr />
					</section>

					<!-- ============================================================== -->
					<!-- End Custom Content                                             -->
					<!-- ============================================================== -->
				</div>
			</div>
		</div>
	</article>
	<!-- ============================================================== -->
	<!-- End Page Content                                               -->
	<!-- ============================================================== -->
</main>
<!-- ============================================================== -->
<!-- End Main Wrapper                                               -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Right sidebar - style you can find in core-aside-left.css      -->
<!-- ============================================================== -->
<aside id="right" class="d-none d-sm-none d-md-block d-lg-block d-xl-block animated fadeInRight">
	<!-- Right-Sidebar Hidden Section -->
	<article class="sidebar-right-inner-player-controls collapse animated fadeIn">
		<section class="row sidebar-right-top">
			<div class="col-md-12 slim-scroll-sidebarR">
				<div class="sidebar-right-middle">
					<!-- Right-Sidebar Header -->
					<div class="sidebar-title bg-info p-2 m-0 mb-1">
						<span>
							<i class="fas fa-video fa-lg text-warning mr-2 ml-1"></i>
							<b class="playerWheelMediaTitle text-warning"></b>
						</span>
					</div>

					<!-- Right-Sidebar Item -->
					<div class="sidebar-settings-item ml-1 mr-2">
						<div id="videoLapse" class="row">
							<div class="ml-3">
								<div id="videoTimeLapse" class="knob"></div>
							</div>
							<p class="ml-4 mt-2">
								<span class="playerWheelTime mr-2 text-success"></span>
								<br />
								<span class="playerWheelTimeTo mr-4 text-danger"></span>
							</p>
						</div>

						<div class="row">
							<img id="videoThumb" src="#" alt="Video Thumbnail" class="img-thumbnail mb-2" />
						</div>

						<div id="videoControls" class="row">
							<div class="col-md-2">
								<button id="videoMute" type="button" class="btn btn-dark btn-sm mt-1">
									<i class="fas fa-volume-off"></i>
								</button>
							</div>

							<div class="col-md-2">
								<button id="videoUnMute" type="button" class="btn btn-success btn-sm mt-1">
									<i class="fas fa-volume-up"></i>
								</button>
							</div>

							<div class="col-md-3"></div>

							<div class="col-md-2">
								<button id="videoSubs" type="button" class="btn btn-info btn- mt-1" disabled>
									<i class="fas fa-font"></i>
								</button>
							</div>

							<div class="col-md-3">
								<button id="videoDownload" type="button" class="btn btn-info btn-sm mt-1" disabled>
									<i class="fas fa-download"></i>
								</button>
							</div>
						</div>
					</div>

					<!-- Right-Sidebar Quick Settings Descriptions -->
					<div class="sidebar-right-content ml-2 mr-2">
						<div class="p-1">
							<h5 class="text-warning mt-2">Video Description</h5>
							<div id="videoDesc" class="well"></div>
							<hr />
						</div>

						<div id="playerWheelExtendedControls"></div>
					</div>
				</div>
			</div>
		</section>

		<!-- Right-Sidebar Bottom Content -->
		<section class="row sidebar-right-bottom-player-control">
			<div class="col-md-12">
				<!-- Start Nav Structure -->
				<div id="playerWheelControls" class="playerWheelControls"></div>
				<!-- End of Nav Structure -->
			</div>
		</section>
	</article>

	<!-- Right-Sidebar Default Section -->
	<article class="sidebar-right-inner">
		<!-- Nav tabs -->
		<ul class="nav bg-info right-navBar-tab mb-1">
			<li class="ml-1 mr-5">
				<a href="#news-tab" class="active" data-toggle="tab" aria-expanded="false">
					<i class="fas fa-newspaper fa-fw"></i>
				</a>
			</li>
			<li class="ml-1 mr-5">
				<a href="#chat-tab" data-toggle="tab" aria-expanded="false">
					<i class="fas fa-comments fa-fw"></i>
				</a>
			</li>
			<li class="ml-1">
				<a href="#setting-tab" data-toggle="tab" aria-expanded="true">
					<i class="fas fa-cog fa-fw"></i>
				</a>
			</li>
		</ul>

		<!-- Tab panes -->
		<div class="tab-content p-0 m-0">
			<div id="news-tab" class="tab-pane active animated fadeIn" role="tabpanel">
				<section class="row sidebar-right-top">
					<div class="col-md-12 slim-scroll-sidebarR">
						<div class="sidebar-right-middle">
							<!-- Right-Sidebar Header -->
							<div class="sidebar-title pl-2">
								<h4>
									<i class="fas fa-newspaper mr-2 lg text-primary"></i>
									<b class="text-primary" data-i18next="nav.category.main">News</b>
								</h4>
							</div>
							<hr class="mt-1 mb-2" />

							<div id="right-slideShow" class="cycle-slideshow ml-1">
								<img src="<?php echo base_url() ?>uploads/pictures/1.jpg" alt="Spring" data-cycle-fx="tileSlide" data-cycle-tile-vertical="false" />
								<img src="<?php echo base_url() ?>uploads/pictures/2.jpg" alt="Redwoods" data-cycle-fx="tileBlind" data-cycle-tile-count="12" />
								<img src="<?php echo base_url() ?>uploads/pictures/3.jpg" alt="Angle Island" data-cycle-fx="tileSlide" data-cycle-tile-count="4" />
								<img src="<?php echo base_url() ?>uploads/pictures/4.jpg" alt="Raquette Lake" data-cycle-fx="tileBlind" data-cycle-tile-vertical="false" />
								<img src="<?php echo base_url() ?>uploads/pictures/5.jpg" alt="Spring" data-cycle-fx="tileSlide" data-cycle-tile-vertical="true" />
								<img src="<?php echo base_url() ?>uploads/pictures/6.jpg" alt="Redwoods" data-cycle-fx="tileBlind" data-cycle-tile-count="8" />
								<img src="<?php echo base_url() ?>uploads/pictures/7.jpg" alt="Angle Island" data-cycle-fx="tileSlide" data-cycle-tile-count="6" />
								<img src="<?php echo base_url() ?>uploads/pictures/8.jpg" alt="Raquette Lake" data-cycle-fx="tileBlind" data-cycle-tile-vertical="false" />
								<img src="<?php echo base_url() ?>uploads/pictures/9.jpg" alt="Spring" data-cycle-fx="tileSlide" data-cycle-tile-vertical="true" />
								<img src="<?php echo base_url() ?>uploads/pictures/10.jpg" alt="Redwoods" data-cycle-fx="tileBlind" data-cycle-tile-count="6" />
								<img src="<?php echo base_url() ?>uploads/pictures/11.jpg" alt="Angle Island" data-cycle-fx="tileSlide" data-cycle-tile-count="4" />
								<img src="<?php echo base_url() ?>uploads/pictures/12.jpg" alt="Raquette Lake" data-cycle-fx="tileBlind" data-cycle-tile-vertical="false" />
							</div>

							<div class="alert alert-primary alert-styled-right pt-1 pb-0 ml-1 text-center" role="alert">
								<span id="galleryCaption" class="text-bold text-center">Gallery Slides</span>
							</div>

							<hr class="mb-0 ml-1 bg-info" />

							<div id="newsSetting" class="alert alert-danger alert-styled-left pt-1 pb-0 pl-1 pr-1 mt-3 ml-1" role="alert">
								<span class="text-bold">News are currently: DISABLED</span>
							</div>

							<div id="newsSidebar" class="collapse mt-3 ml-1">
								<div id="newsWidget">
									<ul>
										<li>
											<img src="<?php echo base_url() ?>uploads/pictures/1.jpg" alt="Sample image" class="img-fluid" />
											<a href="#">The world of Gilbert</a>
											<p>The art duo of Gilbert and George on how their work can ruffle feathers and the benefits of routine.</p>
										</li>
										<li class="odd">
											<img src="<?php echo base_url() ?>uploads/pictures/2.jpg" alt="Sample image" class="img-fluid" />
											<a href="#">From propaganda to pop artist</a>
											<p>Song Byeok had every reason to be pleased with his success. A gift for drawing led to a prestigious.</p>
										</li>
										<li>
											<img src="<?php echo base_url() ?>uploads/pictures/3.jpg" alt="Sample image" class="img-fluid" />
											<a href="#">Japan's</a>
											<p>CNN's Kyung Lah sits down with Japan's World Cup-winning captain to reflect on their win amid tragedy.</p>
										</li>
										<li class="odd">
											<img src="<?php echo base_url() ?>uploads/pictures/4.jpg" alt="Sample image" class="img-fluid" />
											<a href="#">From propaganda to pop artist</a>
											<p>Song Byeok had every reason to be pleased with his success. A gift for drawing led to a prestigious.</p>
										</li>
									</ul>
								</div>
							</div>
						</div>

						<hr class="mb-0 ml-1 bg-info" />

						<div class="well small mt-3 ml-1">
							<div class="alert alert-primary p-2 pb-0" role="alert">
								<h4 class="text-warning">Quick Settings</h4>
								<p>
									The art duo of Gilbert and George on how their work can
									ruffle feathers and the benefits of routine.<br /><br />
									The art duo of Gilbert and George on how their work can
									ruffle feathers and the benefits of routine.
								</p>
							</div>
						</div>
					</div>
				</section>
			</div>

			<div id="chat-tab" class="tab-pane animated fadeIn" role="tabpanel">
				<section class="row sidebar-right-top">
					<div class="col-md-12 slim-scroll-sidebarR">
						<div class="sidebar-right-middle">
							<!-- Right-Sidebar Header -->
							<div class="sidebar-title pl-2">
								<h4>
									<i class="fas fa-comments mr-2 lg text-primary"></i>
									<b class="text-primary" data-i18next="nav.category.main">Quick Chat</b>
								</h4>
							</div>

							<hr class="p-0 mt-1 mb-1" />
							<div id="chatSetting" class="alert alert-danger alert-styled-left pt-1 pb-0 pl-1 pr-1 ml-1 mt-2" role="alert">
								<span class="text-bold">Chat is currently: DISABLED</span>
							</div>

							<div id="chatSidebar" class="ml-1 collapse p-0 m-0">
								<!-- Chat Talk -->
								<div class="chat-talk">
									<!-- Chat Info -->
									<div class="chat-talk-info">
										<img src="<?php echo base_url() ?>assets/Avatars/avatar4.png" alt="avatar" class="rounded-circle pull-left p-1" />
										<strong class="text-warning">John</strong> Doehgjhg
										<button id="chat-talk-close-btn" class="btn btn-xs btn-primary">
											<i class="fa fa-times fa-fw"></i>
										</button>
									</div>
									<!-- END Chat Info -->

									<hr class="mt-1" />

									<!-- Chat Messages -->
									<ul class="chat-talk-messages">
										<li class="chat-date text-center text-warning"><small>Yesterday, 18:35</small></li>
										<li class="chat-talk-msg animated slideInRight">
											Hey admin?<img src="<?php echo base_url() ?>assets/Avatars/avatar4.png" alt="Avatar" class="rounded-circle chat-talk-msg-avatar float-right ml-2" />
										</li>
										<li class="chat-talk-msg animated slideInRight">
											How are you?<img src="<?php echo base_url() ?>assets/Avatars/avatar4.png" alt="Avatar" class="rounded-circle chat-talk-msg-avatar float-right ml-2" />
										</li>
										<li class="chat-date text-center text-warning"><small>Today, 7:10</small></li>
										<li class="chat-talk-msg chat-talk-msg-highlight animated slideInLeft">
											<img src="<?php echo base_url() ?>assets/Avatars/avatar6.png" alt="Avatar" class="rounded-circle chat-talk-msg-avatar float-left mr-2" />I'm fine, thanks!
										</li>
									</ul>
									<!-- END Chat Messages -->

									<br />
									<!-- Chat Input -->
									<form id="sidebar-chat-form" class="chat-form">
										<input type="text" id="sidebar-chat-message" name="sidebar-chat-message" class="form-control" placeholder="Type a message.." />
										<button type="submit" class="btn btn-sm btn-primary mt-3 text-center">
											<i class="fas fa-comment fa-fw"></i> Post Message
										</button>
									</form>
									<!-- END Chat Input -->
								</div>
								<!--  END Chat Talk -->
								<!-- END Chat -->

								<!-- Chat Users -->
								<ul class="chat-users">
									<li>
										<a href="#" class="chat-user-away">
											<span></span>
											<img src="<?php echo base_url() ?>assets/Avatars/avatar3.png" alt="avatar" class="rounded-circle" />
										</a>
									</li>
									<li>
										<a href="#" class="chat-user-online">
											<span></span>
											<img src="<?php echo base_url() ?>assets/Avatars/avatar4.png" alt="avatar" class="rounded-circle" />
										</a>
									</li>
									<li>
										<a href="#" class="chat-user-online">
											<span></span>
											<img src="<?php echo base_url() ?>assets/Avatars/avatar5.png" alt="avatar" class="rounded-circle" />
										</a>
									</li>
									<li>
										<a href="#" class="chat-user-online">
											<span></span>
											<img src="<?php echo base_url() ?>assets/Avatars/avatar6.png" alt="avatar" class="rounded-circle" />
										</a>
									</li>
									<li>
										<a href="#" class="chat-user-away">
											<span></span>
											<img src="<?php echo base_url() ?>assets/Avatars/avatar7.png" alt="avatar" class="rounded-circle" />
										</a>
									</li>
									<li>
										<a href="#" class="chat-user-away">
											<span></span>
											<img src="<?php echo base_url() ?>assets/Avatars/avatar1.png" alt="avatar" class="rounded-circle" />
										</a>
									</li>
									<li>
										<a href="#" class="chat-user-busy">
											<span></span>
											<img src="<?php echo base_url() ?>assets/Avatars/avatar2.png" alt="avatar" class="rounded-circle" />
										</a>
									</li>
									<li>
										<a href="#" class="chat-user-online">
											<span></span>
											<img src="<?php echo base_url() ?>assets/Avatars/avatar3.png" alt="avatar" class="rounded-circle" />
										</a>
									</li>
									<li>
										<a href="#" class="chat-user-busy">
											<span></span>
											<img src="<?php echo base_url() ?>assets/Avatars/avatar4.png" alt="avatar" class="rounded-circle" />
										</a>
									</li>
									<li>
										<a href="#" class="chat-user-away">
											<span></span>
											<img src="<?php echo base_url() ?>assets/Avatars/avatar5.png" alt="avatar" class="rounded-circle" />
										</a>
									</li>
									<li>
										<a href="#" class="chat-user-away">
											<span></span>
											<img src="<?php echo base_url() ?>assets/Avatars/avatar6.png" alt="avatar" class="rounded-circle" />
										</a>
									</li>
									<li>
										<a href="#" class="chat-user-busy">
											<span></span>
											<img src="<?php echo base_url() ?>assets/Avatars/avatar7.png" alt="avatar" class="rounded-circle" />
										</a>
									</li>
									<li>
										<a href="#" class="chat-user-online">
											<span></span>
											<img src="<?php echo base_url() ?>assets/Avatars/avatar3.png" alt="avatar" class="rounded-circle" />
										</a>
									</li>
									<li>
										<a href="#" class="chat-user-online">
											<span></span>
											<img src="<?php echo base_url() ?>assets/Avatars/avatar4.png" alt="avatar" class="rounded-circle" />
										</a>
									</li>
									<li>
										<a href="#" class="chat-user-online">
											<span></span>
											<img src="<?php echo base_url() ?>assets/Avatars/avatar5.png" alt="avatar" class="rounded-circle" />
										</a>
									</li>
									<li>
										<a href="#" class="chat-user-online">
											<span></span>
											<img src="<?php echo base_url() ?>assets/Avatars/avatar6.png" alt="avatar" class="rounded-circle" />
										</a>
									</li>
									<li>
										<a href="#" class="chat-user-away">
											<span></span>
											<img src="<?php echo base_url() ?>assets/Avatars/avatar7.png" alt="avatar" class="rounded-circle" />
										</a>
									</li>
									<li>
										<a href="#" class="chat-user-online">
											<span></span>
											<img src="<?php echo base_url() ?>assets/Avatars/avatar4.png" alt="avatar" class="rounded-circle" />
										</a>
									</li>
									<li>
										<a href="#" class="chat-user-online">
											<span></span>
											<img src="<?php echo base_url() ?>assets/Avatars/avatar5.png" alt="avatar" class="rounded-circle" />
										</a>
									</li>
									<li>
										<a href="#" class="chat-user-online">
											<span></span>
											<img src="<?php echo base_url() ?>assets/Avatars/avatar6.png" alt="avatar" class="rounded-circle" />
										</a>
									</li>
									<li>
										<a href="#" class="chat-user-away">
											<span></span>
											<img src="<?php echo base_url() ?>assets/Avatars/avatar7.png" alt="avatar" class="rounded-circle" />
										</a>
									</li>
								</ul>
								<!-- END Chat Users -->

								<div class="alert alert-primary alert-styled-right mt-2 p-0 text-center" role="alert">
									<span class="text-bold text-center">User Status</span>
								</div>
							</div>

							<hr class="mb-0 ml-1 bg-info" />

							<div class="well small mt-3 ml-1">
								<div class="alert alert-primary p-2 pb-0" role="alert">
									<h4 class="text-warning">Quick Settings</h4>
									<p>
										The art duo of Gilbert and George on how their work can
										ruffle feathers and the benefits of routine.<br /><br />
										The art duo of Gilbert and George on how their work can
										ruffle feathers and the benefits of routine.
									</p>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>

			<div id="setting-tab" class="tab-pane animated fadeIn" role="tabpanel">
				<section class="row sidebar-right-top">
					<div class="col-md-12 slim-scroll-sidebarR">
						<div class="sidebar-right-middle">
							<!-- Right-Sidebar Header -->
							<div class="sidebar-title pl-2">
								<h4>
									<i class="fas fa-cog mr-2 lg text-primary"></i>
									<b class="text-primary" data-i18next="nav.category.main">Quick Settings</b>
								</h4>
							</div>

							<hr class="p-0 mt-1 mb-2" />

							<!-- Right-Sidebar Item -->
							<div class="sidebar-settings-item ml-1">
								<span class="text-warning">Notifications</span><br />
								<small>Site wide notifications.</small>
								<div class="sidebar-switch">
									<div class="on-off-switch">
										<input name="Setting1" class="on-off-switch-checkbox" id="Setting1" type="checkbox" />
										<label class="on-off-switch-label" for="Setting1">
											<span class="on-off-switch-inner"></span>
											<span class="on-off-switch-switch"></span>
										</label>
									</div>
								</div>
							</div>

							<!-- Right-Sidebar Item -->
							<div class="sidebar-settings-item ml-1">
								<span class="text-warning">Chat</span><br />
								<small>Sidebar chat widget.</small>
								<div class="sidebar-switch">
									<div class="on-off-switch">
										<input name="Setting2" class="on-off-switch-checkbox" id="Setting2" type="checkbox" />
										<label class="on-off-switch-label" for="Setting2">
											<span class="on-off-switch-inner"></span>
											<span class="on-off-switch-switch"></span>
										</label>
									</div>
								</div>
							</div>

							<!-- Right-Sidebar Item -->
							<div class="sidebar-settings-item ml-1">
								<span class="text-warning">Weather</span><br />
								<small>Weather API widget.</small>
								<div class="sidebar-switch">
									<div class="on-off-switch">
										<input name="Setting3" class="on-off-switch-checkbox" id="Setting3" type="checkbox" />
										<label class="on-off-switch-label" for="Setting3">
											<span class="on-off-switch-inner"></span>
											<span class="on-off-switch-switch"></span>
										</label>
									</div>
								</div>
							</div>

							<!-- Right-Sidebar Item -->
							<div class="sidebar-settings-item ml-1">
								<span class="text-warning">News</span><br />
								<small>News ticker widget.</small>
								<div class="sidebar-switch">
									<div class="on-off-switch">
										<input name="Setting4" class="on-off-switch-checkbox" id="Setting4" type="checkbox" />
										<label class="on-off-switch-label" for="Setting4">
											<span class="on-off-switch-inner"></span>
											<span class="on-off-switch-switch"></span>
										</label>
									</div>
								</div>
							</div>

							<!-- Right-Sidebar Item -->
							<div class="sidebar-settings-item ml-1">
								<span class="text-warning">FM-Radio</span><br />
								<small>Advanced radio widget.</small>
								<div class="sidebar-switch">
									<div class="on-off-switch">
										<input name="Setting5" class="on-off-switch-checkbox" id="Setting5" type="checkbox" />
										<label class="on-off-switch-label" for="Setting5">
											<span class="on-off-switch-inner"></span>
											<span class="on-off-switch-switch"></span>
										</label>
									</div>
								</div>
							</div>

							<!-- Right-Sidebar Item -->
							<div class="sidebar-settings-item ml-1">
								<span class="text-warning">Profile and Debug</span><br />
								<small>Site wide debugging.</small>
								<div class="sidebar-switch">
									<div class="on-off-switch">
										<input name="Setting6" class="on-off-switch-checkbox" id="Setting6" type="checkbox" />
										<label class="on-off-switch-label" for="Setting6">
											<span class="on-off-switch-inner"></span>
											<span class="on-off-switch-switch"></span>
										</label>
									</div>
								</div>
							</div>

							<hr class="mb-2" />

							<!-- Right-Sidebar Quick Settings Descriptions -->
							<div class="sidebar-right-content">
								<div class="well small mt-2 ml-1 p-0">
									<div class="alert alert-primary p-2 pb-0" role="alert">
										<h4 class="text-warning">Quick Settings</h4>
										<p>
											The art duo of Gilbert and George on how their work can
											ruffle feathers and the benefits of routine.<br /><br />
											The art duo of Gilbert and George on how their work can
											ruffle feathers and the benefits of routine.
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>

			<!-- Right-Sidebar Bottom Content -->
			<section class="row sidebar-right-bottom">
				<div class="col-md-12">
					<div id="right-banner" class="text-center">
						<hr class="mb-2 mt-2" />
						<img id="right-inner-banner" src="data:image/png;base64,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" alt="Site Logo" class="pl-2 img-fluid animated fadeIn mt-2" />
						<div id="right-inner-menu" class="collapse animated fadeIn pl-2 mb-4">
							<img src="<?php echo base_url() ?>assets/images/automation/menu.png" alt="Site Logo" class="img-fluid animated fadeIn automation-image" />
							<div class="autoButton1">
								<button id="autoButton1" type="button" class="btn btn-danger btn-circle btn-xs" data-toggle="tooltip" title="Active Sensors">
									<i class="fas fa-microchip fa-fw"></i>
								</button></div>

							<div class="autoButton2">
								<button id="autoButton2" type="button" class="btn btn-primary btn-circle btn-xs" data-toggle="tooltip" title="Plugged Devices">
									<i class="fas fa-plug fa-fw"></i>
								</button>
							</div>

							<div class="autoButton3">
								<button id="autoButton3" type="button" class="btn btn-danger btn-circle btn-xs" data-toggle="tooltip" title="Surveillance">
									<i class="fas fa-video fa-fw"></i>
								</button>
							</div>

							<div class="autoButton4">
								<button id="autoButton4" type="button" class="btn btn-primary btn-circle btn-xs" data-toggle="tooltip" title="Climate">
									<i class="fas fa-snowflake fa-fw"></i>
								</button>
							</div>

							<div class="autoButton5">
								<button id="autoButton5" type="button" class="btn btn-success btn-circle btn-sm" data-toggle="tooltip" title="DinoHome">
									<i class="fas fa-robot fa-fw pb-2"></i>
								</button>
							</div>

							<div class="autoButton6">
								<button id="autoButton6" type="button" class="btn btn-primary btn-circle btn-xs" data-toggle="tooltip" title="Rain">
									<i class="fas fa-tint fa-fw"></i>
								</button>
							</div>

							<div class="autoButton7">
								<button id="autoButton7" type="button" class="btn btn-danger btn-circle btn-xs" data-toggle="tooltip" title="Electricity">
									<i class="fas fa-bolt fa-fw"></i>
								</button>
							</div>

							<div class="autoButton8">
								<button id="autoButton8" type="button" class="btn btn-primary btn-circle btn-xs" data-toggle="tooltip" title="Temperature">
									<i class="fas fa-thermometer-half fa-fw"></i>
								</button>
							</div>

							<div class="autoButton9">
								<button id="autoButton9" type="button" class="btn btn-danger btn-circle btn-xs" data-toggle="tooltip" title="Light">
									<i class="fas fa-lightbulb fa-fw"></i>
								</button>
							</div>
						</div>
						<hr class="mb-0 mt-3" />
					</div>

					<div id="weather-section" class="collapse animated fadeIn">
						<hr class="mb-0 mt-2" />
						<div class="row">
							<div class="col-md-12 h-auto mt-2 mb-1 ml-1">
								<span class="badge badge-primary badge-block badge-icon badge-icon-sm h-auto p-1 weather-description text-warning text-uppercase"></span>
							</div>
							<div class="col-md-12 ml-1">
								<div class="badge badge-primary badge-block weather-data">
									<div class="row">
										<div class="col-md-4 h-auto mt-2">
											<canvas id="weatherIcon" class="weather-icon" width="60" height="60"></canvas>
										</div>
										<div class="col-md-8 h-auto text-center mt-2">
											(<span class="weather-min-temperature text-primary"></span> - <span class="weather-max-temperature text-danger"></span>)
											<div class="mt-3">
												<span class="weather-temperature text-warning"></span>
											</div>
										</div>
										<div class="col-md-6 h-auto weather-item">
											<div class="badge badge-rounded badge-info h-auto">
												<i class="wi wi-sandstorm wi-fw sm"></i>
												<span class="weather-wind-speed"></span>
											</div>
										</div>
										<div class="col-md-6 h-auto weather-item">
											<div class="badge badge-rounded badge-info h-auto">
												<i class="wi wi-humidity wi-fw sm"></i>
												<span class="weather-humidity"></span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div id="fm-radio" class="text-center collapse animated fadeIn">
						<hr class="mb-3 mt-2" />
						<div id="radioWidget"></div>
						<hr class="mb-0 mt-3" />
					</div>
				</div>
			</section>
		</div>
	</article>
</aside>
<!-- ============================================================== -->
<!-- End Right Sidebar                                              -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Footer - style you can find in core-footer.css                 -->
<!-- ============================================================== -->
<article id="footer-contact-area" class="collapse">
	<div class="container-fluid">
		<div class="row">
			<!-- About and social -->
			<section class="col-lg-3 col-md-3 footer-about">
				<div class="contact-field mt-2">
					<h4 class="text-warning">About Us</h4>
					<p class="lorem-one"></p>
					<div class="text-left">
						<hr />
						<a href="https://twitter.com/home?status=<?php echo urlEncode($_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); ?>"
						   class="btn btn-social-icon btn-twitter btn-sm">
							<i class="fab fa-twitter"></i>
						</a>
						<a href="https://plus.google.com/share?url=<?php echo urlEncode($_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); ?>"
						   class="btn btn-social-icon btn-google btn-sm ml-2">
							<i class="fab fa-google"></i>
						</a>
						<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlEncode($_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); ?>"
						   class="btn btn-social-icon btn-facebook btn-sm ml-2">
							<i class="fab fa-facebook"></i>
						</a>
					</div>
				</div>
			</section>
			<!-- Contact Content -->
			<section class="col-lg-5 col-md-4 col-sm-4">
				<div class="ml-5">
					<div class="row mt-2">
						<section class="col-lg-5 d-none d-sm-none d-md-none d-lg-block d-xl-block">
							<h5 class="text-warning">Company</h5>
							<hr />
							<p>
								<i class="fas fa-home fa-fw mr-2"></i>
								<a href="https://www.mcx-systems.com/" target="_blank">MCX-Systems</a>
								<br />
								<i class="fas fa-cube fa-fw mr-2"></i>
								<a href="https://www.hypercube.si/">HyperCube Project</a>
								<br />
								<i class="fas fa-puzzle-piece fa-fw mr-2"></i>
								<a href="https://www.projects.mcx-systems.net/" target="_blank">Projects</a>
							</p>
							<p class="mt-4">
								<i class="fas fa-briefcase fa-fw mr-2"></i>
								<a href="https://www.hypercube.si/">Services</a>
								<br />
								<i class="fas fa-question-circle fa-fw mr-2"></i>
								<a href="https://www.hypercube.si/">Terms &amp; Conditions</a>
							</p>
						</section>
						<section class="col-lg-7 col-md-12">
							<h5 class="text-warning">Contact Us</h5>
							<hr />
							<p>
								<i class="fas fa-phone fa-fw mr-2"></i>
								<a href="tel:386051260304"> +38651260304</a>
								<br />
								<i class="fas fa-envelope fa-fw mr-2"></i>
								<a href="mailto:webmaster@mcx-systems.com">webmaster@mcx-systems.com</a>
							</p>
							<p class="mt-4">
								<i class="fas fa-map-marker fa-fw mr-2"></i>Partizanska 34,
								<br />9000 Murska Sobota,
								<br />Slovenija. </p>
						</section>
					</div>
				</div>
			</section>
			<!-- Google map container -->
			<section class="col-lg-4 col-md-5 col-sm-8">
				<div class="footer-contact-area-map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2738.200369799402!2d16.169126515598016!3d46.662305079133446!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1b2ac09a018b7525!2sMCX-Systems!5e0!3m2!1ssl!2ssi!4v1533648544383" frameborder="0" allowfullscreen></iframe>
				</div>
			</section>
		</div>
	</div>
</article>
<!-- ============================================================== -->
<footer id="bottom" class="fixed-bottom animated fadeInUp">
	<section class="container-fluid">
		<!-- Footer Left Content -->
		<div class="float-left text-copyright d-none d-sm-block d-md-block d-lg-block d-xl-block">
			Copyright &copy; 2007 - <?php echo date("Y"); ?>.
			<a href="#" title="HyperCube" class="text-warning" data-i18n="core:app.name" data-hyperCube="linkContact">HyperCube</a>
			by
			<a href="#" target="_blank" title="Go to MCX-Systems Network" data-hyperCube="linkDeveloper">
				MCX-Systems&reg;
			</a>.
		</div>
		<!-- Footer Middle Content -->
		<div class="footer-brand">
			<a href="https://validator.w3.org/check?uri=referer" title="Powered with valid HTML5!" target="_blank">
				<span class="html5-logo"></span>
			</a>
			<a href="https://jigsaw.w3.org/css-validator/check/referer?profile=css3" title="Powered with valid CSS3!"
			   target="_blank">
				<span class="css3-logo"></span>
			</a>
		</div>
		<!-- Footer Right Content -->
		<div class="float-right d-none d-sm-none d-md-none d-lg-block d-xl-block">
			<a href="#" class="btn btn-sm mb-1 ml-1" role="button" title="Slovenian Language" data-hyperCube="languageSi">
				<i class="flag flag-si fa-fw"></i>
			</a>
			<a href="#" class="btn btn-sm mb-1" role="button" title="German Language" data-hyperCube="languageDe">
				<i class="flag flag-de fa-fw"></i>
			</a>
			<a href="#" class="btn btn-sm mb-1" role="button" title="Russian Language" data-hyperCube="languageRu">
				<i class="flag flag-ru fa-fw"></i>
			</a>
			<a href="#" class="btn btn-sm mb-1 active" role="button" title="English Language" data-hyperCube="languageEn">
				<i class="flag flag-gb fa-fw"></i>
			</a>
			<a href="#" class="btn btn-sm back-to-top" role="button" title="Return to Top" data-hyperCube="backToTop">
				<i class="fas fa-arrow-alt-circle-up fa-fw text-warning"></i>
			</a>
		</div>
	</section>
</footer>
<!-- ============================================================== -->
<!-- End Footer                                                     -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- A place for modal dialogs and things that are hidden           -->
<!-- ============================================================== -->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-62352038-2"></script>
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag()
	{
		dataLayer.push(arguments);
	}
	gtag('js', new Date());
	gtag('config', 'UA-62352038-2');
</script>
</body>
</html>