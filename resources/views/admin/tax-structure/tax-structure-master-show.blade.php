@extends('admin.common.main')
@section('containes')

<div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
</div>
</div>
</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
<main class="py-4">
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="toolbar" id="kt_toolbar">
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <span style="display:none" class="h-20px border-gray-300 border-start mx-4"></span>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                        <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                            data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                            class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">

                            <span style="display:none" class="h-20px border-gray-300 border-start mx-4"></span>
                            <ul style="display:none" class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                                <li class="breadcrumb-item text-muted">
                                    <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Home</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                                </li>
                                <li class="breadcrumb-item text-muted">Customers</li>
                                <li class="breadcrumb-item">
                                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                                </li>
                                <li class="breadcrumb-item text-dark">Customer Listing</li>
                            </ul>
                        </div>
                        <div class="d-flex align-items-center gap-2 gap-lg-3">

                            <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                                <div>
                                    <a href="{{route('tax-structure-master-create')}}" class="btn btn-primary btn-sm"
                                        role="button">Add Tax Structure</a>
                                </div>
                                <br>
                            </div>

                            <a style="display:none" href="../../demo1/dist/.html" class="btn btn-sm btn-primary"
                                data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Create</a>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                    </div>
                    <a style="display:none" href="../../demo1/dist/.html" class="btn btn-sm btn-primary"
                        data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Create</a>
                </div>
            </div>
        </div>

        @if(Session::has('message'))
        <div style="text-align: center;">
            <div style="width: 500px; margin: 0 auto;" class="alert alert-success">{{ Session::get('message') }}</div>
        </div>
        @endif
        <br>
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <br>
            <div id="kt_content_container" class="container-xxl">
                <div class="card">
                    <div class="card-header border-1 pt-6">
                        <div class="card-title">
                            <div class="d-flex align-items-center position-relative my-1">
                                &nbsp;

                                Tax Structure Masters List

                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <table class="table align-middle table-row-dashed fs-7 gy-5" id="tableYajra">
                            <thead>
                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                    <th id="th">SR NO</th>
                                    <th id="th">UNIQUE ID</th>
                                    <th id="th">TAX STRUCTURE NAME</th>
                                    <th id="th">STATUS</th>
                                    <th id="th">ACTIONS</th>

                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
    </div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <body>
        <script>
        $(document).ready(function() {
            var table = $('#tableYajra').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('tax-structure-master-show') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'unique_id',
                        name: 'unique_id'
                    },
                    {
                        data: 'tax_structure_name',
                        name: 'tax_structure_name'
                    },
                    {
                        data: 'status',
                        name: 'status',
                        render: function(data, type, full, meta) {
                            var statusText = data === 'Active' ? 'Active' : 'Inactive';
                            var statusClass = data === 'Active' ? 'text-success' :
                            'text-danger';
                            var iconClass = data === 'Active' ? 'fas fa-check-circle' :
                                'fas fa-times-circle';

                            return '<div class="status-container d-flex align-items-center">' +
                                '<i class="' + iconClass + ' ' + statusClass +
                                ' toggle-status-icon" data-id="' + full.id + '"></i>' +
                                '<span class="mx-2 ' + statusClass +
                                ' toggle-status-text" data-id="' + full.id + '">' + statusText +
                                '</span>' +
                                '</div>';
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    }
                ],
                rowCallback: function(row, data, index) {
                    var api = this.api();
                    var startIndex = api.page() * api.page.len();
                    var rowNum = startIndex + index + 1;
                    $(row).find('td:eq(0)').html(rowNum);
                }
            });


            
            $(document).on('click', '.toggle-status-icon', function() {
                var id = $(this).data('id');
                var element = $(this);

                $.ajax({
                    url: "{{ route('update-status') }}",
                    type: 'POST',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        // Toggle the icon and text based on the response
                        element.toggleClass('fa-check-circle fa-times-circle');
                        element.toggleClass('text-success text-danger');
                        element.siblings('.toggle-status-text').text(response.status ===
                            'Active' ? 'Active' : 'Inactive');
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });
            });



            setTimeout(function() {
                $("div.alert-success").remove();
            }, 3000);
        });
        </script>



        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
        <script>
        $(document).ready(function() {
            console.log("ready!");
        });
        </script>



    </body>

    </html>
    @endsection