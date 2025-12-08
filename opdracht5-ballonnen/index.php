<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TCR - Ballonnen Demo</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <style>
        body {
            background: url("https://www.transparenttextures.com/patterns/cubes.png");
        }

        #canvas {
            position: relative;
            width: 100%;
            height: 90vh;
            overflow: hidden;
        }

        .balloon {
            position: absolute;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: white;
            font-weight: bold;
            text-shadow: 1px 1px 2px black;
        }
    </style>
</head>
<body>

<div class="container text-center mt-4">
    <h1 class="mb-4">TCR Ballonnen Generator</h1>

    <div class="btn-group mb-4">
        <button id="startBtn" class="btn btn-success">Start</button>
        <button id="resetBtn" class="btn btn-danger">Reset</button>
    </div>

    <div id="canvas" class="border rounded bg-light"></div>
</div>

<script>
    let intervalId = null;

    function spawnBalloon() {
        $.ajax({
            url: "balloon.php",
            method: "GET",
            dataType: "json",
            success: function (b) {

                const canvas = $("#canvas");
                const canvasWidth = canvas.width();
                const canvasHeight = canvas.height();

                const randomX = Math.random() * (canvasWidth - b.size);
                const randomY = Math.random() * (canvasHeight - b.size);

                let balloon = $("<div></div>");
                balloon.addClass("balloon");
                balloon.css({
                    width: b.size,
                    height: b.size,
                    backgroundColor: b.color,
                    left: randomX + "px",
                    top: randomY + "px"
                });

                balloon.text(b.emoji);

                $("#canvas").append(balloon);
            }
        });
    }

    // Start-knop
    $("#startBtn").on("click", function () {
        if (!intervalId) {
            intervalId = setInterval(spawnBalloon, 800); // interval in ms
        }
    });

    // Reset-knop
    $("#resetBtn").on("click", function () {
        clearInterval(intervalId);
        intervalId = null;
        $("#canvas").empty();
    });
</script>

</body>
</html>
