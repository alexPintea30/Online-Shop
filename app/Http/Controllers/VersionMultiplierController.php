<?php


namespace App\Http\Controllers;

use App\Multiplier;
use App\Version;
use Illuminate\Support\Facades\DB;

class VersionMultiplierController extends Controller{

    public function index(){
        $versionMultipliers = DB::table('multipliers_versions')->get();
        $versions = Version::all();
        $multipliers = Multiplier::all();

        return view("addVersionMultipliers",[
           'versionMultipliers' => json_decode(json_encode($versionMultipliers), true),
            'versions' => $versions,
            'multipliers' => $multipliers
        ]);
    }

    public function create(){
        return $this->index();
    }

    public function store(){
        request()->validate([
            'version_id' => 'required',
            'multiplier_id' => 'required',
        ]);

        DB::table('multipliers_versions')->insert([
           'version_id' => request()->get('version_id'),
           'multiplier_id' => request()->get('multiplier_id')
        ]);

        return redirect('/versionMultipliers/create')->with('success', 'Added');
    }

    public function show(){

    }

    public function edit(){
        $versionMultipliers = DB::table('multipliers_versions')->get();
        $versions = Version::all();
        $multipliers = Multiplier::all();

        return view("updateVersionMultipliers",[
            'versionMultipliers' => json_decode(json_encode($versionMultipliers), true),
            'versions' => $versions,
            'multipliers' => $multipliers
        ]);
    }

    public function update(){
        request()->validate([
            'version_id' => 'required',
            'multiplier_id' => 'required',
        ]);

        DB::table('multipliers_versions')
            ->where('id', request()->get('id'))
            ->update(['version_id' => request()->get('version_id'),
                    'multiplier_id' => request()->get('multiplier_id')
            ]);

        return redirect('/versionMultipliers/edit')->with('success', 'Updated');
    }

    public function destroy(){
        $id = (int)request()->get('hidden_id');
        DB::table('multipliers_versions')->where('id', $id)->delete();

        return redirect('/versionMultipliers')->with('success', 'Version deleted!');
    }


}
