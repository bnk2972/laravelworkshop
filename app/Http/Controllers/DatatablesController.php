<?php

namespace App\Http\Controllers;

use App\Admin;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class DatatablesController extends Controller
{
    public function getIndex()
    {
        return view('datatables.index');
    }

    public function anyData()
    {
        $admins = Admin::select(['id', 'name', 'email', 'created_at', 'updated_at']);
        return DataTables::of($admins)->addColumn('action', function($admin){
            return view('components.admin-report')->with('admin', $admin);
        })->make(true);
    }
}
