<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>عقارك | الشروط والأحكام</title>

    <!-- Bootstrap RTL -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/client/terms_and_condition.css') }}">

</head>

<body>

@include('client.layouts.header')


<!-- Content -->
<main class="page">
    <div class="card-terms">
        <h1>الشروط والأحكام</h1>
        <p>
            مرحبًا بك في منصة <strong>عقارك</strong>. باستخدامك لهذا الموقع، فإنك توافق على الالتزام بالشروط والأحكام التالية.
            يرجى قراءتها بعناية قبل استخدام خدماتنا.
        </p>

        <h5>1. استخدام الموقع</h5>
        <p>
            يلتزم المستخدم باستخدام الموقع لأغراض قانونية فقط، وعدم نشر أي محتوى مخالف للقوانين أو يحتوي على معلومات مضللة.
        </p>

        <h5>2. إنشاء الحساب</h5>
        <p>
            عند إنشاء حساب، يجب تقديم بيانات صحيحة ودقيقة. يتحمل المستخدم مسؤولية الحفاظ على سرية بيانات تسجيل الدخول الخاصة به.
        </p>

        <h5>3. الإعلانات العقارية</h5>
        <p>
            يتحمل المعلن مسؤولية صحة المعلومات المنشورة في الإعلانات. لا تتحمل إدارة الموقع أي مسؤولية عن دقة أو مصداقية المحتوى المقدم من المستخدمين.
        </p>

        <h5>4. الخصوصية</h5>
        <p>
            نحن نحترم خصوصيتك ونلتزم بحماية بياناتك الشخصية وفقًا لسياسة الخصوصية الخاصة بنا.
        </p>

        <h5>5. إيقاف الحساب</h5>
        <p>
            يحق لإدارة الموقع إيقاف أو حذف أي حساب يخالف الشروط والأحكام دون إشعار مسبق.
        </p>

        <h5>6. التعديلات</h5>
        <p>
            نحتفظ بالحق في تعديل هذه الشروط والأحكام في أي وقت. استمرارك في استخدام الموقع بعد التعديلات يعني موافقتك عليها.
        </p>

        <h5>7. التواصل معنا</h5>
        <p>
            في حال وجود أي استفسارات بخصوص الشروط والأحكام، يمكنك التواصل معنا عبر البريد الإلكتروني:
            <strong>info@aqark.com</strong>
        </p>
    </div>
</main>

@include('client.layouts.footer')


<script>
    document.getElementById("year").textContent = new Date().getFullYear();
</script>

</body>
</html>
