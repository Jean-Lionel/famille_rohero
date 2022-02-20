<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Cellule;
use Illuminate\Http\Request;

class CelluleController extends Controller
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
            $cellule = Cellule::where('name', 'LIKE', "%$keyword%")
                ->orWhere('content', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $cellule = Cellule::latest()->paginate($perPage);
        }

        return view('cellule.index', compact('cellule'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('cellule.create');
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
            $validated = $request->validate([
                'name' => 'required|unique:cellules|max:255',
                
            ]);
        
        $requestData = $request->all();
        
        Cellule::create($requestData);

        return redirect('cellule')->with('flash_message', 'Cellule added!');
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
        $cellule = Cellule::findOrFail($id);

        return view('cellule.show', compact('cellule'));
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
        $cellule = Cellule::findOrFail($id);

        return view('cellule.edit', compact('cellule'));
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
        
        $cellule = Cellule::findOrFail($id);
        $cellule->update($requestData);

        return redirect('cellule')->with('flash_message', 'Cellule updated!');
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
        Cellule::destroy($id);

        return redirect('cellule')->with('flash_message', 'Cellule deleted!');
    }
}
