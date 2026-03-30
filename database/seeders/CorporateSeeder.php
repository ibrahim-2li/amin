<?php

namespace Database\Seeders;

use App\Models\Division;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
                'name' => 'Secure Identity & Digital Trust',
                'slug' => 'secure-identity-digital-trust',
                'tagline' => 'Protecting identities in an interconnected world.',
                'description' => 'We design and deliver advanced secure identity solutions — from high-security documents to end-to-end digital authentication platforms — enabling governments and enterprises to establish trusted digital ecosystems.',
                'long_description' => "Our Secure Identity & Digital Trust division operates at the intersection of physical security and digital innovation. We develop comprehensive identity infrastructure that safeguards citizens, organizations, and nations in the modern age.\n\nFrom biometric passports and smart national ID cards to digital signing infrastructure and PKI solutions, our offerings are trusted by sovereign authorities and enterprise clients across the region. We combine cutting-edge cryptographic technology with tamper-evident physical substrates to deliver credentials that are virtually impossible to forge.\n\nOur team of identity specialists, security engineers, and cryptographers works closely with government agencies to design bespoke identity ecosystems — from initial consultation and system design through to production, issuance, and lifecycle management.",
                'color' => '#0f2d4a',
                'order' => 1,
                'services' => [
                    ['title' => 'National ID & e-Passport Solutions', 'description' => 'End-to-end design, production, and personalization of biometric passports and national identity documents compliant with ICAO standards.'],
                    ['title' => 'Digital Certificate Authority (CA)', 'description' => 'Establish and operate a sovereign Public Key Infrastructure with root and issuing CAs for government and enterprise use.'],
                    ['title' => 'Biometric Authentication Systems', 'description' => 'Fingerprint, facial recognition, and iris-based multi-modal biometric authentication platforms for secure access control.'],
                    ['title' => 'Border Control & e-Gate Solutions', 'description' => 'Automated border control systems integrating document verification, biometrics, and watch-list screening.'],
                    ['title' => 'Digital Signature & Timestamping', 'description' => 'Legally binding digital signature services and qualified timestamping for government and enterprise transactions.'],
                    ['title' => 'Identity Lifecycle Management', 'description' => 'Centralized platforms for managing citizen or employee identity records from enrollment through to revocation.'],
                ],
            ],
            [
                'name' => 'Advanced Packaging Technologies',
                'slug' => 'advanced-packaging-technologies',
                'tagline' => 'Innovative packaging that protects, informs, and impresses.',
                'description' => 'We engineer high-security and specialty packaging solutions for pharmaceuticals, luxury goods, and fast-moving consumer products — combining aesthetics with advanced anti-counterfeit and track-and-trace capabilities.',
                'long_description' => "Our Advanced Packaging Technologies division brings together materials science, print engineering, and security features to create packaging that does far more than contain a product.\n\nIn an era of rampant counterfeiting and grey-market diversion, our packaging solutions serve as the first line of brand defense. We integrate covert and overt security features — holograms, color-shifting inks, digital watermarks, and serialized QR codes — directly into packaging structures, making verification instant and duplication practically impossible.\n\nFor the pharmaceutical sector, our solutions comply with the most stringent serialization and track-and-trace regulations worldwide. For luxury brands, we create tactile, visually stunning packaging that communicates premium quality while embedding discrete authentication features.",
                'color' => '#1a3a2a',
                'order' => 2,
                'services' => [
                    ['title' => 'Pharmaceutical Track & Trace', 'description' => 'Serialization and aggregation systems ensuring full supply chain visibility and regulatory compliance for pharmaceutical manufacturers.'],
                    ['title' => 'Anti-Counterfeit Labels & Seals', 'description' => 'High-security adhesive labels featuring holograms, void effects, and tamper-evident technologies.'],
                    ['title' => 'Luxury Brand Packaging', 'description' => 'Premium folding cartons and rigid boxes combining sophisticated aesthetics with embedded authentication features.'],
                    ['title' => 'Smart Packaging & IoT Integration', 'description' => 'NFC and RFID-enabled packaging enabling consumer engagement, authentication, and supply chain monitoring via smartphone.'],
                    ['title' => 'Holographic Security Elements', 'description' => 'Custom-designed diffractive optical variable devices (DOVIDs) for labels, packaging, and document security.'],
                    ['title' => 'Flexible Packaging Solutions', 'description' => 'High-barrier flexible packaging for food, beverage, and personal care products with optional security printing.'],
                ],
            ],
            [
                'name' => 'Smart Printing Solutions',
                'slug' => 'smart-printing-solutions',
                'tagline' => 'Where precision meets intelligence in every printed element.',
                'description' => 'We deliver cutting-edge commercial and security printing services using the latest digital and offset technologies, supporting governments, financial institutions, and enterprises with high-integrity printed materials.',
                'long_description' => "Our Smart Printing Solutions division bridges the physical and digital worlds through intelligent, high-quality printing capabilities. Operating state-of-the-art press technology, we produce everything from high-security banknotes and fiscal stamps to sophisticated commercial print for large corporations.\n\nWe combine traditional craftsmanship — intaglio printing, screen printing, letterpress — with digital variable-data capabilities that allow every printed item to carry unique serialized information. This convergence enables powerful anti-counterfeiting and personalization at industrial scale.\n\nOur ISO 27001-certified production environment ensures the highest levels of information security, chain of custody, and quality control throughout the entire print lifecycle — from artwork creation and platemaking through to finishing, packaging, and secure delivery.",
                'color' => '#2d1a3a',
                'order' => 3,
                'services' => [
                    ['title' => 'Security Document Printing', 'description' => 'High-security printing for banknotes, certificates, stamps, and official government documents with multiple security feature layers.'],
                    ['title' => 'Variable Data & Personalization', 'description' => 'Industrial-scale digital printing for personalized cards, mailers, statements, and transactional documents.'],
                    ['title' => 'Large-Format & Signage Printing', 'description' => 'Wide-format printing for indoor and outdoor signage, exhibition graphics, and architectural decoration.'],
                    ['title' => 'Commercial Offset Printing', 'description' => 'High-volume, color-accurate offset printing for brochures, catalogues, annual reports, and marketing collateral.'],
                    ['title' => 'Digital Short-Run Printing', 'description' => 'Cost-effective short-run digital printing with fast turnaround for prototypes, limited editions, and on-demand publications.'],
                    ['title' => 'Finishing & Binding Solutions', 'description' => 'Full suite of post-press finishing including foil stamping, embossing, die-cutting, and specialty binding.'],
                ],
            ],
            [
                'name' => 'Education & Knowledge Systems',
                'slug' => 'education-knowledge-systems',
                'tagline' => 'Empowering minds through integrated learning ecosystems.',
                'description' => 'We design comprehensive educational infrastructure — from curriculum development and e-learning platforms to physical learning materials and assessment systems — helping institutions transform teaching and learning outcomes.',
                'long_description' => "Our Education & Knowledge Systems division is dedicated to advancing human capital development through thoughtfully designed educational ecosystems. We work with ministries of education, universities, schools, and corporate training departments to create integrated learning environments that inspire, engage, and deliver measurable outcomes.\n\nOur capabilities span the full educational value chain: curriculum design aligned with national or international frameworks, development of textbooks and supplementary learning materials, deployment of learning management systems (LMS), and design of assessment and examination platforms — including digital question banks, OMR sheets, and results management.\n\nWe believe that great education is both a science and an art. Our teams of instructional designers, subject-matter experts, educational psychologists, and technology specialists collaborate to create learning experiences that honor pedagogical best practices while embracing the possibilities of digital technology.",
                'color' => '#3a2a0a',
                'order' => 4,
                'services' => [
                    ['title' => 'Curriculum Design & Development', 'description' => 'Evidence-based curriculum frameworks and detailed lesson plans aligned with national standards and international benchmarks.'],
                    ['title' => 'Learning Management Systems (LMS)', 'description' => 'Custom LMS deployments and integrations supporting blended learning, gamification, and analytics-driven insight.'],
                    ['title' => 'Textbook & Educational Material Production', 'description' => 'Design, print, and distribution of curriculum-aligned textbooks, workbooks, and supplementary learning resources.'],
                    ['title' => 'Assessment & Examination Systems', 'description' => 'End-to-end examination management including digital question banks, secure printing, OMR scanning, and results processing.'],
                    ['title' => 'e-Learning Content Development', 'description' => 'Engaging interactive modules, simulations, and microlearning content for digital delivery across devices.'],
                    ['title' => 'Teacher Training & Professional Development', 'description' => 'Blended training programs equipping educators with skills for modern, technology-enhanced classrooms.'],
                ],
            ],
            [
                'name' => 'Intelligent Logistics & Fulfilment',
                'slug' => 'intelligent-logistics-fulfilment',
                'tagline' => 'Seamless, smart supply chains from origin to destination.',
                'description' => 'We architect and operate end-to-end supply chain and logistics solutions — integrating warehousing, distribution, track-and-trace, and last-mile delivery technologies to help clients achieve operational excellence.',
                'long_description' => "Our Intelligent Logistics & Fulfilment division provides the infrastructure and technology layer that connects production with end-consumer delivery across complex, high-stakes supply chains.\n\nWe go beyond conventional logistics by embedding intelligence at every node of the supply chain. Our warehouse management systems (WMS), transport management systems (TMS), and IoT-enabled asset tracking solutions give clients real-time visibility and control over their inventory and shipments — whether they are moving high-security documents, pharmaceutical products, or consumer goods.\n\nWe have deep expertise in handling regulated and sensitive cargo — including secure document distribution for government clients — where chain of custody, audit trails, and tamper-evidence are non-negotiable. Our secure logistics centers operate under strict access controls and surveillance, ensuring that sensitive materials reach their destination intact and on schedule.",
                'color' => '#0a2a3a',
                'order' => 5,
                'services' => [
                    ['title' => 'Secure Document Distribution', 'description' => 'End-to-end secure distribution of identity documents, certificates, and sensitive printed materials with full chain-of-custody tracking.'],
                    ['title' => 'Warehouse Management Systems (WMS)', 'description' => 'Cloud-based WMS for real-time inventory visibility, slotting optimization, and automated replenishment.'],
                    ['title' => 'Track & Trace Technology', 'description' => 'End-to-end shipment tracking using barcode, RFID, and GPS technologies integrated with customer portals.'],
                    ['title' => 'Last-Mile Delivery Solutions', 'description' => 'Intelligent last-mile routing and delivery management with proof-of-delivery capture and customer notification.'],
                    ['title' => 'Cold Chain Logistics', 'description' => 'Temperature-controlled storage and transport for pharmaceuticals, biologics, and perishable goods.'],
                    ['title' => 'Supply Chain Consulting', 'description' => 'Strategic supply chain assessments, network design, and continuous improvement programs for complex operations.'],
                ],
            ],
        ];

        foreach ($divisions as $index => $divisionData) {
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
            ['name' => 'Thales Group', 'category' => 'technology'],
            ['name' => 'IDEMIA', 'category' => 'technology'],
            ['name' => 'Bundesdruckerei', 'category' => 'government'],
            ['name' => 'De La Rue', 'category' => 'government'],
            ['name' => 'HID Global', 'category' => 'technology'],
            ['name' => 'Giesecke+Devrient', 'category' => 'technology'],
            ['name' => 'Interpol', 'category' => 'government'],
            ['name' => 'SITA', 'category' => 'technology'],
            ['name' => 'Veridos', 'category' => 'technology'],
            ['name' => 'ABB Group', 'category' => 'technology'],
            ['name' => 'Siemens', 'category' => 'technology'],
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
            ['key' => 'company_name', 'value' => 'Amin Group', 'type' => 'string'],
            ['key' => 'company_tagline', 'value' => 'Excellence Across Every Dimension', 'type' => 'string'],
            ['key' => 'company_description', 'value' => 'A diversified group of companies delivering world-class solutions in identity, packaging, printing, education, and logistics across the MENA region and beyond.', 'type' => 'string'],
            ['key' => 'contact_email', 'value' => 'info@amingroup.ae', 'type' => 'string'],
            ['key' => 'contact_phone', 'value' => '+971 4 000 0000', 'type' => 'string'],
            ['key' => 'contact_address', 'value' => 'Dubai, United Arab Emirates', 'type' => 'string'],
            ['key' => 'founded_year', 'value' => '1985', 'type' => 'string'],
            ['key' => 'countries_served', 'value' => '30+', 'type' => 'string'],
            ['key' => 'employees_count', 'value' => '2,500+', 'type' => 'string'],
            ['key' => 'projects_completed', 'value' => '500+', 'type' => 'string'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(['key' => $setting['key']], $setting);
        }
    }
}
