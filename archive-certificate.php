<?php
/**
 * Archive: Certificates
 * Updated with premium design based on UI requirements.
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
    .cert-icon-box {
        background-color: #F5F3FF;
        transition: all 0.3s ease;
    }
    .cert-card:hover .cert-icon-box {
        background-color: #7C3AED;
        color: white !important;
    }
</style>

<!-- Certificates Hero Section -->
<section class="pt-24 pb-16 px-8 md:px-24 fade-up">
    <div class="container mx-auto max-w-7xl">
        <div class="mb-12">
            <span class="text-[#7C3AED] font-black text-[10px] uppercase tracking-[0.3em] mb-4 block">VALIDATION & MASTERY</span>
            <h1 class="text-6xl md:text-8xl font-extrabold text-[#111827] mb-6 tracking-tighter">
                Certificates
            </h1>
            <p class="text-gray-500 text-lg md:text-xl max-w-2xl leading-relaxed font-medium">
                A curated collection of technical validations and professional milestones. These artifacts represent continuous learning and mastery across the cloud and software engineering landscape.
            </p>
        </div>
    </div>
</section>

<!-- Technical Certifications Section -->
<section class="pb-32 px-8 md:px-24 bg-[#F9FAFB] py-24">
    <div class="container mx-auto max-w-7xl">
        <div class="flex items-center justify-between mb-12 fade-up" style="animation-delay: 0.2s;">
            <h2 class="text-2xl font-black text-slate-900 tracking-tight">Technical Certifications</h2>
            <span class="text-gray-400 text-[10px] font-bold uppercase tracking-widest italic">© Total Credentials</span>
        </div>

        <?php if ( have_posts() ) : ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-24">
                <?php $delay = 0.3; ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <div class="fade-up" style="animation-delay: <?php echo $delay; ?>s;">
                        <?php get_template_part( 'template-parts/card', 'certificate' ); ?>
                    </div>
                    <?php $delay += 0.1; ?>
                <?php endwhile; ?>
            </div>

            <?php 
            the_posts_pagination( array(
                'mid_size'  => 2,
                'prev_text' => '<i class="fa-solid fa-arrow-left"></i>',
                'next_text' => '<i class="fa-solid fa-arrow-right"></i>',
                'class'     => 'pagination-container flex justify-center gap-4 mt-12'
            ) ); 
            ?>
        <?php else : ?>
            <div class="bg-gray-50 rounded-3xl p-16 text-center">
                <p class="text-gray-400 font-bold uppercase tracking-widest">No certificates found.</p>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Call to Action Section -->
<section class="py-32 px-8 md:px-24 bg-[#F8F8F8]">
    <div class="container mx-auto max-w-7xl text-center">
        <div class="inline-block bg-white px-6 py-2 rounded-full shadow-sm border border-gray-100 mb-8">
            <span class="text-gray-500 text-[10px] font-bold uppercase tracking-widest">Ready to collaborate?</span>
        </div>
        <h2 class="text-5xl md:text-7xl font-extrabold text-[#111827] mb-12 tracking-tight">
            Let's build something <span class="text-[#7C3AED]">exceptional.</span>
        </h2>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="#" class="bg-[#4F46E5] text-white px-10 py-5 rounded-2xl font-bold text-lg shadow-xl shadow-indigo-100 hover:bg-[#4338CA] transition transform hover:-translate-y-1">
                Download Full CV
            </a>
            <a href="/contact" class="bg-[#F3E8FF] text-[#7C3AED] px-10 py-5 rounded-2xl font-bold text-lg hover:bg-[#E9D5FF] transition transform hover:-translate-y-1">
                Contact Me
            </a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
