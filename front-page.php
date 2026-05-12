<?php
/**
 * Front Page Template
 */
get_header();

// Hero fields
$hero_greeting     = get_field('hero_greeting')       ?: 'Build. Scale. Innovate.';
$hero_name         = get_field('hero_name')           ?: 'John Mark Isaias';
$hero_tagline      = get_field('hero_tagline')        ?: 'Aspiring Full-Stack Developer';
$hero_status       = get_field('hero_status_message') ?: 'Available for Craft';
$hero_description  = get_field('hero_description')    ?: 'Helping businesses build modern web and mobile applications at the intersection of full-stack development and AI-assisted innovation.';
$hero_image_data   = get_field('hero_image');
$hero_image_url    = $hero_image_data ? $hero_image_data['url'] : get_template_directory_uri() . '/images/hero-img.jpg';
$hero_image_alt    = $hero_image_data ? $hero_image_data['alt'] : 'Avatar';
$hero_cta_text     = get_field('hero_cta_text')       ?: 'VIEW MY WORK';
$hero_cta_link     = get_field('hero_cta_link')       ?: '#works';
$hero_resume_label = get_field('hero_resume_label')   ?: 'RESUME';
$hero_resume_link  = get_field('hero_resume_link')    ?: 'resume.pdf';

// Social fields
$social_github    = get_field('social_github');
$social_email     = get_field('social_email');
$social_share_url = get_field('social_share_url');

// Section content
$works_subtitle  = get_field('works_section_subtitle')  ?: 'A selection of digital projects focused on scalable full-stack development, modern web and mobile applications, and efficient AI-assisted workflows.';
$skills_subtitle = get_field('skills_section_subtitle') ?: 'A comprehensive overview of my technical expertise across full-stack development, modern frameworks, and web and mobile technologies.';

// Skill filter tabs (comma-separated text → array)
$categories_raw = get_field('skill_categories') ?: 'All Skills, Languages, Frameworks & Libraries, Database Management, Tools & Cloud';
$categories     = array_map('trim', explode(',', $categories_raw));

// Core technologies carousel — fetch once, duplicate for seamless scroll
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
        ['name' => 'logoipsum', 'icon' => 'fa-solid fa-bolt'],
        ['name' => 'logoipsum', 'icon' => 'fa-solid fa-cube'],
        ['name' => 'logoipsum', 'icon' => 'fa-solid fa-circle-nodes'],
        ['name' => 'logoipsum', 'icon' => 'fa-solid fa-wind'],
        ['name' => 'logoipsum', 'icon' => 'fa-solid fa-shield-halved'],
    ];
}
$carousel_loop = array_merge($carousel_items, $carousel_items);
?>

<style>
    .blob-shape {
        border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
    }

    .status-badge-float {
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }

    .animate-scroll {
        animation: scroll 20s linear infinite;
    }

    @keyframes scroll {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }
</style>

<!-- Hero Section -->
<section class="relative min-h-screen flex items-center overflow-hidden -mt-6">
    <div class="container mx-auto px-8 md:px-24 grid md:grid-cols-2 gap-16 items-center">

        <div class="z-10">
            <span class="text-[#7C3AED] font-bold text-xs tracking-[0.3em] uppercase mb-4 block">
                <?php echo esc_html($hero_greeting); ?>
            </span>
            <h1 class="text-6xl md:text-7xl font-extrabold text-[#111827] tracking-tight mb-4">
                <?php echo esc_html($hero_name); ?>
            </h1>
            <h2 class="text-2xl md:text-3xl font-bold text-[#7C3AED] mb-6">
                <?php echo esc_html($hero_tagline); ?>
            </h2>
            <p class="text-gray-500 text-lg md:text-xl leading-relaxed max-w-lg mb-10">
                <?php echo esc_html($hero_description); ?>
            </p>

            <div class="flex flex-wrap gap-4 mb-16">
                <a href="<?php echo esc_url($hero_cta_link); ?>" class="bg-[#7C3AED] text-white px-8 py-4 rounded-xl font-bold shadow-lg shadow-purple-200 hover:bg-[#6D28D9] transition transform hover:-translate-y-1">
                    <?php echo esc_html($hero_cta_text); ?>
                </a>
                <a href="<?php echo esc_url($hero_resume_link); ?>" class="bg-white border border-gray-100 text-gray-900 px-8 py-4 rounded-xl font-bold shadow-sm hover:bg-gray-50 transition transform hover:-translate-y-1">
                    <?php echo esc_html($hero_resume_label); ?>
                </a>
            </div>

            <div class="flex gap-6 text-gray-400">
                <a href="<?php echo $social_github ? esc_url($social_github) : '#'; ?>" class="hover:text-[#7C3AED] transition-colors">
                    <i class="fa-solid fa-code text-xl"></i>
                </a>
                <a href="<?php echo $social_email ? esc_url('mailto:' . $social_email) : '#'; ?>" class="hover:text-[#7C3AED] transition-colors">
                    <i class="fa-solid fa-at text-xl"></i>
                </a>
                <a href="<?php echo $social_share_url ? esc_url($social_share_url) : '#'; ?>" class="hover:text-[#7C3AED] transition-colors">
                    <i class="fa-solid fa-share-nodes text-xl"></i>
                </a>
            </div>
        </div>

        <div class="relative flex justify-center items-center">
            <div class="relative w-72 h-72 md:w-[480px] md:h-[480px] bg-purple-100 blob-shape p-3">
                <div class="w-full h-full bg-[#111827] blob-shape overflow-hidden flex items-end justify-center relative">
                    <div class="absolute w-48 h-48 md:w-72 md:h-72 bg-[#E11D48] rounded-full top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"></div>
                    <img src="<?php echo esc_url($hero_image_url); ?>" alt="<?php echo esc_attr($hero_image_alt); ?>" class="relative z-10 w-[90%] h-auto">
                </div>

                <div class="absolute -bottom-2 -left-4 bg-white p-4 rounded-2xl shadow-2xl flex items-center gap-4 status-badge-float border border-gray-50">
                    <div class="w-12 h-12 bg-purple-50 rounded-xl flex items-center justify-center">
                        <div class="w-6 h-6 border-2 border-purple-400 rounded flex items-center justify-center">
                            <div class="w-2 h-2 bg-purple-500 rounded-full"></div>
                        </div>
                    </div>
                    <div>
                        <p class="text-[10px] text-gray-400 font-extrabold uppercase leading-none mb-1">Status</p>
                        <p class="text-sm font-extrabold text-slate-800"><?php echo esc_html($hero_status); ?></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Featured Works Section -->
<section id="works" class="py-24 bg-[#F8F8F8]">
<div class="container mx-auto px-8 md:px-24">

    <div class="mb-16">
        <div class="flex items-center gap-4 mb-4">
            <div class="h-[2px] w-12 bg-[#7C3AED]"></div>
            <span class="text-[#7C3AED] font-bold text-xs tracking-widest uppercase">Recent Works</span>
        </div>
        <h2 class="text-5xl md:text-6xl font-extrabold text-[#111827] mb-6">
            Featured <span class="text-[#7C3AED]">Works</span>
        </h2>
        <p class="text-gray-500 text-lg max-w-2xl leading-relaxed">
            <?php echo esc_html($works_subtitle); ?>
        </p>
    </div>

    <div class="grid md:grid-cols-3 gap-8">
        <?php if (have_rows('projects')): ?>
            <?php while (have_rows('projects')): the_row(); ?>
                <?php
                $title       = get_sub_field('title');
                $image       = get_sub_field('image');
                $description = get_sub_field('description');
                $detail_url  = get_sub_field('detail_url') ?: '#';
                $preview_url = get_sub_field('preview_url') ?: '#';
                ?>
                <div class="bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-shadow duration-300 border border-gray-100 flex flex-col h-full">

                    <div class="h-64 overflow-hidden relative group">
                        <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/0 transition duration-300"></div>
                    </div>

                    <div class="p-8 flex flex-col flex-grow">
                        <div class="flex flex-wrap gap-2 mb-6">
                            <?php if (have_rows('tags')): ?>
                                <?php while (have_rows('tags')): the_row(); ?>
                                    <span class="bg-gray-100 text-gray-400 text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider italic">
                                        <?php echo esc_html(get_sub_field('tag')); ?>
                                    </span>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>

                        <h3 class="text-2xl font-extrabold text-[#111827] mb-4">
                            <?php echo esc_html($title); ?>
                        </h3>

                        <p class="text-gray-500 text-sm leading-relaxed mb-6">
                            <?php echo esc_html($description); ?>
                        </p>

                        <ul class="space-y-3 mb-8 flex-grow">
                            <?php if (have_rows('highlights')): ?>
                                <?php while (have_rows('highlights')): the_row(); ?>
                                    <li class="flex items-start gap-3">
                                        <span class="mt-1 text-[#7C3AED]">
                                            <i class="fa-regular fa-circle-check text-sm"></i>
                                        </span>
                                        <span class="text-xs text-gray-500 font-medium leading-tight">
                                            <?php echo esc_html(get_sub_field('highlight')); ?>
                                        </span>
                                    </li>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </ul>

                        <div class="flex items-center gap-3">
                            <a href="<?php echo esc_url($detail_url); ?>" class="flex-grow bg-[#7C3AED] text-white text-center py-3 rounded-xl text-sm font-bold hover:bg-[#6D28D9] transition shadow-md shadow-purple-100">
                                View Details
                            </a>
                            <a href="<?php echo esc_url($preview_url); ?>" class="bg-purple-50 text-[#7C3AED] p-3 rounded-xl hover:bg-purple-100 transition">
                                <i class="fa-regular fa-image"></i>
                            </a>
                        </div>
                    </div>

                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>

</div>
</section>

<!-- Technical Skills Section -->
<section class="py-24 bg-white">
<div class="container mx-auto px-8 md:px-24 text-center">

    <h2 class="text-5xl font-extrabold text-[#111827] mb-6">Technical Skills</h2>
    <p class="text-gray-500 text-lg max-w-2xl mx-auto mb-12">
        <?php echo esc_html($skills_subtitle); ?>
    </p>

    <div class="inline-flex flex-wrap justify-center bg-gray-50 p-2 rounded-full mb-16 border border-gray-100">
        <?php foreach ($categories as $index => $cat): ?>
            <button
                onclick="filterSkills('<?php echo esc_js($cat); ?>', this)"
                class="skill-tab px-6 py-2 rounded-full text-xs font-bold transition-all <?php echo $index === 0 ? 'bg-[#7C3AED] text-white shadow-lg' : 'text-gray-400 hover:text-gray-600'; ?>">
                <?php echo esc_html($cat); ?>
            </button>
        <?php endforeach; ?>
    </div>

    <div class="bg-gray-50 rounded-[40px] p-8 md:p-16 border border-gray-100">
        <div id="skills-grid" class="grid grid-cols-2 md:grid-cols-6 gap-6">
            <?php if (have_rows('skills')): ?>
                <?php while (have_rows('skills')): the_row(); ?>
                    <div class="skill-card bg-white p-8 rounded-3xl shadow-sm border border-gray-50 flex flex-col items-center justify-center gap-4 transition-all hover:shadow-md group"
                         data-category="<?php echo esc_attr(get_sub_field('cat')); ?>">
                        <div class="text-3xl text-[#7C3AED] group-hover:scale-110 transition-transform">
                            <i class="<?php echo esc_attr(get_sub_field('icon')); ?>"></i>
                        </div>
                        <span class="text-sm font-bold text-gray-700"><?php echo esc_html(get_sub_field('name')); ?></span>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>

    <div class="mt-24 pt-16 border-t border-gray-100">
        <h3 class="text-2xl font-bold text-[#111827] mb-12 uppercase tracking-widest text-sm">Core Technologies</h3>
        <div class="relative overflow-hidden">
            <div class="flex animate-scroll items-center gap-12 grayscale opacity-50 hover:grayscale-0 hover:opacity-100 transition-all">
                <?php foreach ($carousel_loop as $tech): ?>
                    <div class="flex items-center gap-2 font-black text-xl whitespace-nowrap">
                        <i class="<?php echo esc_attr($tech['icon']); ?>"></i>
                        <?php echo esc_html($tech['name']); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</div>
</section>

<script>
function filterSkills(category, el) {
    document.querySelectorAll('.skill-tab').forEach(tab => {
        tab.classList.remove('bg-[#7C3AED]', 'text-white', 'shadow-lg');
        tab.classList.add('text-gray-400');
    });
    el.classList.add('bg-[#7C3AED]', 'text-white', 'shadow-lg');
    el.classList.remove('text-gray-400');

    document.querySelectorAll('.skill-card').forEach(card => {
        if (category === 'All Skills' || card.getAttribute('data-category') === category) {
            card.style.display = 'flex';
            card.style.opacity = '0';
            setTimeout(() => { card.style.opacity = '1'; }, 10);
        } else {
            card.style.display = 'none';
        }
    });
}
</script>

<?php get_footer(); ?>
