<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
USE App\Http\Requests;
use App\ManagerUrl;
use App\DataResult;
use App\Http\Resources\OriginalUrl as OriginalUrlResource;
use App\Http\Resources\DataResult as DataResultResource;
class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get URLS
        // $urls =   OriginalUrl::paginate(15);
        // return    DataResultResource::collection($urls);
        $urls =   new DataResult();
        $urls->validate = true;
        $urls->message = "sfdfdfdfd";
        return    new DataResultResource($urls);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generate($url)
    {
       $managerUrl = new ManagerUrl();
       $dataResult = $managerUrl->generateURLCODE($url);
       return    new DataResultResource($dataResult);
        // $urls = OriginalUrl::find(61);
        // return new OriginalUrlResource($urls);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
