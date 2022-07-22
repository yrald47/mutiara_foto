<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Model\Agama;
use App\Model\Magang;
use App\Model\Operator;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
   /**
    *
    * allow admin only
    *
    */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();
        if ($user->hasRole('magang')||$user->hasRole('pramagang')) {
            $pengguna = $user->magang()->first();
            $genders = ['Laki-laki','Perempuan'];
            $agamas = Agama::all();
            $operators = Operator::all();
            return view('users.profile.magang',compact('user','pengguna','agamas','genders','operators'));
        }else if ($user->hasRole('operator')){
            $pengguna = $user->operator()->first();
            return view('users.profile.operator',compact('user','pengguna'));
        }else {
            return view('users.profile.profile',compact('user'));
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user = Auth::user();
        if($user->hasRole('magang')||$user->hasRole('pramagang')){
            try{
                $this->validate($request, [
                    'nama' => 'required',
                    'email' => 'required|email|unique:users,email,'.$user->id,
                    'no_hp' => 'required',
                    'alamat' => 'required',
                    'tempat_lahir' => 'required',
                    'tanggal_lahir' => 'required',
                    'jk' => 'required',
                    'agama_id' => 'required',
                    'medsos' => 'required',
                    'institusi' => 'required',
                    'operator_id' => 'required',
                ]);
                $user->update([
                    'email' => $request->email,
                ]);
                $magang = Magang::find($user->id);
                $magang->update([
                    'nama' => $request->nama,
                    'jk' => $request->jk,
                    'agama_id' => $request->agama_id,
                    'operator_id' => $request->operator_id,
                    'alamat_domisili' => $request->alamat,
                    'tempat_lahir' => $request->tempat_lahir,
                    'tanggal_lahir' => $request->tanggal_lahir,
                    'no_hp' => $request->no_hp,
                    'medsos' => $request->medsos,
                    'asal_institusi' => $request->institusi,
                ]); 
                $ktppath = null;
                $fotopath = null;
                if ($request->hasFile('pas_foto')) {
                    $fotoname = $request->file('pas_foto')->getClientOriginalName();
                    $fotopath = 'foto/'.$fotoname;
                    Storage::disk('public')->put($fotopath, file_get_contents($request->pas_foto));
                    $magang->update([
                        'pas_foto' => $fotopath,
                    ]);
                }
                if($request->hasFile('foto_ktp')){
                    $ktpname = $request->file('foto_ktp')->getClientOriginalName();
                    $ktppath = 'ktp/'.$ktpname;
                    Storage::disk('public')->put($ktppath, file_get_contents($request->foto_ktp));
                    $magang->update([
                        'foto_ktp' => $ktppath,
                    ]);
                }
            }catch(Exception $e){
                dd($e);
            }
            
        }else if($user->hasRole('operator')){
            try{
                $this->validate($request, [
                    'nik' => 'required',
                    'email' => 'required|email|unique:users,email',
                    'name' => 'required',
                ]);
                $user->update([
                    'email' => $request->email,
                ]);
                $operator = Operator::find($user->id);
                $operator->update([
                    'name' => $request->name,
                    'jabatan' => $request->jabatan,
                ]);
            }catch(Exception $e){
                return redirect()->back()->with('error','Terjadi kesalahan');
            }
            
        }
        // $request->validate([
        //     'name' => ['required','string', 'max:255'],
        //     'email' => ['required','string', 'email', 'max:255',Rule::unique('users')->ignore($id)],
        // ]);

        // $name = null;
        // $newImageName = null;

        // //check if file attached
        // if($file = $request->file('avatar')){
        //     $tmp = explode('.', $file->getClientOriginalName());//get client file name
        //     $name = $file->getClientOriginalName();
        //     $newImageName = round(microtime(true)).'.'.end($tmp);
        //     $file->move(storage_path('app\public\profile-pic'), $newImageName);
        // }
        // $user = User::find(Auth::user()->id);
        // $newImage = null;
        // $newImage = $newImageName == null? $user->avatar:$newImageName;
        // $user->update(array_merge($request->all(),['avatar' => $newImage]));

        return redirect()->route('profile.index')->with('success','Profile Updated Successfully!');
    }

}
