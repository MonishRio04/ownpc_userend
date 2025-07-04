<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OWNPC - Premium Custom PCs</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --secondary: #64748b;
            --accent: #f97316;
            --dark: #0f172a;
            --light: #f8fafc;
        }
        
        body {
            font-family: 'Poppins', system-ui, sans-serif;
            background-color: #f8fafc;
            color: var(--dark);
            overflow-x: hidden;
        }
        
        .font-cormorant {
            font-family: 'Cormorant Garamond', serif;
        }
        
        .header-search {
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
        }
        
        .header-search:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.3);
        }
        
        .nav-link {
            position: relative;
            transition: color 0.2s ease;
        }
        
        .nav-link:after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary);
            transition: width 0.3s ease;
        }
        
        .nav-link:hover:after,
        .nav-link.active:after {
            width: 100%;
        }
        
        .cart-badge {
            top: -0.5rem;
            right: -0.5rem;
        }
        
        .mobile-menu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.5s ease;
        }
        
        .mobile-menu.open {
            max-height: 500px;
        }
        
        .hero-section {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%), 
                        url('https://images.unsplash.com/photo-1593640408182-31c70c8268f5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1800&q=80');
            background-size: cover;
            background-position: center;
            background-blend-mode: multiply;
        }
        
        .gradient-border {
            position: relative;
            background: var(--light);
            border-radius: 16px;
            padding: 1px;
        }
        
        .gradient-border::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border-radius: 16px;
            background: linear-gradient(45deg, #3b82f6, #8b5cf6);
            z-index: -1;
            margin: -1px;
        }
        
        .product-card {
            transition: all 0.3s ease;
            transform: translateY(0);
        }
        
        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        
        .category-card {
            transition: all 0.3s ease;
            overflow: hidden;
        }
        
        .category-card:hover {
            transform: scale(1.05);
        }
        
        .category-card:hover img {
            transform: scale(1.1);
        }
        
        .feature-card {
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
            border-radius: 16px;
            overflow: hidden;
        }
        
        .feature-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: rgba(59, 130, 246, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }
        
        .animated-bg {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, 
                rgba(59, 130, 246, 0.1) 0%, 
                rgba(139, 92, 246, 0.1) 25%, 
                rgba(249, 115, 22, 0.1) 50%, 
                rgba(59, 130, 246, 0.1) 75%, 
                rgba(139, 92, 246, 0.1) 100%);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            z-index: -1;
        }
        
        @keyframes gradientBG {
            0% { background-position: 0% 50% }
            50% { background-position: 100% 50% }
            100% { background-position: 0% 50% }
        }
        
        .pulse {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.7) }
            70% { box-shadow: 0 0 0 15px rgba(59, 130, 246, 0) }
            100% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0) }
        }
        
        .glow {
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.5);
        }
        
        .testimonial-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>
    @stack('style')
</head>
<body class="bg-gray-50">
    @include("layout.header")

    <main class="container my-4">
        @yield('content')
    </main>

    {{-- Include footer --}}
    @include('layout.footer')
     

    <!-- Footer -->
   

    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobileMenuButton');
        const mobileMenu = document.getElementById('mobileMenu');
        
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('open');
        });
        
        // Close mobile menu when clicking a link
        const mobileLinks = document.querySelectorAll('#mobileMenu a');
        mobileLinks.forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.remove('open');
            });
        });
        
        // Add scroll animation effect
        document.addEventListener('DOMContentLoaded', function() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-fadeIn');
                    }
                });
            }, {
                threshold: 0.1
            });
            
            document.querySelectorAll('.product-card, .feature-card, .category-card').forEach(card => {
                observer.observe(card);
            });
        });
    </script>
    @stack('script')
</body>
</html>