<?php

namespace App\Http\Controllers;

use App\Equipament;
use Illuminate\Http\Request;
use App\Http\Controllers;

class EquipmentsController extends Controller
{
    private $equipmentModel;

    public function __construct(Equipament $equipament){
        $this->equipmentModel = $equipament;
    }

    public function createEquipments() {
        return view('equipments.create');
    }

    public function storeEquipment(Request $request){

        //dd($request->all());

        $this->equipmentModel->create($request->all());

        return redirect()
            ->route('listingEquipments')
            ->with('sucess', 'Equipament created with successfully!');
    }

    public function listingEquipments() {
        $equipments = $this->equipmentModel->paginate(10);
        return view('equipments.list', compact('equipments'));
    }

    public function showEquipments() {
        return view('equipments.show');
    }

    public function destroyEquipments(Request $request, $id){
        //die($id);
        //dd($request->all());

        $this->equipmentModel->find($id)->delete($id);

        return redirect()
            ->route('listingEquipments')
            ->with('sucess', 'Equipament removed with successfully!');
    }

}
