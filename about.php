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
    <title>About | John Mark Isaias</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .timeline-dot { left: 50%; transform: translateX(-50%); }
    </style>
    <?php wp_head(); ?>
</head>
<body class="bg-[#F9FAFB] text-slate-900">

    <nav class="flex items-center justify-between px-8 md:px-24 py-8 bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-gray-100">
        <div class="text-xl font-extrabold tracking-tighter">J4YEMZ</div>
        <div class="hidden md:flex space-x-8 text-sm font-bold text-gray-400 uppercase tracking-widest">
            <a href="index.php" class="hover:text-black transition">Home</a>
            <a href="about.php" class="text-[#7C3AED] transition">About</a>
            <a href="#" class="hover:text-black transition">Works</a>
            <a href="#" class="hover:text-black transition">Contact</a>
        </div>
        <div class="flex items-center space-x-5 text-gray-500">
            <button><i class="fa-regular fa-moon text-lg"></i></button>
        </div>
    </nav>

    <main class="pt-12">
        
        <section class="container mx-auto px-8 md:px-24 mb-24">
            <div class="bg-white rounded-[40px] p-12 md:p-24 shadow-sm border border-gray-100 relative overflow-hidden">
                <div class="absolute -top-24 -right-24 w-96 h-96 bg-purple-50 rounded-full blur-[100px]"></div>
                
                <span class="text-[#7C3AED] font-bold text-xs tracking-[0.4em] uppercase mb-6 block">Portfolio 2026</span>
                <h1 class="text-6xl md:text-8xl font-extrabold text-[#111827] mb-8 tracking-tighter">
                    About <span class="text-[#7C3AED]">Me</span>
                </h1>
                <p class="text-gray-500 text-xl md:text-2xl max-w-4xl leading-relaxed">
                    Building modern, scalable web and mobile applications at the intersection of full-stack engineering excellence and AI-augmented development workflows.
                </p>
            </div>
        </section>

        <section class="container mx-auto px-8 md:px-24 grid md:grid-cols-2 gap-16 mb-32">
            <div class="space-y-8 text-gray-500 text-lg leading-relaxed">
                <h3 class="text-[#7C3AED] font-bold text-xs tracking-widest uppercase">Who I Am</h3>
                <p>
                    I am a 22-year-old <span class="text-black font-semibold">Information Technology student</span> with a strong focus on modern full-stack development. My journey is driven by a deep curiosity for building scalable, efficient, and user-centered digital systems.
                </p>
                <p>
                    I work primarily with React, Laravel, and the MERN stack. Beyond development, I see code as a craft—balancing performance, structure, and user experience to build systems that feel seamless and intentional.
                </p>
                <p>
                    I’m continuously exploring modern engineering practices and emerging technologies to refine my skills as a future full-stack developer.
                </p>
            </div>

            <div class="bg-gray-50 p-10 rounded-[32px] border border-gray-100 grid grid-cols-2 gap-y-10 gap-x-6">
                <div>
                    <h4 class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-4">Languages</h4>
                    <div class="flex flex-wrap gap-2">
                        <span class="bg-white px-4 py-2 rounded-xl text-xs font-bold shadow-sm">JavaScript</span>
                        <span class="bg-white px-4 py-2 rounded-xl text-xs font-bold shadow-sm text-blue-500">Php</span>
                    </div>
                </div>
                <div>
                    <h4 class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-4">Frameworks</h4>
                    <div class="flex flex-wrap gap-2">
                        <span class="bg-white px-4 py-2 rounded-xl text-xs font-bold shadow-sm">React JS</span>
                        <span class="bg-white px-4 py-2 rounded-xl text-xs font-bold shadow-sm">Laravel</span>
                        <span class="bg-white px-4 py-2 rounded-xl text-xs font-bold shadow-sm text-blue-400">Tailwind CSS</span>
                    </div>
                </div>
                <div>
                    <h4 class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-4">Cloud/DevOps</h4>
                    <div class="flex flex-wrap gap-2 text-purple-600">
                        <span class="bg-white px-4 py-2 rounded-xl text-xs font-bold shadow-sm">Render</span>
                        <span class="bg-white px-4 py-2 rounded-xl text-xs font-bold shadow-sm">Vercel</span>
                    </div>
                </div>
                <div>
                    <h4 class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-4">Mobile</h4>
                    <div class="flex flex-wrap gap-2">
                        <span class="bg-white px-4 py-2 rounded-xl text-xs font-bold shadow-sm">React Expo</span>
                    </div>
                </div>
            </div>
        </section>

        <section class="container mx-auto px-8 md:px-24 pb-32">
            <div class="text-center mb-20">
                <h3 class="text-[#7C3AED] font-bold text-xs tracking-[0.4em] uppercase">Educational Background</h3>
            </div>

            <div class="relative max-w-6xl mx-auto">
                <div class="absolute left-1/2 transform -translate-x-1/2 w-px h-full bg-gray-100 hidden md:block"></div>

                <div class="flex flex-col md:flex-row items-center mb-24 w-full">
                    <div class="w-full md:w-1/2 md:pr-20 mb-8 md:mb-0">
                        <div class="bg-white p-10 rounded-[32px] shadow-sm border border-gray-50 hover:shadow-xl transition-all group">
                            <span class="text-[#7C3AED] font-bold text-sm tracking-tighter">2022 — 2026</span>
                            <h4 class="text-2xl font-extrabold text-[#111827] mt-2 mb-1">BS in Information Technology</h4>
                            <p class="text-gray-400 text-sm mb-6">Davao Oriental State University</p>
                            <ul class="space-y-3">
                                <li class="flex items-start gap-3 text-sm text-gray-500">
                                    <i class="fa-solid fa-star text-[#7C3AED] mt-1"></i>
                                    <span>Specialized in Full-stack Development utilizing React, Laravel, and the MERN Stack.</span>
                                </li>
                                <li class="flex items-start gap-3 text-sm text-gray-500">
                                    <i class="fa-solid fa-star text-[#7C3AED] mt-1"></i>
                                    <span>Focused on building modern web and mobile applications with a commitment to tech innovation.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="hidden md:flex absolute timeline-dot w-10 h-10 bg-[#7C3AED] rounded-full border-4 border-white shadow-lg items-center justify-center text-white text-xs font-bold">1</div>
                    <div class="w-full md:w-1/2 md:pl-20">
                        <img src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=format&fit=crop&w=600&q=80" class="w-full h-64 object-cover rounded-[32px] grayscale hover:grayscale-0 transition-all duration-500 shadow-2xl shadow-gray-200">
                    </div>
                </div>

                <div class="flex flex-col md:flex-row items-center mb-24 w-full">
                    <div class="w-full md:w-1/2 md:pr-20 order-2 md:order-1">
                        <img src="https://images.unsplash.com/photo-1507842217343-583bb7270b66?auto=format&fit=crop&w=600&q=80" class="w-full h-64 object-cover rounded-[32px] grayscale hover:grayscale-0 transition-all duration-500 shadow-2xl shadow-gray-200">
                    </div>
                    <div class="hidden md:flex absolute timeline-dot w-10 h-10 bg-[#7C3AED] rounded-full border-4 border-white shadow-lg items-center justify-center text-white text-xs font-bold">2</div>
                    <div class="w-full md:w-1/2 md:pl-20 order-1 md:order-2 mb-8 md:mb-0">
                        <div class="bg-white p-10 rounded-[32px] shadow-sm border border-gray-50 hover:shadow-xl transition-all group">
                            <span class="text-[#7C3AED] font-bold text-sm tracking-tighter">2020 — 2022</span>
                            <h4 class="text-2xl font-extrabold text-[#111827] mt-2 mb-1">Humanities and Social Sciences (HUMSS)</h4>
                            <p class="text-gray-400 text-sm mb-6">Mati Doctors' Academy</p>
                            <ul class="space-y-3">
                                <li class="flex items-start gap-3 text-sm text-gray-500">
                                    <i class="fa-solid fa-pen-nib text-[#7C3AED] mt-1"></i>
                                    <span>Developed strong foundational skills in communication, critical thinking, and social research.</span>
                                </li>
                                <li class="flex items-start gap-3 text-sm text-gray-500">
                                    <i class="fa-solid fa-pen-nib text-[#7C3AED] mt-1"></i>
                                    <span>Explored interest in platforms and digital solutions, leading to a transition into the IT Field.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </main>

   

    <?php wp_footer(); ?>
</body>
</html>