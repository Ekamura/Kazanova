<?php

namespace App\Http\Controllers;

use App\Http\Requests\CharacteristicsRequest;
use App\Models\Characteristic;
use App\Models\Specification;
use Illuminate\Http\Request;

class SpecificationController extends Controller
{
    public function index()
    {
        $specifications = Specification::all();
        return view('specification.index', compact('specifications'));
    }

    public function getCharacteristics(Specification $specification)
    {
        echo json_encode($specification->characteristics);
    }

    public function deleteSpecification(Specification $specification)
    {
        $specification->delete();
        return to_route('admin.specification.index');
    }

    public function deleteCharacteristic(Characteristic $characteristic, Request $request)
    {
        $result = $characteristic->delete();
        echo $result ? '' : 'ошибка удаления...';
    }

    public function addCharacteristic(CharacteristicsRequest $request, Specification $specification)
    {
        $characteristic = $specification->characteristics()->create(['value' => $request->value]);
        echo json_encode($characteristic);
    }
}
