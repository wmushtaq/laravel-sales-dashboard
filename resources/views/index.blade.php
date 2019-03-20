
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Laravel Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="/css/sb-admin-2.min.css" rel="stylesheet">

  <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="/vendor/daterangepicker/daterangepicker.css" rel="stylesheet">
  <style>
    @media (min-width: 768px){
        .chart-bar {
            height: 25rem;
        }
    }
  </style>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="/">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="alert alert-info text-center"><i class="fas fa-info-circle"></i> Sales Dashboard Demo - Created by <a href="https://www.upwork.com/fl/waqasmushtaq2">Waqas Mushtaq</a> - Source code available on <a href="https://github.com/wmushtaq/laravel-sales-dashboard">GitHub</a></div>

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <form method="POST" id="filters_form">
                <input type="text" name="date" class="form-control form-control-sm border border-light date_range" style="width: 200px" placeholder="Select Date Range">
            </form>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Sales</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800" id="total_sales">0</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Earnings</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800" id="total_earnings">$0</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">New Customers</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800" id="total_customers">0</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Recurring Customers</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800" id="recurring_customers">0</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-lg-12">
              <!-- Bar Chart -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Monthly Sales</h6>
                </div>
                <div class="card-body">
                  <div class="chart-bar" id="chart_div"></div>
                </div>
              </div>
            </div>

          </div>

          <div class="row">
            <div class="col-md-12">
                <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary float-left">Sales Data</h6>
              <a href="javascript:;" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right" id="download_csv"><i class="fas fa-download fa-sm text-white-50"></i> Download CSV</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered data-table" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Package</th>
                        <th>Amount</th>
                        <th>Customer Name</th>
                        <th>Customer Email</th>
                        <th>Customer Address</th>
                        <th>Customer Phone</th>
                        <th>Order Date/Time</th>
                    </tr>
                </thead>
                </table>
              </div>
            </div>
          </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script src="/vendor/daterangepicker/daterangepicker.js"></script>

  <script>
    // Call the dataTables jQuery plugin
    $(document).ready(function() {

        // Date  range picker
        $('.date_range').daterangepicker({
          autoUpdateInput: false,
          locale: {
              cancelLabel: 'Clear'
          }
        });
        $('.date_range').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
            fetchData();
        });
        $('.date_range').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
            fetchData();
        });

        $('#download_csv').click(function(){
            var params = '';
            var formData = $('#filters_form').serialize();

            window.location = '/download_csv/?' + params + formData;
        });

        fetchData();
    });

    function fetchData(){
        getStats();
        generateChart();
        getData();
    }

    function getStats(){
        var params = '';

        var formData = $('#filters_form').serialize();

        $.get("/get_stats/?" + params + formData, function(data, status){
            $('#total_sales').html(data.total_sales);
            $('#total_earnings').html('$' + number_format(data.total_earnings, 2));
            $('#total_customers').html(data.total_customers);
            $('#recurring_customers').html(data.recurring_customers);
        }, 'json');
    }

    function generateChart(){
        var params = '';

        var formData = $('#filters_form').serialize();

        $.get("/chart/?" + params + formData, function(data, status){

            var x_labels = new Array;
            var x_data = new Array;

            $.each(data, function(i, v){
                x_labels.push(v.month_year);
                x_data.push(parseFloat(v.total));
            });

            Highcharts.chart('chart_div', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: ''
                    },
                    xAxis: {
                        categories: x_labels
                    },
                    yAxis: {
                        title: {
                        text: ''
                        },
                        labels:{
                            format: '${value}'
                        },
                        gridLineColor: '#eaecf4'
                    },
                    tooltip: {
                        valueDecimals: 2,
                        valuePrefix: '$'
                    },
                    series: [{
                    color: '#4e73df',
                    name: 'Sales',
                    data: x_data
                    }]
                });
        }, 'json');
    }

    function number_format(number, decimals, dec_point, thousands_sep) {
        // *     example: number_format(1234.56, 2, ',', ' ');
        // *     return: '1 234,56'
        number = (number + '').replace(',', '').replace(' ', '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function(n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).  split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }

    function getData(){
        var params = '';

        var formData = $('#filters_form').serialize();

        var dt = $(".data-table").DataTable({
            processing: false,
            serverSide: true,
            destroy: true,
            searching: false,
            ajax: '{!! route('datatables.data') !!}/?' + params + formData,
            columns: [
                { data: 'package.name' },
                { data: 'package.price' },
                { data: 'customer.name' },
                { data: 'customer.email' },
                { data: 'customer.address' },
                { data: 'customer.phone' },
                { data: 'created_at' }
            ],
            order: [[ 6, "desc" ]],
            lengthMenu: [[25, 50, 100], [25, 50, 100]],
        });
    }
  </script>
</body>

</html>
