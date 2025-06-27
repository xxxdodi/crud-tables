<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/crud/templates/inc/header.php"; ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/crud/buyer">Покупатель</a></li>
        <li class="breadcrumb-item active" aria-current="page">Новый покупатель</li>
    </ol>
</nav>
<?php if (isset($data[1]["errors"])): ?>
    <div class="alert alert-danger" role="alert">
        <ul>
            <?php foreach ($data[1]["errors"] as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
<form class="row g-3 bg-light p-4 rounded shadow-sm" name="addBuyer" method="post" action="/crud/buyer/add">
    <div class="col-12">
        <h2 class="mb-4 text-center text-primary">Добавить покупателя</h2>
    </div>
    <div class="col-md-6">
        <label for="buyerName" class="form-label fw-bold">Имя покупателя</label>
        <input type="text" id="buyerName" class="form-control" placeholder="Введите имя покупателя" name="setBuyerName"
               maxlength="60" title="Имя покупателя" required>
    </div>
    <div class="col-md-6">
        <label for="buyerCar" class="form-label fw-bold">Машина</label>
        <select id="buyerCar" class="form-select" name="setBuyerCar" required>
            <?php if (isset($data[0]["allCars"]) && count($data[0]["allCars"]) > 0): ?>
                <?php foreach ($data[0]["allCars"] as $car): ?>
                    <option value="<?= intval($car->id) ?>"><?= htmlspecialchars($car->getCarName()) ?></option>
                <?php endforeach; ?>
            <?php else: ?>
                <option disabled>Нет доступных машин</option>
            <?php endif; ?>
        </select>

    </div>
    <div class="col-12 text-center mt-3">
        <button class="btn btn-primary px-5" type="submit">Добавить</button>
    </div>
</form>
