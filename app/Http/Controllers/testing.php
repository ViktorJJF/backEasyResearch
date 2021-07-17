<?php

namespace App\Http\Controllers;

use PhpOffice\PhpWord\Element\Text;
use PhpOffice\PhpWord\Element\TextRun;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Style\Language;

class testing extends Controller
{
    public function generate()
    {
        $phpWord = new PhpWord();
        $text = new Text();
        $text->setText("aea antasub");
        //language
        $phpWord->getSettings()->setThemeFontLang(new Language(Language::ES_ES));
        //Document Information
        $properties = $phpWord->getDocInfo();
        $properties->setCreator('VJJF');
        $properties->setCompany('EasyResearch');
        $properties->setTitle('Tesisya');
        $properties->setDescription('Proyecto de tesis');
        $properties->setSubject('Proyecto de tesis');
        $section = $phpWord->addSection();
// Adding Text element to the Section having font styled by default...
        $section->addText(
            '"Learn from yesterday, live for today, hope for tomorrow. '
            . 'The important thing is not to stop questioning." '
            . '(Albert Einstein)'
        );

/*
 * Note: it's possible to customize font style of the Text element you add in three ways:
 * - inline;
 * - using named font style (new font style object will be implicitly created);
 * - using explicitly created font style object.
 */

// Adding Text element with font customized inline...
        $section->addText(
            '"Great achievement is usually born of great sacrifice, '
            . 'and is never the result of selfishness." '
            . '(Napoleon Hill)',
            array('name' => 'Tahoma', 'size' => 10)
        );
        //the $fieldText can be either a simple string
        $fieldText = 'The index value';

//or a 'TextRun', to be able to format the text you want in the index
        $fieldText = new TextRun();
        $fieldText->addText('My ');
        $fieldText->addText('bold index', ['bold' => true]);
        $fieldText->addText(' entry');
        $section->addField('XE', array(), array(), $fieldText);
        $section->addField('ADDIN CSL_CITATION', array(), array(), '{"citationItems":[{"id":"ITEM-1","itemData":{"ISBN":"9788429020588","abstract":"Este libro trata sobre un tema de absoluta actualidad, robots y responsabilidad civil por los daños que éstos puedan causar, tiene un doble contenido. Se ocupa en primer lugar de la implantación de la robótica en nuestros días y sus expectativas de futuro. Se incluye en esta parte el examen de algunos de los términos que habitualmente se emplean en ese campo fuertemente tecnificado, y que no son de fácil comprensión para personas no expertas en la materia. La parte central del libro versa sobre el primer documento de la Unión Europea previo a la elaboración de una directiva que regule la robótica (la Resolución aprobada el 16 de febrero de 2017). Se examinan las cuestiones generales que plantea la mencionada Resolución, con particular atención a los problemas que pueden presentarse en torno a la responsabilidad civil por los daños que puedan causar los robots con su actuación, muchos de ellos no contemplados en la mencionada Resolución","author":[{"dropping-particle":"","family":"Reus","given":"Editorial","non-dropping-particle":"","parse-names":false,"suffix":""},{"dropping-particle":"","family":"Reus","given":"Editorial","non-dropping-particle":"","parse-names":false,"suffix":""}],"id":"ITEM-1","issued":{"date-parts":[["2019"]]},"number-of-pages":"1-5","publisher":"Editorial Reus","title":"Robots y responsabilidad civil","type":"book"},"uris":["http://www.mendeley.com/documents/?uuid=96a2788c-4cae-30e9-b91d-1913a630bcb0"]}],"mendeley":{"formattedCitation":"(Reus y Reus, 2019)","plainTextFormattedCitation":"(Reus y Reus, 2019)","previouslyFormattedCitation":"(Reus y Reus, 2019)"},"properties":{"noteIndex":0},"schema":"https://github.com/citation-style-language/schema/raw/master/csl-citation.json"}');
        $section->addText('La hora!');
        $section->addField('DATE',array(),array());

//this actually adds the index
        $section->addField('INDEX', array(), array('\\e "   " \\h "A" \\c "3"'), 'right click to update index');

        $objectWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');

        try {
            $objectWriter->save(storage_path('TestWordFile.docx'));
        } catch (Exception $e) {

        }

        return response()->download(storage_path('TestWordFile.docx'))->deleteFileAfterSend(true);
    }

}
