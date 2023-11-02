<?php
/*NAMA : LESTARI
KELAS: D3IF 46-03
NIM  : 6706223114 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'transactionId',
        'collectionId',
        'tanggalKembali',
        'status',
        'keterangan',
    ];
}