<?php

namespace App\Http\Controllers;

use App\Models\CharaClass;
use App\Models\DataItem;
use App\Models\Race;
use App\Models\Scenario;
use App\Models\StartScene;
use Illuminate\Http\Request;


class AdminViewController extends Controller
{

    public function viewIndex(){
        return view('admin.index');
    }

    public function viewRace(){
        $datas = Race::all(); 
        return view('admin.tables.raceTable', compact('datas'));
    }

    public function addRace(){
        return view('admin.forms.raceAdd');
    }

    public function trashedRace(){
        $datas = Race::latest();
        $datas = $datas->onlyTrashed();
        $datas = $datas->paginate('10000');
        return view('admin.trashed.raceTrashed', compact('datas'));
    }

    public function viewClass(){
        $datas = CharaClass::all();
        return view('admin.tables.classTable', compact('datas'));
    }

    public function addClass(){
        return view('admin.forms.classAdd');
    }

    public function trashedClass(){
        $datas = CharaClass::latest();
        $datas = $datas->onlyTrashed();
        $datas = $datas->paginate('10000');
        return view('admin.trashed.classTrashed', compact('datas'));
    }

    public function viewItem(){
        $datas = DataItem::all();
        return view('admin.tables.itemTable', compact('datas'));
    }

    public function addItem(){
        return view('admin.forms.itemAdd');
    }

    public function trashedItem(){
        $datas = DataItem::latest();
        $datas = $datas->onlyTrashed();
        $datas = $datas->paginate('10000');
        return view('admin.trashed.itemTrashed', compact('datas'));
    }

    public function editVItem($id){

        $data = DataItem::find($id);
        return view('admin.edits.itemEdit', compact('data'));
    }

    public function editVRace($id){

        $data = Race::find($id);
        return view('admin.edits.raceEdit', compact('data'));
    }

    public function editVClass($id){

        $data = CharaClass::find($id);
        return view('admin.edits.classEdit', compact('data'));
    }

    public function viewStartScene(){
        $datas = StartScene::all();
        return view('admin.tables.startScenesTable', compact('datas'));
    }

    public function addStartScene(){
        $races = Race::all();
        return view('admin.forms.startSceneAdd', compact('races'));
    }

    public function viewScene(){
        $datas = Scenario::all();
        return view('admin.tables.scenarioTable', compact('datas'));
    }

    public function addScene(){
        return view('admin.forms.scenariosAdd');
    }

    public function showScene($id){
        $data =  Scenario::findOrFail($id);

        $item1 = null;
        $item2 = null;
        $item3 = null;
        $item4 = null;
        $item5 = null;

        if($data->cons1 == 'ITEM'){
            $item1 = DataItem::findOrFail($data->effect1);
        }

        if($data->cons2 == 'ITEM'){
            $item2 = DataItem::findOrFail($data->effect2);
        }

        if($data->cons3 == 'ITEM'){
            $item3 = DataItem::findOrFail($data->effect3);
        }

        if($data->cons4 == 'ITEM'){
            $item4 = DataItem::findOrFail($data->effect4);
        }

        if($data->failed_cons == 'ITEM'){
            $item5 = DataItem::findOrFail($data->failed_eff);
        }

        return view('admin.details.scenarioDetail', compact(
            'data',
            'item1',
            'item2',
            'item3',
            'item4',
            'item5'
        ));
    }
}
