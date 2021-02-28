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
						<li class="breadcrumb-item active">Help</li>
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
								<div class="page-help-search">
									<img class="page-help-image" alt="Help" src="data:image/png;base64,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">
									<div class="page-help-wrap">
										<h3 class="page-help-heading">What can we help you with?</h3>
										<div class="page-help-inputs">
											<div class="input-group">
												<input class="form-control form-control-lg" type="text" placeholder="Enter question or topic here">
												<span class="input-group-btn">
                                                    <button class="btn btn-secondary btn-lg ripple" type="button">Search</button>
												</span>
											</div>
										</div>
										<div class="page-help-popular-searches">
											<span class="page-help-popular-searches-heading">Popular Searches</span>
											<span><a href="#">Submit,</a> <a href="#">Press,</a> <a href="#">Release,</a> <a href="#">How do,</a> <a href="#">Lorem Ipsum</a></span>
										</div>
									</div>
								</div>

								<div class="page-help-content mt-4">
									<div class="row">
										<div class="col-md-4">
											<div class="page-help-section">
												<span class="page-help-icon fas fa-question"></span>
												<a class="page-help-center-name" href="#">General &amp; FAQs</a>
												<div class="page-help-center-desc">
													Lorem Ipsum dolor sit amet,<br /> consectetur adipiscing elit.
												</div>
											</div>
										</div>

										<div class="col-md-4">
											<div class="page-help-section">
												<i class="page-help-icon fas fa-newspaper"></i>
												<a class="page-help-center-name" href="#">Newsroom</a>
												<div class="page-help-center-desc">
													Lorem Ipsum dolor sit amet,<br /> consectetur adipiscing elit.
												</div>
											</div>
										</div>

										<div class="col-md-4">
											<div class="page-help-section">
												<i class="page-help-icon fas fa-chart-line"></i>
												<a class="page-help-center-name" href="#">Analytics</a>
												<div class="page-help-center-desc">
													Lorem Ipsum dolor sit amet,<br /> consectetur adipiscing elit.
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="page-help-submit mt-4">
									<i class="page-help-submit-icon fas fa-ticket-alt"></i>
									<div class="page-help-submit-desc">
										<h5>Cant find what you are looking for?</h5>
										<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
									</div>
									<a class="btn btn-danger btn-lg ripple" href="<?php echo base_url() ?>index.php/welcome/helpTicket">Submit a ticket</a>
								</div>
							</div>
						</div>
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