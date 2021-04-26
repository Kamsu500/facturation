<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

class DynamicPDFController extends Controller
{
    public function index()
    {
        $product_data=$this->get_product_data();

        return view('products.dynamic_pdf',compact('product_data'));
    }
    public function get_product_data()
    {
        return DB::table('produits as p')
            ->join('categories as c','p.id_categorie','=','c.id_categorie','inner')
            ->select('p.*','c.nom as nom')
            ->orderBy('id_produit','asc')
            ->get();
    }
    public function getPdf()
    {
        $pdf=App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert());
        $pdf->stream();
        return $pdf->download('liste de produits.pdf');
    }
    public function convert()
    {
        $product_data=$this->get_product_data();
        $output='
            <table width="100%" style="border-collapse: collapse;border: 0px;">
            <tr>
                <th style="border: 1px solid;padding: 12px;width:25%">Id</th>
                <th style="border: 1px solid;padding: 12px;width:25%">Désignation</th>
                <th style="border: 1px solid;padding: 12px;width:25%">Prix</th>
                <th style="border: 1px solid;padding: 12px;width:25%">Categorie</th>
            </tr>
        ';
        foreach ($product_data as $product)
        {
            $output.='
              <tr style="text-align:center;">
                <td style="border: 1px solid;padding:12px;">'.$product->id_produit.'</td>
                <td style="border: 1px solid;padding:12px;">'.$product->designation.'</td>
                <td style="border: 1px solid;padding:12px;">'.$product->price.'</td>
                <td style="border: 1px solid;padding:12px;">'.$product->nom.'</td>
              </tr>
            ';
        }
        $output.='<table>';

        return $output;
    }
}
