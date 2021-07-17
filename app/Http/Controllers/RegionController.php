<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{

    private $model = Region::class;

    public function index(Request $request)
    {

        try {
            $items = checkQueryString($this->model, $request->query->all());
            $items = listInitOptions($items, $request->query->all());
            return response()->json(['ok' => true, 'payload' => $items], 200);
        } catch (\Exception$e) {
            return response()->json(['ok' => false, 'message' => 'Algo salió mal', 'err' => class_basename($e) . ' in ' . basename($e->getFile()) . ' line ' . $e->getLine() . ': ' . $e->getMessage()], 500);
        }

    }
    public function store(Request $request)
    {
        try {
            $item = new $this->model($request->all());
            $item->save();
            $item->load($item->with);
            return response()->json(['ok' => true, 'payload' => $item], 201);
        } catch (\Exception$e) {
            return response()->json(['ok' => false, 'message' => 'Algo salió mal', 'err' => class_basename($e) . ' in ' . basename($e->getFile()) . ' line ' . $e->getLine() . ': ' . $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $item = $this->model::find($id);
            return response()->json(['ok' => true, 'payload' => $item], 201);
        } catch (\Exception$e) {
            return response()->json(['ok' => false, 'message' => 'Algo salió mal', 'err' => class_basename($e) . ' in ' . basename($e->getFile()) . ' line ' . $e->getLine() . ': ' . $e->getMessage()], 500);
        }
    }

    public function update($id, Request $request)
    {
        try {
            $item = $this->model::findOrFail($id);
            $item->update($request->all());
            return response()->json(['ok' => true, 'payload' => $item], 200);
        } catch (\Exception$e) {
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
        } catch (\Exception$e) {
            return response()->json(['ok' => false, 'message' => 'Algo salió mal', 'err' => class_basename($e) . ' in ' . basename($e->getFile()) . ' line ' . $e->getLine() . ': ' . $e->getMessage()], 500);
        }
    }
}
