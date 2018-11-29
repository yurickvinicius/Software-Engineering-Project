<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipament;
use App\Sensor;
use App\Read;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    private $equipmentModel;
    private $sensorModel;
    private $readModel;
    private $userModel;

    public function __construct(Equipament $equipament, Sensor $sensor, Read $read, User $user){
        $this->middleware('auth');

        $this->equipmentModel = $equipament;
        $this->sensorModel = $sensor;
        $this->readModel = $read;
        $this->userModel = $user;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipments = $this->equipmentModel::count();
        $sensors = $this->sensorModel::count();
        $reads = $this->readModel::count();
        $users = $this->userModel::count();

        return view('home', compact('equipments', 'sensors', 'reads', 'users'));
    }
}
