<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="//blu.esdm.go.id/bsc/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="//blu.esdm.go.id/bsc/assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="//blu.esdm.go.id/bsc/assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="//blu.esdm.go.id/bsc/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="//blu.esdm.go.id/bsc/assets/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="//blu.esdm.go.id/bsc/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="//blu.esdm.go.id/bsc/assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="//blu.esdm.go.id/bsc/assets/dist/css/skins/_all-skins.min.css">

   <style type="text/css">
   .text-chart-white {
    color: #FFF;
  }
  a:hover .text-chart-white {

    color: #FFF;

}

</style>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<!-- jQuery 3 -->
<script src="//blu.esdm.go.id/bsc/assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="//blu.esdm.go.id/bsc/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- bootstrap datepicker -->
<script src="//blu.esdm.go.id/bsc/assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="//blu.esdm.go.id/bsc/assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- DataTables -->
<script src="//blu.esdm.go.id/bsc/assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="//blu.esdm.go.id/bsc/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="//blu.esdm.go.id/bsc/assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="//blu.esdm.go.id/bsc/assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="//blu.esdm.go.id/bsc/assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="//blu.esdm.go.id/bsc/assets/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</head>
<body class="hold-transition skin-yellow sidebar-mini">

<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="http://jdih.awanesia.com/logo-esdm-kuning.png"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>BSC</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
     <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">   
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="http://jdih.awanesia.com/logo-esdm-kuning.png" class="user-image" alt="User Image">
              <span class="hidden-xs">Administrator Sistem</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="http://jdih.awanesia.com/logo-esdm-kuning.png" class="img-circle" alt="User Image">

                <p>
                  Administrator Sistem                </p>
                <p>Administrator</p>
              </li>
              <!-- Menu Body --> 
              <!-- Menu Footer-->
              <li class="user-footer"> 
                <div class="pull-right">
                  <a href="//blu.esdm.go.id/bsc/index.php/auth/logout/" class="btn btn-default btn-flat">Keluar</a>
                </div>
              </li>
            </ul>
          </li> 
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar"> 
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">NAVIGASI</li>
        <li id="menuDashboard">
          <a href="//blu.esdm.go.id/bsc/index.php/dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard 1</span> 
          </a>
        </li> 
		<li id="menuDashboard">
          <a href="//blu.esdm.go.id/bsc/index.php/dashboard/form_a">
            <i class="fa fa-dashboard"></i> <span>Dashboard 2</span> 
          </a>
        </li> 
        <li id="MenuUnitKerja" class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Satuan Kerja</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="MenuUnitKerjaLemigas" class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> P3TEK
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="//blu.esdm.go.id/bsc/index.php/dashboard/form_b/p3tek"><i class="fa fa-circle-o"></i> Rekap</a></li>
                <li><a href="//blu.esdm.go.id/bsc/index.php/dashboard/form_c/p3tek"><i class="fa fa-circle-o"></i> Detail</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> TERKMIRA
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="//blu.esdm.go.id/bsc/index.php/dashboard/form_b/tekmira"><i class="fa fa-circle-o"></i> Rekap</a></li>
                <li><a href="//blu.esdm.go.id/bsc/index.php/dashboard/form_c/tekmira"><i class="fa fa-circle-o"></i> Detail</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> LEMIGAS
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="//blu.esdm.go.id/bsc/index.php/dashboard/form_b/lemigas"><i class="fa fa-circle-o"></i> Rekap</a></li>
                <li><a href="//blu.esdm.go.id/bsc/index.php/dashboard/form_c/lemigas"><i class="fa fa-circle-o"></i> Detail</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> P3GL
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="//blu.esdm.go.id/bsc/index.php/dashboard/form_b/p3gl"><i class="fa fa-circle-o"></i> Rekap</a></li>
                <li><a href="//blu.esdm.go.id/bsc/index.php/dashboard/form_c/p3gl"><i class="fa fa-circle-o"></i> Detail</a></li>
              </ul>
            </li>
			
          </ul>
        </li>
        
        <li class="header">Data Master</li>
        <li id="menuTarget">
          <a href="//blu.esdm.go.id/bsc/index.php/master/target">
            <i class="fa fa-rocket"></i> <span>Master Target</span>
          </a>
        </li>
        <li id="menuStruktur">
          <a href="//blu.esdm.go.id/bsc/index.php/master/struktur">
            <i class="fa fa-sitemap"></i> <span>Master Organisasi</span>
          </a>
        </li>  
        <li id="menuBranch">
          <a href="//blu.esdm.go.id/bsc/index.php/master/branch">
            <i class="fa fa-briefcase"></i> <span>Master Unit Kerja</span>
          </a>
        </li>
<!-- 
        <li class="header">Pengaturan</li>
           <li class="">
          <a href="//blu.esdm.go.id/bsc/index.php/pengguna">
            <i class="fa fa-users"></i> <span>Pengguna</span> 
          </a>
        </li>
		<li class="header">Form Laporan</li>
        <li class=""><a href="//blu.esdm.go.id/bsc/index.php/dashboard/form_a"><span>Form A</span></a></li>
        <li class=""><a href="//blu.esdm.go.id/bsc/index.php/dashboard/form_b"><span>Form B</span></a></li>
        <li class=""><a href="//blu.esdm.go.id/bsc/index.php/dashboard/form_c"><span>Form C</span></a></li>
-->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <script src="https://code.highcharts.com/highcharts.src.js"></script>
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Dashboard	</h1>
</section>
<!-- Array
(
    [__ci_last_regenerate] => 1562747474
    [referrer_url] => dashboard
    [login_id] => 1
    [username] => admin@admin.com
    [password] => 5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8
    [name] => Administrator Sistem
    [branch_id] => 0
    [branch_name] => Administrator
)
 -->

<!-- Main content -->

<section class="content">
	<div class="row">
		<div class="col-lg-3 col-xs-6"> 
			<!-- small box -->
			<div class="small-box bg-red">
				<div class="inner">
					<h2 style="margin: 0; padding: 0; font-weight: bold;">Kontrak</h2>
					<p style="">Tahun: 2018</p>
					<table width="100%">
						<tr>
							<th>Jumlah</th>
							<td><a href="//blu.esdm.go.id/bsc/index.php/#" data-toggle="tooltip" title="Rp.5.000.000.000" style="font-color:white" class="text-chart-white">Rp.50</a></td>
						</tr>
						<tr>
							<th>Nilai IDR</th>
							<td>asd</td>
						</tr>
						<tr>
							<th>Nilai USD</th>
							<td>asd</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-yellow">
				<div class="inner">
					<h2 style="margin: 0; padding: 0; font-weight: bold;">Job/LHU</h2>
					<p style="">Tahun: 2018</p>
					<table width="100%">
						<tr>
							<th>Jumlah</th>
							<td>asd</td>
						</tr>
						<tr>
							<th>Nilai IDR</th>
							<td>asd</td>
						</tr>
						<tr>
							<th>Nilai USD</th>
							<td>asd</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
					<h2 style="margin: 0; padding: 0; font-weight: bold;">Invoice</h2>
					<p style="">Tahun: 2018</p>
					<table width="100%">
						<tr>
							<th>Jumlah</th>
							<td>asd</td>
						</tr>
						<tr>
							<th>Nilai IDR</th>
							<td>asd</td>
						</tr>
						<tr>
							<th>Nilai USD</th>
							<td>asd</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-aqua">
				<div class="inner">
					<h2 style="margin: 0; padding: 0; font-weight: bold;">Invoice Terbayar</h2>
					<p style="">Tahun: 2018</p>
					<table width="100%">
						<tr>
							<th>Jumlah</th>
							<td>asd</td>
						</tr>
						<tr>
							<th>Nilai IDR</th>
							<td>asd</td>
						</tr>
						<tr>
							<th>Nilai USD</th>
							<td>asd</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<!-- ./col -->
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-warning">
				<div class="box-header">
					<h3 class="box-title">&nbsp;</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div id="thisChart2"></div>
				</div>
			</div>
			<!-- /.box --> 
		</div>
		<div class="col-md-6 col-xs-12">
			<div class="box box-warning">
				<div class="box-header">
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					</div>
				</div>
				<div class="box-body">
					<div id="branch_1"></div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-xs-12">
			<div class="box box-warning">
				<div class="box-header">
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					</div>
				</div>
				<div class="box-body">
					<div id="branch_2"></div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-xs-12">
			<div class="box box-warning">
				<div class="box-header">
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					</div>
				</div>
				<div class="box-body">
					<div id="branch_3"></div>
				</div>
			</div>
		</div>
		<!-- /.col -->
	</div>
	
	
</section>

<script>
$(function(){
	$('#menuDashboard').addClass('active');
	
Highcharts.chart('branch_1', {
	credits: { enabled: false },
	chart: {
        type: 'line'
    },
    title: {
        text: 'Pencapaian Unit Kerja 1'
    },
    xAxis: {
		crosshair: true,
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ]
    },
	yAxis: [{
        title: {
            text: 'Nilai IDR'
        }
    }, {
        title: {
            text: 'NIlai USD'
        },
		opposite: true,
    }],
	legend: {
        shadow: false
    },
	tooltip: {
        shared: true
    },
	series: [{
		// type: 'column',
        name: 'Target',
        data: [10, 20, 30, 40, 50, 60, 70, 80, 90, 100, 110, 120]
    }, {
		// type: 'column',
        name: 'Pendapatan IDR',
        data: [2, 4, 16, 27, 39, 47, 55, 61, 67, 77, 81, 120]
    }, {
		// type: 'column',
        name: 'Penerimaan IDR',
        data: [2, 4, 16, 27, 39, 47, 55, 61, 67, 77, 81, 120]
    }, {
		// type: 'column',
        name: 'Penerimaan USD',
		yAxis: 1,
        data: [0, 0, 10, 48, 50, 61, 63, 63, 63, 81, 81, 100]

    }]
});
Highcharts.chart('branch_2', {
	credits: { enabled: false },
	chart: {
        type: 'line'
    },
    title: {
        text: 'Pencapaian Unit Kerja 2'
    },
    xAxis: {
		crosshair: true,
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ]
    },
	yAxis: [{
        title: {
            text: 'Nilai IDR'
        }
    }, {
        title: {
            text: 'NIlai USD'
        },
		opposite: true,
    }],
	legend: {
        shadow: false
    },
	tooltip: {
        shared: true
    },
	series: [{
		// type: 'column',
        name: 'Target',
        data: [10, 20, 30, 40, 50, 60, 70, 80, 90, 100, 110, 120]
    }, {
		// type: 'column',
        name: 'Pendapatan IDR',
        data: [2, 4, 16, 27, 39, 47, 55, 61, 67, 77, 81, 120]
    }, {
		// type: 'column',
        name: 'Penerimaan IDR',
        data: [2, 4, 16, 27, 39, 47, 55, 61, 67, 77, 81, 120]
    }, {
		// type: 'column',
        name: 'Penerimaan USD',
		yAxis: 1,
        data: [0, 0, 10, 48, 50, 61, 63, 63, 63, 81, 81, 100]

    }]
});
Highcharts.chart('branch_3', {
	credits: { enabled: false },
	chart: {
        type: 'line'
    },
    title: {
        text: 'Pencapaian Unit Kerja 3'
    },
    xAxis: {
		crosshair: true,
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ]
    },
	yAxis: [{
        title: {
            text: 'Nilai IDR'
        }
    }, {
        title: {
            text: 'NIlai USD'
        },
		opposite: true,
    }],
	legend: {
        shadow: false
    },
	tooltip: {
        shared: true
    },
	series: [{
		// type: 'column',
        name: 'Target',
        data: [10, 20, 30, 40, 50, 60, 70, 80, 90, 100, 110, 120]
    }, {
		// type: 'column',
        name: 'Pendapatan IDR',
        data: [2, 4, 16, 27, 39, 47, 55, 61, 67, 77, 81, 120]
    }, {
		// type: 'column',
        name: 'Penerimaan IDR',
        data: [2, 4, 16, 27, 39, 47, 55, 61, 67, 77, 81, 120]
    }, {
		// type: 'column',
        name: 'Penerimaan USD',
		yAxis: 1,
        data: [0, 0, 10, 48, 50, 61, 63, 63, 63, 81, 81, 100]

    }]
});

/* Highcharts.chart('thisChart1', {
	credits: { enabled: false },
    chart: {
        type: 'column'
    },
    title: {
        text: 'BSC ALL'
    },
    xAxis: {
        categories: [
            'Branch 1',
            'Branch 2',
            'Branch 3'
        ]
    },
    yAxis: [{
        title: {
            text: 'Profit (millions)'
        }
    }],
    legend: {
        shadow: false
    },
    tooltip: {
        shared: true
    },
    plotOptions: {
        column: {
            grouping: false,
            shadow: false,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Target',
        color: 'rgba(248,161,63,1)',
        data: [183.6, 178.8, 198.5],
        tooltip: {
            valuePrefix: '$',
            valueSuffix: ' M'
        },
        pointPadding: 0.3,
        // pointPlacement: 0.2,
    }, {
        name: 'Profit Optimized',
        color: 'rgba(186,60,61,.9)',
        data: [203.6, 150, 208.5],
        tooltip: {
            valuePrefix: '$',
            valueSuffix: ' M'
        },
        pointPadding: 0.4,
        // pointPlacement: 0.2,
    }]
});
*/

Highcharts.chart('thisChart2', {
	credits: { enabled: false },
	chart: {
        type: 'column'
    },
    title: {
        text: 'Report Unit Kerja Tahun 2018'
    },
    xAxis: {
        categories: [
            'Unit 1',
            'Unit 2',
            'Unit 3',
        ]
    },
	yAxis: [{
        title: {
            text: 'Nilai IDR'
        }
    }, {
        title: {
            text: 'NIlai USD'
        },
		opposite: true,
    }],
	legend: {
        shadow: false
    },
	tooltip: {
        shared: true
    },
	series: [{
		// type: 'column',
        name: 'Target',
        data: [1000, 1200, 1000]

    }, {
		// type: 'column',
        name: 'Pendapatan IDR',
        data: [800, 1300, 500]

    }, {
		// type: 'column',
        name: 'Penerimaan IDR',
        data: [700, 1200, 400]

    }, {
		// type: 'column',
        name: 'Penerimaan USD',
		yAxis: 1,
        data: [10, 20, 60]

    }]
});

Highcharts.chart('GrafikTahunanSubUnit', {
	credits: { enabled: false },
	chart: {
        type: 'column'
    },
    title: {
        text: 'Report Unit Kerja Tahun 2019'
    },
    xAxis: {
		// labels: {
			// rotation: -45,
		// },
		crosshair: true,
        categories: [" BLM-1"," BLM-10"," BLM-2"," BLM-3"," BLM-4"," BLM-5"," BLM-6"," BLM-7"," BLM-8"," BLM-9"]    },
	yAxis: [{
        title: {
            text: 'Nilai IDR'
        }
    }, {
        title: {
            text: 'NIlai USD'
        },
		opposite: true,
    }],
	legend: {
        shadow: false
    },
	tooltip: {
        shared: true
    },
	series: [{"name":"target","data":[8000000000,200000000,null,3160000000,1304000000,29960000000,60830000000,22164550000,34346650000,27363045000]},{"name":"Invoice","data":[873558447.55,null,null,null,null,null,null,null,null,null]},{"name":"Agreement","data":[10000,null,null,null,null,null,null,null,null,null]},{"name":"Payment","data":[873558447.55,null,null,null,null,null,null,null,null,null]}]});
Highcharts.chart('GrafikBulananUnit', {
	credits: { enabled: false },
	chart: {
        // type: 'column'
    },
    title: {
        text: 'Report Unit Kerja Tahun 2019'
    },
    xAxis: {
		// labels: {
			// rotation: -45,
		// },
		crosshair: true,
        categories: ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"]    },
	yAxis: [{
        title: {
            text: 'Nilai IDR'
        }
    }, {
        title: {
            text: 'NIlai USD'
        },
		opposite: true,
    }],
	legend: {
        shadow: false
    },
	tooltip: {
        shared: true
    },
	series: [{"name":"target","data":[5381350000,8587915000,12040895000,19631395000,26997145000,40228095000,56116095000,74587395000,92181245000,121461245000,153354245000,187328245000]},{"name":"Payment","data":[null,null,null,null,null,null,null,null,null,null,null,873558447.55]},{"name":"Invoice","data":[null,null,null,null,null,null,null,null,null,null,null,null]},{"name":"Agreement","data":[10000,null,null,null,null,null,null,null,null,null,null,2542255122.11]}]});


});
</script>
  </div>
  <!-- /.content-wrapper -->
  
<!-- <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer> -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

</body>
</html>
