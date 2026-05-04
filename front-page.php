<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>John Mark Isaias | Portfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    


    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #F9FAFB;
        }

        /* Custom shape for the image container */
        .blob-shape {
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
        }

        .status-badge-float {
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .animate-scroll {
            animation: scroll 20s linear infinite;
        }

        @keyframes scroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
    </style>
</head>
<body class="text-slate-900">
    <?php include get_template_directory() . '/header.php'; ?>

    <section class="relative min-h-screen flex items-center overflow-hidden -mt-6">
        <div class="container mx-auto px-8 md:px-24 grid md:grid-cols-2 gap-16 items-center">
            
            <div class="z-10">
                <span class="text-[#7C3AED] font-bold text-xs tracking-[0.3em] uppercase mb-4 block">
                    Build. Scale. Innovate.
                </span>
                <h1 class="text-6xl md:text-7xl font-extrabold text-[#111827] tracking-tight mb-4">
                    John Mark Isaias
                </h1>
                <h2 class="text-2xl md:text-3xl font-bold text-[#7C3AED] mb-6">
                    Aspiring Full-Stack Developer
                </h2>
                <p class="text-gray-500 text-lg md:text-xl leading-relaxed max-w-lg mb-10">
                    Helping businesses build modern web and mobile applications at the intersection of full-stack development and AI-assisted innovation.
                </p>

                <div class="flex flex-wrap gap-4 mb-16">
                    <a href="#works" class="bg-[#7C3AED] text-white px-8 py-4 rounded-xl font-bold shadow-lg shadow-purple-200 hover:bg-[#6D28D9] transition transform hover:-translate-y-1">
                        VIEW MY WORK
                    </a>
                    <a href="resume.pdf" class="bg-white border border-gray-100 text-gray-900 px-8 py-4 rounded-xl font-bold shadow-sm hover:bg-gray-50 transition transform hover:-translate-y-1">
                        RESUME
                    </a>
                </div>

                <div class="flex gap-6 text-gray-400">
                    <a href="#" class="hover:text-[#7C3AED] transition-colors"><i class="fa-solid fa-code text-xl"></i></a>
                    <a href="#" class="hover:text-[#7C3AED] transition-colors"><i class="fa-solid fa-at text-xl"></i></a>
                    <a href="#" class="hover:text-[#7C3AED] transition-colors"><i class="fa-solid fa-share-nodes text-xl"></i></a>
                </div>
            </div>

            <div class="relative flex justify-center items-center">
                <div class="relative w-72 h-72 md:w-[480px] md:h-[480px] bg-purple-100 blob-shape p-3">
                    <div class="w-full h-full bg-[#111827] blob-shape overflow-hidden flex items-end justify-center relative">
                        <div class="absolute w-48 h-48 md:w-72 md:h-72 bg-[#E11D48] rounded-full top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"></div>
                        <img src="./images/hero-img.jpg" alt="Avatar" class="relative z-10 w-[90%] h-auto">
                    </div>

                    <div class="absolute -bottom-2 -left-4 bg-white p-4 rounded-2xl shadow-2xl flex items-center gap-4 status-badge-float border border-gray-50">
                        <div class="w-12 h-12 bg-purple-50 rounded-xl flex items-center justify-center">
                            <div class="w-6 h-6 border-2 border-purple-400 rounded flex items-center justify-center">
                                <div class="w-2 h-2 bg-purple-500 rounded-full"></div>
                            </div>
                        </div>
                        <div>
                            <p class="text-[10px] text-gray-400 font-extrabold uppercase leading-none mb-1">Status</p>
                            <p class="text-sm font-extrabold text-slate-800">Available for Craft</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <?php
// Your project data array
$projects = [
    [
        "title" => "MIT Bitcoin Expo 2026",
        "image" => "https://images.unsplash.com/photo-1518546305927-5a555bb7020d?auto=format&fit=crop&w=800&q=80",
        "tags" => ["SOLIDITY", "NEXT.JS", "ETHERS.JS"],
        "description" => "Full-scale event infrastructure for the premier academic conference on decentralized technologies and protocol research.",
        "highlights" => [
            "Architected zero-knowledge proof ticketing system for 2k+ attendees.",
            "Achieved 99.9% uptime during high-volume registration periods."
        ]
    ],
    [
        "title" => "SkillBridge AI",
        "image" => "https://images.unsplash.com/photo-1677442136019-21780ecad995?auto=format&fit=crop&w=800&q=80",
        "tags" => ["TYPESCRIPT", "OPENAI API", "TAILWIND"],
        "description" => "An adaptive learning platform using RAG pipelines to personalize curriculum based on real-time developer skill gaps.",
        "highlights" => [
            "Integrated vector databases for 40% faster content retrieval.",
            "Automated curriculum generation for 50+ technical stacks."
        ]
    ],
    [
        "title" => "Optimum Hacknet @ MIT",
        "image" => "https://images.unsplash.com/photo-1550751827-4bd374c3f58b?auto=format&fit=crop&w=800&q=80",
        "tags" => ["RUST", "WEBASSEMBLY", "GRAPHQL"],
        "description" => "A real-time network visualization and security testing environment built for high-throughput packet analysis.",
        "highlights" => [
            "Processed 1.2M events per second using Rust-based backend.",
            "Visualized complex attack vectors in a 3D webGL space."
        ]
    ]
];
?>

<section id="works" class="py-24 bg-[#F8F8F8]">
    <div class="container mx-auto px-8 md:px-24">
        
        <div class="mb-16">
            <div class="flex items-center gap-4 mb-4">
                <div class="h-[2px] w-12 bg-[#7C3AED]"></div>
                <span class="text-[#7C3AED] font-bold text-xs tracking-widest uppercase">Recent Works</span>
            </div>
            <h2 class="text-5xl md:text-6xl font-extrabold text-[#111827] mb-6">
                Featured <span class="text-[#7C3AED]">Works</span>
            </h2>
            <p class="text-gray-500 text-lg max-w-2xl leading-relaxed">
                A selection of digital projects focused on scalable full-stack development, modern web and mobile applications, and efficient AI-assisted workflows.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <?php foreach ($projects as $project): ?>
            <div class="bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-shadow duration-300 border border-gray-100 flex flex-col h-full">
                
                <div class="h-64 overflow-hidden relative group">
                    <img src="<?php echo $project['image']; ?>" alt="Project Thumbnail" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-black/20 group-hover:bg-black/0 transition duration-300"></div>
                </div>

                <div class="p-8 flex flex-col flex-grow">
                    <div class="flex flex-wrap gap-2 mb-6">
                        <?php foreach ($project['tags'] as $tag): ?>
                        <span class="bg-gray-100 text-gray-400 text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider italic">
                            <?php echo $tag; ?>
                        </span>
                        <?php endforeach; ?>
                    </div>

                    <h3 class="text-2xl font-extrabold text-[#111827] mb-4">
                        <?php echo $project['title']; ?>
                    </h3>
                    
                    <p class="text-gray-500 text-sm leading-relaxed mb-6">
                        <?php echo $project['description']; ?>
                    </p>

                    <ul class="space-y-3 mb-8 flex-grow">
                        <?php foreach ($project['highlights'] as $highlight): ?>
                        <li class="flex items-start gap-3">
                            <span class="mt-1 text-[#7C3AED]">
                                <i class="fa-regular fa-circle-check text-sm"></i>
                            </span>
                            <span class="text-xs text-gray-500 font-medium leading-tight">
                                <?php echo $highlight; ?>
                            </span>
                        </li>
                        <?php endforeach; ?>
                    </ul>

                    <div class="flex items-center gap-3">
                        <a href="#" class="flex-grow bg-[#7C3AED] text-white text-center py-3 rounded-xl text-sm font-bold hover:bg-[#6D28D9] transition shadow-md shadow-purple-100">
                            View Details
                        </a>
                        <a href="#" class="bg-purple-50 text-[#7C3AED] p-3 rounded-xl hover:bg-purple-100 transition">
                            <i class="fa-regular fa-image"></i>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>



<?php
// Define your skill categories and items
$categories = [
    "All Skills", "Languages", "Frameworks & Libraries", "Database Management", "Tools & Cloud"
];

$skills = [
    ["name" => "C++", "icon" => "fa-solid fa-code", "cat" => "Languages"],
    ["name" => "Java", "icon" => "fa-brands fa-java", "cat" => "Languages"],
    ["name" => "Python", "icon" => "fa-brands fa-python", "cat" => "Languages"],
    ["name" => "JavaScript", "icon" => "fa-brands fa-js", "cat" => "Languages"],
    ["name" => "TypeScript", "icon" => "fa-solid fa-terminal", "cat" => "Languages"],
    ["name" => "React", "icon" => "fa-brands fa-react", "cat" => "Frameworks & Libraries"],
    ["name" => "Next.js", "icon" => "fa-solid fa-layer-group", "cat" => "Frameworks & Libraries"],
    ["name" => "PostgreSQL", "icon" => "fa-solid fa-database", "cat" => "Database Management"],
    ["name" => "PyTorch", "icon" => "fa-solid fa-brain", "cat" => "Frameworks & Libraries"],
    ["name" => "Pandas", "icon" => "fa-solid fa-chart-line", "cat" => "Frameworks & Libraries"],
    ["name" => "AWS", "icon" => "fa-brands fa-aws", "cat" => "Tools & Cloud"],
    ["name" => "Docker", "icon" => "fa-brands fa-docker", "cat" => "Tools & Cloud"],
];
?>

<section class="py-24 bg-white">
    <div class="container mx-auto px-8 md:px-24 text-center">
        
        <h2 class="text-5xl font-extrabold text-[#111827] mb-6">Technical Skills</h2>
        <p class="text-gray-500 text-lg max-w-2xl mx-auto mb-12">
            A comprehensive overview of my technical expertise across full-stack development, modern frameworks, and web and mobile technologies.
        </p>

        <div class="inline-flex flex-wrap justify-center bg-gray-50 p-2 rounded-full mb-16 border border-gray-100">
            <?php foreach ($categories as $index => $cat): ?>
                <button 
                    onclick="filterSkills('<?php echo $cat; ?>', this)"
                    class="skill-tab px-6 py-2 rounded-full text-xs font-bold transition-all <?php echo $index === 0 ? 'bg-[#7C3AED] text-white shadow-lg' : 'text-gray-400 hover:text-gray-600'; ?>">
                    <?php echo $cat; ?>
                </button>
            <?php endforeach; ?>
        </div>

        <div class="bg-gray-50 rounded-[40px] p-8 md:p-16 border border-gray-100">
            <div id="skills-grid" class="grid grid-cols-2 md:grid-cols-6 gap-6">
                <?php foreach ($skills as $skill): ?>
                    <div class="skill-card bg-white p-8 rounded-3xl shadow-sm border border-gray-50 flex flex-col items-center justify-center gap-4 transition-all hover:shadow-md group" 
                         data-category="<?php echo $skill['cat']; ?>">
                        <div class="text-3xl text-[#7C3AED] group-hover:scale-110 transition-transform">
                            <i class="<?php echo $skill['icon']; ?>"></i>
                        </div>
                        <span class="text-sm font-bold text-gray-700"><?php echo $skill['name']; ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="mt-24 pt-16 border-t border-gray-100">
            <h3 class="text-2xl font-bold text-[#111827] mb-12 uppercase tracking-widest text-sm">Core Technologies</h3>
            <div class="relative overflow-hidden">
                <div class="flex animate-scroll items-center gap-12 grayscale opacity-50 hover:grayscale-0 hover:opacity-100 transition-all">
                    <!-- First set of logos -->
                    <div class="flex items-center gap-2 font-black text-xl whitespace-nowrap"><i class="fa-solid fa-bolt"></i> logoipsum</div>
                    <div class="flex items-center gap-2 font-black text-xl whitespace-nowrap"><i class="fa-solid fa-cube"></i> logoipsum</div>
                    <div class="flex items-center gap-2 font-black text-xl whitespace-nowrap"><i class="fa-solid fa-circle-nodes"></i> logoipsum</div>
                    <div class="flex items-center gap-2 font-black text-xl whitespace-nowrap"><i class="fa-solid fa-wind"></i> logoipsum</div>
                    <div class="flex items-center gap-2 font-black text-xl whitespace-nowrap"><i class="fa-solid fa-shield-halved"></i> logoipsum</div>
                    <!-- Duplicate set for seamless loop -->
                    <div class="flex items-center gap-2 font-black text-xl whitespace-nowrap"><i class="fa-solid fa-bolt"></i> logoipsum</div>
                    <div class="flex items-center gap-2 font-black text-xl whitespace-nowrap"><i class="fa-solid fa-cube"></i> logoipsum</div>
                    <div class="flex items-center gap-2 font-black text-xl whitespace-nowrap"><i class="fa-solid fa-circle-nodes"></i> logoipsum</div>
                    <div class="flex items-center gap-2 font-black text-xl whitespace-nowrap"><i class="fa-solid fa-wind"></i> logoipsum</div>
                    <div class="flex items-center gap-2 font-black text-xl whitespace-nowrap"><i class="fa-solid fa-shield-halved"></i> logoipsum</div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include get_template_directory() . '/footer.php'; ?>

<script>
function filterSkills(category, el) {
    // Update Tab UI
    document.querySelectorAll('.skill-tab').forEach(tab => {
        tab.classList.remove('bg-[#7C3AED]', 'text-white', 'shadow-lg');
        tab.classList.add('text-gray-400');
    });
    el.classList.add('bg-[#7C3AED]', 'text-white', 'shadow-lg');
    el.classList.remove('text-gray-400');

    // Filter Cards
    const cards = document.querySelectorAll('.skill-card');
    cards.forEach(card => {
        if (category === 'All Skills' || card.getAttribute('data-category') === category) {
            card.style.display = 'flex';
            // Simple fade in effect
            card.style.opacity = '0';
            setTimeout(() => { card.style.opacity = '1'; }, 10);
        } else {
            card.style.display = 'none';
        }
    });
}
</script>

</body>
</html>