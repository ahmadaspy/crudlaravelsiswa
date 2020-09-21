<?php

namespace App\Http\Controllers;
use App\Models\siswa;
use App\Models\User;


use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class SiswaControl extends Controller
{
    public function index(Request $request){
        
        if($request->has('cari')){
            $data_table = siswa::where('nama_depan', 'LIKE', '%'.$request->cari.'%')
            ->orWhere('nama_belakang', 'LIKE', '%'.$request->cari.'%')
            ->orWhere('email', 'LIKE', '%'.$request->cari.'%')
            ->simplePaginate();
        }else{
            $data_table = siswa::simplePaginate(8);
        }

        
        
        return view('siswa', compact('data_table'));
    }
    public function add(Request $request){

        $request->validate([
            'alamat' => 'required|min:5',
            'email' => 'unique:users',
            'gender' => 'required',
            'nama_depan' => 'required'
            
        ]);
        

        $user = new User;
        $user->level = 'siswa';
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->password = $request->email;
        $user->remember_token = Str::random(40);
        $user->save();

        $request->request->add(['user_id' => $user->id]);
        siswa::create($request->all());
        
        return redirect('/siswa')->with('sukses', 'data berhasil');
    }
    public function edit($id){
        $data = siswa::find($id);
        return view('edit', compact('data'));
        
    }
    public function update(Request $request, $id){
        $data = siswa::find($id);
        $data->update($request->all());
        if($request->hasFile('gambar')){
            $request->file('gambar')->move('img/',$request->file('gambar')->getClientOriginalName());
            $data->gambar = $request->file('gambar')->getClientOriginalName();
            $data->save();
        }
        return redirect('siswa')->with('sukses', 'Berhasil di update');
        
        
    }
    public function hapus($id){
        $data = siswa::find($id);
        $user = User::find($data->user_id);
        $data->delete();
        $user->delete();
        
        
        return redirect('siswa')->with('sukses', 'Berhasil di hapus');
    }
    public function siswa_profile($id){
        $data = siswa::find($id);
        return view('siswa_profile', compact('data'));
    }
}

