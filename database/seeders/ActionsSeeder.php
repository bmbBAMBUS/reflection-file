<?php

namespace Database\Seeders;

use App\Models\Action;
use App\Notifications\Actions;
use Illuminate\Database\Seeder;

class ActionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $actions = (new \ReflectionClass(Action::class))->getConstants();

        $insert = [];
        foreach ($actions as $key => $value)
        {
            $insert[] = ['action' => $value];
        }

        Action::insert($insert);
    }
}
