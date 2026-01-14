// Initialize Lucide icons
lucide.createIcons();

// DOM Elements
const navbar = document.getElementById('navbar');
const navToggle = document.getElementById('navToggle');
const navMenu = document.getElementById('navMenu');
const themeToggle = document.getElementById('themeToggle');
const backToTop = document.getElementById('backToTop');
const typingText = document.getElementById('typingText');
const navLinks = document.querySelectorAll('.nav-link');

// Typing Animation
const typingStrings = [
    'Full Stack Developer',
    'UI/UX Enthusiast',
    'Problem Solver',
    'Code Craftsman',
    'Tech Explorer'
];

let stringIndex = 0;
let charIndex = 0;
let isDeleting = false;
let typingSpeed = 100;

function typeText() {
    const currentString = typingStrings[stringIndex];
    
    if (isDeleting) {
        typingText.textContent = currentString.substring(0, charIndex - 1);
        charIndex--;
        typingSpeed = 50;
    } else {
        typingText.textContent = currentString.substring(0, charIndex + 1);
        charIndex++;
        typingSpeed = 100;
    }
    
    if (!isDeleting && charIndex === currentString.length) {
        isDeleting = true;
        typingSpeed = 2000; // Pause at end
    } else if (isDeleting && charIndex === 0) {
        isDeleting = false;
        stringIndex = (stringIndex + 1) % typingStrings.length;
        typingSpeed = 500; // Pause before next string
    }
    
    setTimeout(typeText, typingSpeed);
}

// Start typing animation
typeText();

// Navbar scroll effect
let lastScroll = 0;

window.addEventListener('scroll', () => {
    const currentScroll = window.pageYOffset;
    
    // Add scrolled class
    if (currentScroll > 50) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
    
    // Show/hide back to top button
    if (currentScroll > 500) {
        backToTop.classList.add('visible');
    } else {
        backToTop.classList.remove('visible');
    }
    
    lastScroll = currentScroll;
});

// Mobile navigation toggle
navToggle.addEventListener('click', () => {
    navMenu.classList.toggle('active');
    
    // Toggle icon
    const icon = navToggle.querySelector('i');
    if (navMenu.classList.contains('active')) {
        icon.setAttribute('data-lucide', 'x');
    } else {
        icon.setAttribute('data-lucide', 'menu');
    }
    lucide.createIcons();
});

// Close mobile menu when clicking a link
navLinks.forEach(link => {
    link.addEventListener('click', () => {
        navMenu.classList.remove('active');
        const icon = navToggle.querySelector('i');
        icon.setAttribute('data-lucide', 'menu');
        lucide.createIcons();
    });
});

// Active navigation link on scroll
const sections = document.querySelectorAll('section[id]');

function highlightNavLink() {
    const scrollY = window.pageYOffset;
    
    sections.forEach(section => {
        const sectionHeight = section.offsetHeight;
        const sectionTop = section.offsetTop - 100;
        const sectionId = section.getAttribute('id');
        
        if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === `#${sectionId}`) {
                    link.classList.add('active');
                }
            });
        }
    });
}

window.addEventListener('scroll', highlightNavLink);

// Theme toggle
function setTheme(theme) {
    document.documentElement.setAttribute('data-theme', theme);
    localStorage.setItem('theme', theme);
}

function toggleTheme() {
    const currentTheme = document.documentElement.getAttribute('data-theme');
    const newTheme = currentTheme === 'light' ? 'dark' : 'light';
    setTheme(newTheme);
}

// Initialize theme
const savedTheme = localStorage.getItem('theme') || 'dark';
setTheme(savedTheme);

themeToggle.addEventListener('click', toggleTheme);

// Back to top
backToTop.addEventListener('click', () => {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});

// Intersection Observer for animations
const observerOptions = {
    root: null,
    rootMargin: '0px',
    threshold: 0.1
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            
            // Stagger animation for grid items
            const parent = entry.target.parentElement;
            if (parent) {
                const siblings = parent.querySelectorAll('.skill-category, .project-card, .service-card, .timeline-item');
                siblings.forEach((sibling, index) => {
                    sibling.style.transitionDelay = `${index * 0.1}s`;
                });
            }
        }
    });
}, observerOptions);

// Observe elements
const animatedElements = document.querySelectorAll(
    '.section-header, .about-content, .about-image, .skill-category, .project-card, .timeline-item, .service-card, .contact-info, .contact-form'
);

animatedElements.forEach(el => observer.observe(el));

// Smooth scroll for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Form validation enhancement
const contactForm = document.querySelector('.contact-form');
if (contactForm) {
    const inputs = contactForm.querySelectorAll('input, textarea');
    
    inputs.forEach(input => {
        // Add focus effects
        input.addEventListener('focus', () => {
            input.parentElement.classList.add('focused');
        });
        
        input.addEventListener('blur', () => {
            input.parentElement.classList.remove('focused');
            if (input.value) {
                input.parentElement.classList.add('filled');
            } else {
                input.parentElement.classList.remove('filled');
            }
        });
    });
}

// Parallax effect for hero section
const hero = document.querySelector('.hero');
if (hero) {
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        const heroContent = hero.querySelector('.hero-content');
        const heroVisual = hero.querySelector('.hero-visual');
        
        if (heroContent && scrolled < window.innerHeight) {
            heroContent.style.transform = `translateY(${scrolled * 0.3}px)`;
            heroContent.style.opacity = 1 - (scrolled / window.innerHeight);
        }
        
        if (heroVisual && scrolled < window.innerHeight) {
            heroVisual.style.transform = `translateY(${scrolled * 0.2}px)`;
        }
    });
}

// Code window animation - simulate typing
const codeContent = document.querySelector('.code-content code');
if (codeContent) {
    const originalHTML = codeContent.innerHTML;
    
    // Optional: Add line-by-line reveal animation
    // Uncomment below for typing effect on code
    /*
    codeContent.innerHTML = '';
    let i = 0;
    function typeCode() {
        if (i < originalHTML.length) {
            codeContent.innerHTML = originalHTML.substring(0, i + 1);
            i++;
            setTimeout(typeCode, 10);
        }
    }
    setTimeout(typeCode, 1000);
    */
}

// Cursor glow effect (optional - can be enabled)
/*
document.addEventListener('mousemove', (e) => {
    const glow = document.createElement('div');
    glow.className = 'cursor-glow';
    glow.style.left = e.clientX + 'px';
    glow.style.top = e.clientY + 'px';
    document.body.appendChild(glow);
    
    setTimeout(() => {
        glow.remove();
    }, 1000);
});
*/

// Preloader (optional)
window.addEventListener('load', () => {
    document.body.classList.add('loaded');
    
    // Re-initialize icons after load
    lucide.createIcons();
});

// Console easter egg
console.log('%c👋 Hey there, fellow developer!', 'font-size: 20px; font-weight: bold;');
console.log('%cLooking at the code? Nice! Feel free to reach out if you want to chat.', 'font-size: 14px;');
