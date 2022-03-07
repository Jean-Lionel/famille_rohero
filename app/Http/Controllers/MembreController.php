<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Cellule;
use App\Models\Compte;
use App\Models\Membre;
use DB;
use Illuminate\Http\Request;

class MembreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 50;

        if (!empty($keyword)) {
            $membre = Membre::where('firstNames', 'LIKE', "%$keyword%")
                ->orWhere('lastName', 'LIKE', "%$keyword%")
                ->orWhere('telephone', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $membre = Membre::latest()->paginate($perPage);
        }

        return view('membre.index', compact('membre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $cellules = Cellule::orderBy('name')->get();
        return view('membre.create',compact('cellules'));
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
                'firstName' => 'required|max:255',
                'lastName' => 'required|max:255',
                'cellule_id' => 'required',
            ]);
        
        $requestData = $request->all();

        try {
            DB::beginTransaction();
            $membre = Membre::create($requestData);
            Compte::create([
                'name' => date('Y').'-'.str_pad($membre->id,4,"0",STR_PAD_LEFT),
                'membre_id' => $membre->id,
                'montant' => 0
            ]);

            DB::commit();
            
        } catch (\Exception $e) {
            DB::rollback();
            dd($e->getMessage());
        }
        return redirect('membre')->with('flash_message', 'Membre added!');
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
        $membre = Membre::findOrFail($id);

        return view('membre.show', compact('membre'));
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
        $membre = Membre::findOrFail($id);
        $cellules = Cellule::all();

        return view('membre.edit', compact('membre','cellules'));
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
        
        $membre = Membre::findOrFail($id);
        $membre->update($requestData);

        return redirect('membre')->with('flash_message', 'Membre updated!');
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
        Membre::destroy($id);

        return redirect('membre')->with('flash_message', 'Membre deleted!');
    }
}
