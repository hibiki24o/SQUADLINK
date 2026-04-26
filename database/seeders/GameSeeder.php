<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Game;

class GameSeeder extends Seeder
{
    public function run(): void
    {
        $games = [
            [
                'genre_id' => 1,
                'name' => 'Battlefield 6',
                'slug' => 'battlefield-6',
                'aliases' => 'battlefield,bf6,バトルフィールド,ばとるふぃーるど'
            ],
            [
                'genre_id' => 1,
                'name' => 'Apex Legends',
                'slug' => 'apex-legends',
                'aliases' => 'apex,エーペックス,えーぺっくす'
            ],
            [
                'genre_id' => 1,
                'name' => 'Call of Duty',
                'slug' => 'call-of-duty',
                'aliases' => 'cod,callofduty,コールオブデューティ'
            ],
            [
                'genre_id' => 1,
                'name' => 'Valorant',
                'slug' => 'valorant',
                'aliases' => 'valorant,ヴァロラント,ゔぁろらんと'
            ],
            [
                'genre_id' => 2,
                'name' => 'Monster Hunter',
                'slug' => 'monster-hunter',
                'aliases' => 'モンハン,もんはん,mh'
            ],
            [
                'genre_id' => 4,
                'name' => 'Rust',
                'slug' => 'rust',
                'aliases' => 'rust,ラスト'
            ],
            [
                'genre_id' => 4,
                'name' => 'ARK',
                'slug' => 'ark',
                'aliases' => 'ark,アーク'
            ],
            [
                'genre_id' => 5,
                'name' => 'Fortnite',
                'slug' => 'fortnite',
                'aliases' => 'fortnite,フォートナイト'
            ],
        ];

        foreach ($games as $game) {
            Game::create($game);
        }
    }
}