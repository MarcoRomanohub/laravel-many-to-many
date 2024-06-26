<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Technology;
use App\Functions\Helper;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::all();
        return view('admin.technologies.index', compact('technologies'));
    }

    public function technologyProjects()
    {
        $technologies = Technology::all();
        return view('admin.technologies.technology-projects', compact('technologies'));
        dd('ok');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $exists = Technology::where('name', $request->name)->first();
        if ($exists) {
            return redirect()->route('admin.technologies.index')->with('error', 'Tecnologia già esistente');
        } else {
            $new = new Technology();
            $new->name = $request->name;
            $new->slug = Helper::generateSlug($new->name, Technology::class);
            $new->save();
            return redirect()->route('admin.technologies.index')->with('success', 'Tecnologia aggiunta');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Technology $technology)
    {
        $val_data = $request->validate(
            [
                'name' => 'required|min:2|max:30'
            ],
            [
                'name.required' => 'Devi inserire il nome della categoria',
                'name.min' => 'La categoria deve avere almeno :min caratteri',
                'name.max' => 'La categoria deve avere non più di :max caratteri',
            ]
        );
        $exists = Technology::where('name', $request->name)->first();
        if ($exists) {
            return redirect()->route('admin.technologies.index')->with('error', 'Tecnologia già esistente');
        } else {

            $val_data['slug'] = Helper::generateSlug($request->name, Technology::class);
            $technology->update($val_data);
            return redirect()->route('admin.technologies.index')->with('success', 'Tecnologia modificata');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();
        return redirect()->route('admin.technologies.index')->with('success', 'Tecnologia eliminata');
    }
}
