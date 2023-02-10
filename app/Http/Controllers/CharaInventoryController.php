<?php

namespace App\Http\Controllers;

use App\Models\CharaInventory;
use Illuminate\Http\Request;

class CharaInventoryController extends Controller
{
    public function getItem(Request $request){
        $model = CharaInventory::find($request->id);

        if($model){
            $itemData = $model->DataItem;

            return response()->json([
                'pesan' => 'Ini data nya',
                'item' => $itemData,
                'img' => $itemData->media->first()->getUrl(),
                'inventory' => $model
            ], 200);
        }

        return response()->json([
            'pesan' => 'tidak ada',
        ], 404);
    }
}
