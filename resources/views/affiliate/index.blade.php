<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Pink Cheeks Affiliate Program</title>
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/imgs/theme/favicon.png') }}" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#fff0f5] text-gray-800 font-sans">
<?php $setting = App\Models\SiteSetting::find(1);?>

  <!-- Header -->
  <header class="bg-white shadow px-6 flex justify-between items-center">
    <div class="flex items-center space-x-3">
      <img src="{{ asset($setting->logo) }}" alt="Pink Cheeks Logo" class="h-20 rounded-full object-cover">
      {{-- <span class="text-2xl font-bold text-[#f74b81]">Pink Cheeks</span> --}}
    </div>
    <div class="">
        Already have account ? <a href="{{url('affiliate/login')}}" class="text-[#f74b81] hover:underline font-medium">Login</a>
    </div>
  </header>

  <!-- Hero -->
  <section class="relative">
    <img src="{{ asset('frontend/assets/imgs/affiliate/affiliate.jpg') }}" alt="" class="w-full h-96 object-cover">
    <div class="absolute inset-0 bg-[#f74b81]/30 flex flex-col items-center justify-center text-white text-center px-4">
      {{-- <h1 class="text-4xl font-bold mb-4 drop-shadow-md">Recommend Beauty Products. Earn Rewards.</h1> --}}
      {{-- <p class="text-lg mb-6 drop-shadow-sm">Join the Pink Cheeks Affiliate Program and start earning for every sale you inspire.</p> --}}
      <div class="space-x-4">
        <a href="{{url('affiliate/registration')}}" class="bg-white text-[#f74b81] px-6 py-2 rounded-full font-semibold hover:bg-[#98dffe] hover:text-white transition">SIGN UP</a>
      </div>
    </div>
  </section>

  <!-- How It Works -->
  <section class="bg-[#fff0f5] py-20 px-4">
    <div class="max-w-6xl mx-auto grid md:grid-cols-3 gap-12 text-center">
      <div>
        <div class="text-[#f74b81] text-5xl font-bold mb-4">1</div>
        <h3 class="text-xl font-semibold mb-2">Sign Up</h3>
        <p class="text-gray-600">Join beauty lovers and influencers earning with Pink Cheeks.</p>
      </div>
      <div>
        <div class="text-[#f74b81] text-5xl font-bold mb-4">2</div>
        <h3 class="text-xl font-semibold mb-2">Share</h3>
        <p class="text-gray-600">Promote your favorite products with personalized links.</p>
      </div>
      <div>
        <div class="text-[#f74b81] text-5xl font-bold mb-4">3</div>
        <h3 class="text-xl font-semibold mb-2">Earn</h3>
        <p class="text-gray-600">Earn up to 10% commission on every qualifying purchase.</p>
      </div>
    </div>
  </section>

  <!-- Testimonials -->
  <section class="bg-white py-20 px-4">
    <div class="max-w-3xl mx-auto text-center">
      <h2 class="text-2xl font-bold mb-8 text-[#f74b81]">What Our Influencers Say</h2>
      <div class="space-y-6 text-gray-600 italic">
        <p>"Pink Cheeks helped me turn my passion for beauty into real income!"</p>
        <p>"It’s so easy to recommend the products I already use and love. And the rewards are sweet!"</p>
      </div>
    </div>
  </section>

  <!-- FAQ -->
  <section class="bg-[#fff0f5] py-20 px-4">
    <div class="max-w-4xl mx-auto">
      <h2 class="text-2xl font-bold mb-8 text-center text-[#f74b81]">Frequently Asked Questions</h2>
      <div class="space-y-6 text-gray-700">
        <div>
          <h3 class="font-semibold">How does the Affiliate Program work?</h3>
          <p>Share Pink Cheeks products using custom links and earn a commission when people buy through them.</p>
        </div>
        <div>
          <h3 class="font-semibold">Who can join?</h3>
          <p>Beauty bloggers, influencers, or anyone with a community passionate about skincare and self-care.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-white py-6 text-center text-sm text-gray-500">
    <p>&copy; {{date('Y')}} Pink Cheeks. All rights reserved.</p>
    <div class="mt-2 space-x-4">
      <a href="#" class="hover:underline">Terms</a>
      <a href="#" class="hover:underline">Privacy</a>
      <a href="#" class="hover:underline">Contact</a>
    </div>
  </footer>
</body>
</html>
