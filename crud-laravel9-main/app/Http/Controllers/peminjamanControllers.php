<?php

namespace App\Http\Controllers;

use App\Models\anggota;
use App\Models\peminjaman;
use App\Models\perpustakaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class peminjamanControllers extends Controller
{
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
            $data = peminjaman::where('nomor_buku_id', 'like', "%$katakunci%")
                ->orWhere('id_peminjam', 'like', "%$katakunci%")
                ->orWhere('tanggal_peminjaman', 'like', "%$katakunci%")
                ->orWhere('tanggal_kembali', 'like', "%$katakunci%")

                ->paginate($jumlahbaris);
        } else {
            $data = peminjaman::orderBy('nomor_buku_id', 'desc')->paginate($jumlahbaris);
        }
        return view('peminjaman.index')->with('data', $data);
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
        $data = peminjaman::all();
        $anggota = anggota::all();
        $perpus = perpustakaan::all();
    
        // Return a view with the data
        // dd($anggota);
        return view('peminjaman.create',['data' => $data,'anggota'=>$anggota,'perpus'=>$perpus]);
    }
    


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomor_buku_id' => 'required|numeric|unique:peminjaman,nomor_buku_id',
            'id_peminjam' => 'required|numeric|unique:peminjaman,id_peminjam',
            'tanggal_peminjaman' => 'required',
            'tanggal_kembali' => 'required',
        ], [
            'nomor_buku_id.required' => 'Nomor buku wajib diisi',
            'nomor_buku_id.numeric' => 'Nomor buku harus berupa angka',
            'nomor_buku_id.unique' => 'Nomor buku yang diisikan sudah ada dalam database',
            'id_peminjam.required' => 'ID peminjam wajib diisi',
            'id_peminjam.numeric' => 'ID peminjam harus berupa angka',
            'id_peminjam.unique' => 'ID peminjam yang diisikan sudah ada dalam database',
            'tanggal_peminjaman.required' => 'Tanggal peminjaman wajib diisi',
            'tanggal_kembali.required' => 'Tanggal kembali wajib diisi',
        ]);
    
        $data = [
            'nomor_buku_id' => $request->nomor_buku_id,
            'id_peminjam' => $request->id_peminjam,
            'tanggal_peminjaman' => $request->tanggal_peminjaman,
            'tanggal_kembali' => $request->tanggal_kembali,
        ];
    
        peminjaman::create($data);
        return redirect()->route('peminjaman.index')->with('success', 'Berhasil menambahkan data');
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
    public function edit($id)
    {
        $data = peminjaman::where('nomor_buku_id', $id)->first();
        return view('peminjaman/edit',['data' => $data]);
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
            'id_peminjam' => 'required',

        ], [
            'id_peminjam.required' => 'id peminjam wajib diisi',

        ]);
        $data = [
            'id_peminjam' => $request->id_peminjam,
        ];

        peminjaman::where('id_peminjam', $id)->update($data);
        return redirect()->to('peminjaman')->with('success', 'Berhasil melakukan update data');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): \Illuminate\Http\Response
    {
        peminjaman::where('nomor_buku_id', $id)->delete();
      // return response()->json(['message' => 'Penghancuran berhasil'], 200);
      return redirect()->to('peminjaman')->with('success', 'Berhasil melakukan delete data');

    }
}
