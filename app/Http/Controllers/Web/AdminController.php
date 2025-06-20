<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(Request $request)
    {
        $totalUsers = User::where('role', 'user')->count();
        $totalMovies = Movie::count();
        $genres = Genre::all();

        $query = Movie::query();
        $sort = $request->input('sort', 'title'); // default sort
        $direction = $request->input('direction', 'asc'); // default direction
        $paginate = $request->input('paginate', 10); // default pagination
         $perPage = $request->get('perPage', 10);
        // $movies = Movie::orderBy($sort)->paginate($perPage);
        $movies = Movie::orderBy('title')->paginate(10);
       
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');
                
        }
        //     $movies = Movie::with('genres')
        // ->when($request->filled('search'), function ($query) use ($request) {
        //     $query->where('title', 'like', '%' . $request->search . '%');
        // })
        // ->orderBy($sort, $direction)
        // ->get()
        // ->paginate(10);
        $movies = Movie::query()
    ->when($request->filled('search'), function ($query) use ($request) {
        $query->where('title', 'like', '%' . $request->search . '%');
    })
    ->orderBy($sort, $direction)
    ->paginate(10); // ✅ FIXED


        // $movies = $query->with(['genres', 'actors'])->paginate(10); // or ->get()
        return view('admin.dashboard', [
                    'movies' => $movies,
        'totalMovies' => Movie::count(),
        'totalUsers' => User::count(),
        'sort' => $sort,
        'direction' => $direction,
        'paginate' => $paginate,
        ]);
    }
}
