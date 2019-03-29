<?php

use Illuminate\Database\Seeder;
use App\Style;

class StylesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Style::create(['style' => 'standard lobe']);
        Style::create(['style' => 'helix']);
        Style::create(['style' => 'microdermal']);
        Style::create(['style' => 'septum']);
        Style::create(['style' => 'nose piercing']);
    }
}
