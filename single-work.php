<?php
/**
 * Single: Work
 */
get_header();

// ACF Fields
$featured_img = get_field('work_featured_image');
$tags = devportfolio_parse_lines(get_field('work_tags'));
$short_desc = get_field('work_short_description');
$highlights = get_field('work_highlights');
$gallery = get_field('work_image_gallery'); // Using the updated repeater name from JSON
$client = get_field('work_client');
$date = get_field('work_date');
$url = get_field('work_url');
$github = get_field('work_github_url');
$technologies = devportfolio_parse_lines(get_field('work_technologies'));

// Fallback image
$hero_image = $featured_img ? $featured_img['url'] : get_the_post_thumbnail_url(get_the_ID(), 'full');
?>

<style>
    .project-detail-card {
        background: #FFFFFF;
        border-radius: 32px;
        border: 1px solid #F3F4F6;
        padding: 48px;
        position: sticky;
        top: 140px;
    }
    .tech-pill {
        background: #F9FAFB;
        border: 1px solid #F3F4F6;
        padding: 8px 16px;
        border-radius: 12px;
        font-size: 11px;
        font-weight: 700;
        color: #4B5563;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }
    .gallery-img-container {
        border-radius: 24px;
        overflow: hidden;
        border: 1px solid #F3F4F6;
        transition: transform 0.3s ease;
    }
    .gallery-img-container:hover {
        transform: translateY(-4px);
    }
    .fade-up {
        animation: fadeUp 0.8s ease-out forwards;
    }
    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<!-- Project Hero -->
<section class="pt-8 pb-8 px-8 md:px-24">
    <div class="container mx-auto max-w-7xl">
        <div class="grid lg:grid-cols-2 gap-20 items-center">
            <div class="fade-up">
                <a href="<?php echo home_url('/works'); ?>" class="inline-flex items-center gap-2 text-xs font-black text-[#7C3AED] uppercase tracking-widest mb-10 hover:-translate-x-2 transition-transform">
                    <i class="fa-solid fa-arrow-left"></i> Back to Gallery
                </a>
                <h1 class="text-5xl md:text-7xl font-black text-slate-900 tracking-tighter mb-10 leading-[0.95]">
                    <?php the_title(); ?>
                </h1>
                <div class="flex flex-wrap gap-3 mb-12">
                    <?php if($tags): foreach($tags as $tag): ?>
                        <span class="bg-purple-50 text-[#7C3AED] text-[10px] font-black px-4 py-2 rounded-full uppercase tracking-widest"><?php echo esc_html($tag); ?></span>
                    <?php endforeach; endif; ?>
                </div>
                <p class="text-gray-500 text-lg md:text-xl leading-relaxed font-medium max-w-xl">
                    <?php echo $short_desc ? esc_html($short_desc) : get_the_excerpt(); ?>
                </p>
            </div>

            <div class="fade-up" style="animation-delay: 0.2s;">
                <div class="overflow-hidden border border-gray-100 shadow-2xl shadow-purple-900/10">
                    <img src="<?php echo esc_url($hero_image); ?>" alt="<?php the_title(); ?>" class="w-full h-auto">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Content & Details -->
<section class="py-24 bg-[#F9FAFB] px-8 md:px-24">
    <div class="container mx-auto max-w-7xl">
        <div class="grid lg:grid-cols-3 gap-16">
            
            <!-- Left: Main Content -->
            <div class="lg:col-span-2 space-y-16">
                
                <div class="prose prose-lg prose-slate max-w-none">
                    <?php the_content(); ?>
                </div>

                <?php if($highlights): ?>
                <div class="space-y-8">
                    <h3 class="text-2xl font-black text-slate-900 tracking-tight">Project Highlights</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <?php foreach($highlights as $row): ?>
                        <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm flex gap-4">
                            <div class="w-10 h-10 bg-purple-50 rounded-xl flex items-center justify-center flex-shrink-0">
                                <i class="fa-solid fa-check text-[#7C3AED]"></i>
                            </div>
                            <p class="text-gray-600 text-sm font-medium leading-relaxed">
                                <?php echo esc_html($row['highlight']); ?>
                            </p>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>

                <?php if($gallery): ?>
                <div class="space-y-8 pt-12">
                    <h3 class="text-2xl font-black text-slate-900 tracking-tight">Project Gallery</h3>
                    <div class="grid md:grid-cols-2 gap-8">
                        <?php foreach($gallery as $item): ?>
                        <div class="gallery-img-container">
                            <img src="<?php echo esc_url($item['image']['url']); ?>" alt="Gallery Image" class="w-full h-auto">
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>

            </div>

            <!-- Right: Project Sidebar Card -->
            <div>
                <div class="project-detail-card shadow-xl shadow-purple-900/5">
                    <h4 class="text-xs font-black text-gray-400 uppercase tracking-[0.2em] mb-8">Project Details</h4>
                    
                    <div class="space-y-8 mb-12">
                        <?php if($client): ?>
                        <div>
                            <p class="text-[10px] font-black text-[#7C3AED] uppercase tracking-widest mb-1">Client</p>
                            <p class="text-slate-800 font-bold"><?php echo esc_html($client); ?></p>
                        </div>
                        <?php endif; ?>

                        <?php if($date): ?>
                        <div>
                            <p class="text-[10px] font-black text-[#7C3AED] uppercase tracking-widest mb-1">Date</p>
                            <p class="text-slate-800 font-bold"><?php echo esc_html($date); ?></p>
                        </div>
                        <?php endif; ?>

                        <?php if($technologies): ?>
                        <div>
                            <p class="text-[10px] font-black text-[#7C3AED] uppercase tracking-widest mb-4">Technologies</p>
                            <div class="flex flex-wrap gap-2">
                                <?php foreach($technologies as $tech): ?>
                                    <span class="tech-pill"><?php echo esc_html($tech); ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>

                    <div class="space-y-4">
                        <?php if($url): ?>
                        <a href="<?php echo esc_url($url); ?>" target="_blank" class="w-full bg-[#7C3AED] text-white py-4 rounded-2xl font-black text-xs uppercase tracking-widest text-center block hover:bg-slate-900 transition-colors shadow-lg shadow-purple-200">
                            View Live Project <i class="fa-solid fa-external-link ml-2"></i>
                        </a>
                        <?php endif; ?>

                        <?php if($github): ?>
                        <a href="<?php echo esc_url($github); ?>" target="_blank" class="w-full bg-white border-2 border-gray-100 text-slate-800 py-4 rounded-2xl font-black text-xs uppercase tracking-widest text-center block hover:border-[#7C3AED] hover:text-[#7C3AED] transition-all">
                            Source Code <i class="fa-brands fa-github ml-2"></i>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Next Project Navigation -->
<section class="py-32 bg-white px-8 md:px-24 border-t border-gray-100">
    <div class="container mx-auto max-w-7xl">
        <?php
        $next_post = get_next_post();
        if($next_post):
        ?>
        <div class="text-center max-w-2xl mx-auto">
            <span class="text-[#7C3AED] font-black text-[10px] uppercase tracking-[0.3em] mb-6 block">Next Project</span>
            <h2 class="text-4xl md:text-5xl font-black text-slate-900 mb-10 tracking-tighter"><?php echo esc_html($next_post->post_title); ?></h2>
            <a href="<?php echo get_permalink($next_post); ?>" class="inline-flex items-center gap-3 text-sm font-black text-slate-900 uppercase tracking-widest hover:text-[#7C3AED] transition-colors group">
                View Project <i class="fa-solid fa-arrow-right group-hover:translate-x-2 transition-transform"></i>
            </a>
        </div>
        <?php else: ?>
        <div class="text-center max-w-2xl mx-auto">
            <span class="text-[#7C3AED] font-black text-[10px] uppercase tracking-[0.3em] mb-6 block">Explore More</span>
            <h2 class="text-4xl md:text-5xl font-black text-slate-900 mb-10 tracking-tighter">See more of my work</h2>
            <a href="<?php echo home_url('/works'); ?>" class="inline-flex items-center gap-3 text-sm font-black text-slate-900 uppercase tracking-widest hover:text-[#7C3AED] transition-colors group">
                Back to Gallery <i class="fa-solid fa-arrow-right group-hover:translate-x-2 transition-transform"></i>
            </a>
        </div>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>
