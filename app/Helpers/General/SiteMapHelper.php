<?php

namespace App\Helpers\General;



use App\Models\Category;
use App\Models\Product;

/**
 * Class SiteMapHelper.
 */
class SiteMapHelper
{
    public static function generate()
    {
        $c_categories = $c_simple_products = $c_variation_products = 0;

        $xml = '<?xml version="1.0" encoding="utf-8"?>
                    <urlset xmlns="https://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">';

        $date = date('Y-m-d');

        $site_url = 'https://www.dvmcentral.com/';

        $xml .= '
                <url>
                  <loc>'. $site_url .'</loc>
                  <lastmod>'. $date .'</lastmod>
                  <changefreq>weekly</changefreq>
                  <priority>1.0</priority>
               </url>
            ';

        $categories = Category::where('status', 'Y')->where('name', '!=', '')->get();

        foreach($categories as $category)
        {
            $url = $site_url . $category->slug;

            $xml .= '
                <url>
                  <loc>'. $url .'</loc>
                  <lastmod>'. $date .'</lastmod>
                  <changefreq>weekly</changefreq>
                  <priority>1.0</priority>
               </url>
            ';

            $c_categories++;
        }


        $products = Product::where('status', 'Y')->where('type', '!=', 'child')->where('name', '!=', '')->get();

        foreach($products as $product)
        {
            $url = $site_url . $product->slug;

            $xml .= '
                <url>
                  <loc>'. $url .'</loc>
                  <lastmod>'. $date .'</lastmod>
                  <changefreq>weekly</changefreq>
                  <priority>1.0</priority>
               </url>
            ';

            if($product->type == 'simple')
                $c_simple_products++;
            else
                $c_variation_products++;
        }

        $xml .= '</urlset>';

        $file = fopen('sitemap.xml', 'w');
        fwrite($file,$xml);
        fclose($file);

        return ['categories' => $c_categories, 'simple_products' => $c_simple_products, 'variation_products' => $c_variation_products];
    }
}
