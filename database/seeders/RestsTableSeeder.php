<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rest;

class RestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'message' => 'test1',
            'user' => '一郎'
        ];
        $rest = new Rest;
        $rest->fill($param)->save();
        $param = [
            'message' => 'test2',
            'user' => '二郎'
        ];
        $rest = new Rest;
        $rest->fill($param)->save();
        $param = [
            'message' => 'test3',
            'user' => '三郎'
        ];
        $rest = new Rest;
        $rest->fill($param)->save();
    }
}
