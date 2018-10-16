<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipament;
use App\Sensor;
use App\Read;

class ReadController extends Controller
{
    private $equipmentModel;
    private $sensorModel;
    private $readModel;

    public function __construct(Equipament $equipament, Sensor $sensor, Read $read){
        $this->equipmentModel = $equipament;
        $this->sensorModel = $sensor;
        $this->readModel = $read;
    }

    public function read(Request $request){        
        $data = $request->all();
        $total = count($data);

        foreach($data as $key => $value){
            
            /// Equipament
            if($key == 'e'){
                $idEquip = $data['e'];
                $equip = $this->equipmentModel->find($idEquip);                
            }

            //// Sensor
            if($key != 'e'){
                $idSensor = $key;                                
                $sensor = $this->sensorModel
                    ->where('id','=',$idSensor)
                    ->where('equipament_id','=',$idEquip)
                    ->get();
                
                $sensor = json_decode($sensor);

                if(!empty($sensor)){
                    $read['equipament_id'] = $idEquip;
                    $read['sensor_id'] = $idSensor;
                    $read['value'] = $value;

                    //// Read
                    $this->readModel->create($read);
                }
                                
            }
        }

        return 'Hello, Request is succefull!';
    }
}
