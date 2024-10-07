<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Favorite;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function shop(){
        $user = auth()->user();
        $username = $user->name;
        $shops = Shop::all();
        for($i = 1;$i <= 20;$i++){
            $favorite[] = Favorite::where('user_id',$user->id)
            ->where('shop_id',$i)->exists();
        }
        //dd($favorite);
        //dd($shops);
        return view ('shop',['username' => $username,'shops' => $shops,'favorite' => $favorite]);
    }
    public function detail($shopId){
        $id = $shopId;
        $shop = Shop::where('id',$id);
        return view('detail',['id' => $id,'shop' => $shop]);
    }
    public function favorite($id){
        $favorite = [
            'user_id' => auth()->user()->id,
            'shop_id' => $id,
          ];
          //dd($favorite);
        Favorite::create($favorite);
        return redirect('/');
    }
    public function favorite_delete($id){
        $favorite = [
            'user_id' => auth()->user()->id,
            'shop_id' => $id,
          ];
        $deleteTarget = Favorite::find($favorite)->find();
        $deleteTarget -> delete();
        return redirect('/');
    }
}
