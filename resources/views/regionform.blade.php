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

                <!-- Topbarstart -->
                @include('layouts.topbar')
                <!-- Topbarend -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800 d-flex justify-content-between align-items-center">
                        Tables
                        <button type="button" class="btn btn-primary btn-sm px-3 py-2" data-toggle="modal"
                            data-target="#exampleModal">
                            + Add New Record
                        </button>
                    </h1>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add new region</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <!-- Bootstrap 4 -->
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="SubmitForm">
                                        @csrf
                                        <div class="mb-3">
                                            <input type="hidden" id="id" name="id">

                                            <label for="regionname" class="col-form-label">Region Name:</label>
                                            <input type="text" class="form-control" id="regionname" name="regionname">
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button> <!-- Bootstrap 4 -->
                                            <button type="submit" name="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>







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
                                            <th>Region Name</th>
                                            <th>Action</th>
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
    @include('partials/logout')


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
                var url = "{{route('regionstore')}}";
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
                $('#datatable tbody').html('<tr><td colspan="6" class="text-center">Loading data...</td></tr>');
                $.ajax({
                    url: 'regionget',
                    type: 'GET',
                    success: function (response) {
                        var tr = '';
                        for (var i = 0; i < response.length; i++) {
                            var id = response[i].id;
                            var regionname = response[i].regionname;
                            tr += '<tr>';
                            tr += '<td>' + id + '</td>';
                            tr += '<td>' + regionname + '</td>';
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
                    url: `regiondelete/${id}`,
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
            $('#searchForm').on('submit', function (e) {
                e.preventDefault();
                var searchVal = $('#search').val();
                $.ajax({
                    url: 'regionsearchoperation',
                    type: "GET",
                    data: { search: searchVal },
                    success: function (response) {
                        var tr = response.length ? response.map(data =>
                            `<tr><td>${data.id}</td><td>${data.regionname}</td><td><button class="btn btn-danger deleteBtn" data-id='${data.id}'>Delete</button></td>
</tr>`
                        ).join('') : '<tr><td colspan="4" class="text-center">No records found</td></tr>';
                        $('#datatable tbody').html(tr);
                    }
                });
            });




        })
    </script>
</body>

</html>