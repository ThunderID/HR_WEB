<html lang="en">
	<head>
		<title>Material Admin - Compose mail</title>

		<!-- BEGIN META -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="your,keywords">
		<meta name="description" content="Short explanation about this website">
		<!-- END META -->

		<!-- BEGIN STYLESHEETS -->
		<link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
		<link type="text/css" rel="stylesheet" href="{{ elixir('css/admin.css') }}" />

		<!-- END STYLESHEETS -->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script type="text/javascript" src="../../../assets/js/libs/utils/html5shiv.js?1403934957"></script>
		<script type="text/javascript" src="../../../assets/js/libs/utils/respond.min.js?1403934956"></script>
		<![endif]-->
	</head>
	<body class="menubar-hoverable header-fixed ">

		<!-- BEGIN HEADER-->
		<header id="header" >
			<div class="headerbar">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="headerbar-left">
					<ul class="header-nav header-nav-options">
						<li class="header-nav-brand" >
							<div class="brand-holder">
								<a href="../../../html/dashboards/dashboard.html">
									<span class="text-lg text-bold text-primary">MATERIAL ADMIN</span>
								</a>
							</div>
						</li>
						<li>
							<a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
								<i class="fa fa-bars"></i>
							</a>
						</li>
					</ul>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="headerbar-right">
					<ul class="header-nav header-nav-options">
						<li>
							<!-- Search form -->
							<form class="navbar-search" role="search">
								<div class="form-group">
									<input type="text" class="form-control" name="headerSearch" placeholder="Enter your keyword">
								</div>
								<button type="submit" class="btn btn-icon-toggle ink-reaction"><i class="fa fa-search"></i></button>
							</form>
						</li>
						<li class="dropdown hidden-xs">
							<a href="javascript:void(0);" class="btn btn-icon-toggle btn-default" data-toggle="dropdown">
								<i class="fa fa-bell"></i><sup class="badge style-danger">4</sup>
							</a>
							<ul class="dropdown-menu animation-expand">
								<li class="dropdown-header">Today's messages</li>
								<li>
									<a class="alert alert-callout alert-warning" href="javascript:void(0);">
										<img class="pull-right img-circle dropdown-avatar" src="../../../assets/img/avatar2.jpg?1404026449" alt="" />
										<strong>Alex Anistor</strong><br/>
										<small>Testing functionality...</small>
									</a>
								</li>
								<li>
									<a class="alert alert-callout alert-info" href="javascript:void(0);">
										<img class="pull-right img-circle dropdown-avatar" src="../../../assets/img/avatar3.jpg?1404026799" alt="" />
										<strong>Alicia Adell</strong><br/>
										<small>Reviewing last changes...</small>
									</a>
								</li>
								<li class="dropdown-header">Options</li>
								<li><a href="../../../html/pages/login.html">View all messages <span class="pull-right"><i class="fa fa-arrow-right"></i></span></a></li>
								<li><a href="../../../html/pages/login.html">Mark as read <span class="pull-right"><i class="fa fa-arrow-right"></i></span></a></li>
							</ul><!--end .dropdown-menu -->
						</li><!--end .dropdown -->
						<li class="dropdown hidden-xs">
							<a href="javascript:void(0);" class="btn btn-icon-toggle btn-default" data-toggle="dropdown">
								<i class="fa fa-area-chart"></i>
							</a>
							<ul class="dropdown-menu animation-expand">
								<li class="dropdown-header">Server load</li>
								<li class="dropdown-progress">
									<a href="javascript:void(0);">
										<div class="dropdown-label">
											<span class="text-light">Server load <strong>Today</strong></span>
											<strong class="pull-right">93%</strong>
										</div>
										<div class="progress"><div class="progress-bar progress-bar-danger" style="width: 93%"></div></div>
									</a>
								</li><!--end .dropdown-progress -->
								<li class="dropdown-progress">
									<a href="javascript:void(0);">
										<div class="dropdown-label">
											<span class="text-light">Server load <strong>Yesterday</strong></span>
											<strong class="pull-right">30%</strong>
										</div>
										<div class="progress"><div class="progress-bar progress-bar-success" style="width: 30%"></div></div>
									</a>
								</li><!--end .dropdown-progress -->
								<li class="dropdown-progress">
									<a href="javascript:void(0);">
										<div class="dropdown-label">
											<span class="text-light">Server load <strong>Lastweek</strong></span>
											<strong class="pull-right">74%</strong>
										</div>
										<div class="progress"><div class="progress-bar progress-bar-warning" style="width: 74%"></div></div>
									</a>
								</li><!--end .dropdown-progress -->
							</ul><!--end .dropdown-menu -->
						</li><!--end .dropdown -->
					</ul><!--end .header-nav-options -->
					<ul class="header-nav header-nav-profile">
						<li class="dropdown">
							<a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
								<img src="../../../assets/img/avatar1.jpg?1403934956" alt="" />
								<span class="profile-info">
									Daniel Johnson
									<small>Administrator</small>
								</span>
							</a>
							<ul class="dropdown-menu animation-dock">
								<li class="dropdown-header">Config</li>
								<li><a href="../../../html/pages/profile.html">My profile</a></li>
								<li><a href="../../../html/pages/blog/post.html">My blog <span class="badge style-danger pull-right">16</span></a></li>
								<li><a href="../../../html/pages/calendar.html">My appointments</a></li>
								<li class="divider"></li>
								<li><a href="../../../html/pages/locked.html"><i class="fa fa-fw fa-lock"></i> Lock</a></li>
								<li><a href="../../../html/pages/login.html"><i class="fa fa-fw fa-power-off text-danger"></i> Logout</a></li>
							</ul><!--end .dropdown-menu -->
						</li><!--end .dropdown -->
					</ul><!--end .header-nav-profile -->
					<ul class="header-nav header-nav-toggle">
						<li>
							<a class="btn btn-icon-toggle btn-default" href="#offcanvas-search" data-toggle="offcanvas" data-backdrop="false">
								<i class="fa fa-ellipsis-v"></i>
							</a>
						</li>
					</ul><!--end .header-nav-toggle -->
				</div><!--end #header-navbar-collapse -->
			</div>
		</header>
		<!-- END HEADER-->

		<!-- BEGIN BASE-->
		<div id="base">

			<!-- BEGIN OFFCANVAS LEFT -->
			<div class="offcanvas">
			</div><!--end .offcanvas-->
			<!-- END OFFCANVAS LEFT -->

			<!-- BEGIN CONTENT-->
			<div id="content">
				<section>
					<div class="section-header">
						<ol class="breadcrumb">
							<li><a href="../../../html/pages/contacts/search.html">Contacts</a></li>
							<li class="active">Add contact</li>
						</ol>
					</div>
					<div class="section-body contain-lg">
						<div class="row">
							<!-- BEGIN ADD PERSON DATA -->
							<div class="col-md-12">
								<div class="card">
									<div class="card-head style-primary">
										<header>Tambah data orang</header>
									</div>
									<form class="form" role="form">

										<!-- BEGIN DEFAULT FORM ITEMS -->
										<div class="card-body style-primary form-inverse">
											<div class="row">
												<div class="col-xs-12">
													<div class="row">
														<div class="col-md-12">
															<div class="form-group floating-label">
																<input type="text" class="form-control" id="preffix_title" name="preffix_title">
																<label for="company">Gelar Depan</label>
															</div>
														</div><!--end .col -->
													</div><!--end .row -->
													<div class="row">
														<div class="col-md-4">
															<div class="form-group floating-label">
																<input type="text" class="form-control input-lg" id="firstname" name="firstname">
																<label for="firstname">Nama Depan</label>
															</div>
														</div><!--end .col -->
														<div class="col-md-4">
															<div class="form-group floating-label">
																<input type="text" class="form-control input-lg" id="midlename" name="midlename">
																<label for="midlename">Nama Tengah</label>
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group floating-label">
																<input type="text" class="form-control input-lg" id="lastname" name="lastname">
																<label for="lastname">Nama Belakang</label>
															</div>
														</div><!--end .col -->
													</div><!--end .row -->
													<div class="row">
														<div class="col-md-12">
															<div class="form-group floating-label">
																<input type="text" class="form-control" id="suffix_title" name="suffix_title">
																<label for="functiontitle">Gelar Belakang</label>
															</div>
														</div><!--end .col -->
													</div><!--end .row -->
												</div><!--end .col -->
											</div><!--end .row -->
										</div><!--end .card-body -->
										<!-- END DEFAULT FORM ITEMS -->

										<!-- BEGIN FORM TABS -->
										<div class="card-head style-primary">
											<ul class="nav nav-tabs tabs-text-contrast tabs-accent" data-toggle="tabs">
												<li class="active"><a href="#contact">DETAIL</a></li>
												<li><a href="#relation">RELASI</a></li>
												<li><a href="#experience">PENGALAMAN</a></li>
												<li><a href="#skills">SKILLS</a></li>
												<li><a href="#general">GENERAL</a></li>
											</ul>
										</div><!--end .card-head -->
										<!-- END FORM TABS -->

										<!-- BEGIN FORM TAB PANES -->
										<div class="card-body tab-content">
											<div class="tab-pane active" id="contact">
												<div class="row">
													<div class="col-md-8">
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<input type="text" class="form-control" id="nickname" name="nickname">
																	<label for="nickname">Nama Panggilan</label>
																</div>
															</div><!--end .col -->
															<div class="col-md-2">
																<div class="form-group">
																	<label>
																		Jenis Kelamin
																	</label>
																</div>
															</div>
															<div class="col-md-2">
																<div class="radio radio-styled">
																	<label>
																		<input name="gender" type="radio" value="male">
																		<span>Laki-laki</span>
																	</label>
																</div>
															</div>
															<div class="col-md-2">
																<div class="radio radio-styled">
																	<label>
																		<input name="gender" type="radio" value="female">
																		<span>Perempuan</span>
																	</label>
																</div>
															</div>
														</div><!--end .row -->
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<input type="text" class="form-control" id="place_of_birth" name="place_of_birth">
																	<label for="place_of_birth">Tempat Lahir</label>
																</div>
															</div><!--end .col -->
															<div class="col-md-6">
																<div class="form-group">
																	<div class="input-daterange input-group" id="date_of_birth" style="width:100%;">
																		<div class="input-group-content">
																			<input type="text" class="form-control" name="date_of_birth" />
																			<label>Tanggal Lahir</label>
																		</div>
																	</div>
																</div>
															</div>
														</div><!--end .row -->
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<input type="text" class="form-control" id="place_of_birth" name="place_of_birth">
																	<label for="place_of_birth">Kebangsaan</label>
																</div>
															</div><!--end .col -->
															<div class="col-md-6">
																<div class="form-group">
																	<select name="Marital_status" class="form-control">
																		<option value=""></option>
																		<option value="single">Belum Kawin</option>
																		<option value="married">Kawin</option>
																		<option value="divorced">Cerai Hidup</option>
																		<option value="widowed">Cerai Mati</option>
																	</select>
																	<label for="Marital_status">Status Kawin</label>
																</div><!--end .row -->
															</div><!--end .row -->
														</div><!--end .row -->
													</div><!--end .col -->
												</div><!--end .row -->
											</div><!--end .tab-pane -->
											<div class="tab-pane" id="relation">
												<ul class="list-unstyled" id="relationList"></ul>
												<div class="form-group">
													<a class="btn btn-raised btn-default-bright" data-duplicate="relationTmpl" data-target="#relationList">TAMBAHKAN RELASI
													</a>
												</div><!--end .form-group -->
											</div><!--end .tab-pane -->
											<div class="tab-pane" id="experience">
												<ul class="list-unstyled" id="experienceList"></ul>
												<div class="form-group">
													<a class="btn btn-raised btn-default-bright" data-duplicate="experienceTmpl" data-target="#experienceList">TAMBAHKAN PENGALAMAN</a>
												</div><!--end .form-group -->
											</div><!--end .tab-pane -->
											<div class="tab-pane " id="skills">
												<ul class="list-unstyled" id="skillsList"></ul>
												<div class="form-group">
													<a class="btn btn-raised btn-default-bright" data-duplicate="skillTmpl" data-target="#skillsList">ADD NEW skill</a>
												</div><!--end .form-group -->
											</div><!--end .tab-pane -->
											<div class="tab-pane" id="general">
												<div class="form-group">
													<textarea id="summernote" name="message" class="form-control control-4-rows" placeholder="Enter note ..." spellcheck="false"></textarea>
												</div><!--end .form-group -->
											</div><!--end .tab-pane -->
										</div><!--end .card-body.tab-content -->
										<!-- END FORM TAB PANES -->

										<!-- BEGIN FORM FOOTER -->
										<div class="card-actionbar">
											<div class="card-actionbar-row">
												<a class="btn btn-flat" href="../../../html/pages/contacts/search.html">BATAL</a>
												<button type="button" class="btn btn-flat btn-accent">SIMPAN DATA</button>
											</div><!--end .card-actionbar-row -->
										</div><!--end .card-actionbar -->
										<!-- END FORM FOOTER -->
									</form>
								</div><!--end .card -->
							</div><!--end .col -->
							<!-- END ADD PERSON DATA -->
						</div><!--end .row -->
					</div><!--end .section-body -->
				</section>
			</div><!--end #content-->
			<!-- END CONTENT -->

			<!-- BEGIN MENUBAR-->
			<div id="menubar" class="menubar-inverse ">
				<div class="menubar-fixed-panel">
					<div>
						<a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
							<i class="fa fa-bars"></i>
						</a>
					</div>
					<div class="expanded">
						<a href="../../../html/dashboards/dashboard.html">
							<span class="text-lg text-bold text-primary ">MATERIAL&nbsp;ADMIN</span>
						</a>
					</div>
				</div>
				<div class="menubar-scroll-panel">

					<!-- BEGIN MAIN MENU -->
					<ul id="main-menu" class="gui-controls">

						<!-- BEGIN DASHBOARD -->
						<li>
							<a href="../../../html/dashboards/dashboard.html" >
								<div class="gui-icon"><i class="md md-home"></i></div>
								<span class="title">Dashboard</span>
							</a>
						</li><!--end /menu-li -->
						<!-- END DASHBOARD -->

						<!-- BEGIN EMAIL -->
						<li class="gui-folder">
							<a>
								<div class="gui-icon"><i class="md md-email"></i></div>
								<span class="title">Email</span>
							</a>
							<!--start submenu -->
							<ul>
								<li><a href="../../../html/mail/inbox.html" ><span class="title">Inbox</span></a></li>
								<li><a href="../../../html/mail/compose.html" ><span class="title">Compose</span></a></li>
								<li><a href="../../../html/mail/reply.html" ><span class="title">Reply</span></a></li>
								<li><a href="../../../html/mail/message.html" ><span class="title">View message</span></a></li>
							</ul><!--end /submenu -->
						</li><!--end /menu-li -->
						<!-- END EMAIL -->

						<!-- BEGIN DASHBOARD -->
						<li>
							<a href="../../../html/layouts/builder.html" >
								<div class="gui-icon"><i class="md md-web"></i></div>
								<span class="title">Layouts</span>
							</a>
						</li><!--end /menu-li -->
						<!-- END DASHBOARD -->

						<!-- BEGIN UI -->
						<li class="gui-folder">
							<a>
								<div class="gui-icon"><i class="fa fa-puzzle-piece fa-fw"></i></div>
								<span class="title">UI elements</span>
							</a>
							<!--start submenu -->
							<ul>
								<li><a href="../../../html/ui/colors.html" ><span class="title">Colors</span></a></li>
								<li><a href="../../../html/ui/typography.html" ><span class="title">Typography</span></a></li>
								<li><a href="../../../html/ui/cards.html" ><span class="title">Cards</span></a></li>
								<li><a href="../../../html/ui/buttons.html" ><span class="title">Buttons</span></a></li>
								<li><a href="../../../html/ui/lists.html" ><span class="title">Lists</span></a></li>
								<li><a href="../../../html/ui/tabs.html" ><span class="title">Tabs</span></a></li>
								<li><a href="../../../html/ui/accordions.html" ><span class="title">Accordions</span></a></li>
								<li><a href="../../../html/ui/messages.html" ><span class="title">Messages</span></a></li>
								<li><a href="../../../html/ui/offcanvas.html" ><span class="title">Off-canvas</span></a></li>
								<li><a href="../../../html/ui/grid.html" ><span class="title">Grid</span></a></li>
								<li class="gui-folder">
									<a href="javascript:void(0);">
										<span class="title">Icons</span>
									</a>
									<!--start submenu -->
									<ul>
										<li><a href="../../../html/ui/icons/materialicons.html" ><span class="title">Material Design Icons</span></a></li>
										<li><a href="../../../html/ui/icons/fontawesome.html" ><span class="title">Font Awesome</span></a></li>
										<li><a href="../../../html/ui/icons/glyphicons.html" ><span class="title">Glyphicons</span></a></li>
										<li><a href="../../../html/ui/icons/skycons.html" ><span class="title">Skycons</span></a></li>
									</ul><!--end /submenu -->
								</li><!--end /menu-li -->
							</ul><!--end /submenu -->
						</li><!--end /menu-li -->
						<!-- END UI -->

						<!-- BEGIN TABLES -->
						<li class="gui-folder">
							<a>
								<div class="gui-icon"><i class="fa fa-table"></i></div>
								<span class="title">Tables</span>
							</a>
							<!--start submenu -->
							<ul>
								<li><a href="../../../html/tables/static.html" ><span class="title">Static Tables</span></a></li>
								<li><a href="../../../html/tables/dynamic.html" ><span class="title">Dynamic Tables</span></a></li>
								<li><a href="../../../html/tables/responsive.html" ><span class="title">Responsive Table</span></a></li>
							</ul><!--end /submenu -->
						</li><!--end /menu-li -->
						<!-- END TABLES -->

						<!-- BEGIN FORMS -->
						<li class="gui-folder">
							<a>
								<div class="gui-icon"><span class="glyphicon glyphicon-list-alt"></span></div>
								<span class="title">Forms</span>
							</a>
							<!--start submenu -->
							<ul>
								<li><a href="../../../html/forms/basic.html" ><span class="title">Form basic</span></a></li>
								<li><a href="../../../html/forms/advanced.html" ><span class="title">Form advanced</span></a></li>
								<li><a href="../../../html/forms/layouts.html" ><span class="title">Form layouts</span></a></li>
								<li><a href="../../../html/forms/editors.html" ><span class="title">Editors</span></a></li>
								<li><a href="../../../html/forms/validation.html" ><span class="title">Form validation</span></a></li>
								<li><a href="../../../html/forms/wizard.html" ><span class="title">Form wizard</span></a></li>
							</ul><!--end /submenu -->
						</li><!--end /menu-li -->
						<!-- END FORMS -->

						<!-- BEGIN PAGES -->
						<li class="gui-folder">
							<a>
								<div class="gui-icon"><i class="md md-computer"></i></div>
								<span class="title">Pages</span>
							</a>
							<!--start submenu -->
							<ul>
								<li class="gui-folder">
									<a href="javascript:void(0);">
										<span class="title">Contacts</span>
									</a>
									<!--start submenu -->
									<ul>
										<li><a href="../../../html/pages/contacts/search.html" ><span class="title">Search</span></a></li>
										<li><a href="../../../html/pages/contacts/details.html" ><span class="title">Contact card</span></a></li>
										<li><a href="../../../html/pages/contacts/add.html" class="active"><span class="title">Insert contact</span></a></li>
									</ul><!--end /submenu -->
								</li><!--end /menu-li -->
								<li class="gui-folder">
									<a href="javascript:void(0);">
										<span class="title">Search</span>
									</a>
									<!--start submenu -->
									<ul>
										<li><a href="../../../html/pages/search/results-text.html" ><span class="title">Results - Text</span></a></li>
										<li><a href="../../../html/pages/search/results-text-image.html" ><span class="title">Results - Text and Image</span></a></li>
									</ul><!--end /submenu -->
								</li><!--end /menu-li -->
								<li class="gui-folder">
									<a href="javascript:void(0);">
										<span class="title">Blog</span>
									</a>
									<!--start submenu -->
									<ul>
										<li><a href="../../../html/pages/blog/masonry.html" ><span class="title">Blog masonry</span></a></li>
										<li><a href="../../../html/pages/blog/list.html" ><span class="title">Blog list</span></a></li>
										<li><a href="../../../html/pages/blog/post.html" ><span class="title">Blog post</span></a></li>
									</ul><!--end /submenu -->
								</li><!--end /menu-li -->
								<li class="gui-folder">
									<a href="javascript:void(0);">
										<span class="title">Error pages</span>
									</a>
									<!--start submenu -->
									<ul>
										<li><a href="../../../html/pages/404.html" ><span class="title">404 page</span></a></li>
										<li><a href="../../../html/pages/500.html" ><span class="title">500 page</span></a></li>
									</ul><!--end /submenu -->
								</li><!--end /menu-li -->
								<li><a href="../../../html/pages/profile.html" ><span class="title">User profile<span class="badge style-accent">42</span></span></a></li>
								<li><a href="../../../html/pages/invoice.html" ><span class="title">Invoice</span></a></li>
								<li><a href="../../../html/pages/calendar.html" ><span class="title">Calendar</span></a></li>
								<li><a href="../../../html/pages/pricing.html" ><span class="title">Pricing</span></a></li>
								<li><a href="../../../html/pages/timeline.html" ><span class="title">Timeline</span></a></li>
								<li><a href="../../../html/pages/maps.html" ><span class="title">Maps</span></a></li>
								<li><a href="../../../html/pages/locked.html" ><span class="title">Lock screen</span></a></li>
								<li><a href="../../../html/pages/login.html" ><span class="title">Login</span></a></li>
								<li><a href="../../../html/pages/blank.html" ><span class="title">Blank page</span></a></li>
							</ul><!--end /submenu -->
						</li><!--end /menu-li -->
						<!-- END FORMS -->

						<!-- BEGIN CHARTS -->
						<li>
							<a href="../../../html/charts/charts.html" >
								<div class="gui-icon"><i class="md md-assessment"></i></div>
								<span class="title">Charts</span>
							</a>
						</li><!--end /menu-li -->
						<!-- END CHARTS -->

						<!-- BEGIN LEVELS -->
						<li class="gui-folder">
							<a>
								<div class="gui-icon"><i class="fa fa-folder-open fa-fw"></i></div>
								<span class="title">Menu levels demo</span>
							</a>
							<!--start submenu -->
							<ul>
								<li><a href="#"><span class="title">Item 1</span></a></li>
								<li><a href="#"><span class="title">Item 1</span></a></li>
								<li class="gui-folder">
									<a href="javascript:void(0);">
										<span class="title">Open level 2</span>
									</a>
									<!--start submenu -->
									<ul>
										<li><a href="#"><span class="title">Item 2</span></a></li>
										<li class="gui-folder">
											<a href="javascript:void(0);">
												<span class="title">Open level 3</span>
											</a>
											<!--start submenu -->
											<ul>
												<li><a href="#"><span class="title">Item 3</span></a></li>
												<li><a href="#"><span class="title">Item 3</span></a></li>
												<li class="gui-folder">
													<a href="javascript:void(0);">
														<span class="title">Open level 4</span>
													</a>
													<!--start submenu -->
													<ul>
														<li><a href="#"><span class="title">Item 4</span></a></li>
														<li class="gui-folder">
															<a href="javascript:void(0);">
																<span class="title">Open level 5</span>
															</a>
															<!--start submenu -->
															<ul>
																<li><a href="#"><span class="title">Item 5</span></a></li>
																<li><a href="#"><span class="title">Item 5</span></a></li>
															</ul><!--end /submenu -->
														</li><!--end /submenu-li -->
													</ul><!--end /submenu -->
												</li><!--end /submenu-li -->
											</ul><!--end /submenu -->
										</li><!--end /submenu-li -->
									</ul><!--end /submenu -->
								</li><!--end /submenu-li -->
							</ul><!--end /submenu -->
						</li><!--end /menu-li -->
						<!-- END LEVELS -->

					</ul><!--end .main-menu -->
					<!-- END MAIN MENU -->

					<div class="menubar-foot-panel">
						<small class="no-linebreak hidden-folded">
							<span class="opacity-75">Copyright &copy; 2014</span> <strong>CodeCovers</strong>
						</small>
					</div>
				</div><!--end .menubar-scroll-panel-->
			</div><!--end #menubar-->
			<!-- END MENUBAR -->

			<!-- BEGIN OFFCANVAS RIGHT -->
			<div class="offcanvas">

				<!-- BEGIN OFFCANVAS SEARCH -->
				<div id="offcanvas-search" class="offcanvas-pane width-8">
					<div class="offcanvas-head">
						<header class="text-primary">Search</header>
						<div class="offcanvas-tools">
							<a class="btn btn-icon-toggle btn-default-light pull-right" data-dismiss="offcanvas">
								<i class="md md-close"></i>
							</a>
						</div>
					</div>
					<div class="offcanvas-body no-padding">
						<ul class="list ">
							<li class="tile divider-full-bleed">
								<div class="tile-content">
									<div class="tile-text"><strong>A</strong></div>
								</div>
							</li>
							<li class="tile">
								<a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
									<div class="tile-icon">
										<img src="../../../assets/img/avatar4.jpg?1404026791" alt="" />
									</div>
									<div class="tile-text">
										Alex Nelson
										<small>123-123-3210</small>
									</div>
								</a>
							</li>
							<li class="tile">
								<a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
									<div class="tile-icon">
										<img src="../../../assets/img/avatar9.jpg?1404026744" alt="" />
									</div>
									<div class="tile-text">
										Ann Laurens
										<small>123-123-3210</small>
									</div>
								</a>
							</li>
							<li class="tile divider-full-bleed">
								<div class="tile-content">
									<div class="tile-text"><strong>J</strong></div>
								</div>
							</li>
							<li class="tile">
								<a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
									<div class="tile-icon">
										<img src="../../../assets/img/avatar2.jpg?1404026449" alt="" />
									</div>
									<div class="tile-text">
										Jessica Cruise
										<small>123-123-3210</small>
									</div>
								</a>
							</li>
							<li class="tile">
								<a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
									<div class="tile-icon">
										<img src="../../../assets/img/avatar8.jpg?1404026729" alt="" />
									</div>
									<div class="tile-text">
										Jim Peters
										<small>123-123-3210</small>
									</div>
								</a>
							</li>
							<li class="tile divider-full-bleed">
								<div class="tile-content">
									<div class="tile-text"><strong>M</strong></div>
								</div>
							</li>
							<li class="tile">
								<a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
									<div class="tile-icon">
										<img src="../../../assets/img/avatar5.jpg?1404026513" alt="" />
									</div>
									<div class="tile-text">
										Mabel Logan
										<small>123-123-3210</small>
									</div>
								</a>
							</li>
							<li class="tile">
								<a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
									<div class="tile-icon">
										<img src="../../../assets/img/avatar11.jpg?1404026774" alt="" />
									</div>
									<div class="tile-text">
										Mary Peterson
										<small>123-123-3210</small>
									</div>
								</a>
							</li>
							<li class="tile">
								<a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
									<div class="tile-icon">
										<img src="../../../assets/img/avatar3.jpg?1404026799" alt="" />
									</div>
									<div class="tile-text">
										Mike Alba
										<small>123-123-3210</small>
									</div>
								</a>
							</li>
							<li class="tile divider-full-bleed">
								<div class="tile-content">
									<div class="tile-text"><strong>N</strong></div>
								</div>
							</li>
							<li class="tile">
								<a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
									<div class="tile-icon">
										<img src="../../../assets/img/avatar6.jpg?1404026572" alt="" />
									</div>
									<div class="tile-text">
										Nathan Peterson
										<small>123-123-3210</small>
									</div>
								</a>
							</li>
							<li class="tile divider-full-bleed">
								<div class="tile-content">
									<div class="tile-text"><strong>P</strong></div>
								</div>
							</li>
							<li class="tile">
								<a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
									<div class="tile-icon">
										<img src="../../../assets/img/avatar7.jpg?1404026721" alt="" />
									</div>
									<div class="tile-text">
										Philip Ericsson
										<small>123-123-3210</small>
									</div>
								</a>
							</li>
							<li class="tile divider-full-bleed">
								<div class="tile-content">
									<div class="tile-text"><strong>S</strong></div>
								</div>
							</li>
							<li class="tile">
								<a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
									<div class="tile-icon">
										<img src="../../../assets/img/avatar10.jpg?1404026762" alt="" />
									</div>
									<div class="tile-text">
										Samuel Parsons
										<small>123-123-3210</small>
									</div>
								</a>
							</li>
						</ul>
					</div><!--end .offcanvas-body -->
				</div><!--end .offcanvas-pane -->
				<!-- END OFFCANVAS SEARCH -->

				<!-- BEGIN OFFCANVAS CHAT -->
				<div id="offcanvas-chat" class="offcanvas-pane style-default-light width-12">
					<div class="offcanvas-head style-default-bright">
						<header class="text-primary">Chat with Ann Laurens</header>
						<div class="offcanvas-tools">
							<a class="btn btn-icon-toggle btn-default-light pull-right" data-dismiss="offcanvas">
								<i class="md md-close"></i>
							</a>
							<a class="btn btn-icon-toggle btn-default-light pull-right" href="#offcanvas-search" data-toggle="offcanvas" data-backdrop="false">
								<i class="md md-arrow-back"></i>
							</a>
						</div>
						<form class="form">
							<div class="form-group floating-label">
								<textarea name="sidebarChatMessage" id="sidebarChatMessage" class="form-control autosize" rows="1"></textarea>
								<label for="sidebarChatMessage">Leave a message</label>
							</div>
						</form>
					</div>
					<div class="offcanvas-body">
						<ul class="list-chats">
							<li>
								<div class="chat">
									<div class="chat-avatar"><img class="img-circle" src="../../../assets/img/avatar1.jpg?1403934956" alt="" /></div>
									<div class="chat-body">
										Yes, it is indeed very beautiful.
										<small>10:03 pm</small>
									</div>
								</div><!--end .chat -->
							</li>
							<li class="chat-left">
								<div class="chat">
									<div class="chat-avatar"><img class="img-circle" src="../../../assets/img/avatar9.jpg?1404026744" alt="" /></div>
									<div class="chat-body">
										Did you see the changes?
										<small>10:02 pm</small>
									</div>
								</div><!--end .chat -->
							</li>
							<li>
								<div class="chat">
									<div class="chat-avatar"><img class="img-circle" src="../../../assets/img/avatar1.jpg?1403934956" alt="" /></div>
									<div class="chat-body">
										I just arrived at work, it was quite busy.
										<small>06:44pm</small>
									</div>
									<div class="chat-body">
										I will take look in a minute.
										<small>06:45pm</small>
									</div>
								</div><!--end .chat -->
							</li>
							<li class="chat-left">
								<div class="chat">
									<div class="chat-avatar"><img class="img-circle" src="../../../assets/img/avatar9.jpg?1404026744" alt="" /></div>
									<div class="chat-body">
										The colors are much better now.
									</div>
									<div class="chat-body">
										The colors are brighter than before.
										I have already sent an example.
										This will make it look sharper.
										<small>Mon</small>
									</div>
								</div><!--end .chat -->
							</li>
							<li>
								<div class="chat">
									<div class="chat-avatar"><img class="img-circle" src="../../../assets/img/avatar1.jpg?1403934956" alt="" /></div>
									<div class="chat-body">
										Are the colors of the logo already adapted?
										<small>Last week</small>
									</div>
								</div><!--end .chat -->
							</li>
						</ul>
					</div><!--end .offcanvas-body -->
				</div><!--end .offcanvas-pane -->
				<!-- END OFFCANVAS CHAT -->

			</div><!--end .offcanvas-->
			<!-- END OFFCANVAS RIGHT -->

		</div><!--end #base-->
		<!-- END BASE -->

		<!-- BEGIN JAVASCRIPT -->

		<!-- BEGIN RELATION TEMPLATES -->
		<script type="text/html" id="relationTmpl">
			<li class="clearfix">
				<div class="page-header no-border holder">
					<a class="btn btn-icon-toggle btn-accent btn-delete stick-top-right"><span class="md md-delete"></span></a>
					<h4 class="text-accent">Relasi <%=index%></h4>
				</div>
				<div class="row">
					<div class="col-md-5">
						<div class="form-group">
							<input type="text" class="form-control" id="relationship<%=index%>" name="relationship<%=index%>">
							<label for="relationship<%=index%>">Relasi</label>
						</div>
					</div>
					<div class="col-md-7">
						<div class="form-group">
							<input type="text" class="form-control" id="relation_name_<%=index%>" name="relation_name_<%=index%>">
							<label for="relation_name_<%=index%>">Nama</label>
						</div>
 					</div>
				</div>
				<div class="row">
					<div class="card style-primary-dark">
						<!-- BEGIN RELASI DETAIL -->
						<div class="card-head style-primary-dark">
							<header>Nama</header>
						</div>
						<div class="card-body style-primary-dark form-inverse">
							<div class="row">
								<div class="col-xs-12">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<input type="text" class="form-control" id="prefix_title_relation_<%=index%>" name="prefix_title_relation_<%=index%>">
												<label for="prefix_title_relation_<%=index%>">Gelar Depan</label>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<input type="text" class="form-control" id="first_name_relation_<%=index%>" name="first_name_relation_<%=index%>">
												<label for="first_name_relation_<%=index%>">Nama Depan</label>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<input type="text" class="form-control" id="midle_name_relation_<%=index%>" name="midle_name_relation_<%=index%>">
													<label for="midle_name_relation_<%=index%>">Nama Tengah</label>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<input type="text" class="form-control" id="last_name_relation_<%=index%>" name="last_name_relation_<%=index%>">
												<label for="last_name_relation_<%=index%>">Nama Belakang</label>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<input type="text" class="form-control" id="suffix_title_relation_<%=index%>" name="suffix_title_relation_<%=index%>">
												<label for="suffix_title_relation_<%=index%>">Gelar Belakang</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div><!--end .card-body -->
						<div class="card-head style-primary-dark">
							<header>Profil Relasi</header>
						</div>
						<div class="card-body style-primary-dark form-inverse">
							<div class="row">
								<div class="col-xs-12">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<input type="text" class="form-control" id="nickname_relation_<%=index%>" name="nickname_relation_<%=index%>">
												<label for="nickname_relation_<%=index%>">Nama Panggilan</label>
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group">
												<label>
													Jenis Kelamin
												</label>
											</div>
										</div>
										<div class="col-md-2">
											<div class="radio radio-styled">
												<label>
													<input name="gender_relation_<%=index%>" type="radio" value="male">
													<span>Laki-laki</span>
												</label>
											</div>
										</div>
										<div class="col-md-2">
											<div class="radio radio-styled">
												<label>
													<input name="gender_relation_<%=index%>" type="radio" value="female">
													<span>Perempuan</span>
												</label>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<input type="text" class="form-control" id="place_of_birth_relation_<%=index%>" name="place_of_birth_relation_<%=index%>">
												<label for="place_of_birth_relation_<%=index%>">Tempat Lahir</label>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<div class="input-daterange input-group" id="date_of_birth_relation_<%=index%>" style="width:100%; text-align:left;">
													<div class="input-group-content">
														<input type="text" class="form-control" name="date_of_birth_relation_<%=index%>" />
														<label>Tanggal Lahir</label>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<input type="text" class="form-control" id="nationality_relation_<%=index%>" name="nationality_relation_<%=index%>">
												<label for="nationality_relation_<%=index%>">Kebangsaan</label>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<select name="marital_status_relation_<%=index%>" class="form-control">
															<option value=""></option>
															<option value="single">Belum Kawin</option>
															<option value="married">Kawin</option>
															<option value="divorced">Cerai Hidup</option>
															<option value="widowed">Cerai Mati</option>
												</select>
												<label for="marital_status_relation_<%=index%>">Status Kawin</label>
											</div>
										</div>
									</div>																	
								</div>
							</div>
						</div>

						<!-- END RELASI DETAIL -->
					</div>
				</div>
			</li>
		</script>
		<!-- END RELATION TEMPLATES -->


		<!-- BEGIN EXPERIENCE TEMPLATES -->
		<script type="text/html" id="experienceTmpl">
			<li class="clearfix">
				<div class="page-header no-border holder">
					<a class="btn btn-icon-toggle btn-accent btn-delete stick-top-right"><span class="md md-delete"></span></a>
					<h4 class="text-accent">Pengalaman <%=index%></h4>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" class="form-control" id="experience-company-<%=index%>" name="experience-company-<%=index%>">
							<label for="experience-company-<%=index%>">Company</label>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" class="form-control" id="experience-functiontitle-<%=index%>" name="experience-functiontitle-<%=index%>">
							<label for="experience-functiontitle-<%=index%>">Function</label>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<div class="input-daterange input-group" id="demo-date-range">
								<div class="input-group-content">
									<input type="text" class="form-control" name="start<%=index%>" />
									<label>Date range</label>
								</div>
								<span class="input-group-addon">to</span>
								<div class="input-group-content">
									<input type="text" class="form-control" name="end<%=index%>" />
									<div class="form-control-line"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<textarea name="experience-description-<%=index%>" id="experience-description-<%=index%>" class="form-control" rows="3"></textarea>
					<label for="experience-description-<%=index%>">Job description</label>
				</div>
			</li>
		</script>
		<!-- END EXPERIENCE TEMPLATES -->

		<!-- BEGIN SKILLS TEMPLATES -->
		<script type="text/html" id="skillTmpl">
			<li class="clearfix">
				<div class="row">
					<div class="col-xs-8">
						<div class="form-group">
							<input type="text" class="form-control" id="skill-<%=index%>" name="skill-<%=index%>">
							<label for="skill-<%=index%>">Skill <%=index%></label>
						</div>
					</div>
					<div class="col-xs-4">
						<div class="form-group">
							<select name="skill-rating-<%=index%>" class="form-control">
								<option value=""></option>
								<option value="100">100</option>
								<option value="90">90</option>
								<option value="80">80</option>
								<option value="70">70</option>
								<option value="60">60</option>
								<option value="50">50</option>
								<option value="40">40</option>
								<option value="30">30</option>
								<option value="20">20</option>
								<option value="10">10</option>
							</select>
							<label for="skill-rating-<%=index%>">Rating</label>
						</div>
					</div>
				</div>
			</li>
		</script>
		<!-- END SKILLS TEMPLATES -->

		<script src="/resources/js/libs/jquery/jquery-1.11.2.min.js"></script>
		<script src="/resources/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
		<script src="/resources/js/libs/bootstrap/bootstrap.min.js"></script>
		<script src="/resources/js/libs/spin.js/spin.min.js"></script>
		<script src="/resources/js/libs/autosize/jquery.autosize.min.js"></script>
		<!-- <script src="https://maps.googleapis.com/maps/api/js?libraries=places&amp;key=AIzaSyCaFiiyJLSZNfT5D2sBiWzSK1MDo41e-JA&amp;sensor=false"></script>
		<script src="/resources/assets/js/libs/gmaps/gmaps.js"></script>-->
		<script src="/resources/js/libs/inputmask/jquery.inputmask.bundle.min.js"></script>
		<script src="/resources/js/libs/moment/moment.min.js"></script>
		<script src="/resources/js/libs/bootstrap-datepicker/bootstrap-datepicker.js"></script>
		<script src="/resources/js/libs/bootstrap-multiselect/bootstrap-multiselect.js"></script>
		<script src="/resources/js/libs/bootstrap-rating/bootstrap-rating-input.min.js"></script>
		<script src="/resources/js/libs/nanoscroller/jquery.nanoscroller.min.js"></script>
		<script src="/resources/js/libs/microtemplating/microtemplating.min.js"></script>
		<script src="/resources/js/libs/summernote/summernote.min.js"></script>
		<script src="/resources/js/core/source/App.js"></script>
		<script src="/resources/js/core/source/AppNavigation.js"></script>
		<script src="/resources/js/core/source/AppOffcanvas.js"></script>
		<script src="/resources/js/core/source/AppCard.js"></script>
		<script src="/resources/js/core/source/AppForm.js"></script>
		<script src="/resources/js/core/source/AppNavSearch.js"></script>
		<script src="/resources/js/core/source/AppVendor.js"></script>
		<script src="/resources/js/core/demo/Demo.js"></script>
		<script src="/resources/js/core/demo/DemoPageContacts.js"></script>
		<!-- END JAVASCRIPT -->

	</body>
</html>
