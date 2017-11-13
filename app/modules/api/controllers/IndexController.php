<?php
/*
+------------------------------------------------------------------------+
| DragonPHP Website                                                      |
+------------------------------------------------------------------------+
| Copyright (c) 2016-2017 DragonPHP Team (https://www.DragonPHP.com)      |
+------------------------------------------------------------------------+
| This source file is subject to the New BSD License that is bundled     |
| with this package in the file LICENSE.txt.                             |
|                                                                        |
| If you did not receive a copy of the license and are unable to         |
| obtain it through the world-wide-web, please send an email             |
| to license@DragonPHP.com so we can send you a copy immediately.       |
+------------------------------------------------------------------------+
| Authors: Frank Kennedy Yuan <kideny@gmail.com>                     |
+------------------------------------------------------------------------+
*/

namespace DragonPHP\Api\Controllers;

use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Serializer\JsonApiSerializer;
use League\Fractal\Resource\Item;
use DragonPHP\Backend\Models\BackendUsers;
use Phalcon\Http\Response;
use DragonPHP\User\Models\FrontendUsers;


class IndexController extends ControllerBase
{
    /**
     * 首页
     */
    public function indexAction()
    {

        // Create a top level instance somewhere
        $fractal = new Manager();

        $fractal->setSerializer(new JsonApiSerializer());

        // Get data from some sort of source
        // Most PHP extensions for SQL engines return everything as a string, historically
        // for performance reasons. We will fix this later, but this array represents that.
        $user = Users::find();

        // Make a resource out of the data and
        $resource = new Item($user);

        // Turn that into a structured array (handy for XML views or auto-YAML converting)
        $responce = $fractal->createData($resource)->toArray();

        echo $responce;
    }

    /**
     * 空白方法
     */
    public function testAction()
    {
        $parameters = [];

        $user = FrontendUsers::find($parameters);

        // Create a response
        $response = new Response();

        if($user){
            $response->setJsonContent(
                [
                    'status' => 'ok',
                    'data' => $user,
                ]
            );
        }else{
            $response->setJsonCode(409,'Conflict');

            $error = [] ;

            foreach($user->getMessages() as $message ){
                $error[] = $message->getMessages();
            }

            $response->setJsonContent(){
                [
                    'status' => 'Error',
                    'message' => $error,
                ]
            };
        }
        return $response;
    }
}