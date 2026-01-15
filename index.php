<?php
// Configuration - Easy to modify content
$config = [
    'name' => 'KawaiiBunga',
    'title' => 'Head Developer @ Razz Networks',
    'tagline' => 'Building experiences that matter',
    'email' => 'kawaii@razznetworks.com',
    'github' => 'https://github.com/KawaiiBunga',
    'linkedin' => 'https://www.linkedin.com/in/levi-crozier-a1b454313/',
    'discord' => 'kawaii.bunga',
    'resume_link' => '#',
    
    'about' => [
        'description' => 'I\'m a passionate developer with experience in creating modern applcations, addons, and games. I love turning complex problems into simple, beautiful solutions.',
        'years_experience' => '10+',
        'projects_completed' => '50+',
        'technologies' => '15+'
    ],
    
    'skills' => [
        'Frontend' => ['HTML5', 'CSS3', 'JavaScript'],
        'Backend' => ['PHP', 'Laravel', 'Python', 'MySQL', 'Lua', 'GDScript', 'C#'],
        'Tools' => ['Git', 'Docker', 'AWS', 'Linux', 'VS Code'],
        'Other' => ['REST APIs', 'CI/CD', 'CLI']
    ],
    
    'projects' => [
        [
            'title' => 'Garrys Mod DarkRP Skilltree',
            'description' => 'A full-stack Garrys Mod addon allowing users to meta-progress different aspects of DarkRP Gameplay',
            'tags' => ['Lua', 'MySQL'],
            'link' => '#',
            'github' => '#',
            'image' => 'https://serverscout.site/img/projects/skilltree-1.png'
        ],
        [
            'title' => 'Garrys Mod DarkRP Scoreboard',
            'description' => 'A Garrys Mod DarkRP addon to show connected players and all the info about them',
            'tags' => ['Lua', 'MySQL'],
            'link' => '#',
            'github' => '#',
            'image' => 'https://serverscout.site/img/projects/scoreboard-1.png'
        ],
        [
            'title' => 'Garrys Mod DarkRP Welcome Screen',
            'description' => 'A Garrys Mod DarkRP addon to show a clean, modern welcome menu to joining players.',
            'tags' => ['Lua', 'MySQL'],
            'link' => '#',
            'github' => '#',
            'image' => 'https://serverscout.site/img/projects/welcome-menu-1.png'
        ],
        [
            'title' => 'Garrys Mod Help Menu',
            'description' => 'A Garrys Mod addon for players to reference important information about the server.',
            'tags' => ['Lua', 'MySQL'],
            'link' => '#',
            'github' => '#',
            'image' => 'https://serverscout.site/img/projects/help-menu-1.png'
        ]
    ],
    
    'experience' => [
        [
            'role' => 'Head Developer',
            'company' => 'Razz Networks',
            'period' => 'August, 2025 - Present',
            'description' => 'Leading development of the Razz Networks platform and managing a team of developers.'
        ],
        [
            'role' => 'Developer @ Razz Networks',
            'company' => 'Razz Networks',
            'period' => 'June, 2025 - August, 2025',
            'description' => 'Developed and maintained various addons and systems for the Razz Networks Garrys Mod DarkRP server.'
        ],
        [
            'role' => 'Owner',
            'company' => 'Karma Communities',
            'period' => 'May 2022 - Present',
            'description' => 'Owned and managed Karma Communities, a community gaming platform with various servers including Garrys Mod, Minecraft, Plutonium COD, and more.'
        ]
    ],
    
    'services' => [
        [
            'icon' => 'code',
            'title' => 'Garrys Mod Development',
            'description' => 'Custom Garrys Mod addons, game modes, and systems for your server.'
        ],
        [
            'icon' => 'server',
            'title' => 'Backend Systems',
            'description' => 'Robust APIs and server-side solutions that scale with your needs.'
        ],
        [
            'icon' => 'rocket',
            'title' => 'Performance',
            'description' => 'Optimization and speed improvements for existing applications.'
        ]
    ]
];

// Contact form handling
$form_message = '';
$form_status = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contact_submit'])) {
    $name = htmlspecialchars(trim($_POST['name'] ?? ''));
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars(trim($_POST['subject'] ?? ''));
    $message = htmlspecialchars(trim($_POST['message'] ?? ''));
    
    if (empty($name) || empty($email) || empty($message)) {
        $form_message = 'Please fill in all required fields.';
        $form_status = 'error';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $form_message = 'Please enter a valid email address.';
        $form_status = 'error';
    } else {
        // In production, you would send an email here
        // mail($config['email'], $subject, $message, "From: $email");
        $form_message = 'Thank you for your message! I\'ll get back to you soon.';
        $form_status = 'success';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo htmlspecialchars($config['name']); ?> - <?php echo htmlspecialchars($config['title']); ?>">
    <title><?php echo htmlspecialchars($config['name']); ?> | <?php echo htmlspecialchars($config['title']); ?></title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Animated Background -->
    <div class="bg-gradient"></div>
    <div class="bg-grid"></div>
    
    <!-- Navigation -->
    <nav class="navbar" id="navbar">
        <div class="nav-container">
            <a href="#home" class="nav-logo">
                <span class="logo-bracket">&lt;</span>
                <span class="logo-text"><?php echo htmlspecialchars(explode(' ', $config['name'])[0]); ?></span>
                <span class="logo-bracket">/&gt;</span>
            </a>
            
            <button class="nav-toggle" id="navToggle" aria-label="Toggle navigation">
                <i data-lucide="menu"></i>
            </button>
            
            <ul class="nav-menu" id="navMenu">
                <li><a href="#home" class="nav-link active">Home</a></li>
                <li><a href="#about" class="nav-link">About</a></li>
                <li><a href="#skills" class="nav-link">Skills</a></li>
                <li><a href="#projects" class="nav-link">Projects</a></li>
                <li><a href="#experience" class="nav-link">Experience</a></li>
                <li><a href="#services" class="nav-link">Services</a></li>
                <li><a href="#contact" class="nav-link">Contact</a></li>
            </ul>
            
            <div class="nav-actions">
                <button class="theme-toggle" id="themeToggle" aria-label="Toggle theme">
                    <i data-lucide="moon" class="theme-icon-dark"></i>
                    <i data-lucide="sun" class="theme-icon-light"></i>
                </button>
                <a href="<?php echo htmlspecialchars($config['resume_link']); ?>" class="btn btn-primary btn-sm">
                    <i data-lucide="download"></i>
                    Resume
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-badge">
                    <span class="badge-dot"></span>
                    Available for work
                </div>
                
                <h1 class="hero-title">
                    Hi, I'm <span class="gradient-text"><?php echo htmlspecialchars($config['name']); ?></span>
                </h1>
                
                <div class="hero-subtitle">
                    <span class="typing-text" id="typingText"></span>
                    <span class="typing-cursor">|</span>
                </div>
                
                <p class="hero-description"><?php echo htmlspecialchars($config['tagline']); ?></p>
                
                <div class="hero-cta">
                    <a href="#projects" class="btn btn-primary btn-lg">
                        <i data-lucide="folder-open"></i>
                        View My Work
                    </a>
                    <a href="#contact" class="btn btn-outline btn-lg">
                        <i data-lucide="mail"></i>
                        Get In Touch
                    </a>
                </div>
                
                <div class="hero-social">
                    <a href="<?php echo htmlspecialchars($config['github']); ?>" target="_blank" rel="noopener" class="social-link" aria-label="GitHub">
                        <i data-lucide="github"></i>
                    </a>
                    <a href="<?php echo htmlspecialchars($config['linkedin']); ?>" target="_blank" rel="noopener" class="social-link" aria-label="LinkedIn">
                        <i data-lucide="linkedin"></i>
                    </a>
                    <a href="mailto:<?php echo htmlspecialchars($config['email']); ?>" class="social-link" aria-label="Email">
                        <i data-lucide="mail"></i>
                    </a>
                </div>
            </div>
            
            <div class="hero-visual">
                <div class="code-window">
                    <div class="code-header">
                        <div class="code-dots">
                            <span class="dot red"></span>
                            <span class="dot yellow"></span>
                            <span class="dot green"></span>
                        </div>
                        <span class="code-title">developer.js</span>
                    </div>
                    <pre class="code-content"><code><span class="code-keyword">const</span> <span class="code-variable">developer</span> = {
  <span class="code-property">name</span>: <span class="code-string">"<?php echo htmlspecialchars($config['name']); ?>"</span>,
  <span class="code-property">role</span>: <span class="code-string">"<?php echo htmlspecialchars($config['title']); ?>"</span>,
  <span class="code-property">passion</span>: <span class="code-string">"Building amazing things"</span>,
  <span class="code-property">coffee</span>: <span class="code-boolean">true</span>,
  
  <span class="code-function">code</span>() {
    <span class="code-keyword">return</span> <span class="code-string">"Clean & Efficient"</span>;
  },
  
  <span class="code-function">solve</span>(<span class="code-param">problem</span>) {
    <span class="code-keyword">return</span> <span class="code-variable">this</span>.<span class="code-function">think</span>()
      .<span class="code-function">plan</span>()
      .<span class="code-function">execute</span>();
  }
};</code></pre>
                </div>
            </div>
        </div>
        
        <a href="#about" class="scroll-indicator" aria-label="Scroll to about section">
            <i data-lucide="chevron-down"></i>
        </a>
    </section>

    <!-- About Section -->
    <section id="about" class="section">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">About Me</span>
                <h2 class="section-title">Get to know me</h2>
            </div>
            
            <div class="about-grid">
                <div class="about-content">
                    <p class="about-text"><?php echo htmlspecialchars($config['about']['description']); ?></p>
                    
                    <div class="about-stats">
                        <div class="stat-card">
                            <span class="stat-number"><?php echo htmlspecialchars($config['about']['years_experience']); ?></span>
                            <span class="stat-label">Years Experience</span>
                        </div>
                        <div class="stat-card">
                            <span class="stat-number"><?php echo htmlspecialchars($config['about']['projects_completed']); ?></span>
                            <span class="stat-label">Projects Completed</span>
                        </div>
                        <div class="stat-card">
                            <span class="stat-number"><?php echo htmlspecialchars($config['about']['technologies']); ?></span>
                            <span class="stat-label">Technologies</span>
                        </div>
                    </div>
                </div>
                
                <div class="about-image">
                    <div class="image-frame">
                        <div class="image-placeholder">
                            <i data-lucide="user"></i>
                        </div>
                        <div class="image-decoration"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section id="skills" class="section section-alt">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Skills</span>
                <h2 class="section-title">Technologies I work with</h2>
            </div>
            
            <div class="skills-grid">
                <?php foreach ($config['skills'] as $category => $skills): ?>
                <div class="skill-category">
                    <h3 class="skill-category-title"><?php echo htmlspecialchars($category); ?></h3>
                    <div class="skill-tags">
                        <?php foreach ($skills as $skill): ?>
                        <span class="skill-tag"><?php echo htmlspecialchars($skill); ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="section">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Portfolio</span>
                <h2 class="section-title">Featured Projects</h2>
            </div>
            
            <div class="projects-grid">
                <?php foreach ($config['projects'] as $index => $project): ?>
                <article class="project-card" data-aos="fade-up" data-aos-delay="<?php echo $index * 100; ?>">
                    <div class="project-image">
                        <img src="<?php echo htmlspecialchars($project['image']); ?>" alt="<?php echo htmlspecialchars($project['title']); ?>" loading="lazy">
                        <div class="project-overlay">
                            <div class="project-links">
                                <a href="<?php echo htmlspecialchars($project['link']); ?>" class="project-link" target="_blank" rel="noopener" aria-label="View live project">
                                    <i data-lucide="external-link"></i>
                                </a>
                                <a href="<?php echo htmlspecialchars($project['github']); ?>" class="project-link" target="_blank" rel="noopener" aria-label="View source code">
                                    <i data-lucide="github"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="project-content">
                        <h3 class="project-title"><?php echo htmlspecialchars($project['title']); ?></h3>
                        <p class="project-description"><?php echo htmlspecialchars($project['description']); ?></p>
                        <div class="project-tags">
                            <?php foreach ($project['tags'] as $tag): ?>
                            <span class="project-tag"><?php echo htmlspecialchars($tag); ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
            
            <div class="section-cta">
                <a href="<?php echo htmlspecialchars($config['github']); ?>" target="_blank" rel="noopener" class="btn btn-outline">
                    <i data-lucide="github"></i>
                    View All Projects on GitHub
                </a>
            </div>
        </div>
    </section>

    <!-- Experience Section -->
    <section id="experience" class="section section-alt">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Experience</span>
                <h2 class="section-title">My Journey</h2>
            </div>
            
            <div class="timeline">
                <?php foreach ($config['experience'] as $index => $exp): ?>
                <div class="timeline-item <?php echo $index % 2 === 0 ? 'left' : 'right'; ?>">
                    <div class="timeline-content">
                        <span class="timeline-period"><?php echo htmlspecialchars($exp['period']); ?></span>
                        <h3 class="timeline-title"><?php echo htmlspecialchars($exp['role']); ?></h3>
                        <span class="timeline-company"><?php echo htmlspecialchars($exp['company']); ?></span>
                        <p class="timeline-description"><?php echo htmlspecialchars($exp['description']); ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="section">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Services</span>
                <h2 class="section-title">What I Offer</h2>
            </div>
            
            <div class="services-grid">
                <?php foreach ($config['services'] as $service): ?>
                <div class="service-card">
                    <div class="service-icon">
                        <i data-lucide="<?php echo htmlspecialchars($service['icon']); ?>"></i>
                    </div>
                    <h3 class="service-title"><?php echo htmlspecialchars($service['title']); ?></h3>
                    <p class="service-description"><?php echo htmlspecialchars($service['description']); ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="section section-alt">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Contact</span>
                <h2 class="section-title">Let's Work Together</h2>
                <p class="section-subtitle">Have a project in mind? Let's discuss how I can help bring your ideas to life.</p>
            </div>
            
            <div class="contact-grid">
                <div class="contact-info">
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i data-lucide="mail"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Email</h4>
                            <a href="mailto:<?php echo htmlspecialchars($config['email']); ?>"><?php echo htmlspecialchars($config['email']); ?></a>
                        </div>
                    </div>
                    
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i data-lucide="message-circle"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Discord</h4>
                            <span><?php echo htmlspecialchars($config['discord']); ?></span>
                        </div>
                    </div>
                    
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i data-lucide="map-pin"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Location</h4>
                            <span>Available Worldwide</span>
                        </div>
                    </div>
                    
                    <div class="contact-social">
                        <h4>Connect with me</h4>
                        <div class="social-links">
                            <a href="<?php echo htmlspecialchars($config['github']); ?>" target="_blank" rel="noopener" class="social-link">
                                <i data-lucide="github"></i>
                            </a>
                            <a href="<?php echo htmlspecialchars($config['linkedin']); ?>" target="_blank" rel="noopener" class="social-link">
                                <i data-lucide="linkedin"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <form class="contact-form" method="POST" action="#contact">
                    <?php if ($form_message): ?>
                    <div class="form-message <?php echo $form_status; ?>">
                        <i data-lucide="<?php echo $form_status === 'success' ? 'check-circle' : 'alert-circle'; ?>"></i>
                        <?php echo htmlspecialchars($form_message); ?>
                    </div>
                    <?php endif; ?>
                    
                    <div class="form-group">
                        <label for="name">Name <span class="required">*</span></label>
                        <input type="text" id="name" name="name" required placeholder="Your name">
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email <span class="required">*</span></label>
                        <input type="email" id="email" name="email" required placeholder="your@email.com">
                    </div>
                    
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" id="subject" name="subject" placeholder="Project inquiry">
                    </div>
                    
                    <div class="form-group">
                        <label for="message">Message <span class="required">*</span></label>
                        <textarea id="message" name="message" rows="5" required placeholder="Tell me about your project..."></textarea>
                    </div>
                    
                    <button type="submit" name="contact_submit" class="btn btn-primary btn-lg btn-full">
                        <i data-lucide="send"></i>
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-brand">
                    <a href="#home" class="nav-logo">
                        <span class="logo-bracket">&lt;</span>
                        <span class="logo-text"><?php echo htmlspecialchars(explode(' ', $config['name'])[0]); ?></span>
                        <span class="logo-bracket">/&gt;</span>
                    </a>
                    <p>Building digital experiences that matter.</p>
                </div>
                
                <div class="footer-links">
                    <a href="#home">Home</a>
                    <a href="#about">About</a>
                    <a href="#projects">Projects</a>
                    <a href="#contact">Contact</a>
                </div>
                
                <div class="footer-social">
                    <a href="<?php echo htmlspecialchars($config['github']); ?>" target="_blank" rel="noopener" aria-label="GitHub">
                        <i data-lucide="github"></i>
                    </a>
                    <a href="<?php echo htmlspecialchars($config['linkedin']); ?>" target="_blank" rel="noopener" aria-label="LinkedIn">
                        <i data-lucide="linkedin"></i>
                    </a>
                    <a href="mailto:<?php echo htmlspecialchars($config['email']); ?>" aria-label="Email">
                        <i data-lucide="mail"></i>
                    </a>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars($config['name']); ?>. All rights reserved.</p>
                <p>Crafted with <i data-lucide="heart" class="heart-icon"></i> and lots of coffee</p>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button class="back-to-top" id="backToTop" aria-label="Back to top">
        <i data-lucide="arrow-up"></i>
    </button>

    <script src="script.js"></script>
</body>
</html>
