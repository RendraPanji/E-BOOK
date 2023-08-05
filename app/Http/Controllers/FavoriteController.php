<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $favorites = Favorite::where('id_user', $user->id)->get();
        return view('member.favorite', data: compact('user', 'favorites'));
    }

    public function addFavorite(Request $request)
    {
        $book = $request->input('id');
        $user = Auth::user();

        $isFavorite = Favorite::where('id_buku', $book)->where('id_user', $user->id)->exists();

        if (!$isFavorite) {
            Favorite::create([
                'id_buku' => $book,
                'id_user' => $user->id,
            ]);

            return redirect()->back()->with('success', 'Buku telah ditambahkan ke favorit.');
        }

        return redirect()->back()->with('error', 'Buku sudah ada dalam favorit Anda.');
    }

    public function removeFavorite (Request $request, $id)
{
    $user = Auth::user();
    $favorite = Favorite::where('id', $id)->where('id_user', $user->id)->first();

    if ($favorite) {
        $favorite->delete();

        return redirect()->back()->with('delete', 'Buku Favorite telah dihapus');
    }
}
}