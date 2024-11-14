<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatsDataController extends Controller
{
    public function statsAndItemCheck(){
        $user = auth()->user();

        $userChara = $user->userChara;
        $userRace = $user->userChara->races;
        $userClass = $user->userChara->charaClass;
        $userEquipment = $user->userChara->equipment;
        $userInventory = $user->userChara->inventory;

        $Head = $userEquipment->Head;
        $Body = $userEquipment->Body;
        $Weapon = $userEquipment->Weapon;
        $Accessories1 = $userEquipment->Accessories1;
        $Accessories2 = $userEquipment->Accessories2;
        $Foot = $userEquipment->Foot;

        $totSTR = $userChara->strength + $userRace->str_boost;
        $totDEF = $userChara->defense + $userRace->def_boost;
        $totINT = $userChara->intelligence + $userRace->int_boost;
        $totDEX = $userChara->dexterity + $userRace->dex_boost;
        $totChar = $userChara->charisma + $userClass->char_boost;
        $totHP = $userChara->max_health + $userClass->health_boost;
        $totMana = $userChara->max_mana + $userClass->mana_boost;


        if($Head != null){
            $totSTR += $Head->DataItem->str_boost;
            $totDEF += $Head->DataItem->def_boost;
            $totINT += $Head->DataItem->int_boost;
            $totDEX += $Head->DataItem->dex_boost;
            $totChar += $Head->DataItem->char_boost;
            $totHP += $Head->DataItem->health_boost;
            $totMana += $Head->DataItem->mana_boost;
        }

        if($Body != null){
            $totSTR += $Body->DataItem->str_boost;
            $totDEF += $Body->DataItem->def_boost;
            $totINT += $Body->DataItem->int_boost;
            $totDEX += $Body->DataItem->dex_boost;
            $totChar += $Body->DataItem->char_boost;
            $totHP += $Body->DataItem->health_boost;
            $totMana += $Body->DataItem->mana_boost;
        }

        if($Weapon != null){
            $totSTR += $Weapon->DataItem->str_boost;
            $totDEF += $Weapon->DataItem->def_boost;
            $totINT += $Weapon->DataItem->int_boost;
            $totDEX += $Weapon->DataItem->dex_boost;
            $totChar += $Weapon->DataItem->char_boost;
            $totHP += $Weapon->DataItem->health_boost;
            $totMana += $Weapon->DataItem->mana_boost;
        }

        if($Accessories1 != null){
            $totSTR += $Accessories1->DataItem->str_boost;
            $totDEF += $Accessories1->DataItem->def_boost;
            $totINT += $Accessories1->DataItem->int_boost;
            $totDEX += $Accessories1->DataItem->dex_boost;
            $totChar += $Accessories1->DataItem->char_boost;
            $totHP += $Accessories1->DataItem->health_boost;
            $totMana += $Accessories1->DataItem->mana_boost;
        }

        if($Accessories2 != null){
            $totSTR += $Accessories2->DataItem->str_boost;
            $totDEF += $Accessories2->DataItem->def_boost;
            $totINT += $Accessories2->DataItem->int_boost;
            $totDEX += $Accessories2->DataItem->dex_boost;
            $totChar += $Accessories2->DataItem->char_boost;
            $totHP += $Accessories2->DataItem->health_boost;
            $totMana += $Accessories2->DataItem->mana_boost;
        }

        if($Foot != null){
            $totSTR += $Foot->DataItem->str_boost;
            $totDEF += $Foot->DataItem->def_boost;
            $totINT += $Foot->DataItem->int_boost;
            $totDEX += $Foot->DataItem->dex_boost;
            $totChar += $Foot->DataItem->char_boost;
            $totHP += $Foot->DataItem->health_boost;
            $totMana += $Foot->DataItem->mana_boost;
        }

        return array(
            'user' => $user,
            'userChara' => $userChara,
            'userRace' => $userRace,
            'userInventory' => $userInventory,
            'Head' => $Head,
            'Body' => $Body,
            'Weapon' => $Weapon,
            'Accessories1' => $Accessories1,
            'Accessories2' => $Accessories2,
            'Foot' => $Foot,
            'totSTR' => $totSTR,
            'totDEF' => $totDEF,
            'totINT' => $totINT,
            'totDEX' => $totDEX,
            'totChar' => $totChar,
            'totHP' => $totHP,
            'totMana' => $totMana
        );

        
    }

    public function statsCheck(){
        $user = auth()->user();

        $userChara = $user->userChara;
        $userRace = $user->userChara->races;
        $userClass = $user->userChara->charaClass;
        $userEquipment = $user->userChara->equipment;

        $Head = $userEquipment->Head;
        $Body = $userEquipment->Body;
        $Weapon = $userEquipment->Weapon;
        $Accessories1 = $userEquipment->Accessories1;
        $Accessories2 = $userEquipment->Accessories2;
        $Foot = $userEquipment->Foot;

        $totSTR = $userChara->strength + $userRace->str_boost;
        $totDEF = $userChara->defense + $userRace->def_boost;
        $totINT = $userChara->intelligence + $userRace->int_boost;
        $totDEX = $userChara->dexterity + $userRace->dex_boost;
        $totChar = $userChara->charisma + $userClass->char_boost;
        $totHP = $userChara->max_health + $userClass->health_boost;
        $totMana = $userChara->max_mana + $userClass->mana_boost;


        if($Head != null){
            $totSTR += $Head->DataItem->str_boost;
            $totDEF += $Head->DataItem->def_boost;
            $totINT += $Head->DataItem->int_boost;
            $totDEX += $Head->DataItem->dex_boost;
            $totChar += $Head->DataItem->char_boost;
            $totHP += $Head->DataItem->health_boost;
            $totMana += $Head->DataItem->mana_boost;
        }

        if($Body != null){
            $totSTR += $Body->DataItem->str_boost;
            $totDEF += $Body->DataItem->def_boost;
            $totINT += $Body->DataItem->int_boost;
            $totDEX += $Body->DataItem->dex_boost;
            $totChar += $Body->DataItem->char_boost;
            $totHP += $Body->DataItem->health_boost;
            $totMana += $Body->DataItem->mana_boost;
        }

        if($Weapon != null){
            $totSTR += $Weapon->DataItem->str_boost;
            $totDEF += $Weapon->DataItem->def_boost;
            $totINT += $Weapon->DataItem->int_boost;
            $totDEX += $Weapon->DataItem->dex_boost;
            $totChar += $Weapon->DataItem->char_boost;
            $totHP += $Weapon->DataItem->health_boost;
            $totMana += $Weapon->DataItem->mana_boost;
        }

        if($Accessories1 != null){
            $totSTR += $Accessories1->DataItem->str_boost;
            $totDEF += $Accessories1->DataItem->def_boost;
            $totINT += $Accessories1->DataItem->int_boost;
            $totDEX += $Accessories1->DataItem->dex_boost;
            $totChar += $Accessories1->DataItem->char_boost;
            $totHP += $Accessories1->DataItem->health_boost;
            $totMana += $Accessories1->DataItem->mana_boost;
        }

        if($Accessories2 != null){
            $totSTR += $Accessories2->DataItem->str_boost;
            $totDEF += $Accessories2->DataItem->def_boost;
            $totINT += $Accessories2->DataItem->int_boost;
            $totDEX += $Accessories2->DataItem->dex_boost;
            $totChar += $Accessories2->DataItem->char_boost;
            $totHP += $Accessories2->DataItem->health_boost;
            $totMana += $Accessories2->DataItem->mana_boost;
        }

        if($Foot != null){
            $totSTR += $Foot->DataItem->str_boost;
            $totDEF += $Foot->DataItem->def_boost;
            $totINT += $Foot->DataItem->int_boost;
            $totDEX += $Foot->DataItem->dex_boost;
            $totChar += $Foot->DataItem->char_boost;
            $totHP += $Foot->DataItem->health_boost;
            $totMana += $Foot->DataItem->mana_boost;
        }

        return array(
            'user' => $user,
            'userChara' => $userChara,
            'userRace' => $userRace,
            'Head' => $Head,
            'Body' => $Body,
            'Weapon' => $Weapon,
            'Accessories1' => $Accessories1,
            'Accessories2' => $Accessories2,
            'Foot' => $Foot,
            'totSTR' => $totSTR,
            'totDEF' => $totDEF,
            'totINT' => $totINT,
            'totDEX' => $totDEX,
            'totCHAR' => $totChar,
            'totHP' => $totHP,
            'totMana' => $totMana
        );
    }
}
