<?php

declare(strict_types=1);

namespace App\Http;

use Illuminate\Http\Response;

class JsonAndXmlFormatterForApi
{
    public function format(string $format, array $data): Response
    {
        if ($format === 'json') {
            $jsonData = json_encode($data);

            return new Response(
                $jsonData,
                200,
                ['Content-Type' => 'application/json']
            );
        } elseif ($format === 'xml') {
            $xmlData = $this->convertToXml($data);

            return new Response(
                $xmlData,
                200,
                ['Content-Type' => 'application/xml; charset=utf-8']
            );
        }
    }

    private function convertToXml(array $data): string|bool
    {
        $xml = new \SimpleXMLElement('<XML></XML>');
        foreach ($data as $item) {
            $items = $xml->addChild('item');
            foreach ($item as $key => $value) {
                if (!is_array($value)) {
                    $items->addChild($key, strval($value));
                } else {
                    foreach ($value as $key2 => $value2) {
                        $items->addChild($key2, strval($value2));
                    }
                }
            }
        }

        return $xml->asXML();
    }
}