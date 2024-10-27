<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSettingSeeder extends Seeder
{
    public function run()
    {
        DB::table('pagesettings')->insert([
            [
                'title' => 'Home',
                'slug' => '/',
                'image' => '["7","6","5"]',
                'description' => 'Welcome to the homepage of our website.',
                'meta_title' => 'Homepage - My Awesome Site',
                'meta_description' => 'The homepage of My Awesome Site.',
                'meta_keyword' => 'homepage, awesome site',
                'qna' => json_encode([
                    ['question' => 'What is this site about?', 'answer' => 'This site is about awesome things.'],
                    ['question' => 'How can I contact support?', 'answer' => 'You can contact support via email.']
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Tours',
                'slug' => 'tours',
                'image' => 'tours-banner.jpg',
                'description' => 'Explore our various tours and experiences.',
                'meta_title' => 'Tours - My Awesome Site',
                'meta_description' => 'Discover the best tours offered by My Awesome Site.',
                'meta_keyword' => 'tours, travel, experiences',
                'qna' => json_encode([
                    ['question' => 'What tours do you offer?', 'answer' => 'We offer a variety of tours including city tours, adventure tours, and more.'],
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Blogs',
                'slug' => 'posts',
                'image' => 'blogs-banner.jpg',
                'description' => 'Read our latest blog posts and articles.',
                'meta_title' => 'Blogs - My Awesome Site',
                'meta_description' => 'Stay updated with the latest blog posts on My Awesome Site.',
                'meta_keyword' => 'blogs, articles, news',
                'qna' => json_encode([
                    ['question' => 'Where can I find the latest blog posts?', 'answer' => 'Check our blogs page for the latest updates.'],
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Rentals',
                'slug' => 'rentals',
                'image' => 'rentals-banner.jpg',
                'description' => 'Find the best rental options available.',
                'meta_title' => 'Rentals - My Awesome Site',
                'meta_description' => 'Browse our selection of rental options on My Awesome Site.',
                'meta_keyword' => 'rentals, accommodations, gear',
                'qna' => json_encode([
                    ['question' => 'What types of rentals are available?', 'answer' => 'We offer a range of rentals including vacation homes, equipment, and more.'],
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Activities',
                'slug' => 'activities',
                'image' => 'activities-banner.jpg',
                'description' => 'Discover exciting activities to do.',
                'meta_title' => 'Activities - My Awesome Site',
                'meta_description' => 'Explore various activities available for you.',
                'meta_keyword' => 'activities, fun, things to do',
                'qna' => json_encode([
                    ['question' => 'What activities can I do?', 'answer' => 'We have a wide range of activities including hiking, sightseeing, and more.'],
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Destinations',
                'slug' => 'destinations',
                'image' => 'destinations-banner.jpg',
                'description' => 'Find popular destinations and travel ideas.',
                'meta_title' => 'Destinations - My Awesome Site',
                'meta_description' => 'Explore various destinations and travel tips.',
                'meta_keyword' => 'destinations, travel, places to visit',
                'qna' => json_encode([
                    ['question' => 'What destinations are featured?', 'answer' => 'We feature popular destinations around the world.'],
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Attractions',
                'slug' => 'attractions',
                'image' => 'attractions-banner.jpg',
                'description' => 'Discover top attractions and must-see places.',
                'meta_title' => 'Attractions - My Awesome Site',
                'meta_description' => 'Find the top attractions and must-see places for your trip.',
                'meta_keyword' => 'attractions, sightseeing, must-see',
                'qna' => json_encode([
                    ['question' => 'What attractions are available?', 'answer' => 'We list the best attractions to visit in various destinations.'],
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Privacy Policy',
                'slug' => 'privacy-policy',
                'image' => 'privacy-banner.jpg',
                'description' => '<p> <strong>Acceptance of Terms:  </strong>By accessing and using our platform, you acknowledge that you have read,  understood, and agree to be bound by these terms and conditions. If you  do not agree with these terms, please do not use our services.</p>
                <p> <strong>User Accounts:  </strong>To use our platform, you must create a user account. You are responsible  for maintaining the confidentiality of your account information and for  all activities that occur under your account.</p>
                <p> <strong>Subscription Plans: </strong>We offer various subscription plans for our services, each with  different features and prices. You can select the plan that best fits  your needs and preferences.</p>
                <p> <strong>Payment:  </strong>Payment for subscription plans is due at the beginning of each billing  cycle. We accept various payment methods, including credit card and  PayPal.</p>
                <p> <strong>Intellectual Property:  </strong>All intellectual property rights in our platform, including software,  content, and trademarks, are owned by us or our licensors. You may not  copy, modify, distribute, or sell any part of our platform without our  prior written consent.</p>
                <p> <strong>Limitation of Liability:  </strong>We will not be liable for any damages arising out of or in connection  with the use of our platform, including but not limited to direct,  indirect, incidental, or consequential damages.</p>
                <p> <strong>Termination:  </strong>We reserve the right to terminate or suspend your access to our platform  at any time, without prior notice, if you violate these terms and  conditions or engage in any unlawful or unauthorized activity.</p>
                <p> <strong>Changes to Terms:  </strong>We may update or modify these terms and conditions at any time, without  prior notice. Your continued use of our platform after such changes will  constitute your acceptance of the revised terms.</p>
                <h6>Thank you for visiting!</h6>',
                'meta_title' => 'Privacy Policy - My Awesome Site',
                'meta_description' => 'Read our privacy policy to understand how we handle and secure your data.',
                'meta_keyword' => 'privacy, data protection, personal information',
                'qna' => json_encode([
                    ['question' => 'How is my data used?', 'answer' => 'Your data is used to enhance your experience on our platform, following strict privacy protocols.'],
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Terms of Service',
                'slug' => 'terms-of-service',
                'image' => 'terms-banner.jpg',
                'description' => '<p> <strong>Acceptance of Terms:  </strong>By accessing and using our platform, you acknowledge that you have read,  understood, and agree to be bound by these terms and conditions. If you  do not agree with these terms, please do not use our services.</p>
                <p> <strong>User Accounts:  </strong>To use our platform, you must create a user account. You are responsible  for maintaining the confidentiality of your account information and for  all activities that occur under your account.</p>
                <p> <strong>Subscription Plans: </strong>We offer various subscription plans for our services, each with  different features and prices. You can select the plan that best fits  your needs and preferences.</p>
                <p> <strong>Payment:  </strong>Payment for subscription plans is due at the beginning of each billing  cycle. We accept various payment methods, including credit card and  PayPal.</p>
                <p> <strong>Intellectual Property:  </strong>All intellectual property rights in our platform, including software,  content, and trademarks, are owned by us or our licensors. You may not  copy, modify, distribute, or sell any part of our platform without our  prior written consent.</p>
                <p> <strong>Limitation of Liability:  </strong>We will not be liable for any damages arising out of or in connection  with the use of our platform, including but not limited to direct,  indirect, incidental, or consequential damages.</p>
                <p> <strong>Termination:  </strong>We reserve the right to terminate or suspend your access to our platform  at any time, without prior notice, if you violate these terms and  conditions or engage in any unlawful or unauthorized activity.</p>
                <p> <strong>Changes to Terms:  </strong>We may update or modify these terms and conditions at any time, without  prior notice. Your continued use of our platform after such changes will  constitute your acceptance of the revised terms.</p>
                <h6>Thank you for visiting!</h6>',
                'meta_title' => 'Terms of Service - My Awesome Site',
                'meta_description' => 'Learn the rules and conditions for using our services.',
                'meta_keyword' => 'terms, conditions, user agreement',
                'qna' => json_encode([
                    ['question' => 'What are the terms of using this platform?', 'answer' => 'By using our services, you agree to comply with the terms outlined in our agreement.'],
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Payment Policy',
                'slug' => 'payment-policy',
                'image' => 'payment-banner.jpg',
                'description' => '<p> <strong>Acceptance of Terms:  </strong>By accessing and using our platform, you acknowledge that you have read,  understood, and agree to be bound by these terms and conditions. If you  do not agree with these terms, please do not use our services.</p>
                <p> <strong>User Accounts:  </strong>To use our platform, you must create a user account. You are responsible  for maintaining the confidentiality of your account information and for  all activities that occur under your account.</p>
                <p> <strong>Subscription Plans: </strong>We offer various subscription plans for our services, each with  different features and prices. You can select the plan that best fits  your needs and preferences.</p>
                <p> <strong>Payment:  </strong>Payment for subscription plans is due at the beginning of each billing  cycle. We accept various payment methods, including credit card and  PayPal.</p>
                <p> <strong>Intellectual Property:  </strong>All intellectual property rights in our platform, including software,  content, and trademarks, are owned by us or our licensors. You may not  copy, modify, distribute, or sell any part of our platform without our  prior written consent.</p>
                <p> <strong>Limitation of Liability:  </strong>We will not be liable for any damages arising out of or in connection  with the use of our platform, including but not limited to direct,  indirect, incidental, or consequential damages.</p>
                <p> <strong>Termination:  </strong>We reserve the right to terminate or suspend your access to our platform  at any time, without prior notice, if you violate these terms and  conditions or engage in any unlawful or unauthorized activity.</p>
                <p> <strong>Changes to Terms:  </strong>We may update or modify these terms and conditions at any time, without  prior notice. Your continued use of our platform after such changes will  constitute your acceptance of the revised terms.</p>
                <h6>Thank you for visiting!</h6>',
                'meta_title' => 'Payment Policy - My Awesome Site',
                'meta_description' => 'Understand our payment procedures, refund processes, and billing methods.',
                'meta_keyword' => 'payments, refunds, billing, transactions',
                'qna' => json_encode([
                    ['question' => 'What payment methods are accepted?', 'answer' => 'We accept various payment methods including credit cards and online transfers.'],
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
