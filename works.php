<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Works - John Mark Isaias | Portfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #F9FAFB;
        }
    </style>
</head>
<body class="text-slate-900">
    <?php include get_template_directory() . '/header.php'; ?>

    <!-- Works Hero Section -->
    <section class="pt-32 pb-12 px-8 md:px-24">
        <div class="container mx-auto max-w-6xl">
            <div class="mb-12">
                <h1 class="text-5xl md:text-6xl font-extrabold text-[#111827] mb-4">
                    Works
                </h1>
                <p class="text-gray-500 text-lg max-w-2xl">
                    A selection of projects showcasing emerging, inventive-dimensional design. 
                    Cuty kind of code is treated as a <span class="text-[#7C3AED] font-semibold">gallery artifact</span>.
                </p>
            </div>
        </div>
    </section>

    <!-- Works Grid -->
    <section class="pb-24 px-8 md:px-24">
        <div class="container mx-auto max-w-6xl">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php
                $works_args = array(
                    'post_type'      => 'work',
                    'posts_per_page' => -1,
                    'orderby'        => 'menu_order',
                    'order'          => 'ASC',
                );

                $works_query = new WP_Query( $works_args );

                if ( $works_query->have_posts() ) {
                    while ( $works_query->have_posts() ) {
                        $works_query->the_post();
                        get_template_part( 'template-parts/card-work' );
                    }
                    wp_reset_postdata();
                }
                ?>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-24 px-8 md:px-24 mb-12">
        <div class="container mx-auto max-w-6xl">
            <div class="bg-gradient-to-r from-[#7C3AED] to-[#6D28D9] rounded-3xl p-12 md:p-16 text-center">
                <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-6">
                    Ready to build something<br>intentional?
                </h2>
                <p class="text-white/80 text-lg mb-8 max-w-2xl mx-auto">
                    Let's collaborate on your next project. Whether you need a full-stack solution, AI integration, or innovative design, I'm here to help bring your vision to life.
                </p>
                <a href="<?php echo home_url( '/contact' ); ?>" class="inline-block bg-white text-[#7C3AED] px-10 py-4 rounded-full font-bold hover:bg-gray-100 transition transform hover:-translate-y-1">
                    Let's Connect
                </a>
            </div>
        </div>
    </section>

    <?php include get_template_directory() . '/footer.php'; ?>
</body>
</html>
