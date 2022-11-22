<?php

namespace App\Imports;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithUpserts;

class CategoryImport implements ToModel, WithHeadingRow, WithBatchInserts, WithUpserts
{
    /**
    * @param array $row
    *
    * @return Model|null
    */
    public function model(array $row)
    {
        return new Category([
            'name' => $row['category'],
        ]);
    }

    public function batchSize(): int
    {
        return 5000;
    }

    public function uniqueBy()
    {
        return 'name';
    }
}
