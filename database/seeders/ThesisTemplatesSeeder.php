<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThesisTemplatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('thesis_templates')->insert([
            [

                'university_id' => 6,
                'template' => '{"level1": [{
                    "id": 1,
                    "order": 1,
                    "tag": "DATOS",
                    "print":false,
                    "numbered": false,
                    "type": "chapter",
                    "level2": [{
                        "id": 1,
                        "order": 1,
                        "type": "titleOfResearch",
                        "tag": "Título",
                        "values": [],
                        "level3": []
                    }, {
                        "id": 2,
                        "order": 2,
                        "type": "researchArea",
                        "tag": "Área de Investigación",
                        "values": [],
                        "level3": []
                    }, {
                        "id": 3,
                        "order": 3,
                        "type": "researchLine",
                        "tag": "Línea de Investigación",
                        "values": [],
                        "level3": []
                    }, {
                        "id": 4,
                        "order": 4,
                        "type": "author",
                        "tag": "Autor",
                        "values": [],
                        "level3": []
                    }]
                }, {
                    "id": 2,
                    "order": 2,
                    "tag": "CAPÍTULO I : EL PROBLEMA DE LA INVESTIGACIÓN",
                    "print":false,
                    "type": "chapter",
                    "level2": [{
                            "id": 1,
                            "order": 1,
                            "type": "problemStatement",
                            "tag": "Descripción de la Realidad Problemática",
                            "citations":[],
                            "values": [],
                            "level3": []
                        }, {
                            "id": 2,
                            "order": 2,
                            "type": "problemDefinition",
                            "tag": "Definición del problema",
                            "citations":[],
                            "values": [],
                            "level3": []
                        }, {
                            "id": 3,
                            "order": 3,
                            "type": "objetives",
                            "tag": "Objetivos de la investigación",
                            "citations":[],
                            "values": [],
                            "level3": []
                        },
                        {
                            "id": 4,
                            "order": 4,
                            "type": "justification",
                            "tag": "Justificación e importancia de la investigación",
                            "citations":[],
                            "values": [],
                            "level3": []
                        },
                        {
                            "id": 5,
                            "order": 5,
                            "type": "variable",
                            "tag": "Variables",
                            "citations":[],
                            "values": [],
                            "level3": []
                        },
                        {
                            "id": 6,
                            "order": 6,
                            "type": "hypothesis",
                            "tag": "Hipótesis de la Investigación",
                            "citations":[],
                            "values": [],
                            "level3": []
                        }
                    ]
                }, {
                    "id": 3,
                    "order": 3,
                    "tag": "CAPÍTULO II : MARCO TEÓRICO",
                    "print":false,
                    "type": "chapter",
                    "level2": [{
                        "id": 1,
                        "order": 1,
                        "type": "antecedents",
                        "tag": "Antecedentes de la investigación",
                        "citations":[],
                        "values": [],
                        "level3": []
                    }, {
                        "id": 2,
                        "order": 2,
                        "type": "theoricalBases",
                        "tag": "Bases teóricas",
                        "values": [],
                        "level3": []
                    }, {
                        "id": 3,
                        "order": 3,
                        "type": "definitionOfTerms",
                        "tag": "Marco conceptual (definiciones de variables u otro concepto importante)",
                        "citations":[],
                        "values": [],
                        "level3": []
                    }]
                },
                {
                    "id": 4,
                    "order": 4,
                    "tag": "CAPÍTULO III: MÉTODO",
                    "print":false,
                    "type": "chapter",
                    "level2": [{
                            "id": 1,
                            "order": 1,
                            "type": "typeOfResearch",
                            "tag": "Tipo de investigación",
                            "citations":[],
                            "values": [],
                            "level3": []
                        }, {
                            "id": 2,
                            "order": 2,
                            "type": "designOfResearch",
                            "tag": "Diseño de investigación",
                            "citations":[],
                            "values": [],
                            "level3": []
                        }, {
                            "id": 3,
                            "order": 3,
                            "type": "populationAndSample",
                            "tag": "Población y muestra",
                            "citations":[],
                            "values": [],
                            "level3": []
                        },
                        {
                            "id": 4,
                            "order": 4,
                            "type": "instruments",
                            "tag": "Técnicas e instrumentos de recolección de datos",
                            "citations":[],
                            "values": [],
                            "level3": []
                        },
                        {
                            "id": 5,
                            "order": 5,
                            "type": "dataAnalysis",
                            "tag": "Técnicas de procesamiento y análisis de datos",
                            "citations":[],
                            "values": [],
                            "level3": []
                        }
                    ]
                },
                {
                    "id": 5,
                    "order": 5,
                    "tag": "CAPÍTULO IV: ASPECTOS ADMINISTRATIVOS",
                    "print":false,
                    "type": "chapter",
                    "level2": [{
                            "id": 1,
                            "order": 1,
                            "type": "humanResources",
                            "tag": "Recursos humanos",
                            "citations":[],
                            "values": [],
                            "level3": []
                        }, {
                            "id": 2,
                            "order": 2,
                            "type": "goodAndServices",
                            "tag": "Bienes y servicios",
                            "citations":[],
                            "values": [],
                            "level3": []
                        }, {
                            "id": 3,
                            "order": 3,
                            "type": "schedule",
                            "tag": "Cronograma de actividades",
                            "citations":[],
                            "values": [],
                            "level3": []
                        },
                        {
                            "id": 4,
                            "order": 4,
                            "type": "researchBudget",
                            "tag": "Fuentes de financiamiento y presupuesto",
                            "citations":[],
                            "values": [],
                            "level3": []
                        }
                    ]
                }
            ]}',
                'style' => '{"margins": {
                    "id": 1,
                    "units": "cm",
                    "top": 6,
                    "bottom": 3,
                    "leftHand": 4,
                    "rightHand": 3,
                    "specialMargins": {
                        "specialSections": ["chapter", "introduction"],
                        "top": 7
                    }
                },
                "styles": {
                    "defaultFont": ["Times New Roman", "Arial"],
                    "defaultFontSize": 12,
                    "defaultSpacing": 2,
                    "spaceBefore": true,
                    "defaultIndent": 5,
                    "defaultAlignment": "justify"

                }}',
                'coverPage' => '[{
                    "id": 1,
                    "order": 1,
                    "text": "UNIVERSIDAD JOSÉ CARLOS MARIÁTEGUI",
                    "urlLogo":"https://www.carrerasadistancia.com.pe/logos/original/logo-universidad-jose-carlos-mariategui.png",
                    "styles": {
                        "fontFamily": "Arial",
                        "fontSize": "16",
                        "fontWeight": "bold",
                        "textAlign":"center"
                    }
                },
                {
                    "id": 2,
                    "order": 2,
                    "text": "VICERRECTORADO DE INVESTIGACIÓN",
                    "styles": {
                        "fontFamily": "Arial",
                        "fontSize": "14",
                        "fontWeight": "bold",
                        "textAlign":"center"
                    }
                },
                {
                    "id": 3,
                    "order": 3,
                    "text": "FACULTYNAME",
                    "styles": {
                        "fontFamily": "Arial",
                        "fontSize": "14",
                        "fontWeight": "bold",
                        "textAlign":"center"
                    }
                },
                {
                    "id": 4,
                    "order": 4,
                    "text": "Escuela Profesional de SCHOOLNAME",
                    "styles": {
                        "fontFamily": "Arial",
                        "fontSize": "12",
                        "fontWeight": "bold",
                        "textAlign":"center"
                    }
                },
                {
                    "id": 5,
                    "order": 5,
                    "text": "PROYECTO DE TESIS",
                    "styles": {
                        "fontFamily": "Arial",
                        "fontSize": "16",
                        "fontWeight": "bold",
                        "textAlign":"center"
                    }
                },
                {
                    "id": 6,
                    "order": 6,
                    "text": "TITLE",
                    "styles": {
                        "fontFamily": "Arial",
                        "fontSize": "16",
                        "fontWeight": "bold",
                        "textAlign":"center"
                    }
                },
                {
                    "id": 7,
                    "order": 7,
                    "text": "PRESENTADA POR",
                    "styles": {
                        "fontFamily": "Arial",
                        "fontSize": "12",
                        "fontWeight": "bold",
                        "textAlign":"center"
                    }
                },
                {
                    "id": 8,
                    "order": 8,
                    "text": "CURRENTDEGREE AUTHOR",
                    "styles": {
                        "fontFamily": "Arial",
                        "fontSize": "12",
                        "fontWeight": "bold",
                        "textAlign":"center"
                    }
                },
                {
                    "id": 9,
                    "order": 9,
                    "text": "ASESOR",
                    "styles": {
                        "fontFamily": "Arial",
                        "fontSize": "12",
                        "fontWeight": "bold",
                        "textAlign":"center"
                    }
                },
                {
                    "id": 10,
                    "order": 10,
                    "text": "ADVISOR",
                    "styles": {
                        "fontFamily": "Arial",
                        "fontSize": "12",
                        "fontWeight": "bold",
                        "textAlign":"center"
                    }
                },
                {
                    "id": 11,
                    "order": 11,
                    "text": "PARA OPTAR POR EL GRADO ACADÉMICO DE",
                    "styles": {
                        "fontFamily": "Arial",
                        "fontSize": "12",
                        "fontWeight": "bold",
                        "textAlign":"center"
                    }
                },
                {
                    "id": 12,
                    "order": 12,
                    "text": "GOALDEGREE",
                    "styles": {
                        "fontFamily": "Arial",
                        "fontSize": "12",
                        "fontWeight": "bold",
                        "textAlign":"center"
                    }
                },
                {
                    "id": 13,
                    "order": 13,
                    "text": "MOQUEGUA - PERÚ",
                    "styles": {
                        "fontFamily": "Arial",
                        "fontSize": "12",
                        "fontWeight": "bold",
                        "textAlign":"center"
                    }
                },
                {
                    "id": 14,
                    "order": 14,
                    "text": "2019",
                    "styles": {
                        "fontFamily": "Arial",
                        "fontSize": "12",
                        "fontWeight": "bold",
                        "textAlign":"center"
                    }
                }

            ]',
            ],
            [
                'university_id' => 2,
                'template' => '{
                    "level1": [{
                            "id": 1,
                            "order": 1,
                            "tag": "datos generales",
                            "print": false,
                            "numbered": false,
                            "type": "chapter",
                            "values": [],
                            "level2": [{
                                    "id": 1,
                                    "order": 1,
                                    "type": "titleOfResearch",
                                    "tag": "Título",
                                    "canContainImages": false,
                                    "canContainCitations": false,
                                    "canContainTables": false,
                                    "values": [],
                                    "level3": []
                                }, {
                                    "id": 2,
                                    "order": 2,
                                    "type": "typeOfResearch",
                                    "tag": "Tipo de investigación",
                                    "canContainImages": false,
                                    "canContainCitations": false,
                                    "canContainTables": false,
                                    "values": [],
                                    "level3": []
                                }, {
                                    "id": 3,
                                    "order": 3,
                                    "type": "levelOfResearch",
                                    "tag": "Nivel de investigación",
                                    "canContainImages": false,
                                    "canContainCitations": false,
                                    "canContainTables": false,
                                    "values": [],
                                    "level3": []
                                }, {
                                    "id": 4,
                                    "order": 4,
                                    "type": "author",
                                    "tag": "Autor",
                                    "canContainImages": false,
                                    "canContainCitations": false,
                                    "canContainTables": false,
                                    "values": [],
                                    "level3": []
                                },
                                {
                                    "id": 5,
                                    "order": 5,
                                    "type": "advisor",
                                    "tag": "Asesor",
                                    "canContainImages": false,
                                    "canContainCitations": false,
                                    "canContainTables": false,
                                    "values": [],
                                    "level3": []
                                },
                                {
                                    "id": 6,
                                    "order": 6,
                                    "type": "placeOfResearch",
                                    "tag": "Institución / Localidad donde se realizará la investigación",
                                    "canContainImages": false,
                                    "canContainCitations": false,
                                    "canContainTables": false,
                                    "values": [],
                                    "level3": []
                                }
                            ]
                        }, {
                            "id": 2,
                            "order": 2,
                            "tag": "el problema de la investigación",
                            "print": false,
                            "type": "chapter",
                            "values": [],
                            "level2": [{
                                    "id": 1,
                                    "order": 1,
                                    "type": "antecedentsOfProblem",
                                    "tag": "Antecedentes",

                                    "canContainImages": false,
                                    "canContainCitations": true,
                                    "canContainTables": false,
                                    "values": [],
                                    "level3": []
                                }, {
                                    "id": 2,
                                    "order": 2,
                                    "type": "problemDefinition",
                                    "tag": "Identificación y formulación del problema de investigación",

                                    "canContainImages": false,
                                    "canContainCitations": false,
                                    "canContainTables": false,
                                    "values": [],
                                    "level3": [{
                                            "id": 1,
                                            "type": "identificationOfResearchProblem",
                                            "tag": "Identificación del problema",
                                            "values": [],
                                            "level4": []
                                        },
                                        {
                                            "id": 2,
                                            "type": "problemFormulation",
                                            "tag": "Formulación del problema",
                                            "values": [],
                                            "level4": [{
                                                    "id": 1,
                                                    "type": "generalProblem",
                                                    "tag": "Problema general",
                                                    "values": []
                                                },
                                                {
                                                    "id": 2,
                                                    "type": "specificProblem",
                                                    "tag": "Problemas específicos",
                                                    "values": []
                                                }
                                            ]
                                        }
                                    ]
                                }, {
                                    "id": 3,
                                    "order": 3,
                                    "type": "justification",
                                    "tag": "Justificación e importancia de la investigación",
                                    "canContainTables": false,

                                    "canContainImages": false,
                                    "canContainCitations": true,
                                    "values": [],
                                    "level3": []
                                },
                                {
                                    "id": 4,
                                    "order": 4,
                                    "type": "objetives",
                                    "tag": "Objetivos",

                                    "canContainImages": false,
                                    "canContainCitations": false,
                                    "canContainTables": false,
                                    "values": [],
                                    "level3": [{
                                            "id": 1,
                                            "type": "generalObjetive",
                                            "tag": "Objetivo general",
                                            "values": [],
                                            "level4": []
                                        },
                                        {
                                            "id": 2,
                                            "type": "specificObjetive",
                                            "tag": "Objetivos específicos",
                                            "values": [],
                                            "level4": []
                                        }
                                    ]
                                },
                                {
                                    "id": 5,
                                    "order": 5,
                                    "type": "hypothesis",
                                    "tag": "Hipótesis",

                                    "canContainImages": false,
                                    "canContainCitations": false,
                                    "canContainTables": false,
                                    "values": [],
                                    "level3": [{
                                            "id": 1,
                                            "type": "generalHypothesis",
                                            "tag": "Hipótesis general",
                                            "values": [],
                                            "level4": []
                                        },
                                        {
                                            "id": 2,
                                            "type": "specificHypothesis",
                                            "tag": "Hipótesis específicas",
                                            "values": [],
                                            "level4": []
                                        }
                                    ]
                                },
                                {
                                    "id": 6,
                                    "order": 6,
                                    "type": "variable",
                                    "tag": "Variables",

                                    "canContainImages": false,
                                    "canContainCitations": true,
                                    "canContainTables": true,
                                    "values": [],
                                    "level3": [{
                                            "id": 1,
                                            "type": "identifyingVariables",
                                            "tag": "Identificación de las variables",
                                            "values": [],
                                            "level4": []
                                        },
                                        {
                                            "id": 2,
                                            "type": "variableCharacteristics",
                                            "tag": "Caracterización de las variables",
                                            "values": [],
                                            "level4": []
                                        },
                                        {
                                            "id": 3,
                                            "type": "operationalDefinition",
                                            "tag": "Definición operacional de las variables",
                                            "values": [],
                                            "level4": []
                                        }
                                    ]
                                },
                                {
                                    "id": 7,
                                    "order": 7,
                                    "type": "researchLimitations",
                                    "tag": "Limitaciones de la investigación",

                                    "canContainImages": false,
                                    "canContainCitations": true,
                                    "canContainTables": false,
                                    "values": [],
                                    "level3": []
                                }
                            ]
                        }, {
                            "id": 3,
                            "order": 3,
                            "tag": "marco teórico",
                            "print": false,
                            "type": "chapter",
                            "values": [],
                            "level2": [{
                                "id": 1,
                                "order": 1,
                                "type": "antecedents",
                                "tag": "Antecedentes del estudio",

                                "canContainImages": false,
                                "canContainCitations": true,
                                "canContainTables": false,
                                "values": [],
                                "level3": [{
                                        "id": 1,
                                        "type": "internationalAntecedent",
                                        "tag": "Antecedentes Internacionales",
                                        "values": [],
                                        "level4": []
                                    },
                                    {
                                        "id": 2,
                                        "type": "nationalAntecedent",
                                        "tag": "Antecedentes Nacionales",
                                        "values": [],
                                        "level4": []
                                    },
                                    {
                                        "id": 3,
                                        "type": "localAntecedent",
                                        "tag": "Antecedentes Locales",
                                        "values": [],
                                        "level4": []
                                    }
                                ]
                            }, {
                                "id": 2,
                                "order": 2,
                                "type": "theoricalBases",
                                "tag": "Bases teóricas",

                                "canContainImages": true,
                                "canContainCitations": true,
                                "canContainTables": true,
                                "values": [],
                                "level3": []
                            }, {
                                "id": 3,
                                "order": 3,
                                "type": "definitionOfTerms",
                                "tag": "Definición de Términos",

                                "canContainImages": false,
                                "canContainCitations": true,
                                "canContainTables": false,
                                "values": [],
                                "level3": []
                            }]
                        },
                        {
                            "id": 4,
                            "order": 4,
                            "tag": "marco metodológico",
                            "print": false,
                            "type": "chapter",
                            "values": [],
                            "level2": [{
                                    "id": 1,
                                    "order": 1,
                                    "type": "designOfResearch",
                                    "tag": "Caracterización del diseño de investigación",

                                    "canContainImages": true,
                                    "canContainCitations": true,
                                    "canContainTables": true,
                                    "values": [],
                                    "level3": []
                                }, {
                                    "id": 2,
                                    "order": 2,
                                    "type": "actionsToDo",
                                    "tag": "Acciones y actividades para la ejecución del proyecto",

                                    "canContainImages": false,
                                    "canContainCitations": false,
                                    "canContainTables": false,
                                    "values": [],
                                    "level3": [{
                                            "id": 1,
                                            "type": "basicActivities",
                                            "tag": "Actividades básicas",
                                            "values": [],
                                            "level4": []
                                        },
                                        {
                                            "id": 2,
                                            "type": "tentativeTOC",
                                            "tag": "Índice tentativo de la futura tesis",
                                            "values": [],
                                            "level4": []
                                        }
                                    ]
                                }, {
                                    "id": 3,
                                    "order": 3,
                                    "type": "instruments",
                                    "tag": "Materiales e instrumentos",

                                    "canContainImages": false,
                                    "canContainCitations": true,
                                    "canContainTables": false,
                                    "values": [],
                                    "level3": []
                                },
                                {
                                    "id": 4,
                                    "order": 4,
                                    "type": "populationAndSample",
                                    "tag": "Población y muestra de estudio",

                                    "canContainImages": false,
                                    "canContainCitations": true,
                                    "canContainTables": true,
                                    "values": [],
                                    "level3": [{
                                            "id": 1,
                                            "type": "population",
                                            "tag": "Población de estudio",
                                            "values": [],
                                            "level4": []
                                        },
                                        {
                                            "id": 2,
                                            "type": "sample",
                                            "tag": "Muestra de estudio",
                                            "values": [],
                                            "level4": []
                                        }
                                    ]
                                },
                                {
                                    "id": 5,
                                    "order": 5,
                                    "type": "dataAnalysis",
                                    "tag": "Tratamiento de datos (análisis estadístico)",

                                    "canContainImages": true,
                                    "canContainCitations": true,
                                    "canContainTables": false,
                                    "values": [],
                                    "level3": []
                                }
                            ]
                        },
                        {
                            "id": 5,
                            "order": 5,
                            "tag": "aspectos administrativos",
                            "print": false,
                            "type": "chapter",
                            "values": [],
                            "level2": [{
                                    "id": 1,
                                    "order": 1,
                                    "type": "schedule",
                                    "tag": "Cronograma de actividades",

                                    "canContainImages": false,
                                    "canContainCitations": false,
                                    "canContainTables": true,
                                    "values": [],
                                    "level3": []
                                }, {
                                    "id": 2,
                                    "order": 2,
                                    "type": "humanResources",
                                    "tag": "Recursos humanos",

                                    "canContainImages": false,
                                    "canContainCitations": false,
                                    "canContainTables": true,
                                    "values": [],
                                    "level3": []
                                }, {
                                    "id": 3,
                                    "order": 3,
                                    "type": "goods",
                                    "tag": "Bienes",

                                    "canContainImages": false,
                                    "canContainCitations": false,
                                    "canContainTables": true,
                                    "values": [],
                                    "level3": []
                                },
                                {
                                    "id": 4,
                                    "order": 4,
                                    "type": "services",
                                    "tag": "Servicios",

                                    "canContainImages": false,
                                    "canContainCitations": false,
                                    "canContainTables": true,
                                    "values": [],
                                    "level3": []
                                },
                                {
                                    "id": 5,
                                    "order": 5,
                                    "type": "researchBudget",
                                    "tag": "Presupuesto",

                                    "canContainImages": false,
                                    "canContainCitations": false,
                                    "canContainTables": true,
                                    "values": [],
                                    "level3": []
                                },
                                {
                                    "id": 6,
                                    "order": 6,
                                    "type": "fundingSources",
                                    "tag": "Fuentes de financiamiento",

                                    "canContainImages": false,
                                    "canContainCitations": false,
                                    "canContainTables": false,
                                    "values": [],
                                    "level3": []
                                }
                            ]
                        }
                    ]
                }',
                'style' => '{"margins": {
                    "id": 1,
                    "units": "cm",
                    "top": 6,
                    "bottom": 3,
                    "leftHand": 4,
                    "rightHand": 3,
                    "specialMargins": {
                        "specialSections": ["chapter", "introduction"],
                        "top": 7
                    }
                },
                "styles": {
                    "defaultFont": ["Times New Roman", "Arial"],
                    "defaultFontSize": 12,
                    "defaultSpacing": 2,
                    "spaceBefore": true,
                    "defaultIndent": 5,
                    "defaultAlignment": "justify"

                }}',
                'coverPage' => '[{
                    "id": 1,
                    "order": 1,
                    "text": "UNIVERSIDAD NACIONAL JORGE BASADRE GROHMANN - TACNA",
                    "styles": {
                        "fontFamily": "Agency FB",
                        "fontSize": "18",
                        "fontWeight": "bold",
                        "textAlign":"center"
                    }
                },
                {
                    "id": 3,
                    "order": 3,
                    "text": "FACULTYNAME",
                    "styles": {
                        "fontFamily": "Times New Roman",
                        "fontSize": "18",
                        "fontWeight": "bold",
                        "textAlign":"center"
                    }
                },
                {
                    "id": 4,
                    "order": 4,
                    "text": "Escuela Profesional de SCHOOLNAME",
                    "styles": {
                        "fontFamily": "Times New Roman",
                        "fontSize": "16",
                        "fontWeight": "normal",
                        "textAlign":"center"
                    }
                },
                {
                    "id": 6,
                    "order": 6,
                    "text": "TITLE",
                    "styles": {
                        "fontFamily": "Times New Roman",
                        "fontSize": "16",
                        "fontWeight": "bold",
                        "textAlign":"center"
                    }
                },
                {
                    "id": 5,
                    "order": 5,
                    "text": "PROYECTO DE TESIS",
                    "styles": {
                        "fontFamily": "Engravers MT",
                        "fontSize": "18",
                        "fontWeight": "bold",
                        "textAlign":"center"
                    }
                },

                {
                    "id": 7,
                    "order": 7,
                    "text": "Presentada por",
                    "styles": {
                        "fontFamily": "Times New Roman",
                        "fontSize": "16",
                        "fontWeight": "normal",
                        "textAlign":"center"
                    }
                },
                {
                    "id": 8,
                    "order": 8,
                    "text": "CURRENTDEGREE AUTHOR",
                    "styles": {
                        "fontFamily": "Times New Roman",
                        "fontSize": "16",
                        "fontWeight": "normal",
                        "textAlign":"center"
                    }
                },
                {
                    "id": 11,
                    "order": 11,
                    "text": "Para optar por el grado académico de:",
                    "styles": {
                        "fontFamily": "Times New Roman",
                        "fontSize": "16",
                        "fontWeight": "normal",
                        "textAlign":"center"
                    }
                },
                {
                    "id": 12,
                    "order": 12,
                    "text": "GOALDEGREE",
                    "styles": {
                        "fontFamily": "Times New Roman",
                        "fontSize": "16",
                        "fontWeight": "bold",
                        "textAlign":"center"
                    }
                },
                {
                    "id": 13,
                    "order": 13,
                    "text": "TACNA - PERÚ",
                    "styles": {
                        "fontFamily": "Times New Roman",
                        "fontSize": "16",
                        "fontWeight": "normal",
                        "textAlign":"center"
                    }
                },
                {
                    "id": 14,
                    "order": 14,
                    "text": "2019",
                    "styles": {
                        "fontFamily": "Times New Roman",
                        "fontSize": "16",
                        "fontWeight": "normal",
                        "textAlign":"center"
                    }
                }
            ]',
            ], [
                'university_id' => 1,
                'template' => '{
                    "level1": [{
                        "id": 1,
                        "order": 1,
                        "tag": "título del tema",
                        "print": false,
                        "numbered": false,
                        "type": "titleOfResearch",
                        "canContainImages": false,
                            "canContainCitations": true,
                            "canContainTables": false,
                            "values": [],
                        "level2": []
                    }, {
                        "id": 2,
                        "order": 2,
                        "tag": "planteamiento del problema",
                        "print": false,
                        "type": "identificationOfResearchProblem",
                        "canContainImages": false,
                            "canContainCitations": true,
                            "canContainTables": false,
                            "values": [],
                        "level2": []
                    }, {
                        "id": 3,
                        "order": 3,
                        "tag": "formulación del problema",
                        "print": false,
                        "type": "problemFormulation",
                        "canContainImages": false,
                            "canContainCitations": true,
                            "canContainTables": false,
                            "values": [],
                        "level2": [{
                            "id": 1,
                            "order": 1,
                            "type": "generalProblem",
                            "tag": "problema general",
                            "canContainImages": false,
                            "canContainCitations": true,
                            "canContainTables": false,
                            "values": [],
                            "level3": []
                        }, {
                            "id": 2,
                            "order": 2,
                            "type": "specificProblem",
                            "tag": "problemas específicos",
                            "canContainImages": true,
                            "canContainCitations": true,
                            "canContainTables": true,
                            "values": [],
                            "level3": []
                        }]
                    },
                    {
                        "id": 4,
                        "order": 4,
                        "tag": "hipótesis de la investigación",
                        "print": false,
                        "type": "hypothesis",
                        "canContainImages": false,
                            "canContainCitations": true,
                            "canContainTables": false,
                            "values": [],
                        "level2": [{
                            "id": 1,
                            "order": 1,
                            "type": "generalHypothesis",
                            "tag": "hipótesis general",
                            "canContainImages": true,
                            "canContainCitations": true,
                            "canContainTables": true,
                            "values": [],
                            "level3": []
                        }, {
                            "id": 2,
                            "order": 2,
                            "type": "specificHypothesis",
                            "tag": "hipótesis específicas",
                            "canContainImages": false,
                            "canContainCitations": false,
                            "canContainTables": false,
                            "values": [],
                            "level3": []
                        }]
                    },
                    {
                        "id": 5,
                        "order": 5,
                        "tag": "objetivos de la investigación",
                        "print": false,
                        "type": "objetives",
                        "canContainImages": false,
                            "canContainCitations": true,
                            "canContainTables": false,
                            "values": [],
                        "level2": [{
                            "id": 1,
                            "order": 1,
                            "type": "generalObjective",
                            "tag": "objetivo general",
                            "canContainImages": false,
                            "canContainCitations": false,
                            "canContainTables": true,
                            "values": [],
                            "level3": []
                        }, {
                            "id": 2,
                            "order": 2,
                            "type": "specificObjetive",
                            "tag": "objetivos específicos",
                            "canContainImages": false,
                            "canContainCitations": false,
                            "canContainTables": true,
                            "values": [],
                            "level3": []
                        }]
                    }, {
                        "id": 6,
                        "order": 6,
                        "tag": "justificación",
                        "print": false,
                        "type": "justification",
                        "canContainImages": false,
                            "canContainCitations": true,
                            "canContainTables": false,
                            "values": [],
                        "level2": [{
                            "id": 1,
                            "order": 1,
                            "type": "free",
                            "tag": "justificación teórica",
                            "canContainImages": false,
                            "canContainCitations": false,
                            "canContainTables": true,
                            "values": [],
                            "level3": []
                        }, {
                            "id": 2,
                            "order": 2,
                            "type": "free",
                            "tag": "justificación metodológica",
                            "canContainImages": false,
                            "canContainCitations": false,
                            "canContainTables": true,
                            "values": [],
                            "level3": []
                        }, {
                            "id": 2,
                            "order": 2,
                            "type": "free",
                            "tag": "justificación práctica",
                            "canContainImages": false,
                            "canContainCitations": false,
                            "canContainTables": true,
                            "values": [],
                            "level3": []
                        }]
                    }, {
                        "id": 7,
                        "order": 7,
                        "tag": "metodología",
                        "print": false,
                        "type": "dataAnalysis",
                        "canContainImages": false,
                            "canContainCitations": true,
                            "canContainTables": false,
                            "values": [],
                        "level2": []
                    }, {
                        "id": 8,
                        "order": 8,
                        "tag": "definiciones",
                        "print": false,
                        "type": "definitionOfTerms",
                        "canContainImages": false,
                            "canContainCitations": true,
                            "canContainTables": false,
                            "values": [],
                        "level2": []
                    }, {
                        "id": 9,
                        "order": 9,
                        "tag": "alcances y limitaciones",
                        "print": false,
                        "type": "researchLimitations",
                        "canContainImages": false,
                            "canContainCitations": true,
                            "canContainTables": false,
                            "values": [],
                        "level2": []
                    }, {
                        "id": 10,
                        "order": 10,
                        "tag": "cronograma",
                        "print": false,
                        "type": "schedule",
                        "canContainImages": false,
                            "canContainCitations": true,
                            "canContainTables": false,
                            "values": [],
                        "level2": []
                    }, {
                        "id": 11,
                        "order": 11,
                        "tag": "bibliografía",
                        "print": false,
                        "type": "bibliography",
                        "canContainImages": false,
                            "canContainCitations": true,
                            "canContainTables": false,
                            "values": [],
                        "level2": []
                    }
                ]
                }',
                'style' => '{"margins": {
                    "id": 1,
                    "units": "cm",
                    "top": 6,
                    "bottom": 3,
                    "leftHand": 4,
                    "rightHand": 3,
                    "specialMargins": {
                        "specialSections": ["chapter", "introduction"],
                        "top": 7
                    }
                },
                "styles": {
                    "defaultFont": ["Times New Roman", "Arial"],
                    "defaultFontSize": 12,
                    "defaultSpacing": 2,
                    "spaceBefore": true,
                    "defaultIndent": 5,
                    "defaultAlignment": "justify"

                }}',
                'coverPage' => '[{
                    "id": 1,
                    "order": 1,
                    "text": "UNIVERSIDAD NACIONAL JORGE BASADRE GROHMANN - TACNA",
                    "styles": {
                        "fontFamily": "Agency FB",
                        "fontSize": "18",
                        "fontWeight": "bold",
                        "textAlign":"center"
                    }
                },
                {
                    "id": 3,
                    "order": 3,
                    "text": "FACULTYNAME",
                    "styles": {
                        "fontFamily": "Times New Roman",
                        "fontSize": "18",
                        "fontWeight": "bold",
                        "textAlign":"center"
                    }
                },
                {
                    "id": 4,
                    "order": 4,
                    "text": "Escuela Profesional de SCHOOLNAME",
                    "styles": {
                        "fontFamily": "Times New Roman",
                        "fontSize": "16",
                        "fontWeight": "normal",
                        "textAlign":"center"
                    }
                },
                {
                    "id": 6,
                    "order": 6,
                    "text": "TITLE",
                    "styles": {
                        "fontFamily": "Times New Roman",
                        "fontSize": "16",
                        "fontWeight": "bold",
                        "textAlign":"center"
                    }
                },
                {
                    "id": 5,
                    "order": 5,
                    "text": "PROYECTO DE TESIS",
                    "styles": {
                        "fontFamily": "Engravers MT",
                        "fontSize": "18",
                        "fontWeight": "bold",
                        "textAlign":"center"
                    }
                },

                {
                    "id": 7,
                    "order": 7,
                    "text": "Presentada por",
                    "styles": {
                        "fontFamily": "Times New Roman",
                        "fontSize": "16",
                        "fontWeight": "normal",
                        "textAlign":"center"
                    }
                },
                {
                    "id": 8,
                    "order": 8,
                    "text": "CURRENTDEGREE AUTHOR",
                    "styles": {
                        "fontFamily": "Times New Roman",
                        "fontSize": "16",
                        "fontWeight": "normal",
                        "textAlign":"center"
                    }
                },
                {
                    "id": 11,
                    "order": 11,
                    "text": "Para optar por el grado académico de:",
                    "styles": {
                        "fontFamily": "Times New Roman",
                        "fontSize": "16",
                        "fontWeight": "normal",
                        "textAlign":"center"
                    }
                },
                {
                    "id": 12,
                    "order": 12,
                    "text": "GOALDEGREE",
                    "styles": {
                        "fontFamily": "Times New Roman",
                        "fontSize": "16",
                        "fontWeight": "bold",
                        "textAlign":"center"
                    }
                },
                {
                    "id": 13,
                    "order": 13,
                    "text": "TACNA - PERÚ",
                    "styles": {
                        "fontFamily": "Times New Roman",
                        "fontSize": "16",
                        "fontWeight": "normal",
                        "textAlign":"center"
                    }
                },
                {
                    "id": 14,
                    "order": 14,
                    "text": "2019",
                    "styles": {
                        "fontFamily": "Times New Roman",
                        "fontSize": "16",
                        "fontWeight": "normal",
                        "textAlign":"center"
                    }
                }
            ]',
            ], [
                'university_id' => 3,
                'template' => '{
                    "level1": [{
                            "id": 1,
                            "order": 1,
                            "tag": "el problema de la investigación",
                            "print": false,
                            "numbered": false,
                            "type": "chapter",
                            "level2": [{
                                    "id": 1,
                                    "order": 1,
                                    "type": "formulationOfResearchProblem ",
                                    "tag": "Fundamentación del problema",
                                    "canContainImages": false,
                                    "canContainCitations": false,
                                    "canContainTables": false,
                                    "values": [],
                                    "level3": []
                                }, {
                                    "id": 2,
                                    "order": 2,
                                    "type": "problemFormulation",
                                    "tag": "Formulación del problema",
                                    "canContainImages": false,
                                    "canContainCitations": false,
                                    "canContainTables": false,
                                    "values": [],
                                    "level3": [{
                                            "id": 1,
                                            "type": "generalProblem",
                                            "tag": "Problema general",
                                            "values": []
                                        },
                                        {
                                            "id": 2,
                                            "type": "specificProblem",
                                            "tag": "Problemas específicos",
                                            "values": []
                                        }
                                    ]
                                }, {
                                    "id": 3,
                                    "order": 3,
                                    "type": "objetives",
                                    "tag": "Objetivos de la investigación",
                                    "canContainImages": false,
                                    "canContainCitations": false,
                                    "canContainTables": false,
                                    "values": [],
                                    "level3": [{
                                            "id": 1,
                                            "type": "generalObjetive",
                                            "tag": "Objetivo general",
                                            "values": [],
                                            "level4": []
                                        },
                                        {
                                            "id": 2,
                                            "type": "specificObjetive",
                                            "tag": "Objetivos específicos",
                                            "values": [],
                                            "level4": []
                                        }
                                    ]
                                }, {
                                    "id": 4,
                                    "order": 4,
                                    "type": "justification",
                                    "tag": "Justificación",
                                    "canContainImages": false,
                                    "canContainCitations": false,
                                    "canContainTables": false,
                                    "values": [],
                                    "level3": []
                                },
                                {
                                    "id": 5,
                                    "order": 5,
                                    "type": "definitionOfTerms",
                                    "tag": "Definición de términos",
                                    "canContainImages": false,
                                    "canContainCitations": false,
                                    "canContainTables": false,
                                    "values": [],
                                    "level3": []
                                }
                            ]
                        }, {
                            "id": 2,
                            "order": 2,
                            "tag": "revisión bibliográfica",
                            "print": false,
                            "type": "chapter",
                            "level2": [{
                                "id": 1,
                                "order": 1,
                                "type": "antecedents",
                                "tag": "Antecedentes de la investigación",

                                "canContainImages": false,
                                "canContainCitations": true,
                                "canContainTables": false,
                                "values": [],
                                "level3": []
                            }, {
                                "id": 2,
                                "order": 2,
                                "type": "theoricalBases",
                                "tag": "Marco teórico",

                                "canContainImages": false,
                                "canContainCitations": false,
                                "canContainTables": false,
                                "values": [],
                                "level3": []
                            }]
                        }, {
                            "id": 3,
                            "order": 3,
                            "tag": "hipótesis, variables y definiciones operacionales",
                            "print": false,
                            "type": "chapter",
                            "level2": [{
                                "id": 5,
                                "order": 5,
                                "type": "hypothesis",
                                "tag": "Hipótesis",

                                "canContainImages": false,
                                "canContainCitations": false,
                                "canContainTables": false,
                                "values": [],
                                "level3": [{
                                        "id": 1,
                                        "type": "generalHypothesis",
                                        "tag": "Hipótesis general",
                                        "values": [],
                                        "level4": []
                                    },
                                    {
                                        "id": 2,
                                        "type": "specificHypothesis",
                                        "tag": "Hipótesis específicas",
                                        "values": [],
                                        "level4": []
                                    }
                                ]
                            }, {
                                "id": 2,
                                "order": 2,
                                "type": "operationalizationOfVariables",
                                "tag": "Operacionalización de las variables",

                                "canContainImages": true,
                                "canContainCitations": true,
                                "canContainTables": true,
                                "values": [],
                                "level3": []
                            }]
                        },
                        {
                            "id": 4,
                            "order": 4,
                            "tag": "metodología de la investigación",
                            "print": false,
                            "type": "chapter",
                            "level2": [{
                                    "id": 1,
                                    "order": 1,
                                    "type": "designOfResearch",
                                    "tag": "Diseño (clasificación)",
                                    "canContainImages": true,
                                    "canContainCitations": true,
                                    "canContainTables": true,
                                    "values": [],
                                    "level3": []
                                }, {
                                    "id": 2,
                                    "order": 2,
                                    "type": "placeOfResearch",
                                    "tag": "Ámbito de estudio",
                                    "canContainImages": false,
                                    "canContainCitations": false,
                                    "canContainTables": false,
                                    "values": [],
                                    "level3": []
                                },
                                {
                                    "id": 4,
                                    "order": 4,
                                    "type": "populationAndSample",
                                    "tag": "Población y muestra",

                                    "canContainImages": false,
                                    "canContainCitations": true,
                                    "canContainTables": true,
                                    "values": [],
                                    "level3": [{
                                            "id": 1,
                                            "type": "population",
                                            "tag": "Población de estudio",
                                            "values": [],
                                            "level4": []
                                        },
                                        {
                                            "id": 2,
                                            "type": "sample",
                                            "tag": "Muestra de estudio",
                                            "values": [],
                                            "level4": []
                                        }
                                    ]
                                }, {
                                    "id": 3,
                                    "order": 3,
                                    "type": "instruments",
                                    "tag": "Instrumentos de recolección de datos",

                                    "canContainImages": false,
                                    "canContainCitations": true,
                                    "canContainTables": false,
                                    "values": [],
                                    "level3": []
                                },
                                {
                                    "id": 5,
                                    "order": 5,
                                    "type": "dataAnalysis",
                                    "tag": "Tratamiento de datos (análisis estadístico)",

                                    "canContainImages": true,
                                    "canContainCitations": true,
                                    "canContainTables": false,
                                    "values": [],
                                    "level3": []
                                }
                            ]
                        },
                        {

                            "id": 5,
                            "order": 5,
                            "tag": "PROCEDIMIENTOS DE ANÁLISIS DE DATOS",
                            "print": false,
                            "type": "chapter",
                            "level2": [{
                                "id": 1,
                                "order": 1,
                                "type": "dataAnalysis",
                                "tag": "Técnicas de procesamiento y análisis de datos",

                                "canContainImages": false,
                                "canContainCitations": false,
                                "canContainTables": true,
                                "values": [],
                                "level3": []
                            }]

                        },
                        {
                            "id": 5,
                            "order": 5,
                            "tag": "presupuesto",
                            "print": false,
                            "type": "researchBudget",
                            "level2": []
                        }, {
                            "id": 5,
                            "order": 5,
                            "tag": "cronograma",
                            "print": false,
                            "type": "schedule",
                            "level2": []
                        }
                    ]
                }',
                'style' => '{"margins": {
                    "id": 1,
                    "units": "cm",
                    "top": 4,
                    "bottom": 3,
                    "leftHand": 4,
                    "rightHand": 3,
                    "specialMargins": {
                        "specialSections": ["chapter", "introduction"],
                        "top": 7
                    }
                },
                "styles": {
                    "defaultFont": ["Times New Roman", "Arial"],
                    "defaultFontSize": 12,
                    "defaultSpacing": 2,
                    "spaceBefore": true,
                    "defaultIndent": 5,
                    "defaultAlignment": "justify"

                }}',
                'coverPage' => '[{
                    "id": 1,
                    "order": 1,
                    "text": "UNIVERSIDAD PRIVADA DE TACNA",
                    "styles": {
                        "fontFamily": "Agency FB",
                        "fontSize": "18",
                        "fontWeight": "bold",
                        "textAlign":"center"
                    }
                },
                {
                    "id": 3,
                    "order": 3,
                    "text": "FACULTYNAME",
                    "styles": {
                        "fontFamily": "Times New Roman",
                        "fontSize": "18",
                        "fontWeight": "bold",
                        "textAlign":"center"
                    }
                },
                {
                    "id": 4,
                    "order": 4,
                    "text": "Escuela Profesional de SCHOOLNAME",
                    "styles": {
                        "fontFamily": "Times New Roman",
                        "fontSize": "16",
                        "fontWeight": "normal",
                        "textAlign":"center"
                    }
                },
                {
                    "id": 6,
                    "order": 6,
                    "text": "TITLE",
                    "styles": {
                        "fontFamily": "Times New Roman",
                        "fontSize": "16",
                        "fontWeight": "bold",
                        "textAlign":"center"
                    }
                },
                {
                    "id": 5,
                    "order": 5,
                    "text": "PROYECTO DE TESIS",
                    "styles": {
                        "fontFamily": "Engravers MT",
                        "fontSize": "18",
                        "fontWeight": "bold",
                        "textAlign":"center"
                    }
                },

                {
                    "id": 7,
                    "order": 7,
                    "text": "Presentada por",
                    "styles": {
                        "fontFamily": "Times New Roman",
                        "fontSize": "16",
                        "fontWeight": "normal",
                        "textAlign":"center"
                    }
                },
                {
                    "id": 8,
                    "order": 8,
                    "text": "CURRENTDEGREE AUTHOR",
                    "styles": {
                        "fontFamily": "Times New Roman",
                        "fontSize": "16",
                        "fontWeight": "normal",
                        "textAlign":"center"
                    }
                },
                {
                    "id": 11,
                    "order": 11,
                    "text": "Para optar por el grado académico de:",
                    "styles": {
                        "fontFamily": "Times New Roman",
                        "fontSize": "16",
                        "fontWeight": "normal",
                        "textAlign":"center"
                    }
                },
                {
                    "id": 12,
                    "order": 12,
                    "text": "GOALDEGREE",
                    "styles": {
                        "fontFamily": "Times New Roman",
                        "fontSize": "16",
                        "fontWeight": "bold",
                        "textAlign":"center"
                    }
                },
                {
                    "id": 13,
                    "order": 13,
                    "text": "TACNA - PERÚ",
                    "styles": {
                        "fontFamily": "Times New Roman",
                        "fontSize": "16",
                        "fontWeight": "normal",
                        "textAlign":"center"
                    }
                },
                {
                    "id": 14,
                    "order": 14,
                    "text": "2019",
                    "styles": {
                        "fontFamily": "Times New Roman",
                        "fontSize": "16",
                        "fontWeight": "normal",
                        "textAlign":"center"
                    }
                }
            ]',
            ],
        ]);
    }
}
