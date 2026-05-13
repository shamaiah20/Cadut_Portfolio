<?php
/**
 * Template Name: Contact Page
 */
get_header(); ?>

<style>
    .contact-card {
        background: #FFFFFF;
        border-radius: 24px;
        border: 1px solid #F3F4F6;
        box-shadow: 0 4px 20px -5px rgba(0, 0, 0, 0.05);
    }
    .input-field {
        background: #F9FAFB;
        border: 1px solid #E5E7EB;
        border-radius: 12px;
        padding: 12px 16px;
        width: 100%;
        font-size: 14px;
        transition: all 0.2s;
    }
    .input-field:focus {
        outline: none;
        border-color: #6D28D9;
        background: #FFFFFF;
        box-shadow: 0 0 0 4px rgba(109, 40, 217, 0.1);
    }
    .label-text {
        font-size: 12px;
        font-weight: 700;
        color: #374151;
        margin-bottom: 8px;
        display: block;
    }
    .icon-box {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #F9FAFB;
        border: 1px solid #F3F4F6;
        color: #6D28D9;
        flex-shrink: 0;
    }

    .label-text {
    margin-bottom: -20px !important; /* adjust this number to your liking */
    margin-top: 10px !important;
    display: block;
    }

    .wpcf7-form-control-wrap {
        display: block;
        margin-top: 0 !important;
    }
</style>

<div class="max-w-7xl mx-auto px-6 md:px-24 py-16">
    
    <!-- Header -->
    <div class="mb-16">
        <h1 class="text-6xl font-extrabold text-slate-900 mb-6 tracking-tight">Get in touch</h1>
        <p class="text-gray-500 text-lg max-w-2xl leading-relaxed">
            Whether you have a question about my work, want to discuss a new project opportunity, or just want to say hi, I'd love to hear from you.
        </p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
        
    <!-- Contact Form -->
    <div class="lg:col-span-2 contact-card p-10">
        <h2 class="text-2xl font-bold text-slate-900 mb-2">Send me a message</h2>
        <p class="text-gray-400 text-sm mb-10">Fill out the form below and I'll get back to you as soon as possible.</p>

        <?php echo do_shortcode('[contact-form-7 id="123" title="Contact Form"]'); ?>
    </div>

    <!-- Sidebar -->
    <div class="space-y-8">
        
        <!-- Socials -->
        <div class="contact-card p-10">
            <h2 class="text-2xl font-bold text-slate-900 mb-2">Connect with me</h2>
            <p class="text-gray-400 text-sm mb-10">You can also reach out to me directly through these channels.</p>

            <div class="space-y-6">
                <a href="https://github.com/J4yemz" target="_blank" class="flex items-center gap-4 group">
                    <div class="icon-box group-hover:bg-[#6D28D9] group-hover:text-white transition-colors">
                        <i class="fa-brands fa-github text-xl"></i>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest leading-none mb-1">GitHub</p>
                        <p class="text-sm font-bold text-slate-700">github.com/J4yemz</p>
                    </div>
                </a>

                <a href="https://www.linkedin.com/in/john-mark-isaias-a4273736a/" target="_blank" class="flex items-center gap-4 group">
                    <div class="icon-box group-hover:bg-[#6D28D9] group-hover:text-white transition-colors">
                        <i class="fa-brands fa-linkedin text-xl"></i>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest leading-none mb-1">LinkedIn</p>
                        <p class="text-sm font-bold text-slate-700">linkedin.com/in/j4yemz</p>
                    </div>
                </a>

                <a href="mailto:johnmarkeisaias@gmail.com" class="flex items-center gap-4 group">
                    <div class="icon-box group-hover:bg-[#6D28D9] group-hover:text-white transition-colors">
                        <i class="fa-regular fa-envelope text-xl"></i>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest leading-none mb-1">Email</p>
                        <p class="text-sm font-bold text-slate-700">johnmarkeisaias@gmail.com</p>
                    </div>
                </a>

                <div class="flex items-center gap-4 group">
                    <div class="icon-box">
                        <i class="fa-solid fa-phone text-xl"></i>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest leading-none mb-1">Phone</p>
                        <p class="text-sm font-bold text-slate-700">+63 966 881 0579</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Location Map -->
        <div class="contact-card overflow-hidden h-64 relative group">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31546522.84650532!2d103.88242440306236!3d15.539868778918237!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33b0a6885f8d1c93%3A0x9597793d537877e5!2sPhilippines!5e0!3m2!1sen!2sph!4v1715562725661!5m2!1sen!2sph" 
                class="w-full h-full border-0 grayscale group-hover:grayscale-0 transition-all duration-700" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
            <div class="absolute inset-0 bg-white/40 pointer-events-none flex flex-col justify-end p-8 group-hover:bg-white/20 transition-all">
                <div class="flex items-center gap-2 mb-2">
                    <div class="w-2 h-2 bg-[#6D28D9] rounded-full animate-pulse"></div>
                    <span class="text-[10px] font-black text-[#6D28D9] uppercase tracking-widest">Current Location</span>
                </div>
                <p class="text-xl font-extrabold text-slate-900 leading-tight">Philippines</p>
            </div>
        </div>

    </div>

</div>

</div>

<?php get_footer(); ?>
