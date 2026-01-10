<section class="department-section-three">
    <div class="image-layer" style="background-image:url(images/background/6.jpg)"></div>
    <div class="auto-container">
        <!-- Department Tabs-->
        <div class="department-tabs tabs-box">
            <div class="row clearfix">
                <!--Column-->
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <!-- Sec Title -->
                    <div class="sec-title light">
                        <h2>الاقسام</h2>
                        <div class="separator"></div>
                    </div>
                    <!--Tab Btns-->
                    <ul class="tab-btns tab-buttons clearfix">
                        @forelse ($sections as $section)
                            <li data-tab="#tab-{{ $section->id }}" class="tab-btn">{{ $section->name }}</li>
                        @empty
                            <li class="tab-btn">لايوجد اقسام</li>
                        @endforelse
                    </ul>
                </div>

                <!--Column-->
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <!--Tabs Container-->
                    <div class="tabs-content">
                        @forelse ($sections as $section)
                            <!-- Tab -->
                            <div class="tab" id="tab-{{ $section->id }}">
                                <div class="content">
                                    <h2>{{ $section->name }}</h2>
                                    <div class="title">الوصف</div>
                                    <div class="text">
                                        <p>{{ $section->description }}</p>
                                    </div>

                                    <div class="two-column row clearfix">
                                        <div class="column col-lg-6 col-md-6 col-sm-12">
                                            <h3>01 - خدمة القسم</h3>
                                            <div class="column-text">
                                                {{ $section->service_one ?? 'لا يوجد بيانات' }}
                                            </div>
                                        </div>
                                        <div class="column col-lg-6 col-md-6 col-sm-12">
                                            <h3>02 - خدمة القسم</h3>
                                            <div class="column-text">
                                                {{ $section->service_two ?? 'لا يوجد بيانات' }}
                                            </div>
                                        </div>
                                    </div>

                                    <a href="#" class="theme-btn btn-style-two">
                                        <span class="txt">عرض المزيد</span>
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="tab active-tab">
                                <div class="content">
                                    <h2>لايوجد اقسام</h2>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
