<?php
/**
 * Front Page Template - Dark Theme SPA
 */
get_header();

// Hero fields
$hero_greeting     = get_field('hero_greeting')       ?: 'Crafting Custom Solutions';
$hero_name         = get_field('hero_name')           ?: 'Shamaiah Lee Cadut';
$hero_tagline      = get_field('hero_tagline')        ?: 'Analyst';
$hero_description  = get_field('hero_description')    ?: 'An analyst focused on transforming complex data and systems into clear, actionable insights through structured thinking and data-driven problem solving.';
$hero_image_data   = get_field('hero_image');
$hero_image_url    = $hero_image_data ? $hero_image_data['url'] : get_template_directory_uri() . '/assets/images/hero_mockup.png';
$hero_image_alt    = $hero_image_data ? $hero_image_data['alt'] : 'Avatar';
$hero_cta_text     = get_field('hero_cta_text')       ?: 'VIEW MY WORK';
$hero_cta_link     = get_field('hero_cta_link')       ?: '#works';
$hero_resume_label = get_field('hero_resume_label')   ?: 'RESUME';
$hero_resume_link  = get_field('hero_resume_link')    ?: 'resume.pdf';

// Section content
$works_subtitle    = get_field('works_section_subtitle')  ?: 'A selection of technical implementations built to solve specific system and user experience goals.';
$skills_subtitle   = get_field('skills_section_subtitle') ?: 'A curated selection of languages, frameworks, databases, and design utilities that I use to bring ideas to life.';

// About page fields (dynamically loaded for SPA section)
$about_years_exp = 3;
$about_projects_count = 15;
$about_clients_count = 5;
$about_bio = '';

$about_page = get_page_by_path('about');
if ($about_page) {
    $about_id = $about_page->ID;
    $about_years_exp = get_field('about_years_exp', $about_id) ?: $about_years_exp;
    $about_projects_count = get_field('about_projects_count', $about_id) ?: $about_projects_count;
    $about_clients_count = get_field('about_clients_count', $about_id) ?: $about_clients_count;
    $about_bio = get_field('about_bio', $about_id);
}
if (!$about_bio) {
    $about_bio = 'An analyst focused on transforming complex data and systems into clear, actionable insights through structured thinking and data-driven problem solving.';
}

// Certifications count
$certs_query = new WP_Query(array(
    'post_type'      => 'certificate',
    'posts_per_page' => -1,
));
$certs_count = $certs_query->found_posts ?: 4;

// Group skills by category
$skills_by_category = [];
$skills_query = new WP_Query(array(
    'post_type'      => 'skill',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
));
if ($skills_query->have_posts()) {
    while ($skills_query->have_posts()) {
        $skills_query->the_post();
        $cat = get_field('skill_category') ?: 'Other Skills';
        
        $skills_by_category[$cat][] = [
            'title' => get_the_title(),
            'icon'  => get_field('skill_icon') ?: 'fa-solid fa-code',
            'pct'   => get_field('skill_percentage') ?: 50,
            'desc'  => get_field('skill_description'),
            'level' => get_field('skill_proficiency') ?: 'intermediate',
        ];
    }
    wp_reset_postdata();
}

// If skills database is empty, create fallbacks matching the theme Stack
if (empty($skills_by_category)) {
    $skills_by_category = [
        'Frontend' => [
            ['title' => 'HTML', 'icon' => 'fa-brands fa-html5', 'pct' => 95, 'level' => 'expert', 'desc' => ''],
            ['title' => 'CSS', 'icon' => 'fa-brands fa-css3-alt', 'pct' => 90, 'level' => 'expert', 'desc' => ''],
            ['title' => 'JavaScript', 'icon' => 'fa-brands fa-js', 'pct' => 90, 'level' => 'advanced', 'desc' => ''],
        ],
        'Backend' => [
            ['title' => 'PHP', 'icon' => 'fa-brands fa-php', 'pct' => 85, 'level' => 'advanced', 'desc' => ''],
            ['title' => 'Python', 'icon' => 'fa-brands fa-python', 'pct' => 80, 'level' => 'advanced', 'desc' => ''],
            ['title' => 'Java', 'icon' => 'fa-brands fa-java', 'pct' => 75, 'level' => 'intermediate', 'desc' => 'basic applications / OOP concepts'],
        ],
        'Tools & Technologies' => [
            ['title' => 'MySQL', 'icon' => 'fa-solid fa-database', 'pct' => 85, 'level' => 'advanced', 'desc' => 'database management'],
            ['title' => 'XAMPP', 'icon' => 'fa-solid fa-server', 'pct' => 80, 'level' => 'advanced', 'desc' => 'local server environment'],
            ['title' => 'Visual Studio Code', 'icon' => 'fa-solid fa-code', 'pct' => 95, 'level' => 'expert', 'desc' => 'code editor'],
            ['title' => 'Git & GitHub', 'icon' => 'fa-brands fa-github', 'pct' => 90, 'level' => 'expert', 'desc' => 'version control and collaboration'],
            ['title' => 'Figma', 'icon' => 'fa-brands fa-figma', 'pct' => 85, 'level' => 'advanced', 'desc' => 'UI/UX prototyping and interface design'],
        ]
    ];
}

// Contact page fields
$contact_page = get_page_by_path('contact');
$contact_id = $contact_page ? $contact_page->ID : 0;
$contact_heading = get_field('contact_heading', $contact_id) ?: 'Start a Conversation.';
$contact_desc = get_field('contact_description', $contact_id) ?: 'Got a complex project challenge or just want to connect? Reach out and let\'s discuss how we can build something impactful.';
$contact_email = get_field('contact_email', $contact_id) ?: 'shamaiahleecadut@gmail.com';
$contact_phone = get_field('contact_phone', $contact_id) ?: '+63123456789';
$contact_shortcode = get_field('contact_form_shortcode', $contact_id) ?: '[contact-form-7 id="56" title="Contact form 1"]';

// Core technologies carousel
$carousel_items = [];
if (have_rows('core_technologies')) {
    while (have_rows('core_technologies')) {
        the_row();
        $carousel_items[] = [
            'name' => get_sub_field('name'),
            'icon' => get_sub_field('icon'),
        ];
    }
}
if (empty($carousel_items)) {
    $carousel_items = [
        ['name' => 'Javascript', 'icon' => 'fa-brands fa-js'],
        ['name' => 'React', 'icon' => 'fa-brands fa-react'],
        ['name' => 'Nodejs', 'icon' => 'fa-brands fa-node'],
        ['name' => 'Laravel', 'icon' => 'fa-brands fa-laravel'],
        ['name' => 'PHP', 'icon' => 'fa-brands fa-php'],
        ['name' => 'Github', 'icon' => 'fa-brands fa-github'],
        ['name' => 'Git', 'icon' => 'fa-brands fa-git-alt'],
        ['name' => 'MySQL', 'icon' => 'fa-solid fa-database'],
        ['name' => 'MongoDB', 'icon' => 'fa-solid fa-database'],
        ['name' => 'WordPress', 'icon' => 'fa-brands fa-wordpress'],
        ['name' => 'Figma', 'icon' => 'fa-brands fa-figma'],
    ];
}
$carousel_loop = array_merge($carousel_items, $carousel_items);
?>

<style>
    .animate-scroll {
        animation: scroll 25s linear infinite;
    }

    @keyframes scroll {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }

    .glow-blob {
        filter: blur(120px);
        opacity: 0.15;
    }
    
    /* Dark Contact Form overrides */
    .dark-contact-form p {
        margin: 0 !important;
    }
    .dark-contact-form .portfolio-contact-form {
        background: transparent !important;
        padding: 0 !important;
        border: none !important;
        box-shadow: none !important;
        max-width: 100% !important;
        max-height: none !important;
        margin: 0 !important;
    }
    .dark-contact-form .portfolio-contact-form label {
        display: block !important;
        font-size: 10px !important;
        font-weight: 800 !important;
        text-transform: uppercase !important;
        letter-spacing: 0.15em !important;
        color: #71717a !important;
        margin-bottom: 6px !important;
    }
    .dark-contact-form .portfolio-input,
    .dark-contact-form .portfolio-textarea {
        width: 100% !important;
        background: #09090b !important;
        border: 1px solid #27272a !important;
        color: #f4f4f5 !important;
        padding: 14px 18px !important;
        border-radius: 12px !important;
        font-size: 14px !important;
        transition: all 0.3s !important;
        margin-top: 6px !important;
        margin-bottom: 20px !important;
        box-sizing: border-box !important;
    }
    .dark-contact-form .portfolio-input:focus,
    .dark-contact-form .portfolio-textarea:focus {
        outline: none !important;
        border-color: #F472B6 !important;
        box-shadow: 0 0 0 3px rgba(244, 114, 182, 0.15) !important;
        background: #09090b !important;
    }
    .dark-contact-form .portfolio-textarea {
        height: 100px !important;
        resize: none !important;
    }
    .dark-contact-form .portfolio-btn {
        background: #F472B6 !important;
        color: #09090b !important;
        font-weight: 800 !important;
        text-transform: uppercase !important;
        font-size: 11px !important;
        letter-spacing: 0.15em !important;
        padding: 16px 36px !important;
        border-radius: 12px !important;
        cursor: pointer !important;
        transition: all 0.3s !important;
        border: none !important;
        width: 100% !important;
        margin-top: 10px !important;
    }
    .dark-contact-form .portfolio-btn:hover {
        background: #EC4899 !important;
        transform: translateY(-1px) !important;
    }
    .dark-contact-form .wpcf7-response-output {
        border-radius: 12px !important;
        padding: 12px 18px !important;
        margin: 20px 0 0 0 !important;
        font-size: 13px !important;
        border: 1px solid transparent !important;
    }
    .dark-contact-form .wpcf7-status-sent {
        background: rgba(16, 185, 129, 0.1) !important;
        border-color: rgba(16, 185, 129, 0.2) !important;
        color: #10b981 !important;
    }
    .dark-contact-form .wpcf7-status-failed,
    .dark-contact-form .wpcf7-status-validation-failed {
        background: rgba(239, 68, 68, 0.1) !important;
        border-color: rgba(239, 68, 68, 0.2) !important;
        color: #ef4444 !important;
    }
</style>

<!-- Background Blur Glows -->
<div class="relative w-full overflow-hidden">
    <div class="glow-blob absolute top-20 right-[-10%] w-[500px] h-[500px] bg-accent/25 rounded-full pointer-events-none"></div>
    <div class="glow-blob absolute top-[1200px] left-[-15%] w-[600px] h-[600px] bg-accent/15 rounded-full pointer-events-none"></div>
    <div class="glow-blob absolute bottom-[600px] right-[-10%] w-[500px] h-[500px] bg-accent/20 rounded-full pointer-events-none"></div>

    <!-- Hero Section -->
    <section id="home" class="min-h-[90vh] flex items-center py-20 relative">
        <div class="max-w-7xl mx-auto px-8 md:px-24 w-full grid md:grid-cols-2 gap-16 items-center">
            
            <!-- Text Column -->
            <div class="z-10 order-2 md:order-1">
                <span class="text-accent font-bold text-xs tracking-[0.35em] uppercase mb-4 block">
                    <?php echo esc_html($hero_greeting); ?>
                </span>
                <h1 class="text-5xl md:text-7xl font-extrabold text-white tracking-tight mb-4 leading-none font-display">
                    Building Digital Experiences with <span class="italic text-accent font-light">Precision.</span>
                </h1>
                <p class="text-zinc-400 text-base md:text-lg leading-relaxed max-w-lg mb-10">
                    <?php echo esc_html($hero_description); ?>
                </p>

                <div class="flex flex-wrap gap-4 mb-12">
                    <a href="#works" class="bg-accent text-zinc-950 hover:bg-accent-hover px-8 py-4 rounded-xl font-bold transition duration-300 transform hover:-translate-y-0.5 shadow-lg shadow-accent/10 text-xs uppercase tracking-wider">
                        <?php echo esc_html($hero_cta_text); ?>
                    </a>
                    <a href="#contact" class="border border-border-dark text-white hover:border-accent hover:text-accent px-8 py-4 rounded-xl font-bold transition duration-300 transform hover:-translate-y-0.5 text-xs uppercase tracking-wider">
                        Get In Touch
                    </a>
                </div>


            </div>

            <!-- Visual Column -->
            <div class="relative flex justify-center items-center order-1 md:order-2">
                <div class="relative w-full max-w-[480px] aspect-[4/3] rounded-3xl overflow-hidden border border-border-dark bg-card-dark p-2.5 shadow-2xl">
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/hero_mockup.png'; ?>" alt="Hero Mockup" class="w-full h-full object-cover rounded-2xl">
                    <!-- Glow effect -->
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-accent to-accent-hover rounded-3xl blur opacity-25 -z-10 animate-pulse"></div>
                </div>
            </div>

        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-24 border-t border-border-dark bg-bg-dark/40">
        <div class="max-w-7xl mx-auto px-8 md:px-24">
            
            <div class="grid md:grid-cols-2 gap-16 items-start">
                <!-- Info Column -->
                <div class="space-y-6">
                    <div class="flex items-center gap-4 mb-2">
                        <div class="h-[1px] w-8 bg-accent"></div>
                        <span class="text-accent font-bold text-xs tracking-widest uppercase">Who I Am</span>
                    </div>
                    
                    <h2 class="text-4xl md:text-5xl font-black text-white leading-tight font-display">
                        Writing Logic,<br>Inspiring Interaction.
                    </h2>
                    
                    <div class="text-zinc-400 space-y-4 text-sm md:text-base leading-relaxed font-light">
                        <?php if($about_bio): ?>
                            <?php echo wp_kses_post($about_bio); ?>
                        <?php else: ?>
                            <p>An analyst focused on transforming complex data and systems into clear, actionable insights through structured thinking and data-driven problem solving.</p>
                        <?php endif; ?>
                    </div>

                    <!-- Quote Block -->
                    <div class="border-l-2 border-accent pl-6 py-2 mt-8">
                        <blockquote class="italic text-zinc-400 text-sm font-medium leading-relaxed">
                            "A system is only as strong as its foundation, and a user experience is only as memorable as the logic behind it."
                        </blockquote>
                    </div>
                </div>

                <!-- Stats Grid -->
                <div class="grid grid-cols-2 gap-4 md:mt-16">
                    <!-- Stat 1 -->
                    <div class="bg-card-dark border border-border-dark p-6 rounded-2xl relative overflow-hidden group hover:border-accent/40 transition-colors duration-300">
                        <div class="absolute -right-4 -bottom-4 text-accent/5 text-7xl font-bold font-display group-hover:text-accent/10 transition-colors duration-300">01</div>
                        <p class="text-[9px] text-zinc-500 font-bold uppercase tracking-wider mb-2">Years of Experience</p>
                        <h4 class="text-3xl font-black text-white font-display mb-1"><?php echo esc_html($about_years_exp); ?>+</h4>
                        <p class="text-xs text-zinc-400">Years coding & crafting</p>
                    </div>

                    <!-- Stat 2 -->
                    <div class="bg-card-dark border border-border-dark p-6 rounded-2xl relative overflow-hidden group hover:border-accent/40 transition-colors duration-300">
                        <div class="absolute -right-4 -bottom-4 text-accent/5 text-7xl font-bold font-display group-hover:text-accent/10 transition-colors duration-300">02</div>
                        <p class="text-[9px] text-zinc-500 font-bold uppercase tracking-wider mb-2">Projects Completed</p>
                        <h4 class="text-3xl font-black text-white font-display mb-1"><?php echo esc_html($about_projects_count); ?>+</h4>
                        <p class="text-xs text-zinc-400">Completed & deployed</p>
                    </div>

                    <!-- Stat 3 -->
                    <div class="bg-card-dark border border-border-dark p-6 rounded-2xl relative overflow-hidden group hover:border-accent/40 transition-colors duration-300">
                        <div class="absolute -right-4 -bottom-4 text-accent/5 text-7xl font-bold font-display group-hover:text-accent/10 transition-colors duration-300">03</div>
                        <p class="text-[9px] text-zinc-500 font-bold uppercase tracking-wider mb-2">Happy Clients</p>
                        <h4 class="text-3xl font-black text-white font-display mb-1"><?php echo esc_html($about_clients_count); ?>+</h4>
                        <p class="text-xs text-zinc-400">Happy partners globally</p>
                    </div>

                    <!-- Stat 4 -->
                    <div class="bg-card-dark border border-border-dark p-6 rounded-2xl relative overflow-hidden group hover:border-accent/40 transition-colors duration-300">
                        <div class="absolute -right-4 -bottom-4 text-accent/5 text-7xl font-bold font-display group-hover:text-accent/10 transition-colors duration-300">04</div>
                        <p class="text-[9px] text-zinc-500 font-bold uppercase tracking-wider mb-2">Certifications</p>
                        <h4 class="text-3xl font-black text-white font-display mb-1"><?php echo esc_html($certs_count); ?>+</h4>
                        <p class="text-xs text-zinc-400">Verified Certifications</p>
                    </div>
                </div>
            </div>

            <!-- Education Timeline -->
            <div class="mt-24 pt-20 border-t border-border-dark">
                <div class="text-center mb-16">
                    <span class="text-accent font-bold text-xs tracking-widest uppercase mb-2 block">Background</span>
                    <h3 class="text-3xl font-black text-white font-display">Educational Journey</h3>
                </div>
                
                <div class="relative max-w-4xl mx-auto">
                    <!-- Vertical Line (Desktop) -->
                    <div class="absolute left-4 md:left-1/2 transform -translate-x-1/2 top-0 bottom-0 w-0.5 bg-border-dark"></div>
                    
                    <!-- Entry 1 -->
                    <div class="relative flex flex-col md:flex-row items-stretch mb-12 gap-8 md:gap-0">
                        <div class="w-full md:w-1/2 md:pr-12 md:text-right pl-12 md:pl-0 flex flex-col justify-center">
                            <span class="text-accent font-bold text-xs">2021 — 2026</span>
                            <h4 class="text-xl font-bold text-white mt-1">Bachelor of Science in Information Technology</h4>
                            <p class="text-xs text-zinc-500 mb-3">Davao Oriental State University</p>
                            <ul class="text-zinc-400 text-sm leading-relaxed space-y-2 flex flex-col md:items-end">
                                <li class="flex items-start gap-2.5 md:flex-row-reverse">
                                    <span class="text-accent mt-2 flex-shrink-0"><i class="fa-solid fa-circle text-[5px]"></i></span>
                                    <span>Developed foundational skills in systems analysis and design, including identifying requirements and structuring solutions for software and business processes.</span>
                                </li>
                                <li class="flex items-start gap-2.5 md:flex-row-reverse">
                                    <span class="text-accent mt-2 flex-shrink-0"><i class="fa-solid fa-circle text-[5px]"></i></span>
                                    <span>Gained experience in programming and database management, enabling the development and organization of functional, data-driven applications.</span>
                                </li>
                            </ul>
                        </div>
                        <div class="absolute left-4 md:left-1/2 transform -translate-x-1/2 w-8 h-8 rounded-full bg-zinc-950 border-4 border-accent shadow-lg flex items-center justify-center z-10 text-accent font-bold text-xs">1</div>
                        <div class="w-full md:w-1/2 md:pl-12 pl-12 hidden md:block"></div>
                    </div>

                    <!-- Entry 2 -->
                    <div class="relative flex flex-col md:flex-row items-stretch gap-8 md:gap-0">
                        <div class="w-full md:w-1/2 md:pr-12 hidden md:block"></div>
                        <div class="absolute left-4 md:left-1/2 transform -translate-x-1/2 w-8 h-8 rounded-full bg-zinc-950 border-4 border-accent shadow-lg flex items-center justify-center z-10 text-accent font-bold text-xs">2</div>
                        <div class="w-full md:w-1/2 md:pl-12 pl-12 flex flex-col justify-center">
                            <span class="text-accent font-bold text-xs">2019 — 2021</span>
                            <h4 class="text-xl font-bold text-white mt-1">Computer System Servicing</h4>
                            <p class="text-xs text-zinc-500 mb-3">Lupon Vocational High School</p>
                            <ul class="text-zinc-400 text-sm leading-relaxed space-y-2 flex flex-col items-start">
                                <li class="flex items-start gap-2.5">
                                    <span class="text-accent mt-2 flex-shrink-0"><i class="fa-solid fa-circle text-[5px]"></i></span>
                                    <span>Proficient in computer hardware installation, troubleshooting, and maintenance, including assembly and repair of system units and peripherals.</span>
                                </li>
                                <li class="flex items-start gap-2.5">
                                    <span class="text-accent mt-2 flex-shrink-0"><i class="fa-solid fa-circle text-[5px]"></i></span>
                                    <span>Skilled in basic network setup and configuration, including LAN installation.</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

    <!-- Stack Section -->
    <section id="skills" class="py-24 border-t border-border-dark">
        <div class="max-w-7xl mx-auto px-8 md:px-24">
            
            <div class="mb-16">
                <div class="flex items-center gap-4 mb-2">
                    <div class="h-[1px] w-8 bg-accent"></div>
                    <span class="text-accent font-bold text-xs tracking-widest uppercase">Creative Tech Stack</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-black text-white leading-tight mb-6 font-display">
                    The Stack.
                </h2>
                <p class="text-zinc-400 text-base max-w-xl font-light">
                    <?php echo esc_html($skills_subtitle); ?>
                </p>
            </div>

            <!-- Categories Grid -->
            <div class="grid md:grid-cols-3 gap-6 mb-20">
                <?php foreach ($skills_by_category as $category_name => $skills_list): ?>
                    <?php 
                    // Match category to icon
                    $icon = 'fa-solid fa-code';
                    if (stripos($category_name, 'front') !== false) {
                        $icon = 'fa-solid fa-laptop-code';
                    } elseif (stripos($category_name, 'back') !== false) {
                        $icon = 'fa-solid fa-server';
                    } elseif (stripos($category_name, 'db') !== false || stripos($category_name, 'data') !== false) {
                        $icon = 'fa-solid fa-database';
                    } elseif (stripos($category_name, 'tool') !== false || stripos($category_name, 'cloud') !== false) {
                        $icon = 'fa-solid fa-screwdriver-wrench';
                    } elseif (stripos($category_name, 'design') !== false) {
                        $icon = 'fa-solid fa-palette';
                    }
                    
                    // Calculate average percentage
                    $total_pct = 0;
                    foreach ($skills_list as $skill) {
                        $total_pct += intval($skill['pct']);
                    }
                    $avg_pct = count($skills_list) > 0 ? round($total_pct / count($skills_list)) : 50;
                    ?>
                    <div class="bg-card-dark border border-border-dark p-8 rounded-3xl relative overflow-hidden flex flex-col h-full hover:border-accent/40 transition-colors duration-300">
                        <div class="flex items-center justify-between mb-6">
                            <h4 class="text-lg font-bold text-white"><?php echo esc_html($category_name); ?></h4>
                            <div class="w-10 h-10 bg-accent/10 border border-accent/25 rounded-xl flex items-center justify-center text-accent text-lg">
                                <i class="<?php echo esc_attr($icon); ?>"></i>
                            </div>
                        </div>
                        
                        <div class="flex flex-wrap gap-2 mb-8 flex-grow">
                            <?php foreach ($skills_list as $skill): ?>
                                <span class="bg-zinc-950 border border-border-dark px-3 py-1.5 rounded-lg text-xs text-zinc-300 hover:border-accent hover:text-accent transition duration-300 flex items-center cursor-default" title="Proficiency: <?php echo $skill['pct']; ?>% (<?php echo esc_html($skill['level'] ?? 'intermediate'); ?>)">
                                    <i class="<?php echo esc_attr($skill['icon']); ?> mr-1.5 text-accent/80"></i>
                                    <?php echo esc_html($skill['title']); ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
                        
                        <!-- Progress Bar -->
                        <div class="space-y-2 mt-auto">
                            <div class="flex justify-between items-center text-[9px] font-bold uppercase tracking-wider text-zinc-500">
                                <span>Expertise Level</span>
                                <span><?php echo $avg_pct; ?>%</span>
                            </div>
                            <div class="h-1.5 w-full bg-zinc-950 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-accent to-accent-hover rounded-full transition-all duration-1000" style="width: <?php echo esc_attr($avg_pct); ?>%"></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>


        </div>
    </section>

    <!-- Works Section -->
    <section id="works" class="py-24 border-t border-border-dark bg-bg-dark/40">
        <div class="max-w-7xl mx-auto px-8 md:px-24">
            
            <div class="mb-16">
                <div class="flex items-center gap-4 mb-2">
                    <div class="h-[1px] w-8 bg-accent"></div>
                    <span class="text-accent font-bold text-xs tracking-widest uppercase">Recent Works</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-black text-white leading-tight mb-6 font-display">
                    Featured Works.
                </h2>
                <p class="text-zinc-400 text-base max-w-xl font-light">
                    <?php echo esc_html($works_subtitle); ?>
                </p>
            </div>

            <!-- Works Grid -->
            <div class="grid md:grid-cols-2 gap-8">
                <?php
                $works_args = array(
                    'post_type'      => 'work',
                    'posts_per_page' => -1,
                    'orderby'        => 'menu_order',
                    'order'          => 'ASC',
                );

                $works_query = new WP_Query( $works_args );
                $works_data = [];

                if ( $works_query->have_posts() ) :
                    while ( $works_query->have_posts() ) : $works_query->the_post();
                        $featured_img = get_field('work_featured_image');
                        $tags = devportfolio_parse_lines(get_field('work_tags'));
                        $short_desc = get_field('work_short_description');
                        $image_url = $featured_img ? $featured_img['url'] : get_the_post_thumbnail_url(get_the_ID(), 'large');
                        $technologies = devportfolio_parse_lines(get_field('work_technologies'));
                        $highlights = get_field('work_highlights');
                        
                        // Collect additional gallery images
                        $gallery_urls = [];
                        $gallery = get_field('work_image_gallery');
                        if ($gallery) {
                            foreach ($gallery as $item) {
                                if (!empty($item['image'])) {
                                    $gallery_urls[] = $item['image']['url'];
                                }
                            }
                        }

                        // Store data for SPA modal
                        $works_data[get_the_ID()] = [
                            'title' => get_the_title(),
                            'desc' => $short_desc ?: devportfolio_excerpt(200),
                            'content' => apply_filters('the_content', get_the_content()),
                            'image' => $image_url,
                            'tags' => $tags,
                            'tech' => $technologies,
                            'client' => get_field('work_client') ?: 'Self Project',
                            'date' => get_field('work_date') ?: 'Recent',
                            'url' => get_field('work_url'),
                            'github' => get_field('work_github_url'),
                            'highlights' => $highlights ? array_column($highlights, 'highlight') : [],
                            'gallery' => $gallery_urls,
                        ];
                        ?>
                        
                        <div class="bg-card-dark border border-border-dark rounded-3xl overflow-hidden hover:border-accent/40 transition duration-300 flex flex-col group cursor-pointer" onclick="openWorkModal(<?php the_ID(); ?>)">
                            <!-- Image -->
                            <div class="relative overflow-hidden aspect-[16/10] bg-zinc-950">
                                <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-full object-cover group-hover:scale-[1.02] transition duration-700">
                                <div class="absolute inset-0 bg-gradient-to-t from-bg-dark via-bg-dark/10 to-transparent opacity-80"></div>
                                
                                <!-- Tags -->
                                <div class="absolute top-6 left-6 flex flex-wrap gap-2">
                                    <?php if($tags): foreach(array_slice($tags, 0, 3) as $tag): ?>
                                        <span class="bg-zinc-950/80 backdrop-blur-md border border-border-dark text-[10px] font-bold uppercase tracking-wider text-accent px-3 py-1 rounded-full"><?php echo esc_html($tag); ?></span>
                                    <?php endforeach; endif; ?>
                                </div>
                            </div>
                            
                            <!-- Content -->
                            <div class="p-8 flex flex-col flex-grow">
                                <h3 class="text-2xl font-bold text-white mb-3 group-hover:text-accent transition duration-300"><?php the_title(); ?></h3>
                                <p class="text-zinc-400 text-sm leading-relaxed mb-6 flex-grow"><?php echo esc_html($short_desc ?: devportfolio_excerpt(120)); ?></p>
                                
                                <div class="flex items-center text-xs font-bold text-accent uppercase tracking-widest gap-2 mt-auto">
                                    View Details <i class="fa-solid fa-arrow-right group-hover:translate-x-1 transition duration-300"></i>
                                </div>
                            </div>
                        </div>

                    <?php 
                    endwhile;
                    wp_reset_postdata();
                else : ?>
                    <p class="text-zinc-500 font-medium col-span-2 text-center">No featured projects found yet.</p>
                <?php endif; ?>
            </div>

        </div>
    </section>

    <!-- Certifications Section -->
    <section id="certifications" class="py-24 border-t border-border-dark">
        <div class="max-w-7xl mx-auto px-8 md:px-24">
            
            <div class="mb-16 text-center">
                <span class="text-accent font-bold text-xs tracking-widest uppercase mb-2 block">Credentials</span>
                <h2 class="text-4xl md:text-5xl font-black text-white leading-tight font-display">
                    Verified Expertise.
                </h2>
            </div>

            <!-- Certs List -->
            <div class="space-y-4 max-w-4xl mx-auto">
                <?php
                if ($certs_query->have_posts()) :
                    while ($certs_query->have_posts()) : $certs_query->the_post();
                        $status = get_field('cert_status') ?: 'ACTIVE';
                        $icon = get_field('cert_icon') ?: 'fa-solid fa-award';
                        $issuer = get_field('cert_issuer');
                        $date = get_field('cert_date');
                        $url = get_field('cert_url');
                        ?>
                        
                        <div class="bg-card-dark border border-border-dark p-6 rounded-2xl flex flex-col sm:flex-row sm:items-center justify-between gap-6 hover:border-accent/30 transition duration-300">
                            <div class="flex items-center gap-5">
                                <div class="w-12 h-12 bg-accent/10 border border-accent/20 rounded-xl flex items-center justify-center text-accent text-xl flex-shrink-0">
                                    <i class="<?php echo esc_attr($icon); ?>"></i>
                                </div>
                                <div>
                                    <div class="flex items-center flex-wrap gap-2.5">
                                        <h4 class="text-base font-bold text-white leading-snug"><?php the_title(); ?></h4>
                                        <span class="bg-zinc-950 border border-border-dark text-[8px] font-black uppercase tracking-wider text-zinc-500 px-2 py-0.5 rounded"><?php echo esc_html($status); ?></span>
                                    </div>
                                    <p class="text-xs text-zinc-500 mt-1">
                                        <?php if($issuer) echo esc_html($issuer); ?> 
                                        <?php if($issuer && $date) echo ' • '; ?>
                                        <?php if($date) echo esc_html($date); ?>
                                    </p>
                                </div>
                            </div>
                            <?php if($url): ?>
                                <a href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener" class="inline-flex items-center gap-2 border border-border-dark text-xs font-bold text-zinc-400 hover:text-accent hover:border-accent/40 px-4 py-2.5 rounded-xl transition duration-300 self-start sm:self-auto">
                                    Verify Credential <i class="fa-solid fa-arrow-up-right-from-square text-[9px]"></i>
                                </a>
                            <?php endif; ?>
                        </div>

                    <?php 
                    endwhile;
                    wp_reset_postdata();
                else : ?>
                    <p class="text-zinc-500 font-medium text-center">No certifications found yet.</p>
                <?php endif; ?>
            </div>

        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-24 border-t border-border-dark bg-bg-dark/40">
        <div class="max-w-7xl mx-auto px-8 md:px-24">
            
            <div class="mb-16">
                <div class="flex items-center gap-4 mb-2">
                    <div class="h-[1px] w-8 bg-accent"></div>
                    <span class="text-accent font-bold text-xs tracking-widest uppercase">Get In Touch</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-black text-white leading-tight font-display">
                    Start a Conversation.
                </h2>
                <p class="text-zinc-400 text-base max-w-xl font-light">
                    <?php echo esc_html($contact_desc); ?>
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-12 items-start">
                <!-- Info Column -->
                <div class="space-y-8">
                    <div>
                        <p class="text-[10px] text-zinc-500 font-extrabold uppercase tracking-widest mb-1">Direct Mail</p>
                        <a href="mailto:<?php echo esc_attr($contact_email); ?>" class="text-base font-bold text-white hover:text-accent transition duration-300"><?php echo esc_html($contact_email); ?></a>
                    </div>
                    <div>
                        <p class="text-[10px] text-zinc-500 font-extrabold uppercase tracking-widest mb-1">Phone</p>
                        <a href="tel:<?php echo esc_attr($contact_phone); ?>" class="text-base font-bold text-white hover:text-accent transition duration-300"><?php echo esc_html($contact_phone); ?></a>
                    </div>
                </div>

                <!-- Form Column -->
                <div class="md:col-span-2 bg-card-dark border border-border-dark p-8 md:p-10 rounded-3xl">
                    <div class="dark-contact-form">
                        <?php echo do_shortcode($contact_shortcode); ?>
                    </div>
                </div>
            </div>

        </div>
    </section>

</div>

<!-- SPA WORK DETAILS MODAL -->
<div id="work-details-modal" class="fixed inset-0 z-[100] hidden items-center justify-center p-4 bg-bg-dark/85 backdrop-blur-md transition-opacity duration-300">
    <!-- Click outside to close -->
    <div class="absolute inset-0 cursor-default" onclick="closeWorkModal()"></div>
    
    <!-- Modal Content Box -->
    <div class="bg-card-dark border border-border-dark max-w-4xl w-full max-h-[90vh] overflow-y-auto rounded-3xl p-8 md:p-12 relative text-zinc-300 shadow-2xl z-10 flex flex-col">
        <!-- Close Button -->
        <button class="absolute top-6 right-6 text-zinc-500 hover:text-white transition duration-300 bg-zinc-900 border border-border-dark w-10 h-10 rounded-full flex items-center justify-center text-sm" onclick="closeWorkModal()">
            <i class="fa-solid fa-xmark"></i>
        </button>
        
        <!-- Header -->
        <div class="mb-8">
            <div id="modal-tags" class="flex flex-wrap gap-2 mb-4">
                <!-- tags populated dynamically -->
            </div>
            <h3 id="modal-title" class="text-3xl md:text-4xl font-extrabold text-white tracking-tight">Project Title</h3>
            
            <div class="flex items-center gap-6 mt-4 text-xs text-zinc-500 border-y border-border-dark/50 py-3">
                <div>
                    <span class="font-extrabold uppercase tracking-widest mr-1.5 text-zinc-600">Client:</span>
                    <span id="modal-client" class="text-zinc-400 font-medium">Client Name</span>
                </div>
                <div>
                    <span class="font-extrabold uppercase tracking-widest mr-1.5 text-zinc-600">Date:</span>
                    <span id="modal-date" class="text-zinc-400 font-medium">Date</span>
                </div>
            </div>
        </div>
        
        <!-- Primary Mockup Image -->
        <div class="aspect-[16/10] bg-zinc-950 rounded-2xl overflow-hidden border border-border-dark mb-8">
            <img id="modal-image" src="" alt="Project Image" class="w-full h-full object-cover">
        </div>
        
        <!-- Grid: Bio / Features -->
        <div class="grid md:grid-cols-3 gap-10">
            <!-- Left: details -->
            <div class="md:col-span-2 space-y-8">
                <div>
                    <h4 class="text-sm font-extrabold uppercase tracking-wider text-white mb-3">Project Description</h4>
                    <div id="modal-content" class="text-zinc-400 text-sm md:text-base leading-relaxed space-y-4">
                        <!-- content populated dynamically -->
                    </div>
                </div>
                
                <div id="modal-highlights-wrapper" class="space-y-3">
                    <h4 class="text-sm font-extrabold uppercase tracking-wider text-white mb-3">Project Highlights</h4>
                    <ul id="modal-highlights" class="space-y-3">
                        <!-- highlights populated dynamically -->
                    </ul>
                </div>
            </div>
            
            <!-- Right: tech / actions -->
            <div class="space-y-8">
                <div>
                    <h4 class="text-sm font-extrabold uppercase tracking-wider text-white mb-4">Technologies Used</h4>
                    <div id="modal-tech" class="flex flex-wrap gap-2">
                        <!-- technologies populated dynamically -->
                    </div>
                </div>
                
                <div class="flex flex-col gap-3 pt-6 border-t border-border-dark">
                    <a id="modal-live-link" href="#" target="_blank" class="w-full bg-accent hover:bg-accent-hover text-zinc-950 text-center font-bold py-3.5 rounded-xl text-xs uppercase tracking-wider transition duration-300 flex items-center justify-center gap-2">
                        Visit Live Project <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
                    </a>
                    <a id="modal-github-link" href="#" target="_blank" class="w-full bg-zinc-900 hover:bg-zinc-800 border border-border-dark text-white text-center font-bold py-3.5 rounded-xl text-xs uppercase tracking-wider transition duration-300 flex items-center justify-center gap-2">
                        GitHub Repository <i class="fa-brands fa-github"></i>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Gallery Wrapper -->
        <div id="modal-gallery-wrapper" class="mt-12 pt-8 border-t border-border-dark hidden">
            <h4 class="text-sm font-extrabold uppercase tracking-wider text-white mb-6">Gallery / Showcases</h4>
            <div id="modal-gallery" class="grid grid-cols-2 md:grid-cols-3 gap-4">
                <!-- gallery populated dynamically -->
            </div>
        </div>
    </div>
</div>

<script>
    const worksData = <?php echo json_encode($works_data); ?>;
</script>

<?php get_footer(); ?>
