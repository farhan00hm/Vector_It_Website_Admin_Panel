<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Vector IT Official Website">
    <meta name="keywords" content="Website Development, Mobile Development, Application">
    <meta name="author" content="Vector IT">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/userassets/css/homepage.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
{{--    for toastaer notification--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    {{--    for toastaer notification--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <title>VectorIT</title>
</head>

<body>
<Header>
    <div id="company-logo">
        <img src="../assets/userassets/resources/svg/logo.svg">
        <p>Vector IT</p>
    </div>
    <nav>
        <a href="#" id="active">Home</a>
        <div id="drop-down">
            <a id="drop-button" href="#">Services</a>
            <div id="drop-down-content">
                <a href="#" class="drop-down-menu">
                    <img src="../assets/userassets/resources/pictures/icons-mouse.png">
                    <div class="content-text">
                        <h3>Web Development</h3>
                        <p>Convert your business to next level</p>
                    </div>
                </a>
                <a href="#" class="drop-down-menu">
                    <img src="../assets/userassets/resources/pictures/icons-mouse.png">
                    <div class="content-text">
                        <h3>App Development</h3>
                        <p>Convert your business to next level</p>
                    </div>
                </a>
                <a href="#" class="drop-down-menu">
                    <img src="../assets/userassets/resources/pictures/icons-mouse.png">
                    <div class="content-text">
                        <h3>Digital Marketing</h3>
                        <p>Convert your business to next level</p>
                    </div>
                </a>
                <a href="#" class="drop-down-menu">
                    <img src="../assets/userassets/resources/pictures/icons-mouse.png">
                    <div class="content-text">
                        <h3>Design Services</h3>
                        <p>Convert your business to next level</p>
                    </div>
                </a>
            </div>
        </div>
        <a href="#">Portfolio</a>
        <a href="#">About</a>
        <a href="#">Contact</a>
    </nav>
</Header>
<section id="main-view">
    <div id="text">
        <h1>Let's make your life more simple with technology</h1>
        <p>We are growing information technology company in Bangladesh that provides quality
            services to their customers. VectorIT supports their clients with some unavoidable
            quality assurances to help develop their business.
        </p>
        <div id="scroll-guide">
            <img src="../assets/userassets/resources/svg/scroll.svg">
            <p>Scroll to learn more</p>
        </div>
    </div>
    <div id="image">
        <img src="../assets/userassets/resources/pictures/main.jpg">
    </div>
</section>
<section id="specialization">
    <h1>Our specializations</h1>
    @foreach($specializations as $specialization)
        @if($specialization->display == 1)
            <div class="content">
                <h3>{{ $specialization->title }}</h3>
                <p>
                    {{ $specialization->short_description }}
                </p>
                <button>Learn More</button>
            </div>
        @endif
    @endforeach
</section>
<section id="services">
    @foreach($services as $service)
        <div class="content">
            <div class="content-text">
                <h3>{{ $service->title }}</h3>
                <p>
                    {{ $service->description }}
                </p>
                <ul>
                    @foreach(explode(";",$service->lists) as $listItem)
                        <li>{{ $listItem }}</li>
                    @endforeach
                </ul>
                <p>{{ $service->conclusion }}</p>
            </div>
            <div class="content-image">
                <img src="../assets/userassets/resources/pictures/{{$service->imagePath}}">
            </div>
        </div>
    @endforeach
</section>
<section id="client-feedback">
    <h1>What our clients say!</h1>
    <p>orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
        industry's
        standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
        scrambled it to
    </p>
    @foreach($feedbacks as $feedback)
        <div class="content">
            <div class="content-image">
                <img src="..\assets\img\{{ $feedback->imagePath }}" alt="Client-Image">
            </div>
            <div class="content-text">
                <h3>{{ $feedback->name }}</h3>
                <p><strong>{{ $feedback->profession }}</strong></p>
                <p class="quote">{{ $feedback->feedback }}
                </p>
            </div>
        </div>
    @endforeach

</section>
<section id="promotion">
    <h2>Get a Special OFFER!</h2>
    <h3>
        Subscribe our newsletter to receive our gratitude with a few special offer to your doorstep.
    </h3>
    <form id="promotion-form">
        <input type="text" id="promotion-mail" placeholder="Email address" name="mail" required>
{{--        <button onclick="storePromotionContact()">Submit</button>--}}
        <input type="submit" value="Subscribe" onclick="storePromotionContact()">
    </form>
    <button onclick="storePromotionContact()">Submit</button>
</section>
<footer>
    <section id="footer">
        <section class="content" id="address">
            <div id="company-logo">
                <img src="resources/userassets/pictures/logo.jpg">
                <p>Vector IT</p>
            </div>
            <p>Office Address<br>
                Phone: +880..<br>
                Email: info@vectorit.com
            </p>
        </section>
        <section id="footer-links">
            <div class="content" id="userful-links">
                <h3>Useful Links</h3>
                <a href="#">Home</a>
                <a href="#">About Us</a>
                <a href="#">Terms of service</a>
                <a href="#">Privacy Policy</a>
            </div>
            <div class="content" id="our-services">
                <h3>Our Services</h3>
                <a href="#">Mobile App Development</a>
                <a href="#">Website Development</a>
                <a href="#">Graphic Design</a>
                <a href="#">Digital Marketing</a>
            </div>
        </section>
        <section class="content" id="social-icons">
            <h3>Our Social Networks</h3>
            <a href="#"><img src="../assets/userassets/resources/pictures/icons-mouse.png"></a>
            <a href="#"><img src="../assets/userassets/resources/pictures/icons-mouse.png"></a>
            <a href="#"><img src="../assets/userassets/resources/pictures/icons-mouse.png"></a>
            <a href="#"><img src="../assets/userassets/resources/pictures/icons-mouse.png"></a>
            <a href="#"><img src="../assets/userassets/resources/pictures/icons-mouse.png"></a>
        </section>
    </section>
    <copyright>
        &copy;Copyright VectorIT. All Rights Reserved
    </copyright>
</footer>

<script type="text/javascript">
    function storePromotionContact(e) {

        let email = document.getElementById("promotion-mail").value;
        let url = "/store-promotations-contact";
        // $.toast({
        //     heading: 'Success',
        //     text: 'Here is some kind of success message with a success icon that you can notice at the left side.',
        //     icon: 'success'
        // });
        $('#promotion-form').submit(function (event) {
            event.preventDefault();
        $.ajax({
            type: "POST",
            data: {email: email, _token: '{{ csrf_token() }}'},
            url: "/store-promotations-contact",
            success: function (response) {
                toastr.success('Successfully stored your mail!');
                document.getElementById("promotion-mail").value = null;

            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                toastr.error('I do not think that word means what you think it means.', 'Inconceivable!')
                console.log("Status: " + textStatus + "Error: " + errorThrown);
            }
        });

    });
        // alert("test");
        {{--$.ajax({--}}
        {{--    type: "GET",--}}
        {{--    data: {sortBy: x, _token: '{{csrf_token()}}'},--}}
        {{--    url: "/sortdata/",--}}
        {{--    success: function (response) {--}}
        {{--        $('.collapse').collapse('show');--}}
        {{--        $('#application-lists').html(response);--}}
        {{--    },--}}
        {{--    error: function (XMLHttpRequest, textStatus, errorThrown) {--}}
        {{--        console.log("Status: " + textStatus + "Error: " + errorThrown);--}}
        {{--    }--}}
        {{--});--}}
    }
</script>
</body>

</html>

