<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('resources')->insert([
            [
                'resource_type' => 'websites',
                'title' => 'Murderpedia',
                'url' => 'https://murderpedia.org',
                'description' => 'A structured database of murderers, victims, and case summaries.'
            ],

            [
                'resource_type' => 'websites',
                'title' => 'FBIE Vault',
                'url' => 'https://vault.fbi.gov/',
                'description' => 'Official source for any investigation case files.'
            ],

            [
                'resource_type' => 'websites',
                'title' => 'Wikipedia',
                'url' => 'https://www.wikipedia.org',
                'description' => 'Broad reference content and case histories.'
            ],

            [
                'resource_type' => 'videos',
                'title' => 'Sam and Colby',
                'url' => 'https://www.youtube.com/@samandcolby',
                'description' => 'Paranormal investigation YouTube channel exploring haunted locations and alleged supernatural activity worldwide.'
            ],

            [
                'resource_type' => 'books',
                'title' => 'Talking With Serial Killers: World\'s Most Evil',
                'url' => 'https://www.amazon.com/dp/1635768764/ref=mes-dp?_encoding=UTF8&pd_rd_w=mrjOh&content-id=amzn1.sym.1763b2a9-7aa6-49c2-a60b-ee230f5faf79&pf_rd_p=1763b2a9-7aa6-49c2-a60b-ee230f5faf79&pf_rd_r=MN7T35ZZFZY79EV6JR0S&pd_rd_wg=4vKCI&pd_rd_r=0a196394-e71b-4e72-a144-0eeb2af87c45',
                'description' => 'A deep dive into the minds of 5 murderers.'
            ],

            [
                'resource_type' => 'books',
                'title' => 'Talking With Serial Killers: Stalkers',
                'url' => 'https://www.amazon.com/Talking-With-Serial-Killers-Stalkers/dp/1789462673/ref=sr_1_9?crid=Z8A45ML9R8MF&dib=eyJ2IjoiMSJ9.nf3ThoK67cUuPCe1KncBBKHKiIXC5QgCW_deQtIp_GduS39CRY34vbiXjOAO3XENDBUsU3BvNGWiZWw2F3nlhTPZRI1MUePAK__PAR9j-EWDrbYMhh9oR6wKH0hGE5lafI6Fo4iagqUwe6ZarSMReVTqmsNmFp16_2r47vMuZhglIepHZn1OVska1JRdAPBPNCPYBS6Rj2m0ZCHEgMlNrgA_tsb24hv8YTbaTomMsRc.feGfCyxlS9PQwm-Ff9UDxfoHCu1xMfNF39skoDlEWBY&dib_tag=se&keywords=christopher+berry-dee&qid=1774197639&sprefix=christopher+berry-d%2Caps%2C299&sr=8-9',
                'description' => 'Insightful interviews exploring the minds of modern serial killers and stalkers.'
            ],

            [
                'resource_type' => 'books',
                'title' => 'Mindhunter',
                'url' => 'https://www.amazon.com/Mindhunter-Inside-Elite-Serial-Crime/dp/1501191969/ref=tmm_pap_swatch_0?_encoding=UTF8&dib_tag=se&dib=eyJ2IjoiMSJ9.RY6hHjLbG0-0WwQsMgg119F5CLqit_QjR8x6PgTfXpjuNiDWY88hd2zaHgr0ZhE76WOVeQrjLbPOFPIpruZHLMEyRUSPTbbU7d6ZgJUHAjCuNzyiGVw9Xa7qAqXDhbhZ5asoZ97-CcfGqh6FGJIng1dD7mXM_gDbfvTNmHeLNXgfG6Jf3gWySUmP_-EWida7wRXs8Tcn9YJPUyw6yWAlYpRTHfB_-nHPkprOIriUk3E.Ybo4vwKfzXCLfSqxlWayqY6K74r5GO7iPz2fqNWZwNc&qid=1774198034&sr=8-1',
                'description' => 'FBI profiling work on serial killers in the 1970s.'
            ],

            [
                'resource_type' => 'podcasts',
                'title' => 'Morbid',
                'url' => 'https://open.spotify.com/show/1cpyLfDHP1cNnyOb478qrt',
                'description' => 'A true-crime, creepy history and all things spooky podcast.'
            ],

            [
                'resource_type' => 'podcasts',
                'title' => 'Kallmekris',
                'url' => 'https://open.spotify.com/show/2mClgQ5t53TqBIAxxGjvnu',
                'description' => 'A true-crime podcast diving into notorious cases, conspiracies, cults, and unsettling mysteries.'
            ],
        ]);
    }
}
