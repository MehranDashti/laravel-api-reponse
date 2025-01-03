<?php

namespace Mehrand\ApiResponse\Tests\Unit;

use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Mehrand\ApiResponse\Tests\BaseTestCase;
use Mehrand\ApiResponse\Traits\HasProperty;
use Mehrand\ApiResponse\Responses\CustomResponse;
use Mehrand\ApiResponse\Contracts\ResponseContract;

class CustomResponseTest extends BaseTestCase
{
    /**
     * @var CustomResponse
     */
    public $customResponse;

    public function setUp(): void
    {
        $this->customResponse = new CustomResponse();
        parent::setUp();
    }

    /**
     * @covers CustomResponse::__construct
     * @return void
     */
    public function test_class_uses_hasProperty_trait () : void
    {
        $this->assertInstanceOf(ResponseContract::class ,$this->customResponse);
    }

    /**
     * @covers CustomResponse::setCode
     * @covers CustomResponse::getCode
     * @covers CustomResponse::__construct
     * @return void
     */
    public function test_can_set_code_in_custom_response(): void
    {
        $this->assertTrue(property_exists($this->customResponse, 'code'));
        $this->assertTrue(method_exists($this->customResponse, 'setCode'));
        $this->assertTrue(method_exists($this->customResponse, 'setCode'));

        $fakeCode = Response::HTTP_OK;
        $this->customResponse->setCode($fakeCode);
        $this->assertIsInt($this->customResponse->getCode());
        $this->assertEquals($fakeCode, $this->customResponse->getCode());
    }

    /**
     * @covers CustomResponse::setMessage
     * @covers CustomResponse::getMessage
     * @covers CustomResponse::__construct
     * @return void
     */
    public function test_can_set_message_in_custom_response(): void
    {
        $this->assertTrue(property_exists($this->customResponse , 'message'));
        $this->assertTrue(method_exists($this->customResponse, 'setMessage'));
        $this->assertTrue(method_exists($this->customResponse, 'getMessage'));

        $fakeMessage = $this->faker->text;
        $this->customResponse->setMessage($fakeMessage);
        $this->assertIsString($this->customResponse->getMessage());
        $this->assertEquals($fakeMessage, $this->customResponse->getMessage());
    }

    /**
     * @covers CustomResponse::setAdditional
     * @covers CustomResponse::getAdditional
     * @covers CustomResponse::__construct
     * @return void
     */
    public function test_can_set_additional_in_custom_response(): void
    {
        $this->assertTrue(property_exists($this->customResponse , 'responseKey'));
        $this->assertTrue(method_exists($this->customResponse, 'setResponseKey'));
        $this->assertTrue(method_exists($this->customResponse, 'getResponseKey'));
        $this->assertTrue(property_exists($this->customResponse , 'responseValue'));
        $this->assertTrue(method_exists($this->customResponse , 'getResponseValue'));
        $this->assertTrue(method_exists($this->customResponse , 'setResponseValue'));

        $customResponse = $this->customResponse->setResponseKey('additional');
        $this->assertEquals('additional' , $customResponse->getResponseKey());

        $fakeAdditional = [
            'text' => $this->faker->sentence,
        ];

        $this->customResponse->setResponseValue($fakeAdditional);
        $this->assertIsArray($this->customResponse->getResponseValue());
        $this->assertEquals($fakeAdditional, $this->customResponse->getResponseValue());
    }

    /**
     * @covers CustomResponse::setSuccessStatus
     * @covers CustomResponse::getSuccessStatus
     * @covers CustomResponse::__construct
     * @return void
     */
    public function test_can_set_status_in_custom_response(): void
    {
        $this->assertTrue(property_exists($this->customResponse , 'successStatus'));
        $this->assertTrue(method_exists($this->customResponse, 'setSuccessStatus'));
        $this->assertTrue(method_exists($this->customResponse, 'getSuccessStatus'));

        $fakeSuccessStatus = true;
        $this->customResponse->setSuccessStatus($fakeSuccessStatus);
        $this->assertIsBool($this->customResponse->getSuccessStatus());
        $this->assertEquals($fakeSuccessStatus, $this->customResponse->getSuccessStatus());
    }


    /**
     * @covers CustomResponse::render
     * @covers CustomResponse::getCode
     * @covers CustomResponse::getMessage
     * @covers CustomResponse::getResult
     * @covers CustomResponse::getSuccessStatus
     * @covers CustomResponse::setCode
     * @covers CustomResponse::setMessage
     * @covers CustomResponse::setResult
     * @covers CustomResponse::setSuccessStatus
     * @covers CustomResponse::__construct
     * @covers CustomResponse::getAdditional
     * @covers CustomResponse::setAdditional
     * @return void
     */
    public function test_can_render_custom_response(): void
    {
        $customResponse = $this->customResponse
            ->setCode(Response::HTTP_OK)
            ->setMessage($this->faker->text)
            ->setSuccessStatus(true)
            ->setResponseKey('additional')
            ->setResponseValue([
                'text' => $this->faker->text,
            ])
            ->render();

        $this->assertInstanceOf(JsonResponse::class, $customResponse);
    }
}
