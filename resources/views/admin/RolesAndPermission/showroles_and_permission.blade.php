@extends('admin.common.main')
@section('title', 'Role Has Permissions | DIPLERP')
@section('containes')


<div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
</div>
</div>
</div>
</div>

</div>
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

                            Role Has Permissions
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
                            
                            @if(session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                            @endif
                            <style>
                            .alert-success {
                                transition: opacity 2s ease-in-out;
                                opacity: 1;
                            }

                            .hide-alert {
                                opacity: 0;
                            }

                            .alert-success {
                                width: 50%;
                                margin: 0 auto;
                               margin-top:10px;
                                text-align: center;
                                transition: opacity 2s ease-in-out;
                                opacity: 1;
                            }

                            .hide-alert {
                                opacity: 0;
                            }
                            </style>
                            

                            <div class="card-body pt-5">
                                <form method="POST" id="form" action="{{ route('showroles_and_permissions') }}">
                                    @csrf
                                    <div class="row row-cols-2 row-cols-sm-3 rol-cols-md-1 row-cols-lg-2">
                                        <div class="col">
                                            <div class="fv-row mb-2">
                                                <label class="fs-6 fw-bold form-label mt-3">
                                                    <span class="border-span">❂ Assign Permissions To Role :</span>
                                                </label>
                                                <select class="form-control" id="role" name="role"
                                                    data-url="{{ route('fetchPermission') }}">
                                                    <option value="">select</option>

                                                    @foreach ($Ads as $role)

                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                            <span id="Error" style="color:red;"></span>
                                        </div>
                                        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                                    </div>
                                    <br>
                                    <div id="fetch" class="my-5" style="padding-left:20px">
                                    </div>
                                    <div style="float:right;">

                                        <div class="d-flex justify-content-end">
                                            <a href="/showroles_and_permission" class="btn btn-outline-danger btn-sm"
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
        var alertElement = document.querySelector('.alert-success');

        if (alertElement) {
            setTimeout(function() {
                alertElement.classList.add('hide-alert');
            }, 1000);
        }
    });
    </script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var form = document.getElementById('form');
        form.addEventListener('submit', function(event) {
            // Validate the dropdown selection
            var roleDropdown = document.getElementById('role');
            if (roleDropdown.value === '') {
                $('#Error').text('Please select role to get permission according to Role.');
                event.preventDefault();
            } else {

                $('#Error').text('');
            }
        });
        $('#role').on('change', function() {

            $('#Error').text('');
        });
    });
    </script>

    <script src="{{ asset('js/admin_js/rolesAndpermission.js') }}"></script>
    @endsection