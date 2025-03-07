<x-header />

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for...">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown">
                                <i class="fas fa-bell fa-fw"></i>
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                        </li>

                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown">
                                <i class="fas fa-envelope fa-fw"></i>
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                        </li>
                    </ul>
                </nav>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                <h1 class="h3 mb-2 text-gray-800 d-flex justify-content-between align-items-center">
    Tables
    <button type="button" class="btn btn-primary btn-sm px-3 py-2" data-toggle="modal" data-target="#exampleModal">
        + Add New Record
    </button>
</h1>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span> <!-- Correct Bootstrap 4 close button -->
                </button>
            </div>
            <div class="modal-body">
                <form id="SubmitForm">
                    @csrf
                    <div class="mb-3">
                        <input type="hidden" id="id" name="id">

                        <label for="membername" class="col-form-label">Name:</label>
                        <input type="text" class="form-control" id="membername" name="membername">

                        <label for="memberemail" class="col-form-label">Email:</label>
                        <input type="text" class="form-control" id="memberemail" name="memberemail">

                        <label for="membermobile" class="col-form-label">Mobile Number:</label>
                        <input type="text" class="form-control" id="membermobile" name="membermobile">

                        <label for="membercompany" class="col-form-label">Company Name:</label>
                        <input type="text" class="form-control" id="membercompany" name="membercompany">

                        <label for="regionname" class="col-form-label">Region Name:</label>
                        <select id="regionname" name="regionname" class="form-control"> <!-- Added form-control -->
                            <option value="">Select Option</option>
                            @foreach ($regions as $region)
                                <option value="{{ $region->id }}">{{ $region->regionname }}</option>
                            @endforeach
                        </select>

                        <label for="chaptername" class="col-form-label">Chapter Name:</label>
                        <select id="chaptername" name="chaptername" class="form-control">
                            <option value="">Select Option</option>
                            @foreach ($chapters as $chapter)
                                <option value="{{ $chapter->id }}">{{ $chapter->chaptername }}</option>
                            @endforeach
                        </select>

                        <label for="categoryname" class="col-form-label">Category Name:</label>
                        <select id="categoryname" name="categoryname" class="form-control">
                            <option value="">Select Option</option>
                            @foreach ($categorys as $category)
                                <option value="{{ $category->id }}">{{ $category->categoryname }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    /* Add basic styling for better dropdown appearance */
    select.form-control {
        width: 100%;
        padding: 6px 12px;
        border: 1px solid #ced4da;
        border-radius: 4px;
        margin-bottom: 10px;
    }

    /* Optional: Style for better button spacing in modal footer */
    .modal-footer .btn {
        min-width: 100px;
    }
</style>





                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Simple Table Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Member Name</th>
                                            <th>Email</th>
                                            <th>Mobile Number</th>
                                            <th>Company</th>
                                            <th>Region</th>
                                            <th>Chapter</th>
                                            <th>Category</th>
                                            <th>Handle</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- <h1>Jquery will do magic here</h1> -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script>
        $(document).ready(function () {
            fetchrecords();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#SubmitForm').on('submit', function (e) {
                e.preventDefault();
                var id = $('#id').val();
                var formData = new FormData(this);
                var url = "{{route('memberstore')}}";
                $.ajax({
                    url: url,
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        $('#SubmitForm')[0].reset();
                        $('#exampleModal').modal('hide');
                        alert(response.success);
                        fetchrecords();
                    },
                    error: function (e) {
                        console.log(e.responseText);
                    }

                })

            })

            function fetchrecords() {
                $.ajax({
                    url: 'memberget',
                    type: 'GET',
                    success: function (response) {
                        var tr = '';
                        for (var i = 0; i < response.length; i++) {
                            var id = response[i].id;
                            var membername = response[i].membername;
                            var memberemail = response[i].memberemail;
                            var membermobile = response[i].membermobile;
                            var membercompany = response[i].membercompany;
                            var regionname = response[i].regionname;
                            var chaptername = response[i].chaptername;
                            var categoryname = response[i].categoryname;

                            tr += '<tr>';
                            tr += '<td>' + id + '</td>';
                            tr += '<td>' + membername + '</td>';
                            tr += '<td>' + memberemail + '</td>';
                            tr += '<td>' + membermobile + '</td>';
                            tr += '<td>' + membercompany + '</td>';
                            tr += '<td>' + regionname + '</td>';
                            tr += '<td>' + chaptername + '</td>';
                            tr += '<td>' + categoryname + '</td>';


                            tr += `<td><button class="btn btn-danger deleteBtn" data-id='${id}'>Delete</button></td>`;
                            tr += '</tr>';
                        }
                        $('#datatable tbody').html(tr);
                    },
                    error: function (xhr) {
                        console.log("Error :", xhr.responseText);
                    }

                })
            }
            fetchrecords();
            $(document).on('click', '.deleteBtn', function () {
                var id = $(this).data('id');
                $.ajax({
                    url: `memberdelete/${id}`,
                    type: 'DELETE',
                    success: function (response) {
                        alert(response.success);
                        fetchrecords();
                    },
                    error: function (e) {
                        console.log(e);
                    }
                })
            })
            // $('#searchForm').on('submit', function (e) {
            //     e.preventDefault();
            //     var searchVal = $('#search').val();    // Inlcuded

            //     $.ajax({
            //         url: 'searchoperation',   //Changed
            //         type: "GET",
            //         data: { search: searchVal },  // Inlcuded
            //         success: function (response) {
            //             var tr = '';
            //             if (response.length > 0) {
            //                 for (var i = 0; i < response.length; i++) {
            //                     tr += '<tr>';
            //                     tr += '<td>' + response[i].id + '</td>';
            //                     tr += '<td>' + response[i].categoryname + '</td>';
            //                     tr += `<td><button class="btn btn-success editBtn" data-id='${response[i].id}'>Edit</button> 
            //                        <button class="btn btn-danger deleteBtn" data-id='${response[i].id}'>Delete</button></td>`;
            //                     tr += '</tr>';
            //                 }
            //             } else {
            //                 tr = '<tr><td colspan="4" class="text-center">No records found</td></tr>';
            //             }
            //             $('#datatable tbody').html(tr);
            //         },
            //         error: function (e) {
            //             console.log(e.responseText);
            //         }
            //     });
            // });


        })
    </script>

</body>

</html>