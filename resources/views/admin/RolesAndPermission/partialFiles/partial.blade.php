<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JSTree-like Permissions</title>
   
    <style>
        .tree {
            padding-left: 20px;
            list-style: none;
        }

        .tree-node {
            position: relative;
            padding-left: 20px;
            margin-bottom: 5px;
        }

        .tree-node:before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 1px;
            border-left: 1px dotted grey;
            margin-left: -10px; /* Adjust as needed */
        }

        .border-span {
            padding: 5px;
            display: inline-block;
            background-color: #f1f1f1;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        /* Adjusted checkbox styling */
        .form-check-input {
            width: 15px; /* Adjust as needed */
            height: 15px; /* Adjust as needed */
        }

        /* Rounded border for permissions */
        .border-span[name="permission[]"] {
            border-radius: 10px; /* Adjust as needed */
        }
        .main-menu .form-check-input {
            display: none;
        }
        #menuid{
            display:none;
            color:black;
            font-weight: bold;
        }
        #submenu{
            display:none;
            color:black;
        }
    </style>
</head>
<body>

<label class="fs-6 fw-bold form-label mt-3">
    <span class="border-span">❂ Permissions :</span>
</label>

<ul class="tree">
    @foreach ($Menus as $menu)
        <li class="tree-node">
            <!-- Menu Checkbox -->
            <input type="checkbox"  id="menuid" value="{{ $menu->id }}"
                {{ in_array($menu->id, $rolepermission) ? 'checked' : '' }} name="menu[]">
            <label style="color:green;font-weight: bolder;font-size: 15px;" for="check{{ $menu->id }}">
                {{ strtoupper($menu->title) }}
            </label>

            @if ($menu->submenus && count($menu->submenus) > 0)
                <!-- Submenu Checkbox Group -->
                <ul class="tree">
                    @foreach ($menu->submenus as $submenu)
                        <li class="tree-node">
                            <!-- Submenu Checkbox -->
                            <input type="checkbox" class="form-check-input" id="submenu" value="{{ $submenu->id }}"
                                {{ in_array($submenu->id, $rolepermission) ? 'checked' : '' }} name="submenu[]">
                            <label style="color:green;font-weight:bold;font-size: 12px;  "  for="check{{ $submenu->id }}">
                                {{ strtoupper($submenu->title) }}
                            </label>

                            @if ($submenu->permissions && count($submenu->permissions) > 0)
                                <!-- Permission Checkbox Group -->
                                <ul class="tree">
                                    @foreach ($submenu->permissions as $permission)
                                        <li class="tree-node">
                                            <!-- Permission Checkbox -->
                                            <input type="checkbox" class="form-check-input" id="check{{ $permission->id }}" value="{{ $permission->id }}"
                                                {{ in_array($permission->id, $rolepermission) ? 'checked' : '' }} name="permission[]">
                                            <label style="border:1px dotted lightgrey" for="check{{ $permission->id }}">
                                                {{ strtoupper($permission->name) }}
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                </ul>
            @endif
        </li>
    @endforeach
</ul>

</body>
</html>