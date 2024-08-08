<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('employees', [
            'employees' => Employee::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'tgl_lahir' => 'required|date',
            'gender' => 'required',
            'email' => 'required|email',
            'no_telp' => 'required',
            'provinsi' => 'required',
            'kab_kota' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'jabatan' => 'required',
            'photo' => 'required|file|image'
        ]);
        $validated['kab/kota'] = $validated['kab_kota'];
        $validated['tgl_lahir'] = date('Y-m-d', strtotime($validated['tgl_lahir']) );
        unset($validated['kab_kota']);
        unset($validated['photo']);
        // dd($validated);

        // upload foto
        $path = $request->file('photo')->store('photos');
        if(!$path){
            return redirect('/')->with('error', 'Data pegawai gagal ditambahkan!');
        }

        $validated['photo_url'] = $path;
        Employee::create($validated);
        return redirect('/')->with('success', 'Data pegawai berhasil ditambahkan!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
    }

    public function listEmployees()
    {
        $employees = Employee::all();

        return json_encode([
            'data' => $employees
        ]);
    }
}
