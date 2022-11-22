<?php

namespace App\CsvImport;


use App\Imports\CategoryImport;
use App\Imports\ProductImport;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class CsvInsertService
{
    public function insert()
    {
        Excel::import(new CategoryImport(), storage_path('app/'. config('shopType.shop')));
        Excel::import(new ProductImport(), storage_path('app/'. config('shopType.shop')));
    }

}
