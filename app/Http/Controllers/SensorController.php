<?php

namespace App\Http\Controllers;

use App\Equipament;
use App\Sensor;
use Illuminate\Http\Request;
use App\Http\Requests\SensorRequest;

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

    public function storeSensor(SensorRequest $request){
        $this->sensorModel->create($request->all());

        return redirect()
            ->route('listingSensors')
            ->with('sucess', 'Sensor created with successfully!');
    }

    public function listingSensors() {
        $sensors = $this->sensorModel
            ->where('sensors.in_use','<>',0)
            ->select('equipaments.name as equipament', 'sensors.*')
            ->join('equipaments', 'sensors.equipament_id', '=', 'equipaments.id')
            ->where('equipaments.in_use','<>',0)
            ->orderBy('sensors.id', 'desc')
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
    /*
    public function showSensor(Request $request) {
        $sensor = $this->sensorModel->find($request->id);
        $equipment = $this->equipamentModel->find($sensor->equipament_id);
        return view('sensor.show', compact('sensor', 'equipment'));
    }
    */

    public function showSensor(Request $request) {
        $sensor = $this->sensorModel->find($request->id);
        $equipment = $this->equipamentModel->find($sensor->equipament_id);
        $datas['sensor'] = $sensor;
        $datas['equipment'] = $equipment;
        return json_encode($datas);
    }

    public function editSensor(Request $request) {
        $sensor = $this->sensorModel->find($request->id);
        $equipaments = $this->equipamentModel->all();
        return view('sensor.edit', compact('sensor', 'equipaments'));
    }

    public function updateSensor(SensorRequest $request) {
        if($request->name == "" || $request->equipament_id == "") {
            return redirect()
            ->back()
            ->with('error', 'Preencha os campos obrigatórios.');
        }

        $sensor = $this->sensorModel->find($request->id);
        $sensor->name = $request->name;
        $sensor->equipament_id = $request->equipament_id;
        $update = $sensor->save();

        if($update)
            return redirect()
                    ->route('listingSensors')
                    ->with('sucess', 'Sensor updated successfully!');

        return redirect()
                    ->back()
                    ->with('error', 'Failed to update sensor!');
    }
}
