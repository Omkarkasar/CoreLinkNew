<x-header />

<body id="page-top">

    <div id="wrapper">

        @include('layouts.sidebar')

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
                <!-- Topbar Start -->
                @include('layouts.topbar');
                <!-- Topbar End -->

                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800 d-flex justify-content-between align-items-center">
                        Tables
                        <button type="button" class="btn btn-primary btn-sm px-3 py-2" data-toggle="modal"
                            data-target="#exampleModal">+ Add New Record</button>
                    </h1>

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add New Chapters</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <form id="SubmitForm">
                                        @csrf
                                        <input type="hidden" id="id" name="id">

                                        <div class="mb-3">
                                            <select name="regionname" id="regionname" class="form-control">
                                                <option value="">Select Region</option>
                                                @foreach ($regions as $region)
                                                    <option value="{{ $region->id }}">{{ $region->regionname }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="chaptername" class="col-form-label">Chapter Name:</label>
                                            <input type="text" class="form-control" id="chaptername" name="chaptername">
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                                i
                            </div>
                        </div>
                    </div>


                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Simple Table Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Region Name</th>
                                            <th>Chapter Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Table body will be filled by jQuery AJAX -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>

        </div>

    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    @include('partials/logout')


    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

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
                let formData = new FormData(this);
                $.ajax({
                    url: "{{ route('chapterstore') }}",
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
                });
            });

            function fetchrecords() {
                $('#datatable tbody').html('<tr><td colspan="6" class="text-center">Loading data...</td></tr>');

                $.ajax({
                    url: 'chapterget',
                    type: 'GET',
                    success: function (response) {
                        let rows = '';
                        $.each(response, function (index, record) {
                            rows += `<tr>
                                        <td>${record.id}</td>
                                        <td>${record.regionname}</td>
                                        <td>${record.chaptername}</td>
                                        <td>
                                            <button class="btn btn-danger deleteBtn" data-id="${record.id}">Delete</button>
                                        </td>
                                     </tr>`;
                        });
                        $('#datatable tbody').html(rows);
                    },
                    error: function (xhr) {
                        console.log("Error:", xhr.responseText);
                    }
                });
            }

            $(document).on('click', '.deleteBtn', function () {
                let id = $(this).data('id');
                $.ajax({
                    url: `chapterdelete/${id}`,
                    type: 'DELETE',
                    success: function (response) {
                        alert(response.success);
                        fetchrecords();
                    },
                    error: function (e) {
                        console.log(e.responseText);
                    }
                });
            });

            $('#searchForm').on('submit', function (e) {
                e.preventDefault();
                var searchVal = $('#search').val();
                $.ajax({
                    url: 'chaptersearchoperation',
                    type: "GET",
                    data: { search: searchVal },
                    success: function (response) {
                        var tr = response.length ? response.map(data =>
                            `<tr><td>${data.id}</td><td>${data.chaptername}</td><td>${data.regionname}</td><td>${data.chaptername}</td><td><button class="btn btn-danger deleteBtn" data-id='${data.id}'>Delete</button></td>
</tr>`
                        ).join('') : '<tr><td colspan="4" class="text-center">No records found</td></tr>';
                        $('#datatable tbody').html(tr);
                    }
                });
            });


        });
    </script>
</body>

</html>