<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            width: 2000px;
            height: 1414px;
            position: relative;
            font-family: Arial, sans-serif;
        }

        .background-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .background-image {
            width: 100%;
            height: 100%;
        }

        .certificate-content {
            position: relative;
            width: 100%;
            height: 100%;
            z-index: 2;
        }

        .name {
            position: absolute;
            top: 590px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 60px;
            font-weight: bold;
            color: #000;
            text-align: center;
            width: 1400px;
            z-index: 3;
        }

        .date {
            position: absolute;
            top: 850px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 40px;
            color: #000;
            text-align: center;
            width: 1200px;
            z-index: 3;
        }

        .course {
            position: absolute;
            top: 750px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 35px;
            color: #000;
            text-align: center;
            width: 1200px;
            z-index: 3;
        }
    </style>
</head>
<body>
    <div class="background-container">
        <img src="data:image/png;base64,{{ $backgroundImage ?? '' }}" class="background-image" alt="Certificate Background">
    </div>
    
    <div class="certificate-content">
        <div class="name">{{ $name ?? 'hamas akif sanie' }}</div>
        <div class="course">{{ $course ?? 'Web Development' }}</div>
        <div class="date">Tanggal: {{ $date ?? '18 Juni 2025' }}</div>
    </div>
</body>
</html>