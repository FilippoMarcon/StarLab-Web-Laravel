<div id="scroll-progress" class="fixed top-0 left-0 right-0 h-1 bg-gradient-to-r from-yellow-400 via-indigo-500 to-pink-500 z-[100] origin-left" style="transform:scaleX(0);"></div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var bar = document.getElementById('scroll-progress');
        if (!bar) return;
        bar.style.transition = 'transform 100ms ease-out';
        function updateProgress() {
            var scrollTop = window.scrollY;
            var docHeight = document.documentElement.scrollHeight - window.innerHeight;
            var progress = docHeight > 0 ? Math.min(scrollTop / docHeight, 1) : 0;
            bar.style.transform = 'scaleX(' + progress + ')';
        }
        window.addEventListener('scroll', updateProgress, { passive: true });
        updateProgress();
    });
</script>
