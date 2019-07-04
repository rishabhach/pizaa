<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderPlaceRequest;
use App\Order;
use App\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderPlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderPlaceRequest $request,$id)
    {
        $user_id = Auth::User()->id;

        $pizza_cost = Post::find($id)->cost;

        $totalCost = $request->count*$pizza_cost;
        //return $totalCost;

        Order::create(array_merge(['user_id'=>$user_id,'post_id'=>$id,'total'=>$totalCost],$request->all()));
//        return $order;
        return redirect()->route('home')->with('success','Order placed successfully');


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
