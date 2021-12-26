<?php

namespace App\Http\Controllers;

use App\Models\Tender;
use Illuminate\Http\Request;

class TenderController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        return Tender::all();
    }

    /**
    * POST /tenders
    * @param Request $request
    *  @return \Symfony\Component\HttpFoundation\Response
    */
    public function store(Request $request)
    {
        try{
            $jsonRequest = json_decode($request->getcontent(), true);
            foreach($jsonRequest as $value){
                $tender = Tender::create($value);
            }			 
        } catch(\Exception $e){
            dd(get_class($e));
        }

         return response()->json(['created' => true], 201);
        
    }
}