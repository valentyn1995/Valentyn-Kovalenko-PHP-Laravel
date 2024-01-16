<?php

declare(strict_types=1);

use Tests\TestCase;
use App\Http\JsonAndXmlFormatterForApi;

class JsonAndXmlFormatterForApiTest extends TestCase
{
    public function testJsonResponse()
    {
        $expectedData = '[{"id":3,"name":"VO-32","students_count":30}]';

        $data = [
            [
                'id' => 3,
                'name' => 'VO-32',
                'students_count' => 30
            ]
        ];

        $jsonAndXmlFormatterForApi = new JsonAndXmlFormatterForApi();
        $response = $jsonAndXmlFormatterForApi->format('json', $data);
        $result = $response->getContent();

        $this->assertEquals($expectedData, $result);
    }

    public function testXmlResponse()
    {
        $expectedData = '<?xml version="1.0"?>
        <XML><item><id>3</id><name>VO-32</name><students_count>30</students_count></item></XML>';
        $data = [
            [
                'id' => 3,
                'name' => 'VO-32',
                'students_count' => 30
            ]
        ];

        $jsonAndXmlFormatterForApi = new JsonAndXmlFormatterForApi();
        $response = $jsonAndXmlFormatterForApi->format('xml', $data);
        $result = $response->getContent();

        $this->assertXmlStringEqualsXmlString($expectedData, $result);
    }
}