<?php
/**
 * Template Name: Skills Page
 */
get_header(); ?>

<style>
    .fade-up {
        animation: fadeUp 0.8s ease-out forwards;
        opacity: 0;
    }
    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(24px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<!-- Skills Hero Section -->
<section class="pt-24 pb-16 px-8 md:px-24 fade-up">
    <div class="container mx-auto max-w-7xl">
        <div class="mb-12">
            <span class="text-[#7C3AED] font-black text-[10px] uppercase tracking-[0.3em] mb-4 block">Technical Stack</span>
            <h1 class="text-6xl md:text-8xl font-extrabold text-[#111827] mb-6 tracking-tighter">
                My <span class="text-[#7C3AED]">Skills</span>
            </h1>
            <p class="text-gray-500 text-lg md:text-xl max-w-2xl leading-relaxed font-medium">
                A comprehensive overview of my technical expertise, ranging from core programming languages to modern frameworks and cloud infrastructure.
            </p>
        </div>
    </div>
</section>

<!-- Skills Sections -->
<section class="pb-32 px-8 md:px-24">
    <div class="container mx-auto max-w-7xl">
        <?php
        $categories = array(
            "Languages",
            "Frameworks & Libraries",
            "Database Management",
            "Tools & Cloud"
        );

        $delay = 0.2;
        foreach($categories as $cat):
            $skills_query = new WP_Query(array(
                'post_type'      => 'skill',
                'posts_per_page' => -1,
                'meta_key'       => 'skill_order',
                'orderby'        => 'meta_value_num',
                'order'          => 'ASC',
                'meta_query'     => array(
                    array(
                        'key'     => 'skill_category',
                        'value'   => $cat,
                        'compare' => '='
                    )
                )
            ));

            if($skills_query->have_posts()):
        ?>
            <div class="mb-24 fade-up" style="animation-delay: <?php echo $delay; ?>s;">
                <div class="flex items-center gap-4 mb-10">
                    <h2 class="text-2xl font-black text-slate-900 tracking-tight"><?php echo esc_html($cat); ?></h2>
                    <div class="h-px flex-grow bg-gray-100"></div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <?php 
                    while($skills_query->have_posts()): $skills_query->the_post();
                        get_template_part('template-parts/card', 'skill');
                    endwhile; 
                    wp_reset_postdata(); 
                    ?>
                </div>
            </div>
        <?php 
            $delay += 0.2;
            endif;
        endforeach; 
        ?>
    </div>
</section>

<!-- Call to Action -->
<section class="pb-32 px-8 md:px-24">
    <div class="container mx-auto max-w-7xl">
        <div class="bg-slate-900 rounded-[48px] p-16 md:p-24 text-center relative overflow-hidden">
            <!-- Background Decoration -->
            <div class="absolute top-0 right-0 w-64 h-64 bg-purple-600 rounded-full blur-[120px] opacity-20 -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 bg-blue-600 rounded-full blur-[120px] opacity-10 -ml-32 -mb-32"></div>

            <div class="relative z-10">
                <h2 class="text-4xl md:text-6xl font-black text-white mb-8 tracking-tighter">
                    Need a specific <span class="text-[#7C3AED]">Expertise?</span>
                </h2>
                <p class="text-gray-400 text-lg mb-12 max-w-2xl mx-auto font-medium">
                    I'm always learning and expanding my stack. If you don't see a specific technology here, feel free to ask.
                </p>
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="inline-block bg-[#7C3AED] text-white px-12 py-5 rounded-2xl font-black text-sm uppercase tracking-widest hover:bg-white hover:text-slate-900 transition-all duration-300 shadow-xl shadow-purple-900/20">
                    Get in Touch
                </a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
