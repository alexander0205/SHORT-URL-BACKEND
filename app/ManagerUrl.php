<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp;
use Illuminate\Http\Request;
use App\Http\Resources\TopMostVisited;
class ManagerUrl extends Model
{

    public $length = 10;

    public function getTop(){
        $dataResult =  new DataResult();
        $dataResult->validate = true;
        $data =  OriginalUrl::orderBy("visited","DESC")->take(100)->get();
         $dataResult->data = $data;
        return  $dataResult;
    }

    public function generateURLCODE($url){
        $dataResult =  new DataResult();
        $dataResult->validate = true;
        if (empty($url)) {
            $dataResult->validate = false;
            $dataResult->message = "No URL was supplied.";
        }else{
            $validateUrlExists = $this->validateUrlFormat($url);

            if ($validateUrlExists  != 200) {

                $dataResult->validate = false;
                $dataResult->message = $validateUrlExists;
              //  $dataResult->message = "No URL was supplied.";
            }else{
                $idOriginalURl = $this->findUrlDB($url);
                $generateCodeUrl = $this->generateCodeUrl();
                $saveInUrlShort = $this->saveUrlShort($idOriginalURl,$generateCodeUrl);
                if($saveInUrlShort === true){
                    $urlGenerate = $this->generateUrlComplete($generateCodeUrl);
                    $dataResult->data = ["UrlShort"=> $urlGenerate];
                }else{
                    $dataResult->validate = false;
                    $dataResult->message = $saveInUrlShort;
                }
            }

        }

        return $dataResult;
    }
    public function generateUrlComplete($codeUrl){
        return url("{$codeUrl}");
    }

    private function saveUrlShort($idUrlOriginal,$codeUrl){
        try{
            $urlShort = new ShortUrl();
            $urlShort->id_urloriginal = $idUrlOriginal;
            $urlShort->url_short = $codeUrl;
            $urlShort->save();
            return true;
         }
         catch(\Exception $e){
            // do task when error
            return $e->getMessage();   // insert query
         }
      
    }

    public function findUrlDB($url){
        $findUrlResult = OriginalUrl::where("url",$url)->first();
        if($findUrlResult ==  null){
            $createUrlResult =  new OriginalUrl();
            $createUrlResult->visited = 0;
            $createUrlResult->url = $url;
            $createUrlResult->save();
            return $createUrlResult->id;
        }else{
            return $findUrlResult->id;
        }
       // OriginalUrl::where("id",1);
    }

    private function generateCodeUrl(){
        $date = new \DateTime();
        $timeStand =  $date->getTimestamp();
        $short_url=substr(md5($timeStand),0,$this->length);
        return  $short_url;
    }

    private function validateUrlFormat($url) {
        try{
            $client = new GuzzleHttp\Client();
            $res = $client->request('GET',$url); 
            if($res->getStatusCode() == 200){
                  return $res->getStatusCode();
            }else{
                return $res->getReasonPhrase();
            }
           
         }
         catch(\Exception $e){
            // do task when error
            return "This URL is Invalid";   // insert query
         }
      
    }

    private function addhttp($url) {
        if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
            $url = "http://" . $url;
        }
        return $url;
    }


  public static function urlRedirect($url){
        if(empty($url) == true){

        }else{
            $urlShort = ShortUrl::where("url_short",$url)->first();
            if($urlShort == null){

            }else{
                $urlSohrtOriginal = $urlShort->OriginalUrl;

               $urlSohrtOriginal->visited +=1; 
                $urlSohrtOriginal->save();
                $url = (new self)->addhttp($urlShort->OriginalUrl->url);
                return  redirect( $url);
            }
           
        }

    }
}
