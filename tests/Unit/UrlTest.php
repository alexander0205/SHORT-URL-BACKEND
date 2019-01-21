<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\ManagerUrl;

use GuzzleHttp;
class UrlTest extends TestCase
{
    //If you want test, run in the console  vendor\bin\phpunit
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testing()
    {
        $m = new ManagerUrl();
      //  var_dump($m->getTop());
        $this->assertEquals(7,7);
    }

    public function testGluzer(){
        $client = new GuzzleHttp\Client();
        $res = $client->request('GET', 'travelsdr.com',[
            'on_stats'=>function(GuzzleHttp\TransferStats  $stats){
                echo $stats->getEffectiveUri();
            }
        ]);
       
        $this->assertEquals($res->getStatusCode(),200);
    }



    public function testGenerateUrl(){
        $m = new ManagerUrl();
        $result = $m->generateURLCODE("travelsdr.com");
    }

    // public function testRedirect(){
    //     $m = new ManagerUrl();
    //     $m->urlRedirect("2314da78f5");
    // }
}
