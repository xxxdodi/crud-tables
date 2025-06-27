<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/crud/templates/inc/header.php"; ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/crud/car">Машины</a></li>
        <li class="breadcrumb-item active" aria-current="page">Новая Машина</li>
    </ol>
</nav>

<?php if (!empty($data[0]['errors']) && is_array($data[0]['errors'])): ?>
    <div class="alert alert-danger" role="alert">
        <ul>
            <?php foreach ($data[0]['errors'] as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form class="row g-3 bg-light p-4 rounded shadow-sm" name="addCar" method="post" action="/crud/car/add">
    <div class="col-12">
        <h2 class="mb-4 text-center text-primary">Машины</h2>
    </div>
    <div class="col-md-6">
        <label for="carName" class="form-label fw-bold">Название машины</label>
        <input type="text" id="carName" class="form-control" placeholder="Введите название машины"
               name="setCarName" maxlength="60" title="Название машины" required>
    </div>
    <div class="col-md-6">
        <label for="releaseDate" class="form-label fw-bold">Дата выпуска</label>
        <input type="date" id="releaseDate" class="form-control"
               name="setCarRelease" title="Дата выпуска" required>
    </div>
    <div class="col-12 text-center mt-3">
        <button class="btn btn-primary px-5 py-2" type="submit">Добавить</button>
    </div>
</form>



