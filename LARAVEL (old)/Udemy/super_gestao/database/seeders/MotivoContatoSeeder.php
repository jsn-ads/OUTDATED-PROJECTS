<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MotivoContato;

class MotivoContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $m = new MotivoContato();
        $m->motivo_contato = 'Dúvida';
        $m->save();

        $m = new MotivoContato();
        $m->motivo_contato = 'Elogio';
        $m->save();

        $m = new MotivoContato();
        $m->motivo_contato = 'Reclamação';
        $m->save();
    }
}
