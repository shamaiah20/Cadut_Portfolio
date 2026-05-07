<?php
/**
 * Template Name: About Page
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About | J4YEMZ</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
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
        * { box-sizing: border-box; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: #F9FAFB; }
        h1, h2, h3, h4, h5, .font-display { font-family: 'Plus Jakarta Sans', sans-serif; }

        /* Timeline vertical line */
        .timeline-line {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            width: 1px;
            height: 100%;
            background: linear-gradient(to bottom, #DDD6FE, #E5E7EB, #DDD6FE);
        }

        .timeline-dot {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            z-index: 10;
        }

        /* Fade in animation */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .fade-up { animation: fadeUp 0.7s ease forwards; }
        .delay-1 { animation-delay: 0.1s; opacity: 0; }
        .delay-2 { animation-delay: 0.2s; opacity: 0; }
        .delay-3 { animation-delay: 0.35s; opacity: 0; }
        .delay-4 { animation-delay: 0.5s; opacity: 0; }

        /* Skill tag */
        .skill-tag {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #fff;
            border: 1px solid #E5E7EB;
            border-radius: 10px;
            padding: 6px 14px;
            font-size: 12px;
            font-weight: 600;
            color: #374151;
            font-family: 'Syne', sans-serif;
            letter-spacing: 0.01em;
            transition: all 0.2s;
        }
        .skill-tag:hover {
            border-color: #6D28D9;
            color: #6D28D9;
            background: #F5F3FF;
        }

        /* Nav active */
        .nav-active {
            color: #6D28D9;
            position: relative;
        }
        .nav-active::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            right: 0;
            height: 2px;
            background: #6D28D9;
            border-radius: 2px;
        }

        /* Card hover */
        .edu-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .edu-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 60px -10px rgba(109,40,217,0.12);
        }

        /* Image hover desaturate */
        .edu-img {
            filter: grayscale(60%);
            transition: filter 0.5s ease;
        }
        .edu-img:hover { filter: grayscale(0%); }

        /* Stat box */
        .stat-box {
            background: #fff;
            border: 1px solid #F3F4F6;
            border-radius: 20px;
            padding: 24px 28px;
            transition: all 0.2s;
        }
        .stat-box:hover {
            border-color: #DDD6FE;
            background: #FDFBFF;
        }

        /* Scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #F8F7F4; }
        ::-webkit-scrollbar-thumb { background: #DDD6FE; border-radius: 3px; }

        /* Section label */
        .section-label {
            font-family: 'Syne', sans-serif;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0.35em;
            text-transform: uppercase;
            color: #6D28D9;
        }
    </style>
    <?php if (function_exists('wp_head')) wp_head(); ?>
</head>
<body class="text-slate-900">

<?php include get_template_directory() . '/header.php'; ?>

<!-- ═══════════════════════ HERO SECTION ═══════════════════════ -->
<section class="max-w-7xl mx-auto px-6 md:px-12 pt-14 pb-20">
    <div class="bg-white rounded-5xl p-10 md:p-20 border border-gray-100 relative overflow-hidden shadow-sm fade-up">
        <!-- Decorative blobs -->
        <div class="absolute -top-32 -right-32 w-[500px] h-[500px] bg-violet-50 rounded-full blur-[120px] pointer-events-none"></div>
        <div class="absolute -bottom-20 -left-20 w-[300px] h-[300px] bg-indigo-50 rounded-full blur-[80px] pointer-events-none"></div>

        <div class="relative">
            <span class="section-label mb-5 block">Portfolio 2026</span>
            <h1 class="font-display text-6xl md:text-8xl font-extrabold text-gray-900 tracking-tighter mb-6 leading-[0.95]">
                About <span class="text-accent">Me</span>
            </h1>
            <p class="text-gray-400 text-lg md:text-xl max-w-3xl leading-relaxed font-light">
                Building modern, scalable web and mobile applications at the intersection of full-stack engineering excellence and AI-augmented development workflows.
            </p>
        </div>
    </div>
</section>

<!-- ═══════════════════════ BIO + SKILLS GRID ═══════════════════════ -->
<section class="max-w-7xl mx-auto px-6 md:px-12 pb-24">
    <div class="grid md:grid-cols-2 gap-10">

        <!-- Bio -->
        <div class="fade-up delay-1 space-y-6">
            <span class="section-label">Who I Am</span>

            <p class="text-gray-500 text-[15px] leading-relaxed">
                I am a 22-year-old <span class="text-gray-900 font-semibold">Information Technology student</span> with a strong focus on modern full-stack development. My journey is driven by deep curiosity for building scalable, efficient, and user-centered digital systems.
            </p>
            <p class="text-gray-500 text-[15px] leading-relaxed">
                I work primarily with <span class="text-gray-900 font-semibold">React, Laravel, and the MERN stack</span>. Beyond development, I see code as a craft — balancing performance, structure, and user experience to build systems that feel seamless and intentional.
            </p>
            <p class="text-gray-500 text-[15px] leading-relaxed">
                I'm continuously exploring modern engineering practices and emerging technologies to refine my skills as a future full-stack developer.
            </p>

            <!-- Quick stats -->
            <div class="grid grid-cols-3 gap-3 pt-4">
                <div class="stat-box text-center">
                    <div class="font-display text-3xl font-black text-gray-900">3+</div>
                    <div class="text-[11px] text-gray-400 font-medium mt-1 uppercase tracking-wider">Years coding</div>
                </div>
                <div class="stat-box text-center">
                    <div class="font-display text-3xl font-black text-gray-900">15+</div>
                    <div class="text-[11px] text-gray-400 font-medium mt-1 uppercase tracking-wider">Projects</div>
                </div>
                <div class="stat-box text-center">
                    <div class="font-display text-3xl font-black text-gray-900">5+</div>
                    <div class="text-[11px] text-gray-400 font-medium mt-1 uppercase tracking-wider">Stack</div>
                </div>
            </div>
        </div>

        <!-- Skills Grid -->
        <div class="fade-up delay-2 bg-white rounded-4xl border border-gray-100 p-10 shadow-sm">
            <div class="grid grid-cols-2 gap-8">

                <div>
                    <p class="section-label mb-4">Languages</p>
                    <div class="flex flex-wrap gap-2">
                        <span class="skill-tag">JavaScript</span>
                        <span class="skill-tag" style="color:#6366F1">PHP</span>
                        <span class="skill-tag">TypeScript</span>
                    </div>
                </div>

                <div>
                    <p class="section-label mb-4">Frameworks</p>
                    <div class="flex flex-wrap gap-2">
                        <span class="skill-tag" style="color:#06B6D4">React JS</span>
                        <span class="skill-tag" style="color:#EF4444">Laravel</span>
                        <span class="skill-tag" style="color:#06B6D4">Tailwind</span>
                        <span class="skill-tag">Node.js</span>
                    </div>
                </div>

                <div>
                    <p class="section-label mb-4">Cloud / DevOps</p>
                    <div class="flex flex-wrap gap-2">
                        <span class="skill-tag" style="color:#6D28D9">Render</span>
                        <span class="skill-tag" style="color:#374151">Vercel</span>
                        <span class="skill-tag">GitHub</span>
                    </div>
                </div>

                <div>
                    <p class="section-label mb-4">Database</p>
                    <div class="flex flex-wrap gap-2">
                        <span class="skill-tag" style="color:#16A34A">MongoDB</span>
                        <span class="skill-tag" style="color:#2563EB">MySQL</span>
                    </div>
                </div>

                <div>
                    <p class="section-label mb-4">Mobile</p>
                    <div class="flex flex-wrap gap-2">
                        <span class="skill-tag" style="color:#06B6D4">React Expo</span>
                    </div>
                </div>

                <div>
                    <p class="section-label mb-4">Tools</p>
                    <div class="flex flex-wrap gap-2">
                        <span class="skill-tag">Figma</span>
                        <span class="skill-tag">VS Code</span>
                        <span class="skill-tag">Postman</span>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>


<!-- ═══════════════════════ EDUCATION TIMELINE ═══════════════════════ -->
<section class="max-w-7xl mx-auto px-6 md:px-12 pb-32">

    <div class="text-center mb-20 fade-up delay-3">
        <span class="section-label">Educational Background</span>
    </div>

    <div class="relative">
        <!-- Vertical line (desktop only) -->
        <div class="timeline-line hidden md:block"></div>

        <!-- ── Entry 1 ── -->
        <div class="relative flex flex-col md:flex-row items-center mb-20 gap-8">
            <!-- Left: card -->
            <div class="w-full md:w-1/2 md:pr-16 fade-up delay-1">
                <div class="edu-card bg-white rounded-4xl border border-gray-100 p-10 shadow-sm">
                    <span class="text-accent font-display font-bold text-sm tracking-tight">2022 — 2026</span>
                    <h4 class="font-display text-2xl font-extrabold text-gray-900 mt-2 mb-1 tracking-tight">BS in Information Technology</h4>
                    <p class="text-gray-400 text-sm mb-6">Davao Oriental State University</p>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-3 text-sm text-gray-500">
                            <span class="mt-1 w-4 h-4 rounded-full bg-accent-light flex-shrink-0 flex items-center justify-center">
                                <i class="fa-solid fa-star text-accent" style="font-size:7px"></i>
                            </span>
                            Specialized in full-stack development utilizing React, Laravel, and the MERN Stack.
                        </li>
                        <li class="flex items-start gap-3 text-sm text-gray-500">
                            <span class="mt-1 w-4 h-4 rounded-full bg-accent-light flex-shrink-0 flex items-center justify-center">
                                <i class="fa-solid fa-star text-accent" style="font-size:7px"></i>
                            </span>
                            Focused on building modern web and mobile applications with a commitment to tech innovation.
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Center dot -->
            <div class="timeline-dot hidden md:flex w-10 h-10 bg-accent rounded-full border-4 border-white shadow-lg items-center justify-center text-white font-display font-black text-xs">
                1
            </div>

            <!-- Right: image -->
            <div class="w-full md:w-1/2 md:pl-16 fade-up delay-2">
                <img src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=format&fit=crop&w=700&q=80"
                     alt="University"
                     class="edu-img w-full h-64 object-cover rounded-4xl shadow-xl">
            </div>
        </div>

        <!-- ── Entry 2 ── -->
        <div class="relative flex flex-col md:flex-row items-center mb-20 gap-8">
            <!-- Left: image -->
            <div class="w-full md:w-1/2 md:pr-16 order-2 md:order-1 fade-up delay-1">
                <img src="https://images.unsplash.com/photo-1507842217343-583bb7270b66?auto=format&fit=crop&w=700&q=80"
                     alt="Senior High"
                     class="edu-img w-full h-64 object-cover rounded-4xl shadow-xl">
            </div>

            <!-- Center dot -->
            <div class="timeline-dot hidden md:flex w-10 h-10 bg-accent rounded-full border-4 border-white shadow-lg items-center justify-center text-white font-display font-black text-xs">
                2
            </div>

            <!-- Right: card -->
            <div class="w-full md:w-1/2 md:pl-16 order-1 md:order-2 fade-up delay-2">
                <div class="edu-card bg-white rounded-4xl border border-gray-100 p-10 shadow-sm">
                    <span class="text-accent font-display font-bold text-sm tracking-tight">2020 — 2022</span>
                    <h4 class="font-display text-2xl font-extrabold text-gray-900 mt-2 mb-1 tracking-tight">Humanities and Social Sciences (HUMSS)</h4>
                    <p class="text-gray-400 text-sm mb-6">Mati Doctors' Academy</p>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-3 text-sm text-gray-500">
                            <span class="mt-1 w-4 h-4 rounded-full bg-accent-light flex-shrink-0 flex items-center justify-center">
                                <i class="fa-solid fa-pen-nib text-accent" style="font-size:7px"></i>
                            </span>
                            Developed strong foundational skills in communication, critical thinking, and social research.
                        </li>
                        <li class="flex items-start gap-3 text-sm text-gray-500">
                            <span class="mt-1 w-4 h-4 rounded-full bg-accent-light flex-shrink-0 flex items-center justify-center">
                                <i class="fa-solid fa-pen-nib text-accent" style="font-size:7px"></i>
                            </span>
                            Explored interest in platforms and digital solutions, leading to a transition into the IT field.
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- ── Entry 3 ── -->
        <div class="relative flex flex-col md:flex-row items-center gap-8">
            <!-- Left: card -->
            <div class="w-full md:w-1/2 md:pr-16 fade-up delay-1">
                <div class="edu-card bg-white rounded-4xl border border-gray-100 p-10 shadow-sm">
                    <span class="text-accent font-display font-bold text-sm tracking-tight">2018 — 2020</span>
                    <h4 class="font-display text-2xl font-extrabold text-gray-900 mt-2 mb-1 tracking-tight">Music Arts</h4>
                    <p class="text-gray-400 text-sm mb-6">Davao Pilot Graduate School</p>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-3 text-sm text-gray-500">
                            <span class="mt-1 w-4 h-4 rounded-full bg-accent-light flex-shrink-0 flex items-center justify-center">
                                <i class="fa-solid fa-music text-accent" style="font-size:7px"></i>
                            </span>
                            Specialized in Music Arts at the Junior High School level (JHS 4.0 GPA).
                        </li>
                        <li class="flex items-start gap-3 text-sm text-gray-500">
                            <span class="mt-1 w-4 h-4 rounded-full bg-accent-light flex-shrink-0 flex items-center justify-center">
                                <i class="fa-solid fa-music text-accent" style="font-size:7px"></i>
                            </span>
                            Cultivated creativity and discipline that continues to influence design sensibility and product thinking.
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Center dot -->
            <div class="timeline-dot hidden md:flex w-10 h-10 bg-accent rounded-full border-4 border-white shadow-lg items-center justify-center text-white font-display font-black text-xs">
                3
            </div>

            <!-- Right: image -->
            <div class="w-full md:w-1/2 md:pl-16 fade-up delay-2">
                <img src="https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?auto=format&fit=crop&w=700&q=80"
                     alt="Music"
                     class="edu-img w-full h-64 object-cover rounded-4xl shadow-xl">
            </div>
        </div>

    </div>
</section>


<!-- ═══════════════════════ FOOTER ═══════════════════════ -->
<footer class="border-t border-gray-100 bg-white">
    <div class="max-w-7xl mx-auto px-6 md:px-12 py-16 grid md:grid-cols-4 gap-10">

        <!-- Brand -->
        <div class="md:col-span-1">
            <div class="font-display text-xl font-extrabold tracking-tighter text-gray-900 mb-3">J4YEMZ</div>
            <p class="text-gray-400 text-sm leading-relaxed">
                Building modern digital experiences with precision and purpose. Based in the Philippines, working globally.
            </p>
        </div>

        <!-- Pages -->
        <div>
            <p class="section-label mb-5">Pages</p>
            <ul class="space-y-3 text-sm text-gray-500">
                <li><a href="<?php echo function_exists('home_url') ? home_url('/') : '/'; ?>" class="hover:text-accent transition">Home</a></li>
                <li><a href="<?php echo function_exists('home_url') ? home_url('/about') : '/about'; ?>" class="hover:text-accent transition text-accent">About</a></li>
                <li><a href="#" class="hover:text-accent transition">Works</a></li>
                <li><a href="#" class="hover:text-accent transition">Contact</a></li>
            </ul>
        </div>

        <!-- Connect -->
        <div>
            <p class="section-label mb-5">Connect</p>
            <ul class="space-y-3 text-sm text-gray-500">
                <li><a href="https://github.com/J4yemz" target="_blank" class="hover:text-accent transition flex items-center gap-2"><i class="fa-brands fa-github"></i> GitHub</a></li>
                <li><a href="#" class="hover:text-accent transition flex items-center gap-2"><i class="fa-brands fa-linkedin"></i> LinkedIn</a></li>
                <li><a href="#" class="hover:text-accent transition flex items-center gap-2"><i class="fa-brands fa-instagram"></i> Instagram</a></li>
            </ul>
        </div>

        <!-- Inquiries -->
        <div>
            <p class="section-label mb-5">Inquiries</p>
            <ul class="space-y-3 text-sm text-gray-500">
                <li><a href="mailto:johnmarkeisaias@gmail.com" class="hover:text-accent transition break-all">johnmarkeisaias@gmail.com</a></li>
                <li><span>+63 966 881 0579</span></li>
            </ul>
        </div>

    </div>

    <div class="border-t border-gray-100 max-w-7xl mx-auto px-6 md:px-12 py-6 flex flex-col md:flex-row items-center justify-between gap-2 text-xs text-gray-300 font-display tracking-widest uppercase">
        <span>© 2026 J4YEMZ — The Digital Curator.</span>
        <span>Built with Precision.</span>
    </div>
</footer>


<script>
    // Mobile menu toggle
    document.getElementById('mobileMenuBtn')?.addEventListener('click', () => {
        const menu = document.getElementById('mobileMenu');
        menu.classList.toggle('hidden');
    });

    // Dark mode toggle (basic)
    document.getElementById('darkToggle')?.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode');
    });

    // Intersection Observer for scroll animations
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animationPlayState = 'running';
                entry.target.style.opacity = '1';
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.fade-up').forEach(el => {
        el.style.animationPlayState = 'paused';
        observer.observe(el);
    });
</script>

<?php if (function_exists('wp_footer')) wp_footer(); ?>
</body>
</html>