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
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition sidebar-mini">
  {{-- @dd($users) --}}
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
      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
      
      
    </ul>
  </nav>
  <!-- /.navbar -->

@include('master.layout.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    @if (session('storeSuccess'))
        <div class="w-100 d-flex justify-content-center">
            <div id="alert-success" class="alert alert-success w-50">
                {{ session('storeSuccess') }}
            </div>
        </div>
    @endif

    @if (session('updateSuccess'))
        <div class="w-100 d-flex justify-content-center">
            <div id="alert-success" class="alert alert-success w-50">
                {{ session('updateSuccess') }}
            </div>
        </div>
    @endif

    @if (session('deleteSuccess'))
        <div class="w-100 d-flex justify-content-center">
            <div id="alert-success" class="alert alert-success w-50">
                {{ session('deleteSuccess') }}
            </div>
        </div>
    @endif

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <!-- /.card -->

            <div>
              <form method="GET" action="/admin" class="form-inline" style="padding-bottom: 1rem; flex-direction:row-reverse">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request('search') }}">
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
                <h3 class="card-title">User</h3>
                <div class="card-tools">
                  <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleAddModalCenter">
                      Add User
                    </button>
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>NIM</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($users as $user)
                    <tr>
                      <td>
                        {{ $user->name }}
                      </td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->role }}</td>
                      <td>{{ $user->nim }}</td>
                      <td class="d-flex align-items-center">
                        <a type="button"  data-toggle="modal" data-target="#exampleEditModalCenter" class="text-muted edit-user"
                          data-id="{{ $user->id }}"
                          data-name="{{ $user->name }}"
                          data-email="{{ $user->email }}"
                        >
                          <i class="fas fa-edit"></i>
                        </a>
                        <form action="/admin/{{ $user->id }}" method="POST"
                          onsubmit="return confirm('Apakah anda yakin ingin menghapus User ini?')">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="text-muted border-0 text-decoration-none bg-transparent">
                            <i class="fas fa-trash"></i>
                          </button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->

            <!-- PAGINASI -->
            {{ $users->appends(['search' => $search])->links() }}

          </div>
          <!-- /.col-md-6 -->
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

  <!-- Main Footer -->
  <footer class="main-footer">
    
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="/lte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="/lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="/lte/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="/lte/plugins/chart.js/Chart.min.js"></script>
<script src="/lte/dist/js/demo.js"></script>
<script src="/lte/dist/js/pages/dashboard3.js"></script>
</body>
</html>


<!-- Modal Tambah User-->
<div class="modal fade" id="exampleAddModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  
        {{-- Autentications --}}
        <form method="POST" action="/admin">
          @csrf
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Name" name="name">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Email" name="email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          {{-- <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Role" name="role">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div> --}}
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
  
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit User-->
<div class="modal fade" id="exampleEditModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  
        {{-- Autentications --}}
        <form method="post" id="editForm">
          @method('PUT')
          @csrf
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Name" name="name" id="editName">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Email" name="email" id="editEmail">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Masukkan password baru" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          {{-- <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Role" name="role" id="editRole">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div> --}}
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
  
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
      // Handle click event on "Edit" link
      var editUserLinks = document.querySelectorAll('.edit-user');

      editUserLinks.forEach(function (link) {
          link.addEventListener('click', function () {
              // Retrieve user data from the data attributes
              var userId = this.getAttribute('data-id');
              var userName = this.getAttribute('data-name');
              var userEmail = this.getAttribute('data-email');

              // Set the values in the modal form
              document.getElementById('editName').value = userName;
              document.getElementById('editEmail').value = userEmail;
              // Set values for other form fields as needed

              // Update the form action URL to include the user ID
              document.getElementById('editForm').action = '/admin/' + userId;
          });
      });
  });
</script>

