<?php

namespace App\Http\Controllers;

use App\end_level_category;
use App\mid_level_category;
use App\top_level_category;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class FrontendFilterController extends Controller
{
    public function product_filtes(Request $request)
    {

        $main_cat = $request->main_cat;
        $mid_cat = $request->mid_cat;
        $end_cat = $request->end_cat;
        $brand = $request->brand;
        $search = $request->search;

        $query = "SELECT * FROM products WHERE is_publish = 1 ";

        if (empty($main_cat) && empty($mid_cat) && empty($end_cat) && empty($brand) && empty($search) ){
            $query_exe = DB::select($query);
        }


        if (isset($search)){
            $query .= "AND product_name LIKE '%$search%' ";
            $query_exe = DB::select($query);
        }


        if (isset($main_cat)) {
            $MAIN_CAT_filter = implode("','", $main_cat);
            $query .= "AND product_top_cat_id IN('" . $MAIN_CAT_filter . "')   ";
            $query_exe = DB::select($query);
        }

        if (isset($mid_cat)) {
            $MID_CAT_filter = implode("','", $mid_cat);
            $query .= "AND product_mid_cat_id IN('" . $MID_CAT_filter . "')   ";
            $query_exe = DB::select($query);
        }

        if (isset($end_cat)) {
            $END_CAT_filter = implode("','", $end_cat);
            $query .= "AND product_end_cat_id IN('" . $END_CAT_filter . "')   ";
            $query_exe = DB::select($query);
        }

        if (isset($brand)) {
            $BRAND_filter = implode("','", $brand);
            $query .= "AND brand_id IN('" . $BRAND_filter . "')   ";
            $query_exe = DB::select($query);
        }

        $products = $this->arrayPaginator($query_exe, $request);
        return response()->json([
            'notices' => $products,
            'view' => View::make('frontend.include.allProduct', compact('products'))->render(),
            'pagination' => (string)$products->links()
        ]);





    }


    public function product_filtes_get(Request $request)
    {
        $main_cat = $request->main_cat;
        $mid_cat = $request->mid_cat;
        $end_cat = $request->end_cat;
        $brand = $request->brand;
        $search = $request->search;

        $query = "SELECT * FROM products WHERE is_publish = 1 ";

        if (empty($main_cat) && empty($mid_cat) && empty($end_cat) && empty($brand) && empty($search) ){
            $query_exe = DB::select($query);
        }


        if (isset($search)){
            $query .= "AND product_name LIKE '%$search%' ";
            $query_exe = DB::select($query);
        }


        if (isset($main_cat)) {
            $MAIN_CAT_filter = implode("','", $main_cat);
            $query .= "AND product_top_cat_id IN('" . $MAIN_CAT_filter . "')   ";
            $query_exe = DB::select($query);
        }

        if (isset($mid_cat)) {
            $MID_CAT_filter = implode("','", $mid_cat);
            $query .= "AND product_mid_cat_id IN('" . $MID_CAT_filter . "')   ";
            $query_exe = DB::select($query);
        }

        if (isset($end_cat)) {
            $END_CAT_filter = implode("','", $end_cat);
            $query .= "AND product_end_cat_id IN('" . $END_CAT_filter . "')   ";
            $query_exe = DB::select($query);
        }

        if (isset($brand)) {
            $BRAND_filter = implode("','", $brand);
            $query .= "AND brand_id IN('" . $BRAND_filter . "')   ";
            $query_exe = DB::select($query);
        }

        $products = $this->arrayPaginator($query_exe, $request);
        return response()->json([
            'notices' => $products,
            'view' => View::make('frontend.include.allProduct', compact('products'))->render(),
            'pagination' => (string)$products->links()
        ]);
    }




    public function arrayPaginator($array, $request)
    {
        $page = $request->input('page', 1);
        $perPage = 12;
        $offset = ($page * $perPage) - $perPage;
        return new LengthAwarePaginator(array_slice($array, $offset, $perPage, true), count($array), $perPage, $page,
            ['path' => $request->url(), 'query' => $request->query()]);
    }



    public function product_filtes_get_main_cat(Request $request)
    {
        $main_cat = top_level_category::all();
        return $main_cat;
    }


    public function product_filtes_get_sub_cat(Request $request)
    {
        $sub_cat = mid_level_category::where('top_cat_id',$request->id)->get();
        return $sub_cat;
    }

    public function product_filtes_get_sub_sub_cat(Request $request)
    {
        $sub_sub_cat = end_level_category::where('mid_cat_id',$request->id)->get();
        return $sub_sub_cat;
    }



}
