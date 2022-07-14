<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreDepartmentRequest;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function index()
    {
        $listDep = Department::query()->get();
        return view("department", ['mydeps' => $listDep]);
    }
    public function store(StoreDepartmentRequest $request)
    {
        //code here to add new department
        $myDept = new Department();
        $myDept->fill([
            'name' => $request->name,
            'address' => $request->address,
            'contactNumber' => $request->contactNumber
        ]);
        $myDept->save();
        return redirect()->route('department');
    }
}
