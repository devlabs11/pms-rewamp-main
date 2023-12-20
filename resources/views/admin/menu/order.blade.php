@extends('admin.common.main')
@section('containes')


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

<div class="col-lg-12">
        Note: To move the row, point to the serial number or record. When the pointer becomes a move pointer, drag the
        row to up or down.
    </div>
<div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
   
    <!--begin::User account menu-->
    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
        data-kt-menu="true">
        <!--begin::Menu item-->
        <div class="menu-item px-3">
            <div class="menu-content d-flex align-items-center px-3">
                <!--begin::Avatar-->

                <!--end::Avatar-->
                <!--begin::Username-->
                <div class="d-flex flex-column">
                    <div class="fw-bolder d-flex align-items-center fs-5">
                        Nishant </div>
                    <a href="#" class="fw-bold text-muted text-hover-primary fs-7">


                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>
</div>
</div>

<main class="py-4">
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div class="toolbar" id="kt_toolbar">
            <!--begin::Container-->
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <!--begin::Title-->
                    <!--end::Title-->
                    <!--begin::Separator-->
                    <span style="display:none" class="h-20px border-gray-300 border-start mx-4"></span>
                    <!--end::Separator-->
                    <!--begin::Breadcrumb-->
                    <ul style="display:none" class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Customers</li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-dark">Customer Listing</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <!--begin::Filter menu-->

                    <!--end::Filter menu-->
                    <!--begin::Secondary button-->

                    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                        <!--begin::Page title-->
                        <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                            data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                            class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">

                            <!--end::Title-->
                            <!--begin::Separator-->
                            <span style="display:none" class="h-20px border-gray-300 border-start mx-4"></span>
                            <!--end::Separator-->
                            <!--begin::Breadcrumb-->

                        </div>
                        <div class="d-flex align-items-center gap-2 gap-lg-3">
                            <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                               
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
        <br>
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <br>
            <div id="kt_content_container" class="container-xxl">
                <div class="card">
                    <div class="card-header border-0 pt-6">
                        <div class="card-title">
                            <div class="d-flex align-items-center position-relative my-1">
                                &nbsp;

                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0"> 
                        <table class="table align-middle table-row-dashed fs-7 gy-5 tbl_repeat" id="prospect-master">
                            <thead>
                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                    <th>Position</th>
                                    <th>Title</th>
                                </tr>
                            </thead>
                            <tbody class="fw-bold text-gray-600"  id="sortable">

                                @foreach($cols as $info)

								<tr id="{{ $info->id }}" data-id="{{ $info->id }}" class="ui-state-default">
                                <td width="15%">{{ $info->position }}</td>
                                <td width="95%">{{ $info->title }}</td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</div>
</div>
</div>


<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">


</div>
<style>
#th:hover {
    color: #202020;
}
</style>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/TableDnD/0.9.1/jquery.tablednd.js" integrity="sha256-d3rtug+Hg1GZPB7Y/yTcRixO/wlI78+2m08tosoRn7A=" crossorigin="anonymous"></script>
<script>
    
    jQuery(document).ready(function($) {
        
        $(".tbl_repeat tbody").tableDnD({ 
            onDrop: function(table, row) {
                var list = new Array();
                $('#sortable').find('.ui-state-default').each(function() {
                    var id = $(this).attr('data-id');
                    
                    list.push(id);
                });
                console.log(list);
                var data = JSON.stringify(list);
                $.ajax({
				dataType: 'json',
				type:'POST',
				url: '{{ URL::to('menu-sortable') }}',
				data:{ orders : data,
                    _token: '{{ csrf_token() }}',
                     pid : {{ $parent_id }} },
				datatype: 'json',
			});	
            }
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
</script>


@endsection