<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipament;
use App\Sensor;
use App\Read;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

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
        ///dd($request->all());
        $equipaments = $this->equipmentModel
        ->where('equipaments.in_use','<>',0)
        ->get();

        if(isset($request->sensors)) {
            $dataInit = "'".$request->dataInit . " 00:00:00'";
            $dataFin = "'".$request->dataFin . " 23:59:59'";

            $sensors = '';
            foreach($request->sensors as $sensor){
                $sensors .= (string)$sensor.',';
            }
            $sensors = substr($sensors, 0, -1);

            $reads =  DB::select('select sensors.id as sensor_id, sensors.name as sensor, equipaments.name as equipament, reads.value as value, reads.created_at
            from reads
            LEFT JOIN sensors ON sensors.id = reads.sensor_id
            LEFT JOIN equipaments ON equipaments.id = reads.equipament_id
            where equipaments.id = '.$request->equipament.' and
            reads.created_at >= '.$dataInit.' and
            reads.created_at <= '.$dataFin.' and
            sensors.id IN ('.$sensors.')');

            /*
            $reads =  $this->readModel
                ->select('sensors.name as sensor', 'equipaments.name as equipament', 'reads.value as value', 'reads.created_at as created_at')
                ->leftjoin('sensors', 'sensors.id', '=', 'reads.sensor_id')
                ->leftjoin('equipaments', 'equipaments.id', '=', 'reads.equipament_id')
                ->where('equipaments.id', '=', $request->equipament)
                ->where('reads.created_at', '>=', $dataInit)
                ->where('reads.created_at', '<=', $dataFin)
                ->where('equipaments.in_use','<>',0)
                ->whereIn('sensors.id',[$sensors])
                ->get();
            */

            $chart =    "['Dia',        'S1',    'S2',   'S3'],".
                "['Segunda',     20,      80,    45],".
                "['Terca',       30,      30,    65],".
                "['Quarta',      40,      60,    35],".
                "['Quinta',      60,      45,    65],".
                "['sexta',       60,      25,    45],".
                "['Sabado',      70,      32,    32],".
                "['Domingo',     45,      29,    50]";

            return view('read.reader', compact('equipaments', 'reads', 'request', 'chart'));
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

    public function readingPDF() {
        return \PDF::loadView('pdf.reading')
        ->download('relatorio/2018.pdf');
        // ->stream();
    }
}
