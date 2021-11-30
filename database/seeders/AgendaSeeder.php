<?php

namespace Database\Seeders;

use App\Models\Admin\Agenda;
use Illuminate\Database\Seeder;

class AgendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Agenda::create([
            'name' => '2021-10-01-6',
            'start_date' => '2021-10-01',
            'end_date' => '2021-10-07',
            'horario_id' => 1,
            'employee_id' => 6,
            'admin_id' => 1
        ]);

        Agenda::create([
            'name' => '2021-10-08-6',
            'start_date' => '2021-10-08',
            'end_date' => '2021-10-15',
            'horario_id' => 1,
            'employee_id' => 6,
            'admin_id' => 1
        ]);

        Agenda::create([
            'name' => '2021-10-16-6',
            'start_date' => '2021-10-16',
            'end_date' => '2021-10-22',
            'horario_id' => 1,
            'employee_id' => 6,
            'admin_id' => 1
        ]);
    }
}
