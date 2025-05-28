

<?php $__env->startSection('content'); ?>


<div class="bg-emerald-700 text-white text-center py-20 rounded-lg shadow-lg mb-8 relative overflow-hidden">
    <h1 class="text-4xl font-bold mb-4">أهلاً بك في بكسة</h1>
    <p class="text-lg text-emerald-100 max-w-2xl mx-auto">أفضل مكان لشراء كل مستلزمات مطعمك بالجملة بأسعار منافسة!</p>
    <a href="<?php echo e(route('shop.index')); ?>" class="mt-6 inline-block bg-amber-500 hover:bg-amber-600 text-white px-8 py-3 rounded-lg shadow-lg transition duration-300">تسوق الآن</a>
</div>

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

    
  

  
<div class="bg-white shadow-lg rounded-lg p-6 mb-8">
    <h2 class="text-2xl font-bold text-amber-700 mb-6">ابحث عن منتجاتك</h2>
    <form action="<?php echo e(route('products.search')); ?>" method="GET" class="flex flex-col md:flex-row md:items-center gap-4">
        <input 
            type="text" 
            name="query" 
            placeholder="ابحث عن المنتجات..." 
            class="flex-grow px-5 py-3 text-base rounded-lg border-2 border-gray-200 focus:border-emerald-500 focus:ring focus:ring-emerald-200"
        >

        <button 
            type="submit" 
            class="bg-amber-600 hover:bg-amber-700 text-white px-5 py-2.5 text-sm md:text-base rounded-lg transition duration-300"
        >
            بحث
        </button>
    </form>
</div>



    
    <div class="p-0 bg-white shadow-lg sm:rounded-lg overflow-hidden transform transition-all hover:shadow-xl">
        <div class="bg-gradient-to-l from-blue-800 to-blue-700 text-white py-4 px-6 border-r-4 border-cyan-400">
            <h3 class="text-lg font-bold flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd" />
                </svg>
                منتجاتنا
            </h3>
            <p class="text-blue-100 text-sm mt-1">أفضل المنتجات بأسعار الجملة للمطاعم</p>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="bg-white rounded-lg p-4 shadow-md border border-gray-100 hover:shadow-lg transition-all duration-300 flex flex-col">
                        <img src="<?php echo e($product->image ? asset('storage/' . $product->image) : asset('images/default-product.png')); ?>" alt="<?php echo e($product->name); ?>" class="w-full h-48 object-cover rounded-lg">
                        <h3 class="text-xl font-bold mt-3 text-emerald-800"><?php echo e($product->name); ?></h3>
                        <p class="text-sm text-gray-600 mt-1"><?php echo e(Str::limit($product->description, 80)); ?></p>
                        <p class="text-lg font-semibold text-emerald-600 mt-2"><?php echo e(number_format($product->price)); ?> د.أ</p>
                        <div class="flex justify-between items-center mt-4 gap-2">
                            <form method="POST" action="<?php echo e(route('cart.add', $product->id)); ?>" class="w-full">
                                <?php echo csrf_field(); ?>
                                <button class="w-full bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-lg flex items-center justify-center transition duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3z" />
                                    </svg>
                                    أطلب الآن
                                </button>
                            </form>
                            <button onclick="openProductModal('<?php echo e($product->id); ?>')" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center transition duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                </svg>
                                التفاصيل
                            </button>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

</div>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.3/dist/css/splide.min.css">
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.3/dist/js/splide.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        if(document.getElementById('splide')) {
            new Splide('#splide', {
                type   : 'loop',
                perPage: 2,
                autoplay: true,
                gap: '1rem',
                breakpoints: {
                    768: { perPage: 1 },
                    1024: { perPage: 1 }
                }
            }).mount();
        }
    });

    function openProductModal(id) {
        fetch(`/api/products/${id}`)
            .then(res => res.json())
            .then(data => {
                document.getElementById('modal-title').innerText = data.name;
                document.getElementById('modal-description').innerText = data.description;
                document.getElementById('modal-price').innerText = number_format(data.price) + ' د.أ';
                document.getElementById('modal-image').src = data.image ?? '/images/default-product.png';
                document.getElementById('modal-form').action = `/cart/add/${data.id}`;
                document.getElementById('product-modal').classList.remove('hidden');
            });
    }

    function closeModal() {
        document.getElementById('product-modal').classList.add('hidden');
    }

    function number_format(number) {
        return new Intl.NumberFormat().format(number);
    }
</script>
<!-- Product Details Modal -->
<div id="product-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-xl shadow-2xl max-w-md w-full p-6 relative">
        <button onclick="closeModal()" class="absolute top-4 left-4 text-gray-500 hover:text-red-500 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <img id="modal-image" src="/images/default-product.png" alt="صورة المنتج" class="w-full h-48 object-cover rounded-lg mb-4 shadow">
        <h3 id="modal-title" class="text-2xl font-bold text-emerald-700 mb-2 text-right"></h3>
        <p id="modal-description" class="text-gray-700 mb-4 text-right"></p>
        <p class="text-lg font-semibold text-emerald-600 mb-6 text-right" id="modal-price"></p>
        <form id="modal-form" method="POST" action="">
            <?php echo csrf_field(); ?>
            <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-3 rounded-lg transition font-semibold flex items-center justify-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3z" />
                </svg>
                أضف إلى السلة
            </button>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\alhen\buksa-wholesale\resources\views/home.blade.php ENDPATH**/ ?>