<!DOCTYPE html>
<html>
<head>
    <title>Konfirmasi Registrasi Event</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: linear-gradient(135deg, #6B46C1 0%, #4F46E5 100%);
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
        .content {
            background-color: #f9f9f9;
            padding: 30px;
            border-radius: 0 0 10px 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .event-details {
            background-color: white;
            padding: 15px;
            border-radius: 8px;
            margin: 20px 0;
            border-left: 4px solid #4F46E5;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: #666;
        }
        .btn {
            display: inline-block;
            background-color: #4F46E5;
            color: white;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>✨ PETUALANGAN BARU MENANTI! ✨</h1>
    </div>
    
    <div class="content">
        <p>Halo <strong>{{ $user->name }}</strong>,</p>
        
        <p>Wow! Kami sangat bersemangat menyambut kehadiranmu di event kami. Bersiaplah untuk pengalaman luar biasa yang akan mengubah perspektifmu!</p>
        
        <div class="event-details">
            <h2>{{ $event->name }}</h2>
            <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($event->date)->format('d F Y') }}</p>
            <p><strong>Lokasi:</strong> {{ $event->location }}</p>
        </div>
        
        <p>Bersiaplah untuk:</p>
        <ul>
            <li>Menjelajahi ide-ide baru yang memukau</li>
            <li>Bertemu dengan orang-orang menakjubkan sepertimu</li>
            <li>Membawa pulang inspirasi dan energi baru</li>
            <li>Menciptakan kenangan yang tak terlupakan</li>
        </ul>
        
        <p>Kami telah menyimpan tempat istimewa untukmu. Pastikan untuk menyimpan email ini sebagai bukti registrasimu.</p>
        
        <center>
            <a href="{{ url('/event/'.$event->id) }}" class="btn">LIHAT DETAIL EVENT</a>
        </center>
        
        <p style="margin-top: 30px;">Sampai jumpa di event! Kami tidak sabar untuk melihatmu bersinar!</p>
        
        <p>Salam Hangat,<br>
        Tim {{ config('app.name') }}</p>
    </div>
    
    <div class="footer">
        <p>Email ini dikirim secara otomatis. Mohon jangan membalas email ini.</p>
        <p>© {{ date('Y') }} {{ config('app.name') }}. Seluruh hak cipta dilindungi.</p>
    </div>
</body>
</html>