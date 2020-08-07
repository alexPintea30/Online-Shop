<?php

namespace App\Http\Controllers;

use App\Multiplier;
use App\Version;
use Illuminate\Http\Request;

class MultiplierController extends Controller
{
    public function index(){
        $multipliers = Multiplier::all(['id','name', 'identifier', 'multiplier']);
        return view('addMultiplierPanel', [
            'multipliers' => $multipliers
        ]);
    }

    public function create(){
        return $this->index();
    }

    public function store(){
        request()->validate([
            'name' => 'required',
            'identifier' => 'required',
            'multiplier' => 'required'
        ]);

        $multiplier = new Multiplier([
            'name'=> request()->get('name'),
            'identifier' => request()->get('identifier'),
            'multiplier' => request()->get('multiplier')
        ]);

        $multiplier->save();
        return $this->create()->with('success', 'Multiplier added');
    }

    public function show($id){
        return Multiplier::find(request()->get('id'));
    }

    public function edit(){
        $multipliers = Multiplier::all(['id','name', 'identifier', 'multiplier']);
        return view('updateMultiplierPanel', [
            'multipliers' => $multipliers
        ]);
    }

    public function update(){
        request()->validate([
            'name' => 'required',
            'identifier' => 'required',
            'multiplier' => 'required'
        ]);

        $multiplier = Multiplier::find(request()->get('id'));

        $multiplier->name = request()->get('name');
        $multiplier->identifier = request()->get('identifier');
        $multiplier -> multiplier = request()->get('multiplier');
        $multiplier->save();

        return $this->edit()->with('success', 'Multiplier updated');
    }

    public function destroy(){

        try {
            $multiplier = Multiplier::find((int)request()->get('hidden_id'));
            $multiplier->delete();
        }catch (Exception $e){
            return "No such multiplier";
        }
        return redirect('/multiplier')->with('success', 'Multiplier deleted!');

    }

}
