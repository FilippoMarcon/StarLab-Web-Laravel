<footer class="border-t pt-16 pb-8 relative overflow-hidden transition-colors duration-300 dark:bg-zinc-900 bg-white dark:border-zinc-800 border-slate-200">
  <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-yellow-400/10 rounded-full blur-[120px] -translate-y-1/2 translate-x-1/2 pointer-events-none"></div>
  <div class="max-w-7xl mx-auto px-6 relative z-10">
    <div class="grid md:grid-cols-4 gap-12 mb-12">
      <div class="space-y-4">
        <h3 class="text-2xl font-bold cursor-pointer transition-colors dark:text-white text-slate-900" onclick="window.location='{{ route('home') }}'">StarLab</h3>
        <p class="text-sm leading-relaxed dark:text-zinc-400 text-slate-600">Soluzioni digitali innovative per la tua crescita online. Design, Sviluppo e Strategia.</p>
        <div class="pt-2 flex flex-col gap-1.5 items-start">
          <a href="{{ route('pricing') }}" class="text-sm font-bold transition-colors cursor-pointer text-left dark:text-blue-400 text-blue-600 hover:text-blue-500">Vedi Listino Prezzi &rarr;</a>
          <span class="text-sm font-bold transition-colors cursor-pointer text-left flex items-center gap-1.5 dark:text-yellow-400 text-yellow-600 hover:text-yellow-500" onclick="document.getElementById('ai-chat-toggle')?.click()">Parla con Nova AI &#x1F916;</span>
        </div>
        <div class="flex gap-4">
        </div>
      </div>

      <div>
        <h4 class="font-bold mb-6 dark:text-white text-slate-900">StarWeb</h4>
        <ul class="space-y-3 text-sm dark:text-zinc-400 text-slate-600">
          <li><a href="{{ route('service.detail', 'web-development') }}" class="hover:text-blue-400 transition-colors text-left w-full hover:translate-x-1 duration-200 cursor-pointer dark:hover:text-blue-400 hover:text-blue-600">Web Development</a></li>
          <li><a href="{{ route('service.detail', 'frontend') }}" class="hover:text-blue-400 transition-colors text-left w-full hover:translate-x-1 duration-200 cursor-pointer dark:hover:text-blue-400 hover:text-blue-600">Frontend Development</a></li>
          <li><a href="{{ route('service.detail', 'seo') }}" class="hover:text-blue-400 transition-colors text-left w-full hover:translate-x-1 duration-200 cursor-pointer dark:hover:text-blue-400 hover:text-blue-600">SEO & Performance</a></li>
        </ul>
      </div>

      <div>
        <h4 class="font-bold mb-6 dark:text-white text-slate-900">StarGraphics</h4>
        <ul class="space-y-3 text-sm dark:text-zinc-400 text-slate-600">
          <li><a href="{{ route('service.detail', 'branding') }}" class="hover:text-pink-400 transition-colors text-left w-full hover:translate-x-1 duration-200 cursor-pointer dark:hover:text-pink-400 hover:text-pink-600">Branding</a></li>
          <li><a href="{{ route('service.detail', 'ui-ux') }}" class="hover:text-pink-400 transition-colors text-left w-full hover:translate-x-1 duration-200 cursor-pointer dark:hover:text-pink-400 hover:text-pink-600">UI/UX Design</a></li>
          <li><a href="{{ route('service.detail', 'graphic-design') }}" class="hover:text-pink-400 transition-colors text-left w-full hover:translate-x-1 duration-200 cursor-pointer dark:hover:text-pink-400 hover:text-pink-600">Graphic Design</a></li>
          <li><a href="{{ route('service.detail', '3d-modeling') }}" class="hover:text-pink-400 transition-colors text-left w-full hover:translate-x-1 duration-200 cursor-pointer dark:hover:text-pink-400 hover:text-pink-600">3D Modeling</a></li>
        </ul>
      </div>

      <div>
        <h4 class="font-bold mb-6 dark:text-white text-slate-900">Contatti</h4>
        <ul class="space-y-3 text-sm dark:text-zinc-400 text-slate-600">
          <li>
            <a href="https://dsc.gg/starlabdesign" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2 transition-colors group dark:hover:text-white hover:text-slate-900">
              <svg class="w-4 h-4 dark:text-blue-400 text-blue-500 group-hover:text-blue-600" fill="currentColor" viewBox="0 0 24 24"><path d="M20.317 4.3698a19.7913 19.7913 0 00-4.8851-1.5152.0741.0741 0 00-.0785.0371c-.211.3753-.4447.8648-.6083 1.2495-1.8447-.2762-3.68-.2762-5.4868 0-.1636-.3933-.4058-.8742-.6177-1.2495a.077.077 0 00-.0785-.037 19.7363 19.7363 0 00-4.8852 1.515.0699.0699 0 00-.0321.0277C.5334 9.0458-.319 13.5799.0992 18.0578a.0824.0824 0 00.0312.0561c2.0528 1.5076 4.0413 2.4228 5.9929 3.0294a.0777.0777 0 00.0842-.0276c.4616-.6304.8731-1.2952 1.226-1.9942a.076.076 0 00-.0416-.1057c-.6528-.2476-1.2743-.5495-1.8722-.8923a.077.077 0 01-.0076-.1277c.1258-.0943.2517-.1923.3718-.2914a.0743.0743 0 01.0776-.0105c3.9278 1.7933 8.18 1.7933 12.0614 0a.0739.0739 0 01.0785.0095c.1202.099.246.1981.3728.2924a.077.077 0 01-.0066.1276 12.2986 12.2986 0 01-1.873.8914.0766.0766 0 00-.0407.1067c.3604.698.7719 1.3628 1.225 1.9932a.076.076 0 00.0842.0286c1.961-.6067 3.9495-1.5219 6.0023-3.0294a.077.077 0 00.0313-.0552c.5004-5.177-.8382-9.6739-3.5485-13.6604a.061.061 0 00-.0312-.0286zM8.02 15.3312c-1.1825 0-2.1569-1.0857-2.1569-2.419 0-1.3332.9555-2.4189 2.157-2.4189 1.2108 0 2.1757 1.0952 2.1568 2.419 0 1.3332-.9555 2.4189-2.1569 2.4189zm7.9748 0c-1.1825 0-2.1569-1.0857-2.1569-2.419 0-1.3332.9554-2.4189 2.1569-2.4189 1.2108 0 2.1757 1.0952 2.1568 2.419 0 1.3332-.946 2.4189-2.1568 2.4189z"/></svg>
              dsc.gg/starlabdesign
            </a>
          </li>
          <li>
            <a href="mailto:starlabdesignstore@gmail.com" class="flex items-center gap-2 transition-colors group dark:hover:text-white hover:text-slate-900">
              <svg class="w-4 h-4 dark:text-blue-400 text-blue-500 group-hover:text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
              starlabdesignstore@gmail.com
            </a>
          </li>
        </ul>
      </div>
    </div>

    <div class="border-t pt-8 flex flex-col md:flex-row justify-between items-center text-xs transition-colors duration-300 dark:border-zinc-800 dark:text-zinc-500 border-slate-200 text-slate-500">
      <p>&copy; 2026 StarLab. Tutti i diritti riservati.</p>
      <div class="flex items-center gap-4 mt-2 md:mt-0">
        <a href="{{ route('terms') }}" class="text-xs hover:text-amber-400 transition-colors">Termini e Condizioni</a>
        <span class="text-slate-600">|</span>
        <span>Made with <span class="text-red-500 animate-pulse">&hearts;</span> by <a href="{{ route('starweb') }}" class="transition-colors font-semibold cursor-pointer dark:text-blue-400 dark:hover:text-blue-300 text-blue-600 hover:text-blue-500">StarWeb Team</a></span>
      </div>
    </div>
  </div>
</footer>
