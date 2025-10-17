@php($subject = $subject ?? 'تنبيه النظام')

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $subject }}</title>
    <style>body{font-family:Tahoma,Arial,sans-serif;background:#f8fafc;color:#0f172a;padding:16px}</style>
    </head>
<body>
    <h2 style="margin-top:0">{{ $subject }}</h2>
    <p>تفاصيل التنبيه:</p>
    <pre style="background:#fff;border:1px solid #e2e8f0;padding:12px;border-radius:8px;white-space:pre-wrap">{{ $message ?? '—' }}</pre>
    <p style="color:#64748b">تم الإرسال: {{ now()->toDateTimeString() }}</p>
</body>
</html>

