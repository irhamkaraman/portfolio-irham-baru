<aside class="sidebar" data-sidebar>
    <div class="sidebar-info">
        <figure class="avatar-box">
            <img src="{{ asset('storage/avatar/' . $user->avatar) }}" alt="Irham Karaman" width="80" style="object-fit: cover; border-radius: 20%;" />
        </figure>

        <div class="info-content">
            <h1 class="name" title="Richard hanrick">
                <p>{!! $user->name !!}</p>
            </h1>

            <p class="title">Web developer</p>
        </div>

        <button class="info_more-btn" data-sidebar-btn>
            <span>Lihat Kontak</span>

            <ion-icon name="chevron-down"></ion-icon>
        </button>
    </div>

    <div class="sidebar-info_more">
        <div class="separator"></div>

        <ul class="contacts-list">
            <li class="contact-item">
                <div class="icon-box">
                    <ion-icon name="mail-outline"></ion-icon>
                </div>

                <div class="contact-info">
                    <p class="contact-title">Email</p>

                    <a href="mailto:irhamkaraman@gmail.com" target="_blank" class="contact-link">{{ $user->email }}</a>
                </div>
            </li>

            <li class="contact-item">
                <div class="icon-box">
                    <ion-icon name="phone-portrait-outline"></ion-icon>
                </div>

                <div class="contact-info">
                    <p class="contact-title">WhatsApp</p>

                    <a href="tel:{{ $user->whatsapp }}" target="_blank" class="contact-link">{{ $user->whatsapp }}</a>
                </div>
            </li>

            <li class="contact-item">
                <div class="icon-box">
                    <ion-icon name="calendar-outline"></ion-icon>
                </div>

                <div class="contact-info">
                    <p class="contact-title">Tanggal Lahir</p>

                    <time datetime="1982-06-23">{{ $user->birthdate }}</time>
                </div>
            </li>

            <li class="contact-item">
                <div class="icon-box">
                    <ion-icon name="location-outline"></ion-icon>
                </div>

                <div class="contact-info">
                    <p class="contact-title">Alamat</p>

                    <address>{{ $user->address }}</address>
                </div>
            </li>
        </ul>

        <div class="separator"></div>

        <ul class="social-list">
            <li class="social-item">
                <a href="https://web.facebook.com/profile.php?id={{ $user->facebook }}" target="_blank" class="social-link">
                    <ion-icon name="logo-facebook"></ion-icon>
                </a>
            </li>

            <li class="social-item">
                <a href="https://wa.me/{{ $user->whatsapp }}" target="_blank" class="social-link">
                    <ion-icon name="logo-whatsapp"></ion-icon>
                </a>
            </li>
            <li class="social-item">
                <a href="https://www.instagram.com/{{ $user->instagram }}/" target="_blank" class="social-link">
                    <ion-icon name="logo-instagram"></ion-icon>
                </a>
            </li>
            <li class="social-item">
                <a href="https://github.com/{{ $user->github }}" target="_blank" class="social-link">
                    <ion-icon name="logo-github"></ion-icon>
                </a>
            </li>
            <li class="social-item">
                <a href="https://www.linkedin.com/in/{{ $user->linkedin }}" target="_blank" class="social-link">
                    <ion-icon name="logo-linkedin"></ion-icon>
                </a>
            </li>
        </ul>
    </div>
</aside>
