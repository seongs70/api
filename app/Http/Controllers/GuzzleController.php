<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
class GuzzleController extends Controller
{

    public function GetToken(){
        $client = new Client;
        $response  =  $client -> request ( 'POST' ,'http://115.68.220.209:8080/oauth/token',  [
            'headers' => ['content-type' => 'application/json', 'Accept' => 'application/json'],
            'body' => json_encode([
            	'grant_type' => 'password',
            	'client_id' => '2',
            	'client_secret' => '9CtX7F6bVyIWFSZQQDjZIpo7Na4PIdLBM74u9R3P',
            	'username' => 'andreane.prohaska@example.com',
            	'password' => 'secret'
            ]),
        ]);
        echo  $response -> getStatusCode ()."<br>";
        echo  $response -> getBody ();
    }
    public function ApiUser(){
        $client = new Client;
        $response  =  $client -> request ( 'GET' ,'http://115.68.220.209:8080/api/user',  [
            'headers' => [
                'content-type' => 'application/json',
                'Accept' => 'application/json',
                'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjgyYmQxZjQ5ZjNlZTI1MWE2YWFjYTUzYzMwOTY4MzRjNzdhZjI4MTNhOGZkMWQ0YjFlNDQ1YjgwNjgyNDdlZjkyMzZmMjZkNmI4OTRiMzc3In0.eyJhdWQiOiIyIiwianRpIjoiODJiZDFmNDlmM2VlMjUxYTZhYWNhNTNjMzA5NjgzNGM3N2FmMjgxM2E4ZmQxZDRiMWU0NDViODA2ODI0N2VmOTIzNmYyNmQ2Yjg5NGIzNzciLCJpYXQiOjE1NTgyNDk1NDIsIm5iZiI6MTU1ODI0OTU0MiwiZXhwIjoxNTg5ODcxOTQyLCJzdWIiOiI1Iiwic2NvcGVzIjpbXX0.bp0Dpxf0PrxsurBADzAuUGi8nPsI2utIvKey_x87U1WBnMeobFAu0zGRM4iHBtt0HfksqBOxbV8bAUYvV9Z7Q8g7MAVsYbFqZ6ttQGsgm1dcW0gvbt0_d_vrlEu-eGDjkqzKXPZ7zpucD7IOh0CFiTgy4Ku8PWoKmsYGR1A6VHrXhFAFJIa3404PZc5dZgnnGQZ5_c0RQ2FNaPDsTVlDghQOgbjEwDXpz-5pvTxSz4juIWC_3cwxJC2k3EfOCncOUr1aEbpbX7joebHTnXPwb-7GT9B04PcQl2Y5vBaKQibM_uFKYDWE3hi99KSQfd5LK9A8GXLWCuKywcchfeNJ6qt2SYCZMS0GdOPv01kXxvzQxvP9VWunmov5IDuW5vUYAuXLnnHXYG4Y9_vcBC_Fr66dYqzd4X4rBkftcbvTo0Lo06gfq-koHKKCn1uVv3wdCcOgELZCCwIF186BBaTyT9jSvljsa8vWNe3ygD7DNpnPy7_wyDfsfYAADBXVFF7bRef8YVsz5myasa_HHVi8Ut--e5oxGc8vBDPW6U8hGU0ajtfhQAFmjZ4ry5IhCILhDGSBejAxM6zIdMG8_F5I930gA-6OXWM9wLOoXlBayAoCG9_zp7g9J3p8FVoVAwYj-ZnAPZS_VjPZaPPGkhvq8BcrMmx0xM45Bztxi7ZPBnM',
            ],
        ]);
        echo  $response -> getStatusCode ()."<br>";
        echo  $response -> getBody ();
    }
    public function ProductAll(){
        $client = new Client;
        $response  =  $client -> request ( 'GET' ,'http://115.68.220.209:8080/api/products',  [
        ]);
        echo  $response -> getStatusCode ()."<br>";
        echo  $response -> getBody ();
    }
    public function ProductShow(){
        $client = new Client;
        $response  =  $client -> request ( 'GET' ,'http://115.68.220.209:8080/api/products/5',  [
        ]);
        echo  $response -> getStatusCode ()."<br>";
        $data = $response -> getBody ();
        echo $data = str_replace("\\/", "/", $data);
    }
}
