<?php

namespace Database\Seeders;

use App\Models\Admin\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'name' => 'Motocicleta'
        ]);

        Type::create([
            'name' => 'Auto'
        ]);

        Type::create([
            'name' => 'Buseta'
        ]);

        Type::create([
            'name' => 'Bus'
        ]);

        Type::create([
            'name' => 'Furgoneta'
        ]);

        Type::create([
            'name' => 'Furgón'
        ]);

        Type::create([
            'name' => 'Carrozado'
        ]);

        Type::create([
            'name' => 'Camión'
        ]);

    }
}
