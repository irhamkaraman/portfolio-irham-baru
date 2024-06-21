<article class="portfolio" data-page="portfolio">
    <header>
        <h2 class="h2 article-title">Portfolio</h2>
    </header>

    <section class="projects">
        <ul class="filter-list">
            <li class="filter-item">
                <button class="active" data-filter-btn>All</button>
            </li>

            @foreach ( $categories as $category )
            <li class="filter-item">
                <button data-filter-btn>{{ $category->name }}</button>
            </li>
            @endforeach

        </ul>

        <div class="filter-select-box">
            <button class="filter-select" data-select>
                <div class="select-value" data-selecct-value>
                    Select category
                </div>

                <div class="select-icon">
                    <ion-icon name="chevron-down"></ion-icon>
                </div>
            </button>

            <ul class="select-list">
                <li class="select-item">
                    <button data-select-item>All</button>
                </li>

                @foreach ( $categories as $category )
                <li class="select-item">
                    <button data-select-item>{{ $category->name }}</button>
                </li>
                @endforeach

            </ul>
        </div>

        <ul class="project-list">

            @foreach ( $portfolios as $portfolio )
            <li class="project-item active" data-filter-item data-category="{{ strtolower($portfolio->category->name) }}">
                <a href="{{ $portfolio->url }}" target="_blank">
                    <figure class="project-img">
                        <div class="project-item-icon-box">
                            <ion-icon name="eye-outline"></ion-icon>
                        </div>

                        <img src="{{ asset('storage/portfolio/' . $portfolio->image) }}" alt="{{ $portfolio->title }}" loading="lazy" />
                    </figure>

                    <h3 class="project-title">{{ $portfolio->title }}</h3>

                    <p class="project-category">{{ $portfolio->category->name }}</p>
                </a>
            </li>
            @endforeach


        </ul>
    </section>
</article>
