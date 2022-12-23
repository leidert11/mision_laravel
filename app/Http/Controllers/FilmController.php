
<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function show()
    {
        $films = Film::all();

        return response()->json([
            'Film' => $films
        ], 200);
    }

    public function index(Request $request)
    {
        try {
            $request->validate([
                'movie_id' => 'required'
            ]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 400);
        }

        $id_peli = $request->movie_id;

        return Film::find($id_peli);
    }

    public function create(Request $request)
    {
        try {
            $request->validate([
                'nombre'=> 'required',
                'director'=> 'required',
                'duracion' => 'required',
                'genero'=> 'required',
                'año'=> 'required',
            ]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 400);
        }

        Film::create([
            'nombre' => $request->name,
            'director' => $request->director_name,
            'duracion' => $request->duracion_name,
            'genero' => $request->genero_name,
            'release date' => $request->release_date,
        ]);
    }

    public function update(Request $request, $id)
    {
        // return response()->json($id);
        try {
            $request->validate([
                'nombre'=> 'required',
                'director'=> 'required',
                'duracion' => 'required',
                'genero'=> 'required',
                'año'=> 'required',
            ]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 400);
        }

        // return response()->json(Film::find($id));
        $film = Film::find($id);

        $film->update([
            'nombre' => $request->name,
            'director' => $request->director_name,
            'duracion' => $request->duracion_name,
            'genero' => $request->genero_name,
            'release date' => $request->release_date,
        ]);

        return Film::find($film);
    }

    public function delete($id)
    {
        $film = Film::find($id);
        $film->delete();
        return response()->json($film);
    }
}

