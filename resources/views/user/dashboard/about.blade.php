@include('user.layout.header')

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



        <div class="main-banner" id="top">
            <div class="container-fluid">
                <div class="row">
                    <div class="" style="padding: 0px">
                        <div class="left-content">
                            <div class="thumb">
                                <div class="inner-content">
                                  <h1 class="h1 text-success"><b style="color: white">Informasi Alumni</b></h1>
                                  <h3 class="h2" style="color: white">Dihalaman ini anda dapat menemukan informasi alumni yang mungkin akan diperlukan untuk menghubungi alumni tersebut.
                                </h3>
                                   </div>
                                <img src="img/febub.jpg" alt="" style="height: 500px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Close Banner -->

    <!-- Start Section -->
    <section class="container py-5">
        <div class="row text-center pt-5 pb-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Jumlah Alumni</h1>
                <p>
                    Berikut adalah jumlah alumni disetiap departemen. Anda dapat berkontribusi dengan mendaftar dan mengisi biodata anda setelah login. Khusus untuk alumni dari Fakutltas Ekonomi Dan Bisnis Universitas Brawijaya.
                </p>
            </div>
        </div>
        <div class="row">

            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center">{{ $data['total'] }}</i></div>
                    <h2 class="h5 mt-4 text-center">Umum/Keseluruhan</h2>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center">{{ $data['Manajemen'] }}</i></div>
                    <h2 class="h5 mt-4 text-center">Manajemen</h2>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center">{{ $data['Akuntansi'] }}</i></div>
                    <h2 class="h5 mt-4 text-center">Akuntansi</h2>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center">{{ $data['Ilmu Ekonomi'] }}</i></div>
                    <h2 class="h5 mt-4 text-center">Ilmu Ekonomi</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section -->

    <!-- Start Brands -->
    <section class="bg-light py-5">
        <div class="container my-4">
            <div class="row text-center py-3">
                <div class="card-body table-responsive p-0">


                  <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- /.card -->
                
                                <div style="margin-bottom: 1rem; text-align: center;">
                                    <form method="GET" action="/alumni" class="form-inline d-inline-block">
                                        <div class="input-group">
                                            <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request('search') }}">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="submit">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                
                                    <form method="GET" action="/alumni" class="form-inline d-inline-block">
                                        <div class="input-group">
                                            <input type="text" name="angkatanSearch" class="form-control" placeholder="Angkatan" value="{{ request('angkatanSearch') }}">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="submit">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                
                
                                <div class="card">
                                    <div class="card-header border-0">
                                        <h3 class="card-title">Alumni</h3>
                                        {{-- <div class="card-tools"> 
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                                Add Alumni
                                            </button>
                                        </div> --}}
                                    </div>
                                    @if($alumni->count() > 0) 
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-striped table-valign-middle">
                                            <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Email</th>
                                                    <th>Departemen</th>
                                                    <th>Prodi</th>
                                                    <th>Angkatan</th>
                                                    <th>Pekerjaan</th>
                                                    <th>Kategori Pekerjaan</th>
                
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($alumni as $alumnus)
                                                <tr>
                                                    <td>{{ $alumnus->name }}</td>
                                                    <td>{{ $alumnus->email }}</td>
                                                    <td>{{ $alumnus->departemen }}</td>
                                                    <td>{{ $alumnus->prodi }}</td>
                                                    <td>{{ $alumnus->angkatan }}</td>
                                                    <td>{{ $alumnus->pekerjaan ?? '-' }}</td>
                                                    <td>{{ $alumnus->kategori_pekerjaan ?? '-' }}</td>
                
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    @else
                                    <div class="text-center">
                                        <p>Data tidak ada atau belum terdaftar.</p>
                                    </div>
                                    @endif
                                </div>
                                <!-- /.card -->
                
                                <!-- PAGINASI -->
                                {{ $alumni->appends(['search' => $search, 'angkatanSearch' => $angkatanSearch])->links() }}
                            </div>
                            <!-- /.col-md-6 -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </div>
                







                  </div>
           
            </div>
        </div>
    </section>
    <!--End Brands-->

    @include('user.layout.footer')

    <!-- End Footer -->

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->
</body>

</html>