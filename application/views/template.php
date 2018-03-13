<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="<?php echo base_url();?>themes/assets/images/favicon_1.ico">

        <title><?php echo $title ?></title>

        <!--Morris Chart CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>themes/assets/plugins/morris/morris.css">

        <link href="<?php echo base_url();?>themes/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>themes/assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>themes/assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>themes/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>themes/assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>themes/assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>themes/assets/css/focus.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <link rel="stylesheet" href="<?php echo base_url();?>plugin/datatables/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>plugin/jquery/jquery-ui.css">
        <script src="<?php echo base_url();?>themes/assets/js/modernizr.min.js"></script>
        <script src="<?php echo base_url();?>js/click_kanan.js"></script>
        <script src="<?php echo base_url();?>js/ctrl_u.js"></script>

    </head> 

    <body class="fixed-left" onload="myOnload()">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="#" class="logo"><i class="icon-magnet icon-c-logo"></i><span>MASTER DATA TARIF</span></a>
                        <!-- Image Logo here -->
                        <!--<a href="index.html" class="logo">-->
                            <!--<i class="icon-c-logo"> <img src="assets/images/logo_sm.png" height="42"/> </i>-->
                            <!--<span><img src="assets/images/logo_light.png" height="20"/></span>-->
                        <!--</a>-->
                    </div>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left waves-effect waves-light">
                                    <i class="md md-menu"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>

                            <!--
                            <ul class="nav navbar-nav hidden-xs">
                                <li><a href="#" class="waves-effect waves-light" title="Dashboard">Dashboard</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown"
                                       role="button" aria-haspopup="true" aria-expanded="false" title="Setting">Setting <span
                                            class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#" title="Change Password">Change Password</a></li>
                                        <li><a href="#" title="Update Profile">Update Profile</a></li>
                                    </ul>
                                </li>
                            </ul>
                            

                            <form role="search" class="navbar-left app-search pull-left hidden-xs">
			                     <input type="text" placeholder="Search..." class="form-control">
			                     <a href=""><i class="fa fa-search"></i></a>
			                </form>
                            -->
                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li style="color:white;"><a href="#" class="waves-effect waves-light"></a><?php echo $this->session->userdata('user_id') ?></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="dropdown top-menu-item-xs">
                                    <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true"><img title="Logout" src="<?php echo base_url();?>themes/assets/images/users/joni.png" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="<?php echo site_url('logout');?>" title="Logout"><i class="ti-power-off m-r-10 text-danger" ></i> Logout</a>
                                        </li>
                                        <li>
                                        <a href="<?php echo site_url('c_password');?>" title="Change Password"><i class="ti-power-off m-r-10 text-danger" ></i> Change Password</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu" style="overflow-y: scroll;">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                        <!-- Requester -->
                            <?php
                            if ($this->session->userdata('user_role')=="1")
                            {?>
                        	<li class="text-muted menu-title">Requester Menu</li>

                            <li class="has_sub">
                                <a href="<?php echo site_url('dashboard_requester');?>" class="waves-effect" title="Dashboard"><i class="ti-home"></i> <span> Dashboard </span> </a>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect" title="Domestic"><i class="ti-share"></i><span> Domestic </span> <span class="menu-arrow"></span></a>
                                <ul>
                                    <li>
                                        <a href="<?php echo site_url('update_tarif_cabang_utama_requester');?>" title="Update Tarif Cabang Utama"><span>Update Tarif Cabang Utama</span></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('update_tarif_cabang_requester');?>" title="Update Tarif Cabang"><span>Update Tarif Cabang</span></a>
                                    </li>
                                    <?php
                                    if ($this->session->userdata('user_branch')=="CGK000")
                                    {?>
                                    <li>
                                        <a href="<?php echo site_url('ubah_coding_requester');?>" title="Ubah Coding"><span>Ubah Coding</span></a>
                                    </li>
                                    <?php
                                    }else{}
                                    ?>
                                    <li>
                                        <a href="<?php echo site_url('ubah_zona_requester');?>" title="Ubah Zona"><span>Ubah Zona</span></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('non_aktif_routing_requester');?>" title="Non Aktif Routing"><span>Non Aktif Routing</span></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('non_aktif_service_requester');?>" title="Non Aktif Service"><span>Non Aktif Service</span></a>
                                    </li>
                                    <!--
                                    <li>
                                        <a href="<?php echo site_url('penambahan_service_requester');?>" title="Penambahan Service"><span>Penambahan Service</span></a>
                                    </li>
                                    -->
                                    <li>
                                        <a href="<?php echo site_url('aktivasi_service_requester');?>" title="Aktivasi Service"><span>Aktivasi Service</span></a>
                                    </li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect" title="Intracity"><i class="ti-location-pin"></i><span> Intracity </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?php echo site_url('update_tarif_intracity_requester');?>" title="Update Tarif"> Update Tarif</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="<?php echo site_url('report_requester');?>" class="waves-effect" title="Report"><i class="ti-bar-chart" ></i><span> Report </span></a>
                            </li>
                            <li class="has_sub">
                                <a href="<?php echo site_url('download_tarif_requester');?>" class="waves-effect" title="Simulasi Tarif"><i class="ti-files" ></i><span> Simulasi Tarif </span></a>
                            </li>
                            <li class="has_sub">
                                <a href="<?php echo site_url('print_tarif');?>" class="waves-effect" title="Download Tarif"><i class="ti-share" ></i><span> Download Tarif </span></a>
                            </li>
                            <?php
                            }else{}
                            ?>
                            
                            <?php
                            if ($this->session->userdata('user_role')=="1" || $this->session->userdata('user_role')=="4")
                            {?>
                            <li class="has_sub">
                                <a href="<?php echo site_url('view_btbp');?>" class="waves-effect" title="View BTBP"><i class="ti-share" ></i><span> View BTBP </span></a>
                            </li>
                            <?php
                            }else{}
                            ?>

                            <?php
                            if ($this->session->userdata('user_role')=="2")
                            {?>
                            <!-- Regional -->
                            <li class="text-muted menu-title">Regional Menu</li>
                            <li class="has_sub">
                                <a href="<?php echo site_url('dashboard_regional');?>" class="waves-effect" title="Dashboard"><i class="ti-home"></i> <span> Dashboard </span> </a>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect" title="Domestic"><i class="ti-share"></i><span> Domestic </span> <span class="menu-arrow"></span></a>
                                <ul>
                                    <!--
                                    <li>
                                        <a href="<?php echo site_url('update_tarif_regional');?>" title="Update Tarif"><span>Update Tarif</span></a>
                                    </li>
                                    -->
                                    <li>
                                        <a href="<?php echo site_url('update_tarif_cabang_utama_regional');?>" title="Update Tarif Cabang"><span>Update Tarif Cabang Utama</span>
                                        &nbsp;<span class="label label-pink pull-right" id="notif_update_tarif_cabang_utama_regional"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('update_tarif_cabang_regional');?>" title="Update Tarif Cabang"><span>Update Tarif Cabang</span>
                                        &nbsp;<span class="label label-pink pull-right" id="notif_update_tarif_cabang_regional"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('ubah_coding_regional');?>" title="Ubah Coding"><span>Ubah Coding</span>
                                        &nbsp;<span class="label label-pink pull-right" id="notif_ubah_coding_regional"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('ubah_zona_regional');?>" title="Ubah Zona"><span>Ubah Zona</span>
                                        &nbsp;<span class="label label-pink pull-right" id="notif_ubah_zona_regional"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('non_aktif_routing_regional');?>" title="Non Aktif Routing"><span>Non Aktif Routing</span>
                                        &nbsp;<span class="label label-pink pull-right" id="notif_non_aktif_routing_regional"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('non_aktif_service_regional');?>" title="Non Aktif Service"><span>Non Aktif Service</span>
                                        &nbsp;<span class="label label-pink pull-right" id="notif_non_aktif_service_regional"></span>  
                                        </a>
                                    </li>
                                    <!--
                                    <li>
                                        <a href="<?php echo site_url('penambahan_service_regional');?>" title="Penambahan Service"><span>Penambahan Service</span>
                                        &nbsp;<span class="label label-pink pull-right" id="notif_penambahan_service_regional"></span>    
                                        </a>
                                    </li>
                                    -->
                                    <li>
                                        <a href="<?php echo site_url('aktivasi_service_regional');?>" title="Aktivasi Service yang Non Aktif"><span>Aktivasi Service</span>
                                        &nbsp;<span class="label label-pink pull-right" id="notif_aktivasi_service_regional"></span>     
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="#" class="waves-effect" title="Intracity"><i class="ti-location-pin"></i><span> Intracity </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li>
                                    <a href="<?php echo site_url('update_tarif_intracity_regional');?>" title="Update Tarif">
                                    <span> Update Tarif</span>
                                    &nbsp;<span class="label label-pink pull-right" id="notif_update_intracity_regional"></span>
                                    </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="<?php echo site_url('report_regional');?>" class="waves-effect" title="Report"><i class="ti-bar-chart" ></i><span> Report </span></a>
                            </li>
                            <li class="has_sub">
                                <a href="<?php echo site_url('download_tarif_regional');?>" class="waves-effect" title="Download Tarif"><i class="ti-files" ></i><span> Simulasi Tarif </span></a>
                            </li>
                            <li class="has_sub">
                                <a href="<?php echo site_url('print_tarif');?>" class="waves-effect" title="Download Tarif"><i class="ti-share" ></i><span> Download Tarif </span></a>
                            </li>
                            <?php
                            }else{}
                            ?>

                            <?php
                            if ($this->session->userdata('user_role')=="3")
                            {?>
                            <!-- MPA -->
                            <li class="text-muted menu-title">MPA Menu</li>
                            <li class="has_sub">
                                <a href="<?php echo site_url('dashboard_mpa');?>" class="waves-effect" title="Dashboard"><i class="ti-home"></i> <span> Dashboard </span> </a>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect" title="Domestic"><i class="ti-share"></i><span> Domestic </span> <span class="menu-arrow"></span></a>
                                <ul>
                                    <!--
                                    <li>
                                        <a href="<?php echo site_url('update_tarif_requester');?>" title="Update Tarif"><span>Form Update Tarif</span></a>
                                    </li>
                                    
                                    <li>
                                        <a href="<?php echo site_url('update_tarif_mpa');?>" title="Update Tarif"><span>Update Tarif</span></a>
                                    </li>
                                    -->
                                    <li>
                                        <a href="<?php echo site_url('update_tarif_cabang_utama_mpa');?>" title="Update Tarif Cabang Utama"><span>Update Tarif Cabang Utama</span>
                                        &nbsp;<span class="label label-warning pull-right" id="notif_update_tarif_cabang_utama_mpa"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('update_tarif_cabang_mpa');?>" title="Update Tarif Cabang"><span>Update Tarif Cabang</span>
                                        &nbsp;<span class="label label-warning pull-right" id="notif_update_tarif_cabang_mpa"></span>  
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('ubah_coding_mpa');?>" title="Ubah Coding"><span>Ubah Coding</span>
                                        &nbsp;<span class="label label-warning pull-right" id="notif_ubah_coding_mpa"></span>     
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('ubah_zona_mpa');?>" title="Ubah Zona"><span>Ubah Zona</span>
                                        &nbsp;<span class="label label-warning pull-right" id="notif_ubah_zona_mpa"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('non_aktif_routing_mpa');?>" title="Non Aktif Routing"><span>Non Aktif Routing</span>
                                        &nbsp;<span class="label label-warning pull-right" id="notif_non_aktif_routing_mpa"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('non_aktif_service_mpa');?>" title="Non Aktif Service"><span>Non Aktif Service</span>
                                        &nbsp;<span class="label label-warning pull-right" id="notif_non_aktif_service_mpa"></span>
                                        </a>
                                    </li>
                                    <!--
                                    <li>
                                        <a href="<?php echo site_url('penambahan_service_mpa');?>" title="Penambahan Service"><span>Penambahan Service</span>
                                        &nbsp;<span class="label label-warning pull-right" id="notif_penambahan_service_mpa"></span>
                                        </a>
                                    </li>
                                    -->
                                    <li>
                                        <a href="<?php echo site_url('aktivasi_service_mpa');?>" title="Aktivasi Service yang Non Aktif"><span>Aktivasi Service</span>
                                        &nbsp;<span class="label label-warning pull-right" id="notif_aktivasi_service_mpa"></span>
                                        </a>
                                    </li>
                                    <?php if($this->session->userdata('user_level')=="1")
                                    {?>
                                    <li>
                                        <a href="<?php echo site_url('update_btbp_mpa');?>" title="Update BTBP"><span>Update BTBP</span></a>
                                    </li>
                                    <?php
                                    }else{}
                                    ?>

                                    <?php if($this->session->userdata('user_level')=="2")
                                    {?>
                                    <li>
                                        <a href="<?php echo site_url('update_btbp_mpa');?>" title="Update BTBP"><span>Update BTBP</span>
                                        &nbsp;<span class="label label-warning pull-right" id="notif_btbp_approve_1"></span>
                                        </a>
                                    </li>
                                    <?php
                                    }else{}
                                    ?>

                                    <?php if($this->session->userdata('user_level')=="3" || $this->session->userdata('user_level')=="4" || $this->session->userdata('user_level')=="5" || $this->session->userdata('user_level')=="6")
                                    {?>
                                    <li>
                                        <a href="<?php echo site_url('update_btbp_mpa');?>" title="Update BTBP"><span>Update BTBP</span>
                                        &nbsp;<span class="label label-warning pull-right" id="notif_btbp_approve_2"></span>
                                        </a>
                                    </li>
                                    <?php
                                    }else{}
                                    ?>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect" title="Intracity"><i class="ti-location-pin"></i><span> Intracity </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li>
                                    <a href="<?php echo site_url('update_tarif_intracity_mpa');?>" title="Update Tarif">
                                    <span> Update Tarif</span>
                                    &nbsp;<span class="label label-warning pull-right" id="notif_update_intracity_mpa"></span>
                                    </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="<?php echo site_url('print_tarif');?>" class="waves-effect" title="Download Tarif"><i class="ti-share" ></i><span> Download Tarif </span></a>
                            </li>
                            <!--
                            <li class="has_sub">
                                <a href="<?php echo site_url('aktivasi_tarif_mpa');?>" class="waves-effect" title="Aktivasi Service"><i class="ti-pencil-alt" ></i><span> Aktivasi Tarif </span></a>
                            </li>
                            -->
                            <li class="has_sub">
                                <a href="<?php echo site_url('report_mpa');?>" class="waves-effect" title="Report"><i class="ti-bar-chart" ></i><span> Report </span></a>
                            </li>
                            <!--
                            <li class="has_sub">
                                <a href="<?php echo site_url('download_tarif_mpa');?>" class="waves-effect" title="Download Tarif"><i class="ti-files" ></i><span> Download Tarif </span></a>
                            </li>
                            -->
                            <li class="has_sub">
                                <a href="<?php echo site_url('manage_user');?>" class="waves-effect" title="Management User"><i class="ti-user" ></i><span> Management User </span></a>
                            </li>
                            

                            <li class="text-muted menu-title">Menu Simulasi</li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect" title="Simulasi Testing"><i class=" ti-reload"></i><span> Simulasi Testing</span> <span class="menu-arrow"></span></a>
                                <ul>
                                    <li>
                                        <a href="<?php echo site_url('utcu');?>" title="Update Tarif Cabang Utama"><span>Update Tarif Cabang Utama</span></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('utc');?>" title="Update Tarif Cabang"><span>Update Tarif Cabang</span></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('uc');?>" title="Ubah Coding"><span>Ubah Coding</span></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('uz');?>" title="Ubah Zona"><span>Ubah Zona</span></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('nar');?>" title="Non Aktif Routing"><span>Non Aktif Routing</span></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('nas');?>" title="Non Aktif Service"><span>Non Aktif Service</span></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('ass');?>" title="Aktivasi Service"><span>Aktivasi Service</span></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('simulasi_btbp');?>" title="Aktivasi Service"><span>Update BTBP</span></a>
                                    </li>
                                    <!--
                                    <li>
                                        <a href="<?php echo site_url('btbp');?>" title="Update BTBP"><span>Update BTBP</span></a>
                                    </li>
                                    -->
                                    <li>
                                        <a href="<?php echo site_url('uti');?>" title="Update Tarif Intracity"><span>Update Tarif Intracity</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect" title="Simulasi Live"><i class="  ti-location-arrow"></i><span> Simulasi Live</span> <span class="menu-arrow"></span></a>
                                <ul>
                                    <li>
                                        <a href="<?php echo site_url('live_utcu');?>" title="Update Tarif Cabang Utama"><span>Update Tarif Cabang Utama</span></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('live_utc');?>" title="Update Tarif Cabang"><span>Update Tarif Cabang</span></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('live_uc');?>" title="Ubah Coding"><span>Ubah Coding</span></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('live_uz');?>" title="Ubah Zona"><span>Ubah Zona</span></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('live_narr');?>" title="Non Aktif Routing"><span>Non Aktif Routing</span></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('live_nasr');?>" title="Non Aktif Service"><span>Non Aktif Service</span></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('live_as');?>" title="Aktivasi Service"><span>Aktivasi Service</span></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('live_btbp');?>" title="Update BTBP"><span>Update BTBP</span></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('live_uti');?>" title="Update Tarif Intracity"><span>Update Tarif Intracity</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="<?php echo site_url('check_upload');?>" class="waves-effect" title="Check Upload"><i class=" ti-search"></i> <span> Check Upload </span> </a>
                            </li>
                            <li class="has_sub">
                                <a href="<?php echo site_url('roll_back');?>" class="waves-effect" title="Roll Back"><i class=" ti-reload"></i> <span> Roll Back </span> </a>
                            </li>
                            <?php
                            }else{}
                            ?>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <?php echo $this->load->view($view) ?>
                            </div>

                            <div class="col-md-6 col-lg-3">
                                
                            </div>

                            <div class="col-md-6 col-lg-3">
                                
                            </div>

                            <div class="col-md-6 col-lg-3">
                                
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-lg-4">
                        		

                            </div>

                            <div class="col-lg-8">
                                  
                            </div>



						            </div>
                        <!-- end row -->


                        <div class="row">

                            <div class="col-lg-6">
                        	   

                            </div>

                            <!-- col -->

                        	<div class="col-lg-6">
                        		
                        	</div>
                        	<!-- end col -->



                        </div>
                        <!-- end row -->


                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                    © 2017. Powered by IT Development Dept.
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
            <div class="side-bar right-bar nicescroll">
                <h4 class="text-center">Chat</h4>
                <div class="contact-list nicescroll">
                    <ul class="list-group contacts-list">
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-1.jpg" alt="">
                                </div>
                                <span class="name">Chadengle</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-2.jpg" alt="">
                                </div>
                                <span class="name">Tomaslau</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-3.jpg" alt="">
                                </div>
                                <span class="name">Stillnotdavid</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-4.jpg" alt="">
                                </div>
                                <span class="name">Kurafire</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-5.jpg" alt="">
                                </div>
                                <span class="name">Shahedk</span>
                                <i class="fa fa-circle away"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-6.jpg" alt="">
                                </div>
                                <span class="name">Adhamdannaway</span>
                                <i class="fa fa-circle away"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-7.jpg" alt="">
                                </div>
                                <span class="name">Ok</span>
                                <i class="fa fa-circle away"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-8.jpg" alt="">
                                </div>
                                <span class="name">Arashasghari</span>
                                <i class="fa fa-circle offline"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-9.jpg" alt="">
                                </div>
                                <span class="name">Joshaustin</span>
                                <i class="fa fa-circle offline"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-10.jpg" alt="">
                                </div>
                                <span class="name">Sortino</span>
                                <i class="fa fa-circle offline"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /Right-bar -->

        </div>
        <!-- END wrapper -->



        <script>
            var resizefunc = [];
        </script>



        <!-- jQuery  -->
        <script src="<?php echo base_url();?>themes/assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url();?>themes/assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>themes/assets/js/detect.js"></script>
        <script src="<?php echo base_url();?>themes/assets/js/fastclick.js"></script>
        <script src="<?php echo base_url();?>plugin/jquery/jquery-1.12.4.js"></script>
        <script src="<?php echo base_url();?>plugin/jquery/jquery-ui.js"></script>

        <script src="<?php echo base_url();?>themes/assets/js/jquery.slimscroll.js"></script>
        <script src="<?php echo base_url();?>themes/assets/js/jquery.blockUI.js"></script>
        <script src="<?php echo base_url();?>themes/assets/js/waves.js"></script>
        <script src="<?php echo base_url();?>themes/assets/js/wow.min.js"></script>
        <script src="<?php echo base_url();?>themes/assets/js/jquery.nicescroll.js"></script>
        <script src="<?php echo base_url();?>themes/assets/js/jquery.scrollTo.min.js"></script>

        <script src="<?php echo base_url();?>themes/assets/plugins/peity/jquery.peity.min.js"></script>

        <!-- jQuery  -->
        <script src="<?php echo base_url();?>themes/assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
        <script src="<?php echo base_url();?>themes/assets/plugins/counterup/jquery.counterup.min.js"></script>



        <script src="<?php echo base_url();?>themes/assets/plugins/morris/morris.min.js"></script>
        <script src="<?php echo base_url();?>themes/assets/plugins/raphael/raphael-min.js"></script>

        <script src="<?php echo base_url();?>themes/assets/plugins/jquery-knob/jquery.knob.js"></script>

        <script src="<?php echo base_url();?>themes/assets/pages/jquery.dashboard.js"></script>

        <script src="<?php echo base_url();?>themes/assets/js/jquery.core.js"></script>
        <script src="<?php echo base_url();?>themes/assets/js/jquery.app.js"></script>


        <!-- MPA -->
        <script>
            $(document).ready(function () {
               var availableDates = ["1-7-2017","11-7-2017","21-7-2017","1-8-2017","11-8-2017","21-8-2017",
                                      "1-9-2017","11-9-2017","21-9-2017","1-10-2017","11-10-2017","21-10-2017",
                                      "1-11-2017","11-11-2017","21-11-2017","1-12-2017","11-12-2017","21-12-2017",

                                      "1-1-2018","11-1-2018","21-1-2018","1-2-2018","11-2-2018","21-2-2018",
                                      "1-3-2018","11-3-2018","21-3-2018","1-4-2018","11-4-2018","21-4-2018",
                                      "1-5-2018","11-5-2018","21-5-2018","1-6-2018","11-6-2018","21-6-2018",
                                      "1-7-2018","11-7-2018","21-7-2018","1-8-2018","11-8-2018","21-8-2018",
                                      "1-9-2018","11-9-2018","21-9-2018","1-10-2018","11-10-2018","21-10-2018",
                                      "1-11-2018","11-11-2018","21-11-2018","1-12-2018","11-12-2018","21-12-2018",

                                      "1-1-2019","11-1-2019","21-1-2019","1-2-2019","11-2-2019","21-2-2019",
                                      "1-3-2019","11-3-2019","21-3-2019","1-4-2019","11-4-2019","21-4-2019",
                                      "1-5-2019","11-5-2019","21-5-2019","1-6-2019","11-6-2019","21-6-2019",
                                      "1-7-2019","11-7-2019","21-7-2019","1-8-2019","11-8-2019","21-8-2019",
                                      "1-9-2019","11-9-2019","21-9-2019","1-10-2019","11-10-2019","21-10-2019",
                                      "1-11-2019","11-11-2019","21-11-2019","1-12-2019","11-12-2019","21-12-2019",

                                      "1-1-2020","11-1-2020","21-1-2020","1-2-2020","11-2-2020","21-2-2020",
                                      "1-3-2020","11-3-2020","21-3-2020","1-4-2020","11-4-2020","21-4-2020",
                                      "1-5-2020","11-5-2020","21-5-2020","1-6-2020","11-6-2020","21-6-2020",
                                      "1-7-2020","11-7-2020","21-7-2020","1-8-2020","11-8-2020","21-8-2020",
                                      "1-9-2020","11-9-2020","21-9-2020","1-10-2020","11-10-2020","21-10-2020",
                                      "1-11-2020","11-11-2020","21-11-2020","1-12-2020","11-12-2020","21-12-2020",

                                      "1-1-2021","11-1-2021","21-1-2021","1-2-2021","11-2-2021","21-2-2021",
                                      "1-3-2021","11-3-2021","21-3-2021","1-4-2021","11-4-2021","21-4-2021",
                                      "1-5-2021","11-5-2021","21-5-2021","1-6-2021","11-6-2021","21-6-2021",
                                      "1-7-2021","11-7-2021","21-7-2021","1-8-2021","11-8-2021","21-8-2021",
                                      "1-9-2021","11-9-2021","21-9-2021","1-10-2021","11-10-2021","21-10-2021",
                                      "1-11-2021","11-11-2021","21-11-2021","1-12-2021","11-12-2021","21-12-2021",

                                      "1-1-2022","11-1-2022","21-1-2022","1-2-2022","11-2-2022","21-2-2022",
                                      "1-3-2022","11-3-2022","21-3-2022","1-4-2022","11-4-2022","21-4-2022",
                                      "1-5-2022","11-5-2022","21-5-2022","1-6-2022","11-6-2022","21-6-2022",
                                      "1-7-2022","11-7-2022","21-7-2022","1-8-2022","11-8-2022","21-8-2022",
                                      "1-9-2022","11-9-2022","21-9-2022","1-10-2022","11-10-2022","21-10-2022",
                                      "1-11-2022","11-11-2022","21-11-2022","1-12-2022","11-12-2022","21-12-2022",

                                      "1-1-2023","11-1-2023","21-1-2023","1-2-2023","11-2-2023","21-2-2023",
                                      "1-3-2023","11-3-2023","21-3-2023","1-4-2023","11-4-2023","21-4-2023",
                                      "1-5-2023","11-5-2023","21-5-2023","1-6-2023","11-6-2023","21-6-2023",
                                      "1-7-2023","11-7-2023","21-7-2023","1-8-2023","11-8-2023","21-8-2023",
                                      "1-9-2023","11-9-2023","21-9-2023","1-10-2023","11-10-2023","21-10-2023",
                                      "1-11-2023","11-11-2023","21-11-2023","1-12-2023","11-12-2023","21-12-2023",

                                      "1-1-2024","11-1-2024","21-1-2024","1-2-2024","11-2-2024","21-2-2024",
                                      "1-3-2024","11-3-2024","21-3-2024","1-4-2024","11-4-2024","21-4-2024",
                                      "1-5-2024","11-5-2024","21-5-2024","1-6-2024","11-6-2024","21-6-2024",
                                      "1-7-2024","11-7-2024","21-7-2024","1-8-2024","11-8-2024","21-8-2024",
                                      "1-9-2024","11-9-2024","21-9-2024","1-10-2024","11-10-2024","21-10-2024",
                                      "1-11-2024","11-11-2024","21-11-2024","1-12-2024","11-12-2024","21-12-2024",

                                      "1-1-2025","11-1-2025","21-1-2025","1-2-2025","11-2-2025","21-2-2025",
                                      "1-3-2025","11-3-2025","21-3-2025","1-4-2025","11-4-2025","21-4-2025",
                                      "1-5-2025","11-5-2025","21-5-2025","1-6-2025","11-6-2025","21-6-2025",
                                      "1-7-2025","11-7-2025","21-7-2025","1-8-2025","11-8-2025","21-8-2025",
                                      "1-9-2025","11-9-2025","21-9-2025","1-10-2025","11-10-2025","21-10-2025",
                                      "1-11-2025","11-11-2025","21-11-2025","1-12-2025","11-12-2025","21-12-2025",


                                    ];

            function available(date) {
              dmy = date.getDate() + "-" + (date.getMonth()+1) + "-" + date.getFullYear();
              console.log(dmy+' : '+($.inArray(dmy, availableDates)));
              if ($.inArray(dmy, availableDates) != -1) {
                return [true, "","Available"];
              } else {
                return [false,"","unAvailable"];
              }
            }
               var daysToAdd = 0;
               $("#date_1").datepicker({
                  changeMonth: true,
                  changeYear: true,
                  beforeShowDay: available,
                  minDate: +0,
                  onSelect: function (selected) {
                     var dtMax = new Date(selected);
                     dtMax.setDate(dtMax.getDate() + daysToAdd);
                     var dd = dtMax.getDate();
                     var mm = dtMax.getMonth() + 1;
                     var y = dtMax.getFullYear();
                     var dtFormatted = mm + '/'+ dd + '/'+ y;
                     $("#date_2").datepicker("option", "minDate", dtFormatted);

                  }
               });
             
               $("#date_2").datepicker({
                  changeMonth: true,
                  changeYear: true,
                  //beforeShowDay: available,
                  onSelect: function (selected) {
                     var dtMax = new Date(selected);
                     dtMax.setDate(dtMax.getDate() - daysToAdd);
                     var dd = dtMax.getDate();
                     var mm = dtMax.getMonth() + 1;
                     var y = dtMax.getFullYear();
                     var dtFormatted= mm + '/'+ dd + '/'+ y;
                     $("#date_1").datepicker("option", "maxDate", dtFormatted)
                  }
               });
            });

            
        </script>

        <!-- Report -->
        <script type="text/javascript">
            $(document).ready(function () {
               var daysToAdd = 0;
               $("#date_from").datepicker({
                  changeMonth: true,
                  changeYear: true,
                  onSelect: function (selected) {
                     var dtMax = new Date(selected);
                     dtMax.setDate(dtMax.getDate() + daysToAdd);
                     var dd = dtMax.getDate();
                     var mm = dtMax.getMonth() + 1;
                     var y = dtMax.getFullYear();
                     var dtFormatted = mm + '/'+ dd + '/'+ y;
                     $("#date_thru").datepicker("option", "minDate", dtFormatted);

                  }
               });
             
               $("#date_thru").datepicker({
                  changeMonth: true,
                  changeYear: true,
                  onSelect: function (selected) {
                     var dtMax = new Date(selected);
                     dtMax.setDate(dtMax.getDate() - daysToAdd);
                     var dd = dtMax.getDate();
                     var mm = dtMax.getMonth() + 1;
                     var y = dtMax.getFullYear();
                     var dtFormatted= mm + '/'+ dd + '/'+ y;
                     $("#date_from").datepicker("option", "maxDate", dtFormatted)
                  }
               });
            });
        </script>

        <!-- Untuk CS3 -->
        <script>
            $('#OrderDate').datepicker({ minDate: +0, maxDate: "+2D" });
        </script>

        <script>
            $(document).ready(function () {
               var daysToAdd = 0;
               $("#tanggal").datepicker({
                  changeMonth: true,
                  changeYear: true,
                  minDate:+0,
                  onSelect: function (selected) {
                     var dtMax = new Date(selected);
                     dtMax.setDate(dtMax.getDate() + daysToAdd);
                     var dd = dtMax.getDate();
                     var mm = dtMax.getMonth() + 1;
                     var y = dtMax.getFullYear();
                     var dtFormatted = mm + '/'+ dd + '/'+ y;
                     $("#tanggal2").datepicker("option", "minDate", dtFormatted);

                  }
               });

               $("#tanggal2").datepicker({
                  changeMonth: true,
                  changeYear: true,
                  onSelect: function (selected) {
                     var dtMax = new Date(selected);
                     dtMax.setDate(dtMax.getDate() - daysToAdd);
                     var dd = dtMax.getDate();
                     var mm = dtMax.getMonth() + 1;
                     var y = dtMax.getFullYear();
                     var dtFormatted= mm + '/'+ dd + '/'+ y;
                     $("#tanggal").datepicker("option", "maxDate", dtFormatted)
                  }
               });
            });
        </script>

        <script src="<?php echo base_url();?>plugin/datatables/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url();?>plugin/datatables/js/dataTables.bootstrap.min.js"></script>
        <script>
          $('#mydata').dataTable();
          $('#mydatas').dataTable();
        </script>

        <script>
            $(document).ready(function() {
                $('#tbl_id').dataTable({
                    "aLengthMenu": [[100, 250, 500, -1], [100, 250, 500, "All"]],
                    "iDisplayLength": 100,
                });
            } );    
        </script>

        <script>
            $(document).ready(function() {
                $('#isoplus').dataTable({
                    "aLengthMenu": [[100, 250, 500, -1], [100, 250, 500, "All"]],
                    "iDisplayLength": 100,
                    "bLengthChange": false,
                });
            } );    
        </script>

        <script>
            $(document).ready(function() {
                var oTable = $('#myTable').dataTable({
                    "aLengthMenu": [[10, 50, 100, 1000, 2000, 5000, 10000, -1], [10, 50, 100, 1000, 2000, 5000, 10000, "All"]],
                    "iDisplayLength": 10
                });
                // Get the length
                var btbp_no_urut = (oTable.fnGetData().length);
                $("#no_urut_btbp").val(btbp_no_urut);
                stateSave: true;
            } );    
        </script>

        <script>
            $('#okelah').dataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "<?php echo site_url().'update_tarif_cabang_utama_requester/c_update_tarif_cabang_utama_requester/generate_update_generate_all'?>",
                "deferLoading": 10
            });
        </script>

        <script type="<?php echo base_url();?>themes/text/javascript">
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });

                $(".knob").knob();

            });
        </script>
        
        <script type="text/javascript" src="<?php echo base_url().'js/notif_users.js';?>"></script>
        <script>
            function myOnload()
            {
                
                utcu();
                intra();
                notif_update_tarif_cabang_regional();
                notif_ubah_coding_regional();
                notif_ubah_zona_regional();
                notif_non_aktif_routing_regional();
                notif_non_aktif_service_regional();
                notif_penambahan_service_regional();
                notif_aktivasi_service_regional();
                bete_dah();
                
                utcu_mpa();
                intra_mpa();
                notif_update_tarif_cabang_mpa();
                notif_ubah_coding_mpa();
                notif_ubah_zona_mpa();
                notif_non_aktif_routing_mpa();
                notif_non_aktif_service_mpa();
                notif_penambahan_service_mpa();
                notif_aktivasi_service_mpa();
                bete_juga();
            }
        </script>
        
        <script>
            var url_update_tarif_cabang_utama_regional  = "<?php echo site_url().'manage_user/c_manage_user/update_tarif_cabang_utama_regional'; ?>";
            var url_update_tarif_cabang_regional        = "<?php echo site_url().'manage_user/c_manage_user/update_tarif_cabang_regional'; ?>";
            var url_ubah_coding_regional                = "<?php echo site_url().'manage_user/c_manage_user/ubah_coding_regional'; ?>";
            var url_ubah_zona_regional                  = "<?php echo site_url().'manage_user/c_manage_user/ubah_zona_regional'; ?>";
            var url_non_aktif_routing_regional          = "<?php echo site_url().'manage_user/c_manage_user/non_aktif_routing_regional'; ?>";
            var url_non_aktif_service_regional          = "<?php echo site_url().'manage_user/c_manage_user/non_aktif_service_regional'; ?>";
            var url_penambahan_service_regional         = "<?php echo site_url().'manage_user/c_manage_user/penambahan_service_regional'; ?>";
            var url_aktivasi_service_regional           = "<?php echo site_url().'manage_user/c_manage_user/aktivasi_service_regional'; ?>";
            var url_update_intracity_regional           = "<?php echo site_url().'manage_user/c_manage_user/update_intracity_regional'; ?>";
            var url_btbp_approve_1                      = "<?php echo site_url().'manage_user/c_manage_user/btbp_approve_1';?>";

            var url_update_tarif_cabang_utama_mpa  = "<?php echo site_url().'manage_user/c_manage_user/update_tarif_cabang_utama_mpa'; ?>";
            var url_update_tarif_cabang_mpa        = "<?php echo site_url().'manage_user/c_manage_user/update_tarif_cabang_mpa'; ?>";
            var url_ubah_coding_mpa                = "<?php echo site_url().'manage_user/c_manage_user/ubah_coding_mpa'; ?>";
            var url_ubah_zona_mpa                  = "<?php echo site_url().'manage_user/c_manage_user/ubah_zona_mpa'; ?>";
            var url_non_aktif_routing_mpa          = "<?php echo site_url().'manage_user/c_manage_user/non_aktif_routing_mpal'; ?>";
            var url_non_aktif_service_mpa          = "<?php echo site_url().'manage_user/c_manage_user/non_aktif_service_mpa'; ?>";
            var url_penambahan_service_mpa         = "<?php echo site_url().'manage_user/c_manage_user/penambahan_service_mpa'; ?>";
            var url_aktivasi_service_mpa           = "<?php echo site_url().'manage_user/c_manage_user/aktivasi_service_mpa'; ?>";
            var url_update_intracity_mpa           = "<?php echo site_url().'manage_user/c_manage_user/update_intracity_mpa'; ?>";
            var url_btbp_approve_2                 = "<?php echo site_url().'manage_user/c_manage_user/btbp_approve_2';?>";
        </script>

    </body>
</html>