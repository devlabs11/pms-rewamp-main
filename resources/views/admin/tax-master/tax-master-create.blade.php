@extends('admin.common.main')
@section('title', 'Tax Master | DIPLERP')
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
                    <!-- <h5 style="margin-right:120px;"><strong>LIST OF GST</strong></h5> -->

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
                            Add Gst
                        </div>
                    </div>
                </div>
                <div class="card-body pt-8">

                    <div class="col-xl-12">
                        <div class="card card-flush h-lg-100" id="kt_contacts_main">

                            <div style="display:none" class="card-header pt-7" id="kt_chat_contacts_header">

                                <div style="display:none" class="card-title">

                                    <h2>Add GST</h2>
                                </div>
                            </div>

                            <div class="card-body pt-5">
                                <form method="POST" id="form" action="{{ route('tax-master-create') }}">
                                    @csrf

                                    <div class="row row-cols-1 row-cols-sm-3 rol-cols-md-1 row-cols-lg-3">
                                        <div class="col">
                                            <div class="fv-row mb-2">
                                                <label class="fs-6 fw-bold form-label mt-3">
                                                    <span class="">SGST</span><span style="color:red;">*</span>
                                                </label>
                                                <input type="text" name="sgst" id="sgst"
                                                    class="form-control form-control-solid" value="{{old('sgst')}}"
                                                    autocomplete="off" style="border: 1px solid black; padding: 13px;"
                                                    oninput="removeBorderStyle(this)">

                                                <span id="sgstError" style="color:red;"></span>

                                                @error('sgst')
                                                <div id="Errormsg">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="fv-row mb-2">
                                                <label class="fs-6 fw-bold form-label mt-3">
                                                    <span class="">CGST</span><span style="color:red;">*</span>
                                                </label>
                                                <input type="text" name="cgst" id="cgst"
                                                    class="form-control form-control-solid" value="{{old('cgst')}}"
                                                    autocomplete="off" style="border: 1px solid black; padding: 13px;"
                                                    oninput="removeBorderStyle(this)">
                                                <span id="cgstError" style="color:red;"></span>
                                                @error('cgst')
                                                <div id="Errormsg">{{ $message }}</div>
                                                @enderror


                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="fv-row mb-2">
                                                <label class="fs-6 fw-bold form-label mt-3">
                                                    <span class="">IGST</span><span style="color:red;">*</span>
                                                </label>
                                                <input type="text" name="igst" id="igst"
                                                    class="form-control form-control-solid" aria-required="true"
                                                    aria-invalid="true" value="{{old('igst')}}" autocomplete="off"
                                                    style="border: 1px solid black; padding: 13px;"
                                                    oninput="removeBorderStyle(this)">
                                                <span id="igstError" style="color:red;"></span>
                                                @error('igst')
                                                <div id="Errormsg">{{ $message }}</div>
                                                @enderror


                                            </div>
                                        </div>

                                    </div>
                                    <br>
                                    <div style="float:right;">

                                        <div class="d-flex justify-content-end">

                                            <a href="{{route('tax-master-show')}}" class="btn btn-outline-danger btn-sm"
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
    #sgst-error {
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
        var sgstInput = document.getElementById('sgst');
        var cgstInput = document.getElementById('cgst');
        var igstInput = document.getElementById('igst');

        var sgstError = document.getElementById('sgstError');
        var cgstError = document.getElementById('cgstError');
        var igstError = document.getElementById('igstError');

        form.addEventListener('submit', function(event) {
            if (!isValidNumeric(sgstInput.value.trim())) {
                sgstError.textContent = 'SGST must be a valid numeric value.';
                event.preventDefault();
            } else {
                sgstError.textContent = '';
            }

            if (!isValidNumeric(cgstInput.value.trim())) {
                cgstError.textContent = 'CGST must be a valid numeric value.';
                event.preventDefault();
            } else {
                cgstError.textContent = '';
            }

            if (!isValidNumeric(igstInput.value.trim())) {
                igstError.textContent = 'IGST must be a valid numeric value.';
                event.preventDefault();
            } else {
                igstError.textContent = '';
            }
        });

        // Add input event listeners to clear errors when the user types
        sgstInput.addEventListener('input', function() {
            sgstError.textContent = '';
        });

        cgstInput.addEventListener('input', function() {
            cgstError.textContent = '';
        });

        igstInput.addEventListener('input', function() {
            igstError.textContent = '';
        });

        function isValidNumeric(value) {
            return /^-?\d*\.?\d+$/.test(value);
        }
    });

    function removeBorderStyle(element) {
        if (element.value.trim() !== '') {
            element.style.border = 'none';
            element.style.padding = '13px';
        } else {
            element.style.border = '1px solid black';
            element.style.padding = '13px';
        }
    }
    </script>


    @endsection