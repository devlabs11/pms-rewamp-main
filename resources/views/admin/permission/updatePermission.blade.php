@extends('admin.common.main')

@section('containes')


<div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
</div>
</div>
</div>
</div>

</div>
<script>
        var selectedSubmenuId = {{$edit->sub_menu_id ?? 'null'}};
        console.log('Selected Submenu ID:', selectedSubmenuId);
</script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />

<main class="py-4">
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

        <div class="toolbar" id="kt_toolbar">

            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">

                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">


                    <div class="d-flex align-items-center gap-2 gap-lg-3">

                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">


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
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="card">
                <div class="card-header border-2 pt-6">
                    <div class="card-title">
                        <div class="d-flex align-items-center position-relative my-1">
                            &nbsp;

                            Edit Permission
                        </div>
                    </div>
                </div>
                <div class="card-body pt-8">

                    <div class="col-xl-12">
                        <div class="card card-flush h-lg-100" id="kt_contacts_main">

                            <div style="display:none" class="card-header pt-7" id="kt_chat_contacts_header">

                                <div style="display:none" class="card-title">


                                </div>
                            </div>
                            <div class="card-body pt-5">
                                <form method="POST" id="form"
                                    action="{{ route('update-permission',encrypt($edit->id)) }}">
                                    @csrf
                                    <div class="row row-cols-2 row-cols-sm-3 rol-cols-md-1 row-cols-lg-2">
                                        <div class="col">
                                            <div class="fv-row mb-2">
                                                <label class="fs-6 fw-bold form-label mt-3">
                                                    <span class="">Title</span><span style="color: red;">*</span>
                                                </label>
                                                <input type="text" name="title" id="title"
                                                    class="form-control form-control-solids" value="{{$edit->title}}"
                                                    autocomplete="off" style="border: 1px solid black; padding: 13px;"
                                                    oninput="removeBorderStyle(this)">
                                                <span id="titleError" style="color:red;"></span>
                                                @error('title')
                                                <div id="Errormsg">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="fv-row mb-2">
                                                <label class="fs-6 fw-bold form-label mt-3">
                                                    <span class="">Permission Name</span><span
                                                        style="color: red;">*</span>
                                                </label>
                                                <input type="text" name="name" id="organisation_name"
                                                    class="form-control form-control-solids" value="{{$edit->name}}"
                                                    autocomplete="off" style="border: 1px solid black; padding: 13px;"
                                                    oninput="removeBorderStyle(this)">
                                                <span id="nameError" style="color:red;"></span>
                                                @error('name')
                                                <div id="Errormsg">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col">
    <div class="fv-row mb-2">
        <label class="fs-6 fw-bold form-label mt-3">
            <span class="">Menu</span><span style="color: red;">*</span>
        </label>

        <select name="menu_id" id="menu_id" class="form-control form-control-solids"
                style="border: 1px solid black; padding-top:0px; padding-bottom:0px;">

            <option value="">select</option>
            @foreach($Menus as $key=>$value)
                <option value="{{$value->id}}" @if($value->id == $edit->menu_id) selected @endif>{{$value->title}}</option>
            @endforeach
        </select>
        <span id="roleError" style="color:red;"></span>

        @error('role_id')
            <div id="Errormsg">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="col">
    <div class="fv-row mb-2">
        <label class="fs-6 fw-bold form-label mt-3">
            <span class="">Submenu</span><span style="color: red;">*</span>
        </label>

        <select name="sub_menu_id" id="submenu_id" class="form-control form-control-solids"
                style="border: 1px solid black; padding-top:0px; padding-bottom:0px;">
            <option value="">Select</option>
            <!-- Submenu options will be dynamically added here via Ajax -->
        </select>
        <span id="submenuError" style="color:red;"></span>

        @error('submenu_id')
            <div id="Errormsg">{{ $message }}</div>
        @enderror
    </div>
</div>

                                        <div class="col" style="display:none">
                                            <div class="fv-row mb-2">
                                                <label class="fs-6 fw-bold form-label mt-3">
                                                    <span class="">Guard Name</span><span style="color: red;">*</span>
                                                </label>
                                                <input type="text" name="guard_name" id="organisation_code"
                                                    class="form-control form-control-solids" value="web"
                                                    autocomplete="off" style="border: 1px solid black; padding: 13px;"
                                                    oninput="removeBorderStyle(this)">
                                                <span id="Error" style="color:red;"></span>
                                                @error('code')
                                                <div id="Errormsg">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div style="float:right;">
                                        <div class="d-flex justify-content-end">
                                            <a href="{{route('show-permission')}}" class="btn btn-outline-danger btn-sm"
                                                style="margin-right:10px;">Cancel</a>
                                            <button type="submit" id="submit" data-kt-contacts-type="submit"
                                                class="btn btn-primary btn-sm">
                                                <span class="indicator-label">Save</span>
                                            </button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    </div>
    </div>
    </div>
    </div>


    <style>
    #organisation_code-error {
        color: red;
        padding-top: 15px;

    }

    #Errormsg {
        color: red;
        margin-top: 10px;

    }
    </style>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var form = document.getElementById('form');
        form.addEventListener('submit', function(event) {
            var titleInput = document.getElementById('title');
            var nameInput = document.getElementById('organisation_name');

            var titleError = document.getElementById('titleError');
            var nameError = document.getElementById('nameError');


            if (titleInput.value.trim() === '') {
                titleError.textContent = 'Title is required.';
                event.preventDefault();
            } else {
                titleError.textContent = '';
            }


            if (nameInput.value.trim() === '') {
                nameError.textContent = 'Permission Name is required.';
                event.preventDefault();
            } else {
                nameError.textContent = '';
            }
        });


        var titleInput = document.getElementById('title');
        var nameInput = document.getElementById('organisation_name');

        titleInput.addEventListener('input', function() {
            document.getElementById('titleError').textContent = '';
        });

        nameInput.addEventListener('input', function() {
            document.getElementById('nameError').textContent = '';
        });
    });

    function removeBorderStyle(element) {
        element.style.border = '1px solid black';
    }
    </script>
 <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#menu_id').on('change', function() {
            var menuId = $(this).val();
            var submenuDropdown = $('#submenu_id');

            $.ajax({
                url: '/get-submenus/' + menuId,
                type: 'GET',
                success: function(data) {
                    submenuDropdown.empty();

                    if (data.length > 0) {
                        $.each(data, function(index, submenu) {
                            submenuDropdown.append('<option value="' + submenu.id +
                                '">' + submenu.title + '</option>');
                        });
                    } else {
                        
                            submenuDropdown.append('<option value="' + menuId + '">No submenus available</option>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });

    
    </script>
    @endsection