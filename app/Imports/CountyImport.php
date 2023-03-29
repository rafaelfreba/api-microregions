<?php

namespace App\Imports;

use App\Models\County;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;


class CountyImport implements ToModel
{
    use Importable;

    public function model(array $row)
    {
        return new County([
            'ibge' => $row[0],
            'name' => $row[1],
            'fu' => $row[2],
            'microregion' => $row[3],
            'poleMunicipality' => $row[4],
            'macroregion' => $row[5],
            'distance_from_pole_municipality' => $row[6],
            'distance_from_the_capital'=> $row[7],
            'img_map' => $row[8]
        ]);
    }
}
