<?php
/* this is the copy pase read example */
require_once 'vendor/autoload.php';



// $objReader= \PhpOffice\PhpWord\IOFactory::createReader('Word2007');


// $contents=$objReader->load("helloWorld.docx");

// $objWriter= \PhpOffice\PhpWord\IOFactory::createWriter($contents,'Word2007');
// $objWriter->save("new.docx");


$phpWord = \PhpOffice\PhpWord\IOFactory::load('helloworld.docx');

$content = "";
foreach($phpWord->getSections() as $section) {

    foreach($section->getElements() as $element) {

        if (method_exists($element, 'getElements')) {
            foreach($element->getElements() as $childElement) {
               
                if (method_exists($childElement, 'getText')) {
                    $content .= $childElement->getText() . ' <br>';
                }
                else if (method_exists($childElement, 'getContent')) {
                    $content .= $childElement->getContent() . ' ';
                }
            }
        }
        else if (method_exists($element, 'getText')) {
            $content .= $element->getText() . ' ';
        }
    }
}
 //var_dump($content);
echo $content;
?>