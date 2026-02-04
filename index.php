<?php
// Establish connection
$conn = new mysqli("localhost", "root", "", "portfolio_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM projects ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portfolio | Rutuja</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=JetBrains+Mono&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>

    <style>
        @keyframes floating {
    0% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
    100% { transform: translateY(0px); }
}

.floating-icon {
    font-size: 15rem; /* Large size for Hero/About */
    color: var(--accent);
    animation: floating 4s ease-in-out infinite;
    filter: drop-shadow(0 0 20px rgba(0, 212, 255, 0.4));
}
        :root {
            --bg: #0d0d0d;
            --card-bg: #161616;
            --accent: #00d4ff;
            --text-gray: #a0a0a0;
            --nav-height: 80px;
        }

        body {
            background-color: var(--bg);
            color: white;
            font-family: 'Inter', sans-serif;
            scroll-behavior: smooth;
            overflow-x: hidden;
        }

        section {
            padding: 100px 0;
            scroll-margin-top: var(--nav-height);
        }

        .navbar {
            background: rgba(13, 13, 13, 0.95) !important;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid #222;
            min-height: var(--nav-height);
        }

        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding-top: var(--nav-height);
            background: radial-gradient(circle at top right, #00d4ff10, transparent);
        }

        .section-title {
            font-weight: 700;
            margin-bottom: 40px;
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            position: absolute;
            width: 50%;
            height: 4px;
            background: var(--accent);
            bottom: -8px;
            left: 0;
        }

        .skill-box {
            background: var(--card-bg);
            padding: 25px;
            border-radius: 15px;
            border: 1px solid #222;
            height: 100%;
            transition: 0.3s;
        }

        .skill-box:hover { border-color: var(--accent); }

        .skill-tag {
            display: inline-block;
            background: rgba(0, 212, 255, 0.1);
            color: var(--accent);
            padding: 5px 12px;
            border-radius: 6px;
            margin: 4px;
            font-size: 0.85rem;
            font-family: 'JetBrains Mono', monospace;
            border: 1px solid rgba(0, 212, 255, 0.3);
        }

        .project-card {
            background: var(--card-bg);
            border: 1px solid #222;
            border-radius: 15px;
            overflow: hidden;
            transition: 0.3s;
            height: 100%;
        }

        .project-card:hover { border-color: var(--accent); transform: translateY(-5px); }

        .project-img-wrapper { height: 200px; overflow: hidden; background: #222; }
        .project-img-wrapper img { width: 100%; height: 100%; object-fit: cover; transition: 0.5s; }
        .project-card:hover .project-img-wrapper img { transform: scale(1.05); }

        .form-control { background: #1a1a1a; border: 1px solid #333; color: white; }
        .form-control:focus { background: #222; border-color: var(--accent); color: white; box-shadow: none; }

        @media (max-width: 768px) {
            .hero { text-align: center; }
            .display-2 { font-size: 2.5rem; }
        }
        .icon-box {
    width: 50px;
    height: 50px;
    background: rgba(0, 212, 255, 0.1);
    border: 1px solid rgba(0, 212, 255, 0.2);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: 0.3s;
}

.contact-info a:hover {
    color: var(--accent) !important;
}

/* Enhancing form inputs */
.form-control {
    border-radius: 10px;
    transition: all 0.3s ease;
}

.form-control:focus {
    box-shadow: 0 0 15px rgba(0, 212, 255, 0.1);
}

.text-accent { color: var(--accent); }

.btn {
    border-radius: 10px; /* Modern rounded corners */
    transition: all 0.3s ease;
}

.btn-info:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(0, 212, 255, 0.3);
}

.btn-outline-light:hover {
    background: rgba(255, 255, 255, 0.1);
    transform: translateY(-3px);
}

.preview-container {
    position: relative;
    height: 400px;
}

.preview-card {
    background: #1a1a1a;
    border: 1px solid #333;
    border-radius: 15px;
    padding: 20px;
    position: absolute;
    box-shadow: 0 20px 50px rgba(0,0,0,0.5);
    transition: transform 0.3s ease;
}

.main-card {
    width: 280px;
    top: 50px;
    left: 50px;
    z-index: 2;
    border-color: var(--accent);
}

.settings-card {
    width: 200px;
    top: 0;
    right: 0;
    z-index: 3;
    background: #222;
}

.activity-card {
    width: 220px;
    bottom: 20px;
    right: 20px;
    z-index: 1;
    background: #111;
    border-color: #444;
}

/* Skeleton Loaders (Looks like a real dev tool) */
.skeleton-img { height: 120px; background: #222; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: #444; font-size: 2rem; }
.skeleton-text-short { width: 60%; height: 12px; background: #333; margin-top: 15px; border-radius: 4px; }
.skeleton-text-long { width: 90%; height: 8px; background: #222; margin-top: 10px; border-radius: 4px; }
.skeleton-btn { width: 45%; height: 30px; background: #222; border-radius: 6px; }

.setting-item { display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px; }
.color-dot { width: 12px; height: 12px; border-radius: 50%; }

/* Gentle floating animation */
.preview-card { animation: float-ui 6s ease-in-out infinite; }
.settings-card { animation-delay: 1s; }
.activity-card { animation-delay: 2s; }

@keyframes float-ui {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-15px); }
}

/* Creative Header with Gradient & Animation */
.creative-header {
    height: 140px;
    background: linear-gradient(135deg, #00d4ff 0%, #a020f0 100%);
    border-radius: 10px;
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
}

.creative-header::before {
    content: "";
    position: absolute;
    width: 200%;
    height: 200%;
    background: repeating-linear-gradient(45deg, rgba(255,255,255,0.05) 0px, rgba(255,255,255,0.05) 1px, transparent 1px, transparent 10px);
    animation: slide-bg 20s linear infinite;
}

.glass-overlay {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(5px);
    padding: 15px;
    border-radius: 50%;
    border: 1px solid rgba(255, 255, 255, 0.2);
    z-index: 1;
}

.mini-chip {
    padding: 4px 10px;
    background: #222;
    border: 1px solid #444;
    border-radius: 20px;
    font-size: 0.65rem;
    color: #888;
}

@keyframes slide-bg {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

/* Glow Effect for the Main Card */
.main-card {
    border: 1px solid rgba(0, 212, 255, 0.3) !important;
    box-shadow: 0 0 30px rgba(0, 212, 255, 0.15) !important;
}
.terminal-text {
    background: #000;
    padding: 10px;
    border-radius: 8px;
    font-family: 'JetBrains Mono', monospace;
    font-size: 0.75rem;
    border-left: 3px solid var(--accent);
}

.terminal-text p {
    margin: 0;
    color: #0f0; /* Classic Terminal Green */
    opacity: 0.9;
}

/* Updated Chips to look more "Dev" focused */
.mini-chip {
    padding: 4px 12px;
    background: rgba(0, 212, 255, 0.1);
    border: 1px solid rgba(0, 212, 255, 0.3);
    border-radius: 6px;
    font-size: 0.7rem;
    color: var(--accent);
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* Change icon animation to a pulse */
.bi-cpu {
    animation: pulse-icon 2s ease-in-out infinite;
}

@keyframes pulse-icon {
    0%, 100% { opacity: 1; transform: scale(1); }
    50% { opacity: 0.7; transform: scale(1.1); }
}
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold text-accent" href="#">RUTUJA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link px-3" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link px-3" href="#skills">Skills</a></li>
                <li class="nav-item"><a class="nav-link px-3" href="#projects">Projects</a></li>
                <li class="nav-item"><a class="nav-link px-3" href="#contact">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>

<section class="hero" id="home">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7" data-aos="fade-right">
                <span class="badge border border-info text-info mb-3 px-3 py-2">Available for Internships</span>
                <h1 class="display-2 fw-bold mb-3">Building Full Stack <br><span style="color:var(--accent)">Applications.</span></h1>
                <p class="lead text-gray mb-4">
        Hi, I'm <span class="highlight">Rutuja</span>. I specialize in building clean, responsive interfaces that bring digital ideas to life.
    </p>
                <div class="d-flex flex-column flex-md-row gap-3 justify-content-center justify-content-lg-start mt-4">
    <a href="Resume.pdf" target="_blank" download class="btn btn-info px-4 py-3 fw-bold shadow-sm">

        <i class="bi bi-file-earmark-pdf-fill me-2"></i>Download CV
    </a>
    <a href="#contact" class="btn btn-dark border-secondary px-4 py-3 fw-bold">
        <i class="bi bi-chat-dots-fill me-2"></i>Contact
    </a>
</div>
</div>
<div class="col-lg-5 d-none d-lg-block" data-aos="zoom-in">
    <div class="preview-container">
        <div class="preview-card main-card">
    <div class="creative-header">
        <div class="glass-overlay">
            <i class="bi bi-cpu text-white fs-1"></i>
        </div>
    </div>
    <div class="p-3">
        <div class="terminal-text mb-3">
            <p class="mb-1"><span class="text-success">></span> System.init()</p>
            <p class="mb-1"><span class="text-success">></span> DB_Connected: true</p>
            <p class="mb-0"><span class="text-info">></span> GET /api/data 200</p>
        </div>
        
        <div class="d-flex flex-wrap gap-2 mt-3">
            <div class="mini-chip">Backend</div>
            <div class="mini-chip">Logic</div>
            <div class="mini-chip">Database</div>
        </div>
    </div>
</div>
</div>

        <div class="preview-card settings-card">
            <h6 class="text-white small fw-bold mb-3"><i class="bi bi-sliders me-2"></i>Design Settings</h6>
            <div class="setting-item">
                <span class="small text-gray">Primary Color</span>
                <div class="color-dot" style="background: var(--accent);"></div>
            </div>
            <div class="setting-item">
                <span class="small text-gray">Border Radius</span>
                <span class="text-accent small">12px</span>
            </div>
            <div class="setting-item">
                <span class="small text-gray">Status</span>
                <span class="badge bg-success" style="font-size: 0.6rem;">Online</span>
            </div>
        </div>

        <div class="preview-card activity-card">
            <p class="mb-0 text-white small"><i class="bi bi-cpu-fill text-accent me-2"></i>Server: Active</p>
            <p class="mb-0 text-white small mt-1"><i class="bi bi-check-circle-fill text-success me-2"></i>Database Connected</p>
        </div>
    </div>
</div>
        </div>
    </div>
</section>

<section id="about" class="py-5" style="background-color: #000; color: #fff; min-height: 90vh; display: flex; align-items: center; overflow: hidden;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="position-relative p-5 rounded-4" style="background: rgba(255, 255, 255, 0.02); border: 1px solid rgba(13, 202, 240, 0.2); backdrop-filter: blur(12px); box-shadow: 0 10px 30px rgba(0,0,0,0.5);">
                    
                    <div class="position-absolute" style="top: -80px; right: -80px; width: 300px; height: 300px; background: radial-gradient(circle, rgba(13,202,240,0.25) 0%, rgba(0,0,0,0) 70%); z-index: 0; filter: blur(30px);"></div>
                    <div class="position-absolute" style="top: 0; right: 0; width: 100px; height: 100px; background: linear-gradient(135deg, rgba(13,202,240,0.4) 0%, rgba(0,0,0,0) 100%); z-index: 0; border-radius: 0 1.5rem 0 0;"></div>

                    <div class="row position-relative" style="z-index: 1;">
                        <div class="col-md-4 border-end border-secondary mb-4 mb-md-0">
                            <h6 class="text-info fw-bold mb-3" style="letter-spacing: 2px; font-size: 0.8rem;">STUDENT // DEVELOPER</h6>
                            <h2 class="fw-bold display-6 text-white">About</h2>
                            <div class="mt-4">
                                <span class="badge rounded-pill border border-info text-info px-3 py-2 small fw-bold" style="background: rgba(13, 202, 240, 0.05);">
                                   <span class="text-success me-1">●</span> Seeking Internship 
                                </span>
                            </div>
                        </div>

                        <div class="col-md-8 ps-md-5">
                            <p class="fs-5 text-white-50" style="line-height: 1.6;">
                                I am a Computer Science student who understands the <span class="text-info fw-bold">"behind the scenes"</span>. logic of how websites work. Even though I have a strong background in backend and databases, my real interest is in Frontend Development.
                            </p>
                            
                            <p class="fs-5 text-secondary mt-4" style="line-height: 1.6;">
                                I enjoy the process of taking complex code and turning it into something simple and easy for people to use. Right now, I am looking for an internship where I can work on real projects, solve actual problems, and learn from professional developers.
                            </p>

                            <div class="mt-5 d-flex align-items-center gap-4">
                                <a href="#contact" class="btn btn-info btn-lg px-4 fw-bold rounded-2 shadow-lg hover-up">
                                    Let's Connect
                                </a>
                                <div class="text-secondary small fw-mono opacity-75">
                                    2026_PORTFOLIO_V1
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  


        </div>
    </div>
</section>

<style>
    /* Professional Polish */
    .hover-up {
        transition: all 0.3s ease;
        border: none;
    }
    .hover-up:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(13, 202, 240, 0.4) !important;
        background-color: #0baccc;
    }
    .text-white-50 { color: rgba(255, 255, 255, 0.85) !important; }
</style>
<section id="skills" style="background: #0a0a0a;">
    <div class="container">
        <h2 class="section-title" data-aos="fade-up">My Skills</h2>
        <div class="row g-4 mt-2">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="skill-box">
                    <h5 class="mb-3 text-accent"><i class="bi bi-laptop me-2"></i>Frontend</h5>
                    <div class="skill-tags">
                        <span class="skill-tag">HTML5</span>
                        <span class="skill-tag">CSS3</span>
                        <span class="skill-tag">JavaScript</span>
                        <span class="skill-tag">Bootstrap 5</span>
                        <span class="skill-tag">Android UI</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="skill-box">
                    <h5 class="mb-3 text-accent"><i class="bi bi-database me-2"></i>Backend</h5>
                    <div class="skill-tags">
                        <span class="skill-tag">PHP</span>
                        <span class="skill-tag">MySQL</span>
                        <span class="skill-tag">Java</span>
                        <span class="skill-tag">Python</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="skill-box">
                    <h5 class="mb-3 text-accent"><i class="bi bi-gear me-2"></i>Logic & Systems</h5>
                    <div class="skill-tags">
                        <span class="skill-tag">DSA</span>
                        <span class="skill-tag">Git/GitHub</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="projects">
    <div class="container">
        <h2 class="section-title" data-aos="fade-up">Featured Projects</h2>
        <div class="row g-4 mt-2">
            <?php 
            if($result && $result->num_rows > 0): 
                while($row = $result->fetch_assoc()): 
                    $title = $row['title'];
                    $github = $row['github_link'];
                    $tech = $row['tech_stack']; // Use this instead of problem_statement
                    
                    // Logic to show specific images based on Title
                    $img = "https://images.unsplash.com/photo-1555066931-4365d14bab8c?q=80&w=1000&auto=format&fit=crop"; 
                    if(stripos($title, 'CRM') !== false) {
                        $img = "https://wiz-solution.com/wp-content/uploads/2023/05/7098132.jpg";
                    } elseif(stripos($title, 'Task') !== false) {
                        $img = "https://www.cflowapps.com/wp-content/uploads/2018/07/task-management-process.png";
                    } elseif(stripos($title, 'Kiddo') !== false) {
                        $img = "https://img.freepik.com/premium-vector/three-happy-cartoon-kids-shopping-with-bags-cart_1280751-60337.jpg?w=996";
                    } elseif(stripos($title, 'Course') !== false) {
                        $img = "https://tse3.mm.bing.net/th/id/OIP.FO-_k0dhIuP3TYhZ-4e5sQHaDL?pid=Api&P=0&h=180";
                    }
            ?>
                <div class="col-md-6 col-lg-3" data-aos="zoom-in">
                    <div class="project-card">
                        <a href="<?php echo $github; ?>" target="_blank">
                            <div class="project-img-wrapper">
                                <img src="<?php echo $img; ?>" alt="<?php echo $title; ?>">
                            </div>
                        </a>
                        <div class="p-4">
                            <h5 class="fw-bold mb-2 text-white"><?php echo $title; ?></h5>
                            <p class="text-gray small mb-3">
                                Built using: <?php echo $tech; ?>
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="badge bg-dark border border-secondary text-accent">Source Code</span>
                                <a href="<?php echo $github; ?>" target="_blank" class="text-accent fs-5"><i class="bi bi-github"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php else: ?>
                <div class="col-12 text-center text-muted py-5">
                    No projects found in the database.
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<section id="contact" style="background: #0a0a0a; border-top: 1px solid #222;">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-5" data-aos="fade-right">
                <h2 class="section-title">Get In Touch</h2>
                <p class="text-gray mb-4">I'm currently looking for internship opportunities. Feel free to reach out if you want to collaborate or just say hi!</p>
                
                <div class="contact-info mt-5">
                    <div class="d-flex align-items-center mb-4">
                        <div class="icon-box me-3">
                            <i class="bi bi-envelope-at text-accent fs-4"></i>
                        </div>
                        <div>
                            <p class="mb-0 text-gray small">Email Me</p>
                            <a href="mailto:wadgaonkarrutuja43@gmail.com" class="text-white text-decoration-none fw-bold">wadgaonkarrutuja43@gmail.com</a>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mb-4">
                        <div class="icon-box me-3">
                            <i class="bi bi-linkedin text-accent fs-4"></i>
                        </div>
                        <div>
                            <p class="mb-0 text-gray small">LinkedIn</p>
                            <a href="https://linkedin.com/in/https://www.linkedin.com/in/rutuja-wadgaonkar-718448322" target="_blank" class="text-white text-decoration-none fw-bold">Connect on LinkedIn</a>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mb-4">
                        <div class="icon-box me-3">
                            <i class="bi bi-github text-accent fs-4"></i>
                        </div>
                        <div>
                            <p class="mb-0 text-gray small">GitHub</p>
                            <a href="https://github.com/wadgaonkarrutuja43-bot" target="_blank" class="text-white text-decoration-none fw-bold">Follow @wadgaonkarrutuja43-bot</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7" data-aos="fade-left">
                <div class="skill-box p-4" style="border-radius: 20px;">
                    <form action="process.php" method="POST">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="small text-gray mb-2">Your Name</label>
                                <input type="text" name="name" class="form-control p-3" placeholder="Name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="small text-gray mb-2">Email Address</label>
                                <input type="email" name="email" class="form-control p-3" placeholder="name@example.com" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="small text-gray mb-2">Message</label>
                            <textarea name="message" class="form-control p-3" rows="5" placeholder="How can I help you?" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-info w-100 p-3 fw-bold shadow-sm">
                            <i class="bi bi-send-fill me-2"></i> Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="py-4 text-center text-gray small border-top border-dark">
    © 2026 Rutuja | Portfolio
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({ duration: 800, once: true });
</script>
</body>
</html>