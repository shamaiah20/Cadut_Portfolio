<?php
/**
 * Template: Front Page (Homepage)
 *
 * Displays hero section + featured works, skills, and certificates.
 * Set this page as your "Static Front Page" in Settings > Reading.
 *
 * @package DevPortfolio
 */

get_header();

// ─── Hero Section ────────────────────────────────────────────────────
$greeting        = get_field( 'hero_greeting' ) ?: 'Build. Scale. Innovate.';
$name            = get_field( 'hero_name' ) ?: get_bloginfo( 'name' );
$tagline         = get_field( 'hero_tagline' ) ?: 'Aspiring Full-Stack Developer';
$desc            = get_field( 'hero_description' );
$image           = get_field( 'hero_image' );
$cta_text        = get_field( 'hero_cta_text' ) ?: 'VIEW MY WORK';
$cta_link        = get_field( 'hero_cta_link' ) ?: '#works';
$resume_link     = get_field( 'hero_resume_link' );
$status_message  = get_field( 'hero_status_message' ) ?: 'Available for Craft';
$github          = get_field( 'social_github' );
$linkedin        = get_field( 'social_linkedin' );
$email           = get_field( 'social_email' );
?>

<section class="relative min-h-screen flex items-center pt-20 overflow-hidden">
    <div class="container mx-auto px-8 md:px-24 grid md:grid-cols-2 gap-16 items-center">
        
        <div class="z-10">
            <span class="text-[#7C3AED] font-bold text-xs tracking-[0.3em] uppercase mb-4 block">
                <?php echo esc_html( $greeting ); ?>
            </span>
            <h1 class="text-6xl md:text-7xl font-extrabold text-[#111827] tracking-tight mb-4">
                <?php echo esc_html( $name ); ?>
            </h1>
            <h2 class="text-2xl md:text-3xl font-bold text-[#7C3AED] mb-6">
                <?php echo esc_html( $tagline ); ?>
            </h2>
            <?php if ( $desc ) : ?>
                <p class="text-gray-500 text-lg md:text-xl leading-relaxed max-w-lg mb-10">
                    <?php echo wp_kses_post( $desc ); ?>
                </p>
            <?php endif; ?>

            <div class="flex flex-wrap gap-4 mb-16">
                <a href="<?php echo esc_url( $cta_link ); ?>" class="bg-[#7C3AED] text-white px-8 py-4 rounded-xl font-bold shadow-lg shadow-purple-200 hover:bg-[#6D28D9] transition transform hover:-translate-y-1">
                    <?php echo esc_html( $cta_text ); ?>
                </a>
                <?php if ( $resume_link ) : ?>
                    <a href="<?php echo esc_url( $resume_link ); ?>" class="bg-white border border-gray-100 text-gray-900 px-8 py-4 rounded-xl font-bold shadow-sm hover:bg-gray-50 transition transform hover:-translate-y-1">
                        RESUME
                    </a>
                <?php endif; ?>
            </div>

            <div class="flex gap-6 text-gray-400">
                <?php if ( $github ) : ?>
                    <a href="<?php echo esc_url( $github ); ?>" target="_blank" rel="noopener" class="hover:text-[#7C3AED] transition-colors" aria-label="GitHub"><i class="fa-solid fa-code text-xl"></i></a>
                <?php endif; ?>
                <?php if ( $linkedin ) : ?>
                    <a href="<?php echo esc_url( $linkedin ); ?>" target="_blank" rel="noopener" class="hover:text-[#7C3AED] transition-colors" aria-label="LinkedIn"><i class="fa-solid fa-at text-xl"></i></a>
                <?php endif; ?>
                <?php if ( $email ) : ?>
                    <a href="mailto:<?php echo esc_attr( $email ); ?>" class="hover:text-[#7C3AED] transition-colors" aria-label="Email"><i class="fa-solid fa-share-nodes text-xl"></i></a>
                <?php endif; ?>
            </div>
        </div>

        <?php if ( $image ) : ?>
            <div class="relative flex justify-center items-center">
                <div class="relative w-72 h-72 md:w-[480px] md:h-[480px] bg-purple-100 p-3" style="border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;">
                    <div class="w-full h-full bg-[#111827] overflow-hidden flex items-end justify-center relative" style="border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;">
                        <div class="absolute w-48 h-48 md:w-72 md:h-72 bg-[#E11D48] rounded-full top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"></div>
                        <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" class="relative z-10 w-[90%] h-auto">
                    </div>

                    <div class="absolute -bottom-2 -left-4 bg-white p-4 rounded-2xl shadow-2xl flex items-center gap-4 border border-gray-50" style="animation: float 3s ease-in-out infinite;">
                        <div class="w-12 h-12 bg-purple-50 rounded-xl flex items-center justify-center">
                            <div class="w-6 h-6 border-2 border-purple-400 rounded flex items-center justify-center">
                                <div class="w-2 h-2 bg-purple-500 rounded-full"></div>
                            </div>
                        </div>
                        <div>
                            <p class="text-[10px] text-gray-400 font-extrabold uppercase leading-none mb-1">Status</p>
                            <p class="text-sm font-extrabold text-slate-800"><?php echo esc_html( $status_message ); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    </div>
</section>

<?php
// ─── Featured Works Section ─────────────────────────────────────────
$works_subtitle = get_field( 'works_section_subtitle' ) ?: 'A selection of digital projects focused on scalable full-stack development, modern web and mobile applications, and efficient AI-assisted workflows.';
$works = new WP_Query( array(
    'post_type'      => 'work',
    'posts_per_page' => 3,
    'orderby'        => 'date',
    'order'          => 'DESC',
) );
?>

<?php if ( $works->have_posts() ) : ?>
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
                <?php echo wp_kses_post( $works_subtitle ); ?>
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <?php while ( $works->have_posts() ) : $works->the_post(); ?>
                <div class="bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-shadow duration-300 border border-gray-100 flex flex-col h-full">
                    
                    <?php $work_image = get_field( 'work_featured_image' ); ?>
                    <?php if ( $work_image ) : ?>
                        <div class="h-64 overflow-hidden relative group">
                            <img src="<?php echo esc_url( $work_image['url'] ); ?>" alt="Project Thumbnail" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                            <div class="absolute inset-0 bg-black/20 group-hover:bg-black/0 transition duration-300"></div>
                        </div>
                    <?php endif; ?>

                    <div class="p-8 flex flex-col flex-grow">
                        <?php $work_tags = get_field( 'work_tags' ); ?>
                        <?php if ( $work_tags ) : ?>
                            <div class="flex flex-wrap gap-2 mb-6">
                                <?php foreach ( (array) $work_tags as $tag ) : ?>
                                    <span class="bg-gray-100 text-gray-400 text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider italic">
                                        <?php echo esc_html( $tag ); ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <h3 class="text-2xl font-extrabold text-[#111827] mb-4">
                            <?php echo esc_html( get_the_title() ); ?>
                        </h3>
                        
                        <?php $work_description = get_field( 'work_short_description' ); ?>
                        <?php if ( $work_description ) : ?>
                            <p class="text-gray-500 text-sm leading-relaxed mb-6">
                                <?php echo wp_kses_post( $work_description ); ?>
                            </p>
                        <?php endif; ?>

                        <?php $work_highlights = get_field( 'work_highlights' ); ?>
                        <?php if ( $work_highlights ) : ?>
                            <ul class="space-y-3 mb-8 flex-grow">
                                <?php foreach ( (array) $work_highlights as $highlight ) : ?>
                                    <li class="flex items-start gap-3">
                                        <span class="mt-1 text-[#7C3AED]">
                                            <i class="fa-regular fa-circle-check text-sm"></i>
                                        </span>
                                        <span class="text-xs text-gray-500 font-medium leading-tight">
                                            <?php echo esc_html( $highlight ); ?>
                                        </span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                        <div class="flex items-center gap-3">
                            <a href="<?php the_permalink(); ?>" class="flex-grow bg-[#7C3AED] text-white text-center py-3 rounded-xl text-sm font-bold hover:bg-[#6D28D9] transition shadow-md shadow-purple-100">
                                View Details
                            </a>
                            <?php $work_image_gallery = get_field( 'work_image_gallery' ); ?>
                            <?php if ( $work_image_gallery ) : ?>
                                <a href="#" class="bg-purple-50 text-[#7C3AED] p-3 rounded-xl hover:bg-purple-100 transition">
                                    <i class="fa-regular fa-image"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>

    </div>
</section>
<?php endif; ?>

<?php
// ─── Featured Skills Section ────────────────────────────────────────
$skills_subtitle = get_field( 'skills_section_subtitle' ) ?: 'A comprehensive overview of my technical expertise across full-stack development, modern frameworks, and web and mobile technologies.';
$skill_categories = get_field( 'skill_categories' ) ?: array( 'All Skills', 'Languages', 'Frameworks & Libraries', 'Database Management', 'Tools & Cloud' );

$skills = new WP_Query( array(
    'post_type'      => 'skill',
    'posts_per_page' => -1,
    'meta_key'       => 'skill_order',
    'orderby'        => 'meta_value_num',
    'order'          => 'ASC',
) );
?>

<?php if ( $skills->have_posts() ) : ?>
<section class="py-24 bg-white">
    <div class="container mx-auto px-8 md:px-24 text-center">
        
        <h2 class="text-5xl font-extrabold text-[#111827] mb-6">Technical Skills</h2>
        <p class="text-gray-500 text-lg max-w-2xl mx-auto mb-12">
            <?php echo wp_kses_post( $skills_subtitle ); ?>
        </p>

        <div class="inline-flex flex-wrap justify-center bg-gray-50 p-2 rounded-full mb-16 border border-gray-100">
            <?php foreach ( (array) $skill_categories as $index => $cat ) : ?>
                <button 
                    onclick="filterSkills('<?php echo esc_attr( $cat ); ?>', this)"
                    class="skill-tab px-6 py-2 rounded-full text-xs font-bold transition-all <?php echo $index === 0 ? 'bg-[#7C3AED] text-white shadow-lg' : 'text-gray-400 hover:text-gray-600'; ?>">
                    <?php echo esc_html( $cat ); ?>
                </button>
            <?php endforeach; ?>
        </div>

        <div class="bg-gray-50 rounded-[40px] p-8 md:p-16 border border-gray-100">
            <div id="skills-grid" class="grid grid-cols-2 md:grid-cols-6 gap-6">
                <?php while ( $skills->have_posts() ) : $skills->the_post(); ?>
                    <?php 
                        $skill_name = get_the_title();
                        $skill_category = get_field( 'skill_category' ) ?: 'Languages';
                        $skill_icon = get_field( 'skill_icon' );
                    ?>
                    <div class="skill-card bg-white p-8 rounded-3xl shadow-sm border border-gray-50 flex flex-col items-center justify-center gap-4 transition-all hover:shadow-md group" 
                         data-category="<?php echo esc_attr( $skill_category ); ?>">
                        <div class="text-3xl text-[#7C3AED] group-hover:scale-110 transition-transform">
                            <?php if ( $skill_icon ) : ?>
                                <i class="<?php echo esc_attr( $skill_icon ); ?>"></i>
                            <?php else : ?>
                                <i class="fa-solid fa-code"></i>
                            <?php endif; ?>
                        </div>
                        <span class="text-sm font-bold text-gray-700"><?php echo esc_html( $skill_name ); ?></span>
                    </div>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        </div>

        <?php $core_tech = get_field( 'core_technologies' ); ?>
        <?php if ( $core_tech ) : ?>
            <div class="mt-24 pt-16 border-t border-gray-100">
                <h3 class="text-2xl font-bold text-[#111827] mb-12 uppercase tracking-widest text-sm">Core Technologies</h3>
                <div class="relative overflow-hidden">
                    <div class="flex animate-scroll items-center gap-12 grayscale opacity-50 hover:grayscale-0 hover:opacity-100 transition-all">
                        <?php foreach ( (array) $core_tech as $index => $tech ) : ?>
                            <div class="flex items-center gap-2 font-black text-xl whitespace-nowrap">
                                <i class="fa-solid fa-<?php echo esc_attr( $tech['icon'] ?: 'code' ); ?>"></i> 
                                <?php echo esc_html( $tech['name'] ); ?>
                            </div>
                            <?php if ( $index === count( $core_tech ) - 1 ) : ?>
                                <!-- Duplicate set for seamless loop -->
                                <?php foreach ( (array) $core_tech as $tech_dup ) : ?>
                                    <div class="flex items-center gap-2 font-black text-xl whitespace-nowrap">
                                        <i class="fa-solid fa-<?php echo esc_attr( $tech_dup['icon'] ?: 'code' ); ?>"></i> 
                                        <?php echo esc_html( $tech_dup['name'] ); ?>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>

<?php
// ─── Footer Section ─────────────────────────────────────────────────
$footer_company_name = get_field( 'footer_company_name' ) ?: 'J4YEMZ';
$footer_description = get_field( 'footer_description' );
$footer_email = get_field( 'footer_email' );
$footer_phone = get_field( 'footer_phone' );
$footer_github = get_field( 'footer_social_github' );
$footer_linkedin = get_field( 'footer_social_linkedin' );
$footer_instagram = get_field( 'footer_social_instagram' );
?>

<footer class="bg-white pt-24 pb-12 border-t border-gray-100">
    <div class="container mx-auto px-8 md:px-24">
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-20">
            
            <div class="col-span-1 md:col-span-1">
                <h3 class="text-2xl font-extrabold text-[#111827] mb-6"><?php echo esc_html( $footer_company_name ); ?></h3>
                <?php if ( $footer_description ) : ?>
                    <p class="text-gray-400 text-sm leading-relaxed max-w-[240px]">
                        <?php echo wp_kses_post( $footer_description ); ?>
                    </p>
                <?php endif; ?>
            </div>

            <div>
                <h4 class="text-[#7C3AED] font-bold text-[10px] uppercase tracking-[0.2em] mb-8">Pages</h4>
                <ul class="space-y-4 text-sm font-medium text-gray-400">
                    <li><a href="#" class="hover:text-[#7C3AED] transition-colors">Home</a></li>
                    <li><a href="#" class="hover:text-[#7C3AED] transition-colors">About</a></li>
                    <li><a href="#" class="hover:text-[#7C3AED] transition-colors">Contact</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-[#7C3AED] font-bold text-[10px] uppercase tracking-[0.2em] mb-8">Connect</h4>
                <ul class="space-y-4 text-sm font-medium text-gray-400">
                    <?php if ( $footer_github ) : ?>
                        <li><a href="<?php echo esc_url( $footer_github ); ?>" target="_blank" rel="noopener" class="hover:text-[#7C3AED] transition-colors">GitHub</a></li>
                    <?php endif; ?>
                    <?php if ( $footer_linkedin ) : ?>
                        <li><a href="<?php echo esc_url( $footer_linkedin ); ?>" target="_blank" rel="noopener" class="hover:text-[#7C3AED] transition-colors">LinkedIn</a></li>
                    <?php endif; ?>
                    <?php if ( $footer_instagram ) : ?>
                        <li><a href="<?php echo esc_url( $footer_instagram ); ?>" target="_blank" rel="noopener" class="hover:text-[#7C3AED] transition-colors">Instagram</a></li>
                    <?php endif; ?>
                </ul>
            </div>

            <div>
                <h4 class="text-[#7C3AED] font-bold text-[10px] uppercase tracking-[0.2em] mb-8">Inquiries</h4>
                <ul class="space-y-4 text-sm font-bold text-[#111827]">
                    <?php if ( $footer_email ) : ?>
                        <li><a href="mailto:<?php echo esc_attr( $footer_email ); ?>" class="hover:text-[#7C3AED] transition-colors"><?php echo esc_html( $footer_email ); ?></a></li>
                    <?php endif; ?>
                    <?php if ( $footer_phone ) : ?>
                        <li class="text-gray-400 font-medium"><?php echo esc_html( $footer_phone ); ?></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>

        <div class="pt-8 border-t border-gray-100 flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">
                © <?php echo date( 'Y' ); ?> <?php echo esc_html( $footer_company_name ); ?> — THE DIGITAL CURATOR.
            </p>
            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">
                BUILT WITH PRECISION.
            </p>
        </div>

    </div>
</footer>

<style>
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }

    @keyframes scroll {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }

    .animate-scroll {
        animation: scroll 20s linear infinite;
    }
</style>

<script>
function filterSkills(category, el) {
    // Update Tab UI
    document.querySelectorAll('.skill-tab').forEach(tab => {
        tab.classList.remove('bg-[#7C3AED]', 'text-white', 'shadow-lg');
        tab.classList.add('text-gray-400');
    });
    el.classList.add('bg-[#7C3AED]', 'text-white', 'shadow-lg');
    el.classList.remove('text-gray-400');

    // Filter Cards
    const cards = document.querySelectorAll('.skill-card');
    cards.forEach(card => {
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
