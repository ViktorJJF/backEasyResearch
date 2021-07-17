<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ThesisResearch;
use Illuminate\Http\Request;

class ThesisResearchController extends Controller
{
    public function getResearch(Request $request)
    {
        try {
            $projectId = $request->projectId;
            $id = Project::where('projectId', $projectId)->first()->id;
            $thesisResearch = ThesisResearch::where('project_id', $id)->first();
            return response()->json(array('ok' => true, 'thesisResearch' => $thesisResearch, 200));
        } catch (\Throwable $th) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
        }

    }
    public function store(Request $request)
    {
        $thesisResearch = new ThesisResearch();
        $thesisResearch->project_id = $request->project_id;
        $thesisResearch->body = $request->body;
        $thesisResearch->style = $request->style;
        $thesisResearch->coverPage = $request->coverPage;
        $thesisResearch->references = "[]";
        $thesisResearch->annexes = $request->annexes;
        $thesisResearch->images = "[]";
        $thesisResearch->tables = $request->tables;
        $thesisResearch->characteristics = $request->characteristics;
        $thesisResearch->researchIndexes = $request->researchIndexes;
        $thesisResearch->save();
        return response()->json(array('ok' => true, 'thesisResearch' => $thesisResearch, 200));
    }
    public function update(Request $request)
    {
        // $activeUserId = JWTAuth::parseToken()->authenticate()->id;
        $projectId = $request->projectId;
        $id = Project::where('projectId', $projectId)->first()->id;
        $thesisResearch = ThesisResearch::where('project_id', $id)->first();
        if (isset($request->body)) {
            $thesisResearch->body = $request->body;
        }
        if (isset($request->references)) {
            $thesisResearch->references = $request->references;
        }
        if (isset($request->annexes)) {
            $thesisResearch->annexes = $request->annexes;
        }
        if (isset($request->images)) {
            $thesisResearch->images = $request->images;
        }
        if (isset($request->tables)) {
            $thesisResearch->tables = $request->tables;
        }
        if (isset($request->characteristics)) {
            $thesisResearch->characteristics = $request->characteristics;
        }
        if (isset($request->researchIndexes)) {
            $thesisResearch->researchIndexes = $request->researchIndexes;
        }
        $thesisResearch->save();
        return response()->json(array('ok' => true, 'thesisResearch' => $thesisResearch, 200));
    }
    public function getTypesOfResearchVariables()
    {
        try {
            $types = "[
                {
                  id: 1,
                  text: 'currentDegree',
                  description: 'grado actual'
                },
                {
                  id: 2,
                  text: 'goalDegree',
                  description: 'grado meta'
                },
                {
                  id: 3,
                  text: 'university',
                  description:
                    'universidad a la cual pertenece al momento de la investigación'
                },
                {
                  id: 4,
                  text: 'faculty',
                  description:
                    'facultad a la cual pertenece al momento de la investigación'
                },
                {
                  id: 5,
                  text: 'school',
                  description:
                    'escuela a la cual pertenece al momento de la investigación'
                },
                {
                  id: 6,
                  text: 'titleOfResearch',
                  description:
                    'titulo a la cual pertenece al momento de la investigación'
                },
                {
                  id: 7,
                  text: 'researchArea',
                  description: 'area de investigacion | disciplina científica'
                },
                {
                  id: 8,
                  text: 'researchLine',
                  description:
                    'linea de investigacion | linea perteneciente al area de investigacion'
                },
                {
                  id: 9,
                  text: 'author',
                  description: 'autor de investigacion'
                },
                {
                  id: 10,
                  text: 'antecedents',
                  description:
                    'otras investigaciones realizadas a nivel global - nacional - local'
                },
                {
                  id: 11,
                  text: 'antecedentsOfProblem',
                  description:
                    'antecedentes con respecto a la problematica que se daba antes y que se hizo por intentar resolverla'
                },
                {
                  id: 12,
                  text: 'researchLimitations',
                  description:
                    'limitaciones de la investigacion (espacial, temporal,etc)'
                },
                {
                  id: 13,
                  text: 'formulationOfResearchProblem ',
                  description: 'describir el problema en cuestion que se investigara'
                },
                {
                  id: 14,
                  text: 'problemStatement',
                  description: 'Descripción de la Realidad Problemática'
                },
                {
                  id: 15,
                  text: 'justification',
                  description: 'Justificacion. Razones por las que se investiga'
                },
                {
                  id: 16,
                  text: 'objetives',
                  description: 'contenedor de objetivos general y especificos'
                },
                {
                  id: 17,
                  text: 'problemDefinition',
                  description: 'Definición del problema'
                },
                {
                  id: 18,
                  text: 'variable',
                  description:
                    'Variables dentro del cuerpo de investigación (definición conceptual, definición operacional, etc)'
                },
                {
                  id: 19,
                  text: 'operationalizationOfVariables',
                  description: 'anexo matrices de operacionalización de variables'
                },
                {
                  id: 20,
                  text: 'hypothesis',
                  description: 'contenedor de hipotesis general y especificos'
                },
                {
                  id: 21,
                  text: 'theoricalBases',
                  description:
                    'bases teoricas de la investigación (creado por el usuario)'
                },
                {
                  id: 22,
                  text: 'definitionOfTerms',
                  description:
                    'definicion de terminos provenientes de las bases teoricas (como minimo deben estar explicadas las variables)'
                },
                {
                  id: 23,
                  text: 'typeOfResearch',
                  description: 'tipo de investigación (cuantitativo o cualitativo)'
                },
                {
                  id: 24,
                  text: 'levelOfResearch',
                  description: 'nivel de investigacion (experimental o no experimental)'
                },
                {
                  id: 25,
                  text: 'advisor',
                  description: 'nombres y grado del asesor'
                },
                {
                  id: 26,
                  text: 'placeOfResearch',
                  description: 'lugar de la investigacion'
                },
                {
                  id: 27,
                  text: 'chapter',
                  description:
                    'tipo global que de nivel 1 que indica los capitulos de la investigacion'
                },
                {
                  id: 28,
                  text: 'populationAndSample',
                  description: 'poblacion y muestra'
                },
                {
                  id: 29,
                  text: 'instruments',
                  description: 'instrumentos de la investigacion'
                },
                {
                  id: 30,
                  text: 'dataAnalysis',
                  description: 'Técnicas de procesamiento y análisis de datos'
                },
                {
                  id: 31,
                  text: 'humanResources',
                  description: 'recursos humanos'
                },
                {
                  id: 32,
                  text: 'goodAndServices',
                  description: 'bienes y servicios'
                },
                {
                  id: 33,
                  text: 'schedule',
                  description: 'cronograma'
                },
                {
                  id: 34,
                  text: 'researchBudget',
                  description: 'presupuesto de investigacion'
                },
                {
                  id: 35,
                  text: 'goods',
                  description: 'bien de bienes'
                },
                {
                  id: 36,
                  text: 'services',
                  description: 'servicios'
                },
                {
                  id: 37,
                  text: 'actionsToDo',
                  description: 'acciones por hacer (indice tentativo)'
                },
                {
                  id: 38,
                  text: 'researchDesign',
                  description:
                    'Diseño de la investigación (exploratorio, descriptivo, correlacional,etc)'
                },
                {
                  id: 39,
                  text: 'free',
                  description: 'Elementos creados por el usuario (nada en particular)'
                },
                {
                  id: 40,
                  text: 'identificationOfResearchProblem',
                  description: 'Identificacion del problema'
                },
                {
                  id: 41,
                  text: 'problemFormulation',
                  description:
                    'formulacion del problema (contenedor de problema general y especificos)'
                },
                {
                  id: 42,
                  text: 'generalProblem',
                  description: 'problema general'
                },
                {
                  id: 43,
                  text: 'specificProblem',
                  description: 'problema especifico'
                },
                {
                  id: 44,
                  text: 'generalObjective',
                  description: 'objetivo general'
                },
                {
                  id: 45,
                  text: 'generalHypothesis',
                  description: 'hipotesis general'
                },
                {
                  id: 46,
                  text: 'specificHypothesis',
                  description: 'hipotesis especifica'
                },
                {
                  id: 47,
                  text: 'identifyingVariables',
                  description: 'identificacion de las variables'
                },
                {
                  id: 48,
                  text: 'variableCharacteristics',
                  description: 'caracterizacion de las variables'
                },
                {
                  id: 49,
                  text: 'operationalDefinition',
                  description: 'definicion operacional de las variables'
                },
                {
                  id: 50,
                  text: 'internationalAntecedent',
                  description: 'antecedente internacional'
                },
                {
                  id: 51,
                  text: 'nationalAntecedent',
                  description: 'antecedente nacional'
                },
                {
                  id: 52,
                  text: 'localAntecedent',
                  description: 'antecedente local'
                },
                {
                  id: 53,
                  text: 'basicActivities',
                  description: 'actividades basicas'
                },
                {
                  id: 54,
                  text: 'tentativeTOC',
                  description: 'indice tentativo'
                },
                {
                  id: 55,
                  text: 'specificObjetive',
                  description: 'Objetivo especifico'
                }
              ]";
            return response()->json(array('ok' => true, 'payload' => $types, 200));
        } catch (\Exception $e) {
            return response()->json(array('ok' => false, 'err' => class_basename($e) . ' in ' . basename($e->getFile()) . ' line ' . $e->getLine() . ': ' . $e->getMessage(), 500));
        }
    }
}
