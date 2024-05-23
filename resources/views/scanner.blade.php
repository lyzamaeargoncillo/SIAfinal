<!DOCTYPE html>
<html>
<head>
    <title>QR Code Scanner</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f5f5f5;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        #wrapper {
            text-align: center;
        }

        #reader {
            width: 300px;
            height: 300px;
            border: 2px solid #333;
            position: relative;
            overflow: hidden;
            margin-bottom: 20px;
        }

        #scan-line {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background-color: #28a745;
            animation: scan 2s infinite linear;
        }

        @keyframes scan {
            0% {
                transform: translateY(0);
            }
            100% {
                transform: translateY(100%);
            }
        }

        h1 {
            font-size: 36px;
            margin-bottom: 30px;
        }

        .btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            margin-top: 20px;
            display: inline-block;
            margin: 5px;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .btn-back {
            background-color: #6c757d;
        }

        .btn-back:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <h1>Scan QR Code</h1>
        <div id="reader">
            <div id="scan-line"></div>
        </div>
        {{-- <button class="btn" id="scan-btn">Start Scan</button> --}}
        <button class="btn btn-back" id="back-btn">Back</button>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/html5-qrcode@latest/dist/html5-qrcode.min.js"></script>
    <script>
        const config = {
            fps: 30,
            qrbox: 200
        }

        const scanner = new Html5QrcodeScanner("reader", config)

        const success = (data) => {
            alert(data)
            scanner.clear();
            scanner.stop();
            document.getElementById('scan-btn').style.display = 'block';
        }

        const error = (err) => {
            console.error(err)
        }

        scanner.render(success, error);

        // const scanButton = document.getElementById('scan-btn');
        // scanButton.addEventListener('click', () => {
        //     scanner.start();
        //     scanButton.style.display = 'none';
        // });

        const backButton = document.getElementById('back-btn');
        backButton.addEventListener('click', () => {
            window.history.back();
        });
    </script>
</body>
</html>
