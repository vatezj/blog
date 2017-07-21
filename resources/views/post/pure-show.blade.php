<html>
<head>
    <title>{{ $post->title }}</title>
    <style>
        .container {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            width: 100%;
            max-width: 700px;
            background: #fff;
            margin: 40px auto 20px;
            padding: 20px;
            position: relative;
            line-height: 1.5;
        }

        .container pre {
            overflow: auto;
            word-wrap: normal;
            white-space: pre;
            margin: 20px 0;
            padding: 15px;
            font-size: 0.95em;
            color: rgb(33, 33, 33);
            border: none;
            border-radius: 4px;
            background: rgb(247, 249, 247);
            line-height: 1.6em;
        }
        .container code{
            color: #c7254e;
            background-color: #f9f2f4;
            border-radius: 4px;
            font-family: Menlo,Monaco,Consolas,"Courier New",monospace;
            padding: 2px 4px;
            font-size: 90%;
        }

        .container img {
            max-width: 100%;
            margin-left: auto;
            display: block;
            margin-right: auto;
        }
    </style>
</head>
<body>
<div class="container">
    {!! $post->html_content !!}
</div>
</body>
</html>
