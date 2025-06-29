<!-- Footer -->
<footer class="bg-gray-900 text-white pt-16 pb-8">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
            <div>
                <a href="#" class="font-['Pacifico'] text-2xl text-white mb-4 inline-block">logo</a>
                <p class="text-gray-400 mb-4">Custom PC building made simple. Quality components, expert assembly, and
                    exceptional performance.</p>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <div class="w-6 h-6 flex items-center justify-center">
                            <i class="ri-facebook-fill"></i>
                        </div>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <div class="w-6 h-6 flex items-center justify-center">
                            <i class="ri-twitter-x-fill"></i>
                        </div>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <div class="w-6 h-6 flex items-center justify-center">
                            <i class="ri-instagram-fill"></i>
                        </div>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <div class="w-6 h-6 flex items-center justify-center">
                            <i class="ri-youtube-fill"></i>
                        </div>
                    </a>
                </div>
            </div>

            <div>
                <h3 class="text-lg font-semibold mb-4">Products</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Custom PCs</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Gaming PCs</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Workstations</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Components</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Accessories</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-lg font-semibold mb-4">Support</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Contact Us</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">FAQs</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Warranty</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Shipping</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Returns</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-lg font-semibold mb-4">Contact</h3>
                <ul class="space-y-2">
                    <li class="flex items-center">
                        <div class="w-5 h-5 flex items-center justify-center mr-2 text-gray-400">
                            <i class="ri-map-pin-line"></i>
                        </div>
                        <span class="text-gray-400">123 Tech Street, Silicon Valley, CA 94043</span>
                    </li>
                    <li class="flex items-center">
                        <div class="w-5 h-5 flex items-center justify-center mr-2 text-gray-400">
                            <i class="ri-phone-line"></i>
                        </div>
                        <span class="text-gray-400">(800) 123-4567</span>
                    </li>
                    <li class="flex items-center">
                        <div class="w-5 h-5 flex items-center justify-center mr-2 text-gray-400">
                            <i class="ri-mail-line"></i>
                        </div>
                        <span class="text-gray-400">support@custompcbuilder.com</span>
                    </li>
                    <li class="flex items-center">
                        <div class="w-5 h-5 flex items-center justify-center mr-2 text-gray-400">
                            <i class="ri-time-line"></i>
                        </div>
                        <span class="text-gray-400">Mon-Fri: 9AM-6PM EST</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center">
            <p class="text-gray-400 text-sm mb-4 md:mb-0">© 2025 Custom PC Builder. All rights reserved.</p>
            <div class="flex space-x-6">
                <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors">Privacy Policy</a>
                <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors">Terms of Service</a>
                <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors">Sitemap</a>
            </div>
        </div>
    </div>
</footer>

<!-- Back to Top Button -->
<button id="backToTop"
    class="fixed bottom-6 right-6 bg-primary text-white w-10 h-10 rounded-full shadow-lg flex items-center justify-center opacity-0 invisible transition-all duration-300 cursor-pointer">
    <div class="w-6 h-6 flex items-center justify-center">
        <i class="ri-arrow-up-line"></i>
    </div>
</button>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Back to Top Button
        const backToTopButton = document.getElementById('backToTop');

        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                backToTopButton.classList.remove('opacity-0', 'invisible');
                backToTopButton.classList.add('opacity-100', 'visible');
            } else {
                backToTopButton.classList.add('opacity-0', 'invisible');
                backToTopButton.classList.remove('opacity-100', 'visible');
            }
        });

        backToTopButton.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    });

    // FAQ Toggle
    function toggleFAQ(id) {
        const answer = document.getElementById(`faq-answer-${id}`);
        const arrow = document.getElementById(`faq-arrow-${id}`);

        if (answer.classList.contains('hidden')) {
            answer.classList.remove('hidden');
            arrow.classList.remove('ri-arrow-down-s-line');
            arrow.classList.add('ri-arrow-up-s-line');
        } else {
            answer.classList.add('hidden');
            arrow.classList.remove('ri-arrow-up-s-line');
            arrow.classList.add('ri-arrow-down-s-line');
        }
    }
</script>
