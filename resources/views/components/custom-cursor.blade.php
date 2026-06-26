<div id="cursor-ring" class="fixed pointer-events-none z-[9999] hidden lg:block" style="width:32px;height:32px;border-radius:50%;border:2px solid #4f46e5;transition:transform 0.15s ease, width 0.3s, height 0.3s, border-color 0.3s, background 0.3s;transform:translate(-50%,-50%) scale(1);left:0;top:0;"></div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var ring = document.getElementById('cursor-ring');
        if (!ring || 'ontouchstart' in window || navigator.maxTouchPoints > 0) {
            if (ring) ring.style.display = 'none';
            return;
        }

        var mouseX = -100, mouseY = -100;
        var ringX = -100, ringY = -100;
        var isHovering = false;

        function updateRing() {
            ringX += (mouseX - ringX) * 0.15;
            ringY += (mouseY - ringY) * 0.15;
            ring.style.left = ringX + 'px';
            ring.style.top = ringY + 'px';
            requestAnimationFrame(updateRing);
        }

        document.addEventListener('mousemove', function (e) {
            mouseX = e.clientX;
            mouseY = e.clientY;
        });

        document.querySelectorAll('a, button, input, textarea, select, [role="button"], [onclick]').forEach(function (el) {
            el.addEventListener('mouseenter', function () {
                isHovering = true;
                ring.style.width = '48px';
                ring.style.height = '48px';
                ring.style.borderColor = '#facc15';
                ring.style.background = 'rgba(250, 204, 21, 0.1)';
                ring.style.transform = 'translate(-50%,-50%) scale(1.2)';
            });
            el.addEventListener('mouseleave', function () {
                isHovering = false;
                ring.style.width = '32px';
                ring.style.height = '32px';
                ring.style.borderColor = '#4f46e5';
                ring.style.background = 'transparent';
                ring.style.transform = 'translate(-50%,-50%) scale(1)';
            });
        });

        updateRing();
    });
</script>
