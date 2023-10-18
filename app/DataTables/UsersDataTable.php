<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->editColumn('gender', function ($data) {
            switch ($data->gender) {
                case 1:
                    return 'Pria';
                case 2:
                    return'Wanita';
                default:
                    return 'Tidak diketahui';
            }
        })
        ->setRowId('id')
        ->editColumn('action', function ($data) {
            return $this->getActionColumn ($data);
        });
    }
 
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery();
    }
 
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('users-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(1)
                    ->selectStyleSingle();
    }
 
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('fullname'),
            Column::make('email'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::make('username'),
            Column::make('address'),
            Column::make('phoneNumber'),
            Column::make('birthdate'),
            Column::make('agama'),
            Column::make('gender'),
            Column::make('action')
            ->title('Action')
            ->exportable(false)
            ->printable(false)
            ->width(60)
            ->addClass('text-center')
            ->orderable(false)
            ->searchable(false)
        ];
    }
 
    protected function filename(): string
    {
        return 'Users_'.date('YmdHis');
    }
    protected function getActionColumn($data): string
    {
        $showUrl = route('userView', $data->id);
        return "<a class='waves-effect btn btn-success' data-value='$data->id'href='$showUrl'><a class='material-icons'>View</a>";
    }
}