<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $stats = new StatsDataController;

        $data = $stats->statsAndItemCheck();

        extract($data);

        return view('home', compact(
            'user',
            'userChara',
            'userRace',
            'userInventory',
            'Head',
            'Body',
            'Weapon',
            'Accessories1',
            'Accessories2',
            'Foot',
            'totSTR',
            'totDEF',
            'totINT',
            'totDEX',
            'totChar',
            'totHP',
            'totMana'
        ));
    }
}
