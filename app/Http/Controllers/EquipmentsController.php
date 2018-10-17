<?php

namespace App\Http\Controllers;

use App\Equipament;
use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Http\Requests\EquipamentRequest;

class EquipmentsController extends Controller
{
    private $equipmentModel;

    public function __construct(Equipament $equipament){
        $this->equipmentModel = $equipament;
    }

    public function createEquipments() {
        return view('equipments.create');
    }

    public function storeEquipment(EquipamentRequest $request){
        $this->equipmentModel->create($request->all());

        return redirect()
            ->route('listingEquipments')
            ->with('sucess', 'Equipament created with successfully!');
    }

    public function listingEquipments() {
        $equipments = $this->equipmentModel
            ->where('in_use','<>',0)
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('equipments.list', compact('equipments'));
    }

    public function showEquipments(Request $request) {
        $equipment = $this->equipmentModel->find($request->id);
        return view('equipments.show', compact('equipment'));
    }

    public function destroyEquipments(Request $request, $id){
        $this->equipmentModel->find($id)
            ->update(
                [
                    'in_use' => 0,
                ]
            );

        return redirect()
            ->route('listingEquipments')
            ->with('sucess', 'Equipament removed with successfully!');
    }

    public function editEquipment(Request $request) {
        $equipment = $this->equipmentModel->find($request->id);
        return view('equipments.edit', compact('equipment'));
    }

    public function updateEquipment(EquipamentRequest $request) {
        if($request->name == "" || $request->local == "") {
            return redirect()
            ->back()
            ->with('error', 'Preencha os campos obrigatórios.');
        }

        $equipment = $this->equipmentModel->find($request->id);
        $equipment->name = $request->name;
        $equipment->local = $request->local;
        $update = $equipment->save();

        if($update)
            return redirect()
                    ->route('listingEquipments')
                    ->with('sucess', 'Equipment updated successfully!');

        return redirect()
                    ->back()
                    ->with('error', 'Failed to update equipment!');
    }
}
