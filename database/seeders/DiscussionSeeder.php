<?php

namespace Database\Seeders;

use App\Models\Discussion;
use App\Models\SerialKiller;
use App\Models\UnsolvedCase;
use App\Models\User;
use Illuminate\Database\Seeder;
use RuntimeException;

class DiscussionSeeder extends Seeder
{
    public function run(): void {
        // demo discussions must never be seeded in production
        if (app()->environment('production')) {
            return;
        }

        $adminEmail = config('crimevault.seed_admin_email');

        $sanija = $adminEmail
            ? User::where('email', $adminEmail)
                ->where('name', 'Sanija')
                ->first()
            : null;

        $keita = User::where(
            'email',
            'keita.demo@crimevault.test'
        )->where('name', 'Keita')->first();

        if (!$sanija || !$keita) {
            throw new RuntimeException(
                'Run UserSeeder before DiscussionSeeder.'
            );
        }

        $discussions = [
            'Ted Bundy' => [
                ['Keita', 'One of the most disturbing parts of this case is how long the crimes continued before Bundy was stopped.'],
                ['Sanija', 'The investigation is just as interesting to study as the psychology behind the crimes.'],
                ['Keita', 'I wonder how much faster investigators could have connected the cases if modern technology had been available.'],
                ['Sanija', 'The differences between the investigations in various states are worth examining.'],
                ['Keita', 'His public image seems to have played an important role in how people perceived him.'],
                ['Sanija', 'This case is a reminder that appearance and social confidence are not reliable indicators of innocence.'],
                ['Keita', 'The timeline of his movements across different states is particularly interesting.'],
                ['Sanija', 'Comparing witness statements with the established timeline could make a useful research topic.'],
                ['Keita', 'I would like to understand how investigators eventually connected the separate crimes.'],
                ['Sanija', 'The role of surviving witnesses deserves more attention when discussing this case.'],
                ['Keita', 'It is important that discussions about Bundy also remember the people whose lives were taken.'],
                ['Sanija', 'The case offers a useful opportunity to study investigative cooperation and its limitations.'],
            ],

            'Zodiac Killer' => [
                ['Keita', 'There are still so many unanswered questions, especially about the true number of victims.'],
                ['Sanija', 'The letters and ciphers make this investigation especially unusual.'],
                ['Keita', 'I wonder how investigators determined which letters were authentic.'],
                ['Sanija', 'That is a good question because a claimed connection is not necessarily a verified connection.'],
                ['Keita', 'The difference between confirmed victims and claimed victims is important here.'],
                ['Sanija', 'Some popular theories seem convincing until the supporting evidence is examined carefully.'],
                ['Keita', 'The geographical locations of the attacks could be interesting to compare on a map.'],
                ['Sanija', 'Geographical patterns may provide context, but they cannot identify a suspect by themselves.'],
                ['Keita', 'I find the public reaction to the letters almost as interesting as the letters themselves.'],
                ['Sanija', 'Media coverage certainly influenced how the public understood the case.'],
                ['Keita', 'Do you think modern forensic methods could help resolve some of the remaining questions?'],
                ['Sanija', 'Potentially, although the quality and preservation of historical evidence are major limitations.'],
            ],

            'Black Dahlia' => [
                ['Keita', 'The lack of a confirmed perpetrator makes this case especially difficult to understand.'],
                ['Sanija', 'Many suspect theories sound convincing at first but become weaker when compared with the evidence.'],
                ['Keita', 'I wonder which pieces of physical evidence investigators considered most important.'],
                ['Sanija', 'It is important to distinguish documented evidence from claims made decades later.'],
                ['Keita', 'The amount of media attention surrounding this case was extraordinary.'],
                ['Sanija', 'Sensational reporting can make it harder to separate historical facts from popular mythology.'],
                ['Keita', 'I would like to see a timeline containing only events supported by reliable sources.'],
                ['Sanija', 'A documented timeline would be especially helpful for evaluating competing theories.'],
                ['Keita', 'Some articles seem to focus more on shocking details than on Elizabeth Short as a person.'],
                ['Sanija', 'That is why victim-centred reporting is so important in true crime research.'],
                ['Keita', 'Do you think the investigation would have unfolded differently with modern forensic technology?'],
                ['Sanija', 'Modern methods could have offered additional possibilities, but we cannot know whether they would have solved the case.'],
            ],

            'Boy in the Box' => [
                ['Keita', 'This case shows how important it is to preserve evidence, even when an investigation remains unresolved for decades.'],
                ['Sanija', 'The eventual identification of Joseph Augustus Zarelli was a significant development in the case.'],
                ['Keita', 'It is heartbreaking to think about how long he remained unidentified.'],
                ['Sanija', 'His identification also reminds us that identifying a victim and identifying a perpetrator are different investigative questions.'],
                ['Keita', 'I wonder what challenges investigators faced when examining evidence collected so long ago.'],
                ['Sanija', 'Historical evidence can be affected by storage conditions, documentation gaps and older collection methods.'],
                ['Keita', 'The progress made through forensic genetic genealogy is fascinating.'],
                ['Sanija', 'It is a powerful investigative approach, although privacy and ethical considerations matter too.'],
                ['Keita', 'I hope future research can provide more answers about what happened to Joseph.'],
                ['Sanija', 'Any new theory should be evaluated carefully against verified evidence.'],
                ['Keita', 'This is one of the cases where remembering the victim feels especially important.'],
                ['Sanija', 'Agreed. His identity and humanity should remain central to how the case is presented.'],
            ],
        ];

        $users = [
            'Sanija' => $sanija,
            'Keita' => $keita,
        ];

        foreach ($discussions as $caseName => $comments) {
            $case = match ($caseName) {
                'Ted Bundy', 'Zodiac Killer' =>
                    SerialKiller::where('nickname', $caseName)->first(),

                'Black Dahlia', 'Boy in the Box' =>
                    UnsolvedCase::where('name', $caseName)->first(),

                default => null,
            };

            // fail clearly instead of silently skipping missing cases
            if (!$case) {
                throw new RuntimeException(
                    "Discussion case not found: {$caseName}"
                );
            }

            foreach ($comments as [$author, $content]) {
                Discussion::firstOrCreate([
                    'user_id' => $users[$author]->id,
                    'discussable_id' => $case->id,
                    'discussable_type' => $case->getMorphClass(),
                    'content' => $content,
                ]);
            }
        }
    }
}
