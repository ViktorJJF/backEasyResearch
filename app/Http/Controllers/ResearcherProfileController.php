<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Faculty;
use App\Models\Region;
use App\Models\ResearcherProfile;
use App\Models\School;
use App\Models\University;
use Illuminate\Http\Request;
use JWTAuth;

class ResearcherProfileController extends Controller
{

    private $model = ResearcherProfile::class;

    public function index(Request $request)
    {

        try {
            $items = checkQueryString($this->model, $request->query->all());
            $items = listInitOptions($items, $request->query->all());
            return response()->json(['ok' => true, 'payload' => $items], 200);
        } catch (\Exception $e) {
            return response()->json(['ok' => false, 'message' => 'Algo salió mal', 'err' => class_basename($e) . ' in ' . basename($e->getFile()) . ' line ' . $e->getLine() . ': ' . $e->getMessage()], 500);
        }

    }
    public function store(Request $request)
    {
        try {
            $item = new $this->model($request->all());
            $item->user_id = JWTAuth::parseToken()->authenticate()->id;
            $item->save();
            $item->load($item->with);
            return response()->json(['ok' => true, 'payload' => $item], 201);
        } catch (\Exception $e) {
            return response()->json(['ok' => false, 'message' => 'Algo salió mal', 'err' => class_basename($e) . ' in ' . basename($e->getFile()) . ' line ' . $e->getLine() . ': ' . $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $item = $this->model::find($id);
            return response()->json(['ok' => true, 'payload' => $item], 201);
        } catch (\Exception $e) {
            return response()->json(['ok' => false, 'message' => 'Algo salió mal', 'err' => class_basename($e) . ' in ' . basename($e->getFile()) . ' line ' . $e->getLine() . ': ' . $e->getMessage()], 500);
        }
    }

    public function update($id, Request $request)
    {
        try {
            $item = $this->model::findOrFail($id);
            $item->update($request->all());
            return response()->json(['ok' => true, 'payload' => $item], 200);
        } catch (\Exception $e) {
            return response()->json(['ok' => false, 'message' => 'Algo salió mal', 'err' => class_basename($e) . ' in ' . basename($e->getFile()) . ' line ' . $e->getLine() . ': ' . $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $item = $this->model::find($id);
            if (!$item) {
                throw new \Exception("El id no existe", 1);
            }
            $deleted = $item;
            $item->delete();
            return response()->json(['ok' => true, 'payload' => $deleted], 200);
        } catch (\Exception $e) {
            return response()->json(['ok' => false, 'message' => 'Algo salió mal', 'err' => class_basename($e) . ' in ' . basename($e->getFile()) . ' line ' . $e->getLine() . ': ' . $e->getMessage()], 500);
        }
    }

    public function getCountries()
    {
        $countries = Country::all();
        $regions = Region::all();
        $universities = University::all();
        $faculties = Faculty::all();
        $schools = School::all();
        $result = [];
        $result[0] = $countries;
        $result[1] = $regions;
        $result[2] = $universities;
        $result[3] = $faculties;
        $result[4] = $schools;
        // return response()->json(compact('result'));
        return $result;
    }
}
