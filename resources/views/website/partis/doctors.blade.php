<section class="team-section">
    <div class="auto-container">

        <!-- Sec Title -->
        <div class="sec-title centered">
            <h2>الأخصائيون الطبيون</h2>
            <div class="separator"></div>
        </div>

        <div class="row clearfix">
            @forelse ($doctors as $doctor)
                <!-- Team Block -->
                <div class="team-block col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="image">
                            <div class="overlay-box">
                                <ul class="social-icons">
                                    <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                    <li><a href="#"><span class="fab fa-google"></span></a></li>
                                    <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                    <li><a href="#"><span class="fab fa-skype"></span></a></li>
                                    <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
                                </ul>
                                <a href="#" class="appointment">احجز موعد</a>
                            </div>
                        </div>
                        <div class="lower-content">
                            <h3><a href="#">{{ $doctor->name }}</a></h3>
                            <div class="designation">{{ $doctor->section->name }}</div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">لا يوجد دكاترة حالياً</p>
            @endforelse
        </div>

    </div>
</section>
