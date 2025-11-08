<!-- Vendor JS Files -->
<script src="{{ asset('admin') }}/vendor/libs/jquery/jquery.js"></script>
<script src="{{ asset('front') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('front') }}/vendor/php-email-form/validate.js"></script>
<script src="{{ asset('front') }}/vendor/aos/aos.js"></script>
<script src="{{ asset('front') }}/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="{{ asset('front') }}/vendor/typed.js/typed.umd.js"></script>
<script src="{{ asset('front') }}/vendor/waypoints/noframework.waypoints.js"></script>
<script src="{{ asset('front') }}/vendor/glightbox/js/glightbox.min.js"></script>
<script src="{{ asset('front') }}/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="{{ asset('front') }}/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="{{ asset('front') }}/vendor/swiper/swiper-bundle.min.js"></script>

<!-- Main JS File -->
<script src="{{ asset('front') }}/js/main.js"></script>
@stack('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Check if cookies have been accepted
        if (!localStorage.getItem('cookiesAccepted')) {
            // Show cookie consent bar
            document.getElementById('cookieConsentBar').style.display = 'block';

            // When "Accept" button is clicked
            document.getElementById('acceptCookies').onclick = function() {
                localStorage.setItem('cookiesAccepted', 'true');
                document.getElementById('cookieConsentBar').style.display = 'none';
            };

            // When "Reject" button is clicked
            document.getElementById('rejectCookies').onclick = function() {
                localStorage.setItem('cookiesAccepted', 'false');
                document.getElementById('cookieConsentBar').style.display = 'none';
            };
        }
    });
</script>

{{-- animasi pets --}}
<script>
    $(document).ready(function() {
        const petsEnabled = @json($generalsettings->pets_enabled);

        if (!petsEnabled) {
            $('.walking-pet').hide();
            return; // jika pets dimatikan, hentikan script
        }

        $('.walking-pet').show(); // tampilkan semua pets

        const pets = [{
                id: 'cat',
                speedRange: [5000, 10000],
                pauseRange: [2000, 5000]
            },
            {
                id: 'dog',
                speedRange: [4000, 8000],
                pauseRange: [1500, 4000]
            },
            {
                id: 'fox',
                speedRange: [3000, 7000],
                pauseRange: [1000, 3000]
            },
            {
                id: 'turtle',
                speedRange: [15000, 30000],
                pauseRange: [3000, 8000]
            },
            {
                id: 'snail',
                speedRange: [20000, 40000],
                pauseRange: [5000, 10000]
            },
            {
                id: 'pig',
                speedRange: [4000, 7000],
                pauseRange: [4000, 8000]
            },
            {
                id: 'chicken',
                speedRange: [5000, 10000],
                pauseRange: [2000, 5000]
            },
            {
                id: 'mario',
                speedRange: [8000, 10000],
                pauseRange: [4000, 8000]
            },
        ];

        function getRandomInt(min, max) {
            return Math.floor(Math.random() * (max - min + 1)) + min;
        }

        function movePet(petObj) {
            const pet = $('#' + petObj.id);
            const petWidth = pet.width();
            const windowWidth = window.innerWidth;

            // Tentukan posisi dan arah awal acak
            let currentDirection = Math.random() < 0.5 ? -1 : 1; // kiri (-1) atau kanan (1)
            let startX = currentDirection === 1 ?
                getRandomInt(0, windowWidth / 2) :
                getRandomInt(windowWidth / 2, windowWidth - petWidth);

            // Set posisi awal
            pet.css({
                left: startX + 'px',
                bottom: getRandomInt(0, 0) + 'px',
                transform: `scaleX(${currentDirection})`
            });

            // Fungsi gerak
            function move() {
                const randomDistance = getRandomInt(windowWidth / 4, windowWidth / 2);
                const randomSpeed = getRandomInt(petObj.speedRange[0], petObj.speedRange[1]);

                // Tentukan arah baru (kadang tetap, kadang berubah)
                if (Math.random() > 0.6) currentDirection *= -1;

                // Batasan agar tidak keluar layar
                let newX = startX + (randomDistance * currentDirection);
                if (newX > windowWidth - petWidth) newX = windowWidth - petWidth;
                if (newX < 0) newX = 0;

                // Flip arah visual
                pet.css('transform', `scaleX(${currentDirection})`);

                // Jalankan animasi
                pet.animate({
                    left: newX + 'px'
                }, randomSpeed, 'linear', function() {
                    startX = newX;
                    const randomPause = getRandomInt(petObj.pauseRange[0], petObj.pauseRange[1]);
                    setTimeout(move, randomPause);
                });
            }

            move(); // mulai animasi
        }

        // Jalankan semua pets
        pets.forEach(petObj => movePet(petObj));
    });
</script>
