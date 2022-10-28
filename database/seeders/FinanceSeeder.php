<?php

namespace Database\Seeders;

use App\Models\Finance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FinanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = database_path("seeders/datas/finance.json");
        $data = json_decode(file_get_contents($file), true);

        foreach ($data as $row) {
            Finance::create(collect(decrypt($row))->only([
                'user_id', 'date', 'month', 'year', 'money', 'tax', 'created_at', 'updated_at'
            ])->toArray());
        }
    }
}
