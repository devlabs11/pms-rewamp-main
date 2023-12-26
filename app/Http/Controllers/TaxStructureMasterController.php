<?php

namespace App\Http\Controllers;

use App\Models\TaxStructureModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Exception;
use Yajra\DataTables\Facades\DataTables;

class TaxStructureMasterController extends Controller
{
    
    public function storeTaxStructure(Request $request)
    {
        $request->validate([
            'tax_structure_name' => 'required',
            'tax' => 'required',
        ]);
        DB::beginTransaction();
        try {
        $storeTaxSt = new TaxStructureModel();
        $lastInsertedId = DB::table('tax_structure')->max('id');
        $uniqueId = 'V/TS/' . ($lastInsertedId + 1);
        $storeTaxSt->unique_id =  $uniqueId;
        $storeTaxSt->tax_structure_name =$request->get('tax_structure_name');
        $storeTaxSt->tax =$request->get('tax');
        $storeTaxSt->added_by =auth()->id();
        $storeTaxSt->save();
        DB::commit();
        } catch (Exception $exception) {
            
            DB::rollback();
            return back()->withError($exception->getMessage())->withInput();
            
        }
        Session::flash('message', ' Tax Structure Added Successfully.!'); 
        return redirect('tax-structure-master-show');
    }
    
    public function showTaxStructure(Request $request)
    {
        try {
            if ($request->ajax()) {
                $Organisation = TaxStructureModel::latest()->get();
                return DataTables::of($Organisation)
                    ->addIndexColumn()
                    ->addColumn('action', function($row) {
                        $encryptedId = encrypt($row->id);
                        $editUrl = route('edit-structure-tax-master', ['id' => $encryptedId]);
                        $deleteUrl = route('delete-structure-tax-master', ['id'=>$encryptedId]);
                    
                        $editBtn = '';
                        $deleteBtn = '';

                        $editBtn = '<a href="' . $editUrl . '" title="Edit" class="menu-link flex-stack px-3" style="font-weight:normal !important;"><i class="fa fa-edit"  style="font-weight:normal !important;"></i></a>';
                        $deleteBtn = '<a href="' . $deleteUrl . '" title="Delete" style="cursor: pointer;font-weight:normal !important;" class="menu-link flex-stack px-3"><i class="fa fa-trash" style="color:red"></i></a>';
                        $actionBtn = $editBtn . $deleteBtn;
                        return $actionBtn;
    
                    })
                    ->rawColumns(['action'])
                    
                    ->make(true);
            }
        } catch (Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

          
        return view('admin.tax-structure.tax-structure-master-show');
        
    }

    
    public function edit(string $id)
    {
        
    }

    
    public function update(Request $request, string $id)
    {
        
    }

    
    public function destroy(string $id)
    {
        
    }
}