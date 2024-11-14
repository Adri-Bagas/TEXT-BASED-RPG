<?php

namespace App\Http\Controllers;

use App\Models\CharaEquipment;
use App\Models\CharaInventory;
use Illuminate\Http\Request;

class CharaEquipmentController extends Controller
{
    public function equipItem(Request $request){

        $id = $request->id;
        $invento = CharaInventory::find($id);
        $equipment = auth()->user()->userChara->equipment;
        $acc = false;

        $itemData = $invento->DataItem;

        switch ($itemData->type){
            case "weapon":
                if($equipment->weapon == null){
                    $equipment->update([
                        'weapon' => $id
                    ]);

                    $invento->update([
                        'status' => 'EQUIPPED'
                    ]);
                }
            break;
            case "head":
                if($equipment->head == null){
                    $equipment->update([
                        'head' => $id
                    ]);

                    $invento->update([
                        'status' => 'EQUIPPED'
                    ]);
                }
            break;
            case "foot":
                if($equipment->foot == null){
                    $equipment->update([
                        'foot' => $id
                    ]);

                    $invento->update([
                        'status' => 'EQUIPPED'
                    ]);
                }
            break;
            case "body":
                if($equipment->body == null){
                    $equipment->update([
                        'body' => $id
                    ]);

                    $invento->update([
                        'status' => 'EQUIPPED'
                    ]);
                }
            break;
            case "accessories":
                if($equipment->accessories1 == null ){
                    $equipment->update([
                        'accessories1' => $id
                    ]);

                    $invento->update([
                        'status' => 'EQUIPPED'
                    ]);

                    $acc = false;
                }else if($equipment->accessories2 == null){
                    $equipment->update([
                        'accessories2' => $id
                    ]);

                    $invento->update([
                        'status' => 'EQUIPPED'
                    ]);

                    $acc = true;
                }
            break;
        }

        $stats = new StatsDataController;

        $statsCheck = $stats->statsCheck();

        return response()->json([
            'success' => true,
            'messages' => 'Item Equiped!',
            'current_hp' => auth()->user()->userChara->current_health,
            'current_mana' => auth()->user()->userChara->current_mana,
            'data' => $statsCheck,
            'itemData' => $itemData,
            'itemPic' => $itemData->media->first()->getUrl(),
            'inventoId' => $id,
            'acc2' => $acc
        ]);
    }

    public function unEquip(Request $request){
        $id = $request->id;
        $invento = CharaInventory::find($id);
        $equipment = auth()->user()->userChara->equipment;
        $acc = false;

        $itemData = $invento->DataItem;

        switch ($itemData->type){
            case "weapon":
                $equipment->update([
                    'weapon' => null
                ]);

                $invento->update([
                    'status' => 'NOT EQUIPPED'
                ]);
                
            break;
            case "head":
                    $equipment->update([
                        'head' => null
                    ]);

                    $invento->update([
                        'status' => 'NOT EQUIPPED'
                    ]);
            break;
            case "foot":
                    $equipment->update([
                        'foot' => null
                    ]);

                    $invento->update([
                        'status' => 'NOT EQUIPPED'
                    ]);
            break;
            case "body":
                    $equipment->update([
                        'body' => null
                    ]);

                    $invento->update([
                        'status' => 'NOT EQUIPPED'
                    ]);
            break;
            case "accessories":
                if($equipment->accessories1 == $id){
                    $equipment->update([
                        'accessories1' => null
                    ]);

                    $invento->update([
                        'status' => 'NOT EQUIPPED'
                    ]);

                    $acc = false;
                }else if($equipment->accessories2 == $id){
                    $equipment->update([
                        'accessories2' => null
                    ]);

                    $invento->update([
                        'status' => 'NOT EQUIPPED'
                    ]);

                    $acc = true;
                }
            break;
        }

        $stats = new StatsDataController;

        $statsCheck = $stats->statsCheck();

        return response()->json([
            'success' => true,
            'messages' => 'Item Unequipped!',
            'current_hp' => auth()->user()->userChara->current_health,
            'current_mana' => auth()->user()->userChara->current_mana,
            'data' => $statsCheck,
            'inventoId' => $id,
            'type' => $itemData->type,
            'acc2' => $acc
        ]);
    }

    public function backButton(){
        $userChara = auth()->user()->userChara;

        return response()->json([
            'success' => true,
            'userName' => auth()->user()->name,
            'userCharaRace' => $userChara->races,
            'userCharaRaceImg' => $userChara->races->media->first()->getUrl()
        ]);
    }
}
