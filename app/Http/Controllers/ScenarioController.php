<?php

namespace App\Http\Controllers;

use App\Models\CharaInventory;
use App\Models\DataItem;
use App\Models\Scenario;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

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

    public function picked1(Request $request){
        $id = $request->id;
        $scene = Scenario::find($id);

        $user = auth()->user();

        $bruh = new StatsDataController;

        $datas = $bruh->statsCheck();

        if($scene->req1 == "LEVEL"){
            if($user->userChara->level >= $scene->min1){
                if($scene->cons1 == "CHEST"){
                    return $this->chestCheck($scene, 'response1');
                }
                if($scene->cons1 == "HEALTH"){
                    return $this->healthCheck($scene, 'effect1', 'response1');
                }
                if($scene->cons1 == "MANA"){
                    return $this->manaCheck($scene, 'effect1', 'response1');
                }
                if($scene->cons1 == "EXP"){
                    return $this->expCheck($scene, 'effect1', 'response1');
                }
                if($scene->cons1 == "ITEM"){
                    return $this->itemCheck($scene, 'effect1', 'response1');
                }
            }else{
                $probability = new ProbabilityController;
                $result = $probability->checkProbWithStats($user->level, $scene->min1);

                if($result){
                    if($scene->cons1 == "CHEST"){
                        return $this->chestCheck($scene, 'response1');
                    }
                    if($scene->cons1 == "HEALTH"){
                        return $this->healthCheck($scene, 'effect1', 'response1');
                    }
                    if($scene->cons1 == "MANA"){
                        return $this->manaCheck($scene, 'effect1', 'response1');
                    }
                    if($scene->cons1 == "EXP"){
                        return $this->expCheck($scene, 'effect1', 'response1');
                    }
                    if($scene->cons1 == "ITEM"){
                        return $this->itemCheck($scene, 'effect1', 'response1');
                    }
                }
                else{
                    return $this->failedCheck($scene);
                }
            }
        }
        else if($scene->req1 == "STR"){
            if($datas['totSTR'] >= $scene->min1){
                if($scene->cons1 == "CHEST"){
                    return $this->chestCheck($scene, 'response1');
                }
                if($scene->cons1 == "HEALTH"){
                    return $this->healthCheck($scene, 'effect1', 'response1');
                }
                if($scene->cons1 == "MANA"){
                    return $this->manaCheck($scene, 'effect1', 'response1');
                }
                if($scene->cons1 == "EXP"){
                    return $this->expCheck($scene, 'effect1', 'response1');
                }
                if($scene->cons1 == "ITEM"){
                    return $this->itemCheck($scene, 'effect1', 'response1');
                }
            }else{
                $probability = new ProbabilityController;
                $result = $probability->checkProbWithStats($datas['totSTR'], $scene->min1);

                if($result){
                    if($scene->cons1 == "CHEST"){
                        return $this->chestCheck($scene, 'response1');
                    }
                    if($scene->cons1 == "HEALTH"){
                        return $this->healthCheck($scene, 'effect1', 'response1');
                    }
                    if($scene->cons1 == "MANA"){
                        return $this->manaCheck($scene, 'effect1', 'response1');
                    }
                    if($scene->cons1 == "EXP"){
                        return $this->expCheck($scene, 'effect1', 'response1');
                    }
                    if($scene->cons1 == "ITEM"){
                        return $this->itemCheck($scene, 'effect1', 'response1');
                    }
                }
                else{
                    return $this->failedCheck($scene);
                }
            }
        }
        else if($scene->req1 == "DEX"){
            if($datas['totDEX'] >= $scene->min1){
                if($scene->cons1 == "CHEST"){
                    return $this->chestCheck($scene, 'response1');
                }
                if($scene->cons1 == "HEALTH"){
                    return $this->healthCheck($scene, 'effect1', 'response1');
                }
                if($scene->cons1 == "MANA"){
                    return $this->manaCheck($scene, 'effect1', 'response1');
                }
                if($scene->cons1 == "EXP"){
                    return $this->expCheck($scene, 'effect1', 'response1');
                }
                if($scene->cons1 == "ITEM"){
                    return $this->itemCheck($scene, 'effect1', 'response1');
                }
            }else{
                $probability = new ProbabilityController;
                $result = $probability->checkProbWithStats($datas['totDEX'], $scene->min1);

                if($result){
                    if($scene->cons1 == "CHEST"){
                        return $this->chestCheck($scene, 'response1');
                    }
                    if($scene->cons1 == "HEALTH"){
                        return $this->healthCheck($scene, 'effect1', 'response1');
                    }
                    if($scene->cons1 == "MANA"){
                        return $this->manaCheck($scene, 'effect1', 'response1');
                    }
                    if($scene->cons1 == "EXP"){
                        return $this->expCheck($scene, 'effect1', 'response1');
                    }
                    if($scene->cons1 == "ITEM"){
                        return $this->itemCheck($scene, 'effect1', 'response1');
                    }
                }
                else{
                    return $this->failedCheck($scene);
                }
            }
        }
        else if($scene->req1 == "INT"){
            if($datas['totINT'] >= $scene->min1){
                if($scene->cons1 == "CHEST"){
                    return $this->chestCheck($scene, 'response1');
                }
                if($scene->cons1 == "HEALTH"){
                    return $this->healthCheck($scene, 'effect1', 'response1');
                }
                if($scene->cons1 == "MANA"){
                    return $this->manaCheck($scene, 'effect1', 'response1');
                }
                if($scene->cons1 == "EXP"){
                    return $this->expCheck($scene, 'effect1', 'response1');
                }
                if($scene->cons1 == "ITEM"){
                    return $this->itemCheck($scene, 'effect1', 'response1');
                }
            }else{
                $probability = new ProbabilityController;
                $result = $probability->checkProbWithStats($datas['totINT'], $scene->min1);

                if($result){
                    if($scene->cons1 == "CHEST"){
                        return $this->chestCheck($scene, 'response1');
                    }
                    if($scene->cons1 == "HEALTH"){
                        return $this->healthCheck($scene, 'effect1', 'response1');
                    }
                    if($scene->cons1 == "MANA"){
                        return $this->manaCheck($scene, 'effect1', 'response1');
                    }
                    if($scene->cons1 == "EXP"){
                        return $this->expCheck($scene, 'effect1', 'response1');
                    }
                    if($scene->cons1 == "ITEM"){
                        return $this->itemCheck($scene, 'effect1', 'response1');
                    }
                }
                else{
                    return $this->failedCheck($scene);
                }
            }
        }
        else if($scene->req1 == "DEF"){
            if($datas['totDEF'] >= $scene->min1){
                if($scene->cons1 == "CHEST"){
                    return $this->chestCheck($scene, 'response1');
                }
                if($scene->cons1 == "HEALTH"){
                    return $this->healthCheck($scene, 'effect1', 'response1');
                }
                if($scene->cons1 == "MANA"){
                    return $this->manaCheck($scene, 'effect1', 'response1');
                }
                if($scene->cons1 == "EXP"){
                    return $this->expCheck($scene, 'effect1', 'response1');
                }
                if($scene->cons1 == "ITEM"){
                    return $this->itemCheck($scene, 'effect1', 'response1');
                }
            }else{
                $probability = new ProbabilityController;
                $result = $probability->checkProbWithStats($datas['totDEF'], $scene->min1);

                if($result){
                    if($scene->cons1 == "CHEST"){
                        return $this->chestCheck($scene, 'response1');
                    }
                    if($scene->cons1 == "HEALTH"){
                        return $this->healthCheck($scene, 'effect1', 'response1');
                    }
                    if($scene->cons1 == "MANA"){
                        return $this->manaCheck($scene, 'effect1', 'response1');
                    }
                    if($scene->cons1 == "EXP"){
                        return $this->expCheck($scene, 'effect1', 'response1');
                    }
                    if($scene->cons1 == "ITEM"){
                        return $this->itemCheck($scene, 'effect1', 'response1');
                    }
                }
                else{
                    return $this->failedCheck($scene);
                }
            }
        } 
        else if($scene->req1 == "CHAR"){
            if($datas['totCHAR'] >= $scene->min1){
                if($scene->cons1 == "CHEST"){
                    return $this->chestCheck($scene, 'response1');
                }
                if($scene->cons1 == "HEALTH"){
                    return $this->healthCheck($scene, 'effect1', 'response1');
                }
                if($scene->cons1 == "MANA"){
                    return $this->manaCheck($scene, 'effect1', 'response1');
                }
                if($scene->cons1 == "EXP"){
                    return $this->expCheck($scene, 'effect1', 'response1');
                }
                if($scene->cons1 == "ITEM"){
                    return $this->itemCheck($scene, 'effect1', 'response1');
                }
            }else{
                $probability = new ProbabilityController;
                $result = $probability->checkProbWithStats($datas['totCHAR'], $scene->min1);

                if($result){
                    if($scene->cons1 == "CHEST"){
                        return $this->chestCheck($scene, 'response1');
                    }
                    if($scene->cons1 == "HEALTH"){
                        return $this->healthCheck($scene, 'effect1', 'response1');
                    }
                    if($scene->cons1 == "MANA"){
                        return $this->manaCheck($scene, 'effect1', 'response1');
                    }
                    if($scene->cons1 == "EXP"){
                        return $this->expCheck($scene, 'effect1', 'response1');
                    }
                    if($scene->cons1 == "ITEM"){
                        return $this->itemCheck($scene, 'effect1', 'response1');
                    }
                }
                else{
                    return $this->failedCheck($scene);
                }
            }
        }
    }

    public function picked2(Request $request){
        $id = $request->id;
        $scene = Scenario::find($id);

        $user = auth()->user();

        $bruh = new StatsDataController;

        $datas = $bruh->statsCheck();

        if($scene->req2 == "LEVEL"){
            if($user->userChara->level >= $scene->min2){
                if($scene->cons2 == "CHEST"){
                    return $this->chestCheck($scene, 'response2');
                }
                if($scene->cons2 == "HEALTH"){
                    return $this->healthCheck($scene, 'effect2', 'response2');
                }
                if($scene->cons2 == "MANA"){
                    return $this->manaCheck($scene, 'effect2', 'response2');
                }
                if($scene->cons2 == "EXP"){
                    return $this->expCheck($scene, 'effect2', 'response2');
                }
                if($scene->cons2 == "ITEM"){
                    return $this->itemCheck($scene, 'effect2', 'response2');
                }
            }else{
                $probability = new ProbabilityController;
                $result = $probability->checkProbWithStats($user->level, $scene->min2);

                if($result){
                    if($scene->cons2 == "CHEST"){
                        return $this->chestCheck($scene, 'response2');
                    }
                    if($scene->cons2 == "HEALTH"){
                        return $this->healthCheck($scene, 'effect2', 'response2');
                    }
                    if($scene->cons2 == "MANA"){
                        return $this->manaCheck($scene, 'effect2', 'response2');
                    }
                    if($scene->cons2 == "EXP"){
                        return $this->expCheck($scene, 'effect2', 'response2');
                    }
                    if($scene->cons2 == "ITEM"){
                        return $this->itemCheck($scene, 'effect2', 'response2');
                    }
                }
                else{
                    return $this->failedCheck($scene);
                }
            }
        }
        else if($scene->req2 == "STR"){
            if($datas['totSTR'] >= $scene->min2){
                if($scene->cons2 == "CHEST"){
                    return $this->chestCheck($scene, 'response2');
                }
                if($scene->cons2 == "HEALTH"){
                    return $this->healthCheck($scene, 'effect2', 'response2');
                }
                if($scene->cons2 == "MANA"){
                    return $this->manaCheck($scene, 'effect2', 'response2');
                }
                if($scene->cons2 == "EXP"){
                    return $this->expCheck($scene, 'effect2', 'response2');
                }
                if($scene->cons2 == "ITEM"){
                    return $this->itemCheck($scene, 'effect2', 'response2');
                }
            }else{
                $probability = new ProbabilityController;
                $result = $probability->checkProbWithStats($datas['totSTR'], $scene->min2);

                if($result){
                    if($scene->cons2 == "CHEST"){
                        return $this->chestCheck($scene, 'response2');
                    }
                    if($scene->cons2 == "HEALTH"){
                        return $this->healthCheck($scene, 'effect2', 'response2');
                    }
                    if($scene->cons2 == "MANA"){
                        return $this->manaCheck($scene, 'effect2', 'response2');
                    }
                    if($scene->cons2 == "EXP"){
                        return $this->expCheck($scene, 'effect2', 'response2');
                    }
                    if($scene->cons2 == "ITEM"){
                        return $this->itemCheck($scene, 'effect2', 'response2');
                    }
                }
                else{
                    return $this->failedCheck($scene);
                }
            }
        }
        else if($scene->req2 == "DEX"){
            if($datas['totDEX'] >= $scene->min2){
                if($scene->cons2 == "CHEST"){
                    return $this->chestCheck($scene, 'response2');
                }
                if($scene->cons2 == "HEALTH"){
                    return $this->healthCheck($scene, 'effect2', 'response2');
                }
                if($scene->cons2 == "MANA"){
                    return $this->manaCheck($scene, 'effect2', 'response2');
                }
                if($scene->cons2 == "EXP"){
                    return $this->expCheck($scene, 'effect2', 'response2');
                }
                if($scene->cons2 == "ITEM"){
                    return $this->itemCheck($scene, 'effect2', 'response2');
                }
            }else{
                $probability = new ProbabilityController;
                $result = $probability->checkProbWithStats($datas['totDEX'], $scene->min2);

                if($result){
                    if($scene->cons2 == "CHEST"){
                        return $this->chestCheck($scene, 'response2');
                    }
                    if($scene->cons2 == "HEALTH"){
                        return $this->healthCheck($scene, 'effect2', 'response2');
                    }
                    if($scene->cons2 == "MANA"){
                        return $this->manaCheck($scene, 'effect2', 'response2');
                    }
                    if($scene->cons2 == "EXP"){
                        return $this->expCheck($scene, 'effect2', 'response2');
                    }
                    if($scene->cons2 == "ITEM"){
                        return $this->itemCheck($scene, 'effect2', 'response2');
                    }
                }
                else{
                    return $this->failedCheck($scene);
                }
            }
        }
        else if($scene->req2 == "INT"){
            if($datas['totINT'] >= $scene->min2){
                if($scene->cons2 == "CHEST"){
                    return $this->chestCheck($scene, 'response2');
                }
                if($scene->cons2 == "HEALTH"){
                    return $this->healthCheck($scene, 'effect2', 'response2');
                }
                if($scene->cons2 == "MANA"){
                    return $this->manaCheck($scene, 'effect2', 'response2');
                }
                if($scene->cons2 == "EXP"){
                    return $this->expCheck($scene, 'effect2', 'response2');
                }
                if($scene->cons2 == "ITEM"){
                    return $this->itemCheck($scene, 'effect2', 'response2');
                }
            }else{
                $probability = new ProbabilityController;
                $result = $probability->checkProbWithStats($datas['totINT'], $scene->min2);

                if($result){
                    if($scene->cons2 == "CHEST"){
                        return $this->chestCheck($scene, 'response2');
                    }
                    if($scene->cons2 == "HEALTH"){
                        return $this->healthCheck($scene, 'effect2', 'response2');
                    }
                    if($scene->cons2 == "MANA"){
                        return $this->manaCheck($scene, 'effect2', 'response2');
                    }
                    if($scene->cons2 == "EXP"){
                        return $this->expCheck($scene, 'effect2', 'response2');
                    }
                    if($scene->cons2 == "ITEM"){
                        return $this->itemCheck($scene, 'effect2', 'response2');
                    }
                }
                else{
                    return $this->failedCheck($scene);
                }
            }
        }
        else if($scene->req2 == "DEF"){
            if($datas['totDEF'] >= $scene->min2){
                if($scene->cons2 == "CHEST"){
                    return $this->chestCheck($scene, 'response2');
                }
                if($scene->cons2 == "HEALTH"){
                    return $this->healthCheck($scene, 'effect2', 'response2');
                }
                if($scene->cons2 == "MANA"){
                    return $this->manaCheck($scene, 'effect2', 'response2');
                }
                if($scene->cons2 == "EXP"){
                    return $this->expCheck($scene, 'effect2', 'response2');
                }
                if($scene->cons2 == "ITEM"){
                    return $this->itemCheck($scene, 'effect2', 'response2');
                }
            }else{
                $probability = new ProbabilityController;
                $result = $probability->checkProbWithStats($datas['totDEF'], $scene->min2);

                if($result){
                    if($scene->cons2 == "CHEST"){
                        return $this->chestCheck($scene, 'response2');
                    }
                    if($scene->cons2 == "HEALTH"){
                        return $this->healthCheck($scene, 'effect2', 'response2');
                    }
                    if($scene->cons2 == "MANA"){
                        return $this->manaCheck($scene, 'effect2', 'response2');
                    }
                    if($scene->cons2 == "EXP"){
                        return $this->expCheck($scene, 'effect2', 'response2');
                    }
                    if($scene->cons2 == "ITEM"){
                        return $this->itemCheck($scene, 'effect2', 'response2');
                    }
                }
                else{
                    return $this->failedCheck($scene);
                }
            }
        } 
        else if($scene->req2 == "CHAR"){
            if($datas['totCHAR'] >= $scene->min2){
                if($scene->cons2 == "CHEST"){
                    return $this->chestCheck($scene, 'response2');
                }
                if($scene->cons2 == "HEALTH"){
                    return $this->healthCheck($scene, 'effect2', 'response2');
                }
                if($scene->cons2 == "MANA"){
                    return $this->manaCheck($scene, 'effect2', 'response2');
                }
                if($scene->cons2 == "EXP"){
                    return $this->expCheck($scene, 'effect2', 'response2');
                }
                if($scene->cons2 == "ITEM"){
                    return $this->itemCheck($scene, 'effect2', 'response2');
                }
            }else{
                $probability = new ProbabilityController;
                $result = $probability->checkProbWithStats($datas['totCHAR'], $scene->min2);

                if($result){
                    if($scene->cons2 == "CHEST"){
                        return $this->chestCheck($scene, 'response2');
                    }
                    if($scene->cons2 == "HEALTH"){
                        return $this->healthCheck($scene, 'effect2', 'response2');
                    }
                    if($scene->cons2 == "MANA"){
                        return $this->manaCheck($scene, 'effect2', 'response2');
                    }
                    if($scene->cons2 == "EXP"){
                        return $this->expCheck($scene, 'effect2', 'response2');
                    }
                    if($scene->cons2 == "ITEM"){
                        return $this->itemCheck($scene, 'effect2', 'response2');
                    }
                }
                else{
                    return $this->failedCheck($scene);
                }
            }
        }
    }

    public function picked3(Request $request){
        $id = $request->id;
        $scene = Scenario::find($id);

        $user = auth()->user();
        $bruh = new StatsDataController;

        $datas = $bruh->statsCheck();

        if($scene->req3 == "LEVEL"){
            if($user->userChara->level >= $scene->min3){
                if($scene->cons3 == "CHEST"){
                    return $this->chestCheck($scene, 'response3');
                }
                if($scene->cons3 == "HEALTH"){
                    return $this->healthCheck($scene, 'effect3', 'response3');
                }
                if($scene->cons3 == "MANA"){
                    return $this->manaCheck($scene, 'effect3', 'response3');
                }
                if($scene->cons3 == "EXP"){
                    return $this->expCheck($scene, 'effect3', 'response3');
                }
                if($scene->cons3 == "ITEM"){
                    return $this->itemCheck($scene, 'effect3', 'response3');
                }
            }else{
                $probability = new ProbabilityController;
                $result = $probability->checkProbWithStats($user->level, $scene->min3);

                if($result){
                    if($scene->cons3 == "CHEST"){
                        return $this->chestCheck($scene, 'response3');
                    }
                    if($scene->cons3 == "HEALTH"){
                        return $this->healthCheck($scene, 'effect3', 'response3');
                    }
                    if($scene->cons3 == "MANA"){
                        return $this->manaCheck($scene, 'effect3', 'response3');
                    }
                    if($scene->cons3 == "EXP"){
                        return $this->expCheck($scene, 'effect3', 'response3');
                    }
                    if($scene->cons3 == "ITEM"){
                        return $this->itemCheck($scene, 'effect3', 'response3');
                    }
                }
                else{
                    return $this->failedCheck($scene);
                }
            }
        }
        else if($scene->req3 == "STR"){
            if($datas['totSTR'] >= $scene->min3){
                if($scene->cons3 == "CHEST"){
                    return $this->chestCheck($scene, 'response3');
                }
                if($scene->cons3 == "HEALTH"){
                    return $this->healthCheck($scene, 'effect3', 'response3');
                }
                if($scene->cons3 == "MANA"){
                    return $this->manaCheck($scene, 'effect3', 'response3');
                }
                if($scene->cons3 == "EXP"){
                    return $this->expCheck($scene, 'effect3', 'response3');
                }
                if($scene->cons3 == "ITEM"){
                    return $this->itemCheck($scene, 'effect3', 'response3');
                }
            }else{
                $probability = new ProbabilityController;
                $result = $probability->checkProbWithStats($datas['totSTR'], $scene->min3);

                if($result){
                    if($scene->cons3 == "CHEST"){
                        return $this->chestCheck($scene, 'response3');
                    }
                    if($scene->cons3 == "HEALTH"){
                        return $this->healthCheck($scene, 'effect3', 'response3');
                    }
                    if($scene->cons3 == "MANA"){
                        return $this->manaCheck($scene, 'effect3', 'response3');
                    }
                    if($scene->cons3 == "EXP"){
                        return $this->expCheck($scene, 'effect3', 'response3');
                    }
                    if($scene->cons3 == "ITEM"){
                        return $this->itemCheck($scene, 'effect3', 'response3');
                    }
                }
                else{
                    return $this->failedCheck($scene);
                }
            }
        }
        else if($scene->req3 == "DEX"){
            if($datas['totDEX'] >= $scene->min3){
                if($scene->cons3 == "CHEST"){
                    return $this->chestCheck($scene, 'response3');
                }
                if($scene->cons3 == "HEALTH"){
                    return $this->healthCheck($scene, 'effect3', 'response3');
                }
                if($scene->cons3 == "MANA"){
                    return $this->manaCheck($scene, 'effect3', 'response3');
                }
                if($scene->cons3 == "EXP"){
                    return $this->expCheck($scene, 'effect3', 'response3');
                }
                if($scene->cons3 == "ITEM"){
                    return $this->itemCheck($scene, 'effect3', 'response3');
                }
            }else{
                $probability = new ProbabilityController;
                $result = $probability->checkProbWithStats($datas['totDEX'], $scene->min3);

                if($result){
                    if($scene->cons3 == "CHEST"){
                        return $this->chestCheck($scene, 'response3');
                    }
                    if($scene->cons3 == "HEALTH"){
                        return $this->healthCheck($scene, 'effect3', 'response3');
                    }
                    if($scene->cons3 == "MANA"){
                        return $this->manaCheck($scene, 'effect3', 'response3');
                    }
                    if($scene->cons3 == "EXP"){
                        return $this->expCheck($scene, 'effect3', 'response3');
                    }
                    if($scene->cons3 == "ITEM"){
                        return $this->itemCheck($scene, 'effect3', 'response3');
                    }
                }
                else{
                    return $this->failedCheck($scene);
                }
            }
        }
        else if($scene->req3 == "INT"){
            if($datas['totINT'] >= $scene->min3){
                if($scene->cons3 == "CHEST"){
                    return $this->chestCheck($scene, 'response3');
                }
                if($scene->cons3 == "HEALTH"){
                    return $this->healthCheck($scene, 'effect3', 'response3');
                }
                if($scene->cons3 == "MANA"){
                    return $this->manaCheck($scene, 'effect3', 'response3');
                }
                if($scene->cons3 == "EXP"){
                    return $this->expCheck($scene, 'effect3', 'response3');
                }
                if($scene->cons3 == "ITEM"){
                    return $this->itemCheck($scene, 'effect3', 'response3');
                }
            }else{
                $probability = new ProbabilityController;
                $result = $probability->checkProbWithStats($datas['totINT'], $scene->min3);

                if($result){
                    if($scene->cons3 == "CHEST"){
                        return $this->chestCheck($scene, 'response3');
                    }
                    if($scene->cons3 == "HEALTH"){
                        return $this->healthCheck($scene, 'effect3', 'response3');
                    }
                    if($scene->cons3 == "MANA"){
                        return $this->manaCheck($scene, 'effect3', 'response3');
                    }
                    if($scene->cons3 == "EXP"){
                        return $this->expCheck($scene, 'effect3', 'response3');
                    }
                    if($scene->cons3 == "ITEM"){
                        return $this->itemCheck($scene, 'effect3', 'response3');
                    }
                }
                else{
                    return $this->failedCheck($scene);
                }
            }
        }
        else if($scene->req3 == "DEF"){
            if($datas['totDEF'] >= $scene->min3){
                if($scene->cons3 == "CHEST"){
                    return $this->chestCheck($scene, 'response3');
                }
                if($scene->cons3 == "HEALTH"){
                    return $this->healthCheck($scene, 'effect3', 'response3');
                }
                if($scene->cons3 == "MANA"){
                    return $this->manaCheck($scene, 'effect3', 'response3');
                }
                if($scene->cons3 == "EXP"){
                    return $this->expCheck($scene, 'effect3', 'response3');
                }
                if($scene->cons3 == "ITEM"){
                    return $this->itemCheck($scene, 'effect3', 'response3');
                }
            }else{
                $probability = new ProbabilityController;
                $result = $probability->checkProbWithStats($datas['totDEF'], $scene->min3);

                if($result){
                    if($scene->cons3 == "CHEST"){
                        return $this->chestCheck($scene, 'response3');
                    }
                    if($scene->cons3 == "HEALTH"){
                        return $this->healthCheck($scene, 'effect3', 'response3');
                    }
                    if($scene->cons3 == "MANA"){
                        return $this->manaCheck($scene, 'effect3', 'response3');
                    }
                    if($scene->cons3 == "EXP"){
                        return $this->expCheck($scene, 'effect3', 'response3');
                    }
                    if($scene->cons3 == "ITEM"){
                        return $this->itemCheck($scene, 'effect3', 'response3');
                    }
                }
                else{
                    return $this->failedCheck($scene);
                }
            }
        } 
        else if($scene->req3 == "CHAR"){
            if($datas['totCHAR'] >= $scene->min3){
                if($scene->cons3 == "CHEST"){
                    return $this->chestCheck($scene, 'response3');
                }
                if($scene->cons3 == "HEALTH"){
                    return $this->healthCheck($scene, 'effect3', 'response3');
                }
                if($scene->cons3 == "MANA"){
                    return $this->manaCheck($scene, 'effect3', 'response3');
                }
                if($scene->cons3 == "EXP"){
                    return $this->expCheck($scene, 'effect3', 'response3');
                }
                if($scene->cons3 == "ITEM"){
                    return $this->itemCheck($scene, 'effect3', 'response3');
                }
            }else{
                $probability = new ProbabilityController;
                $result = $probability->checkProbWithStats($datas['totCHAR'], $scene->min3);

                if($result){
                    if($scene->cons3 == "CHEST"){
                        return $this->chestCheck($scene, 'response3');
                    }
                    if($scene->cons3 == "HEALTH"){
                        return $this->healthCheck($scene, 'effect3', 'response3');
                    }
                    if($scene->cons3 == "MANA"){
                        return $this->manaCheck($scene, 'effect3', 'response3');
                    }
                    if($scene->cons3 == "EXP"){
                        return $this->expCheck($scene, 'effect3', 'response3');
                    }
                    if($scene->cons3 == "ITEM"){
                        return $this->itemCheck($scene, 'effect3', 'response3');
                    }
                }
                else{
                    return $this->failedCheck($scene);
                }
            }
        }
    }

    public function picked4(Request $request){
        $id = $request->id;
        $scene = Scenario::find($id);

        $user = auth()->user();

        $bruh = new StatsDataController;

        $datas = $bruh->statsCheck();

        if($scene->req4 == "LEVEL"){
            if($user->userChara->level >= $scene->min4){
                if($scene->cons4 == "CHEST"){
                    return $this->chestCheck($scene, 'response4');
                }
                if($scene->cons4 == "HEALTH"){
                    return $this->healthCheck($scene, 'effect4', 'response4');
                }
                if($scene->cons4 == "MANA"){
                    return $this->manaCheck($scene, 'effect4', 'response4');
                }
                if($scene->cons4 == "EXP"){
                    return $this->expCheck($scene, 'effect4', 'response4');
                }
                if($scene->cons4 == "ITEM"){
                    return $this->itemCheck($scene, 'effect4', 'response4');
                }
            }else{
                $probability = new ProbabilityController;
                $result = $probability->checkProbWithStats($user->level, $scene->min4);

                if($result){
                    if($scene->cons4 == "CHEST"){
                        return $this->chestCheck($scene, 'response4');
                    }
                    if($scene->cons4 == "HEALTH"){
                        return $this->healthCheck($scene, 'effect4', 'response4');
                    }
                    if($scene->cons4 == "MANA"){
                        return $this->manaCheck($scene, 'effect4', 'response4');
                    }
                    if($scene->cons4 == "EXP"){
                        return $this->expCheck($scene, 'effect4', 'response4');
                    }
                    if($scene->cons4 == "ITEM"){
                        return $this->itemCheck($scene, 'effect4', 'response4');
                    }
                }
                else{
                    return $this->failedCheck($scene);
                }
            }
        }
        else if($scene->req4 == "STR"){
            if($datas['totSTR'] >= $scene->min4){
                if($scene->cons4 == "CHEST"){
                    return $this->chestCheck($scene, 'response4');
                }
                if($scene->cons4 == "HEALTH"){
                    return $this->healthCheck($scene, 'effect4', 'response4');
                }
                if($scene->cons4 == "MANA"){
                    return $this->manaCheck($scene, 'effect4', 'response4');
                }
                if($scene->cons4 == "EXP"){
                    return $this->expCheck($scene, 'effect4', 'response4');
                }
                if($scene->cons4 == "ITEM"){
                    return $this->itemCheck($scene, 'effect4', 'response4');
                }
            }else{
                $probability = new ProbabilityController;
                $result = $probability->checkProbWithStats($datas['totSTR'], $scene->min4);

                if($result){
                    if($scene->cons4 == "CHEST"){
                        return $this->chestCheck($scene, 'response4');
                    }
                    if($scene->cons4 == "HEALTH"){
                        return $this->healthCheck($scene, 'effect4', 'response4');
                    }
                    if($scene->cons4 == "MANA"){
                        return $this->manaCheck($scene, 'effect4', 'response4');
                    }
                    if($scene->cons4 == "EXP"){
                        return $this->expCheck($scene, 'effect4', 'response4');
                    }
                    if($scene->cons4 == "ITEM"){
                        return $this->itemCheck($scene, 'effect4', 'response4');
                    }
                }
                else{
                    return $this->failedCheck($scene);
                }
            }
        }
        else if($scene->req4 == "DEX"){
            if($datas['totDEX'] >= $scene->min4){
                if($scene->cons4 == "CHEST"){
                    return $this->chestCheck($scene, 'response4');
                }
                if($scene->cons4 == "HEALTH"){
                    return $this->healthCheck($scene, 'effect4', 'response4');
                }
                if($scene->cons4 == "MANA"){
                    return $this->manaCheck($scene, 'effect4', 'response4');
                }
                if($scene->cons4 == "EXP"){
                    return $this->expCheck($scene, 'effect4', 'response4');
                }
                if($scene->cons4 == "ITEM"){
                    return $this->itemCheck($scene, 'effect4', 'response4');
                }
            }else{
                $probability = new ProbabilityController;
                $result = $probability->checkProbWithStats($datas['totDEX'], $scene->min4);

                if($result){
                    if($scene->cons4 == "CHEST"){
                        return $this->chestCheck($scene, 'response4');
                    }
                    if($scene->cons4 == "HEALTH"){
                        return $this->healthCheck($scene, 'effect4', 'response4');
                    }
                    if($scene->cons4 == "MANA"){
                        return $this->manaCheck($scene, 'effect4', 'response4');
                    }
                    if($scene->cons4 == "EXP"){
                        return $this->expCheck($scene, 'effect4', 'response4');
                    }
                    if($scene->cons4 == "ITEM"){
                        return $this->itemCheck($scene, 'effect4', 'response4');
                    }
                }
                else{
                    return $this->failedCheck($scene);
                }
            }
        }
        else if($scene->req4 == "INT"){
            if($datas['totINT'] >= $scene->min4){
                if($scene->cons4 == "CHEST"){
                    return $this->chestCheck($scene, 'response4');
                }
                if($scene->cons4 == "HEALTH"){
                    return $this->healthCheck($scene, 'effect4', 'response4');
                }
                if($scene->cons4 == "MANA"){
                    return $this->manaCheck($scene, 'effect4', 'response4');
                }
                if($scene->cons4 == "EXP"){
                    return $this->expCheck($scene, 'effect4', 'response4');
                }
                if($scene->cons4 == "ITEM"){
                    return $this->itemCheck($scene, 'effect4', 'response4');
                }
            }else{
                $probability = new ProbabilityController;
                $result = $probability->checkProbWithStats($datas['totINT'], $scene->min4);

                if($result){
                    if($scene->cons4 == "CHEST"){
                        return $this->chestCheck($scene, 'response4');
                    }
                    if($scene->cons4 == "HEALTH"){
                        return $this->healthCheck($scene, 'effect4', 'response4');
                    }
                    if($scene->cons4 == "MANA"){
                        return $this->manaCheck($scene, 'effect4', 'response4');
                    }
                    if($scene->cons4 == "EXP"){
                        return $this->expCheck($scene, 'effect4', 'response4');
                    }
                    if($scene->cons4 == "ITEM"){
                        return $this->itemCheck($scene, 'effect4', 'response4');
                    }
                }
                else{
                    return $this->failedCheck($scene);
                }
            }
        }
        else if($scene->req4 == "DEF"){
            if($datas['totDEF'] >= $scene->min4){
                if($scene->cons4 == "CHEST"){
                    return $this->chestCheck($scene, 'response4');
                }
                if($scene->cons4 == "HEALTH"){
                    return $this->healthCheck($scene, 'effect4', 'response4');
                }
                if($scene->cons4 == "MANA"){
                    return $this->manaCheck($scene, 'effect4', 'response4');
                }
                if($scene->cons4 == "EXP"){
                    return $this->expCheck($scene, 'effect4', 'response4');
                }
                if($scene->cons4 == "ITEM"){
                    return $this->itemCheck($scene, 'effect4', 'response4');
                }
            }else{
                $probability = new ProbabilityController;
                $result = $probability->checkProbWithStats($datas['totDEF'], $scene->min4);

                if($result){
                    if($scene->cons4 == "CHEST"){
                        return $this->chestCheck($scene, 'response4');
                    }
                    if($scene->cons4 == "HEALTH"){
                        return $this->healthCheck($scene, 'effect4', 'response4');
                    }
                    if($scene->cons4 == "MANA"){
                        return $this->manaCheck($scene, 'effect4', 'response4');
                    }
                    if($scene->cons4 == "EXP"){
                        return $this->expCheck($scene, 'effect4', 'response4');
                    }
                    if($scene->cons4 == "ITEM"){
                        return $this->itemCheck($scene, 'effect4', 'response4');
                    }
                }
                else{
                    return $this->failedCheck($scene);
                }
            }
        } 
        else if($scene->req4 == "CHAR"){
            if($datas['totCHAR'] >= $scene->min4){
                if($scene->cons4 == "CHEST"){
                    return $this->chestCheck($scene, 'response4');
                }
                if($scene->cons4 == "HEALTH"){
                    return $this->healthCheck($scene, 'effect4', 'response4');
                }
                if($scene->cons4 == "MANA"){
                    return $this->manaCheck($scene, 'effect4', 'response4');
                }
                if($scene->cons4 == "EXP"){
                    return $this->expCheck($scene, 'effect4', 'response4');
                }
                if($scene->cons4 == "ITEM"){
                    return $this->itemCheck($scene, 'effect4', 'response4');
                }
            }else{
                $probability = new ProbabilityController;
                $result = $probability->checkProbWithStats($datas['totCHAR'], $scene->min4);

                if($result){
                    if($scene->cons4 == "CHEST"){
                        return $this->chestCheck($scene, 'response4');
                    }
                    if($scene->cons4 == "HEALTH"){
                        return $this->healthCheck($scene, 'effect4', 'response4');
                    }
                    if($scene->cons4 == "MANA"){
                        return $this->manaCheck($scene, 'effect4', 'response4');
                    }
                    if($scene->cons4 == "EXP"){
                        return $this->expCheck($scene, 'effect4', 'response4');
                    }
                    if($scene->cons4 == "ITEM"){
                        return $this->itemCheck($scene, 'effect4', 'response4');
                    }
                }
                else{
                    return $this->failedCheck($scene);
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

            $img_data = [];

            foreach($charaInventoryData as $data){
                array_push($img_data, ['id' => $data->id, 'url' => $data->DataItem->media->first()->getUrl()]);
            }

        
            return response()->json([
                'success' => true,
                'type' => 'CHEST',
                'inventory_data' => $img_data,
                'response' => $scene->$response,
                'response_eff' => 'You Got '. $item->name .' <img src="'. $item->media->first()->getUrl() . '" >'
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
            return $this->failedCheck($scene, 'failed_eff', 'failed_text');
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

            $status = $userChara->update([
                'status' => 'DEATH'
            ]);

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
            'current_hp' => $userChara->current_health,
            'max_hp'=> $userChara->max_health,
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
            'current_mana' => $userChara->current_mana,
            'max_mana'=> $userChara->max_mana,
            'response' => $scene->$response,
            'response_eff' => 'Your Mana '. $scene->$eff
        ]);

    }

    public function expCheck($scene, $eff, $response){
        $userChara = auth()->user()->userChara;

        $sxps = $scene->$eff;

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
                'data' => $stats,
                'current_hp' => $userChara->current_hp,
                'current_mana' => $userChara->current_mana
            ]);
        }

        $update = $userChara->update([
            'exp_count' => $newExp
        ]);

        return response()->json([
            'success' => true,
            'type' => 'EXP',
            'response' => $scene->$response,
            'response_eff' => "You get $sxps Exp" 
        ]);
    }

    public function itemCheck($scene, $eff, $response){

        $check = DataItem::find($eff);

        if($check){
            $create = CharaInventory::create([
            'user_characters_id' => auth()->user()->userChara->id,
            'data_items_id' => $eff,
            ]);

        $charaInventoryData = auth()->user()->userChara->inventory;

        $img_data = [];

        foreach($charaInventoryData as $data){
            $img_data[$data->id] = $data->media->first()->getUrl();
        }

        return response()->json([
                'success' => true,
                'type' => 'ITEM',
                'inventory_data' => $img_data,
                'response' => $scene->$response,
                'response_eff' => 'You Got '. $check->name .' <img src="'. $check->media->first()->getUrl() . '" >'
            ]);
        }
    }
}