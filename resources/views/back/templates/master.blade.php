<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('public/admin/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
        href="{{url('public/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{url('public/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{url('public/admin/plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('public/admin/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{url('public/admin/dist/css/adminlte.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{url('public/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{url('public/admin/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{url('public/admin/plugins/summernote/summernote-bs4.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{url('public/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet"
        href="{{url('public/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{url('/')}}" target="_blank" class="nav-link">Xem website</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{url('/admin/home')}}" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fa-solid fa-user"></i>
                        @if(isset(Auth::user()->name))
                        <span>{{Auth::user()->name}}</span>
                        <i class="fas fa-chevron-down"></i>
                        @endif
                        <!-- <span class="badge badge-warning navbar-badge">15</span> -->
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        @if(isset(Auth::user()->level) && Auth::user()->level == 1)
                        <div class="dropdown-divider"></div>
                        <a href="{{url('/admin/staff/list')}}" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> Qu???n l?? nh??n vi??n
                        </a>
                        @endif
                        <div class="dropdown-divider"></div>
                        <a href="{{url('admin/staff/profile')}}" class="dropdown-item">
                            <i class="fas fa-user-edit mr-2"></i> Th??ng tin t??i kho???n
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{url('/logout')}}" class="dropdown-item">
                            <i class="fas fa-door-open mr-2"></i> Tho??t
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{url('/admin/home')}}" class="brand-link">
                <img src="{{url('public/admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Qu???n tr??? Website</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{url('public/admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="{{url('/admin/staff/profile')}}" class="d-block">
                            {{Auth::user()->name}}
                        </a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Ph??n quy???n Administrator -->
                        @if(isset(Auth::user()->level) && Auth::user()->level == 1)
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview">
                            <a href="{{url('/admin/system')}}" class="nav-link @yield('system')">
                                <i class="fas fa-cog"></i>
                                <p>
                                    C???u h??nh h??? th???ng
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{url('http://demo-fx24.net/public/responsive_filemanager/filemanager/dialog.php?editor=ckeditor&type=1&lang=en_EN&popup=0&crossdomain=0&relative_url=0&akey=myPrivateKey&CKEditorFuncNum=3&CKEditor=ckeditor&fldr=tintuc%2F&62971e73b3eab')}}" class="nav-link">
                                <i class="fa-solid fa-photo-film"></i>
                                <p>
                                    Media
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{url('/admin/page/list')}}" class="nav-link @yield('page')">
                                <i class="fas fa-file"></i>
                                <p>
                                    Qu???n l?? trang
                                </p>
                            </a>
                        </li>
                        @endif
                        <!-- Ph??n quy???n Administrator -->

                        <!-- Ph??n quy???n Seo Content -->
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link @yield('qltt')">
                                <i class="fas fa-newspaper"></i>
                                <p>
                                    Qu???n l?? tin t???c
                                    <i class="fas fa-angle-down right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{url('/admin/category/list')}}" class="nav-link @yield('category')">
                                        ??? Danh m???c tin t???c
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/admin/news/list')}}" class="nav-link @yield('news')">
                                        ??? Danh s??ch tin t???c
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{url('/admin/social/list')}}" class="nav-link @yield('social')">
                                <i class="fas fa-share-alt"></i>
                                <p>
                                    Qu???n l?? m???ng x?? h???i
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{url('/admin/newsletter/list')}}" class="nav-link @yield('newsletter')">
                                <i class="fas fa-envelope-square"></i>
                                <p>
                                    Qu???n l?? nh???n tin khuy???n m??i
                                </p>
                            </a>
                        </li>
                        <!-- Ph??n quy???n Seo Content -->

                        <!-- Ph??n quy???n Administrator -->
                        @if(isset(Auth::user()->level) && Auth::user()->level == 1)
                        <li class="nav-item has-treeview">
                            <a href="{{url('/admin/contact/list')}}" class="nav-link @yield('contact')">
                                <i class="fas fa-address-book"></i>
                                <p>
                                    Qu???n l?? li??n h???
                                </p>
                            </a>
                        </li>
                        @endif
                        <!-- Ph??n quy???n Administrator -->
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <h1 class="m-0 text-dark">@yield('heading')</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Th??ng b??o -->
                    <div class="col-md-12">
                        @if(Session::has('flash_message'))
                        <div class="ad_message alert alert-{!! Session::get('flash_level') !!}">
                            {!! Session::get('flash_message') !!}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                    </div>
                    <!-- End -->
                    <!-- Main content -->
                    @yield('content')
                    <!-- /.content -->
                </div>
            </section>

        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2022 <a href="{{url('/')}}">demo-fx24.net</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{url('public/admin/plugins/jquery/jquery.min.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{url('public/admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{url('public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{url('public/admin/plugins/chart.js/Chart.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{url('public/admin/plugins/sparklines/sparkline.js')}}"></script>
    <!-- JQVMap -->
    <!-- <script src="{{url('public/admin/plugins/jqvmap/jquery.vmap.min.js')}}"></script> -->
    <!-- <script src="{{url('public/admin/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script> -->
    <!-- jQuery Knob Chart -->
    <script src="{{url('public/admin/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{url('public/admin/plugins/moment/moment.min.js')}}"></script>
    <script src="{{url('public/admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{url('public/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}">
    </script>
    <!-- Summernote -->
    <script src="{{url('public/admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{url('public/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{url('public/admin/dist/js/adminlte.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- <script src="{{url('public/admin/dist/js/pages/dashboard.js')}}"></script> -->
    <!-- AdminLTE for demo purposes -->
    <script src="{{url('public/admin/dist/js/demo.js')}}"></script>

    <!-- DataTables -->
    <script src="{{url('public/admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('public/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{url('public/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{url('public/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <!-- CKEditor -->
    <script src="{{url('public/ckeditor_4.19/ckeditor.js')}}"></script>
    <script>
    CKEDITOR.replace('ckeditor', {
        filebrowserBrowseUrl: "{!!url('public/responsive_filemanager/filemanager/dialog.php?type=2&editor=ckeditor&akey=myPrivateKey&fldr=')!!}",
        filebrowserUploadUrl: "{!!url('public/responsive_filemanager/filemanager/dialog.php?type=2&editor=ckeditor&akey=myPrivateKey&fldr=')!!}",
        filebrowserImageBrowseUrl: "{!!url('public/responsive_filemanager/filemanager/dialog.php?type=1&editor=ckeditor&akey=myPrivateKey&fldr=')!!}"
    });
    </script>

    <script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
    </script>
    <script>
    function changeToSlug() {
        var title, slug;

        //L???y text t??? th??? input title
        title = document.getElementById("title").value;

        //?????i ch??? hoa th??nh ch??? th?????ng
        slug = title.toLowerCase();

        //?????i k?? t??? c?? d???u th??nh kh??ng d???u
        slug = slug.replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/gi, 'a');
        slug = slug.replace(/??|??|???|???|???|??|???|???|???|???|???/gi, 'e');
        slug = slug.replace(/i|??|??|???|??|???/gi, 'i');
        slug = slug.replace(/??|??|???|??|???|??|???|???|???|???|???|??|???|???|???|???|???/gi, 'o');
        slug = slug.replace(/??|??|???|??|???|??|???|???|???|???|???/gi, 'u');
        slug = slug.replace(/??|???|???|???|???/gi, 'y');
        slug = slug.replace(/??/gi, 'd');
        //X??a c??c k?? t??? ?????t bi???t
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|'|\"|\:|\;|_/gi, '');
        //?????i kho???ng tr???ng th??nh k?? t??? g???ch ngang
        slug = slug.replace(/ /gi, "-");
        //?????i nhi???u k?? t??? g???ch ngang li??n ti???p th??nh 1 k?? t??? g???ch ngang
        //Ph??ng tr?????ng h???p ng?????i nh???p v??o qu?? nhi???u k?? t??? tr???ng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        //X??a c??c k?? t??? g???ch ngang ??? ?????u v?? cu???i
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        //In slug ra textbox c?? id ???slug???
        document.getElementById('slug').value = slug;
    };
    </script>
</body>

</html>