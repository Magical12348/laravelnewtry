<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Course;
use App\Models\Experience;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'is_admin' => true,
            'email' => 'admin@admin.com',
            'referral_code'=>'AD7890',
            'phone_number' => '1234567890',
            'password' => bcrypt('Gdm@1234567890'),
        ]);

        foreach (User::all() as $user) {
            Experience::create([
                'user_id' => $user->id,
            ]);
        }

        $category = Category::create([
            'name' => 'Programming',
            'slug' => 'programming'
        ]);

        Course::create([
            'category_id' => $category->id,
            'title' => 'PHP',
            'slug' => 'php',
            'thumbnail' => 'https://www.w3schools.com/bootstrap4/img_avatar1.png',
            'demo_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            'excerpt' => 'PHP is a server-side scripting language designed for web development but also used as a general-purpose programming language. PHP is a widely-used, free, and open source scripting language. It is a member of the Apache Software Foundation, and is widely used on the World Wide Web for server-side scripting, embedded in HTML and XML for dynamic web pages, and as a command-line shell for system administration.',
            'description' => '<p>PHP is a server-side scripting language designed for web development but also used as a general-purpose programming language. PHP is a widely-used, free, and open source scripting language. It is a member of the Apache Software Foundation, and is widely used on the World Wide Web for server-side scripting, embedded in HTML and XML for dynamic web pages, and as a command-line shell for system administration.</p>
            <p>PHP is a widely used, free, and open source scripting language. It is a member of the Apache Software Foundation, and is widely used on the World Wide Web for server-side scripting, embedded in HTML and XML for dynamic web pages, and as a command-line shell for system administration.</p><p>PHP is a widely used, free, and open source scripting language. It is a member of the Apache Software Foundation, and is widely used on the World Wide Web for server-side scripting, embedded in HTML and XML for dynamic web pages, and as a command-line shell for system administration.</p>',
            'price' => '100',
            'discount_price' => '50',
            'batch_start_at' => '2020-01-01 00:00:00',
            'type' => NULL
        ]);

        // User::factory(200)->create();
    }
}
