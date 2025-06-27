<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/crud/templates/inc/header.php" ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/crud/buyer">Покупатель</a></li>
        <li class="breadcrumb-item active" aria-current="page">Редактирование
            покупателя <?= htmlspecialchars($data[1]["currentItem"]->getBuyerName()) ?> </li>
    </ol>
</nav>
<?php if (isset($data[0]['errors']) && is_array($data[0]['errors'])): ?>
    <div class="alert alert-danger" role="alert">
        <ul>
            <?php foreach ($data[2]["errors"] as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif ?>
<form class="row g-3 bg-light p-4 rounded shadow-sm" name="editBuyer" method="post"
      action="/crud/buyer/<?= intval($data[1]['currentItem']->id) ?>/edit">
    <div class="col-12">
        <h2 class="mb-4 text-center text-primary">Редактировать покупателя</h2>
    </div>
    <div class="col-md-6">
        <label for="buyerName" class="form-label fw-bold">Имя покупателя</label>
        <input type="text" id="buyerName" class="form-control" placeholder="Введите имя покупателя" name="setBuyerName"
               maxlength="60" value="<?= htmlspecialchars($data[1]['currentItem']->getBuyerName()) ?>"
               title="Имя покупателя" required>
    </div>
    <div class="col-md-6">
        <label for="buyerCar" class="form-label fw-bold">Машина</label>
        <select id="buyerCar" class="form-select" name="setBuyerCar" title="Машина" required>
            <?php if (isset($data[0]['allCars'])): ?>
                <?php foreach ($data[0]['allCars'] as $car): ?>
                    <option value="<?= intval($car->id) ?>"
                        <?= $data[1]['currentItem']->carId == $car->id ? 'selected' : '' ?>>
                        <?= htmlspecialchars($car->getCarName()) ?>
                    </option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>
    </div>
    <div class="col-12 text-center mt-3">
        <button class="btn btn-primary px-5 py-2" type="submit">Сохранить изменения</button>
    </div>
</form>

