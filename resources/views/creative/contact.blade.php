<x-creative>
    @slot('title')
        Contact - Start Bootstrap Theme
    @endslot
    <!-- Contact-->
    <section class="page-section" id="contact">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 col-xl-6 text-center">
                    <h2 class="mt-0">Let's Get In Touch!</h2>
                    <hr class="divider" />
                    <p class="text-muted mb-5">Ready to start your next project with us? Send us a messages and we will
                        get back to you as soon as possible!</p>
                </div>
            </div>
            <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                <div class="col-lg-6">

                    @include('form._errores')
                    <form id="contactForm" action="{{ route('creative.contact') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <!-- Name input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="name" type="text" placeholder="Enter your name..."
                                name="name" />
                            <label for="name">Full name</label>
                        </div>
                        <!-- Email address input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="email" type="email"
                                placeholder="name@example.com"name="email" />
                            <label for="email">Email address</label>

                        </div>
                        <!-- start_study input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="start_study" type="date"name="start_study" />
                            <label for="start_study">Start Study</label>

                        </div>
                        <!-- final_study input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="final_study" type="date"name="final_study" />
                            <label for="final_study">Final Study</label>

                        </div>
                        <!-- Image input-->
                        <div class="form-control">
                            <label for="image">Image</label>
                            <input class="form-control" id="image" type="file" name="image" />

                        </div><br>

                        <!-- Submit Button-->
                        <div class="d-grid"><button class="btn btn-primary btn-lg" id="submitButton"
                                type="submit">Submit</button></div>
                    </form>
                </div>
            </div>
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-4 text-center mb-5 mb-lg-0">
                    <i class="bi-phone fs-2 mb-3 text-muted"></i>
                    <div>+1 (555) 123-4567</div>
                </div>
            </div>
        </div>
    </section>
</x-creative>
