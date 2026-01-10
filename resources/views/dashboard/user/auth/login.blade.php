<!doctype html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>تسجيل الدخول</title>

    <link rel="stylesheet" href="{{ asset('dashboard/css/simplebar.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/css/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/css/app-light.css') }}">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 20px;
        }

        .login-container {
            width: 100%;
            max-width: 480px; /* زيادة العرض */
            margin: 0 auto;
        }

        .login-card {
            background: white;
            border-radius: 16px; /* تقليل التدوير */
            box-shadow: 0 10px 25px rgba(50, 50, 93, 0.1), 0 5px 10px rgba(0, 0, 0, 0.07);
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .login-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 30px 25px 25px; /* تقليل padding */
            text-align: center;
            color: white;
            position: relative;
        }

        .login-header::after {
            content: '';
            position: absolute;
            bottom: -15px; /* تقليل الحجم */
            left: 0;
            right: 0;
            height: 30px;
            background: white;
            border-radius: 100% 100% 0 0;
        }

        .logo-wrapper {
            width: 70px; /* تصغير الشعار */
            height: 70px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px; /* تقليل المسافة */
            padding: 12px;
        }

        .logo-wrapper svg {
            fill: white;
            width: 45px; /* تصغير الشعار */
            height: 45px;
        }

        .login-title {
            font-size: 1.3rem; /* تصغير الخط */
            font-weight: 600;
            margin: 8px 0 4px;
        }

        .login-subtitle {
            font-size: 0.85rem; /* تصغير الخط */
            opacity: 0.9;
            margin: 0;
        }

        .login-body {
            padding: 35px 30px 25px; /* تقليل المسافات */
        }

        .form-group {
            margin-bottom: 20px; /* تقليل المسافة */
        }

        .form-group label {
            display: block;
            margin-bottom: 6px; /* تقليل المسافة */
            font-weight: 600;
            color: #333;
            font-size: 0.9rem;
        }

        .form-control {
            width: 100%;
            padding: 12px 14px; /* تقليل padding */
            font-size: 15px;
            border: 2px solid #e1e5e9;
            border-radius: 8px; /* تقليل التدوير */
            transition: all 0.3s;
            background: #f8f9fa;
        }

        .form-control:focus {
            outline: none;
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .select-wrapper {
            position: relative;
        }

        .select-wrapper::after {
            content: "▼";
            font-size: 11px;
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #667eea;
            pointer-events: none;
        }

        select.form-control {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            cursor: pointer;
            color: #333;
        }

        .selected-type-display {
            display: none;
            padding: 8px 12px; /* تقليل padding */
            background: #f0f4ff;
            border-radius: 6px;
            margin-bottom: 15px; /* تقليل المسافة */
            text-align: center;
            font-weight: 600;
            color: #667eea;
            border-right: 3px solid #667eea;
            font-size: 0.9rem; /* تصغير الخط */
            animation: fadeIn 0.3s ease;
        }

        .btn-login {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 14px; /* تقليل padding */
            font-size: 15px;
            font-weight: 600;
            border-radius: 8px; /* تقليل التدوير */
            cursor: pointer;
            transition: all 0.3s;
            width: 100%;
            margin-top: 8px; /* تقليل المسافة */
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 14px rgba(50, 50, 93, 0.1), 0 3px 6px rgba(0, 0, 0, 0.08);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 15px 0; /* تقليل المسافة */
            padding: 12px 0; /* تقليل padding */
            border-top: 1px solid #eee;
            border-bottom: 1px solid #eee;
            font-size: 0.85rem; /* تصغير الخط */
        }

        .remember-me {
            display: flex;
            align-items: center;
        }

        .remember-me input {
            margin-left: 6px; /* تقليل المسافة */
            width: 16px;
            height: 16px;
            accent-color: #667eea;
        }

        .forgot-password {
            color: #667eea;
            text-decoration: none;
            font-size: 0.85rem; /* تصغير الخط */
            transition: color 0.3s;
        }

        .forgot-password:hover {
            color: #764ba2;
            text-decoration: underline;
        }

        .panel {
            display: none;
            animation: fadeIn 0.4s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(8px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .login-footer {
            text-align: center;
            padding-top: 15px; /* تقليل المسافة */
            color: #666;
            font-size: 0.8rem; /* تصغير الخط */
            border-top: 1px solid #eee;
            margin-top: 15px; /* تقليل المسافة */
        }

        /* تحسينات للشاشات الصغيرة */
        @media (max-width: 480px) {
            .login-container {
                max-width: 95%; /* جعلها أكثر اتساعاً على الجوال */
            }

            .login-card {
                border-radius: 12px;
            }

            .login-header {
                padding: 25px 20px 20px;
            }

            .login-body {
                padding: 30px 20px 20px;
            }
        }

        /* تحسينات للشاشات المتوسطة والكبيرة */
        @media (min-width: 768px) {
            .login-container {
                max-width: 500px; /* زيادة العرض للشاشات الكبيرة */
            }
        }

        /* تخصيص السكريبت */
        .highlight {
            border-color: #667eea;
            background: #f8f9ff;
        }

        /* تحسين المسافات بشكل عام */
        .compact {
            margin-bottom: 0;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-card">
            <!-- الهيدر -->
            <div class="login-header">
                <div class="logo-wrapper">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 120 120">
                        <polygon points="78,105 15,105 24,87 87,87" />
                        <polygon points="96,69 33,69 42,51 105,51" />
                        <polygon points="78,33 15,33 24,15 87,15" />
                    </svg>
                </div>
                <h1 class="login-title">نظام إدارة المستشفى</h1>
                <p class="login-subtitle">تسجيل الدخول الآمن</p>
            </div>

            <!-- جسم النموذج -->
            <div class="login-body">
                <!-- عرض النوع المختار -->
                <div id="selectedTypeDisplay" class="selected-type-display">
                    نوع الحساب المختار: <span id="selectedTypeText"></span>
                </div>

                <!-- اختيار نوع الدخول -->
                <div class="form-group">
                    <label for="sectionChooser">نوع الحساب</label>
                    <div class="select-wrapper">
                        <select class="form-control" id="sectionChooser">
                            <option value="">اختر نوع تسجيل الدخول</option>
                            <option value="patient">الدخول كمريض</option>
                            <option value="admin">الدخول كأدمن</option>
                            <option value="doctor">الدخول كدكتور</option>
                            <option value="ray_employee">الدخول كموظف أشعة</option>
                            <option value="laboratorie_employee">الدخول كموظف مختير</option>
                        </select>
                    </div>
                    <small class="text-muted" id="selectionHint" style="display: block; margin-top: 4px; color: #666; font-size: 0.85rem;">
                        اختر نوع الحساب لعرض نموذج الدخول المناسب
                    </small>
                </div>


                <!-- ===== USER ===== -->
                <div class="panel" id="patient">
                    <form method="POST" action="{{ route('login.patient') }}">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="البريد الإلكتروني" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="كلمة المرور" required>
                        </div>

                        <!-- خيارات إضافية -->
                        <div class="remember-forgot">
                            <div class="remember-me">
                                <input type="checkbox" id="remember_me_user" name="remember">
                                <label for="remember_me_user">تذكرني</label>
                            </div>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="forgot-password">
                                    هل نسيت كلمة المرور؟
                                </a>
                            @endif
                        </div>

                        <button type="submit" class="btn-login">تسجيل الدخول كمريض</button>
                    </form>
                </div>


                <!-- ===== ADMIN ===== -->
                <div class="panel" id="admin">
                    <form method="POST" action="{{ route('login.admin') }}">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="البريد الإلكتروني" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="كلمة المرور" required>
                        </div>

                        <!-- خيارات إضافية -->
                        <div class="remember-forgot">
                            <div class="remember-me">
                                <input type="checkbox" id="remember_me_admin" name="remember">
                                <label for="remember_me_admin">تذكرني</label>
                            </div>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="forgot-password">
                                    هل نسيت كلمة المرور؟
                                </a>
                            @endif
                        </div>

                        <button type="submit" class="btn-login">تسجيل الدخول كأدمن</button>
                    </form>
                </div>


                <!-- ===== DOCTOR ===== -->
                <div class="panel" id="doctor">
                    <form method="POST" action="{{ route('login.doctor') }}">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="البريد الإلكتروني" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="كلمة المرور" required>
                        </div>

                        <!-- خيارات إضافية -->
                        <div class="remember-forgot">
                            <div class="remember-me">
                                <input type="checkbox" id="remember_me_doctor" name="remember">
                                <label for="remember_me_doctor">تذكرني</label>
                            </div>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="forgot-password">
                                    هل نسيت كلمة المرور؟
                                </a>
                            @endif
                        </div>

                        <button type="submit" class="btn-login">تسجيل الدخول كدكتور</button>
                    </form>
                </div>


                <!-- ===== RAY EMPLOYEE ===== -->
                <div class="panel" id="ray_employee">
                    <form method="POST" action="{{ route('login.ray_employee') }}">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="البريد الإلكتروني" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="كلمة المرور" required>
                        </div>

                        <!-- خيارات إضافية -->
                        <div class="remember-forgot">
                            <div class="remember-me">
                                <input type="checkbox" id="remember_me_ray" name="remember">
                                <label for="remember_me_ray">تذكرني</label>
                            </div>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="forgot-password">
                                    هل نسيت كلمة المرور؟
                                </a>
                            @endif
                        </div>

                        <button type="submit" class="btn-login">تسجيل الدخول كموظف أشعة</button>
                    </form>
                </div>


                <!-- ===== RAY EMPLOYEE ===== -->
                <div class="panel" id="laboratorie_employee">
                    <form method="POST" action="{{ route('login.laboratorie_employee') }}">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="البريد الإلكتروني" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="كلمة المرور" required>
                        </div>

                        <!-- خيارات إضافية -->
                        <div class="remember-forgot">
                            <div class="remember-me">
                                <input type="checkbox" id="remember_me_ray" name="remember">
                                <label for="remember_me_ray">تذكرني</label>
                            </div>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="forgot-password">
                                    هل نسيت كلمة المرور؟
                                </a>
                            @endif
                        </div>

                        <button type="submit" class="btn-login">تسجيل الدخول كموظف مختبر</button>
                    </form>
                </div>




                <!-- فوتر -->
                <div class="login-footer">
                    © 2026 نظام إدارة المستشفى. جميع الحقوق محفوظة.
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('dashboard/js/jquery.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            // إخفاء جميع النماذج في البداية
            $('.panel').hide();

            // عند تغيير اختيار نوع الدخول
            $('#sectionChooser').on('change', function () {
                let target = $(this).val();
                let selectedText = $(this).find('option:selected').text();

                // إخفاء جميع النماذج
                $('.panel').hide();
                $('.form-control').removeClass('highlight');
                $('#selectionHint').hide();

                // إخفاء أو إظهار عرض النوع المختار
                if (target !== '') {
                    // عرض النوع المختار
                    $('#selectedTypeText').text(selectedText);
                    $('#selectedTypeDisplay').fadeIn(200);

                    // إظهار النموذج المناسب
                    $('#' + target).fadeIn(300);

                    // إضافة تأثير على الحقول
                    $('#' + target + ' .form-control').addClass('highlight');

                    // تغيير اللون الدايناميكي للزر بناءً على الاختيار
                    let colors = {
                        'user': 'linear-gradient(135deg, #4CAF50 0%, #2E7D32 100%)',
                        'admin': 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)',
                        'doctor':'linear-gradient(135deg, #667eea 0%, #764ba2 100%)',
                        'ray_employee': 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)'
                    };

                    $('#' + target + ' .btn-login').css('background', colors[target]);

                    // تغيير نص التلميح الصغير
                    $('#selectionHint').text('يمكنك تغيير نوع الحساب من القائمة أعلاه').show();
                } else {
                    // إذا لم يتم اختيار شيء، إخفاء عرض النوع المختار
                    $('#selectedTypeDisplay').fadeOut(200);
                    $('#selectionHint').text('اختر نوع الحساب لعرض نموذج الدخول المناسب').show();
                }
            });

            // تحريك بطاقة الدخول عند التحميل
            $('.login-card').css({
                'opacity': '0',
                'transform': 'translateY(15px)'
            }).animate({
                'opacity': '1',
                'transform': 'translateY(0)'
            }, 600);

        });
    </script>

</body>
</html>
