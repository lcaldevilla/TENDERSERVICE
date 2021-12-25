<?php

namespace App\Repository;

use Illuminate\Support\Collection;

class AtomParserClass{
    private string $urlFile;
    private string $id;
    private string $title;
    private string $summary;
    private string $link;

    private collection $collecAtom; 

    public function __construct(string $urlFile){
        $this->urlFile = $urlFile;
    }

    // parsea un fichero atom que contiene una licitación pública
    public function parserAtom(){
        try{
            $this->collecAtom = new collection();
            $xml_reader = new \XMLReader;
            $xml_reader->open($this->urlFile);

            while ($xml_reader->read() && $xml_reader->name != 'entry');

            while ($xml_reader->name == 'entry'){
                $xml = simplexml_load_string($xml_reader->readOuterXML());
                $nameSpacesMesta = $xml->getNamespaces(true);

                 // defino los namespaces que voy a utilizar
                $xml->registerXPathNamespace('cac', 'urn:dgpe:names:draft:codice:schema:xsd:CommonAggregateComponents-2');
                $xml->registerXPathNamespace('cbc', 'urn:dgpe:names:draft:codice:schema:xsd:CommonBasicComponents-2');
                $xml->registerXPathNamespace('cbc-place-ext', 'urn:dgpe:names:draft:codice-place-ext:schema:xsd:CommonBasicComponents-2');
                $xml->registerXPathNamespace('cac-place-ext', 'urn:dgpe:names:draft:codice-place-ext:schema:xsd:CommonAggregateComponents-2');

                // datos de la licitación
                $this->id = $xml->id;
                $this->title = $xml->title;
                $this->summary = $xml->summary;
                $this->link = $xml->link;

                $this->collecAtom->push([ "id" => $this->id,
                "title" => $this->title,
                "summary" => $this->summary,
                "link" => $this->link]);

                // movemos a la siguiente licitacion del fichero
                $xml_reader->next('entry');

            }
            $xml_reader->close();
            
            return $this->collecAtom;

        } catch (Exceptions $ex){
            return false;
        }
    }

}
?>