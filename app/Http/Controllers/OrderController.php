<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Order;
use App\post;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();

        return view('order.index',compact('orders'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $pizza_cost = Post::find($request->post_id)->cost;

        $totalCost = $request->count*$pizza_cost;
        //$request->total = $totalCost;

        $order=Order::create(array_merge(['total'=>$totalCost],$request->all()));

        return redirect()->route('order.show',$order->id)->with('success','order created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = order::find($id);
        return view('order.show',compact('order'));
        //return $post;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = order::find($id);
        return view('order.edit',compact('order'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, $id)
    {
        $order = order::find($id);

        $pizza_cost = Post::find($request->post_id)->cost;

        $totalCost = $request->count*$pizza_cost;



        $order->update(array_merge(['total'=>$totalCost],$request->all()));

        //return $totalCost;

        return redirect()->route('order.index')->with('success','order updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = order::find($id);
        $order->delete();
        return redirect()->route('order.index')->with('success','order deleted successfully');

    }

//    public function OrderPlace(OrderPlaceRequest $request,$post_id)
//    {
//        return "yes order reached";
//
////        $user_id = Auth::User()->id;
////        $order = Order::create($request);
////        $order->user_id = $user_id;
////        $order->post_id = $post_id;
////
////        return redirect()->route('home')->with('success','order Placed successfully');
//
//    }
}
