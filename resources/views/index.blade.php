<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lab</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.google.com/share?selection.family=Square+Peg" rel="stylesheet">
    <!-- google font -->


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
</head>

<body>
    <script src="{{asset('/js/script.js')}}"></script>



    <header>
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-transparent">
                <div class="container">
                    <div class="wow animate__flipOutY" data-wow-duration="7s" data-wow-delay="5s">
                        <a class="navbar-brand" href="index.html">
                            <h1 class="text-primary f-bold display-1 ">My Lab</h1>
                        </a>

                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item ">
                                <a class="nav-link active" aria-current="page" href="/">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#doctors">our doctors</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#testimonials">Testimonials</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#survices">our survices</a>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    BOOK NOW
                                </button>
                            </li>
                        </ul>
                    </div><!--  navbar-collapse -->

                </div><!-- container -->
            </nav>



            @if ($errors->any())
                <div class="alert alert-danger">
                    ReBook your appointment & enter valid data 
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <div>
                @if(session('alert'))
                    <div class="alert alert-success">
                        {{ session('alert') }}
                    </div>
                @endif
            </div>    {{-- alert --}}

        </div><!-- container -->
        <div id="carouselExampleControls" class="carousel slide w-100 " data-bs-ride="carousel">
            <div class="carousel-inner">
                <script>
                    for (var i = 1; i <= 4; i++) {
                        document.write(`
                        <div class="carousel-item active">
                         <img src="{{asset('../IMAGES/slide${i}.jpg')}}" class="d-block w-100 slide" alt="...">
                         </div>

                        `);
                    }
                </script>
            </div><!-- carousel-inner -->
            <button class="carousel-control-prev pt-5" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div><!-- carousel -->
    </header>

   

    <!-- our doctors -->
    <div id="doctors" class="bg-gray">
        <div class="container text-center pt-5">
            <h2 class="display-2">Our Doctors</h2>
            <hr class="line  mb-5">
            <div class="row">
                @foreach ($doctors as $doctor)
                <div class="col-md-4 col-sm-6 py-3 wow animate__shakeY" data-wow-duration="7s" data-wow-delay="5s">
                    <div class="card p-2">
                        <img src="{{asset('../IMAGES/'.$doctor['image'])}}"  class="rounded-circle doctor" height="100px" width="100px" alt="dr:mohammad magdy">
                        <h2 class="text-primary">{{$doctor['name']}}</h2>
                        <P>{{$doctor['experience']}}</P>
                        
                        <div class="d-flex text-primary  p-1">
                            <i class="fa-brands fa-twitter"></i>
                            <p>{{$doctor['twitter']}}</p>
                        </div><!-- twitter -->
                        <div class="d-flex text-primary p-1">
                            <i class="fa-brands fa-google"></i>
                            <p>{{$doctor['google']}}</p>
                        </div><!-- google -->
                    </div><!-- card -->
                </div><!-- col -->         
                @endforeach
                
            </div><!-- row -->
        </div><!-- container -->
    </div><!-- doctors -->

    <div id="testimonials" class="my-4">
        <div class="container my-4">
            <h2 class="display-2 text-center">Testimonials</h2>
            <hr class="line  mb-5">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#testimonial">
Add Testimonial                                </button>
            <hr class="line  mb-5">
            @foreach ($testimonials as $testimonial)
            <div class="row wow bounceInUp "  data-wow-duration="6s" >
                <div class="col-md-4 col-sm-8 m-2 ">
                    <img src="{{asset('../IMAGES/'.$testimonial['image'])}}" class="client rounded-18" alt="">
                    
                </div><!-- col -->
                <div class="col-md-6 col-sm-12 m-2">
                    <i class="fa-solid fa-quote-left text-primary mt-5"></i>
                    <h3 class="my-3">{{$testimonial['name']}}</h3>
                     <h5 class="lead text-center">
                        {{$testimonial['testimonial']}}
                </h5>
                <i class="fa-solid fa-quote-right text-primary"></i>
            </div><!-- col -->
            
            </div><!-- row1 -->
            <hr class="line  mb-5">
            @endforeach
           

        </div><!-- container -->
    </div><!-- Testimonials -->

    <div id="survices" class="bg-gray">
        <div class="container">
            <h2 class="display-2 text-center">Our survices</h2>
            <hr class="line  mb-5">
            <div class="row">
                <div class="col-md-3 col-sm-6 mb-5">
                    <div class="card p-1">
                        <img src="{{asset('../IMAGES/pinifit1.jpg')}}" alt="">

                        <p class="lead text-primary text-center">we take good care of Medical samples</p>
                    </div><!-- card -->
                </div>
                <div class="col-md-6 col-sm-12 mb-5">
                    <div class="card p-1">
                        <img src="{{asset('../IMAGES/pinifit2.jpg')}}"  height="470px" alt="">

                        <p class="lead text-primary text-center">Medical history is our priority</p>
                    </div><!-- card -->
                </div>
                <div class="col-md-3 col-sm-6 mb-5">
                    <div class="card p-1">
                        <img src="{{asset('../IMAGES/pinifit3.jpg')}}" alt="">

                        <p class="lead text-primary text-center">make sure to have The latest medical analysis devices</p>
                    </div><!-- card -->
                </div><!-- col -->
            </div><!-- row -->

        </div><!-- container -->


    </div><!-- survices -->




    <footer class="text-center p-5">
        <h2 class="display-4">MY LAP</h2>
        <P class="text-light">MANAGED BY DR/ MONA MAGDY</P>
        <a href="#" class="btn btn-primary"> go to the top</a>
    </footer>





    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary text-center display-2" id="exampleModalLabel ">BOOK NOW</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div><!-- header -->
                <div class="modal-body p-3">
                
                    <form action="{{route('appointment')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">your name</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">your email</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label"  >The checks you need</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="checkes"></textarea>
                        </div>
                        <div>
                            <label for="formFileLg" class="form-label" >Enter a picture prescribed by the doctor</label>
                            <input class="form-control form-control-lg" name="image" id="formFileLg" type="file">
                        </div>
                        <button type="submit" class="btn btn-success"> send</button>
                    </form>
                </div><!-- body -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="return confirm('are you sure ?')">Close</button>
                    <button type="button" class="btn btn-primary" onclick="return confirm('data is not sent but saved ?')">Save changes</button>
                </div>
            </div><!-- dialog -->
        </div><!-- modal -->
    </div><!-- modal -->
    <div class="modal fade" id="testimonial" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary text-center display-2" id="exampleModalLabel ">add testimonial</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div><!-- header -->
                <div class="modal-body p-3">
                
                    <form action="{{route('testimonial')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">your name</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">your testimonial</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="testimonial" name="testimonial">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="exampleFormControlTextarea1"  name="image" value="avatar.png"  hidden></imginput>
                        </div>
                       
                        <button type="submit" class="btn btn-success"> send</button>
                    </form>
                </div><!-- body -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="return confirm('are you sure ?')">Close</button>
                    <button type="button" class="btn btn-primary" onclick="return confirm('data is not sent but saved ?')">Save changes</button>
                </div>
            </div><!-- dialog -->
        </div><!-- modal -->
    </div><!-- modal -->





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{asset('js/wow.min.js')}}"></script>
    <script>
        new WOW().init();
    </script>
</body>

</html>