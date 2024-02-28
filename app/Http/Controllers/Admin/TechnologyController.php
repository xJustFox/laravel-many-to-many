<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use App\Http\Requests\StoreTechnologyRequest;
use App\Http\Requests\UpdateTechnologyRequest;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $technologies = Technology::all();
        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.technologies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTechnologyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTechnologyRequest $request)
    {
        $form_data = $request->all();

        $technology = new Technology();

        $technology->fill($form_data);
        $technology['slug'] = Str::slug($form_data['name']);
        $technology->save();

        return redirect()->route('admin.technologies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function show(Technology $technology)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function edit(Technology $technology, Request $request)
    {
        $error_message = '';
        $error_message_color = '';
        if (!empty($request->all())) {
            $messages = $request->all();
            $error_message = $messages['error_message'];
            $error_message_color = $messages['error_message_color'];
        }

        return view('admin.technologies.edit', compact('technology', 'error_message', 'error_message_color') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTechnologyRequest  $request
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTechnologyRequest $request, Technology $technology)
    {
        $form_data = $request->all();

        $exists = Technology::where('name', 'LIKE', $form_data['name'])->where('id', '!=', $technology['id'])->get();
        if (count($exists) > 0) {
            $error_message = 'Hai inserito un titolo già presente in un altro progetto';
            return redirect()->route('admin.technologies.edit', compact('technology', 'error_message'));
        }

        $exists_color = Technology::where('color', 'LIKE', $form_data['color'])->where('id', '!=', $technology['id'])->get();
        if (count($exists_color) > 0) {
            $error_message = 'Hai inserito un colore già presente in un altra tecnologia';
            return redirect()->route('admin.technologies.edit', compact('technology', 'error_message_color'));
        }

        $technology['slug'] = Str::slug($form_data['name']);
        $technology->update($form_data);

        return redirect()->route('admin.technologies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();

        return redirect()->route('admin.technologies.index');
    }
}
