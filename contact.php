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

            <form action="#" class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="label-text">Name</label>
                        <input type="text" class="input-field" placeholder="John Mark Isaias">
                    </div>
                    <div>
                        <label class="label-text">Phone number</label>
                        <input type="text" class="input-field" placeholder="+63 9123456789">
                    </div>
                </div>

                <div>
                    <label class="label-text">Email</label>
                    <input type="email" class="input-field" placeholder="johnmarkeisaias@gmail.com">
                </div>

                <div>
                    <label class="label-text">Subject</label>
                    <input type="text" class="input-field" placeholder="Project Inquiry">
                </div>

                <div>
                    <label class="label-text">Message</label>
                    <textarea class="input-field h-40 resize-none" placeholder="I'd like to discuss a project opportunity..."></textarea>
                </div>

                <button type="submit" class="bg-[#6D28D9] text-white px-8 py-4 rounded-xl font-bold hover:bg-[#5B21B6] transition-all flex items-center gap-2 group">
                    Send Message 
                    <i class="fa-solid fa-paper-plane group-hover:translate-x-1 transition-transform"></i>
                </button>
            </form>
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
                <img src="https://images.unsplash.com/photo-1501949997128-2fbb9f6429f1?auto=format&fit=crop&w=800&q=80" alt="Boston Map" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-white/60 flex flex-col justify-end p-8 backdrop-blur-[2px]">
                    <div class="flex items-center gap-2 mb-2">
                        <div class="w-2 h-2 bg-[#6D28D9] rounded-full animate-pulse"></div>
                        <span class="text-[10px] font-black text-[#6D28D9] uppercase tracking-widest">Current Location</span>
                    </div>
                    <p class="text-xl font-extrabold text-slate-900 leading-tight">Boston, Massachusetts, USA</p>
                </div>
            </div>

        </div>

    </div>

</div>

<?php get_footer(); ?>
