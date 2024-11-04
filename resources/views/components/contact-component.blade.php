<!-- Contact Section -->
<section id="contact" class="contact section">

    <div class="container section-title aos-init aos-animate" data-aos="fade-up">
        <h2>Contact</h2>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 justify-content-md-center">

            <div class="col-md-6">
                <form action="/forms/contact" id="contact_form" method="post" data-aos="fade-up" data-aos-delay="200">
                    @csrf
                    <div class="row gy-4">

                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                        </div>

                        <div class="col-md-6 ">
                            <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                        </div>

                        <div class="col-md-6">
                            <select name="country" class="form-control" id="country" required onchange="selectCountry()">
                                <option selected disabled>Select your country</option>
                                @foreach ($countries as $country)
                                <option value="{{ $country->name }}|{{ $country->short_code }}">{{ $country->name }} ({{ $country->short_code }})</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 ">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="phone_code">+###</span>
                                <input type="phone" class="form-control" name="phone" placeholder="Your Phone Number" required="">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                        </div>

                        <div class="col-md-12">
                            <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                        </div>

                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-theme btn-lg">Send Message</button>
                        </div>

                    </div>
                </form>
            </div><!-- End Contact Form -->

        </div>

    </div>

</section><!-- /Contact Section -->
@section('scripts')
<script>
    (() => {
        $('#contact_form').ajaxForm({
            beforeSubmit: () => {
                $('#contact').LoadingOverlay('show');
            }
            , success: (resp) => {
                $('#contact').LoadingOverlay('hide');
                Swal.fire("Send successfuly!").then(() => {
                    location.reload();
                });
            }
            , error: (error) => {
                console.log(error);
            }
        });
    })();
    selectCountry = () => {
        var data = $('#country').val();
        var splitData = data.split('|');
        var country_name = splitData[0];
        var country_code = splitData[1];
        $('#phone_code').text(country_code);
    }

</script>
@endsection
