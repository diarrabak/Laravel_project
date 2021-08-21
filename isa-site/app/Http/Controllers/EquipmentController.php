<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Laboratory;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipments = Equipment::get();
        return view('equipments.index')
            ->with('equipments', $equipments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $labs = Laboratory::get()->pluck('name', 'id');
        return view('equipments.create')
            ->with('labs', $labs)
            ->with('equipment', (new Equipment()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->picture->store('images', 'public');
        $equipment = new Equipment([
            "name" => $request->get('name'),
            "description" => $request->get('description'),
            "picture" => $request->picture->hashName(),
            'laboratory_id' => $request->input('laboratory_id'),
        ]);

        $equipment->save(); // Finally, save the record.

        return redirect()->action([EquipmentController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function show(Equipment $equipment)
    {
        return view('equipments.show', compact('equipment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipment $equipment)
    {
        $laboratory = $equipment->laboratory;
        $laboratories = Laboratory::get()->pluck('name', 'id');
        return view('equipments.edit')
            ->with('laboratory', $laboratory)
            ->with('laboratories', $laboratories)
            ->with('equipment', $equipment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipment $equipment)
    {
        $request->picture->store('images', 'public');
        $equipment->fill($request->input());
        $equipment->picture = $request->picture->hashName();
        $equipment->save();
        return redirect()->action([EquipmentController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipment $equipment)
    {
        Equipment::where('id', $equipment->id)->delete();
        return redirect()->action([EquipmentController::class, 'index']);
    }
}
