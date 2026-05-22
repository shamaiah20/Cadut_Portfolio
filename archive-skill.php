<?php
/**
 * Archive: Skills
 * Updated to use ACF category grouping and premium design.
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
<section class="py-16 px-8 md:px-24 bg-white fade-up">
    <div class="container mx-auto max-w-7xl">
        <div class="mb-12">
            <span class="text-[#7C3AED] font-black text-[10px] uppercase tracking-[0.3em] mb-4 block">Technical Stack</span>
            <h1 class="text-6xl md:text-8xl font-extrabold text-[#111827] mb-6 tracking-tighter">
                Technical <span class="text-[#7C3AED]">Skills</span>
            </h1>
            <p class="text-gray-500 text-lg md:text-xl max-w-2xl leading-relaxed font-medium">
                A comprehensive overview of my technical expertise, ranging from core programming languages to modern frameworks and cloud infrastructure.
            </p>
        </div>
    </div>
</section>

<!-- Skills Sections -->
<section class="py-16 px-8 md:px-24 bg-[#f2f2f0]">
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

<?php get_footer(); ?>
