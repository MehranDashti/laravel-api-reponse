# Laravel / lumen response api

a lightweight package for create and pass response for use in laravel || lumen

### Prerequisites

laravel or lumen > v5.4

### Installation

```
$ composer require mehrand/api-response
```

## Usage

you can use Facade or Dependency injection in your project :

## Facade Example :

``````
use Mehrand\ApiResponse\ApiResponse;

ApiResponse::successResponse()
    // ->setCode(xxxx)
    // ->setMessage("blah blah blah blah !")
    // ->setSuccessStatus(--boolean !!!--)
    // ->setResponseKey('data')
    // ->setResponseValue(--array-- => [  // --------------> SET DATA METHOD IS ONLY AVAILABLE FOR SUCCESS RESPONSE
        'projectName' => 'my awesome project',
        .
        .
        .
    ])
    ->render();


ApiResponse::failureResponse()
    // ->setCode(xxxx)
    // ->setMessage("blah blah blah blah !")
    // ->setSuccessStatus(--boolean !!!--)
    // ->setResponseKey('error')
    // ->setResponseValue(--array-- => [ // --------------> SET ERROR METHOD IS ONLY AVAILABLE FOR ERROR RESPONSE
        'error text' => 'looks like something went wrong',
        .
        .
        .
    ])
    ->render();


ApiResponse::customResponse()
    // ->setCode(xxxx)
    // ->setMessage("blah blah blah blah !")
    // ->setSuccessStatus(--boolean !!!--)
    // ->setResponseKey('additional')
    // ->setResponseValue(--array-- => [  // --------------> SET ADDITIONAL METHOD IS ONLY AVAILABLE FOR CUSTOM RESPONSE
    //    'custom message' => 'custom message goes here',
    //    .
    //    .
    //    .
    // ])
    ->render();
``````



## Dependency injection Example :

#### 1. first inject your class in constructor

`````

use Mehrand\ApiResponse\Responses\CustomResponse;
use Mehrand\ApiResponse\Responses\SuccessResponse;
use Mehrand\ApiResponse\Responses\FailureResponse;

__construct(
    SuccessResponse $successResponse,
    ErrorResponse $errorResponse,
    CustomResponse $customResponse
    ) {
        $this->successResponse
        $this->errorResponse
        $this->customResponse
    }

`````
#### 2. use your injected classes wherever you want !
````

$successResponse = $this->successResponse
    // ->setCode(xxxx)
    // ->setMessage("blah blah blah blah !")
    // ->setSuccessResponse(--boolean !!!--)
    // ->setResponseKey('data')
    // ->setResponseValue(--array-- => [  // --------------> SET DATA METHOD IS ONLY AVAILABLE FOR SUCCESS RESPONSE
        'projectName' => 'my awesome project',
        .
        .
        .
    ])
    ->render();



$errorResponse = $this->errorResponse
    // ->setCode(xxxx)
    // ->setMessage("blah blah blah blah !")
    // ->setSuccessResponse(--boolean !!!--)
    // ->setResponseKey('error')
    // ->setResponseValue(--array-- => [ // --------------> SET ERROR METHOD IS ONLY AVAILABLE FOR ERROR RESPONSE
        'error text' => 'looks like something went wrong',
        .
        .
        .
    ])
    ->render();



$customResponse = $this->customResponse
    // ->setCode(XXXXX)
    // ->setMessage('BLAH BLAH BLAH !')
    // ->setSuccessStatus(BOOLEAN)
    // ->setResponseKey('additional')
    // ->setResponseValue([
    //    'custom text' => 'custom message here',
        .
        .
        .
    //])
    ->render();
````

## Authors

* **Mehran Dashti** - *Initial work* - [github](https://github.com/MehranDashti)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details