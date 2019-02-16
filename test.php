<!doctype html>
<html>
<head>
    <style>
        div {
            padding: 2em;
        }

        #a {
            border: 3px dashed black;
        }

        #b {
            background-color: yellow;
        }

        .c {
            float: right;
        }

        .d {
            font-weight: bold;
        }

        .c, .b {
            border: 5px dotted red;
            margin: 1em;
            width: 5em;
        }

        p em {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div id="b">
    <p>Hello</p>
    <p>Goodbye</p>
</div>
<div id="a">
    <em>Happy</em>
    <em>Sad</em>
</div>
<div class="a c">
    Monday Tuesday Wednesday
</div>
<div class="b">
    Thursday Friday Saturday
</div>
<div>
    <div id="d" class="c">
        <p><em>Sunday</em></p>
    </div>
</div>
</body>
</html>