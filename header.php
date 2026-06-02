<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        display: ['Outfit', 'sans-serif'],
                        body: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        accent: '#F472B6', // Pink-400 from image
                        'accent-hover': '#EC4899', // Pink-500
                        'bg-dark': '#09090b', // Neutral-950
                        'card-dark': '#18181b', // Neutral-900
                        'border-dark': '#27272a', // Neutral-800
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
        body { font-family: 'Inter', sans-serif; background: #09090b; color: #a1a1aa; }
        h1, h2, h3, h4, h5, .font-display { font-family: 'Outfit', sans-serif; color: #f4f4f5; }
        
        /* Scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #09090b; }
        ::-webkit-scrollbar-thumb { background: #27272a; border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: #F472B6; }

        /* Active nav item */
        nav .current-menu-item > a {
            color: #F472B6 !important;
            position: relative;
        }
        nav .current-menu-item > a::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            right: 0;
            height: 2px;
            background: #F472B6;
            border-radius: 2px;
        }
    </style>
    
    <?php wp_head(); ?>
</head>
<body <?php body_class('text-zinc-400 bg-bg-dark antialiased'); ?>>

    <header id="site-header" class="fixed top-0 w-full z-50 transition-all duration-300 bg-bg-dark/80 backdrop-blur-md border-b border-border-dark">
        <nav class="flex items-center justify-between px-8 md:px-24 py-5 max-w-7xl mx-auto w-full">
            <div class="flex items-center">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="block">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo.png' ); ?>" alt="Logo" class="h-8 w-auto object-contain">
                </a>
            </div>
            
            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-8">
                <ul class="flex space-x-8 text-xs font-bold uppercase tracking-widest list-none text-zinc-400">
                    <li><a href="#about" class="hover:text-accent transition duration-300">About</a></li>
                    <li><a href="#works" class="hover:text-accent transition duration-300">Works</a></li>
                    <li><a href="#skills" class="hover:text-accent transition duration-300">Skills</a></li>
                    <li><a href="#certifications" class="hover:text-accent transition duration-300">Certifications</a></li>
                    <li><a href="#contact" class="hover:text-accent transition duration-300">Contact</a></li>
                </ul>
                
                <?php 
                $resume_link = get_field('hero_resume_link', get_option('page_on_front')) ?: '#';
                ?>
                <a href="<?php echo esc_url($resume_link); ?>" target="_blank" class="border border-accent text-accent px-5 py-2 rounded-full text-xs font-bold tracking-wider hover:bg-accent hover:text-bg-dark transition duration-300">
                    Resume PDF
                </a>
            </div>

            <!-- Mobile Nav Toggle -->
            <button id="nav-toggle" class="md:hidden text-zinc-400 hover:text-white focus:outline-none">
                <i class="fa-solid fa-bars text-xl"></i>
            </button>
        </nav>

        <!-- Mobile Menu -->
        <div id="site-nav" class="hidden md:hidden bg-bg-dark/95 border-b border-border-dark px-8 py-6">
            <ul class="flex flex-col space-y-4 text-sm font-bold uppercase tracking-widest list-none text-zinc-400">
                <li><a href="#about" class="block hover:text-accent py-2 transition duration-300">About</a></li>
                <li><a href="#works" class="block hover:text-accent py-2 transition duration-300">Works</a></li>
                <li><a href="#skills" class="block hover:text-accent py-2 transition duration-300">Skills</a></li>
                <li><a href="#certifications" class="block hover:text-accent py-2 transition duration-300">Certifications</a></li>
                <li><a href="#contact" class="block hover:text-accent py-2 transition duration-300">Contact</a></li>
                <li>
                    <a href="<?php echo esc_url($resume_link); ?>" target="_blank" class="inline-block border border-accent text-accent px-5 py-2 rounded-full text-xs font-bold tracking-wider hover:bg-accent hover:text-bg-dark transition duration-300 mt-2">
                        Resume PDF
                    </a>
                </li>
            </ul>
        </div>
    </header>

    <div class="pt-20"> <!-- Spacer for fixed header -->