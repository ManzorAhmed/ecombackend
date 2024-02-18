
{{--<div class="container">--}}
{{--    <h2 class="font_2" style="font-size: 65px; line-height: 1.2em; text-align: center;">--}}
{{--    <span style="font-size: 65px;">--}}
{{--      <span style="color: #0961e2;">--}}
{{--        <span style="text-decoration: underline;">--}}
{{--          <span style="font-family: 'DejaVu Sans Mono', sans-serif">EVENT COUNTDOWN TIMER</span>--}}
{{--        </span>--}}
{{--      </span>--}}
{{--    </span>--}}
{{--    </h2>--}}
{{--</div>--}}


<div class="container" style="padding-top: 26px">
    <div class="row">
        <div class="col-lg-6 offset-3">
{{--            <h2>Sale up to 45%!</h2>--}}
            <div class="timer">
                <div>
                    <span class="days" id="day"></span>
                    <div class="smalltext">Days</div>
                </div>
                <div>
                    <span class="hours" id="hour"></span>
                    <div class="smalltext">Hours</div>
                </div>
                <div>
                    <span class="minutes" id="minute"></span>
                    <div class="smalltext">Minutes</div>
                </div>
                <div>
                    <span class="seconds" id="second"></span>
                    <div class="smalltext">Seconds</div>
                </div>
                <p id="time-up"></p>
            </div>
        </div>
    </div>
</div>
<script>
    var deadline = new Date("March 9, 2024 15:37:25").getTime();
    var x = setInterval(function() {
        var currentTime = new Date().getTime();
        var t = deadline - currentTime;
        var days = Math.floor(t / (1000 * 60 * 60 * 24));
        var hours = Math.floor((t%(1000 * 60 * 60 * 24))/(1000 * 60 * 60));
        var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((t % (1000 * 60)) / 1000);
        document.getElementById("day").innerHTML =days ;
        document.getElementById("hour").innerHTML =hours;
        document.getElementById("minute").innerHTML = minutes;
        document.getElementById("second").innerHTML =seconds;
        if (t < 0) {
            clearInterval(x);
            document.getElementById("time-up").innerHTML = "TIME UP";
            document.getElementById("day").innerHTML ='0';
            document.getElementById("hour").innerHTML ='0';
            document.getElementById("minute").innerHTML ='0' ;
            document.getElementById("second").innerHTML = '0';
        }
    }, 1000);

</script>
