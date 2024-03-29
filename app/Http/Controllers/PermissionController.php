<?php

namespace App\Http\Controllers;

use App\Models\PermissionModel;
use App\Models\Menu;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Session;
use Exception;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{
    public $permission_model;
    public function __construct()
    {
        $this->permission_model = new PermissionModel();
    }

    public function sendMenu()
    {
        $Menus = Menu::where('parent_id', 0)->get();
        return view('admin.permission.addPermission', ['Menus' => $Menus]);
    }

    // get sub menus

    public function getSubmenus($menuId)
    {
        $menu = Menu::find($menuId);
        if (!$menu) {
            return response()->json(['error' => 'Menu not found'], 404);
        }
        $submenus = $menu->submenus;
        return response()->json($submenus);
    }

    public function storePermission(Request $request, PermissionModel $pm)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'menu_id' => 'required',
            'sub_menu_id' => 'nullable',
        ]);
        DB::beginTransaction();
        try {
            $store = new PermissionModel;
            $store->name = $request->get('name');
            $store->title = $request->get('title');
            $store->menu_id = $request->get('menu_id');
            $store->sub_menu_id = $request->get('sub_menu_id');
            $store->guard_name = $request->get('guard_name');
            $store->created_by = auth()->id();
            $store->save();


        } catch (Exception $exception) {
            DB::rollback();
            return back()->withError($exception->getMessage())->withInput();
        }
        Session::flash('message', 'Permission added successfully.');
        return redirect('showPermission');
    }

    public function fetchPermission(Request $request)
    {
        $permission_data = $this->permission_model->fetchPermission();
        $role_data = Role::findById($request->role_id);
        $rolepermission = $role_data->permissions->pluck('id')->toArray();

        // send menus in partial file
        $Menus = Menu::with('submenus.permissions')->where('parent_id', 0)->get();

        $html = view('admin.RolesAndPermission.partialFiles.partial', ['permission_data' => $permission_data, 'rolepermission' => $rolepermission , 'Menus'=>$Menus])->render();
        $response['html'] = $html;
        $response['status'] = true;
        return response(json_encode($response), 200);
    }
    public function showPermission(Request $request)
    {
        try {
            if ($request->ajax()) {
                $Organisation = $this->permission_model->fetchPermission();
                return DataTables::of($Organisation)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $encryptedId = encrypt($row->id);
                        $editUrl = route('edit-permission', ['id' => $encryptedId]);
                        $deleteUrl = route('delete-permission', ['id' => $encryptedId]);

                        $actionBtn = '<a href="' . $editUrl . '" title="Edit" class="menu-link flex-stack px-3" style="font-weight:normal !important;"><i class="fa fa-edit"  style="font-weight:normal !important;"></i></a>
                     <a  href="' . $deleteUrl . ' "title="Delete"   style="cursor: pointer;font-weight:normal !important;" class="menu-link flex-stack px-3"><i class="fa fa-trash" style="color:red"></i></a>';
                        return $actionBtn;
                    })
                    ->rawColumns(['action'])

                    ->make(true);
            }
        } catch (Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('admin.permission.showPermission');
    }

    public function editPermission($id, PermissionModel $pm)
    {
        $edit = PermissionModel::find(decrypt($id));
        $Menus = Menu::where('parent_id', 0)->get();
        return view('admin.permission.updatePermission', ['edit' => $edit , 'Menus'=>$Menus]);
    }

    public function updatePermission(Request $request, $id, PermissionModel $pm)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'menu_id' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $up = PermissionModel::find(decrypt($id));
            $up->name = $request->get('name');
            $up->title = $request->get('title');
            $up->menu_id = $request->get('menu_id');
            $up->sub_menu_id = $request->get('sub_menu_id');
            $up->updated_by = auth()->id();
            $up->save();
        } catch (Exception $exception) {
            DB::rollback();
            return back()->withError($exception->getMessage())->withInput();
        }
        Session::flash('message', 'Permission updated successfully.');
        return redirect('showPermission');
    }

    public function destroyPermission($id, PermissionModel $pm)
    {
        try {
            $user_id = auth()->id();
            $delete = PermissionModel::find(decrypt($id));
            if ($delete) {
                $delete->deleted_by = $user_id;
                $delete->save();
                $delete->delete();
                Session::flash('message', 'Permission Deleted successfully!');
            } else {
                Session::flash('error', 'Permission not found!');
            }
        } catch (Exception $exception) {
            Session::flash('error', $exception->getMessage());
        }
        return redirect('showPermission');
    }
}