<?php // FOR TESTING ONLY>...?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jawab soal</title>
    <style>
        .my-card {
            background-color: dodgerblue;
            padding: 8px;
            color: white;
        }
        .my-clearfix:after{
            content: '';
            display: block;
            clear: both;
        }


        *{
            box-sizing: border-box;
        }

        #prev-btn{
            float: left;  
        }

        #next-btn {
            float: right;
        }


        .my-soal-button {
            color: white;
            cursor: pointer;
            background-color: crimson;
            padding: 8px;
            border: 1px solid #DFDFDF;
            border-radius: 4px;
        }
        
    </style>
</head>
<body>
    <div class="my-card">
        <span id="soal-no-container"></span>
        <p id="soal-text-container"></p>
        <div id="soal-option-container">
            <div>
                <input type="radio" value="A" class="soal-radio" name="soal-radio"/> A
            </div>
            <div>
                <input type="radio" value="B" class="soal-radio" name="soal-radio"/> B
            </div>
            <div>
                <input type="radio" value="C" class="soal-radio" name="soal-radio"/> C
            </div>
            <div>
                <input type="radio" value="D" class="soal-radio" name="soal-radio"/> D
            </div>
        </div>
        <div class="my-clearfix">
            <button id="prev-btn" class="my-soal-button">Before</button>
            <button id="next-btn" class="my-soal-button">Next</button>
            <button id="submit-btn" class="my-soal-button">Submit jawaban</button>
        </div>
    </div>
</body>
    <script src="/it-a/assets/js/jquery.min.js"></script>
    <script src="/it-a/assets/js/jawab-soal.js"></script>
</html>

<?php // FOR TESTING ONLY>...?>