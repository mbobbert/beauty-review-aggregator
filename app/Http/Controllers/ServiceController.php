<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    //

    public function load_sephora()
    {

    }

    public function load_influenster()
    {

        $source_file_influenster = base_path('project_resources/fadz/influenster_scraping/influenster.csv');

        $fh_infl_r = fopen($source_file_influenster, 'r');
        $fh_infl_w = fopen($source_file_influenster, 'w');

        $influenster_products = [];


        while ($row_infl = fgetcsv($fh_infl_r, 0, ','))
        {

            $key = str_slug($row_infl_r[0]);

            // try to find an item product_in_shop table with the same shop_id and the same id_in_shop
            $find_id_db = DB::select('SELECT shop_id FROM scraped_products');
            //if i add the id into the csv file while scraping
            $find_id_csv = substr($row_infl[6]);

            if($find_id_db == $find_id_csv){
                // if it exists
                    // update it

            }else{
                // else
                    // first insert that item in product_in_shop

                $csv_data = new ProductIsInShop ();

                $csv_data->title = $row_infl [0];
                $csv_data->brand= $row_infl [1];
                $csv_data->rating = $row_infl [2];
                $csv_data->price = $row_infl[3];
                $csv_data->scraped_at = $row_infl[4];
                $csv_data->shop_id = 2;
                $csv_data->slug = $key;

                $csv_data->save();

                    \App\Shop::INFLUENSTER_ID;
                    // try to find an item in product_in_shop that has the same slug
                    // if it exists
                        // set this new product_id to the other items product_id
                    // else
                        // create a new product

            }
        }
        var_dump($influenster_products);
    }

}
