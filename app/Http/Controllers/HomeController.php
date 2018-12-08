<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipament;
use App\Sensor;
use App\Read;
use App\User;
use App\UserSensor;
use Auth;

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
    private $userSensorModel;

    public function __construct(Equipament $equipament, Sensor $sensor, Read $read, User $user, UserSensor $userSensorModel){
        $this->middleware('auth');

        $this->equipmentModel = $equipament;
        $this->sensorModel = $sensor;
        $this->readModel = $read;
        $this->userModel = $user;
        $this->userSensorModel = $userSensorModel;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(Auth::user()->type == 1){
            $equipments = $this->equipmentModel::count();
            $sensors = $this->sensorModel::count();
            $reads = $this->readModel::count();
            $users = $this->userModel::count();
            return view('home', compact('equipments', 'sensors', 'reads', 'users'));
        }else{
            $userSensors = $this->userSensorModel
                ->where('user_id','=',Auth::user()->id)
                ->get();
                return view('home', compact('userSensors'));
        }

        
    }
}
