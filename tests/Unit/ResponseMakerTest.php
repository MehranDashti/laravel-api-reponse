<?php

namespace Mehrand\ApiResponse\Tests\Unit;

use RuntimeException;
use Mehrand\ApiResponse\ApiResponse;
use Mehrand\ApiResponse\Tests\BaseTestCase;
use Mehrand\ApiResponse\Contracts\ResponseContract;

class ResponseMakerTest extends BaseTestCase
{

    /**
     * @covers Mehrand\ApiResponse\ApiResponse::__callStatic
     * @covers Mehrand\ApiResponse\Responses\SuccessResponse::__construct
     * @covers Mehrand\ApiResponse\Traits\HasProperty::setCode
     * @covers Mehrand\ApiResponse\Traits\HasProperty::setMessage
     * @covers Mehrand\ApiResponse\Traits\HasProperty::setSuccessStatus
     * @return void
     */
    public function test_can_create_success_response(): void
    {
        $successResponse = ApiResponse::successResponse();

        $this->assertInstanceOf(ResponseContract::class, $successResponse);
    }

    /**
     * @covers Mehrand\ApiResponse\ApiResponse::__callStatic
     * @covers Mehrand\ApiResponse\Responses\FailureResponse::__construct
     * @covers Mehrand\ApiResponse\Traits\HasProperty::setCode
     * @covers Mehrand\ApiResponse\Traits\HasProperty::setMessage
     * @covers Mehrand\ApiResponse\Traits\HasProperty::setSuccessStatus
     * @return void
     */
    public function test_can_create_failure_response(): void
    {
        $failureResponse = ApiResponse::failureResponse();

        $this->assertInstanceOf(ResponseContract::class, $failureResponse);
    }

    /**
     * @covers Mehrand\ApiResponse\ApiResponse::__callStatic
     * @covers Mehrand\ApiResponse\Responses\CustomResponse::__construct
     * @covers Mehrand\ApiResponse\Traits\HasProperty::setCode
     * @covers Mehrand\ApiResponse\Traits\HasProperty::setMessage
     * @covers Mehrand\ApiResponse\Traits\HasProperty::setSuccessStatus
     * @return void
     */
    public function test_can_create_custom_response(): void
    {
        $customResponse = ApiResponse::customResponse();

        $this->assertInstanceOf(ResponseContract::class, $customResponse);
    }

    /**
     * @covers Mehrand\ApiResponse\ApiResponse::__callStatic
     * @return void
     */
    public function test_if_instance_is_not_valid_throws_exception()
    {
        $this->expectException(RuntimeException::class);
        ApiResponse::another();
    }
}
