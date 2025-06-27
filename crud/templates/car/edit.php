<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/crud/templates/inc/header.php" ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/crud/car">Машины</a></li>
        <li class="breadcrumb-item active" aria-current="page">Редактирование
            машины <?= $data[0]["currentItem"]->getCarName() ?></li>
    </ol>
</nav>
<?php if (isset($data[0]['errors']) && is_array($data[0]['errors'])): ?>
    <div class="alert alert-danger" role="alert">
        <ul>
            <?php foreach ($data[1]["errors"] as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif ?>
<form class="row g-3 bg-light p-4 rounded shadow-sm" name="editCar" method="post"
      action="/crud/car/<?= intval($data[0]['currentItem']->id) ?>/edit">
    <div class="col-12">
        <h2 class="mb-4 text-center text-primary">Редактировать машину</h2>
    </div>
    <div class="col-md-6">
        <label for="carName" class="form-label fw-bold">Название машины</label>
        <input type="text" id="carName" class="form-control" placeholder="Введите название машины" name="setCarName"
               maxlength="60" value="<?= htmlspecialchars($data[0]['currentItem']->getCarName()) ?>" title="Название машины" required>
    </div>
    <div class="col-md-6">
        <label for="carDate" class="form-label fw-bold">Дата изготовления</label>
        <input type="date" id="carDate" class="form-control" placeholder="Введите дату изготовления" name="setCarRelease"
               maxlength="60" value="<?= htmlspecialchars($data[0]['currentItem']->getCarRelease()) ?>" title="Дата изготовления" required>
    </div>
    <div class="col-12 text-center mt-3">
        <button class="btn btn-primary px-5 py-2" type="submit">Сохранить изменения</button>
    </div>
</form>

