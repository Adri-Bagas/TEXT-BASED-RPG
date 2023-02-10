<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\ImageUploadingTrait;
use App\Models\CharaClass;
use App\Models\DataItem;
use App\Models\Race;
use App\Models\Scenario;
use App\Models\StartScene;
use Illuminate\Http\Request;

class AdminFuncController extends Controller
{

    use ImageUploadingTrait;

    public function createRace(Request $request){

        $validated = $request->validate([
            'name' => 'required',
            'str_boost' => 'required|numeric',
            'int_boost' => 'required|numeric',
            'dex_boost' => 'required|numeric',
            'def_boost' => 'required|numeric',
            'media' => 'required'
        ]);

        $model = Race::create([
            'name'=> $request->name,
            'str_boost'=> $request->str_boost,
            'int_boost'=> $request->int_boost,
            'dex_boost'=> $request->dex_boost,
            'def_boost'=> $request->def_boost
        ]);

        foreach ($request->input('media', []) as $file) {
            $model->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('media');
        }

        return redirect('/admin/dash/race');
    }

    public function destroyRace($id){
        $data = Race::find($id);

        $data->delete();

        return redirect()->back()->with('message', 'IT WORKS!');
    }

    public function createClass(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'health_boost' => 'required|numeric',
            'mana_boost' => 'required|numeric',
            'char_boost' => 'required|numeric',
            'media' => 'required'
        ]);

        $model =  CharaClass::create([
            'name' => $request->name,
            'health_boost' => $request->health_boost,
            'mana_boost' => $request->mana_boost,
            'char_boost' => $request->char_boost
        ]);

        foreach ($request->input('media', []) as $file) {
            $model->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('media');
        }

        return redirect('/admin/dash/class');

    }

    public function destroyClass($id){
        $data = CharaClass::find($id);

        $data->delete();

        return redirect()->back()->with('message', 'IT WORKS!');
    }

    public function createItem(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'str_boost' => 'required|numeric',
            'int_boost' => 'required|numeric',
            'dex_boost' => 'required|numeric',
            'def_boost' => 'required|numeric',
            'health_boost' => 'required|numeric',
            'mana_boost' => 'required|numeric',
            'char_boost' => 'required|numeric',
            'media' => 'required'
        ]);

        $model =  DataItem::create([
            'name' => $request->name,
            'type' => $request->type,
            'str_boost'=> $request->str_boost,
            'int_boost'=> $request->int_boost,
            'dex_boost'=> $request->dex_boost,
            'def_boost'=> $request->def_boost,
            'health_boost' => $request->health_boost,
            'mana_boost' => $request->mana_boost,
            'char_boost' => $request->char_boost
        ]);

        foreach ($request->input('media', []) as $file) {
            $model->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('media');
        }

        return redirect('/admin/dash/item');

    }

    public function destroyItem($id){
        $data = DataItem::find($id);

        $data->delete();

        return redirect()->back()->with('message', 'IT WORKS!');
    }

    public function editItem(Request $request, $id){

        $validated = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'str_boost' => 'required|numeric',
            'int_boost' => 'required|numeric',
            'dex_boost' => 'required|numeric',
            'def_boost' => 'required|numeric',
            'health_boost' => 'required|numeric',
            'mana_boost' => 'required|numeric',
            'char_boost' => 'required|numeric',
        ]);

        $model = DataItem::find($id);

        $model->update([
            'name' => $request->name,
            'type' => $request->type,
            'str_boost'=> $request->str_boost,
            'int_boost'=> $request->int_boost,
            'dex_boost'=> $request->dex_boost,
            'def_boost'=> $request->def_boost,
            'health_boost' => $request->health_boost,
            'mana_boost' => $request->mana_boost,
            'char_boost' => $request->char_boost
        ]);


        if ($request->input('media', []) != null) {        
    
            if (count($model->media) > 0) {
                foreach ($model->media as $media) {
                    if (!in_array($media->file_name, $request->input('media', []))) {
                        $media->delete();
                    }
                }
            }
    
            foreach ($request->input('media', []) as $file) {
                    $model->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('media');
            }
        }

        return redirect('/admin/dash/item');

    }

    public function editRace(Request $request, $id){

        $validated = $request->validate([
            'name' => 'required',
            'str_boost' => 'required|numeric',
            'int_boost' => 'required|numeric',
            'dex_boost' => 'required|numeric',
            'def_boost' => 'required|numeric',
        ]);

        $model = Race::find($id);

        $model->update([
            'name' => $request->name,
            'str_boost'=> $request->str_boost,
            'int_boost'=> $request->int_boost,
            'dex_boost'=> $request->dex_boost,
            'def_boost'=> $request->def_boost,
        ]);


        if ($request->input('media', []) != null) {        
    
            if (count($model->media) > 0) {
                foreach ($model->media as $media) {
                    if (!in_array($media->file_name, $request->input('media', []))) {
                        $media->delete();
                    }
                }
            }
    
            foreach ($request->input('media', []) as $file) {
                    $model->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('media');
            }
        }

        return redirect('/admin/dash/race');

    }

    public function editClass(Request $request, $id){

        $validated = $request->validate([
            'name' => 'required',
            'health_boost' => 'required|numeric',
            'mana_boost' => 'required|numeric',
            'char_boost' => 'required|numeric',
        ]);

        $model = CharaClass::find($id);

        $model->update([
            'name' => $request->name,
            'health_boost' => $request->health_boost,
            'mana_boost' => $request->mana_boost,
            'char_boost' => $request->char_boost
        ]);


        if ($request->input('media', []) != null) {        
    
            if (count($model->media) > 0) {
                foreach ($model->media as $media) {
                    if (!in_array($media->file_name, $request->input('media', []))) {
                        $media->delete();
                    }
                }
            }
    
            foreach ($request->input('media', []) as $file) {
                    $model->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('media');
            }
        }

        return redirect('/admin/dash/class');

    }

    public function createStartScene(Request $request){
        $validated = $request->validate([
            'races_id' => 'required',
            'story_text' => 'required',
            'choice' => 'required',
        ]);

        $model = StartScene::create([
            'races_id'=> $request->races_id,
            'story_text'=> $request->story_text,
            'choice'=> $request->choice
        ]);

        return redirect('admin/dash/start-scene');
    }

    public function getItemData(){
        $datas = DataItem::all();

        if($datas){
            return response()->json([
                'massage' => 'success',
                'data' => $datas
            ], 200);
        }

        return response()->json([
            'massage' => 'error Data tidak ada'
        ], 404);

    }


    public function storeScene(Request $request){
        
        // VALIDATION
        $validated = $request->validate([
            'rarity' => 'required',
            'story_text' => 'required',
            'choice1' => 'required',
            'response1' => 'required',
            'cons1' => 'required'
        ]);

        $rarity = $request->rarity;
        $story_text = $request->story_text;
        $choice1 = $request->choice1;
        $response1 = $request->response1;
        $cons1 = $request->cons1;
        $effect1 = $request->effect1;
        $min1 = $request->min1;
        $req1 = $request->req1;

        $choice2 = $request->choice2;
        $response2 = $request->response2;
        $cons2 = $request->cons2;
        $effect2 = $request->effect2;
        $min2 = $request->min2;
        $req2 = $request->req2;

        $choice3 = $request->choice3;
        $response3 = $request->response3;
        $cons3 = $request->cons3;
        $effect3 = $request->effect3;
        $min3 = $request->min3;
        $req3 = $request->req3;

        $choice4 = $request->choice4;
        $response4 = $request->response4;
        $cons4 = $request->cons4;
        $effect4 = $request->effect4;
        $min4 = $request->min4;
        $req4 = $request->req4;

        if($request->choice2 == null || $request->response2 == null || $request->cons2 == null ){
            $choice2 = null;
            $response2 = null;
            $cons2 = null;
            $effect2 = null;
            $min2 = null;
            $req2 = null;
        }

        if($request->choice3 == null || $request->response3 == null || $request->cons3 == null ){
            $choice3 = null;
            $response3 = null;
            $cons3 = null;
            $effect3 = null;
            $min3 = null;
            $req3 = null;
        }

        if($request->choice4 == null || $request->response4 == null || $request->cons4 == null ){
            $choice4 = null;
            $response4 = null;
            $cons4 = null;
            $effect4 = null;
            $min4 = null;
            $req4 = null;
        }

        Scenario::create([
            'rarity' => $rarity,
            'story_text' => $story_text,
            'choice1' => $choice1,
            'response1' => $response1,
            'cons1' => $cons1,
            'effect1' => $effect1,
            'choice2' => $choice2,
            'response2' => $response2,
            'cons2' => $cons2,
            'effect2' => $effect2,
            'choice3' => $choice3,
            'response3' => $response3,
            'cons3' => $cons3,
            'effect3' => $effect3,
            'choice4' => $choice4,
            'response4' => $response4,
            'cons4' => $cons4,
            'effect4' => $effect4,
            'req1' => $req1,
            'req2' => $req2,
            'req3' => $req3,
            'req4' => $req4,
            'min1' => $min1,
            'min2' => $min2,
            'min3' => $min3,
            'min4' => $min4,
            'failed_text' => $request->failed_text,
            'failed_cons' => $request->failed_cons,
            'failed_eff' => $request->failed_eff
        ]);

        return redirect('/admin/dash/scenarios');
    }

}
