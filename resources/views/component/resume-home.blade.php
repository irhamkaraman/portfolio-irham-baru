<article class="resume" data-page="resume">
    <header>
        <h2 class="h2 article-title">Resume</h2>
    </header>

    <section class="timeline">
        <div class="title-wrapper">
            <div class="icon-box">
                <ion-icon name="book-outline"></ion-icon>
            </div>

            <h3 class="h3">Pendidikan</h3>
        </div>

        <ol class="timeline-list">
            @foreach ( $educations as $education )
            <li class="timeline-item">
                <h4 class="h4 timeline-item-title">
                    {{ $education->school }}
                </h4>

                @if (($education->end_date) >= now()->year)
                <span>{{ $education->start_date }} - Sekarang</span>
                @else
                <span>{{ $education->start_date }} — {{ $education->end_date }}</span>
                @endif

                <p class="timeline-text">
                    {{ $education->description }}
                </p>
            </li>
            @endforeach

        </ol>
    </section>

    <section class="timeline">
        <div class="title-wrapper">
            <div class="icon-box">
                <ion-icon name="book-outline"></ion-icon>
            </div>

            <h3 class="h3">Pengalaman</h3>
        </div>

        <ol class="timeline-list">
            @foreach ( $experiences as $experience )
            <li class="timeline-item">
                <h4 class="h4 timeline-item-title">
                    {{ $experience->title }}
                </h4>

                @if (($experience->end_date) >= now()->year)
                <span>{{ $experience->start_date }} - Sekarang</span>
                @else
                <span>{{ $experience->start_date }} — {{ $experience->end_date }}</span>
                @endif

                <p class="timeline-text">
                    {{ $experience->description }}
                </p>
            </li>
            @endforeach

        </ol>
    </section>

    <section class="skill">
        <h3 class="h3 skills-title">My skills</h3>

        <ul class="skills-list content-card">

            @foreach ( $skills as $skill )
            <li class="skills-item">
                <div class="title-wrapper">
                    <h5 class="h5">{{ $skill->title }}</h5>
                    <data value="{{ $skill->range }}">{{ $skill->range }}%</data>
                </div>

                <div class="skill-progress-bg">
                    <div class="skill-progress-fill" style="width: {{ $skill->range }}%"></div>
                </div>
            </li>
            @endforeach

        </ul>
    </section>
</article>
