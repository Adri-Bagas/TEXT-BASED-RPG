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
                }else if($equipment->accessories2 == null){
                    $equipment->update([
                        'accessories2' => $id
                    ]);

                    $invento->update([
                        'status' => 'EQUIPPED'
                    ]);
                }
            break;
        }

        return response()->json([
            'success' => true,
            'messages' => 'Item Equiped!'
        ]);
    }
}
