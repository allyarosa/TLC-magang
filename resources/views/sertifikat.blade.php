<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Certificate</title>
    <style>
        @page {
            margin: 0;
            size: A4 landscape;
        }

        * {
            margin: 0;
            padding: 0;
        }

        html,
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            overflow: hidden;
        }

        .page {
            position: relative;
            width: 100%;
            height: 100vh;
            margin: 0;
            padding: 0;
        }

        .page-break {
            page-break-after: always;
        }

        .background-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .certificate-content {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 2;
        }

        /* Halaman 1 Styles */
        .page-1 .name {
            position: absolute;
            top: 35%;
            left: 50%;
            transform: translateX(-50%);
            font-weight: bold;
            color: #0b214b;
            text-align: center;
            width: 100%;
            line-height: 1.2;
            font-family: 'calibri', cursive;
        }

        .page-1 .date {
            position: absolute;
            top: 60.1%;
            left: 50%;
            transform: translateX(-50%);
            font-size: 2.8vw;
            color: #0b214b;
            text-align: center;
            width: 60%;
            font-family: Arial, sans-serif;
        }

        .page-1 .course {
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

        /* Halaman 2 Styles - CENTERED TABLE dengan PADDING DIPERLUAS */
        .page-2 .table-container {
            position: absolute;
            top: 53%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 85%;
            /* Sedikit diperbesar untuk mengakomodasi padding */
            z-index: 2;
            /* border: 1px solid #ddd; */
            padding: 50px;
            /* Padding container diperbesar */
            background-color: #fafafa;
        }

        .page-2 .page-title {
            text-align: center;
            font-size: 2.2vw;
            font-weight: bold;
            color: #0b214b;
            margin-bottom: 25px;
            font-family: Arial, sans-serif;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .page-2 .assessment-table {
            width: 100%;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
            font-size: 1.4vw;
            margin: 0 auto;
        }

        .page-2 .assessment-table th {
            background-color: #0b214b;
            color: white;
            padding: 50px 30px;
            /* PADDING HEADER DIPERLUAS - dari 12px 15px */
            text-align: center;
            font-weight: bold;
            border: 2px solid #000;
            font-size: 1.5vw;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .page-2 .assessment-table td {
            background-color: #ffffff;
            color: #333;
            padding: 50px 30px;
            /* PADDING CELL DIPERLUAS - dari 12px 15px */
            text-align: left;
            border: 2px solid #000;
            line-height: 1.5;
            /* Line height diperbesar untuk readability */
        }

        .page-2 .assessment-table .row-even {
            background-color: #f8f9fa;
        }

        .page-2 .number-col {
            text-align: center;
            width: 10%;
            background-color: #e9ecef;
            font-weight: bold;
            font-size: 1.5vw;
            padding: 45px 25px;
            /* Padding khusus untuk kolom nomor */
        }

        .page-2 .competency-col {
            width: 65%;
            padding: px 35px;
            /* Padding kiri-kanan diperbesar untuk kolom kompetensi */
        }

        .page-2 .theory-col {
            text-align: center;
            width: 25%;
            background-color: #0b214b;
            color: white;
            font-weight: bold;
            font-size: 1.6vw;
            padding: 50px 15px;
            /* Padding khusus untuk kolom nilai */
        }

        .page-2 .center-row {
            text-align: center;
            font-weight: bold;
            font-style: italic;
        }

        .page-2 .signature-section {
            margin-top: 40px;
            /* Margin diperbesar */
            text-align: center;
            font-family: Arial, sans-serif;
        }

        .page-2 .signature-box {
            display: inline-block;
            width: 40%;
            margin: 0 5%;
            text-align: center;
            vertical-align: top;
        }

        .page-2 .signature-line {
            border-bottom: 2px solid #0b214b;
            margin-bottom: 10px;
            height: 50px;
        }

        .page-2 .signature-text {
            font-size: 1.3vw;
            color: #0b214b;
            font-weight: bold;
            line-height: 1.3;
        }

        .page-2 .signature-title {
            font-size: 1.1vw;
            color: #666;
            margin-top: 5px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* RESPONSIVE ADJUSTMENTS untuk padding yang lebih baik */
        @media screen and (max-width: 1200px) {
            .page-2 .assessment-table th {
                padding: 20px 25px;
            }

            .page-2 .assessment-table td {
                padding: 18px 25px;
            }

            .page-2 .competency-col {
                padding: 45px 30px;
            }
        }

        @media screen and (max-width: 800px) {
            .page-2 .assessment-table th {
                padding: 15px 20px;
            }

            .page-2 .assessment-table td {
                padding: 13px 20px;
            }

            .page-2 .competency-col {
                padding: 13px 25px;
            }
        }
    </style>
</head>
@php
    if ($fontSize == 140) {
        $topSize = 37;
    } elseif ($fontSize == 130) {
        $topSize = 38;
    }
@endphp
<body>
    <!-- HALAMAN 1: Sertifikat Utama -->
    <div class="page page-1 page-break">
        <img src="data:image/{{ $backgroundType ?? 'png' }};base64,{{ $backgroundImage }}" class="background-image"
            alt="Certificate Background">

        <div class="certificate-content">
            <div class="name" style="font-size: {{ $fontSize }}px; top: {{ $topSize ?? 35 }}%">{{ $name }}</div>
        </div>
    </div>
    <!-- HALAMAN 2: Tabel Uji Kompetensi - CENTERED dengan PADDING DIPERLUAS -->
    <div class="page page-2">
        <img src="data:image/{{ $backgroundType ?? 'png' }};base64,{{ $backgroundImage2 ?? $backgroundImage }}"
            class="background-image" alt="Certificate Background Page 2">

        <div class="certificate-content">
            <div class="table-container">
                <table class="assessment-table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Uji Kompetensi</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="number-col">1</td>
                            <td class="competency-col">{{ $competency1 ?? 'High Order Thinking Skills (HOTS)' }}</td>
                            <td>{{ $theory1 ?? '0' }}</td>
                        </tr>
                        <tr>
                            <td class="number-col row-even">2</td>
                            <td class="competency-col row-even">
                                {{ $competency2 ?? 'Pedagogical Content Knowledge (PCK)' }}</td>
                            <td>{{ $theory2 ?? '0' }}</td>
                        </tr>
                        <tr>
                            <td class="number-col">3</td>
                            <td class="competency-col">{{ $competency3 ?? 'Literasi' }}</td>
                            <td>{{ $theory3 ?? '0' }}</td>
                        </tr>
                        <tr>
                            <td class="number-col row-even">4</td>
                            <td class="competency-col row-even">{{ $competency4 ?? 'Numerasi' }}</td>
                            <td>{{ $theory4 ?? '0' }}</td>
                        </tr>
                        <tr>
                            <td class="number-col center-row">5</td>
                            <td class="competency-col center-row">{{ $competency5 ?? 'Total Assessment Hours (AH)' }}
                            </td>
                            <td>{{ $theory5 ?? '0' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>