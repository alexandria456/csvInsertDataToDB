<?php

namespace App\CsvImportService;


use App\Imports\CategoryImport;
use App\Imports\ProductImport;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class CsvInsert
{
    /**
     * @throws FileNotFoundException
     */
    public function insert(): void
    {
        Excel::import(new ProductImport(), Storage::disk('local')->get(config('shopType.shop')));
        Excel::import(new CategoryImport(), Storage::disk('local')->get(config('shopType.shop')));
    }

}
