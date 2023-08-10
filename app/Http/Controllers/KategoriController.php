<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->get('q');

        $data['result'] = Kategori::where(function($query) use ($q) {
            $query->where('nama_kategori', 'like', '%' . $q . '%');
        })->paginate();

        $data['q'] = $q;

        return view('kategori.listkategori', $data);
    }
    public function create()
    {
        return view('kategori.formkategori');
    }
    public function show()
    {
        return view('kategori.showkategori');
    }
    public function store(Request $request)
    {
        $rules = [
            'nama_kategori' => 'required|alpha',

        ];
        $this->validate($request, $rules);

        Kategori::create($request->all()); 
        return redirect('/kategori')->with('success', 'Data berhasil disimpan');
    }
    public function edit(Kategori $kategori)
    {
        return view('kategori.formkategori', compact('kategori'));
    }
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect('/kategori')->with('success', 'Data Berhasil dihapus');
    }
}
