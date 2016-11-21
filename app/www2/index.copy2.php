<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="zquery.js"></script>
    <script src="panify.js"></script>
    <script src="simpledrag.js"></script>
    <script src="screendebug.js"></script>

    <style type="text/css">


        /*------------------------------------
        - PANES CODE
        ------------------------------------*/
        html, body {
            height: 100%;
        }

        .panes-container {
            display: flex;
            /*width: 100%;*/
            height: 100%;
            overflow: hidden;
            background: orange;
        }

        .panes-container.vertical-split .pane-main,
        .panes-container.vertical-split .pane-separator,
        .panes-container.vertical-split .pane-aux {
            height: 100%;
        }

        .pane-main {
            width: 100px;
            background: #ccc;
        }

        .pane-separator {
            width: 10px;
            background: red;
            position: relative;
            cursor: col-resize;
        }

        .pane-aux {
            flex: auto;
            background: #eee;
        }

        .panes-container,
        .panes-separator,
        .pane-main,
        .pane-aux {
            margin: 0;
            padding: 0;
        }

        /*------------------------------------
        - SCREEN DEBUG
        ------------------------------------*/
        #screendebug {
            position: fixed;
            min-width: 200px;
            min-height: 200px;
            background: white;
            color: black;
            bottom: 0%;
            right: 0%;
            z-index: 10000;
        }
    </style>


</head>

<body>

<div class="panes-container vertical-split">
    <div class="pane-main">
        <p>I'm a left pane</p>
        <ul>
            <li><a href="#">Item 1</a></li>
            <li><a href="#">Item 2</a></li>
            <li><a href="#">Item 3</a></li>
        </ul>
    </div>
    <div class="pane-separator"></div>
    <div class="pane-aux">
        <div class="panes-container vertical-split">
            <div class="pane-main">
                <p>I'm a left pane</p>
                <ul>
                    <li><a href="#">Item 1</a></li>
                    <li><a href="#">Item 2</a></li>
                    <li><a href="#">Item 3</a></li>
                </ul>
            </div>
            <div class="pane-separator"></div>
            <div class="pane-aux">
                <p>And I'm a right pane</p>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium at cum cupiditate dolorum,
                    eius eum
                    eveniet facilis illum maiores molestiae necessitatibus optio possimus sequi sunt, vel voluptate.
                    Asperiores,
                    voluptate!
                </p>
            </div>
        </div>

    </div>
</div>


<script>


    zz('.panes-container').panify();


</script>

</body>
</html>