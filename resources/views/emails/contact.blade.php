<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Yeni əlaqə forması</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; background-color: #f9f9f9;">
        <h2 style="color: #0066cc; border-bottom: 2px solid #0066cc; padding-bottom: 10px;">
            Yeni əlaqə forması mesajı
        </h2>

        <div style="background-color: white; padding: 20px; margin-top: 20px; border-radius: 5px;">
            <p><strong>Ad və Soyad:</strong> {{ $fullname }}</p>
            <p><strong>Email:</strong> {{ $email }}</p>
            <p><strong>Telefon:</strong> {{ $phone }}</p>
            <p><strong>Mövzu:</strong> {{ $subject }}</p>

            <div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid #eee;">
                <p><strong>Mesaj:</strong></p>
                <p style="background-color: #f5f5f5; padding: 15px; border-left: 3px solid #0066cc;">
                    {{ $message }}
                </p>
            </div>
        </div>

        <p style="margin-top: 20px; font-size: 12px; color: #666;">
            Bu mesaj orelinsaat.az saytının əlaqə formasından göndərilib.
        </p>
    </div>
</body>
</html>
