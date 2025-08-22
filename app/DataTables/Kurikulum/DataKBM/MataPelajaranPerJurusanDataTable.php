<?php

namespace App\DataTables\Kurikulum\DataKBM;

use App\Models\Kurikulum\DataKBM\MataPelajaranPerJurusan;
use App\Traits\DatatableHelper;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class MataPelajaranPerJurusanDataTable extends DataTable
{
    use DatatableHelper;
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->filter(function ($query) {
                // filter pencarian mapel
                if (request()->filled('search')) {
                    $query->where('mata_pelajaran_per_jurusans.mata_pelajaran', 'like', '%' . request('search') . '%');
                }

                // filter kompetensi keahlian
                if (request()->filled('kodeKK') && request('kodeKK') !== 'all') {
                    $query->where('mata_pelajaran_per_jurusans.kode_kk', request('kodeKK'));
                }

                // filter semester (semester_1 / semester_2)
                if (request()->filled('semester') && request('semester') !== 'all') {
                    $semester = 'semester_' . request('semester'); // contoh: 1 → semester_1
                    $query->where("mata_pelajarans.$semester", 1);
                }
            })
            ->addColumn('checkbox', function ($row) {
                return '<input class="form-check-input chk-child" type="checkbox"
                        name="chk_child"
                        value="' . $row->id . '"
                        data-kel_mapel="' . $row->kel_mapel . '"
                        data-kode_mapel="' . $row->kode_mapel . '"
                        data-mata_pelajaran="' . $row->mata_pelajaran . '">';
            })
            ->addColumn('kel_kode', function ($row) {
                return $row->kel_mapel . "<br>" . $row->kode_mapel;
            })
            ->addColumn('action', function ($row) {
                // Menggunakan basicActions untuk menghasilkan action buttons
                $actions = $this->basicActions($row);
                return view('action', compact('actions'));
            })
            ->addIndexColumn()
            ->rawColumns(['checkbox', 'kel_kode', 'action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(MataPelajaranPerJurusan $model): QueryBuilder
    {
        return $model->newQuery()
            ->join('mata_pelajarans', 'mata_pelajaran_per_jurusans.kel_mapel', '=', 'mata_pelajarans.kel_mapel')
            ->join('kompetensi_keahlians', 'mata_pelajaran_per_jurusans.kode_kk', '=', 'kompetensi_keahlians.idkk')
            ->select([
                'mata_pelajaran_per_jurusans.*',
                DB::raw('CONCAT(mata_pelajaran_per_jurusans.kode_kk, " - ", kompetensi_keahlians.nama_kk) as kode_kk_singkatan_kk'),
            ])
            ->orderBy('mata_pelajaran_per_jurusans.kode_mapel', 'asc');
    }


    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('matapelajaranperjurusan-table')
            ->columns($this->getColumns())
            ->ajax([
                'data' =>
                'function(d) {
                    d.search = $(".search").val();
                    d.kodeKK = $("#idKK").val();
                    d.semester = $("#semesterSelect").val();
                }'
            ])
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->parameters([
                //'order' => [[6, 'asc'], [4, 'asc'], [2, 'asc']],
                'lengthChange' => false,
                'searching' => false,
                'pageLength' => 50,
                'paging' => true,
                'scrollCollapse' => false,
                'scrollY' => "calc(100vh - 408px)",
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('checkbox')
                ->title('<input class="form-check-input" type="checkbox" id="checkAll" value="option">') // Untuk "Select All"
                ->orderable(false)
                ->searchable(false)
                ->width(10)
                ->addClass('text-center align-middle'),
            //Column::make('DT_RowIndex')->title('No')->orderable(false)->searchable(false), // No index otomatis
            Column::make('kode_kk_singkatan_kk')->title('Kompetensi Keahlian'),
            Column::make('kel_kode')->title('Kelompok <br> Kode Mapel')->addClass('text-center'),
            Column::make('mata_pelajaran')->title('Mata Pelajaran'),
            Column::make('semester_1')->title('S1')->addClass('text-center'),
            Column::make('semester_2')->title('S2')->addClass('text-center'),
            Column::make('semester_3')->title('S3')->addClass('text-center'),
            Column::make('semester_4')->title('S4')->addClass('text-center'),
            Column::make('semester_5')->title('S5')->addClass('text-center'),
            Column::make('semester_6')->title('S6')->addClass('text-center'),
            /* Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'), */
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'MataPelajaranPerJurusan_' . date('YmdHis');
    }
}
