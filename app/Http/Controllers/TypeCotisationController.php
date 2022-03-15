<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Membre;
use App\Models\TypeCotisation;
use Illuminate\Http\Request;

class TypeCotisationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $typecotisation = TypeCotisation::where('name', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $typecotisation = TypeCotisation::latest()->paginate($perPage);
        }

        $total_membres = Membre::all()->count();

        return view('type-cotisation.index', compact('typecotisation','total_membres'));
    }

    public function details(){
        $id = \Request::get('id');
        $status = \Request::get('status');
        dump($id, $status);

        
        return view('rapport.details');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('type-cotisation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        TypeCotisation::create($requestData);

        return redirect('type-cotisation')->with('flash_message', 'TypeCotisation added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $typecotisation = TypeCotisation::findOrFail($id);
        $total_membres = Membre::all()->count();

        return view('type-cotisation.show', compact('typecotisation', 'total_membres'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $typecotisation = TypeCotisation::findOrFail($id);

        return view('type-cotisation.edit', compact('typecotisation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $typecotisation = TypeCotisation::findOrFail($id);
        $typecotisation->update($requestData);

        return redirect('type-cotisation')->with('flash_message', 'TypeCotisation updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        TypeCotisation::destroy($id);

        return redirect('type-cotisation')->with('flash_message', 'TypeCotisation deleted!');
    }
}
