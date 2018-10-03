<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Models\Equipments;

class EquipmentsController extends Controller
{
    // private $equipment;
    //
    // public function __construct(Equipments $equipment) {
    //     $this->equipment = $equipment;
    // }

    public function createEquipments() {
        return view('equipments.create');
    }

    public function listingEquipments() {
        return view('equipments.list');
    }

    public function showEquipments() {
        return view('equipments.show');
    }

}
