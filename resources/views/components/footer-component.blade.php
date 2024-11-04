<footer id="footer" class="footer light-background">

    <div class="container">
        <div class="row gy-3">
            <div class="col-lg-3 col-md-6 d-flex">
                <i class="bi bi-geo-alt icon"></i>
                <div class="address">
                    <h4>Address</h4>
                    <p>SA B.V.</p>
                    <p>Daalwijkdreef 47</p>
                    <p>1103AD Amsterdam</p>
                </div>

            </div>

            <div class="col-lg-3 col-md-6 d-flex">
                <i class="bi bi-telephone icon"></i>
                <div>
                    <h4>Contact</h4>
                    <p>
                        <strong>Phone:</strong> <span>+351 960 494 213</span><br>
                        <strong>Email:</strong> <span>info@targetauto.pt</span><br>
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 d-flex">
                <i class="bi bi-clock icon"></i>
                <div>
                    <h4>Legal requirements</h4>
                    <p>
                        @foreach ($content_pages as $content_page)
                        <a href="/page/{{ $content_page->id }}/{{ Str::slug($content_page->title) }}" style="color: #ffffff;">{{ $content_page->title }}</a><br>
                        @endforeach
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <h4>Follow Us</h4>
                <div class="social-links d-flex">
                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>

        </div>
    </div>

    <div class="container copyright text-center mt-4">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">Target Auto</strong> <span>All Rights Reserved</span></p>
        <div class="credits">
            Designed by <a href="https://netlook.pt">Netlook</a>
        </div>
    </div>

</footer>