<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AddressService;
use App\Services\BlockChainService;
use App\Http\Requests\MyAddress\StoreRequest;
use App\Http\Requests\MyAddress\UpdateRequest;

class MyAddressController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->addressService    = new AddressService;
        $this->blockChainService = new BlockChainService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses    = $this->addressService->get(\Auth::id());
        $block_chains = $this->blockChainService->get();
        return view('myAddress', ['addresses' => $addresses, 'block_chains' => $block_chains]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Top\StoreRequest $request
     * @return view
     */
    public function store(StoreRequest $request)
    {
        $request->offsetset('user_id', \Auth::id());
        $this->addressService->create($request->toArray());
        return redirect('/myAddress');
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
    public function update(UpdateRequest $request, $id)
    {
        $this->addressService->modify($id, $Request->toArray());
        return redirect('/myAddress');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->addressService->checkUserIdDelete($id);
        return redirect('/myAddress');
    }
}
