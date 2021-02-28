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
		<img id="left-banner" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMgAAABpCAMAAABIxpznAAAC8VBMVEUAAACgm585X3tee5HQ7/xBZoHQ7/xJa4QwWHVLbYbb8vzc8fovV3XS7/wwWHZIbIZCZ4Le6e////8+ZH9GaoQ/ZIBLbohFaYRBZoFLbYc5YHzZ8fs9Y380XHnU8PxJbIbZ1tE6YHzS8PsvV3U/ZH9dfJI1XXk3Xnr+ay40W3gwWHXp7vAzV3Lm5+g0W3gtVnT+ay3+ekSGlKD8ZCTP7/z+ai06YHza7POIl6L9d0D+bDD+/v7+cDT+dTze3t7+bDD+dDr+eUL+Zif+aiz+bC/+bTD+cjfMy8rQ7/vQ7/vT7/v+bjL9dT3dybrn5+hLboj+///q6+v+aSvy8/NtiZ7opYM8Yn7P7fo+ZH/+bzSVmZ6IkJbw+fzyilw0XHn+cTfO6/nv8fFZeZDV8fz+bTDg9PuRmaD6/f7r7Ozv9vqXlpXn5+ja7vePl51jfY/29/f+aCnS8Pzw9PWYs8MpT22VlZYZRGW4ztjz9/iRkZOPj5CIioycaFbnVhP8UgPv8PDR7/zQ7/ukfXHJ5/JbfpXQ7/uUlJSTk5S2ydTJraXM6/f+YSDP7fvm5+j///8sVnTO7fvP7/z+YiHw7+/M7Pv/YhbS8f7+XhwYVXze/P/V9P//WRMqVHPK/v/Y9//b+f/h///N9f//VQ5BVmzH///t7u3oYSL/SwL/UQjN+P/Q8PzK6vXO8f7N7vxVe5U8ZIEwWHYgSmshVnn0gE6/4OppjqTq///l//+y0d2UXEhHb4tNdZDG5vC01+PU7/rP7vZwlquoythfhZ01XnweR2f2dT95nrMmUHC62uaHq7/5aSx/o7cPO16kxNJCaoYXQmPU8vfp6+zE5OzU49r1///R6OWNscPM9/mbvs7Y9fnnq46Ttsjjs5rq9vrO7fCewdGXucrb0MU2V3AFLlP5Yhjd7/TfvqoLRm/VXy/K3uXplnD5bzT/PgDE1dyISzfR///Z5urLnolEV2yOVEDTZDfUViPWSA+4d1zoc0DDXjKcQyXyQg8FAAAAi3RSTlMABKIH/DrzJx8vGA/7butYTwf2eRJtRQyaGF1Cgr2HZf62kfWNINTIvZQyThn24dWxEA79zs2sNxYJlk9MJP2JNh7a1qVkQ/rTuZ58F/3oetfQxsJa/tzHwFpLQCX+9y2tl3x4cywhq3cg4t5dL/796ueA/EfLz6idmHpe/v7+7t/Z/eje1bisWv72Z/HKBQAAFWxJREFUeNrUmWtMW1UcwMsGTGDTMcZEGFOcblFEE1mGiYmf3ZJNF8PmB1i2kMUtLlm2GfWDMT4TlbtyLtaL9xbuvRAMpRfubbe21D5GX+vDPkEexcpL3CZ7+Iivr/4vpZRiy2iFqb/s3p5zOST89v+fc+75V7JW1OzLzs5NDXZ2U6Hkf0DW6XezsexsTLziRJ9EH+G5+wsk/3myarIRdgdQ9sOS/zwFDdgKeP5fDsmpypPnzp2sLFxOZEc0oxAgm/vEALGJRLAoe/5VkZrjr1ZdAKoOnSy4gwjCaZIkGQLhDEnIZBTJIIIEaBwlihRUNmxKSkPlWrkWnASLGIfKlhchMLc/HDZTNNJbTRQ16NcTnN4f9psYSoYWidTty81OQe6+U5K1oOD4hcUcrFxOBPUNGmYcDofN1C8Ep3RDIzMBctLhUPtcHoaRxUWyduBYKmBtk6wBhScTPMDkxHIiukGV7/xt3qflhKBVKg3PBNhw0KCfcvgmdZRsQST/WHT6yGA+ycQbtOFCEDXgyFpsN2UHLyzhpcLlImJSBWel1qDRFFBHfv7Z4zOQ4aBNKuVnPDomQQTRJIYxNMOyLEkxpBLRLEGRYgJm71sLkXMXllJVU1BTWVlTmCK1BJ/zvN3n7Te61Gq1I2hjwg7Dea3Ppdcp0SIRAte4Ea4ZdOvNer1J41YSJjPHuU0EjlZdpOzcK8fPHbrwNw4dOlhVdfDQyVNJRYw+tUPlvcwZ1EatxejjyUm1S+0IWFnIrEUiTMgSQJTR4rS71LyfV1sZ3mENCyM6QrbKIide2SIV+fRCKg5VJkste9AzPEHSnOAQ54jPwIYdRr1mjFSCR4KI1m7WCLar1ibb+KzgcLrtrnDEvvoidS9K5zmT0uTg6SST3TXjH2IQwdl9c6uWwE75jGMkgRCWKDLmVNsFtWXIbbdIbweMvIU3REaEyBAtQ6spUveKNMaWT6tSmtQtnk25cxER1P4+AkQMrknd0JTDSE66bP0EaIigI/Nr4X5ILbtVL2jH9U3aIWvAE1BFjCMjwpSUWU2RuuMQj7jJQFUqleM5MR7f9oa4ISqxwUGZEhrINMgpldygCRcvPLZH7JkffKzvqk1F9gn8Gb3DJo20Wm2qQcESaXLwHppeLLL+0Qf+wSwHjQTODCT3+OL2k/cu4B0DARlOsoQ4G+ZfUVhGRrAMFgUpKfPcL7x+75RuzD/CoYh/zOSxkuYRk9t6ecrqHtFqwxS1WOSe3U/lZGXokQ9ptYQtyU0Gngu4WptEVC61hQGR6Mti/BOhWAtABKNXwXhV0DWlo2kSx0jwJGkZRRLQI2mKZFkaoYSIlO7c9URmW/mzL0n/zpkUIgYQmaPVZeBIoqenB1sA70mkt5dhnOqoSFhHIRyG4BjCcYRBEzqAUgnNBZH190skebt23pPRqxWEIxkDSVNLf/HzBa7z5ra2tm485tHb3baEnzjP/NDrHpbs7cHjxoRItI+w/bFcKtq9edvG1pINmzPIrnNbkot8kSwg4x//+mWcH9+68U3ttYlubI72tuna2m8SqP3zx19jQ6d/6mxrj47sAUW2r49lqeiisG/hba70qGpj087yJ1WqR9anKwIBWXFExqtuyj9bRIei69aVrzujHp3X5Le6FF1xFIouxcJQRcuN2tqHerLnRk7f+MXrBN5oaGjYseN0vmSBnHUVD+51qYoqmvamu3i9CRFZ4RwhB+o7mpsb4zQ3t3Rdioq0d3/ToWiM/TA+YKEhV3S9fW0URLo7r7Xc+sNxPRh0vJasFPDMk7uKJVmPqcofzWjpTb3+Dswzzj53SdHSmMCCSHf/jQ55XDIJoNJyrR3H2jq/7ej67IfvLra2btwsSUJOU/lW8Nmu2itJj8qXtizlzKdVcQa+EBkYeKi2WtHSnFQEbxuu74CfLUtUpG20VqFoFkWamjbeJ0nC1pKN5RskkmJVedrrVtmzS6hcxEcf8LzR+N6lm3KFvLq5MYlIW0/n11cU0FuBSNvoja6O6sbUIkDhI6rdeUVN9z6YV5onWT2eeN3huH79x7fhf1zUSBaRzumbXY0rEumcqO+SVzcuKwK8sFOl2vnUbljCiu5fNZF7nlKpLn7+5fefgUZSkeHOA41dzSsRaZwevtLVAh7LiwDb1hXdt9v1VOku+4ZVFGlqWk6kfvSAvAuCdWdamuuviLNsBSJA6b0VeZKtOfffFRFAfrP+K3HZXRFyOYxcoch2VUm8s/YiEJPo5FkBINEij9Lxu/q6Wu16TZKaDeVHi++eCNC8Ug3RWV791RzVvx29aLcfvS9/Eafyl5gU56ylSOaAR/2Br2NoRN7fs+fD52O8u2cHqKRPVl1d3am7KCJ6jHa2Ren8iRWhEMLiIOxYfiY1kxeB4wV3T6SjeroTx2LIRBCWAMo9nX69/ci4FBjfdypTkbS9Or56aOHsgsNxKgm5m9I9FFbuIYakwBB2pKZwZTu7okORQEdLmhGJiSA42AMEguZ8JDIWOX229/L4HJd7z5bNy50oS0bNRx8YgfcuLeVKizwjERnOjk1qbV4NgShaKdoQNIEyFCn7kOCgBms2uxH2fPR4lr8/F0tGtpKmaYahupfQNnqtuiUDEYTrTIYZdZNKT+OoH8PFUzx8ZCYCJu/0aMyACX/3ROwLQZRUBOEUDVDtS4FzhTwDERk7ZpjRXmVMCKcjvJuEcpLeGKZRhiKQXJxbDAgkVqzsnwoEJJHsaZ9ubElfhND5fQIzRDMEqRsRZocoWqpXTepIDGUiAjRkayAgsfUOMgsDcALDCCVG4GJLSeBIfERg0CRwJaFESgK6SmhCv2f0QCYilC7i49k+GcF5tUaBt1itFt7Oaz39RIYiBQ9zZvMnmwoXi+CXQ5hybAwLURgVwsfGiF5EMRMTOE1PTFChiRBNhIjQxBjVHwr1YxmK4DqzI6gfYknOa+EFmzMqYslcBP50jWbHoh7EghmxXJ0NWPotHjKi7dca3H2MyWnUciatYPFbBIs+7NTzvNOqNQRsGjYzERnDOmeCFq9TA6V74bY0mlpDbKapBZw4cqwwUYTUGoetPoPGEggZLe6AemR8yOOzzPYbjednvbxTyzv5KbvfrvUb7P6x9sxERJMpIRgU3DQTscFkx1g9P0njy0z2vDscrrLy8yWJIn1erd4T4COaQCSg8fAG7eyQxmLw+FsHpVL447VWj21S0Ap+nVbbp5NlKAL7YR85OBgiUC/Wj+ABLL/4csvvhsPFaSUaTOuQzRbhBYHvt7lsIaNBsPt1VMgT9AqWWd0Ib7SNePgpldesmzDy/X29mYkAMpxmWUaJEAU36BJMqg0xaz3ctu/OSU+E4GxC2Ksd9hv0k62TZoN+0Ogc0hsNNpM1YHd6ndaIzWuZNHJk34RNG2IzFgEQIH4s/4pyz2MVUJbfuqtUUlSxeX0aEUHmQYrjqMsmTskRnImgOJMSd7spiuk3azgOw0wcJ+PESjrH4ekvv1BEaWtPqN7DMp8A/k6ZJMb9OSWHK7ZBoxQC8ugjhyvue2ClIhhOUThBIZxSKiklQeHQR7D0EggRNEUQ8AhuFI4hDPYWlPaGCMf76VE4i/TEokKyVKLJ2U1xjcd2rYtm1Mvbt8J9a1F5xeb4tw0pD5KwrcyHOuGfeMkQjsMtmgIIh4BAH+FQUj/QAiJpmbTU19Z+O9yNAUjJmr1v7FjEww01khhF9oqsaCvncN5Cpf5oVHKreIMrmm2vlRfPNR+Y/4Wad7CkIAK+AOijoiY9bZ1xhi/J0zvBQ/W3q+tW9UOduDjDWas9mLL4kFNS8ci2uem+bl00pR4tWrd3uxia4pI8SenLJc9sKFkH1bvikoryx9cXlRQ9va2kGOyAuoaHk3N+xDPCkbgMw3uGv41TewVqO0lrKsuWUf6i3UxjXAjDADzTaqrRtCPbO2U0bXdrI80UXVptepek2KSuFklDEH4QQvhD/PCTZLSKlNG6rWNtG7Vk3fex64j7PuMmQRD88s6MpejM8MOTzcx8u9PNPH3f75vO+31tOnF5DdwWV+UeUMehiM1JvW50Dwyuf7SEyZ/eoxuUWtjjlhqZ1phQS2UmXGNSqxsMNT3m4DqsoUYlM+pwVhqtBtJ1bul4x75ybkd2x5qHq7es/wF4/Klx4uWrJv7nRBCBZSkX20slvroWIDWOFqmMJhWdaaMb2EqdLmFQITITJBOWQBBlImFA6i01IhGERIz0MY7GeR91KfLUhfkPc83pNb1g6PlBpnrd8eHKLWDICR2R5jWb3oEHvwjQFZMm6HFXq+nsz2KZRYf10ZkkfSR1GqnIaBFJ1D0MNRaZFNUbRBaJ8DP718ywjVu3PuxX0S24KsEPz24BSW6RXmuglP1pA1tpFAC1Ir+DGa16Xa1lIGZq0Gm1ukSDTqrXiSxWjRH7/cVDHVWKD1tWP9248a9EYI4BTHhEYJh4/bHIJSIMxKi+Hi6sngmRHkERcb1M/Mcd02Nz2nyuP6soW5rubLz8FyJrYNZnVxOnSdOu61dPvF7+4REr8n9wTPIjXsIWnRT0I91jHvQXkQyY9DrLK9KPiQjMw917uZ6eFMr85Gcd+8StXRCw5/9RBKVjESOCHmRoOO4jbCG399e61urVZzP8Jer1r0+ACJhcH7W+afUvdIYow5Tkl/9HEVcylEQjtpiXDo3H7R7qsNm8v4hk2Dt5huMHbiGv+r28uoadc7/z6uyJCs6uhqnSn8rVRFR9xIgw0vpOpFwBidr8roo2xMVdIbJckKZdw65vox8vaHZs3Xbv0E/WXb21sqni3Coi3UUKI6KvUar402ZiI64EcCU+kdM7GHNUNlMzfRWptVmIBZ+vbty6bt2Poui6SnZs3Ph0wYKKs7/8KtJX0hdTUApRj6JZIyiCNzY2qhsbq4s4Jvls7gBzGI1EUuz4BcNXFOlaSwKPNrzfIMDJm8wiRno5LL1hjqBNN4G15bbSj1Phn5FAsfOiZXWKOgVJQylw/qF3pETaVTPSqu/TdaS4qkcoTDDxSMbjYSJOpJjjsI0IiC0kScdEiGcnb+ZpA1i5VEivyuXpo0IaNjn6OXBpa7ntWeXp9EXXdqa5RkGxGhQpt+tEVp6IjFSqDdjYKX0HWquK+Ikk4qLP8wVjQx0ObywURZnfh2OIFUIiDFWiIwLXvf/cjb1LL+0tH1y1f+/pbfntR+4fWLpiaXZPue3Cb68wK1GERZ+ApryHUWQnaUQqnohoNPWaiRPxiROrppYnFHExMXAmWfGIM8UOAGEUPqSZ+RROlRg6DkNECrkzp47DQq7DHeffXtn9+Hy+fJ481VLOLcm2gghFViCvNXy/Ei3WW06SChyaMhP8xW4Q84gMhLMmYvUSDc6RWm4UdmFfZ38naDNPkPDSPphFxEnvxAyW2RdX5FvPPD7/5tLpg0cvlE4fbHu8c/vujnNPytuh0FBYpOv9y8vwHwkkKVLg1chcl8xOyutQhF9k+jj6jJHVdT02uHAvZBgLGqO7fiQ8FBFkai+Wt+ls671jpUtXcrn0zvPHztzeSe0sP+houfaEfpjJ9h/PeWuog4CYZexsTAMc9pah3CJSsXjcSKtYq68uMtQdB5EAEUG+4/aBQyQUEa69zhvM8ibd3Fomj13ck922vW337ra2k0db9l650dLRcgAWwqf7D0C4sIogIhr2A1EP6C2kmju3RuIGTN1owAwGZTXblM3mYfp6OPVdzBlFYesLxQQn8QZ/50Vzdm1h5+P21j35/S0nz5VKe9vJ+62td9sft+dgPBvCLaKiB8YEnWqo2kyRdpOMJ7dUer1KCxt9VVmPM8rsvXEiwOxtbgd7dw+jQpm1cBnNpmVPlmbTe063dJzfufvAqZP7Tx0rtB9/cKZl57HiEViXneYWQXE5BSZ1uFUiAg+FRsv8FvkXNDUYRFaPeN3uFKPitzkneTw+p9sFjYA/BoHiB52wjAVEmmHWZvu1o0fPlNuPHLxxrnCk/cDe3UdPnmam1nhSS1ZrN9MZJZfDBkTodzDm9v79lCjSt5ayK9V2kxSJOp0zPezAS9hsbkbKEZ7p9IEQL9NG/BBpbl6ShcIurLpcsSefzuWy+T35AjQLUFbiFUGtViXcEhnMsLQJksYfzPgCgaQfEQbFTBYRvBFFkrJr4N1PeUJJF1IR1ABB+F38HsCg4ZUiS0AFyl5QEYMD2NJVMfgiD8DXR4CBCkpuh7wyYbgamiCycmUwnpkZEBbRm0gGiqLMDWoMAuT87UMjdHRhJmyqFOEE+shkhAdVTR0uMxaLSvY99DgXB52LV/aDoVMQtosp6mrNJOwhKJGQFwlEA98toi7E54wKl1ohszo52FyFTpEuPQV6rwo+Aysxpp+74v1WBqOOWCaECKPFICJykUyrxWrBpE6DeMNEMuyMQydzJYl4KOJzTnIJr+wc/lNk05ODfzBrDEP/Mf/y9WMXMXNx0I/GMkEHIoixSFFyE/PfNXbKbIQ9xMQ91BNyu/whX8DvJFJ/l1m8jOjWvRvNTw1UpfoeG3EfFZfJt/bNp0VtIArgMxnCOGWxrklMIhOkbExWCYIppKHUIoXtqahZYQ9N8WQtrS3sRfDPobfd434Br733I/bNxqXW3aiwXrbkBx4U8+fHe2/mkZm0zyG1YB3/tLUzsbQ85JWWBDWAjvquBcPDd9DGf9hzHD+Ofm2ns1nimLvcRCYlVKeSldoevhfFfnp5vkexw4B3oiRlb0HF/66ihOab4Vn7fgZT9YEC+Qqz4XZ+Tjf2UnmOJBNUMXIBUwuulEMP07p8+bp13N7tIRIKSpwhgA+WRw7fHoFu17z/ukavVyyKDelbP7CXan0XVs6CR/Am59UXcEK7libSPBs20V5QaykGLV4qiLbAqqZ7UKWEqkYBCXCdyzjl9ZlUip/XI2KVkVrLO1ZDCnENRB4L0RznSMykt82By9L+xhTxsL7CV1fUywaXdaGEnk33FOl92hBB5UDTAhkfQgTAt0FZgks+n7pwWrnoittPApJQvuAE+WEYvpr2+/0oisbjcafz9h86nTEQRX3gy/fQD31CCL4T0cWyBpTHgUSQGdycuI3ljc1KLDWvNLsrk5JNMXTPqmoSptmKjI/DcDSq5iiL48ViPp/Nrq8mk28rJpPJ1fVsNp8vFnHMqOeNRqHv+wTjlQhzB27DUfChRLCsPCclx0ks0lWMklHA1LYVRbOZochwJECIDwihH0Acxx//At/gtxEIgIFQEKyllibJEkziRIgcDGqiHXg5uKharzNG6ypFjyJJLW7TQJxIiDxVPEvxCaNi0zumUs1DTxXdGohgCGR3wHWUkZGRkZGRkZGRkfFf8weBLc6EioqZrgAAAABJRU5ErkJggg==" class="img-fluid rounded mt-2" alt="Web Developer" />
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
							<a href="<?php echo base_url() ?>examples/blank">Icons and Fonts</a>
						</li>
						<li class="breadcrumb-item active">Icons</li>
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

					<section class="col-md-12">
						<hr />
					</section>

					<section class="col-md-12">
						<div class="card">
							<div class="card-header">
								<ul class="nav nav-tabs card-header-tabs float-left">
									<li class="nav-item">
										<a class="nav-link active" href="#icons" data-toggle="tab">Icons</a>
									</li>

									<li class="nav-item">
										<a class="nav-link ml-2" href="#faicons" data-toggle="tab">Font Awesome 5</a>
									</li>

									<li class="nav-item">
										<a class="nav-link ml-2" href="#weathericons" data-toggle="tab">Weather Icons</a>
									</li>

									<li class="nav-item">
										<a class="nav-link ml-2" href="#flagsicons" data-toggle="tab">Flags Icons</a>
									</li>
								</ul>
							</div>

							<div class="card-body" id="tabs">
								<div class="tab-content text-justify">
									<div class="tab-pane active" id="icons">
										<div class="row">
											<div class="col-12">
												<div class="card-box">
													<!-- begin row -->
													<div class="row">
														<!-- begin col-6 -->
														<div class="col-md-6">
															<!-- begin panel -->
															<div class="p-3 mb-3" data-sortable-id="ui-icons-1">
																<h4>Icon Sizes</h4>
																<i class="fas fa-camera-retro fa-xs"></i>
																<h2>fa-xs</h2>
																<i class="fas fa-camera-retro fa-sm"></i>
																<h2>fa-sm</h2>
																<i class="fas fa-camera-retro fa-lg"></i>
																<h2>fa-lg</h2>
																<i class="fas fa-camera-retro fa-2x"></i>
																<h2>fa-2x</h2>
																<i class="fas fa-camera-retro fa-3x"></i>
																<h2>fa-3x</h2>
																<i class="fas fa-camera-retro fa-5x"></i>
																<h2>fa-5x</h2>
																<i class="fas fa-camera-retro fa-7x"></i>
																<h2>fa-7x</h2>
																<i class="fas fa-camera-retro fa-10x"></i>
																<h2>fa-10x</h2>
															</div>
															<!-- end panel -->
															<!-- begin panel -->
															<div class="p-3 mb-3" data-sortable-id="ui-icons-2">
																<h4>Rotated &amp; Flipped Icons</h4>
																<table class="table table-bordered">
																	<tbody>
																	<tr>
																		<td class="text-center">
																			<div>
																				<i class="fas fa-arrow-circle-right fa-3x text-inverse"></i>
																			</div>
																			<div>normal</div>
																		</td>
																		<td class="text-center">
																			<div>
																				<i class="fas fa-arrow-circle-right fa-3x text-inverse fa-rotate-90"></i>
																			</div>
																			<div>fa-rotate-90</div>
																		</td>
																		<td class="text-center">
																			<div>
																				<i class="fas fa-arrow-circle-right fa-3x text-inverse fa-rotate-180"></i>
																			</div>
																			<div>fa-rotate-180</div>
																		</td>
																	</tr>
																	<tr>
																		<td class="text-center">
																			<div>
																				<i class="fas fa-arrow-circle-right fa-3x text-inverse fa-rotate-270"></i>
																			</div>
																			<div>fa-rotate-270</div>
																		</td>
																		<td class="text-center">
																			<div>
																				<i class="fas fa-arrow-circle-right fa-3x text-inverse fa-flip-horizontal"></i>
																			</div>
																			<div>fa-flip-horizontal</div>
																		</td>
																		<td class="text-center">
																			<div>
																				<i class="fas fa-arrow-circle-right fa-3x text-inverse icon-flip-vertical"></i>
																			</div>
																			<div>icon-flip-vertical</div>
																		</td>
																	</tr>
																	</tbody>
																</table>
															</div>
															<!-- end panel -->
														</div>
														<!-- end col-6 -->
														<!-- begin col-6 -->
														<div class="col-md-6 mb-3">
															<!-- begin panel -->
															<div class="p-3" data-sortable-id="ui-icons-4">
																<h4>Bordered &amp; Pulled Icons</h4>
																<p>
																	<i class="fas fa-quote-left fa-3x pull-left muted"></i>
																	Use a few of the new styles together, and you've got easy pull quotes or a great introductory
																	article image.
																	Or spinning icons for loading and refreshing content. Or fun big icons in multi-line buttons.
																	You can combine all
																	of them in any combination to get lots of new possibilities.
																</p>
																<p>
																	<i class="fas fa-flag fa-3x pull-left fa-border"></i>
																	Use a few of the new styles together, and you've got easy pull quotes or a great introductory
																	article image.
																	Or spinning icons for loading and refreshing content. Or fun big icons in multi-line buttons.
																	You can combine all
																	of them in any combination to get lots of new possibilities.
																</p>
															</div>
															<!-- end panel -->
															<!-- begin panel -->
															<div class="p-3" data-sortable-id="ui-icons-5">
																<h4>Stacked Icons</h4>
																<p>
															<span class="fa-stack fa-2x text-primary">
																<i class="far fa-square fa-stack-2x"></i>
																<i class="fab fa-twitter fa-stack-1x"></i>
															</span>
																	fa-twitter on far fa-square
																</p>
																<p>
															<span class="fa-stack fa-2x text-success">
																<i class="fas fa-circle fa-stack-2x"></i>
																<i class="fas fa-flag fa-stack-1x fa-inverse"></i>
															</span>
																	fa-flag on fa-circle
																</p>
																<p>
															<span class="fa-stack fa-2x text-danger">
																<i class="fas fa-square fa-stack-2x"></i>
																<i class="fas fa-terminal fa-stack-1x fa-inverse"></i>
															</span>
																	fa-terminal on fa-square
																</p>
																<p>
															<span class="fa-stack fa-2x">
																<i class="fas fa-camera fa-stack-1x"></i>
																<i class="fas fa-ban fa-stack-2x text-danger"></i>
															</span>
																	fa-ban on fa-camera
																</p>
																<p>
															<span class="fa-stack fa-2x text-warning">
																<i class="far fa-circle fa-stack-2x"></i>
																<i class="fas fa-cog fa-stack-1x"></i>
															</span>
																	fa-cog on far fa-circle
																</p>
															</div>
														</div>
														<!-- end col-6 -->
													</div>
													<!-- end row -->
												</div>
											</div>
										</div>
									</div>

									<div class="tab-pane" id="faicons">
										<small>Version 5.6.3 --- 1,480 Free Icons</small>
										<h2 class="text-warning">Solid Icons</h2>
										<hr />
										<div class="row">
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">ad</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f641</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">address-book</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2b9</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">address-card</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2bb</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">adjust</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f042</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">air-freshener</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5d0</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">align-center</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f037</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">align-justify</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f039</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">align-left</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f036</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">align-right</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f038</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">allergies</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f461</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">ambulance</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0f9</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">american-sign-language-interpreting</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2a3</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">anchor</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f13d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">angle-double-down</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f103</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">angle-double-left</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f100</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">angle-double-right</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f101</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">angle-double-up</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f102</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">angle-down</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f107</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">angle-left</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f104</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">angle-right</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f105</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">angle-up</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f106</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">angry</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f556</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">ankh</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f644</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">apple-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5d1</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">archive</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f187</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">archway</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f557</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">arrow-alt-circle-down</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f358</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">arrow-alt-circle-left</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f359</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">arrow-alt-circle-right</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f35a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">arrow-alt-circle-up</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f35b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">arrow-circle-down</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0ab</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">arrow-circle-left</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0a8</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">arrow-circle-right</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0a9</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">arrow-circle-up</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0aa</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">arrow-down</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f063</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">arrow-left</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f060</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">arrow-right</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f061</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">arrow-up</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f062</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">arrows-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0b2</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">arrows-alt-h</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f337</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">arrows-alt-v</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f338</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">assistive-listening-systems</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2a2</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">asterisk</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f069</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">at</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1fa</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">atlas</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f558</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">atom</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5d2</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">audio-description</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f29e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">award</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f559</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">baby</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f77c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">baby-carriage</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f77d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">backspace</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f55a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">backward</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f04a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">balance-scale</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f24e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">ban</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f05e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">band-aid</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f462</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">barcode</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f02a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">bars</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0c9</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">baseball-ball</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f433</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">basketball-ball</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f434</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">bath</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2cd</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">battery-empty</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f244</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">battery-full</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f240</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">battery-half</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f242</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">battery-quarter</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f243</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">battery-three-quarters</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f241</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">bed</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f236</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">beer</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0fc</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">bell</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0f3</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">bell-slash</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1f6</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">bezier-curve</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f55b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">bible</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f647</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">bicycle</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f206</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">binoculars</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1e5</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">biohazard</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f780</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">birthday-cake</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1fd</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">blender</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f517</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">blender-phone</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f6b6</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">blind</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f29d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">blog</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f781</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">bold</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f032</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">bolt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0e7</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">bomb</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1e2</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">bone</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5d7</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">bong</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f55c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">book</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f02d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">book-dead</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f6b7</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">book-open</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f518</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">book-reader</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5da</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">bookmark</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f02e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">bowling-ball</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f436</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">box</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f466</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">box-open</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f49e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">boxes</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f468</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">braille</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2a1</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">brain</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5dc</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">briefcase</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0b1</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">briefcase-medical</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f469</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">broadcast-tower</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f519</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">broom</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f51a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">brush</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f55d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">bug</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f188</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">building</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1ad</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">bullhorn</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0a1</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">bullseye</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f140</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">burn</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f46a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">bus</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f207</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">bus-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f55e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">business-time</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f64a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">calculator</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1ec</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">calendar</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f133</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">calendar-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f073</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">calendar-check</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f274</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">calendar-day</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f783</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">calendar-minus</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f272</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">calendar-plus</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f271</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">calendar-times</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f273</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">calendar-week</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f784</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">camera</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f030</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">camera-retro</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f083</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">campground</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f6bb</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">candy-cane</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f786</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">cannabis</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f55f</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">capsules</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f46b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">car</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1b9</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">car-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5de</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">car-battery</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5df</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">car-crash</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5e1</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">car-side</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5e4</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">caret-down</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0d7</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">caret-left</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0d9</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">caret-right</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0da</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">caret-square-down</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f150</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">caret-square-left</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f191</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">caret-square-right</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f152</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">caret-square-up</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f151</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">caret-up</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0d8</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">carrot</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f787</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">cart-arrow-down</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f218</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">cart-plus</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f217</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">cash-register</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f788</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">cat</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f6be</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">certificate</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0a3</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">chair</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f6c0</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">chalkboard</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f51b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">chalkboard-teacher</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f51c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">charging-station</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5e7</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">chart-area</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1fe</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">chart-bar</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f080</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">chart-line</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f201</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">chart-pie</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f200</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">check</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f00c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">check-circle</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f058</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">check-double</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f560</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">check-square</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f14a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">chess</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f439</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">chess-bishop</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f43a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">chess-board</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f43c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">chess-king</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f43f</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">chess-knight</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f441</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">chess-pawn</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f443</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">chess-queen</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f445</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">chess-rook</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f447</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">chevron-circle-down</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f13a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">chevron-circle-left</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f137</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">chevron-circle-right</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f138</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">chevron-circle-up</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f139</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">chevron-down</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f078</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">chevron-left</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f053</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">chevron-right</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f054</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">chevron-up</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f077</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">child</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1ae</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">church</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f51d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">circle</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f111</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">circle-notch</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1ce</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">city</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f64f</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">clipboard</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f328</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">clipboard-check</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f46c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">clipboard-list</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f46d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">clock</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f017</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">clone</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f24d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">closed-captioning</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f20a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">cloud</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0c2</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">cloud-download-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f381</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">cloud-meatball</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f73b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">cloud-moon</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f6c3</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">cloud-moon-rain</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f73c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">cloud-rain</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f73d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">cloud-showers-heavy</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f740</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">cloud-sun</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f6c4</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">cloud-sun-rain</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f743</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">cloud-upload-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f382</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">cocktail</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f561</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">code</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f121</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">code-branch</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f126</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">coffee</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0f4</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">cog</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f013</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">cogs</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f085</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">coins</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f51e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">columns</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0db</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">comment</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f075</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">comment-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f27a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">comment-dollar</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f651</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">comment-dots</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4ad</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">comment-slash</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4b3</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">comments</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f086</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">comments-dollar</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f653</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">compact-disc</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f51f</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">compass</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f14e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">compress</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f066</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">compress-arrows-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f78c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">concierge-bell</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f562</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">cookie</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f563</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">cookie-bite</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f564</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">copy</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0c5</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">copyright</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1f9</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">couch</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4b8</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">credit-card</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f09d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">crop</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f125</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">crop-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f565</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">cross</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f654</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">crosshairs</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f05b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">crow</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f520</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">crown</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f521</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">cube</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1b2</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">cubes</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1b3</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">cut</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0c4</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">database</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1c0</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">deaf</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2a4</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">democrat</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f747</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">desktop</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f108</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">dharmachakra</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f655</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">diagnoses</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f470</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">dice</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f522</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">dice-d20</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f6cf</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">dice-d6</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f6d1</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">dice-five</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f523</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">dice-four</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f524</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">dice-one</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f525</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">dice-six</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f526</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">dice-three</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f527</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">dice-two</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f528</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">digital-tachograph</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f566</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">directions</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5eb</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">divide</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f529</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">dizzy</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f567</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">dna</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f471</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">dog</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f6d3</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">dollar-sign</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f155</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">dolly</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f472</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">dolly-flatbed</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f474</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">donate</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4b9</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">door-closed</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f52a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">door-open</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f52b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">dot-circle</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f192</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">dove</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4ba</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">download</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f019</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">drafting-compass</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f568</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">dragon</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f6d5</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">draw-polygon</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5ee</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">drum</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f569</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">drum-steelpan</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f56a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">drumstick-bite</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f6d7</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">dumbbell</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f44b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">dumpster</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f793</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">dumpster-fire</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f794</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">dungeon</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f6d9</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">edit</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f044</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">eject</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f052</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">ellipsis-h</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f141</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">ellipsis-v</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f142</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">envelope</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0e0</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">envelope-open</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2b6</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">envelope-open-text</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f658</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">envelope-square</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f199</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">equals</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f52c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">eraser</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f12d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">ethernet</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f796</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">euro-sign</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f153</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">exchange-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f362</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">exclamation</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f12a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">exclamation-circle</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f06a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">exclamation-triangle</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f071</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">expand</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f065</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">expand-arrows-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f31e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">external-link-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f35d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">external-link-square-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f360</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">eye</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f06e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">eye-dropper</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1fb</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">eye-slash</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f070</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">fast-backward</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f049</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">fast-forward</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f050</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">fax</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1ac</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">feather</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f52d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">feather-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f56b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">female</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f182</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">fighter-jet</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0fb</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">file</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f15b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">file-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f15c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">file-archive</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1c6</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">file-audio</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1c7</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">file-code</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1c9</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">file-contract</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f56c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">file-csv</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f6dd</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">file-download</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f56d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">file-excel</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1c3</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">file-export</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f56e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">file-image</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1c5</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">file-import</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f56f</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">file-invoice</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f570</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">file-invoice-dollar</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f571</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">file-medical</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f477</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">file-medical-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f478</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">file-pdf</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1c1</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">file-powerpoint</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1c4</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">file-prescription</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f572</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">file-signature</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f573</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">file-upload</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f574</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">file-video</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1c8</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">file-word</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1c2</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">fill</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f575</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">fill-drip</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f576</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">film</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f008</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">filter</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0b0</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">fingerprint</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f577</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">fire</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f06d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">fire-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f7e4</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">fire-extinguisher</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f134</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">first-aid</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f479</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">fish</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f578</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">fist-raised</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f6de</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">flag</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f024</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">flag-checkered</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f11e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">flag-usa</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f74d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">flask</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0c3</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">flushed</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f579</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">folder</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f07b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">folder-minus</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f65d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">folder-open</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f07c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">folder-plus</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f65e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">font</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f031</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">football-ball</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f44e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">forward</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f04e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">frog</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f52e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">frown</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f119</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">frown-open</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f57a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">funnel-dollar</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f662</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">futbol</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1e3</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">gamepad</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f11b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">gas-pump</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f52f</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">gavel</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0e3</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">gem</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3a5</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">genderless</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f22d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">ghost</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f6e2</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">gift</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f06b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">gifts</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f79c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">glass-cheers</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f79f</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">glass-martini</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f000</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">glass-martini-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f57b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">glass-whiskey</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f7a0</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">glasses</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f530</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">globe</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0ac</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">globe-africa</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f57c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">globe-americas</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f57d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">globe-asia</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f57e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">globe-europe</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f7a2</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">golf-ball</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f450</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">gopuram</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f664</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">graduation-cap</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f19d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">greater-than</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f531</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">greater-than-equal</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f532</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">grimace</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f57f</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">grin</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f580</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">grin-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f581</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">grin-beam</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f582</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">grin-beam-sweat</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f583</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">grin-hearts</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f584</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">grin-squint</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f585</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">grin-squint-tears</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f586</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">grin-stars</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f587</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">grin-tears</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f588</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">grin-tongue</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f589</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">grin-tongue-squint</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f58a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">grin-tongue-wink</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f58b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">grin-wink</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f58c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">grip-horizontal</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f58d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">grip-lines</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f7a4</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">grip-lines-vertical</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f7a5</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">grip-vertical</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f58e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">guitar</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f7a6</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">h-square</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0fd</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hammer</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f6e3</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hamsa</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f665</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hand-holding</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4bd</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hand-holding-heart</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4be</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hand-holding-usd</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4c0</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hand-lizard</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f258</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hand-paper</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f256</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hand-peace</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f25b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hand-point-down</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0a7</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hand-point-left</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0a5</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hand-point-right</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0a4</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hand-point-up</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0a6</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hand-pointer</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f25a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hand-rock</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f255</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hand-scissors</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f257</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hand-spock</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f259</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hands</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4c2</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hands-helping</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4c4</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">handshake</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2b5</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hanukiah</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f6e6</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hashtag</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f292</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hat-wizard</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f6e8</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">haykal</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f666</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hdd</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0a0</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">heading</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1dc</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">headphones</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f025</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">headphones-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f58f</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">headset</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f590</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">heart</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f004</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">heart-broken</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f7a9</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">heartbeat</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f21e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">helicopter</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f533</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">highlighter</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f591</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hiking</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f6ec</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hippo</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f6ed</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">history</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1da</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hockey-puck</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f453</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">holly-berry</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f7aa</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">home</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f015</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">horse</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f6f0</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">horse-head</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f7ab</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hospital</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0f8</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hospital-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f47d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hospital-symbol</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f47e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hot-tub</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f593</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hotel</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f594</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hourglass</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f254</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hourglass-end</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f253</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hourglass-half</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f252</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hourglass-start</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f251</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">house-damage</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f6f1</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hryvnia</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f6f2</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">i-cursor</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f246</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">icicles</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f7ad</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">id-badge</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2c1</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">id-card</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2c2</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">id-card-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f47f</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">igloo</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f7ae</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">image</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f03e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">images</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f302</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">inbox</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f01c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">indent</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f03c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">industry</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f275</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">infinity</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f534</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">info</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f129</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">info-circle</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f05a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">italic</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f033</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">jedi</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f669</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">joint</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f595</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">journal-whills</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f66a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">kaaba</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f66b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">key</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f084</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">keyboard</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f11c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">khanda</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f66d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">kiss</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f596</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">kiss-beam</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f597</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">kiss-wink-heart</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f598</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">kiwi-bird</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f535</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">landmark</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f66f</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">language</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1ab</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">laptop</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f109</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">laptop-code</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5fc</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">laugh</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f599</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">laugh-beam</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f59a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">laugh-squint</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f59b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">laugh-wink</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f59c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">layer-group</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5fd</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">leaf</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f06c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">lemon</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f094</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">less-than</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f536</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">less-than-equal</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f537</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">level-down-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3be</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">level-up-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3bf</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">life-ring</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1cd</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">lightbulb</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0eb</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">link</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0c1</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">lira-sign</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f195</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">list</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f03a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">list-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f022</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">list-ol</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0cb</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">list-ul</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0ca</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">location-arrow</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f124</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">lock</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f023</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">lock-open</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3c1</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">long-arrow-alt-down</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f309</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">long-arrow-alt-left</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f30a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">long-arrow-alt-right</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f30b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">long-arrow-alt-up</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f30c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">low-vision</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2a8</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">luggage-cart</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f59d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">magic</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0d0</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">magnet</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f076</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">mail-bulk</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f674</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">male</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f183</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">map</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f279</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">map-marked</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f59f</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">map-marked-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5a0</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">map-marker</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f041</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">map-marker-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3c5</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">map-pin</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f276</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">map-signs</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f277</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">marker</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5a1</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">mars</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f222</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">mars-double</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f227</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">mars-stroke</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f229</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">mars-stroke-h</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f22b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">mars-stroke-v</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f22a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">mask</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f6fa</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">medal</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5a2</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">medkit</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0fa</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">meh</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f11a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">meh-blank</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5a4</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">meh-rolling-eyes</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5a5</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">memory</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f538</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">menorah</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f676</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">mercury</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f223</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">meteor</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f753</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">microchip</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2db</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">microphone</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f130</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">microphone-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3c9</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">microphone-alt-slash</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f539</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">microphone-slash</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f131</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">microscope</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f610</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">minus</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f068</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">minus-circle</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f056</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">minus-square</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f146</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">mitten</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f7b5</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">mobile</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f10b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">mobile-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3cd</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">money-bill</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0d6</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">money-bill-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3d1</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">money-bill-wave</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f53a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">money-bill-wave-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f53b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">money-check</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f53c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">money-check-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f53d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">monument</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5a6</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">moon</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f186</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">mortar-pestle</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5a7</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">mosque</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f678</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">motorcycle</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f21c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">mountain</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f6fc</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">mouse-pointer</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f245</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">mug-hot</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f7b6</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">music</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f001</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">network-wired</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f6ff</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">neuter</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f22c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">newspaper</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1ea</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">not-equal</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f53e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">notes-medical</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f481</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">object-group</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f247</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">object-ungroup</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f248</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">oil-can</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f613</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">om</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f679</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">otter</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f700</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">outdent</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f03b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">paint-brush</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1fc</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">paint-roller</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5aa</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">palette</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f53f</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">pallet</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f482</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">paper-plane</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1d8</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">paperclip</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0c6</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">parachute-box</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4cd</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">paragraph</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1dd</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">parking</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f540</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">passport</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5ab</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">pastafarianism</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f67b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">paste</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0ea</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">pause</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f04c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">pause-circle</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f28b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">paw</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1b0</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">peace</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f67c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">pen</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f304</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">pen-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f305</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">pen-fancy</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5ac</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">pen-nib</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5ad</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">pen-square</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f14b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">pencil-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f303</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">pencil-ruler</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5ae</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">people-carry</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4ce</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">percent</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f295</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">percentage</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f541</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">person-booth</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f756</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">phone</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f095</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">phone-slash</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3dd</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">phone-square</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f098</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">phone-volume</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2a0</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">piggy-bank</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4d3</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">pills</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f484</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">place-of-worship</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f67f</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">plane</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f072</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">plane-arrival</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5af</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">plane-departure</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5b0</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">play</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f04b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">play-circle</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f144</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">plug</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1e6</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">plus</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f067</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">plus-circle</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f055</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">plus-square</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0fe</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">podcast</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2ce</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">poll</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f681</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">poll-h</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f682</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">poo</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2fe</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">poo-storm</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f75a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">poop</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f619</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">portrait</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3e0</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">pound-sign</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f154</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">power-off</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f011</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">pray</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f683</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">praying-hands</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f684</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">prescription</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5b1</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">prescription-bottle</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f485</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">prescription-bottle-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f486</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">print</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f02f</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">procedures</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f487</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">project-diagram</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f542</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">puzzle-piece</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f12e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">qrcode</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f029</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">question</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f128</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">question-circle</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f059</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">quidditch</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f458</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">quote-left</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f10d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">quote-right</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f10e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">quran</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f687</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">radiation</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f7b9</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">radiation-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f7ba</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">rainbow</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f75b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">random</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f074</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">receipt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f543</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">recycle</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1b8</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">redo</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f01e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">redo-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2f9</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">registered</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f25d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">reply</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3e5</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">reply-all</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f122</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">republican</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f75e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">restroom</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f7bd</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">retweet</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f079</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">ribbon</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4d6</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">ring</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f70b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">road</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f018</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">robot</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f544</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">rocket</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f135</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">route</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4d7</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">rss</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f09e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">rss-square</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f143</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">ruble-sign</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f158</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">ruler</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f545</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">ruler-combined</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f546</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">ruler-horizontal</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f547</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">ruler-vertical</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f548</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">running</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f70c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">rupee-sign</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f156</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">sad-cry</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5b3</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">sad-tear</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5b4</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">satellite</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f7bf</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">satellite-dish</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f7c0</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">save</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0c7</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">school</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f549</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">screwdriver</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f54a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">scroll</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f70e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">sd-card</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f7c2</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">search</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f002</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">search-dollar</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f688</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">search-location</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f689</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">search-minus</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f010</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">search-plus</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f00e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">seedling</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4d8</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">server</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f233</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">shapes</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f61f</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">share</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f064</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">share-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1e0</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">share-alt-square</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1e1</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">share-square</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f14d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">shekel-sign</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f20b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">shield-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3ed</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">ship</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f21a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">shipping-fast</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f48b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">shoe-prints</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f54b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">shopping-bag</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f290</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">shopping-basket</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f291</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">shopping-cart</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f07a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">shower</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2cc</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">shuttle-van</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5b6</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">sign</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4d9</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">sign-in-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2f6</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">sign-language</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2a7</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">sign-out-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2f5</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">signal</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f012</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">signature</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5b7</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">sim-card</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f7c4</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">sitemap</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0e8</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">skating</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f7c5</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">skiing</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f7c9</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">skiing-nordic</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f7ca</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">skull</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f54c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">skull-crossbones</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f714</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">slash</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f715</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">sleigh</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f7cc</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">sliders-h</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1de</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">smile</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f118</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">smile-beam</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5b8</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">smile-wink</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4da</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">smog</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f75f</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">smoking</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f48d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">smoking-ban</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f54d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">sms</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f7cd</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">snowboarding</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f7ce</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">snowflake</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2dc</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">snowman</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f7d0</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">snowplow</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f7d2</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">socks</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f696</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">solar-panel</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5ba</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">sort</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0dc</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">sort-alpha-down</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f15d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">sort-alpha-up</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f15e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">sort-amount-down</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f160</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">sort-amount-up</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f161</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">sort-down</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0dd</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">sort-numeric-down</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f162</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">sort-numeric-up</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f163</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">sort-up</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0de</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">spa</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5bb</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">space-shuttle</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f197</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">spider</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f717</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">spinner</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f110</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">splotch</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5bc</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">spray-can</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5bd</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">square</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0c8</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">square-full</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f45c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">square-root-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f698</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">stamp</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5bf</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">star</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f005</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">star-and-crescent</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f699</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">star-half</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f089</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">star-half-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5c0</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">star-of-david</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f69a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">star-of-life</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f621</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">step-backward</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f048</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">step-forward</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f051</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">stethoscope</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0f1</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">sticky-note</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f249</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">stop</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f04d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">stop-circle</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f28d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">stopwatch</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2f2</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">store</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f54e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">store-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f54f</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">stream</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f550</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">street-view</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f21d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">strikethrough</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0cc</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">stroopwafel</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f551</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">subscript</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f12c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">subway</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f239</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">suitcase</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0f2</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">suitcase-rolling</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5c1</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">sun</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f185</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">superscript</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f12b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">surprise</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5c2</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">swatchbook</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5c3</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">swimmer</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5c4</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">swimming-pool</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5c5</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">synagogue</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f69b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">sync</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f021</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">sync-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2f1</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">syringe</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f48e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">table</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0ce</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">table-tennis</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f45d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">tablet</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f10a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">tablet-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3fa</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">tablets</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f490</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">tachometer-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3fd</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">tag</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f02b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">tags</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f02c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">tape</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4db</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">tasks</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0ae</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">taxi</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1ba</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">teeth</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f62e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">teeth-open</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f62f</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">temperature-high</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f769</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">temperature-low</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f76b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">tenge</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f7d7</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">terminal</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f120</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">text-height</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f034</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">text-width</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f035</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">th</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f00a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">th-large</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f009</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">th-list</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f00b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">theater-masks</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f630</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">thermometer</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f491</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">thermometer-empty</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2cb</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">thermometer-full</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2c7</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">thermometer-half</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2c9</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">thermometer-quarter</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2ca</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">thermometer-three-quarters</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2c8</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">thumbs-down</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f165</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">thumbs-up</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f164</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">thumbtack</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f08d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">ticket-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3ff</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">times</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f00d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">times-circle</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f057</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">tint</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f043</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">tint-slash</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5c7</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">tired</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5c8</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">toggle-off</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f204</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">toggle-on</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f205</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">toilet</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f7d8</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">toilet-paper</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f71e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">toolbox</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f552</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">tools</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f7d9</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">tooth</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5c9</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">torah</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f6a0</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">torii-gate</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f6a1</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">tractor</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f722</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">trademark</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f25c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">traffic-light</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f637</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">train</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f238</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">tram</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f7da</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">transgender</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f224</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">transgender-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f225</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">trash</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1f8</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">trash-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2ed</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">tree</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1bb</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">trophy</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f091</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">truck</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0d1</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">truck-loading</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4de</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">truck-monster</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f63b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">truck-moving</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4df</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">truck-pickup</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f63c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">tshirt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f553</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">tty</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1e4</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">tv</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f26c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">umbrella</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0e9</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">umbrella-beach</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5ca</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">underline</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0cd</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">undo</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0e2</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">undo-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2ea</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">universal-access</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f29a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">university</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f19c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">unlink</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f127</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">unlock</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f09c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">unlock-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f13e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">upload</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f093</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">user</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f007</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">user-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f406</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">user-alt-slash</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4fa</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">user-astronaut</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4fb</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">user-check</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4fc</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">user-circle</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2bd</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">user-clock</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4fd</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">user-cog</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4fe</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">user-edit</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4ff</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">user-friends</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f500</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">user-graduate</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f501</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">user-injured</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f728</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">user-lock</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f502</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">user-md</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0f0</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">user-minus</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f503</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">user-ninja</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f504</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">user-plus</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f234</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">user-secret</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f21b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">user-shield</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f505</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">user-slash</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f506</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">user-tag</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f507</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">user-tie</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f508</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">user-times</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f235</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">users</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0c0</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">users-cog</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f509</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">utensil-spoon</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2e5</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">utensils</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2e7</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">vector-square</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5cb</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">venus</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f221</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">venus-double</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f226</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">venus-mars</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f228</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">vial</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f492</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">vials</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f493</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">video</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f03d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">video-slash</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4e2</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">vihara</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f6a7</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">volleyball-ball</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f45f</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">volume-down</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f027</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">volume-mute</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f6a9</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">volume-off</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f026</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">volume-up</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f028</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">vote-yea</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f772</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">vr-cardboard</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f729</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">walking</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f554</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">wallet</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f555</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">warehouse</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f494</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">water</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f773</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">weight</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f496</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">weight-hanging</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5cd</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">wheelchair</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f193</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">wifi</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1eb</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">wind</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f72e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">window-close</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f410</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">window-maximize</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2d0</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">window-minimize</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2d1</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">window-restore</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2d2</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">wine-bottle</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f72f</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">wine-glass</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4e3</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">wine-glass-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5ce</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">won-sign</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f159</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">wrench</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0ad</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">x-ray</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f497</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">yen-sign</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f157</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fas"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">yin-yang</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f6ad</dd>
												</dl>
											</article>
										</div>

										<h2 class="text-warning">Regular Icons</h2>
										<hr />
										<div class="row">
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">address-book</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2b9</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">address-card</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2bb</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">angry</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f556</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">arrow-alt-circle-down</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f358</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">arrow-alt-circle-left</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f359</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">arrow-alt-circle-right</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f35a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">arrow-alt-circle-up</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f35b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">bell</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0f3</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">bell-slash</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1f6</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">bookmark</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f02e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">building</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1ad</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">calendar</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f133</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">calendar-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f073</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">calendar-check</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f274</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">calendar-minus</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f272</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">calendar-plus</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f271</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">calendar-times</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f273</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">caret-square-down</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f150</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">caret-square-left</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f191</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">caret-square-right</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f152</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">caret-square-up</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f151</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">chart-bar</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f080</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">check-circle</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f058</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">check-square</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f14a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">circle</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f111</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">clipboard</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f328</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">clock</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f017</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">clone</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f24d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">closed-captioning</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f20a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">comment</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f075</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">comment-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f27a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">comment-dots</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4ad</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">comments</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f086</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">compass</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f14e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">copy</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0c5</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">copyright</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1f9</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">credit-card</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f09d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">dizzy</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f567</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">dot-circle</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f192</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">edit</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f044</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">envelope</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0e0</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">envelope-open</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2b6</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">eye</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f06e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">eye-slash</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f070</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">file</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f15b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">file-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f15c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">file-archive</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1c6</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">file-audio</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1c7</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">file-code</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1c9</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">file-excel</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1c3</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">file-image</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1c5</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">file-pdf</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1c1</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">file-powerpoint</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1c4</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">file-video</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1c8</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">file-word</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1c2</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">flag</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f024</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">flushed</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f579</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">folder</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f07b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">folder-open</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f07c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">frown</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f119</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">frown-open</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f57a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">futbol</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1e3</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">gem</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3a5</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">grimace</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f57f</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">grin</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f580</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">grin-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f581</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">grin-beam</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f582</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">grin-beam-sweat</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f583</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">grin-hearts</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f584</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">grin-squint</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f585</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">grin-squint-tears</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f586</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">grin-stars</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f587</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">grin-tears</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f588</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">grin-tongue</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f589</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">grin-tongue-squint</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f58a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">grin-tongue-wink</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f58b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">grin-wink</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f58c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hand-lizard</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f258</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hand-paper</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f256</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hand-peace</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f25b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hand-point-down</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0a7</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hand-point-left</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0a5</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hand-point-right</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0a4</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hand-point-up</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0a6</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hand-pointer</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f25a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hand-rock</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f255</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hand-scissors</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f257</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hand-spock</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f259</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">handshake</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2b5</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hdd</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0a0</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">heart</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f004</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hospital</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0f8</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hourglass</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f254</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">id-badge</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2c1</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">id-card</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2c2</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">image</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f03e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">images</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f302</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">keyboard</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f11c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">kiss</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f596</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">kiss-beam</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f597</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">kiss-wink-heart</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f598</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">laugh</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f599</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">laugh-beam</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f59a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">laugh-squint</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f59b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">laugh-wink</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f59c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">lemon</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f094</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">life-ring</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1cd</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">lightbulb</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0eb</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">list-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f022</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">map</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f279</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">meh</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f11a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">meh-blank</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5a4</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">meh-rolling-eyes</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5a5</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">minus-square</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f146</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">money-bill-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3d1</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">moon</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f186</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">newspaper</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1ea</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">object-group</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f247</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">object-ungroup</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f248</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">paper-plane</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1d8</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">pause-circle</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f28b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">play-circle</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f144</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">plus-square</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0fe</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">question-circle</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f059</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">registered</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f25d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">sad-cry</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5b3</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">sad-tear</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5b4</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">save</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0c7</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">share-square</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f14d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">smile</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f118</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">smile-beam</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5b8</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">smile-wink</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4da</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">snowflake</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2dc</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">square</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0c8</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">star</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f005</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">star-half</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f089</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">sticky-note</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f249</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">stop-circle</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f28d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">sun</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f185</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">surprise</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5c2</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">thumbs-down</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f165</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">thumbs-up</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f164</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">times-circle</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f057</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">tired</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5c8</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">trash-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2ed</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">user</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f007</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">user-circle</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2bd</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">window-close</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f410</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">window-maximize</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2d0</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">window-minimize</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2d1</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x far"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">window-restore</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2d2</dd>
												</dl>
											</article>
										</div>

										<h2 class="text-warning">Brand Icons</h2>
										<hr />
										<div class="row">
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">500px</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f26e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">accessible-icon</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f368</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">accusoft</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f369</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">acquisitions-incorporated</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f6af</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">adn</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f170</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">adobe</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f778</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">adversal</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f36a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">affiliatetheme</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f36b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">algolia</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f36c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">alipay</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f642</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">amazon</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f270</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">amazon-pay</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f42c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">amilia</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f36d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">android</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f17b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">angellist</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f209</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">angrycreative</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f36e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">angular</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f420</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">app-store</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f36f</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">app-store-ios</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f370</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">apper</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f371</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">apple</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f179</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">apple-pay</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f415</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">artstation</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f77a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">asymmetrik</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f372</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">atlassian</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f77b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">audible</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f373</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">autoprefixer</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f41c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">avianex</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f374</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">aviato</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f421</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">aws</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f375</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">bandcamp</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2d5</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">behance</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1b4</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">behance-square</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1b5</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">bimobject</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f378</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">bitbucket</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f171</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">bitcoin</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f379</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">bity</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f37a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">black-tie</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f27e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">blackberry</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f37b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">blogger</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f37c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">blogger-b</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f37d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">bluetooth</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f293</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">bluetooth-b</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f294</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">btc</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f15a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">buromobelexperte</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f37f</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">buysellads</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f20d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">canadian-maple-leaf</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f785</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">cc-amazon-pay</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f42d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">cc-amex</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1f3</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">cc-apple-pay</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f416</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">cc-diners-club</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f24c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">cc-discover</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1f2</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">cc-jcb</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f24b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">cc-mastercard</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1f1</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">cc-paypal</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1f4</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">cc-stripe</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1f5</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">cc-visa</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1f0</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">centercode</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f380</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">centos</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f789</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">chrome</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f268</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">cloudscale</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f383</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">cloudsmith</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f384</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">cloudversify</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f385</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">codepen</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1cb</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">codiepie</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f284</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">confluence</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f78d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">connectdevelop</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f20e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">contao</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f26d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">cpanel</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f388</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">creative-commons</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f25e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">creative-commons-by</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4e7</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">creative-commons-nc</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4e8</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">creative-commons-nc-eu</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4e9</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">creative-commons-nc-jp</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4ea</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">creative-commons-nd</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4eb</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">creative-commons-pd</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4ec</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">creative-commons-pd-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4ed</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">creative-commons-remix</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4ee</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">creative-commons-sa</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4ef</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">creative-commons-sampling</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4f0</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">creative-commons-sampling-plus</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4f1</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">creative-commons-share</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4f2</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">creative-commons-zero</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4f3</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">critical-role</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f6c9</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">css3</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f13c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">css3-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f38b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">cuttlefish</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f38c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">d-and-d</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f38d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">d-and-d-beyond</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f6ca</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">dashcube</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f210</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">delicious</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1a5</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">deploydog</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f38e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">deskpro</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f38f</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">dev</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f6cc</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">deviantart</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1bd</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">dhl</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f790</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">diaspora</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f791</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">digg</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1a6</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">digital-ocean</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f391</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">discord</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f392</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">discourse</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f393</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">dochub</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f394</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">docker</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f395</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">draft2digital</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f396</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">dribbble</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f17d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">dribbble-square</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f397</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">dropbox</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f16b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">drupal</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1a9</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">dyalog</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f399</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">earlybirds</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f39a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">ebay</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4f4</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">edge</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f282</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">elementor</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f430</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">ello</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5f1</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">ember</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f423</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">empire</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1d1</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">envira</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f299</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">erlang</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f39d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">ethereum</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f42e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">etsy</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2d7</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">expeditedssl</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f23e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">facebook</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f09a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">facebook-f</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f39e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">facebook-messenger</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f39f</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">facebook-square</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f082</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">fantasy-flight-games</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f6dc</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">fedex</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f797</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">fedora</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f798</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">figma</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f799</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">firefox</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f269</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">first-order</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2b0</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">first-order-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f50a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">firstdraft</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3a1</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">flickr</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f16e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">flipboard</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f44d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">fly</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f417</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">font-awesome</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2b4</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">font-awesome-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f35c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">font-awesome-flag</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f425</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">fonticons</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f280</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">fonticons-fi</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3a2</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">fort-awesome</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f286</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">fort-awesome-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3a3</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">forumbee</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f211</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">foursquare</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f180</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">free-code-camp</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2c5</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">freebsd</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3a4</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">fulcrum</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f50b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">galactic-republic</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f50c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">galactic-senate</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f50d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">get-pocket</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f265</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">gg</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f260</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">gg-circle</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f261</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">git</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1d3</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">git-square</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1d2</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">github</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f09b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">github-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f113</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">github-square</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f092</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">gitkraken</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3a6</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">gitlab</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f296</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">gitter</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f426</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">glide</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2a5</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">glide-g</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2a6</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">gofore</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3a7</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">goodreads</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3a8</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">goodreads-g</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3a9</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">google</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1a0</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">google-drive</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3aa</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">google-play</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3ab</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">google-plus</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2b3</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">google-plus-g</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0d5</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">google-plus-square</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0d4</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">google-wallet</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1ee</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">gratipay</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f184</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">grav</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2d6</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">gripfire</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3ac</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">grunt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3ad</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">gulp</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3ae</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hacker-news</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1d4</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hacker-news-square</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3af</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hackerrank</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5f7</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hips</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f452</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hire-a-helper</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3b0</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hooli</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f427</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hornbill</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f592</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hotjar</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3b1</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">houzz</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f27c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">html5</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f13b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">hubspot</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3b2</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">imdb</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2d8</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">instagram</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f16d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">intercom</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f7af</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">internet-explorer</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f26b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">invision</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f7b0</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">ioxhost</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f208</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">itunes</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3b4</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">itunes-note</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3b5</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">java</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4e4</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">jedi-order</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f50e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">jenkins</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3b6</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">jira</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f7b1</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">joget</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3b7</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">joomla</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1aa</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">js</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3b8</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">js-square</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3b9</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">jsfiddle</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1cc</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">kaggle</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5fa</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">keybase</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4f5</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">keycdn</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3ba</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">kickstarter</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3bb</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">kickstarter-k</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3bc</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">korvue</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f42f</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">laravel</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3bd</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">lastfm</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f202</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">lastfm-square</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f203</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">leanpub</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f212</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">less</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f41d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">line</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3c0</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">linkedin</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f08c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">linkedin-in</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0e1</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">linode</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2b8</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">linux</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f17c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">lyft</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3c3</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">magento</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3c4</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">mailchimp</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f59e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">mandalorian</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f50f</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">markdown</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f60f</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">mastodon</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4f6</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">maxcdn</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f136</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">medapps</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3c6</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">medium</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f23a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">medium-m</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3c7</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">medrt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3c8</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">meetup</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2e0</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">megaport</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5a3</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">mendeley</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f7b3</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">microsoft</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3ca</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">mix</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3cb</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">mixcloud</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f289</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">mizuni</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3cc</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">modx</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f285</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">monero</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3d0</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">napster</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3d2</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">neos</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f612</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">nimblr</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5a8</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">nintendo-switch</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f418</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">node</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f419</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">node-js</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3d3</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">npm</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3d4</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">ns8</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3d5</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">nutritionix</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3d6</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">odnoklassniki</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f263</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">odnoklassniki-square</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f264</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">old-republic</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f510</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">opencart</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f23d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">openid</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f19b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">opera</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f26a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">optin-monster</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f23c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">osi</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f41a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">page4</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3d7</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">pagelines</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f18c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">palfed</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3d8</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">patreon</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3d9</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">paypal</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1ed</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">penny-arcade</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f704</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">periscope</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3da</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">phabricator</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3db</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">phoenix-framework</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3dc</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">phoenix-squadron</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f511</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">php</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f457</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">pied-piper</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2ae</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">pied-piper-alt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1a8</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">pied-piper-hat</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4e5</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">pied-piper-pp</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1a7</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">pinterest</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0d2</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">pinterest-p</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f231</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">pinterest-square</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f0d3</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">playstation</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3df</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">product-hunt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f288</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">pushed</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3e1</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">python</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3e2</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">qq</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1d6</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">quinscape</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f459</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">quora</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2c4</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">r-project</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4f7</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">raspberry-pi</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f7bb</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">ravelry</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2d9</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">react</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f41b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">reacteurope</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f75d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">readme</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4d5</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">rebel</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1d0</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">red-river</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3e3</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">reddit</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1a1</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">reddit-alien</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f281</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">reddit-square</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1a2</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">redhat</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f7bc</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">renren</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f18b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">replyd</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3e6</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">researchgate</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4f8</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">resolving</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3e7</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">rev</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5b2</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">rocketchat</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3e8</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">rockrms</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3e9</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">safari</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f267</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">sass</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f41e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">schlix</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3ea</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">scribd</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f28a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">searchengin</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3eb</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">sellcast</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2da</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">sellsy</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f213</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">servicestack</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3ec</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">shirtsinbulk</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f214</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">shopware</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5b5</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">simplybuilt</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f215</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">sistrix</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3ee</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">sith</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f512</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">sketch</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f7c6</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">skyatlas</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f216</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">skype</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f17e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">slack</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f198</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">slack-hash</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3ef</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">slideshare</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1e7</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">snapchat</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2ab</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">snapchat-ghost</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2ac</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">snapchat-square</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2ad</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">soundcloud</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1be</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">sourcetree</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f7d3</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">speakap</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3f3</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">spotify</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1bc</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">squarespace</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5be</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">stack-exchange</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f18d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">stack-overflow</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f16c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">staylinked</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3f5</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">steam</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1b6</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">steam-square</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1b7</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">steam-symbol</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3f6</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">sticker-mule</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3f7</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">strava</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f428</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">stripe</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f429</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">stripe-s</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f42a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">studiovinari</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3f8</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">stumbleupon</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1a4</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">stumbleupon-circle</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1a3</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">superpowers</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2dd</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">supple</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3f9</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">suse</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f7d6</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">teamspeak</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f4f9</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">telegram</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2c6</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">telegram-plane</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3fe</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">tencent-weibo</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1d5</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">the-red-yeti</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f69d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">themeco</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5c6</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">themeisle</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2b2</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">think-peaks</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f731</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">trade-federation</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f513</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">trello</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f181</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">tripadvisor</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f262</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">tumblr</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f173</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">tumblr-square</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f174</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">twitch</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1e8</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">twitter</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f099</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">twitter-square</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f081</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">typo3</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f42b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">uber</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f402</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">ubuntu</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f7df</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">uikit</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f403</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">uniregistry</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f404</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">untappd</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f405</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">ups</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f7e0</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">usb</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f287</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">usps</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f7e1</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">ussunnah</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f407</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">vaadin</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f408</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">viacoin</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f237</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">viadeo</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2a9</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">viadeo-square</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2aa</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">viber</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f409</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">vimeo</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f40a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">vimeo-square</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f194</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">vimeo-v</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f27d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">vine</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1ca</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">vk</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f189</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">vnv</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f40b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">vuejs</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f41f</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">weebly</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5cc</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">weibo</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f18a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">weixin</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1d7</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">whatsapp</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f232</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">whatsapp-square</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f40c</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">whmcs</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f40d</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">wikipedia-w</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f266</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">windows</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f17a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">wix</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f5cf</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">wizards-of-the-coast</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f730</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">wolf-pack-battalion</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f514</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">wordpress</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f19a</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">wordpress-simple</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f411</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">wpbeginner</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f297</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">wpexplorer</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2de</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">wpforms</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f298</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">wpressr</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f3e4</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">xbox</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f412</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">xing</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f168</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">xing-square</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f169</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">y-combinator</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f23b</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">yahoo</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f19e</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">yandex</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f413</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">yandex-international</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f414</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">yarn</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f7e3</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">yelp</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f1e9</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">yoast</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f2b1</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">youtube</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f167</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">youtube-square</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f431</dd>
												</dl>
											</article>
											<article class="p-3 col-md-2">
												<div class="text-center"><span class="fa-fw select-all fa-3x fab"></span></div>
												<dl class="text-center">
													<dt class="sr-only">Name:</dt>
													<dd class="info">zhihu</dd>
													<dt class="sr-only">Unicode:</dt>
													<dd class="text-warning">f63f</dd>
												</dl>
											</article>
										</div>
									</div>

									<div class="tab-pane" id="weathericons">
										<div class="row">
											<div class="col-12">
												<small>Version 2.0.8 --- 222 Free Icons</small>
												<h2 class="text-warning">Daytime</h2>
												<hr />

												<div class="row">
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf00d;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-day-sunny</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f00d</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf002;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-day-cloudy</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f002</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf000;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-day-cloudy-gusts</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f000</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf001;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-day-cloudy-windy</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f001</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf003;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-day-fog</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f003</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf004;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-day-hail</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f004</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0b6;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-day-haze</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b6</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf005;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-day-lightning</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f005</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf008;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-day-rain</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f008</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf006;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-day-rain-mix</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f006</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf007;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-day-rain-wind</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f007</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf009;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-day-showers</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f009</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0b2;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-day-sleet</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b2</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf068;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-day-sleet-storm</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f068</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf00a;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-day-snow</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f00a</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf06b;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-day-snow-thunderstorm</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f06b</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf065;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-day-snow-wind</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f065</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf00b;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-day-sprinkle</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f00b</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf00e;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-day-storm-showers</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f00e</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf00c;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-day-sunny-overcast</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f00c</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf010;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-day-thunderstorm</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f010</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf085;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-day-windy</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f085</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf06e;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-solar-eclipse</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f06e</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf072;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-hot</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f072</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf07d;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-day-cloudy-high</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f07d</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0c4;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-day-light-wind</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0c4</dd>
														</dl>
													</div>
												</div>

												<h2 class="text-warning">Nighttime</h2>
												<hr />
												<div class="row">
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf02e;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-night-clear</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f02e</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf086;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-night-alt-cloudy</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f086</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf022;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-night-alt-cloudy-gusts</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f022</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf023;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-night-alt-cloudy-windy</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f023</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf024;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-night-alt-hail</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f024</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf025;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-night-alt-lightning</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f025</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf028;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-night-alt-rain</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f028</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf026;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-night-alt-rain-mix</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f026</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf027;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-night-alt-rain-wind</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f027</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf029;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-night-alt-showers</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f029</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0b4;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-night-alt-sleet</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b4</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf06a;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-night-alt-sleet-storm</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f06a</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf02a;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-night-alt-snow</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f02a</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf06d;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-night-alt-snow-thunderstorm</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f06d</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf067;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-night-alt-snow-wind</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f067</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf02b;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-night-alt-sprinkle</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f02b</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf02c;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-night-alt-storm-showers</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f02c</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf02d;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-night-alt-thunderstorm</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f02d</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf031;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-night-cloudy</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f031</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf02f;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-night-cloudy-gusts</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f02f</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf030;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-night-cloudy-windy</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f030</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf04a;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-night-fog</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f04a</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf032;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-night-hail</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f032</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf033;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-night-lightning</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f033</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf083;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-night-partly-cloudy</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f083</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf036;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-night-rain</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f036</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf034;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-night-rain-mix</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f034</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf035;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-night-rain-wind</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f035</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf037;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-night-showers</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f037</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0b3;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-night-sleet</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b3</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf069;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-night-sleet-storm</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f069</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf038;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-night-snow</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f038</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf06c;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-night-snow-thunderstorm</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f06c</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf066;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-night-snow-wind</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f066</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf039;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-night-sprinkle</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f039</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf03a;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-night-storm-showers</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f03a</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf03b;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-night-thunderstorm</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f03b</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf070;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-lunar-eclipse</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f070</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf077;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-stars</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f077</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf01d;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-storm-showers</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f01d</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf01e;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-thunderstorm</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f01e</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf07e;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-night-alt-cloudy-high</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f07e</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf080;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-night-cloudy-high</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f080</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf081;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-night-alt-partly-cloudy</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f081</dd>
														</dl>
													</div>
												</div>

												<h2 class="text-warning">Neutral</h2>
												<hr />
												<div class="row">
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf041;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-cloud</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f041</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf013;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-cloudy</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f013</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf011;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-cloudy-gusts</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f011</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf012;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-cloudy-windy</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f012</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf014;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-fog</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f014</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf015;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-hail</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f015</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf019;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-rain</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f019</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf017;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-rain-mix</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f017</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf018;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-rain-wind</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f018</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf01a;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-showers</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f01a</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0b5;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-sleet</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b5</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf01b;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-snow</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f01b</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf01c;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-sprinkle</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f01c</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf01d;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-storm-showers</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f01d</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf01e;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-thunderstorm</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f01e</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf064;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-snow-wind</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f064</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf01b;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-snow</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f01b</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf074;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-smog</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f074</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf062;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-smoke</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f062</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf016;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-lightning</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f016</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf04e;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-raindrops</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f04e</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf078;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-raindrop</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f078</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf063;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-dust</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f063</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf076;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-snowflake-cold</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f076</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf021;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-windy</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f021</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf050;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-strong-wind</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f050</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf082;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-sandstorm</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f082</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0c6;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-earthquake</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0c6</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0c7;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-fire</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0c7</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf07c;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-flood</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f07c</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf071;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-meteor</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f071</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0c5;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-tsunami</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0c5</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0c8;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-volcano</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0c8</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf073;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-hurricane</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f073</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf056;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-tornado</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f056</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0cc;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-small-craft-advisory</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0cc</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0cd;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-gale-warning</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0cd</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0ce;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-storm-warning</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0ce</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0cf;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-hurricane-warning</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0cf</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0b1;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-wind-direction</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
												</div>

												<h2 class="text-warning">Miscellaneous</h2>
												<hr />
												<div class="row">
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf075;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-alien</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f075</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf03c;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-celsius</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f03c</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf045;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-fahrenheit</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f045</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf042;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-degrees</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f042</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf055;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-thermometer</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f055</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf053;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-thermometer-exterior</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f053</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf054;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-thermometer-internal</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f054</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf03d;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-cloud-down</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f03d</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf040;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-cloud-up</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f040</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf03e;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-cloud-refresh</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f03e</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf047;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-horizon</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f047</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf046;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-horizon-alt</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f046</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf051;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-sunrise</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f051</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf052;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-sunset</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f052</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0c9;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moonrise</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0c9</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0ca;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moonset</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0ca</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf04c;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-refresh</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f04c</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf04b;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-refresh-alt</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f04b</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf084;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-umbrella</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f084</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf079;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-barometer</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f079</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf07a;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-humidity</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f07a</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf07b;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-na</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f07b</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0cb;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-train</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0cb</dd>
														</dl>
													</div>
												</div>

												<h2 class="text-warning">Moon Phases</h2>
												<hr />
												<div class="alert alert-primary" role="alert">
													The moons are split into 28 icons, to correspond neatly with the 28 day moon cycle.
													There is a primary set and alternate set. The primary set is meant to be interpreted as:
													where there are pixels, that is the illuminated part of the moon. The
													alternate set is meant to be interpreted as: where there are pixels, that is the shadowed part of the moon.
												</div>
												<div class="row">
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf095;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-new</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f095</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf096;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-waxing-crescent-1</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f096</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf097;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-waxing-crescent-2</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f097</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf098;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-waxing-crescent-3</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f098</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf099;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-waxing-crescent-4</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f099</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf09a;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-waxing-crescent-5</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f09a</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf09b;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-waxing-crescent-6</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f09b</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf09c;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-first-quarter</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f09c</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf09d;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-waxing-gibbous-1</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f09d</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf09e;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-waxing-gibbous-2</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f09e</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf09f;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-waxing-gibbous-3</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f09f</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0a0;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-waxing-gibbous-4</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0a0</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0a1;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-waxing-gibbous-5</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0a1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0a2;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-waxing-gibbous-6</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0a2</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0a3;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-full</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0a3</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0a4;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-waning-gibbous-1</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0a4</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0a5;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-waning-gibbous-2</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0a5</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0a6;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-waning-gibbous-3</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0a6</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0a7;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-waning-gibbous-4</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0a7</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0a8;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-waning-gibbous-5</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0a8</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0a9;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-waning-gibbous-6</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0a9</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0aa;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-third-quarter</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0aa</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0ab;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-waning-crescent-1</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0ab</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0ac;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-waning-crescent-2</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0ac</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0ad;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-waning-crescent-3</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0ad</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0ae;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-waning-crescent-4</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0ae</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0af;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-waning-crescent-5</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0af</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0b0;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-waning-crescent-6</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b0</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0eb;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-alt-new</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0eb</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0d0;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-alt-waxing-crescent-1</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0d0</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0d1;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-alt-waxing-crescent-2</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0d1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0d2;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-alt-waxing-crescent-3</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0d2</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0d3;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-alt-waxing-crescent-4</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0d3</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0d4;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-alt-waxing-crescent-5</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0d4</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0d5;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-alt-waxing-crescent-6</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0d5</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0d6;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-alt-first-quarter</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0d6</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0d7;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-alt-waxing-gibbous-1</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0d7</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0d8;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-alt-waxing-gibbous-2</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0d8</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0d9;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-alt-waxing-gibbous-3</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0d9</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0da;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-alt-waxing-gibbous-4</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0da</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0db;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-alt-waxing-gibbous-5</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0db</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0dc;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-alt-waxing-gibbous-6</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0dc</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0dd;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-alt-full</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0dd</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0de;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-alt-waning-gibbous-1</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0de</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0df;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-alt-waning-gibbous-2</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0df</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0e0;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-alt-waning-gibbous-3</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0e0</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0e1;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-alt-waning-gibbous-4</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0e1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0e2;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-alt-waning-gibbous-5</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0e2</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0e3;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-alt-waning-gibbous-6</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0e3</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0e4;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-alt-third-quarter</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0e4</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0e5;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-alt-waning-crescent-1</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0e5</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0e6;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-alt-waning-crescent-2</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0e6</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0e7;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-alt-waning-crescent-3</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0e7</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0e8;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-alt-waning-crescent-4</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0e8</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0e9;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-alt-waning-crescent-5</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0e9</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0ea;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-moon-alt-waning-crescent-6</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0ea</dd>
														</dl>
													</div>
												</div>

												<h2 class="text-warning">Time</h2>
												<hr />
												<div class="row">
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf08a;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-time-1</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f08a</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf08b;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-time-2</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f08b</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf08c;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-time-3</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f08c</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf08d;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-time-4</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f08d</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf08e;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-time-5</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f08e</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf08f;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-time-6</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f08f</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf090;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-time-7</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f090</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf091;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-time-8</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f091</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf092;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-time-9</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f092</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf093;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-time-10</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f093</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf094;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-time-11</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f094</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf089;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-time-12</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f089</dd>
														</dl>
													</div>
												</div>

												<h2 class="text-warning">Directional Arrows</h2>
												<hr />
												<div class="row">
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf058;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-direction-up</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f058</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf057;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-direction-up-right</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f057</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf04d;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-direction-right</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f04d</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf088;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-direction-down-right</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f088</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf044;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-direction-down</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f044</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf043;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-direction-down-left</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f043</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf048;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-direction-left</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f048</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf087;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-direction-up-left</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f087</dd>
														</dl>
													</div>
												</div>

												<h2 class="text-warning">Wind Degree Examples</h2>
												<hr />
												<div class="alert alert-primary" role="alert">
													<p>The classes for the wind direction indicator is split into 2 options. You can choose towards or from.
													   Towards points to the degree, zero at the top. From points directly away from the degree. This means, if you
													   want the indicator to represent 'wind is coming from the south', you can use the <code>towards-0-deg</code>
													   class, or if you prefer to use from, then you would use <code>from-180-deg</code>.</p>
													<p>There are 360 classes for each in 1 degree increments for maximum precision.</p>
													<p></p>
													<p>To make a wind icon appear, you need to add 3 classes, the base icon class, the wind icon class,
													   and then the direction you want it to face: <code>class='wi wi-wind towards-23-deg'</code></p>
													<p></p>
													<p>NOTE: You must include the additional stylesheeet, <code>weather-icons-wind.css</code> to use the wind icons and API mappings.</p>
												</div>

												<div class="row">
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind towards-0-deg fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">towards-0-deg</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind towards-23-deg fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">towards-23-deg</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind towards-45-deg fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">towards-45-deg</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind towards-68-deg fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">towards-68-deg</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind towards-90-deg fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">towards-90-deg</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind towards-113-deg fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">towards-113-deg</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind towards-135-deg fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">towards-135-deg</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind towards-158-deg fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">towards-158-deg</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind towards-180-deg fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">towards-180-deg</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind towards-203-deg fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">towards-203-deg</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind towards-225-deg fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">towards-225-deg</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind towards-248-deg fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">towards-248-deg</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind towards-270-deg fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">towards-270-deg</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind towards-293-deg fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">towards-293-deg</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind towards-313-deg fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">towards-313-deg</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind towards-336-deg fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">towards-336-deg</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind from-180-deg fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">from-180-deg</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind from-203-deg fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">from-203-deg</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind from-225-deg fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">from-225-deg</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind from-248-deg fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">from-248-deg</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind from-270-deg fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">from-270-deg</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind from-293-deg fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">from-293-deg</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind from-313-deg fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">from-313-deg</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind from-336-deg fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">from-336-deg</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind from-0-deg fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">from-0-deg</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind from-23-deg fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">from-23-deg</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind from-45-deg fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">from-45-deg</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind from-68-deg fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">from-68-deg</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind from-90-deg fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">from-90-deg</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind from-113-deg fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">from-113-deg</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind from-135-deg fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">from-135-deg</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind from-158-deg fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">from-158-deg</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
												</div>

												<h2 class="text-warning">Wind Cardinal Examples</h2>
												<hr />
												<div class="alert alert-primary" role="alert">
													<p>The classes for the cardinal wind direction indicator is split into 2 options. You can choose towards or from.
													   Towards points to the direction in the class, north at the top. From points directly away from the direction in
													   the class. This means, if you want the indicator to represent 'wind is coming from the south', you can use the
														<code>towards-n</code> class, or if you prefer to use from, then you would use <code>from-s</code>.</p>
													<p>The purpose of this is to accommodate applications that prefer to point to where the wind is originating from
													   (arrow points against the wind), or pointing where the wind is blowing (arrow points in direction of wind).
													   You can decide which fits your application best and use the class that matches.</p>
													<p>There are 16 classes each for precision when using cardinal directions.</p>
													<p></p>
													<p>To make a wind icon appear, you need to add 3 classes, the base icon class, the wind icon class, and then the direction you want it to face:
														<code>class='wi wi-wind wi-from-e'</code></p>
													<p>NOTE: You must include the additional stylesheeet, <code>weather-icons-wind.css</code> to use the wind icons and API mappings.</p>
												</div>

												<div class="row">
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind wi-towards-n fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-towards-n</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind wi-towards-nne fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-towards-nne</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind wi-towards-ne fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-towards-ne</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind wi-towards-ene fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-towards-ene</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind wi-towards-e fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-towards-e</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind wi-towards-ese fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-towards-ese</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind wi-towards-se fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-towards-se</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind wi-towards-sse fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-towards-sse</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind wi-towards-s fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-towards-s</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind wi-towards-ssw fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-towards-ssw</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind wi-towards-sw fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-towards-sw</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind wi-towards-wsw fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-towards-wsw</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind wi-towards-w fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-towards-w</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind wi-towards-wnw fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-towards-wnw</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind wi-towards-nw fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-towards-nw</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind wi-towards-nnw fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-towards-nnw</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind wi-from-n fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-from-n</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind wi-from-nne fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-from-nne</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind wi-from-ne fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-from-ne</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind wi-from-ene fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-from-ene</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind wi-from-e fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-from-e</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind wi-from-ese fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-from-ese</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind wi-from-se fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-from-se</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind wi-from-sse fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-from-sse</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind wi-from-s fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-from-s</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind wi-from-ssw fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-from-ssw</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind wi-from-sw fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-from-sw</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind wi-from-wsw fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-from-wsw</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind wi-from-w fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-from-w</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind wi-from-wnw fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-from-wnw</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind wi-from-nw fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-from-nw</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2">
														<div class="text-center"><i class="wi wi-wind wi-from-nnw fa-3x fa-fw"></i></div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-from-nnw</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b1</dd>
														</dl>
													</div>
												</div>

												<h2 class="text-warning">Beaufort Wind Scale</h2>
												<hr />
												<div class="row">
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0b7;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-wind-beaufort-0</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b7</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0b8;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-wind-beaufort-1</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b8</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0b9;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-wind-beaufort-2</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0b9</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0ba;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-wind-beaufort-3</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0ba</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0bb;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-wind-beaufort-4</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0bb</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0bc;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-wind-beaufort-5</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0bc</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0bd;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-wind-beaufort-6</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0bd</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0be;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-wind-beaufort-7</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0be</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0bf;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-wind-beaufort-8</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0bf</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0c0;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-wind-beaufort-9</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0c0</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0c1;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-wind-beaufort-10</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0c1</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0c2;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-wind-beaufort-11</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0c2</dd>
														</dl>
													</div>
													<div class="p-3 col-md-2 text-center">
														<div class="text-center fa-3x wi mb-2">&#xf0c3;</div>
														<dl class="text-center">
															<dt class="sr-only">Name:</dt>
															<dd class="info">wi-wind-beaufort-12</dd>
															<dt class="sr-only">Unicode:</dt>
															<dd class="text-warning">f0c3</dd>
														</dl>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="tab-pane" id="flagsicons">
										<small>Version 1.3.1</small>
										<h2 class="text-warning">Flags Icons</h2>
										<hr />

										<div class="row flags">
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Afghanistan" data-continent="Asia">
													<div title="Afghanistan" class="name">
														<span class="alpha-2">AF</span>
														Afghanistan
													</div>
													
													<img class="flager" alt="Afghanistan Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/af.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Aland Islands" data-continent="Europe">
													<div title="Aland Islands" class="name">
														<span class="alpha-2">AX</span>
														Aland Islands
													</div>
													
													<img class="flager" alt="Aland Islands Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/ax.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Albania" data-continent="Europe">
													<div title="Albania" class="name">
														<span class="alpha-2">AL</span>
														Albania
													</div>
													
													<img class="flager" alt="Albania Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/al.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Algeria" data-continent="Africa">
													<div title="Algeria" class="name">
														<span class="alpha-2">DZ</span>
														Algeria
													</div>
													
													<img class="flager" alt="Algeria Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/dz.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="American Samoa" data-continent="Oceania">
													<div title="American Samoa" class="name">
														<span class="alpha-2">AS</span>
														American Samoa
													</div>
													
													<img class="flager" alt="American Samoa Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/as.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Andorra" data-continent="Europe">
													<div title="Andorra" class="name">
														<span class="alpha-2">AD</span>
														Andorra
													</div>
													
													<img class="flager" alt="Andorra Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/ad.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Angola" data-continent="Africa">
													<div title="Angola" class="name">
														<span class="alpha-2">AO</span>
														Angola
													</div>
													
													<img class="flager" alt="Angola Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/ao.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Anguilla" data-continent="North America">
													<div title="Anguilla" class="name">
														<span class="alpha-2">AI</span>
														Anguilla
													</div>
													
													<img class="flager" alt="Anguilla Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/ai.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Antigua and Barbuda" data-continent="North America">
													<div title="Antigua and Barbuda" class="name">
														<span class="alpha-2">AG</span>
														Antigua and Barbuda
													</div>
													
													<img class="flager" alt="Antigua and Barbuda Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/ag.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Argentina" data-continent="South America">
													<div title="Argentina" class="name">
														<span class="alpha-2">AR</span>
														Argentina
													</div>
													
													<img class="flager" alt="Argentina Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/ar.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Armenia" data-continent="Asia">
													<div title="Armenia" class="name">
														<span class="alpha-2">AM</span>
														Armenia
													</div>
													
													<img class="flager" alt="Armenia Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/am.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Aruba" data-continent="South America">
													<div title="Aruba" class="name">
														<span class="alpha-2">AW</span>
														Aruba
													</div>
													
													<img class="flager" alt="Aruba Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/aw.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Australia" data-continent="Oceania">
													<div title="Australia" class="name">
														<span class="alpha-2">AU</span>
														Australia
													</div>
													
													<img class="flager" alt="Australia Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/au.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Austria" data-continent="Europe">
													<div title="Austria" class="name">
														<span class="alpha-2">AT</span>
														Austria
													</div>
													
													<img class="flager" alt="Austria Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/at.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Azerbaijan" data-continent="Asia">
													<div title="Azerbaijan" class="name">
														<span class="alpha-2">AZ</span>
														Azerbaijan
													</div>
													
													<img class="flager" alt="Azerbaijan Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/az.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Bahamas" data-continent="North America">
													<div title="Bahamas" class="name">
														<span class="alpha-2">BS</span>
														Bahamas
													</div>
													
													<img class="flager" alt="Bahamas Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/bs.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Bahrain" data-continent="Asia">
													<div title="Bahrain" class="name">
														<span class="alpha-2">BH</span>
														Bahrain
													</div>
													
													<img class="flager" alt="Bahrain Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/bh.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Bangladesh" data-continent="Asia">
													<div title="Bangladesh" class="name">
														<span class="alpha-2">BD</span>
														Bangladesh
													</div>
													
													<img class="flager" alt="Bangladesh Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/bd.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Barbados" data-continent="North America">
													<div title="Barbados" class="name">
														<span class="alpha-2">BB</span>
														Barbados
													</div>
													
													<img class="flager" alt="Barbados Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/bb.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Belarus" data-continent="Europe">
													<div title="Belarus" class="name">
														<span class="alpha-2">BY</span>
														Belarus
													</div>
													
													<img class="flager" alt="Belarus Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/by.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Belgium" data-continent="Europe">
													<div title="Belgium" class="name">
														<span class="alpha-2">BE</span>
														Belgium
													</div>
													
													<img class="flager" alt="Belgium Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/be.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Belize" data-continent="North America">
													<div title="Belize" class="name">
														<span class="alpha-2">BZ</span>
														Belize
													</div>
													
													<img class="flager" alt="Belize Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/bz.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Benin" data-continent="Africa">
													<div title="Benin" class="name">
														<span class="alpha-2">BJ</span>
														Benin
													</div>
													
													<img class="flager" alt="Benin Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/bj.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Bermuda" data-continent="North America">
													<div title="Bermuda" class="name">
														<span class="alpha-2">BM</span>
														Bermuda
													</div>
													
													<img class="flager" alt="Bermuda Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/bm.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Bhutan" data-continent="Asia">
													<div title="Bhutan" class="name">
														<span class="alpha-2">BT</span>
														Bhutan
													</div>
													
													<img class="flager" alt="Bhutan Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/bt.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Bolivia (Plurinational State of)" data-continent="South America">
													<div title="Bolivia (Plurinational State of)" class="name">
														<span class="alpha-2">BO</span>
														Bolivia (Plurinational State of)
													</div>
													
													<img class="flager" alt="Bolivia (Plurinational State of) Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/bo.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Bonaire, Sint Eustatius and Saba" data-continent="South America">
													<div title="Bonaire, Sint Eustatius and Saba" class="name">
														<span class="alpha-2">BQ</span>
														Bonaire, Sint Eustatius and Saba
													</div>
													
													<img class="flager" alt="Bonaire, Sint Eustatius and Saba Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/bq.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Bosnia and Herzegovina" data-continent="Europe">
													<div title="Bosnia and Herzegovina" class="name">
														<span class="alpha-2">BA</span>
														Bosnia and Herzegovina
													</div>
													
													<img class="flager" alt="Bosnia and Herzegovina Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/ba.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Botswana" data-continent="Africa">
													<div title="Botswana" class="name">
														<span class="alpha-2">BW</span>
														Botswana
													</div>
													
													<img class="flager" alt="Botswana Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/bw.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Brazil" data-continent="South America">
													<div title="Brazil" class="name">
														<span class="alpha-2">BR</span>
														Brazil
													</div>
													
													<img class="flager" alt="Brazil Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/br.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="British Indian Ocean Territory" data-continent="Asia">
													<div title="British Indian Ocean Territory" class="name">
														<span class="alpha-2">IO</span>
														British Indian Ocean Territory
													</div>
													
													<img class="flager" alt="British Indian Ocean Territory Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/io.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Brunei Darussalam" data-continent="Asia">
													<div title="Brunei Darussalam" class="name">
														<span class="alpha-2">BN</span>
														Brunei Darussalam
													</div>
													
													<img class="flager" alt="Brunei Darussalam Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/bn.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Bulgaria" data-continent="Europe">
													<div title="Bulgaria" class="name">
														<span class="alpha-2">BG</span>
														Bulgaria
													</div>
													
													<img class="flager" alt="Bulgaria Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/bg.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Burkina Faso" data-continent="Africa">
													<div title="Burkina Faso" class="name">
														<span class="alpha-2">BF</span>
														Burkina Faso
													</div>
													
													<img class="flager" alt="Burkina Faso Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/bf.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Burundi" data-continent="Africa">
													<div title="Burundi" class="name">
														<span class="alpha-2">BI</span>
														Burundi
													</div>
													
													<img class="flager" alt="Burundi Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/bi.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Cabo Verde" data-continent="Africa">
													<div title="Cabo Verde" class="name">
														<span class="alpha-2">CV</span>
														Cabo Verde
													</div>
													
													<img class="flager" alt="Cabo Verde Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/cv.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Cambodia" data-continent="Asia">
													<div title="Cambodia" class="name">
														<span class="alpha-2">KH</span>
														Cambodia
													</div>
													
													<img class="flager" alt="Cambodia Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/kh.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Cameroon" data-continent="Africa">
													<div title="Cameroon" class="name">
														<span class="alpha-2">CM</span>
														Cameroon
													</div>
													
													<img class="flager" alt="Cameroon Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/cm.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Canada" data-continent="North America">
													<div title="Canada" class="name">
														<span class="alpha-2">CA</span>
														Canada
													</div>
													
													<img class="flager" alt="Canada Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/ca.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Cayman Islands" data-continent="North America">
													<div title="Cayman Islands" class="name">
														<span class="alpha-2">KY</span>
														Cayman Islands
													</div>
													
													<img class="flager" alt="Cayman Islands Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/ky.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Central African Republic" data-continent="Africa">
													<div title="Central African Republic" class="name">
														<span class="alpha-2">CF</span>
														Central African Republic
													</div>
													
													<img class="flager" alt="Central African Republic Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/cf.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Chad" data-continent="Africa">
													<div title="Chad" class="name">
														<span class="alpha-2">TD</span>
														Chad
													</div>
													
													<img class="flager" alt="Chad Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/td.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Chile" data-continent="South America">
													<div title="Chile" class="name">
														<span class="alpha-2">CL</span>
														Chile
													</div>
													
													<img class="flager" alt="Chile Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/cl.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="China" data-continent="Asia">
													<div title="China" class="name">
														<span class="alpha-2">CN</span>
														China
													</div>
													
													<img class="flager" alt="China Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/cn.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Christmas Island" data-continent="Asia">
													<div title="Christmas Island" class="name">
														<span class="alpha-2">CX</span>
														Christmas Island
													</div>
													
													<img class="flager" alt="Christmas Island Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/cx.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Cocos (Keeling) Islands" data-continent="Asia">
													<div title="Cocos (Keeling) Islands" class="name">
														<span class="alpha-2">CC</span>
														Cocos (Keeling) Islands
													</div>
													
													<img class="flager" alt="Cocos (Keeling) Islands Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/cc.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Colombia" data-continent="South America">
													<div title="Colombia" class="name">
														<span class="alpha-2">CO</span>
														Colombia
													</div>
													
													<img class="flager" alt="Colombia Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/co.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Comoros" data-continent="Africa">
													<div title="Comoros" class="name">
														<span class="alpha-2">KM</span>
														Comoros
													</div>
													
													<img class="flager" alt="Comoros Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/km.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Cook Islands" data-continent="Oceania">
													<div title="Cook Islands" class="name">
														<span class="alpha-2">CK</span>
														Cook Islands
													</div>
													
													<img class="flager" alt="Cook Islands Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/ck.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Costa Rica" data-continent="North America">
													<div title="Costa Rica" class="name">
														<span class="alpha-2">CR</span>
														Costa Rica
													</div>
													
													<img class="flager" alt="Costa Rica Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/cr.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Croatia" data-continent="Europe">
													<div title="Croatia" class="name">
														<span class="alpha-2">HR</span>
														Croatia
													</div>
													
													<img class="flager" alt="Croatia Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/hr.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Cuba" data-continent="North America">
													<div title="Cuba" class="name">
														<span class="alpha-2">CU</span>
														Cuba
													</div>
													
													<img class="flager" alt="Cuba Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/cu.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Curaçao" data-continent="South America">
													<div title="Curaçao" class="name">
														<span class="alpha-2">CW</span>
														Curaçao
													</div>
													
													<img class="flager" alt="Curaçao Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/cw.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Cyprus" data-continent="Europe">
													<div title="Cyprus" class="name">
														<span class="alpha-2">CY</span>
														Cyprus
													</div>
													
													<img class="flager" alt="Cyprus Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/cy.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Czech Republic" data-continent="Europe">
													<div title="Czech Republic" class="name">
														<span class="alpha-2">CZ</span>
														Czech Republic
													</div>
													
													<img class="flager" alt="Czech Republic Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/cz.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Côte d'Ivoire" data-continent="Africa">
													<div title="Côte d'Ivoire" class="name">
														<span class="alpha-2">CI</span>
														C&ocirc;te d'Ivoire
													</div>
													
													<img class="flager" alt="Côte d'Ivoire Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/ci.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Democratic Republic of the Congo" data-continent="Africa">
													<div title="Democratic Republic of the Congo" class="name">
														<span class="alpha-2">CD</span>
														Democratic Republic of the Congo
													</div>
													
													<img class="flager" alt="Democratic Republic of the Congo Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/cd.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Denmark" data-continent="Europe">
													<div title="Denmark" class="name">
														<span class="alpha-2">DK</span>
														Denmark
													</div>
													
													<img class="flager" alt="Denmark Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/dk.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Djibouti" data-continent="Africa">
													<div title="Djibouti" class="name">
														<span class="alpha-2">DJ</span>
														Djibouti
													</div>
													
													<img class="flager" alt="Djibouti Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/dj.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Dominica" data-continent="North America">
													<div title="Dominica" class="name">
														<span class="alpha-2">DM</span>
														Dominica
													</div>
													
													<img class="flager" alt="Dominica Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/dm.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Dominican Republic" data-continent="North America">
													<div title="Dominican Republic" class="name">
														<span class="alpha-2">DO</span>
														Dominican Republic
													</div>
													
													<img class="flager" alt="Dominican Republic Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/do.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Ecuador" data-continent="South America">
													<div title="Ecuador" class="name">
														<span class="alpha-2">EC</span>
														Ecuador
													</div>
													
													<img class="flager" alt="Ecuador Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/ec.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Egypt" data-continent="Africa">
													<div title="Egypt" class="name">
														<span class="alpha-2">EG</span>
														Egypt
													</div>
													
													<img class="flager" alt="Egypt Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/eg.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="El Salvador" data-continent="North America">
													<div title="El Salvador" class="name">
														<span class="alpha-2">SV</span>
														El Salvador
													</div>
													
													<img class="flager" alt="El Salvador Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/sv.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Equatorial Guinea" data-continent="Africa">
													<div title="Equatorial Guinea" class="name">
														<span class="alpha-2">GQ</span>
														Equatorial Guinea
													</div>
													
													<img class="flager" alt="Equatorial Guinea Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/gq.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Eritrea" data-continent="Africa">
													<div title="Eritrea" class="name">
														<span class="alpha-2">ER</span>
														Eritrea
													</div>
													
													<img class="flager" alt="Eritrea Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/er.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Estonia" data-continent="Europe">
													<div title="Estonia" class="name">
														<span class="alpha-2">EE</span>
														Estonia
													</div>
													
													<img class="flager" alt="Estonia Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/ee.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Ethiopia" data-continent="Africa">
													<div title="Ethiopia" class="name">
														<span class="alpha-2">ET</span>
														Ethiopia
													</div>
													
													<img class="flager" alt="Ethiopia Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/et.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Falkland Islands" data-continent="South America">
													<div title="Falkland Islands" class="name">
														<span class="alpha-2">FK</span>
														Falkland Islands
													</div>
													
													<img class="flager" alt="Falkland Islands Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/fk.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Faroe Islands" data-continent="Europe">
													<div title="Faroe Islands" class="name">
														<span class="alpha-2">FO</span>
														Faroe Islands
													</div>
													
													<img class="flager" alt="Faroe Islands Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/fo.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Federated States of Micronesia" data-continent="Oceania">
													<div title="Federated States of Micronesia" class="name">
														<span class="alpha-2">FM</span>
														Federated States of Micronesia
													</div>
													
													<img class="flager" alt="Federated States of Micronesia Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/fm.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Fiji" data-continent="Oceania">
													<div title="Fiji" class="name">
														<span class="alpha-2">FJ</span>
														Fiji
													</div>
													
													<img class="flager" alt="Fiji Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/fj.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Finland" data-continent="Europe">
													<div title="Finland" class="name">
														<span class="alpha-2">FI</span>
														Finland
													</div>
													
													<img class="flager" alt="Finland Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/fi.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Former Yugoslav Republic of Macedonia" data-continent="Europe">
													<div title="Former Yugoslav Republic of Macedonia" class="name">
														<span class="alpha-2">MK</span>
														Former Yugoslav Republic of Macedonia
													</div>
													
													<img class="flager" alt="Former Yugoslav Republic of Macedonia Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/mk.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="France" data-continent="Europe">
													<div title="France" class="name">
														<span class="alpha-2">FR</span>
														France
													</div>
													
													<img class="flager" alt="France Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/fr.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="French Guiana" data-continent="South America">
													<div title="French Guiana" class="name">
														<span class="alpha-2">GF</span>
														French Guiana
													</div>
													
													<img class="flager" alt="French Guiana Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/gf.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="French Polynesia" data-continent="Oceania">
													<div title="French Polynesia" class="name">
														<span class="alpha-2">PF</span>
														French Polynesia
													</div>
													
													<img class="flager" alt="French Polynesia Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/pf.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="French Southern Territories" data-continent="Africa">
													<div title="French Southern Territories" class="name">
														<span class="alpha-2">TF</span>
														French Southern Territories
													</div>
													
													<img class="flager" alt="French Southern Territories Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/tf.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Gabon" data-continent="Africa">
													<div title="Gabon" class="name">
														<span class="alpha-2">GA</span>
														Gabon
													</div>
													
													<img class="flager" alt="Gabon Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/ga.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Gambia" data-continent="Africa">
													<div title="Gambia" class="name">
														<span class="alpha-2">GM</span>
														Gambia
													</div>
													
													<img class="flager" alt="Gambia Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/gm.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Georgia" data-continent="Asia">
													<div title="Georgia" class="name">
														<span class="alpha-2">GE</span>
														Georgia
													</div>
													
													<img class="flager" alt="Georgia Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/ge.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Germany" data-continent="Europe">
													<div title="Germany" class="name">
														<span class="alpha-2">DE</span>
														Germany
													</div>
													
													<img class="flager" alt="Germany Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/de.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Ghana" data-continent="Africa">
													<div title="Ghana" class="name">
														<span class="alpha-2">GH</span>
														Ghana
													</div>
													
													<img class="flager" alt="Ghana Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/gh.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Gibraltar" data-continent="Europe">
													<div title="Gibraltar" class="name">
														<span class="alpha-2">GI</span>
														Gibraltar
													</div>
													
													<img class="flager" alt="Gibraltar Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/gi.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Greece" data-continent="Europe">
													<div title="Greece" class="name">
														<span class="alpha-2">GR</span>
														Greece
													</div>
													
													<img class="flager" alt="Greece Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/gr.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Greenland" data-continent="North America">
													<div title="Greenland" class="name">
														<span class="alpha-2">GL</span>
														Greenland
													</div>
													
													<img class="flager" alt="Greenland Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/gl.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Grenada" data-continent="North America">
													<div title="Grenada" class="name">
														<span class="alpha-2">GD</span>
														Grenada
													</div>
													
													<img class="flager" alt="Grenada Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/gd.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Guadeloupe" data-continent="North America">
													<div title="Guadeloupe" class="name">
														<span class="alpha-2">GP</span>
														Guadeloupe
													</div>
													
													<img class="flager" alt="Guadeloupe Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/gp.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Guam" data-continent="Oceania">
													<div title="Guam" class="name">
														<span class="alpha-2">GU</span>
														Guam
													</div>
													
													<img class="flager" alt="Guam Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/gu.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Guatemala" data-continent="North America">
													<div title="Guatemala" class="name">
														<span class="alpha-2">GT</span>
														Guatemala
													</div>
													
													<img class="flager" alt="Guatemala Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/gt.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Guernsey" data-continent="Europe">
													<div title="Guernsey" class="name">
														<span class="alpha-2">GG</span>
														Guernsey
													</div>
													
													<img class="flager" alt="Guernsey Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/gg.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Guinea" data-continent="Africa">
													<div title="Guinea" class="name">
														<span class="alpha-2">GN</span>
														Guinea
													</div>
													
													<img class="flager" alt="Guinea Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/gn.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Guinea-Bissau" data-continent="Africa">
													<div title="Guinea-Bissau" class="name">
														<span class="alpha-2">GW</span>
														Guinea-Bissau
													</div>
													
													<img class="flager" alt="Guinea-Bissau Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/gw.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Guyana" data-continent="South America">
													<div title="Guyana" class="name">
														<span class="alpha-2">GY</span>
														Guyana
													</div>
													
													<img class="flager" alt="Guyana Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/gy.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Haiti" data-continent="North America">
													<div title="Haiti" class="name">
														<span class="alpha-2">HT</span>
														Haiti
													</div>
													
													<img class="flager" alt="Haiti Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/ht.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Holy See" data-continent="Europe">
													<div title="Holy See" class="name">
														<span class="alpha-2">VA</span>
														Holy See
													</div>
													
													<img class="flager" alt="Holy See Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/va.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Honduras" data-continent="North America">
													<div title="Honduras" class="name">
														<span class="alpha-2">HN</span>
														Honduras
													</div>
													
													<img class="flager" alt="Honduras Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/hn.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Hong Kong" data-continent="Asia">
													<div title="Hong Kong" class="name">
														<span class="alpha-2">HK</span>
														Hong Kong
													</div>
													
													<img class="flager" alt="Hong Kong Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/hk.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Hungary" data-continent="Europe">
													<div title="Hungary" class="name">
														<span class="alpha-2">HU</span>
														Hungary
													</div>
													
													<img class="flager" alt="Hungary Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/hu.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Iceland" data-continent="Europe">
													<div title="Iceland" class="name">
														<span class="alpha-2">IS</span>
														Iceland
													</div>
													
													<img class="flager" alt="Iceland Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/is.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="India" data-continent="Asia">
													<div title="India" class="name">
														<span class="alpha-2">IN</span>
														India
													</div>
													
													<img class="flager" alt="India Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/in.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Indonesia" data-continent="Asia">
													<div title="Indonesia" class="name">
														<span class="alpha-2">ID</span>
														Indonesia
													</div>
													
													<img class="flager" alt="Indonesia Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/id.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Iran (Islamic Republic of)" data-continent="Asia">
													<div title="Iran (Islamic Republic of)" class="name">
														<span class="alpha-2">IR</span>
														Iran (Islamic Republic of)
													</div>
													
													<img class="flager" alt="Iran (Islamic Republic of) Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/ir.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Iraq" data-continent="Asia">
													<div title="Iraq" class="name">
														<span class="alpha-2">IQ</span>
														Iraq
													</div>
													
													<img class="flager" alt="Iraq Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/iq.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Ireland" data-continent="Europe">
													<div title="Ireland" class="name">
														<span class="alpha-2">IE</span>
														Ireland
													</div>
													
													<img class="flager" alt="Ireland Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/ie.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Isle of Man" data-continent="Europe">
													<div title="Isle of Man" class="name">
														<span class="alpha-2">IM</span>
														Isle of Man
													</div>
													
													<img class="flager" alt="Isle of Man Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/im.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Israel" data-continent="Asia">
													<div title="Israel" class="name">
														<span class="alpha-2">IL</span>
														Israel
													</div>
													
													<img class="flager" alt="Israel Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/il.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Italy" data-continent="Europe">
													<div title="Italy" class="name">
														<span class="alpha-2">IT</span>
														Italy
													</div>
													
													<img class="flager" alt="Italy Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/it.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Jamaica" data-continent="North America">
													<div title="Jamaica" class="name">
														<span class="alpha-2">JM</span>
														Jamaica
													</div>
													
													<img class="flager" alt="Jamaica Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/jm.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Japan" data-continent="Asia">
													<div title="Japan" class="name">
														<span class="alpha-2">JP</span>
														Japan
													</div>
													
													<img class="flager" alt="Japan Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/jp.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Jersey" data-continent="Europe">
													<div title="Jersey" class="name">
														<span class="alpha-2">JE</span>
														Jersey
													</div>
													
													<img class="flager" alt="Jersey Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/je.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Jordan" data-continent="Asia">
													<div title="Jordan" class="name">
														<span class="alpha-2">JO</span>
														Jordan
													</div>
													
													<img class="flager" alt="Jordan Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/jo.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Kazakhstan" data-continent="Asia">
													<div title="Kazakhstan" class="name">
														<span class="alpha-2">KZ</span>
														Kazakhstan
													</div>
													
													<img class="flager" alt="Kazakhstan Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/kz.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Kenya" data-continent="Africa">
													<div title="Kenya" class="name">
														<span class="alpha-2">KE</span>
														Kenya
													</div>
													
													<img class="flager" alt="Kenya Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/ke.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Kiribati" data-continent="Oceania">
													<div title="Kiribati" class="name">
														<span class="alpha-2">KI</span>
														Kiribati
													</div>
													
													<img class="flager" alt="Kiribati Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/ki.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Kosovo" data-continent="Europe">
													<div title="Kosovo" class="name">
														<span class="alpha-2">XK</span>
														Kosovo
													</div>
													
													<img class="flager" alt="Kosovo Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/xk.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Kuwait" data-continent="Asia">
													<div title="Kuwait" class="name">
														<span class="alpha-2">KW</span>
														Kuwait
													</div>
													
													<img class="flager" alt="Kuwait Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/kw.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Kyrgyzstan" data-continent="Asia">
													<div title="Kyrgyzstan" class="name">
														<span class="alpha-2">KG</span>
														Kyrgyzstan
													</div>
													
													<img class="flager" alt="Kyrgyzstan Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/kg.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Laos" data-continent="Asia">
													<div title="Laos" class="name">
														<span class="alpha-2">LA</span>
														Laos
													</div>
													
													<img class="flager" alt="Laos Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/la.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Latvia" data-continent="Europe">
													<div title="Latvia" class="name">
														<span class="alpha-2">LV</span>
														Latvia
													</div>
													
													<img class="flager" alt="Latvia Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/lv.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Lebanon" data-continent="Asia">
													<div title="Lebanon" class="name">
														<span class="alpha-2">LB</span>
														Lebanon
													</div>
													
													<img class="flager" alt="Lebanon Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/lb.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Lesotho" data-continent="Africa">
													<div title="Lesotho" class="name">
														<span class="alpha-2">LS</span>
														Lesotho
													</div>
													
													<img class="flager" alt="Lesotho Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/ls.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Liberia" data-continent="Africa">
													<div title="Liberia" class="name">
														<span class="alpha-2">LR</span>
														Liberia
													</div>
													
													<img class="flager" alt="Liberia Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/lr.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Libya" data-continent="Africa">
													<div title="Libya" class="name">
														<span class="alpha-2">LY</span>
														Libya
													</div>
													
													<img class="flager" alt="Libya Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/ly.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Liechtenstein" data-continent="Europe">
													<div title="Liechtenstein" class="name">
														<span class="alpha-2">LI</span>
														Liechtenstein
													</div>
													
													<img class="flager" alt="Liechtenstein Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/li.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Lithuania" data-continent="Europe">
													<div title="Lithuania" class="name">
														<span class="alpha-2">LT</span>
														Lithuania
													</div>
													
													<img class="flager" alt="Lithuania Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/lt.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Luxembourg" data-continent="Europe">
													<div title="Luxembourg" class="name">
														<span class="alpha-2">LU</span>
														Luxembourg
													</div>
													
													<img class="flager" alt="Luxembourg Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/lu.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Macau" data-continent="Asia">
													<div title="Macau" class="name">
														<span class="alpha-2">MO</span>
														Macau
													</div>
													
													<img class="flager" alt="Macau Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/mo.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Madagascar" data-continent="Africa">
													<div title="Madagascar" class="name">
														<span class="alpha-2">MG</span>
														Madagascar
													</div>
													
													<img class="flager" alt="Madagascar Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/mg.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Malawi" data-continent="Africa">
													<div title="Malawi" class="name">
														<span class="alpha-2">MW</span>
														Malawi
													</div>
													
													<img class="flager" alt="Malawi Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/mw.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Malaysia" data-continent="Asia">
													<div title="Malaysia" class="name">
														<span class="alpha-2">MY</span>
														Malaysia
													</div>
													
													<img class="flager" alt="Malaysia Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/my.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Maldives" data-continent="Asia">
													<div title="Maldives" class="name">
														<span class="alpha-2">MV</span>
														Maldives
													</div>
													
													<img class="flager" alt="Maldives Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/mv.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Mali" data-continent="Africa">
													<div title="Mali" class="name">
														<span class="alpha-2">ML</span>
														Mali
													</div>
													
													<img class="flager" alt="Mali Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/ml.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Malta" data-continent="Europe">
													<div title="Malta" class="name">
														<span class="alpha-2">MT</span>
														Malta
													</div>
													
													<img class="flager" alt="Malta Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/mt.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Marshall Islands" data-continent="Oceania">
													<div title="Marshall Islands" class="name">
														<span class="alpha-2">MH</span>
														Marshall Islands
													</div>
													
													<img class="flager" alt="Marshall Islands Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/mh.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Martinique" data-continent="North America">
													<div title="Martinique" class="name">
														<span class="alpha-2">MQ</span>
														Martinique
													</div>
													
													<img class="flager" alt="Martinique Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/mq.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Mauritania" data-continent="Africa">
													<div title="Mauritania" class="name">
														<span class="alpha-2">MR</span>
														Mauritania
													</div>
													
													<img class="flager" alt="Mauritania Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/mr.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Mauritius" data-continent="Africa">
													<div title="Mauritius" class="name">
														<span class="alpha-2">MU</span>
														Mauritius
													</div>
													
													<img class="flager" alt="Mauritius Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/mu.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Mayotte" data-continent="Africa">
													<div title="Mayotte" class="name">
														<span class="alpha-2">YT</span>
														Mayotte
													</div>
													
													<img class="flager" alt="Mayotte Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/yt.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Mexico" data-continent="North America">
													<div title="Mexico" class="name">
														<span class="alpha-2">MX</span>
														Mexico
													</div>
													
													<img class="flager" alt="Mexico Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/mx.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Moldova" data-continent="Europe">
													<div title="Moldova" class="name">
														<span class="alpha-2">MD</span>
														Moldova
													</div>
													
													<img class="flager" alt="Moldova Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/md.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Monaco" data-continent="Europe">
													<div title="Monaco" class="name">
														<span class="alpha-2">MC</span>
														Monaco
													</div>
													
													<img class="flager" alt="Monaco Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/mc.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Mongolia" data-continent="Asia">
													<div title="Mongolia" class="name">
														<span class="alpha-2">MN</span>
														Mongolia
													</div>
													
													<img class="flager" alt="Mongolia Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/mn.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Montenegro" data-continent="Europe">
													<div title="Montenegro" class="name">
														<span class="alpha-2">ME</span>
														Montenegro
													</div>
													
													<img class="flager" alt="Montenegro Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/me.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Montserrat" data-continent="North America">
													<div title="Montserrat" class="name">
														<span class="alpha-2">MS</span>
														Montserrat
													</div>
													
													<img class="flager" alt="Montserrat Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/ms.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Morocco" data-continent="Africa">
													<div title="Morocco" class="name">
														<span class="alpha-2">MA</span>
														Morocco
													</div>
													
													<img class="flager" alt="Morocco Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/ma.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Mozambique" data-continent="Africa">
													<div title="Mozambique" class="name">
														<span class="alpha-2">MZ</span>
														Mozambique
													</div>
													
													<img class="flager" alt="Mozambique Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/mz.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Myanmar" data-continent="Asia">
													<div title="Myanmar" class="name">
														<span class="alpha-2">MM</span>
														Myanmar
													</div>
													
													<img class="flager" alt="Myanmar Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/mm.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Namibia" data-continent="Africa">
													<div title="Namibia" class="name">
														<span class="alpha-2">NA</span>
														Namibia
													</div>
													
													<img class="flager" alt="Namibia Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/na.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Nauru" data-continent="Oceania">
													<div title="Nauru" class="name">
														<span class="alpha-2">NR</span>
														Nauru
													</div>
													
													<img class="flager" alt="Nauru Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/nr.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Nepal" data-continent="Asia">
													<div title="Nepal" class="name">
														<span class="alpha-2">NP</span>
														Nepal
													</div>
													
													<img class="flager" alt="Nepal Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/np.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Netherlands" data-continent="Europe">
													<div title="Netherlands" class="name">
														<span class="alpha-2">NL</span>
														Netherlands
													</div>
													
													<img class="flager" alt="Netherlands Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/nl.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="New Caledonia" data-continent="Oceania">
													<div title="New Caledonia" class="name">
														<span class="alpha-2">NC</span>
														New Caledonia
													</div>
													
													<img class="flager" alt="New Caledonia Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/nc.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="New Zealand" data-continent="Oceania">
													<div title="New Zealand" class="name">
														<span class="alpha-2">NZ</span>
														New Zealand
													</div>
													
													<img class="flager" alt="New Zealand Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/nz.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Nicaragua" data-continent="North America">
													<div title="Nicaragua" class="name">
														<span class="alpha-2">NI</span>
														Nicaragua
													</div>
													
													<img class="flager" alt="Nicaragua Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/ni.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Niger" data-continent="Africa">
													<div title="Niger" class="name">
														<span class="alpha-2">NE</span>
														Niger
													</div>
													
													<img class="flager" alt="Niger Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/ne.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Nigeria" data-continent="Africa">
													<div title="Nigeria" class="name">
														<span class="alpha-2">NG</span>
														Nigeria
													</div>
													
													<img class="flager" alt="Nigeria Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/ng.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Niue" data-continent="Oceania">
													<div title="Niue" class="name">
														<span class="alpha-2">NU</span>
														Niue
													</div>
													
													<img class="flager" alt="Niue Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/nu.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Norfolk Island" data-continent="Oceania">
													<div title="Norfolk Island" class="name">
														<span class="alpha-2">NF</span>
														Norfolk Island
													</div>
													
													<img class="flager" alt="Norfolk Island Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/nf.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="North Korea" data-continent="Asia">
													<div title="North Korea" class="name">
														<span class="alpha-2">KP</span>
														North Korea
													</div>
													
													<img class="flager" alt="North Korea Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/kp.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Northern Mariana Islands" data-continent="Oceania">
													<div title="Northern Mariana Islands" class="name">
														<span class="alpha-2">MP</span>
														Northern Mariana Islands
													</div>
													
													<img class="flager" alt="Northern Mariana Islands Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/mp.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Norway" data-continent="Europe">
													<div title="Norway" class="name">
														<span class="alpha-2">NO</span>
														Norway
													</div>
													
													<img class="flager" alt="Norway Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/no.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Oman" data-continent="Asia">
													<div title="Oman" class="name">
														<span class="alpha-2">OM</span>
														Oman
													</div>
													
													<img class="flager" alt="Oman Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/om.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Pakistan" data-continent="Asia">
													<div title="Pakistan" class="name">
														<span class="alpha-2">PK</span>
														Pakistan
													</div>
													
													<img class="flager" alt="Pakistan Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/pk.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Palau" data-continent="Oceania">
													<div title="Palau" class="name">
														<span class="alpha-2">PW</span>
														Palau
													</div>
													
													<img class="flager" alt="Palau Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/pw.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Panama" data-continent="North America">
													<div title="Panama" class="name">
														<span class="alpha-2">PA</span>
														Panama
													</div>
													
													<img class="flager" alt="Panama Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/pa.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Papua New Guinea" data-continent="Oceania">
													<div title="Papua New Guinea" class="name">
														<span class="alpha-2">PG</span>
														Papua New Guinea
													</div>
													
													<img class="flager" alt="Papua New Guinea Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/pg.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Paraguay" data-continent="South America">
													<div title="Paraguay" class="name">
														<span class="alpha-2">PY</span>
														Paraguay
													</div>
													
													<img class="flager" alt="Paraguay Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/py.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Peru" data-continent="South America">
													<div title="Peru" class="name">
														<span class="alpha-2">PE</span>
														Peru
													</div>
													
													<img class="flager" alt="Peru Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/pe.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Philippines" data-continent="Asia">
													<div title="Philippines" class="name">
														<span class="alpha-2">PH</span>
														Philippines
													</div>
													
													<img class="flager" alt="Philippines Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/ph.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Pitcairn" data-continent="Oceania">
													<div title="Pitcairn" class="name">
														<span class="alpha-2">PN</span>
														Pitcairn
													</div>
													
													<img class="flager" alt="Pitcairn Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/pn.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Poland" data-continent="Europe">
													<div title="Poland" class="name">
														<span class="alpha-2">PL</span>
														Poland
													</div>
													
													<img class="flager" alt="Poland Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/pl.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Portugal" data-continent="Europe">
													<div title="Portugal" class="name">
														<span class="alpha-2">PT</span>
														Portugal
													</div>
													
													<img class="flager" alt="Portugal Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/pt.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Puerto Rico" data-continent="North America">
													<div title="Puerto Rico" class="name">
														<span class="alpha-2">PR</span>
														Puerto Rico
													</div>
													
													<img class="flager" alt="Puerto Rico Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/pr.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Qatar" data-continent="Asia">
													<div title="Qatar" class="name">
														<span class="alpha-2">QA</span>
														Qatar
													</div>
													
													<img class="flager" alt="Qatar Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/qa.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Republic of the Congo" data-continent="Africa">
													<div title="Republic of the Congo" class="name">
														<span class="alpha-2">CG</span>
														Republic of the Congo
													</div>
													
													<img class="flager" alt="Republic of the Congo Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/cg.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Romania" data-continent="Europe">
													<div title="Romania" class="name">
														<span class="alpha-2">RO</span>
														Romania
													</div>
													
													<img class="flager" alt="Romania Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/ro.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Russia" data-continent="Europe">
													<div title="Russia" class="name">
														<span class="alpha-2">RU</span>
														Russia
													</div>
													
													<img class="flager" alt="Russia Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/ru.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Rwanda" data-continent="Africa">
													<div title="Rwanda" class="name">
														<span class="alpha-2">RW</span>
														Rwanda
													</div>
													
													<img class="flager" alt="Rwanda Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/rw.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Réunion" data-continent="Africa">
													<div title="Réunion" class="name">
														<span class="alpha-2">RE</span>
														R&eacute;union
													</div>
													
													<img class="flager" alt="Réunion Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/re.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Saint Barthélemy" data-continent="North America">
													<div title="Saint Barthélemy" class="name">
														<span class="alpha-2">BL</span>
														Saint Barth&eacute;lemy
													</div>
													
													<img class="flager" alt="Saint Barthélemy Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/bl.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Saint Helena, Ascension and Tristan da Cunha" data-continent="Africa">
													<div title="Saint Helena, Ascension and Tristan da Cunha" class="name">
														<span class="alpha-2">SH</span>
														Saint Helena, Ascension and Tristan da Cunha
													</div>
													
													<img class="flager" alt="Saint Helena, Ascension and Tristan da Cunha Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/sh.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Saint Kitts and Nevis" data-continent="North America">
													<div title="Saint Kitts and Nevis" class="name">
														<span class="alpha-2">KN</span>
														Saint Kitts and Nevis
													</div>
													
													<img class="flager" alt="Saint Kitts and Nevis Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/kn.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Saint Lucia" data-continent="North America">
													<div title="Saint Lucia" class="name">
														<span class="alpha-2">LC</span>
														Saint Lucia
													</div>
													
													<img class="flager" alt="Saint Lucia Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/lc.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Saint Martin" data-continent="North America">
													<div title="Saint Martin" class="name">
														<span class="alpha-2">MF</span>
														Saint Martin
													</div>
													
													<img class="flager" alt="Saint Martin Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/mf.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Saint Pierre and Miquelon" data-continent="North America">
													<div title="Saint Pierre and Miquelon" class="name">
														<span class="alpha-2">PM</span>
														Saint Pierre
													</div>
													
													<img class="flager" alt="Saint Pierre and Miquelon Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/pm.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Saint Vincent and the Grenadines" data-continent="North America">
													<div title="Saint Vincent and the Grenadines" class="name">
														<span class="alpha-2">VC</span>
														Saint Vincent
													</div>
													
													<img class="flager" alt="Saint Vincent and the Grenadines Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/vc.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Samoa" data-continent="Oceania">
													<div title="Samoa" class="name">
														<span class="alpha-2">WS</span>
														Samoa
													</div>
													
													<img class="flager" alt="Samoa Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/ws.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="San Marino" data-continent="Europe">
													<div title="San Marino" class="name">
														<span class="alpha-2">SM</span>
														San Marino
													</div>
													
													<img class="flager" alt="San Marino Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/sm.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Sao Tome and Principe" data-continent="Africa">
													<div title="Sao Tome and Principe" class="name">
														<span class="alpha-2">ST</span>
														Sao Tome
													</div>
													
													<img class="flager" alt="Sao Tome and Principe Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/st.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Saudi Arabia" data-continent="Asia">
													<div title="Saudi Arabia" class="name">
														<span class="alpha-2">SA</span>
														Saudi Arabia
													</div>
													
													<img class="flager" alt="Saudi Arabia Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/sa.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Senegal" data-continent="Africa">
													<div title="Senegal" class="name">
														<span class="alpha-2">SN</span>
														Senegal
													</div>
													
													<img class="flager" alt="Senegal Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/sn.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Serbia" data-continent="Europe">
													<div title="Serbia" class="name">
														<span class="alpha-2">RS</span>
														Serbia
													</div>
													
													<img class="flager" alt="Serbia Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/rs.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Seychelles" data-continent="Africa">
													<div title="Seychelles" class="name">
														<span class="alpha-2">SC</span>
														Seychelles
													</div>
													
													<img class="flager" alt="Seychelles Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/sc.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Sierra Leone" data-continent="Africa">
													<div title="Sierra Leone" class="name">
														<span class="alpha-2">SL</span>
														Sierra Leone
													</div>
													
													<img class="flager" alt="Sierra Leone Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/sl.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Singapore" data-continent="Asia">
													<div title="Singapore" class="name">
														<span class="alpha-2">SG</span>
														Singapore
													</div>
													
													<img class="flager" alt="Singapore Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/sg.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Sint Maarten" data-continent="North America">
													<div title="Sint Maarten" class="name">
														<span class="alpha-2">SX</span>
														Sint Maarten
													</div>
													
													<img class="flager" alt="Sint Maarten Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/sx.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Slovakia" data-continent="Europe">
													<div title="Slovakia" class="name">
														<span class="alpha-2">SK</span>
														Slovakia
													</div>
													
													<img class="flager" alt="Slovakia Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/sk.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Slovenia" data-continent="Europe">
													<div title="Slovenia" class="name">
														<span class="alpha-2">SI</span>
														Slovenia
													</div>
													
													<img class="flager" alt="Slovenia Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/si.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Solomon Islands" data-continent="Oceania">
													<div title="Solomon Islands" class="name">
														<span class="alpha-2">SB</span>
														Solomon Islands
													</div>
													
													<img class="flager" alt="Solomon Islands Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/sb.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Somalia" data-continent="Africa">
													<div title="Somalia" class="name">
														<span class="alpha-2">SO</span>
														Somalia
													</div>
													
													<img class="flager" alt="Somalia Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/so.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="South Africa" data-continent="Africa">
													<div title="South Africa" class="name">
														<span class="alpha-2">ZA</span>
														South Africa
													</div>
													
													<img class="flager" alt="South Africa Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/za.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="South Georgia and the South Sandwich Islands" data-continent="Antarctica">
													<div title="South Georgia and the South Sandwich Islands" class="name">
														<span class="alpha-2">GS</span>
														South Georgia
													</div>
													
													<img class="flager" alt="South Georgia and the South Sandwich Islands Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/gs.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="South Korea" data-continent="Asia">
													<div title="South Korea" class="name">
														<span class="alpha-2">KR</span>
														South Korea
													</div>
													
													<img class="flager" alt="South Korea Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/kr.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="South Sudan" data-continent="Africa">
													<div title="South Sudan" class="name">
														<span class="alpha-2">SS</span>
														South Sudan
													</div>
													
													<img class="flager" alt="South Sudan Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/ss.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Spain" data-continent="Europe">
													<div title="Spain" class="name">
														<span class="alpha-2">ES</span>
														Spain
													</div>
													
													<img class="flager" alt="Spain Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/es.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Sri Lanka" data-continent="Asia">
													<div title="Sri Lanka" class="name">
														<span class="alpha-2">LK</span>
														Sri Lanka
													</div>
													
													<img class="flager" alt="Sri Lanka Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/lk.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="State of Palestine" data-continent="Asia">
													<div title="State of Palestine" class="name">
														<span class="alpha-2">PS</span>
														State of Palestine
													</div>
													
													<img class="flager" alt="State of Palestine Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/ps.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Sudan" data-continent="Africa">
													<div title="Sudan" class="name">
														<span class="alpha-2">SD</span>
														Sudan
													</div>
													
													<img class="flager" alt="Sudan Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/sd.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Suriname" data-continent="South America">
													<div title="Suriname" class="name">
														<span class="alpha-2">SR</span>
														Suriname
													</div>
													
													<img class="flager" alt="Suriname Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/sr.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Svalbard and Jan Mayen" data-continent="Europe">
													<div title="Svalbard and Jan Mayen" class="name">
														<span class="alpha-2">SJ</span>
														Svalbard and Jan Mayen
													</div>
													
													<img class="flager" alt="Svalbard and Jan Mayen Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/sj.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Swaziland" data-continent="Africa">
													<div title="Swaziland" class="name">
														<span class="alpha-2">SZ</span>
														Swaziland
													</div>
													
													<img class="flager" alt="Swaziland Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/sz.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Sweden" data-continent="Europe">
													<div title="Sweden" class="name">
														<span class="alpha-2">SE</span>
														Sweden
													</div>
													
													<img class="flager" alt="Sweden Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/se.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Switzerland" data-continent="Europe">
													<div title="Switzerland" class="name">
														<span class="alpha-2">CH</span>
														Switzerland
													</div>
													
													<img class="flager" alt="Switzerland Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/ch.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Syrian Arab Republic" data-continent="Asia">
													<div title="Syrian Arab Republic" class="name">
														<span class="alpha-2">SY</span>
														Syrian Arab Republic
													</div>
													
													<img class="flager" alt="Syrian Arab Republic Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/sy.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Taiwan" data-continent="Asia">
													<div title="Taiwan" class="name">
														<span class="alpha-2">TW</span>
														Taiwan
													</div>
													
													<img class="flager" alt="Taiwan Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/tw.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Tajikistan" data-continent="Asia">
													<div title="Tajikistan" class="name">
														<span class="alpha-2">TJ</span>
														Tajikistan
													</div>
													
													<img class="flager" alt="Tajikistan Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/tj.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Tanzania" data-continent="Africa">
													<div title="Tanzania" class="name">
														<span class="alpha-2">TZ</span>
														Tanzania
													</div>
													
													<img class="flager" alt="Tanzania Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/tz.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Thailand" data-continent="Asia">
													<div title="Thailand" class="name">
														<span class="alpha-2">TH</span>
														Thailand
													</div>
													
													<img class="flager" alt="Thailand Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/th.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Timor-Leste" data-continent="Asia">
													<div title="Timor-Leste" class="name">
														<span class="alpha-2">TL</span>
														Timor-Leste
													</div>
													
													<img class="flager" alt="Timor-Leste Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/tl.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Togo" data-continent="Africa">
													<div title="Togo" class="name">
														<span class="alpha-2">TG</span>
														Togo
													</div>
													
													<img class="flager" alt="Togo Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/tg.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Tokelau" data-continent="Oceania">
													<div title="Tokelau" class="name">
														<span class="alpha-2">TK</span>
														Tokelau
													</div>
													
													<img class="flager" alt="Tokelau Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/tk.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Tonga" data-continent="Oceania">
													<div title="Tonga" class="name">
														<span class="alpha-2">TO</span>
														Tonga
													</div>
													
													<img class="flager" alt="Tonga Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/to.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Trinidad and Tobago" data-continent="South America">
													<div title="Trinidad and Tobago" class="name">
														<span class="alpha-2">TT</span>
														Trinidad and Tobago
													</div>
													
													<img class="flager" alt="Trinidad and Tobago Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/tt.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Tunisia" data-continent="Africa">
													<div title="Tunisia" class="name">
														<span class="alpha-2">TN</span>
														Tunisia
													</div>
													
													<img class="flager" alt="Tunisia Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/tn.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Turkey" data-continent="Asia">
													<div title="Turkey" class="name">
														<span class="alpha-2">TR</span>
														Turkey
													</div>
													
													<img class="flager" alt="Turkey Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/tr.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Turkmenistan" data-continent="Asia">
													<div title="Turkmenistan" class="name">
														<span class="alpha-2">TM</span>
														Turkmenistan
													</div>
													
													<img class="flager" alt="Turkmenistan Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/tm.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Turks and Caicos Islands" data-continent="North America">
													<div title="Turks and Caicos Islands" class="name">
														<span class="alpha-2">TC</span>
														Caicos Islands
													</div>
													
													<img class="flager" alt="Turks and Caicos Islands Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/tc.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Tuvalu" data-continent="Oceania">
													<div title="Tuvalu" class="name">
														<span class="alpha-2">TV</span>
														Tuvalu
													</div>
													
													<img class="flager" alt="Tuvalu Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/tv.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Uganda" data-continent="Africa">
													<div title="Uganda" class="name">
														<span class="alpha-2">UG</span>
														Uganda
													</div>
													
													<img class="flager" alt="Uganda Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/ug.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Ukraine" data-continent="Europe">
													<div title="Ukraine" class="name">
														<span class="alpha-2">UA</span>
														Ukraine
													</div>
													
													<img class="flager" alt="Ukraine Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/ua.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="United Arab Emirates" data-continent="Asia">
													<div title="United Arab Emirates" class="name">
														<span class="alpha-2">AE</span>
														United Arab Emirates
													</div>
													
													<img class="flager" alt="United Arab Emirates Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/ae.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="United Kingdom" data-continent="Europe">
													<div title="United Kingdom" class="name">
														<span class="alpha-2">GB</span>
														United Kingdom
													</div>
													
													<img class="flager" alt="United Kingdom Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/gb.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="United States Minor Outlying Islands" data-continent="North America">
													<div title="United States Minor Outlying Islands" class="name">
														<span class="alpha-2">UM</span>
														Outlying Islands
													</div>
													
													<img class="flager" alt="United States Minor Outlying Islands Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/um.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="United States of America" data-continent="North America">
													<div title="United States of America" class="name">
														<span class="alpha-2">US</span>
														USA
													</div>
													
													<img class="flager" alt="United States of America Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/us.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Uruguay" data-continent="South America">
													<div title="Uruguay" class="name">
														<span class="alpha-2">UY</span>
														Uruguay
													</div>
													
													<img class="flager" alt="Uruguay Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/uy.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Uzbekistan" data-continent="Asia">
													<div title="Uzbekistan" class="name">
														<span class="alpha-2">UZ</span>
														Uzbekistan
													</div>
													
													<img class="flager" alt="Uzbekistan Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/uz.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Vanuatu" data-continent="Oceania">
													<div title="Vanuatu" class="name">
														<span class="alpha-2">VU</span>
														Vanuatu
													</div>
													
													<img class="flager" alt="Vanuatu Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/vu.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Venezuela (Bolivarian Republic of)" data-continent="South America">
													<div title="Venezuela (Bolivarian Republic of)" class="name">
														<span class="alpha-2">VE</span>
														Venezuela
													</div>
													
													<img class="flager" alt="Venezuela (Bolivarian Republic of) Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/ve.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Vietnam" data-continent="Asia">
													<div title="Vietnam" class="name">
														<span class="alpha-2">VN</span>
														Vietnam
													</div>
													
													<img class="flager" alt="Vietnam Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/vn.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Virgin Islands" data-continent="North America">
													<div title="Virgin Islands" class="name">
														<span class="alpha-2">VG</span>
														Virgin Islands
													</div>
													
													<img class="flager" alt="Virgin Islands (British) Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/vg.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Virgin Islands" data-continent="North America">
													<div title="Virgin Islands" class="name">
														<span class="alpha-2">VI</span>
														Virgin Islands
													</div>
													
													<img class="flager" alt="Virgin Islands (U.S.) Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/vi.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Wallis and Futuna" data-continent="Oceania">
													<div title="Wallis and Futuna" class="name">
														<span class="alpha-2">WF</span>
														Wallis and Futuna
													</div>
													
													<img class="flager" alt="Wallis and Futuna Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/wf.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Western Sahara" data-continent="Africa">
													<div title="Western Sahara" class="name">
														<span class="alpha-2">EH</span>
														Western Sahara
													</div>
													
													<img class="flager" alt="Western Sahara Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/eh.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Yemen" data-continent="Asia">
													<div title="Yemen" class="name">
														<span class="alpha-2">YE</span>
														Yemen
													</div>
													
													<img class="flager" alt="Yemen Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/ye.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Zambia" data-continent="Africa">
													<div title="Zambia" class="name">
														<span class="alpha-2">ZM</span>
														Zambia
													</div>
													
													<img class="flager" alt="Zambia Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/zm.svg">
												</div>
											</div>
											<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
												<div class="country" data-name="Zimbabwe" data-continent="Africa">
													<div title="Zimbabwe" class="name">
														<span class="alpha-2">ZW</span>
														Zimbabwe
													</div>
													
													<img class="flager" alt="Zimbabwe Flag" src="<?php echo base_url() ?>assets/fonts/flags/flags/4x3/zw.svg">
												</div>
											</div>
										</div>

									</div>
								</div>
							</div>
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
						<img id="right-inner-banner" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMgAAAB4CAMAAACATE3ZAAAC9FBMVEUAAADVytPSoqjUcJBPw/HsV6vxTE1LwfHxa5GB1PSJUpyOy0+by1LqPZlPwvFRw/HyZW1x0PTqPJjwTExLwfDxT0/wT0+LVZ7qQppXxfGUyk/qPZj/w1OKU57xUlLrRJzrR51Yx/LsTaHsTqLzWl9eyfKk1W6Zaaru0X3qPZhOwvGJUZyKU53xUE/qQZqLVp+NWKCf0VqOWqHxVleQXKPxV1n/yGTrS6Fbx/H+zmVkyvKaZLaGT5uHUJvqPppQw/HrQ5uNWKDrRp1Sx/PxVVSUYaj/ymr/xFefzFfxUFGfzFf/ylTsUKOTX6XxWVmi12LtVKSIUJyIUJzxS0zqPpjxTk6ay1T+vl5SxPFTxPHxVVXrSJ6SXKKWZajxYmPpOZHQxlOGvqv+wFadylTqQJnxU1PxVVXrRZ2OWaBVxfGRXaPyXFql0WKJRZTxTEmcy1P/xFbqQJn/xVrqQJn/xFn/xVmi1lWMWKD/xl6izlzrRZ2izVyRXaOl0GKKeHi1yFNDy/mIUZz/wlXxS0yGR6Gey1XxXFz/xFeNdrT/xFihvVrGzGD/xl+OWaGNWKGkzl5Ut+i3nEtFwfiDZqs3wP//x2HtTYrtXqm9xIGfcrD/yGBUxPGQW6KQXaNJwPCayU/wSkr/wlLpOpaGTpqZtz5Jut3xSUmatj2FTZpJuttJwfH/wlCZyU6ay1DpOpebylCPxDxLutz/wVL6Pkv/w1T/w0Q8uun2QkqPtkdHu+DzR0qVvD2ax03/wz9JvumavkVJvOORwT1JwfNCuuP/w0pJv+02ue2FRKKIUZrhwluawkgxuvPpNoP9O0vpNIX/zE7vwlOPvqHnJIqQvkKgrT9NutrawWLoVEngXkfTbUbMdkWpokCNyT1fu8qTvp3pNoq6v33ycm7/0kyTvkq5jkLpMIbqNYH7s1fFgESwmkFSu9XoMZemvo6IZ4aNnFuOqlGazVDZZkfAhkJ0vLiov4ztTXrKwG+LimrEx1G8x1GoyFCNwz+nFEy1AAAAnnRSTlMABAgLxxz9+hAL1P7v3NOkFxPz8e/RybS0YP7687yglXFOQzo0MhwbD+vh38q/rKZ7e2tjXVlKST8zHhT789a1o5WCbmg2Hs65ramDX0NCLSv46+fm2seXkHxwVUknI/79/OzX0JB+fHFoUk47+/Xf18nDv7Cli4d2a2pWTUX9/Pnn39/X0Mq/vrWlomlmT0797eTc2dS/tpthXldXT94/JycAAAt9SURBVHjazJhJaBNRGMe/JIVgLC1CICjm0INW2kJqCaKmRYpURSmiBxdoweWioijiijsoiDsuoKgThhCYdCIayQQDpqiJSUovEWlPthS8iRsobiffTJYvznszjphp5kcPpeTy67f83xcwF3v/+TugwYzFDUNc0+xZYH3s/b71gkdDo6XZzRHcDctngLWx9ftChB1sjWVchWXWLsqAJy8IIaHdzlC8K2sgDUvBshz39ISEEKGf1pjdwKlomgfWpKIR8jE0nBxF22KwHvYBzzpiobC+VTUbTA2CuwUshmPAUyoGPemzsKkonLPBStiPV2sILhuloc1ysA5XlE2F9P3RVNxf2AwWYZe3Wy4H4kONnaihzSYbWIBd3h6sBk56UaPJyRlhWd1D3nHfW95USFdpNv7QGJLhqrBSNAZ2eSs9hXQojbJ0eRNXxRA3PDz8ElWsFI2Oe94Qiz7UQI+XyUgkEh5+UTKxUDTa/d48lgMReklTlTWwHuFIOByORJ4pJlaKRn+HokHTDrM2lzSQF8+IR9FEu7ucO8F0aI1utkb3Hv/yNq4MNhbxKJtw2ibTHSh93m4hxGbPDXL90SKkIGVkE4sESlcPaqgQ8tdOMzyGiQeaJHVMmqcvUGy92FR0Qc6jh3rS0ST88gVHMd1Xo80naHsIrhb8Z6smXWVS92j0YT0YDNjcOpOOJhE0qVM0Hg7pIHgAWpyUSBJF0GQYTeoRjf0hPXoGgZi4mZNOmwzVMRptLkFPpBNkFrfpTDqC0ViHq7FTt7FcdlCY10RNupZJnW6t1nWCjgd+AbS0AT3oSTcYjWAiHkGvID6oMGtZubHoSTccjeaF/C7dxiJnITKjWWPSqUAZmv5odLTrTnoXVGPbVIwQPQ00MR6N5kdIh7oTNjvxsUhhMFBMicbBdXoe+T5QM9up0VjGA6XNjJp4BaZB6a+9QNNyMzEWNmCic/82Q83xMzVyQiiXkyPEAQxuTyRiBkx0AqWt5gMfOENr5HP5758+ffyQE84MAoMlc0cmsuH/Mmmo+XnSy2isXP7To9eEk2f7gMV+XipMZJMGioImZn8t3NfNEvn46InM6wvM7LrE83ym8GXUkEmSYywvd+3jvYPl8aHo8Tb4ebUdKBZsE3k+npG2jqYpE0OB4m6u/XO+i7mvnrxWPB48iAZXLQA1B4mHbJKaNGBC31pOEzSgtYdVkO+PZI3og4fBYDC6Yb560olFyeR9Fk30A6VKY54Nao+P2VivKxoy29dCNfaVIl9CTE0ljJqYqgED+RBr0p8TjWCF6N7dUMURHhGlqSQGig7FkHdTGmaehbmTb54q1UAar0KFFXNFvgrpWyxrwCQWSYxep2bD1LPwbG/j56IGEn14FMockD2QeGr83WjsbxqxxGhk6zwwi0H1WSiE2g8HDn1GAzRZCEUW8SKvMhmZ+IvJWHo0vXVcWgNm4RXUGp2DsPZhNMjiULEZK5OOSIUvWb1yJLPJV+OSJMaXgDn4VeVo72wFsJ0jHkyUaFwSF3kKEo3ZpJZHOhFRNMjnNoIpBP44C0k1AkBYGNQiumo+6aw4z0CUJpmBEkumE2OvRqSMYi/uB8SUxyL5xVXUgPmNWBCKDfOJiMg0SX1NUGs4Fk5kFY3yh24BYs5j0bUjAEVWszwwUNYu4DVITVVMcFPFJkdSGaWGplUEH4sC0WiFEieCKMI2OSBqmXxLKya4qcKvxlMSj4imrK3LFY2uigbYt6MH26Tx4lxNk/GxRAw3VXhyRN5UVR5zV0DtaV1f1ggAshA9tEzmbHnMayCRqzGdlElnI5URR7AgNZ50odvV5YAq1jIn3bhJpjD5Lp0gvGNoiPsWQO3xy6/3jqIGsipogOjMH5omolSY+vr+/VQhleEpFoEJ5InGZfXtd0zfAE1+PqZU8ESRycRpxwNgBv7OKw7qgG2MGjU5hSaUSlz+QahJN59DxMOoya8CmhhCPALTxe6HQeP8q4m40gbTxe9mziUkqiiM49/M4DBhAzKDIhqO6BC5UBAxaTOISGVJCT2EgooetjCiiKCMNkVFD4g2BW28XuTOwnkxNxiYEYZZJjrCIPgESdSKVgpB0KZzrzXfeM851xt4xvltKsjFj3P+9/99Z+F5PBAL1EQ//4/Jp8NQLB6ihzWTmv8wGeuHooDDonWiNVSh8D2uUhXiutjVCwJgDovRsEaUa1J+xaLHyEejxtBdWa4FATyOMjSGJwjjw1yVmvJfI3ErIi8MGvUBWZY9Ik7E/ixEaYynR4Mao+nhqEk1WvA4cGS7hjsiE3wggFamxqgO+XM8zK9GzjDMm97L6t2yTlMZIIKSHtY1iAfXBCl//WRsB48nhygNwhAIoJWlgZB/TXBNzh+5M2bqgcNi2c28hnwdRHA8VBhx1LBiEj149JipyMu8RkDOE2kEggARzMYEahhMOJF/BEdfYOQ5wyLRIBFHfCCEExhx1DCapMM8ETh0n3+7HugaXWeJBnLWBUJopb5ULJV0lHUm0VsAYOvnD4u6hrydXhDD6eh4mK+BH69hxqFcs4PGSeZ7V5y8kvZRGvI9EEVr+Xha6z4u/M/wW9jiDW0SH5k+WeajNOTaPhCF/12M0rBmchz+cdhQjfH49MpVH0Yc6QJB+OvOJDZjZgZoYvgM7z8IaHK10IRofP1y+YdME7CDCIiGV5KS6rdMii/ALZRWKKCgGsemp79+Wc+xPCIdIACbv+62IhEUdT6TCVpQKSyUkJ505G81xnWNbG7tckSm6QQAARpOhXjoqBspaybpvEn0sfEh5uXI2NalWstl15dZHh4Bw+Ip1NCYmgvGrCQ+bxI6Qe8D90fiK9NEY21yMhthidTvvkaPV9I10GR2xtwEqzGseWDSEVv/SvxnLkc01qmLJWZYvJHXQFRp0aJJSDuTh8Ci/2cuO5nNTjIvVu2uD4ttRIMmkfxu8TMcCg+fBxaN7h+ThPWsjCICh0VbsyKxSCZWf6esVeP+W8Cgr0mOXF7OLi9THmLWwn2VTBG9UGKWTFKvgIEjoDUFSTkGXfCwWKdIHJOpBSsmqZmn7UDTKZtxF3afinN8k/nMziaxedV5gQ4IdQ7ih8VLlTwTZWojtZNJ5rtKKmjAmLzrMoX4tbCiWeKZqHPBjPnFSs0myP+T6uxQSL2ph9sFYnDUSbxDSZBqNFuzYt9USafHBUhZk6nIRRDGDb6JtLjEN8nMJP79YHMF5Gkx9agGgQygCV2NfJPYnJq/hpWX4C8Nph61ZSCSNifXRF1d4lRIbHWqIFDn/KBjd5uKdIFYBr1oQlcjO+lBcvMQ5cwp0Lhp6hGwgWBOneGbLDC3xtiCKhWieLVq7POYeUQaQDh+bjWSrZGxa2UWt5KOKE5iUm3q0QVF4FIVN/Lq3Cg112fmEpSx19EhI8LXW341KjyTqVmyNRqSrjLObjBQAh4Ajh7emeDWiElPShS330dM7pXPBsXCjtXI2hp5SceQmHh4hqCI2AYkxGRrxKQjitTs5orUVvdBcblwm1LArTG/oaSMSSda57p7PbzTuHcRik67STVubpkElzYNFaJIlRdcNjfnNIqugdXI3xq1aXhpJpk0alQA+NgZr0aNIuM32xpnYrHM4qwqIboGroVGjQ47FB+sRm7JS/MLG0pim0a3pgG2u0wNB+wlFT0SP/KJRBI1nJXdLt5aWIsae4YNt0Y+ikQ0HLy10FPdAaUAvxox4lV5DYDO0tQgDDiVHTTaHLwHoEhLyWgQuk1MNI0K4wMQajSUxG/Oo6rRVAOTjhp7HnFr1ag4q9pcgGxLuqelwQ6lh/+pYrTQNOy8p96mlgYoTciDqrJ9NEQNpGEr6Z6S1TBsjeRvze20BtgDev2VsgbBRbZG1MBsGJIe6WyEEsfeXeWVCN6eQRcwqZabfI2l9cFl42p/7nQ+H3QAh94PgjX+AJREZiMXWWr3AAAAAElFTkSuQmCC" alt="Site Logo" class="pl-2 img-fluid animated fadeIn mt-2" />
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