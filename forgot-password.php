<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PYD Color</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<style>
    canvas {
        display: block;
        width: 100%;
        height: 100vh;
    }

    .con {
        /* width: 100vw; */
        /* height: 100vh; */
        position: fixed;
    }
</style>

<body class="hold-transition login-page" style="background-color: lightblue">
    <canvas id="c">
    </canvas>
    <div class='con'>
        <div class="login-box ">
            <div class="login-logo">
                <a style="color:white" href=""><b>PYD</b>Color</a>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">กรอก Email เพื่อกู้คืนรหัสผ่าน</p>

                    <form>
                        <div class="input-group mb-3">
                            <input type="email" id='email' class="form-control" placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="button" id='btn' class="btn btn-primary btn-block">Send Email</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>

                    <p class="mt-3 mb-1">
                        <a href="login">Login</a>
                    </p>

                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
    </div>
    <!-- /.login-box -->
    </div>
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <script src="anime.min.js"></script>
</body>

</html>
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="plugins/toastr/toastr.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        const Toast = Swal.mixin({
            showConfirmButton: false,
            timer: 2000,

        });
        $('#btn').click(function() {
            $.ajax({
                url: "forgot-password.control.php",
                method: "POST",
                data: {
                    Email: $('#email').val(),
                    action : 1
                },success : function(result){
                    if(result == 'Success'){
                        alert("send success")
                    }
                }
            })
        })

    })
</script>
<script type="text/javascript">
    var c = document.getElementById("c");
    var ctx = c.getContext("2d");
    var cH;
    var cW;
    var bgColor = "#FF6138";
    var animations = [];
    var circles = [];

    var colorPicker = (function() {
        var colors = ["#FF6138", "#5529b9", "#FFBE53", "#2980B9", "#282741", "#29b995", "#63b929"];
        var index = 0;

        function next() {
            index = index++ < colors.length - 1 ? index : 0;
            return colors[index];
        }

        function current() {
            return colors[index]
        }
        return {
            next: next,
            current: current
        }
    })();

    function removeAnimation(animation) {
        var index = animations.indexOf(animation);
        if (index > -1) animations.splice(index, 1);
    }

    function calcPageFillRadius(x, y) {
        var l = Math.max(x - 0, cW - x);
        var h = Math.max(y - 0, cH - y);
        return Math.sqrt(Math.pow(l, 2) + Math.pow(h, 2));
    }

    function addClickListeners() {
        document.addEventListener("touchstart", handleEvent);
        document.addEventListener("mousedown", handleEvent);
    };

    function handleEvent(e) {
        if (e.touches) {
            e.preventDefault();
            e = e.touches[0];
        }
        var currentColor = colorPicker.current();
        var nextColor = colorPicker.next();
        var targetR = calcPageFillRadius(e.pageX, e.pageY);
        var rippleSize = Math.min(200, (cW * .4));
        var minCoverDuration = 750;

        var pageFill = new Circle({
            x: e.pageX,
            y: e.pageY,
            r: 0,
            fill: nextColor
        });
        var fillAnimation = anime({
            targets: pageFill,
            r: targetR,
            duration: Math.max(targetR / 2, minCoverDuration),
            easing: "easeOutQuart",
            complete: function() {
                bgColor = pageFill.fill;
                removeAnimation(fillAnimation);
            }
        });

        var ripple = new Circle({
            x: e.pageX,
            y: e.pageY,
            r: 0,
            fill: currentColor,
            stroke: {
                width: 3,
                color: currentColor
            },
            opacity: 1
        });
        var rippleAnimation = anime({
            targets: ripple,
            r: rippleSize,
            opacity: 0,
            easing: "easeOutExpo",
            duration: 900,
            complete: removeAnimation
        });

        var particles = [];
        for (var i = 0; i < 32; i++) {
            var particle = new Circle({
                x: e.pageX,
                y: e.pageY,
                fill: currentColor,
                r: anime.random(24, 48)
            })
            particles.push(particle);
        }
        var particlesAnimation = anime({
            targets: particles,
            x: function(particle) {
                return particle.x + anime.random(rippleSize, -rippleSize);
            },
            y: function(particle) {
                return particle.y + anime.random(rippleSize * 1.15, -rippleSize * 1.15);
            },
            r: 0,
            easing: "easeOutExpo",
            duration: anime.random(1000, 1300),
            complete: removeAnimation
        });
        animations.push(fillAnimation, rippleAnimation, particlesAnimation);
    }

    function extend(a, b) {
        for (var key in b) {
            if (b.hasOwnProperty(key)) {
                a[key] = b[key];
            }
        }
        return a;
    }

    var Circle = function(opts) {
        extend(this, opts);
    }

    Circle.prototype.draw = function() {
        ctx.globalAlpha = this.opacity || 1;
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.r, 0, 2 * Math.PI, false);
        if (this.stroke) {
            ctx.strokeStyle = this.stroke.color;
            ctx.lineWidth = this.stroke.width;
            ctx.stroke();
        }
        if (this.fill) {
            ctx.fillStyle = this.fill;
            ctx.fill();
        }
        ctx.closePath();
        ctx.globalAlpha = 1;
    }

    var animate = anime({
        duration: Infinity,
        update: function() {
            ctx.fillStyle = bgColor;
            ctx.fillRect(0, 0, cW, cH);
            animations.forEach(function(anim) {
                anim.animatables.forEach(function(animatable) {
                    animatable.target.draw();
                });
            });
        }
    });

    var resizeCanvas = function() {
        cW = window.innerWidth;
        cH = window.innerHeight;
        c.width = cW * devicePixelRatio;
        c.height = cH * devicePixelRatio;
        ctx.scale(devicePixelRatio, devicePixelRatio);
    };

    (function init() {
        resizeCanvas();
        if (window.CP) {
            // CodePen's loop detection was causin' problems
            // and I have no idea why, so...
            window.CP.PenTimer.MAX_TIME_IN_LOOP_WO_EXIT = 6000;
        }
        window.addEventListener("resize", resizeCanvas);
        addClickListeners();
        if (!!window.location.pathname.match(/fullcpgrid/)) {
            startFauxClicking();
        }
        handleInactiveUser();
    })();

    function handleInactiveUser() {
        var inactive = setTimeout(function() {
            fauxClick(cW / 2, cH / 2);
        }, 2000);

        function clearInactiveTimeout() {
            clearTimeout(inactive);
            document.removeEventListener("mousedown", clearInactiveTimeout);
            document.removeEventListener("touchstart", clearInactiveTimeout);
        }

        document.addEventListener("mousedown", clearInactiveTimeout);
        document.addEventListener("touchstart", clearInactiveTimeout);
    }

    function startFauxClicking() {
        setTimeout(function() {
            fauxClick(anime.random(cW * .2, cW * .8), anime.random(cH * .2, cH * .8));
            startFauxClicking();
        }, anime.random(200, 900));
    }

    function fauxClick(x, y) {
        var fauxClick = new Event("mousedown");
        fauxClick.pageX = x;
        fauxClick.pageY = y;
        document.dispatchEvent(fauxClick);
    }
</script>