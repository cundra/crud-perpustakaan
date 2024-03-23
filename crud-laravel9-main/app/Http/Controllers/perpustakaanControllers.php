<?php

namespace App\Http\Controllers;
use App\Models\perpustakaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class perpustakaanControllers extends Controller
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
            $data = perpustakaan::where('nomor_buku', 'like', "%$katakunci%")
                ->orWhere('judul', 'like', "%$katakunci%")
                ->orWhere('pengarang', 'like', "%$katakunci%")
                ->orWhere('tahun_terbit', 'like', "%$katakunci%")
                ->orWhere('bahasa', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = perpustakaan::orderBy('nomor_buku', 'desc')->paginate($jumlahbaris);
        }
        return view('perpustakaan.index')->with('data', $data);
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
        $data = perpustakaan::all();
    
        // Return a view with the data
        return view('perpustakaan.create', compact('data'));
    }
    


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nomor_buku', $request->nomor_buku);
        Session::flash('judul', $request->judul);
        Session::flash('pengarang', $request->pengarang);
        Session::flash('tahun_terbit', $request->tahun_terbit);
        Session::flash('bahasa', $request->bahasa);

        $request->validate([
            'nomor_buku' => 'required|numeric|unique:perpustakaan,nomor_buku',
            'judul' => 'required',
            'pengarang' => 'required',
            'tahun_terbit' => 'required',
            'bahasa' => 'required',
        ], [
            'nomor_buku.required' => 'nomor buku wajib diisi',
            'nomor_buku.numeric' => 'nomor buku wajib dalam angka',
            'nomor_buku.unique' => 'nomor buku yang diisikan sudah ada dalam database',
            'judul.required' => 'judul wajib diisi',
            'pengarang.required' => 'pengarang wajib diisi',
            'bahasa.required' => 'bahasa wajib diisi sesuai buku',
        ]);
        $data = [
            'nomor_buku' => $request->nomor_buku,
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'tahun_terbit' => $request->tahun_terbit,
            'bahasa' => $request->bahasa,

        ];
        perpustakaan::create($data);
        return redirect()->route('perpustakaan.index')->with('success', 'Berhasil menambahkan data');
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
        $data = perpustakaan::where('nomor_buku', $id)->first();
        return view('perpustakaan/edit',['data' => $data]);
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
            'judul' => 'required',

        ], [
            'judul.required' => 'judul wajib diisi',

        ]);
        $data = [
            'judul' => $request->judul,
        ];

        perpustakaan::where('judul', $id)->update($data);
        return redirect()->to('perpustakaan')->with('success', 'Berhasil melakukan update data');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        perpustakaan::where('nomor_buku', $id)->delete();
        return redirect()->to('perpustakaan')->with('success', 'Berhasil melakukan delete data');
    }
    
}
