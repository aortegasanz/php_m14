<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Shop;
use App\Models\Picture;

class ShopController extends Controller
{
    
    public function shops_create (Request $request) {
        $this->validate($request, [
            'name' => 'required|min:4',
        ]);
        $shop = Shop::create([
            'name' => $request->name,
            'franchise_id' => 1,
        ]);
        return response()->json(['OK' => $shop], 200);
    }

    public function shops_list (Request $request) {       
        $shops = Shop::all();
        return response()->json(['shops' => $shops], 200);
    }

    public function picture_create (Request $request, $id) {       
        $this->validate($request, [
            'name' => 'required|min:4',
            'author_name' => 'required|min:4',
            'import' => 'required|numeric',
            'entry_date' => 'required|date',
        ]);
        $picture = Picture::create([
            'name' => $request->name,
            'author_name' => $request->author_name,
            'import' => $request->import,
            'entry_date' => $request->entry_date,
            'shop_id' => $id,
        ]);
        return response()->json(['OK' => $picture], 200);        
    }

    public function picture_list (Request $request, $id) { 
        $pictures = Picture::where('shop_id', $id)->get();
        return response()->json(['pictures' => $pictures], 200);
    }

    public function picture_delete (Request $request, $id) {       
        //if $role->hasPermissionTo('destroy_pictures');
        Picture::where('shop_id', $id)->delete();
        return response()->json(['Ok' => 'Deleted Succesfully'], 200);
    }


    /* PICTURES VUE.js */
    public function index() {
        $pictures = Picture::all();
        return response()->json(compact('pictures'));
    }

    public function store(Request $request) {
        $picture = Picture::create($request->all());
        return response()->json(compact('picture'));
    }

    public function delete(Picture $picture) {
        $picture->delete();
        return response()->json(compact('picture'));        
    }

}
