const swiper = new Swiper('.swiper-container', {
    loop: true,
    speed: 1000,
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },
    centeredSlides: true,
    slidesPerView: 'auto',
    spaceBetween: 40,
    mousewheel: true,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        320: {
            spaceBetween: 20,
            slidesPerView: 'auto',
        },
        768: {
            spaceBetween: 30,
            slidesPerView: 'auto',
        },
        1024: {
            spaceBetween: 40,
            slidesPerView: 'auto',
        }
    },
    on: {
        init: function() {
            this.slides.forEach((slide, index) => {
                slide.style.transform = `scale(${index === this.activeIndex ? 1 : 0.85})`;
                slide.style.opacity = index === this.activeIndex ? 1 : 0.7;
            });
        },
        slideChange: function() {
            this.slides.forEach((slide, index) => {
                const scale = index === this.activeIndex ? 1 : 0.85;
                const opacity = index === this.activeIndex ? 1 : 0.7;
                slide.style.transform = `scale(${scale})`;
                slide.style.opacity = opacity;
            });
        }
    }
});

// Остальной код с частицами остается без изменений
const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');
const particles = [];
const particleCount = 750;
const colors = ['#6C7A9C', '#5A6B8C', '#8E9BB5'];

class Particle {
    constructor() {
        this.reset();
    }

    reset() {
        this.x = Math.random() * canvas.width;
        this.y = Math.random() * canvas.height;
        this.velocity = {
            x: (Math.random() - 0.5) * 0.5,
            y: (Math.random() - 0.5) * 0.5
        };
        this.radius = Math.random() * 1.2 + 0.8;
        this.color = colors[Math.floor(Math.random() * colors.length)];
        this.opacity = Math.random() * 0.4 + 0.1;
    }

    update() {
        if(this.x > canvas.width + 5) this.x = -5;
        if(this.x < -5) this.x = canvas.width + 5;
        if(this.y > canvas.height + 5) this.y = -5;
        if(this.y < -5) this.y = canvas.height + 5;
        
        this.x += this.velocity.x;
        this.y += this.velocity.y;
        this.draw();
    }

    draw() {
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
        ctx.shadowColor = this.color;
        ctx.shadowBlur = 12;
        ctx.fillStyle = this.color;
        ctx.globalAlpha = this.opacity;
        ctx.fill();
    }
}

function initParticles() {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
    
    particles.length = 0;
    for(let i = 0; i < particleCount; i++) {
        particles.push(new Particle());
    }
}

function animateParticles() {
    ctx.globalAlpha = 1;
    ctx.fillStyle = '#0A0D13';
    ctx.fillRect(0, 0, canvas.width, canvas.height);
    
    particles.forEach(particle => particle.update());
    requestAnimationFrame(animateParticles);
}

window.addEventListener('resize', () => {
    initParticles();
    swiper.update();
});

initParticles();
animateParticles();
