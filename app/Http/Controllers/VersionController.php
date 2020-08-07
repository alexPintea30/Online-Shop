<?php

namespace App\Http\Controllers;

use App\Version;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use PHPUnit\Util\Exception;

class VersionController extends Controller{

    public function index(){
        $versions = Version::all(['id','start_date', 'end_date', 'description']);
        return view('addVersionPanel', [
            'versions' => $versions
        ]);
    }

    public function create(){
        return $this->index();
    }

    public function store(){

        request()->validate([
            'start_date' => 'required',
            'end_date' => 'required',
            'description' => 'required'
        ]);

        $version = new Version([
            'start_date'=> request()->get('start_date'),
            'end_date' => request()->get('end_date'),
            'description' => request()->get('description')
        ]);

        $version->save();
        return redirect('/version')->with('success', 'Version saved!');
    }

    public function show($id){
        $versions = Version::find(request()->get('id'));
        return view('addVersionPanel', [
            'versions' => $versions
        ]);
    }

    public function edit(){
        $versions = Version::all(['id','start_date', 'end_date', 'description']);
        return view('updateVersionPanel', [
            'versions' => $versions
        ]);
    }

    public function update(){
        request()->validate([
            'start_date' => 'required',
            'end_date' => 'required',
            'description' => 'required'
        ]);

        $version = Version::find(request()->get('id'));
        $version->start_date = request()->get('start_date');
        $version->end_date = request()->get('end_date');
        $version->description = request()->get('description');
        $version->save();

        return redirect('/version')->with('success', 'Version saved!');
    }

    public function destroy(){
        $id = (int)request()->get('hidden_id');
        $version = Version::find($id);
        $version->delete();

        return redirect('/version')->with('success', 'Version deleted!');
    }

}
