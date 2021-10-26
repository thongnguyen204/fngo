<!-- Footer -->
<link href="{{ asset('css/footer.css') }}" rel="stylesheet">
<footer style="margin-top: 20px;" id="footer" class="page-footer font-small blue">

    <div style="max-width: 1300px" class="container">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="logo">
                    <a class="logo" href="{{ route('home') }}">
                        {{ config('app.name', 'Laravel') }}
                        {{-- FnGO --}}
                    </a>
                </div>
                <div class="row">
                    <div class="col">
                        {{__('footer.Try')}}
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="footer-title">
                    {{__('footer.Contacts')}}
                    
                    <div class="d-flex justify-content-start">
                        <hr>
                    </div>

                    <p>
                        <i class="bi bi-geo-alt"></i>
                        97 Võ Văn Tần, Phường 6, Quận 3, Thành phố Hồ Chí Minh
                    </p>

                    <p>
                        <i class="bi bi-telephone"></i>
                        Hotline: 0905200419
                    </p>

                    <p>
                        <i class="bi bi-envelope"></i>
                        1851010131Thong@ou.edu.vn
                    </p>

                    <p>
                        <i class="bi bi-envelope"></i>
                        1851010144Trung@ou.edu.vn
                    </p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="footer-title">
                    {{__('footer.Links')}}
                    <div>
                        <hr>
                    </div>

                    <p>
                        <a class="footer-link" href="tel:0905200419">
                            <i class="bi bi-telephone"></i>
                            0905200419
                        </a>
                    </p>

                    <p>
                        <a class="footer-link" href="{{route('payment.index')}}">
                            <i class="bi bi-cash-coin"></i>
                            {{__('footer.Payment')}}
                        </a>
                    </p>
                    <p>
                        <a class="footer-link" href="{{route('introduction.index')}}">
                            <i class="bi bi-people-fill"></i>
                            {{__('footer.Intro')}}
                        </a>
                    </p>

                    <p>
                        <a class="footer-link" href="">
                            <i class="bi bi-person-square"></i>
                            {{__('footer.About us')}}
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">
        2021 - FnGO
    </div>
    <!-- Copyright -->
  
</footer>
<!-- Footer -->