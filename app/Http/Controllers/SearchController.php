<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;

class SearchController extends Controller
{
   public function __construct(){
       $this->api = "https://api.github.com";
   }

    /**
     * Display the specified resource.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        return $this->get_user_data($name);
    }

    public function show_followers($name, $page)
    {
        return $this->get_followers($name, $page);
    }

    private function get_user_data( $user = "" ){
        //api endpoint
        $url = $this->api."/users/".$user;

        //request
        $client = new Client(['http_errors' => false]);
        try {
            $res = $client->request('GET', $url );

            //response
            switch($res->getStatusCode()){
                
                case 200:
                echo $res->getBody();
                break;

                case 404:
                echo '{"status":"error", "message":"No results."}';
                break;

                case 403:
                echo '{"status":"error", "message":"Rate limit exceeded."}';
                break;

                default:
                echo '{"status":"error", "message":"There was an error completing the request."}';
            }

        } catch (RequestException $e) {

                echo '{"status":"error", "message":"There was an error completing the request."}';
            
        }

    }

    public function get_followers( $user = "", $page = 1, $per_page = 10 ){
       //api endpoint
        $url = $this->api."/users/".$user."/followers";

        //request
        $client = new Client(['http_errors' => false]);
        try {
            $res = $client->request('GET', $url, [
               "query" => [ 
                   "per_page" => $per_page, 
                    "page"    => $page
                ]
            ]);
            
            //response
            switch($res->getStatusCode()){
                
                case 200:
                echo $res->getBody();
                break;

                case 404:
                echo '{"status":"error", "message":"No results."}';
                break;

                case 403:
                echo '{"status":"error", "message":"Rate limit exceeded."}';
                break;

                default:
                echo '{"status":"error", "message":"There was an error completing the request."}';
            }

        } catch (RequestException $e) {

                echo '{"status":"error", "message":"There was an error completing the request."}';
            
        }
    }
}
