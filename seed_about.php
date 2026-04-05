<?php
use App\Models\About;

if (About::count() === 0) {
    About::create([
        'hero_title' => 'An all-in-one partner for secure & smart solutions.',
        'hero_subtitle' => 'e7 Group is an Abu Dhabi-based company providing an innovative and diversified portfolio of printing, packaging, and distribution solutions that empower essential industries — backed by ADQ, one of the region\'s leading investment and holding companies.',
        'hero_image' => 'https://images.unsplash.com/photo-1486325212027-8081e485255e?w=1920&q=80&auto=format&fit=crop',
        'purpose_title' => 'Innovation and excellence in every solution.',
        'purpose_description' => "e7 Group exists to give businesses and institutions across the UAE the fully integrated solutions they need to operate efficiently and securely. Whether we are protecting a national identity infrastructure, enabling seamless logistics, or empowering the next generation through education — our purpose is the same: to deliver solutions that matter.\n\nWith a proven track record of quality, reliability, and cutting-edge expertise, we anticipate the evolving needs of businesses and institutions — building long-term partnerships with the world's leading companies and governments.",
        'mission' => 'To deliver transformative, integrated solutions that empower essential industries — combining innovation, reliability, and excellence in every service we provide.',
        'vision' => 'To be the UAE\'s most trusted all-in-one partner for secure and smart solutions — recognised for our seamless integration, our people, and our commitment to building a better future.',
        'backing' => 'Backed by ADQ, one of the region\'s leading investment and holding companies, e7 Group has the strength and resources to deliver at scale across the UAE and beyond.',
        'values' => [
            [
                'title' => 'Integrity',
                'desc' => 'We operate with absolute transparency and the highest ethical standards in every engagement, every transaction, and every commitment we make.',
                'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
            ],
            [
                'title' => 'Excellence',
                'desc' => 'We pursue the highest quality in every solution — from the security features embedded in an identity document to the sustainability built into our packaging.',
                'icon' => 'M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z',
            ],
            [
                'title' => 'Innovation',
                'desc' => 'Innovation drives us. We invest continuously in research and development, anticipating the evolving needs of businesses and institutions across the UAE.',
                'icon' => 'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z',
            ],
            [
                'title' => 'Partnership',
                'desc' => 'We build long-term partnerships with our clients — working as genuine partners invested in the success of the businesses and institutions we serve.',
                'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z',
            ],
        ]
    ]);
}
