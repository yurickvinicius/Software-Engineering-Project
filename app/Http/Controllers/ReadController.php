<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipament;
use App\Sensor;
use App\Read;
use Illuminate\Support\Facades\DB;

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

    public function listSensors(Request $request){
        $sensors = $this->sensorModel
        ->where('in_use','<>','0')
        ->where('equipament_id','=',$request->id)
        ->orderBy('id', 'desc')
        ->get();

        return json_encode($sensors);
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
        $equipaments = $this->equipmentModel
        ->where('equipaments.in_use','<>',0)
        ->get();

        return view('read.reader', compact('equipaments'));
    }

    public function reading(Request $request) {
        // dd($request->all());
        $equipaments = $this->equipmentModel
        ->where('equipaments.in_use','<>',0)
        ->get();
        
        if(isset($request->sensors)) {
            $request->sensors = array_values($request->sensors);
            // dd($request->sensors); //// Array que contem os sensores no formato key=>id

            $dataInit = $request->dataInit . " 00:00:00";
            $dataFin = $request->dataFin . " 23:59:59";

            $reads =  $this->readModel
            ->select('sensors.name as sensor', 'equipaments.name as equipament', 'reads.value as value', 'reads.created_at as created_at')
            ->leftjoin('sensors', 'sensors.id', '=', 'reads.sensor_id')
            ->leftjoin('equipaments', 'equipaments.id', '=', 'reads.equipament_id')
            ->where('equipaments.id', '=', $request->equipament)
            ->where('reads.created_at', '>=', $dataInit)
            ->where('reads.created_at', '<=', $dataFin)
            ->where('equipaments.in_use','<>',0)
            // ->where('sensors.id', '=', $request->sensors[])
            ->orderBy('sensors.name')
            ->get();

            return view('read.reader', compact('equipaments', 'reads', 'request'));
        } else {
            return view('read.reader', compact('equipaments', 'request'));
        }
    }

    public function sensorAverage(){
        ///$averageAll = DB::select('select avg(id), avg(sensor_id), count(*) from reads');
        ///$sql = 'select sensor_id, count(*) as total, round(avg(id)) as media_total, round(avg(sensor_id)) as media_sensores from reads where created_at >= CURRENT_DATE group by sensor_id';
        
        $averageAll = DB::select('select sensor_id, count(*) as total from reads group by sensor_id');
      
        return json_encode($averageAll);
    }
}
