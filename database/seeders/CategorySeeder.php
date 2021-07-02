<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->name = 'Trái cây nhập khẩu';
        $category->save();

        $category = new Category();
        $category->name = 'Trái cây nội địa';
        $category->save();

        $category = new Category();
        $category->name = 'Trái cây khô';
        $category->save();

        $category = new Category();
        $category->name = 'Trái cây biếu tặng';
        $category->save();
    }
}
