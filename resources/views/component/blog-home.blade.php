<style>
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        backdrop-filter: blur(5px);
        transition: opacity 0.3s ease;
        z-index: 1000;
    }

    .modal-dialog {
        position: relative;
        margin: 5% auto;
        width: 80%;
        max-width: 500px;
        background-color: #fff;
        border-radius: 8px;
        overflow: hidden;
    }

    .modal-header,
    .modal-footer {
        padding: 1rem;
        border-bottom: 1px solid #dee2e6;
    }

    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .modal-title {
        margin: 0;
    }

    .modal-body {
        padding: 1rem;
    }

    .modal-footer {
        border-top: 1px solid #dee2e6;
        display: flex;
        justify-content: flex-end;
    }

    .btn-close {
        cursor: pointer;
        background-color: transparent;
        border: none;
        font-size: 1.5rem;
    }

    .btn {
        padding: 0.5rem 1rem;
        border: none;
        cursor: pointer;
        border-radius: 4px;
    }

    .btn-secondary {
        background-color: #6c757d;
        color: white;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
    }
</style>

<article class="blog" data-page="blog">
    <header>
        <h2 class="h2 article-title">Blog</h2>
    </header>

    <section class="blog-posts">
        <ul class="blog-posts-list">
            @foreach ($blogs as $blog)
            <li class="blog-post-item">
                <a href="#" class="blog-link" data-modal-id="blogModal{{ $blog->id }}">
                    <figure class="blog-banner-box">
                        <img src="{{ asset('storage/blogs/' . $blog->image) }}" alt="{{ $blog->title }}" loading="lazy" />
                    </figure>

                    <div class="blog-content">
                        <div class="blog-meta">
                            <p class="blog-category">Admin</p>

                            <span class="dot"></span>

                            <time datetime="{{ $blog->published_at }}">{{ date('l, F Y', strtotime($blog->published_at)) }}</time>
                        </div>

                        <h3 class="h3 blog-item-title">
                            {{ $blog->title }}
                        </h3>

                        <p class="blog-text">
                            {{ Str::words($blog->description, 10, ' ...') }}
                        </p>
                    </div>
                </a>

                <!-- Modal -->
                <div id="blogModal{{ $blog->id }}" class="modal">
                    <div class="modal-dialog">
                        <div class="modal-header">
                            <h5 class="modal-title">{{ $blog->title }}</h5>
                            <button type="button" class="btn-close" data-modal-id="blogModal{{ $blog->id }}">&times;</button>
                        </div>

                        <div class="modal-body">
                            <p style="margin-bottom: 10px;">{{ $blog->description }}</p>
                            <hr style="margin: 10px 0;">
                            {!! $blog->content !!}
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-modal-id="blogModal{{ $blog->id }}">Close</button>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </section>
</article>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const links = document.querySelectorAll('.blog-link');
        const closeButtons = document.querySelectorAll('.btn-close, .btn-secondary');

        links.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const modalId = link.getAttribute('data-modal-id');
                const modal = document.getElementById(modalId);
                modal.style.display = 'block';
            });
        });

        closeButtons.forEach(button => {
            button.addEventListener('click', function() {
                const modalId = button.getAttribute('data-modal-id');
                const modal = document.getElementById(modalId);
                modal.style.display = 'none';
            });
        });

        window.addEventListener('click', function(e) {
            const modals = document.querySelectorAll('.modal');
            modals.forEach(modal => {
                if (e.target == modal) {
                    modal.style.display = 'none';
                }
            });
        });
    });
</script>
