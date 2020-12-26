<?php

namespace App\Imports;

use App\Call;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CallImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Call([
            'user' => $row['user'],
            'client' => $row['client'],
            'client_type' => $row['client_type'],
            'date' => $row['date'],
            'duration' => $row['duration'],
            'type_of_call' => $row['type_of_call'],
            'external_call_score' => $row['external_call_score'],
        ]);
    }
}
