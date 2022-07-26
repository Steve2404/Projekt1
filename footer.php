<footer class="border-top mt-auto">
        <div class="container py-4">
            <div class="row gy-3">
                <div class="col-12 col-md-4">
                    <a class="navbar-brand text-dark text-uppercase fw-bold" href="Accueil.php">
                        <img src="Img/logo.jpeg" alt="Logo" style="width:50px; height:50px;">
                    </a>
                </div>
                <div class="col-12 col-md-4 text-md-center">
                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="#" class="text-decoration-none text-dark" data-bs-toggle="modal"
                                data-bs-target="#mentionLegales">Legale Hinweise</a>
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-md-4 text-md-end">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <a href="#" class="text-decoration-none text-info" data-bs-toggle="tooltip"
                                title="LinkedIn">
                                <i class="fab fa-linkedin fa-2x"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="text-decoration-none text-warning" data-bs-toggle="tooltip"
                                title="Instagram">
                                <i class="fab fa-instagram-square fa-2x"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="text-decoration-none " data-bs-toggle="tooltip" title="Twitter">
                                <i class="fab fa-twitter-square fa-2x"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="mentionLegales" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mentionLegales">Copyright</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Diese Seite ist Eigentum von Jatsa,Tchouala und Guelefack wurde im Rahmen des Projekts
                            des Kurses Netzbasierte Systeme an der HTW Berlin im Sommersemester 2022 erstellt.</p>
                    </div>
                </div>
            </div>
        </div>
        <script>
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </footer>