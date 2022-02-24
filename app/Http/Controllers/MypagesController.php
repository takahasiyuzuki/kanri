<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Companie;
use Illuminate\Support\Facades\DB; 


class MypagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     * 
     */

    public function mypage()
    {

        // $companie = Product::where();
        // dd($companie);

        $products = Product::all()->with('companies');
        dd($products);
        return view('mypage',['Products' => $products]);
        

    }


    public function mypage2()
    {
        $products = Product::all();
        return view('mypage2', ['Products' => $products]);

    }

    public function mypage3()
    {
        $products = Product::all();
        return view('mypage3', ['Products' => $products]);

    }

    public function mypage4()
    {
        $products = Product::all();
        return view('mypage4', ['Products' => $products]);

    }
    
    public function crate(Request $request)
    {
        $input = $request->all();
    
        
        \DB::beginTransaction();
        try {
            // 商品を登録
            Product::create($input);
            \DB::commit();
  
       } 
        
        catch(\Throwable $e) {
        //    \DB::rollback();
        //     abort(500);
        }
        return redirect(route('mypage2'));
    }


    
    //編集
    public function showEdit($id)
    {
        $products = Product::find($id);

        if (is_null($products)) {
            return redirect(route('edit'));
            
        }
        
        return view('edit', ['Products' => $products]);
    }


    public function exeUpdate(Request $request)
    {
        // データを受け取る
        $inputs = $request->all();
       
        

        \DB::beginTransaction();
        {
            // 更新
            $products = Product::find($inputs['id']);
            
            $products->fill([
                'id' => $inputs['id'],
                'company_id' => $inputs['company_id'],
                'product_name' => $inputs['product_name'],
                'price' => $inputs['price'],
                'stock' => $inputs['stock'],
                'img_path'=> $inputs['img_path'],
                'comment' => $inputs['comment']
            ]);
            
            $products->save();
            \DB::commit();
        } 

        return view('edit', ['Products' => $products]);
    }
    
    //削除
    public function exeDelete($id)
    {

        if (empty($id)) {
            
            return redirect(route('mypage'));
        }

        try {
            //削除
            Product::destroy($id);
        } catch(\Throwable $e) {
            abort(500);
        }

       
        return redirect(route('mypage'));
    }

    //検索
    public function search(Request $request)
    {
        $products = DB::table('companies')
        ->join('products', 'companies.id', '=', 'products.company_id')->get();
        
           $keyword = $request->input('keyword');
           $com = $request->input('companie_id');
          
         $Products = Product::where('product_name', 'LIKE', "%{$keyword}%")->get();
        // $com = Product::where('company_name', 'LIKE', "%{$com}%")->get();
        
        #where抽出の場合
         $query = Product::query();
         $com = Product::where('company_id',$com)->get();
         if (isset($com)) {
             $query->where('company_id', $com);
         }
    
        if (!empty($keyword)) {
        $Products = Product::where('product_name', 'LIKE', "%{$keyword}%")->get();
         }

        //   if (!empty($com)) {
        //       $com = Product::where('company_name', 'LIKE', "%{$com}%")->get();
        //  }

            // $query = Product::where();
            // $keyword->where('product_name','LIKE', "%{$keyword}%"); 
            // $com->where('company_name','LIKE', $com);
            // $posts = $query->get();

           return view('mypage', compact('Products','com'));

    }

}

