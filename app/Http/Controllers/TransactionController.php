<?php
/*NAMA : LESTARI
KELAS: D3IF 46-03
NIM  : 6706223114 */
namespace App\Http\Controllers;

use App\DataTables\DetailTransactionDataTable;
use App\DataTables\TransactionDataTable;
use App\Models\Collection;
use App\Models\DetailTransaction;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TransactionDataTable $dataTable)
    {
        return $dataTable->render('transaction.daftarTransaksi');
    }
    
    public function create()
    {
        $users = User::get();
        $collections = Collection::where('jumlahKoleksi', '>', 0)->get();
        return view(
            'transaction.tambahTransaksi',
            compact(
                'collections',
                'users'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'idPeminjam' => ['required', 'integer'],
            'idKoleksi' => ['required', 'integer']
        ]);

        $transaction = new Transaction;

        $transaction->userIdPeminjam = $request->idPeminjam;
        $transaction->userIdPetugas = auth()->user()->id;
        $transaction->tanggalPinjam = Carbon::now()->toDateString();
        $transaction->tanggalSelesai = Carbon::now()->toDateString();
        $transaction->save();
        $lastTransactionId = $transaction->id;

        DetailTransaction::create([
            'transactionId' => $lastTransactionId,
            'collectionId' => $request->idKoleksi,
            'status' => 1
        ]);

        DB::table('collections')->where('id', $request->idKoleksi)->decrement('jumlahKoleksi');

        return redirect()->route('transaksi');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction, DetailTransactionDataTable $dataTable)
    {
        $transactionData = $this->getTransactionData($transaction);

        $dataTable->setIdTransaksi($transaction->id);

        return $dataTable->render('transaction.transaksiView', compact('transactionData'));
    }


    public function getTransactionData(Transaction $transaction)
    {
        $transactionData = DB::table('transactions')
            ->select(
                'transactions.id as id',
                'u1.fullname as fullnamePeminjam',
                'u2.fullname as fullnamePetugas',
                'tanggalPinjam',
                'tanggalSelesai'
            )
            ->join('users as u1', 'transactions.userIdPeminjam', '=', 'u1.id')
            ->join('users as u2', 'transactions.userIdPetugas', '=', 'u2.id')
            ->where('transactions.id', $transaction->id)
            ->first();

        return $transactionData;
    }

    public function getDetailTransactionData(Transaction $transaction)
    {
        $detailTransactionData = DB::table('transactions')
            ->select(
                'transactions.id as id',
                'u1.fullname as fullnamePeminjam',
                'u2.fullname as fullnamePetugas',
                'tanggalPinjam',
                'tanggalSelesai'
            )
            ->join('users as u1', 'transactions.userIdPeminjam', '=', 'u1.id')
            ->join('users as u2', 'transactions.userIdPetugas', '=', 'u2.id')
            ->where('transactions.id', $transaction->id)
            ->first();

        return $detailTransactionData;
    }

}
