<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 3; $i++){
            $flyer = factory(App\Flyer::class)->create();
            $this->command->info(sprintf('%s / %s created', $flyer->zip, $flyer->street));
        }
    }
}
