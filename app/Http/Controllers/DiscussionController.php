<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discussion;
use App\Models\SerialKiller;
use App\Models\UnsolvedCase;

class DiscussionController extends Controller
{
    // So later a request can identify whether the comment belongs to: serial-killer or unsolved-case
    public function store(Request $request, string $type, int $id) {
        $validated = $request->validate(
            ['content' => ['required', 'string', 'max:2000']],
            // error messages for validation
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

        // automatically fills the polymorphic fields: discussable_id, discussable_type
        $discussable->discussions()->create([
            'user_id' => auth()->id(),
            'content' => $validated['content'],
        ]);

        return back()->with('success', 'Comment posted successfully.');
    }

    public function update(Request $request, Discussion $discussion) {
        if ($discussion->user_id !== auth()->id()) {
            abort(403);
        }

        $validated = $request->validate(
            ['content' => ['required', 'string', 'max:2000']],
            // error messages for validation
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

    public function destroy(Discussion $discussion) {
        $user = auth()->user();

        if ($discussion->user_id !== $user->id && !$user->isAdmin()) {
            abort(403);
        }

        $discussion->delete();

        return back()->with('success', 'Comment deleted successfully.');
    }
}
