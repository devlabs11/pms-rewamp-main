<?php

namespace App\Http\Controllers;


use App\Models\RolesModel;
use Illuminate\Http\Request;
use Exception;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class RolesController extends Controller
{


    public function storeRole(Request $request, RolesModel $rm)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $addRole = new RolesModel;
            $addRole->name = $request->get('name');
            $addRole->guard_name = $request->get('guard_name');
            $addRole->created_by = auth()->id();
            $addRole->save();
            DB::commit();
        } catch (Exception $exception) {

            DB::rollback();
            return back()->withError($exception->getMessage())->withInput();

        }
        Session::flash('message', 'Role added successfully.!');
        return redirect('showRoles');
    }




    public function showRole(Request $request)
    {
        try {
            if ($request->ajax()) {
                $Organisation = RolesModel::latest()->get();
                return DataTables::of($Organisation)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $encryptedId = encrypt($row->id);
                        $editUrl = route('edit-role', ['id' => $encryptedId]);
                        $deleteUrl = route('delete-role', ['id' => $encryptedId]);

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


        return view('admin.roles.showRoles');
    }

    public function editRole($id, RolesModel $rm)
    {

        $edit = RolesModel::find(decrypt($id));
        return view('admin.roles.updateRoles', ['edit' => $edit]);
    }


    public function updateRole(Request $request, $id, RolesModel $rm)
    {
        DB::beginTransaction();
        try {

            $update = RolesModel::find(decrypt($id));
            $update->name = $request->get('name');
            $update->updated_by = auth()->id();
            $update->save();
            DB::commit();
        } catch (Exception $exception) {

            DB::rollback();
            return back()->withError($exception->getMessage())->withInput();

        }
        Session::flash('message', 'Role Updated successfully.!');
        return redirect('showRoles');
    }


    public function destroyRole($id, RolesModel $rm)
    {
        try {
            $user_id = auth()->id();
            $delete = RolesModel::find(decrypt($id));

            if ($delete) {

                $delete->update(['deleted_by' => $user_id]);
                $delete->delete();

                Session::flash('message', 'Role Deleted successfully!');
            } else {
                Session::flash('error', 'Role not found!');
            }
        } catch (Exception $exception) {
            Session::flash('error', $exception->getMessage());
        }

        return redirect('showRoles');
    }

}