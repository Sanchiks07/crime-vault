<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use App\Models\Discussion;
use App\Models\SerialKiller;
use App\Models\UnsolvedCase;

class DiscussionController extends Controller
{
    // store a new discussion comment
    public function store(Request $request, string $type, int $id) {
        $validated = $request->validate(
            ['content' => ['required', 'string', 'max:2000']],
            [
                'content.required' => 'Please enter a comment before submitting.',
                'content.max' => 'Your comment cannot be longer than 2000 characters.',
            ]
        );

        $discussable = match ($type) {
            'serial-killer' => SerialKiller::findOrFail($id),
            'unsolved-case' => UnsolvedCase::findOrFail($id),
            default => abort(404),
        };

        // allow a maximum of 5 comments per minute per user
        $key = 'discussion-store:' . auth()->id();

        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);

            throw ValidationException::withMessages([
                'content' => "You are posting too quickly. Please try again in {$seconds} seconds.",
            ]);
        }

        RateLimiter::hit($key, 60);

        $discussion = new Discussion([
            'content' => $validated['content'],
        ]);

        $discussion->user_id = auth()->id();

        // automatically fills the polymorphic fields
        $discussable->discussions()->save($discussion);

        return back()->with('success', 'Comment posted successfully.');
    }

    // Update an existing comment.
    public function update(Request $request, Discussion $discussion) {
        if ($discussion->user_id !== auth()->id()) {
            abort(403);
        }

        $validated = $request->validate(
            ['content' => ['required', 'string', 'max:2000']],
            [
                'content.required' => 'Please enter a comment before submitting.',
                'content.max' => 'Your comment cannot be longer than 2000 characters.',
            ]
        );

        $discussion->update([
            'content' => $validated['content'],
        ]);

        return back()->with('success', 'Comment updated successfully.');
    }

    // delete a comment (owner or administrator)
    public function destroy(Discussion $discussion) {
        $user = auth()->user();

        if ($discussion->user_id !== $user->id && !$user->isAdmin()) {
            abort(403);
        }

        $discussion->delete();

        return back()->with('success', 'Comment deleted successfully.');
    }
}
