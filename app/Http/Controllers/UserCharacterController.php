<?php

namespace App\Http\Controllers;

use App\Models\CharaClass;
use App\Models\CharaEquipment;
use App\Models\CharaInventory;
use App\Models\Race;
use App\Models\UserCharacter;
use Illuminate\Http\Request;

class UserCharacterController extends Controller
{
    public function index(){
        //
    }

    public function charaCreation(){

        $races = Race::all();
        $classes = CharaClass::all();
        return view('chara-make', compact('races', 'classes'));
    }

    public function pickRaces(Request $request){

        $model = UserCharacter::find(auth()->id());

        if($model){
            $update = $model->update([
                'races_id' => $request->id
            ]);

            if($update){
                return response()->json([
                    'success' => true,
                    'message' => 'picked your race!'
                ], 200);
            }

            return response()->json([
                'success' => false,
                'message' => 'conflict'
            ], 409);
        }

        return response()->json([
            'message' => 'User Not Found'
        ], 404);
    }

    public function pickClass(Request $request){
        $model = UserCharacter::find(auth()->id());

        if($model){
            $update = $model->update([
                'chara_classes_id' => $request->id
            ]);

            if($update){
                return response()->json([
                    'success' => true,
                    'message' => 'picked your Class!'
                ], 200);
            }

            return response()->json([
                'success' => false,
                'message' => 'conflict'
            ], 409);
        }

        return response()->json([
            'message' => 'User Not Found'
        ], 404);
    }

    public function addStats(Request $request){
        $model = UserCharacter::find(auth()->id());

        if($model){
            $update = $model->update([
                'strength' => $request->str,
                'intelligence' => $request->int,
                'dexterity' => $request->dex,
                'charisma' => $request->char,
                'defense' => $request->def,
                'max_health' => 20,
                'current_health' => 20,
                'max_mana' => 20,
                'current_mana' => 20,
                'level' => 1,
                'exp_count' => 0,
                'status' => 'ALIVE'
            ]);
            if($update){

                $data =  UserCharacter::find(auth()->id());

                CharaEquipment::create([
                    'user_characters_id' => auth()->user()->userChara->id
                ]);

                CharaInventory::create([
                    'user_characters_id' => auth()->user()->userChara->id,
                    'data_items_id' => 6 //CLoak
                ]);

                CharaInventory::create([
                    'user_characters_id' => auth()->user()->userChara->id,
                    'data_items_id' => 7 //Hat
                ]);

                return response()->json([
                    'success' => true,
                    'message' => 'Stats Save',
                    'data' =>  [
                        'race' => $data->races->name,
                        'class' => $data->charaClass->name,
                        'hp' => $data->max_health,
                        'mana' => $data->max_mana,
                        'level' => $data->level,
                        'str' => $data->strength,
                        'int' => $data->intelligence,
                        'dex' => $data->dexterity,
                        'def' => $data->defense,
                        'char' => $data->charisma,
                    ]
                ], 200);
            }

            return response()->json([
                'success' => false,
                'message' => 'conflict'
            ], 409);
        }
        return response()->json([
            'message' => 'User Not Found'
        ], 404);
    }

    public function checkStatus(){
        $userChara = auth()->user()->userChara ;

        if($userChara->status == "DEATH"){
            return response()->json([
                'status' => $userChara->status
            ]);
        }

        return response()->json([
            'status' => $userChara->status
        ]);
    }

    public function resetChara(){
        $userChara = auth()->user()->userChara;

        $equipment = $userChara->equipment;

        $invento = $userChara->inventory;

        $equipment->update([
            'head' => null,
            'body' => null,
            'weapon' => null,
            'accessories1' => null,
            'accessories2' => null,
            'foot' => null
        ]);

        foreach($invento as $item){
            $item->delete();
        }

        return response()->json([
            'success' => true,
        ]);
    }
}
