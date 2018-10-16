<?php

namespace App\Http\Controllers;

use App\Equipament;
use App\Sensor;
use Illuminate\Http\Request;

class SensorController extends Controller
{

    private $equipamentModel;
    private $sensorModel;

    public function __construct(Equipament $equipament, Sensor $sensor){
        $this->equipamentModel = $equipament;
        $this->sensorModel = $sensor;
    }

    public function createSensor() {
        $equipaments = $this->equipamentModel->where('in_use','<>',0)->get();
        return view('sensor.create', compact('equipaments'));
    }

    public function storeSensor(Request $request){
        $this->sensorModel->create($request->all());

        return redirect()
            ->route('listingSensors')
            ->with('sucess', 'Sensor created with successfully!');
    }

    public function listingSensors() {
        $sensors = $this->sensorModel
            ->where('in_use','<>',0)
            ->paginate(10);
            
        return view('sensor.list', compact('sensors'));
    }

    public function destroySensor(Request $request, $id){
        $this->sensorModel->find($id)
            ->update(
                [
                    'in_use' => 0,
                ]
            );

        return redirect()
            ->route('listingSensors')
            ->with('sucess', 'Sensor removed with successfully!');
    }
}
