<!doctype html>
<html lang="en" class="semi-dark">
<title> @yield('title')  </title>
<head>


	<!-- Required meta tags -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--favicon-->
	<link rel="icon" href="<?php echo asset(''); ?>assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->

	<link href="<?php echo asset(''); ?>assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="<?php echo asset(''); ?>assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="<?php echo asset(''); ?>assets/plugins/highcharts/css/highcharts.css" rel="stylesheet" />
	<link href="<?php echo asset(''); ?>assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
	<link href="<?php echo asset(''); ?>assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="<?php echo asset(''); ?>assets/css/pace.min.css" rel="stylesheet" />
	<script src="<?php echo asset(''); ?>assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<!-- CSS only -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link href="<?php echo asset(''); ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo asset(''); ?>assets/css/app.css" rel="stylesheet">
	<link href="<?php echo asset(''); ?>assets/css/icons.css" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="<?php echo asset(''); ?>assets/css/dark-theme.css" />
	<link rel="stylesheet" href="<?php echo asset(''); ?>assets/css/semi-dark.css" />
	<link rel="stylesheet" href="<?php echo asset(''); ?>assets/css/header-colors.css" />


	<style>
		.switch input {
		display: none;
		}

		.switch {
		display: inline-block;
		width: 60px;
		height: 30px;
		margin: 8px;
		transform: translateY(50%);
		position: relative;
		}

		.slider {
		position: absolute;
		top: 0;
		bottom: 0;
		left: 0;
		right: 0;
		border-radius: 30px;
		box-shadow: 0 0 0 2px #777, 0 0 4px #777;
		cursor: pointer;
		border: 4px solid transparent;
		overflow: hidden;
		transition: .4s;
		}

		.slider:before {
		position: absolute;
		content: "";
		width: 100%;
		height: 100%;
		background: #777;
		border-radius: 30px;
		transform: translateX(-30px);
		transition: .4s;
		}

		input:checked+.slider:before {
		transform: translateX(30px);
		background: limeGreen;
		}

		input:checked+.slider {
		box-shadow: 0 0 0 2px limeGreen, 0 0 2px limeGreen;
		}

		.grid{
			margin: 40px;
			display: grid;
			grid-template-columns: repeat(3, 1fr);
			grid-gap: 30px;
			align-items: center;

		}
		.grid > article{
			background: #eee5e9;
			border:none;
			box-shadow: 2px 2px 6px 0px rgba(0, 0, 0, 0);
			border-radius: 20px;
			text-align: center;
			width: 250px;
			transition: transform .3s;
		}

		.grid > article:hover{
			transform: translateY(5px);
			box-shadow: 2px 2px 26px 0px rgba(0, 0, 0, 0.3);

		}
		.grid > article img{
			width: 100%;
			border-top-left-radius: 20px;
			border-top-right-radius: 20px;

		}
		.text
		{
			padding: 0 20px 20px;
		}
		.text h3{


		}
		.text button{
			background: #ef6f6c;
			border-radius: 20px;
			border: none;
			color: #fff;
			padding: 10px;
			width: 100px;
			font-weight: 600;
			text-transform: uppercase;
			cursor: pointer;

		}

		@media (max-width : 768px){
			.grid{
				grid-template-columns: repeat(2, 1fr);
			}
		}

		@media (max-width: 500px){
			.grid{
				grid-template-columns: repeat(1, 1fr);
			}

			.grid > article{
				text-align: center;
			}
		}

	</style>
	<title>webscome</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="<?php echo asset(''); ?>assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">Webscome</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="/admin">
						<div class="parent-icon"><i class='bx bx-home-circle'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>

				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-cart'></i>
						</div>
						<div class="menu-title">Service & Categories</div>
					</a>
					<ul>

						<li>
							<a href="javascript:;" class="has-arrow">
								<div class="parent-icon"><i class='bx bx-right-arrow-alt'></i>
								</div>
								<div class="menu-title">Categories</div>
							</a>
							<ul>
								<li> <a href="/cat"><i class="bx bx-radio-circle-marked"></i>Service-MainCategories</a>
								</li>
								<li> <a href="/subCat"><i class="bx bx-radio-circle-marked"></i>Service-SubCategories</a>
								</li>
								<li> <a href="/child_cat"><i class="bx bx-radio-circle-marked"></i>Service-ChildCategories</a>
								</li>
							</ul>
						</li>


						<li> <a href="coupons"><i class="bx bx-right-arrow-alt"></i>Coupon</a>
						</li>
					</ul>
				</li>

				<li class="menu-label">Main-Webscome</li>

				<li>
					<a href="/about_us">
						<div class="parent-icon"><i class='bx bx-radio-circle-marked'></i>
						</div>
						<div class="menu-title">About-Us</div>
					</a>
				</li>
				<li>
					<a href="/blogs">
						<div class="parent-icon"><i class='bx bx-radio-circle-marked'></i>
						</div>
						<div class="menu-title">Blogs</div>
					</a>
				</li>
                <li>
					<a href="/careers">
						<div class="parent-icon"><i class='bx bx-radio-circle-marked'></i>
						</div>
						<div class="menu-title">Careers</div>
					</a>
				</li>
                <li>
					<a href="{{ route('admin.contact_us') }}">
						<div class="parent-icon"><i class='bx bx-radio-circle-marked'></i>
						</div>
						<div class="menu-title">Contact Us</div>
					</a>
				</li>
				<li>
					<a href="/career_applications">
						<div class="parent-icon"><i class='bx bx-envelope'></i>
						</div>
						<div class="menu-title">Career-Applications</div>
					</a>
				</li>
				<li>
					<a href="/teams">
						<div class="parent-icon"><i class='bx bx-envelope'></i>
						</div>
						<div class="menu-title">Manage Team</div>
					</a>
				</li>

				<li class="menu-label">Orders</li>
				<li>
					<a href="{{ route('admin.all_orders') }}">
						<div class="parent-icon"><i class='bx bx-repeat'></i>
						</div>
						<div class="menu-title">All Orders</div>
					</a>
				</li>

				<li>
					<a href="{{ route('new_orders') }}">
						<div class="parent-icon"><i class='bx bx-repeat'></i>
						</div>
						<div class="menu-title">Assign Orders</div>
					</a>
				</li>
				
				<li>
					<a href="{{ route('combo_orders') }}">
						<div class="parent-icon"><i class='bx bx-repeat'></i>
						</div>
						<div class="menu-title">Combo Service Orders</div>
					</a>
				</li>
				
				<li>
					<a href="{{ route('manage_spares') }}">
						<div class="parent-icon"><i class='bx bx-repeat'></i>
						</div>
						<div class="menu-title">Manage Spare Parts</div>
					</a>
				</li>


				<li class="menu-label">Professional-Webscome</li>
				<li>
					<a href="{{ route('professional_commission') }}">
						<div class="parent-icon"><i class='bx bx-cut'></i>
						</div>
						<div class="menu-title">Professional Commission</div>
					</a>
				</li>
				<li>
					<a href="{{ route('admin.professional_payment') }}">
						<div class="parent-icon"><i class='bx bx-cut'></i>
						</div>
						<div class="menu-title">Professional Monthly Commission</div>
					</a>
				</li>

				<li>
					<a href="{{ route('professional_requests') }}">
						<div class="parent-icon"><i class='bx bx-envelope'></i>
						</div>
						<div class="menu-title">Professional Requests</div>
					</a>
				</li>
				<li>
					<a href="{{ route('verified_professionals') }}">
						<div class="parent-icon"><i class='bx bx-user'></i>
						</div>
						<div class="menu-title">Verified Professionals</div>
					</a>
				</li>


			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
					<div class="top-menu-left d-none d-lg-block">
						<ul class="nav">
						  <li class="nav-item">
							<a class="nav-link" href="app-emailbox.html"><i class='bx bx-envelope'></i></a>
						  </li>
						  <li class="nav-item">
							<a class="nav-link" href="app-chat-box.html"><i class='bx bx-message'></i></a>
						  </li>
						  <li class="nav-item">
							<a class="nav-link" href="app-fullcalender.html"><i class='bx bx-calendar'></i></a>
						  </li>
						  <li class="nav-item">
							  <a class="nav-link" href="app-to-do.html"><i class='bx bx-check-square'></i></a>
						  </li>
					  </ul>
					 </div>
					<div class="search-bar flex-grow-1">
						<div class="position-relative search-bar-box">
							<input type="text" class="form-control search-control" placeholder="Type to search..."> <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
							<span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
						</div>
					</div>
					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center">
							<li class="nav-item mobile-search-icon">
								<a class="nav-link" href="#">	<i class='bx bx-search'></i>
								</a>
							</li>
							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">	<i class='bx bx-category'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<div class="row row-cols-3 g-3 p-3">
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-cosmic text-white"><i class='bx bx-group'></i>
											</div>
											<div class="app-title">Teams</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-burning text-white"><i class='bx bx-atom'></i>
											</div>
											<div class="app-title">Projects</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-lush text-white"><i class='bx bx-shield'></i>
											</div>
											<div class="app-title">Tasks</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-kyoto text-dark"><i class='bx bx-notification'></i>
											</div>
											<div class="app-title">Feeds</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-blues text-dark"><i class='bx bx-file'></i>
											</div>
											<div class="app-title">Files</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-moonlit text-white"><i class='bx bx-filter-alt'></i>
											</div>
											<div class="app-title">Alerts</div>
										</div>
									</div>
								</div>
							</li>
							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">7</span>
									<i class='bx bx-bell'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Notifications</p>
											<p class="msg-header-clear ms-auto">Marks all as read</p>
										</div>
									</a>
									<div class="header-notifications-list">
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-primary text-primary"><i class="bx bx-group"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Customers<span class="msg-time float-end">14 Sec
												ago</span></h6>
													<p class="msg-info">5 new user registered</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-danger text-danger"><i class="bx bx-cart-alt"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Orders <span class="msg-time float-end">2 min
												ago</span></h6>
													<p class="msg-info">You have recived new orders</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-success text-success"><i class="bx bx-file"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">24 PDF File<span class="msg-time float-end">19 min
												ago</span></h6>
													<p class="msg-info">The pdf files generated</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-warning text-warning"><i class="bx bx-send"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Time Response <span class="msg-time float-end">28 min
												ago</span></h6>
													<p class="msg-info">5.1 min avarage time response</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-info text-info"><i class="bx bx-home-circle"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Product Approved <span
												class="msg-time float-end">2 hrs ago</span></h6>
													<p class="msg-info">Your new product has approved</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-danger text-danger"><i class="bx bx-message-detail"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Comments <span class="msg-time float-end">4 hrs
												ago</span></h6>
													<p class="msg-info">New customer comments recived</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-success text-success"><i class='bx bx-check-square'></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Your item is shipped <span class="msg-time float-end">5 hrs
												ago</span></h6>
													<p class="msg-info">Successfully shipped your item</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-primary text-primary"><i class='bx bx-user-pin'></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New 24 authors<span class="msg-time float-end">1 day
												ago</span></h6>
													<p class="msg-info">24 new authors joined last week</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-warning text-warning"><i class='bx bx-door-open'></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Defense Alerts <span class="msg-time float-end">2 weeks
												ago</span></h6>
													<p class="msg-info">45% less alerts last 4 weeks</p>
												</div>
											</div>
										</a>
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">View All Notifications</div>
									</a>
								</div>
							</li>
							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">8</span>
									<i class='bx bx-comment'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Messages</p>
											<p class="msg-header-clear ms-auto">Marks all as read</p>
										</div>
									</a>
									<div class="header-message-list">
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="https://via.placeholder.com/110x110" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Daisy Anderson <span class="msg-time float-end">5 sec
												ago</span></h6>
													<p class="msg-info">The standard chunk of lorem</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="https://via.placeholder.com/110x110" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Althea Cabardo <span class="msg-time float-end">14
												sec ago</span></h6>
													<p class="msg-info">Many desktop publishing packages</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="https://via.placeholder.com/110x110" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Oscar Garner <span class="msg-time float-end">8 min
												ago</span></h6>
													<p class="msg-info">Various versions have evolved over</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="https://via.placeholder.com/110x110" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Katherine Pechon <span class="msg-time float-end">15
												min ago</span></h6>
													<p class="msg-info">Making this the first true generator</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="https://via.placeholder.com/110x110" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Amelia Doe <span class="msg-time float-end">22 min
												ago</span></h6>
													<p class="msg-info">Duis aute irure dolor in reprehenderit</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="https://via.placeholder.com/110x110" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Cristina Jhons <span class="msg-time float-end">2 hrs
												ago</span></h6>
													<p class="msg-info">The passage is attributed to an unknown</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="https://via.placeholder.com/110x110" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">James Caviness <span class="msg-time float-end">4 hrs
												ago</span></h6>
													<p class="msg-info">The point of using Lorem</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="https://via.placeholder.com/110x110" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Peter Costanzo <span class="msg-time float-end">6 hrs
												ago</span></h6>
													<p class="msg-info">It was popularised in the 1960s</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="https://via.placeholder.com/110x110" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">David Buckley <span class="msg-time float-end">2 hrs
												ago</span></h6>
													<p class="msg-info">Various versions have evolved over</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="https://via.placeholder.com/110x110" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Thomas Wheeler <span class="msg-time float-end">2 days
												ago</span></h6>
													<p class="msg-info">If you are going to use a passage</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="https://via.placeholder.com/110x110" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Johnny Seitz <span class="msg-time float-end">5 days
												ago</span></h6>
													<p class="msg-info">All the Lorem Ipsum generators</p>
												</div>
											</div>
										</a>
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">View All Messages</div>
									</a>
								</div>
							</li>
						</ul>
					</div>
					<div class="user-box dropdown">
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="https://via.placeholder.com/110x110" class="user-img" alt="user avatar">
							<div class="user-info ps-3">
								<p class="user-name mb-0">{{ Auth::user()->name }}</p>
								<p class="designattion mb-0">{{Auth::user()->role=='1' ? 'Super Admin' : 'Team Member'}}</p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">


							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<li>
								<form action="{{ route('logout') }}" method="POST">
									@csrf
									<button type="submit" class="dropdown-item"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
								</form>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				@include('layouts.messages')
                @yield('content')
			</div>
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © 2021. All right reserved.</p>
		</footer>
	</div>
	<!--end wrapper-->
	<!--start switcher-->
	<div class="switcher-wrapper">
		<div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
		</div>
		<div class="switcher-body">
			<div class="d-flex align-items-center">
				<h5 class="mb-0 text-uppercase">Theme Customizer</h5>
				<button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
			</div>
			<hr/>
			<h6 class="mb-0">Theme Styles</h6>
			<hr/>
			<div class="d-flex align-items-center justify-content-between">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="lightmode" checked>
					<label class="form-check-label" for="lightmode">Light</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="darkmode">
					<label class="form-check-label" for="darkmode">Dark</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="semidark">
					<label class="form-check-label" for="semidark">Semi Dark</label>
				</div>
			</div>
			<hr/>
			<div class="form-check">
				<input class="form-check-input" type="radio" id="minimaltheme" name="flexRadioDefault">
				<label class="form-check-label" for="minimaltheme">Minimal Theme</label>
			</div>
			<hr/>
			<h6 class="mb-0">Header Colors</h6>
			<hr/>
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator headercolor1" id="headercolor1"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor2" id="headercolor2"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor3" id="headercolor3"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor4" id="headercolor4"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor5" id="headercolor5"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor6" id="headercolor6"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor7" id="headercolor7"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor8" id="headercolor8"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


	@yield('scripts')

	<!--plugins-->


	<script src="<?php echo asset(''); ?>assets/js/bootstrap.bundle.min.js"></script>
	<script src="<?php echo asset(''); ?>assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="<?php echo asset(''); ?>assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="<?php echo asset(''); ?>assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="<?php echo asset(''); ?>assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
	<script src="<?php echo asset(''); ?>assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="<?php echo asset(''); ?>assets/plugins/highcharts/js/highcharts.js"></script>
	<script src="<?php echo asset(''); ?>assets/plugins/highcharts/js/exporting.js"></script>
	<script src="<?php echo asset(''); ?>assets/plugins/highcharts/js/variable-pie.js"></script>
	<script src="<?php echo asset(''); ?>assets/plugins/highcharts/js/export-data.js"></script>
	<script src="<?php echo asset(''); ?>assets/plugins/highcharts/js/accessibility.js"></script>
	<script src="<?php echo asset(''); ?>assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
	<script src="<?php echo asset(''); ?>assets/js/index.js"></script>
	<!--app JS-->
	<script src="<?php echo asset(''); ?>assets/js/app.js"></script>
	<script>
		new PerfectScrollbar('.customers-list');
		new PerfectScrollbar('.store-metrics');
		new PerfectScrollbar('.product-list');
	</script>
    <script>
        $(function(){
            var dtToday = new Date();
            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if(month < 10)
                month = '0' + month.toString();
            if(day < 10)
                day = '0' + day.toString();
            var maxDate = year + '-' + month + '-' + day;
            $('#date').attr('min', maxDate);
        });
    </script>




</body>

</html>
