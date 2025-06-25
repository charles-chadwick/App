<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DownloadRickAndMortyCharacters extends Command
{
    protected $signature = 'rickandmorty:download-characters';

    protected $description = 'Download all Rick and Morty characters to JSON file';

    public function handle()
    {
        $allCharacters = [];
        $page = 1;

        $this->info('Starting download...');

        $characters = json_decode(file_get_contents(database_path('src/rickandmorty_characters.json')), true);
        foreach ($characters as $character) {

            $save_to_path = database_path('src/avatars/').str_replace(' ', '-', strtolower($character['name'])).'.jpeg';
            $avatar = file_get_contents($character['image']);
            if (! file_exists($save_to_path)) {
                file_put_contents($save_to_path, $avatar);
                sleep(rand(0, 2));
                echo "Downloaded {$character['name']}\n";
            }

            /**
             * "id": 1,
             * "name": "Rick Sanchez",
             * "status": "Alive",
             * "species": "Human",
             * "type": "",
             * "gender": "Male",
             * "origin": {
             * "name": "Earth (C-137)",
             * "url": "https:\/\/rickandmortyapi.com\/api\/location\/1"
             * },
             * "location": {
             * "name": "Citadel of Ricks",
             * "url": "https:\/\/rickandmortyapi.com\/api\/location\/3"
             * },
             * "image": "https:\/\/rickandmortyapi.com\/api\/character\/avatar\/1.jpeg",
             * "url": "https:\/\/rickandmortyapi.com\/api\/character\/1",
             * "created": "2017-11-04T18:48:46.250Z"
             */
        }

        $this->info('Download complete. Saved to storage/app/rickandmorty_characters.json.');
    }
}
