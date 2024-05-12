<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AksesController extends Controller
{
    public function getIndex()
    {   

        //tidak makek guzzle
        $token= 'Bearer 3|hsCLwqd8roBQ7zXXHG0WZghmrCe5RuIgGhhOl2Dxc73d7c89';
        $request = Request::create('http://127.0.0.1:8000/api/1201220030/public/offices', 'GET');
        $request->headers->set('Authorization', $token);
        $response = app()->handle($request); 
        if($response->getStatusCode() == 200){
            return $response;
        }else{
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
            
    }
    public function getShow($offices)
    {   

        //tidak makek guzzle
        $token= 'Bearer 3|hsCLwqd8roBQ7zXXHG0WZghmrCe5RuIgGhhOl2Dxc73d7c89';
        $request = Request::create('http://127.0.0.1:8000/api/1201220030/public/offices/'.$offices, 'GET');
        $request->headers->set('Authorization', $token);
        $response = app()->handle($request); 
        if($response->getStatusCode() == 200){
            return $response;
        }else{
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
    }

    public function createData()
    {   
        //return 'createData';
        //static data
        $data=[
            'officeCode' => '12',
            'city' => 'Mjk',
            'phone' => '082252180',
            'addressLine1' => 'sby',
            'addressLine2' => 'waduh',
            'country' => 'NSW 2010',
            'postalCode' => '12345',
            'territory' => 'hallodek'
        ];
        //dd($data);
        //tidak makek guzzle
        $token= 'Bearer 3|hsCLwqd8roBQ7zXXHG0WZghmrCe5RuIgGhhOl2Dxc73d7c89';
        $request = Request::create('http://127.0.0.1:8000/api/1201220030/public/offices', 'POST',$data);
        $request->headers->set('Authorization', $token);
        //dd($request);
        $response = app()->handle($request);
        if($response->getStatusCode() == 200){
            return $response;
        }else{
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
    }

    public function updateData()
    {   
        //return 'updateData';
        $data=[
            'city' => 'MJK',
            'phone' => '021-123456',
            'addressLine1' => 'Jl. Jendral Sudirman',
            'addressLine2' => 'Kav. 52-53',
            'country' => 'Indonesia',
            'postalCode' => '12345',
            'territory' => 'Asia'
        ];
        //dd($data);
        //tidak makek guzzle
        $token= 'Bearer 3|hsCLwqd8roBQ7zXXHG0WZghmrCe5RuIgGhhOl2Dxc73d7c89';
        $request = Request::create('http://127.0.0.1:8000/api/1201220030/public/offices/1', 'PUT',$data);
        $request->headers->set('Authorization', $token);
        //dd($request);
        $response = app()->handle($request);
        if($response->getStatusCode() == 200){
            return $response;
        }else{
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

    }

    public function deleteData($offices)
    {   
        //return 'deleteData';
        //tidak makek guzzle
        $token= 'Bearer 3|hsCLwqd8roBQ7zXXHG0WZghmrCe5RuIgGhhOl2Dxc73d7c89';
        $request = Request::create('http://127.0.0.1:8000/api/1201220030/public/offices/'.$offices, 'DELETE');
        $request->headers->set('Authorization', $token);
        $response = app()->handle($request);
        if($response->getStatusCode() == 200){
            return $response;
        }else{
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
    }
}
