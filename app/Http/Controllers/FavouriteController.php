<?php

namespace App\Http\Controllers;

use App\Models\SerialKiller;
use App\Models\UnsolvedCase;
use Illuminate\Support\Facades\DB;

class FavouriteController extends Controller
{
    public function index()
    {
        $favourites = auth()
            ->user()
            ->favourites()
            ->with('favouritable')
            ->latest()
            ->get();

        return view('favourites', compact('favourites'));
    }

    // Add or remove an item from favourites.
    public function toggle(string $type, int $id)
    {
        $model = match ($type) {
            'serial-killer' => SerialKiller::findOrFail($id),
            'unsolved-case' => UnsolvedCase::findOrFail($id),
            default => abort(404),
        };

        DB::transaction(function () use ($model) {
            $user = auth()->user();

            // Lock the user row to serialize favourite toggles.
            $user = $user->newQuery()
                ->whereKey($user->getKey())
                ->lockForUpdate()
                ->firstOrFail();

            $favourite = $user->favourites()
                ->where('favouritable_id', $model->getKey())
                ->where('favouritable_type', $model->getMorphClass())
                ->first();

            if ($favourite) {
                $favourite->delete();
            } else {
                $user->favourites()->create([
                    'favouritable_id' => $model->getKey(),
                    'favouritable_type' => $model->getMorphClass(),
                ]);
            }
        });

        return back();
    }
}
