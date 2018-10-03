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
                                <li><a href="{{ url(config('adminlte.register', 'register')) }}">Sign Up</a></li>
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

                                The purpose of the exercise is to develop a web application, capable of receiving data from sensors and capturing them as well as generating them later through reports and graphs, in order to manipulate information in a productive way. The reading of the parameters by the sensors will be sent through an HTTP / GET request to the web address of the application where the application will receive the data and persist in a mysql database to be later managed.
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
        <section id="two" class="wrapper alt style2">
            <section class="spotlight">
                <div class="image"><img src="{{ asset('/introduction/images/trello-banner.jpg') }}" alt="" class="banner-vh"/></div><div class="content">
                    <h2>Trello</h2>

                    <p>
                        <blockquote>
                            Trello is an extremely versatile project management tool that can be adjusted according to your needs. You can use it to organize your work tasks and link it with Scrum methodologies easily very effectively.
                        </blockquote>
                    </p>
                </div>
            </section>

            <section class="spotlight">
                <div class="image"><img src="{{ asset('/introduction/images/laravel-banner.jpeg') }}" alt="" class="banner-vh" /></div>

                <div class="content">
                    <h2>Laravel</h2>
                    <p>
                        <blockquote>
                            Laravel is a free and open source PHP development framework whose main goal is to enable you to work in a structured and fast way.
                        </blockquote>
                    </p>
                </div>
            </section>

            <section class="spotlight">
                <div class="image"><img src="{{ asset('/introduction/images/github-banner.png') }}" alt="" class="banner-vh" /></div>

                <div class="content">
                    <h2>Github</h2>
                    <p>
                        <blockquote>
                            GitHub is a source code hosting platform with version control that uses Git. It allows programmers, utilities, or any user on the platform to contribute to private and / or Open Source projects from anywhere in the world.
                        </blockquote>
                    </p>
                </div>
            </section>

            <section class="spotlight">
                <div class="image"><img src="{{ asset('/introduction/images/html-banner.png') }}" alt="" class="banner-vh"  /></div>

                <div class="content">
                    <h2>Html, Css, Js</h2>
                    <p>
                        <blockquote>
                            Html, Css, and Javascript are front end languages ​​used to build the visual structure of the application. The Html, marks the elements of the page, while the CSS makes the stylization of the elements. In turn the javascript of life and movement the pages making them more dynamic.
                        </blockquote>
                    </p>
                </div>
            </section>

            <section class="spotlight">
                <div class="image"><img src="{{ asset('/introduction/images/postgresql-banner.jpg') }}" alt="" class="banner-vh"  /></div>

                <div class="content">
                    <h2>Php e PostgreSQL</h2>
                    <p>
                        <blockquote>
                            PostgreSQL is a relational database management system. It can handle workloads ranging from small to large Internet-facing applications with many concurrent users. The PHP language is a programming language and its field of action is web development. Its main goal is to implement fast, simple and efficient web solutions.
                        </blockquote>
                    </p>
                </div>
            </section>

        </section>
        <!-- /Two -->



        <!-- Three -->
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
