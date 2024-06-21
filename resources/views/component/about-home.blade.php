<article class="about active" data-page="tentang">
    <header>
        <h2 class="h2 article-title">Tentang Saya</h2>
    </header>

    <section class="about-text">
        {!! $user->about !!}
    </section>

    <section class="service">
        <h3 class="h3 service-title">Keahlian</h3>

        <ul class="service-list">
            @foreach ( $services as $service )
            <li class="service-item">
                <div class="service-icon-box">
                    <img src="{{ asset('storage/services/'.$service->icon) }}" alt="design icon" width="40" />
                </div>

                <div class="service-content-box">
                    <h4 class="h4 service-item-title">{{ $service->title }}</h4>

                    <p class="service-item-text">
                        {{ $service->description }}
                    </p>
                </div>
            </li>
            @endforeach

        </ul>
    </section>

    <section class="testimonials">
        <h3 class="h3 testimonials-title">Tim Penjarah Kos</h3>

        <ul class="testimonials-list has-scrollbar">

            @foreach ( $teams as $team )
            <li class="testimonials-item">
                <div class="content-card" data-testimonials-item>
                    <figure class="testimonials-avatar-box">
                        <img src="{{ asset('storage/teams/' . $team->avatar) }}" alt="{{ $team->name }}" width="60" style="object-fit: cover; border-radius: 20%;" data-testimonials-avatar />
                    </figure>

                    <h4 class="h4 testimonials-item-title" data-testimonials-title>
                        {{ $team->name }}
                    </h4>

                    <div class="testimonials-text" data-testimonials-text>
                        <p>
                            {{ $team->description }}
                        </p>
                    </div>
                </div>
            </li>
            @endforeach

        </ul>
    </section>

    <div class="modal-container" data-modal-container>
        <div class="overlay" data-overlay></div>

        <section class="testimonials-modal">
            <button class="modal-close-btn" data-modal-close-btn>
                <ion-icon name="close-outline"></ion-icon>
            </button>

            <div class="modal-img-wrapper">
                <figure class="modal-avatar-box">
                    <img src="" alt="Lazuardi Irham Karaman" width="80" style="object-fit: cover; border-radius: 20%;" data-modal-img />
                </figure>

                <img src="{{ asset('assets/images/icon-quote.svg') }}" alt="quote icon" />
            </div>

            <div class="modal-content">
                <h4 class="h3 modal-title" data-modal-title>
                    Lazuardi Irham Karaman
                </h4>

                <time datetime="2021-06-14">12 Juni 2024</time>

                <div data-modal-text>
                    <p>
                        Saya seorang creator yang sangat aktif di dunia IT. Saya
                        mempunyai pengalaman yang bagus dalam membuat sebuah
                        aplikasi web.
                    </p>
                </div>
            </div>
        </section>
    </div>

    <!--
          - clients
        -->

    <section class="clients">
        <h3 class="h3 clients-title">Teknologi Yang Digunakan</h3>

        <ul class="clients-list has-scrollbar">
            @foreach ( $technologies as $technology )
            <li class="clients-item">
                <a href="{{ $technology->url }}" target="_blank">
                    <img src="{{ asset('storage/technologies/'.$technology->image) }}" alt="client logo" />
                </a>
            </li>
            @endforeach


        </ul>
    </section>
</article>
