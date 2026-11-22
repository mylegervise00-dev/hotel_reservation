<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mh illiana Grand Hotel</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: #171717;
            color: #F5F2EC;
        }

        :root {
            --gold: #D9A85B;
            --dark: #171717;
            --ivory: #F5F2EC;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .navbar {
            width: 100%;
            min-height: 90px;
            padding: 18px 7%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #171717;
            border-bottom: 1px solid rgba(217,168,91,.2);
        }

        .brand {
            font-family: 'Cormorant Garamond', serif;
            color: var(--gold);
            font-size: 27px;
            line-height: 1;
            letter-spacing: 2px;
        }

        .brand small {
            display: block;
            font-family: 'Montserrat', sans-serif;
            font-size: 9px;
            letter-spacing: 5px;
            text-align: center;
            margin-top: 7px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 30px;
            font-size: 12px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .nav-links a {
            transition: .3s;
        }

        .nav-links a:hover {
            color: var(--gold);
        }

        .nav-button {
            border: 1px solid var(--gold);
            color: var(--gold);
            padding: 12px 23px;
        }

        .nav-button:hover {
            background: var(--gold);
            color: var(--dark);
        }

        .hero {
            min-height: 650px;
            height: 80vh;
            display: flex;
            align-items: center;
            padding: 70px 10%;
            position: relative;
            background:
                linear-gradient(
                    90deg,
                    rgba(0,0,0,.78),
                    rgba(0,0,0,.35),
                    rgba(0,0,0,.15)
                ),
                url('https://images.unsplash.com/photo-1611892440504-42a792e24d32?auto=format&fit=crop&w=2000&q=85')
                center/cover no-repeat;
        }

        .hero-content {
            max-width: 700px;
        }

        .eyebrow {
            color: var(--gold);
            letter-spacing: 5px;
            font-size: 11px;
            text-transform: uppercase;
            margin-bottom: 25px;
        }

        .hero h1 {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(55px, 8vw, 100px);
            font-weight: 400;
            line-height: .95;
            margin-bottom: 25px;
        }

        .hero h1 span {
            color: var(--gold);
        }

        .hero p {
            max-width: 480px;
            color: #e0ddd7;
            font-size: 14px;
            line-height: 2;
            margin-bottom: 35px;
        }

        .gold-button {
            display: inline-block;
            background: var(--gold);
            color: var(--dark);
            padding: 16px 32px;
            font-size: 11px;
            letter-spacing: 2px;
            text-transform: uppercase;
            transition: .3s;
        }

        .gold-button:hover {
            background: #f0c77e;
            transform: translateY(-3px);
        }

        .section {
            padding: 100px 9%;
        }

        .section-heading {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-heading .eyebrow {
            margin-bottom: 12px;
        }

        .section-heading h2 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 48px;
            font-weight: 400;
        }

        .section-heading h2 span {
            color: var(--gold);
        }

        .about {
            background: var(--ivory);
            color: var(--dark);
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;
            gap: 65px;
        }

        .about-image img {
            width: 100%;
            height: 430px;
            object-fit: cover;
        }

        .about-text .eyebrow {
            margin-bottom: 15px;
        }

        .about-text h2 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 53px;
            font-weight: 400;
            line-height: 1.1;
            margin-bottom: 25px;
        }

        .about-text h2 span {
            color: #B18440;
        }

        .about-text p {
            color: #666;
            font-size: 13px;
            line-height: 2.1;
            margin-bottom: 25px;
        }

        .rooms {
            background: #1d1d1d;
        }

        .room-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        .room-card {
            background: #252525;
            overflow: hidden;
            transition: .3s;
        }

        .room-card:hover {
            transform: translateY(-7px);
        }

        .room-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .room-info {
            padding: 25px;
        }

        .room-info h3 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 28px;
            font-weight: 500;
            margin-bottom: 12px;
        }

        .room-info p {
            color: #aaa;
            font-size: 12px;
            line-height: 1.9;
            margin-bottom: 20px;
        }

        .text-link {
            color: var(--gold);
            font-size: 11px;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .facilities {
            background: #F5F2EC;
            color: var(--dark);
        }

        .facility-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
            text-align: center;
        }

        .facility {
            padding: 35px 20px;
            border: 1px solid #ded8ce;
        }

        .facility .symbol {
            font-size: 32px;
            color: #B18440;
            margin-bottom: 18px;
        }

        .facility h3 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 25px;
            margin-bottom: 12px;
        }

        .facility p {
            color: #777;
            font-size: 12px;
            line-height: 1.8;
        }

        .contact {
            text-align: center;
            background:
                linear-gradient(rgba(0,0,0,.78), rgba(0,0,0,.78)),
                url('https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&w=1800&q=85')
                center/cover no-repeat;
        }

        .contact h2 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 55px;
            font-weight: 400;
            margin-bottom: 18px;
        }

        .contact p {
            color: #ccc;
            font-size: 13px;
            margin-bottom: 30px;
        }

        footer {
            background: #101010;
            text-align: center;
            padding: 35px 20px;
            border-top: 1px solid rgba(217,168,91,.2);
        }

        footer .brand {
            display: inline-block;
            margin-bottom: 20px;
        }

        footer p {
            color: #888;
            font-size: 11px;
            line-height: 2;
        }

        @media(max-width: 900px) {
            .navbar {
                flex-direction: column;
                gap: 25px;
            }

            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
                gap: 18px;
            }

            .about {
                grid-template-columns: 1fr;
            }

            .room-grid,
            .facility-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media(max-width: 600px) {
            .navbar {
                padding: 22px 5%;
            }

            .nav-links {
                gap: 14px;
                font-size: 10px;
            }

            .hero {
                min-height: 570px;
                padding: 50px 7%;
            }

            .section {
                padding: 70px 7%;
            }

            .section-heading h2,
            .about-text h2 {
                font-size: 40px;
            }

            .room-grid,
            .facility-grid {
                grid-template-columns: 1fr;
            }

            .about-image img {
                height: 300px;
            }

            .contact h2 {
                font-size: 42px;
            }
        }
    </style>
</head>

<body>

    <!-- NAVIGATION BAR -->
    <header class="navbar">

        <a href="/" class="brand">
            MHILLIANA
            <small>GRAND HOTEL</small>
        </a>

        <nav class="nav-links">
            <a href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#rooms">Rooms</a>
            <a href="#facilities">Facilities</a>
            <a href="#contact">Contact</a>

            @auth
                <a href="{{ url('/dashboard') }}" class="nav-button">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}">Log In</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="nav-button">
                        Register
                    </a>
                @endif
            @endauth
        </nav>

    </header>


    <!-- HERO SECTION -->
    <section class="hero" id="home">

        <div class="hero-content">

            <div class="eyebrow">
                A Place of Comfort and Elegance
            </div>

            <h1>
                Experience<br>
                <span>Luxury.</span>
            </h1>

            <p>
                Welcome to Mh illiana Grand Hotel, where timeless
                elegance meets exceptional comfort. Discover a
                relaxing stay and an experience worth remembering.
            </p>

            @auth
                <a href="{{ route('guest.rooms.index') }}" class="gold-button">
                    Explore Our Rooms
                </a>
            @else
                <a href="{{ route('login') }}" class="gold-button">
                    Book Your Stay
                </a>
            @endauth

        </div>

    </section>


    <!-- ABOUT SECTION -->
    <section class="section about" id="about">

        <div class="about-image">
            <img
                src="https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?auto=format&fit=crop&w=1000&q=85"
                alt="Elegant hotel interior"
            >
        </div>

        <div class="about-text">

            <div class="eyebrow">Discover Our Hotel</div>

            <h2>
                Welcome to<br>
                <span>Mh illiana Grand Hotel</span>
            </h2>

            <p>
                At Mh illiana Grand Hotel, we believe every stay
                should be special. Our hotel brings together
                comfort, elegance, and warm hospitality to create
                memorable experiences for every guest.
            </p>

            <a href="#rooms" class="gold-button">
                Discover More
            </a>

        </div>

    </section>


    <!-- ROOMS SECTION -->
    <section class="section rooms" id="rooms">

        <div class="section-heading">

            <div class="eyebrow">Stay With Us</div>

            <h2>
                Explore Our <span>Rooms</span>
            </h2>

        </div>

            
            <div class="room-grid">
            
                @forelse ($rooms as $room)
            
                    <article class="room-card">
            
                        <img
                            src="https://images.unsplash.com/photo-1611892440504-42a792e24d32?auto=format&fit=crop&w=900&q=85"
                            alt="Hotel room"
                        >
            
                        <div class="room-info">
            
                            <h3>{{ $room->room_type }}</h3>
            
                            <p>
                                Room Number: {{ $room->room_number }}
                                <br>
                                Status: {{ ucfirst($room->status) }}
                            </p>
            
                            <p>
                                ₱{{ number_format($room->price_per_night, 2) }}
                                / night
                            </p>
            
                            <a
                                href="{{ route('guest.rooms.index') }}"
                                class="text-link"
                            >
                                View Availability →
                            </a>
            
                        </div>
            
                    </article>
            
                @empty
            
                    <p style="text-align:center; color:#aaa; grid-column:1/-1;">
                        No available rooms at the moment.
                        Please check again later.
                    </p>
            
                @endforelse
            
            </div>


    </section>


    <!-- FACILITIES SECTION -->
    <section class="section facilities" id="facilities">

        <div class="section-heading">

            <div class="eyebrow">Enjoy Your Stay</div>

            <h2>
                Our <span>Facilities</span>
            </h2>

        </div>

        <div class="facility-grid">

            <div class="facility">
                <div class="symbol">✧</div>
                <h3>Comfortable Rooms</h3>
                <p>Relax in thoughtfully designed accommodation.</p>
            </div>

            <div class="facility">
                <div class="symbol">◇</div>
                <h3>Guest Services</h3>
                <p>Enjoy convenient services throughout your stay.</p>
            </div>

            <div class="facility">
                <div class="symbol">❖</div>
                <h3>Quality Experience</h3>
                <p>Experience hospitality with comfort and care.</p>
            </div>

        </div>

    </section>


    <!-- CONTACT / BOOKING SECTION -->
    <section class="section contact" id="contact">

        <div class="eyebrow">Your Stay Begins Here</div>

        <h2>Make Your Stay Memorable</h2>

        <p>
            Discover comfort and elegance at Mh illiana Grand Hotel.
        </p>

        @auth
            <a href="{{ route('guest.rooms.index') }}" class="gold-button">
                Book a Room
            </a>
        @else
            <a href="{{ route('register') }}" class="gold-button">
                Get Started
            </a>
        @endauth

    </section>


    <!-- FOOTER -->
    <footer>

        <a href="/" class="brand">
            MHILLIANA
            <small>GRAND HOTEL</small>
        </a>

        <p>
            Experience Comfort. Discover Elegance.
        </p>

        <p>
            &copy; {{ date('Y') }} Mh illiana Grand Hotel.
            All Rights Reserved.
        </p>

    </footer>

</body>
</html>
