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
			<section class="breadcrumb-bar col-md-12">
				<div id="breadcrumb">
					<h4 class="float-left align-middle text-warning ml-2" data-i18n="core:breadcrumb.welcome">
						Welcome
					</h4>
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
							<a href="<?php echo base_url() ?>examples/blank">UI</a>
						</li>
						<li class="breadcrumb-item active">Core</li>
					</ul>
				</div>
				<!-- ============================================================== -->
				<!-- Main Top Menu toggleable with Breadcrumb                       -->
				<!-- ============================================================== -->
				<div id="topMenu" class="hidden-menu">
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
	<article id="main-wrapper-content">
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
								<h4 class="card-title">Core functions and tools examples</h4>
								<h6 class="card-subtitle">Use of <code>extended</code> HyperCube
									<code>functions and tools</code>.
								</h6>
							</div>
						</div>
					</section>

					<section class="col-md-12">
						<hr />
					</section>

					<section class="col-md-4 mb-3">
						<div class="card">
							<div class="card-body">
								<div id="clock1"></div>

								<script type="text/javascript">
									$('#clock1').countdown('2020/10/10').on('update.countdown', function(event)
									{
										var $this = $(this).html(event.strftime(''
											+ '<span>%-w</span> week%!w '
											+ '<span>%-d</span> day%!d '
											+ '<span>%H</span> hr '
											+ '<span>%M</span> min '
											+ '<span>%S</span> sec'));
									});
								</script>
							</div>
						</div>
					</section>

					<section class="col-md-4 mb-3">
						<div class="card">
							<div class="card-body">
								<div id="clock"></div>

								<hr/>
								<button type="button" class="btn btn-primary" id="btn-reset">
									<i class="fas fa-redo-alt mr-2"></i>
									Reset
								</button>

								<button type="button" class="btn btn-info" id="#btn-pause">
									<i class="fas fa-pause mr-2"></i>
									Pause
								</button>

								<button type="button" class="btn btn-danger" id="#btn-resume">
									<i class="fas fa-play mr-2"></i>
									Resume
								</button>
							</div>
						</div>
						<script type="text/javascript">
							$(document).ready(function()
							{
								// 15 days from now!
								function get15dayFromNow()
								{
									return new Date(new Date().valueOf() + 15 * 24 * 60 * 60 * 1000);
								}

								var $clock = $('#clock');

								$clock.countdown(get15dayFromNow(), function (event)
								{
									$(this).html(event.strftime('%D days %H:%M:%S'));
								});

								$('#btn-reset').click(function ()
								{
									$clock.countdown(get15dayFromNow());
								});

								$('#btn-pause').click(function ()
								{
									$clock.countdown('pause');
								});

								$('#btn-resume').click(function ()
								{
									$clock.countdown('resume');
								});
							});
						</script>
					</section>

					<section class="col-md-4 mb-3">
						<div class="card">
							<div class="card-body">
								<div data-countdown="2018/12/31"></div>
								<div data-countdown="2019/01/01"></div>
								<div data-countdown="2020/01/01"></div>
								<div data-countdown="2021/01/01"></div>
							</div>
						</div>

						<script type="text/javascript">
							$('[data-countdown]').each(function()
							{
								var $this = $(this), finalDate = $(this).data('countdown');
								$this.countdown(finalDate, function(event)
								{
									$this.html(event.strftime('%D days %H:%M:%S'));
								});
							});
						</script>
					</section>

					<section class="col-md-12">
						<hr />
					</section>

					<section class="col-md-6 mb-3">
						<div class="card">
							<div class="card-body">
								<div id="console1" class="console"></div>
							</div>
						</div>
					</section>

					<section class="col-md-6 mb-3">
						<div class="card">
							<div class="card-body">
								<div id="console" class="console"></div>
							</div>
						</div>
					</section>

					<script type="text/javascript">
						$(document).ready(function ()
						{
							$('#console1').console({
								promptLabel: 'Console> ',
								commandValidate:function(line)
								{
									if (line === "") return false;
									else return true;
								},
								commandHandle:function(line)
								{
									return [{msg:"=> [12,42]",
										className:"console-message-value"},
										{msg:":: [a]",
											className:"console-message-type"}]
								},
								autofocus:true,
								animateScroll:true,
								promptHistory:true,
								charInsertTrigger:function(keycode,line)
								{
									// Let you type until you press a-z
									// Never allow zero.
									return !line.match(/[a-z]+/) && keycode !== '0'.charCodeAt(0);
								}
							});

							var controller = $('#console').console({
								promptLabel: 'Console> ',
								commandValidate:function(line)
								{
									if (line === "") return false;
									else return true;
								},
								commandHandle:function(line)
								{
									return [{msg:"=> [12,42]",
										className:"console-message-value"},
										{msg:":: [a]",
											className:"console-message-type"}]
								},
								autofocus:true,
								animateScroll:true,
								promptHistory:true
							});

							var counter = 0;
							setInterval(function()
							{
								controller.report([{msg:"The counter is at " + (counter++) + ".",
									className:"console-message-value"},
									{msg:(counter * 3) + " seconds have elapsed.",
										className:"console-message-type"}]);
							}, 3000);
						});
					</script>

					<section class="col-md-12">
						<hr />
					</section>

					<section class="col-md-6">
						<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="100%" height="300" id="myFlashContent">
							<param name="movie" value="<?php echo base_url() ?>assets/javascript/js/core/level-1/swfObject/test.swf">
							<!--[if !IE]>-->
							<object type="application/x-shockwave-flash" data="<?php echo base_url() ?>assets/javascript/js/core/level-1/swfObject/test.swf" width="100%" height="300">
								<!--<![endif]-->
								<a href="https://www.adobe.com/go/getflashplayer">
									<img src="https://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player">
								</a>
								<!--[if !IE]>-->
							</object>
							<!--<![endif]-->
						</object>

						<script type="text/javascript">
							swfobject.registerObject("myFlashContent", "9.0.0", global_base_url + "assets/javascript/js/core/level-1/swfObject/expressInstall.swf");
						</script>
					</section>

					<section class="col-md-6">
						<div id="myAlternativeContent" class="sfwObject-embed"></div>
						<script type="text/javascript">
							var flashvars = {};
							var params = {};
							var attributes = {};
							swfobject.embedSWF(global_base_url + "assets/javascript/js/core/level-1/swfObject/test.swf", "myAlternativeContent", "100%", "300", "9.0.0", global_base_url + "assets/javascript/js/core/level-1/swfObject/expressInstall.swf", flashvars, params, attributes);
						</script>
					</section>

					<section class="col-md-12">
						<hr />
					</section>

					<section class="col-md-12">
						<embed src="<?php echo base_url() ?>assets/javascript/js/core/level-1/swfObject/test.swf"  height="200" width="100%" />
					</section>

					<section class="col-md-12">
						<hr />
					</section>

					<section class="col-md-12">
						<canvas id="clear-day" width="120" height="120"></canvas>
						<canvas id="clear-night" width="120" height="120"></canvas>
						<canvas id="partly-cloudy-day" width="120" height="120"></canvas>
						<canvas id="partly-cloudy-night" width="120" height="120"></canvas>
						<canvas id="cloudy" width="120" height="120"></canvas>
						<canvas id="rain" width="120" height="120"></canvas>
						<canvas id="sleet" width="120" height="120"></canvas>
						<canvas id="snow" width="120" height="120"></canvas>
						<canvas id="wind" width="120" height="120"></canvas>
						<canvas id="fog" width="120" height="120"></canvas>
					</section>

					<section class="col-md-12">
						<hr />
					</section>

					<section class="col-md-4">
						<div id="patternHolder" class="mx-auto"></div>
					</section>

					<section class="col-md-4">
						<div id="patternHolder2" class="mx-auto"></div>
					</section>

					<section class="col-md-4">
						<div id="patternHolder1" class="mx-auto"></div>
					</section>

					<script type="text/javascript">
						$(document).ready(function ()
						{
							var lock1 = new PatternLock("#patternHolder");
							var lock2 = new PatternLock('#patternHolder2', {
								matrix: [4, 4]
							});
							var lock3 = new PatternLock('#patternHolder1', {
								allowRepeat: false,
								radius: 30,
								margin: 20,
								mapper: function(idx)
								{
									return (idx%9) + 1;
								}
							});
						});
					</script>

					<section class="col-md-12">
						<hr />
					</section>

					<section class="col-md-12">
						<button class="btn btn-info" type="button" onclick="HyperCube.callAjax('/restful/simple_ajax');">Simple Ajax Request</button>
						<button class="btn btn-info" type="button" onclick="HyperCube.callAjaxJson('/restful/json_ajax');">JSon Ajax Request</button>
						<button class="btn btn-info" type="button" onclick="HyperCube.callAjaxJson('/restful/json_proxy_ajax');">JSon Ajax Request</button>
						<button class="btn btn-info" type="button" onclick="clearTestAjax();">Clear Ajax Response</button>
					</section>

					<script type="text/javascript">
						function clearTestAjax()
						{
							$("#ajax-content").html(null);
							$('#ajax-message-content').val(null);
						}

						$(document).ready(function()
						{
							$.mockjax({
								url: '/restful/simple_ajax',
								// Simulate a network latency of 750ms
								responseTime: 750,
								responseText: 'The response for a simple ajax request'
							});

							$.mockjax({
								url: '/restful/json_ajax',
								type: 'POST',
								contentType: 'text/json',
								responseTime: 500,
								responseText: {employees: [{firstname: 'mark', lastname: 'twain'}, {firstname: 'sara', lastname: 'oconnor'}]}
							});

							$.mockjax({
								url: '/restful/json_proxy_ajax',
								type: 'POST',
								contentType: 'text/json',
								responseTime: 500,
								proxy: global_base_url + 'uploads/test/countries.json'
							});
						});
					</script>

					<section class="col-md-12">
						<hr />
					</section>

					<section class="col-md-12">
						<button id="open-wizard" class="btn btn-info">Open wizard</button>
						<script type="text/javascript">
							$(document).ready(function ()
							{
								$.fn.wizard.logging = true;
								var wizard = $("#satellite-wizard").wizard({
									keyboard: false,
									backdrop: "static"
								});

								$("#fqdn").on("input", function ()
								{
									if ($(this).val().length != 0)
									{
										$("#ip").val("").attr("disabled", "disabled");
										$("#fqdn, #ip").parents(".form-group").removeClass("has-error has-success");
									}
									else
									{
										$("#ip").val("").removeAttr("disabled");
									}
								});

								var pattern = /\b(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\b/;
								x = 46;

								$("#ip").on("input", function ()
								{
									if ($(this).val().length != 0)
									{
										$("#fqdn").val("").attr("disabled", "disabled");
									}
									else
									{
										$("#fqdn").val("").removeAttr("disabled");
									}
								}).keypress(function (e)
								{
									if (e.which != 8 && e.which != 0 && e.which != x && (e.which < 48 || e.which > 57))
									{
										console.log(e.which);
										return false;
									}
								}).keyup(function ()
								{
									var $this = $(this);
									if (!pattern.test($this.val()))
									{
										//$('#validate_ip').text('Not Valid IP');
										console.log("Not Valid IP");
										$this.parents(".form-group").removeClass("has-error has-success").addClass("has-error");
										while ($this.val().indexOf("..") !== -1)
										{
											$this.val($this.val().replace("..", "."));
										}
										x = 46;
									}
									else
									{
										x = 0;
										var lastChar = $this.val().substr($this.val().length - 1);
										if (lastChar == ".")
										{
											$this.val($this.val().slice(0, -1));
										}
										var ip = $this.val().split(".");
										if (ip.length == 4)
										{
											//$('#validate_ip').text('Valid IP');
											console.log("Valid IP");
											$this.parents(".form-group").removeClass("has-error").addClass("has-success");
										}
									}
								});

								wizard.on("closed", function ()
								{
									wizard.reset();
								});

								wizard.on("reset", function ()
								{
									wizard.modal.find(":input").val("").removeAttr("disabled");
									wizard.modal.find(".form-group").removeClass("has-error").removeClass("has-succes");
									wizard.modal.find("#fqdn").data("is-valid", 0).data("lookup", 0);
								});

								wizard.on("submit", function (wizard)
								{
									var submit = {
										"hostname": $("#new-server-fqdn").val()
									};

									this.log("seralize()");
									this.log(this.serialize());
									this.log("serializeArray()");
									this.log(this.serializeArray());

									setTimeout(function ()
									{
										wizard.trigger("success");
										wizard.hideButtons();
										wizard._submitting = false;
										wizard.showSubmitCard("success");
										wizard.updateProgressBar(0);
									}, 2000);
								});

								wizard.el.find(".wizard-success .im-done").click(function ()
								{
									wizard.hide();
									setTimeout(function ()
									{
										wizard.reset();
									}, 250);

								});

								wizard.el.find(".wizard-success .create-another-server").click(function ()
								{
									wizard.reset();
								});

								$(".wizard-group-list").click(function ()
								{
									alert("Disabled for demo.");
								});

								$("#open-wizard").click(function (e)
								{
									e.preventDefault();
									wizard.show();
								});
							});

							function validateServerLabel(el)
							{
								var name = el.val();
								var retValue = {};

								if (name === "")
								{
									retValue.status = false;
									retValue.msg = "Please enter a label";
								}
								else
								{
									retValue.status = true;
								}

								return retValue;
							}

							function validateFQDN(el)
							{
								var $this = $(el);
								var retValue = {};

								if ($this.is(":disabled"))
								{
									// FQDN Disabled
									retValue.status = true;
								}
								else
								{
									if ($this.data("lookup") === 0)
									{
										retValue.status = false;
										retValue.msg = "Preform lookup first";
									}
									else
									{
										if ($this.data("is-valid") === 0)
										{
											retValue.status = false;
											retValue.msg = "Lookup Failed";
										}
										else
										{
											retValue.status = true;
										}
									}
								}

								return retValue;
							}

							function lookup()
							{
								// Normally a ajax call to the server to preform a lookup
								$("#fqdn").data("lookup", 1);
								$("#fqdn").data("is-valid", 1);
								$("#ip").val("127.0.0.1");
							}
						</script>
					</section>

					<section class="col-md-12">
						<hr />
					</section>

					<section class="col-md-12">
						<button class="btn btn-info" type="button" onclick="createUrlWindow();">Create URL content window</button>
						<button class="btn btn-info" type="button" onclick="create3Window();">Create 3 windows</button>
						<button class="btn btn-info" type="button" onclick="createWindow();">Create a window</button>
						<button class="btn btn-info" type="button" onclick="hideAllWindow();">Hide All</button>
						<button class="btn btn-info" type="button" onclick="showAllWindow();">Show All</button>
						<button class="btn btn-info" type="button" onclick="closeAllWindow();">Close All</button>
						<button class="btn btn-info" type="button" onclick="closeAllWindowQuiet();">Close All Quiet</button>
						<button class="btn btn-info" type="button" onclick="hideAllWindow();">Hide All</button>
					</section>

					<script type="text/javascript">
						function create3Window()
						{
							for(let i=0; i<3; i++)
							{
								$("#main-wrapper-content").window(
									{
										x: Math.floor( Math.random() * 800), // the x-axis value on screen, if -1 means put on screen center
										y: Math.floor( Math.random() * 500), // the y-axis value on screen, if -1 means put on screen center
										icon: global_base_url + 'assets/images/window/folder.png',
										title: "This test window only " + i,
										content: '<div class="window-content">' +
											"Starting with the basics of object-oriented programming applicable to design \n" +
											"patterns, this work covers making JavaScript more expressive, inheritance, \n" +
											"encapsulation, information hiding, and more. The second part of the book \n" +
											"addresses several design patterns, including composites, decorators, fades, \n" +
											"and adapters.</div>",
										footerContent: 'This is a nice plugin :^)',
										checkBoundary: true,
										onClose: function(wnd)
										{
										}
									}
								);
							}
						}

						function createWindow() {
							// Limit window within a element
							$("#main-wrapper-content").window({
								icon: global_base_url + 'assets/images/window/error.png',
								title: "This window only",
								content: '<div class="window-content">' +
									"Starting with the basics of object-oriented programming applicable to design \n" +
									"patterns, this work covers making JavaScript more expressive, inheritance, \n" +
									"encapsulation, information hiding, and more. The second part of the book \n" +
									"addresses several design patterns, including composites, decorators, fades, \n" +
									"and adapters.</div>",
								footerContent: 'This is a nice plugin :^)',
								checkBoundary: true,
								createRandomOffset: {x:200, y:150},
								onClose: function(wnd)
								{
								}
							});
						}

						function createUrlWindow() {
							$("#main-wrapper-content").window({
								icon: global_base_url + 'assets/images/window/Application.png',
								title: "DinoHome Network",
								url: "http://www.dinohome.net/",
								width: 600,           // window width
								height: 600,          // window height
								scrollable: false,    // a boolean flag to show scroll bar or not
								checkBoundary: true
							});
						}

						function hideAllWindow() {
							$.window.hideAll(); // hide all windows
						}

						function showAllWindow() {
							$.window.showAll(); // show all windows
						}

						function closeAllWindow() {
							$.window.closeAll(); // close all windows
						}

						function closeAllWindowQuiet() {
							$.window.closeAll(true); // close all windows without callback
						}

					</script>

					<section class="col-md-12">
						<hr />
					</section>

					<section class="col-md-12">
						<div class="row">
							<section class="col-md-4">
								<div id="tabWheel"></div>
							</section>

							<section class="col-md-4">
								<h4>In rotation mode wheelnav acts as a tab navigation.</h4>
								<h4>Pure JavaScript in separated source files.</h4>
								<h4>Predefined css classes for easy styling.</h4>
								<h4>Drawing and animation with svg.</h4>
							</section>

							<section class="col-md-4">
								<div id="wheel1"></div>
							</section>
						</div>

						<!--PieMenu-->
						<hr />

						<div class="row">
							<section class="col-md-4">
								<div id="pieWheel"></div>
							</section>

							<section class="col-md-4">
								<h4>Wheelnav can be a collapsable pie menu with <span class="link" onclick="pieWheel.spreadWheel();">spreader</span>.</h4>
								<h4><span class="text-muted"><a href="http://en.wikipedia.org/wiki/Pie_menu" target="_blank">Pie menus</a> are faster and more reliable to select from than linear menus.</span></h4>
								<h4><span class="text-muted">You can spread the wheel again by the plus sign.</span></h4>
							</section>

							<section class="col-md-4">
								<div id="wheel2"></div>
							</section>
						</div>

						<!--NavMenu-->
						<hr />

						<div class="row">
							<section class="col-md-4">
								<div id="navWheel"></div>
							</section>

							<section class="col-md-4">
								<h4>The selected navigation item can be marked with marker.</h4>
							</section>

							<section class="col-md-4">
								<div id="wheel3"></div>
							</section>
						</div>

						<!--Classic-->
						<hr />

						<div class="row">
							<section class="col-md-4">
								<div id="classicWheel"></div>
							</section>

							<section class="col-md-4">
								<h4>Classic tab is also available because of architecture of wheelnav.</h4>
								<h4><span class="text-muted">A navigation item is a <a href="http://www.w3.org/TR/SVG/paths.html#PathDataGeneralInformation" target="_blank">SVG path</a> and can appear in any shape and any position.</span></h4>
								<h4><span class="text-muted">The default appearance is a wheel but the final form only depends on your imagination.</span></h4>
							</section>

							<section class="col-md-4">
								<div id="wheel4"></div>
							</section>
						</div>
					</section>

					<script type="text/javascript">
						var wheel1;
						var wheel2;
						var wheel3;
						var wheel4;
						var tabWheel;
						var pieWheel;
						var navWheel;
						var classicWheel;

						window.onload = function ()
						{
							wheel1 = new wheelnav("wheel1");
							wheel1.colors = colorpalette.gamebookers;
							wheel1.wheelRadius = 160;
							wheel1.centerY = 170;
							wheel1.slicePathFunction = slicePath().DonutSlice;
							wheel1.sliceTransformFunction = sliceTransform().RotateTitleTransform;
							wheel1.createWheel();

							wheel2 = new wheelnav("wheel2");
							wheel2.wheelRadius = 160;
							wheel2.centerY = 170;
							wheel2.clockwise = false;
							wheel2.spreaderEnable = true;
							wheel2.clickModeSpreadOff = true;
							wheel2.createWheel(['title-0', 'title-1', 'title-2', 'title-3', 'title-4']);

							wheel3 = new wheelnav("wheel3");
							wheel3.wheelRadius = 160;
							wheel3.centerY = 170;
							wheel3.markerEnable = true;
							wheel3.colors = colorpalette.hotaru;
							wheel3.slicePathFunction = slicePath().PieArrowSlice;
							wheel3.createWheel(['default', 'enable', 'rotate', 'attrs']);

							wheel4 = new wheelnav("wheel4");
							wheel4.centerY = 170;
							wheel4.wheelRadius = 120;
							wheel4.maxPercent = 1.4;
							wheel4.slicePathFunction = slicePath().MenuSlice;
							wheel4.initWheel([icon.stop, icon.end, icon.play, icon.start]);
							wheel4.navItems[0].slicePathFunction = slicePath().MenuSliceWithoutLine;
							wheel4.createWheel();

							tabWheel = new wheelnav("tabWheel");
							tabWheel.centerY = 170;
							tabWheel.wheelRadius = 160;
							tabWheel.navAngle = 45;

							if (document.documentElement.clientWidth < 480)
							{
								tabWheel.navAngle = 90;
							}

							tabWheel.colors = new Array("#2b9464");
							tabWheel.titleFont = "50px Constantia, Verdana, Helvetica, Sans-Serif, serif";
							tabWheel.animateeffect = "easeOut";
							tabWheel.animatetime = 700;
							tabWheel.slicePathCustom = slicePath().DonutSliceCustomization();
							tabWheel.slicePathCustom.minRadiusPercent = 0.2;
							tabWheel.slicePathCustom.maxRadiusPercent = 0.8472;
							tabWheel.sliceSelectedPathCustom = slicePath().DonutSliceCustomization();
							tabWheel.sliceSelectedPathCustom.minRadiusPercent = 0.2;
							tabWheel.sliceSelectedPathCustom.maxRadiusPercent = 0.8472;
							tabWheel.slicePathFunction = slicePath().DonutSlice;
							tabWheel.sliceSelectedPathFunction = slicePath().DonutSlice;
							tabWheel.sliceSelectedTransformFunction = sliceTransform().MoveMiddleTransform;
							tabWheel.sliceSelectedTransformCustom = sliceTransform();
							tabWheel.sliceSelectedTransformCustom.scaleString = "s1.5";
							tabWheel.rotateRound = true;
							tabWheel.initWheel(["tab", "js", "css", "svg"]);
							tabWheel.navItems[3].sliceSelectedTransformFunction = sliceTransform().RotateTitleTransform;
							tabWheel.slicePathAttr = { fill: "#2f7656", stroke: "#E7E7E7", "stroke-width": 0, cursor: 'pointer' };
							tabWheel.sliceHoverAttr = { fill: "#2b9464", stroke: "#E7E7E7", "stroke-width": 0, cursor: 'pointer' };
							tabWheel.sliceSelectedAttr = { fill: "#2b9464", stroke: "#E7E7E7", "stroke-width": 0, cursor: 'default' };
							tabWheel.titleAttr = { font: tabWheel.titleFont, fill: "#080808", stroke: "none", cursor: 'pointer' };
							tabWheel.titleHoverAttr = { font: tabWheel.titleFont, fill: "#EEE", cursor: 'pointer', stroke: "none" };
							tabWheel.titleSelectedAttr = { font: tabWheel.titleFont, fill: "#EEE", cursor: 'default' };
							tabWheel.createWheel();

							//Pie menu
							pieWheel = new wheelnav("pieWheel");
							pieWheel.spreaderEnable = true;
							pieWheel.spreaderRadius = 25;
							pieWheel.spreaderInTitle = icon.plus;
							pieWheel.spreaderOutTitle = icon.cross;

							if (document.documentElement.clientWidth < 480)
							{
								pieWheel.wheelRadius = 220;
							}
							else
							{
								pieWheel.wheelRadius = 300;
							}

							pieWheel.centerY = 100;
							pieWheel.clickModeRotate = false;
							pieWheel.slicePathCustom = slicePath().MenuSliceCustomization();
							pieWheel.slicePathCustom.menuRadius = 40;
							pieWheel.sliceHoverPathCustom = slicePath().MenuSliceCustomization();
							pieWheel.sliceHoverPathCustom.menuRadius = 43;
							pieWheel.sliceSelectedPathCustom = slicePath().MenuSliceCustomization();
							pieWheel.sliceSelectedPathCustom.menuRadius = 43;
							pieWheel.slicePathFunction = slicePath().MenuSlice;
							pieWheel.sliceHoverPathFunction = slicePath().MenuSlice;
							pieWheel.sliceSelectedPathFunction = slicePath().MenuSlice;
							pieWheel.sliceHoverTransformFunction = sliceTransform().ScaleTitleTransform;
							pieWheel.sliceSelectedTransformFunction = sliceTransform().ScaleTitleTransform;
							pieWheel.createWheel([icon.feed, 'imgsrc:' + global_base_url + 'assets/images/window/yes.png', icon.cross, null, null, null, null, null]);

							pieWheel.navItems[2].navigateFunction = function () { pieWheel.spreadWheel(); };

							//Marker navigation
							navWheel = new wheelnav("navWheel");
							navWheel.clickModeRotate = false;
							navWheel.spreaderRadius = 160 * 0.325;
							navWheel.wheelRadius = 150;
							navWheel.centerY = 180;
							navWheel.slicePathFunction = slicePath().DonutSlice;
							navWheel.colors = new Array("#648A4F");
							navWheel.spreaderEnable = true;
							navWheel.markerEnable = true;
							navWheel.markerPathFunction = markerPath().PieLineMarker;
							navWheel.animatetime = 1000;
							navWheel.animateeffect = "elastic";
							navWheel.spreaderInTitle = icon.power;
							navWheel.spreaderOutTitle = icon.cross;
							navWheel.navAngle = 270;
							navWheel.rotateRound = true;
							navWheel.createWheel([icon.stop, icon.end, icon.ff, icon.play, icon.rw, icon.start]);

							//Classic tab
							classicWheel = new wheelnav("classicWheel");
							if (document.documentElement.clientWidth < 480)
							{
								classicWheel.navAngle = 90;
							}

							classicWheel.spreaderInTitle = icon.list;
							classicWheel.spreaderOutTitle = icon.contract;
							classicWheel.centerY = 75;
							classicWheel.spreaderOutTitleHeight = 60;
							classicWheel.spreaderInTitleHeight = 50;
							classicWheel.clickModeRotate = false;
							classicWheel.spreaderInPercent = 0.8;
							classicWheel.spreaderOutPercent = 1.1;
							classicWheel.colors = ['#EDC951'];
							classicWheel.spreaderEnable = true;
							classicWheel.spreaderRadius = 70;
							classicWheel.slicePathFunction = slicePath().DonutSlice;
							classicWheel.clickModeRotate = false;
							classicWheel.createWheel(['text', 'icon', 'percent', 'angle', null, null, null, null, null, null, null, null, null, null, null, null]);
						};
					</script>

					<section class="col-md-12">
						<hr />
					</section>

					<section class="col-md-6">
						<h4>Raphael JS</h4>
						<div id="raphaelHolder"></div>
					</section>

					<section class="col-md-6">
						<h4>Raphael JS</h4>
						<div id="raphaelHolder1"></div>
					</section>

					<section class="col-md-6">
						<h4>Raphael JS</h4>
						<div id="raphaelHolder2"></div>
					</section>

					<section class="col-md-6">
						<h4>Raphael JS</h4>
						<div id="raphaelHolder3"></div>
					</section>

					<script type="text/javascript">
						$(document).ready(function()
						{
							Raphael("raphaelHolder2", 640, 480, function () {
								var r = this,
									p = r.path("M295.186,122.908c12.434,18.149,32.781,18.149,45.215,0l12.152-17.736c12.434-18.149,22.109-15.005,21.5,6.986l-0.596,21.49c-0.609,21.992,15.852,33.952,36.579,26.578l20.257-7.207c20.728-7.375,26.707,0.856,13.288,18.29l-13.113,17.037c-13.419,17.434-7.132,36.784,13.971,43.001l20.624,6.076c21.103,6.217,21.103,16.391,0,22.608l-20.624,6.076c-21.103,6.217-27.39,25.567-13.971,43.001l13.113,17.037c13.419,17.434,7.439,25.664-13.287,18.289l-20.259-7.207c-20.727-7.375-37.188,4.585-36.578,26.576l0.596,21.492c0.609,21.991-9.066,25.135-21.5,6.986L340.4,374.543c-12.434-18.148-32.781-18.148-45.215,0.001l-12.152,17.736c-12.434,18.149-22.109,15.006-21.5-6.985l0.595-21.492c0.609-21.991-15.851-33.951-36.578-26.576l-20.257,7.207c-20.727,7.375-26.707-0.855-13.288-18.29l13.112-17.035c13.419-17.435,7.132-36.785-13.972-43.002l-20.623-6.076c-21.104-6.217-21.104-16.391,0-22.608l20.623-6.076c21.104-6.217,27.391-25.568,13.972-43.002l-13.112-17.036c-13.419-17.434-7.439-25.664,13.288-18.29l20.256,7.207c20.728,7.374,37.188-4.585,36.579-26.577l-0.595-21.49c-0.609-21.992,9.066-25.136,21.5-6.986L295.186,122.908z").attr({stroke: "#666", opacity: .3, "stroke-width": 10}),
									over = r.path().attr({stroke: "#fff"}),
									len = p.getTotalLength(),
									e = r.ellipse(0, 0, 7, 3).attr({stroke: "none", fill: "#fff"}).onAnimation(function () {
										var t = this.attr("transform");
										over.attr({path: "M316,248L" + t[0][1] + "," + t[0][2] + "z"});
									});
								r.circle(316, 248, 5).attr({stroke: "none", fill: "#fff"});
								r.customAttributes.along = function (v) {
									var point = p.getPointAtLength(v * len);
									return {
										transform: "t" + [point.x, point.y] + "r" + point.alpha
									};
								};
								e.attr({along: 0});

								function run() {
									e.animate({along: 1}, 2e4, function () {
										e.attr({along: 0});
										setTimeout(run);
									});
								}
								run();

								// logo
								var logo = r.set(
									r.rect(13, 13, 116, 116, 30).attr({stroke: "none", fill: "#fff", transform: "r45", opacity: .2}),
									r.path("M129.657,71.361c0,3.812-1.105,7.451-3.153,10.563c-1.229,1.677-2.509,3.143-3.829,4.408l-0.095,0.095c-6.217,5.912-13.24,7.588-19.2,7.588c-3.28,0-6.24-0.508-8.566-1.096C81.19,89.48,66.382,77.757,59.604,60.66c3.65,1.543,7.662,2.396,11.869,2.396c15.805,0,28.849-12.04,30.446-27.429l22.073,22.072C127.645,61.351,129.657,66.201,129.657,71.361zM18.953,85.018c-3.653-3.649-5.663-8.5-5.663-13.656c0-5.16,2.01-10.011,5.661-13.656l14.934-14.935c-3.896,13.269-5.569,27.23-4.674,40.614c0.322,4.812,0.987,9.427,1.942,13.831L18.953,85.018zM44.482,46.869c3.279,25.662,23.592,50.991,47.552,57.046c3.903,0.986,7.729,1.472,11.432,1.472c0.055,0,0.107-0.005,0.161-0.005l-18.501,18.503c-3.647,3.646-8.498,5.654-13.652,5.654c-3.591,0-7.021-0.993-10.01-2.815l0.007-0.01c-1.177-0.78-2.298-1.66-3.388-2.593c-0.084-0.082-0.176-0.153-0.26-0.236l-3.738-3.738c-7.688-8.825-12.521-21.957-13.561-37.517C39.736,70.853,41.149,58.578,44.482,46.869").attr({fill: "#f89938", stroke: "none", opacity: .5}),
									r.circle(71, 32, 19).attr({stroke: "none", fill: "#39f", opacity: .5}));
								logo.transform("t245,177...");
								// logo end
							});

							/*--------------------------------------------------------------------------------*/

							var ras = Raphael("raphaelHolder3", 640, 480);

							ras.customAttributes.segment = function (x, y, r, a1, a2) {
								var flag = (a2 - a1) > 180,
									clr = (a2 - a1) / 360;
								a1 = (a1 % 360) * Math.PI / 180;
								a2 = (a2 % 360) * Math.PI / 180;
								return {
									path: [["M", x, y], ["l", r * Math.cos(a1), r * Math.sin(a1)], ["A", r, r, 0, +flag, 1, x + r * Math.cos(a2), y + r * Math.sin(a2)], ["z"]],
									fill: "hsb(" + clr + ", .75, .8)"
								};
							};

							function animate(ms) {
								var start = 0,
									val;
								for (i = 0; i < ii; i++) {
									val = 360 / total * data[i];
									paths[i].animate({segment: [200, 200, 150, start, start += val]}, ms || 1500, "bounce");
									paths[i].angle = start - val / 2;
								}
							}

							var data = [24, 92, 24, 52, 78, 99, 82, 27],
								paths = ras.set(),
								total,
								start,
								bg = ras.circle(200, 200, 0).attr({stroke: "#fff", "stroke-width": 4});
							data = data.sort(function (a, b) { return b - a;});

							total = 0;
							for (var i = 0, ii = data.length; i < ii; i++) {
								total += data[i];
							}
							start = 0;
							for (i = 0; i < ii; i++) {
								var val = 360 / total * data[i];
								(function (i, val) {
									paths.push(ras.path().attr({segment: [200, 200, 1, start, start + val], stroke: "#fff"}).click(function () {
										total += data[i];
										data[i] *= 2;
										animate();
									}));
								})(i, val);
								start += val;
							}
							bg.animate({r: 151}, 1000, "bounce");
							animate(1000);
							var ras = ras.text(200, 20, "Click on segments to make them bigger.").attr({fill: "#fff", "font-size": 16});

							/*--------------------------------------------------------------------------------*/

							var ra = Raphael("raphaelHolder"),
								discattr = {fill: "#fff", stroke: "none"};
							ra.text(310, 20, "Drag the points to change the curves").attr({fill: "#fff", "font-size": 16});
							function curve(x, y, ax, ay, bx, by, zx, zy, color) {
								var path = [["M", x, y], ["C", ax, ay, bx, by, zx, zy]],
									path2 = [["M", x, y], ["L", ax, ay], ["M", bx, by], ["L", zx, zy]],
									curve = ra.path(path).attr({stroke: color || Raphael.getColor(), "stroke-width": 4, "stroke-linecap": "round"}),
									controls = ra.set(
										ra.path(path2).attr({stroke: "#ccc", "stroke-dasharray": ". "}),
										ra.circle(x, y, 5).attr(discattr),
										ra.circle(ax, ay, 5).attr(discattr),
										ra.circle(bx, by, 5).attr(discattr),
										ra.circle(zx, zy, 5).attr(discattr)
									);
								controls[1].update = function (x, y) {
									var X = this.attr("cx") + x,
										Y = this.attr("cy") + y;
									this.attr({cx: X, cy: Y});
									path[0][1] = X;
									path[0][2] = Y;
									path2[0][1] = X;
									path2[0][2] = Y;
									controls[2].update(x, y);
								};
								controls[2].update = function (x, y) {
									var X = this.attr("cx") + x,
										Y = this.attr("cy") + y;
									this.attr({cx: X, cy: Y});
									path[1][1] = X;
									path[1][2] = Y;
									path2[1][1] = X;
									path2[1][2] = Y;
									curve.attr({path: path});
									controls[0].attr({path: path2});
								};
								controls[3].update = function (x, y) {
									var X = this.attr("cx") + x,
										Y = this.attr("cy") + y;
									this.attr({cx: X, cy: Y});
									path[1][3] = X;
									path[1][4] = Y;
									path2[2][1] = X;
									path2[2][2] = Y;
									curve.attr({path: path});
									controls[0].attr({path: path2});
								};
								controls[4].update = function (x, y) {
									var X = this.attr("cx") + x,
										Y = this.attr("cy") + y;
									this.attr({cx: X, cy: Y});
									path[1][5] = X;
									path[1][6] = Y;
									path2[3][1] = X;
									path2[3][2] = Y;
									controls[3].update(x, y);
								};
								controls.drag(move, up);
							}
							function move(dx, dy) {
								this.update(dx - (this.dx || 0), dy - (this.dy || 0));
								this.dx = dx;
								this.dy = dy;
							}
							function up() {
								this.dx = this.dy = 0;
							}
							curve(70, 100, 110, 100, 130, 200, 170, 200, "hsb(0, .75, .75)");
							curve(170, 100, 210, 100, 230, 200, 270, 200, "hsb(.8, .75, .75)");
							curve(270, 100, 310, 100, 330, 200, 370, 200, "hsb(.3, .75, .75)");
							curve(370, 100, 410, 100, 430, 200, 470, 200, "hsb(.6, .75, .75)");
							curve(470, 100, 510, 100, 530, 200, 570, 200, "hsb(.1, .75, .75)");

							/*--------------------------------------------------------------------------------*/

							const r = Raphael("raphaelHolder1", 800, 600);
							const targets = r.set();
							targets.push(r.circle(300, 100, 20),
								r.circle(300, 150, 20),
								r.circle(300, 200, 20),
								r.circle(300, 250, 20),
								r.circle(300, 300, 20),
								r.circle(300, 350, 20),
								r.circle(300, 400, 20),
								r.circle(300, 450, 20));
							targets.attr({fill: "#000", stroke: "#fff", "stroke-dasharray": "- ", opacity: .2});
							var labels = r.set();
							labels.push(r.text(330, 100, "linear (default)"),
								r.text(330, 150, ">"),
								r.text(330, 200, "<"),
								r.text(330, 250, "<>"),
								r.text(330, 300, "bounce"),
								r.text(330, 350, "elastic"),
								r.text(330, 400, "backIn"),
								r.text(330, 450, "backOut"));
							labels.attr({font: "12px Fontin-Sans, Arial", fill: "#fff", "text-anchor": "start"});
							var movers = r.set();
							movers.push(r.circle(100, 100, 20),
								r.circle(100, 150, 20),
								r.circle(100, 200, 20),
								r.circle(100, 250, 20),
								r.circle(100, 300, 20),
								r.circle(100, 350, 20),
								r.circle(100, 400, 20),
								r.circle(100, 450, 20));
							movers.attr({fill: "#000", stroke: "#fff", "fill-opacity": 0});
							movers[0].click(function () {
								this.cx = this.cx || 300;
								this.animate({cx: this.cx, "stroke-width": this.cx / 100, fill: this.cx - 100 ? "hsb(0, .75, .75)" : "#000", "fill-opacity": +!!(this.cx - 100)}, 1000);
								this.cx = this.cx === 300 ? 100 : 300;
							});
							movers[1].click(function () {
								this.cx = this.cx || 300;
								this.animate({cx: this.cx, "stroke-width": this.cx / 100, fill: this.cx - 100 ? "hsb(.1, .75, .75)" : "#000", "fill-opacity": +!!(this.cx - 100)}, 1000, ">");
								this.cx = this.cx === 300 ? 100 : 300;
							});
							movers[2].click(function () {
								this.cx = this.cx || 300;
								this.animate({cx: this.cx, "stroke-width": this.cx / 100, fill: this.cx - 100 ? "hsb(.2, .75, .75)" : "#000", "fill-opacity": +!!(this.cx - 100)}, 1000, "<");
								this.cx = this.cx === 300 ? 100 : 300;
							});
							movers[3].click(function () {
								this.cx = this.cx || 300;
								this.animate({cx: this.cx, "stroke-width": this.cx / 100, fill: this.cx - 100 ? "hsb(.3, .75, .75)" : "#000", "fill-opacity": +!!(this.cx - 100)}, 1000, "<>");
								this.cx = this.cx === 300 ? 100 : 300;
							});
							movers[4].click(function () {
								this.cx = this.cx || 300;
								this.animate({cx: this.cx, "stroke-width": this.cx / 100, fill: this.cx - 100 ? "hsb(.4, .75, .75)" : "#000", "fill-opacity": +!!(this.cx - 100)}, 1000, "bounce");
								this.cx = this.cx === 300 ? 100 : 300;
							});
							movers[5].click(function () {
								this.cx = this.cx || 300;
								this.animate({cx: this.cx, "stroke-width": this.cx / 100, fill: this.cx - 100 ? "hsb(.5, .75, .75)" : "#000", "fill-opacity": +!!(this.cx - 100)}, 1000, "elastic");
								this.cx = this.cx === 300 ? 100 : 300;
							});
							movers[6].click(function () {
								this.cx = this.cx || 300;
								this.animate({cx: this.cx, "stroke-width": this.cx / 100, fill: this.cx - 100 ? "hsb(.6, .75, .75)" : "#000", "fill-opacity": +!!(this.cx - 100)}, 1000, "backIn");
								this.cx = this.cx === 300 ? 100 : 300;
							});
							movers[7].click(function () {
								this.cx = this.cx || 300;
								this.animate({cx: this.cx, "stroke-width": this.cx / 100, fill: this.cx - 100 ? "hsb(.7, .75, .75)" : "#000", "fill-opacity": +!!(this.cx - 100)}, 1000, "backOut");
								this.cx = this.cx === 300 ? 100 : 300;
							});
						});
					</script>

					<section class="col-md-12">
						<hr />
					</section>

					<section class="col-md-6">
						<div class="card mb-3">
							<div class="card-body">
								<span class="text-warning">Test encoded BASE64</span>
								<div id="encode"></div>
								<span class="text-warning">Test decoded BASE64</span>
								<div id="decode"></div>
							</div>
						</div>

						<div class="card">
							<div class="card-body">
								<button class="btn btn-info" type="button" onclick="setTestCookie('/restful/simple_ajax');">Set New Cookie</button>
								<button class="btn btn-info" type="button" onclick="readTestCookie('/restful/simple_ajax');">Get Cookie Data</button>
								<button class="btn btn-info" type="button" onclick="removeTestCookie('/restful/simple_ajax');">Remove Cookie Data</button>
								<hr />
								<div id="cookieResult"></div>
							</div>
						</div>
					</section>

					<section class="col-md-6">
						<div class="card">
							<div class="card-body">
								<span class="text-warning">Test encoded MD5</span>
								<div id="cryptomd5"></div>
								<span class="text-warning">Test encoded SHA1</span>
								<div id="cryptosha1"></div>
								<span class="text-warning">Test encoded SHA256</span>
								<div id="cryptosha256"></div>
								<span class="text-warning">Test encoded SHA512</span>
								<div id="cryptosha512"></div>
							</div>
						</div>
					</section>

					<script type="text/javascript">
						function setTestCookie()
						{
							window.Cookies.set('HyperCubeTest', 'Test cookie value from HyperCube', { expires: 1 });
						}

						function readTestCookie()
						{
							var cookie = window.Cookies.get('HyperCubeTest');
							$('#cookieResult').html(cookie);
						}

						function removeTestCookie()
						{
							window.Cookies.remove('HyperCubeTest');
						}

						$(document).ready(function()
						{
							var value = $.base64("encode", "Test");
							$('#encode').html(value);

							var value1 = $.base64("decode", "VGVzdA==");
							$('#decode').html(value1);

							var hash1 = CryptoJS.MD5("Test");
							$('#cryptomd5').html(hash1.toString());

							var hash2 = CryptoJS.SHA1("Test");
							$('#cryptosha1').html(hash2.toString());

							var hash3 = CryptoJS.SHA256("Test");
							$('#cryptosha256').html(hash3.toString());

							var hash4 = CryptoJS.SHA512("Test");
							$('#cryptosha512').html(hash4.toString());
						});
					</script>

					<section class="col-md-12">
						<hr />
					</section>

					<section class="col-md-8">
						<table id="moment-output" class="table table-default">
							<tbody>
							</tbody>
						</table>
					</section>

					<script type="text/javascript">
						$(document).ready(function()
						{
							var m = [];
							m[0] = ["moment()", moment()];
							m[1] = ["moment(moment())", moment(moment())];
							m[2] = ["moment().format()", moment().format()];
							m[3] = ["moment().toString()", moment().toString()];
							m[4] = ["moment('2013-11-16') - moment('2013-11-15')", moment('2013-11-16') - moment('2013-11-15')];
							m[5] = ["moment().endOf('day')", moment().endOf('day')];
							var now = moment('2013-11-22'); //same as finish
							var start = moment('2013-11-10');
							var finish = moment('2013-11-22');
							var event = moment('2013-11-16').endOf('day');
							m[6] = ["event.diff(start)", event.diff(start)];
							m[7] = ["event.diff(finish)", event.diff(finish)];
							m[8] = ["moment().format('YYYY-MM-DD')", moment().format('YYYY-MM-DD')];
							m[9] = ["moment().format('YYYY')", moment().format('YYYY')];
							m[10] = ["moment().format('MM-DD')", moment().format('MM-DD')];

							for(var i = 0; i < m.length; i++) {
								$('#moment-output > tbody:last').append('<tr><td>' + m[i][0] + '</td><td>' + m[i][1] + '</td></tr>');
							}
						});
					</script>

					<section class="col-md-4">
						<div class="card">
							<div class="card-body">
								<div id="slide-menu">
									<ul>
										<li>
											<a href="javascript:void(0);" class="ripple-click-effect"><i
														class="fas fa-newspaper mr-3"></i>MCX-Systems</a>
										</li>
										<li>
											<a href="javascript:void(0);"><i class="fas fa-newspaper mr-3"></i>Artists</a>
											<ul>
												<li>
													<a href="javascript:void(0);"><i class="fas fa-newspaper mr-3"></i>Aerosmith</a>
													<ul>
														<li>
															<a href="javascript:void(0);"><i class="fas fa-newspaper mr-3"></i>Get
																Your Wings</a>
															<ul>
																<li>
																	<a href="javascript:void(0);" class="ripple-click-effect"><i
																				class="fas fa-newspaper mr-3"></i>Same Old Song and
																		Dance</a>
																</li>
																<li>
																	<a href="javascript:void(0);" class="ripple-click-effect"><i
																				class="fas fa-newspaper mr-3"></i>Train Kept
																		A-Rollin'</a>
																</li>
															</ul>
														</li>
													</ul>
												</li>
												<li>
													<a href="javascript:void(0);"><i class="fas fa-newspaper mr-3"></i>Eagles</a>
													<ul>
														<li>
															<a href="javascript:void(0);"><i class="fas fa-newspaper mr-3"></i>Hotel
																California</a>
															<ul>
																<li>
																	<a href="javascript:void(0);" class="ripple-click-effect"><i
																				class="fas fa-newspaper mr-3"></i>Hotel
																		California</a>
																</li>
																<li>
																	<a href="javascript:void(0);" class="ripple-click-effect"><i
																				class="fas fa-newspaper mr-3"></i>Pretty Maids All
																		in a Row</a>
																</li>
															</ul>
														</li>
													</ul>
												</li>
												<li>
													<a href="javascript:void(0);"><i class="fas fa-newspaper mr-3"></i>Led Zeppelin</a>
													<ul>
														<li>
															<a href="javascript:void(0);"><i class="fas fa-newspaper mr-3"></i>Physical
																Graffiti</a>
															<ul>
																<li>
																	<a href="javascript:void(0);" class="ripple-click-effect"><i
																				class="fas fa-newspaper mr-3"></i>Houses of the Holy</a>
																</li>
																<li>
																	<a href="javascript:void(0);" class="ripple-click-effect"><i
																				class="fas fa-newspaper mr-3"></i>In My Time of
																		Dying</a>
																</li>
															</ul>
														</li>
													</ul>
												</li>
											</ul>
										</li>
										<li>
											<a href="javascript:void(0);"><i class="fas fa-newspaper mr-3"></i>Albums</a>
											<ul>
												<li>
													<a href="javascript:void(0);"><i class="fas fa-newspaper mr-3"></i>Get Your
														Wings</a>
													<ul>
														<li>
															<a href="javascript:void(0);" class="ripple-click-effect"><i
																		class="fas fa-newspaper mr-3"></i>Same Old Song and
																Dance</a>
														</li>
														<li>
															<a href="javascript:void(0);" class="ripple-click-effect"><i
																		class="fas fa-newspaper mr-3"></i>Train Kept A-Rollin'</a>
														</li>
													</ul>
												</li>
												<li>
													<a href="javascript:void(0);"><i class="fas fa-newspaper mr-3"></i>Hotel
														California</a>
													<ul>
														<li>
															<a href="javascript:void(0);" class="ripple-click-effect"><i
																		class="fas fa-newspaper mr-3"></i>Hotel California</a>
														</li>
														<li>
															<a href="javascript:void(0);" class="ripple-click-effect"><i
																		class="fas fa-newspaper mr-3"></i>Pretty Maids All in a Row</a>
														</li>
													</ul>
												</li>
												<li>
													<a href="javascript:void(0);"><i class="fas fa-newspaper mr-3"></i>Physical
														Graffiti</a>
													<ul>
														<li>
															<a href="javascript:void(0);" class="ripple-click-effect"><i
																		class="fas fa-newspaper mr-3"></i>Houses of the Holy</a>
														</li>
														<li>
															<a href="javascript:void(0);" class="ripple-click-effect"><i
																		class="fas fa-newspaper mr-3"></i>In My Time of Dying</a>
														</li>
													</ul>
												</li>
											</ul>
										</li>
										<li>
											<a href="javascript:void(0);"><i class="fas fa-newspaper mr-3"></i>Songs</a>
											<ul>
												<li>
													<a href="javascript:void(0);" class="ripple-click-effect"><i
																class="fas fa-newspaper mr-3"></i>Hotel California</a>
												</li>
												<li>
													<a href="javascript:void(0);" class="ripple-click-effect"><i
																class="fas fa-newspaper mr-3"></i>Houses of the Holy</a>
												</li>
												<li>
													<a href="javascript:void(0);" class="ripple-click-effect"><i
																class="fas fa-newspaper mr-3"></i>In My Time of Dying</a>
												</li>
												<li>
													<a href="javascript:void(0);" class="ripple-click-effect"><i
																class="fas fa-newspaper mr-3"></i>Pretty Maids All in a Row</a>
												</li>
												<li>
													<a href="javascript:void(0);" class="ripple-click-effect"><i
																class="fas fa-newspaper mr-3"></i>Same Old Song and Dance</a>
												</li>
												<li>
													<a href="javascript:void(0);" class="ripple-click-effect"><i
																class="fas fa-newspaper mr-3"></i>Train Kept A-Rollin'</a>
												</li>
											</ul>
										</li>
										<li>
											<a href="javascript:void(0);"><i class="fas fa-newspaper mr-3"></i>Genres</a>
											<ul>
												<li>
													<a href="javascript:void(0);"><i class="fas fa-newspaper mr-3"></i>Rock</a>
													<ul>
														<li>
															<a href="javascript:void(0);" class="ripple-click-effect"><i
																		class="fas fa-newspaper mr-3"></i>Hotel California</a>
														</li>
														<li>
															<a href="javascript:void(0);" class="ripple-click-effect"><i
																		class="fas fa-newspaper mr-3"></i>Pretty Maids All in a Row</a>
														</li>
														<li>
															<a href="javascript:void(0);" class="ripple-click-effect"><i
																		class="fas fa-newspaper mr-3"></i>Same Old Song and
																Dance</a>
														</li>
														<li>
															<a href="javascript:void(0);" class="ripple-click-effect"><i
																		class="fas fa-newspaper mr-3"></i>Train Kept A-Rollin'</a>
														</li>
													</ul>
												</li>
												<li>
													<a href="javascript:void(0);"><i class="fas fa-newspaper mr-3"></i>Hard rock</a>
													<ul>
														<li>
															<a href="javascript:void(0);" class="ripple-click-effect"><i
																		class="fas fa-newspaper mr-3"></i>Houses of the Holy</a>
														</li>
														<li>
															<a href="javascript:void(0);" class="ripple-click-effect"><i
																		class="fas fa-newspaper mr-3"></i>In My Time of Dying</a>
														</li>
													</ul>
												</li>
											</ul>
										</li>
										<li>
											<a href="javascript:void(0);"><i class="fas fa-newspaper mr-3"></i>Settings</a>
											<ul>
												<li>
													<a href="javascript:void(0);" class="ripple-click-effect"><i
																class="fas fa-newspaper mr-3"></i>Profile</a>
												</li>
												<li>
													<a href="javascript:void(0);"><i class="fas fa-newspaper mr-3"></i>Player</a>
													<ul>
														<li>
															<a href="javascript:void(0);" class="ripple-click-effect"><i
																		class="fas fa-newspaper mr-3"></i>Equalizer</a>
														</li>
														<li>
															<a href="javascript:void(0);" class="ripple-click-effect"><i
																		class="fas fa-newspaper mr-3"></i>Volume</a>
														</li>
													</ul>
												</li>
											</ul>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</section>

					<section class="col-md-12">
						<hr />
					</section>

					<section class="col-md-12 mb-3">
						<div class="card">
							<div class="card-body">
								<button id="blockButton" type="button" class="btn ripple-click-effect btn-info">
									Block
								</button>
								<button id="blockButton2" type="button" class="btn ripple-click-effect btn-info">
									Block with Message
								</button>
								<button id="blockButton3" type="button" class="btn ripple-click-effect btn-info">
									Block with Message and icon
								</button>
								<button id="blockButton4" type="button" class="btn ripple-click-effect btn-info">
									Block with icon
								</button>
								<button id="unblockButton" type="button" class="btn ripple-click-effect btn-info">
									Unblock
								</button>
							</div>
						</div>
					</section>

					<section class="col-md-12">
						<div class="card blockMe">
							<div class="card-body">
								<a href="#" class="test">Test link - click me!</a>
								<p />
								<select title="">
									<option>Option 1</option>
									<option>Option 2</option>
								</select>
								lorem ipsum dolor sit amet
								consectetuer adipiscing elit
								sed lorem leo
								lorem leo consectetuer adipiscing elit
								sed lorem leo
								rhoncus sit amet
								<select title="">
									<option>Option 1</option>
									<option>Option 2</option>
								</select>

								lorem ipsum dolor sit amet
								consectetuer adipiscing elit
								sed lorem leo
								<a href="#" class="test">Test link - click me!</a>
								lorem leo consectetuer adipiscing elit
								sed lorem leo
								rhoncus sit amet<br />
								<textarea title="" rows="2" cols="20">test textarea</textarea>
							</div>
						</div>
					</section>

					<script type="text/javascript">
						$(document).ready(function()
						{
							$('#blockButton').click(function()
							{
								$('.blockMe').block({ message: null });
							});

							$('#blockButton2').click(function()
							{
								$('.blockMe').block({
									message: '<h1 class="pl-4 pr-4">We are processing your request.<br />Please be patient ...</h1>'
								});
							});

							$('#blockButton3').click(function()
							{
								$('.blockMe').block();
							});

							$('#blockButton4').click(function()
							{
								$('.blockMe').block({
									message: '<div class="p-4">' +
										'<div class="sk-fading-circle">' +
										'<div class="sk-circle1 sk-circle"></div>' +
										'<div class="sk-circle2 sk-circle"></div>' +
										'<div class="sk-circle3 sk-circle"></div>' +
										'<div class="sk-circle4 sk-circle"></div>' +
										'<div class="sk-circle5 sk-circle"></div>' +
										'<div class="sk-circle6 sk-circle"></div>' +
										'<div class="sk-circle7 sk-circle"></div>' +
										'<div class="sk-circle8 sk-circle"></div>' +
										'<div class="sk-circle9 sk-circle"></div>' +
										'<div class="sk-circle10 sk-circle"></div>' +
										'<div class="sk-circle11 sk-circle"></div>' +
										'<div class="sk-circle12 sk-circle"></div>' +
										'</div></div>',
									css: {
										backgroundColor: 'transparent',
										color: 'transparent',
										border: '0'
									}
								});
							});

							$('#unblockButton').click(function()
							{
								$('.blockMe').unblock();
							});
						});
					</script>

					<section class="col-md-12">
						<hr />
					</section>

					<section class="col-md-12">
						<div class="card">
							<div class="card-header">
								<span class="card-title">PNotify notifications</span>
							</div>

							<div class="card-body">
								PNotify is a JavaScript
								<code>notification</code> library, formerly known as Pines Notify. It is designed to provide an unparalleled level of flexibility,
								while still being very easy to implement and use. PNotify supports desktop notifications, modulues, stacks and flexible theming.
								Desktop notifications are based on the
								<code>web notifications</code> draft. If desktop notifications are not available or not allowed, PNotify will fall back to
								isplaying the notice as a regular, in-browser notice.

								<table class="table">
									<tbody>
									<tr>
										<th colspan="3" class="active">Basic notifications</th>
									</tr>
									<tr>
										<td style="width: 20%;">Primary notice</td>
										<td style="width: 20%;">
											<button type="button" class="btn btn-primary btn-sm" id="pnotify-primary">
												Launch
												<i class="fas fa-power-off ml-3"></i>
											</button>
										</td>
										<td>
											Basic pnotify notification. All notification color styles correspond to the Boostrap's
											<code>alert</code> component
										</td>
									</tr>
									<tr>
										<td>Danger notice</td>
										<td>
											<button type="button" class="btn btn-danger btn-sm" id="pnotify-danger">
												Launch
												<i class="fas fa-power-off ml-3"></i>
											</button>
										</td>
										<td>
											Danger notice. To use, add
											<code>type: 'error'</code> to the plugin configuration
										</td>
									</tr>
									<tr>
										<td>Success notice</td>
										<td>
											<button type="button" class="btn btn-success btn-sm" id="pnotify-success">
												Launch
												<i class="fas fa-power-off ml-3"></i>
											</button>
										</td>
										<td>
											Success notice. To use, add
											<code>type: 'success'</code> to the plugin configuration
										</td>
									</tr>
									<tr>
										<td>Info notice</td>
										<td>
											<button type="button" class="btn btn-info btn-sm" id="pnotify-info">
												Launch
												<i class="fas fa-power-off ml-3"></i>
											</button>
										</td>
										<td>
											Info notice. To use, add
											<code>type: 'info'</code> to the plugin configuration
										</td>
									</tr>

									<tr class="border-double">
										<th colspan="3" class="active">Desktop notifications</th>
									</tr>
									<tr>
										<td>Default notice</td>
										<td>
											<button type="button" class="btn btn-primary btn-sm" id="pnotify-desktop-default">
												Launch
												<i class="fas fa-power-off ml-3"></i>
											</button>
										</td>
										<td>The first time you click one of these buttons, you will be asked to grant permission for this site to show notices.
											Then you can click them again to see the desktop notification</td>
									</tr>
									<tr>
										<td>Danger notice</td>
										<td>
											<button type="button" class="btn btn-danger btn-sm" id="pnotify-desktop-danger">
												Launch
												<i class="fas fa-power-off ml-3"></i>
											</button>
										</td>
										<td>Danger desktop notification using a custom contextual icon. If permission denied, this icon will be hidden</td>
									</tr>
									<tr>
										<td>Success notice</td>
										<td>
											<button type="button" class="btn btn-success btn-sm" id="pnotify-desktop-success">
												Launch
												<i class="fas fa-power-off ml-3"></i>
											</button>
										</td>
										<td>Success desktop notification using a custom contextual icon. If permission denied, this icon will be hidden</td>
									</tr>
									<tr>
										<td>Warning notice</td>
										<td>
											<button type="button" class="btn btn-warning btn-sm" id="pnotify-desktop-warning">
												Launch
												<i class="fas fa-power-off ml-3"></i>
											</button>
										</td>
										<td>Warning desktop notification using a custom contextual icon. If permission denied, this icon will be hidden</td>
									</tr>
									<tr>
										<td>Info notice</td>
										<td>
											<button type="button" class="btn btn-info btn-sm" id="pnotify-desktop-info">
												Launch
												<i class="fas fa-power-off ml-3"></i>
											</button>
										</td>
										<td>Info desktop notification using a custom contextual icon. If permission denied, this icon will be hidden</td>
									</tr>

									<tr class="border-double">
										<th colspan="3" class="active">Notification options</th>
									</tr>
									<tr>
										<td>No title</td>
										<td>
											<button type="button" class="btn btn-secondary btn-sm" id="pnotify-no-title">
												Launch
												<i class="fas fa-power-off ml-3"></i>
											</button>
										</td>
										<td>
											Notification without
											<code>title</code>. This is a default option, the title won't be shown if it isn't specified in notification configuration
										</td>
									</tr>
									<tr>
										<td>Rich notice</td>
										<td>
											<button type="button" class="btn btn-secondary btn-sm" id="pnotify-rich">
												Launch
												<i class="fas fa-power-off ml-3"></i>
											</button>
										</td>
										<td>
											By default notification supports
											<code>rich</code> content, including typography components, links, icons, buttons etc
										</td>
									</tr>
									<tr>
										<td>Click to close</td>
										<td>
											<button type="button" class="btn btn-secondary btn-sm" id="pnotify-click">
												Launch
												<i class="fas fa-power-off ml-3"></i>
											</button>
										</td>
										<td>
											Notification can be closed on a
											<code>closer</code> button click or on a notification itself via
											<code>click()</code> event
										</td>
									</tr>
									<tr>
										<td>Sticky notice</td>
										<td>
											<button type="button" class="btn btn-secondary btn-sm" id="pnotify-sticky">
												Launch
												<i class="fas fa-power-off ml-3"></i>
											</button>
										</td>
										<td>
											Sticky notification. To use, add
											<code>hide: false</code> to the notification configuration
										</td>
									</tr>
									<tr>
										<td>No sticky button</td>
										<td>
											<button type="button" class="btn btn-secondary btn-sm" id="pnotify-sticky-buttons">
												Launch
												<i class="fas fa-power-off ml-3"></i>
											</button>
										</td>
										<td>
											Notification with hidden
											<code>sticky</code> button. To use, add
											<code>button.sticker: false</code> to the notification config
										</td>
									</tr>
									<tr>
										<td>Permanent buttons</td>
										<td>
											<button type="button" class="btn btn-secondary btn-sm" id="pnotify-permanent-buttons">
												Launch
												<i class="fas fa-power-off ml-3"></i>
											</button>
										</td>
										<td>
											By default, notification control buttons appear on hover. To make them always visible, add
											<code>buttons.closer_hover: false</code>
										</td>
									</tr>
									<tr>
										<td>Permanotice</td>
										<td>
											<button type="button" class="btn btn-secondary btn-sm" id="pnotify-permanotice">
												Launch
												<i class="fas fa-power-off ml-3"></i>
											</button>
										</td>
										<td>
											To show
											<code>permanent</code> notification, make it sticky and hide control buttons
										</td>
									</tr>

									<tr class="border-double">
										<th colspan="3" class="active">PNotify modules</th>
									</tr>
									<tr>
										<td>Confirmation</td>
										<td>
											<button type="button" class="btn btn-secondary btn-sm" id="pnotify-confirm">
												Launch
												<i class="fas fa-power-off ml-3"></i>
											</button>
										</td>
										<td>
											Confirmation dialog with callbacks. To use, add
											<code>confirm.confirm: true</code> to the notice config
										</td>
									</tr>
									<tr>
										<td>Prompt</td>
										<td>
											<button type="button" class="btn btn-secondary btn-sm" id="pnotify-prompt">
												Launch
												<i class="fas fa-power-off ml-3"></i>
											</button>
										</td>
										<td>
											Prompt dialog with callbacks. To use, add
											<code>confirm.prompt: true</code> to the notice config
										</td>
									</tr>
									<tr>
										<td>Multi line</td>
										<td>
											<button type="button" class="btn btn-secondary btn-sm" id="pnotify-multiline">
												Launch
												<i class="fas fa-power-off ml-3"></i>
											</button>
										</td>
										<td>
											Multi line prompt dialog with textarea. To use, add
											<code>prompt_multi_line: true</code> to the notice config
										</td>
									</tr>
									<tr>
										<td>Custom buttons</td>
										<td>
											<button type="button" class="btn btn-secondary btn-sm" id="pnotify-buttons">
												Launch
												<i class="fas fa-power-off ml-3"></i>
											</button>
										</td>
										<td>
											Notification with
											<code>custom</code> buttons and callbacks
										</td>
									</tr>
									<tr>
										<td>With callbacks</td>
										<td>
											<button type="button" class="btn btn-secondary btn-sm" id="pnotify-callbacks">
												Launch
												<i class="fas fa-power-off ml-3"></i>
											</button>
										</td>
										<td>
											Notification
											<code>callbacks</code>. Available callbacks: before and after
											<code>init</code>, before and after
											<code>open</code>, before and after
											<code>close</code>
										</td>
									</tr>
									<tr>
										<td>Switching notices</td>
										<td>
											<button type="button" class="btn btn-secondary btn-sm" id="pnotify-switching">
												Launch
												<i class="fas fa-power-off ml-3"></i>
											</button>
										</td>
										<td>
											PNotify supports dynamic notification change. Here notifications are switching using
											<code>before_close</code> callback
										</td>
									</tr>
									<tr>
										<td>Progress loader</td>
										<td>
											<button type="button" class="btn btn-secondary btn-sm" id="pnotify-progress">
												Launch
												<i class="fas fa-power-off ml-3"></i>
											</button>
										</td>
										<td>
											Notification with dynamic
											<code>progress</code> bar. Here
											<code>before_open</code> callback is used
										</td>
									</tr>
									<tr>
										<td>Dynamic loader</td>
										<td>
											<button type="button" class="btn btn-secondary btn-sm" id="pnotify-dynamic">
												Launch
												<i class="fas fa-power-off ml-3"></i>
											</button>
										</td>
										<td>
											Notification with
											<code>dynamic</code> content. The content changes in a given time interval using
											<code>update()</code> function
										</td>
									</tr>
									</tbody>
								</table>
							</div>
						</div>
					</section>

					<section class="col-md-12">
						<hr />
					</section>

					<section class="col-md-12">
						<div class="card">
							<div class="card-body">
								<h5>Animated Notifications</h5>
								<div>Animated notifications with various styles</div>
								<div class="mb-3">
									<button class="btn btn-outline-warning notify_fromtop mr-2">
										From the top!
									</button>
									<button class="btn btn-outline-info notify_zoom mr-2">
										Zoom
									</button>
									<button class="btn btn-outline-danger notify_zippy mr-2">
										Zippy
									</button>
									<button class="btn btn-outline-success notify_off_handle mr-2">
										Off the Handle
									</button>
									<button class="btn btn-outline-info notify_cards">
										Shuffling Cards
									</button>
								</div>

								<h5>Attention Seekers</h5>
								<div>Notifications with different animated styles</div>
								<div class="mb-3">
									<button class="btn btn-success notify_bounce mr-2">
										Bounce
									</button>
									<button class="btn btn-warning notify_flash mr-2">
										Flash
									</button>
									<button class="btn btn-info notify_pulse mr-2">
										Pulse
									</button>
									<button class="btn btn-danger notify_rubberband mr-2">
										Rubber Band
									</button>
									<button class="btn btn-success notify_shake mr-2">
										Shake
									</button>
									<button class="btn btn-warning notify_swing mr-2">
										Swing
									</button>
									<button class="btn btn-info notify_tada mr-2">
										Tada
									</button>
									<button class="btn btn-danger notify_wobble mr-2">
										Wobble
									</button>
									<button class="btn btn-success notify_jello">
										Jello
									</button>
								</div>
							</div>
						</div>
					</section>

					<script type="text/javascript">
						$(document).ready(function ()
						{
							$("#pnotify-primary").on("click",
								function()
								{
									const pNotify = new PNotify({
										title: "Primary notice",
										text: "Check me out! I'm a notice.",
										icon: "fas fa-flag"
									});
								});

							// Danger notification
							$("#pnotify-danger").on("click",
								function()
								{
									const pNotify = new PNotify({
										title: "Danger notice",
										text: "Check me out! I'm a notice.",
										icon: "fas fa-exclamation-triangle",
										type: "error"
									});
								});

							// Success notification
							$("#pnotify-success").on("click",
								function()
								{
									const pNotify = new PNotify({
										title: "Success notice",
										text: "Check me out! I'm a notice.",
										icon: "fas fa-check-circle",
										type: "success"
									});
								});

							// Info notification
							$("#pnotify-info").on("click",
								function()
								{
									const pNotify = new PNotify({
										title: "Info notice",
										text: "Check me out! I'm a notice.",
										icon: "fas fa-info-circle",
										type: "info"
									});
								});

							// Desktop notifications
							// ------------------------------

							// Default
							$("#pnotify-desktop-default").on("click",
								function()
								{
									PNotify.desktop.permission();
									(new PNotify({
											title: "Default Desktop Notice",
											text: "If you've given me permission, I'll appear as a desktop notification.",
											desktop: {
												desktop: true,
												addclass: "bg-success",
												fallback: true,
												icon: global_base_url + "assets/images/pnotify/default.png"
											}
										})
									).get().click(function(e)
									{
										if ($(".ui-pnotify-closer, .ui-pnotify-sticker, .ui-pnotify-closer *, .ui-pnotify-sticker *").is(e.target))
										{
											return;
										}
										alert("Hey! You clicked the desktop notification!");
									});
								});

							// Danger
							$("#pnotify-desktop-danger").on("click",
								function()
								{
									PNotify.desktop.permission();
									(new PNotify({
											title: "Danger Desktop Notice",
											type: "danger",
											text: "I'm a danger desktop notification, if you have given me a permission.",
											desktop: {
												desktop: true,
												fallback: true,
												icon: global_base_url + "assets/images/pnotify/danger.png"
											}
										})
									).get().click(function(e)
									{
										if ($(".ui-pnotify-closer, .ui-pnotify-sticker, .ui-pnotify-closer *, .ui-pnotify-sticker *").is(e.target))
										{
											return;
										}
										alert("Hey! You clicked the desktop notification!");
									});
								});

							// Success
							$("#pnotify-desktop-success").on("click",
								function()
								{
									PNotify.desktop.permission();
									(new PNotify({
											title: "Success Desktop Notice",
											type: "success",
											text: "I'm a success desktop notification, if you have given me a permission.",
											desktop: {
												desktop: true,
												fallback: true,
												icon: global_base_url + "assets/images/pnotify/success.png"
											}
										})
									).get().click(function(e)
									{
										if ($(".ui-pnotify-closer, .ui-pnotify-sticker, .ui-pnotify-closer *, .ui-pnotify-sticker *").is(e.target))
										{
											return;
										}
										alert("Hey! You clicked the desktop notification!");
									});
								});

							// Warning
							$("#pnotify-desktop-warning").on("click",
								function()
								{
									PNotify.desktop.permission();
									(new PNotify({
											title: "Warning Desktop Notice",
											type: "warning",
											text: "I'm a warning desktop notification, if you have given me a permission.",
											desktop: {
												desktop: true,
												fallback: true,
												icon: global_base_url + "assets/images/pnotify/warning.png"
											}
										})
									).get().click(function(e)
									{
										if ($(".ui-pnotify-closer, .ui-pnotify-sticker, .ui-pnotify-closer *, .ui-pnotify-sticker *").is(e.target))
										{
											return;
										}
										alert("Hey! You clicked the desktop notification!");
									});
								});

							// Info
							$("#pnotify-desktop-info").on("click",
								function()
								{
									PNotify.desktop.permission();
									(new PNotify({
											title: "Info Desktop Notice",
											type: "info",
											text: "I'm an info desktop notification, if you have given me a permission.",
											desktop: {
												desktop: true,
												fallback: true,
												icon: global_base_url + "assets/images/pnotify/info.png"
											}
										})
									).get().click(function(e)
									{
										if ($(".ui-pnotify-closer, .ui-pnotify-sticker, .ui-pnotify-closer *, .ui-pnotify-sticker *").is(e.target))
										{
											return;
										}
										alert("Hey! You clicked the desktop notification!");
									});
								});

							// Options
							// ------------------------------

							// No title
							$("#pnotify-no-title").on("click",
								function()
								{
									const pNotify = new PNotify({
										text: "Check me out! I'm a notice without title."
									});
								});

							// Rich content
							$("#pnotify-rich").on("click",
								function()
								{
									const pNotify = new PNotify({
										title: "Rich content notice",
										text: 'Look at my beautiful <strong>strong</strong>, <a href="#" class="alert-link">linked</a>, <em>emphasized</em>, and <u>underlined</u> text with <i class="icon-make-group"></i> icon.',
										icon: "fas fa-info-circle"
									});
								});

							// Close on click
							$("#pnotify-click").on("click",
								function()
								{
									var notice = new PNotify({
										title: "Close on click",
										text: "Click me anywhere to dismiss me.",
										hide: false,
										buttons: {
											closer: false,
											sticker: false
										}
									});
									notice.get().click(function()
									{
										notice.remove();
									});
								});

							// Sticky notice
							$("#pnotify-sticky").on("click",
								function()
								{
									const pNotify = new PNotify({
										title: "Sticky notice",
										text: "Check me out! I'm a sticky notice. You'll have to close me yourself.",
										hide: false
									});
								});

							// Sticky buttons
							$("#pnotify-sticky-buttons").on("click",
								function()
								{
									const pNotify = new PNotify({
										title: "No sticky button notice",
										text: "I'm a sticky notice with no unsticky button. You'll have to close me yourself.",
										hide: false,
										buttons: {
											sticker: false
										}
									});
								});

							// Permanent buttons
							$("#pnotify-permanent-buttons").on("click",
								function()
								{
									const pNotify = new PNotify({
										title: "Permanent buttons notice",
										text: "My buttons are really lonely, so they're gonna hang out with us.",
										buttons: {
											closer_hover: false,
											sticker_hover: false
										}
									});
								});

							// Permanotice
							$("#pnotify-permanotice").on("click",
								function()
								{
									var permanotice;
									if (permanotice)
									{
										permanotice.open();
									}
									else
									{
										permanotice = new PNotify({
											title: "Now look here",
											text: "There's something you need to know, and I won't go away until you come to grips with it.",
											hide: false,
											buttons: {
												closer: false,
												sticker: false
											}
										});
									}
								});

							// Modules
							// ------------------------------

							// Confirm
							$("#pnotify-confirm").on("click",
								function()
								{
									// Setup
									const notice = new PNotify({
										title: "Confirmation",
										text: "<p>Are you sure you want to discard changes?</p>",
										hide: false,
										confirm: {
											confirm: true,
											buttons: [
												{
													text: "Yes",
													addClass: "btn btn-sm btn-primary"
												},
												{
													addClass: "btn btn-sm btn-danger"
												}
											]
										},
										buttons: {
											closer: false,
											sticker: false
										},
										history: {
											history: false
										}
									});

									// On confirm
									notice.get().on("pnotify.confirm",
										function()
										{
											alert("Ok, cool.");
										});

									// On cancel
									notice.get().on("pnotify.cancel",
										function()
										{
											alert("Oh ok. Chicken, I see.");
										});
								});

							// Prompt
							$("#pnotify-prompt").on("click",
								function()
								{
									// Setup
									const notice = new PNotify({
										title: "Input needed",
										text: "What side would you like?",
										hide: false,
										confirm: {
											prompt: true,
											buttons: [
												{
													text: "Yes",
													addClass: "btn btn-sm btn-primary"
												},
												{
													addClass: "btn btn-sm btn-danger"
												}
											]
										},
										buttons: {
											closer: false,
											sticker: false
										},
										history: {
											history: false
										}
									});

									// On confirm
									notice.get().on("pnotify.confirm",
										function(e, notice, val)
										{
											notice.cancelRemove().update({
												title: "You've chosen a side",
												text: `You want ${$("<div/>").text(val).html()}.`,
												icon: "fas fa-check",
												type: "success",
												delay: 2000,
												hide: true,
												confirm: {
													prompt: false,
													addClass: "btn btn-sm btn-primary"
												},
												buttons: {
													closer: true,
													sticker: true
												}
											});
										});

									// On cancel
									notice.get().on("pnotify.cancel",
										function(e, notice)
										{
											notice.cancelRemove().update({
												title: "You don't want a side",
												text: "No soup for you!",
												icon: "fas fa-ban",
												type: "error",
												delay: 2000,
												hide: true,
												confirm: {
													prompt: false,
													addClass: "btn btn-sm btn-primary"
												},
												buttons: {
													closer: true,
													sticker: true
												}
											});
										});
								});

							// Multiline prompt
							$("#pnotify-multiline").on("click",
								function()
								{
									// Setup
									const notice = new PNotify({
										title: "Input needed",
										text: "Write me a poem, please.",
										hide: false,
										confirm: {
											prompt: true,
											prompt_multi_line: true,
											prompt_default: "Roses are red,\nViolets are blue,\n",
											buttons: [
												{
													text: "Yes",
													addClass: "btn btn-sm btn-primary"
												},
												{
													addClass: "btn btn-sm btn-warning"
												}
											]
										},
										buttons: {
											closer: false,
											sticker: false
										},
										history: {
											history: false
										}
									});

									// Confirm
									notice.get().on("pnotify.confirm",
										function(e, notice, val)
										{
											notice.cancelRemove().update({
												title: "Your poem",
												text: $("<div/>").text(val).html(),
												icon: "fas fa-check",
												type: "success",
												hide: true,
												confirm: {
													prompt: false
												},
												buttons: {
													closer: true,
													sticker: true
												}
											});
										});

									// On cancel
									notice.get().on("pnotify.cancel",
										function(e, notice)
										{
											notice.cancelRemove().update({
												title: "You don't like poetry",
												text: "Roses are dead,\nViolets are dead,\nI suck at gardening.",
												icon: "fas fa-ban",
												type: "error",
												hide: true,
												confirm: {
													prompt: false
												},
												buttons: {
													closer: true,
													sticker: true
												}
											});
										});
								});

							// Custom buttons
							$("#pnotify-buttons").on("click",
								function()
								{
									const pNotify = new PNotify({
										title: "Choose a side",
										text: "You have three options to choose from.",
										hide: false,
										confirm: {
											confirm: true,
											buttons: [
												{
													text: "Fries",
													addClass: "btn btn-sm btn-primary",
													click: function(notice)
													{
														notice.update({
															title: "You've chosen a side",
															text: "You want fries.",
															icon: "fas fa-check",
															type: "success",
															hide: true,
															confirm: {
																confirm: false
															},
															buttons: {
																closer: true,
																sticker: true
															}
														});
													}
												},
												{
													text: "Mashed Potatoes",
													addClass: "btn btn-sm btn-danger",
													click: function(notice)
													{
														notice.update({
															title: "You've chosen a side",
															text: "You want mashed potatoes.",
															icon: "fas fa-check",
															type: "info",
															hide: true,
															confirm: {
																confirm: false
															},
															buttons: {
																closer: true,
																sticker: true
															}
														});
													}
												},
												{
													text: "Fruit",
													addClass: "btn btn-sm btn-success",
													click: function(notice)
													{
														notice.update({
															title: "You've chosen a side",
															text: "You want fruit.",
															icon: "fas fa-check",
															type: "info",
															hide: true,
															confirm: {
																confirm: false
															},
															buttons: {
																closer: true,
																sticker: true
															}
														});
													}
												}
											]
										},
										buttons: {
											closer: false,
											sticker: false
										},
										history: {
											history: false
										}
									});
								});

							// Callbacks
							$("#pnotify-callbacks").on("click",
								function()
								{
									var dontAlert = function() {};
									new PNotify({
										title: "I'm here",
										text: "I have a callback for each of my events. I'll call all my callbacks while I change states.",
										before_init: function(opts)
										{
											dontAlert("I'm called before the notice initializes. I'm passed the options used to make the notice. I can modify them. Watch me replace the word callback with tire iron!");
											opts.text = opts.text.replace(/callback/g, "tire iron");
										},
										after_init: function(PNotify)
										{
											dontAlert(`I'm called after the notice initializes. I'm passed the PNotify object for the current notice: ${PNotify}\n\nThere are more callbacks you can assign, but this is the last notice you'll see. Check the code to see them all.`);
										},
										before_open: function(PNotify)
										{
											const sourceNote = "Return false to cancel opening.";
											dontAlert(`I'm called before the notice opens. I'm passed the PNotify object for the current notice: ${PNotify}`);
										},
										after_open: function(PNotify)
										{
											alert(`I'm called after the notice opens. I'm passed the PNotify object for the current notice: ${PNotify}`);
										},
										before_close: function(PNotify, timerHide)
										{
											const sourceNote = "Return false to cancel close. Use PNotify.queueRemove() to set the removal timer again.";
											dontAlert(`I'm called before the notice closes. I'm passed the PNotify object for the current notice: ${PNotify}`);
											dontAlert(`I also have an argument called timer_hide, which is true if the notice was closed because the timer ran down. Value: ${timerHide}`);
										},
										after_close: function(PNotify, timerHide)
										{
											alert(`I'm called after the notice closes. I'm passed the PNotify object for the current notice: ${PNotify}`);
											dontAlert(`I also have an argument called timer_hide, which is true if the notice was closed because the timer ran down. Value: ${timerHide}`);
										}
									});
								});

							// Switching notices
							$("#pnotify-switching").on("click",
								function()
								{
									new PNotify({
										title: "Notice",
										text: "Right now I'm a notice.",
										addclass: "alert bg-primary alert-styled-right",
										icon: false,
										before_close: function(PNotify)
										{
											PNotify.update({
												title: "Error",
												text: "Uh oh. Now I've become an error.",
												addclass: "alert bg-danger alert-styled-right",
												type: "error",
												icon: false,
												before_close: function(PNotify)
												{
													PNotify.update({
														title: "Success",
														text: "I fixed the error!",
														addclass: "alert bg-success alert-styled-right",
														type: "success",
														icon: false,
														before_close: function(PNotify)
														{
															PNotify.update({
																title: "Info",
																text: "Everything's cool now.",
																addclass: "alert bg-info alert-styled-right",
																type: "info",
																icon: false,
																before_close: null
															});
															PNotify.queueRemove();
															return false;
														}
													});
													PNotify.queueRemove();
													return false;
												}
											});
											PNotify.queueRemove();
											return false;
										}
									});
								});

							// Progress loader
							$("#pnotify-progress").on("click",
								function()
								{
									var curValue = 1,
										progress;

									// Make a loader.
									var loader = new PNotify({
										title: "Creating series of tubes",
										text: '<div class="progress progress-striped active" style="margin:0">\
            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0">\
            <span class="sr-only">0%</span>\
            </div>\
            </div>',
										icon: "fas fa-spinner fa-spin",
										hide: false,
										buttons: {
											closer: false,
											sticker: false
										},
										history: {
											history: false
										},
										before_open: function(PNotify)
										{
											progress = PNotify.get().find("div.progress-bar");
											progress.width(curValue + "%").attr("aria-valuenow", curValue).find("span").html(curValue + "%");

											// Pretend to do something.
											var timer = setInterval(function()
												{
													if (curValue >= 100)
													{
														// Remove the interval.
														window.clearInterval(timer);
														loader.remove();
														return;
													}
													curValue += 1;
													progress.width(curValue + "%").attr("aria-valuenow", curValue).find("span").html(curValue + "%");
												},
												65);
										}
									});
								});

							// Dynamic loader
							$("#pnotify-dynamic").on("click",
								function()
								{
									var percent = 0;
									var notice = new PNotify({
										text: "Please wait",
										type: "info",
										icon: "fas fa-spinner fa-spin",
										hide: false,
										buttons: {
											closer: false,
											sticker: false
										},
										opacity: .9,
										width: "170px"
									});

									setTimeout(function()
										{
											notice.update({
												title: false
											});
											var interval = setInterval(function()
												{
													percent += 2;
													const options = {
														text: percent + "% complete."
													};
													if (percent === 80)
													{
														options.title = "Almost There";
													}
													if (percent >= 100)
													{
														window.clearInterval(interval);
														options.title = "Done!";
														options.type = "success";
														options.hide = true;
														options.buttons = {
															closer: true,
															sticker: true
														};
														options.icon = "fas fa-check";
														options.opacity = 1;
														options.width = PNotify.prototype.options.width;
													}
													notice.update(options);
												},
												120);
										},
										2000);
								});

							// Animated notifications
							$(".notify_fromtop").on("click",
								function()
								{
									const pNotify = new PNotify({
										title: "From the top! Effect",
										text: "I use effects from Animate.css. Such smooth CSS3 transitions make me feel like better.",
										animate: {
											animate: true,
											in_class: "slideInDown",
											out_class: "slideOutUp"
										}
									});
									return false;
								});

							$(".notify_zoom").on("click",
								function()
								{
									const pNotify = new PNotify({
										title: "Zoom Effect",
										text: "I use effects from Animate.css. Such smooth CSS3 transitions make me feel like better.",
										type: "info",
										animate: {
											animate: true,
											in_class: "zoomInLeft",
											out_class: "zoomOutRight"
										}
									});
									return false;
								});

							$(".notify_zippy").on("click",
								function()
								{
									const pNotify = new PNotify({
										title: "Zippy Effect",
										text: "I use effects from Animate.css. Such smooth CSS3 transitions make me feel like better.",
										type: "error",
										animate: {
											animate: true,
											in_class: "bounceInLeft",
											out_class: "bounceOutRight"
										}
									});
									return false;
								});

							$(".notify_off_handle").on("click",
								function()
								{
									const pNotify = new PNotify({
										title: "Off the handle Effect",
										text: "I use effects from Animate.css. Such smooth CSS3 transitions make me feel like better.",
										type: "success",
										animate: {
											animate: true,
											in_class: "bounceInDown",
											out_class: "hinge"
										}
									});
									return false;
								});

							$(".notify_cards").on("click",
								function()
								{
									const pNotify = new PNotify({
										title: "Shuffling cards Effect",
										text: "I use effects from Animate.css. Such smooth CSS3 transitions make me feel like better.",
										type: "info",
										animate: {
											animate: true,
											in_class: "rotateInDownLeft",
											out_class: "rotateOutUpRight"
										}
									});
									return false;
								});
							// End of animated notifications

							// Attension seekers
							$(".notify_bounce").on("click",
								function()
								{
									const pNotify = new PNotify({
										title: "Attention Seeker",
										text: "Click the button to see how you can highlight the notice with the Animate module:&lt;br&gt;",
										type: "success",
										after_init: function(notice)
										{
											notice.attention("bounce");
										}
									});
									return false;
								});

							$(".notify_flash").on("click",
								function()
								{
									const pNotify = new PNotify({
										title: "Attention Seeker",
										text: "Click the button to see how you can highlight the notice with the Animate module:&lt;br&gt;",
										type: "error",
										after_init: function(notice)
										{
											notice.attention("flash");
										}
									});
									return false;
								});

							$(".notify_pulse").on("click",
								function()
								{
									const pNotify = new PNotify({
										title: "Attention Seeker",
										text: "Click the button to see how you can highlight the notice with the Animate module:&lt;br&gt;",
										type: "info",
										after_init: function(notice)
										{
											notice.attention("pulse");
										}
									});
									return false;
								});

							$(".notify_rubberband").on("click",
								function()
								{
									const pNotify = new PNotify({
										title: "Attention Seeker",
										text: "Click the button to see how you can highlight the notice with the Animate module:&lt;br&gt;",
										type: "error",
										after_init: function(notice)
										{
											notice.attention("rubberBand");
										}
									});
									return false;
								});

							$(".notify_shake").on("click",
								function()
								{
									const pNotify = new PNotify({
										title: "Attention Seeker",
										text: "Click the button to see how you can highlight the notice with the Animate module:&lt;br&gt;",
										type: "success",
										after_init: function(notice)
										{
											notice.attention("shake");
										}
									});
									return false;
								});

							$(".notify_swing").on("click",
								function()
								{
									const pNotify = new PNotify({
										title: "Attention Seeker",
										text: "Click the button to see how you can highlight the notice with the Animate module:&lt;br&gt;",
										after_init: function(notice)
										{
											notice.attention("swing");
										}
									});
									return false;
								});

							$(".notify_tada").on("click",
								function()
								{
									const pNotify = new PNotify({
										title: "Attention Seeker",
										text: "Click the button to see how you can highlight the notice with the Animate module:&lt;br&gt;",
										type: "info",
										after_init: function(notice)
										{
											notice.attention("tada");
										}
									});
									return false;
								});

							$(".notify_wobble").on("click",
								function()
								{
									const pNotify = new PNotify({
										title: "Attention Seeker",
										text: "Click the button to see how you can highlight the notice with the Animate module:&lt;br&gt;",
										type: "error",
										after_init: function(notice)
										{
											notice.attention("wobble");
										}
									});
									return false;
								});

							$(".notify_jello").on("click",
								function()
								{
									const pNotify = new PNotify({
										title: "Attention Seeker",
										text: "Click the button to see how you can highlight the notice with the Animate module:&lt;br&gt;",
										type: "success",
										after_init: function(notice)
										{
											notice.attention("jello");
										}
									});
									return false;
								});
							//End of  Attension seekers
						});
					</script>

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

<div class="wizard" id="satellite-wizard" data-title="Create Server">
	<!-- Step 1 Name & FQDN -->
	<div class="wizard-card wizard-card-overlay" data-cardname="name">
		<h3>Name & FQDN</h3>

		<div class="wizard-input-section">
			<div class="form-group">
				<input type="text" class="form-control" id="label" name="label" placeholder="Server label"
				       data-validate="validateServerLabel" />
			</div>

			<p>Full Qualified Domain Name</p>

			<div class="form-group">
				<div class="input-group">
					<input type="text" class="form-control" id="fqdn" name="fqdn" placeholder="FQDN"
					       data-validate="validateFQDN" data-is-valid="0" data-lookup="0" />
					<span class="input-group-btn" id="btn-fqdn">
						<button class="btn btn-info" type="button" onclick='lookup();'>Lookup</button>
					</span>
				</div>
			</div>

			<p>Server IP Address</p>

			<div class="form-group">
				<input type="text" class="form-control" id="ip" name="ip" placeholder="IP" data-serialize="1" />
			</div>
		</div>
	</div>

	<div class="wizard-card wizard-card-overlay" data-cardname="group">
		<h3>Server Group</h3>

		<div class="wizard-input-section">
			<p>
				Where would you like server <strong class="create-server-name"></strong>
				to go? </p>
			<img src="#" data-src="holder.js/100px150?theme=lava" class="wizard-group-list" />
		</div>
	</div>

	<div class="wizard-card wizard-card-overlay" data-cardname="services">
		<h3>Service Selection</h3>

		<div class="wizard-input-section">
			<p>
				Please choose the services you'd like Panopta to
				monitor. Any service you select will be given a default
				check frequency of 1 minute. </p>

			<select name="services" data-placeholder="Service List" class="create-server-service-list form-control"
			        multiple title="">
				<option value=""></option>
				<optgroup label="Basic">
					<option selected value="icmp.ping">Ping</option>
					<option selected value="tcp.ssh">SSH</option>
					<option value="tcp.ftp">FTP</option>
				</optgroup>

				<optgroup label="Web">
					<option selected value="tcp.http">HTTP</option>
					<option value="tcp.https">HTTP (Secure)</option>
					<option value="tcp.dns">DNS</option>
				</optgroup>

				<optgroup label="Email">
					<option value="tcp.pop">POP</option>
					<option value="tcp.imap">IMAP</option>
					<option value="tcp.smtp">SMTP</option>
					<option value="tcp.pops">POP (Secure)</option>
					<option value="tcp.imaps">IMAP (Secure)</option>
					<option value="tcp.smtps">SMTP (Secure)</option>
					<option value="tcp.http.exchange">Microsoft Exchange</option>
				</optgroup>

				<optgroup label="Databases">
					<option value="tcp.mysql">MySQL</option>
					<option value="tcp.postgres">PostgreSQL</option>
					<option value="tcp.mssql">Microsoft SQL Server</option>
				</optgroup>
			</select>
		</div>
	</div>

	<div class="wizard-card wizard-card-overlay" data-cardname="location">
		<h3>Monitoring Location</h3>

		<div class="wizard-input-section">
			<p>
				We determined <strong>Chicago</strong> to be
				the closest location to monitor
				<strong class="create-server-name"></strong>
				If you would like to change this, or you think this is
				incorrect, please select a different
				monitoring location. </p>

			<select name="location" data-placeholder="Monitor Nodes" class="form-control" title="">
				<option value=""></option>
				<optgroup label="North America">
					<option>Atlanta</option>
					<option selected>Chicago</option>
					<option>Dallas</option>
					<option>Denver</option>
					<option>Fremont, CA</option>
					<option>Los Angeles</option>
					<option>Miami</option>
					<option>Newark, NJ</option>
					<option>Phoenix</option>
					<option>Seattle</option>
					<option>Washington, DC</option>
				</optgroup>

				<optgroup label="Europe">
					<option>Amsterdam, NL</option>
					<option>Berlin</option>
					<option>London</option>
					<option>Milan, Italy</option>
					<option>Nurnberg, Germany</option>
					<option>Paris</option>
					<option>Stockholm</option>
					<option>Vienna</option>
				</optgroup>

				<optgroup label="Asia/Africa">
					<option>Cairo</option>
					<option>Jakarta</option>
					<option>Johannesburg</option>
					<option>Hong Kong</option>
					<option>Singapore</option>
					<option>Sydney</option>
					<option>Tokyo</option>
				</optgroup>
			</select>
		</div>
	</div>

	<div class="wizard-card wizard-card-overlay" data-cardname="schedule">
		<h3>Notification Schedule</h3>

		<div class="wizard-input-section">
			<p>
				Select the notification schedule to be used for outages. </p>

			<select name="notification" class="wizard-ns-select form-control" data-placeholder="Notification Schedule"
			        title="">
				<option value=""></option>
				<option>ALIS Production</option>
				<option>ALIS Development &amp; Staging</option>
				<option>Panopta Development &amp; Staging</option>
				<option>Jira</option>
				<option>QSC Enterprise Production</option>
				<option>QSC Enterprise Development &amp; Staging</option>
				<option>Panopta Production</option>
				<option>Panopta Monitoring Nodes</option>
				<option>Common</option>
			</select>
		</div>
	</div>

	<div class="wizard-card wizard-card-overlay" data-cardname="setup">
		<h3>Agent Setup</h3>

		<div class="wizard-input-section">
			<p>The <a target="_blank" href="http://www.mcx-systems.net/">MCX-Systems Agent</a> allows
				you to monitor local resources (disk usage, cpu usage, etc).
				If you would like to set that up now, please download
				and follow the <a target="_blank" href="http://www.mcx-systems.net">Install instructions.</a>
			</p>

			<div class="btn-group">
				<button type="button" class="btn btn-info dropdown-toggle mb-2" data-toggle="dropdown">Download<span
							class="caret"></span></button>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="javascript:void(0)">.rpm</a>
					<a class="dropdown-item" href="javascript:void(0)">.deb</a>
					<div role="separator" class="dropdown-divider"></div>
					<a class="dropdown-item" href="javascript:void(0)">.tar.gz</a>
				</div>
			</div>

			<p>You will be given a server key after you install the Agent
				on <strong class="create-server-name"></strong>.
				If you know your server key now, please enter it
				below.</p>

			<div class="form-group">
				<input type="text" class="create-server-agent-key form-control" placeholder="Server key (optional)"
				       data-validate="" />
			</div>
		</div>
	</div>

	<!-- begin special status cards below: -->

	<div class="wizard-success">
		<div class="alert alert-success">
			<span class="create-server-name text-warning"></span>Server created <strong class="text-warning">successfully.</strong>
		</div>

		<a class="btn btn-info create-another-server">Create another server</a>
		<span style="padding:0 10px">or</span>
		<a class="btn btn-success im-done">Done</a>
	</div>

	<div class="wizard-error">
		<div class="alert alert-danger">
			<strong>There was a problem</strong> with your submission. Please correct the errors and re-submit.
		</div>
	</div>

	<div class="wizard-failure">
		<div class="alert alert-danger">
			<strong>There was a problem</strong> submitting the form. Please try again in a minute.
		</div>
	</div>
</div>

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