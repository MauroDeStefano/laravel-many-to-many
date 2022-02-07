<?php

use Illuminate\Database\Seeder;
use App\Category;
use Illuminate\support\str;

class CategorieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data= ['HTML', 'PHP', 'CSS', 'JavaScript'];

        foreach($data as $oneData){

            $new_category = new Category();

            $new_category->name = $oneData;
            $new_category->slug = Str::slug($new_category->name, '-');

            $new_category->save();
        }
    }
}
