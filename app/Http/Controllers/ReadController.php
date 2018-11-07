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

    public function readingReport() {
        $sensors = $this->sensorModel
            ->where('sensors.in_use','<>',0)
            ->get();

        $equipaments = $this->equipmentModel
            ->where('equipaments.in_use','<>',0)
            ->get();

        $reads = [];
        return view('read.reader', compact('sensors', 'equipaments', 'reads'));
    }

    public function reading(Request $request) {
        $sensors = $this->sensorModel
            ->where('sensors.in_use','<>',0)
            ->get();

        $equipaments = $this->equipmentModel
            ->where('equipaments.in_use','<>',0)
            ->get();

        $reads =  $this->readModel
        ->join('sensors', 'sensors.id', '=', 'reads.sensor_id')
        ->join('equipaments', 'equipaments.id', '=', 'reads.equipament_id')
        ->where(function ($query) use ($request)
        {
            if (isset($request->dataInicio) && isset($request->dataFim))
            $query->whereBetween('created_at', [$request->dataInicio, $request->dataFim]);
            else if (isset($request->dataInicio) || isset($request->dataFim)) {
                if (isset($request->dataInicio))
                $query->where('created_at', '>', $request->dataInicio);

                if (isset($request->dataFim))
                $query->where('created_at)', '<', $request->dataFim);
            }

            if (isset($request->equipament_id))
            $query->where('reads.equipament_id', '=', $request->equipament_id);

            if (isset($request->sensor_id))
            $query->where('sensor_id', '=', $request->sensor_id);

        })->get();

        return view('read.reader', compact('sensors', 'equipaments', 'reads'));
    }
}
