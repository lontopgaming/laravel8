@include('user.layout.header')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
  .main-banner {
}

.main-banner .left-content .thumb img {
  width: 100%;
  overflow: hidden;
}

.main-banner .left-content .inner-content {
  position: absolute;
  left: 100px;
  top: 50%;
  transform: translateY(-50%);
}


</style>

<body class="bg-light">
  

   @include('user.layout.navbar')

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>



    <!-- Start Banner Hero -->

        {{-- <div class="card">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="img/UB.JPG" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-success"><b>Alumni FEB</b></h1>
                                <h3 class="h2">Mohon register untuk alumni agar dapat mendata alumni</h3>
                                <p>
                                    Aplikasi ini dibuat untuk mendata alumni yang kemudian data tersebut digunakan dengan semestinya.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
        </div> --}}

        <div class="main-banner" id="top">
          <div class="container-fluid">
              <div class="row">
                  <div class="" style="padding: 0px">
                      <div class="left-content">
                          <div class="thumb">
                              <div class="inner-content">
                                <h1 class="h1 text-success"><b style="color: white">Alumni FEB</b></h1>
                                <h3 class="h2" style="color: white">Mohon register untuk alumni agar dapat mendata alumni</h3>
                                <p style="color: white">
                                    Aplikasi ini dibuat untuk mendata alumni yang kemudian data tersebut digunakan dengan semestinya.
                                </p>
                                <p style="color: white">
                                  Untuk menciptakan ikatan yang kuat anda dapat menemukan no. telepon untuk saling menghubungi sesama alumni.
                                </p>
                                <p style="color: white">
                                  Aplikasi ini akan digunakan untuk monitoring persebaran lulusan dan bahan evaluasi pembelajaran.                                </p>
                                 </div>
                              <img src="img/UB.jpg" alt="" style="height: 500px;">
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

    <!-- End Banner Hero -->


    <!-- Start Categories of The Month -->
    <section class="container py-5">
        <div class="content">
            <div class="container-fluid">
              <div class="d-flex justify-content-center">
                <div class="col-lg-10" style="margin-bottom: 2rem">
                  <div class="card">
                    <div class="card-header border-0">
                      <div class="d-flex justify-content-between">
                        <h3 class="card-title">Umum</h3>
                        {{-- <a href="javascript:void(0);">View Report</a> --}}
                      </div>
                    </div>
                    <div class="card-body d-flex justify-content-center">
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
                        <canvas id="umum" style="height:500px; width:500px;"></canvas>
                      </div>
      
                      <div class="d-flex flex-row justify-content-end">
                        
                      </div>
                    </div>
                  </div>
                  <!-- /.card -->
      
                  <!-- /.card -->
                </div>
               

                        
              <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
          </div>
    </section>
    <!-- End Categories of The Month -->




    @include('user.layout.footer')

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->


    <!-- chart umum -->

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
        var ctx = document.getElementById('umum').getContext('2d');
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
</body>

</html>