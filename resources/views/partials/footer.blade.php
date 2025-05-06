<footer class="bg-gradient-to-r from-amber-600 to-amber-700 text-white py-10 mt-12" dir="rtl">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Logo and Description -->
            <div class="text-center md:text-right">
                <div class="flex flex-col items-center md:items-start">
                    <a href="/" class="inline-flex items-center mb-4">
                        <x-application-logo class="h-10 w-auto fill-current text-white" />
                        <h3 class="text-2xl font-bold mr-2">بكصة</h3>
                    </a>
                    <p class="text-gray-200 mb-4">متجرك الشامل لتوريدات المطاعم بالجملة</p>
                    <div class="mt-4 flex space-x-4 space-x-reverse">
                        <a href="#" class="bg-white text-amber-600 hover:bg-amber-100 p-2 rounded-full transition-all hover:scale-110" aria-label="فيسبوك">
                            <i class="fab fa-facebook-f w-5 h-5 flex items-center justify-center"></i>
                        </a>
                        <a href="#" class="bg-white text-amber-600 hover:bg-amber-100 p-2 rounded-full transition-all hover:scale-110" aria-label="انستغرام">
                            <i class="fab fa-instagram w-5 h-5 flex items-center justify-center"></i>
                        </a>
                        <a href="#" class="bg-white text-amber-600 hover:bg-amber-100 p-2 rounded-full transition-all hover:scale-110" aria-label="تويتر">
                            <i class="fab fa-twitter w-5 h-5 flex items-center justify-center"></i>
                        </a>
                        <a href="#" class="bg-white text-amber-600 hover:bg-amber-100 p-2 rounded-full transition-all hover:scale-110" aria-label="واتساب">
                            <i class="fab fa-whatsapp w-5 h-5 flex items-center justify-center"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="text-center md:text-right">
                <h3 class="text-xl font-bold mb-4 border-b border-amber-500 pb-2 inline-block">روابط سريعة</h3>
                <ul class="space-y-3">
                    <li>
                        <a href="/" class="hover:text-white text-gray-200 transition-all flex items-center justify-center md:justify-start">
                            <i class="fas fa-home ml-2"></i>
                            <span>الرئيسية</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('products.index') }}" class="hover:text-white text-gray-200 transition-all flex items-center justify-center md:justify-start">
                            <i class="fas fa-box ml-2"></i>
                            <span>المنتجات</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('categories.index') }}" class="hover:text-white text-gray-200 transition-all flex items-center justify-center md:justify-start">
                            <i class="fas fa-tags ml-2"></i>
                            <span>الفئات</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact.index') }}" class="hover:text-white text-gray-200 transition-all flex items-center justify-center md:justify-start">
                            <i class="fas fa-envelope ml-2"></i>
                            <span>اتصل بنا</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Customer Service -->
            <div class="text-center md:text-right">
                <h3 class="text-xl font-bold mb-4 border-b border-amber-500 pb-2 inline-block">خدمة العملاء</h3>
                <ul class="space-y-3">
                    <li>
                        <a href="#" class="hover:text-white text-gray-200 transition-all flex items-center justify-center md:justify-start">
                            <i class="fas fa-file-contract ml-2"></i>
                            <span>الشروط والأحكام</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="hover:text-white text-gray-200 transition-all flex items-center justify-center md:justify-start">
                            <i class="fas fa-exchange-alt ml-2"></i>
                            <span>سياسة الإرجاع</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="hover:text-white text-gray-200 transition-all flex items-center justify-center md:justify-start">
                            <i class="fas fa-truck ml-2"></i>
                            <span>معلومات الشحن</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="hover:text-white text-gray-200 transition-all flex items-center justify-center md:justify-start">
                            <i class="fas fa-question-circle ml-2"></i>
                            <span>الأسئلة الشائعة</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="text-center md:text-right">
                <h3 class="text-xl font-bold mb-4 border-b border-amber-500 pb-2 inline-block">تواصل معنا</h3>
                <div class="space-y-3">
                    <div class="flex items-center justify-center md:justify-start">
                        <i class="fas fa-map-marker-alt text-amber-300 ml-3"></i>
                        <span>عمان المملكة الاردنية الهاشمية</span>
                    </div>
                    <div class="flex items-center justify-center md:justify-start">
                        <i class="fas fa-envelope text-amber-300 ml-3"></i>
                        <span>info@baksa.com</span>
                    </div>
                    <div class="flex items-center justify-center md:justify-start">
                        <i class="fas fa-phone text-amber-300 ml-3"></i>
                        <span dir="ltr">+962 789 493 842</span>
                    </div>
                    <div class="flex items-center justify-center md:justify-start">
                        <i class="fas fa-clock text-amber-300 ml-3"></i>
                        <span>السبت - الخميس: 9:00 ص - 10:00 م</span>
                    </div>
                </div>
                
                <!-- Newsletter -->
                <div class="mt-6">
                    <h4 class="text-lg font-bold mb-2">اشترك في نشرتنا</h4>
                    <form class="flex flex-col sm:flex-row gap-2">
                        <input 
                            type="email" 
                            placeholder="البريد الإلكتروني" 
                            class="bg-white bg-opacity-20 border border-amber-400 rounded-md px-4 py-2 text-white placeholder-gray-200 focus:outline-none focus:ring-2 focus:ring-amber-300"
                            required
                        >
                        <button type="submit" class="bg-white text-amber-600 hover:bg-amber-100 px-4 py-2 rounded-md font-bold transition-colors">
                            اشتراك
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="border-t border-amber-500 mt-8 pt-6 text-center text-white flex flex-col md:flex-row justify-between items-center">
            <p>© {{ date('Y') }} بكسة. جميع الحقوق محفوظة</p>
            <div class="mt-4 md:mt-0">
                <img src="{{ asset('images/payment-methods.png') }}" alt="طرق الدفع" class="h-8">
            </div>
        </div>
    </div>
    
    <!-- Back to Top Button -->
    <button 
        id="backToTop" 
        class="fixed bottom-4 left-4 bg-amber-600 text-white p-3 rounded-full shadow-lg opacity-0 transition-opacity duration-300 hover:bg-amber-700 focus:outline-none"
        aria-label="العودة للأعلى"
    >
        <i class="fas fa-arrow-up"></i>
    </button>
    
    <script>
        // Back to top button functionality
        document.addEventListener('DOMContentLoaded', function() {
            const backToTopButton = document.getElementById('backToTop');
            
            window.addEventListener('scroll', function() {
                if (window.pageYOffset > 300) {
                    backToTopButton.classList.add('opacity-100');
                    backToTopButton.classList.remove('opacity-0');
                } else {
                    backToTopButton.classList.add('opacity-0');
                    backToTopButton.classList.remove('opacity-100');
                }
            });
            
            backToTopButton.addEventListener('click', function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });
    </script>
</footer>