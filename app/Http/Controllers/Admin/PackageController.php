<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Booking;
use App\Model\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        return view('admin.package.index',compact('packages'));
    }

    public function create()
    {
        return view('admin.package.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kode_paket' => 'required|max:2|unique:packages',
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $fotopath = null;
        if ($request->hasFile('foto')) {
            $fotoname = $request->file('foto')->hashName();
            $fotopath = 'foto/'.$fotoname;
            Storage::disk('public')->put($fotopath, file_get_contents($request->foto));
        }
        $package = new Package;
        $package->kode_paket = $request->kode_paket;
        $package->nama = $request->nama;
        $package->deskripsi = $request->deskripsi;
        $package->harga = $request->harga;
        $package->foto = $fotopath;
        $package->save();
        return redirect()->route('packages.index')->with('success','Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $package = Package::find($id);
        return view('admin.package.show',compact('package'));
    }

    public function edit($id)
    {
        $package = Package::find($id);
        return view('admin.package.edit',compact('package'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
        ]);
        $package = Package::find($id);
        $package->kode_paket = $request->kode_paket;
        $package->nama = $request->nama;
        $package->deskripsi = $request->deskripsi;
        $package->harga = $request->harga;
        if ($request->hasFile('foto')) {
            Storage::disk('public')->delete($package->foto);
            $fotoname = $request->file('foto')->hashName();
            $fotopath = 'foto/'.$fotoname;
            Storage::disk('public')->put($fotopath, file_get_contents($request->foto));
            $package->foto = $fotopath;
        }
        $package->save();
        return redirect()->route('packages.index')->with('primary','Data berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $package = Package::find($id);
        Storage::disk('public')->delete($package->foto);
        $package->delete();
        return redirect()->route('packages.index')->with('danger','Data berhasil dihapus');
    }

    
}
