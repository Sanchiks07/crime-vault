<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favourite;
use App\Models\SerialKiller;
use App\Models\UnsolvedCase;

class FavouriteController extends Controller
{
    public function index() {
        $favourites = auth()
            ->user()
            ->favourites()
            ->with('favouritetable')
            ->latest()
            ->get();

        return view('favourites', compact('favourites'));
    }

    // add or remove an item from favourites
    public function toggle(string $type, int $id) {
        $user = auth()->user();

        $model = match ($type) {
            'serial-killer' => SerialKiller::findOrFail($id),
            'unsolved-case' => UnsolvedCase::findOrFail($id),

            default => abort(404),
        };

        $existingFavourite = $user
            ->favourites()
            ->where('favouritetable_id', $model->id)
            ->where('favouritetable_type', $model::class)
            ->first();

        if ($existingFavourite) {
            $existingFavourite->delete();
        } else {
            $user->favourites()->create([
                'favouritetable_id' => $model->id,
                'favouritetable_type' => $model::class,
            ]);
        }

        return back();
    }
}
