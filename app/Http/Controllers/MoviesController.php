<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MoviesController extends Controller
{
    public function index(){

      $movies = Movie::all();

      return view('/movies/index', compact('movies'));
    }

    public function show($id){
      $movie = Movie::findOrfail($id);

      return view('/movies/show', compact('movie'));

    }

    public function create(){

      return view('/movies/create');
    }

    public function store(Request $request){
      $movieValidateData = $request->validate([
        'name' => 'required|max:255',
        'description' => 'required',
      ]);

      $movie = Movie::create($movieValidateData);

      return redirect('/movies')->with('sucess', 'Votre FILM à bien été ajouté');
    }

    public function edit($id){
      $movie = Movie::findOrfail($id);

      return view('movies/edit', compact('movie'));
    }

    public function update(Request $request, $id){
      $validatedData = $request->validate([
        'name' => 'required|max:255',
        'description' => 'required'
      ]);
      Movie::whereId($id)->update($validatedData);

      return redirect('/movies')->with('success', 'le film a bien été ajouté');
    }

    public function destroy($id){
      $movie = Movie::findOrfail($id);
      $movie->delete();

      return redirect('/movies')->with('sucess','le film a bien été supprimé');
    }
}
