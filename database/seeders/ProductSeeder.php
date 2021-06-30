<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fruits = new Product();
        $fruits->name = 'cherry';
        $fruits->unit = 'kg';
        $fruits->origin = 'USA';
        $fruits->input_date = date('Y-m-d');
        $fruits->expiration_date =  date('Y-m-d' , strtotime('+20 day'));
        $fruits->describe  = 'hoa qua nhap khau';
        $fruits->unit_price = 400.000;
        $fruits->amount = 200;
        $fruits->save();

        $fruits = new Product();
        $fruits->name = 'tao my';
        $fruits->unit = 'kg';
        $fruits->origin = 'USA';
        $fruits->input_date = date('Y-m-d');
        $fruits->expiration_date =  date('Y-m-d' , strtotime('+10 day'));
        $fruits->describe  = 'hoa qua nhap khau';
        $fruits->unit_price = 100.000;
        $fruits->amount = 300;
        $fruits->save();


        $fruits = new Product();
        $fruits->name = 'dao';
        $fruits->unit = 'kg';
        $fruits->origin = 'china';
        $fruits->input_date = date('Y-m-d');
        $fruits->expiration_date =  date('Y-m-d' , strtotime('+15 day'));
        $fruits->describe  = 'hoa qua nhap khau';
        $fruits->unit_price = 50.000;
        $fruits->amount = 600;
        $fruits->save();

        $fruits = new Product();
        $fruits->name = 'vai thieu';
        $fruits->unit = 'kg';
        $fruits->origin = 'viet nam';
        $fruits->input_date = date('Y-m-d');
        $fruits->expiration_date =  date('Y-m-d' , strtotime('+20 day'));
        $fruits->describe  = 'hoa qua nhap khau';
        $fruits->unit_price = 15.000;
        $fruits->amount = 500;
        $fruits->save();
    }
}
