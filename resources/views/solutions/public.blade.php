@extends('base')

@section('content')
    <section class="solutions" id="solutions">
        <div class="feature-item-cont">
        </br>
        </div>
        <div class="container">
            <h2 class="section-title">
                @if (isset($titles) && $titles->count() > 0)
                    @foreach ($titles as $title)
                        {{ $title->title3 }}
                    @endforeach
                @else
                    Nos Solutions
                @endif
            </h2>
            @foreach ($solutions as $solution)
                <div id="centrex" class="tab-content active">
                    <div class="solution-content">
                        <div class="solution-text">
                            <h3>{{ $solution->title }}</h3>
                            <p>{{ $solution->description }}</p>

                            <div class="solution-features">
                                <div class="feature-item">
                                    <i class="fas fa-check feature-icon"></i>
                                    <span>{{ $solution->liste1 }}</span>
                                </div>
                                <div class="feature-item">
                                    <i class="fas fa-check feature-icon"></i>
                                    <span>{{ $solution->liste2 }}</span>
                                </div>
                                <div class="feature-item">
                                    <i class="fas fa-check feature-icon"></i>
                                    <span>{{ $solution->liste3 }}</span>
                                </div>
                                <div class="feature-item">
                                    <i class="fas fa-check feature-icon"></i>
                                    <span>{{ $solution->liste4 }}</span>
                                </div>
                                <div class="feature-item">
                                    <i class="fas fa-check feature-icon"></i>
                                    <span>{{ $solution->liste5 }}</span>
                                </div>
                            </div>

                            {{-- <a href="#contact" class="cta-button">{{ $solution->button2 }}</a> --}}
                        </div>

                        <div class="solution-image">
                            <img src="{{ asset('storage/' . $solution->imageUrl) }}" alt="Solution Centrex" />
                        </div>
                    </div>
                </div>
                <div class="feature-item-cont">
                </div>
            @endforeach
        </div>
    </section>
@endsection
