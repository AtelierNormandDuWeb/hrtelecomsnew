<section class="faq" id="faq">
    <div class="container">
        <h2 class="section-title">
            @foreach ($titles as $title)
                {{ $title->title5 }}
            @endforeach
        </h2>

        <div class="accordion">
            @foreach ($faqs as $faq)
            <div class="accordion-item">
                <div class="accordion-header">
                    <span>{{ $faq->question }}</span>
                    <i class="fas fa-chevron-down accordion-icon"></i>
                </div>
                <div class="accordion-content">
                    <div class="accordion-content-inner">
                        <p>{{ $faq->response }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
