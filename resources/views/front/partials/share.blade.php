<div class="share-post mt-5">
    {{-- <h5>Bagikan Artikel Ini:</h5> --}}
    <div class="d-flex gap-2 flex-wrap">
        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url($data->judul)) }}"
            class="btn btn-sm btn-primary" target="_blank" rel="noopener">
            <i class="bi bi-facebook"></i> Facebook
        </a>

        <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($data->judul) }}"
            class="btn btn-sm btn-info" target="_blank" rel="noopener">
            <i class="bi bi-twitter-x"></i> Twitter
        </a>

        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}&title={{ urlencode($data->judul) }}"
            class="btn btn-sm btn-secondary" target="_blank" rel="noopener">
            <i class="bi bi-linkedin"></i> LinkedIn
        </a>

        <a href="https://api.whatsapp.com/send?text={{ urlencode($data->judul . ' ' . url()->current()) }}"
            class="btn btn-sm btn-success" target="_blank" rel="noopener">
            <i class="bi bi-whatsapp"></i> WhatsApp
        </a>

        <button type="button" class="btn btn-sm btn-dark copy-link-btn">
            <i class="bi bi-link-45deg"></i> Salin Link
        </button>
    </div>

    <small class="text-muted d-block mt-2" id="copyMessage" style="display:none;">
                                                        ✅ Link disalin ke clipboard!
                                                    </small>
</div>

@push('scripts')
    <script>
        document.querySelector('.copy-link-btn').addEventListener('click', function() {
            navigator.clipboard.writeText(window.location.href);
            const msg = document.getElementById('copyMessage');
            msg.style.display = 'block';
            msg.style.opacity = 1;

            // Animasi memudar
            setTimeout(() => {
                msg.style.transition = 'opacity 1s';
                msg.style.opacity = 0;
                setTimeout(() => msg.style.display = 'none', 1000);
            }, 1500);
        });
    </script>
@endpush
