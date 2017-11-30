<?php

/**
 * Application Controller.
 *
 * @author     Kaio Teixeira
 */

namespace SimpleCMSAPI\Controllers;
use SimpleCMSAPI\Models\Applications;

class ApplicationController
{
    /**
     * Método de autenticação de aplicações externas para acessarem os dados de Posts.
     * @param $data
     * @return null
     */
    public function auth($data)
    {
        if(!isset($data['name']) || is_null($data['name']))
            return response(['message' => 'The field Name is required'], 400);

        if((!isset($data['password']) || is_null($data['password'])))
            return response(['message' => 'The field Password is required'], 400);

        $application = Applications::findByName($data['name']); //busca a application pelo nome

        if(!isset($application[0]))
            return null;

        if(!password_verify($data['password'], $application[0]->password))
            return null;

        return $application[0];
    }
}
