<?php include_once $_SERVER["DOCUMENT_ROOT"] ."/crud/templates/inc/header.php"?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/crud/carcompanie">Связи</a></li>
        <li class="breadcrumb-item active" aria-current="page">Редактирование связи </li>
    </ol>
</nav>
<?php if(isset($data[3])): ?>

    <div class="alert alert-danger" role="alert" >
        <ul>
            <?php foreach ($data[3]["errors"] as $error): ?>
                <li><?=$error?></li>
            <?php endforeach;?>
        </ul>
    </div>
<?php endif?>
<form class="row g-3 bg-light p-4 rounded shadow-sm" name="editLink" method="post"
      action="/crud/carcompanie/<?= intval($data[2]['currentItem']->id) ?>/edit">
    <div class="col-12">
        <h2 class="mb-4 text-center text-primary">Редактировать связь</h2>
    </div>
    <div class="col-md-6">
        <label for="carSelect" class="form-label fw-bold">Машина</label>
        <select id="carSelect" class="form-select" name="setCarId" title="Машина" required>
            <?php if (isset($data[0]['allCars'])): ?>
                <?php foreach ($data[0]['allCars'] as $car): ?>
                    <option value="<?= intval($car->id) ?>"
                        <?= $data[2]['currentItem']->carId == $car->id ? 'selected' : '' ?>>
                        <?= htmlspecialchars($car->getCarName()) ?>
                    </option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>
    </div>
    <div class="col-md-6">
        <label for="companieSelect" class="form-label fw-bold">Компания</label>
        <select id="companieSelect" class="form-select" name="setCompanieId" title="Компания" required>
            <?php if (isset($data[1]['allCompanies'])): ?>
                <?php foreach ($data[1]['allCompanies'] as $companie): ?>
                    <option value="<?= intval($companie->id) ?>"
                        <?= $data[2]['currentItem']->companieId == $companie->id ? 'selected' : '' ?>>
                        <?= htmlspecialchars($companie->getCompanieName()) ?>
                    </option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>
    </div>
    <div class="col-12 text-center mt-3">
        <button class="btn btn-primary px-5 py-2" type="submit">Сохранить изменения</button>
    </div>
</form>
