<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $xmlFilePath = storage_path('app\products.xml');

        $productsXMLOriginal = simplexml_load_file($xmlFilePath);
        $json = json_encode($productsXMLOriginal);
        $productsXML = json_decode($json, TRUE);

        $i = 0;
        $products = [];

        for ($i = 0; $i < 50; $i++) {
            $products[] = [
                'prod_name' => $productsXML['item'][$i]['prod_name'],
                'prod_id' => $productsXML['item'][$i]['prod_id'],
                'prd_name' => $productsXML['item'][$i]['prd_name'],
                'prod_price' => $productsXML['item'][$i]['prod_price'],
                'prod_tax_id' => $productsXML['item'][$i]['prod_tax_id'],
                'taxpercent' => $productsXML['item'][$i]['taxpercent'],
                'prod_amount' => $productsXML['item'][$i]['prod_amount'],
                'prod_hidden' => $productsXML['item'][$i]['prod_hidden'],
                'prod_symbol' => $productsXML['item'][$i]['prod_symbol'],
                'prod_weight' => $productsXML['item'][$i]['prod_weight'],
                'prod_ean' => $productsXML['item'][$i]['prod_ean'],
                'prod_desc' => $productsXMLOriginal->item[$i]->prod_desc,
                'prod_link' => $productsXML['item'][$i]['prod_link'],
                'prod_price_base' => $productsXML['item'][$i]['prod_price_base'],
                'prod_price_net_base' => $productsXML['item'][$i]['prod_price_net_base'],
                'prod_price_net' => $productsXML['item'][$i]['prod_price_net'],
                'cat_path' => $productsXMLOriginal->item[$i]->cat_path,
                'prod_img' => implode(', ', $productsXML['item'][$i]['prod_img']['img'])
            ];
        }

        DB::table('products')->truncate();
        DB::table('products')->insert($products);

        return view('parse');
    }
}
