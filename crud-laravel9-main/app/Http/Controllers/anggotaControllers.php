<?php

namespace App\Http\Controllers;

use App\Models\anggota;
use App\Models\perpustakaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class anggotaControllers extends Controller{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 12;
        if (strlen($katakunci)) {
            $data = anggota::where('id_anggota', 'like', "%$katakunci%")
                ->orWhere('nama_anggota', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = anggota::orderBy('id_anggota', 'desc')->paginate($jumlahbaris);
        }
        return view('anggota.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Your logic for creating a new resource goes here
        
        // Example: If you're fetching some data from the database
        $data = anggota::all();
    
        // Return a view with the data
        return view('anggota.create', compact('data'));
    }
    


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('id_anggota', $request->id_anggota);
        Session::flash('nama_anggota', $request->nama_anggota);

        $request->validate([
            'id_anggota' => 'required|numeric|unique:anggota,id_anggota',
            'nama_anggota' => 'required',
        ], [
            'id_anggota.required' => 'id_anggota wajib diisi',
            'id_anggota.numeric' => 'id_anggota wajib dalam angka',
            'id_anggota.unique' => 'id_anggota yang diisikan sudah ada dalam database',
            'nama_anggota.required' => 'nama_anggota wajib diisi',
        ]);
        $data = [
            'id_anggota' => $request->id_anggota,
            'nama_anggota' => $request->nama_anggota,
        ];
        anggota::create($data);
        return redirect()->route('anggota.index')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): \Illuminate\Contracts\View\View    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $data = anggota::where('id_anggota', $id)->first();
        return view('anggota/edit',['data' => $data]);
        // return $data;
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_anggota' => 'required',
        ], [
            'nama_anggota.required' => 'nama_anggota wajib diisi',
        ]);
        $data = [
            'id_anggota' => $request->id_anggota,
            'nama_anggota' => $request->nama_anggota,

        ];

        anggota::where('nama_anggota', $id)->update($data);
        return redirect()->to('anggota')->with('success', 'Berhasil melakukan update data');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        anggota::where('id_anggota', $id)->delete();
        return redirect()->to('anggota')->with('success', 'Berhasil melakukan delete data');
    }
    
}