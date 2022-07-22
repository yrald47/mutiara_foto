<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Operator;
use App\User;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    //
    public function __construct() {
        $this->middleware('role:admin');
    } 

    public function index()
    {
        $operators = Operator::all();
        return view('admin.operators.index',compact('operators'));
    }

    public function create()
    {
        return view('admin.operators.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nik' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
        ]);
        $user = User::create([
            'id' => $request->nik,
            'username' => $request->nik,
            'email' => $request->nik.'@gmail.com',
            'password' => bcrypt($request->nik),
        ]);
        $user->assignRole('operator');
        $user->operator()->create([
            'name' => $request->nama,
            'jabatan' => $request->jabatan,
        ]);
        return redirect()->route('operators.index')->with('success','Penanggung Jawab berhasil ditambahkan');
    }

    public function edit($id)
    {
        $operator = Operator::find($id);
        return view('admin.operators.edit',compact('operator'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nik' => 'required',
        ]);
        $operator = Operator::find($id);
        $operator->update([
            'name' => $request->name,
            'jabatan' => $request->jabatan,
        ]);
        return redirect()->route('operators.index')->with('success','Penanggung Jawab berhasil diubah');
    }

    public function destroy($id)
    {
        $operator = Operator::find($id);
        $operator->delete();
        $user = User::find($id);
        $user->delete();
        return redirect()->route('operators.index')->with('success','Penanggung Jawab berhasil dihapus');
    }


}
