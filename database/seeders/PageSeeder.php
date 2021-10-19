<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $index = new Page();
        $index->type = 'home';
        $index->name = 'Home';
        $index->alias = 'home';
        // $index->image = 'img/no-image.png';
        $index->title = 'To help you learn more about what\'s happening within your application';
        $index->subtitle = 'Under the hood, Laravel utilizes the Monolog library, which provides support for a variety of powerful log handlers.';
        $index->text = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';
        $index->save();

        $account = new Page();
        $account->type = 'account';
        $account->name = 'Account';
        $account->alias = 'account';
        // $account->image = 'img/no-image.png';
        $account->title = 'To help you learn more about what\'s happening within your application';
        $account->subtitle = 'Under the hood, Laravel utilizes the Monolog library, which provides support for a variety of powerful log handlers.';
        $account->text = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';
        $account->save();

        $contacts = new Page();
        $contacts->type = 'contacts';
        $contacts->name = 'Contacts';
        $contacts->alias = 'contacts';
        // $contacts->image = 'img/no-image.png';
        $contacts->title = 'To help you learn more about what\'s happening within your application';
        $contacts->subtitle = 'Under the hood, Laravel utilizes the Monolog library, which provides support for a variety of powerful log handlers.';
        $contacts->text = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';
        $contacts->save();

        $about = new Page();
        $about->type = 'page';
        $about->name = 'About';
        $about->alias = 'about';
        // $about->image = 'img/no-image.png';
        $about->title = 'To help you learn more about what\'s happening within your application';
        $about->subtitle = 'Under the hood, Laravel utilizes the Monolog library, which provides support for a variety of powerful log handlers.';
        $about->text = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';
        $about->save();
    }
}
