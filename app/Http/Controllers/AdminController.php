<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// models
use App\Models\Product;
use App\Models\Order;

// end of models

use App\Models\product as ModelsProduct;
use BaconQrCode\Renderer\Path\Move;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function Product()
    {
        if(Auth::id())
        {

            if(Auth::user()->usertype=='1')
            {
                return view('admin.product');
            }
            else
            {
                return redirect()->back();
            }
            
        }
        else
        {
            return redirect('login');
        }
        
    }

    public function Index()
    {
        return view('admin.index');
    }
    public function uploadproduct(Request $request)
    {
        $data=new product;

        $image=$request->file;

        $imagename=time().'.'.$image->getClientOriginalExtension();

        $request->file->move('productimage', $imagename); 

        $data->image=$imagename;

        $data->title=$request->title;

        $data->price=$request->price;

        $data->description=$request->desc;

        $data->quantity=$request->qty;

        $data->save();

        return redirect()->back()->with('message','Product Added Successfully !!');


    }

    // show product
    public function showproduct()
    {
        $data=product::all();

        return view('admin.showproduct',compact('data'));
    }

    // delete product
    public function deleteproduct($id)
    {
        $data=product::find($id);

        $data->delete();

        return redirect()->back()->with('message','Product Deleted Successfully !!');
    }


    // update view 
    public function updateview($id)
    {
        $data=product::find($id);

        return view('admin.updateview',compact('data'));
    }

    // update product
    public function updateproduct(Request $request ,$id)
    {
        $data=product::find($id);

        $image=$request->file;

        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();

            $request->file->move('productimage', $imagename); 

            $data->image=$imagename;
        }        

        $data->title=$request->title;

        $data->price=$request->price;

        $data->description=$request->desc;

        $data->quantity=$request->qty;

        $data->save();

        return redirect()->back()->with('message','Product Updated Successfully !!');
    }

    // show order
    public function showorder()
    {
        $order=order::all();
        return view('admin.showorder',compact('order'));
    }

    // update status
    public function updatestatus($id)
    {
        $order=order::find($id);

        $order->status='Delivered';

        $order->save();

        return redirect()->back();
    }

    

}
