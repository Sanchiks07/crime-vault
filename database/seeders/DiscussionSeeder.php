<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Discussion;
use App\Models\SerialKiller;
use App\Models\UnsolvedCase;
use App\Models\User;

class DiscussionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('discussions')->insert([
            [
                'user_id' => 3,
                'discussable_id' => 1,
                'discussable_type' => 'App\Models\SerialKiller',
                'content' => 'One of the most disturbing parts of this case is how long the crimes continued before the killer was stopped.'
            ],
            [
                'user_id' => 2,
                'discussable_id' => 1,
                'discussable_type' => 'App\Models\SerialKiller',
                'content' => 'I think the investigation itself is just as interesting as the psychology behind the crimes.'
            ],
            [
                'user_id' => 3,
                'discussable_id' => 2,
                'discussable_type' => 'App\Models\SerialKiller',
                'content' => 'There are still so many unanswered questions around this case, especially regarding the true number of victims.'
            ],
            [
                'user_id' => 3,
                'discussable_id' => 1,
                'discussable_type' => 'App\Models\UnsolvedCase',
                'content' => 'The lack of a confirmed suspect makes this case especially difficult to understand. I wonder which piece of evidence was the most important.'
            ],
            [
                'user_id' => 2,
                'discussable_id' => 1,
                'discussable_type' => 'App\Models\UnsolvedCase',
                'content' => 'Some of the suspect theories seem convincing at first, but a lot of them fall apart when the timeline is compared closely.'
            ],
            [
                'user_id' => 3,
                'discussable_id' => 2,
                'discussable_type' => 'App\Models\UnsolvedCase',
                'content' => 'This case feels like one where a small overlooked detail could completely change the investigation.'
            ],
        ]);
    }
}
