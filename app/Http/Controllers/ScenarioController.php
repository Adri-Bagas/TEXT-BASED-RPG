<?php

namespace App\Http\Controllers;

use App\Models\Scenario;
use Illuminate\Http\Request;

class ScenarioController extends Controller
{
    public function callScene(){
        $probability = new ProbabilityController;

        $level = $probability->checkProbLevel();

        $ids = Scenario::where('rarity', $level)->pluck('id')->toArray();

        $id = array_rand($ids);

        $scene = Scenario::find($ids[$id]);

        if($scene){
            return response()->json([
                'success' => true,
                'scene' => $scene
            ], 200);
        }

        return response()->json([
            'messages' => "data tidak ditemukan"
        ], 404);

    }
}
