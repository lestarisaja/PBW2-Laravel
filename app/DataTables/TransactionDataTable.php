<?php
/*NAMA : LESTARI
KELAS: D3IF 46-03
NIM  : 6706223114 */
namespace App\DataTables;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TransactionDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'transaction.action')
            ->setRowId('id')
            ->addColumn('action', function ($data) {
                return $this->getActionColumn($data);
            })
            ->editColumn('userIdPeminjam', function ($data) {
                return $data->peminjam->fullname;
            })
            ->editColumn('userIdPetugas', function ($data) {
                return $data->petugas->fullname;
            });
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Transaction $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('transaction-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle();
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::computed('userIdPetugas')
                ->title('Petugas'),
            Column::computed('userIdPeminjam')
                ->title('Peminjam'),
            Column::make('tanggalPinjam'),
            Column::make('tanggalSelesai'),
            Column::computed('action')
                ->title('Action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center')
                ->orderable(false)
                ->searchable(false),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Transaction_' . date('YmdHis');
    }

    protected function getActionColumn($data): string
    {
        $showUrl = route('transaksiView', $data->id);
        return "<a class='waves-effect btn btn-success' data-value='$data->id' href='$showUrl'><i class='material-icons'>View</a>";
    }
}