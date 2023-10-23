<?php
/*NAMA : LESTARI
KELAS: D3IF 46-03
NIM  : 6706223114 */

namespace App\Http\Controllers;

use App\DataTables\KoleksiDataTable;
use App\Models\Collection;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(KoleksiDataTable $dataTable)
    {
        return $dataTable->render('koleksi.daftarKoleksi');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('koleksi.registrasi');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            $collection = Collection::create([
                'namaKoleksi' => $request->namaKoleksi,
                'jenisKoleksi' => $request->jenisKoleksi,
                'jumlahKoleksi' => $request->jumlahKoleksi,
                'jumlahSisa' => $request->jumlahSisa,
                'jumlahKeluar' => $request->jumlahKeluar,
                'namaPengarang' => $request->namaPengarang,
                'tahunTerbit' => $request->tahunTerbit
            ]);
            event(new Registered($collection));
        } catch (\Exception $e) {
            return redirect()->back()->with('eror', 'Gagal menyimpan');
        }
        return redirect(RouteServiceProvider::COLLECTIONS);
    }

    /**
     * Display the specified resource.
     */


    public function show(Collection $collection)
    {
        return view('koleksi.infoKoleksi', compact('collection'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'namaKoleksi'       => 'required',
            'jenisKoleksi'      => 'required|in:1,2,3',
            'jumlahKoleksi'     => 'required|numeric',
            'namaPengarang'     => 'required',
            'tahunTerbit'       => 'required'
        ]);
        DB::table('collections')->where('id', $request->id)->update([
            'namaKoleksi' => $request->namaKoleksi,
            'jenisKoleksi' => $request->jenisKoleksi,
            'jumlahKoleksi' => $request->jumlahKoleksi,
            'namaPengarang' => $request->namaPengarang,
            'tahunTerbit' => $request->tahunTerbit
        ]);
        return redirect()->route('koleksi')->with('success', 'Koleksi berhasil diperbaharui');
    }
}
