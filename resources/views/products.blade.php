<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dummy Products</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 50;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            justify-content: center;
            align-items: center;
        }

        .modal img {
            max-height: 90vh;
        }
    </style>
</head>
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 max-w-6xl mx-auto">
    @foreach ($products as $product)
        <div class="bg-white rounded-lg shadow hover:shadow-md transition duration-300">
            <img 
                src="{{ asset($product->image) }}" 
                alt="{{ $product->name }}"
                class="w-full h-40 object-cover rounded-t"
            >
            <div class="p-4">
                <h2 class="text-lg font-semibold mb-1">{{ $product->name }}</h2>
                <p class="text-sm text-gray-600 mb-2">{{ $product->description }}</p>
                <p class="text-base text-blue-600 font-bold mb-3">₹{{ number_format($product->price) }}</p>
                <a href="#" class="text-sm text-indigo-600 hover:underline">View Details</a>
            </div>
        </div>
    @endforeach
</div>

   

    <script>
        function openModal(imgId) {
            const imgSrc = document.getElementById(imgId).src;
            document.getElementById('modalImage').src = imgSrc;
            document.getElementById('imgModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('imgModal').style.display = 'none';
        }
    </script>
</body>

    <script>
        function openModal(imgId) {
            const imgSrc = document.getElementById(imgId).src;
            document.getElementById('modalImage').src = imgSrc;
            document.getElementById('imgModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('imgModal').style.display = 'none';
        }
    </script>
</body>
</html>
