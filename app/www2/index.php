<!DOCTYPE html>
<html lang="en">
<head>
<style>
    body {
        background: red;
    }
    .group{
        width: 300px;
        display: flex;
        position: relative; /* This is important for the js offsetLeft property */
        overflow-x: scroll;
    }

    .item{
        width: 200px;
        background: #eee;
        margin-right: 10px;
    }
</style>

</head>

<body>
<div class="group" id="frames">
    <div class="item frames-item">paul</div>
    <div class="item frames-item">coucou</div>
    <div class="item frames-item">jojoij</div>
    <div class="item frames-item">zoie</div>
    <div class="item frames-item">foez</div>
    <div class="item frames-item">popze</div>
    <div class="item frames-item">kvk</div>
    <div class="item frames-item">poe</div>
    <div class="item frames-item">hfihuazf</div>
    <div class="item frames-item">jeeze</div>
    <div class="item frames-item">pposd</div>
    <div class="item frames-item">nvnn</div>
</div>


<script>

    document.addEventListener('DOMContentLoaded', function () {
        var frames = document.getElementById('frames');
        frames.addEventListener('click', function (e) {
            if (e.target.classList.contains('item')) {
                e.target.parentNode.scrollLeft = e.target.offsetLeft;

            }
        });
    });

</script>

</body>
</html>