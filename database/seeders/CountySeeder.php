<?php

namespace Database\Seeders;

use Exception;
use App\Imports\CountyImport;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CountySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            //verifica se o arquivo existe
            if (file_exists(storage_path('counties.csv'))) {
                //realiza a importação e já salva na tabela do bd
                (new CountyImport)->import(storage_path('counties.csv'), null, \Maatwebsite\Excel\Excel::CSV);
            }
        } catch (\Throwable $th) {
            //throw $th;
            throw new Exception('Erro na leitura do arquivo csv!');
        }
    }
}
