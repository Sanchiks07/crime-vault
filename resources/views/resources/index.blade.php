<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-3xl font-bold mb-4">Resources</h1>
                    <p class="text-gray-700 mb-8">This page collects the websites, books, videos, and other reference material I used while researching the cases featured on this site. If you have suggestions to add, feel free to contact me.</p>

                    @php
                        $resourceSections = [
                            'Websites' => [
                                [
                                    'title' => 'Murderpedia',
                                    'url' => 'https://murderpedia.org',
                                    'description' => 'A structured database of murderers, victims, and case summaries.',
                                ],
                                [
                                    'title' => 'FBI Vault',
                                    'url' => 'https://vault.fbi.gov/',
                                    'description' => 'Official source for any investigation case files.',
                                ],
                                [
                                    'title' => 'Wikipedia',
                                    'url' => 'https://www.wikipedia.org',
                                    'description' => 'Broad reference content and case histories.',
                                ],
                            ],

                            'Videos' => [
                                [
                                    'title' => 'Conversations with a Killer (Netflix)',
                                    'url' => 'https://www.netflix.com/title/80200202',
                                    'description' => 'Documentary series focusing on Ted Bundy.',
                                ],
                                [
                                    'title' => 'Sky News: Ted Bundy documentary',
                                    'url' => 'https://www.youtube.com/watch?v=yPukQnWX_tI',
                                    'description' => 'A concise video overview of Bundy\'s crimes.',
                                ],
                            ],

                            'Books' => [
                                [
                                    'title' => 'The Stranger Beside Me',
                                    'url' => 'https://www.amazon.com/dp/0671445208',
                                    'description' => 'Ann Rule\'s firsthand account of Ted Bundy.',
                                ],
                                [
                                    'title' => 'Helter Skelter',
                                    'url' => 'https://www.amazon.com/dp/0671661558',
                                    'description' => 'An inside look at the Manson Family murders.',
                                ],
                                [
                                    'title' => 'Mindhunter',
                                    'url' => 'https://www.amazon.com/dp/0671025015',
                                    'description' => 'FBI profiling work on serial killers in the 1970s.',
                                ],
                            ],

                            'Podcasts' => [
                                [
                                    'title' => 'Sword and Scale',
                                    'url' => 'https://www.swordandscale.com',
                                    'description' => 'A true-crime podcast covering serial killers and unsolved cases.',
                                ],
                                [
                                    'title' => 'Criminal',
                                    'url' => 'https://thisiscriminal.com',
                                    'description' => 'Stories about crime, justice, and the people affected.',
                                ],
                                [
                                    'title' => 'Morbid',
                                    'url' => 'https://open.spotify.com/show/1cpyLfDHP1cNnyOb478qrt',
                                    'description' => 'A true-crime, creepy history and all things spooky podcast',
                                ],
                            ],
                        ];
                    @endphp

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach ($resourceSections as $sectionTitle => $items)
                            <div class="border rounded-lg p-6 shadow-sm bg-white">
                                <h2 class="text-xl font-semibold mb-4">{{ $sectionTitle }}</h2>
                                <ul class="space-y-4">
                                    @foreach ($items as $item)
                                        <li>
                                            <a href="{{ $item['url'] }}" target="_blank" rel="noopener noreferrer" class="text-blue-600 font-semibold hover:underline">
                                                {{ $item['title'] }}
                                            </a>
                                            <p class="text-sm text-gray-600">{{ $item['description'] }}</p>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>