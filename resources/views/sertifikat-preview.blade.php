<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Preview Sertifikat</title>
    <style>
        body {
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }

        .preview-container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .preview-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .preview-header h1 {
            color: #333;
            margin-bottom: 10px;
        }

        .preview-actions {
            text-align: center;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 12px 24px;
            margin: 0 10px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-success {
            background-color: #28a745;
            color: white;
        }

        .btn-success:hover {
            background-color: #1e7e34;
        }

        .certificate-preview {
            border: 2px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            background: white;
            position: relative;
            margin: 0 auto;
            /* Aspect ratio 2000:1414 */
            width: 100%;
            max-width: 1000px;
            height: 0;
            padding-bottom: 70.7%; /* (1414/2000) * 100 */
        }

        .certificate-content {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .background-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: contain;
            z-index: 1;
        }

        .certificate-text {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 2;
        }

        .name {
            position: absolute;
            top: 41.8%;
            left: 50%;
            transform: translateX(-50%);
            font-size: 4.2vw;
            font-weight: bold;
            color: #000;
            text-align: center;
            width: 70%;
            line-height: 1.2;
            font-family: Arial, sans-serif;
        }

        .date {
            position: absolute;
            top: 60.1%;
            left: 50%;
            transform: translateX(-50%);
            font-size: 2.8vw;
            color: #000;
            text-align: center;
            width: 60%;
            font-family: Arial, sans-serif;
        }

        .course {
            position: absolute;
            top: 53%;
            left: 50%;
            transform: translateX(-50%);
            font-size: 2.5vw;
            color: #000;
            text-align: center;
            width: 60%;
            font-family: Arial, sans-serif;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .preview-container {
                margin: 10px;
                padding: 10px;
            }
            
            .btn {
                display: block;
                margin: 10px 0;
            }
        }
    </style>
</head>
<body>
    <div class="preview-container">
        <div class="preview-header">
            <h1>Preview Sertifikat</h1>
            <p>Nama: <strong>{{ $name }}</strong></p>
        </div>

        <div class="preview-actions">
            <a href="#" onclick="window.print()" class="btn btn-primary">Print Preview</a>
            <a href="{{ route('certificate.download', request()->route('id')) }}" class="btn btn-success">Download PDF</a>
        </div>

        <div class="certificate-preview">
            <div class="certificate-content">
                <img src="data:image/jpeg;base64,{{ $backgroundImage }}" class="background-image" alt="Certificate Background">
                
                <div class="certificate-text">
                    <div class="name">{{ $name }}</div>
                    <div class="course">{{ $course ?? '' }}</div>
                    <div class="date">Tanggal: {{ $date }}</div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Optional: Auto-resize font untuk mobile
        function adjustFontSize() {
            const container = document.querySelector('.certificate-preview');
            const containerWidth = container.offsetWidth;
            const elements = document.querySelectorAll('.name, .date, .course');
            
            elements.forEach(element => {
                const fontSize = (containerWidth * 0.042); // 4.2% dari lebar container
                element.style.fontSize = fontSize + 'px';
            });
        }

        // Adjust on load and resize
        window.addEventListener('load', adjustFontSize);
        window.addEventListener('resize', adjustFontSize);
    </script>
</body>
</html>