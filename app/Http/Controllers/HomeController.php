<?php

namespace App\Http\Controllers;

// models
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;

// End of model

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\MockObject\Stub\ReturnStub;

class HomeController extends Controller
{
    public function Index()
    {
        if(Auth::id())
        {
            return redirect('redirect');
        }
    
        else
        {
            $data=product::paginate(3);
            return view("user.index",compact('data'));
        }
    }
   

    public function About()
    {
        return view("about"); 
    }

    public function Redirect()
    {
        $usertype=Auth::user()->usertype;

        if($usertype=='1')
        {
            return view("admin.index");
        }
         
        else{ 

            $data=product::paginate(3);

            $user=auth()->user();
            $count=cart::where('phone',$user->phone)->count();


            return view("user.index",compact('data','count'));
        }

    }

    // search function  
    public function search(Request $request)
    {
        $search=$request->search;

        if($search=='')
        {
            $data=product::paginate(3);
            return view("user.index",compact('data'));
        }

        $data=product::where('title', 'Like','%'.$search.'%')->get();

        return view('user.index', compact('data'));
    }

    // add cart function
    public function addcart(Request $request ,$id)
    {
         if(Auth::id())
         {
            $user=auth()->user();

            $product=product::find($id);

            $cart=new cart;

            $cart->name=$user->name;
            $cart->phone=$user->phone;
            $cart->address=$user->address;

            $cart->product_title=$product->title;
            $cart->quantity=$request->quantity;
            $cart->price=$product->price;

            $cart->save();

            return redirect()->back()->with('message','Cart Added Successfully !!');
         }

         else
         {
            return redirect('login');
         }

        
    }

    //  show cart function
    public function showcart()
    {
        // getting logged in user
        $user=auth()->user();

        $cart=cart::where('phone',$user->phone)->get();
        
        $count=cart::where('phone',$user->phone)->count();

       return view('user.showcart',compact('count','cart'));
    }

    // delete cart
    public function deletecart($id)
    {
       $data=cart::find($id);
       
       $data->delete();

       return redirect()->back()->with('message','Product Removed Successfully !!');

    }

    // confirm order
    public function confirmorder(Request $request)
    {
        $user=auth()->user();

        $name=$user->name;

        $phone=$user->phone;

        $address=$user->address;

        foreach($request->product_name as $key=>$product_name)
        {

            $order=new order;

            $order->product_name=$request->product_name[$key];

            $order->quantity=$request->quantity[$key];

            $order->price=$request->price[$key];

            $order->name=$name;

            $order->phone=$phone;

            $order->address=$address;

            $order->status='Not Delivered';

            $order->save();


        }

        DB::table('carts')->where('phone',$phone)->delete();

        return redirect()->back()->with('message','Order Confirmed Successfully !!');
        
    }

}
