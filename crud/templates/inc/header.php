<link href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/crud/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="<?php $_SERVER["DOCUMENT_ROOT"] ?>/crud/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php $_SERVER["DOCUMENT_ROOT"] ?>/crud/vendor/jquery-3.6.0.min.js"></script>
<script src="<?php $_SERVER["DOCUMENT_ROOT"] ?>/crud/js/deleteItem.js"></script>

<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="/crud/car">Машины</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/crud/buyer">Покупатель</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/crud/companie">Производитель</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/crud/carcompanie">Связь машины и компании</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/crud/mark">Отзыв</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/crud/">Рейтинг</a>
            </li>
        </ul>
    </div>
</nav>
    <div class="modal fade" id="umlModal" tabindex="-1" role="dialog" aria-labelledby="umlModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="umlModalLabel">UML</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="crud/inc/img.png" class="img-fluid" alt="UML Diagram">
                </div>
            </div>
        </div>
    </div>
