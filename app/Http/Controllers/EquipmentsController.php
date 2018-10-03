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

    public function listingEquipments() {
        $equipments = $this->equipmentModel->paginate(10);
        return view('equipments.list', compact('equipments'));
    }

    public function showEquipments() {
        return view('equipments.show');
    }

}
