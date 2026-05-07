<nav class="flex items-center justify-between px-8 md:px-24 py-8 bg-white/80 backdrop-blur-md sticky top-0 w-full z-50 border-b border-gray-100">
        <div class="text-xl font-extrabold tracking-tighter">
            <a href="/front-page.php" class="hover:text-black transition">
                J4YEMZ
            </a></div>
        <?php
        wp_nav_menu( array(
            'theme_location' => 'primary',
            'container'      => false,
            'items_wrap'     => '<ul id="%1$s" class="hidden md:flex space-x-8 text-sm font-bold text-gray-500 uppercase tracking-widest list-none">%3$s</ul>',
            'depth'          => 1,
            'fallback_cb'    => false,
        ) );
        ?>
        <div class="flex items-center space-x-5 text-gray-500">
            <a href="mailto:contact@example.com"><i class="fa-regular fa-envelope text-lg"></i></a>
            <button><i class="fa-regular fa-moon text-lg"></i></button>
        </div>
    </nav>