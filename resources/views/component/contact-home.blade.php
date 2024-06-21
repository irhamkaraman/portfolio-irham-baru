<article class="contact" data-page="contact">
    <header>
        <h2 class="h2 article-title">Kontak</h2>
    </header>

    <section class="mapbox" data-mapbox>
        <figure>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4267.531801332063!2d113.91809934246139!3d-7.041056870408517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd9e35b4d3f421d%3A0xa7c4fe3d83ae8334!2sJl.%20Raya%20Kalianget%2C%20Kabupaten%20Sumenep%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1718518560239!5m2!1sid!2sid" width="600" height="300" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </figure>
    </section>

    <section class="contact-form">
        <h3 class="h3 form-title">Contact Form</h3>

        <form action="{{ route('contact.store') }}" class="form" data-form method="post">
            @csrf

            <div class="input-wrapper">
                <input type="text" name="name" class="form-input" placeholder="Full name" required data-form-input />

                <input type="email" name="email" class="form-input" placeholder="Email address" required data-form-input />
            </div>

            <textarea name="message" class="form-input" placeholder="Your Message" required data-form-input></textarea>

            <button class="form-btn" type="submit" disabled data-form-btn>
                <ion-icon name="paper-plane"></ion-icon>
                <span>Send Message</span>
            </button>
        </form>
    </section>
</article>
