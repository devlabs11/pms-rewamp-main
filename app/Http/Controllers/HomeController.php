<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use carbon\Carbon;
use Illuminate\Support\Facades\Hash;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.common.main');
    }
    public function test()
    {
        $users=DB::table('tbl_user')->get();
        // dd( $users[0]->password);
        foreach ($users as $key => $value) {
          DB::table('tbl_user')
            ->where('id',$value->id)
            ->update(['enc_password' => Hash::make($value->password),'name' => $value->fullname,'email' => $value->emailid ?? 'NULL','created_at' => Carbon::createFromFormat('Y-m-d H:i:s',Now()),'updated_at' => Carbon::createFromFormat('Y-m-d H:i:s',Now())]); 
        }
        
    }
}
