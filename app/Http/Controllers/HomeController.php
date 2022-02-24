<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Companie;
use Illuminate\Support\Facades\DB; 

class HomeController extends Controller
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
     */
    public function index()
    {
        $products = DB::table('companies')
        ->join('products', 'companies.id', '=', 'products.company_id')->get();
        // dd($products);

        return view('mypage', ['Products' => $products]);

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
        return redirect(route('mypage'));

        
    }
   
    
   
}

