<!-- In your partial.blade.php or wherever you render the HTML -->
<style>
    /* Your existing styles remain unchanged */

    .submenu-checkbox-group {
        /* Add additional styling as needed */
    }

    .permission-checkbox-group {
        /* Add additional styling as needed */
    }
</style>

<label class="fs-6 fw-bold form-label mt-3">
    <span class="border-span" style="margin-left:-20px;">❂ Permissions :</span>
</label>

<div class="custom-checkbox-group">
    @foreach ($Menus as $menu)
        <div class="form-check">
            <!-- Menu Checkbox -->
            <input type="checkbox" class="form-check-input" id="check{{ $menu->id }}" value="{{ $menu->id }}"
                {{ in_array($menu->id, $rolepermission) ? 'checked' : '' }} name="menu[]">
            <label class="form-check-label" for="check{{ $menu->id }}">
                <span >{{ strtoupper($menu->title) }}</span>
            </label>

            @if ($menu->submenus && count($menu->submenus) > 0)
                <!-- Submenu Checkbox Group -->
                <div class="submenu-checkbox-group">
                    @foreach ($menu->submenus as $submenu)
                        <div class="form-check">
                            <!-- Submenu Checkbox -->
                            <input type="checkbox" class="form-check-input" id="check{{ $submenu->id }}" value="{{ $submenu->id }}"
                                {{ in_array($submenu->id, $rolepermission) ? 'checked' : '' }} name="submenu[]">
                            <label class="form-check-label" for="check{{ $submenu->id }}">
                                <span >{{ strtoupper($submenu->title) }}</span>
                            </label>

                            @if ($submenu->permissions && count($submenu->permissions) > 0)
                             
                                <div class="permission-checkbox-group">
                                    @foreach ($submenu->permissions as $permission)
                                        <div class="form-check">
                                            <!-- Permission Checkbox -->
                                            <input type="checkbox" class="form-check-input" id="check{{ $permission->id }}" value="{{ $permission->id }}"
                                                {{ in_array($permission->id, $rolepermission) ? 'checked' : '' }} name="permission[]">
                                            <label class="form-check-label" for="check{{ $permission->id }}">
                                                <span style="border: 1px dashed lightgrey; padding: 5px;">{{ strtoupper($permission->name) }}</span>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    @endforeach
</div>
