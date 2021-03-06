<?php
namespace App\Services;

use Validator;
use App\Exceptions\ValidationException;

/**
 * code for system logic
 */
class BaseService
{
    public static function __callStatic($method, $parameters)
    {
    	$thisClass = get_called_class();
    	$load_service = new $thisClass;
        if(method_exists($load_service->repository, $method))
		{
			return call_user_func_array(array($load_service->repository, $method), $parameters);
		}
    }

    public function __call($method, $parameters)
    {
    	$thisClass = get_called_class();
    	$load_service = new $thisClass;
        if(method_exists($load_service->repository, $method))
		{
			return call_user_func_array(array($load_service->repository, $method), $parameters);
		}
    }
}
