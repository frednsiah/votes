<?php

use Illuminate\Database\Seeder;

class InitTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = [
            'Red' => [
                [
                    'city' => 'Brooklyn',
                    'votes' => '100000'
                ],
                [
                    'city' => 'Detroit',
                    'votes' => '160000'
                ],
            ],
            'Orange' => null,
            'Yellow' => [
                [
                    'city' => 'Anchorage',
                    'votes' => '15000'
                ],
                [
                    'city' => 'Selma',
                    'votes' => '15000'
                ],
            ],
            'Green' => null,
            'Blue' => [
                [
                    'city' => 'Anchorage',
                    'votes' => '10000'
                ],
                [
                    'city' => 'Brooklyn',
                    'votes' => '250000'
                ],
            ],
            'Indigo' => null,
            'Violet' => [
                [
                    'city' => 'Selma',
                    'votes' => '5000'
                ],
            ],
        ];

        foreach ($colors as $colorName => $colorVal) {
            ${$colorName . '_insert_id'} = DB::table('colors')->insertGetId([
                'name' => $colorName,
            ]);

            if($colorVal) {
                foreach($colorVal as $val) {
                    DB::table('votes')->insertGetId([
                        'color_id' => ${$colorName . '_insert_id'},
                        'city' => $val['city'],
                        'votes' => $val['votes'],
                    ]);
                }
            }
        }
    }
}
