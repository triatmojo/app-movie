<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MovieRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use App\Models\Movie;

class MovieController extends Controller
{
    public function index()
    {
        $data = Movie::all();

        return view('admin.movies.movie', [
            'movies' => $data
        ]);
    }

    public function create()
    {
        return view('admin.movies.movie-create');
    }

    public function store(MovieRequest $request)
    {

        $data = $request->except('_token');

        $smallThumbnail = $request->small_thumbnail;
        $largeThumbnail = $request->large_thumbnail;
        
        // // Random name file.jpeg
        $originalSmallThumbnail = Str::random(8).$smallThumbnail;
        $originalLargeThumbnail = Str::random(8).$largeThumbnail;
        
        // Upload image to public/storage
        $smallThumbnail->storeAs('public/thumbnail', $originalSmallThumbnail);
        $largeThumbnail->storeAs('public/thumbnail', $originalLargeThumbnail);
        
        $data['small_thumbnail'] = $originalSmallThumbnail;
        $data['large_thumbnail'] = $originalLargeThumbnail;
    
        Movie::create($data);

        return to_route('admin.movie')->with('success', 'Movie created successfully');
    }

    public function edit($id)
    {
        $movie = Movie::findOrFail($id);

        return view('admin.movies.movie-update', ['movie' => $movie]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_token');

        $request->validate([
            'title' => 'required|string',
            'trailer' => 'required|url',
            'movies' => 'required|url',
            'casts' => 'required|string',
            'categories' => 'required|string',
            'small_thumbnail' => 'image|mimes:jpeg,jpg,png',
            'large_thumbnail' => 'image|mimes:jpeg,jpg,png',
            'release_date' => 'required|string',
            'short_about' => 'required|string',
            'about' => 'required|string',
            'duration' => 'required|string',
            'featured' => 'required',
        ]);


        $movie = Movie::findOrFail($id);

        if($request->small_thumbnail) {
            // save new image
            $smallThumbnail = $request->small_thumbnail;
            $originalSmallThumbnail = Str::random(10).$smallThumbnail;
            $smallThumbnail->storeAs('public/thumbnail', $originalSmallThumbnail);
            $data['small_thumbnail'] = $originalSmallThumbnail;

            // delete old image
            if(Storage::exists('public/thumbnail/'.$movie->small_thumbnail)) {
                Storage::delete('public/thumbnail/'.$movie->small_thumbnail);
            }
        }

        if($request->large_thumbnail) {
            // save new image
            $largeThumbnail = $request->large_thumbnail;
            $originalLargeThumbnail = Str::random(10).$largeThumbnail;
            $largeThumbnail->storeAs('public/thumbnail', $originalLargeThumbnail);
            $data['large_thumbnail'] = $originalLargeThumbnail;

            // delete old image
            if(Storage::exists('public/thumbnail/'.$movie->large_thumbnail)) {
                Storage::delete('public/thumbnail/'.$movie->large_thumbnail);
            }
        }

        $movie->update($data);

        return to_route('admin.movie')->with('success', 'Movie update successfully');
    }

    public function destroy($id)
    {
        Movie::findOrFail($id)->delete();

        return to_route('admin.movie')->with('success', 'Movie delete successfully');
    }
}
