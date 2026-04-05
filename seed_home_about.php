<?php
use App\Models\About;

$about = About::first();
if ($about) {
    if (empty($about->home_title)) {
        $about->home_title = "From identity solutions to printing, packaging and delivery, we provide seamless integrated solutions";
        $about->home_text = "e7 Group operates as a comprehensive business solutions provider offering an innovative and diversified portfolio of printing, packaging, and distribution solutions that empower essential industries.\n\nBacked by the strength of ADQ, we build long-term partnerships with the world's leading companies and governments — combining deep sector expertise with a relentless commitment to quality and innovation.";
        $about->home_image = "https://images.unsplash.com/photo-1497366216548-37526070297c?w=900&q=80&auto=format&fit=crop";
        $about->save();
        echo "Updated existing About successfully.\n";
    }
}
