<?php

namespace App\Http\Controllers;

use App\Models\StartScene;
use Illuminate\Http\Request;

class StartSceneController extends Controller
{
    public function showStartScenes(){
        $userChara = auth()->user()->userChara;

        $startScene = StartScene::where('races_id', $userChara->races_id)->first();

        if($startScene){
            return response()->json([
                'success' => true,
                'data' => $startScene
            ]);
        }
    }
}
