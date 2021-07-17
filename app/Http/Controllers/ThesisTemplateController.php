<?php

namespace App\Http\Controllers;

use App\Models\ThesisTemplate;
use App\Models\University;
use Illuminate\Http\Request;

class ThesisTemplateController extends Controller
{
    public function index()
    {
        try {
            $templates = University::select('universities.name', 'thesis_templates.template', 'style', 'coverPage')
                ->join('thesis_templates', 'universities.id', '=', 'thesis_templates.university_id')
                ->get();
            for ($i = 0; $i < count($templates); $i++) {
                $templates[$i]['template'] = json_decode($templates[$i]['template']);
                $templates[$i]['coverPage'] = json_decode($templates[$i]['coverPage']);
                $templates[$i]['style'] = json_decode($templates[$i]['style']);
            }
            return response()->json(array('ok' => true, 'payload' => $templates, 200));
        } catch (\Exception $e) {
            return response()->json(array('ok' => false, 'err' => class_basename($e) . ' in ' . basename($e->getFile()) . ' line ' . $e->getLine() . ': ' . $e->getMessage(), 500));
        }
    }
    public function getTemplate(Request $request)
    {
        try {
            $researchTemplate = json_decode(ThesisTemplate::where('university_id', $request->university_id)->first()->template);
            return response()->json(array('ok' => true, 'payload' => $researchTemplate, 200));
        } catch (\Exception $e) {
            return response()->json(array('ok' => false, 'err' => class_basename($e) . ' in ' . basename($e->getFile()) . ' line ' . $e->getLine() . ': ' . $e->getMessage(), 500));
        }

    }
    public function getStyles(Request $request)
    {
        try {
            $style = json_decode(ThesisTemplate::where('university_id', $request->university_id)->first()->style);
            return response()->json(array('ok' => true, 'payload' => $style, 200));
        } catch (\Exception $e) {
            return response()->json(array('ok' => false, 'err' => class_basename($e) . ' in ' . basename($e->getFile()) . ' line ' . $e->getLine() . ': ' . $e->getMessage(), 500));
        }
    }
    public function getCoverPage(Request $request)
    {
        try {
            $coverPage = json_decode(ThesisTemplate::where('university_id', $request->university_id)->first()->coverPage, true);
            return response()->json(array('ok' => true, 'payload' => $coverPage, 200));
        } catch (\Exception $e) {
            return response()->json(array('ok' => false, 'err' => class_basename($e) . ' in ' . basename($e->getFile()) . ' line ' . $e->getLine() . ': ' . $e->getMessage(), 500));
        }
    }
}
