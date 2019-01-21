<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ManagerUrl;
use App\Http\Resources\DataResult as DataResultResource;

class CallApi extends Model
{
    public static  function generate($url)
    {
       $managerUrl = new ManagerUrl();
       $dataResult = $managerUrl->generateURLCODE($url);
       return    new DataResultResource($dataResult);
        // $urls = OriginalUrl::find(61);
        // return new OriginalUrlResource($urls);
    }

    public static function mostVisited(){
    	 $managerUrl = new ManagerUrl();
    	 return new DataResultResource($managerUrl->getTop());
    }
}
