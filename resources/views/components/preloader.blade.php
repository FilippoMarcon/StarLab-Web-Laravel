<div id="preloader" class="fixed inset-0 z-[99999] flex flex-col items-center justify-center transition-opacity duration-700 ease-in-out">
  <div class="relative flex flex-col items-center">
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-yellow-500/20 rounded-full blur-[100px] animate-pulse"></div>
    <div class="relative w-32 h-32 mb-10">
      <div class="absolute inset-0 border border-yellow-500/30 rounded-full animate-[ping_2s_cubic-bezier(0,0,0.2,1)_infinite]"></div>
      <div class="absolute inset-[-10px] border border-yellow-500/10 rounded-full animate-[ping_2s_cubic-bezier(0,0,0.2,1)_infinite_0.5s]"></div>
      <div class="absolute inset-0 flex items-center justify-center z-10 overflow-hidden">
        <img src="{{ asset('images/StarLab-Logo.png') }}" alt="StarLab" class="w-20 h-20 object-contain drop-shadow-[0_0_20px_rgba(250,204,21,0.4)]" loading="eager" />
      </div>
    </div>
    <div class="overflow-hidden mb-6">
      <h1 class="text-3xl font-black tracking-[0.3em] uppercase">Star<span class="text-yellow-500">Lab</span></h1>
    </div>
    <div class="flex gap-2">
      <div class="w-1.5 h-1.5 bg-yellow-500 rounded-full animate-bounce" style="animation-delay:-0.3s"></div>
      <div class="w-1.5 h-1.5 bg-yellow-500 rounded-full animate-bounce" style="animation-delay:-0.15s"></div>
      <div class="w-1.5 h-1.5 bg-yellow-500 rounded-full animate-bounce"></div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  var preloader = document.getElementById('preloader');
  var isDark = localStorage.getItem('starlab-dark') === 'true';
  preloader.style.background = isDark ? '#09090b' : '#fcfbf8';
  preloader.querySelector('h1').style.color = isDark ? '#fff' : '#0f172a';
  setTimeout(function () {
    preloader.style.opacity = '0';
    setTimeout(function () { preloader.style.display = 'none'; }, 700);
  }, 1800);
});
</script>
