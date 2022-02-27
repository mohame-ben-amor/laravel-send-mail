<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use App\Mail\BasicMail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class MailController extends Controller
{

    private const HEADERS = [
        'Content-Type' => 'application/json',
        'Accept' => '*/*',
        'Accept-Encoding'=> 'gzip, deflate, br',
        'Connection'=> 'keep-alive',
        'Host' => '<calculated when request is sent>'
    ];


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   


        //$price = $request->price * 3;
        try{
        $client = new Client();
        $res = $client->request('POST', 'http://localhost:8080/engine-rest/process-definition/key/ReviewInvoice/start',
        [
            'headers' => self::HEADERS,
            'form_params' => ['variables' => [
                    'creditor' => [
                        'value'=>'Niall',
                        'type'=>'String'
                    ],
                    'amount' => [
                        'value'=>'100',
                        'type'=>'String'
                    ],
                    'invoiceNumber' => [
                        'value'=>'123',
                        'type'=>'String'
                    ]   
            ]
        ]]);
    } catch (Exception $ex){
        dd($ex);
    }
        
        dd($res);                    
        return $res;



/*
        $response = Http::withBasicAuth('demo', 'demo')->accept('application/json')
            ->post('http://localhost:8080/engine-rest/process-definition/usertasktest001:7:f8fa8a36-9594-11ec-ac31-2839261a4ecf/start',[]);

        return response()->json([
            'email' => $request->email,
            'name' => $request->name,
            'price' => $price,
            'password' => $request->password,
        ], Response::HTTP_OK); ;*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        /*
        $request->validate([
            'email'=>['required'],
            'name'=>['required'],
            'password'=>['required'],
            'price'=>['required'],
        ]) ;
        */

        
        

        $mailData = [
            'title' => 'Welcoming',
            /*
            'nom' => $request->name,
            'price' => $request->price,
            'email' => $request->email,
            'password' => $request->password*/

        ];

        Mail::to($request->email)->send(new BasicMail($mailData));



        
        return response()->json([
            'message' => "mail has been send successfully"
        ], Response::HTTP_OK); 
    
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
