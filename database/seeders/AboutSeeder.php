<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        About::updateOrCreate(
            ['id' => 1],
            [
                'hero_title' => 'Trusted solutions for businesses across Saudi Arabia.',
                'hero_subtitle' => 'Amin Group brings together specialised capabilities, reliable operations, and long-term partnerships to support organisations with confidence.',
                'hero_image' => 'https://images.unsplash.com/photo-1486325212027-8081e485255e?w=1920&q=80',
                'home_title' => 'Amin Group brings critical business services into one coordinated group.',
                'home_text' => 'From secure identity and specialized printing to packaging, education, and logistics, we help organizations move faster with reliable execution and one connected delivery partner.',
                'home_image' => 'https://e7group.ae/public/assets/img/home_bg.jpg',
                'home_delivery_label' => 'Delivery Model',
                'home_delivery_text' => 'Design, produce, protect, and deliver from one coordinated platform.',
                'home_features' => [
                    [
                        'title' => 'One accountable group',
                        'description' => 'Connected teams reduce handoffs and keep complex programs moving.',
                        'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4'
                    ],
                    [
                        'title' => 'Specialized execution',
                        'description' => 'Each business unit brings focused expertise for demanding work.',
                        'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'
                    ]
                ],
                'purpose_title' => 'Purpose-built support for ambitious organisations.',
                'purpose_description' => 'We help clients move from requirement to delivery with clear coordination, practical expertise, and a commitment to quality at every step.',
                'mission' => 'To deliver dependable business solutions that help our clients operate, grow, and serve their customers better.',
                'vision' => 'To be a trusted Saudi partner known for quality, reliability, and integrated service delivery.',
                'backing' => 'Our work is strengthened by experienced teams, operational discipline, and partnerships with organisations that share our standards.',
                'values' => [
                    [
                        'title' => 'Integrity',
                        'desc' => 'We build lasting relationships through honest communication and dependable delivery.',
                        'icon' => 'M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z'
                    ],
                    [
                        'title' => 'Excellence',
                        'desc' => 'We hold our work to a high standard across every service, project, and partnership.',
                        'icon' => 'M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.563.563 0 00-.182-.557l-4.204-3.602a.562.562 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z'
                    ],
                    [
                        'title' => 'Partnership',
                        'desc' => 'We work closely with clients and partners to create practical, joined-up solutions.',
                        'icon' => 'M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 9.094 9.094 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0z'
                    ],
                    [
                        'title' => 'Innovation',
                        'desc' => 'We keep improving our methods, technology, and service experience.',
                        'icon' => 'M12 18v-5.25m0 0a6.01 6.01 0 001.5-.189m-1.5.189a6.01 6.01 0 01-1.5-.189m3.75 7.478a12.06 12.06 0 01-4.5 0m3.75 2.311a7.5 7.5 0 01-3 0M12 2.25a6 6 0 00-3.75 10.687'
                    ]
                ]
            ]
        );
    }
}
