<?php
/**
 * Template Name: Works Page
 */
get_header(); ?>

<style>
    .work-card-premium {
        background: #FFFFFF;
        border-radius: 32px;
        overflow: hidden;
        border: 1px solid #F3F4F6;
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        flex-direction: column;
        height: 100%;
    }
    .work-card-premium:hover {
        transform: translateY(-8px);
        box-shadow: 0 30px 60px -15px rgba(109, 40, 217, 0.12);
        border-color: #DDD6FE;
    }
    .work-image-container {
        position: relative;
        height: 280px;
        overflow: hidden;
    }
    .work-image-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.8s ease;
    }
    .work-card-premium:hover .work-image-container img {
        transform: scale(1.05);
    }
    .work-tag-badge {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(8px);
        padding: 4px 12px;
        border-radius: 99px;
        font-size: 10px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: #6D28D9;
        border: 1px solid rgba(109, 40, 217, 0.1);
    }
    .fade-up {
        animation: fadeUp 0.8s ease-out forwards;
        opacity: 0;
    }
    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(24px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<!-- Works Hero Section -->
<section class="pt-24 pb-16 px-8 md:px-24 fade-up">
    <div class="container mx-auto max-w-7xl">
        <div class="mb-12">
            <span class="text-[#7C3AED] font-black text-[10px] uppercase tracking-[0.3em] mb-4 block">Portfolio Gallery</span>
            <h1 class="text-6xl md:text-8xl font-extrabold text-[#111827] mb-6 tracking-tighter">
                Featured <span class="text-[#7C3AED]">Works</span>
            </h1>
            <p class="text-gray-500 text-lg md:text-xl max-w-2xl leading-relaxed font-medium">
                A selection of digital projects focused on scalable full-stack development, modern web and mobile applications, and efficient AI-assisted workflows.
            </p>
        </div>
    </div>
</section>

<!-- Works Grid Section -->
<section class="pb-32 px-8 md:px-24">
    <div class="container mx-auto max-w-7xl">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            <?php
            $works_args = array(
                'post_type'      => 'work',
                'posts_per_page' => -1,
                'orderby'        => 'menu_order',
                'order'          => 'ASC',
            );

            $works_query = new WP_Query( $works_args );

            if ( $works_query->have_posts() ) :
                $i = 0;
                while ( $works_query->have_posts() ) :
                    $works_query->the_post();
                    $i++;
                    
                    // ACF Fields from JSON
                    $featured_img = get_field('work_featured_image');
                    $tags = devportfolio_parse_lines(get_field('work_tags'));
                    $short_desc = get_field('work_short_description');
                    $highlights = get_field('work_highlights');
                    
                    // Fallback to post thumbnail if ACF image is missing
                    $image_url = $featured_img ? $featured_img['url'] : get_the_post_thumbnail_url(get_the_ID(), 'large');
                    ?>
                    
                    <article class="work-card-premium fade-up" style="animation-delay: <?php echo $i * 0.1; ?>s;">
                        <div class="work-image-container">
                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title_attribute(); ?>">
                            <div class="absolute top-6 left-6 flex flex-wrap gap-2">
                                <?php if($tags): foreach(array_slice($tags, 0, 3) as $tag): ?>
                                    <span class="work-tag-badge"><?php echo esc_html($tag); ?></span>
                                <?php endforeach; endif; ?>
                            </div>
                        </div>

                        <div class="p-10 flex flex-col flex-grow">
                            <h2 class="text-2xl font-black text-slate-900 mb-4 tracking-tight group">
                                <a href="<?php the_permalink(); ?>" class="hover:text-[#7C3AED] transition-colors">
                                    <?php the_title(); ?>
                                </a>
                            </h2>
                            
                            <p class="text-gray-500 text-sm leading-relaxed mb-8 flex-grow">
                                <?php echo $short_desc ? esc_html($short_desc) : devportfolio_excerpt(100); ?>
                            </p>

                            <?php if($highlights): ?>
                            <ul class="space-y-3 mb-8">
                                <?php foreach(array_slice($highlights, 0, 2) as $row): ?>
                                    <li class="flex items-start gap-3">
                                        <span class="mt-1 text-[#7C3AED]">
                                            <i class="fa-regular fa-circle-check text-sm"></i>
                                        </span>
                                        <span class="text-[11px] text-gray-500 font-bold leading-tight uppercase tracking-tight">
                                            <?php echo esc_html($row['highlight']); ?>
                                        </span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <?php endif; ?>

                            <div class="pt-6 border-t border-gray-50 flex items-center justify-between">
                                <a href="<?php the_permalink(); ?>" class="text-xs font-black text-[#7C3AED] uppercase tracking-widest hover:translate-x-2 transition-transform inline-flex items-center gap-2">
                                    View Details <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </article>

                <?php 
                endwhile;
                wp_reset_postdata();
            else : ?>
                <p class="text-gray-400 font-medium">No projects found yet.</p>
            <?php endif; ?>
        </div>
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
                    Ready to build something<br><span class="text-[#7C3AED]">intentional?</span>
                </h2>
                <p class="text-gray-400 text-lg mb-12 max-w-2xl mx-auto font-medium">
                    Let's collaborate on your next project. Whether you need a full-stack solution, AI integration, or innovative design, I'm here to bring your vision to life.
                </p>
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="inline-block bg-[#7C3AED] text-white px-12 py-5 rounded-2xl font-black text-sm uppercase tracking-widest hover:bg-white hover:text-slate-900 transition-all duration-300 shadow-xl shadow-purple-900/20">
                    Let's Connect
                </a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
