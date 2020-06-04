<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
class Categories extends Controller
{
    public function index(){
        $row['categories'] = Category::all();
        $row['sub_categories'] = Subcategory::all();
        return response()->json($row);
    }
}
