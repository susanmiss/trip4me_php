<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $html = new Categories();
        $html->name = 'HTML';
        $html->slug = 'html';
        $html->save();

        $css = new Categories();
        $css->name = 'CSS';
        $css->slug = 'css';
        $css->save();

        $php = new Categories();
        $php->name = 'PHP';
        $php->slug = 'php';
        $php->save();
    }
}
