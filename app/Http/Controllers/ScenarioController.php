<?php

namespace App\Http\Controllers;

use App\Models\CharaInventory;
use App\Models\DataItem;
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

    public function picked1($id){
        $scene = Scenario::find($id);

        $user = auth()->user();

        if($scene->req1 == "LEVEL"){
            if($user->userChara->level >= $scene->min1){
                if($scene->cons1 == "CHEST"){
                    return $this->chestCheck($scene, 'response1');
                }
            }else{
                $probability = new ProbabilityController;
                $result = $probability->checkProbWithStats($user->level, $scene->min1);

                if($result){
                    return $this->chestCheck($scene, 'response1');
                }
                else{

                }
            }
        }
    }

    public function chestCheck($scene, $response){
        $probability = new ProbabilityController;
        
        $rarity = $probability->checkProbLevel();
        
        $itemData = DataItem::where('rarity', $rarity)->pluck('id')->toArray();
        
        $index = array_rand($itemData);
        
        $item = DataItem::find($itemData[$index]);
        
        CharaInventory::create([
            'user_characters_id' => auth()->user()->userChara->id,
            'data_items_id' => $itemData[$index],
            ]);
        
            $charaInventoryData = auth()->user()->userChara->inventory;
        
            return response()->json([
                'success' => true,
                'type' => 'CHEST',
                'inventory_data' => $charaInventoryData,
                'response' => $scene->$response,
                'response_eff' => 'You Got '. $item->name .' <img src="'. $item->media->first->getUrl() . '" >'
            ]);
    }

    public function failedCheck($scene){
        if($scene->failed_cons == "CHEST"){
            return $this->chestCheck($scene, 'failed_text');
        }
        else if($scene->failed_cons == "HEALTH"){
            return $this->healthCheck($scene, 'failed_eff', 'failed_text');
        }
        else if($scene->failed_cons == "MANA"){
            return $this->manaCheck($scene, 'failed_eff', 'failed_text');
        }
        else if($scene->failed_cons == "EXP"){
            return $this->expCheck($scene, 'failed_eff', 'failed_text');
        }
        else if($scene->failed_cons == "ITEM"){
            
        }
    }

    public function healthCheck($scene, $eff, $response){
        $userChara = auth()->user()->userChara;

        $hp = $userChara->current_health;

        $newHp = $hp + $scene->$eff;

        $type = "GAIN";

        if($scene->$eff < 0 ){
            $type = "LOSS";
        }

        $update = $userChara->update([
            'current_health' => $newHp
        ]);

        if($newHp <= 0){
            return response()->json([
                'success' => true,
                'type' => 'DEATH',
                'response' => $scene->$response,
                'response_eff' => 'You Died!'
            ]);
        }

        return response()->json([
            'success' => true,
            'type' => 'HEALTH',
            'getType' => $type,
            'response' => $scene->$response,
            'response_eff' => 'Your Hp '. $scene->$eff
        ]);
    }

    public function manaCheck($scene, $eff, $response){
        $userChara = auth()->user()->userChara;

        $mana = $userChara->current_mana;

        $newMana = $mana + $scene->$eff;

        $type = "GAIN";

        if($scene->$eff < 0 ){
            $type = "LOSS";
        }

        if($newMana < 0){
            $newMana = 0;
        }

        $update = $userChara->update([
            'current_mana' => $newMana
        ]);

        return response()->json([
            'success' => true,
            'type' => 'MANA',
            'getType' => $type,
            'response' => $scene->$response,
            'response_eff' => 'Your Mana '. $scene->$eff
        ]);

    }

    public function expCheck($scene, $eff, $response){
        $userChara = auth()->user()->userChara;

        $exp = $userChara->exp_count;

        $newExp = $exp + $scene->$eff;

        $expCap = $userChara->exp_cap;

        if($newExp >= $expCap){
            $newExp = 0;

            $level = $userChara->level;

            $prob = new ProbabilityController;

            $str = $userChara->strength + $prob->levelUpInt();
            $int = $userChara->intelligence + $prob->levelUpInt();
            $def = $userChara->defense + $prob->levelUpInt();
            $dex = $userChara->dexterity + $prob->levelUpInt();
            $char = $userChara->charisma + $prob->levelUpInt();
            $max_hp = $userChara->max_health + mt_rand(6, 12);
            $max_mana = $userChara->max_mana + mt_rand(6, 12);

            $update = $userChara->update([
                'exp_count' => $newExp,
                'exp_cap' => $expCap + 500,
                'level' => $level + 1,
                'strength' => $str,
                'intelligence' => $int,
                'defense' => $def,
                'dexterity' => $dex,
                'charisma' => $char,
                'max_health' => $max_hp,
                'max_mana' => $max_mana
            ]);

            $check = new StatsDataController;

            $stats = $check->statsCheck();

            return response()->json([
                'success' => true,
                'type' => 'LVUP',
                'response' => $scene->$response,
                'response_eff' => 'You have been Level Up By One!',
                'data' => $stats 
            ]);
        }

        $update = $userChara->update([
            'exp_count' => $newExp
        ]);

        return response()->json([
            'success' => true,
            'type' => 'EXP',
            'response' => $scene->$response,
            'response_eff' => 'You get '. $scene->eff .' Exp' 
        ]);
    }
}
