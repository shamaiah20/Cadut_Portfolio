<nav class="flex items-center justify-between px-8 md:px-24 py-8 bg-white/80 backdrop-blur-md sticky top-0 w-full z-50 border-b border-gray-100">
        <div class="text-xl font-extrabold tracking-tighter">
            <a href="<?php echo get_permalink( get_page_by_path('home') ); ?>" class="hover:text-black transition">
                J4YEMZ
            </a>
        </div>
        <div class="hidden md:flex space-x-8 text-sm font-bold text-gray-500 uppercase tracking-widest">
            <a href="<?php echo get_permalink( get_page_by_path('about') ); ?>" class="hover:text-black transition">About</a>
            <a href="<?php echo get_permalink( get_page_by_path('works') ); ?>" class="hover:text-black transition">Works</a>
            <a href="<?php echo get_permalink( get_page_by_path('skills') ); ?>" class="hover:text-black transition">Skills</a>
            <a href="<?php echo get_permalink( get_page_by_path('certificates') ); ?>" class="hover:text-black transition">Certificates</a>
            <a href="<?php echo get_permalink( get_page_by_path('contact') ); ?>" class="hover:text-black transition">Contact</a>
        </div>
        <div class="flex items-center space-x-5 text-gray-500">
            <a href="mailto:contact@example.com"><i class="fa-regular fa-envelope text-lg"></i></a>
            <button><i class="fa-regular fa-moon text-lg"></i></button>
        </div>
    </nav>