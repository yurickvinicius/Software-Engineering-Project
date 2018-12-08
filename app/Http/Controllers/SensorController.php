<?php

namespace App\Http\Controllers;

use App\Equipament;
use App\Sensor;
use App\UserSensor;
use Illuminate\Http\Request;
use App\Http\Requests\SensorRequest;
use Auth;

class SensorController extends Controller
{
    private $equipamentModel;
    private $sensorModel;
    private $userSensorModel;

    public function __construct(Equipament $equipament, Sensor $sensor, UserSensor $userSensor){
        $this->equipamentModel = $equipament;
        $this->sensorModel = $sensor;
        $this->userSensorModel = $userSensor;
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

        if(Auth::user()->type == 1){
            $sensors = $this->sensorModel
                ->where('sensors.in_use','<>',0)
                ->select('equipaments.name as equipament', 'sensors.*')
                ->join('equipaments', 'sensors.equipament_id', '=', 'equipaments.id')
                ->where('equipaments.in_use','<>',0)
                ->orderBy('sensors.id', 'desc')
                ->paginate(10);

            return view('sensor.list', compact('sensors'));
        }else{
            $sensors = $this->sensorModel
                ->where('sensors.in_use','<>',0)
                ->select('equipaments.name as equipament', 'sensors.*')
                ->join('equipaments', 'sensors.equipament_id', '=', 'equipaments.id')
                ->where('equipaments.in_use','<>',0)
                ->join('user_sensors', 'sensors.id', '=', 'user_sensors.sensor_id')
                ->where('user_sensors.user_id','=',Auth::user()->id)                
                ->orderBy('sensors.id', 'desc')
                ->paginate(10);

            return view('sensor.list', compact('sensors'));
        }

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

    public function rent(Request $request){
        $users = $request->users;
        $idSensor = $request->id_sensor;

        $this->userSensorModel
            ->where('sensor_id','=',$idSensor)
            ->delete();

        foreach ($users as $user){
            $userSensor = [
                'user_id' => $user,
                'sensor_id' => $idSensor
            ];

            $this->userSensorModel->create($userSensor);
        }
    }
}
