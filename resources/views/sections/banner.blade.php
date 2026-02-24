<section class="relative w-full overflow-hidden">
    <div id="banner-container">
        <div id="banner-slider"
            class="flex transition-transform ease-in-out duration-[1000ms] md:gap-6 md:px-6 md:pt-6">
        </div>

        <div id="banner-dots" class="relative mt-4 flex justify-center space-x-2 z-10">
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {

        const images = [
            "/images/banner/1.png",
            "/images/banner/2.png",
            "/images/banner/3.png",
        ];

        const slides = [
            images[images.length - 1],
            ...images,
            images[0],
            images[1]
        ];

        const slider = document.getElementById("banner-slider");
        const dotsContainer = document.getElementById("banner-dots");

        let index = 1;
        let transitioning = false;
        let autoSlide;
        let loadedCount = 0;

        // Preload
        slides.forEach(src => {
            const img = new Image();
            img.src = src;
            img.onload = () => {
                loadedCount++;
                if (loadedCount === slides.length) initSlider();
            };
        });

        function initSlider() {
            renderSlides();
            renderDots();
            moveToSlide(index, false);
            startAutoSlide();
        }

        function renderSlides() {
            slides.forEach(src => {
                const img = document.createElement("img");
                img.src = src;
                img.className =
                    "flex-shrink-0 w-full md:w-[37%] object-cover md:rounded-xl max-h-[260px] md:max-h-[340px]";
                slider.appendChild(img);
            });
        }

        function renderDots() {
            images.forEach((_, i) => {
                const btn = document.createElement("button");
                btn.className = "dot size-2 rounded-full bg-blue-300";
                btn.addEventListener("click", () => {
                    index = i + 1;
                    updateDots();
                    moveToSlide(index, true);
                    startAutoSlide();
                });
                dotsContainer.appendChild(btn);
            });
            updateDots();
        }

        function updateDots() {
            [...dotsContainer.children].forEach((dot, i) => {
                dot.className = "dot size-2 rounded-full " +
                    (i + 1 === index ? "bg-blue-600" : "bg-blue-300");
            });
        }

        function getSlideWidth() {
            const slide = slider.children[0];
            const style = window.getComputedStyle(slider);
            const gap = window.innerWidth >= 768 ? parseInt(style.gap) || 0 : 0;
            return slide.offsetWidth + gap;
        }

        function moveToSlide(i, withTransition = true) {
            slider.style.transition = withTransition ?
                "transform 1s ease-in-out" :
                "none";
            slider.style.transform = `translateX(-${getSlideWidth() * i}px)`;
        }

        function nextSlide() {
            if (transitioning) return;
            transitioning = true;
            index++;
            updateDots();
            moveToSlide(index, true);
        }

        function prevSlide() {
            if (transitioning) return;
            transitioning = true;
            index--;
            updateDots();
            moveToSlide(index, true);
        }

        function startAutoSlide() {
            clearInterval(autoSlide);
            autoSlide = setInterval(nextSlide, 4000);
        }

        slider.addEventListener("transitionend", () => {
            transitioning = false;

            if (index >= slides.length - 2) {
                slider.style.transition = "none";
                index = 1;
                moveToSlide(index, false);
            }

            if (index <= 0) {
                slider.style.transition = "none";
                index = slides.length - 3;
                moveToSlide(index, false);
            }

            updateDots();
        });

        // Swipe
        let startX = 0;
        let moveX = 0;
        let isSwiping = false;

        slider.addEventListener("touchstart", e => {
            startX = e.touches[0].clientX;
            isSwiping = true;
            clearInterval(autoSlide);
        });

        slider.addEventListener("touchmove", e => {
            if (!isSwiping) return;
            moveX = e.touches[0].clientX;
        });

        slider.addEventListener("touchend", () => {
            if (!isSwiping) return;
            const diff = moveX - startX;
            if (Math.abs(diff) > 50) diff < 0 ? nextSlide() : prevSlide();
            isSwiping = false;
            startAutoSlide();
        });

        window.addEventListener("resize", () => moveToSlide(index, false));

    });
</script>