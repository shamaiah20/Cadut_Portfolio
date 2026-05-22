<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        display: ['Plus Jakarta Sans', 'sans-serif'],
                        body: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                    colors: {
                        accent: '#6D28D9',
                        'accent-light': '#EDE9FE',
                        'surface': '#F9FAFB',
                        'card': '#FFFFFF',
                    },
                    borderRadius: {
                        '4xl': '2rem',
                        '5xl': '2.5rem',
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: #F9FAFB; }
        h1, h2, h3, h4, h5, .font-display { font-family: 'Plus Jakarta Sans', sans-serif; }
        
        /* ── Dark Mode ─────────────────────────────────────────── */
        html.dark body {
            background: #0F172A !important;
            color: #E2E8F0;
        }

        /* Nav */
        html.dark nav {
            background: rgba(15, 23, 42, 0.92) !important;
            border-color: rgba(255,255,255,0.06) !important;
        }
        html.dark nav a { color: #94A3B8 !important; }
        html.dark nav .text-xl a { color: #F1F5F9 !important; }

        /* Sections & backgrounds */
        html.dark .bg-white                             { background-color: #1E293B !important; }
        html.dark .bg-\[\#f2f2f0\]                     { background-color: #0F172A !important; }
        html.dark .bg-gray-50                           { background-color: #162032 !important; }
        html.dark .bg-\[\#F9FAFB\],
        html.dark .bg-\[\#F8F8F8\]                     { background-color: #0F172A !important; }

        /* Footer */
        html.dark footer                                { background-color: #1E293B !important; }

        /* Text */
        html.dark .text-\[\#111827\]                   { color: #F1F5F9 !important; }
        html.dark .text-slate-900                       { color: #F1F5F9 !important; }
        html.dark .text-gray-500                        { color: #94A3B8 !important; }
        html.dark .text-gray-400                        { color: #64748B !important; }
        html.dark .text-gray-900                        { color: #F1F5F9 !important; }

        /* Borders */
        html.dark .border-gray-100                      { border-color: rgba(255,255,255,0.06) !important; }
        html.dark .border-gray-50                       { border-color: rgba(255,255,255,0.04) !important; }

        /* Cards (inline background: #FFFFFF in page <style> blocks) */
        html.dark .work-card-premium                    { background: #1E293B !important; border-color: rgba(255,255,255,0.06) !important; }
        html.dark .project-detail-card                  { background: #1E293B !important; border-color: rgba(255,255,255,0.08) !important; }
        html.dark .tech-pill                            { background: #0F172A !important; border-color: rgba(255,255,255,0.08) !important; color: #94A3B8 !important; }
        html.dark .edu-card,
        html.dark .stat-box                             { background: #1E293B !important; border-color: rgba(255,255,255,0.06) !important; }
        html.dark .skill-tag                            { background: #1E293B !important; border-color: rgba(255,255,255,0.08) !important; color: #CBD5E1 !important; }

        /* Scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #F8F7F4; }
        ::-webkit-scrollbar-thumb { background: #DDD6FE; border-radius: 3px; }
        html.dark ::-webkit-scrollbar-track { background: #0F172A; }
        html.dark ::-webkit-scrollbar-thumb { background: #4C1D95; }

        /* Active nav item */
        nav .current-menu-item > a {
            color: #7C3AED !important;
            position: relative;
        }
        nav .current-menu-item > a::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            right: 0;
            height: 2px;
            background: #7C3AED;
            border-radius: 2px;
        }
    </style>
    
    <?php wp_head(); ?>
</head>
<body <?php body_class('text-slate-900'); ?>>

    <nav class="flex items-center justify-between px-8 md:px-24 py-8 bg-white/80 backdrop-blur-md sticky top-0 w-full z-50 border-b border-gray-100">
        <div class="text-xl font-extrabold tracking-tighter">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-black transition">
                J4YEMZ
            </a>
        </div>
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
            <a href="mailto:johnmarkeisaias@gmail.com"><i class="fa-regular fa-envelope text-lg"></i></a>
            <button id="darkToggle"><i class="fa-regular fa-moon text-lg"></i></button>
        </div>
    </nav>