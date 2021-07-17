<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Shared\Html;
use PhpOffice\PhpWord\SimpleType\Jc;
use PhpOffice\PhpWord\Style\Language;
use PhpOffice\PhpWord\Style\Table;

class ThesisGeneratorController extends Controller
{

    private $phpword;
    public function generateThesis(Request $request)
    {

        $this->phpword = new PhpWord();
        $phpword = $this->phpword;
        define("TWIPTOCM", 566.9283333);
        //language
        $phpword->getSettings()->setThemeFontLang(new Language(Language::ES_ES));
        // Settings::setOutputEscapingEnabled(true);
        //Document Information
        $properties = $phpword->getDocInfo();
        $properties->setCreator('VJJF');
        $properties->setCompany('EasyResearch');
        $properties->setTitle('Tesisya');
        $properties->setDescription('Proyecto de tesis');
        $properties->setSubject('Proyecto de tesis');

        //request
        $coverPage = $request->coverPage;
        $level1Titles = $request->body["level1"];
        $references = $request->references;
        $annexes = $request->annexes;
        $images = $request->images;
        $tables = $request->tables;
        $documentStyles = $request->styles["styles"];
        $documentMargins = $request->styles["margins"];
        //configurations
        $activateRomanChapterTitle = true;
        $capitalizeChaptersTitles = true;

        //Default settings for the document
        //1 Twips to Centimeters = 0.0018
        //1 Centimeter to Twips = 566.9283333
        $defaultPageSettings = array(
            'orientation' => 'portrait',
            'marginTop' => $documentMargins["top"] * TWIPTOCM, //6cm
            'marginLeft' => $documentMargins["leftHand"] * TWIPTOCM, //4cm
            'marginRight' => $documentMargins["rightHand"] * TWIPTOCM, //3cm
            'marginBottom' => $documentMargins["bottom"] * TWIPTOCM, //3cm
            // 'colsNum' => 1,
            // 'spacing' => 2.0,
            // 'lineHeight' => 2.0,
        );

        //Special settings for chapters
        $initChapterSettings = array(
            'orientation' => 'portrait',
            'marginTop' => $documentMargins["specialMargins"]["top"] * TWIPTOCM,
            'marginLeft' => $documentMargins["leftHand"] * TWIPTOCM,
            'marginRight' => $documentMargins["rightHand"] * TWIPTOCM,
            'marginBottom' => $documentMargins["bottom"] * TWIPTOCM,
            'colsNum' => 1,
        );

        $phpword->setDefaultFontName($documentStyles["defaultFont"][0]);
        $phpword->setDefaultFontSize($documentStyles["defaultFontSize"]);

        $phpword->setDefaultParagraphStyle(
            array(
                'alignment' => Jc::BOTH,
                'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(0),
                // 'spacing' => 120,
                'lineHeight' => 2,
            )
        );

        $coverSection = $phpword->addSection($defaultPageSettings);
        $indexSection = $phpword->addSection($defaultPageSettings);
        $imagesIndexSection = $phpword->addSection($defaultPageSettings);
        $tablesIndexSection = $phpword->addSection($defaultPageSettings);
        $footerIndex = $indexSection->addFooter();
        $textRunFooterRoman = $footerIndex->addTextRun(['alignment' => 'center']);
        $textRunFooterRoman->addField('PAGE', ['format' => 'roman']);
        // $indexSection->getStyle()->setPageNumberingStart(1);

        $chapterSections = [];

        //Cover Page

        $textRun = $coverSection->addTextRun(["alignment" => 'center']);
        foreach ($coverPage as $line) {
            $styles = $line["styles"];
            $fontSize = substr($styles["fontSize"], 0, 2);
            if (isset($line["urlLogo"])) {
                $textRun->addImage($line["urlLogo"], array(
                    'width' => 52, //1.96cm
                    'height' => 55, //2.22cm
                    'wrappingStyle' => 'square',
                    'positioning' => 'absolute',
                    'posHorizontal' => \PhpOffice\PhpWord\Style\Image::POSITION_HORIZONTAL_LEFT,
                    'posHorizontalRel' => 'margin',
                    'posVerticalRel' => 'line',
                ));
            }

            $textRun->addText($line["text"], ['name' => $styles["fontFamily"], 'size' => $fontSize, 'bold' => ($styles["fontWeight"] == "bold") ? true : false]);
            $textRun->addTextBreak();
        }
        //Index (TOC)
        $indexSection->addText('Índice', ['bold' => true], ['alignment' => 'center']);
        $mainTOC = $indexSection->addTOC([], ["tabPos" => 14 * TWIPTOCM, 'indent' => 0]);
        $mainTOC->setMinDepth(1);
        $mainTOC->setMaxDepth(4);
        //Index Images
        $imagesIndexSection->addText('Índice de figuras', ['bold' => true], ['alignment' => 'center']);
        $imagesTOC = $imagesIndexSection->addToc([], ["tabPos" => 14 * TWIPTOCM, 'indent' => 0]);
        $imagesTOC->setMinDepth(5);
        $imagesTOC->setMaxDepth(5);
        //Index Tables
        $tablesIndexSection->addText('Índice de tablas', ['bold' => true], ['alignment' => 'center']);
        $tablesTOC = $tablesIndexSection->addToc([], ["tabPos" => 14 * TWIPTOCM, 'indent' => 0, 'alignment' => 'left']);
        $tablesTOC->setMinDepth(6);
        $tablesTOC->setMaxDepth(6);
        //Body
        $phpword->addNumberingStyle(
            'hNum',
            array('type' => 'multilevel', 'levels' => array(
                array('pStyle' => 'Heading1', 'format' => 'decimal'),
                array('pStyle' => 'Heading2', 'format' => 'decimal', 'text' => '%1.%2'),
                array('pStyle' => 'Heading3', 'format' => 'decimal', 'text' => '%1.%2.%3'),
                array('pStyle' => 'Heading4', 'format' => 'decimal', 'text' => '%1.%2.%3.%4'),
                array('pStyle' => 'Heading5', 'format' => 'decimal'),
                array('pStyle' => 'Heading6', 'format' => 'decimal'),
            ),
            )
        );
        // $phpword->addTitleStyle(1, array('size' => 12, 'bold' => true), array('numStyle' => 'hNum', 'numLevel' => 0, 'alignment' => 'center'));
        $phpword->addTitleStyle(1, array('size' => 12, 'bold' => true), array('numStyle' => 'hNum', 'numLevel' => 0, 'alignment' => 'center'));
        $phpword->addTitleStyle(2, array('size' => 12, 'bold' => true), array('numStyle' => 'hNum', 'numLevel' => 1));
        $phpword->addTitleStyle(3, array('size' => 12, 'bold' => true), array('numStyle' => 'hNum', 'numLevel' => 2));
        $phpword->addTitleStyle(4, array('size' => 12, 'bold' => true), array('numStyle' => 'hNum', 'numLevel' => 3));
        $phpword->addTitleStyle(5, array('name' => 'Arial', 'size' => 10, 'bold' => false), array('numStyle' => 'hNum', 'numLevel' => 4, 'indentation' => array('firstline' => 3.400 * TWIPTOCM)));
        $phpword->addTitleStyle(6, array('name' => 'Arial', 'size' => 10, 'bold' => false), array('numStyle' => 'hNum', 'numLevel' => 5, 'alignment' => 'left'));

        $textRun2 = $coverSection->addTextRun(["alignment" => 'center']);

        $imageOrder = 0;
        // $chapterSections[$i] = $phpword->addSection($initChapterSettings);
        for ($i = 0; $i < count($level1Titles); $i++) {
            array_push($chapterSections, $phpword->addSection($initChapterSettings));
            $chapterSections[$i]->addTitle($this->styleChapterTitle($level1Titles[$i]["tag"], $i, $activateRomanChapterTitle, $capitalizeChaptersTitles), 1);
            //print level 1 values
            $level1Values = $level1Titles[$i]["values"];
            for ($k = 0; $k < count($level1Values); $k++) {
                if ($level1Values[$k]['type'] == 'text') {
                    $this->insertParagraph($chapterSections[$i], $level1Values[$k]["text"], $level1Values[$k]["citations"], $references);
                }
                if ($level1Values[$k]['type'] == 'image') {
                    $imageOrder++;
                    $this->insertImage($chapterSections[$i], $level1Values[$k], $images, $references, $imageOrder);
                }
                // if ($level1Values[$k]['type'] == 'table') {
                //     switch ($level2Titles[$j]["type"]) {
                //         case 'schedule':
                //             $this->generateSchedule($chapterSections[$i], $level1Values[$k]["scheduleBody"]);
                //             break;
                //         default:
                //             $this->insertTable($chapterSections[$i], $level1Values[$k], $tables, $references);
                //             break;
                //     }
                // }
            }
            //level2
            $level2Titles = $level1Titles[$i]["level2"];
            for ($j = 0; $j < count($level2Titles); $j++) { //print level 2
                $chapterSections[$i]->addTitle($level2Titles[$j]["tag"], 2);
                if (count($level2Titles[$j]["level3"]) > 0) {
                    $level3Titles = $level2Titles[$j]["level3"];
                    for ($k = 0; $k < count($level3Titles); $k++) { // print level 3
                        $chapterSections[$i]->addTitle($level3Titles[$k]["tag"], 3);
                        if (count($level3Titles[$k]["level4"]) > 0) {
                            $level4Titles = $level3Titles[$k]["level4"];
                            for ($l = 0; $l < count($level4Titles); $l++) { //print level 4
                                $chapterSections[$i]->addTitle($level4Titles[$l]["tag"], 4);
                                $level4Values = $level4Titles[$l]["values"];
                                for ($n = 0; $n < count($level4Values); $n++) { //print level 4 values
                                    if ($level4Values[$n]['type'] == 'text') {
                                        $this->insertParagraph($chapterSections[$i], $level4Values[$n]['text'], $level4Values[$n]['citations'], $references);

                                    }
                                    if ($level4Values[$n]['type'] == 'image') {
                                        $imageOrder++;
                                        $this->insertImage($chapterSections[$i], $level4Values[$n], $images, $references, $imageOrder);

                                    }
                                    if ($level4Values[$n]['type'] == 'table') {
                                        $this->insertTable($chapterSections[$i], $level4Values[$n], $tables, $references);
                                    }
                                }
                            }
                        } else {
                            $level3Values = $level3Titles[$k]["values"];
                            for ($m = 0; $m < count($level3Values); $m++) {
                                // $chapterSections[$i]->addText(htmlspecialchars($level3Titles[$k]["values"][$m]["text"]), [], ['indentation' => array('firstline' => 1.25 * TWIPTOCM) /*Segun Apa 1 Tab o 5 espacios */]);
                                if ($level3Values[$m]['type'] == 'text') {
                                    $this->insertParagraph($chapterSections[$i], $level3Titles[$k]['values'][$m]['text'], $level3Titles[$k]['values'][$m]['citations'], $references);
                                }
                                if ($level3Values[$m]['type'] == 'image') {
                                    $imageOrder++;
                                    $this->insertImage($chapterSections[$i], $level3Values[$m], $images, $references, $imageOrder);

                                }
                                if ($level3Values[$m]['type'] == 'table') {
                                    $this->insertTable($chapterSections[$i], $level3Values[$m], $tables, $references);
                                }
                            }
                            if (count($level3Values) == 0) {
                                $this->insertParagraph($chapterSections[$i], "", [], $references);
                            }
                        }

                    }
                } else {
                    $level2Values = $level2Titles[$j]["values"];
                    // dump($level2Titles[$j]);
                    for ($k = 0; $k < count($level2Values); $k++) {
                        if ($level2Values[$k]['type'] == 'text') {
                            $this->insertParagraph($chapterSections[$i], $level2Values[$k]["text"], $level2Values[$k]["citations"], $references);
                        }
                        if ($level2Values[$k]['type'] == 'image') {
                            $imageOrder++;
                            $this->insertImage($chapterSections[$i], $level2Values[$k], $images, $references, $imageOrder);
                        }
                        if ($level2Values[$k]['type'] == 'table') {
                            switch ($level2Titles[$j]["type"]) {
                                case 'schedule':
                                    $this->generateSchedule($chapterSections[$i], $level2Values[$k]["scheduleBody"]);
                                    break;
                                default:
                                    $this->insertTable($chapterSections[$i], $level2Values[$k], $tables, $references);
                                    break;
                            }
                        }
                    }
                    if (count($level2Values) == 0) {
                        $this->insertParagraph($chapterSections[$i], "", [], $references);
                    }
                }

            }
        }

        //References and Annexes

        $referencesSection = $phpword->addSection($defaultPageSettings);

        $referencesSection->addTitle("REFERENCIAS BIBLIOGRÁFICAS", 1);

        for ($i = 0; $i < count($references); $i++) {
            if ($references[$i]["qty"] > 0) {
                $referencesSection->addText(htmlspecialchars($references[$i]["formated"]), [], ['spaceAfter' => true, 'indentation' => array('hanging' => 1.25 * TWIPTOCM)]);
            }
        }
        //Annexes
        $annexGlobalTitle = $phpword->addSection($defaultPageSettings);
        $annexGlobalTitle->addTitle("ANEXOS", 1);
        $annexesSection = [];
        // array_push($annexesSection, $phpword->addSection($defaultPageSettings)); //title section
        // array_push($annexesSection, $phpword->addSection(['orientation' => 'landscape'])); //matrix section
        // array_push($annexesSection, $phpword->addSection($defaultPageSettings)); //rest of elements
        for ($p = 0; $p < count($annexes); $p++) {
            $annex = $annexes[$p];
            array_push($annexesSection, $phpword->addSection($defaultPageSettings));
            $annexesSection[$p]->addTitle('Anexo ' . ($p + 1), 1);
            $annexesSection[$p]->addTitle($annex['tag'], 1);
            if ($annex['type'] == 'consistencyMatrix') {
                if ($annex['values']) {
                    $this->generateResearchMatrix($annexesSection[$p], $annex['values']['matrixContentToWord']);
                } else {
                    $annexesSection[$p]->addText("Aún no generaste tu matriz de consistencia en el sistema, recuerda darle click al botón 'Guardar Cambios'");
                }

            }
            if ($annex['type'] == 'operationalizationMatrix') {
                if ($annex['values']['variables']) {
                    $this->generateOperationalizationMatrix($annexesSection[$p], $annex['values']['variables'], $annex['values']['headers']);
                } else {
                    $annexesSection[$p]->addText("Aún no generaste tu matriz de operacionalización de variables, recuerda darle click al botón 'Guardar Cambios'");
                }

            }
        }

        //add number page
        $footer = $chapterSections[$i]->addFooter();
        $textRunFooterRoman = $footer->addTextRun(['alignment' => 'center']);
        $textRunFooterRoman->addField('PAGE', ['format' => 'Arabic']);

        $objectWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpword, 'Word2007');

        try {
            $objectWriter->save(storage_path('TestWordFile.docx'));
        } catch (Exception $e) {

        }

        return response()->download(storage_path('TestWordFile.docx'))->deleteFileAfterSend(true);
    }
    private function insertParagraph($section, $text, $citations, $references)
    {
        if (count($citations) > 0) {
            foreach ($citations as $citation) {
                $currentReference = [];
                foreach ($references as $index => $reference) {
                    if ($reference["id"] == $citation["referenceId"]) {
                        $currentReference = $references[$index];
                    }
                }
                $text = str_replace($citation["id"], $this->getCitation($currentReference, $citation["typeOfCitation"]), $text);
            }
        }
        // $section->addText(htmlspecialchars($text), [], ['indentation' => array('firstline' => 1.25 * TWIPTOCM) /*Segun Apa 1 Tab o 5 espacios */]);
        Html::addHtml($section, $text);
    }

    private function styleChapterTitle($chapterTitle, $index, $activateRomanChapterTitle, $capitalizeChaptersTitles)
    {
        $title = $chapterTitle;
        $romanNumber = '';
        switch ($index) {
            case 0:
                $romanNumber = 'I';
                break;
            case 1:
                $romanNumber = 'II';
                break;
            case 2:
                $romanNumber = 'III';
                break;
            case 3:
                $romanNumber = 'IV';
                break;
            case 4:
                $romanNumber = 'V';
                break;
            case 5:
                $romanNumber = 'VI';
                break;
            case 6:
                $romanNumber = 'VII';
                break;
            case 7:
                $romanNumber = 'VIII';
                break;
            case 8:
                $romanNumber = 'IX';
                break;
            case 9:
                $romanNumber = 'X';
                break;
            case 10:
                $romanNumber = 'XI';
                break;
            default:
                $romanNumber = 'XII';
                break;
        }
        if ($capitalizeChaptersTitles) {
            $title = ucfirst($title);
        }
        if ($activateRomanChapterTitle) {
            $title = 'Capítulo <w:br/>' . $romanNumber . ' ' . $title;
        }

        return $title;
    }
    private function insertImage($section, $image, $images, $references, $order)
    {

        $idGlobal = $image["idGlobalImage"];
        $position = array_search($idGlobal, array_column($images, 'id'));
        $image = $images[$position];
        $path = public_path() . $image['path'];
        $section->addImage($path, ['alignment' => 'center', 'width' => 7 * 28.256, 'heigth' => 200]);

        // $section->addTitle('Figura ' . ($position + 1) . '. ' . htmlspecialchars($image["title"]), 5);
        $section->addTitle('Figura ' . $order . '. ' . htmlspecialchars($image["title"]), 5);
        //     $section->addText('<w:p>
        //     <w:pPr>
        //         <w:pStyle w:val="Descripcin"/>
        //     </w:pPr>
        //     <w:r>
        //         <w:t xml:space="preserve">Figura </w:t>
        //     </w:r>
        //     <w:fldSimple w:instr=" SEQ Figura \* ARABIC ">
        //         <w:r>
        //             <w:rPr>
        //                 <w:noProof/>
        //             </w:rPr>
        //             <w:t>' . ($position + 1) . '</w:t>
        //         </w:r>
        //     </w:fldSimple>
        //     <w:r>
        //         <w:t> ' . htmlspecialchars($image["title"]) . '</w:t>
        //     </w:r>
        // </w:p>', ['bold' => true], ['alignment' => 'center']);
        if ($image["takenFrom"] != "OWN") {
            $currentReference = [];
            foreach ($references as $index => $reference) {
                if ($reference["id"] == $image["takenFrom"]) {
                    $currentReference = $references[$index];
                }
            }
            $section->addText('Fuente: ' . htmlspecialchars($this->getCitation($currentReference, 1)), array('name' => 'Arial', 'size' => 10, 'bold' => false), array('numStyle' => 'hNum', 'numLevel' => 4, 'indentation' => array('firstline' => 3.400 * TWIPTOCM)));

        } else {
            $section->addText('Fuente: Elaboración propia', array('name' => 'Arial', 'size' => 10, 'bold' => false), array('numStyle' => 'hNum', 'numLevel' => 4, 'indentation' => array('firstline' => 3.400 * TWIPTOCM)));
        }
        return $section;
    }

    private function insertTable($section, $table, $tables, $references)
    {
        $idGlobal = $table['idGlobalTable'];
        $position = array_search($idGlobal, array_column($tables, 'id'));
        $table = $tables[$position];
        $tableValues = $table["tableValues"];
        $title = 'Tabla ' . ($position + 1) . '<w:br/>' . htmlspecialchars($table["title"]);
        $takenFrom = $table["takenFrom"];
        $dataTable = $table['tableValues'];
        $styleTable = array('alignment' => 'center', 'width' => 100);
        $styleFirstRow = [
            'valign' => 'center',
            'cellMargin' => 80,
            'borderTopColor' => '#000000',
            'borderTopSize' => 6,
            'borderRightColor' => '#ffffff',
            'borderRightSize' => 6,
            'borderBottomColor' => '#000000',
            'borderBottomSize' => 6,
            'borderLeftColor' => '#ffffff',
            'borderLeftSize' => 6,
        ];
        $table_style = new Table;
        $table_style->setUnit(Table::WIDTH_PERCENT);
        $table_style->setWidth(70 * 50);
        $table_style->setAlignment('center');
        $styleCell = array('valign' => 'center');
        $styleCellBTLR = array('valign' => 'center', 'textDirection' => \PhpOffice\PhpWord\Style\Cell::TEXT_DIR_BTLR);
        $paragraphStyle = array('alignment' => 'center', 'lineHeight' => 1.15);
        // adding title
        $section->addTitle($title, 6);
        // adding table
        $table = $section->addTable($table_style);
        $table->addRow(900);
        for ($i = 0; $i < count($dataTable[0]); $i++) {
            $table->addCell(2000, $styleFirstRow)->addText(htmlspecialchars($dataTable[0][$i]), ['bold' => true], $paragraphStyle);
        }

        $styleCell =
            [
            'cellMargin' => 80,
            'valign' => 'center',
            'borderTopColor' => '#ffffff',
            'borderTopSize' => 6,
            'borderRightColor' => '#ffffff',
            'borderRightSize' => 6,
            'borderBottomColor' => '#ffffff',
            'borderBottomSize' => 6,
            'borderLeftColor' => '#ffffff',
            'borderLeftSize' => 6,
        ];
        for ($i = 1; $i < count($dataTable); $i++) {
            $table->addRow(200, $styleFirstRow);
            if ($i == count($dataTable) - 1) {
                $styleCell =
                    [
                    'cellMargin' => 80,
                    'valign' => 'center',
                    'borderTopColor' => '#ffffff',
                    'borderTopSize' => 6,
                    'borderRightColor' => '#ffffff',
                    'borderRightSize' => 6,
                    'borderBottomColor' => '#000000',
                    'borderBottomSize' => 6,
                    'borderLeftColor' => '#ffffff',
                    'borderLeftSize' => 6,
                ];
            }
            for ($j = 0; $j < count($dataTable[$i]); $j++) {
                $table->addCell(2000, $styleCell)->addText(htmlspecialchars($dataTable[$i][$j]), [], $paragraphStyle);
            }

        }
        // $textRun3 = new TextRun();

        if ($takenFrom != "OWN") {
            $currentReference = [];
            foreach ($references as $index => $reference) {
                if ($reference["id"] == $takenFrom) {
                    $currentReference = $references[$index];
                }
            }
            // dump($this->getCitation($currentReference, 1));
            //adding taken from
            $section->addText('Fuente: ' . htmlspecialchars($this->getCitation($currentReference, 1)), [], []);
        } else {
            $section->addText('Fuente: Elaboración propia', array('name' => 'Arial', 'size' => 10, 'bold' => false), array('numStyle' => 'hNum', 'numLevel' => 4, 'indentation' => array('firstline' => 3.400 * TWIPTOCM)));
        }
        return $section;
    }
    private function generateOperationalizationMatrix($section, $variables, $headers)
    {
        $styleTable = array('alignment' => 'center', 'width' => 100);
        $styleFirstRow = [
            'valign' => 'center',
            'cellMargin' => 80,
            'borderTopColor' => '#000000',
            'borderTopSize' => 6,
            'borderRightColor' => '#000000',
            'borderRightSize' => 6,
            'borderBottomColor' => '#000000',
            'borderBottomSize' => 6,
            'borderLeftColor' => '#000000',
            'borderLeftSize' => 6,
        ];
        $table_style = new Table;
        $table_style->setUnit(Table::WIDTH_PERCENT);
        $table_style->setWidth(100 * 50);
        $table_style->setAlignment('center');
        $styleCell = array('valign' => 'center');
        $styleCellBTLR = array('valign' => 'center', 'textDirection' => \PhpOffice\PhpWord\Style\Cell::TEXT_DIR_BTLR);
        $paragraphStyle = array('alignment' => 'center', 'lineHeight' => 1.15, 'spaceAfter' => 0);
        //config
        $cellRowSpan = array('vMerge' => 'restart', ['valign' => 'center']);
        $cellRowSpan = array_merge($cellRowSpan, $styleFirstRow);
        //fn
        $cellRowContinue = array('vMerge' => 'continue', 'valign' => 'center');
        $cellRowContinue = array_merge($cellRowContinue, $styleFirstRow);
        //adding tables for each variable
        foreach ($variables as $variable) {
            $section->addText('Tabla de operacionalización de la variable: ' . $variable['value']);
            //insetando cabeceras
            // adding table - primera dimension e indicadores
            $table = $section->addTable($table_style);
            $rowSize = 1500;
            $cellSize = 3000;
            $table->addRow();
            foreach ($headers as $header) {
                $table->addCell($cellSize, $styleFirstRow)->addText($header['tag'], ['bold' => true], $paragraphStyle);
            }
            $table->addRow();
            $table->addCell($cellSize, $cellRowSpan)->addText($variable['value'], [], $paragraphStyle);
            $table->addCell($cellSize, $styleFirstRow)->addText($variable['dimensions'][0]['value'], [], $paragraphStyle);
            $indicatorCell = $table->addCell($cellSize, $styleFirstRow);
            foreach ($variable['dimensions'][0]['indicators'] as $indicator) {
                // $indicatorCell->addListItem(htmlspecialchars($indicator['value']), 0, null, ListItem::TYPE_BULLET_EMPTY);
                $indicatorCell->addText('- ' . $indicator['value']);
            }
            $table->addCell($cellSize, $styleFirstRow)->addText('Items 5 y 6', [], $paragraphStyle);
            //añadiendo el resto de dimensiones
            for ($i = 1; $i < count($variable['dimensions']); $i++) {
                $table->addRow();
                $table->addCell($cellSize, $cellRowContinue);
                $table->addCell($cellSize, $styleFirstRow, $styleFirstRow)->addText($variable['dimensions'][$i]['value'], [], $paragraphStyle);
                $indicatorCell2 = $table->addCell($cellSize, $styleFirstRow);
                foreach ($variable['dimensions'][$i]['indicators'] as $indicator) {
                    $indicatorCell2->addText('- ' . $indicator['value']);
                }
                $table->addCell($cellSize, $styleFirstRow)->addText('Items 5 y 6', [], $paragraphStyle);
            }

        }
        return $section;
        //bullet list with styles
        //         $phpWord->addFontStyle('myOwnStyle', array('color' => 'FF0000'));
        // $phpWord->addParagraphStyle('P-Style', array('spaceAfter' => 95));
        // $predefinedMultilevel = array('color' => 'FF0000', 'listType' => \PhpOffice\PhpWord\Style\ListItem::TYPE_BULLET_EMPTY);

// $section->addText('Predefined list.'));
        // $section->addListItem('List Item 1'), 0, 'myOwnStyle', $predefinedMultilevel, 'P-Style');
    }
    private function getCitation($referenceObject, $formatType)
    {
        $spaceIndex;
        $partialCite = "";
        $cite = "";
        if ($referenceObject) {
            for ($i = 0; $i < count($referenceObject["authors"]); $i++) {
                $author = $referenceObject["authors"][$i];
                $spaceIndex = strrpos($author["lastname"], ' ') == true ? strrpos($author["lastname"], ' ') : strlen($author["lastname"]);
                // dump(count($referenceObject["authors"]));
                $partialCite = $partialCite . substr($author["lastname"], 0, $spaceIndex) . $this->evaluateSymbol(count($referenceObject["authors"]), $i + 1);
            }
            switch ($formatType) {
                case 1:
                    $cite = "(" . $partialCite . "," . " " . $referenceObject["year"] . ")";
                    break;
                case 2:
                    $cite = $partialCite . "(" . $referenceObject["year"] . ")";
                    break;
                default:
                    break;
            }

        } else {
            $cite = "Referencia indefinida";
        }
        return $cite;
    }
    private function evaluateSymbol($authorsLength, $index)
    {
        $symbol = "";
        if ($index < $authorsLength) {
            switch ($authorsLength) {
                case 2:
                    $symbol = " & ";
                    break;
                default:
                    if ($index == $authorsLength - 1) {
                        $symbol = " & ";
                    } else {
                        $symbol = ", ";
                    }
                    break;
            }
        }
        return $symbol;
    }
    private function generateResearchMatrix($section, $matrix)
    {
        // $styleTable = array('borderSize' => 6, 'borderColor' => '999999');
        // $this->phpword->addTableStyle('Colspan Rowspan', $styleTable);
        // $table = $section->addTable('Colspan Rowspan');
        // $row = $table->addRow();
        // $cellSize = 3000;
        // $cellTitleStyles = [['bold' => true, 'size' => 8], ['alignment' => 'center', 'lineHeight' => 2]];
        // $cellElementsStyles = [['size' => 8], ['alignment' => 'both', 'lineHeight' => 1.15]];
        // $row->addCell($cellSize)->addText('Formulación del problema', $cellTitleStyles[0], $cellTitleStyles[1]);
        // $row->addCell($cellSize)->addText('Objetivos', $cellTitleStyles[0], $cellTitleStyles[1]);
        // $row->addCell($cellSize)->addText('Hipótesis', $cellTitleStyles[0], $cellTitleStyles[1]);
        // $row->addCell($cellSize, ['gridSpan' => 2])->addText('Variables', $cellTitleStyles[0], $cellTitleStyles[1]);

        // for ($i = 0; $i < count($matrix); $i++) { //recorre filas
        //     $row = $table->addRow();
        //     for ($j = 0; $j < 5; $j++) { //recorre columna
        //         if ($matrix[$i][$j]['type'] == 'nonVariable') {
        //             $cell = $row->addCell($cellSize, ['vMerge' => 'restart']);
        //             $cell->addText($matrix[$i][$j]['title1']['tag'], $cellTitleStyles[0], $cellTitleStyles[1]);
        //             $cell->addText($matrix[$i][$j]['title1']['value'], $cellElementsStyles[0], $cellElementsStyles[1]);
        //             $cell->addText($matrix[$i][$j]['title2']['tag'], $cellTitleStyles[0], $cellTitleStyles[1]);
        //             foreach ($matrix[$i][$j]['title2']['values'] as $element) {
        //                 $cell->addText('- ' . $element['value'], $cellElementsStyles[0], $cellElementsStyles[1]);
        //             }
        //         }
        //         if ($matrix[$i][$j]['type'] == 'variableName') {
        //             $row->addCell($cellSize, ['gridSpan' => 2])->addText($matrix[$i][$j]['value'], $cellTitleStyles[0], $cellTitleStyles[1]);
        //         }
        //         if ($matrix[$i][$j]['type'] == 'variable') {
        //             if (isset($matrix[$i][$j]['value'])) {
        //                 $row->addCell($cellSize)->addText($matrix[$i][$j]['value'], $cellTitleStyles[0], $cellTitleStyles[1]);

        //             } else {
        //                 $cell = $row->addCell($cellSize);
        //                 foreach ($matrix[$i][$j]['values'] as $indicator) {
        //                     $cell->addText('- ' . $indicator['value'], $cellElementsStyles[0], $cellElementsStyles[1]);
        //                 }
        //             }
        //         }
        //         if ($i != 0 && $j < 3) {
        //             $row->addCell($cellSize, ['vMerge' => 'continue']); // there is a bug if I use is_null or empty "table get broken"

        //         }
        //     }
        // }

        return $section;
    }
    private function generateSchedule($section, $schedule)
    {
        // sizes
        $cellSizeActivityNumber = 700;
        $cellSizeWeek = 1000;
        $cellSizeActivity = 5000;
        $cellSizeMonth = 4000;
        //styles
        $styleTable = array('borderSize' => 6, 'borderColor' => '999999');
        $this->phpword->addTableStyle('Colspan Rowspan', $styleTable);
        $table = $section->addTable('Colspan Rowspan');
        $cellElementsStyles = [[], ['alignment' => 'left', 'lineHeight' => 1.15]];
        //generating schedule
        $newSchedule = $this->setMonthAndColor($schedule);
        $row = $table->addRow();
        $cellTitleStyles = [['bold' => true], ['alignment' => 'center', 'lineHeight' => 2]];
        $row->addCell($cellSizeActivityNumber, ['vMerge' => 'restart'])->addText('Nro', $cellTitleStyles[0], $cellTitleStyles[1]);
        $row->addCell($cellSizeActivity, ['vMerge' => 'restart'])->addText('Actividad', $cellTitleStyles[0], $cellTitleStyles[1]);
        foreach ($newSchedule["months"] as $month) {
            $row->addCell($cellSizeMonth, ['gridSpan' => 4])->addText($this->getMonth($month), $cellTitleStyles[0], $cellTitleStyles[1]);
        }
        $row = $table->addRow();
        $row->addCell($cellSizeWeek, ['vMerge' => 'continue']);
        $row->addCell($cellSizeActivity, ['vMerge' => 'continue']);
        foreach ($newSchedule["months"] as $month) {
            $row->addCell($cellSizeWeek)->addText('1', $cellElementsStyles[0], $cellElementsStyles[1]);
            $row->addCell($cellSizeWeek)->addText('2', $cellElementsStyles[0], $cellElementsStyles[1]);
            $row->addCell($cellSizeWeek)->addText('3', $cellElementsStyles[0], $cellElementsStyles[1]);
            $row->addCell($cellSizeWeek)->addText('4', $cellElementsStyles[0], $cellElementsStyles[1]);
        }
        for ($i = 0; $i < count($schedule); $i++) {
            $activity = $schedule[$i];
            $row = $table->addRow();
            $row->addCell($cellSizeActivityNumber)->addText($activity["id"] + 1, $cellElementsStyles[0], $cellElementsStyles[1]);
            $row->addCell($cellSizeActivity)->addText($activity["name"], $cellElementsStyles[0], $cellElementsStyles[1]);
            foreach ($newSchedule["weekColors"][$i] as $weekColor) {
                if ($weekColor == 0) {
                    $row->addCell($cellSizeWeek);
                } else {
                    $row->addCell($cellSizeWeek, array('bgColor' => '#6086B8'));
                }
            }
        }

        // for ($i = 0; $i < count($matrix); $i++) { //recorre filas
        //     $row = $table->addRow();
        //     for ($j = 0; $j < 5; $j++) { //recorre columnas
        //         if ($matrix[$i][$j]['type'] == 'nonVariable') {
        //             $cell = $row->addCell($cellSize, ['vMerge' => 'restart']);
        //             $cell->addText($matrix[$i][$j]['title1']['tag'], $cellTitleStyles[0], $cellTitleStyles[1]);
        //             $cell->addText($matrix[$i][$j]['title1']['value'], [], $cellElementsStyles[0]);
        //             $cell->addText($matrix[$i][$j]['title2']['tag'], $cellTitleStyles[0], $cellTitleStyles[1]);
        //             foreach ($matrix[$i][$j]['title2']['values'] as $element) {
        //                 $cell->addText('- ' . $element['value'], [], $cellElementsStyles[0]);
        //             }
        //         }
        //         if ($matrix[$i][$j]['type'] == 'variableName') {
        //             $row->addCell($cellSize, ['gridSpan' => 2])->addText($matrix[$i][$j]['value'], $cellTitleStyles[0], $cellTitleStyles[1]);
        //         }
        //         if ($matrix[$i][$j]['type'] == 'variable') {
        //             if (isset($matrix[$i][$j]['value'])) {
        //                 $row->addCell($cellSize)->addText($matrix[$i][$j]['value']);

        //             } else {
        //                 $cell = $row->addCell($cellSize);
        //                 foreach ($matrix[$i][$j]['values'] as $indicator) {
        //                     $cell->addText('- ' . $indicator['value'], [], $cellElementsStyles[0]);
        //                 }
        //             }
        //         }
        //         if ($i != 0 && $j < 3) {
        //             $row->addCell($cellSize, ['vMerge' => 'continue']); // there is a bug if I use is_null or empty "table get broken"

        //         }
        //     }
        // }

        return $section;
    }
    private function setMonthAndColor($schedule)
    {
        //generating months name and what weeks need to be bgcolor
        $months = [];
        $weekColors = [];
        $result = [];
        $explodedStartingDate;
        $explodedFinishingDate;
        foreach ($schedule as $activity) {
            $startingMonthNumber = $this->getMonthNumber($activity["startingDate"]);
            $finishingMonthNumber = $this->getMonthNumber($activity["finishingDate"]);
            if (!in_array($startingMonthNumber, $months)) {
                array_push($months, $startingMonthNumber);
            }
            if (!in_array($finishingMonthNumber, $months)) {
                array_push($months, $finishingMonthNumber);
            }

        }
        sort($months); //sorting array of months
        //filling intermediate months
        $lastIndex = count($months) - 1;
        if (($months[$lastIndex] - $months[0] + 1) != count($months)) {
            $newMonths = [];
            for ($i = $months[0]; $i <= $months[$lastIndex]; $i++) {
                array_push($newMonths, $i);
            }
            $months = $newMonths;
        }
        for ($i = 0; $i < count($schedule); $i++) {
            $row = [];
            $startingMonthNumber = $this->getMonthNumber($schedule[$i]["startingDate"]);
            $finishingMonthNumber = $this->getMonthNumber($schedule[$i]["finishingDate"]);
            $startingDay = explode("-", $schedule[$i]["startingDate"])[2] + 0;
            $finishingDay = explode("-", $schedule[$i]["finishingDate"])[2] + 0;
            $centinelStartingDay = 0;
            $centinelFinishingDay = 0;
            $startingMonthIndex = array_search($startingMonthNumber, $months);
            $finishingMonthIndex = array_search($finishingMonthNumber, $months);
            for ($j = 0; $j < (count($months) * 4); $j++) {
                // echo "startingDay:$startingDay y dia final:$finishingDay ";
                $cellColor = 0;
                if (($j >= $startingMonthIndex * 4) && $centinelFinishingDay == 0) { //starting from initial month
                    if (($j + 4) % 4 == 0) {
                        if ($startingDay <= 7) {
                            $centinelStartingDay = 1;
                        }
                    }
                    if (($j + 3) % 4 == 0) {
                        if (($startingDay > 7 && $startingDay <= 14)) {
                            // echo "En la iteracion [$i]$j se cumplio la condicion 2 ";
                            $centinelStartingDay = 1;
                        }
                    }
                    if (($j + 2) % 4 == 0) {
                        if (($startingDay > 14 && $startingDay <= 21)) {
                            // echo "En la iteracion [$i]$j se cumplio la condicion 3 ";
                            $centinelStartingDay = 1;
                        }
                    }
                    if (($j + 1) % 4 == 0) {
                        if (($startingDay > 22 && $startingDay <= 31)) {
                            // echo "En la iteracion [$i]$j se cumplio la condicion 4 ";
                            $centinelStartingDay = 1;
                        }
                    }
                    if ($centinelStartingDay == 1) {
                        $cellColor = 1;
                    }
                    // echo " esto " . ($finishingMonthIndex * 4) . " y " . ($finishingMonthIndex * 4 + 4);
                    if (($j >= $finishingMonthIndex * 4) && ($centinelStartingDay == 1)) {
                        if (($j + 4) % 4 == 0) {
                            if ($finishingDay <= 7) {
                                $centinelFinishingDay = 1;
                            }
                        }
                        if (($j + 3) % 4 == 0) {
                            if (($finishingDay > 7 && $finishingDay <= 14)) {
                                $centinelFinishingDay = 1;
                            }
                        }
                        if (($j + 2) % 4 == 0) {
                            if (($finishingDay > 14 && $finishingDay <= 21)) {
                                $centinelFinishingDay = 1;
                            }
                        }
                        if (($j + 1) % 4 == 0) {
                            if (($finishingDay > 22 && $finishingDay <= 31)) {
                                $centinelFinishingDay = 1;
                            }
                        }
                        if ($centinelFinishingDay == 1) {
                            $centinelStartingDay = 1;
                        }
                    }

                } else {
                    $cellColor = 0;
                }
                array_push($row, $cellColor);
                // echo "Se pintara la celda de $cellColor";

            }
            array_push($weekColors, $row);

        }
        // foreach ($schedule as $activity) {
        //     $row = [];

        // }
        // $date1 = explode("-", $startingDate); //year-month-day
        // $date2 = explode("-", $finishingDate);
        $result = ["months" => $months, "weekColors" => $weekColors];
        return $result;
    }
    private function getMonth($month)
    {
        $result;
        if (isset($month)) {
            switch ($month) {
                case 1:
                    $result = "Enero";
                    break;
                case 2:
                    $result = "Febrero";
                    break;
                case 3:
                    $result = "Marzo";
                    break;
                case 4:
                    $result = "Abril";
                    break;
                case 5:
                    $result = "Mayo";
                    break;
                case 6:
                    $result = "Junio";
                    break;
                case 7:
                    $result = "Julio";
                    break;
                case 8:
                    $result = "Agosto";
                    break;
                case 9:
                    $result = "Septiembre";
                    break;
                case 10:
                    $result = "Octubre";
                    break;
                case 11:
                    $result = "Noviembre";
                    break;
                case 12:
                    $result = "Diciembre";
                    break;
                default:
                    echo "Mes no válido";
                    break;
            }
        } else {
            return "Mes no definido";
        }

        return $result;
    }
    private function getMonthNumber($date)
    {
        return explode("-", $date)[1] + 0;
    }
}
