<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Admin</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/lte/plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/lte/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <div class="navbar-search-block">
          
        </div>
      </li>

      <!-- Messages Dropdown Menu -->

      <!-- Notifications Dropdown Menu -->

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('master.layout.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div>
          <form class="form-inline" style="padding-bottom: 1rem; flex-direction:row-reverse">
            <div class="input-group">
              <select class="form-control mt-1" id="departemen" name="departemen" >
                <option value="angkatan" selected>Umum</option>
                <option value="Ilmu Ekonomi" >Departemen Ilmu Ekonomi</option>
                <option value="Manajemen" >Departemen Manajemen</option>
                <option value="Akuntansi" >Departemen Akuntansi</option>
            </select>
                
            </div>
          </form>
        </div>


        <div class="card" style="margin-right: 2.5rem; margin-left: 2.5rem;">
          <div class="card-header-border-0">
            <h3 class="card-title"></h3>
            {{-- <div class="card-tools"> 
              <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    Add Alumni
                  </button>
            </div> --}}
          </div>

          <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

          {{-- <div class="chart-container" style="position: relative; height:40vh; width:20vw">
            <canvas id="alumniChart"></canvas>
         </div>  --}}

              <div class="col-lg-6" style="padding-top:0.5rem">
                <div class="card">
                  <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                      <h3 class="card-title">Berdasarkan Departemen</h3>
                      {{-- <a href="javascript:void(0);">View Report</a> --}}
                    </div>
                    <div class="d-flex justify-content-between">
                      {{-- <h3 class="card-title">Umum</h3> --}}
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="d-flex">
                      
                    </div>
                    <!-- /.d-flex -->
      
                    <div class="position-relative mb-4">
                      <canvas id="alumniChart" height="200"></canvas>
                    </div>
      
                    <div class="d-flex flex-row justify-content-end">
                    </div>
                  </div>
                </div>
                <!-- /.card -->
      
                
                <!-- /.card -->
              </div>

              <div class="col-lg-6">
                <div class="card">
                  <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                      <h3 class="card-title">Kategori Pekerjaan</h3>
                      {{-- <a href="javascript:void(0);">View Report</a> --}}
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="d-flex">
                      {{-- <p class="d-flex flex-column">
                        <span class="text-bold text-lg">820</span>
                        <span>Visitors Over Time</span>
                      </p>
                      <p class="ml-auto d-flex flex-column text-right">
                        <span class="text-success">
                          <i class="fas fa-arrow-up"></i> 12.5%
                        </span>
                        <span class="text-muted">Since last week</span>
                      </p> --}}
                    </div>
                    <!-- /.d-flex -->
    
                    <div class="position-relative mb-4">
                      <canvas id="kategori_pekerjaan" height="200"></canvas>
                    </div>
    
                    <div class="d-flex flex-row justify-content-end">
                      
                    </div>
                  </div>
                </div>
              <!-- /.col-md-6 -->
              



              <script>
                document.addEventListener("DOMContentLoaded", function() {
                    var departemenDropdown = document.getElementById('departemen');
                    var alumniChart; // Variable to store the chart instance
                    var defaultAlumniData = {!! json_encode($data['angkatan']) !!};
                    var alumniData;
            
                    departemenDropdown.addEventListener('change', function() {
                        // Get the selected value from the dropdown
                        var selectedValue = departemenDropdown.value;
                        
                        // Save the selected value to a JavaScript variable
                        var selectedDepartemen = selectedValue;
                        
                        // Do something with the selected value, for example, log it
                        console.log('Selected Departemen:', selectedDepartemen);
            
                        // Set the alumniData based on the selected departemen
                        switch (selectedDepartemen) {
                            case "angkatan":
                                alumniData = {!! json_encode($data['angkatan']) !!};
                                break;
                            case "Ilmu Ekonomi":
                                alumniData = {!! isset($data['departemen']['Ilmu Ekonomi']) ? json_encode($data['departemen']['Ilmu Ekonomi']) : 'null' !!};
                                break;
                            case "Akuntansi":
                                alumniData = {!! isset($data['departemen']['Akuntansi']) ? json_encode($data['departemen']['Akuntansi']) : 'null' !!};
                                break;
                            case "Manajemen":
                                alumniData = {!! isset($data['departemen']['Manajemen']) ? json_encode($data['departemen']['Manajemen']) : 'null' !!};
                                break;
                            default:
                                // Handle the case where selectedDepartemen is empty or not recognized
                                // For example, you may set it to a default value
                                alumniData = defaultAlumniData;
                                break;
                        }
            
                        // Update the chart with the new alumniData
                        updateChart(alumniData);
                    });
            
                    // Initialize the chart with the default data
                    updateChart(defaultAlumniData);
            
                    function updateChart(data) {
                        if (!alumniChart) {
                            var ctx = document.getElementById('alumniChart').getContext('2d');
                            alumniChart = new Chart(ctx, {
                                type: 'doughnut',
                                data: {
                                    labels: Object.keys(data),
                                    datasets: [{
                                        label: 'Jumlah Alumni',
                                        data: Object.values(data),
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(54, 162, 235, 0.2)',
                                            'rgba(255, 206, 86, 0.2)',
                                            'rgba(75, 192, 192, 0.2)',
                                            'rgba(153, 102, 255, 0.2)',
                                            'rgba(255, 159, 64, 0.2)'
                                        ],
                                        borderColor: [
                                            'rgba(255, 99, 132, 1)',
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)',
                                            'rgba(75, 192, 192, 1)',
                                            'rgba(153, 102, 255, 1)',
                                            'rgba(255, 159, 64, 1)'
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }]
                                    }
                                }
                            });
                        } else {
                            alumniChart.data.labels = Object.keys(data);
                            alumniChart.data.datasets[0].data = Object.values(data);
                            alumniChart.update();
                        }
                    }
                });
            </script>
            
            


          <div class="card-body table-responsive p-0">
            
          </div>
          
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <script>
    // Data untuk chart
    var alumniData = {!! json_encode($data['kategori']) !!};

    // Labels untuk chart
    var labels = Object.keys(alumniData);
    
    // Data untuk chart
    var data = Object.values(alumniData);

    // Konfigurasi chart
    var options = {
        aspectRatio: 1,
        plugins: {
            legend: {
                position: 'right',
            },
        },
    };

    // Inisialisasi chart
    var ctx = document.getElementById('kategori_pekerjaan').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                label: 'Jumlah Alumni',
                data: data,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: options
    });
</script>

  <!-- Main Footer -->
  <footer class="main-footer">
    
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
{{-- <script src="plugins/jquery/jquery.min.js"></script> --}}
<!-- Bootstrap -->
{{-- <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script> --}}
<!-- AdminLTE -->
{{-- <script src="dist/js/adminlte.js"></script> --}}

<!-- OPTIONAL SCRIPTS -->
{{-- <script src="plugins/chart.js/Chart.min.js"></script> --}}
<!-- AdminLTE for demo purposes -->
{{-- <script src="dist/js/demo.js"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="dist/js/pages/dashboard3.js"></script> --}}


</body>
</html>
