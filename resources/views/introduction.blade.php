<!DOCTYPE HTML>
<html>
<head>
    <title>Software Engineering</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

    <link href="{{ asset('/introduction/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/introduction/assets/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('/introduction/assets/css/noscript.css') }}" rel="stylesheet">

    
</head>
<body class="landing is-preload">

    <!-- Page Wrapper -->
    <div id="page-wrapper-intro">

        <!-- Header -->
        <header id="header" class="alt">
            <div id="animation-es">
                <h1><a href="index.html"> Software Engineering</a></h1>
            </div>

            <nav id="nav">
                <ul>
                    <li class="special">
                        <a href="#menu" class="menuToggle"><span>Menu</span></a>
                        <div id="menu">
                            <ul>=
                                <!--<li><a href="{{ url(config('adminlte.register', 'register')) }}">Sign Up</a></li>-->
                                <li><a href="{{ url(config('adminlte.login', 'login')) }}">Log In</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
        </header>
        <!-- /Header -->

        <!-- Banner -->
        <section id="banner">
            <div class="inner">
                <h2>Software Engineering</h2>
                <p> always launching great products to make your life easier  </p>

                <strong>SENSOR READER</strong>

            </div>
            <a href="#one" class="more scrolly">Learn More</a>
        </section>

        <!-- One -->
        <section id="one" class="wrapper style1 special">
            <div class="inner" style="">
                <header class="major">
                    <h2>Sensor Reader</h2>
                    <p class="align-left">
                        <strong>
                            <blockquote class="align-justify">
                                This work represents the practical and implementation of the knowledge acquired in the classroom in the field of Software Engineering, and is being executed at the Federal Technological University of Paraná, Guarapuava Campus. The agile methodology used is Scrum linked to Trello, along with technologies: Github, Php7, Laravel, PostgreSQL, Javascript, Html5, and Css3.
                            </blockquote>
                        </strong>

                        <strong>
                            <blockquote class="align-justify">
                                The purpose of the exercise is to develop a web application, capable of receiving data from sensors and capturing them as well as generating them later through reports and graphs, in order to manipulate information in a productive way. The reading of the parameters by the sensors will be sent through an HTTP / GET request to the web address of the application this will receive the data and persist in a mysql database to be later managed.
                            </blockquote>
                        </strong>
                    </p>
                </header>


                <h2>Tecnologies Used</h2>
                <ul class="icons major">
                    <li><img class="my-icons" src="{{ asset('/introduction/images/html.png') }}" alt="Html"></li>
                    <li><img class="my-icons" src="{{ asset('/introduction/images/css.png') }}" alt="Html"></li>
                    <li><img class="my-icons" src="{{ asset('/introduction/images/js.png') }}" alt="Html"></li>
                    <li><img class="my-icons" src="{{ asset('/introduction/images/php.png') }}" alt="Html"></li>
                    <li><img class="my-icons" src="{{ asset('/introduction/images/postgresql.png') }}" alt="Html"></li>
                    <li><img class="my-icons" src="{{ asset('/introduction/images/laravel.png') }}" alt="Html"></li>
                    <li><img class="my-icons" src="{{ asset('/introduction/images/trello.png') }}" alt="Html"></li>
                    <li><img class="my-icons" src="{{ asset('/introduction/images/github.png') }}" alt="Html"></li>

                </ul>
            </div>
        </section>
        <!-- /One -->


        <!-- Two -->
            <section id="three" class="wrapper style2 special">
                <h3><p>Graphical Representation of the System</p></h3>

                <div><img src="{{ asset('/introduction/images/comunication-grafic.jpg') }}" alt="" class="img-fluid" /></div>
            </section>




        <!-- Three ->
        <section id="three" class="wrapper style3 ">

            <ul class="features">
                <li class="icon fa-paper-plane-o">
                    <h3>xxxxxxxxxxx</h3>
                    <p>
                        Augue consectetur sed interdum imperdiet et ipsum. Mauris lorem tincidunt nullam amet leo Aenean ligula consequat consequat.
                    </p>
                </li>
            </ul>

            <ul class="features">
                <li class="icon fa-paper-plane-o">
                    <h3>xxxxxxxxxxx</h3>
                    <p>Augue consectetur sed interdum imperdiet et ipsum. Mauris lorem tincidunt nullam amet leo Aenean ligula consequat consequat.</p>
                </li>
            </ul>
        <!-- /Three -->

        

    </div>

    <!-- Four -->
         <section id="three" class="wrapper  special">

            <div class="inner">
                <header class="major">
                    <h2>Development Team Scrum</h2>
                    <p><strong>Everton Paulouski</strong> (Scrum Master / Front End / Documents)</p>
                    <p><strong>Cristhian Albary da Silva</strong> (Database / Back End)</p>
                    <p><strong>Yurick Vinicius Ribas</strong> (Front End / Back End)</p>
                    <p><strong>Andressa Karoline Silva Dogado</strong> (Front End / Back End)</p>
                </header>
            </div>
        </section>
        <!-- Four -->



    <!-- Footer -->
    <footer id="footer">
        <ul class="icons">
        </ul>
        <ul class="copyright">
            <li>&copy; Sensor Reader</li>
            <li>Design: Software Engineering</li>
        </ul>
    </footer>
</div>

<!-- Scripts -->
<script src="{{ asset('/introduction/assets/js/bootstrap.min.js') }}" ></script>
<script src="{{ asset('/introduction/assets/js/jquery.min.js') }}" ></script>
<script src="{{ asset('/introduction/assets/js/jquery.scrollex.min.js') }}" ></script>
<script src="{{ asset('/introduction/assets/js/jquery.scrolly.min.js') }}" ></script>
<script src="{{ asset('/introduction/assets/js/browser.min.js') }}" ></script>
<script src="{{ asset('/introduction/assets/js/breakpoints.min.js') }}" ></script>
<script src="{{ asset('/introduction/assets/js/util.js') }}" ></script>
<script src="{{ asset('/introduction/assets/js/main.js') }}" ></script>


</body>
</html>
