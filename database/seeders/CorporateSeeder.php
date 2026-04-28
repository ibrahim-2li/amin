<?php

namespace Database\Seeders;

use App\Models\Division;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class CorporateSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedDivisionsAndServices();
        $this->seedPartners();
        $this->seedSettings();
    }

    private function seedDivisionsAndServices(): void
    {
        $divisions = [
            [
                'name' => 'IDEXA Security',
                'slug' => 'IDEXA-security',
                'tagline' => 'Advanced security and personalization solutions protecting sensitive personal and corporate data.',
                'description' => 'IDEXA Security is a leader in secure printing and identity management, delivering end-to-end data protection solutions for banking, government, telecom, retail, hospitality, and transport sectors across the KSA and beyond.',
                'long_description' => "IDEXA Security operates at the forefront of secure printing and identity management. We design, produce, and personalize identity documents and security credentials that protect citizens, organizations, and governments in an increasingly complex world.\n\nOur solutions span the full identity lifecycle — from biometric passport production and smart national ID cards to digital authentication infrastructure and PKI systems. We combine cutting-edge cryptographic technologies with tamper-evident physical substrates, delivering credentials trusted by sovereign authorities and enterprise clients across the region.\n\nServing banking, government, telecom, retail, hospitality, and transport sectors, IDEXA Security brings decades of specialised expertise and a proven track record of delivery at national scale. Every solution we produce is built to the most rigorous international standards, ensuring our clients can operate with complete confidence.",
                'hero_image' => 'https://images.unsplash.com/photo-1614064641938-3bbee52942c7?w=1920&q=80&auto=format&fit=crop',
                'color' => '#0f2d4a',
                'order' => 1,
                'services' => [
                    ['title' => 'Secure Identity Document Production', 'description' => 'Design, print, and personalization of biometric passports, national ID cards, and residence permits compliant with ICAO standards.'],
                    ['title' => 'Card Personalization & Management', 'description' => 'High-security personalization of banking cards, SIM cards, and smart credentials with EMV and contactless capabilities.'],
                    ['title' => 'Digital Certificate Authority (PKI)', 'description' => 'Establish and operate sovereign Public Key Infrastructure with root and issuing CAs for government and enterprise use.'],
                    ['title' => 'Biometric Authentication Systems', 'description' => 'Multi-modal biometric platforms combining fingerprint, facial recognition, and iris scanning for secure access control.'],
                    ['title' => 'Border Control & e-Gate Solutions', 'description' => 'Automated border control systems integrating document verification, biometrics, and real-time watchlist screening.'],
                    ['title' => 'Identity Lifecycle Management', 'description' => 'Centralized platforms managing citizen or employee identity records from enrollment through revocation and renewal.'],
                ],
            ],
            [
                'name' => 'IDEXA Packaging',
                'slug' => 'IDEXA-packaging',
                'tagline' => 'Innovative and environmentally friendly packaging solutions using state-of-the-art technologies.',
                'description' => 'IDEXA Packaging delivers innovative, sustainable packaging solutions using advanced production technologies — meeting 21st-century demands for performance, environmental responsibility, and brand protection.',
                'long_description' => "IDEXA Packaging combines materials science, print engineering, and sustainable production practices to create packaging that meets the highest standards of quality, functionality, and environmental stewardship.\n\nWe invest continually in state-of-the-art production technologies that allow us to deliver packaging solutions optimised for both performance and sustainability. Our approach integrates environmentally friendly materials and processes — reducing waste, minimising carbon footprint, and meeting the evolving demands of regulators and consumers alike.\n\nFrom pharmaceutical serialization and track-and-trace systems to premium luxury brand packaging, IDEXA Packaging brings deep technical expertise and a genuine commitment to innovation. We work closely with clients to develop packaging that protects their products, reinforces their brand, and aligns with their sustainability goals.",
                'hero_image' => 'https://images.unsplash.com/photo-1565793298595-6a879b1d9492?w=1920&q=80&auto=format&fit=crop',
                'color' => '#1a3a2a',
                'order' => 2,
                'services' => [
                    ['title' => 'Sustainable Packaging Design', 'description' => 'Eco-friendly packaging solutions using recycled, biodegradable, and renewable materials without compromising performance.'],
                    ['title' => 'Pharmaceutical Track & Trace', 'description' => 'Serialization and aggregation systems ensuring full supply chain visibility and regulatory compliance for pharmaceutical manufacturers.'],
                    ['title' => 'Anti-Counterfeit Packaging', 'description' => 'High-security packaging incorporating holograms, color-shifting inks, and digital watermarks to combat counterfeiting.'],
                    ['title' => 'Luxury Brand Packaging', 'description' => 'Premium folding cartons and specialty packaging combining sophisticated aesthetics with embedded authentication features.'],
                    ['title' => 'Smart Packaging & NFC Integration', 'description' => 'NFC and RFID-enabled packaging for consumer engagement, product authentication, and supply chain monitoring.'],
                    ['title' => 'Flexible Packaging Solutions', 'description' => 'High-barrier flexible packaging for food, beverage, and personal care products with optional security printing.'],
                ],
            ],
            [
                'name' => 'IDEXA Printing',
                'slug' => 'IDEXA-printing',
                'tagline' => 'A long-established regional powerhouse serving newspapers, magazines, books, and educational materials.',
                'description' => 'IDEXA Printing is a long-established regional printing powerhouse, delivering premium commercial and security printing services for governments, publishers, financial institutions, and corporations across the KSA and the wider region.',
                'long_description' => "IDEXA Printing has built its reputation over decades as one of the region's most capable and trusted printing operations. We serve the full spectrum of print requirements — from high-security government documents and banknotes to newspaper publishing, magazine production, books, out-of-home print projects, and educational materials.\n\nOperating state-of-the-art press technology alongside traditional craft techniques, we combine quality with scale. Our continuous investment in equipment upgrades ensures our clients always benefit from the latest printing innovations, while our experienced team of print specialists guarantees that quality is never compromised.\n\nOur ISO-certified production environment maintains the highest standards of information security and quality control throughout the entire print lifecycle — from artwork creation through to finishing, packing, and delivery.",
                'hero_image' => 'https://images.unsplash.com/photo-1588681664899-f142ff2dc9b1?w=1920&q=80&auto=format&fit=crop',
                'color' => '#2d1a3a',
                'order' => 3,
                'services' => [
                    ['title' => 'Newspaper & Magazine Printing', 'description' => 'High-speed, high-quality printing for daily newspapers, magazines, and periodicals with fast turnaround capabilities.'],
                    ['title' => 'Book & Publication Printing', 'description' => 'Commercial book printing for publishers, academic institutions, and corporate clients with full finishing options.'],
                    ['title' => 'Security Document Printing', 'description' => 'High-security printing for certificates, fiscal stamps, and official government documents with multiple security feature layers.'],
                    ['title' => 'Educational Material Production', 'description' => 'Curriculum-aligned textbooks, workbooks, and supplementary learning resources for schools and institutions.'],
                    ['title' => 'Out-of-Home & Large Format Printing', 'description' => 'Wide-format printing for billboards, signage, exhibition graphics, and architectural applications.'],
                    ['title' => 'Variable Data & Personalization', 'description' => 'Industrial-scale digital printing for personalized statements, mailers, and transactional documents at high volumes.'],
                ],
            ],
            [
                'name' => 'IDEXA Education',
                'slug' => 'IDEXA-education',
                'tagline' => 'Innovative educational products and solutions for KSA public and private institutions.',
                'description' => 'Established in 2019, IDEXA Education supplies innovative educational products and solutions to KSA public and private institutions, offering expert consultations aimed at developing competitive educational systems.',
                'long_description' => "Established in 2019, IDEXA Education was founded with a clear mission: to empower KSA educational institutions with the products, solutions, and expertise needed to build world-class learning environments.\n\nWe work directly with the KSA's public and private education sector — from the Ministry of Education and Riyadh Department of Education and Knowledge (ADEK) to individual schools and universities — providing comprehensive educational solutions that cover the full spectrum of institutional needs.\n\nOur team of curriculum specialists, educational technologists, and instructional designers collaborates closely with institutions to understand their unique requirements and develop tailored solutions. We go beyond product supply to offer genuine consulting and development support, helping institutions evolve their educational systems to compete on a global level.",
                'hero_image' => 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=1920&q=80&auto=format&fit=crop',
                'color' => '#3a2a0a',
                'order' => 4,
                'services' => [
                    ['title' => 'Educational Product Supply', 'description' => 'Comprehensive supply of textbooks, workbooks, stationery, laboratory equipment, and digital learning tools for institutions.'],
                    ['title' => 'Curriculum Development Consulting', 'description' => 'Expert consulting services to help institutions design and implement competitive, standards-aligned curriculum frameworks.'],
                    ['title' => 'e-Learning Solutions', 'description' => 'Learning management systems and interactive digital content for blended and online learning environments.'],
                    ['title' => 'Assessment & Examination Systems', 'description' => 'End-to-end examination management including question banks, secure printing, OMR scanning, and results processing.'],
                    ['title' => 'School Furniture & Infrastructure', 'description' => 'Ergonomic, purpose-designed school furniture and classroom fit-out solutions aligned with modern pedagogical approaches.'],
                    ['title' => 'Teacher Training Programmes', 'description' => 'Professional development programmes equipping educators with skills for technology-enhanced, outcome-focused teaching.'],
                ],
            ],
        ];

        foreach ($divisions as $divisionData) {
            $services = $divisionData['services'];
            unset($divisionData['services']);

            $division = Division::create($divisionData);

            foreach ($services as $order => $serviceData) {
                Service::create([
                    'division_id' => $division->id,
                    'title' => $serviceData['title'],
                    'description' => $serviceData['description'],
                    'icon' => null,
                    'order' => $order + 1,
                    'is_active' => true,
                ]);
            }
        }
    }

    private function seedPartners(): void
    {
        $partners = [
            ['name' => 'ADQ', 'category' => 'government'],
            ['name' => 'Thales Group', 'category' => 'technology'],
            ['name' => 'IDEMIA', 'category' => 'technology'],
            ['name' => 'Giesecke+Devrient', 'category' => 'technology'],
            ['name' => 'HID Global', 'category' => 'technology'],
            ['name' => 'De La Rue', 'category' => 'government'],
            ['name' => 'Bundesdruckerei', 'category' => 'government'],
            ['name' => 'Ministry of Interior KSA', 'category' => 'government'],
            ['name' => 'ADEK', 'category' => 'government'],
            ['name' => 'SITA', 'category' => 'technology'],
            ['name' => 'Veridos', 'category' => 'technology'],
            ['name' => 'SGS Group', 'category' => 'finance'],
        ];

        foreach ($partners as $order => $partner) {
            Partner::create([
                'name' => $partner['name'],
                'logo' => null,
                'website' => '#',
                'category' => $partner['category'],
                'order' => $order + 1,
                'is_active' => true,
            ]);
        }
    }

    private function seedSettings(): void
    {
        $settings = [
            ['key' => 'company_name', 'value' => 'IDEXA Group', 'type' => 'string'],
            ['key' => 'company_tagline', 'value' => 'Trusted Solutions for Your Business Across the KSA', 'type' => 'string'],
            ['key' => 'company_description', 'value' => 'From identity solutions to printing, packaging and delivery, we provide seamless integrated solutions — backed by the strength of ADQ, one of the region\'s leading investment and holding companies.', 'type' => 'string'],
            ['key' => 'contact_email', 'value' => 'info@IDEXA.sa', 'type' => 'string'],
            ['key' => 'contact_phone', 'value' => '+966000000000', 'type' => 'string'],
            ['key' => 'contact_address', 'value' => 'Plot 220, Old Qurtubah, Riyadh, KSA', 'type' => 'string'],
            ['key' => 'founded_year', 'value' => 'ADQ', 'type' => 'string'],
            ['key' => 'countries_served', 'value' => 'KSA+', 'type' => 'string'],
            ['key' => 'employees_count', 'value' => '1,000+', 'type' => 'string'],
            ['key' => 'projects_completed', 'value' => '500+', 'type' => 'string'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(['key' => $setting['key']], $setting);
        }
    }
}
